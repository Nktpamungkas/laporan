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

    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css" href="files\bower_components\bootstrap-multiselect\css\bootstrap-multiselect.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\multiselect\css\multi-select.css">
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
    .btn-link {
        border: none;
        outline: none;
        background: none;
        cursor: pointer;
        color: #0000EE;
        padding: 0;
        text-decoration: underline;
    }
    /* Mengatur lebar elemen <select> dengan multiple */
    select[multiple] {
      width: 200px; /* Atur lebar sesuai kebutuhan */
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
                                        <h5>Masukan data demand di sini untuk membandingkan</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-6 col-xl-6 m-b-30">
                                                    <h4 class="sub-title">Production Demand 1:</h4>
                                                    <input type="text" name="demand" id="demand" style="text-align: center;" onchange="window.location='prd_analisaKK.php?demand='+this.value" placeholder="Masukan demand di sini" class="form-control" required value="<?php if (isset($_POST['submit'])) {
                                                                                                                                    echo $_POST['demand'];
                                                                                                                                } elseif (isset($_GET['demand'])) {
                                                                                                                                    echo $_GET['demand'];
                                                                                                                                } ?>">
                                                    <hr>
                                                    <button type="button" class="btn btn-sm btn-primary waves-effect waves-light m-b-10" id='select-all'>select all</button>
                                                    <button type="button" class="btn btn-sm btn-primary waves-effect waves-light m-b-10" id='deselect-all'>deselect all</button>
                                                    <select id='public-methods' multiple='multiple' name="operation[]">
                                                        <?php 
                                                            $query_ITXVIEWKK     = db2_exec($conn1, "SELECT TRIM(PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE, TRIM(PRODUCTIONDEMANDCODE) AS PRODUCTIONDEMANDCODE FROM ITXVIEWKK WHERE PRODUCTIONDEMANDCODE = '$_GET[demand]'");
                                                            $data_ITXVIEWKK      = db2_fetch_assoc($query_ITXVIEWKK);

                                                            $q_operation    = db2_exec($conn1, "SELECT
                                                                                                    DISTINCT 
                                                                                                    TRIM(OPERATIONCODE) AS OPERATIONCODE,
                                                                                                    DESKRIPSI_OPERATION
                                                                                                FROM
                                                                                                    ITXVIEW_DETAIL_QA_DATA
                                                                                                WHERE
                                                                                                    PRODUCTIONORDERCODE = '$data_ITXVIEWKK[PRODUCTIONORDERCODE]'
                                                                                                    AND PRODUCTIONDEMANDCODE = '$data_ITXVIEWKK[PRODUCTIONDEMANDCODE]'
                                                                                                ORDER BY
                                                                                                    OPERATIONCODE ASC");
                                                        ?>
                                                        <?php while($row_operation = db2_fetch_assoc($q_operation)) : ?>
                                                            <option value="<?= $row_operation['OPERATIONCODE']; ?>">
                                                                <?= $row_operation['DESKRIPSI_OPERATION']; ?> - <?= $row_operation['OPERATIONCODE']; ?>
                                                            </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 col-xl-6 m-b-30">
                                                    <h4 class="sub-title">Production Demand 2:</h4>
                                                    <input type="text" name="demand2" style="text-align: center;" onchange="window.location='prd_analisaKK.php?demand='+document.getElementById('demand').value+'&demand2='+this.value" placeholder="Masukan demand di sini" class="form-control" value="<?php if (isset($_POST['submit'])) {
                                                                                                                                                    echo $_POST['demand2'];
                                                                                                                                                } elseif (isset($_GET['demand2'])) {
                                                                                                                                                    echo $_GET['demand2'];
                                                                                                                                                } ?>">
                                                    <hr>
                                                    <button type="button" class="btn btn-sm btn-primary waves-effect waves-light m-b-10" id='select-all2'>select all</button>
                                                    <button type="button" class="btn btn-sm btn-primary waves-effect waves-light m-b-10" id='deselect-all2'>deselect all</button>
                                                    <select id='public-methods2' multiple='multiple' name="operation2[]">
                                                        <?php 
                                                            $query_ITXVIEWKK2     = db2_exec($conn1, "SELECT TRIM(PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE, TRIM(PRODUCTIONDEMANDCODE) AS PRODUCTIONDEMANDCODE FROM ITXVIEWKK WHERE PRODUCTIONDEMANDCODE = '$_GET[demand2]'");
                                                            $data_ITXVIEWKK2      = db2_fetch_assoc($query_ITXVIEWKK2);

                                                            $q_operation2    = db2_exec($conn1, "SELECT
                                                                                                    DISTINCT 
                                                                                                    TRIM(OPERATIONCODE) AS OPERATIONCODE,
                                                                                                    DESKRIPSI_OPERATION
                                                                                                FROM
                                                                                                    ITXVIEW_DETAIL_QA_DATA
                                                                                                WHERE
                                                                                                    PRODUCTIONORDERCODE = '$data_ITXVIEWKK2[PRODUCTIONORDERCODE]'
                                                                                                    AND PRODUCTIONDEMANDCODE = '$data_ITXVIEWKK2[PRODUCTIONDEMANDCODE]'
                                                                                                ORDER BY
                                                                                                    OPERATIONCODE ASC");
                                                        ?>
                                                        <?php while($row_operation2 = db2_fetch_assoc($q_operation2)) : ?>
                                                            <option value='<?= $row_operation2['OPERATIONCODE']; ?>'>
                                                                <?= $row_operation2['DESKRIPSI_OPERATION']; ?> - <?= $row_operation2['OPERATIONCODE']; ?>
                                                            </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary"><i class="icofont icofont-search-alt-1"></i> Bandingkan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($_POST['submit'])) : ?>
                            <div class="card">
                                <div class="card-block">
                                    <center>
                                        <h4><strong>ANALISA PROBLEM SOLVING</strong></h4>
                                    </center>
                                    <div class="row">
                                        <?php if ($_POST['demand2']) : ?>
                                            <div class="col-sm-6">
                                        <?php else : ?>
                                            <div class="col-sm-12">
                                        <?php endif; ?>
                                            <?php
                                                require_once "koneksi.php";

                                                if($_GET['demand']){
                                                    $demand     = $_GET['demand'];
                                                }else{
                                                    $demand     = $_POST['demand'];
                                                }

                                                $q_ITXVIEWKK    = db2_exec($conn1, "SELECT * FROM ITXVIEWKK WHERE PRODUCTIONDEMANDCODE = '$demand'");
                                                $d_ITXVIEWKK    = db2_fetch_assoc($q_ITXVIEWKK);

                                                if($_GET['prod_order']){
                                                    $prod_order     = $_GET['prod_order'];
                                                }elseif($_POST['prod_order']) {
                                                    $prod_order     = $_POST['prod_order'];
                                                }else{
                                                    $prod_order     = $d_ITXVIEWKK['PRODUCTIONORDERCODE'];
                                                }

                                                $sql_pelanggan_buyer     = db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$d_ITXVIEWKK[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                                                                AND CODE = '$d_ITXVIEWKK[PROJECTCODE]'");
                                                $dt_pelanggan_buyer        = db2_fetch_assoc($sql_pelanggan_buyer);

                                                // itxview_detail_qa_data
                                                $itxview_detail_qa_data     = db2_exec($conn1, "SELECT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]'
                                                                                                AND OPERATIONCODE IN ('" . implode("','", $_POST['operation']) . "') 
                                                                                                ORDER BY LINE ASC");
                                                while ($row_itxview_detail_qa_data     = db2_fetch_assoc($itxview_detail_qa_data)) {
                                                    $r_itxview_detail_qa_data[]        = "('" . TRIM(addslashes($row_itxview_detail_qa_data['PRODUCTIONDEMANDCODE'])) . "',"
                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['PRODUCTIONORDERCODE'])) . "',"
                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['WORKCENTERCODE'])) . "',"
                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['OPERATIONCODE'])) . "',"
                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['LINE'])) . "',"
                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['QUALITYDOCUMENTHEADERNUMBERID'])) . "',"
                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['CHARACTERISTICCODE'])) . "',"
                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['LONGDESCRIPTION'])) . "',"
                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['VALUEQUANTITY'])) . "',"
                                                                                        . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                                        . "'" . date('Y-m-d H:i:s') . "',"
                                                                                        . "'" . 'Analisa KK' . "')";
                                                }
                                                if(!empty($r_itxview_detail_qa_data)){
                                                    $value_itxview_detail_qa_data        = implode(',', $r_itxview_detail_qa_data);
                                                    $insert_itxview_detail_qa_data       = mysqli_query($con_nowprd, "INSERT INTO itxview_detail_qa_data(PRODUCTIONDEMANDCODE,PRODUCTIONORDERCODE,WORKCENTERCODE,OPERATIONCODE,LINE,QUALITYDOCUMENTHEADERNUMBERID,CHARACTERISTICCODE,LONGDESCRIPTION,VALUEQUANTITY,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_itxview_detail_qa_data");
                                                }
                                            ?>
                                            <table width="100%" style="border: 1px solid black; border-collapse: collapse;">
                                                <thead>
                                                    <tr>
                                                        <th>Prod. Order</th>
                                                        <th>:</th>
                                                        <th><?= $d_ITXVIEWKK['PRODUCTIONORDERCODE']; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Prod. Demand</th>
                                                        <th>:</th>
                                                        <th><?= $demand; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>LOT Internal</th>
                                                        <th>:</th>
                                                        <th><?= $d_ITXVIEWKK['LOT']; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Original PD Code</th>
                                                        <th>:</th>
                                                        <th><?= substr($d_ITXVIEWKK['ORIGINALPDCODE'], 4, 8); ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th style="vertical-align: text-top;">Item Code</th>
                                                        <th style="vertical-align: text-top;">:</th>
                                                        <th style="vertical-align: text-top; white-space: wrap;">
                                                            <?= TRIM($d_ITXVIEWKK['SUBCODE02']) . '-' . TRIM($d_ITXVIEWKK['SUBCODE03']); ?>
                                                            <?= substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 0, 200); ?><?php if (substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 0, 200)) {
                                                                                                                        echo "<br>";
                                                                                                                    } ?>
                                                            <?= substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 201); ?><?php if (substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 201)) {
                                                                                                                    echo "<br>";
                                                                                                                } ?>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th style="vertical-align: text-top;">Lebar x Gramasi Kain Jadi</th>
                                                        <th style="vertical-align: text-top;">:</th>
                                                        <th style="vertical-align: text-top;">
                                                            <?php 
                                                                $q_lebar = db2_exec($conn1, "SELECT * FROM ITXVIEWLEBAR WHERE SALESORDERCODE = '$d_ITXVIEWKK[BONORDER]' AND ORDERLINE = '$d_ITXVIEWKK[ORDERLINE]'");
                                                                $d_lebar = db2_fetch_assoc($q_lebar);
                                                            ?>
                                                            <?php 
                                                                $q_gramasi = db2_exec($conn1, "SELECT * FROM ITXVIEWGRAMASI WHERE SALESORDERCODE = '$d_ITXVIEWKK[BONORDER]' AND ORDERLINE = '$d_ITXVIEWKK[ORDERLINE]'");
                                                                $d_gramasi = db2_fetch_assoc($q_gramasi);
                                                            ?>
                                                            <?php 
                                                                if($d_gramasi['GRAMASI_KFF']){
                                                                    $gramasi = number_format($d_gramasi['GRAMASI_KFF'], 0);
                                                                }elseif($d_gramasi['GRAMASI_FKF']){
                                                                    $gramasi = number_format($d_gramasi['GRAMASI_FKF'], 0);
                                                                }else{
                                                                    $gramasi = '-';
                                                                }
                                                            ?>
                                                            <?= number_format($d_lebar['LEBAR'],0).' x '.$gramasi; ?>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th style="vertical-align: text-top;">Lebar x Gramasi Inspection</th>
                                                        <th style="vertical-align: text-top;">:</th>
                                                        <th style="vertical-align: text-top;">
                                                            <?php
                                                                $q_lg_INS3  = db2_exec($conn1, "SELECT
                                                                                                    e.ELEMENTCODE,
                                                                                                    e.WIDTHGROSS,
                                                                                                    a.VALUEDECIMAL 
                                                                                                FROM
                                                                                                    ELEMENTSINSPECTION e 
                                                                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = e.ABSUNIQUEID AND a.FIELDNAME = 'GSM'
                                                                                                WHERE
                                                                                                    e.ELEMENTCODE LIKE '$demand%'
                                                                                                ORDER BY 
                                                                                                    e.INSPECTIONSTARTDATETIME ASC LIMIT 1");
                                                                $d_lg_INS3  = db2_fetch_assoc($q_lg_INS3);

                                                                echo $d_lg_INS3['WIDTHGROSS'];
                                                                if($d_lg_INS3['VALUEDECIMAL']){
                                                                    echo ' x '.$d_lg_INS3['VALUEDECIMAL'];
                                                                }else{
                                                                    echo ' x ...' ;
                                                                }
                                                            ?>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th style="vertical-align: text-top;">Lebar x Gramasi Standart Greige</th>
                                                        <th style="vertical-align: text-top;">:</th>
                                                        <th style="vertical-align: text-top;">
                                                            <?php
                                                            $q_lg_standart  = db2_exec($conn1, "SELECT 
                                                                                                    a.VALUEDECIMAL AS LEBAR,
                                                                                                    a2.VALUEDECIMAL AS GRAMASI
                                                                                                FROM 
                                                                                                    PRODUCT p 
                                                                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'Width'
                                                                                                LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'GSM'
                                                                                                WHERE 
                                                                                                    SUBCODE01 = '$d_ITXVIEWKK[SUBCODE01]' 
                                                                                                    AND SUBCODE02 = '$d_ITXVIEWKK[SUBCODE02]' 
                                                                                                    AND SUBCODE03 = '$d_ITXVIEWKK[SUBCODE03]'
                                                                                                    AND SUBCODE04 = '$d_ITXVIEWKK[SUBCODE04]' 
                                                                                                    AND ITEMTYPECODE = 'KGF'");
                                                            $d_lg_standart  = db2_fetch_assoc($q_lg_standart);
                                                            echo number_format($d_lg_standart['LEBAR'], 0) . ' x ' . number_format($d_lg_standart['GRAMASI'], 0);
                                                            ?>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th style="vertical-align: text-top;">Gauge x Diameter Mesin (inch) </th>
                                                        <th style="vertical-align: text-top;">:</th>
                                                        <th style="vertical-align: text-top;">
                                                            <?php
                                                            $q_lg_standart  = db2_exec($conn1, "SELECT 
                                                                                                    a.VALUEDECIMAL AS LEBAR,
                                                                                                    a2.VALUEDECIMAL AS GRAMASI
                                                                                                FROM 
                                                                                                    PRODUCT p 
                                                                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'Gauge'
                                                                                                LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'Diameter'
                                                                                                WHERE 
                                                                                                    SUBCODE01 = '$d_ITXVIEWKK[SUBCODE01]' 
                                                                                                    AND SUBCODE02 = '$d_ITXVIEWKK[SUBCODE02]' 
                                                                                                    AND SUBCODE03 = '$d_ITXVIEWKK[SUBCODE03]'
                                                                                                    AND SUBCODE04 = '$d_ITXVIEWKK[SUBCODE04]' 
                                                                                                    AND ITEMTYPECODE = 'KGF'");
                                                            $d_lg_standart  = db2_fetch_assoc($q_lg_standart);
                                                            echo number_format($d_lg_standart['LEBAR'], 0) . ' x ' . number_format($d_lg_standart['GRAMASI'], 0);
                                                            ?>
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
                                                                                                        a2.VALUESTRING AS MESIN_KNT,
                                                                                                        s.PROJECTCODE,
                                                                                                        floor(e.WIDTHNET) AS LEBAR, -- Untuk laporan mr. james
                                                                                                        floor(a.VALUEDECIMAL) AS GRAMASI -- Untuk laporan mr. james
                                                                                                    FROM  
                                                                                                        STOCKTRANSACTION s 
                                                                                                    LEFT JOIN STOCKTRANSACTION s2 ON s2.ITEMELEMENTCODE = s.ITEMELEMENTCODE AND s2.TEMPLATECODE = '204'
                                                                                                    LEFT JOIN ELEMENTSINSPECTION e ON e.DEMANDCODE = s2.LOTCODE AND e.ELEMENTCODE = s2.ITEMELEMENTCODE -- Untuk laporan mr. james
                                                                                                    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = e.ABSUNIQUEID AND a.FIELDNAME = 'GSM' -- Untuk laporan mr. james
                                                                                                    LEFT JOIN PRODUCTIONDEMAND p ON p.CODE = s2.LOTCODE
                                                                                                    LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'MachineNoCode'
                                                                                                    WHERE
                                                                                                        s.TEMPLATECODE = '120' 
                                                                                                        AND 
                                                                                                        s.ORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' -- PRODUCTION ORDER 
                                                                                                        AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '0'");
                                                                $cek_lg_element = db2_fetch_assoc($q_lg_element);
                                                            ?>
                                                            <?php if ($cek_lg_element) : ?>
                                                                *From Element
                                                                <table width="30%" style="border:1px solid black;border-collapse:collapse;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">Tanggal Terima Kain</th>
                                                                            <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">LOTCODE</th>
                                                                            <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">MESIN KNT</th>
                                                                            <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">PROJECTCODE</th>
                                                                            <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">LEBAR x GRAMASI</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php while ($d_lg_element = db2_fetch_assoc($q_lg_element)) { ?>
                                                                            <tr>
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['TRANSACTIONDATE']; ?></td>
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['LOTCODE']; ?></td>
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['MESIN_KNT']; ?></td>
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['PROJECTCODE']; ?></td>
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['LEBAR'] . ' x ' . $d_lg_element['GRAMASI']; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            <?php endif; ?>

                                                            <?php
                                                                $q_lg_element_cut   = db2_exec($conn1, "SELECT DISTINCT
                                                                                                            s4.TRANSACTIONDATE,
                                                                                                            s4.LOTCODE,
                                                                                                            a2.VALUESTRING AS MESIN_KNT,
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
                                                                                                        LEFT JOIN PRODUCTIONDEMAND p ON p.CODE = s2.LOTCODE
                                                                                                        LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'MachineNoCode'
                                                                                                        WHERE
                                                                                                            s.TEMPLATECODE = '120' 
                                                                                                            AND s.ORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' -- PRODUCTION NUMBER
                                                                                                            AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '8'");
                                                                $cek_lg_element_cut = db2_fetch_assoc($q_lg_element_cut);
                                                            ?>
                                                            <?php if (!empty($cek_lg_element_cut['LEBAR'])) : ?>
                                                                *From Cutting Element
                                                                <table width="30%" style="border:1px solid black;border-collapse:collapse;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">Tanggal Terima Kain</th>
                                                                            <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">LOTCODE</th>
                                                                            <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">MESIN KNT</th>
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
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['MESIN_KNT']; ?></td>
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['PROJECTCODE']; ?></td>
                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['LEBAR'] . ' x ' . $d_lg_element_cut['GRAMASI']; ?></td>
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
                                                                ini_set("error_reporting", 1);
                                                                $sql_benang = "SELECT DISTINCT
                                                                                    TRIM(p.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE
                                                                                FROM  
                                                                                    STOCKTRANSACTION s 
                                                                                LEFT JOIN STOCKTRANSACTION s2 ON s2.ITEMELEMENTCODE = s.ITEMELEMENTCODE AND s2.TEMPLATECODE = '204'
                                                                                LEFT JOIN PRODUCTIONRESERVATION p ON p.ORDERCODE = s2.LOTCODE 
                                                                                WHERE
                                                                                    s.TEMPLATECODE = '120' 
                                                                                    AND 
                                                                                    s.ORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' -- PRODUCTION ORDER 
                                                                                    AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '0'";
                                                                $q_benang   = db2_exec($conn1, $sql_benang);
                                                                $q_benang2   = db2_exec($conn1, $sql_benang);
                                                                $no = 1;
                                                                $cekada_benang  = db2_fetch_assoc($q_benang);                                                                            
                                                            ?>
                                                            <?php if(!empty($cekada_benang['PRODUCTIONORDERCODE'])){ ?>
                                                                <?php   
                                                                    while ($d_benang = db2_fetch_assoc($q_benang2)) {
                                                                        $r_benang[]      = "'".$d_benang['PRODUCTIONORDERCODE']."'";
                                                                    }
                                                                    $value_benang        = implode(',', $r_benang);

                                                                    $q_lotcode  = db2_exec($conn1, "SELECT 
                                                                                                        LISTAGG(TRIM(LOTCODE), ', ') AS LOTCODE,
                                                                                                        LONGDESCRIPTION
                                                                                                        FROM
                                                                                                        (SELECT DISTINCT 
                                                                                                                    CASE
                                                                                                                        WHEN LOCATE('+', s.LOTCODE) > 1 THEN SUBSTR(s.LOTCODE, 1, LOCATE('+', s.LOTCODE)-1)
                                                                                                                        ELSE s.LOTCODE
                                                                                                                    END AS LOTCODE,
                                                                                                                    p2.LONGDESCRIPTION
                                                                                                                FROM
                                                                                                                    STOCKTRANSACTION s
                                                                                                                LEFT JOIN PRODUCT p2 ON p2.ITEMTYPECODE = s.ITEMTYPECODE AND NOT 
                                                                                                                                            p2.ITEMTYPECODE = 'DYC' AND NOT 
                                                                                                                                            p2.ITEMTYPECODE = 'WTR' AND 
                                                                                                                                            p2.SUBCODE01 = s.DECOSUBCODE01  AND 
                                                                                                                                            p2.SUBCODE02 = s.DECOSUBCODE02 AND
                                                                                                                                            p2.SUBCODE03 = s.DECOSUBCODE03 AND 
                                                                                                                                            p2.SUBCODE04 = s.DECOSUBCODE04 AND
                                                                                                                                            p2.SUBCODE05 = s.DECOSUBCODE05 AND 
                                                                                                                                            p2.SUBCODE06 = s.DECOSUBCODE06 AND
                                                                                                                                            p2.SUBCODE07 = s.DECOSUBCODE07 
                                                                                                                WHERE
                                                                                                                    ORDERCODE IN ($value_benang)
                                                                                                                    AND (TEMPLATECODE = '125' OR TEMPLATECODE = '120'))
                                                                                                        GROUP BY
                                                                                                            LONGDESCRIPTION");
                                                                    while ($d_lotcode = db2_fetch_assoc($q_lotcode)) {
                                                                ?>
                                                                    <span style="color:#000000; font-size:12px; font-family: Microsoft Sans Serif;">
                                                                        <?= $no++; ?>. <?= $d_lotcode['LONGDESCRIPTION']; ?> - <?= $d_lotcode['LOTCODE']; ?>
                                                                    </span><br>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th style="vertical-align: text-top;">Alur Normal</th>
                                                        <th style="vertical-align: text-top;">:</th>
                                                        <th style="vertical-align: text-top; white-space: wrap;">
                                                            <?php
                                                                $q_routing  = db2_exec($conn1, "SELECT
                                                                                                    TRIM(r.OPERATIONCODE) AS OPERATIONCODE,
                                                                                                    TRIM(r.LONGDESCRIPTION) AS DESCRIPTION 
                                                                                                FROM
                                                                                                    PRODUCTIONDEMAND p
                                                                                                LEFT JOIN ROUTINGSTEP r ON r.ROUTINGNUMBERID = p.ROUTINGNUMBERID 
                                                                                                LEFT JOIN OPERATION o ON o.CODE = r.OPERATIONCODE 
                                                                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = o.ABSUNIQUEID AND a.FIELDNAME = 'AlurProses'
                                                                                                WHERE 
                                                                                                    p.CODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' AND a.VALUESTRING = '2'
                                                                                                ORDER BY
                                                                                                    r.SEQUENCE ASC");
                                                            ?>
                                                            <?php while ($d_routing = db2_fetch_assoc($q_routing)) { ?>
                                                                <span style="background-color: #D0F39A;"><?= $d_routing['OPERATIONCODE']; ?></span>
                                                            <?php } ?>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th style="vertical-align: text-top;">Hasil test quality</th>
                                                        <th style="vertical-align: text-top;">:</th>
                                                        <th style="vertical-align: text-top;">
                                                            <?php
                                                                $q_cari_tq  = mysqli_query($con_db_qc, "SELECT * FROM tbl_tq_nokk WHERE nodemand = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' ORDER BY id DESC");
                                                            ?>
                                                            <?php while ($row_tq = mysqli_fetch_array($q_cari_tq)) { ?>
                                                                <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_result.php?idkk=<?= $row_tq['id']; ?>&noitem=<?= $row_tq['no_item']; ?>&nohanger=<?= $row_tq['no_hanger']; ?>" target="_blank">Detail test quality (<?= $row_tq['no_test']; ?>)<i class="icofont icofont-external-link"></i></a><br>
                                                            <?php } ?>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th style="vertical-align: text-top;">Hasil test inspect</th>
                                                        <th style="vertical-align: text-top;">:</th>
                                                        <th style="vertical-align: text-top;">
                                                            <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_inspectpackingreport.php?demand=<?= TRIM($demand); ?>&ispacking=true" target="_blank">Inspect Report <i class="icofont icofont-external-link"></i></a><br>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th style="vertical-align: text-top;">Hasil test inspect</th>
                                                        <th style="vertical-align: text-top;">:</th>
                                                        <th style="vertical-align: text-top;">
                                                            <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_inspectpackingreport.php?demand=<?= TRIM($demand); ?>&ispacking=true" target="_blank">Inspect Report <i class="icofont icofont-external-link"></i></a><br>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th style="vertical-align: text-top;">Detail bagi kain</th>
                                                        <th style="vertical-align: text-top;">:</th>
                                                        <th style="vertical-align: text-top;">
                                                            <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/nowgkg/pages/cetak/cetakbagikain.php?demandno=<?= TRIM($demand); ?>" target="_blank">Click here! <i class="icofont icofont-external-link"></i></a><br>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th style="vertical-align: text-top;">Detail quantity packing</th>
                                                        <th style="vertical-align: text-top;">:</th>
                                                        <th style="vertical-align: text-top;">
                                                            <form action="https://online.indotaichen.com/nowqcf/CekKainDemand" method="post" target="_blank">
                                                                <input name="nodemand" value="<?= TRIM($demand); ?>" type="hidden" class="form-control form-control-sm" id="" required>
                                                                <button class="btn-link" style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" type="submit">Click here! <i class="icofont icofont-external-link"></i></button>
                                                            </form>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <span>Alur Aktual</span>
                                            <div style="overflow-x:auto;">
                                                <table width="100%" border="1">
                                                    <?php
                                                        ini_set("error_reporting", 1);
                                                        session_start();
                                                        require_once "koneksi.php";

                                                        // itxview_posisikk_tgl_in_prodorder_ins3
                                                        $posisikk_ins3 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_INS3 WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'");
                                                        while ($row_posisikk_ins3   = db2_fetch_assoc($posisikk_ins3)) {
                                                            $r_posisikk_ins3[]      = "('" . TRIM(addslashes($row_posisikk_ins3['PRODUCTIONORDERCODE'])) . "',"
                                                                . "'" . TRIM(addslashes($row_posisikk_ins3['OPERATIONCODE'])) . "',"
                                                                . "'" . TRIM(addslashes($row_posisikk_ins3['PROPROGRESSPROGRESSNUMBER'])) . "',"
                                                                . "'" . TRIM(addslashes($row_posisikk_ins3['DEMANDSTEPSTEPNUMBER'])) . "',"
                                                                . "'" . TRIM(addslashes($row_posisikk_ins3['PROGRESSTEMPLATECODE'])) . "',"
                                                                . "'" . TRIM(addslashes($row_posisikk_ins3['MULAI'])) . "',"
                                                                . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                . "'" . date('Y-m-d H:i:s') . "',"
                                                                . "'" . 'Analisa KK' . "')";
                                                        }
                                                        if ($r_posisikk_ins3) {
                                                            $value_posisikk_ins3        = implode(',', $r_posisikk_ins3);
                                                            $insert_posisikk_ins3       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_ins3(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_posisikk_ins3");
                                                        }

                                                        // itxview_posisikk_tgl_in_prodorder_cnp1
                                                        $posisikk_cnp1 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_CNP1 WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'");
                                                        while ($row_posisikk_cnp1   = db2_fetch_assoc($posisikk_cnp1)) {
                                                            $r_posisikk_cnp1[]      = "('" . TRIM(addslashes($row_posisikk_cnp1['PRODUCTIONORDERCODE'])) . "',"
                                                                . "'" . TRIM(addslashes($row_posisikk_cnp1['OPERATIONCODE'])) . "',"
                                                                . "'" . TRIM(addslashes($row_posisikk_cnp1['PROPROGRESSPROGRESSNUMBER'])) . "',"
                                                                . "'" . TRIM(addslashes($row_posisikk_cnp1['DEMANDSTEPSTEPNUMBER'])) . "',"
                                                                . "'" . TRIM(addslashes($row_posisikk_cnp1['PROGRESSTEMPLATECODE'])) . "',"
                                                                . "'" . TRIM(addslashes($row_posisikk_cnp1['MULAI'])) . "',"
                                                                . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                . "'" . date('Y-m-d H:i:s') . "',"
                                                                . "'" . 'Analisa KK' . "')";
                                                        }
                                                        if ($r_posisikk_cnp1) {
                                                            $value_posisikk_cnp1        = implode(',', $r_posisikk_cnp1);
                                                            $insert_posisikk_cnp1       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_cnp1(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_posisikk_cnp1");
                                                        }
                                                    ?>
                                                    <thead>
                                                        <?php
                                                            ini_set("error_reporting", 1);
                                                            $sqlDB2 = "SELECT
                                                                            p.WORKCENTERCODE,
                                                                            CASE
                                                                                WHEN p.PRODRESERVATIONLINKGROUPCODE IS NULL THEN TRIM(p.OPERATIONCODE) 
                                                                                WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE) 
                                                                                ELSE p.PRODRESERVATIONLINKGROUPCODE
                                                                            END	AS OPERATIONCODE,
                                                                            TRIM(o.OPERATIONGROUPCODE) AS OPERATIONGROUPCODE,
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
                                                                            -- AND NOT iptip.MULAI IS NULL AND NOT iptop.SELESAI IS NULL
                                                                        ORDER BY iptip.MULAI ASC";
                                                            $stmt = db2_exec($conn1, $sqlDB2);
                                                            $stmt2 = db2_exec($conn1, $sqlDB2);
                                                            $stmt3 = db2_exec($conn1, $sqlDB2);
                                                            $stmt4 = db2_exec($conn1, $sqlDB2);
                                                            $stmt5 = db2_exec($conn1, $sqlDB2);
                                                            $stmt6 = db2_exec($conn1, $sqlDB2);
                                                            $stmt7 = db2_exec($conn1, $sqlDB2);
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
                                                                <?php if ($cek_QA_DATA) : ?>
                                                                    <th style="text-align: center;"><?= $rowdb2['OPERATIONCODE']; ?></th>
                                                                <?php endif; ?>
                                                            <?php } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php while ($rowdb4 = db2_fetch_assoc($stmt4)) { ?>
                                                                <?php
                                                                    $q_QA_DATA4  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                                AND WORKCENTERCODE = '$rowdb4[WORKCENTERCODE]' 
                                                                                                                AND OPERATIONCODE = '$rowdb4[OPERATIONCODE]' 
                                                                                                                AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                AND STATUS = 'Analisa KK'
                                                                                                                ORDER BY LINE ASC");
                                                                    $cek_QA_DATA4    = mysqli_fetch_assoc($q_QA_DATA4);
                                                                ?>
                                                                <?php if ($cek_QA_DATA4) : ?>
                                                                    <th style="text-align: center; font-size:15px; background-color: #EEE6B3">
                                                                        <?php if ($rowdb4['OPERATIONCODE'] == 'INS3') : ?>
                                                                            <?php
                                                                                $q_mulai_ins3   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                    * 
                                                                                                                                FROM
                                                                                                                                    `itxview_posisikk_tgl_in_prodorder_ins3_detaildemandstep` 
                                                                                                                                WHERE
                                                                                                                                    productionordercode = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'
                                                                                                                                    AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                ORDER BY
                                                                                                                                    MULAI ASC LIMIT 1");
                                                                                $d_mulai_ins3   = mysqli_fetch_assoc($q_mulai_ins3);
                                                                                echo $d_mulai_ins3['MULAI'];
                                                                            ?>
                                                                        <?php elseif ($rowdb4['OPERATIONCODE'] == 'CNP1') : ?>
                                                                            <?php
                                                                                $q_mulai_cnp1   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                    * 
                                                                                                                                FROM
                                                                                                                                    `itxview_posisikk_tgl_in_prodorder_cnp1_detaildemandstep` 
                                                                                                                                WHERE
                                                                                                                                    productionordercode = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'
                                                                                                                                    AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                ORDER BY
                                                                                                                                    MULAI ASC LIMIT 1");
                                                                                $d_mulai_cnp1   = mysqli_fetch_assoc($q_mulai_cnp1);
                                                                                echo $d_mulai_cnp1['MULAI'];
                                                                            ?>
                                                                        <?php else : ?>
                                                                            <?= $rowdb4['MULAI']; ?>
                                                                        <?php endif; ?>
                                                                        <br>
                                                                        <?php if ($rowdb4['OPERATIONCODE'] == 'INS3') : ?>
                                                                            <?php
                                                                            $q_mulai_ins3   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                * 
                                                                                                                            FROM
                                                                                                                                `itxview_posisikk_tgl_in_prodorder_ins3_detaildemandstep` 
                                                                                                                            WHERE
                                                                                                                                productionordercode = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'
                                                                                                                                AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                            ORDER BY
                                                                                                                                MULAI DESC LIMIT 1");
                                                                            $d_mulai_ins3   = mysqli_fetch_assoc($q_mulai_ins3);
                                                                            echo $d_mulai_ins3['MULAI'];
                                                                            ?>
                                                                        <?php elseif ($rowdb4['OPERATIONCODE'] == 'CNP1') : ?>
                                                                            <?php
                                                                            $q_mulai_cnp1   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                * 
                                                                                                                            FROM
                                                                                                                                `itxview_posisikk_tgl_in_prodorder_cnp1_detaildemandstep` 
                                                                                                                            WHERE
                                                                                                                                productionordercode = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'
                                                                                                                                AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                            ORDER BY
                                                                                                                                MULAI DESC LIMIT 1");
                                                                            $d_mulai_cnp1   = mysqli_fetch_assoc($q_mulai_cnp1);
                                                                            echo $d_mulai_cnp1['MULAI'];
                                                                            ?>
                                                                        <?php else : ?>
                                                                            <?= $rowdb4['SELESAI']; ?>
                                                                        <?php endif; ?>
                                                                    </th>
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
                                                                <?php if ($cek_QA_DATA2) : ?>
                                                                    <th style="text-align: center;"><?= $rowdb3['MESIN']; ?></th>
                                                                <?php endif; ?>
                                                            <?php } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php while ($rowdb5 = db2_fetch_assoc($stmt5)) { ?>
                                                                <?php
                                                                    $q_QA_DATA5  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                                AND WORKCENTERCODE = '$rowdb5[WORKCENTERCODE]' 
                                                                                                                AND OPERATIONCODE = '$rowdb5[OPERATIONCODE]' 
                                                                                                                AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                AND STATUS = 'Analisa KK'
                                                                                                                ORDER BY LINE ASC");
                                                                    $cek_QA_DATA5    = mysqli_fetch_assoc($q_QA_DATA5);
                                                                ?>
                                                                <?php if ($cek_QA_DATA5) : ?>
                                                                    <?php $opr = $rowdb5['OPERATIONCODE']; if(str_contains($opr, 'DYE')) : ?>
                                                                        <?php
                                                                            $prod_order     = TRIM($d_ITXVIEWKK['PRODUCTIONORDERCODE']);
                                                                            $prod_demand    = TRIM($demand);

                                                                            $q_dye_montemp      = mysqli_query($con_db_dyeing, "SELECT
                                                                                                                                    a.id AS idm,
                                                                                                                                    b.id AS ids,
                                                                                                                                    b.no_resep 
                                                                                                                                FROM
                                                                                                                                    tbl_montemp a
                                                                                                                                    LEFT JOIN tbl_schedule b ON a.id_schedule = b.id
                                                                                                                                    LEFT JOIN tbl_setting_mesin c ON b.nokk = c.nokk 
                                                                                                                                WHERE
                                                                                                                                    b.nokk = '$prod_order' AND b.nodemand LIKE '%$prod_demand%'
                                                                                                                                ORDER BY
                                                                                                                                    a.id DESC LIMIT 1 ");
                                                                            $d_dye_montemp      = mysqli_fetch_assoc($q_dye_montemp);

                                                                        ?>
                                                                        <th style="text-align: center;">
                                                                            <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/dye-itti/pages/cetak/cetak_monitoring_new.php?idkk=&no=<?= $d_dye_montemp['no_resep']; ?>&idm=<?php echo $d_dye_montemp['idm']; ?>&ids=<?php echo $d_dye_montemp['ids']; ?>" target="_blank">Monitoring <i class="icofont icofont-external-link"></i></a>
                                                                            &ensp;
                                                                            <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/laporan/dye_filter_bon_reservation.php?demand=<?= $demand; ?>&prod_order=<?= $d_ITXVIEWKK['PRODUCTIONORDERCODE']; ?>" target="_blank">Bon Resep <i class="icofont icofont-external-link"></i></a>
                                                                        </th>
                                                                    <?php else : ?>
                                                                            <?php $opr_grup = $rowdb5['OPERATIONGROUPCODE']; if(str_contains($opr_grup, "FIN")) : ?>
                                                                                <th style="text-align: center;">
                                                                                    <!-- <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/finishing2-new/reports/pages/reports-detail-stenter.php?FromAnalisa=FromAnalisa&prod_order=<?= TRIM($d_ITXVIEWKK['PRODUCTIONORDERCODE']); ?>&prod_demand=<?= TRIM($demand); ?>&tgl_in=<?= substr($rowdb5['MULAI'], 1, 10); ?>&tgl_out=<?= substr($rowdb5['SELESAI'], 1, 10); ?>" target="_blank">Detail proses <i class="icofont icofont-external-link"></i></a> -->
                                                                                </th>
                                                                            <?php else : ?>
                                                                                <th style="text-align: center;">-</th>
                                                                            <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php while ($rowdb7 = db2_fetch_assoc($stmt7)) { ?>
                                                                <?php
                                                                    $q_QA_DATA7  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                                AND WORKCENTERCODE = '$rowdb7[WORKCENTERCODE]' 
                                                                                                                AND OPERATIONCODE = '$rowdb7[OPERATIONCODE]' 
                                                                                                                AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                AND STATUS = 'Analisa KK'
                                                                                                                ORDER BY LINE ASC");
                                                                    $cek_QA_DATA7    = mysqli_fetch_assoc($q_QA_DATA7);
                                                                ?>
                                                                <?php if ($cek_QA_DATA7) : ?>
                                                                    <?php
                                                                        $q_routing  = mysqli_query($con_nowprd, "SELECT * FROM keterangan_leader 
                                                                                                                    WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                    AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]'
                                                                                                                    AND OPERATIONCODE = '$rowdb7[OPERATIONCODE]'");
                                                                        $d_routing  = mysqli_fetch_assoc($q_routing);
                                                                    ?>
                                                                    <td style="vertical-align: top; font-size:15px;">
                                                                        <?= substr($d_routing['KETERANGAN'], 0,35); ?><?php if(substr($d_routing['KETERANGAN'], 0,35)){ echo "<br>"; } ?>
                                                                        <?= substr($d_routing['KETERANGAN'], 35,70); ?><?php if(substr($d_routing['KETERANGAN'], 35,70)){ echo "<br>"; } ?>
                                                                        <?= substr($d_routing['KETERANGAN'], 70,105); ?><?php if(substr($d_routing['KETERANGAN'], 70,105)){ echo "<br>"; } ?>
                                                                        <?= substr($d_routing['KETERANGAN'], 105,140); ?><?php if(substr($d_routing['KETERANGAN'], 105,140)){ echo "<br>"; } ?>
                                                                        <?= substr($d_routing['KETERANGAN'], 140,175); ?><?php if(substr($d_routing['KETERANGAN'], 140,175)){ echo "<br>"; } ?>
                                                                        <?= substr($d_routing['KETERANGAN'], 175,210); ?><?php if(substr($d_routing['KETERANGAN'], 175,210)){ echo "<br>"; } ?>
                                                                        <?= substr($d_routing['KETERANGAN'], 210); ?><?php if(substr($d_routing['KETERANGAN'], 210)){ echo ""; } ?>
                                                                    </td>
                                                                <?php endif; ?>
                                                            <?php } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php while ($rowdb6 = db2_fetch_assoc($stmt6)) { ?>
                                                                <?php
                                                                    $q_QA_DATA8  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                                AND WORKCENTERCODE = '$rowdb6[WORKCENTERCODE]' 
                                                                                                                AND OPERATIONCODE = '$rowdb6[OPERATIONCODE]' 
                                                                                                                AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                AND STATUS = 'Analisa KK'
                                                                                                                ORDER BY LINE ASC");
                                                                    $cek_QA_DATA8    = mysqli_fetch_assoc($q_QA_DATA8);
                                                                ?>
                                                                <?php if ($cek_QA_DATA8) : ?>
                                                                    <?php
                                                                        $q_specs    = db2_exec($conn1, "SELECT 
                                                                                                        TRIM(a.NAMENAME) AS NAMENAME,
                                                                                                        a.VALUESTRING,
                                                                                                        floor(a.VALUEDECIMAL) AS VALUEDECIMAL
                                                                                                    FROM 
                                                                                                        PRODUCTIONSPECS p 
                                                                                                    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID
                                                                                                    WHERE 
                                                                                                        OPERATIONCODE = '$rowdb6[OPERATIONCODE]' 
                                                                                                        AND SUBCODE01 = '$d_ITXVIEWKK[SUBCODE01]' 
                                                                                                        AND SUBCODE02 = '$d_ITXVIEWKK[SUBCODE02]' 
                                                                                                        AND SUBCODE03 ='$d_ITXVIEWKK[SUBCODE03]' 
                                                                                                        AND SUBCODE04 = '$d_ITXVIEWKK[SUBCODE04]'");
                                                                    ?>
                                                                    <td style="vertical-align: top; font-size:15px;">
                                                                        <b>Acuan Standart :</b> <br>
                                                                        <?php while ($d_specs = db2_fetch_assoc($q_specs)) {  ?>
                                                                            <li><?= $d_specs['NAMENAME']; ?> : <?= $d_specs['VALUESTRING'].$d_specs['VALUEDECIMAL']; ?> </li>
                                                                        <?php } ?>
                                                                    </td>
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
                                                                <?php if ($d_QA_DATAcek) : ?>
                                                                    <td style="vertical-align: top; font-size:15px;">
                                                                        <?php $q_QA_DATA7     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                        <?php $no = 1; while ($d_QA_DATA7 = mysqli_fetch_array($q_QA_DATA7)) : ?>
                                                                            <?php $char_code = $d_QA_DATA7['CHARACTERISTICCODE']; ?>
                                                                                <?php if(str_contains($char_code, 'GRB') != true && ($char_code == 'LEBAR' || $char_code == 'GRAMASI')) : ?>
                                                                                    <?= $no++ . ' : ' . $d_QA_DATA7['CHARACTERISTICCODE'] . ' = ' . $d_QA_DATA7['VALUEQUANTITY'] . '<br>'; ?>
                                                                                <?php endif; ?>
                                                                        <?php endwhile; ?>
                                                                        <hr>
                                                                        <?php $q_QA_DATA3     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                        <?php $no = 1; while ($d_QA_DATA3 = mysqli_fetch_array($q_QA_DATA3)) : ?>
                                                                            <?php $char_code = $d_QA_DATA3['CHARACTERISTICCODE']; ?>
                                                                            <?php  if(str_contains($char_code, 'GRB') != true && $char_code <> 'LEBAR' && $char_code <> 'GRAMASI') : ?>
                                                                                <?php   
                                                                                    if($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '1'){
                                                                                        $grouping_hue = 'A';
                                                                                    }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '2'){
                                                                                        $grouping_hue = 'B';
                                                                                    }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '3'){
                                                                                        $grouping_hue = 'C';
                                                                                    }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '4'){
                                                                                        $grouping_hue = 'D';
                                                                                    }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '1'){
                                                                                        $grouping_hue = 'Red';
                                                                                    }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '2'){
                                                                                        $grouping_hue = 'Yellow';
                                                                                    }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '3'){
                                                                                        $grouping_hue = 'Green';
                                                                                    }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '4'){
                                                                                        $grouping_hue = 'Blue';
                                                                                    }else{
                                                                                        $grouping_hue = $d_QA_DATA3['VALUEQUANTITY'];
                                                                                    }
                                                                                ?>
                                                                                <?= $no++ . ' : ' . $d_QA_DATA3['CHARACTERISTICCODE'] . ' = ' . $grouping_hue . '<br>'; ?>
                                                                            <?php endif; ?>
                                                                        <?php endwhile; ?>
                                                                        <hr>
                                                                        <?php $q_QA_DATA6     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                        <?php $no = 1; while ($d_QA_DATA6 = mysqli_fetch_array($q_QA_DATA6)) : ?>
                                                                            <?php $char_code = $d_QA_DATA6['CHARACTERISTICCODE']; ?>
                                                                            <?php  if(str_contains($char_code, 'GRB')) : ?>
                                                                                <?= $no++ . ' : ' . $d_QA_DATA6['CHARACTERISTICCODE'] . ' = ' . $d_QA_DATA6['VALUEQUANTITY'] . '<br>'; ?>
                                                                            <?php endif; ?>
                                                                        <?php endwhile; ?>
                                                                    </td>
                                                                <?php endif; ?>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <hr>
                                            <!-- LOOPING 1 UNTUK SALINAN -->
                                            <?php
                                                $q_looping1     = db2_exec($conn1, "SELECT
                                                                                        RIGHT(a.VALUESTRING, 8) AS PRODUCTIONDEMANDCODE
                                                                                    FROM
                                                                                        PRODUCTIONDEMAND p
                                                                                    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'
                                                                                    WHERE
                                                                                        p.CODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]'");
                                            ?>
                                            <?php while($row_looping1 = db2_fetch_assoc($q_looping1)) : ?>
                                                <?php if($row_looping1['PRODUCTIONDEMANDCODE']) : ?>
                                                    <?php
                                                        require_once "koneksi.php";
                                                        $demand     = $row_looping1['PRODUCTIONDEMANDCODE'];

                                                        $q_ITXVIEWKK    = db2_exec($conn1, "SELECT * FROM ITXVIEWKK WHERE PRODUCTIONDEMANDCODE = '$demand'");
                                                        $d_ITXVIEWKK    = db2_fetch_assoc($q_ITXVIEWKK);

                                                        if($_GET['prod_order']){
                                                            $prod_order     = $_GET['prod_order'];
                                                        }elseif($_POST['prod_order']) {
                                                            $prod_order     = $_POST['prod_order'];
                                                        }else{
                                                            $prod_order     = $d_ITXVIEWKK['PRODUCTIONORDERCODE'];
                                                        }

                                                        $sql_pelanggan_buyer     = db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$d_ITXVIEWKK[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                                                                        AND CODE = '$d_ITXVIEWKK[PROJECTCODE]'");
                                                        $dt_pelanggan_buyer        = db2_fetch_assoc($sql_pelanggan_buyer);

                                                        // itxview_detail_qa_data
                                                        $itxview_detail_qa_data     = db2_exec($conn1, "SELECT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                        WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                        AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]'
                                                                                                        AND OPERATIONCODE IN ('" . implode("','", $_POST['operation']) . "') 
                                                                                                        ORDER BY LINE ASC");
                                                        while ($row_itxview_detail_qa_data     = db2_fetch_assoc($itxview_detail_qa_data)) {
                                                            $r_itxview_detail_qa_data[]        = "('" . TRIM(addslashes($row_itxview_detail_qa_data['PRODUCTIONDEMANDCODE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['PRODUCTIONORDERCODE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['WORKCENTERCODE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['OPERATIONCODE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['LINE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['QUALITYDOCUMENTHEADERNUMBERID'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['CHARACTERISTICCODE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['LONGDESCRIPTION'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['VALUEQUANTITY'])) . "',"
                                                                                                . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                                                . "'" . date('Y-m-d H:i:s') . "',"
                                                                                                . "'" . 'Analisa KK' . "')";
                                                        }
                                                        if(!empty($r_itxview_detail_qa_data)){
                                                            $value_itxview_detail_qa_data        = implode(',', $r_itxview_detail_qa_data);
                                                            $insert_itxview_detail_qa_data       = mysqli_query($con_nowprd, "INSERT INTO itxview_detail_qa_data(PRODUCTIONDEMANDCODE,PRODUCTIONORDERCODE,WORKCENTERCODE,OPERATIONCODE,LINE,QUALITYDOCUMENTHEADERNUMBERID,CHARACTERISTICCODE,LONGDESCRIPTION,VALUEQUANTITY,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_itxview_detail_qa_data");
                                                        }
                                                    ?>
                                                    <center style="background-color: #ff6b81; color: white;">
                                                        <i class="ti-angle-double-down"></i> 
                                                        <strong>Kartu asli</strong>
                                                        <i class="ti-angle-double-down"></i> 
                                                    </center>
                                                    <table width="100%" style="border: 1px solid black; border-collapse: collapse;">
                                                        <thead>
                                                            <tr>
                                                                <th>Prod. Order</th>
                                                                <th>:</th>
                                                                <th><?= $d_ITXVIEWKK['PRODUCTIONORDERCODE']; ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Prod. Demand</th>
                                                                <th>:</th>
                                                                <th><?= $demand; ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>LOT Internal</th>
                                                                <th>:</th>
                                                                <th><?= $d_ITXVIEWKK['LOT']; ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Original PD Code</th>
                                                                <th>:</th>
                                                                <th><?= substr($d_ITXVIEWKK['ORIGINALPDCODE'], 4, 8); ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Item Code</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top; white-space: wrap;">
                                                                    <?= TRIM($d_ITXVIEWKK['SUBCODE02']) . '-' . TRIM($d_ITXVIEWKK['SUBCODE03']); ?>
                                                                    <?= substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 0, 200); ?><?php if (substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 0, 200)) {
                                                                                                                                echo "<br>";
                                                                                                                            } ?>
                                                                    <?= substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 201); ?><?php if (substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 201)) {
                                                                                                                            echo "<br>";
                                                                                                                        } ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Lebar x Gramasi Kain Jadi</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <?php 
                                                                        $q_lebar = db2_exec($conn1, "SELECT * FROM ITXVIEWLEBAR WHERE SALESORDERCODE = '$d_ITXVIEWKK[BONORDER]' AND ORDERLINE = '$d_ITXVIEWKK[ORDERLINE]'");
                                                                        $d_lebar = db2_fetch_assoc($q_lebar);
                                                                    ?>
                                                                    <?php 
                                                                        $q_gramasi = db2_exec($conn1, "SELECT * FROM ITXVIEWGRAMASI WHERE SALESORDERCODE = '$d_ITXVIEWKK[BONORDER]' AND ORDERLINE = '$d_ITXVIEWKK[ORDERLINE]'");
                                                                        $d_gramasi = db2_fetch_assoc($q_gramasi);
                                                                    ?>
                                                                    <?php 
                                                                        if($d_gramasi['GRAMASI_KFF']){
                                                                            $gramasi = number_format($d_gramasi['GRAMASI_KFF'], 0);
                                                                        }elseif($d_gramasi['GRAMASI_FKF']){
                                                                            $gramasi = number_format($d_gramasi['GRAMASI_FKF'], 0);
                                                                        }else{
                                                                            $gramasi = '-';
                                                                        }
                                                                    ?>
                                                                    <?= number_format($d_lebar['LEBAR'],0).' x '.$gramasi; ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Lebar x Gramasi Inspection</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <?php
                                                                        $q_lg_INS3  = db2_exec($conn1, "SELECT
                                                                                                            e.ELEMENTCODE,
                                                                                                            e.WIDTHGROSS,
                                                                                                            a.VALUEDECIMAL 
                                                                                                        FROM
                                                                                                            ELEMENTSINSPECTION e 
                                                                                                        LEFT JOIN ADSTORAGE a ON a.UNIQUEID = e.ABSUNIQUEID AND a.FIELDNAME = 'GSM'
                                                                                                        WHERE
                                                                                                            e.ELEMENTCODE LIKE '$demand%'
                                                                                                        ORDER BY 
                                                                                                            e.INSPECTIONSTARTDATETIME ASC LIMIT 1");
                                                                        $d_lg_INS3  = db2_fetch_assoc($q_lg_INS3);

                                                                        echo $d_lg_INS3['WIDTHGROSS'];
                                                                        if($d_lg_INS3['VALUEDECIMAL']){
                                                                            echo ' x '.$d_lg_INS3['VALUEDECIMAL'];
                                                                        }else{
                                                                            echo ' x ...' ;
                                                                        }
                                                                    ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Lebar x Gramasi Standart Greige</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <?php
                                                                    $q_lg_standart  = db2_exec($conn1, "SELECT 
                                                                                                            a.VALUEDECIMAL AS LEBAR,
                                                                                                            a2.VALUEDECIMAL AS GRAMASI
                                                                                                        FROM 
                                                                                                            PRODUCT p 
                                                                                                        LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'Width'
                                                                                                        LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'GSM'
                                                                                                        WHERE 
                                                                                                            SUBCODE01 = '$d_ITXVIEWKK[SUBCODE01]' 
                                                                                                            AND SUBCODE02 = '$d_ITXVIEWKK[SUBCODE02]' 
                                                                                                            AND SUBCODE03 = '$d_ITXVIEWKK[SUBCODE03]'
                                                                                                            AND SUBCODE04 = '$d_ITXVIEWKK[SUBCODE04]' 
                                                                                                            AND ITEMTYPECODE = 'KGF'");
                                                                    $d_lg_standart  = db2_fetch_assoc($q_lg_standart);
                                                                    echo number_format($d_lg_standart['LEBAR'], 0) . ' x ' . number_format($d_lg_standart['GRAMASI'], 0);
                                                                    ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Gauge x Diameter Mesin (inch) </th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <?php
                                                                    $q_lg_standart  = db2_exec($conn1, "SELECT 
                                                                                                            a.VALUEDECIMAL AS LEBAR,
                                                                                                            a2.VALUEDECIMAL AS GRAMASI
                                                                                                        FROM 
                                                                                                            PRODUCT p 
                                                                                                        LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'Gauge'
                                                                                                        LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'Diameter'
                                                                                                        WHERE 
                                                                                                            SUBCODE01 = '$d_ITXVIEWKK[SUBCODE01]' 
                                                                                                            AND SUBCODE02 = '$d_ITXVIEWKK[SUBCODE02]' 
                                                                                                            AND SUBCODE03 = '$d_ITXVIEWKK[SUBCODE03]'
                                                                                                            AND SUBCODE04 = '$d_ITXVIEWKK[SUBCODE04]' 
                                                                                                            AND ITEMTYPECODE = 'KGF'");
                                                                    $d_lg_standart  = db2_fetch_assoc($q_lg_standart);
                                                                    echo number_format($d_lg_standart['LEBAR'], 0) . ' x ' . number_format($d_lg_standart['GRAMASI'], 0);
                                                                    ?>
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
                                                                                                                a2.VALUESTRING AS MESIN_KNT,
                                                                                                                s.PROJECTCODE,
                                                                                                                floor(e.WIDTHNET) AS LEBAR, -- Untuk laporan mr. james
                                                                                                                floor(a.VALUEDECIMAL) AS GRAMASI -- Untuk laporan mr. james
                                                                                                            FROM  
                                                                                                                STOCKTRANSACTION s 
                                                                                                            LEFT JOIN STOCKTRANSACTION s2 ON s2.ITEMELEMENTCODE = s.ITEMELEMENTCODE AND s2.TEMPLATECODE = '204'
                                                                                                            LEFT JOIN ELEMENTSINSPECTION e ON e.DEMANDCODE = s2.LOTCODE AND e.ELEMENTCODE = s2.ITEMELEMENTCODE -- Untuk laporan mr. james
                                                                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = e.ABSUNIQUEID AND a.FIELDNAME = 'GSM' -- Untuk laporan mr. james
                                                                                                            LEFT JOIN PRODUCTIONDEMAND p ON p.CODE = s2.LOTCODE
                                                                                                            LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'MachineNoCode'
                                                                                                            WHERE
                                                                                                                s.TEMPLATECODE = '120' 
                                                                                                                AND 
                                                                                                                s.ORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' -- PRODUCTION ORDER 
                                                                                                                AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '0'");
                                                                        $cek_lg_element = db2_fetch_assoc($q_lg_element);
                                                                    ?>
                                                                    <?php if ($cek_lg_element) : ?>
                                                                        *From Element
                                                                        <table width="30%" style="border:1px solid black;border-collapse:collapse;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">Tanggal Terima Kain</th>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">LOTCODE</th>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">MESIN KNT</th>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">PROJECTCODE</th>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">LEBAR x GRAMASI</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php while ($d_lg_element = db2_fetch_assoc($q_lg_element)) { ?>
                                                                                    <tr>
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['TRANSACTIONDATE']; ?></td>
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['LOTCODE']; ?></td>
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['MESIN_KNT']; ?></td>
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['PROJECTCODE']; ?></td>
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['LEBAR'] . ' x ' . $d_lg_element['GRAMASI']; ?></td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    <?php endif; ?>

                                                                    <?php
                                                                        $q_lg_element_cut   = db2_exec($conn1, "SELECT DISTINCT
                                                                                                                    s4.TRANSACTIONDATE,
                                                                                                                    s4.LOTCODE,
                                                                                                                    a2.VALUESTRING AS MESIN_KNT,
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
                                                                                                                LEFT JOIN PRODUCTIONDEMAND p ON p.CODE = s2.LOTCODE
                                                                                                                LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'MachineNoCode'
                                                                                                                WHERE
                                                                                                                    s.TEMPLATECODE = '120' 
                                                                                                                    AND s.ORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' -- PRODUCTION NUMBER
                                                                                                                    AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '8'");
                                                                        $cek_lg_element_cut = db2_fetch_assoc($q_lg_element_cut);
                                                                    ?>
                                                                    <?php if (!empty($cek_lg_element_cut['LEBAR'])) : ?>
                                                                        *From Cutting Element
                                                                        <table width="30%" style="border:1px solid black;border-collapse:collapse;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">Tanggal Terima Kain</th>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">LOTCODE</th>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">MESIN KNT</th>
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
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['MESIN_KNT']; ?></td>
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['PROJECTCODE']; ?></td>
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['LEBAR'] . ' x ' . $d_lg_element_cut['GRAMASI']; ?></td>
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
                                                                        ini_set("error_reporting", 1);
                                                                        $sql_benang = "SELECT DISTINCT
                                                                                            TRIM(p.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE
                                                                                        FROM  
                                                                                            STOCKTRANSACTION s 
                                                                                        LEFT JOIN STOCKTRANSACTION s2 ON s2.ITEMELEMENTCODE = s.ITEMELEMENTCODE AND s2.TEMPLATECODE = '204'
                                                                                        LEFT JOIN PRODUCTIONRESERVATION p ON p.ORDERCODE = s2.LOTCODE 
                                                                                        WHERE
                                                                                            s.TEMPLATECODE = '120' 
                                                                                            AND 
                                                                                            s.ORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' -- PRODUCTION ORDER 
                                                                                            AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '0'";
                                                                        $q_benang   = db2_exec($conn1, $sql_benang);
                                                                        $q_benang2   = db2_exec($conn1, $sql_benang);
                                                                        $no = 1;
                                                                        $cekada_benang  = db2_fetch_assoc($q_benang);                                                                            
                                                                    ?>
                                                                    <?php if(!empty($cekada_benang['PRODUCTIONORDERCODE'])){ ?>
                                                                        <?php   
                                                                            while ($d_benang = db2_fetch_assoc($q_benang2)) {
                                                                                $r_benang[]      = "'".$d_benang['PRODUCTIONORDERCODE']."'";
                                                                            }
                                                                            $value_benang        = implode(',', $r_benang);

                                                                            $q_lotcode  = db2_exec($conn1, "SELECT 
                                                                                                                LISTAGG(TRIM(LOTCODE), ', ') AS LOTCODE,
                                                                                                                LONGDESCRIPTION
                                                                                                                FROM
                                                                                                                (SELECT DISTINCT 
                                                                                                                            CASE
                                                                                                                                WHEN LOCATE('+', s.LOTCODE) > 1 THEN SUBSTR(s.LOTCODE, 1, LOCATE('+', s.LOTCODE)-1)
                                                                                                                                ELSE s.LOTCODE
                                                                                                                            END AS LOTCODE,
                                                                                                                            p2.LONGDESCRIPTION
                                                                                                                        FROM
                                                                                                                            STOCKTRANSACTION s
                                                                                                                        LEFT JOIN PRODUCT p2 ON p2.ITEMTYPECODE = s.ITEMTYPECODE AND NOT 
                                                                                                                                                    p2.ITEMTYPECODE = 'DYC' AND NOT 
                                                                                                                                                    p2.ITEMTYPECODE = 'WTR' AND 
                                                                                                                                                    p2.SUBCODE01 = s.DECOSUBCODE01  AND 
                                                                                                                                                    p2.SUBCODE02 = s.DECOSUBCODE02 AND
                                                                                                                                                    p2.SUBCODE03 = s.DECOSUBCODE03 AND 
                                                                                                                                                    p2.SUBCODE04 = s.DECOSUBCODE04 AND
                                                                                                                                                    p2.SUBCODE05 = s.DECOSUBCODE05 AND 
                                                                                                                                                    p2.SUBCODE06 = s.DECOSUBCODE06 AND
                                                                                                                                                    p2.SUBCODE07 = s.DECOSUBCODE07 
                                                                                                                        WHERE
                                                                                                                            ORDERCODE IN ($value_benang)
                                                                                                                            AND (TEMPLATECODE = '125' OR TEMPLATECODE = '120'))
                                                                                                                GROUP BY
                                                                                                                    LONGDESCRIPTION");
                                                                            while ($d_lotcode = db2_fetch_assoc($q_lotcode)) {
                                                                        ?>
                                                                            <span style="color:#000000; font-size:12px; font-family: Microsoft Sans Serif;">
                                                                                <?= $no++; ?>. <?= $d_lotcode['LONGDESCRIPTION']; ?> - <?= $d_lotcode['LOTCODE']; ?>
                                                                            </span><br>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Alur Normal</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top; white-space: wrap;">
                                                                    <?php
                                                                        $q_routing  = db2_exec($conn1, "SELECT
                                                                                                            TRIM(r.OPERATIONCODE) AS OPERATIONCODE,
                                                                                                            TRIM(r.LONGDESCRIPTION) AS DESCRIPTION 
                                                                                                        FROM
                                                                                                            PRODUCTIONDEMAND p
                                                                                                        LEFT JOIN ROUTINGSTEP r ON r.ROUTINGNUMBERID = p.ROUTINGNUMBERID 
                                                                                                        LEFT JOIN OPERATION o ON o.CODE = r.OPERATIONCODE 
                                                                                                        LEFT JOIN ADSTORAGE a ON a.UNIQUEID = o.ABSUNIQUEID AND a.FIELDNAME = 'AlurProses'
                                                                                                        WHERE 
                                                                                                            p.CODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' AND a.VALUESTRING = '2'
                                                                                                        ORDER BY
                                                                                                            r.SEQUENCE ASC");
                                                                    ?>
                                                                    <?php while ($d_routing = db2_fetch_assoc($q_routing)) { ?>
                                                                        <span style="background-color: #D0F39A;"><?= $d_routing['OPERATIONCODE']; ?></span>
                                                                    <?php } ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Hasil test quality</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <?php
                                                                        $q_cari_tq  = mysqli_query($con_db_qc, "SELECT * FROM tbl_tq_nokk WHERE nodemand = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' ORDER BY id DESC");
                                                                    ?>
                                                                    <?php while ($row_tq = mysqli_fetch_array($q_cari_tq)) { ?>
                                                                        <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_result.php?idkk=<?= $row_tq['id']; ?>&noitem=<?= $row_tq['no_item']; ?>&nohanger=<?= $row_tq['no_hanger']; ?>" target="_blank">Detail test quality (<?= $row_tq['no_test']; ?>)<i class="icofont icofont-external-link"></i></a><br>
                                                                    <?php } ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Hasil test inspect</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_inspectpackingreport.php?demand=<?= TRIM($demand); ?>&ispacking=true" target="_blank">Inspect Report <i class="icofont icofont-external-link"></i></a><br>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Hasil test inspect</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_inspectpackingreport.php?demand=<?= TRIM($demand); ?>&ispacking=true" target="_blank">Inspect Report <i class="icofont icofont-external-link"></i></a><br>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Detail bagi kain</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/nowgkg/pages/cetak/cetakbagikain.php?demandno=<?= TRIM($demand); ?>" target="_blank">Click here! <i class="icofont icofont-external-link"></i></a><br>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Detail quantity packing</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <form action="https://online.indotaichen.com/nowqcf/CekKainDemand" method="post" target="_blank">
                                                                        <input name="nodemand" value="<?= TRIM($demand); ?>" type="hidden" class="form-control form-control-sm" id="" required>
                                                                        <button class="btn-link" style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" type="submit">Click here! <i class="icofont icofont-external-link"></i></button>
                                                                    </form>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <span>Alur Aktual</span>
                                                    <div style="overflow-x:auto;">
                                                        <table width="100%" border="1">
                                                            <?php
                                                                ini_set("error_reporting", 1);
                                                                session_start();
                                                                require_once "koneksi.php";

                                                                // itxview_posisikk_tgl_in_prodorder_ins3
                                                                $posisikk_ins3 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_INS3 WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'");
                                                                while ($row_posisikk_ins3   = db2_fetch_assoc($posisikk_ins3)) {
                                                                    $r_posisikk_ins3[]      = "('" . TRIM(addslashes($row_posisikk_ins3['PRODUCTIONORDERCODE'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_ins3['OPERATIONCODE'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_ins3['PROPROGRESSPROGRESSNUMBER'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_ins3['DEMANDSTEPSTEPNUMBER'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_ins3['PROGRESSTEMPLATECODE'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_ins3['MULAI'])) . "',"
                                                                        . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                        . "'" . date('Y-m-d H:i:s') . "',"
                                                                        . "'" . 'Analisa KK' . "')";
                                                                }
                                                                if ($r_posisikk_ins3) {
                                                                    $value_posisikk_ins3        = implode(',', $r_posisikk_ins3);
                                                                    $insert_posisikk_ins3       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_ins3(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_posisikk_ins3");
                                                                }

                                                                // itxview_posisikk_tgl_in_prodorder_cnp1
                                                                $posisikk_cnp1 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_CNP1 WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'");
                                                                while ($row_posisikk_cnp1   = db2_fetch_assoc($posisikk_cnp1)) {
                                                                    $r_posisikk_cnp1[]      = "('" . TRIM(addslashes($row_posisikk_cnp1['PRODUCTIONORDERCODE'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_cnp1['OPERATIONCODE'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_cnp1['PROPROGRESSPROGRESSNUMBER'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_cnp1['DEMANDSTEPSTEPNUMBER'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_cnp1['PROGRESSTEMPLATECODE'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_cnp1['MULAI'])) . "',"
                                                                        . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                        . "'" . date('Y-m-d H:i:s') . "',"
                                                                        . "'" . 'Analisa KK' . "')";
                                                                }
                                                                if ($r_posisikk_cnp1) {
                                                                    $value_posisikk_cnp1        = implode(',', $r_posisikk_cnp1);
                                                                    $insert_posisikk_cnp1       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_cnp1(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_posisikk_cnp1");
                                                                }
                                                            ?>
                                                            <thead>
                                                                <?php
                                                                    ini_set("error_reporting", 1);
                                                                    $sqlDB2 = "SELECT
                                                                                    p.WORKCENTERCODE,
                                                                                    CASE
                                                                                        WHEN p.PRODRESERVATIONLINKGROUPCODE IS NULL THEN TRIM(p.OPERATIONCODE) 
                                                                                        WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE) 
                                                                                        ELSE p.PRODRESERVATIONLINKGROUPCODE
                                                                                    END	AS OPERATIONCODE,
                                                                                    TRIM(o.OPERATIONGROUPCODE) AS OPERATIONGROUPCODE,
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
                                                                                    -- AND NOT iptip.MULAI IS NULL AND NOT iptop.SELESAI IS NULL
                                                                                ORDER BY iptip.MULAI ASC";
                                                                    $stmt = db2_exec($conn1, $sqlDB2);
                                                                    $stmt2 = db2_exec($conn1, $sqlDB2);
                                                                    $stmt3 = db2_exec($conn1, $sqlDB2);
                                                                    $stmt4 = db2_exec($conn1, $sqlDB2);
                                                                    $stmt5 = db2_exec($conn1, $sqlDB2);
                                                                    $stmt6 = db2_exec($conn1, $sqlDB2);
                                                                    $stmt7 = db2_exec($conn1, $sqlDB2);
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
                                                                        <?php if ($cek_QA_DATA) : ?>
                                                                            <th style="text-align: center;"><?= $rowdb2['OPERATIONCODE']; ?></th>
                                                                        <?php endif; ?>
                                                                    <?php } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php while ($rowdb4 = db2_fetch_assoc($stmt4)) { ?>
                                                                        <?php
                                                                            $q_QA_DATA4  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                        WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                        AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                                        AND WORKCENTERCODE = '$rowdb4[WORKCENTERCODE]' 
                                                                                                                        AND OPERATIONCODE = '$rowdb4[OPERATIONCODE]' 
                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                        AND STATUS = 'Analisa KK'
                                                                                                                        ORDER BY LINE ASC");
                                                                            $cek_QA_DATA4    = mysqli_fetch_assoc($q_QA_DATA4);
                                                                        ?>
                                                                        <?php if ($cek_QA_DATA4) : ?>
                                                                            <th style="text-align: center; font-size:15px; background-color: #EEE6B3">
                                                                                <?php if ($rowdb4['OPERATIONCODE'] == 'INS3') : ?>
                                                                                    <?php
                                                                                        $q_mulai_ins3   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                            * 
                                                                                                                                        FROM
                                                                                                                                            `itxview_posisikk_tgl_in_prodorder_ins3_detaildemandstep` 
                                                                                                                                        WHERE
                                                                                                                                            productionordercode = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'
                                                                                                                                            AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                        ORDER BY
                                                                                                                                            MULAI ASC LIMIT 1");
                                                                                        $d_mulai_ins3   = mysqli_fetch_assoc($q_mulai_ins3);
                                                                                        echo $d_mulai_ins3['MULAI'];
                                                                                    ?>
                                                                                <?php elseif ($rowdb4['OPERATIONCODE'] == 'CNP1') : ?>
                                                                                    <?php
                                                                                        $q_mulai_cnp1   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                            * 
                                                                                                                                        FROM
                                                                                                                                            `itxview_posisikk_tgl_in_prodorder_cnp1_detaildemandstep` 
                                                                                                                                        WHERE
                                                                                                                                            productionordercode = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'
                                                                                                                                            AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                        ORDER BY
                                                                                                                                            MULAI ASC LIMIT 1");
                                                                                        $d_mulai_cnp1   = mysqli_fetch_assoc($q_mulai_cnp1);
                                                                                        echo $d_mulai_cnp1['MULAI'];
                                                                                    ?>
                                                                                <?php else : ?>
                                                                                    <?= $rowdb4['MULAI']; ?>
                                                                                <?php endif; ?>
                                                                                <br>
                                                                                <?php if ($rowdb4['OPERATIONCODE'] == 'INS3') : ?>
                                                                                    <?php
                                                                                    $q_mulai_ins3   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                        * 
                                                                                                                                    FROM
                                                                                                                                        `itxview_posisikk_tgl_in_prodorder_ins3_detaildemandstep` 
                                                                                                                                    WHERE
                                                                                                                                        productionordercode = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'
                                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                    ORDER BY
                                                                                                                                        MULAI DESC LIMIT 1");
                                                                                    $d_mulai_ins3   = mysqli_fetch_assoc($q_mulai_ins3);
                                                                                    echo $d_mulai_ins3['MULAI'];
                                                                                    ?>
                                                                                <?php elseif ($rowdb4['OPERATIONCODE'] == 'CNP1') : ?>
                                                                                    <?php
                                                                                    $q_mulai_cnp1   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                        * 
                                                                                                                                    FROM
                                                                                                                                        `itxview_posisikk_tgl_in_prodorder_cnp1_detaildemandstep` 
                                                                                                                                    WHERE
                                                                                                                                        productionordercode = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'
                                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                    ORDER BY
                                                                                                                                        MULAI DESC LIMIT 1");
                                                                                    $d_mulai_cnp1   = mysqli_fetch_assoc($q_mulai_cnp1);
                                                                                    echo $d_mulai_cnp1['MULAI'];
                                                                                    ?>
                                                                                <?php else : ?>
                                                                                    <?= $rowdb4['SELESAI']; ?>
                                                                                <?php endif; ?>
                                                                            </th>
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
                                                                        <?php if ($cek_QA_DATA2) : ?>
                                                                            <th style="text-align: center;"><?= $rowdb3['MESIN']; ?></th>
                                                                        <?php endif; ?>
                                                                    <?php } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php while ($rowdb5 = db2_fetch_assoc($stmt5)) { ?>
                                                                        <?php
                                                                            $q_QA_DATA5  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                        WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                        AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                                        AND WORKCENTERCODE = '$rowdb5[WORKCENTERCODE]' 
                                                                                                                        AND OPERATIONCODE = '$rowdb5[OPERATIONCODE]' 
                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                        AND STATUS = 'Analisa KK'
                                                                                                                        ORDER BY LINE ASC");
                                                                            $cek_QA_DATA5    = mysqli_fetch_assoc($q_QA_DATA5);
                                                                        ?>
                                                                        <?php if ($cek_QA_DATA5) : ?>
                                                                            <?php $opr = $rowdb5['OPERATIONCODE']; if(str_contains($opr, 'DYE')) : ?>
                                                                                <?php
                                                                                    $prod_order     = TRIM($d_ITXVIEWKK['PRODUCTIONORDERCODE']);
                                                                                    $prod_demand    = TRIM($demand);

                                                                                    $q_dye_montemp      = mysqli_query($con_db_dyeing, "SELECT
                                                                                                                                            a.id AS idm,
                                                                                                                                            b.id AS ids,
                                                                                                                                            b.no_resep 
                                                                                                                                        FROM
                                                                                                                                            tbl_montemp a
                                                                                                                                            LEFT JOIN tbl_schedule b ON a.id_schedule = b.id
                                                                                                                                            LEFT JOIN tbl_setting_mesin c ON b.nokk = c.nokk 
                                                                                                                                        WHERE
                                                                                                                                            b.nokk = '$prod_order' AND b.nodemand LIKE '%$prod_demand%'
                                                                                                                                        ORDER BY
                                                                                                                                            a.id DESC LIMIT 1 ");
                                                                                    $d_dye_montemp      = mysqli_fetch_assoc($q_dye_montemp);

                                                                                ?>
                                                                                <th style="text-align: center;">
                                                                                    <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/dye-itti/pages/cetak/cetak_monitoring_new.php?idkk=&no=<?= $d_dye_montemp['no_resep']; ?>&idm=<?php echo $d_dye_montemp['idm']; ?>&ids=<?php echo $d_dye_montemp['ids']; ?>" target="_blank">Monitoring <i class="icofont icofont-external-link"></i></a>
                                                                                    &ensp;
                                                                                    <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/laporan/dye_filter_bon_reservation.php?demand=<?= $demand; ?>&prod_order=<?= $d_ITXVIEWKK['PRODUCTIONORDERCODE']; ?>" target="_blank">Bon Resep <i class="icofont icofont-external-link"></i></a>
                                                                                </th>
                                                                            <?php else : ?>
                                                                                    <?php $opr_grup = $rowdb5['OPERATIONGROUPCODE']; if(str_contains($opr_grup, "FIN")) : ?>
                                                                                        <th style="text-align: center;">
                                                                                            <!-- <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/finishing2-new/reports/pages/reports-detail-stenter.php?FromAnalisa=FromAnalisa&prod_order=<?= TRIM($d_ITXVIEWKK['PRODUCTIONORDERCODE']); ?>&prod_demand=<?= TRIM($demand); ?>&tgl_in=<?= substr($rowdb5['MULAI'], 1, 10); ?>&tgl_out=<?= substr($rowdb5['SELESAI'], 1, 10); ?>" target="_blank">Detail proses <i class="icofont icofont-external-link"></i></a> -->
                                                                                        </th>
                                                                                    <?php else : ?>
                                                                                        <th style="text-align: center;">-</th>
                                                                                    <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    <?php } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php while ($rowdb7 = db2_fetch_assoc($stmt7)) { ?>
                                                                        <?php
                                                                            $q_QA_DATA7  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                        WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                        AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                                        AND WORKCENTERCODE = '$rowdb7[WORKCENTERCODE]' 
                                                                                                                        AND OPERATIONCODE = '$rowdb7[OPERATIONCODE]' 
                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                        AND STATUS = 'Analisa KK'
                                                                                                                        ORDER BY LINE ASC");
                                                                            $cek_QA_DATA7    = mysqli_fetch_assoc($q_QA_DATA7);
                                                                        ?>
                                                                        <?php if ($cek_QA_DATA7) : ?>
                                                                            <?php
                                                                                $q_routing  = mysqli_query($con_nowprd, "SELECT * FROM keterangan_leader 
                                                                                                                            WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                            AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]'
                                                                                                                            AND OPERATIONCODE = '$rowdb7[OPERATIONCODE]'");
                                                                                $d_routing  = mysqli_fetch_assoc($q_routing);
                                                                            ?>
                                                                            <td style="vertical-align: top; font-size:15px;">
                                                                                <?= substr($d_routing['KETERANGAN'], 0,35); ?><?php if(substr($d_routing['KETERANGAN'], 0,35)){ echo "<br>"; } ?>
                                                                                <?= substr($d_routing['KETERANGAN'], 35,70); ?><?php if(substr($d_routing['KETERANGAN'], 35,70)){ echo "<br>"; } ?>
                                                                                <?= substr($d_routing['KETERANGAN'], 70,105); ?><?php if(substr($d_routing['KETERANGAN'], 70,105)){ echo "<br>"; } ?>
                                                                                <?= substr($d_routing['KETERANGAN'], 105,140); ?><?php if(substr($d_routing['KETERANGAN'], 105,140)){ echo "<br>"; } ?>
                                                                                <?= substr($d_routing['KETERANGAN'], 140,175); ?><?php if(substr($d_routing['KETERANGAN'], 140,175)){ echo "<br>"; } ?>
                                                                                <?= substr($d_routing['KETERANGAN'], 175,210); ?><?php if(substr($d_routing['KETERANGAN'], 175,210)){ echo "<br>"; } ?>
                                                                                <?= substr($d_routing['KETERANGAN'], 210); ?><?php if(substr($d_routing['KETERANGAN'], 210)){ echo ""; } ?>
                                                                            </td>
                                                                        <?php endif; ?>
                                                                    <?php } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php while ($rowdb6 = db2_fetch_assoc($stmt6)) { ?>
                                                                        <?php
                                                                            $q_QA_DATA8  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                        WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                        AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                                        AND WORKCENTERCODE = '$rowdb6[WORKCENTERCODE]' 
                                                                                                                        AND OPERATIONCODE = '$rowdb6[OPERATIONCODE]' 
                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                        AND STATUS = 'Analisa KK'
                                                                                                                        ORDER BY LINE ASC");
                                                                            $cek_QA_DATA8    = mysqli_fetch_assoc($q_QA_DATA8);
                                                                        ?>
                                                                        <?php if ($cek_QA_DATA8) : ?>
                                                                            <?php
                                                                                $q_specs    = db2_exec($conn1, "SELECT 
                                                                                                                TRIM(a.NAMENAME) AS NAMENAME,
                                                                                                                a.VALUESTRING,
                                                                                                                floor(a.VALUEDECIMAL) AS VALUEDECIMAL
                                                                                                            FROM 
                                                                                                                PRODUCTIONSPECS p 
                                                                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID
                                                                                                            WHERE 
                                                                                                                OPERATIONCODE = '$rowdb6[OPERATIONCODE]' 
                                                                                                                AND SUBCODE01 = '$d_ITXVIEWKK[SUBCODE01]' 
                                                                                                                AND SUBCODE02 = '$d_ITXVIEWKK[SUBCODE02]' 
                                                                                                                AND SUBCODE03 ='$d_ITXVIEWKK[SUBCODE03]' 
                                                                                                                AND SUBCODE04 = '$d_ITXVIEWKK[SUBCODE04]'");
                                                                            ?>
                                                                            <td style="vertical-align: top; font-size:15px;">
                                                                                <b>Acuan Standart :</b> <br>
                                                                                <?php while ($d_specs = db2_fetch_assoc($q_specs)) {  ?>
                                                                                    <li><?= $d_specs['NAMENAME']; ?> : <?= $d_specs['VALUESTRING'].$d_specs['VALUEDECIMAL']; ?> </li>
                                                                                <?php } ?>
                                                                            </td>
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
                                                                        <?php if ($d_QA_DATAcek) : ?>
                                                                            <td style="vertical-align: top; font-size:15px;">
                                                                                <?php $q_QA_DATA7     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                                <?php $no = 1; while ($d_QA_DATA7 = mysqli_fetch_array($q_QA_DATA7)) : ?>
                                                                                    <?php $char_code = $d_QA_DATA7['CHARACTERISTICCODE']; ?>
                                                                                        <?php if(str_contains($char_code, 'GRB') != true && ($char_code == 'LEBAR' || $char_code == 'GRAMASI')) : ?>
                                                                                            <?= $no++ . ' : ' . $d_QA_DATA7['CHARACTERISTICCODE'] . ' = ' . $d_QA_DATA7['VALUEQUANTITY'] . '<br>'; ?>
                                                                                        <?php endif; ?>
                                                                                <?php endwhile; ?>
                                                                                <hr>
                                                                                <?php $q_QA_DATA3     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                                <?php $no = 1; while ($d_QA_DATA3 = mysqli_fetch_array($q_QA_DATA3)) : ?>
                                                                                    <?php $char_code = $d_QA_DATA3['CHARACTERISTICCODE']; ?>
                                                                                    <?php  if(str_contains($char_code, 'GRB') != true && $char_code <> 'LEBAR' && $char_code <> 'GRAMASI') : ?>
                                                                                        <?php   
                                                                                            if($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '1'){
                                                                                                $grouping_hue = 'A';
                                                                                            }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '2'){
                                                                                                $grouping_hue = 'B';
                                                                                            }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '3'){
                                                                                                $grouping_hue = 'C';
                                                                                            }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '4'){
                                                                                                $grouping_hue = 'D';
                                                                                            }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '1'){
                                                                                                $grouping_hue = 'Red';
                                                                                            }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '2'){
                                                                                                $grouping_hue = 'Yellow';
                                                                                            }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '3'){
                                                                                                $grouping_hue = 'Green';
                                                                                            }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '4'){
                                                                                                $grouping_hue = 'Blue';
                                                                                            }else{
                                                                                                $grouping_hue = $d_QA_DATA3['VALUEQUANTITY'];
                                                                                            }
                                                                                        ?>
                                                                                        <?= $no++ . ' : ' . $d_QA_DATA3['CHARACTERISTICCODE'] . ' = ' . $grouping_hue . '<br>'; ?>
                                                                                    <?php endif; ?>
                                                                                <?php endwhile; ?>
                                                                                <hr>
                                                                                <?php $q_QA_DATA6     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                                <?php $no = 1; while ($d_QA_DATA6 = mysqli_fetch_array($q_QA_DATA6)) : ?>
                                                                                    <?php $char_code = $d_QA_DATA6['CHARACTERISTICCODE']; ?>
                                                                                    <?php  if(str_contains($char_code, 'GRB')) : ?>
                                                                                        <?= $no++ . ' : ' . $d_QA_DATA6['CHARACTERISTICCODE'] . ' = ' . $d_QA_DATA6['VALUEQUANTITY'] . '<br>'; ?>
                                                                                    <?php endif; ?>
                                                                                <?php endwhile; ?>
                                                                            </td>
                                                                        <?php endif; ?>
                                                                    <?php } ?>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>

                                                    <hr>
                                                    <!-- LOOPING 2 UNTUK SALINAN -->
                                                    <?php
                                                        $q_looping2     = db2_exec($conn1, "SELECT
                                                                                                RIGHT(a.VALUESTRING, 8) AS PRODUCTIONDEMANDCODE
                                                                                            FROM
                                                                                                PRODUCTIONDEMAND p
                                                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'
                                                                                            WHERE
                                                                                                p.CODE = '$row_looping1[PRODUCTIONDEMANDCODE]'");
                                                    ?>
                                                    <?php while($row_looping2 = db2_fetch_assoc($q_looping2)) : ?>
                                                        <?php if($row_looping2['PRODUCTIONDEMANDCODE']) : ?>
                                                            <?php
                                                                $demand     = $row_looping2['PRODUCTIONDEMANDCODE'];

                                                                $q_ITXVIEWKK    = db2_exec($conn1, "SELECT * FROM ITXVIEWKK WHERE PRODUCTIONDEMANDCODE = '$demand'");
                                                                $d_ITXVIEWKK    = db2_fetch_assoc($q_ITXVIEWKK);

                                                                if($_GET['prod_order']){
                                                                    $prod_order     = $_GET['prod_order'];
                                                                }elseif($_POST['prod_order']) {
                                                                    $prod_order     = $_POST['prod_order'];
                                                                }else{
                                                                    $prod_order     = $d_ITXVIEWKK['PRODUCTIONORDERCODE'];
                                                                }

                                                                $sql_pelanggan_buyer     = db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$d_ITXVIEWKK[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                                                                                AND CODE = '$d_ITXVIEWKK[PROJECTCODE]'");
                                                                $dt_pelanggan_buyer        = db2_fetch_assoc($sql_pelanggan_buyer);

                                                                // itxview_detail_qa_data
                                                                $itxview_detail_qa_data     = db2_exec($conn1, "SELECT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                                AND OPERATIONCODE IN ('" . implode("','", $_POST['operation']) . "') 
                                                                                                                ORDER BY LINE ASC");
                                                                while ($row_itxview_detail_qa_data     = db2_fetch_assoc($itxview_detail_qa_data)) {
                                                                    $r_itxview_detail_qa_data[]        = "('" . TRIM(addslashes($row_itxview_detail_qa_data['PRODUCTIONDEMANDCODE'])) . "',"
                                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['PRODUCTIONORDERCODE'])) . "',"
                                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['WORKCENTERCODE'])) . "',"
                                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['OPERATIONCODE'])) . "',"
                                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['LINE'])) . "',"
                                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['QUALITYDOCUMENTHEADERNUMBERID'])) . "',"
                                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['CHARACTERISTICCODE'])) . "',"
                                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['LONGDESCRIPTION'])) . "',"
                                                                                                        . "'" . TRIM(addslashes($row_itxview_detail_qa_data['VALUEQUANTITY'])) . "',"
                                                                                                        . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                                                        . "'" . date('Y-m-d H:i:s') . "',"
                                                                                                        . "'" . 'Analisa KK' . "')";
                                                                }
                                                                if(!empty($r_itxview_detail_qa_data)){
                                                                    $value_itxview_detail_qa_data        = implode(',', $r_itxview_detail_qa_data);
                                                                    $insert_itxview_detail_qa_data       = mysqli_query($con_nowprd, "INSERT INTO itxview_detail_qa_data(PRODUCTIONDEMANDCODE,PRODUCTIONORDERCODE,WORKCENTERCODE,OPERATIONCODE,LINE,QUALITYDOCUMENTHEADERNUMBERID,CHARACTERISTICCODE,LONGDESCRIPTION,VALUEQUANTITY,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_itxview_detail_qa_data");
                                                                }
                                                            ?>
                                                            <center style="background-color: #e67e22; color: white;">
                                                                <i class="ti-angle-double-down"></i> 
                                                                <strong>Kartu Asli</strong>
                                                                <i class="ti-angle-double-down"></i> 
                                                            </center>
                                                            <table width="100%" style="border: 1px solid black; border-collapse: collapse;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Prod. Order</th>
                                                                        <th>:</th>
                                                                        <th><?= $d_ITXVIEWKK['PRODUCTIONORDERCODE']; ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Prod. Demand</th>
                                                                        <th>:</th>
                                                                        <th><?= $demand; ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>LOT Internal</th>
                                                                        <th>:</th>
                                                                        <th><?= $d_ITXVIEWKK['LOT']; ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Original PD Code</th>
                                                                        <th>:</th>
                                                                        <th><?= substr($d_ITXVIEWKK['ORIGINALPDCODE'], 4, 8); ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="vertical-align: text-top;">Item Code</th>
                                                                        <th style="vertical-align: text-top;">:</th>
                                                                        <th style="vertical-align: text-top; white-space: wrap;">
                                                                            <?= TRIM($d_ITXVIEWKK['SUBCODE02']) . '-' . TRIM($d_ITXVIEWKK['SUBCODE03']); ?>
                                                                            <?= substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 0, 200); ?><?php if (substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 0, 200)) {
                                                                                                                                        echo "<br>";
                                                                                                                                    } ?>
                                                                            <?= substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 201); ?><?php if (substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 201)) {
                                                                                                                                    echo "<br>";
                                                                                                                                } ?>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="vertical-align: text-top;">Lebar x Gramasi Kain Jadi</th>
                                                                        <th style="vertical-align: text-top;">:</th>
                                                                        <th style="vertical-align: text-top;">
                                                                            <?php 
                                                                                $q_lebar = db2_exec($conn1, "SELECT * FROM ITXVIEWLEBAR WHERE SALESORDERCODE = '$d_ITXVIEWKK[BONORDER]' AND ORDERLINE = '$d_ITXVIEWKK[ORDERLINE]'");
                                                                                $d_lebar = db2_fetch_assoc($q_lebar);
                                                                            ?>
                                                                            <?php 
                                                                                $q_gramasi = db2_exec($conn1, "SELECT * FROM ITXVIEWGRAMASI WHERE SALESORDERCODE = '$d_ITXVIEWKK[BONORDER]' AND ORDERLINE = '$d_ITXVIEWKK[ORDERLINE]'");
                                                                                $d_gramasi = db2_fetch_assoc($q_gramasi);
                                                                            ?>
                                                                            <?php 
                                                                                if($d_gramasi['GRAMASI_KFF']){
                                                                                    $gramasi = number_format($d_gramasi['GRAMASI_KFF'], 0);
                                                                                }elseif($d_gramasi['GRAMASI_FKF']){
                                                                                    $gramasi = number_format($d_gramasi['GRAMASI_FKF'], 0);
                                                                                }else{
                                                                                    $gramasi = '-';
                                                                                }
                                                                            ?>
                                                                            <?= number_format($d_lebar['LEBAR'],0).' x '.$gramasi; ?>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="vertical-align: text-top;">Lebar x Gramasi Inspection</th>
                                                                        <th style="vertical-align: text-top;">:</th>
                                                                        <th style="vertical-align: text-top;">
                                                                            <?php
                                                                                $q_lg_INS3  = db2_exec($conn1, "SELECT
                                                                                                                    e.ELEMENTCODE,
                                                                                                                    e.WIDTHGROSS,
                                                                                                                    a.VALUEDECIMAL 
                                                                                                                FROM
                                                                                                                    ELEMENTSINSPECTION e 
                                                                                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = e.ABSUNIQUEID AND a.FIELDNAME = 'GSM'
                                                                                                                WHERE
                                                                                                                    e.ELEMENTCODE LIKE '$demand%'
                                                                                                                ORDER BY 
                                                                                                                    e.INSPECTIONSTARTDATETIME ASC LIMIT 1");
                                                                                $d_lg_INS3  = db2_fetch_assoc($q_lg_INS3);

                                                                                echo $d_lg_INS3['WIDTHGROSS'];
                                                                                if($d_lg_INS3['VALUEDECIMAL']){
                                                                                    echo ' x '.$d_lg_INS3['VALUEDECIMAL'];
                                                                                }else{
                                                                                    echo ' x ...' ;
                                                                                }
                                                                            ?>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="vertical-align: text-top;">Lebar x Gramasi Standart Greige</th>
                                                                        <th style="vertical-align: text-top;">:</th>
                                                                        <th style="vertical-align: text-top;">
                                                                            <?php
                                                                            $q_lg_standart  = db2_exec($conn1, "SELECT 
                                                                                                                    a.VALUEDECIMAL AS LEBAR,
                                                                                                                    a2.VALUEDECIMAL AS GRAMASI
                                                                                                                FROM 
                                                                                                                    PRODUCT p 
                                                                                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'Width'
                                                                                                                LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'GSM'
                                                                                                                WHERE 
                                                                                                                    SUBCODE01 = '$d_ITXVIEWKK[SUBCODE01]' 
                                                                                                                    AND SUBCODE02 = '$d_ITXVIEWKK[SUBCODE02]' 
                                                                                                                    AND SUBCODE03 = '$d_ITXVIEWKK[SUBCODE03]'
                                                                                                                    AND SUBCODE04 = '$d_ITXVIEWKK[SUBCODE04]' 
                                                                                                                    AND ITEMTYPECODE = 'KGF'");
                                                                            $d_lg_standart  = db2_fetch_assoc($q_lg_standart);
                                                                            echo number_format($d_lg_standart['LEBAR'], 0) . ' x ' . number_format($d_lg_standart['GRAMASI'], 0);
                                                                            ?>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="vertical-align: text-top;">Gauge x Diameter Mesin (inch) </th>
                                                                        <th style="vertical-align: text-top;">:</th>
                                                                        <th style="vertical-align: text-top;">
                                                                            <?php
                                                                            $q_lg_standart  = db2_exec($conn1, "SELECT 
                                                                                                                    a.VALUEDECIMAL AS LEBAR,
                                                                                                                    a2.VALUEDECIMAL AS GRAMASI
                                                                                                                FROM 
                                                                                                                    PRODUCT p 
                                                                                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'Gauge'
                                                                                                                LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'Diameter'
                                                                                                                WHERE 
                                                                                                                    SUBCODE01 = '$d_ITXVIEWKK[SUBCODE01]' 
                                                                                                                    AND SUBCODE02 = '$d_ITXVIEWKK[SUBCODE02]' 
                                                                                                                    AND SUBCODE03 = '$d_ITXVIEWKK[SUBCODE03]'
                                                                                                                    AND SUBCODE04 = '$d_ITXVIEWKK[SUBCODE04]' 
                                                                                                                    AND ITEMTYPECODE = 'KGF'");
                                                                            $d_lg_standart  = db2_fetch_assoc($q_lg_standart);
                                                                            echo number_format($d_lg_standart['LEBAR'], 0) . ' x ' . number_format($d_lg_standart['GRAMASI'], 0);
                                                                            ?>
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
                                                                                                                        a2.VALUESTRING AS MESIN_KNT,
                                                                                                                        s.PROJECTCODE,
                                                                                                                        floor(e.WIDTHNET) AS LEBAR, -- Untuk laporan mr. james
                                                                                                                        floor(a.VALUEDECIMAL) AS GRAMASI -- Untuk laporan mr. james
                                                                                                                    FROM  
                                                                                                                        STOCKTRANSACTION s 
                                                                                                                    LEFT JOIN STOCKTRANSACTION s2 ON s2.ITEMELEMENTCODE = s.ITEMELEMENTCODE AND s2.TEMPLATECODE = '204'
                                                                                                                    LEFT JOIN ELEMENTSINSPECTION e ON e.DEMANDCODE = s2.LOTCODE AND e.ELEMENTCODE = s2.ITEMELEMENTCODE -- Untuk laporan mr. james
                                                                                                                    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = e.ABSUNIQUEID AND a.FIELDNAME = 'GSM' -- Untuk laporan mr. james
                                                                                                                    LEFT JOIN PRODUCTIONDEMAND p ON p.CODE = s2.LOTCODE
                                                                                                                    LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'MachineNoCode'
                                                                                                                    WHERE
                                                                                                                        s.TEMPLATECODE = '120' 
                                                                                                                        AND 
                                                                                                                        s.ORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' -- PRODUCTION ORDER 
                                                                                                                        AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '0'");
                                                                                $cek_lg_element = db2_fetch_assoc($q_lg_element);
                                                                            ?>
                                                                            <?php if ($cek_lg_element) : ?>
                                                                                *From Element
                                                                                <table width="30%" style="border:1px solid black;border-collapse:collapse;">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">Tanggal Terima Kain</th>
                                                                                            <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">LOTCODE</th>
                                                                                            <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">MESIN KNT</th>
                                                                                            <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">PROJECTCODE</th>
                                                                                            <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">LEBAR x GRAMASI</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php while ($d_lg_element = db2_fetch_assoc($q_lg_element)) { ?>
                                                                                            <tr>
                                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['TRANSACTIONDATE']; ?></td>
                                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['LOTCODE']; ?></td>
                                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['MESIN_KNT']; ?></td>
                                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['PROJECTCODE']; ?></td>
                                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['LEBAR'] . ' x ' . $d_lg_element['GRAMASI']; ?></td>
                                                                                            </tr>
                                                                                        <?php } ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            <?php endif; ?>

                                                                            <?php
                                                                                $q_lg_element_cut   = db2_exec($conn1, "SELECT DISTINCT
                                                                                                                            s4.TRANSACTIONDATE,
                                                                                                                            s4.LOTCODE,
                                                                                                                            a2.VALUESTRING AS MESIN_KNT,
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
                                                                                                                        LEFT JOIN PRODUCTIONDEMAND p ON p.CODE = s2.LOTCODE
                                                                                                                        LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'MachineNoCode'
                                                                                                                        WHERE
                                                                                                                            s.TEMPLATECODE = '120' 
                                                                                                                            AND s.ORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' -- PRODUCTION NUMBER
                                                                                                                            AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '8'");
                                                                                $cek_lg_element_cut = db2_fetch_assoc($q_lg_element_cut);
                                                                            ?>
                                                                            <?php if (!empty($cek_lg_element_cut['LEBAR'])) : ?>
                                                                                *From Cutting Element
                                                                                <table width="30%" style="border:1px solid black;border-collapse:collapse;">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">Tanggal Terima Kain</th>
                                                                                            <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">LOTCODE</th>
                                                                                            <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">MESIN KNT</th>
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
                                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['MESIN_KNT']; ?></td>
                                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['PROJECTCODE']; ?></td>
                                                                                                <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['LEBAR'] . ' x ' . $d_lg_element_cut['GRAMASI']; ?></td>
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
                                                                                ini_set("error_reporting", 1);
                                                                                $sql_benang = "SELECT DISTINCT
                                                                                                    TRIM(p.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE
                                                                                                FROM  
                                                                                                    STOCKTRANSACTION s 
                                                                                                LEFT JOIN STOCKTRANSACTION s2 ON s2.ITEMELEMENTCODE = s.ITEMELEMENTCODE AND s2.TEMPLATECODE = '204'
                                                                                                LEFT JOIN PRODUCTIONRESERVATION p ON p.ORDERCODE = s2.LOTCODE 
                                                                                                WHERE
                                                                                                    s.TEMPLATECODE = '120' 
                                                                                                    AND 
                                                                                                    s.ORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' -- PRODUCTION ORDER 
                                                                                                    AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '0'";
                                                                                $q_benang   = db2_exec($conn1, $sql_benang);
                                                                                $q_benang2   = db2_exec($conn1, $sql_benang);
                                                                                $no = 1;
                                                                                $cekada_benang  = db2_fetch_assoc($q_benang);                                                                            
                                                                            ?>
                                                                            <?php if(!empty($cekada_benang['PRODUCTIONORDERCODE'])){ ?>
                                                                                <?php   
                                                                                    while ($d_benang = db2_fetch_assoc($q_benang2)) {
                                                                                        $r_benang[]      = "'".$d_benang['PRODUCTIONORDERCODE']."'";
                                                                                    }
                                                                                    $value_benang        = implode(',', $r_benang);

                                                                                    $q_lotcode  = db2_exec($conn1, "SELECT 
                                                                                                                        LISTAGG(TRIM(LOTCODE), ', ') AS LOTCODE,
                                                                                                                        LONGDESCRIPTION
                                                                                                                        FROM
                                                                                                                        (SELECT DISTINCT 
                                                                                                                                    CASE
                                                                                                                                        WHEN LOCATE('+', s.LOTCODE) > 1 THEN SUBSTR(s.LOTCODE, 1, LOCATE('+', s.LOTCODE)-1)
                                                                                                                                        ELSE s.LOTCODE
                                                                                                                                    END AS LOTCODE,
                                                                                                                                    p2.LONGDESCRIPTION
                                                                                                                                FROM
                                                                                                                                    STOCKTRANSACTION s
                                                                                                                                LEFT JOIN PRODUCT p2 ON p2.ITEMTYPECODE = s.ITEMTYPECODE AND NOT 
                                                                                                                                                            p2.ITEMTYPECODE = 'DYC' AND NOT 
                                                                                                                                                            p2.ITEMTYPECODE = 'WTR' AND 
                                                                                                                                                            p2.SUBCODE01 = s.DECOSUBCODE01  AND 
                                                                                                                                                            p2.SUBCODE02 = s.DECOSUBCODE02 AND
                                                                                                                                                            p2.SUBCODE03 = s.DECOSUBCODE03 AND 
                                                                                                                                                            p2.SUBCODE04 = s.DECOSUBCODE04 AND
                                                                                                                                                            p2.SUBCODE05 = s.DECOSUBCODE05 AND 
                                                                                                                                                            p2.SUBCODE06 = s.DECOSUBCODE06 AND
                                                                                                                                                            p2.SUBCODE07 = s.DECOSUBCODE07 
                                                                                                                                WHERE
                                                                                                                                    ORDERCODE IN ($value_benang)
                                                                                                                                    AND (TEMPLATECODE = '125' OR TEMPLATECODE = '120'))
                                                                                                                        GROUP BY
                                                                                                                            LONGDESCRIPTION");
                                                                                    while ($d_lotcode = db2_fetch_assoc($q_lotcode)) {
                                                                                ?>
                                                                                    <span style="color:#000000; font-size:12px; font-family: Microsoft Sans Serif;">
                                                                                        <?= $no++; ?>. <?= $d_lotcode['LONGDESCRIPTION']; ?> - <?= $d_lotcode['LOTCODE']; ?>
                                                                                    </span><br>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="vertical-align: text-top;">Alur Normal</th>
                                                                        <th style="vertical-align: text-top;">:</th>
                                                                        <th style="vertical-align: text-top; white-space: wrap;">
                                                                            <?php
                                                                                $q_routing  = db2_exec($conn1, "SELECT
                                                                                                                    TRIM(r.OPERATIONCODE) AS OPERATIONCODE,
                                                                                                                    TRIM(r.LONGDESCRIPTION) AS DESCRIPTION 
                                                                                                                FROM
                                                                                                                    PRODUCTIONDEMAND p
                                                                                                                LEFT JOIN ROUTINGSTEP r ON r.ROUTINGNUMBERID = p.ROUTINGNUMBERID 
                                                                                                                LEFT JOIN OPERATION o ON o.CODE = r.OPERATIONCODE 
                                                                                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = o.ABSUNIQUEID AND a.FIELDNAME = 'AlurProses'
                                                                                                                WHERE 
                                                                                                                    p.CODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' AND a.VALUESTRING = '2'
                                                                                                                ORDER BY
                                                                                                                    r.SEQUENCE ASC");
                                                                            ?>
                                                                            <?php while ($d_routing = db2_fetch_assoc($q_routing)) { ?>
                                                                                <span style="background-color: #D0F39A;"><?= $d_routing['OPERATIONCODE']; ?></span>
                                                                            <?php } ?>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="vertical-align: text-top;">Hasil test quality</th>
                                                                        <th style="vertical-align: text-top;">:</th>
                                                                        <th style="vertical-align: text-top;">
                                                                            <?php
                                                                                $q_cari_tq  = mysqli_query($con_db_qc, "SELECT * FROM tbl_tq_nokk WHERE nodemand = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' ORDER BY id DESC");
                                                                            ?>
                                                                            <?php while ($row_tq = mysqli_fetch_array($q_cari_tq)) { ?>
                                                                                <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_result.php?idkk=<?= $row_tq['id']; ?>&noitem=<?= $row_tq['no_item']; ?>&nohanger=<?= $row_tq['no_hanger']; ?>" target="_blank">Detail test quality (<?= $row_tq['no_test']; ?>)<i class="icofont icofont-external-link"></i></a><br>
                                                                            <?php } ?>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="vertical-align: text-top;">Hasil test inspect</th>
                                                                        <th style="vertical-align: text-top;">:</th>
                                                                        <th style="vertical-align: text-top;">
                                                                            <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_inspectpackingreport.php?demand=<?= TRIM($demand); ?>&ispacking=true" target="_blank">Inspect Report <i class="icofont icofont-external-link"></i></a><br>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="vertical-align: text-top;">Hasil test inspect</th>
                                                                        <th style="vertical-align: text-top;">:</th>
                                                                        <th style="vertical-align: text-top;">
                                                                            <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_inspectpackingreport.php?demand=<?= TRIM($demand); ?>&ispacking=true" target="_blank">Inspect Report <i class="icofont icofont-external-link"></i></a><br>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="vertical-align: text-top;">Detail bagi kain</th>
                                                                        <th style="vertical-align: text-top;">:</th>
                                                                        <th style="vertical-align: text-top;">
                                                                            <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/nowgkg/pages/cetak/cetakbagikain.php?demandno=<?= TRIM($demand); ?>" target="_blank">Click here! <i class="icofont icofont-external-link"></i></a><br>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="vertical-align: text-top;">Detail quantity packing</th>
                                                                        <th style="vertical-align: text-top;">:</th>
                                                                        <th style="vertical-align: text-top;">
                                                                            <form action="https://online.indotaichen.com/nowqcf/CekKainDemand" method="post" target="_blank">
                                                                                <input name="nodemand" value="<?= TRIM($demand); ?>" type="hidden" class="form-control form-control-sm" id="" required>
                                                                                <button class="btn-link" style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" type="submit">Click here! <i class="icofont icofont-external-link"></i></button>
                                                                            </form>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                            <span>Alur Aktual</span>
                                                            <div style="overflow-x:auto;">
                                                                <table width="100%" border="1">
                                                                    <?php
                                                                        ini_set("error_reporting", 1);
                                                                        session_start();
                                                                        require_once "koneksi.php";

                                                                        // itxview_posisikk_tgl_in_prodorder_ins3
                                                                        $posisikk_ins3 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_INS3 WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'");
                                                                        while ($row_posisikk_ins3   = db2_fetch_assoc($posisikk_ins3)) {
                                                                            $r_posisikk_ins3[]      = "('" . TRIM(addslashes($row_posisikk_ins3['PRODUCTIONORDERCODE'])) . "',"
                                                                                . "'" . TRIM(addslashes($row_posisikk_ins3['OPERATIONCODE'])) . "',"
                                                                                . "'" . TRIM(addslashes($row_posisikk_ins3['PROPROGRESSPROGRESSNUMBER'])) . "',"
                                                                                . "'" . TRIM(addslashes($row_posisikk_ins3['DEMANDSTEPSTEPNUMBER'])) . "',"
                                                                                . "'" . TRIM(addslashes($row_posisikk_ins3['PROGRESSTEMPLATECODE'])) . "',"
                                                                                . "'" . TRIM(addslashes($row_posisikk_ins3['MULAI'])) . "',"
                                                                                . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                                . "'" . date('Y-m-d H:i:s') . "',"
                                                                                . "'" . 'Analisa KK' . "')";
                                                                        }
                                                                        if ($r_posisikk_ins3) {
                                                                            $value_posisikk_ins3        = implode(',', $r_posisikk_ins3);
                                                                            $insert_posisikk_ins3       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_ins3(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_posisikk_ins3");
                                                                        }

                                                                        // itxview_posisikk_tgl_in_prodorder_cnp1
                                                                        $posisikk_cnp1 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_CNP1 WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'");
                                                                        while ($row_posisikk_cnp1   = db2_fetch_assoc($posisikk_cnp1)) {
                                                                            $r_posisikk_cnp1[]      = "('" . TRIM(addslashes($row_posisikk_cnp1['PRODUCTIONORDERCODE'])) . "',"
                                                                                . "'" . TRIM(addslashes($row_posisikk_cnp1['OPERATIONCODE'])) . "',"
                                                                                . "'" . TRIM(addslashes($row_posisikk_cnp1['PROPROGRESSPROGRESSNUMBER'])) . "',"
                                                                                . "'" . TRIM(addslashes($row_posisikk_cnp1['DEMANDSTEPSTEPNUMBER'])) . "',"
                                                                                . "'" . TRIM(addslashes($row_posisikk_cnp1['PROGRESSTEMPLATECODE'])) . "',"
                                                                                . "'" . TRIM(addslashes($row_posisikk_cnp1['MULAI'])) . "',"
                                                                                . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                                . "'" . date('Y-m-d H:i:s') . "',"
                                                                                . "'" . 'Analisa KK' . "')";
                                                                        }
                                                                        if ($r_posisikk_cnp1) {
                                                                            $value_posisikk_cnp1        = implode(',', $r_posisikk_cnp1);
                                                                            $insert_posisikk_cnp1       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_cnp1(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_posisikk_cnp1");
                                                                        }
                                                                    ?>
                                                                    <thead>
                                                                        <?php
                                                                            ini_set("error_reporting", 1);
                                                                            $sqlDB2 = "SELECT
                                                                                            p.WORKCENTERCODE,
                                                                                            CASE
                                                                                                WHEN p.PRODRESERVATIONLINKGROUPCODE IS NULL THEN TRIM(p.OPERATIONCODE) 
                                                                                                WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE) 
                                                                                                ELSE p.PRODRESERVATIONLINKGROUPCODE
                                                                                            END	AS OPERATIONCODE,
                                                                                            TRIM(o.OPERATIONGROUPCODE) AS OPERATIONGROUPCODE,
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
                                                                                            -- AND NOT iptip.MULAI IS NULL AND NOT iptop.SELESAI IS NULL
                                                                                        ORDER BY iptip.MULAI ASC";
                                                                            $stmt = db2_exec($conn1, $sqlDB2);
                                                                            $stmt2 = db2_exec($conn1, $sqlDB2);
                                                                            $stmt3 = db2_exec($conn1, $sqlDB2);
                                                                            $stmt4 = db2_exec($conn1, $sqlDB2);
                                                                            $stmt5 = db2_exec($conn1, $sqlDB2);
                                                                            $stmt6 = db2_exec($conn1, $sqlDB2);
                                                                            $stmt7 = db2_exec($conn1, $sqlDB2);
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
                                                                                <?php if ($cek_QA_DATA) : ?>
                                                                                    <th style="text-align: center;"><?= $rowdb2['OPERATIONCODE']; ?></th>
                                                                                <?php endif; ?>
                                                                            <?php } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php while ($rowdb4 = db2_fetch_assoc($stmt4)) { ?>
                                                                                <?php
                                                                                    $q_QA_DATA4  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                                WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                                AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                                                AND WORKCENTERCODE = '$rowdb4[WORKCENTERCODE]' 
                                                                                                                                AND OPERATIONCODE = '$rowdb4[OPERATIONCODE]' 
                                                                                                                                AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                AND STATUS = 'Analisa KK'
                                                                                                                                ORDER BY LINE ASC");
                                                                                    $cek_QA_DATA4    = mysqli_fetch_assoc($q_QA_DATA4);
                                                                                ?>
                                                                                <?php if ($cek_QA_DATA4) : ?>
                                                                                    <th style="text-align: center; font-size:15px; background-color: #EEE6B3">
                                                                                        <?php if ($rowdb4['OPERATIONCODE'] == 'INS3') : ?>
                                                                                            <?php
                                                                                                $q_mulai_ins3   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                                    * 
                                                                                                                                                FROM
                                                                                                                                                    `itxview_posisikk_tgl_in_prodorder_ins3_detaildemandstep` 
                                                                                                                                                WHERE
                                                                                                                                                    productionordercode = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'
                                                                                                                                                    AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                                ORDER BY
                                                                                                                                                    MULAI ASC LIMIT 1");
                                                                                                $d_mulai_ins3   = mysqli_fetch_assoc($q_mulai_ins3);
                                                                                                echo $d_mulai_ins3['MULAI'];
                                                                                            ?>
                                                                                        <?php elseif ($rowdb4['OPERATIONCODE'] == 'CNP1') : ?>
                                                                                            <?php
                                                                                                $q_mulai_cnp1   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                                    * 
                                                                                                                                                FROM
                                                                                                                                                    `itxview_posisikk_tgl_in_prodorder_cnp1_detaildemandstep` 
                                                                                                                                                WHERE
                                                                                                                                                    productionordercode = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'
                                                                                                                                                    AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                                ORDER BY
                                                                                                                                                    MULAI ASC LIMIT 1");
                                                                                                $d_mulai_cnp1   = mysqli_fetch_assoc($q_mulai_cnp1);
                                                                                                echo $d_mulai_cnp1['MULAI'];
                                                                                            ?>
                                                                                        <?php else : ?>
                                                                                            <?= $rowdb4['MULAI']; ?>
                                                                                        <?php endif; ?>
                                                                                        <br>
                                                                                        <?php if ($rowdb4['OPERATIONCODE'] == 'INS3') : ?>
                                                                                            <?php
                                                                                            $q_mulai_ins3   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                                * 
                                                                                                                                            FROM
                                                                                                                                                `itxview_posisikk_tgl_in_prodorder_ins3_detaildemandstep` 
                                                                                                                                            WHERE
                                                                                                                                                productionordercode = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'
                                                                                                                                                AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                            ORDER BY
                                                                                                                                                MULAI DESC LIMIT 1");
                                                                                            $d_mulai_ins3   = mysqli_fetch_assoc($q_mulai_ins3);
                                                                                            echo $d_mulai_ins3['MULAI'];
                                                                                            ?>
                                                                                        <?php elseif ($rowdb4['OPERATIONCODE'] == 'CNP1') : ?>
                                                                                            <?php
                                                                                            $q_mulai_cnp1   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                                * 
                                                                                                                                            FROM
                                                                                                                                                `itxview_posisikk_tgl_in_prodorder_cnp1_detaildemandstep` 
                                                                                                                                            WHERE
                                                                                                                                                productionordercode = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]'
                                                                                                                                                AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                            ORDER BY
                                                                                                                                                MULAI DESC LIMIT 1");
                                                                                            $d_mulai_cnp1   = mysqli_fetch_assoc($q_mulai_cnp1);
                                                                                            echo $d_mulai_cnp1['MULAI'];
                                                                                            ?>
                                                                                        <?php else : ?>
                                                                                            <?= $rowdb4['SELESAI']; ?>
                                                                                        <?php endif; ?>
                                                                                    </th>
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
                                                                                <?php if ($cek_QA_DATA2) : ?>
                                                                                    <th style="text-align: center;"><?= $rowdb3['MESIN']; ?></th>
                                                                                <?php endif; ?>
                                                                            <?php } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php while ($rowdb5 = db2_fetch_assoc($stmt5)) { ?>
                                                                                <?php
                                                                                    $q_QA_DATA5  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                                WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                                AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                                                AND WORKCENTERCODE = '$rowdb5[WORKCENTERCODE]' 
                                                                                                                                AND OPERATIONCODE = '$rowdb5[OPERATIONCODE]' 
                                                                                                                                AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                AND STATUS = 'Analisa KK'
                                                                                                                                ORDER BY LINE ASC");
                                                                                    $cek_QA_DATA5    = mysqli_fetch_assoc($q_QA_DATA5);
                                                                                ?>
                                                                                <?php if ($cek_QA_DATA5) : ?>
                                                                                    <?php $opr = $rowdb5['OPERATIONCODE']; if(str_contains($opr, 'DYE')) : ?>
                                                                                        <?php
                                                                                            $prod_order     = TRIM($d_ITXVIEWKK['PRODUCTIONORDERCODE']);
                                                                                            $prod_demand    = TRIM($demand);

                                                                                            $q_dye_montemp      = mysqli_query($con_db_dyeing, "SELECT
                                                                                                                                                    a.id AS idm,
                                                                                                                                                    b.id AS ids,
                                                                                                                                                    b.no_resep 
                                                                                                                                                FROM
                                                                                                                                                    tbl_montemp a
                                                                                                                                                    LEFT JOIN tbl_schedule b ON a.id_schedule = b.id
                                                                                                                                                    LEFT JOIN tbl_setting_mesin c ON b.nokk = c.nokk 
                                                                                                                                                WHERE
                                                                                                                                                    b.nokk = '$prod_order' AND b.nodemand LIKE '%$prod_demand%'
                                                                                                                                                ORDER BY
                                                                                                                                                    a.id DESC LIMIT 1 ");
                                                                                            $d_dye_montemp      = mysqli_fetch_assoc($q_dye_montemp);

                                                                                        ?>
                                                                                        <th style="text-align: center;">
                                                                                            <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/dye-itti/pages/cetak/cetak_monitoring_new.php?idkk=&no=<?= $d_dye_montemp['no_resep']; ?>&idm=<?php echo $d_dye_montemp['idm']; ?>&ids=<?php echo $d_dye_montemp['ids']; ?>" target="_blank">Monitoring <i class="icofont icofont-external-link"></i></a>
                                                                                            &ensp;
                                                                                            <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/laporan/dye_filter_bon_reservation.php?demand=<?= $demand; ?>&prod_order=<?= $d_ITXVIEWKK['PRODUCTIONORDERCODE']; ?>" target="_blank">Bon Resep <i class="icofont icofont-external-link"></i></a>
                                                                                        </th>
                                                                                    <?php else : ?>
                                                                                            <?php $opr_grup = $rowdb5['OPERATIONGROUPCODE']; if(str_contains($opr_grup, "FIN")) : ?>
                                                                                                <th style="text-align: center;">
                                                                                                    <!-- <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/finishing2-new/reports/pages/reports-detail-stenter.php?FromAnalisa=FromAnalisa&prod_order=<?= TRIM($d_ITXVIEWKK['PRODUCTIONORDERCODE']); ?>&prod_demand=<?= TRIM($demand); ?>&tgl_in=<?= substr($rowdb5['MULAI'], 1, 10); ?>&tgl_out=<?= substr($rowdb5['SELESAI'], 1, 10); ?>" target="_blank">Detail proses <i class="icofont icofont-external-link"></i></a> -->
                                                                                                </th>
                                                                                            <?php else : ?>
                                                                                                <th style="text-align: center;">-</th>
                                                                                            <?php endif; ?>
                                                                                    <?php endif; ?>
                                                                                <?php endif; ?>
                                                                            <?php } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php while ($rowdb7 = db2_fetch_assoc($stmt7)) { ?>
                                                                                <?php
                                                                                    $q_QA_DATA7  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                                WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                                AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                                                AND WORKCENTERCODE = '$rowdb7[WORKCENTERCODE]' 
                                                                                                                                AND OPERATIONCODE = '$rowdb7[OPERATIONCODE]' 
                                                                                                                                AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                AND STATUS = 'Analisa KK'
                                                                                                                                ORDER BY LINE ASC");
                                                                                    $cek_QA_DATA7    = mysqli_fetch_assoc($q_QA_DATA7);
                                                                                ?>
                                                                                <?php if ($cek_QA_DATA7) : ?>
                                                                                    <?php
                                                                                        $q_routing  = mysqli_query($con_nowprd, "SELECT * FROM keterangan_leader 
                                                                                                                                    WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                                    AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]'
                                                                                                                                    AND OPERATIONCODE = '$rowdb7[OPERATIONCODE]'");
                                                                                        $d_routing  = mysqli_fetch_assoc($q_routing);
                                                                                    ?>
                                                                                    <td style="vertical-align: top; font-size:15px;">
                                                                                        <?= substr($d_routing['KETERANGAN'], 0,35); ?><?php if(substr($d_routing['KETERANGAN'], 0,35)){ echo "<br>"; } ?>
                                                                                        <?= substr($d_routing['KETERANGAN'], 35,70); ?><?php if(substr($d_routing['KETERANGAN'], 35,70)){ echo "<br>"; } ?>
                                                                                        <?= substr($d_routing['KETERANGAN'], 70,105); ?><?php if(substr($d_routing['KETERANGAN'], 70,105)){ echo "<br>"; } ?>
                                                                                        <?= substr($d_routing['KETERANGAN'], 105,140); ?><?php if(substr($d_routing['KETERANGAN'], 105,140)){ echo "<br>"; } ?>
                                                                                        <?= substr($d_routing['KETERANGAN'], 140,175); ?><?php if(substr($d_routing['KETERANGAN'], 140,175)){ echo "<br>"; } ?>
                                                                                        <?= substr($d_routing['KETERANGAN'], 175,210); ?><?php if(substr($d_routing['KETERANGAN'], 175,210)){ echo "<br>"; } ?>
                                                                                        <?= substr($d_routing['KETERANGAN'], 210); ?><?php if(substr($d_routing['KETERANGAN'], 210)){ echo ""; } ?>
                                                                                    </td>
                                                                                <?php endif; ?>
                                                                            <?php } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php while ($rowdb6 = db2_fetch_assoc($stmt6)) { ?>
                                                                                <?php
                                                                                    $q_QA_DATA8  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                                WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                                                AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                                                AND WORKCENTERCODE = '$rowdb6[WORKCENTERCODE]' 
                                                                                                                                AND OPERATIONCODE = '$rowdb6[OPERATIONCODE]' 
                                                                                                                                AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                AND STATUS = 'Analisa KK'
                                                                                                                                ORDER BY LINE ASC");
                                                                                    $cek_QA_DATA8    = mysqli_fetch_assoc($q_QA_DATA8);
                                                                                ?>
                                                                                <?php if ($cek_QA_DATA8) : ?>
                                                                                    <?php
                                                                                        $q_specs    = db2_exec($conn1, "SELECT 
                                                                                                                        TRIM(a.NAMENAME) AS NAMENAME,
                                                                                                                        a.VALUESTRING,
                                                                                                                        floor(a.VALUEDECIMAL) AS VALUEDECIMAL
                                                                                                                    FROM 
                                                                                                                        PRODUCTIONSPECS p 
                                                                                                                    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID
                                                                                                                    WHERE 
                                                                                                                        OPERATIONCODE = '$rowdb6[OPERATIONCODE]' 
                                                                                                                        AND SUBCODE01 = '$d_ITXVIEWKK[SUBCODE01]' 
                                                                                                                        AND SUBCODE02 = '$d_ITXVIEWKK[SUBCODE02]' 
                                                                                                                        AND SUBCODE03 ='$d_ITXVIEWKK[SUBCODE03]' 
                                                                                                                        AND SUBCODE04 = '$d_ITXVIEWKK[SUBCODE04]'");
                                                                                    ?>
                                                                                    <td style="vertical-align: top; font-size:15px;">
                                                                                        <b>Acuan Standart :</b> <br>
                                                                                        <?php while ($d_specs = db2_fetch_assoc($q_specs)) {  ?>
                                                                                            <li><?= $d_specs['NAMENAME']; ?> : <?= $d_specs['VALUESTRING'].$d_specs['VALUEDECIMAL']; ?> </li>
                                                                                        <?php } ?>
                                                                                    </td>
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
                                                                                <?php if ($d_QA_DATAcek) : ?>
                                                                                    <td style="vertical-align: top; font-size:15px;">
                                                                                        <?php $q_QA_DATA7     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                                        <?php $no = 1; while ($d_QA_DATA7 = mysqli_fetch_array($q_QA_DATA7)) : ?>
                                                                                            <?php $char_code = $d_QA_DATA7['CHARACTERISTICCODE']; ?>
                                                                                                <?php if(str_contains($char_code, 'GRB') != true && ($char_code == 'LEBAR' || $char_code == 'GRAMASI')) : ?>
                                                                                                    <?= $no++ . ' : ' . $d_QA_DATA7['CHARACTERISTICCODE'] . ' = ' . $d_QA_DATA7['VALUEQUANTITY'] . '<br>'; ?>
                                                                                                <?php endif; ?>
                                                                                        <?php endwhile; ?>
                                                                                        <hr>
                                                                                        <?php $q_QA_DATA3     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                                        <?php $no = 1; while ($d_QA_DATA3 = mysqli_fetch_array($q_QA_DATA3)) : ?>
                                                                                            <?php $char_code = $d_QA_DATA3['CHARACTERISTICCODE']; ?>
                                                                                            <?php  if(str_contains($char_code, 'GRB') != true && $char_code <> 'LEBAR' && $char_code <> 'GRAMASI') : ?>
                                                                                                <?php   
                                                                                                    if($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '1'){
                                                                                                        $grouping_hue = 'A';
                                                                                                    }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '2'){
                                                                                                        $grouping_hue = 'B';
                                                                                                    }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '3'){
                                                                                                        $grouping_hue = 'C';
                                                                                                    }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '4'){
                                                                                                        $grouping_hue = 'D';
                                                                                                    }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '1'){
                                                                                                        $grouping_hue = 'Red';
                                                                                                    }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '2'){
                                                                                                        $grouping_hue = 'Yellow';
                                                                                                    }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '3'){
                                                                                                        $grouping_hue = 'Green';
                                                                                                    }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '4'){
                                                                                                        $grouping_hue = 'Blue';
                                                                                                    }else{
                                                                                                        $grouping_hue = $d_QA_DATA3['VALUEQUANTITY'];
                                                                                                    }
                                                                                                ?>
                                                                                                <?= $no++ . ' : ' . $d_QA_DATA3['CHARACTERISTICCODE'] . ' = ' . $grouping_hue . '<br>'; ?>
                                                                                            <?php endif; ?>
                                                                                        <?php endwhile; ?>
                                                                                        <hr>
                                                                                        <?php $q_QA_DATA6     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                                        <?php $no = 1; while ($d_QA_DATA6 = mysqli_fetch_array($q_QA_DATA6)) : ?>
                                                                                            <?php $char_code = $d_QA_DATA6['CHARACTERISTICCODE']; ?>
                                                                                            <?php  if(str_contains($char_code, 'GRB')) : ?>
                                                                                                <?= $no++ . ' : ' . $d_QA_DATA6['CHARACTERISTICCODE'] . ' = ' . $d_QA_DATA6['VALUEQUANTITY'] . '<br>'; ?>
                                                                                            <?php endif; ?>
                                                                                        <?php endwhile; ?>
                                                                                    </td>
                                                                                <?php endif; ?>
                                                                            <?php } ?>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        </div>
                                        <?php if(!empty($_POST['demand2'])) : ?>
                                            <div class="col-sm-6" style="border-left: 6px solid green; height: 100%;">
                                                <table width="100%" style="border: 1px solid black; border-collapse: collapse;">
                                                    <?php
                                                        require_once "koneksi.php";

                                                        if($_GET['demand2']){
                                                            $demand_2     = $_GET['demand2'];
                                                        }else{
                                                            $demand_2     = $_POST['demand2'];
                                                        }

                                                        $q_ITXVIEWKK_2    = db2_exec($conn1, "SELECT * FROM ITXVIEWKK WHERE PRODUCTIONDEMANDCODE = '$demand_2'");
                                                        $d_ITXVIEWKK_2    = db2_fetch_assoc($q_ITXVIEWKK_2);

                                                        if($_GET['prod_order']){
                                                            $prod_order     = $_GET['prod_order'];
                                                        }elseif($_POST['prod_order']) {
                                                            $prod_order     = $_POST['prod_order'];
                                                        }else{
                                                            $prod_order     = $d_ITXVIEWKK_2['PRODUCTIONORDERCODE'];
                                                        }

                                                        $sql_pelanggan_buyer     = db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$d_ITXVIEWKK_2[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                                                                        AND CODE = '$d_ITXVIEWKK_2[PROJECTCODE]'");
                                                        $dt_pelanggan_buyer        = db2_fetch_assoc($sql_pelanggan_buyer);

                                                        // itxview_detail_qa_data
                                                        $itxview_detail_qa_data     = db2_exec($conn1, "SELECT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                        WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                        AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                        AND OPERATIONCODE IN ('" . implode("','", $_POST['operation2']) . "') 
                                                                                                        ORDER BY LINE ASC");
                                                        while ($row_itxview_detail_qa_data     = db2_fetch_assoc($itxview_detail_qa_data)) {
                                                            $r_itxview_detail_qa_data[]        = "('" . TRIM(addslashes($row_itxview_detail_qa_data['PRODUCTIONDEMANDCODE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['PRODUCTIONORDERCODE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['WORKCENTERCODE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['OPERATIONCODE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['LINE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['QUALITYDOCUMENTHEADERNUMBERID'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['CHARACTERISTICCODE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['LONGDESCRIPTION'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['VALUEQUANTITY'])) . "',"
                                                                                                . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                                                . "'" . date('Y-m-d H:i:s') . "',"
                                                                                                . "'" . 'Analisa KK' . "')";
                                                        }
                                                        if(!empty($r_itxview_detail_qa_data)){
                                                            $value_itxview_detail_qa_data        = implode(',', $r_itxview_detail_qa_data);
                                                            $insert_itxview_detail_qa_data       = mysqli_query($con_nowprd, "INSERT INTO itxview_detail_qa_data(PRODUCTIONDEMANDCODE,PRODUCTIONORDERCODE,WORKCENTERCODE,OPERATIONCODE,LINE,QUALITYDOCUMENTHEADERNUMBERID,CHARACTERISTICCODE,LONGDESCRIPTION,VALUEQUANTITY,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_itxview_detail_qa_data");
                                                        }
                                                    ?>
                                                    <thead>
                                                        <tr>
                                                            <th>Prod. Order</th>
                                                            <th>:</th>
                                                            <th><?= $d_ITXVIEWKK_2['PRODUCTIONORDERCODE']; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Prod. Demand</th>
                                                            <th>:</th>
                                                            <th><?= $demand_2; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>LOT Internal</th>
                                                            <th>:</th>
                                                            <th><?= $d_ITXVIEWKK_2['LOT']; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Original PD Code</th>
                                                            <th>:</th>
                                                            <th><?= substr($d_ITXVIEWKK_2['ORIGINALPDCODE'], 4, 8); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Item Code</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top; white-space: wrap;">
                                                                <?= TRIM($d_ITXVIEWKK_2['SUBCODE02']) . '-' . TRIM($d_ITXVIEWKK_2['SUBCODE03']); ?>
                                                                <?= substr($d_ITXVIEWKK_2['ITEMDESCRIPTION'], 0, 200); ?><?php if (substr($d_ITXVIEWKK_2['ITEMDESCRIPTION'], 0, 200)) {
                                                                                                                            echo "<br>";
                                                                                                                        } ?>
                                                                <?= substr($d_ITXVIEWKK_2['ITEMDESCRIPTION'], 201); ?><?php if (substr($d_ITXVIEWKK_2['ITEMDESCRIPTION'], 201)) {
                                                                                                                        echo "<br>";
                                                                                                                    } ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Lebar x Gramasi Kain Jadi</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top;">
                                                                <?php 
                                                                    $q_lebar = db2_exec($conn1, "SELECT * FROM ITXVIEWLEBAR WHERE SALESORDERCODE = '$d_ITXVIEWKK_2[BONORDER]' AND ORDERLINE = '$d_ITXVIEWKK_2[ORDERLINE]'");
                                                                    $d_lebar = db2_fetch_assoc($q_lebar);
                                                                ?>
                                                                <?php 
                                                                    $q_gramasi = db2_exec($conn1, "SELECT * FROM ITXVIEWGRAMASI WHERE SALESORDERCODE = '$d_ITXVIEWKK_2[BONORDER]' AND ORDERLINE = '$d_ITXVIEWKK_2[ORDERLINE]'");
                                                                    $d_gramasi = db2_fetch_assoc($q_gramasi);
                                                                ?>
                                                                <?php 
                                                                    if($d_gramasi['GRAMASI_KFF']){
                                                                        $gramasi = number_format($d_gramasi['GRAMASI_KFF'], 0);
                                                                    }elseif($d_gramasi['GRAMASI_FKF']){
                                                                        $gramasi = number_format($d_gramasi['GRAMASI_FKF'], 0);
                                                                    }else{
                                                                        $gramasi = '-';
                                                                    }
                                                                ?>
                                                                <?= number_format($d_lebar['LEBAR'],0).' x '.$gramasi; ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Lebar x Gramasi Inspection</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top;">
                                                                <?php
                                                                    $q_lg_INS3  = db2_exec($conn1, "SELECT
                                                                                                        e.ELEMENTCODE,
                                                                                                        e.WIDTHGROSS,
                                                                                                        a.VALUEDECIMAL 
                                                                                                    FROM
                                                                                                        ELEMENTSINSPECTION e 
                                                                                                    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = e.ABSUNIQUEID AND a.FIELDNAME = 'GSM'
                                                                                                    WHERE
                                                                                                        e.ELEMENTCODE LIKE '$demand_2%'
                                                                                                    ORDER BY 
                                                                                                        e.INSPECTIONSTARTDATETIME ASC LIMIT 1");
                                                                    $d_lg_INS3  = db2_fetch_assoc($q_lg_INS3);

                                                                    echo $d_lg_INS3['WIDTHGROSS'];
                                                                    if($d_lg_INS3['VALUEDECIMAL']){
                                                                        echo ' x '.$d_lg_INS3['VALUEDECIMAL'];
                                                                    }else{
                                                                        echo ' x ...' ;
                                                                    }
                                                                ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Lebar x Gramasi Standart Greige</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top;">
                                                                <?php
                                                                $q_lg_standart  = db2_exec($conn1, "SELECT 
                                                                                                        a.VALUEDECIMAL AS LEBAR,
                                                                                                        a2.VALUEDECIMAL AS GRAMASI
                                                                                                    FROM 
                                                                                                        PRODUCT p 
                                                                                                    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'Width'
                                                                                                    LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'GSM'
                                                                                                    WHERE 
                                                                                                        SUBCODE01 = '$d_ITXVIEWKK_2[SUBCODE01]' 
                                                                                                        AND SUBCODE02 = '$d_ITXVIEWKK_2[SUBCODE02]' 
                                                                                                        AND SUBCODE03 = '$d_ITXVIEWKK_2[SUBCODE03]'
                                                                                                        AND SUBCODE04 = '$d_ITXVIEWKK_2[SUBCODE04]' 
                                                                                                        AND ITEMTYPECODE = 'KGF'");
                                                                $d_lg_standart  = db2_fetch_assoc($q_lg_standart);
                                                                echo number_format($d_lg_standart['LEBAR'], 0) . ' x ' . number_format($d_lg_standart['GRAMASI'], 0);
                                                                ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Gauge x Diameter Mesin (inch) </th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top;">
                                                                <?php
                                                                $q_lg_standart  = db2_exec($conn1, "SELECT 
                                                                                                        a.VALUEDECIMAL AS LEBAR,
                                                                                                        a2.VALUEDECIMAL AS GRAMASI
                                                                                                    FROM 
                                                                                                        PRODUCT p 
                                                                                                    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'Gauge'
                                                                                                    LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'Diameter'
                                                                                                    WHERE 
                                                                                                        SUBCODE01 = '$d_ITXVIEWKK_2[SUBCODE01]' 
                                                                                                        AND SUBCODE02 = '$d_ITXVIEWKK_2[SUBCODE02]' 
                                                                                                        AND SUBCODE03 = '$d_ITXVIEWKK_2[SUBCODE03]'
                                                                                                        AND SUBCODE04 = '$d_ITXVIEWKK_2[SUBCODE04]' 
                                                                                                        AND ITEMTYPECODE = 'KGF'");
                                                                $d_lg_standart  = db2_fetch_assoc($q_lg_standart);
                                                                echo number_format($d_lg_standart['LEBAR'], 0) . ' x ' . number_format($d_lg_standart['GRAMASI'], 0);
                                                                ?>
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
                                                                                                            a2.VALUESTRING AS MESIN_KNT,
                                                                                                            s.PROJECTCODE,
                                                                                                            floor(e.WIDTHNET) AS LEBAR, -- Untuk laporan mr. james
                                                                                                            floor(a.VALUEDECIMAL) AS GRAMASI -- Untuk laporan mr. james
                                                                                                        FROM  
                                                                                                            STOCKTRANSACTION s 
                                                                                                        LEFT JOIN STOCKTRANSACTION s2 ON s2.ITEMELEMENTCODE = s.ITEMELEMENTCODE AND s2.TEMPLATECODE = '204'
                                                                                                        LEFT JOIN ELEMENTSINSPECTION e ON e.DEMANDCODE = s2.LOTCODE AND e.ELEMENTCODE = s2.ITEMELEMENTCODE -- Untuk laporan mr. james
                                                                                                        LEFT JOIN ADSTORAGE a ON a.UNIQUEID = e.ABSUNIQUEID AND a.FIELDNAME = 'GSM' -- Untuk laporan mr. james
                                                                                                        LEFT JOIN PRODUCTIONDEMAND p ON p.CODE = s2.LOTCODE
                                                                                                        LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'MachineNoCode'
                                                                                                        WHERE
                                                                                                            s.TEMPLATECODE = '120' 
                                                                                                            AND 
                                                                                                            s.ORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' -- PRODUCTION ORDER 
                                                                                                            AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '0'");
                                                                    $cek_lg_element = db2_fetch_assoc($q_lg_element);
                                                                ?>
                                                                <?php if ($cek_lg_element) : ?>
                                                                    *From Element
                                                                    <table width="30%" style="border:1px solid black;border-collapse:collapse;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">Tanggal Terima Kain</th>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">LOTCODE</th>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">MESIN KNT</th>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">PROJECTCODE</th>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">LEBAR x GRAMASI</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php while ($d_lg_element = db2_fetch_assoc($q_lg_element)) { ?>
                                                                                <tr>
                                                                                    <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['TRANSACTIONDATE']; ?></td>
                                                                                    <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['LOTCODE']; ?></td>
                                                                                    <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['MESIN_KNT']; ?></td>
                                                                                    <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['PROJECTCODE']; ?></td>
                                                                                    <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['LEBAR'] . ' x ' . $d_lg_element['GRAMASI']; ?></td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                <?php endif; ?>

                                                                <?php
                                                                    $q_lg_element_cut   = db2_exec($conn1, "SELECT DISTINCT
                                                                                                                s4.TRANSACTIONDATE,
                                                                                                                s4.LOTCODE,
                                                                                                                a2.VALUESTRING AS MESIN_KNT,
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
                                                                                                            LEFT JOIN PRODUCTIONDEMAND p ON p.CODE = s2.LOTCODE
                                                                                                            LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'MachineNoCode'
                                                                                                            WHERE
                                                                                                                s.TEMPLATECODE = '120' 
                                                                                                                AND s.ORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' -- PRODUCTION NUMBER
                                                                                                                AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '8'");
                                                                    $cek_lg_element_cut = db2_fetch_assoc($q_lg_element_cut);
                                                                ?>
                                                                <?php if (!empty($cek_lg_element_cut['LEBAR'])) : ?>
                                                                    *From Cutting Element
                                                                    <table width="30%" style="border:1px solid black;border-collapse:collapse;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">Tanggal Terima Kain</th>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">LOTCODE</th>
                                                                                <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">MESIN KNT</th>
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
                                                                                    <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['MESIN_KNT']; ?></td>
                                                                                    <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['PROJECTCODE']; ?></td>
                                                                                    <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['LEBAR'] . ' x ' . $d_lg_element_cut['GRAMASI']; ?></td>
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
                                                                    ini_set("error_reporting", 1);
                                                                    $sql_benang = "SELECT DISTINCT
                                                                                        TRIM(p.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE
                                                                                    FROM  
                                                                                        STOCKTRANSACTION s 
                                                                                    LEFT JOIN STOCKTRANSACTION s2 ON s2.ITEMELEMENTCODE = s.ITEMELEMENTCODE AND s2.TEMPLATECODE = '204'
                                                                                    LEFT JOIN PRODUCTIONRESERVATION p ON p.ORDERCODE = s2.LOTCODE 
                                                                                    WHERE
                                                                                        s.TEMPLATECODE = '120' 
                                                                                        AND 
                                                                                        s.ORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' -- PRODUCTION ORDER 
                                                                                        AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '0'";
                                                                    $q_benang   = db2_exec($conn1, $sql_benang);
                                                                    $q_benang2   = db2_exec($conn1, $sql_benang);
                                                                    $no = 1;
                                                                    $cekada_benang  = db2_fetch_assoc($q_benang);                                                                            
                                                                ?>
                                                                <?php if(!empty($cekada_benang['PRODUCTIONORDERCODE'])){ ?>
                                                                    <?php   
                                                                        while ($d_benang = db2_fetch_assoc($q_benang2)) {
                                                                            $r_benang[]      = "'".$d_benang['PRODUCTIONORDERCODE']."'";
                                                                        }
                                                                        $value_benang        = implode(',', $r_benang);

                                                                        $q_lotcode  = db2_exec($conn1, "SELECT 
                                                                                                            LISTAGG(TRIM(LOTCODE), ', ') AS LOTCODE,
                                                                                                            LONGDESCRIPTION
                                                                                                            FROM
                                                                                                            (SELECT DISTINCT 
                                                                                                                        CASE
                                                                                                                            WHEN LOCATE('+', s.LOTCODE) > 1 THEN SUBSTR(s.LOTCODE, 1, LOCATE('+', s.LOTCODE)-1)
                                                                                                                            ELSE s.LOTCODE
                                                                                                                        END AS LOTCODE,
                                                                                                                        p2.LONGDESCRIPTION
                                                                                                                    FROM
                                                                                                                        STOCKTRANSACTION s
                                                                                                                    LEFT JOIN PRODUCT p2 ON p2.ITEMTYPECODE = s.ITEMTYPECODE AND NOT 
                                                                                                                                                p2.ITEMTYPECODE = 'DYC' AND NOT 
                                                                                                                                                p2.ITEMTYPECODE = 'WTR' AND 
                                                                                                                                                p2.SUBCODE01 = s.DECOSUBCODE01  AND 
                                                                                                                                                p2.SUBCODE02 = s.DECOSUBCODE02 AND
                                                                                                                                                p2.SUBCODE03 = s.DECOSUBCODE03 AND 
                                                                                                                                                p2.SUBCODE04 = s.DECOSUBCODE04 AND
                                                                                                                                                p2.SUBCODE05 = s.DECOSUBCODE05 AND 
                                                                                                                                                p2.SUBCODE06 = s.DECOSUBCODE06 AND
                                                                                                                                                p2.SUBCODE07 = s.DECOSUBCODE07 
                                                                                                                    WHERE
                                                                                                                        ORDERCODE IN ($value_benang)
                                                                                                                        AND (TEMPLATECODE = '125' OR TEMPLATECODE = '120'))
                                                                                                            GROUP BY
                                                                                                                LONGDESCRIPTION");
                                                                        while ($d_lotcode = db2_fetch_assoc($q_lotcode)) {
                                                                    ?>
                                                                        <span style="color:#000000; font-size:12px; font-family: Microsoft Sans Serif;">
                                                                            <?= $no++; ?>. <?= $d_lotcode['LONGDESCRIPTION']; ?> - <?= $d_lotcode['LOTCODE']; ?>
                                                                        </span><br>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Alur Normal</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top; white-space: wrap;">
                                                                <?php
                                                                    $q_routing  = db2_exec($conn1, "SELECT
                                                                                                        TRIM(r.OPERATIONCODE) AS OPERATIONCODE,
                                                                                                        TRIM(r.LONGDESCRIPTION) AS DESCRIPTION 
                                                                                                    FROM
                                                                                                        PRODUCTIONDEMAND p
                                                                                                    LEFT JOIN ROUTINGSTEP r ON r.ROUTINGNUMBERID = p.ROUTINGNUMBERID 
                                                                                                    LEFT JOIN OPERATION o ON o.CODE = r.OPERATIONCODE 
                                                                                                    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = o.ABSUNIQUEID AND a.FIELDNAME = 'AlurProses'
                                                                                                    WHERE 
                                                                                                        p.CODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' AND a.VALUESTRING = '2'
                                                                                                    ORDER BY
                                                                                                        r.SEQUENCE ASC");
                                                                ?>
                                                                <?php while ($d_routing = db2_fetch_assoc($q_routing)) { ?>
                                                                    <span style="background-color: #D0F39A;"><?= $d_routing['OPERATIONCODE']; ?></span>
                                                                <?php } ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Hasil test quality</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top;">
                                                                <?php
                                                                    $q_cari_tq  = mysqli_query($con_db_qc, "SELECT * FROM tbl_tq_nokk WHERE nodemand = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' ORDER BY id DESC");
                                                                ?>
                                                                <?php while ($row_tq = mysqli_fetch_array($q_cari_tq)) { ?>
                                                                    <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_result.php?idkk=<?= $row_tq['id']; ?>&noitem=<?= $row_tq['no_item']; ?>&nohanger=<?= $row_tq['no_hanger']; ?>" target="_blank">Detail test quality (<?= $row_tq['no_test']; ?>)<i class="icofont icofont-external-link"></i></a><br>
                                                                <?php } ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Hasil test inspect</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top;">
                                                                <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_inspectpackingreport.php?demand=<?= TRIM($demand_2); ?>&ispacking=true" target="_blank">Inspect Report <i class="icofont icofont-external-link"></i></a><br>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Hasil test inspect</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top;">
                                                                <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_inspectpackingreport.php?demand=<?= TRIM($demand_2); ?>&ispacking=true" target="_blank">Inspect Report <i class="icofont icofont-external-link"></i></a><br>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Detail bagi kain</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top;">
                                                                <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/nowgkg/pages/cetak/cetakbagikain.php?demandno=<?= TRIM($demand_2); ?>" target="_blank">Click here! <i class="icofont icofont-external-link"></i></a><br>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Detail quantity packing</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top;">
                                                                <form action="https://online.indotaichen.com/nowqcf/CekKainDemand" method="post" target="_blank">
                                                                    <input name="nodemand" value="<?= TRIM($demand_2); ?>" type="hidden" class="form-control form-control-sm" id="" required>
                                                                    <button class="btn-link" style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" type="submit">Click here! <i class="icofont icofont-external-link"></i></button>
                                                                </form>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                <span>Alur Aktual</span>
                                                <div style="overflow-x:auto;">
                                                    <table width="100%" border="1">
                                                        <?php
                                                            ini_set("error_reporting", 1);
                                                            session_start();
                                                            require_once "koneksi.php";

                                                            // itxview_posisikk_tgl_in_prodorder_ins3
                                                            $posisikk_ins3 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_INS3 WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'");
                                                            while ($row_posisikk_ins3   = db2_fetch_assoc($posisikk_ins3)) {
                                                                $r_posisikk_ins3[]      = "('" . TRIM(addslashes($row_posisikk_ins3['PRODUCTIONORDERCODE'])) . "',"
                                                                    . "'" . TRIM(addslashes($row_posisikk_ins3['OPERATIONCODE'])) . "',"
                                                                    . "'" . TRIM(addslashes($row_posisikk_ins3['PROPROGRESSPROGRESSNUMBER'])) . "',"
                                                                    . "'" . TRIM(addslashes($row_posisikk_ins3['DEMANDSTEPSTEPNUMBER'])) . "',"
                                                                    . "'" . TRIM(addslashes($row_posisikk_ins3['PROGRESSTEMPLATECODE'])) . "',"
                                                                    . "'" . TRIM(addslashes($row_posisikk_ins3['MULAI'])) . "',"
                                                                    . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                    . "'" . date('Y-m-d H:i:s') . "',"
                                                                    . "'" . 'Analisa KK' . "')";
                                                            }
                                                            if ($r_posisikk_ins3) {
                                                                $value_posisikk_ins3        = implode(',', $r_posisikk_ins3);
                                                                $insert_posisikk_ins3       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_ins3(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_posisikk_ins3");
                                                            }

                                                            // itxview_posisikk_tgl_in_prodorder_cnp1
                                                            $posisikk_cnp1 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_CNP1 WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'");
                                                            while ($row_posisikk_cnp1   = db2_fetch_assoc($posisikk_cnp1)) {
                                                                $r_posisikk_cnp1[]      = "('" . TRIM(addslashes($row_posisikk_cnp1['PRODUCTIONORDERCODE'])) . "',"
                                                                    . "'" . TRIM(addslashes($row_posisikk_cnp1['OPERATIONCODE'])) . "',"
                                                                    . "'" . TRIM(addslashes($row_posisikk_cnp1['PROPROGRESSPROGRESSNUMBER'])) . "',"
                                                                    . "'" . TRIM(addslashes($row_posisikk_cnp1['DEMANDSTEPSTEPNUMBER'])) . "',"
                                                                    . "'" . TRIM(addslashes($row_posisikk_cnp1['PROGRESSTEMPLATECODE'])) . "',"
                                                                    . "'" . TRIM(addslashes($row_posisikk_cnp1['MULAI'])) . "',"
                                                                    . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                    . "'" . date('Y-m-d H:i:s') . "',"
                                                                    . "'" . 'Analisa KK' . "')";
                                                            }
                                                            if ($r_posisikk_cnp1) {
                                                                $value_posisikk_cnp1        = implode(',', $r_posisikk_cnp1);
                                                                $insert_posisikk_cnp1       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_cnp1(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_posisikk_cnp1");
                                                            }
                                                        ?>
                                                        <thead>
                                                            <?php
                                                                ini_set("error_reporting", 1);
                                                                $sqlDB2 = "SELECT
                                                                                p.WORKCENTERCODE,
                                                                                CASE
                                                                                    WHEN p.PRODRESERVATIONLINKGROUPCODE IS NULL THEN TRIM(p.OPERATIONCODE) 
                                                                                    WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE) 
                                                                                    ELSE p.PRODRESERVATIONLINKGROUPCODE
                                                                                END	AS OPERATIONCODE,
                                                                                TRIM(o.OPERATIONGROUPCODE) AS OPERATIONGROUPCODE,
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
                                                                                p.PRODUCTIONORDERCODE  = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' AND p.PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                -- AND NOT iptip.MULAI IS NULL AND NOT iptop.SELESAI IS NULL
                                                                            ORDER BY iptip.MULAI ASC";
                                                                $stmt = db2_exec($conn1, $sqlDB2);
                                                                $stmt2 = db2_exec($conn1, $sqlDB2);
                                                                $stmt3 = db2_exec($conn1, $sqlDB2);
                                                                $stmt4 = db2_exec($conn1, $sqlDB2);
                                                                $stmt5 = db2_exec($conn1, $sqlDB2);
                                                                $stmt6 = db2_exec($conn1, $sqlDB2);
                                                                $stmt7 = db2_exec($conn1, $sqlDB2);
                                                            ?>
                                                            <tr>
                                                                <?php while ($rowdb2 = db2_fetch_assoc($stmt)) { ?>
                                                                    <?php
                                                                        $q_QA_DATA  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                    WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                    AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                    AND WORKCENTERCODE = '$rowdb2[WORKCENTERCODE]' 
                                                                                                                    AND OPERATIONCODE = '$rowdb2[OPERATIONCODE]' 
                                                                                                                    AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                    AND STATUS = 'Analisa KK'
                                                                                                                    ORDER BY LINE ASC");
                                                                        $cek_QA_DATA    = mysqli_fetch_assoc($q_QA_DATA);
                                                                    ?>
                                                                    <?php if ($cek_QA_DATA) : ?>
                                                                        <th style="text-align: center;"><?= $rowdb2['OPERATIONCODE']; ?></th>
                                                                    <?php endif; ?>
                                                                <?php } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php while ($rowdb4 = db2_fetch_assoc($stmt4)) { ?>
                                                                    <?php
                                                                        $q_QA_DATA4  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                    WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                    AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                    AND WORKCENTERCODE = '$rowdb4[WORKCENTERCODE]' 
                                                                                                                    AND OPERATIONCODE = '$rowdb4[OPERATIONCODE]' 
                                                                                                                    AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                    AND STATUS = 'Analisa KK'
                                                                                                                    ORDER BY LINE ASC");
                                                                        $cek_QA_DATA4    = mysqli_fetch_assoc($q_QA_DATA4);
                                                                    ?>
                                                                    <?php if ($cek_QA_DATA4) : ?>
                                                                        <th style="text-align: center; font-size:15px; background-color: #EEE6B3">
                                                                            <?php if ($rowdb4['OPERATIONCODE'] == 'INS3') : ?>
                                                                                <?php
                                                                                    $q_mulai_ins3   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                        * 
                                                                                                                                    FROM
                                                                                                                                        `itxview_posisikk_tgl_in_prodorder_ins3_detaildemandstep` 
                                                                                                                                    WHERE
                                                                                                                                        productionordercode = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'
                                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                    ORDER BY
                                                                                                                                        MULAI ASC LIMIT 1");
                                                                                    $d_mulai_ins3   = mysqli_fetch_assoc($q_mulai_ins3);
                                                                                    echo $d_mulai_ins3['MULAI'];
                                                                                ?>
                                                                            <?php elseif ($rowdb4['OPERATIONCODE'] == 'CNP1') : ?>
                                                                                <?php
                                                                                    $q_mulai_cnp1   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                        * 
                                                                                                                                    FROM
                                                                                                                                        `itxview_posisikk_tgl_in_prodorder_cnp1_detaildemandstep` 
                                                                                                                                    WHERE
                                                                                                                                        productionordercode = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'
                                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                    ORDER BY
                                                                                                                                        MULAI ASC LIMIT 1");
                                                                                    $d_mulai_cnp1   = mysqli_fetch_assoc($q_mulai_cnp1);
                                                                                    echo $d_mulai_cnp1['MULAI'];
                                                                                ?>
                                                                            <?php else : ?>
                                                                                <?= $rowdb4['MULAI']; ?>
                                                                            <?php endif; ?>
                                                                            <br>
                                                                            <?php if ($rowdb4['OPERATIONCODE'] == 'INS3') : ?>
                                                                                <?php
                                                                                $q_mulai_ins3   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                    * 
                                                                                                                                FROM
                                                                                                                                    `itxview_posisikk_tgl_in_prodorder_ins3_detaildemandstep` 
                                                                                                                                WHERE
                                                                                                                                    productionordercode = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'
                                                                                                                                    AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                ORDER BY
                                                                                                                                    MULAI DESC LIMIT 1");
                                                                                $d_mulai_ins3   = mysqli_fetch_assoc($q_mulai_ins3);
                                                                                echo $d_mulai_ins3['MULAI'];
                                                                                ?>
                                                                            <?php elseif ($rowdb4['OPERATIONCODE'] == 'CNP1') : ?>
                                                                                <?php
                                                                                $q_mulai_cnp1   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                    * 
                                                                                                                                FROM
                                                                                                                                    `itxview_posisikk_tgl_in_prodorder_cnp1_detaildemandstep` 
                                                                                                                                WHERE
                                                                                                                                    productionordercode = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'
                                                                                                                                    AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                ORDER BY
                                                                                                                                    MULAI DESC LIMIT 1");
                                                                                $d_mulai_cnp1   = mysqli_fetch_assoc($q_mulai_cnp1);
                                                                                echo $d_mulai_cnp1['MULAI'];
                                                                                ?>
                                                                            <?php else : ?>
                                                                                <?= $rowdb4['SELESAI']; ?>
                                                                            <?php endif; ?>
                                                                        </th>
                                                                    <?php endif; ?>
                                                                <?php } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php while ($rowdb3 = db2_fetch_assoc($stmt2)) { ?>
                                                                    <?php
                                                                        $q_QA_DATA2  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                    WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                    AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                    AND WORKCENTERCODE = '$rowdb3[WORKCENTERCODE]' 
                                                                                                                    AND OPERATIONCODE = '$rowdb3[OPERATIONCODE]' 
                                                                                                                    AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                    AND STATUS = 'Analisa KK'
                                                                                                                    ORDER BY LINE ASC");
                                                                        $cek_QA_DATA2    = mysqli_fetch_assoc($q_QA_DATA2);
                                                                    ?>
                                                                    <?php if ($cek_QA_DATA2) : ?>
                                                                        <th style="text-align: center;"><?= $rowdb3['MESIN']; ?></th>
                                                                    <?php endif; ?>
                                                                <?php } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php while ($rowdb5 = db2_fetch_assoc($stmt5)) { ?>
                                                                    <?php
                                                                        $q_QA_DATA5  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                    WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                    AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                    AND WORKCENTERCODE = '$rowdb5[WORKCENTERCODE]' 
                                                                                                                    AND OPERATIONCODE = '$rowdb5[OPERATIONCODE]' 
                                                                                                                    AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                    AND STATUS = 'Analisa KK'
                                                                                                                    ORDER BY LINE ASC");
                                                                        $cek_QA_DATA5    = mysqli_fetch_assoc($q_QA_DATA5);
                                                                    ?>
                                                                    <?php if ($cek_QA_DATA5) : ?>
                                                                        <?php $opr = $rowdb5['OPERATIONCODE']; if(str_contains($opr, 'DYE')) : ?>
                                                                            <?php
                                                                                $prod_order     = TRIM($d_ITXVIEWKK_2['PRODUCTIONORDERCODE']);
                                                                                $prod_demand    = TRIM($demand_2);

                                                                                $q_dye_montemp      = mysqli_query($con_db_dyeing, "SELECT
                                                                                                                                        a.id AS idm,
                                                                                                                                        b.id AS ids,
                                                                                                                                        b.no_resep 
                                                                                                                                    FROM
                                                                                                                                        tbl_montemp a
                                                                                                                                        LEFT JOIN tbl_schedule b ON a.id_schedule = b.id
                                                                                                                                        LEFT JOIN tbl_setting_mesin c ON b.nokk = c.nokk 
                                                                                                                                    WHERE
                                                                                                                                        b.nokk = '$prod_order' AND b.nodemand LIKE '%$prod_demand%'
                                                                                                                                    ORDER BY
                                                                                                                                        a.id DESC LIMIT 1 ");
                                                                                $d_dye_montemp      = mysqli_fetch_assoc($q_dye_montemp);

                                                                            ?>
                                                                            <th style="text-align: center;">
                                                                                <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/dye-itti/pages/cetak/cetak_monitoring_new.php?idkk=&no=<?= $d_dye_montemp['no_resep']; ?>&idm=<?php echo $d_dye_montemp['idm']; ?>&ids=<?php echo $d_dye_montemp['ids']; ?>" target="_blank">Monitoring <i class="icofont icofont-external-link"></i></a>
                                                                                &ensp;
                                                                                <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/laporan/dye_filter_bon_reservation.php?demand=<?= $demand_2; ?>&prod_order=<?= $d_ITXVIEWKK_2['PRODUCTIONORDERCODE']; ?>" target="_blank">Bon Resep <i class="icofont icofont-external-link"></i></a>
                                                                            </th>
                                                                        <?php else : ?>
                                                                                <?php $opr_grup = $rowdb5['OPERATIONGROUPCODE']; if(str_contains($opr_grup, "FIN")) : ?>
                                                                                    <th style="text-align: center;">
                                                                                        <!-- <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/finishing2-new/reports/pages/reports-detail-stenter.php?FromAnalisa=FromAnalisa&prod_order=<?= TRIM($d_ITXVIEWKK_2['PRODUCTIONORDERCODE']); ?>&prod_demand=<?= TRIM($demand_2); ?>&tgl_in=<?= substr($rowdb5['MULAI'], 1, 10); ?>&tgl_out=<?= substr($rowdb5['SELESAI'], 1, 10); ?>" target="_blank">Detail proses <i class="icofont icofont-external-link"></i></a> -->
                                                                                    </th>
                                                                                <?php else : ?>
                                                                                    <th style="text-align: center;">-</th>
                                                                                <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php while ($rowdb7 = db2_fetch_assoc($stmt7)) { ?>
                                                                    <?php
                                                                        $q_QA_DATA7  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                    WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                    AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                    AND WORKCENTERCODE = '$rowdb7[WORKCENTERCODE]' 
                                                                                                                    AND OPERATIONCODE = '$rowdb7[OPERATIONCODE]' 
                                                                                                                    AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                    AND STATUS = 'Analisa KK'
                                                                                                                    ORDER BY LINE ASC");
                                                                        $cek_QA_DATA7    = mysqli_fetch_assoc($q_QA_DATA7);
                                                                    ?>
                                                                    <?php if ($cek_QA_DATA7) : ?>
                                                                        <?php
                                                                            $q_routing  = mysqli_query($con_nowprd, "SELECT * FROM keterangan_leader 
                                                                                                                        WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                        AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]'
                                                                                                                        AND OPERATIONCODE = '$rowdb7[OPERATIONCODE]'");
                                                                            $d_routing  = mysqli_fetch_assoc($q_routing);
                                                                        ?>
                                                                        <td style="vertical-align: top; font-size:15px;">
                                                                            <?= substr($d_routing['KETERANGAN'], 0,35); ?><?php if(substr($d_routing['KETERANGAN'], 0,35)){ echo "<br>"; } ?>
                                                                            <?= substr($d_routing['KETERANGAN'], 35,70); ?><?php if(substr($d_routing['KETERANGAN'], 35,70)){ echo "<br>"; } ?>
                                                                            <?= substr($d_routing['KETERANGAN'], 70,105); ?><?php if(substr($d_routing['KETERANGAN'], 70,105)){ echo "<br>"; } ?>
                                                                            <?= substr($d_routing['KETERANGAN'], 105,140); ?><?php if(substr($d_routing['KETERANGAN'], 105,140)){ echo "<br>"; } ?>
                                                                            <?= substr($d_routing['KETERANGAN'], 140,175); ?><?php if(substr($d_routing['KETERANGAN'], 140,175)){ echo "<br>"; } ?>
                                                                            <?= substr($d_routing['KETERANGAN'], 175,210); ?><?php if(substr($d_routing['KETERANGAN'], 175,210)){ echo "<br>"; } ?>
                                                                            <?= substr($d_routing['KETERANGAN'], 210); ?><?php if(substr($d_routing['KETERANGAN'], 210)){ echo ""; } ?>
                                                                        </td>
                                                                    <?php endif; ?>
                                                                <?php } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php while ($rowdb6 = db2_fetch_assoc($stmt6)) { ?>
                                                                    <?php
                                                                        $q_QA_DATA8  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                    WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                    AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                    AND WORKCENTERCODE = '$rowdb6[WORKCENTERCODE]' 
                                                                                                                    AND OPERATIONCODE = '$rowdb6[OPERATIONCODE]' 
                                                                                                                    AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                    AND STATUS = 'Analisa KK'
                                                                                                                    ORDER BY LINE ASC");
                                                                        $cek_QA_DATA8    = mysqli_fetch_assoc($q_QA_DATA8);
                                                                    ?>
                                                                    <?php if ($cek_QA_DATA8) : ?>
                                                                        <?php
                                                                            $q_specs    = db2_exec($conn1, "SELECT 
                                                                                                            TRIM(a.NAMENAME) AS NAMENAME,
                                                                                                            a.VALUESTRING,
                                                                                                            floor(a.VALUEDECIMAL) AS VALUEDECIMAL
                                                                                                        FROM 
                                                                                                            PRODUCTIONSPECS p 
                                                                                                        LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID
                                                                                                        WHERE 
                                                                                                            OPERATIONCODE = '$rowdb6[OPERATIONCODE]' 
                                                                                                            AND SUBCODE01 = '$d_ITXVIEWKK_2[SUBCODE01]' 
                                                                                                            AND SUBCODE02 = '$d_ITXVIEWKK_2[SUBCODE02]' 
                                                                                                            AND SUBCODE03 ='$d_ITXVIEWKK_2[SUBCODE03]' 
                                                                                                            AND SUBCODE04 = '$d_ITXVIEWKK_2[SUBCODE04]'");
                                                                        ?>
                                                                        <td style="vertical-align: top; font-size:15px;">
                                                                            <b>Acuan Standart :</b> <br>
                                                                            <?php while ($d_specs = db2_fetch_assoc($q_specs)) {  ?>
                                                                                <li><?= $d_specs['NAMENAME']; ?> : <?= $d_specs['VALUESTRING'].$d_specs['VALUEDECIMAL']; ?> </li>
                                                                            <?php } ?>
                                                                        </td>
                                                                    <?php endif; ?>
                                                                <?php } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php while ($rowdb4 = db2_fetch_assoc($stmt3)) { ?>
                                                                    <?php
                                                                        $sqlQAData      = "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                            WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                            AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                            AND WORKCENTERCODE = '$rowdb4[WORKCENTERCODE]' 
                                                                                            AND OPERATIONCODE = '$rowdb4[OPERATIONCODE]' 
                                                                                            AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                            AND STATUS = 'Analisa KK'
                                                                                            ORDER BY LINE ASC";
                                                                        $q_QA_DATAcek   = mysqli_query($con_nowprd, $sqlQAData);
                                                                        $d_QA_DATAcek   = mysqli_fetch_assoc($q_QA_DATAcek);
                                                                    ?>
                                                                    <?php if ($d_QA_DATAcek) : ?>
                                                                        <td style="vertical-align: top; font-size:15px;">
                                                                            <?php $q_QA_DATA7     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                            <?php $no = 1; while ($d_QA_DATA7 = mysqli_fetch_array($q_QA_DATA7)) : ?>
                                                                                <?php $char_code = $d_QA_DATA7['CHARACTERISTICCODE']; ?>
                                                                                    <?php if(str_contains($char_code, 'GRB') != true && ($char_code == 'LEBAR' || $char_code == 'GRAMASI')) : ?>
                                                                                        <?= $no++ . ' : ' . $d_QA_DATA7['CHARACTERISTICCODE'] . ' = ' . $d_QA_DATA7['VALUEQUANTITY'] . '<br>'; ?>
                                                                                    <?php endif; ?>
                                                                            <?php endwhile; ?>
                                                                            <hr>
                                                                            <?php $q_QA_DATA3     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                            <?php $no = 1; while ($d_QA_DATA3 = mysqli_fetch_array($q_QA_DATA3)) : ?>
                                                                                <?php $char_code = $d_QA_DATA3['CHARACTERISTICCODE']; ?>
                                                                                <?php  if(str_contains($char_code, 'GRB') != true && $char_code <> 'LEBAR' && $char_code <> 'GRAMASI') : ?>
                                                                                    <?php   
                                                                                        if($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '1'){
                                                                                            $grouping_hue = 'A';
                                                                                        }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '2'){
                                                                                            $grouping_hue = 'B';
                                                                                        }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '3'){
                                                                                            $grouping_hue = 'C';
                                                                                        }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '4'){
                                                                                            $grouping_hue = 'D';
                                                                                        }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '1'){
                                                                                            $grouping_hue = 'Red';
                                                                                        }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '2'){
                                                                                            $grouping_hue = 'Yellow';
                                                                                        }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '3'){
                                                                                            $grouping_hue = 'Green';
                                                                                        }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '4'){
                                                                                            $grouping_hue = 'Blue';
                                                                                        }else{
                                                                                            $grouping_hue = $d_QA_DATA3['VALUEQUANTITY'];
                                                                                        }
                                                                                    ?>
                                                                                    <?= $no++ . ' : ' . $d_QA_DATA3['CHARACTERISTICCODE'] . ' = ' . $grouping_hue . '<br>'; ?>
                                                                                <?php endif; ?>
                                                                            <?php endwhile; ?>
                                                                            <hr>
                                                                            <?php $q_QA_DATA6     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                            <?php $no = 1; while ($d_QA_DATA6 = mysqli_fetch_array($q_QA_DATA6)) : ?>
                                                                                <?php $char_code = $d_QA_DATA6['CHARACTERISTICCODE']; ?>
                                                                                <?php  if(str_contains($char_code, 'GRB')) : ?>
                                                                                    <?= $no++ . ' : ' . $d_QA_DATA6['CHARACTERISTICCODE'] . ' = ' . $d_QA_DATA6['VALUEQUANTITY'] . '<br>'; ?>
                                                                                <?php endif; ?>
                                                                            <?php endwhile; ?>
                                                                        </td>
                                                                    <?php endif; ?>
                                                                <?php } ?>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                                <hr>
                                                <!-- LOOPING 1 UNTUK SALINAN -->
                                                <?php
                                                    $q_looping1_bd2     = db2_exec($conn1, "SELECT
                                                                                            TRIM(p.CODE) AS PRODUCTIONDEMANDCODE
                                                                                        FROM
                                                                                            PRODUCTIONDEMAND p
                                                                                        LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'
                                                                                        WHERE
                                                                                            SUBSTR(a.VALUESTRING, 5, 8) = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]'");
                                                ?>
                                                <?php while($row_looping1_bd2 = db2_fetch_assoc($q_looping1_bd2)) : ?>
                                                    <?php
                                                        require_once "koneksi.php";

                                                        $demand_2     = $row_looping1_bd2['PRODUCTIONDEMANDCODE'];


                                                        $q_ITXVIEWKK_2    = db2_exec($conn1, "SELECT * FROM ITXVIEWKK WHERE PRODUCTIONDEMANDCODE = '$demand_2'");
                                                        $d_ITXVIEWKK_2    = db2_fetch_assoc($q_ITXVIEWKK_2);

                                                        if($_GET['prod_order']){
                                                            $prod_order     = $_GET['prod_order'];
                                                        }elseif($_POST['prod_order']) {
                                                            $prod_order     = $_POST['prod_order'];
                                                        }else{
                                                            $prod_order     = $d_ITXVIEWKK_2['PRODUCTIONORDERCODE'];
                                                        }

                                                        $sql_pelanggan_buyer     = db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$d_ITXVIEWKK_2[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                                                                        AND CODE = '$d_ITXVIEWKK_2[PROJECTCODE]'");
                                                        $dt_pelanggan_buyer        = db2_fetch_assoc($sql_pelanggan_buyer);

                                                        // itxview_detail_qa_data
                                                        $itxview_detail_qa_data     = db2_exec($conn1, "SELECT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                        WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                        AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                        AND OPERATIONCODE IN ('" . implode("','", $_POST['operation2']) . "') 
                                                                                                        ORDER BY LINE ASC");
                                                        while ($row_itxview_detail_qa_data     = db2_fetch_assoc($itxview_detail_qa_data)) {
                                                            $r_itxview_detail_qa_data[]        = "('" . TRIM(addslashes($row_itxview_detail_qa_data['PRODUCTIONDEMANDCODE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['PRODUCTIONORDERCODE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['WORKCENTERCODE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['OPERATIONCODE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['LINE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['QUALITYDOCUMENTHEADERNUMBERID'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['CHARACTERISTICCODE'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['LONGDESCRIPTION'])) . "',"
                                                                                                . "'" . TRIM(addslashes($row_itxview_detail_qa_data['VALUEQUANTITY'])) . "',"
                                                                                                . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                                                . "'" . date('Y-m-d H:i:s') . "',"
                                                                                                . "'" . 'Analisa KK' . "')";
                                                        }
                                                        if(!empty($r_itxview_detail_qa_data)){
                                                            $value_itxview_detail_qa_data        = implode(',', $r_itxview_detail_qa_data);
                                                            $insert_itxview_detail_qa_data       = mysqli_query($con_nowprd, "INSERT INTO itxview_detail_qa_data(PRODUCTIONDEMANDCODE,PRODUCTIONORDERCODE,WORKCENTERCODE,OPERATIONCODE,LINE,QUALITYDOCUMENTHEADERNUMBERID,CHARACTERISTICCODE,LONGDESCRIPTION,VALUEQUANTITY,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_itxview_detail_qa_data");
                                                        }
                                                    ?>
                                                    <center style="background-color: #ff6b81; color: #2d3436;">
                                                        <i class="ti-angle-double-down"></i> 
                                                        <strong>Salinan dari demand <?= substr($d_ITXVIEWKK_2['ORIGINALPDCODE'], 4, 8); ?></strong>
                                                        <i class="ti-angle-double-down"></i> 
                                                    </center>
                                                    <table width="100%" style="border: 1px solid black; border-collapse: collapse;">
                                                        <thead>
                                                            <tr>
                                                                <th>Prod. Order</th>
                                                                <th>:</th>
                                                                <th><?= $d_ITXVIEWKK_2['PRODUCTIONORDERCODE']; ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Prod. Demand</th>
                                                                <th>:</th>
                                                                <th><?= $demand_2; ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>LOT Internal</th>
                                                                <th>:</th>
                                                                <th><?= $d_ITXVIEWKK_2['LOT']; ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Original PD Code</th>
                                                                <th>:</th>
                                                                <th><?= substr($d_ITXVIEWKK_2['ORIGINALPDCODE'], 4, 8); ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Item Code</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top; white-space: wrap;">
                                                                    <?= TRIM($d_ITXVIEWKK_2['SUBCODE02']) . '-' . TRIM($d_ITXVIEWKK_2['SUBCODE03']); ?>
                                                                    <?= substr($d_ITXVIEWKK_2['ITEMDESCRIPTION'], 0, 200); ?><?php if (substr($d_ITXVIEWKK_2['ITEMDESCRIPTION'], 0, 200)) {
                                                                                                                                echo "<br>";
                                                                                                                            } ?>
                                                                    <?= substr($d_ITXVIEWKK_2['ITEMDESCRIPTION'], 201); ?><?php if (substr($d_ITXVIEWKK_2['ITEMDESCRIPTION'], 201)) {
                                                                                                                            echo "<br>";
                                                                                                                        } ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Lebar x Gramasi Kain Jadi</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <?php 
                                                                        $q_lebar = db2_exec($conn1, "SELECT * FROM ITXVIEWLEBAR WHERE SALESORDERCODE = '$d_ITXVIEWKK_2[BONORDER]' AND ORDERLINE = '$d_ITXVIEWKK_2[ORDERLINE]'");
                                                                        $d_lebar = db2_fetch_assoc($q_lebar);
                                                                    ?>
                                                                    <?php 
                                                                        $q_gramasi = db2_exec($conn1, "SELECT * FROM ITXVIEWGRAMASI WHERE SALESORDERCODE = '$d_ITXVIEWKK_2[BONORDER]' AND ORDERLINE = '$d_ITXVIEWKK_2[ORDERLINE]'");
                                                                        $d_gramasi = db2_fetch_assoc($q_gramasi);
                                                                    ?>
                                                                    <?php 
                                                                        if($d_gramasi['GRAMASI_KFF']){
                                                                            $gramasi = number_format($d_gramasi['GRAMASI_KFF'], 0);
                                                                        }elseif($d_gramasi['GRAMASI_FKF']){
                                                                            $gramasi = number_format($d_gramasi['GRAMASI_FKF'], 0);
                                                                        }else{
                                                                            $gramasi = '-';
                                                                        }
                                                                    ?>
                                                                    <?= number_format($d_lebar['LEBAR'],0).' x '.$gramasi; ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Lebar x Gramasi Inspection</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <?php
                                                                        $q_lg_INS3  = db2_exec($conn1, "SELECT
                                                                                                            e.ELEMENTCODE,
                                                                                                            e.WIDTHGROSS,
                                                                                                            a.VALUEDECIMAL 
                                                                                                        FROM
                                                                                                            ELEMENTSINSPECTION e 
                                                                                                        LEFT JOIN ADSTORAGE a ON a.UNIQUEID = e.ABSUNIQUEID AND a.FIELDNAME = 'GSM'
                                                                                                        WHERE
                                                                                                            e.ELEMENTCODE LIKE '$demand_2%'
                                                                                                        ORDER BY 
                                                                                                            e.INSPECTIONSTARTDATETIME ASC LIMIT 1");
                                                                        $d_lg_INS3  = db2_fetch_assoc($q_lg_INS3);

                                                                        echo $d_lg_INS3['WIDTHGROSS'];
                                                                        if($d_lg_INS3['VALUEDECIMAL']){
                                                                            echo ' x '.$d_lg_INS3['VALUEDECIMAL'];
                                                                        }else{
                                                                            echo ' x ...' ;
                                                                        }
                                                                    ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Lebar x Gramasi Standart Greige</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <?php
                                                                    $q_lg_standart  = db2_exec($conn1, "SELECT 
                                                                                                            a.VALUEDECIMAL AS LEBAR,
                                                                                                            a2.VALUEDECIMAL AS GRAMASI
                                                                                                        FROM 
                                                                                                            PRODUCT p 
                                                                                                        LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'Width'
                                                                                                        LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'GSM'
                                                                                                        WHERE 
                                                                                                            SUBCODE01 = '$d_ITXVIEWKK_2[SUBCODE01]' 
                                                                                                            AND SUBCODE02 = '$d_ITXVIEWKK_2[SUBCODE02]' 
                                                                                                            AND SUBCODE03 = '$d_ITXVIEWKK_2[SUBCODE03]'
                                                                                                            AND SUBCODE04 = '$d_ITXVIEWKK_2[SUBCODE04]' 
                                                                                                            AND ITEMTYPECODE = 'KGF'");
                                                                    $d_lg_standart  = db2_fetch_assoc($q_lg_standart);
                                                                    echo number_format($d_lg_standart['LEBAR'], 0) . ' x ' . number_format($d_lg_standart['GRAMASI'], 0);
                                                                    ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Gauge x Diameter Mesin (inch) </th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <?php
                                                                    $q_lg_standart  = db2_exec($conn1, "SELECT 
                                                                                                            a.VALUEDECIMAL AS LEBAR,
                                                                                                            a2.VALUEDECIMAL AS GRAMASI
                                                                                                        FROM 
                                                                                                            PRODUCT p 
                                                                                                        LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'Gauge'
                                                                                                        LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'Diameter'
                                                                                                        WHERE 
                                                                                                            SUBCODE01 = '$d_ITXVIEWKK_2[SUBCODE01]' 
                                                                                                            AND SUBCODE02 = '$d_ITXVIEWKK_2[SUBCODE02]' 
                                                                                                            AND SUBCODE03 = '$d_ITXVIEWKK_2[SUBCODE03]'
                                                                                                            AND SUBCODE04 = '$d_ITXVIEWKK_2[SUBCODE04]' 
                                                                                                            AND ITEMTYPECODE = 'KGF'");
                                                                    $d_lg_standart  = db2_fetch_assoc($q_lg_standart);
                                                                    echo number_format($d_lg_standart['LEBAR'], 0) . ' x ' . number_format($d_lg_standart['GRAMASI'], 0);
                                                                    ?>
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
                                                                                                                a2.VALUESTRING AS MESIN_KNT,
                                                                                                                s.PROJECTCODE,
                                                                                                                floor(e.WIDTHNET) AS LEBAR, -- Untuk laporan mr. james
                                                                                                                floor(a.VALUEDECIMAL) AS GRAMASI -- Untuk laporan mr. james
                                                                                                            FROM  
                                                                                                                STOCKTRANSACTION s 
                                                                                                            LEFT JOIN STOCKTRANSACTION s2 ON s2.ITEMELEMENTCODE = s.ITEMELEMENTCODE AND s2.TEMPLATECODE = '204'
                                                                                                            LEFT JOIN ELEMENTSINSPECTION e ON e.DEMANDCODE = s2.LOTCODE AND e.ELEMENTCODE = s2.ITEMELEMENTCODE -- Untuk laporan mr. james
                                                                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = e.ABSUNIQUEID AND a.FIELDNAME = 'GSM' -- Untuk laporan mr. james
                                                                                                            LEFT JOIN PRODUCTIONDEMAND p ON p.CODE = s2.LOTCODE
                                                                                                            LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'MachineNoCode'
                                                                                                            WHERE
                                                                                                                s.TEMPLATECODE = '120' 
                                                                                                                AND 
                                                                                                                s.ORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' -- PRODUCTION ORDER 
                                                                                                                AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '0'");
                                                                        $cek_lg_element = db2_fetch_assoc($q_lg_element);
                                                                    ?>
                                                                    <?php if ($cek_lg_element) : ?>
                                                                        *From Element
                                                                        <table width="30%" style="border:1px solid black;border-collapse:collapse;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">Tanggal Terima Kain</th>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">LOTCODE</th>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">MESIN KNT</th>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">PROJECTCODE</th>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">LEBAR x GRAMASI</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php while ($d_lg_element = db2_fetch_assoc($q_lg_element)) { ?>
                                                                                    <tr>
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['TRANSACTIONDATE']; ?></td>
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['LOTCODE']; ?></td>
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['MESIN_KNT']; ?></td>
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['PROJECTCODE']; ?></td>
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['LEBAR'] . ' x ' . $d_lg_element['GRAMASI']; ?></td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    <?php endif; ?>

                                                                    <?php
                                                                        $q_lg_element_cut   = db2_exec($conn1, "SELECT DISTINCT
                                                                                                                    s4.TRANSACTIONDATE,
                                                                                                                    s4.LOTCODE,
                                                                                                                    a2.VALUESTRING AS MESIN_KNT,
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
                                                                                                                LEFT JOIN PRODUCTIONDEMAND p ON p.CODE = s2.LOTCODE
                                                                                                                LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'MachineNoCode'
                                                                                                                WHERE
                                                                                                                    s.TEMPLATECODE = '120' 
                                                                                                                    AND s.ORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' -- PRODUCTION NUMBER
                                                                                                                    AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '8'");
                                                                        $cek_lg_element_cut = db2_fetch_assoc($q_lg_element_cut);
                                                                    ?>
                                                                    <?php if (!empty($cek_lg_element_cut['LEBAR'])) : ?>
                                                                        *From Cutting Element
                                                                        <table width="30%" style="border:1px solid black;border-collapse:collapse;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">Tanggal Terima Kain</th>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">LOTCODE</th>
                                                                                    <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">MESIN KNT</th>
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
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['MESIN_KNT']; ?></td>
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['PROJECTCODE']; ?></td>
                                                                                        <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['LEBAR'] . ' x ' . $d_lg_element_cut['GRAMASI']; ?></td>
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
                                                                        ini_set("error_reporting", 1);
                                                                        $sql_benang = "SELECT DISTINCT
                                                                                            TRIM(p.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE
                                                                                        FROM  
                                                                                            STOCKTRANSACTION s 
                                                                                        LEFT JOIN STOCKTRANSACTION s2 ON s2.ITEMELEMENTCODE = s.ITEMELEMENTCODE AND s2.TEMPLATECODE = '204'
                                                                                        LEFT JOIN PRODUCTIONRESERVATION p ON p.ORDERCODE = s2.LOTCODE 
                                                                                        WHERE
                                                                                            s.TEMPLATECODE = '120' 
                                                                                            AND 
                                                                                            s.ORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' -- PRODUCTION ORDER 
                                                                                            AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '0'";
                                                                        $q_benang   = db2_exec($conn1, $sql_benang);
                                                                        $q_benang2   = db2_exec($conn1, $sql_benang);
                                                                        $no = 1;
                                                                        $cekada_benang  = db2_fetch_assoc($q_benang);                                                                            
                                                                    ?>
                                                                    <?php if(!empty($cekada_benang['PRODUCTIONORDERCODE'])){ ?>
                                                                        <?php   
                                                                            while ($d_benang = db2_fetch_assoc($q_benang2)) {
                                                                                $r_benang[]      = "'".$d_benang['PRODUCTIONORDERCODE']."'";
                                                                            }
                                                                            $value_benang        = implode(',', $r_benang);

                                                                            $q_lotcode  = db2_exec($conn1, "SELECT 
                                                                                                                LISTAGG(TRIM(LOTCODE), ', ') AS LOTCODE,
                                                                                                                LONGDESCRIPTION
                                                                                                                FROM
                                                                                                                (SELECT DISTINCT 
                                                                                                                            CASE
                                                                                                                                WHEN LOCATE('+', s.LOTCODE) > 1 THEN SUBSTR(s.LOTCODE, 1, LOCATE('+', s.LOTCODE)-1)
                                                                                                                                ELSE s.LOTCODE
                                                                                                                            END AS LOTCODE,
                                                                                                                            p2.LONGDESCRIPTION
                                                                                                                        FROM
                                                                                                                            STOCKTRANSACTION s
                                                                                                                        LEFT JOIN PRODUCT p2 ON p2.ITEMTYPECODE = s.ITEMTYPECODE AND NOT 
                                                                                                                                                    p2.ITEMTYPECODE = 'DYC' AND NOT 
                                                                                                                                                    p2.ITEMTYPECODE = 'WTR' AND 
                                                                                                                                                    p2.SUBCODE01 = s.DECOSUBCODE01  AND 
                                                                                                                                                    p2.SUBCODE02 = s.DECOSUBCODE02 AND
                                                                                                                                                    p2.SUBCODE03 = s.DECOSUBCODE03 AND 
                                                                                                                                                    p2.SUBCODE04 = s.DECOSUBCODE04 AND
                                                                                                                                                    p2.SUBCODE05 = s.DECOSUBCODE05 AND 
                                                                                                                                                    p2.SUBCODE06 = s.DECOSUBCODE06 AND
                                                                                                                                                    p2.SUBCODE07 = s.DECOSUBCODE07 
                                                                                                                        WHERE
                                                                                                                            ORDERCODE IN ($value_benang)
                                                                                                                            AND (TEMPLATECODE = '125' OR TEMPLATECODE = '120'))
                                                                                                                GROUP BY
                                                                                                                    LONGDESCRIPTION");
                                                                            while ($d_lotcode = db2_fetch_assoc($q_lotcode)) {
                                                                        ?>
                                                                            <span style="color:#000000; font-size:12px; font-family: Microsoft Sans Serif;">
                                                                                <?= $no++; ?>. <?= $d_lotcode['LONGDESCRIPTION']; ?> - <?= $d_lotcode['LOTCODE']; ?>
                                                                            </span><br>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Alur Normal</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top; white-space: wrap;">
                                                                    <?php
                                                                        $q_routing  = db2_exec($conn1, "SELECT
                                                                                                            TRIM(r.OPERATIONCODE) AS OPERATIONCODE,
                                                                                                            TRIM(r.LONGDESCRIPTION) AS DESCRIPTION 
                                                                                                        FROM
                                                                                                            PRODUCTIONDEMAND p
                                                                                                        LEFT JOIN ROUTINGSTEP r ON r.ROUTINGNUMBERID = p.ROUTINGNUMBERID 
                                                                                                        LEFT JOIN OPERATION o ON o.CODE = r.OPERATIONCODE 
                                                                                                        LEFT JOIN ADSTORAGE a ON a.UNIQUEID = o.ABSUNIQUEID AND a.FIELDNAME = 'AlurProses'
                                                                                                        WHERE 
                                                                                                            p.CODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' AND a.VALUESTRING = '2'
                                                                                                        ORDER BY
                                                                                                            r.SEQUENCE ASC");
                                                                    ?>
                                                                    <?php while ($d_routing = db2_fetch_assoc($q_routing)) { ?>
                                                                        <span style="background-color: #D0F39A;"><?= $d_routing['OPERATIONCODE']; ?></span>
                                                                    <?php } ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Hasil test quality</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <?php
                                                                        $q_cari_tq  = mysqli_query($con_db_qc, "SELECT * FROM tbl_tq_nokk WHERE nodemand = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' ORDER BY id DESC");
                                                                    ?>
                                                                    <?php while ($row_tq = mysqli_fetch_array($q_cari_tq)) { ?>
                                                                        <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_result.php?idkk=<?= $row_tq['id']; ?>&noitem=<?= $row_tq['no_item']; ?>&nohanger=<?= $row_tq['no_hanger']; ?>" target="_blank">Detail test quality (<?= $row_tq['no_test']; ?>)<i class="icofont icofont-external-link"></i></a><br>
                                                                    <?php } ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Hasil test inspect</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_inspectpackingreport.php?demand=<?= TRIM($demand_2); ?>&ispacking=true" target="_blank">Inspect Report <i class="icofont icofont-external-link"></i></a><br>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Hasil test inspect</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_inspectpackingreport.php?demand=<?= TRIM($demand_2); ?>&ispacking=true" target="_blank">Inspect Report <i class="icofont icofont-external-link"></i></a><br>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Detail bagi kain</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/nowgkg/pages/cetak/cetakbagikain.php?demandno=<?= TRIM($demand_2); ?>" target="_blank">Click here! <i class="icofont icofont-external-link"></i></a><br>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align: text-top;">Detail quantity packing</th>
                                                                <th style="vertical-align: text-top;">:</th>
                                                                <th style="vertical-align: text-top;">
                                                                    <form action="https://online.indotaichen.com/nowqcf/CekKainDemand" method="post" target="_blank">
                                                                        <input name="nodemand" value="<?= TRIM($demand_2); ?>" type="hidden" class="form-control form-control-sm" id="" required>
                                                                        <button class="btn-link" style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" type="submit">Click here! <i class="icofont icofont-external-link"></i></button>
                                                                    </form>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <span>Alur Aktual</span>
                                                    <div style="overflow-x:auto;">
                                                        <table width="100%" border="1">
                                                            <?php
                                                                ini_set("error_reporting", 1);
                                                                session_start();
                                                                require_once "koneksi.php";

                                                                // itxview_posisikk_tgl_in_prodorder_ins3
                                                                $posisikk_ins3 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_INS3 WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'");
                                                                while ($row_posisikk_ins3   = db2_fetch_assoc($posisikk_ins3)) {
                                                                    $r_posisikk_ins3[]      = "('" . TRIM(addslashes($row_posisikk_ins3['PRODUCTIONORDERCODE'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_ins3['OPERATIONCODE'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_ins3['PROPROGRESSPROGRESSNUMBER'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_ins3['DEMANDSTEPSTEPNUMBER'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_ins3['PROGRESSTEMPLATECODE'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_ins3['MULAI'])) . "',"
                                                                        . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                        . "'" . date('Y-m-d H:i:s') . "',"
                                                                        . "'" . 'Analisa KK' . "')";
                                                                }
                                                                if ($r_posisikk_ins3) {
                                                                    $value_posisikk_ins3        = implode(',', $r_posisikk_ins3);
                                                                    $insert_posisikk_ins3       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_ins3(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_posisikk_ins3");
                                                                }

                                                                // itxview_posisikk_tgl_in_prodorder_cnp1
                                                                $posisikk_cnp1 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_CNP1 WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'");
                                                                while ($row_posisikk_cnp1   = db2_fetch_assoc($posisikk_cnp1)) {
                                                                    $r_posisikk_cnp1[]      = "('" . TRIM(addslashes($row_posisikk_cnp1['PRODUCTIONORDERCODE'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_cnp1['OPERATIONCODE'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_cnp1['PROPROGRESSPROGRESSNUMBER'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_cnp1['DEMANDSTEPSTEPNUMBER'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_cnp1['PROGRESSTEMPLATECODE'])) . "',"
                                                                        . "'" . TRIM(addslashes($row_posisikk_cnp1['MULAI'])) . "',"
                                                                        . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                        . "'" . date('Y-m-d H:i:s') . "',"
                                                                        . "'" . 'Analisa KK' . "')";
                                                                }
                                                                if ($r_posisikk_cnp1) {
                                                                    $value_posisikk_cnp1        = implode(',', $r_posisikk_cnp1);
                                                                    $insert_posisikk_cnp1       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_cnp1(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_posisikk_cnp1");
                                                                }
                                                            ?>
                                                            <thead>
                                                                <?php
                                                                    ini_set("error_reporting", 1);
                                                                    $sqlDB2 = "SELECT
                                                                                    p.WORKCENTERCODE,
                                                                                    CASE
                                                                                        WHEN p.PRODRESERVATIONLINKGROUPCODE IS NULL THEN TRIM(p.OPERATIONCODE) 
                                                                                        WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE) 
                                                                                        ELSE p.PRODRESERVATIONLINKGROUPCODE
                                                                                    END	AS OPERATIONCODE,
                                                                                    TRIM(o.OPERATIONGROUPCODE) AS OPERATIONGROUPCODE,
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
                                                                                    p.PRODUCTIONORDERCODE  = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' AND p.PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                    -- AND NOT iptip.MULAI IS NULL AND NOT iptop.SELESAI IS NULL
                                                                                ORDER BY iptip.MULAI ASC";
                                                                    $stmt = db2_exec($conn1, $sqlDB2);
                                                                    $stmt2 = db2_exec($conn1, $sqlDB2);
                                                                    $stmt3 = db2_exec($conn1, $sqlDB2);
                                                                    $stmt4 = db2_exec($conn1, $sqlDB2);
                                                                    $stmt5 = db2_exec($conn1, $sqlDB2);
                                                                    $stmt6 = db2_exec($conn1, $sqlDB2);
                                                                    $stmt7 = db2_exec($conn1, $sqlDB2);
                                                                ?>
                                                                <tr>
                                                                    <?php while ($rowdb2 = db2_fetch_assoc($stmt)) { ?>
                                                                        <?php
                                                                            $q_QA_DATA  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                        WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                        AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                        AND WORKCENTERCODE = '$rowdb2[WORKCENTERCODE]' 
                                                                                                                        AND OPERATIONCODE = '$rowdb2[OPERATIONCODE]' 
                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                        AND STATUS = 'Analisa KK'
                                                                                                                        ORDER BY LINE ASC");
                                                                            $cek_QA_DATA    = mysqli_fetch_assoc($q_QA_DATA);
                                                                        ?>
                                                                        <?php if ($cek_QA_DATA) : ?>
                                                                            <th style="text-align: center;"><?= $rowdb2['OPERATIONCODE']; ?></th>
                                                                        <?php endif; ?>
                                                                    <?php } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php while ($rowdb4 = db2_fetch_assoc($stmt4)) { ?>
                                                                        <?php
                                                                            $q_QA_DATA4  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                        WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                        AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                        AND WORKCENTERCODE = '$rowdb4[WORKCENTERCODE]' 
                                                                                                                        AND OPERATIONCODE = '$rowdb4[OPERATIONCODE]' 
                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                        AND STATUS = 'Analisa KK'
                                                                                                                        ORDER BY LINE ASC");
                                                                            $cek_QA_DATA4    = mysqli_fetch_assoc($q_QA_DATA4);
                                                                        ?>
                                                                        <?php if ($cek_QA_DATA4) : ?>
                                                                            <th style="text-align: center; font-size:15px; background-color: #EEE6B3">
                                                                                <?php if ($rowdb4['OPERATIONCODE'] == 'INS3') : ?>
                                                                                    <?php
                                                                                        $q_mulai_ins3   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                            * 
                                                                                                                                        FROM
                                                                                                                                            `itxview_posisikk_tgl_in_prodorder_ins3_detaildemandstep` 
                                                                                                                                        WHERE
                                                                                                                                            productionordercode = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'
                                                                                                                                            AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                        ORDER BY
                                                                                                                                            MULAI ASC LIMIT 1");
                                                                                        $d_mulai_ins3   = mysqli_fetch_assoc($q_mulai_ins3);
                                                                                        echo $d_mulai_ins3['MULAI'];
                                                                                    ?>
                                                                                <?php elseif ($rowdb4['OPERATIONCODE'] == 'CNP1') : ?>
                                                                                    <?php
                                                                                        $q_mulai_cnp1   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                            * 
                                                                                                                                        FROM
                                                                                                                                            `itxview_posisikk_tgl_in_prodorder_cnp1_detaildemandstep` 
                                                                                                                                        WHERE
                                                                                                                                            productionordercode = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'
                                                                                                                                            AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                        ORDER BY
                                                                                                                                            MULAI ASC LIMIT 1");
                                                                                        $d_mulai_cnp1   = mysqli_fetch_assoc($q_mulai_cnp1);
                                                                                        echo $d_mulai_cnp1['MULAI'];
                                                                                    ?>
                                                                                <?php else : ?>
                                                                                    <?= $rowdb4['MULAI']; ?>
                                                                                <?php endif; ?>
                                                                                <br>
                                                                                <?php if ($rowdb4['OPERATIONCODE'] == 'INS3') : ?>
                                                                                    <?php
                                                                                    $q_mulai_ins3   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                        * 
                                                                                                                                    FROM
                                                                                                                                        `itxview_posisikk_tgl_in_prodorder_ins3_detaildemandstep` 
                                                                                                                                    WHERE
                                                                                                                                        productionordercode = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'
                                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                    ORDER BY
                                                                                                                                        MULAI DESC LIMIT 1");
                                                                                    $d_mulai_ins3   = mysqli_fetch_assoc($q_mulai_ins3);
                                                                                    echo $d_mulai_ins3['MULAI'];
                                                                                    ?>
                                                                                <?php elseif ($rowdb4['OPERATIONCODE'] == 'CNP1') : ?>
                                                                                    <?php
                                                                                    $q_mulai_cnp1   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                        * 
                                                                                                                                    FROM
                                                                                                                                        `itxview_posisikk_tgl_in_prodorder_cnp1_detaildemandstep` 
                                                                                                                                    WHERE
                                                                                                                                        productionordercode = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'
                                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                    ORDER BY
                                                                                                                                        MULAI DESC LIMIT 1");
                                                                                    $d_mulai_cnp1   = mysqli_fetch_assoc($q_mulai_cnp1);
                                                                                    echo $d_mulai_cnp1['MULAI'];
                                                                                    ?>
                                                                                <?php else : ?>
                                                                                    <?= $rowdb4['SELESAI']; ?>
                                                                                <?php endif; ?>
                                                                            </th>
                                                                        <?php endif; ?>
                                                                    <?php } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php while ($rowdb3 = db2_fetch_assoc($stmt2)) { ?>
                                                                        <?php
                                                                            $q_QA_DATA2  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                        WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                        AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                        AND WORKCENTERCODE = '$rowdb3[WORKCENTERCODE]' 
                                                                                                                        AND OPERATIONCODE = '$rowdb3[OPERATIONCODE]' 
                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                        AND STATUS = 'Analisa KK'
                                                                                                                        ORDER BY LINE ASC");
                                                                            $cek_QA_DATA2    = mysqli_fetch_assoc($q_QA_DATA2);
                                                                        ?>
                                                                        <?php if ($cek_QA_DATA2) : ?>
                                                                            <th style="text-align: center;"><?= $rowdb3['MESIN']; ?></th>
                                                                        <?php endif; ?>
                                                                    <?php } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php while ($rowdb5 = db2_fetch_assoc($stmt5)) { ?>
                                                                        <?php
                                                                            $q_QA_DATA5  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                        WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                        AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                        AND WORKCENTERCODE = '$rowdb5[WORKCENTERCODE]' 
                                                                                                                        AND OPERATIONCODE = '$rowdb5[OPERATIONCODE]' 
                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                        AND STATUS = 'Analisa KK'
                                                                                                                        ORDER BY LINE ASC");
                                                                            $cek_QA_DATA5    = mysqli_fetch_assoc($q_QA_DATA5);
                                                                        ?>
                                                                        <?php if ($cek_QA_DATA5) : ?>
                                                                            <?php $opr = $rowdb5['OPERATIONCODE']; if(str_contains($opr, 'DYE')) : ?>
                                                                                <?php
                                                                                    $prod_order     = TRIM($d_ITXVIEWKK_2['PRODUCTIONORDERCODE']);
                                                                                    $prod_demand    = TRIM($demand_2);

                                                                                    $q_dye_montemp      = mysqli_query($con_db_dyeing, "SELECT
                                                                                                                                            a.id AS idm,
                                                                                                                                            b.id AS ids,
                                                                                                                                            b.no_resep 
                                                                                                                                        FROM
                                                                                                                                            tbl_montemp a
                                                                                                                                            LEFT JOIN tbl_schedule b ON a.id_schedule = b.id
                                                                                                                                            LEFT JOIN tbl_setting_mesin c ON b.nokk = c.nokk 
                                                                                                                                        WHERE
                                                                                                                                            b.nokk = '$prod_order' AND b.nodemand LIKE '%$prod_demand%'
                                                                                                                                        ORDER BY
                                                                                                                                            a.id DESC LIMIT 1 ");
                                                                                    $d_dye_montemp      = mysqli_fetch_assoc($q_dye_montemp);

                                                                                ?>
                                                                                <th style="text-align: center;">
                                                                                    <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/dye-itti/pages/cetak/cetak_monitoring_new.php?idkk=&no=<?= $d_dye_montemp['no_resep']; ?>&idm=<?php echo $d_dye_montemp['idm']; ?>&ids=<?php echo $d_dye_montemp['ids']; ?>" target="_blank">Monitoring <i class="icofont icofont-external-link"></i></a>
                                                                                    &ensp;
                                                                                    <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/laporan/dye_filter_bon_reservation.php?demand=<?= $demand_2; ?>&prod_order=<?= $d_ITXVIEWKK_2['PRODUCTIONORDERCODE']; ?>" target="_blank">Bon Resep <i class="icofont icofont-external-link"></i></a>
                                                                                </th>
                                                                            <?php else : ?>
                                                                                    <?php $opr_grup = $rowdb5['OPERATIONGROUPCODE']; if(str_contains($opr_grup, "FIN")) : ?>
                                                                                        <th style="text-align: center;">
                                                                                            <!-- <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/finishing2-new/reports/pages/reports-detail-stenter.php?FromAnalisa=FromAnalisa&prod_order=<?= TRIM($d_ITXVIEWKK_2['PRODUCTIONORDERCODE']); ?>&prod_demand=<?= TRIM($demand_2); ?>&tgl_in=<?= substr($rowdb5['MULAI'], 1, 10); ?>&tgl_out=<?= substr($rowdb5['SELESAI'], 1, 10); ?>" target="_blank">Detail proses <i class="icofont icofont-external-link"></i></a> -->
                                                                                        </th>
                                                                                    <?php else : ?>
                                                                                        <th style="text-align: center;">-</th>
                                                                                    <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    <?php } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php while ($rowdb7 = db2_fetch_assoc($stmt7)) { ?>
                                                                        <?php
                                                                            $q_QA_DATA7  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                        WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                        AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                        AND WORKCENTERCODE = '$rowdb7[WORKCENTERCODE]' 
                                                                                                                        AND OPERATIONCODE = '$rowdb7[OPERATIONCODE]' 
                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                        AND STATUS = 'Analisa KK'
                                                                                                                        ORDER BY LINE ASC");
                                                                            $cek_QA_DATA7    = mysqli_fetch_assoc($q_QA_DATA7);
                                                                        ?>
                                                                        <?php if ($cek_QA_DATA7) : ?>
                                                                            <?php
                                                                                $q_routing  = mysqli_query($con_nowprd, "SELECT * FROM keterangan_leader 
                                                                                                                            WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                            AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]'
                                                                                                                            AND OPERATIONCODE = '$rowdb7[OPERATIONCODE]'");
                                                                                $d_routing  = mysqli_fetch_assoc($q_routing);
                                                                            ?>
                                                                            <td style="vertical-align: top; font-size:15px;">
                                                                                <?= substr($d_routing['KETERANGAN'], 0,35); ?><?php if(substr($d_routing['KETERANGAN'], 0,35)){ echo "<br>"; } ?>
                                                                                <?= substr($d_routing['KETERANGAN'], 35,70); ?><?php if(substr($d_routing['KETERANGAN'], 35,70)){ echo "<br>"; } ?>
                                                                                <?= substr($d_routing['KETERANGAN'], 70,105); ?><?php if(substr($d_routing['KETERANGAN'], 70,105)){ echo "<br>"; } ?>
                                                                                <?= substr($d_routing['KETERANGAN'], 105,140); ?><?php if(substr($d_routing['KETERANGAN'], 105,140)){ echo "<br>"; } ?>
                                                                                <?= substr($d_routing['KETERANGAN'], 140,175); ?><?php if(substr($d_routing['KETERANGAN'], 140,175)){ echo "<br>"; } ?>
                                                                                <?= substr($d_routing['KETERANGAN'], 175,210); ?><?php if(substr($d_routing['KETERANGAN'], 175,210)){ echo "<br>"; } ?>
                                                                                <?= substr($d_routing['KETERANGAN'], 210); ?><?php if(substr($d_routing['KETERANGAN'], 210)){ echo ""; } ?>
                                                                            </td>
                                                                        <?php endif; ?>
                                                                    <?php } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php while ($rowdb6 = db2_fetch_assoc($stmt6)) { ?>
                                                                        <?php
                                                                            $q_QA_DATA8  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                        WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                        AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                        AND WORKCENTERCODE = '$rowdb6[WORKCENTERCODE]' 
                                                                                                                        AND OPERATIONCODE = '$rowdb6[OPERATIONCODE]' 
                                                                                                                        AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                        AND STATUS = 'Analisa KK'
                                                                                                                        ORDER BY LINE ASC");
                                                                            $cek_QA_DATA8    = mysqli_fetch_assoc($q_QA_DATA8);
                                                                        ?>
                                                                        <?php if ($cek_QA_DATA8) : ?>
                                                                            <?php
                                                                                $q_specs    = db2_exec($conn1, "SELECT 
                                                                                                                TRIM(a.NAMENAME) AS NAMENAME,
                                                                                                                a.VALUESTRING,
                                                                                                                floor(a.VALUEDECIMAL) AS VALUEDECIMAL
                                                                                                            FROM 
                                                                                                                PRODUCTIONSPECS p 
                                                                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID
                                                                                                            WHERE 
                                                                                                                OPERATIONCODE = '$rowdb6[OPERATIONCODE]' 
                                                                                                                AND SUBCODE01 = '$d_ITXVIEWKK_2[SUBCODE01]' 
                                                                                                                AND SUBCODE02 = '$d_ITXVIEWKK_2[SUBCODE02]' 
                                                                                                                AND SUBCODE03 ='$d_ITXVIEWKK_2[SUBCODE03]' 
                                                                                                                AND SUBCODE04 = '$d_ITXVIEWKK_2[SUBCODE04]'");
                                                                            ?>
                                                                            <td style="vertical-align: top; font-size:15px;">
                                                                                <b>Acuan Standart :</b> <br>
                                                                                <?php while ($d_specs = db2_fetch_assoc($q_specs)) {  ?>
                                                                                    <li><?= $d_specs['NAMENAME']; ?> : <?= $d_specs['VALUESTRING'].$d_specs['VALUEDECIMAL']; ?> </li>
                                                                                <?php } ?>
                                                                            </td>
                                                                        <?php endif; ?>
                                                                    <?php } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php while ($rowdb4 = db2_fetch_assoc($stmt3)) { ?>
                                                                        <?php
                                                                            $sqlQAData      = "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                AND WORKCENTERCODE = '$rowdb4[WORKCENTERCODE]' 
                                                                                                AND OPERATIONCODE = '$rowdb4[OPERATIONCODE]' 
                                                                                                AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                AND STATUS = 'Analisa KK'
                                                                                                ORDER BY LINE ASC";
                                                                            $q_QA_DATAcek   = mysqli_query($con_nowprd, $sqlQAData);
                                                                            $d_QA_DATAcek   = mysqli_fetch_assoc($q_QA_DATAcek);
                                                                        ?>
                                                                        <?php if ($d_QA_DATAcek) : ?>
                                                                            <td style="vertical-align: top; font-size:15px;">
                                                                                <?php $q_QA_DATA7     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                                <?php $no = 1; while ($d_QA_DATA7 = mysqli_fetch_array($q_QA_DATA7)) : ?>
                                                                                    <?php $char_code = $d_QA_DATA7['CHARACTERISTICCODE']; ?>
                                                                                        <?php if(str_contains($char_code, 'GRB') != true && ($char_code == 'LEBAR' || $char_code == 'GRAMASI')) : ?>
                                                                                            <?= $no++ . ' : ' . $d_QA_DATA7['CHARACTERISTICCODE'] . ' = ' . $d_QA_DATA7['VALUEQUANTITY'] . '<br>'; ?>
                                                                                        <?php endif; ?>
                                                                                <?php endwhile; ?>
                                                                                <hr>
                                                                                <?php $q_QA_DATA3     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                                <?php $no = 1; while ($d_QA_DATA3 = mysqli_fetch_array($q_QA_DATA3)) : ?>
                                                                                    <?php $char_code = $d_QA_DATA3['CHARACTERISTICCODE']; ?>
                                                                                    <?php  if(str_contains($char_code, 'GRB') != true && $char_code <> 'LEBAR' && $char_code <> 'GRAMASI') : ?>
                                                                                        <?php   
                                                                                            if($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '1'){
                                                                                                $grouping_hue = 'A';
                                                                                            }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '2'){
                                                                                                $grouping_hue = 'B';
                                                                                            }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '3'){
                                                                                                $grouping_hue = 'C';
                                                                                            }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '4'){
                                                                                                $grouping_hue = 'D';
                                                                                            }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '1'){
                                                                                                $grouping_hue = 'Red';
                                                                                            }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '2'){
                                                                                                $grouping_hue = 'Yellow';
                                                                                            }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '3'){
                                                                                                $grouping_hue = 'Green';
                                                                                            }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '4'){
                                                                                                $grouping_hue = 'Blue';
                                                                                            }else{
                                                                                                $grouping_hue = $d_QA_DATA3['VALUEQUANTITY'];
                                                                                            }
                                                                                        ?>
                                                                                        <?= $no++ . ' : ' . $d_QA_DATA3['CHARACTERISTICCODE'] . ' = ' . $grouping_hue . '<br>'; ?>
                                                                                    <?php endif; ?>
                                                                                <?php endwhile; ?>
                                                                                <hr>
                                                                                <?php $q_QA_DATA6     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                                <?php $no = 1; while ($d_QA_DATA6 = mysqli_fetch_array($q_QA_DATA6)) : ?>
                                                                                    <?php $char_code = $d_QA_DATA6['CHARACTERISTICCODE']; ?>
                                                                                    <?php  if(str_contains($char_code, 'GRB')) : ?>
                                                                                        <?= $no++ . ' : ' . $d_QA_DATA6['CHARACTERISTICCODE'] . ' = ' . $d_QA_DATA6['VALUEQUANTITY'] . '<br>'; ?>
                                                                                    <?php endif; ?>
                                                                                <?php endwhile; ?>
                                                                            </td>
                                                                        <?php endif; ?>
                                                                    <?php } ?>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                    <hr>

                                                    <!-- LOOPING 2 UNTUK SALINAN -->
                                                    <?php
                                                        $q_looping2_bd2     = db2_exec($conn1, "SELECT
                                                                                                TRIM(p.CODE) AS PRODUCTIONDEMANDCODE
                                                                                            FROM
                                                                                                PRODUCTIONDEMAND p
                                                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'
                                                                                            WHERE
                                                                                                SUBSTR(a.VALUESTRING, 5, 8) = '$row_looping1_bd2[PRODUCTIONDEMANDCODE]'");
                                                    ?>
                                                    <?php while($row_looping2_bd2 = db2_fetch_assoc($q_looping2_bd2)) : ?>
                                                        <?php
                                                            require_once "koneksi.php";

                                                            $demand_2     = $row_looping2_bd2['PRODUCTIONDEMANDCODE'];


                                                            $q_ITXVIEWKK_2    = db2_exec($conn1, "SELECT * FROM ITXVIEWKK WHERE PRODUCTIONDEMANDCODE = '$demand_2'");
                                                            $d_ITXVIEWKK_2    = db2_fetch_assoc($q_ITXVIEWKK_2);

                                                            if($_GET['prod_order']){
                                                                $prod_order     = $_GET['prod_order'];
                                                            }elseif($_POST['prod_order']) {
                                                                $prod_order     = $_POST['prod_order'];
                                                            }else{
                                                                $prod_order     = $d_ITXVIEWKK_2['PRODUCTIONORDERCODE'];
                                                            }

                                                            $sql_pelanggan_buyer     = db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$d_ITXVIEWKK_2[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                                                                            AND CODE = '$d_ITXVIEWKK_2[PROJECTCODE]'");
                                                            $dt_pelanggan_buyer        = db2_fetch_assoc($sql_pelanggan_buyer);

                                                            // itxview_detail_qa_data
                                                            $itxview_detail_qa_data     = db2_exec($conn1, "SELECT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                            WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                            AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                            AND OPERATIONCODE IN ('" . implode("','", $_POST['operation2']) . "') 
                                                                                                            ORDER BY LINE ASC");
                                                            while ($row_itxview_detail_qa_data     = db2_fetch_assoc($itxview_detail_qa_data)) {
                                                                $r_itxview_detail_qa_data[]        = "('" . TRIM(addslashes($row_itxview_detail_qa_data['PRODUCTIONDEMANDCODE'])) . "',"
                                                                                                    . "'" . TRIM(addslashes($row_itxview_detail_qa_data['PRODUCTIONORDERCODE'])) . "',"
                                                                                                    . "'" . TRIM(addslashes($row_itxview_detail_qa_data['WORKCENTERCODE'])) . "',"
                                                                                                    . "'" . TRIM(addslashes($row_itxview_detail_qa_data['OPERATIONCODE'])) . "',"
                                                                                                    . "'" . TRIM(addslashes($row_itxview_detail_qa_data['LINE'])) . "',"
                                                                                                    . "'" . TRIM(addslashes($row_itxview_detail_qa_data['QUALITYDOCUMENTHEADERNUMBERID'])) . "',"
                                                                                                    . "'" . TRIM(addslashes($row_itxview_detail_qa_data['CHARACTERISTICCODE'])) . "',"
                                                                                                    . "'" . TRIM(addslashes($row_itxview_detail_qa_data['LONGDESCRIPTION'])) . "',"
                                                                                                    . "'" . TRIM(addslashes($row_itxview_detail_qa_data['VALUEQUANTITY'])) . "',"
                                                                                                    . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                                                    . "'" . date('Y-m-d H:i:s') . "',"
                                                                                                    . "'" . 'Analisa KK' . "')";
                                                            }
                                                            if(!empty($r_itxview_detail_qa_data)){
                                                                $value_itxview_detail_qa_data        = implode(',', $r_itxview_detail_qa_data);
                                                                $insert_itxview_detail_qa_data       = mysqli_query($con_nowprd, "INSERT INTO itxview_detail_qa_data(PRODUCTIONDEMANDCODE,PRODUCTIONORDERCODE,WORKCENTERCODE,OPERATIONCODE,LINE,QUALITYDOCUMENTHEADERNUMBERID,CHARACTERISTICCODE,LONGDESCRIPTION,VALUEQUANTITY,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_itxview_detail_qa_data");
                                                            }
                                                        ?>
                                                        <center style="background-color: #e67e22; color: white;">
                                                            <i class="ti-angle-double-down"></i> 
                                                            <strong>Salinan dari demand <?= substr($d_ITXVIEWKK['ORIGINALPDCODE'], 4, 8); ?></strong>
                                                            <i class="ti-angle-double-down"></i> 
                                                        </center>
                                                        <table width="100%" style="border: 1px solid black; border-collapse: collapse;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Prod. Order</th>
                                                                    <th>:</th>
                                                                    <th><?= $d_ITXVIEWKK_2['PRODUCTIONORDERCODE']; ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Prod. Demand</th>
                                                                    <th>:</th>
                                                                    <th><?= $demand_2; ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th>LOT Internal</th>
                                                                    <th>:</th>
                                                                    <th><?= $d_ITXVIEWKK_2['LOT']; ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Original PD Code</th>
                                                                    <th>:</th>
                                                                    <th><?= substr($d_ITXVIEWKK_2['ORIGINALPDCODE'], 4, 8); ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="vertical-align: text-top;">Item Code</th>
                                                                    <th style="vertical-align: text-top;">:</th>
                                                                    <th style="vertical-align: text-top; white-space: wrap;">
                                                                        <?= TRIM($d_ITXVIEWKK_2['SUBCODE02']) . '-' . TRIM($d_ITXVIEWKK_2['SUBCODE03']); ?>
                                                                        <?= substr($d_ITXVIEWKK_2['ITEMDESCRIPTION'], 0, 200); ?><?php if (substr($d_ITXVIEWKK_2['ITEMDESCRIPTION'], 0, 200)) {
                                                                                                                                    echo "<br>";
                                                                                                                                } ?>
                                                                        <?= substr($d_ITXVIEWKK_2['ITEMDESCRIPTION'], 201); ?><?php if (substr($d_ITXVIEWKK_2['ITEMDESCRIPTION'], 201)) {
                                                                                                                                echo "<br>";
                                                                                                                            } ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="vertical-align: text-top;">Lebar x Gramasi Kain Jadi</th>
                                                                    <th style="vertical-align: text-top;">:</th>
                                                                    <th style="vertical-align: text-top;">
                                                                        <?php 
                                                                            $q_lebar = db2_exec($conn1, "SELECT * FROM ITXVIEWLEBAR WHERE SALESORDERCODE = '$d_ITXVIEWKK_2[BONORDER]' AND ORDERLINE = '$d_ITXVIEWKK_2[ORDERLINE]'");
                                                                            $d_lebar = db2_fetch_assoc($q_lebar);
                                                                        ?>
                                                                        <?php 
                                                                            $q_gramasi = db2_exec($conn1, "SELECT * FROM ITXVIEWGRAMASI WHERE SALESORDERCODE = '$d_ITXVIEWKK_2[BONORDER]' AND ORDERLINE = '$d_ITXVIEWKK_2[ORDERLINE]'");
                                                                            $d_gramasi = db2_fetch_assoc($q_gramasi);
                                                                        ?>
                                                                        <?php 
                                                                            if($d_gramasi['GRAMASI_KFF']){
                                                                                $gramasi = number_format($d_gramasi['GRAMASI_KFF'], 0);
                                                                            }elseif($d_gramasi['GRAMASI_FKF']){
                                                                                $gramasi = number_format($d_gramasi['GRAMASI_FKF'], 0);
                                                                            }else{
                                                                                $gramasi = '-';
                                                                            }
                                                                        ?>
                                                                        <?= number_format($d_lebar['LEBAR'],0).' x '.$gramasi; ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="vertical-align: text-top;">Lebar x Gramasi Inspection</th>
                                                                    <th style="vertical-align: text-top;">:</th>
                                                                    <th style="vertical-align: text-top;">
                                                                        <?php
                                                                            $q_lg_INS3  = db2_exec($conn1, "SELECT
                                                                                                                e.ELEMENTCODE,
                                                                                                                e.WIDTHGROSS,
                                                                                                                a.VALUEDECIMAL 
                                                                                                            FROM
                                                                                                                ELEMENTSINSPECTION e 
                                                                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = e.ABSUNIQUEID AND a.FIELDNAME = 'GSM'
                                                                                                            WHERE
                                                                                                                e.ELEMENTCODE LIKE '$demand_2%'
                                                                                                            ORDER BY 
                                                                                                                e.INSPECTIONSTARTDATETIME ASC LIMIT 1");
                                                                            $d_lg_INS3  = db2_fetch_assoc($q_lg_INS3);

                                                                            echo $d_lg_INS3['WIDTHGROSS'];
                                                                            if($d_lg_INS3['VALUEDECIMAL']){
                                                                                echo ' x '.$d_lg_INS3['VALUEDECIMAL'];
                                                                            }else{
                                                                                echo ' x ...' ;
                                                                            }
                                                                        ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="vertical-align: text-top;">Lebar x Gramasi Standart Greige</th>
                                                                    <th style="vertical-align: text-top;">:</th>
                                                                    <th style="vertical-align: text-top;">
                                                                        <?php
                                                                        $q_lg_standart  = db2_exec($conn1, "SELECT 
                                                                                                                a.VALUEDECIMAL AS LEBAR,
                                                                                                                a2.VALUEDECIMAL AS GRAMASI
                                                                                                            FROM 
                                                                                                                PRODUCT p 
                                                                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'Width'
                                                                                                            LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'GSM'
                                                                                                            WHERE 
                                                                                                                SUBCODE01 = '$d_ITXVIEWKK_2[SUBCODE01]' 
                                                                                                                AND SUBCODE02 = '$d_ITXVIEWKK_2[SUBCODE02]' 
                                                                                                                AND SUBCODE03 = '$d_ITXVIEWKK_2[SUBCODE03]'
                                                                                                                AND SUBCODE04 = '$d_ITXVIEWKK_2[SUBCODE04]' 
                                                                                                                AND ITEMTYPECODE = 'KGF'");
                                                                        $d_lg_standart  = db2_fetch_assoc($q_lg_standart);
                                                                        echo number_format($d_lg_standart['LEBAR'], 0) . ' x ' . number_format($d_lg_standart['GRAMASI'], 0);
                                                                        ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="vertical-align: text-top;">Gauge x Diameter Mesin (inch) </th>
                                                                    <th style="vertical-align: text-top;">:</th>
                                                                    <th style="vertical-align: text-top;">
                                                                        <?php
                                                                        $q_lg_standart  = db2_exec($conn1, "SELECT 
                                                                                                                a.VALUEDECIMAL AS LEBAR,
                                                                                                                a2.VALUEDECIMAL AS GRAMASI
                                                                                                            FROM 
                                                                                                                PRODUCT p 
                                                                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'Gauge'
                                                                                                            LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'Diameter'
                                                                                                            WHERE 
                                                                                                                SUBCODE01 = '$d_ITXVIEWKK_2[SUBCODE01]' 
                                                                                                                AND SUBCODE02 = '$d_ITXVIEWKK_2[SUBCODE02]' 
                                                                                                                AND SUBCODE03 = '$d_ITXVIEWKK_2[SUBCODE03]'
                                                                                                                AND SUBCODE04 = '$d_ITXVIEWKK_2[SUBCODE04]' 
                                                                                                                AND ITEMTYPECODE = 'KGF'");
                                                                        $d_lg_standart  = db2_fetch_assoc($q_lg_standart);
                                                                        echo number_format($d_lg_standart['LEBAR'], 0) . ' x ' . number_format($d_lg_standart['GRAMASI'], 0);
                                                                        ?>
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
                                                                                                                    a2.VALUESTRING AS MESIN_KNT,
                                                                                                                    s.PROJECTCODE,
                                                                                                                    floor(e.WIDTHNET) AS LEBAR, -- Untuk laporan mr. james
                                                                                                                    floor(a.VALUEDECIMAL) AS GRAMASI -- Untuk laporan mr. james
                                                                                                                FROM  
                                                                                                                    STOCKTRANSACTION s 
                                                                                                                LEFT JOIN STOCKTRANSACTION s2 ON s2.ITEMELEMENTCODE = s.ITEMELEMENTCODE AND s2.TEMPLATECODE = '204'
                                                                                                                LEFT JOIN ELEMENTSINSPECTION e ON e.DEMANDCODE = s2.LOTCODE AND e.ELEMENTCODE = s2.ITEMELEMENTCODE -- Untuk laporan mr. james
                                                                                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = e.ABSUNIQUEID AND a.FIELDNAME = 'GSM' -- Untuk laporan mr. james
                                                                                                                LEFT JOIN PRODUCTIONDEMAND p ON p.CODE = s2.LOTCODE
                                                                                                                LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'MachineNoCode'
                                                                                                                WHERE
                                                                                                                    s.TEMPLATECODE = '120' 
                                                                                                                    AND 
                                                                                                                    s.ORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' -- PRODUCTION ORDER 
                                                                                                                    AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '0'");
                                                                            $cek_lg_element = db2_fetch_assoc($q_lg_element);
                                                                        ?>
                                                                        <?php if ($cek_lg_element) : ?>
                                                                            *From Element
                                                                            <table width="30%" style="border:1px solid black;border-collapse:collapse;">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">Tanggal Terima Kain</th>
                                                                                        <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">LOTCODE</th>
                                                                                        <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">MESIN KNT</th>
                                                                                        <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">PROJECTCODE</th>
                                                                                        <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">LEBAR x GRAMASI</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php while ($d_lg_element = db2_fetch_assoc($q_lg_element)) { ?>
                                                                                        <tr>
                                                                                            <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['TRANSACTIONDATE']; ?></td>
                                                                                            <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['LOTCODE']; ?></td>
                                                                                            <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['MESIN_KNT']; ?></td>
                                                                                            <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['PROJECTCODE']; ?></td>
                                                                                            <td style="border:1px solid red; text-align: center;"><?= $d_lg_element['LEBAR'] . ' x ' . $d_lg_element['GRAMASI']; ?></td>
                                                                                        </tr>
                                                                                    <?php } ?>
                                                                                </tbody>
                                                                            </table>
                                                                        <?php endif; ?>

                                                                        <?php
                                                                            $q_lg_element_cut   = db2_exec($conn1, "SELECT DISTINCT
                                                                                                                        s4.TRANSACTIONDATE,
                                                                                                                        s4.LOTCODE,
                                                                                                                        a2.VALUESTRING AS MESIN_KNT,
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
                                                                                                                    LEFT JOIN PRODUCTIONDEMAND p ON p.CODE = s2.LOTCODE
                                                                                                                    LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'MachineNoCode'
                                                                                                                    WHERE
                                                                                                                        s.TEMPLATECODE = '120' 
                                                                                                                        AND s.ORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' -- PRODUCTION NUMBER
                                                                                                                        AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '8'");
                                                                            $cek_lg_element_cut = db2_fetch_assoc($q_lg_element_cut);
                                                                        ?>
                                                                        <?php if (!empty($cek_lg_element_cut['LEBAR'])) : ?>
                                                                            *From Cutting Element
                                                                            <table width="30%" style="border:1px solid black;border-collapse:collapse;">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">Tanggal Terima Kain</th>
                                                                                        <th style="border:1px solid red; text-align: center; background-color: #B3DDEE">LOTCODE</th>
                                                                                        <th style="border:1px solid red; text-align: center; background-color: #EEE6B3">MESIN KNT</th>
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
                                                                                            <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['MESIN_KNT']; ?></td>
                                                                                            <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['PROJECTCODE']; ?></td>
                                                                                            <td style="border:1px solid red; text-align: center;"><?= $d_lg_element_cut['LEBAR'] . ' x ' . $d_lg_element_cut['GRAMASI']; ?></td>
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
                                                                            ini_set("error_reporting", 1);
                                                                            $sql_benang = "SELECT DISTINCT
                                                                                                TRIM(p.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE
                                                                                            FROM  
                                                                                                STOCKTRANSACTION s 
                                                                                            LEFT JOIN STOCKTRANSACTION s2 ON s2.ITEMELEMENTCODE = s.ITEMELEMENTCODE AND s2.TEMPLATECODE = '204'
                                                                                            LEFT JOIN PRODUCTIONRESERVATION p ON p.ORDERCODE = s2.LOTCODE 
                                                                                            WHERE
                                                                                                s.TEMPLATECODE = '120' 
                                                                                                AND 
                                                                                                s.ORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' -- PRODUCTION ORDER 
                                                                                                AND SUBSTR(s.ITEMELEMENTCODE, 1,1) = '0'";
                                                                            $q_benang   = db2_exec($conn1, $sql_benang);
                                                                            $q_benang2   = db2_exec($conn1, $sql_benang);
                                                                            $no = 1;
                                                                            $cekada_benang  = db2_fetch_assoc($q_benang);                                                                            
                                                                        ?>
                                                                        <?php if(!empty($cekada_benang['PRODUCTIONORDERCODE'])){ ?>
                                                                            <?php   
                                                                                while ($d_benang = db2_fetch_assoc($q_benang2)) {
                                                                                    $r_benang[]      = "'".$d_benang['PRODUCTIONORDERCODE']."'";
                                                                                }
                                                                                $value_benang        = implode(',', $r_benang);

                                                                                $q_lotcode  = db2_exec($conn1, "SELECT 
                                                                                                                    LISTAGG(TRIM(LOTCODE), ', ') AS LOTCODE,
                                                                                                                    LONGDESCRIPTION
                                                                                                                    FROM
                                                                                                                    (SELECT DISTINCT 
                                                                                                                                CASE
                                                                                                                                    WHEN LOCATE('+', s.LOTCODE) > 1 THEN SUBSTR(s.LOTCODE, 1, LOCATE('+', s.LOTCODE)-1)
                                                                                                                                    ELSE s.LOTCODE
                                                                                                                                END AS LOTCODE,
                                                                                                                                p2.LONGDESCRIPTION
                                                                                                                            FROM
                                                                                                                                STOCKTRANSACTION s
                                                                                                                            LEFT JOIN PRODUCT p2 ON p2.ITEMTYPECODE = s.ITEMTYPECODE AND NOT 
                                                                                                                                                        p2.ITEMTYPECODE = 'DYC' AND NOT 
                                                                                                                                                        p2.ITEMTYPECODE = 'WTR' AND 
                                                                                                                                                        p2.SUBCODE01 = s.DECOSUBCODE01  AND 
                                                                                                                                                        p2.SUBCODE02 = s.DECOSUBCODE02 AND
                                                                                                                                                        p2.SUBCODE03 = s.DECOSUBCODE03 AND 
                                                                                                                                                        p2.SUBCODE04 = s.DECOSUBCODE04 AND
                                                                                                                                                        p2.SUBCODE05 = s.DECOSUBCODE05 AND 
                                                                                                                                                        p2.SUBCODE06 = s.DECOSUBCODE06 AND
                                                                                                                                                        p2.SUBCODE07 = s.DECOSUBCODE07 
                                                                                                                            WHERE
                                                                                                                                ORDERCODE IN ($value_benang)
                                                                                                                                AND (TEMPLATECODE = '125' OR TEMPLATECODE = '120'))
                                                                                                                    GROUP BY
                                                                                                                        LONGDESCRIPTION");
                                                                                while ($d_lotcode = db2_fetch_assoc($q_lotcode)) {
                                                                            ?>
                                                                                <span style="color:#000000; font-size:12px; font-family: Microsoft Sans Serif;">
                                                                                    <?= $no++; ?>. <?= $d_lotcode['LONGDESCRIPTION']; ?> - <?= $d_lotcode['LOTCODE']; ?>
                                                                                </span><br>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="vertical-align: text-top;">Alur Normal</th>
                                                                    <th style="vertical-align: text-top;">:</th>
                                                                    <th style="vertical-align: text-top; white-space: wrap;">
                                                                        <?php
                                                                            $q_routing  = db2_exec($conn1, "SELECT
                                                                                                                TRIM(r.OPERATIONCODE) AS OPERATIONCODE,
                                                                                                                TRIM(r.LONGDESCRIPTION) AS DESCRIPTION 
                                                                                                            FROM
                                                                                                                PRODUCTIONDEMAND p
                                                                                                            LEFT JOIN ROUTINGSTEP r ON r.ROUTINGNUMBERID = p.ROUTINGNUMBERID 
                                                                                                            LEFT JOIN OPERATION o ON o.CODE = r.OPERATIONCODE 
                                                                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = o.ABSUNIQUEID AND a.FIELDNAME = 'AlurProses'
                                                                                                            WHERE 
                                                                                                                p.CODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' AND a.VALUESTRING = '2'
                                                                                                            ORDER BY
                                                                                                                r.SEQUENCE ASC");
                                                                        ?>
                                                                        <?php while ($d_routing = db2_fetch_assoc($q_routing)) { ?>
                                                                            <span style="background-color: #D0F39A;"><?= $d_routing['OPERATIONCODE']; ?></span>
                                                                        <?php } ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="vertical-align: text-top;">Hasil test quality</th>
                                                                    <th style="vertical-align: text-top;">:</th>
                                                                    <th style="vertical-align: text-top;">
                                                                        <?php
                                                                            $q_cari_tq  = mysqli_query($con_db_qc, "SELECT * FROM tbl_tq_nokk WHERE nodemand = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' ORDER BY id DESC");
                                                                        ?>
                                                                        <?php while ($row_tq = mysqli_fetch_array($q_cari_tq)) { ?>
                                                                            <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_result.php?idkk=<?= $row_tq['id']; ?>&noitem=<?= $row_tq['no_item']; ?>&nohanger=<?= $row_tq['no_hanger']; ?>" target="_blank">Detail test quality (<?= $row_tq['no_test']; ?>)<i class="icofont icofont-external-link"></i></a><br>
                                                                        <?php } ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="vertical-align: text-top;">Hasil test inspect</th>
                                                                    <th style="vertical-align: text-top;">:</th>
                                                                    <th style="vertical-align: text-top;">
                                                                        <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_inspectpackingreport.php?demand=<?= TRIM($demand_2); ?>&ispacking=true" target="_blank">Inspect Report <i class="icofont icofont-external-link"></i></a><br>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="vertical-align: text-top;">Hasil test inspect</th>
                                                                    <th style="vertical-align: text-top;">:</th>
                                                                    <th style="vertical-align: text-top;">
                                                                        <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_inspectpackingreport.php?demand=<?= TRIM($demand_2); ?>&ispacking=true" target="_blank">Inspect Report <i class="icofont icofont-external-link"></i></a><br>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="vertical-align: text-top;">Detail bagi kain</th>
                                                                    <th style="vertical-align: text-top;">:</th>
                                                                    <th style="vertical-align: text-top;">
                                                                        <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/nowgkg/pages/cetak/cetakbagikain.php?demandno=<?= TRIM($demand_2); ?>" target="_blank">Click here! <i class="icofont icofont-external-link"></i></a><br>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="vertical-align: text-top;">Detail quantity packing</th>
                                                                    <th style="vertical-align: text-top;">:</th>
                                                                    <th style="vertical-align: text-top;">
                                                                        <form action="https://online.indotaichen.com/nowqcf/CekKainDemand" method="post" target="_blank">
                                                                            <input name="nodemand" value="<?= TRIM($demand_2); ?>" type="hidden" class="form-control form-control-sm" id="" required>
                                                                            <button class="btn-link" style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" type="submit">Click here! <i class="icofont icofont-external-link"></i></button>
                                                                        </form>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <span>Alur Aktual</span>
                                                        <div style="overflow-x:auto;">
                                                            <table width="100%" border="1">
                                                                <?php
                                                                    ini_set("error_reporting", 1);
                                                                    session_start();
                                                                    require_once "koneksi.php";

                                                                    // itxview_posisikk_tgl_in_prodorder_ins3
                                                                    $posisikk_ins3 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_INS3 WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'");
                                                                    while ($row_posisikk_ins3   = db2_fetch_assoc($posisikk_ins3)) {
                                                                        $r_posisikk_ins3[]      = "('" . TRIM(addslashes($row_posisikk_ins3['PRODUCTIONORDERCODE'])) . "',"
                                                                            . "'" . TRIM(addslashes($row_posisikk_ins3['OPERATIONCODE'])) . "',"
                                                                            . "'" . TRIM(addslashes($row_posisikk_ins3['PROPROGRESSPROGRESSNUMBER'])) . "',"
                                                                            . "'" . TRIM(addslashes($row_posisikk_ins3['DEMANDSTEPSTEPNUMBER'])) . "',"
                                                                            . "'" . TRIM(addslashes($row_posisikk_ins3['PROGRESSTEMPLATECODE'])) . "',"
                                                                            . "'" . TRIM(addslashes($row_posisikk_ins3['MULAI'])) . "',"
                                                                            . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                            . "'" . date('Y-m-d H:i:s') . "',"
                                                                            . "'" . 'Analisa KK' . "')";
                                                                    }
                                                                    if ($r_posisikk_ins3) {
                                                                        $value_posisikk_ins3        = implode(',', $r_posisikk_ins3);
                                                                        $insert_posisikk_ins3       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_ins3(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_posisikk_ins3");
                                                                    }

                                                                    // itxview_posisikk_tgl_in_prodorder_cnp1
                                                                    $posisikk_cnp1 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_CNP1 WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'");
                                                                    while ($row_posisikk_cnp1   = db2_fetch_assoc($posisikk_cnp1)) {
                                                                        $r_posisikk_cnp1[]      = "('" . TRIM(addslashes($row_posisikk_cnp1['PRODUCTIONORDERCODE'])) . "',"
                                                                            . "'" . TRIM(addslashes($row_posisikk_cnp1['OPERATIONCODE'])) . "',"
                                                                            . "'" . TRIM(addslashes($row_posisikk_cnp1['PROPROGRESSPROGRESSNUMBER'])) . "',"
                                                                            . "'" . TRIM(addslashes($row_posisikk_cnp1['DEMANDSTEPSTEPNUMBER'])) . "',"
                                                                            . "'" . TRIM(addslashes($row_posisikk_cnp1['PROGRESSTEMPLATECODE'])) . "',"
                                                                            . "'" . TRIM(addslashes($row_posisikk_cnp1['MULAI'])) . "',"
                                                                            . "'" . $_SERVER['REMOTE_ADDR'] . "',"
                                                                            . "'" . date('Y-m-d H:i:s') . "',"
                                                                            . "'" . 'Analisa KK' . "')";
                                                                    }
                                                                    if ($r_posisikk_cnp1) {
                                                                        $value_posisikk_cnp1        = implode(',', $r_posisikk_cnp1);
                                                                        $insert_posisikk_cnp1       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_cnp1(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME,STATUS) VALUES $value_posisikk_cnp1");
                                                                    }
                                                                ?>
                                                                <thead>
                                                                    <?php
                                                                        ini_set("error_reporting", 1);
                                                                        $sqlDB2 = "SELECT
                                                                                        p.WORKCENTERCODE,
                                                                                        CASE
                                                                                            WHEN p.PRODRESERVATIONLINKGROUPCODE IS NULL THEN TRIM(p.OPERATIONCODE) 
                                                                                            WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE) 
                                                                                            ELSE p.PRODRESERVATIONLINKGROUPCODE
                                                                                        END	AS OPERATIONCODE,
                                                                                        TRIM(o.OPERATIONGROUPCODE) AS OPERATIONGROUPCODE,
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
                                                                                        p.PRODUCTIONORDERCODE  = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' AND p.PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                        -- AND NOT iptip.MULAI IS NULL AND NOT iptop.SELESAI IS NULL
                                                                                    ORDER BY iptip.MULAI ASC";
                                                                        $stmt = db2_exec($conn1, $sqlDB2);
                                                                        $stmt2 = db2_exec($conn1, $sqlDB2);
                                                                        $stmt3 = db2_exec($conn1, $sqlDB2);
                                                                        $stmt4 = db2_exec($conn1, $sqlDB2);
                                                                        $stmt5 = db2_exec($conn1, $sqlDB2);
                                                                        $stmt6 = db2_exec($conn1, $sqlDB2);
                                                                        $stmt7 = db2_exec($conn1, $sqlDB2);
                                                                    ?>
                                                                    <tr>
                                                                        <?php while ($rowdb2 = db2_fetch_assoc($stmt)) { ?>
                                                                            <?php
                                                                                $q_QA_DATA  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                            WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                            AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                            AND WORKCENTERCODE = '$rowdb2[WORKCENTERCODE]' 
                                                                                                                            AND OPERATIONCODE = '$rowdb2[OPERATIONCODE]' 
                                                                                                                            AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                            AND STATUS = 'Analisa KK'
                                                                                                                            ORDER BY LINE ASC");
                                                                                $cek_QA_DATA    = mysqli_fetch_assoc($q_QA_DATA);
                                                                            ?>
                                                                            <?php if ($cek_QA_DATA) : ?>
                                                                                <th style="text-align: center;"><?= $rowdb2['OPERATIONCODE']; ?></th>
                                                                            <?php endif; ?>
                                                                        <?php } ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php while ($rowdb4 = db2_fetch_assoc($stmt4)) { ?>
                                                                            <?php
                                                                                $q_QA_DATA4  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                            WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                            AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                            AND WORKCENTERCODE = '$rowdb4[WORKCENTERCODE]' 
                                                                                                                            AND OPERATIONCODE = '$rowdb4[OPERATIONCODE]' 
                                                                                                                            AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                            AND STATUS = 'Analisa KK'
                                                                                                                            ORDER BY LINE ASC");
                                                                                $cek_QA_DATA4    = mysqli_fetch_assoc($q_QA_DATA4);
                                                                            ?>
                                                                            <?php if ($cek_QA_DATA4) : ?>
                                                                                <th style="text-align: center; font-size:15px; background-color: #EEE6B3">
                                                                                    <?php if ($rowdb4['OPERATIONCODE'] == 'INS3') : ?>
                                                                                        <?php
                                                                                            $q_mulai_ins3   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                                * 
                                                                                                                                            FROM
                                                                                                                                                `itxview_posisikk_tgl_in_prodorder_ins3_detaildemandstep` 
                                                                                                                                            WHERE
                                                                                                                                                productionordercode = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'
                                                                                                                                                AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                            ORDER BY
                                                                                                                                                MULAI ASC LIMIT 1");
                                                                                            $d_mulai_ins3   = mysqli_fetch_assoc($q_mulai_ins3);
                                                                                            echo $d_mulai_ins3['MULAI'];
                                                                                        ?>
                                                                                    <?php elseif ($rowdb4['OPERATIONCODE'] == 'CNP1') : ?>
                                                                                        <?php
                                                                                            $q_mulai_cnp1   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                                * 
                                                                                                                                            FROM
                                                                                                                                                `itxview_posisikk_tgl_in_prodorder_cnp1_detaildemandstep` 
                                                                                                                                            WHERE
                                                                                                                                                productionordercode = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'
                                                                                                                                                AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                            ORDER BY
                                                                                                                                                MULAI ASC LIMIT 1");
                                                                                            $d_mulai_cnp1   = mysqli_fetch_assoc($q_mulai_cnp1);
                                                                                            echo $d_mulai_cnp1['MULAI'];
                                                                                        ?>
                                                                                    <?php else : ?>
                                                                                        <?= $rowdb4['MULAI']; ?>
                                                                                    <?php endif; ?>
                                                                                    <br>
                                                                                    <?php if ($rowdb4['OPERATIONCODE'] == 'INS3') : ?>
                                                                                        <?php
                                                                                        $q_mulai_ins3   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                            * 
                                                                                                                                        FROM
                                                                                                                                            `itxview_posisikk_tgl_in_prodorder_ins3_detaildemandstep` 
                                                                                                                                        WHERE
                                                                                                                                            productionordercode = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'
                                                                                                                                            AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                        ORDER BY
                                                                                                                                            MULAI DESC LIMIT 1");
                                                                                        $d_mulai_ins3   = mysqli_fetch_assoc($q_mulai_ins3);
                                                                                        echo $d_mulai_ins3['MULAI'];
                                                                                        ?>
                                                                                    <?php elseif ($rowdb4['OPERATIONCODE'] == 'CNP1') : ?>
                                                                                        <?php
                                                                                        $q_mulai_cnp1   = mysqli_query($con_nowprd, "SELECT
                                                                                                                                            * 
                                                                                                                                        FROM
                                                                                                                                            `itxview_posisikk_tgl_in_prodorder_cnp1_detaildemandstep` 
                                                                                                                                        WHERE
                                                                                                                                            productionordercode = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]'
                                                                                                                                            AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                                        ORDER BY
                                                                                                                                            MULAI DESC LIMIT 1");
                                                                                        $d_mulai_cnp1   = mysqli_fetch_assoc($q_mulai_cnp1);
                                                                                        echo $d_mulai_cnp1['MULAI'];
                                                                                        ?>
                                                                                    <?php else : ?>
                                                                                        <?= $rowdb4['SELESAI']; ?>
                                                                                    <?php endif; ?>
                                                                                </th>
                                                                            <?php endif; ?>
                                                                        <?php } ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php while ($rowdb3 = db2_fetch_assoc($stmt2)) { ?>
                                                                            <?php
                                                                                $q_QA_DATA2  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                            WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                            AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                            AND WORKCENTERCODE = '$rowdb3[WORKCENTERCODE]' 
                                                                                                                            AND OPERATIONCODE = '$rowdb3[OPERATIONCODE]' 
                                                                                                                            AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                            AND STATUS = 'Analisa KK'
                                                                                                                            ORDER BY LINE ASC");
                                                                                $cek_QA_DATA2    = mysqli_fetch_assoc($q_QA_DATA2);
                                                                            ?>
                                                                            <?php if ($cek_QA_DATA2) : ?>
                                                                                <th style="text-align: center;"><?= $rowdb3['MESIN']; ?></th>
                                                                            <?php endif; ?>
                                                                        <?php } ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php while ($rowdb5 = db2_fetch_assoc($stmt5)) { ?>
                                                                            <?php
                                                                                $q_QA_DATA5  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                            WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                            AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                            AND WORKCENTERCODE = '$rowdb5[WORKCENTERCODE]' 
                                                                                                                            AND OPERATIONCODE = '$rowdb5[OPERATIONCODE]' 
                                                                                                                            AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                            AND STATUS = 'Analisa KK'
                                                                                                                            ORDER BY LINE ASC");
                                                                                $cek_QA_DATA5    = mysqli_fetch_assoc($q_QA_DATA5);
                                                                            ?>
                                                                            <?php if ($cek_QA_DATA5) : ?>
                                                                                <?php $opr = $rowdb5['OPERATIONCODE']; if(str_contains($opr, 'DYE')) : ?>
                                                                                    <?php
                                                                                        $prod_order     = TRIM($d_ITXVIEWKK_2['PRODUCTIONORDERCODE']);
                                                                                        $prod_demand    = TRIM($demand_2);

                                                                                        $q_dye_montemp      = mysqli_query($con_db_dyeing, "SELECT
                                                                                                                                                a.id AS idm,
                                                                                                                                                b.id AS ids,
                                                                                                                                                b.no_resep 
                                                                                                                                            FROM
                                                                                                                                                tbl_montemp a
                                                                                                                                                LEFT JOIN tbl_schedule b ON a.id_schedule = b.id
                                                                                                                                                LEFT JOIN tbl_setting_mesin c ON b.nokk = c.nokk 
                                                                                                                                            WHERE
                                                                                                                                                b.nokk = '$prod_order' AND b.nodemand LIKE '%$prod_demand%'
                                                                                                                                            ORDER BY
                                                                                                                                                a.id DESC LIMIT 1 ");
                                                                                        $d_dye_montemp      = mysqli_fetch_assoc($q_dye_montemp);

                                                                                    ?>
                                                                                    <th style="text-align: center;">
                                                                                        <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/dye-itti/pages/cetak/cetak_monitoring_new.php?idkk=&no=<?= $d_dye_montemp['no_resep']; ?>&idm=<?php echo $d_dye_montemp['idm']; ?>&ids=<?php echo $d_dye_montemp['ids']; ?>" target="_blank">Monitoring <i class="icofont icofont-external-link"></i></a>
                                                                                        &ensp;
                                                                                        <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/laporan/dye_filter_bon_reservation.php?demand=<?= $demand_2; ?>&prod_order=<?= $d_ITXVIEWKK_2['PRODUCTIONORDERCODE']; ?>" target="_blank">Bon Resep <i class="icofont icofont-external-link"></i></a>
                                                                                    </th>
                                                                                <?php else : ?>
                                                                                        <?php $opr_grup = $rowdb5['OPERATIONGROUPCODE']; if(str_contains($opr_grup, "FIN")) : ?>
                                                                                            <th style="text-align: center;">
                                                                                                <!-- <a style="color: #E95D4E; font-size:15px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/finishing2-new/reports/pages/reports-detail-stenter.php?FromAnalisa=FromAnalisa&prod_order=<?= TRIM($d_ITXVIEWKK_2['PRODUCTIONORDERCODE']); ?>&prod_demand=<?= TRIM($demand_2); ?>&tgl_in=<?= substr($rowdb5['MULAI'], 1, 10); ?>&tgl_out=<?= substr($rowdb5['SELESAI'], 1, 10); ?>" target="_blank">Detail proses <i class="icofont icofont-external-link"></i></a> -->
                                                                                            </th>
                                                                                        <?php else : ?>
                                                                                            <th style="text-align: center;">-</th>
                                                                                        <?php endif; ?>
                                                                                <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        <?php } ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php while ($rowdb7 = db2_fetch_assoc($stmt7)) { ?>
                                                                            <?php
                                                                                $q_QA_DATA7  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                            WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                            AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                            AND WORKCENTERCODE = '$rowdb7[WORKCENTERCODE]' 
                                                                                                                            AND OPERATIONCODE = '$rowdb7[OPERATIONCODE]' 
                                                                                                                            AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                            AND STATUS = 'Analisa KK'
                                                                                                                            ORDER BY LINE ASC");
                                                                                $cek_QA_DATA7    = mysqli_fetch_assoc($q_QA_DATA7);
                                                                            ?>
                                                                            <?php if ($cek_QA_DATA7) : ?>
                                                                                <?php
                                                                                    $q_routing  = mysqli_query($con_nowprd, "SELECT * FROM keterangan_leader 
                                                                                                                                WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                                AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]'
                                                                                                                                AND OPERATIONCODE = '$rowdb7[OPERATIONCODE]'");
                                                                                    $d_routing  = mysqli_fetch_assoc($q_routing);
                                                                                ?>
                                                                                <td style="vertical-align: top; font-size:15px;">
                                                                                    <?= substr($d_routing['KETERANGAN'], 0,35); ?><?php if(substr($d_routing['KETERANGAN'], 0,35)){ echo "<br>"; } ?>
                                                                                    <?= substr($d_routing['KETERANGAN'], 35,70); ?><?php if(substr($d_routing['KETERANGAN'], 35,70)){ echo "<br>"; } ?>
                                                                                    <?= substr($d_routing['KETERANGAN'], 70,105); ?><?php if(substr($d_routing['KETERANGAN'], 70,105)){ echo "<br>"; } ?>
                                                                                    <?= substr($d_routing['KETERANGAN'], 105,140); ?><?php if(substr($d_routing['KETERANGAN'], 105,140)){ echo "<br>"; } ?>
                                                                                    <?= substr($d_routing['KETERANGAN'], 140,175); ?><?php if(substr($d_routing['KETERANGAN'], 140,175)){ echo "<br>"; } ?>
                                                                                    <?= substr($d_routing['KETERANGAN'], 175,210); ?><?php if(substr($d_routing['KETERANGAN'], 175,210)){ echo "<br>"; } ?>
                                                                                    <?= substr($d_routing['KETERANGAN'], 210); ?><?php if(substr($d_routing['KETERANGAN'], 210)){ echo ""; } ?>
                                                                                </td>
                                                                            <?php endif; ?>
                                                                        <?php } ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php while ($rowdb6 = db2_fetch_assoc($stmt6)) { ?>
                                                                            <?php
                                                                                $q_QA_DATA8  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                                            WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                                            AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                                            AND WORKCENTERCODE = '$rowdb6[WORKCENTERCODE]' 
                                                                                                                            AND OPERATIONCODE = '$rowdb6[OPERATIONCODE]' 
                                                                                                                            AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                                            AND STATUS = 'Analisa KK'
                                                                                                                            ORDER BY LINE ASC");
                                                                                $cek_QA_DATA8    = mysqli_fetch_assoc($q_QA_DATA8);
                                                                            ?>
                                                                            <?php if ($cek_QA_DATA8) : ?>
                                                                                <?php
                                                                                    $q_specs    = db2_exec($conn1, "SELECT 
                                                                                                                    TRIM(a.NAMENAME) AS NAMENAME,
                                                                                                                    a.VALUESTRING,
                                                                                                                    floor(a.VALUEDECIMAL) AS VALUEDECIMAL
                                                                                                                FROM 
                                                                                                                    PRODUCTIONSPECS p 
                                                                                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID
                                                                                                                WHERE 
                                                                                                                    OPERATIONCODE = '$rowdb6[OPERATIONCODE]' 
                                                                                                                    AND SUBCODE01 = '$d_ITXVIEWKK_2[SUBCODE01]' 
                                                                                                                    AND SUBCODE02 = '$d_ITXVIEWKK_2[SUBCODE02]' 
                                                                                                                    AND SUBCODE03 ='$d_ITXVIEWKK_2[SUBCODE03]' 
                                                                                                                    AND SUBCODE04 = '$d_ITXVIEWKK_2[SUBCODE04]'");
                                                                                ?>
                                                                                <td style="vertical-align: top; font-size:15px;">
                                                                                    <b>Acuan Standart :</b> <br>
                                                                                    <?php while ($d_specs = db2_fetch_assoc($q_specs)) {  ?>
                                                                                        <li><?= $d_specs['NAMENAME']; ?> : <?= $d_specs['VALUESTRING'].$d_specs['VALUEDECIMAL']; ?> </li>
                                                                                    <?php } ?>
                                                                                </td>
                                                                            <?php endif; ?>
                                                                        <?php } ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php while ($rowdb4 = db2_fetch_assoc($stmt3)) { ?>
                                                                            <?php
                                                                                $sqlQAData      = "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                    WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK_2[PRODUCTIONORDERCODE]' 
                                                                                                    AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK_2[PRODUCTIONDEMANDCODE]' 
                                                                                                    AND WORKCENTERCODE = '$rowdb4[WORKCENTERCODE]' 
                                                                                                    AND OPERATIONCODE = '$rowdb4[OPERATIONCODE]' 
                                                                                                    AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                    AND STATUS = 'Analisa KK'
                                                                                                    ORDER BY LINE ASC";
                                                                                $q_QA_DATAcek   = mysqli_query($con_nowprd, $sqlQAData);
                                                                                $d_QA_DATAcek   = mysqli_fetch_assoc($q_QA_DATAcek);
                                                                            ?>
                                                                            <?php if ($d_QA_DATAcek) : ?>
                                                                                <td style="vertical-align: top; font-size:15px;">
                                                                                    <?php $q_QA_DATA7     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                                    <?php $no = 1; while ($d_QA_DATA7 = mysqli_fetch_array($q_QA_DATA7)) : ?>
                                                                                        <?php $char_code = $d_QA_DATA7['CHARACTERISTICCODE']; ?>
                                                                                            <?php if(str_contains($char_code, 'GRB') != true && ($char_code == 'LEBAR' || $char_code == 'GRAMASI')) : ?>
                                                                                                <?= $no++ . ' : ' . $d_QA_DATA7['CHARACTERISTICCODE'] . ' = ' . $d_QA_DATA7['VALUEQUANTITY'] . '<br>'; ?>
                                                                                            <?php endif; ?>
                                                                                    <?php endwhile; ?>
                                                                                    <hr>
                                                                                    <?php $q_QA_DATA3     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                                    <?php $no = 1; while ($d_QA_DATA3 = mysqli_fetch_array($q_QA_DATA3)) : ?>
                                                                                        <?php $char_code = $d_QA_DATA3['CHARACTERISTICCODE']; ?>
                                                                                        <?php  if(str_contains($char_code, 'GRB') != true && $char_code <> 'LEBAR' && $char_code <> 'GRAMASI') : ?>
                                                                                            <?php   
                                                                                                if($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '1'){
                                                                                                    $grouping_hue = 'A';
                                                                                                }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '2'){
                                                                                                    $grouping_hue = 'B';
                                                                                                }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '3'){
                                                                                                    $grouping_hue = 'C';
                                                                                                }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'GROUPING' AND $d_QA_DATA3['VALUEQUANTITY'] == '4'){
                                                                                                    $grouping_hue = 'D';
                                                                                                }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '1'){
                                                                                                    $grouping_hue = 'Red';
                                                                                                }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '2'){
                                                                                                    $grouping_hue = 'Yellow';
                                                                                                }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '3'){
                                                                                                    $grouping_hue = 'Green';
                                                                                                }elseif($d_QA_DATA3['CHARACTERISTICCODE'] == 'HUE' AND $d_QA_DATA3['VALUEQUANTITY'] == '4'){
                                                                                                    $grouping_hue = 'Blue';
                                                                                                }else{
                                                                                                    $grouping_hue = $d_QA_DATA3['VALUEQUANTITY'];
                                                                                                }
                                                                                            ?>
                                                                                            <?= $no++ . ' : ' . $d_QA_DATA3['CHARACTERISTICCODE'] . ' = ' . $grouping_hue . '<br>'; ?>
                                                                                        <?php endif; ?>
                                                                                    <?php endwhile; ?>
                                                                                    <hr>
                                                                                    <?php $q_QA_DATA6     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                                    <?php $no = 1; while ($d_QA_DATA6 = mysqli_fetch_array($q_QA_DATA6)) : ?>
                                                                                        <?php $char_code = $d_QA_DATA6['CHARACTERISTICCODE']; ?>
                                                                                        <?php  if(str_contains($char_code, 'GRB')) : ?>
                                                                                            <?= $no++ . ' : ' . $d_QA_DATA6['CHARACTERISTICCODE'] . ' = ' . $d_QA_DATA6['VALUEQUANTITY'] . '<br>'; ?>
                                                                                        <?php endif; ?>
                                                                                    <?php endwhile; ?>
                                                                                </td>
                                                                            <?php endif; ?>
                                                                        <?php } ?>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    <?php endwhile; ?>
                                                <?php endwhile; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once 'footer.php'; ?>