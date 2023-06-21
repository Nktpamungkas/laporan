<?php 
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php";
    mysqli_query($con_nowprd, "DELETE FROM itxview_terimaorder WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY");
    mysqli_query($con_nowprd, "DELETE FROM itxview_terimaorder WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]'"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>MKT - Terima Order</title>
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
                                        <h5>Filter Data CREATIONDATE in SALESORDER</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Date From</h4>
                                                    <input type="date" name="tgl1" class="form-control" id="tgl1" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl1']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Date to</h4>
                                                    <input type="date" name="tgl2" class="form-control" id="tgl2" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl2']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Bon Order</h4>
                                                    <input type="text" name="no_order" class="form-control" onkeyup="this.value = this.value.toUpperCase()" value="<?php if (isset($_POST['submit'])){ echo $_POST['no_order']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30"><br><br>
                                                    <button type="submit" name="submit" class="btn btn-primary">Cari data</button>
                                                    <?php if (isset($_POST['submit'])) : ?>
                                                        <!-- <a class="btn btn-mat btn-success" href="mkt_terima_order-excel.php?no_order=<?= $_POST['no_order']; ?>&tgl1=<?= $_POST['tgl1']; ?>&tgl2=<?= $_POST['tgl2']; ?>">CETAK EXCEL</a> -->
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
                                                            <th>CREATE BO</th>
                                                            <th>TERIMA ORDER</th>
                                                            <th>BAGI LOT</th>
                                                            <th>BUKA KK</th>
                                                            <th>HITUNG WAKTU (TERIMA ORDER s/d BUKA KK)</th>
                                                            <th>TUNGGU GREIGE OUT</th>
                                                            <th>KK OKE</th>
                                                            <th>HITUNG WAKTU (TERIMA ORDER s/d KK OKE)</th>
                                                            <th>TGL KIRIM</th>
                                                            <th>HITUNG WAKTU (CREATE BO s/d TGL KIRIM)</th>
                                                            <th>NO KK</th>
                                                            <th>NO DEMAND</th>
                                                            <th>BON ORDER</th>
                                                            <th>KETERANGAN PRODUCT</th>
                                                            <th>LEBAR</th>
                                                            <th>GRAMASI</th>
                                                            <th>WARNA</th>
                                                            <th>NO WARNA</th>
                                                            <th>DELIVERY</th>
                                                            <th>BAGI KAIN TGL</th>
                                                            <th>ROLL</th>
                                                            <th>BRUTO/BAGI KAIN</th>
                                                            <th>QTY PACKING</th>
                                                            <th>NETTO(kg)</th>
                                                            <th>NETTO(yd)</th>
                                                            <th>DELAY</th>
                                                            <th>KODE DEPT</th>
                                                            <th>STATUS TERAKHIR</th>
                                                            <th>PROGRESS STATUS</th>
                                                            <th>KETERANGAN</th>
                                                            <th>ORIGINAL PD CODE</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php 
                                                            ini_set("error_reporting", 1);
                                                            session_start();
                                                            require_once "koneksi.php";
                                                            $no_order = $_POST['no_order'];
                                                            $tgl1     = $_POST['tgl1'];
                                                            $tgl2     = $_POST['tgl2'];

                                                            if($no_order){
                                                                $where_order    = "NO_ORDER = '$no_order'";
                                                            }else{
                                                                $where_order    = "";
                                                            }
                                                            if($tgl1 & $tgl2){
                                                                $where_date     = "SUBSTR(CREATIONDATETIME_SALESORDER, 1,10) BETWEEN '$tgl1' AND '$tgl2'";
                                                            }else{
                                                                $where_date     = "";
                                                            }
                                                            // itxview_terimaorder
                                                            $itxviewmemo                = db2_exec($conn1, "SELECT * FROM ITXVIEW_MEMOPENTINGPPC WHERE $where_order $where_date");
                                                            while ($row_itxviewmemo   = db2_fetch_assoc($itxviewmemo)) {
                                                                $r_itxviewmemo[]      = "('".TRIM(addslashes($row_itxviewmemo['ORDERDATE']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['PELANGGAN']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_ORDER']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_PO']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['KETERANGAN_PRODUCT']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['WARNA']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_WARNA']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['DELIVERY']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['QTY_BAGIKAIN']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NETTO']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['DELAY']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_KK']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['DEMAND']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['ORDERLINE']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['PROGRESSSTATUS']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['CREATIONDATETIME_SALESORDER']))."',"
                                                                                        ."'".$_SERVER['REMOTE_ADDR']."',"
                                                                                        ."'".date('Y-m-d H:i:s')."')";
                                                            }
                                                            $value_itxviewmemo        = implode(',', $r_itxviewmemo);
                                                            $insert_itxviewmemo       = mysqli_query($con_nowprd, "INSERT INTO itxview_terimaorder(ORDERDATE,PELANGGAN,NO_ORDER,NO_PO,KETERANGAN_PRODUCT,WARNA,NO_WARNA,DELIVERY,QTY_BAGIKAIN,NETTO,`DELAY`,NO_KK,DEMAND,ORDERLINE,PROGRESSSTATUS,CREATIONDATETIME_SALESORDER,IPADDRESS,CREATEDATETIME) VALUES $value_itxviewmemo");

                                                            // --------------------------------------------------------------------------------------------------------------- //
                                                            $no_order_2 = $_POST['no_order'];
                                                            $tgl1_2     = $_POST['tgl1'];
                                                            $tgl2_2     = $_POST['tgl2'];

                                                            if($no_order_2){
                                                                $where_order2    = "NO_ORDER = '$no_order_2'";
                                                            }else{
                                                                $where_order2    = "";
                                                            }
                                                            if($tgl1_2 & $tgl2_2){
                                                                $where_date2     = "SUBSTR(CREATIONDATETIME_SALESORDER, 1,10) BETWEEN '$tgl1_2' AND '$tgl2_2'";
                                                            }else{
                                                                $where_date2     = "";
                                                            }
                                                            $sqlDB2 = "SELECT DISTINCT * FROM itxview_terimaorder WHERE $where_order2 $where_date2 AND IPADDRESS = '$_SERVER[REMOTE_ADDR]' ORDER BY DELIVERY ASC";
                                                            $stmt   = mysqli_query($con_nowprd,$sqlDB2);
                                                            while ($rowdb2 = mysqli_fetch_array($stmt)) {
                                                        ?>
                                                        <tr>
                                                            <td><?= substr($rowdb2['CREATIONDATETIME_SALESORDER'], 0, 19); ?></td> <!-- CREATE BO -->
                                                            <td></td><!-- TERIMA ORDER -->
                                                            <td></td><!-- BAGI LOT -->
                                                            <td><?= substr($rowdb2['ORDERDATE'], 0, 19); ?></td><!-- BUKA KK -->
                                                            <td></td><!-- HITUNG WAKTU (TERIMA ORDER s/d BUKA KK) -->
                                                            <?php
                                                                $q_posisikk_tunggu_greige = "SELECT
                                                                                            p.PRODUCTIONORDERCODE,
                                                                                            p.GROUPSTEPNUMBER AS STEPNUMBER,
                                                                                            p.OPERATIONCODE,
                                                                                            o.LONGDESCRIPTION,
                                                                                            CASE
                                                                                                WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                                WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
                                                                                                WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
                                                                                                WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
                                                                                            END AS STATUS_OPERATION,
                                                                                            iptip.MULAI,
                                                                                            iptop.SELESAI,
                                                                                            p.PRODUCTIONORDERCODE,
                                                                                            p.PRODUCTIONDEMANDCODE
                                                                                        FROM 
                                                                                            PRODUCTIONDEMANDSTEP p 
                                                                                        LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                                                        -- LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.GROUPSTEPNUMBER
                                                                                        -- LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.GROUPSTEPNUMBER
                                                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                        WHERE
                                                                                            p.PRODUCTIONORDERCODE  = '$rowdb2[NO_KK]' AND p.PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]' 
                                                                                            AND p.OPERATIONCODE = 'WAIT2'
                                                                                        ORDER BY p.STEPNUMBER ASC";
                                                                $r_posisikk_tunggu_greige = db2_exec($conn1, $q_posisikk_tunggu_greige);
                                                                $d_posisikk_tunggu_greige = db2_fetch_assoc($r_posisikk_tunggu_greige);
                                                                $TUNGGU_GREIGE            = $d_posisikk_tunggu_greige['SELESAI'];
                                                                
                                                                $q_posisikk_kkoke = "SELECT
                                                                                            p.PRODUCTIONORDERCODE,
                                                                                            p.GROUPSTEPNUMBER AS STEPNUMBER,
                                                                                            p.OPERATIONCODE,
                                                                                            o.LONGDESCRIPTION,
                                                                                            CASE
                                                                                                WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                                WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
                                                                                                WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
                                                                                                WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
                                                                                            END AS STATUS_OPERATION,
                                                                                            iptip.MULAI,
                                                                                            iptop.SELESAI,
                                                                                            p.PRODUCTIONORDERCODE,
                                                                                            p.PRODUCTIONDEMANDCODE
                                                                                        FROM 
                                                                                            PRODUCTIONDEMANDSTEP p 
                                                                                        LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                                                        -- LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.GROUPSTEPNUMBER
                                                                                        -- LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.GROUPSTEPNUMBER
                                                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                        WHERE
                                                                                            p.PRODUCTIONORDERCODE  = '$rowdb2[NO_KK]' AND p.PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]' 
                                                                                            AND p.OPERATIONCODE = 'PPC4'
                                                                                        ORDER BY p.STEPNUMBER ASC";
                                                                $r_posisikk_kkoke = db2_exec($conn1, $q_posisikk_kkoke);
                                                                $d_posisikk_kkoke = db2_fetch_assoc($r_posisikk_kkoke);
                                                                $KK_OKE           = $d_posisikk_kkoke['SELESAI'];
                                                            ?>
                                                            <td><?= $TUNGGU_GREIGE; ?></td><!-- TUNGGU GREIGE OUT -->
                                                            <td><?= $KK_OKE; ?></td><!-- KK OKE -->
                                                            <td>
                                                                <?php
                                                                    if($KK_OKE){
                                                                        $CREATE_PO  = new DateTime(substr($rowdb2['CREATIONDATETIME_SALESORDER'], 0, 19));
                                                                        $KKOKE      = new DateTime($KK_OKE);
                                                                        $d          = $KKOKE->diff($CREATE_PO)->days + 1;
                                                                        if($d >= 1){
                                                                            echo $d." hari";
                                                                        }else{
                                                                            echo "Delay ".$d." hari";
                                                                        }
                                                                    }
                                                                ?>
                                                            </td><!-- HITUNG WAKTU (CREATE BO s/d KK OKE) -->
                                                            <td>
                                                                <?php
                                                                    $q_tglsuratjalan    = db2_exec($conn1, "SELECT 
                                                                                                                    DISTINCT 
                                                                                                                    s.GOODSISSUEDATE AS TGL_SURATJALAN
                                                                                                                FROM 
                                                                                                                    SALESDOCUMENT s	
                                                                                                                LEFT JOIN SALESDOCUMENTLINE s2 ON s2.SALESDOCUMENTPROVISIONALCODE = s.PROVISIONALCODE 
                                                                                                                WHERE 
                                                                                                                    s2.DLVSALORDERLINESALESORDERCODE = '$rowdb2[NO_ORDER]' 
                                                                                                                    AND s2.DOCUMENTTYPETYPE = 05");
                                                                    $d_tglsuratjalan    = db2_fetch_assoc($q_tglsuratjalan);
                                                                    echo $d_tglsuratjalan['TGL_SURATJALAN'];
                                                                ?>
                                                            </td><!-- TGL KIRIM -->
                                                            <td>
                                                                <?php
                                                                    if($KK_OKE){
                                                                        $CREATE_PO      = new DateTime(substr($rowdb2['CREATIONDATETIME_SALESORDER'], 0, 19));
                                                                        $TGLKIRIM_SJ    = new DateTime($d_tglsuratjalan['TGL_SURATJALAN']);
                                                                        $d2          = $TGLKIRIM_SJ->diff($CREATE_PO)->days + 1;
                                                                        if($d2 >= 1){
                                                                            echo $d2." hari";
                                                                        }else{
                                                                            echo "Delay ".$d2." hari";
                                                                        }
                                                                    }
                                                                ?>
                                                            </td><!-- HITUNG WAKTU (CREATE BO s/d TGL KIRIM) -->
                                                            <td><?= $rowdb2['NO_KK']; ?></td><!-- NO KK -->
                                                            <td><a target="_BLANK" href="http://10.0.0.10/laporan/ppc_filter_steps.php?demand=<?= $rowdb2['DEMAND']; ?>&prod_order=<?= $rowdb2['NO_KK']; ?>">`<?= $rowdb2['DEMAND']; ?></a></td> <!-- DEMAND -->
                                                            <td><?= $rowdb2['NO_ORDER']; ?></td> <!-- NO. ORDER -->
                                                            <td><?= $rowdb2['KETERANGAN_PRODUCT']; ?></td> <!-- KETERANGAN PRODUCT -->
                                                            <td>
                                                                <?php 
                                                                    $q_lebar = db2_exec($conn1, "SELECT * FROM ITXVIEWLEBAR WHERE SALESORDERCODE = '$rowdb2[NO_ORDER]' AND ORDERLINE = '$rowdb2[ORDERLINE]'");
                                                                    $d_lebar = db2_fetch_assoc($q_lebar);
                                                                ?>
                                                                <?= number_format($d_lebar['LEBAR'],0); ?>
                                                            </td><!-- LEBAR -->
                                                            <td>
                                                                <?php 
                                                                    $q_gramasi = db2_exec($conn1, "SELECT * FROM ITXVIEWGRAMASI WHERE SALESORDERCODE = '$rowdb2[NO_ORDER]' AND ORDERLINE = '$rowdb2[ORDERLINE]'");
                                                                    $d_gramasi = db2_fetch_assoc($q_gramasi);
                                                                ?>
                                                                <?php 
                                                                    if($d_gramasi['GRAMASI_KFF']){
                                                                        echo number_format($d_gramasi['GRAMASI_KFF'], 0);
                                                                    }elseif($d_gramasi['GRAMASI_FKF']){
                                                                        echo number_format($d_gramasi['GRAMASI_FKF'], 0);
                                                                    }else{
                                                                        echo '-';
                                                                    }
                                                                ?>
                                                            </td> <!-- GRAMASI -->
                                                            <td><?= $rowdb2['WARNA']; ?></td> <!-- WARNA -->
                                                            <td><?= $rowdb2['NO_WARNA']; ?></td> <!-- NO WARNA -->
                                                            <td><?= $rowdb2['DELIVERY']; ?></td> <!-- DELIVERY -->
                                                            <td>
                                                                <?php 
                                                                    $q_tglbagikain = db2_exec($conn1, "SELECT * FROM ITXVIEW_TGLBAGIKAIN WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]'");
                                                                    $d_tglbagikain = db2_fetch_assoc($q_tglbagikain);
                                                                ?>
                                                                <?= $d_tglbagikain['TRANSACTIONDATE']; ?>
                                                            </td> <!-- BAGI KAIN TGL -->
                                                            <td>
                                                                <?php
                                                                    // KK GABUNG
                                                                    // $q_roll_gabung      = db2_exec($conn1, "SELECT 
                                                                    //                                     COUNT(*) AS ROLL
                                                                    //                                 FROM 
                                                                    //                                     PRODUCTIONDEMAND p 
                                                                    //                                 LEFT JOIN STOCKTRANSACTION s ON s.ORDERCODE = p.CODE
                                                                    //                                 WHERE 
                                                                    //                                     p.RESERVATIONORDERCODE = '$rowdb2[DEMAND]'");
                                                                    // $d_roll_gabung      = db2_fetch_assoc($q_roll_gabung);

                                                                    // KK TIDAK GABUNG
                                                                    $q_roll_tdk_gabung  = db2_exec($conn1, "SELECT count(*) AS ROLL, s2.PRODUCTIONORDERCODE
                                                                                                                FROM STOCKTRANSACTION s2 
                                                                                                                WHERE s2.ITEMTYPECODE ='KGF' AND s2.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]'
                                                                                                                GROUP BY s2.PRODUCTIONORDERCODE");
                                                                    $d_roll_tdk_gabung  = db2_fetch_assoc($q_roll_tdk_gabung);

                                                                    // if(!empty($d_roll_gabung['ROLL'])){
                                                                        // $roll   = $d_roll_gabung['ROLL'];
                                                                    // }else{
                                                                        $roll   = $d_roll_tdk_gabung['ROLL'];
                                                                    // }
                                                                ?>
                                                                <?= $roll; ?>
                                                            </td> <!-- ROLL -->
                                                            <td><?= number_format($rowdb2['QTY_BAGIKAIN'],2); ?></td> <!-- BRUTO/BAGI KAIN -->
                                                            <td>
                                                                <?php
                                                                    $q_qtypacking = db2_exec($conn1, "SELECT * FROM ITXVIEW_QTYPACKING WHERE DEMANDCODE = '$rowdb2[DEMAND]'");
                                                                    $d_qtypacking = db2_fetch_assoc($q_qtypacking);
                                                                    echo $d_qtypacking['QTY_PACKING'];
                                                                ?>
                                                            </td> <!-- QTY PACKING -->
                                                            <td><?= number_format($rowdb2['NETTO'],0); ?></td> <!-- NETTO KG-->
                                                            <td>
                                                                <?php 
                                                                    $sql_netto_yd = db2_exec($conn1, "SELECT * FROM ITXVIEW_NETTO WHERE CODE = '$rowdb2[DEMAND]'");
                                                                    $d_netto_yd = db2_fetch_assoc($sql_netto_yd);
                                                                    echo number_format($d_netto_yd['BASESECONDARYQUANTITY'],0);
                                                                ?>
                                                            </td> <!-- NETTO YD-->
                                                            <td><?= $rowdb2['DELAY']; ?></td> <!-- DELAY -->
                                                            <?php 
                                                                // mendeteksi statusnya close
                                                                $q_deteksi_status_close = db2_exec($conn1, "SELECT 
                                                                                                                p.PRODUCTIONORDERCODE AS PRODUCTIONORDERCODE, 
                                                                                                                p.PRODUCTIONDEMANDCODE AS PRODUCTIONDEMANDCODE, 
                                                                                                                p.GROUPSTEPNUMBER AS GROUPSTEPNUMBER,
                                                                                                                p.PROGRESSSTATUS AS PROGRESSSTATUS
                                                                                                            FROM 
                                                                                                                PRODUCTIONDEMANDSTEP p
                                                                                                            WHERE
                                                                                                                p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND
                                                                                                                -- p.PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]' AND 
                                                                                                                (p.PROGRESSSTATUS = '3' OR p.PROGRESSSTATUS = '2') ORDER BY p.GROUPSTEPNUMBER DESC LIMIT 1");
                                                                $row_status_close = db2_fetch_assoc($q_deteksi_status_close);
                                                                if(!empty($row_status_close['GROUPSTEPNUMBER'])){
                                                                    $groupstepnumber    = $row_status_close['GROUPSTEPNUMBER'];
                                                                }else{
                                                                    $groupstepnumber    = '10';
                                                                }

                                                                $q_cnp1             = db2_exec($conn1, "SELECT 
                                                                                                            STEPNUMBER,
                                                                                                            TRIM(OPERATIONCODE) AS OPERATIONCODE,
                                                                                                            LONGDESCRIPTION,
                                                                                                            PROGRESSSTATUS,
                                                                                                            CASE
                                                                                                                WHEN PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                                                WHEN PROGRESSSTATUS = 1 THEN 'Planned'
                                                                                                                WHEN PROGRESSSTATUS = 2 THEN 'Progress'
                                                                                                                WHEN PROGRESSSTATUS = 3 THEN 'Closed'
                                                                                                            END AS STATUS_OPERATION
                                                                                                        FROM 
                                                                                                            PRODUCTIONDEMANDSTEP 
                                                                                                        WHERE 
                                                                                                            PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND 
                                                                                                            -- PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]' AND 
                                                                                                            PROGRESSSTATUS = 3 
                                                                                                        ORDER BY 
                                                                                                            STEPNUMBER DESC LIMIT 1");
                                                                $d_cnp_close        = db2_fetch_assoc($q_cnp1);

                                                                if($d_cnp_close['PROGRESSSTATUS'] == 3){ // 3 is Closed From Demands Steps 
                                                                    if($d_cnp_close['OPERATIONCODE'] == 'PPC4'){
                                                                        if($rowdb2['PROGRESSSTATUS'] == 6){
                                                                            $kode_dept          = '-';
                                                                            $status_terakhir    = '-';
                                                                            $status_operation   = 'KK Oke';
                                                                        }else{
                                                                            $kode_dept          = '-';
                                                                            $status_terakhir    = '-';
                                                                            $status_operation   = 'KK Oke | Segera Closed Production Order!';
                                                                        }
                                                                    }else{
                                                                        $q_not_cnp1             = db2_exec($conn1, "SELECT 
                                                                                                                        STEPNUMBER,
                                                                                                                        TRIM(OPERATIONCODE) AS OPERATIONCODE,
                                                                                                                        LONGDESCRIPTION,
                                                                                                                        PROGRESSSTATUS,
                                                                                                                        CASE
                                                                                                                            WHEN PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                                                            WHEN PROGRESSSTATUS = 1 THEN 'Planned'
                                                                                                                            WHEN PROGRESSSTATUS = 2 THEN 'Progress'
                                                                                                                            WHEN PROGRESSSTATUS = 3 THEN 'Closed'
                                                                                                                        END AS STATUS_OPERATION
                                                                                                                    FROM 
                                                                                                                        PRODUCTIONDEMANDSTEP 
                                                                                                                    WHERE 
                                                                                                                        PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND 
                                                                                                                        -- PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]' AND 
                                                                                                                        STEPNUMBER > $d_cnp_close[STEPNUMBER]
                                                                                                                    ORDER BY 
                                                                                                                        STEPNUMBER ASC LIMIT 1");
                                                                        $d_not_cnp_close        = db2_fetch_assoc($q_not_cnp1);

                                                                        $kode_dept          = $d_not_cnp_close['OPERATIONCODE'];
                                                                        $status_terakhir    = $d_not_cnp_close['LONGDESCRIPTION'];
                                                                        $status_operation   = $d_not_cnp_close['STATUS_OPERATION'];
                                                                    }
                                                                }else{
                                                                    if($row_status_close['PROGRESSSTATUS'] == 2){
                                                                        $groupstep_option       = "= '$groupstepnumber'";
                                                                    }else{
                                                                        $groupstep_option       = "> '$groupstepnumber'";
                                                                    }
                                                                    $q_StatusTerakhir   = db2_exec($conn1, "SELECT 
                                                                                                                p.PRODUCTIONORDERCODE, 
                                                                                                                p.PRODUCTIONDEMANDCODE, 
                                                                                                                p.GROUPSTEPNUMBER, 
                                                                                                                p.OPERATIONCODE, 
                                                                                                                p.LONGDESCRIPTION AS LONGDESCRIPTION, 
                                                                                                                CASE
                                                                                                                    WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                                                    WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
                                                                                                                    WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
                                                                                                                    WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
                                                                                                                END AS STATUS_OPERATION,
                                                                                                                wc.LONGDESCRIPTION AS DEPT, 
                                                                                                                p.WORKCENTERCODE
                                                                                                            FROM 
                                                                                                                PRODUCTIONDEMANDSTEP p
                                                                                                            LEFT JOIN WORKCENTER wc ON wc.CODE = p.WORKCENTERCODE
                                                                                                            WHERE 
                                                                                                                p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND
                                                                                                                -- p.PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]' AND
                                                                                                                (p.PROGRESSSTATUS = '0' OR p.PROGRESSSTATUS = '1' OR p.PROGRESSSTATUS ='2') 
                                                                                                                AND p.GROUPSTEPNUMBER $groupstep_option
                                                                                                            ORDER BY p.GROUPSTEPNUMBER ASC LIMIT 1");
                                                                    $d_StatusTerakhir   = db2_fetch_assoc($q_StatusTerakhir);
                                                                    $kode_dept          = $d_StatusTerakhir['DEPT'];
                                                                    $status_terakhir    = $d_StatusTerakhir['LONGDESCRIPTION'];
                                                                    $status_operation   = $d_StatusTerakhir['STATUS_OPERATION'];
                                                                }
                                                            ?>
                                                            <td><?= $kode_dept; ?></td> <!-- KODE DEPT -->
                                                            <td><?= $status_terakhir; ?></td> <!-- STATUS TERAKHIR -->
                                                            <td><?= $status_operation; ?></td> <!-- PROGRESS STATUS -->
                                                            <td><?= $rowdb2['KETERANGAN']; ?></td> <!-- KETERANGAN -->
                                                            <td>
                                                                <?php
                                                                    $q_orig_pd_code     = db2_exec($conn1, "SELECT 
                                                                                                                *, a.VALUESTRING AS ORIGINALPDCODE
                                                                                                            FROM 
                                                                                                                PRODUCTIONDEMAND p 
                                                                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'
                                                                                                            WHERE p.CODE = '$rowdb2[DEMAND]'");
                                                                    $d_orig_pd_code     = db2_fetch_assoc($q_orig_pd_code);
                                                                    echo $d_orig_pd_code['ORIGINALPDCODE'];
                                                                ?>
                                                            </td> <!-- ORIGINAL PD CODE -->
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
</body>
<?php require_once 'footer.php'; ?>