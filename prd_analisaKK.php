<?php 
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php";
    mysqli_query($con_nowprd, "DELETE FROM itxview_detail_qa_data WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY AND STATUS = 'Analisa KK'");
    mysqli_query($con_nowprd, "DELETE FROM itxview_detail_qa_data WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]' AND STATUS = 'Analisa KK'"); 
    mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_ins3 WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY AND STATUS = 'Analisa KK'");
    mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_ins3 WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]' AND STATUS = 'Analisa KK'"); 
    mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_cnp1 WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY AND STATUS = 'Analisa KK'");
    mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_cnp1 WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]' AND STATUS = 'Analisa KK'"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRD - Analisa Kartu Kerja</title>
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
    <script src="TabCounter.js"></script>
</head>
<style>
    #box {
    height: 170px;
    width: 270px;
    background: #000;
    font-size: 48px;
    color: #FFF;
    text-align: center;
    }
</style>
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
                                        <h5>Filter Data</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-6 col-xl-6 m-b-30">
                                                    <h4 class="sub-title">Production Order:</h4>
                                                    <input type="text" name="prod_order" class="form-control" value="<?php if(isset($_POST['submit'])){ echo $_POST['prod_order']; }elseif(isset($_GET['prod_order'])){ echo $_GET['prod_order']; } ?>">
                                                </div>
                                                <div class="col-sm-6 col-xl-6 m-b-30">
                                                    <h4 class="sub-title">Production Demand:</h4>
                                                    <input type="text" name="demand" placeholder="Wajib di isi" class="form-control" required value="<?php if(isset($_POST['submit'])){ echo $_POST['demand']; }elseif(isset($_GET['demand'])){ echo $_GET['demand']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary">Cari data</button>
                                                    <?php if (isset($_POST['submit'])) : ?>
                                                        <a class="btn btn-mat btn-success" target="_blank" href="prd_detail_demand_step_cetak.php?prod_order=<?= $_POST['prod_order']; ?>&demand=<?= $_POST['demand']; ?>">CETAK</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST['submit'])) : ?>
                                    <div class="card">
                                        <div class="card-block">
                                            <div>
                                                <center><h4>ANALISA PROBLEM SOLVING</h4></center>
                                                <center>
                                                <table width="100%" border="0">
                                                    <?php
                                                        require_once "koneksi.php";
                                                        $q_ITXVIEWKK    = db2_exec($conn1, "SELECT * FROM ITXVIEWKK WHERE PRODUCTIONDEMANDCODE = '$_POST[demand]'");
                                                        $d_ITXVIEWKK    = db2_fetch_assoc($q_ITXVIEWKK);

                                                        $sql_pelanggan_buyer 	= db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$d_ITXVIEWKK[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                                                                        AND CODE = '$d_ITXVIEWKK[PROJECTCODE]'");
                                                        $dt_pelanggan_buyer		= db2_fetch_assoc($sql_pelanggan_buyer);

                                                        // itxview_detail_qa_data
                                                        $itxview_detail_qa_data     = db2_exec($conn1, "SELECT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                        WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                        AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                        ORDER BY LINE ASC");
                                                        while ($row_itxview_detail_qa_data     = db2_fetch_assoc($itxview_detail_qa_data)) {
                                                            $r_itxview_detail_qa_data[]        = "('".TRIM(addslashes($row_itxview_detail_qa_data['PRODUCTIONDEMANDCODE']))."',"
                                                                                                ."'".TRIM(addslashes($row_itxview_detail_qa_data['PRODUCTIONORDERCODE']))."',"
                                                                                                ."'".TRIM(addslashes($row_itxview_detail_qa_data['WORKCENTERCODE']))."',"
                                                                                                ."'".TRIM(addslashes($row_itxview_detail_qa_data['OPERATIONCODE']))."',"
                                                                                                ."'".TRIM(addslashes($row_itxview_detail_qa_data['LINE']))."',"
                                                                                                ."'".TRIM(addslashes($row_itxview_detail_qa_data['QUALITYDOCUMENTHEADERNUMBERID']))."',"
                                                                                                ."'".TRIM(addslashes($row_itxview_detail_qa_data['CHARACTERISTICCODE']))."',"
                                                                                                ."'".TRIM(addslashes($row_itxview_detail_qa_data['LONGDESCRIPTION']))."',"
                                                                                                ."'".TRIM(addslashes($row_itxview_detail_qa_data['VALUEQUANTITY']))."',"
                                                                                                ."'".$_SERVER['REMOTE_ADDR']."',"
                                                                                                ."'".date('Y-m-d H:i:s')."',"
                                                                                                ."'".'Analisa KK'."')";
                                                        }
                                                        $value_itxview_detail_qa_data        = implode(',', $r_itxview_detail_qa_data);
                                                        $insert_itxview_detail_qa_data       = mysqli_query($con_nowprd, "INSERT INTO itxview_detail_qa_data(PRODUCTIONDEMANDCODE,PRODUCTIONORDERCODE,WORKCENTERCODE,OPERATIONCODE,LINE,QUALITYDOCUMENTHEADERNUMBERID,CHARACTERISTICCODE,LONGDESCRIPTION,VALUEQUANTITY,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_itxview_detail_qa_data");
                                                    ?>
                                                    <thead>
                                                        <tr>
                                                            <th>Prod. Order</th>
                                                            <th>:</th>
                                                            <th><?= $d_ITXVIEWKK['PRODUCTIONORDERCODE']; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Prod. Demand</th>
                                                            <th>:</th>
                                                            <th><?= $d_ITXVIEWKK['PRODUCTIONDEMANDCODE']; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Item Codee</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top;">
                                                                <?= TRIM($d_ITXVIEWKK['SUBCODE02']).'-'.TRIM($d_ITXVIEWKK['SUBCODE03']); ?>
                                                                <?= substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 0,200); ?><?php if(substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 0,200)){ echo "<br>"; } ?>
                                                                <?= substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 201); ?><?php if(substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 201)){ echo "<br>"; } ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Lebar x Gramasi Greige</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th>
                                                                <?php
                                                                    $q_lg_element   = db2_exec($conn1, "SELECT DISTINCT
                                                                                                            s2.TRANSACTIONDATE,
                                                                                                            s2.LOTCODE,
                                                                                                            s.PROJECTCODE,
                                                                                                            floor(e.WIDTHNET) AS LEBAR, -- Untuk laporan mr. james
                                                                                                            floor(a.VALUEDECIMAL) AS GRAMASI -- Untuk laporan mr. james
                                                                                                        FROM  
                                                                                                            STOCKTRANSACTION s 
                                                                                                        LEFT JOIN STOCKTRANSACTION s2 ON s2.ITEMELEMENTCODE = s.ITEMELEMENTCODE AND s2.TEMPLATECODE = '204'
                                                                                                        LEFT JOIN ELEMENTSINSPECTION e ON e.DEMANDCODE = s2.LOTCODE AND e.ELEMENTCODE = s2.ITEMELEMENTCODE -- Untuk laporan mr. james
                                                                                                        LEFT JOIN ADSTORAGE a ON a.UNIQUEID = e.ABSUNIQUEID AND a.FIELDNAME = 'GSM' -- Untuk laporan mr. james
                                                                                                        WHERE
                                                                                                            s.TEMPLATECODE = '120' 
                                                                                                            AND 
                                                                                                            s.ORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' -- PRODUCTION ORDER 
                                                                                                            AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '0'");
                                                                    $cek_lg_element = db2_fetch_assoc($q_lg_element);
                                                                ?>
                                                                <?php if($cek_lg_element) : ?>
                                                                    *From Element
                                                                    <table width="100%" style="border:1px solid black;border-collapse:collapse;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">Tanggal Terima Kain</th>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">LOTCODE</th>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">PROJECTCODE</th>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">LEBAR x GRAMASI</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php while ($d_lg_element = db2_fetch_assoc($q_lg_element)) { ?>
                                                                            <tr>
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['TRANSACTIONDATE']; ?></td>
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['LOTCODE']; ?></td>
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['PROJECTCODE']; ?></td>
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['LEBAR'].' x '.$d_lg_element['GRAMASI']; ?></td>
                                                                            </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                <?php endif; ?>
                                                                <?php
                                                                    $q_lg_element_cut   = db2_exec($conn1, "SELECT DISTINCT
                                                                                                                s4.TRANSACTIONDATE,
                                                                                                                s4.LOTCODE,
                                                                                                                s.PROJECTCODE,
                                                                                                                floor(e.WIDTHNET) AS LEBAR, -- Untuk laporan mr. james
                                                                                                                floor(a.VALUEDECIMAL) AS GRAMASI -- Untuk laporan mr. james
                                                                                                            FROM 
                                                                                                                STOCKTRANSACTION s
                                                                                                            LEFT JOIN STOCKTRANSACTION s2 ON s2.ITEMELEMENTCODE = s.ITEMELEMENTCODE AND s2.TEMPLATECODE  = '342'
                                                                                                            LEFT JOIN STOCKTRANSACTION s3 ON s3.TRANSACTIONNUMBER = s2.CUTORGTRTRANSACTIONNUMBER 
                                                                                                            LEFT JOIN STOCKTRANSACTION s4 ON s4.ITEMELEMENTCODE = s3.ITEMELEMENTCODE AND s4.TEMPLATECODE = '204'
                                                                                                            LEFT JOIN ELEMENTSINSPECTION e ON e.DEMANDCODE = s4.LOTCODE AND e.ELEMENTCODE = s4.ITEMELEMENTCODE -- Untuk laporan mr. james
                                                                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = e.ABSUNIQUEID AND a.FIELDNAME = 'GSM' -- Untuk laporan mr. james
                                                                                                            WHERE
                                                                                                                s.TEMPLATECODE = '120' 
                                                                                                                AND s.ORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' -- PRODUCTION NUMBER
                                                                                                                AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '8'");
                                                                    $cek_lg_element_cut = db2_fetch_assoc($q_lg_element_cut);
                                                                ?>
                                                                <?php if($cek_lg_element_cut) : ?>
                                                                    *From Cutting Element
                                                                    <table width="100%" style="border:1px solid black;border-collapse:collapse;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">Tanggal Terima Kain</th>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">LOTCODE</th>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">PROJECTCODE</th>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">LEBAR x GRAMASI</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                                while ($d_lg_element_cut = db2_fetch_assoc($q_lg_element_cut)) {
                                                                            ?>
                                                                            <tr>
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['TRANSACTIONDATE']; ?></td>
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['LOTCODE']; ?></td>
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['PROJECTCODE']; ?></td>
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['LEBAR'].' x '.$d_lg_element_cut['GRAMASI']; ?></td>
                                                                            </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                <?php endif; ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Benang</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top;">
                                                                <?php
                                                                    $q_benang   = db2_exec($conn1, "SELECT DISTINCT
                                                                                                            TRIM(p2.LONGDESCRIPTION) AS BENANG
                                                                                                        FROM  
                                                                                                            STOCKTRANSACTION s 
                                                                                                        LEFT JOIN STOCKTRANSACTION s2 ON s2.ITEMELEMENTCODE = s.ITEMELEMENTCODE AND s2.TEMPLATECODE = '204'
                                                                                                        LEFT JOIN PRODUCTIONRESERVATION p ON p.ORDERCODE = s2.LOTCODE 
                                                                                                        LEFT JOIN PRODUCT p2 ON p2.ITEMTYPECODE = p.ITEMTYPEAFICODE AND NOT p2.ITEMTYPECODE = 'DYC' AND NOT p2.ITEMTYPECODE = 'WTR' AND 
                                                                                                        --							NOT p2.ITEMTYPECODE = 'KFF' AND
                                                                                                                                    p2.SUBCODE01 = p.SUBCODE01 AND 
                                                                                                                                    p2.SUBCODE02 = p.SUBCODE02 AND
                                                                                                                                    p2.SUBCODE03 = p.SUBCODE03 AND 
                                                                                                                                    p2.SUBCODE04 = p.SUBCODE04 AND
                                                                                                                                    p2.SUBCODE05 = p.SUBCODE05 AND 
                                                                                                                                    p2.SUBCODE06 = p.SUBCODE06 AND
                                                                                                                                    p2.SUBCODE07 = p.SUBCODE07 
                                                                                                        WHERE
                                                                                                            s.TEMPLATECODE = '120' 
                                                                                                            AND 
                                                                                                            s.ORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' -- PRODUCTION ORDER 
                                                                                                            AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '0'");
                                                                    $no = 1;
                                                                    while ($d_benang = db2_fetch_assoc($q_benang)) {
                                                                ?>
                                                                <?= $no++; ?>.<?= $d_benang['BENANG']; ?><br>
                                                                <?php } ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Alur Normal</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top;">
                                                                <?php
                                                                    $q_routing  = db2_exec($conn1, "SELECT
                                                                                                        TRIM(r.OPERATIONCODE) AS OPERATIONCODE,
                                                                                                        TRIM(r.LONGDESCRIPTION) AS DESCRIPTION 
                                                                                                    FROM
                                                                                                        PRODUCTIONDEMAND p
                                                                                                    LEFT JOIN ROUTINGSTEP r ON r.ROUTINGNUMBERID = p.ROUTINGNUMBERID 
                                                                                                    WHERE 
                                                                                                        p.CODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]'");
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-xl-1 m-b-30">
                                                                        <?php while ($d_routing = db2_fetch_assoc($q_routing)) { ?>
                                                                        <span style="background-color: #70E3A1;"><?= $d_routing['OPERATIONCODE']; ?></span>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Alur Aktual</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                <table width="100%" border="1">
                                                    <?php 
                                                        ini_set("error_reporting", 1);
                                                        session_start();
                                                        require_once "koneksi.php";

                                                        // itxview_posisikk_tgl_in_prodorder_ins3
                                                        $posisikk_ins3 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_INS3 WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'");
                                                        while ($row_posisikk_ins3   = db2_fetch_assoc($posisikk_ins3)) {
                                                            $r_posisikk_ins3[]      = "('".TRIM(addslashes($row_posisikk_ins3['PRODUCTIONORDERCODE']))."',"
                                                                                    ."'".TRIM(addslashes($row_posisikk_ins3['OPERATIONCODE']))."',"
                                                                                    ."'".TRIM(addslashes($row_posisikk_ins3['PROPROGRESSPROGRESSNUMBER']))."',"
                                                                                    ."'".TRIM(addslashes($row_posisikk_ins3['DEMANDSTEPSTEPNUMBER']))."',"
                                                                                    ."'".TRIM(addslashes($row_posisikk_ins3['PROGRESSTEMPLATECODE']))."',"
                                                                                    ."'".TRIM(addslashes($row_posisikk_ins3['MULAI']))."',"
                                                                                    ."'".$_SERVER['REMOTE_ADDR']."',"
                                                                                    ."'".date('Y-m-d H:i:s')."',"
                                                                                    ."'".'Analisa KK'."')";
                                                        }
                                                        if($r_posisikk_ins3){
                                                            $value_posisikk_ins3        = implode(',', $r_posisikk_ins3);
                                                            $insert_posisikk_ins3       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_ins3(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_posisikk_ins3");
                                                        }
                                                        
                                                        // itxview_posisikk_tgl_in_prodorder_cnp1
                                                        $posisikk_cnp1 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_CNP1 WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'");
                                                        while ($row_posisikk_cnp1   = db2_fetch_assoc($posisikk_cnp1)) {
                                                            $r_posisikk_cnp1[]      = "('".TRIM(addslashes($row_posisikk_cnp1['PRODUCTIONORDERCODE']))."',"
                                                                                    ."'".TRIM(addslashes($row_posisikk_cnp1['OPERATIONCODE']))."',"
                                                                                    ."'".TRIM(addslashes($row_posisikk_cnp1['PROPROGRESSPROGRESSNUMBER']))."',"
                                                                                    ."'".TRIM(addslashes($row_posisikk_cnp1['DEMANDSTEPSTEPNUMBER']))."',"
                                                                                    ."'".TRIM(addslashes($row_posisikk_cnp1['PROGRESSTEMPLATECODE']))."',"
                                                                                    ."'".TRIM(addslashes($row_posisikk_cnp1['MULAI']))."',"
                                                                                    ."'".$_SERVER['REMOTE_ADDR']."',"
                                                                                    ."'".date('Y-m-d H:i:s')."',"
                                                                                    ."'".'Analisa KK'."')";
                                                        }
                                                        if($r_posisikk_cnp1){
                                                            $value_posisikk_cnp1        = implode(',', $r_posisikk_cnp1);
                                                            $insert_posisikk_cnp1       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_cnp1(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_posisikk_cnp1");
                                                        }
                                                    ?>
                                                    <thead>
                                                            <?php
                                                                $sqlDB2 = "SELECT
                                                                                p.WORKCENTERCODE,
                                                                                TRIM(p.OPERATIONCODE) AS OPERATIONCODE,
                                                                                o.LONGDESCRIPTION,
                                                                                iptip.MULAI,
                                                                                iptop.SELESAI,
                                                                                p.PRODUCTIONORDERCODE,
                                                                                p.PRODUCTIONDEMANDCODE,
                                                                                p.GROUPSTEPNUMBER AS STEPNUMBER,
                                                                                CASE
                                                                                    WHEN iptip.MACHINECODE = iptop.MACHINECODE THEN iptip.MACHINECODE
                                                                                    ELSE iptip.MACHINECODE || '-' ||iptop.MACHINECODE
                                                                                END AS MESIN   
                                                                            FROM 
                                                                                PRODUCTIONDEMANDSTEP p 
                                                                            LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                                            LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                            LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                            WHERE
                                                                                p.PRODUCTIONORDERCODE  = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' AND p.PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                            ORDER BY iptip.MULAI ASC";
                                                                $stmt = db2_exec($conn1, $sqlDB2);
                                                                $stmt2 = db2_exec($conn1, $sqlDB2);
                                                                $stmt3 = db2_exec($conn1, $sqlDB2);
                                                            ?>
                                                            <tr>
                                                                <?php while ($rowdb2 = db2_fetch_assoc($stmt)) { ?>
                                                                    <?php
                                                                        $q_QA_DATA  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                    WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                    AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                                    AND WORKCENTERCODE = '$rowdb2[WORKCENTERCODE]' 
                                                                                                                    AND OPERATIONCODE = '$rowdb2[OPERATIONCODE]' 
                                                                                                                    AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                    AND STATUS = 'Analisa KK'
                                                                                                                    ORDER BY LINE ASC");
                                                                        $cek_QA_DATA    = mysqli_fetch_assoc($q_QA_DATA);
                                                                    ?>
                                                                    <?php if($cek_QA_DATA) : ?>
                                                                        <th style="text-align: center;"><?= $rowdb2['OPERATIONCODE']; ?></th>
                                                                    <?php endif; ?>
                                                                <?php } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php while ($rowdb3 = db2_fetch_assoc($stmt2)) { ?>
                                                                    <?php
                                                                        $q_QA_DATA2  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                    WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                    AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                                    AND WORKCENTERCODE = '$rowdb3[WORKCENTERCODE]' 
                                                                                                                    AND OPERATIONCODE = '$rowdb3[OPERATIONCODE]' 
                                                                                                                    AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                    AND STATUS = 'Analisa KK'
                                                                                                                    ORDER BY LINE ASC");
                                                                        $cek_QA_DATA2    = mysqli_fetch_assoc($q_QA_DATA2);
                                                                    ?>
                                                                    <?php if($cek_QA_DATA2) : ?>
                                                                        <th style="text-align: center;"><?= $rowdb3['MESIN']; ?></th>
                                                                    <?php endif; ?>
                                                                <?php } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php while ($rowdb4 = db2_fetch_assoc($stmt3)) { ?>
                                                                    <?php
                                                                        $sqlQAData      = "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                            WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                            AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                            AND WORKCENTERCODE = '$rowdb4[WORKCENTERCODE]' 
                                                                                            AND OPERATIONCODE = '$rowdb4[OPERATIONCODE]' 
                                                                                            AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                            AND STATUS = 'Analisa KK'
                                                                                            ORDER BY LINE ASC";
                                                                        $q_QA_DATAcek   = mysqli_query($con_nowprd, $sqlQAData);
                                                                        $d_QA_DATAcek   = mysqli_fetch_assoc($q_QA_DATAcek);
                                                                    ?>
                                                                    <?php if($d_QA_DATAcek) : ?>
                                                                        <td style="text-align: left; font-size:11px;">
                                                                            <?php $q_QA_DATA3     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                            <?php while ($d_QA_DATA3 = mysqli_fetch_array($q_QA_DATA3)) : ?>
                                                                                <?= $d_QA_DATA3['LINE'].' : '.$d_QA_DATA3['CHARACTERISTICCODE'].' = '.$d_QA_DATA3['VALUEQUANTITY'].'<br>'; ?> 
                                                                            <?php endwhile; ?>
                                                                        </td>
                                                                    <?php endif; ?>
                                                                <?php } ?>
                                                            </tr>
                                                    </thead>
                                                </table>
                                                </center>
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
<?php require_once 'footer.php'; ?>