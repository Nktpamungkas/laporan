<?php 
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php";
    mysqli_query($con_nowprd, "DELETE FROM itxview_detail_qa_data WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY");
    mysqli_query($con_nowprd, "DELETE FROM itxview_detail_qa_data WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]'"); 
    mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_ins3_detaildemandstep WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY");
    mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_ins3_detaildemandstep WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]'"); 
    mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_cnp1_detaildemandstep WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY");
    mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_cnp1_detaildemandstep WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]'"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRD - Detail Demand Step </title>
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
                                                <center><h4>DETAIL DEMAND STEP</h4></center>
                                                <center>
                                                <table width="100%" border="0">
                                                    <?php
                                                        require_once "koneksi.php";
                                                        $q_ITXVIEWKK    = db2_exec($conn1, "SELECT * FROM ITXVIEWKK WHERE PRODUCTIONDEMANDCODE = '$_POST[demand]'");
                                                        $d_ITXVIEWKK    = db2_fetch_assoc($q_ITXVIEWKK);

                                                        $sql_pelanggan_buyer 	= db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$d_ITXVIEWKK[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                                                                        AND CODE = '$d_ITXVIEWKK[PROJECTCODE]'");
                                                        $dt_pelanggan_buyer		= db2_fetch_assoc($sql_pelanggan_buyer);

                                                        $sql_qtyorder   = db2_exec($conn1, "SELECT DISTINCT
                                                                                                    USEDUSERPRIMARYQUANTITY AS QTY_ORDER,
                                                                                                    USEDUSERSECONDARYQUANTITY AS QTY_ORDER_YARD,
                                                                                                    USERPRIMARYUOMCODE,
                                                                                                    BASEPRIMARYUOMCODE,
                                                                                                    CASE
                                                                                                        WHEN TRIM(USERSECONDARYUOMCODE) = 'kg' THEN 'Kg'
                                                                                                        WHEN TRIM(USERSECONDARYUOMCODE) = 'yd' THEN 'Yard'
                                                                                                        WHEN TRIM(USERSECONDARYUOMCODE) = 'm' THEN 'Meter'
                                                                                                        ELSE 'PCS'
                                                                                                    END AS SATUAN_QTY
                                                                                                FROM 
                                                                                                    ITXVIEW_RESERVATION_KK 
                                                                                                WHERE 
                                                                                                    ORDERCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]'");
                                                        $dt_qtyorder    = db2_fetch_assoc($sql_qtyorder);

                                                        $q_qtypacking   = db2_exec($conn1, "SELECT * FROM PRODUCTIONDEMAND WHERE CODE = '$_POST[demand]'");
                                                        $d_qtypacking   = db2_fetch_assoc($q_qtypacking);

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
                                                                                                ."'".date('Y-m-d H:i:s')."')";
                                                        }
                                                        $value_itxview_detail_qa_data        = implode(',', $r_itxview_detail_qa_data);
                                                        $insert_itxview_detail_qa_data       = mysqli_query($con_nowprd, "INSERT INTO itxview_detail_qa_data(PRODUCTIONDEMANDCODE,PRODUCTIONORDERCODE,WORKCENTERCODE,OPERATIONCODE,LINE,QUALITYDOCUMENTHEADERNUMBERID,CHARACTERISTICCODE,LONGDESCRIPTION,VALUEQUANTITY,IPADDRESS,CREATEDATETIME) VALUES $value_itxview_detail_qa_data");
                                                    ?>
                                                    <thead>
                                                        <tr>
                                                            <th>Prod. Demand</th>
                                                            <th>:</th>
                                                            <th><?= $_POST['demand'] ?></th>
                                                            <th>Delivery Date</th>
                                                            <th>:</th>
                                                            <th><?= $d_ITXVIEWKK['DELIVERYDATE']; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Prod. Order</th>
                                                            <th>:</th>
                                                            <th><?= $d_ITXVIEWKK['PRODUCTIONORDERCODE']; ?></th>
                                                            <th>Full Item</th>
                                                            <th>:</th>
                                                            <th>
                                                                <?= TRIM($d_ITXVIEWKK['SUBCODE01']).'-'.
                                                                TRIM($d_ITXVIEWKK['SUBCODE02']).'-'.
                                                                TRIM($d_ITXVIEWKK['SUBCODE03']).'-'.
                                                                TRIM($d_ITXVIEWKK['SUBCODE04']).'-'.
                                                                TRIM($d_ITXVIEWKK['SUBCODE05']).'-'.
                                                                TRIM($d_ITXVIEWKK['SUBCODE06']).'-'.
                                                                TRIM($d_ITXVIEWKK['SUBCODE07']).'-'.
                                                                TRIM($d_ITXVIEWKK['SUBCODE08']).'-'.
                                                                TRIM($d_ITXVIEWKK['SUBCODE09']).'-'.
                                                                TRIM($d_ITXVIEWKK['SUBCODE10']); ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Customer</th>
                                                            <th>:</th>
                                                            <th><?= $dt_pelanggan_buyer['LANGGANAN'].'/'.$dt_pelanggan_buyer['BUYER']; ?></th>
                                                            <th>Collor Name</th>
                                                            <th>:</th>
                                                            <th><?= $d_ITXVIEWKK['WARNA']; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: text-top;">Deskripsi</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top;">
                                                                <?= substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 0,40); ?><?php if(substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 0,40)){ echo "<br>"; } ?>
                                                                <?= substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 41,40); ?><?php if(substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 41,40)){ echo "<br>"; } ?>
                                                                <?= substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 81,40); ?><?php if(substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 81,40)){ echo "<br>"; } ?>
                                                                <?= substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 121,40); ?><?php if(substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 121,40)){ echo "<br>"; } ?>
                                                                <?= substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 161); ?><?php if(substr($d_ITXVIEWKK['ITEMDESCRIPTION'], 161)){ echo "<br>"; } ?>
                                                            </th>
                                                            <th style="vertical-align: text-top;">Quantity</th>
                                                            <th style="vertical-align: text-top;">:</th>
                                                            <th style="vertical-align: text-top;">
                                                                <?= number_format($dt_qtyorder['QTY_ORDER'], 2).' '.$dt_qtyorder['USERPRIMARYUOMCODE']; ?> / 
                                                                <?= number_format($dt_qtyorder['QTY_ORDER_YARD'], 2).' '.$dt_qtyorder['BASEPRIMARYUOMCODE']; ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Bon Order</th>
                                                            <th>:</th>
                                                            <th><?= $d_ITXVIEWKK['PROJECTCODE']; ?></th>
                                                            <th>Qty Packing</th>
                                                            <th>:</th>
                                                            <th><?= $qty_packing['ENTEREDUSERPRIMARYQUANTITY']; ?></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                </center>
                                                <table width="100%" border="1">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2" style="text-align: center;">WORKCENTER</th>
                                                            <th rowspan="2" style="text-align: center;">OPERATION</th>
                                                            <th rowspan="2" style="text-align: center;">DESKRIPSI</th>
                                                            <th colspan="2" style="text-align: center;">TANGGAL PROGRESS</th>
                                                            <th style="text-align: center;">QA DATA</th>
                                                        </tr>
                                                        <tr>
                                                            <th style="text-align: center;">START</th>
                                                            <th style="text-align: center;">END</th>
                                                            <th style="text-align: center;">LINE | KETERANGAN | Nr/Qty</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
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
                                                                                        ."'".date('Y-m-d H:i:s')."')";
                                                            }
                                                            if($r_posisikk_ins3){
                                                                $value_posisikk_ins3        = implode(',', $r_posisikk_ins3);
                                                                $insert_posisikk_ins3       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_ins3_detaildemandstep(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME) VALUES $value_posisikk_ins3");
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
                                                                                        ."'".date('Y-m-d H:i:s')."')";
                                                            }
                                                            if($r_posisikk_cnp1){
                                                                $value_posisikk_cnp1        = implode(',', $r_posisikk_cnp1);
                                                                $insert_posisikk_cnp1       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_cnp1_detaildemandstep(PRODUCTIONORDERCODE,OPERATIONCODE,PROPROGRESSPROGRESSNUMBER,DEMANDSTEPSTEPNUMBER,PROGRESSTEMPLATECODE,MULAI,IPADDRESS,CREATEDATETIME) VALUES $value_posisikk_cnp1");
                                                            }

                                                            $sqlDB2 = "SELECT
                                                                            p.WORKCENTERCODE,
                                                                            TRIM(p.OPERATIONCODE) AS OPERATIONCODE,
                                                                            o.LONGDESCRIPTION,
                                                                            iptip.MULAI,
                                                                            iptop.SELESAI,
                                                                            p.PRODUCTIONORDERCODE,
                                                                            p.PRODUCTIONDEMANDCODE,
                                                                            p.GROUPSTEPNUMBER AS STEPNUMBER
                                                                        FROM 
                                                                            PRODUCTIONDEMANDSTEP p 
                                                                        LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                        WHERE
                                                                            p.PRODUCTIONORDERCODE  = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' AND p.PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                        ORDER BY p.GROUPSTEPNUMBER ASC";
                                                            $stmt = db2_exec($conn1,$sqlDB2);
                                                            while ($rowdb2 = db2_fetch_assoc($stmt)) {
                                                        ?>
                                                        <tr>
                                                            <td style="vertical-align: text-top;"><?= $rowdb2['WORKCENTERCODE']; ?></td>
                                                            <td style="vertical-align: text-top;"><?= $rowdb2['OPERATIONCODE']; ?></td>
                                                            <td style="vertical-align: text-top;"><?= $rowdb2['LONGDESCRIPTION']; ?></td>
                                                            <td style="vertical-align: text-top; text-align: center;">
                                                                <?php if($rowdb2['OPERATIONCODE'] == 'INS3') : ?>
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
                                                                <?php elseif($rowdb2['OPERATIONCODE'] == 'CNP1') : ?>
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
                                                                    <?= $rowdb2['MULAI']; ?>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td style="vertical-align: text-top; text-align: center;">
                                                                <?php if($rowdb2['OPERATIONCODE'] == 'INS3') : ?>
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
                                                                <?php elseif($rowdb2['OPERATIONCODE'] == 'CNP1') : ?>
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
                                                                    <?= $rowdb2['SELESAI']; ?>
                                                                <?php endif; ?>
                                                            </td>
                                                            <?php
                                                                $q_QA_DATA  = mysqli_query($con_nowprd, "SELECT DISTINCT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                                                            WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                                                            AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                                                            AND WORKCENTERCODE = '$rowdb2[WORKCENTERCODE]' 
                                                                                                            AND OPERATIONCODE = '$rowdb2[OPERATIONCODE]' 
                                                                                                            AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'
                                                                                                            ORDER BY LINE ASC");
                                                            ?>
                                                            <td style="text-align: left;">
                                                            <?php while ($d_QA_DATA = mysqli_fetch_array($q_QA_DATA)) : ?>
                                                                <?= $d_QA_DATA['LINE'].' : '.$d_QA_DATA['LONGDESCRIPTION'].' = '.$d_QA_DATA['VALUEQUANTITY'].'<br>'; ?> 
                                                            <?php endwhile; ?>
                                                            </td>
                                                        </tr>
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
<?php require_once 'footer.php'; ?>