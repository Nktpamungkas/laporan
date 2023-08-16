<!DOCTYPE html>
<html lang="en">
<head>
    <title>PPC - Laporan Pengiriman</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <link rel="icon" href="files\assets\images\favicon.ico" type="image/x-icon">
     <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="files\bower_components\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\icon\themify-icons\themify-icons.css">
    <link rel="stylesheet" type="text/css" href="files\assets\icon\icofont\css\icofont.css">
    <link rel="stylesheet" type="text/css" href="files\assets\icon\feather\css\feather.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\prism\prism.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\pcoded-horizontal.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
</head>
<?php require_once 'header.php'; ?>

<body>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Filter by</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Bon Order</h4>
                                                    <input type="text" name="no_order" class="form-control" onkeyup="this.value = this.value.toUpperCase()" value="<?php if (isset($_POST['submit'])){ echo $_POST['no_order']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Issue Date</h4>
                                                    <input type="date" name="tgl1" class="form-control" id="tgl1" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl1']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-12 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary">Cari data</button>
                                                    <?php if (isset($_POST['submit'])) : ?>
                                                        <a class="btn btn-mat btn-warning" target="_blank" href="ppc_pengiriman-excel.php?tgl1=<?= $_POST['tgl1']; ?>&no_order=<?= $_POST['no_order']; ?>">CETAK EXCEL</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST['submit'])) : ?>
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table id="excel-LA" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>NO</th>
                                                            <th>TANGGAL</th>
                                                            <th>NO SJ</th>
                                                            <th>WARNA</th>
                                                            <th>ROLL</th>
                                                            <th>QTY KG</th>
                                                            <th>QTY YARD/MTR</th>
                                                            <th>BUYER</th>
                                                            <th>CUSTOMER</th>
                                                            <th>NO PO</th>
                                                            <th>NO ORDER</th>
                                                            <th>JENIS KAIN</th>
                                                            <th>LOTCODE</th>
                                                            <th>DEMAND</th>
                                                            <th>FOC</th>
                                                            <th>TYPE</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php 
                                                            ini_set("error_reporting", 1);
                                                            session_start();
                                                            require_once "koneksi.php";
                                                            $tgl1     = $_POST['tgl1'];
                                                            $no_order = $_POST['no_order'];

                                                            if($tgl1){
                                                                $where_date     = "i.GOODSISSUEDATE = '$tgl1'";
                                                            }else{
                                                                $where_date     = "";
                                                            }
                                                            if($no_order){
                                                                $where_no_order     = "i.DLVSALORDERLINESALESORDERCODE = '$no_order'";
                                                            }else{
                                                                $where_no_order     = "";
                                                            }
                                                            $codeExport     = "TRIM(i.DEFINITIVECOUNTERCODE) = 'CESDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'CESPROV' OR
                                                                                TRIM(i.DEFINITIVECOUNTERCODE) = 'DREDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'DREPROV' OR 
                                                                                TRIM(i.DEFINITIVECOUNTERCODE) = 'DSEDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'EXDDEF' OR
                                                                                TRIM(i.DEFINITIVECOUNTERCODE) = 'EXDPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'EXPDEF' OR
                                                                                TRIM(i.DEFINITIVECOUNTERCODE) = 'EXPPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'GSEDEF' OR 
                                                                                TRIM(i.DEFINITIVECOUNTERCODE) = 'GSEPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'PSEPROV'";
                                                            $sqlDB2 = "SELECT DISTINCT
                                                                            i.PROVISIONALCODE,
                                                                            TRIM(i.PRICEUNITOFMEASURECODE) AS PRICEUNITOFMEASURECODE,
                                                                            i.DEFINITIVECOUNTERCODE,
                                                                            i.DEFINITIVEDOCUMENTDATE,
                                                                            i.ORDERPARTNERBRANDCODE,
                                                                            CASE
                                                                                WHEN $codeExport THEN '' ELSE i.PO_NUMBER
                                                                            END AS PO_NUMBER,
                                                                            i.PROJECTCODE,
                                                                            DAY(i.GOODSISSUEDATE) ||'-'|| MONTHNAME(i.GOODSISSUEDATE) ||'-'|| YEAR(i.GOODSISSUEDATE) AS GOODSISSUEDATE,
                                                                            i.ORDPRNCUSTOMERSUPPLIERCODE,
                                                                            i.PAYMENTMETHODCODE,   
                                                                            i.ITEMTYPEAFICODE,
                                                                            CASE
                                                                                WHEN $codeExport THEN '' ELSE i.DLVSALORDERLINESALESORDERCODE
                                                                            END AS DLVSALORDERLINESALESORDERCODE,
                                                                            CASE
                                                                                WHEN $codeExport THEN 0 ELSE i.DLVSALESORDERLINEORDERLINE
                                                                            END AS DLVSALESORDERLINEORDERLINE,
                                                                            CASE
                                                                                WHEN $codeExport THEN '' ELSE 
                                                                                    TRIM(i.SUBCODE01) || '-' || TRIM(i.SUBCODE02) || '-' || TRIM(i.SUBCODE03) || '-' || TRIM(i.SUBCODE04) || '-' ||
                                                                                    TRIM(i.SUBCODE05) || '-' || TRIM(i.SUBCODE06) || '-' || TRIM(i.SUBCODE07) || '-' || TRIM(i.SUBCODE08)
                                                                            END AS ITEMDESCRIPTION,
                                                                            CASE
                                                                                WHEN $codeExport THEN '' ELSE iasp.LOTCODE
                                                                            END AS LOTCODE,
                                                                            CASE
                                                                                WHEN $codeExport THEN '' ELSE i2.WARNA
                                                                            END AS WARNA,
                                                                            i.LEGALNAME1,
                                                                            CASE
                                                                                WHEN $codeExport THEN 'EXPORT' ELSE i.CODE
                                                                            END AS CODE
                                                                        FROM 
                                                                            ITXVIEW_SURATJALAN_PPC_FOR_POSELESAI i
                                                                        LEFT JOIN ITXVIEW_ALLOCATION_SURATJALAN_PPC iasp ON iasp.CODE = i.CODE
                                                                        LEFT JOIN ITXVIEWCOLOR i2 ON i2.ITEMTYPECODE =  i.ITEMTYPEAFICODE
                                                                                                AND i2.SUBCODE01 = i.SUBCODE01 AND i2.SUBCODE02 = i.SUBCODE02
                                                                                                AND i2.SUBCODE03 = i.SUBCODE03 AND i2.SUBCODE04 = i.SUBCODE04
                                                                                                AND i2.SUBCODE05 = i.SUBCODE05 AND i2.SUBCODE06 = i.SUBCODE06
                                                                                                AND i2.SUBCODE07 = i.SUBCODE07 AND i2.SUBCODE08 = i.SUBCODE08
                                                                                                AND i2.SUBCODE09 = i.SUBCODE09 AND i2.SUBCODE10 = i.SUBCODE10
                                                                        WHERE 
                                                                            $where_no_order $where_date AND i.DOCUMENTTYPETYPE = 05 AND NOT i.CODE IS NULL AND i.PROGRESSSTATUS_SALDOC = 2
                                                                        GROUP BY
                                                                            i.PROVISIONALCODE,
                                                                            i.PRICEUNITOFMEASURECODE,
                                                                            i.DEFINITIVEDOCUMENTDATE,
                                                                            i.ORDERPARTNERBRANDCODE,
                                                                            i.PO_NUMBER,
                                                                            i.PROJECTCODE,
                                                                            i.GOODSISSUEDATE,
                                                                            i.ORDPRNCUSTOMERSUPPLIERCODE,
                                                                            i.PAYMENTMETHODCODE,
                                                                            i.PO_NUMBER,    
                                                                            i.ITEMTYPEAFICODE,
                                                                            i.DLVSALORDERLINESALESORDERCODE,
                                                                            i.DLVSALESORDERLINEORDERLINE,
                                                                            i.ITEMDESCRIPTION,
                                                                            iasp.LOTCODE,
                                                                            i.DEFINITIVECOUNTERCODE,
                                                                            i2.WARNA,
                                                                            i.LEGALNAME1,
                                                                            i.CODE,
                                                                            i.SUBCODE01,
                                                                            i.SUBCODE02,
                                                                            i.SUBCODE03,
                                                                            i.SUBCODE04,
                                                                            i.SUBCODE05,
                                                                            i.SUBCODE06,
                                                                            i.SUBCODE07,
                                                                            i.SUBCODE08,
                                                                            i.SUBCODE09,
                                                                            i.SUBCODE10
                                                                        ORDER BY 
                                                                            i.PROVISIONALCODE ASC";
                                                            $stmt   = db2_exec($conn1,$sqlDB2);
                                                            $no = 1;
                                                            while ($rowdb2 = db2_fetch_assoc($stmt)) {
                                                        ?>
                                                        <?php
                                                            $q_ket_foc  = db2_exec($conn1, "SELECT 
                                                                                                COUNT(QUALITYREASONCODE) AS ROLL,
                                                                                                SUM(FOC_KG) AS KG,
                                                                                                SUM(FOC_YARDMETER) AS YARD_MTR,
                                                                                                KET_YARDMETER
                                                                                            FROM
                                                                                                ITXVIEW_SURATJALAN_EXIM2A
                                                                                            WHERE 
                                                                                                QUALITYREASONCODE = 'FOC'
                                                                                                AND PROVISIONALCODE = '$rowdb2[PROVISIONALCODE]'
                                                                                            GROUP BY 
                                                                                                KET_YARDMETER");
                                                            $d_ket_foc  = db2_fetch_assoc($q_ket_foc);
                                                        ?>
                                                        <?php if($d_ket_foc['ROLL'] > 0 AND $d_ket_foc['KG'] > 0 AND $d_ket_foc['YARD_MTR'] > 0) : ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $rowdb2['GOODSISSUEDATE']; ?></td> 
                                                                <td><?= $rowdb2['PROVISIONALCODE']; ?></td> 
                                                                <td><?= $rowdb2['WARNA']; ?></td> 
                                                                <td><?= $d_ket_foc['ROLL']; ?></td> 
                                                                <td><?= number_format($d_ket_foc['KG'], 2); ?></td> 
                                                                <td><?= number_format($d_ket_foc['YARD_MTR'], 2); ?></td> 
                                                                <td><?= $rowdb2['ORDERPARTNERBRANDCODE']; ?></td> 
                                                                <td>
                                                                    <?php
                                                                        $q_roll     = db2_exec($conn1, "SELECT
                                                                                                            COUNT(ise.COUNTROLL) AS ROLL,
                                                                                                            SUM(ise.QTY_KG) AS QTY_SJ_KG,
                                                                                                            SUM(ise.QTY_YARDMETER) AS QTY_SJ_YARD,
                                                                                                            inpe.PROJECT,
                                                                                                            ise.ADDRESSEE,
                                                                                                            ise.BRAND_NM
                                                                                                        FROM
                                                                                                            ITXVIEW_SURATJALAN_EXIM2 ise 
                                                                                                        LEFT JOIN ITXVIEW_NO_PROJECTS_EXIM inpe ON inpe.PROVISIONALCODE = ise.PROVISIONALCODE 
                                                                                                        WHERE 
                                                                                                            ise.PROVISIONALCODE = '$rowdb2[PROVISIONALCODE]'
                                                                                                        GROUP BY 
                                                                                                            inpe.PROJECT,ise.ADDRESSEE,ise.BRAND_NM");
                                                                        $d_roll     = db2_fetch_assoc($q_roll);
                                                                        $q_pelanggan    = db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$rowdb2[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                                                                            AND CODE = '$rowdb2[DLVSALORDERLINESALESORDERCODE]'");
                                                                        $r_pelanggan    = db2_fetch_assoc($q_pelanggan);
                                                                        if($rowdb2['CODE'] == 'EXPORT'){
                                                                            echo $d_roll['ADDRESSEE'].' - '.$d_roll['BRAND_NM'];
                                                                        }else{
                                                                            echo $r_pelanggan['LANGGANAN'];

                                                                        }
                                                                    ?>
                                                                </td> 
                                                                <td>`<?= $rowdb2['PO_NUMBER']; ?></td> 
                                                                <td>
                                                                    <?php
                                                                        if($rowdb2['CODE'] == 'EXPORT'){
                                                                            echo $d_roll['PROJECT'];
                                                                        }else{
                                                                            echo $rowdb2['DLVSALORDERLINESALESORDERCODE'];
                                                                        }
                                                                    ?>
                                                                </td> 
                                                                <td><?= $rowdb2['ITEMDESCRIPTION']; ?></td> 
                                                                <td>`<?= $rowdb2['LOTCODE']; ?></td> 
                                                                <td>
                                                                    <?php
                                                                        $q_demand   = db2_exec($conn1, "SELECT 
                                                                                                            PRODUCTIONDEMANDCODE
                                                                                                        FROM 
                                                                                                            ITXVIEW_DEMANDBYLOTCODE 
                                                                                                        WHERE 
                                                                                                            PRODUCTIONORDERCODE = '$rowdb2[LOTCODE]'
                                                                                                            AND DLVSALESORDERLINEORDERLINE = '$rowdb2[DLVSALESORDERLINEORDERLINE]'");
                                                                        $d_demand   = db2_fetch_assoc($q_demand);
                                                                    ?>
                                                                    <?= $d_demand['PRODUCTIONDEMANDCODE']; ?>
                                                                </td> 
                                                                <td><?php if($rowdb2['PAYMENTMETHODCODE'] == 'FOC'){ echo $rowdb2['PAYMENTMETHODCODE']; } ?></td> 
                                                                <td><?= $rowdb2['ITEMTYPEAFICODE']; ?></td> 
                                                            </tr>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $rowdb2['GOODSISSUEDATE']; ?></td> 
                                                                <td><?= $rowdb2['PROVISIONALCODE']; ?></td> 
                                                                <td><?= $rowdb2['WARNA']; ?></td> 
                                                                <td>
                                                                    <?php
                                                                        if($rowdb2['CODE'] == 'EXPORT'){
                                                                            $q_roll     = db2_exec($conn1, "SELECT
                                                                                                                COUNT(ise.COUNTROLL) AS ROLL,
                                                                                                                SUM(ise.QTY_KG) AS QTY_SJ_KG,
                                                                                                                SUM(ise.QTY_YARDMETER) AS QTY_SJ_YARD,
                                                                                                                inpe.PROJECT,
                                                                                                                ise.ADDRESSEE,
                                                                                                                ise.BRAND_NM
                                                                                                            FROM
                                                                                                                ITXVIEW_SURATJALAN_EXIM2 ise 
                                                                                                            LEFT JOIN ITXVIEW_NO_PROJECTS_EXIM inpe ON inpe.PROVISIONALCODE = ise.PROVISIONALCODE 
                                                                                                            WHERE 
                                                                                                                ise.PROVISIONALCODE = '$rowdb2[PROVISIONALCODE]'
                                                                                                            GROUP BY 
                                                                                                                inpe.PROJECT,ise.ADDRESSEE,ise.BRAND_NM");
                                                                            $d_roll     = db2_fetch_assoc($q_roll);
                                                                            if($d_ket_foc['KG'] != 0) { // MENGHITUNG JIKA FOC SEBAGIAN, MAKA ROLL UNTUK FOC DIPISAH DARI KESELURUHAN
                                                                                echo $d_roll['ROLL'] - $d_ket_foc['ROLL'];
                                                                            }else{
                                                                                echo $d_roll['ROLL'];
                                                                            }
                                                                        }else{
                                                                            $q_roll     = db2_exec($conn1, "SELECT COUNT(CODE) AS ROLL,
                                                                                                                    SUM(BASEPRIMARYQUANTITY) AS QTY_SJ_KG,
                                                                                                                    SUM(BASESECONDARYQUANTITY) AS QTY_SJ_YARD
                                                                                                            FROM 
                                                                                                                ITXVIEWALLOCATION0 
                                                                                                            WHERE 
                                                                                                                CODE = '$rowdb2[CODE]'");
                                                                            $d_roll     = db2_fetch_assoc($q_roll);
                                                                            echo $d_roll['ROLL'];
                                                                        }
                                                                    ?>
                                                                </td> 
                                                                <td><?= number_format($d_roll['QTY_SJ_KG'], 2); ?></td> 
                                                                <td>
                                                                    <?php 
                                                                        if($rowdb2['PRICEUNITOFMEASURECODE'] == 'm'){
                                                                            echo round(number_format($d_roll['QTY_SJ_YARD'], 2) * 0.9144, 2);
                                                                        }else{
                                                                            echo number_format($d_roll['QTY_SJ_YARD'], 2);
                                                                        }
                                                                    ?>
                                                                </td> 
                                                                <td><?= $rowdb2['ORDERPARTNERBRANDCODE']; ?></td> 
                                                                <td>
                                                                    <?php
                                                                        $q_pelanggan    = db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$rowdb2[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                                                                            AND CODE = '$rowdb2[DLVSALORDERLINESALESORDERCODE]'");
                                                                        $r_pelanggan    = db2_fetch_assoc($q_pelanggan);
                                                                        if($rowdb2['CODE'] == 'EXPORT'){
                                                                            echo $d_roll['ADDRESSEE'].' - '.$d_roll['BRAND_NM'];
                                                                        }else{
                                                                            echo $r_pelanggan['LANGGANAN'];

                                                                        }
                                                                    ?>
                                                                </td> 
                                                                <td>`<?= $rowdb2['PO_NUMBER']; ?></td> 
                                                                <td>
                                                                    <?php
                                                                        if($rowdb2['CODE'] == 'EXPORT'){
                                                                            echo $d_roll['PROJECT'];
                                                                        }else{
                                                                            echo $rowdb2['DLVSALORDERLINESALESORDERCODE'];
                                                                        }
                                                                    ?>
                                                                </td> 
                                                                <td><?= $rowdb2['ITEMDESCRIPTION']; ?></td> 
                                                                <td>`<?= $rowdb2['LOTCODE']; ?></td> 
                                                                <td>
                                                                    <?php
                                                                        $q_demand   = db2_exec($conn1, "SELECT 
                                                                                                            PRODUCTIONDEMANDCODE
                                                                                                        FROM 
                                                                                                            ITXVIEW_DEMANDBYLOTCODE 
                                                                                                        WHERE 
                                                                                                            PRODUCTIONORDERCODE = '$rowdb2[LOTCODE]'
                                                                                                            AND DLVSALESORDERLINEORDERLINE = '$rowdb2[DLVSALESORDERLINEORDERLINE]'");
                                                                        $d_demand   = db2_fetch_assoc($q_demand);
                                                                    ?>
                                                                    <?= $d_demand['PRODUCTIONDEMANDCODE']; ?>
                                                                </td> 
                                                                <td><?php if($rowdb2['PAYMENTMETHODCODE'] == 'FOC'){ echo $rowdb2['PAYMENTMETHODCODE']; } ?></td> 
                                                                <td><?= $rowdb2['ITEMTYPEAFICODE']; ?></td> 
                                                            </tr>
                                                        <?php else : ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $rowdb2['GOODSISSUEDATE']; ?></td> 
                                                                <td><?= $rowdb2['PROVISIONALCODE']; ?></td> 
                                                                <td><?= $rowdb2['WARNA']; ?></td> 
                                                                <td>
                                                                    <?php
                                                                        if($rowdb2['CODE'] == 'EXPORT'){
                                                                            $q_roll     = db2_exec($conn1, "SELECT
                                                                                                                COUNT(ise.COUNTROLL) AS ROLL,
                                                                                                                SUM(ise.QTY_KG) AS QTY_SJ_KG,
                                                                                                                SUM(ise.QTY_YARDMETER) AS QTY_SJ_YARD,
                                                                                                                inpe.PROJECT,
                                                                                                                ise.ADDRESSEE,
                                                                                                                ise.BRAND_NM
                                                                                                            FROM
                                                                                                                ITXVIEW_SURATJALAN_EXIM2 ise 
                                                                                                            LEFT JOIN ITXVIEW_NO_PROJECTS_EXIM inpe ON inpe.PROVISIONALCODE = ise.PROVISIONALCODE 
                                                                                                            WHERE 
                                                                                                                ise.PROVISIONALCODE = '$rowdb2[PROVISIONALCODE]'
                                                                                                            GROUP BY 
                                                                                                                inpe.PROJECT,ise.ADDRESSEE,ise.BRAND_NM");
                                                                            $d_roll     = db2_fetch_assoc($q_roll);
                                                                            if($d_ket_foc['ROLL'] > 0 AND $d_ket_foc['KG'] > 0 AND $d_ket_foc['YARD_MTR'] > 0) { // MENGHITUNG JIKA FOC SEBAGIAN, MAKA ROLL UNTUK FOC DIPISAH DARI KESELURUHAN
                                                                                echo $d_roll['ROLL'] - $d_ket_foc['ROLL'];
                                                                            }else{
                                                                                echo $d_roll['ROLL'];
                                                                            }
                                                                        }else{
                                                                            $q_roll     = db2_exec($conn1, "SELECT COUNT(CODE) AS ROLL,
                                                                                                                    SUM(BASEPRIMARYQUANTITY) AS QTY_SJ_KG,
                                                                                                                    SUM(BASESECONDARYQUANTITY) AS QTY_SJ_YARD
                                                                                                            FROM 
                                                                                                                ITXVIEWALLOCATION0 
                                                                                                            WHERE 
                                                                                                                CODE = '$rowdb2[CODE]'");
                                                                            $d_roll     = db2_fetch_assoc($q_roll);
                                                                            echo $d_roll['ROLL'];
                                                                        }
                                                                    ?>
                                                                </td> 
                                                                <td><?= number_format($d_roll['QTY_SJ_KG'], 2); ?></td> 
                                                                <td>
                                                                    <?php 
                                                                        if($rowdb2['PRICEUNITOFMEASURECODE'] == 'm'){
                                                                            echo round(number_format($d_roll['QTY_SJ_YARD'], 2) * 0.9144, 2);
                                                                        }else{
                                                                            echo number_format($d_roll['QTY_SJ_YARD'], 2);
                                                                        }
                                                                    ?>
                                                                </td> 
                                                                <td><?= $rowdb2['ORDERPARTNERBRANDCODE']; ?></td> 
                                                                <td>
                                                                    <?php
                                                                        $q_pelanggan    = db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$rowdb2[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                                                                            AND CODE = '$rowdb2[DLVSALORDERLINESALESORDERCODE]'");
                                                                        $r_pelanggan    = db2_fetch_assoc($q_pelanggan);
                                                                        if($rowdb2['CODE'] == 'EXPORT'){
                                                                            echo $d_roll['ADDRESSEE'].' - '.$d_roll['BRAND_NM'];
                                                                        }else{
                                                                            echo $r_pelanggan['LANGGANAN'];

                                                                        }
                                                                    ?>
                                                                </td> 
                                                                <td>`<?= $rowdb2['PO_NUMBER']; ?></td> 
                                                                <td>
                                                                    <?php
                                                                        if($rowdb2['CODE'] == 'EXPORT'){
                                                                            echo $d_roll['PROJECT'];
                                                                        }else{
                                                                            echo $rowdb2['DLVSALORDERLINESALESORDERCODE'];
                                                                        }
                                                                    ?>
                                                                </td> 
                                                                <td><?= $rowdb2['ITEMDESCRIPTION']; ?></td> 
                                                                <td>`<?= $rowdb2['LOTCODE']; ?></td> 
                                                                <td>
                                                                    <?php
                                                                        $q_demand   = db2_exec($conn1, "SELECT 
                                                                                                            PRODUCTIONDEMANDCODE
                                                                                                        FROM 
                                                                                                            ITXVIEW_DEMANDBYLOTCODE 
                                                                                                        WHERE 
                                                                                                            PRODUCTIONORDERCODE = '$rowdb2[LOTCODE]'
                                                                                                            AND DLVSALESORDERLINEORDERLINE = '$rowdb2[DLVSALESORDERLINEORDERLINE]'");
                                                                        $d_demand   = db2_fetch_assoc($q_demand);
                                                                    ?>
                                                                    <?= $d_demand['PRODUCTIONDEMANDCODE']; ?>
                                                                </td> 
                                                                <td><?php if($rowdb2['PAYMENTMETHODCODE'] == 'FOC'){ echo $rowdb2['PAYMENTMETHODCODE']; } ?></td> 
                                                                <td><?= $rowdb2['ITEMTYPEAFICODE']; ?></td> 
                                                            </tr>
                                                        <?php endif; ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <script type="text/javascript" src="files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <script type="text/javascript" src="files\bower_components\modernizr\js\modernizr.js"></script>
    <script type="text/javascript" src="files\bower_components\modernizr\js\css-scrollbars.js"></script>
    <script src="files\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
    <script src="files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
    <script src="files\assets\pages\data-table\js\jszip.min.js"></script>
    <script src="files\assets\pages\data-table\js\pdfmake.min.js"></script>
    <script src="files\assets\pages\data-table\js\vfs_fonts.js"></script>
    <script src="files\assets\pages\data-table\extensions\buttons\js\dataTables.buttons.min.js"></script>
    <script src="files\assets\pages\data-table\extensions\buttons\js\buttons.flash.min.js"></script>
    <script src="files\assets\pages\data-table\extensions\buttons\js\jszip.min.js"></script>
    <script src="files\assets\pages\data-table\extensions\buttons\js\vfs_fonts.js"></script>
    <script src="files\assets\pages\data-table\extensions\buttons\js\buttons.colVis.min.js"></script>
    <script src="files\bower_components\datatables.net-buttons\js\buttons.print.min.js"></script>
    <script src="files\bower_components\datatables.net-buttons\js\buttons.html5.min.js"></script>
    <script src="files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
    <script src="files\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
    <script src="files\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>
    <script type="text/javascript" src="files\bower_components\i18next\js\i18next.min.js"></script>
    <script type="text/javascript" src="files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
    <script src="files\assets\pages\data-table\extensions\buttons\js\extension-btns-custom.js"></script>
    <script src="files\assets\js\pcoded.min.js"></script>
    <script src="files\assets\js\menu\menu-hori-fixed.js"></script>
    <script src="files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="files\assets\js\script.js"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script>
        $('#excel-LA').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',
                customize: function(xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    $('row c[r^="F"]', sheet).each(function() {
                        if ($('is t', this).text().replace(/[^\d]/g, '') * 1 >= 500000) {
                            $(this).attr('s', '20');
                        }
                    });
                }
            }]
        });
    </script>
<?php require_once 'footer.php'; ?>