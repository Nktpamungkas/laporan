<?php
ini_set("error_reporting", 0);
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
                                                    <input type="text" name="prod_order" class="form-control" value="<?php if (isset($_POST['submit'])) {
                                                                                                                            echo $_POST['prod_order'];
                                                                                                                        } elseif (isset($_GET['prod_order'])) {
                                                                                                                            echo $_GET['prod_order'];
                                                                                                                        } ?>">
                                                </div>
                                                <div class="col-sm-6 col-xl-6 m-b-30">
                                                    <h4 class="sub-title">Production Demand:</h4>
                                                    <input type="text" name="demand" placeholder="Wajib di isi" class="form-control" required value="<?php if (isset($_POST['submit'])) {
                                                                                                                                                            echo $_POST['demand'];
                                                                                                                                                        } elseif (isset($_GET['demand'])) {
                                                                                                                                                            echo $_GET['demand'];
                                                                                                                                                        } ?>">
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
                                                <center>
                                                    <h4>ANALISA PROBLEM SOLVING</h4>
                                                </center>
                                                <!-- <center> -->
                                                    <!-- <div style="overflow-x:auto;"> -->
                                                        <table width="100%" border="0">
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
                                                                    <th>LOT Internal</th>
                                                                    <th>:</th>
                                                                    <th><?= $d_ITXVIEWKK['LOT']; ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Original PD Code</th>
                                                                    <th>:</th>
                                                                    <th><?= substr($d_ITXVIEWKK['OriginalPdCode'], 1, 9); ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="vertical-align: text-top;">Item Code</th>
                                                                    <th style="vertical-align: text-top;">:</th>
                                                                    <th style="vertical-align: text-top;">
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
                                                                                                                    e.ELEMENTCODE LIKE '%$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]%'
                                                                                                                ORDER BY 
                                                                                                                    e.INSPECTIONSTARTDATETIME ASC LIMIT 1");
                                                                                $d_lg_INS3  = db2_fetch_assoc($q_lg_INS3);

                                                                                if($rowdb2['OPERATIONCODE'] == 'INS3'){
                                                                                    echo $d_lg_INS3['WIDTHGROSS'].' x '.$d_lg_INS3['VALUEDECIMAL'];
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
                                                                    <th style="vertical-align: text-top;">
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
                                                                        <div class="row">
                                                                            <div class="col-sm-6 col-xl-1 m-b-30">
                                                                                <?php while ($d_routing = db2_fetch_assoc($q_routing)) { ?>
                                                                                    <span style="background-color: #D0F39A;"><?= $d_routing['OPERATIONCODE']; ?></span>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
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
                                                                            <a style="color: #E95D4E; font-size:11px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_result.php?idkk=<?= $row_tq['id']; ?>&noitem=<?= $row_tq['no_item']; ?>&nohanger=<?= $row_tq['no_hanger']; ?>" target="_blank">Detail test quality (<?= $row_tq['no_test']; ?>)<i class="icofont icofont-external-link"></i></a><br>
                                                                        <?php } ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="vertical-align: text-top;">Hasil test inspect</th>
                                                                    <th style="vertical-align: text-top;">:</th>
                                                                    <th style="vertical-align: text-top;">
                                                                        <a style="color: #E95D4E; font-size:11px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_inspectpackingreport.php?demand=<?= TRIM($d_ITXVIEWKK['PRODUCTIONDEMANDCODE']); ?>&ispacking=true" target="_blank">Inspect Report <i class="icofont icofont-external-link"></i></a><br>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    <!-- </div> -->
                                                    <span>Alur Aktual</span>
                                                    <div style="overflow-x:auto;">
                                                        <table border="1">
                                                            <?php
                                                                ini_set("error_reporting", 0);
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
                                                                    $sqlDB2 = "SELECT
                                                                                    p.WORKCENTERCODE,
                                                                                    TRIM(p.OPERATIONCODE) AS OPERATIONCODE,
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
                                                                            <th style="text-align: center; font-size:11px; background-color: #EEE6B3">
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
                                                                                    $prod_demand    = TRIM($d_ITXVIEWKK['PRODUCTIONDEMANDCODE']);

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
                                                                                    <a style="color: #E95D4E; font-size:11px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/dye-itti/pages/cetak/cetak_monitoring_new.php?idkk=&no=<?= $d_dye_montemp['no_resep']; ?>&idm=<?php echo $d_dye_montemp['idm']; ?>&ids=<?php echo $d_dye_montemp['ids']; ?>" target="_blank">Monitoring <i class="icofont icofont-external-link"></i></a>
                                                                                    &ensp;
                                                                                    <a style="color: #E95D4E; font-size:11px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/laporan/dye_filter_bon_reservation.php?demand=<?= $d_ITXVIEWKK['PRODUCTIONDEMANDCODE']; ?>&prod_order=<?= $d_ITXVIEWKK['PRODUCTIONORDERCODE']; ?>" target="_blank">Bon Resep <i class="icofont icofont-external-link"></i></a>
                                                                                </th>
                                                                            <?php else : ?>
                                                                                    <?php $opr_grup = $rowdb5['OPERATIONGROUPCODE']; if(str_contains($opr_grup, "FIN")) : ?>
                                                                                        <th style="text-align: center;">
                                                                                            <!-- <a style="color: #E95D4E; font-size:11px; font-family: Microsoft Sans Serif;" href="https://online.indotaichen.com/finishing2-new/reports/pages/reports-detail-stenter.php?FromAnalisa=FromAnalisa&prod_order=<?= TRIM($d_ITXVIEWKK['PRODUCTIONORDERCODE']); ?>&prod_demand=<?= TRIM($d_ITXVIEWKK['PRODUCTIONDEMANDCODE']); ?>&tgl_in=<?= substr($rowdb5['MULAI'], 1, 10); ?>&tgl_out=<?= substr($rowdb5['SELESAI'], 1, 10); ?>" target="_blank">Detail proses <i class="icofont icofont-external-link"></i></a> -->
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
                                                                            <td style="vertical-align: top; font-size:11px;">
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
                                                                            <td style="vertical-align: top; font-size:11px;">
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
                                                                            <td style="vertical-align: top; font-size:11px;">
                                                                                <?php $q_QA_DATA7     = mysqli_query($con_nowprd, $sqlQAData); ?>
                                                                                <?php $no = 1; while ($d_QA_DATA7 = mysqli_fetch_array($q_QA_DATA7)) : ?>
                                                                                    <?php $char_code = $d_QA_DATA7['CHARACTERISTICCODE']; ?>
                                                                                    <?php  if(str_contains($char_code, 'GRB') != true && ($char_code == 'LEBAR' || $char_code == 'GRAMASI')) : ?>
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
                                                <!-- </center> -->
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