<?php 
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php";
    mysqli_query($con_nowprd, "DELETE FROM itxview_poselesai WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY");
    mysqli_query($con_nowprd, "DELETE FROM itxview_poselesai WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]'"); 
    $tgljam = date('Y-m-d H:i:s');
    mysqli_query($con_nowprd, "INSERT INTO cache_accessto (IPADDRESS,CREATIONDATETIME,ACCESSTO) VALUES('$_SERVER[REMOTE_ADDR]', '$tgljam','PO SELESAI')");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PPC - PO Selesai</title>
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
    <!-- <script src="TabCounter.js"></script> -->
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
                                        <h5>Filter Data</h5>
                                        <span class="count" hidden></span>
                                        <script>
                                            tabCount.onTabChange(function(count){
                                                document.querySelector(".count").innerText = count;
                                                document.querySelector("title").innerText = count + " Tabs opened PO Selesai.";
                                            },true);
                                        </script>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-12 m-b-30">
                                                    <h4 class="sub-title">Bon Order</h4>
                                                    <input type="text" name="no_order" class="form-control" onkeyup="this.value = this.value.toUpperCase()" value="<?php if (isset($_POST['submit'])){ echo $_POST['no_order']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary">Cari data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST['submit'])) : ?>
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table id="lang-dt" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th style="display:none;">TGL BUKA KARTU</th>
                                                            <th style="display:none;">PELANGGAN</th>
                                                            <th>NO. ORDER</th>
                                                            <th style="display:none;">NO. PO</th>
                                                            <th style="display:none;">KETERANGAN PRODUCT</th>
                                                            <th style="display:none;">LEBAR</th>
                                                            <th style="display:none;">GRAMASI</th>
                                                            <th>WARNA</th>
                                                            <th style="display:none;">NO WARNA</th>
                                                            <th style="display:none;">DELIVERY</th>
                                                            <th>BAGI KAIN TGL</th>
                                                            <th>ROLL</th>
                                                            <th>BRUTO/BAGI KAIN</th>
                                                            <th>BRUTO/BAGI KAIN YARD</th>
                                                            <th title="Sumber data: &#013; 1. Production Order &#013; 2. Reservation &#013; 3. KFF/KGF User Primary Quantity">QTY SALINAN</th>
                                                            <th title="Sumber data: &#013; 1. Production Demand &#013; 2. Bagian group Entered quantity &#013; 3. User Primary Quantity">QTY PACKING</th>
                                                            <th title="Sumber data: &#013; 1. Production Demand &#013; 2. Bagian group Entered quantity &#013; 3. User Secondary Quantity">QTY PACKING YARD</th>
                                                            <th>NETTO(kg)</th>
                                                            <th>NETTO(yd)</th>
                                                            <th style="display:none;">DELAY</th>
                                                            <th style="display:none;">KODE DEPT</th>
                                                            <th style="display:none;">STATUS TERAKHIR</th>
                                                            <th style="display:none;">PROGRESS STATUS</th>
                                                            <th>NO DEMAND</th>
                                                            <th>NO KARTU KERJA</th>
                                                            <th style="display:none;">CATATAN PO GREIGE</th>
                                                            <th style="display:none;">TARGET SELESAI</th>
                                                            <th style="display:none;">KETERANGAN</th>
                                                            <th>ORIGINAL PD CODE</th>
                                                            <?php if($_SERVER['REMOTE_ADDR'] == '10.0.5.132') : ?>
                                                            <th>Only Nilo</th>
                                                            <?php endif; ?>
                                                            <th>NO SURAT JALAN</th>
                                                            <th>TGL KIRIM</th>
                                                            <th>QTY KIRIM (KG)</th>
                                                            <th>QTY KIRIM (YARD/MTR)</th>
                                                            <th>QTY KURANG (KG)</th>
                                                            <th>QTY KURANG (YARD/MTR)</th>
                                                            <th>FOC</th>
                                                            <th>LOSS (KG)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php 
                                                            ini_set("error_reporting", 0);
                                                            session_start();
                                                            require_once "koneksi.php";
                                                            $no_order       = $_POST['no_order'];

                                                            if($no_order){
                                                                $where_order            = "NO_ORDER = '$no_order'";
                                                            }else{
                                                                $where_order            = "";
                                                            }
                                                            
                                                            // ITXVIEW_MEMOPENTINGPPC
                                                            $itxviewmemo              = db2_exec($conn1, "SELECT * FROM ITXVIEW_MEMOPENTINGPPC WHERE $where_order");
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
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['QTY_BAGIKAIN_YD_MTR']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NETTO']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['DELAY']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_KK']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['DEMAND']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['ORDERLINE']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['PROGRESSSTATUS']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['PROGRESSSTATUS_DEMAND']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['KETERANGAN']))."',"
                                                                                        ."'".$_SERVER['REMOTE_ADDR']."',"
                                                                                        ."'".date('Y-m-d H:i:s')."')";
                                                            }
                                                            $value_itxviewmemo        = implode(',', $r_itxviewmemo);
                                                            $insert_itxviewmemo       = mysqli_query($con_nowprd, "INSERT INTO itxview_poselesai(ORDERDATE,PELANGGAN,NO_ORDER,NO_PO,KETERANGAN_PRODUCT,WARNA,NO_WARNA,DELIVERY,QTY_BAGIKAIN,QTY_BAGIKAIN_YD_MTR,NETTO,`DELAY`,NO_KK,DEMAND,ORDERLINE,PROGRESSSTATUS,PROGRESSSTATUS_DEMAND,KETERANGAN,IPADDRESS,CREATEDATETIME) VALUES $value_itxviewmemo");
                                                                
                                                            
                                                            // --------------------------------------------------------------------------------------------------------------- //
                                                            $no_order_2     = $_POST['no_order'];

                                                            if($no_order_2){
                                                                $where_order2    = "NO_ORDER = '$no_order_2'";
                                                            }else{
                                                                $where_order2    = "";
                                                            }
                                                            $sqlDB2 = "SELECT DISTINCT * FROM itxview_poselesai WHERE $where_order2 AND IPADDRESS = '$_SERVER[REMOTE_ADDR]' ORDER BY DELIVERY ASC";
                                                            $stmt   = mysqli_query($con_nowprd,$sqlDB2);
                                                            while ($rowdb2 = mysqli_fetch_array($stmt)) {
                                                        ?>
                                                        <?php 
                                                            //Deteksi Production Demand Closed Atau Belum
                                                            if($rowdb2['PROGRESSSTATUS_DEMAND'] == 6){
                                                                $status = 'AAA';
                                                                $kode_dept          = '-';
                                                                $status_terakhir    = '-';
                                                                $status_operation   = 'KK Oke';
                                                            }else{
                                                                // 1. Deteksi Production Order Closed Atau Belum
                                                                if($rowdb2['PROGRESSSTATUS'] == 6){
                                                                    $status = 'AA';
                                                                    $kode_dept          = '-';
                                                                    $status_terakhir    = '-';
                                                                    $status_operation   = 'KK Oke';
                                                                }else{
                                                                    // mendeteksi statusnya close
                                                                    $q_deteksi_status_close = db2_exec($conn1, "SELECT 
                                                                                                                    p.PRODUCTIONORDERCODE AS PRODUCTIONORDERCODE, 
                                                                                                                    p.GROUPSTEPNUMBER AS GROUPSTEPNUMBER,
                                                                                                                    p.PROGRESSSTATUS AS PROGRESSSTATUS
                                                                                                                FROM 
                                                                                                                    VIEWPRODUCTIONDEMANDSTEP p
                                                                                                                WHERE
                                                                                                                    p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND
                                                                                                                    (p.PROGRESSSTATUS = '3' OR p.PROGRESSSTATUS = '2') ORDER BY p.GROUPSTEPNUMBER DESC LIMIT 1");
                                                                    $row_status_close = db2_fetch_assoc($q_deteksi_status_close);
                                                                    if(!empty($row_status_close['GROUPSTEPNUMBER'])){
                                                                        $groupstepnumber    = $row_status_close['GROUPSTEPNUMBER'];
                                                                    }else{
                                                                        $groupstepnumber    = '10';
                                                                    }

                                                                    $q_cnp1             = db2_exec($conn1, "SELECT 
                                                                                                                GROUPSTEPNUMBER,
                                                                                                                TRIM(OPERATIONCODE) AS OPERATIONCODE,
                                                                                                                o.LONGDESCRIPTION AS LONGDESCRIPTION,
                                                                                                                PROGRESSSTATUS,
                                                                                                                CASE
                                                                                                                    WHEN PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                                                    WHEN PROGRESSSTATUS = 1 THEN 'Planned'
                                                                                                                    WHEN PROGRESSSTATUS = 2 THEN 'Progress'
                                                                                                                    WHEN PROGRESSSTATUS = 3 THEN 'Closed'
                                                                                                                END AS STATUS_OPERATION
                                                                                                            FROM 
                                                                                                                VIEWPRODUCTIONDEMANDSTEP v
                                                                                                            LEFT JOIN OPERATION o ON o.CODE = v.OPERATIONCODE
                                                                                                            WHERE 
                                                                                                                PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND PROGRESSSTATUS = 3 
                                                                                                            ORDER BY 
                                                                                                                GROUPSTEPNUMBER DESC LIMIT 1");
                                                                    $d_cnp_close        = db2_fetch_assoc($q_cnp1);

                                                                    if($d_cnp_close['PROGRESSSTATUS'] == 3){ // 3 is Closed From Demands Steps 
                                                                        $status = 'A';
                                                                        if($d_cnp_close['OPERATIONCODE'] == 'PPC4'){
                                                                            if($rowdb2['PROGRESSSTATUS'] == 6){
                                                                                $status = 'B';
                                                                                $kode_dept          = '-';
                                                                                $status_terakhir    = '-';
                                                                                $status_operation   = 'KK Oke';
                                                                            }else{
                                                                                $status = 'C';
                                                                                $kode_dept          = '-';
                                                                                $status_terakhir    = '-';
                                                                                $status_operation   = 'KK Oke | Segera Closed Production Order!';
                                                                            }
                                                                        }else{
                                                                            $status = 'D';
                                                                            if($row_status_close['PROGRESSSTATUS'] == 2){
                                                                                $status = 'E';
                                                                                $groupstep_option       = "= '$groupstepnumber'";
                                                                            }else{ //kalau status terakhirnya bukan PPC dan status terakhirnya CLOSED
                                                                                $status = 'F';
                                                                                $q_deteksi_total_step    = db2_exec($conn1, "SELECT COUNT(*) AS TOTALSTEP FROM VIEWPRODUCTIONDEMANDSTEP 
                                                                                                                            WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]'");
                                                                                $d_deteksi_total_step    = db2_fetch_assoc($q_deteksi_total_step);

                                                                                $q_deteksi_total_close  = db2_exec($conn1, "SELECT COUNT(*) AS TOTALCLOSE FROM VIEWPRODUCTIONDEMANDSTEP 
                                                                                                                            WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]'
                                                                                                                            AND PROGRESSSTATUS = 3");
                                                                                $d_deteksi_total_close  = db2_fetch_assoc($q_deteksi_total_close);

                                                                                if($d_deteksi_total_step['TOTALSTEP'] ==  $d_deteksi_total_close['TOTALCLOSE']){
                                                                                    $groupstep_option       = "= '$groupstepnumber'";
                                                                                }else{
                                                                                    $groupstep_option       = "> '$groupstepnumber'";
                                                                                }
                                                                            }
                                                                            // $status = 'G';
                                                                            $q_not_cnp1             = db2_exec($conn1, "SELECT 
                                                                                                                            GROUPSTEPNUMBER,
                                                                                                                            TRIM(OPERATIONCODE) AS OPERATIONCODE,
                                                                                                                            o.LONGDESCRIPTION AS LONGDESCRIPTION,
                                                                                                                            PROGRESSSTATUS,
                                                                                                                            CASE
                                                                                                                                WHEN PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                                                                WHEN PROGRESSSTATUS = 1 THEN 'Planned'
                                                                                                                                WHEN PROGRESSSTATUS = 2 THEN 'Progress'
                                                                                                                                WHEN PROGRESSSTATUS = 3 THEN 'Closed'
                                                                                                                            END AS STATUS_OPERATION
                                                                                                                        FROM 
                                                                                                                            VIEWPRODUCTIONDEMANDSTEP v
                                                                                                                        LEFT JOIN OPERATION o ON o.CODE = v.OPERATIONCODE
                                                                                                                        WHERE 
                                                                                                                            PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND 
                                                                                                                            GROUPSTEPNUMBER $groupstep_option
                                                                                                                        ORDER BY 
                                                                                                                            GROUPSTEPNUMBER ASC LIMIT 1");
                                                                            $d_not_cnp_close        = db2_fetch_assoc($q_not_cnp1);

                                                                            if($d_not_cnp_close){
                                                                                $kode_dept          = $d_not_cnp_close['OPERATIONCODE'];
                                                                                $status_terakhir    = $d_not_cnp_close['LONGDESCRIPTION'];
                                                                                $status_operation   = $d_not_cnp_close['STATUS_OPERATION'];
                                                                            }else{
                                                                                $status = 'H';
                                                                                $groupstep_option       = "= '$groupstepnumber'";
                                                                                $q_not_cnp1             = db2_exec($conn1, "SELECT 
                                                                                                                            GROUPSTEPNUMBER,
                                                                                                                            TRIM(OPERATIONCODE) AS OPERATIONCODE,
                                                                                                                            o.LONGDESCRIPTION AS LONGDESCRIPTION,
                                                                                                                            PROGRESSSTATUS,
                                                                                                                            CASE
                                                                                                                                WHEN PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                                                                WHEN PROGRESSSTATUS = 1 THEN 'Planned'
                                                                                                                                WHEN PROGRESSSTATUS = 2 THEN 'Progress'
                                                                                                                                WHEN PROGRESSSTATUS = 3 THEN 'Closed'
                                                                                                                            END AS STATUS_OPERATION
                                                                                                                        FROM 
                                                                                                                            VIEWPRODUCTIONDEMANDSTEP v
                                                                                                                        LEFT JOIN OPERATION o ON o.CODE = v.OPERATIONCODE
                                                                                                                        WHERE 
                                                                                                                            PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND 
                                                                                                                            GROUPSTEPNUMBER $groupstep_option
                                                                                                                        ORDER BY 
                                                                                                                            GROUPSTEPNUMBER ASC LIMIT 1");
                                                                                $d_not_cnp_close        = db2_fetch_assoc($q_not_cnp1);
                                                                                
                                                                                $kode_dept          = $d_not_cnp_close['OPERATIONCODE'];
                                                                                $status_terakhir    = $d_not_cnp_close['LONGDESCRIPTION'];
                                                                                $status_operation   = $d_not_cnp_close['STATUS_OPERATION'];
                                                                            }
                                                                        }
                                                                    }else{
                                                                        $status = 'H';
                                                                        if($row_status_close['PROGRESSSTATUS'] == 2){
                                                                            $status = 'I';
                                                                            $groupstep_option       = "= '$groupstepnumber'";
                                                                        }else{
                                                                            $status = 'J';
                                                                            $groupstep_option       = "> '$groupstepnumber'";
                                                                        }
                                                                        $status = 'K';
                                                                        $q_StatusTerakhir   = db2_exec($conn1, "SELECT 
                                                                                                                    p.PRODUCTIONORDERCODE, 
                                                                                                                    p.GROUPSTEPNUMBER, 
                                                                                                                    p.OPERATIONCODE, 
                                                                                                                    o.LONGDESCRIPTION AS LONGDESCRIPTION, 
                                                                                                                    CASE
                                                                                                                        WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                                                        WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
                                                                                                                        WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
                                                                                                                        WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
                                                                                                                    END AS STATUS_OPERATION,
                                                                                                                    wc.LONGDESCRIPTION AS DEPT, 
                                                                                                                    p.WORKCENTERCODE
                                                                                                                FROM 
                                                                                                                    VIEWPRODUCTIONDEMANDSTEP p                                                                                                        -- p.PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]' AND
                                                                                                                LEFT JOIN WORKCENTER wc ON wc.CODE = p.WORKCENTERCODE
                                                                                                                LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE
                                                                                                                WHERE 
                                                                                                                    p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND
                                                                                                                    (p.PROGRESSSTATUS = '0' OR p.PROGRESSSTATUS = '1' OR p.PROGRESSSTATUS ='2') 
                                                                                                                    AND p.GROUPSTEPNUMBER $groupstep_option
                                                                                                                ORDER BY p.GROUPSTEPNUMBER ASC LIMIT 1");
                                                                        $d_StatusTerakhir   = db2_fetch_assoc($q_StatusTerakhir);
                                                                        $kode_dept          = $d_StatusTerakhir['OPERATIONCODE'];
                                                                        $status_terakhir    = $d_StatusTerakhir['LONGDESCRIPTION'];
                                                                        $status_operation   = $d_StatusTerakhir['STATUS_OPERATION'];
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                        <?php 
                                                            if($operation_2){
                                                                if($rowdb2['OPERATIONCODE'] == $kode_dept) {
                                                                    $cek_operation  = "MUNCUL";
                                                                }else{
                                                                    $cek_operation  = "TIDAK MUNCUL";
                                                                }
                                                            }
                                                        ?>
                                                        <?php if($cek_operation == "MUNCUL" OR $cek_operation == NULL) : ?>
                                                        <tr>
                                                            <td style="display:none;"><?= $rowdb2['ORDERDATE']; ?></td> <!-- TGL TERIMA ORDER -->
                                                            <td style="display:none;"><?= $rowdb2['PELANGGAN']; ?></td> <!-- PELANGGAN -->
                                                            <td><?= $rowdb2['NO_ORDER']; ?></td> <!-- NO. ORDER -->
                                                            <td style="display:none;"><?= $rowdb2['NO_PO']; ?></td> <!-- NO. PO -->
                                                            <td style="display:none;"><?= $rowdb2['KETERANGAN_PRODUCT']; ?></td> <!-- KETERANGAN PRODUCT -->
                                                            <td style="display:none;">
                                                                <?php 
                                                                    $q_lebar = db2_exec($conn1, "SELECT * FROM ITXVIEWLEBAR WHERE SALESORDERCODE = '$rowdb2[NO_ORDER]' AND ORDERLINE = '$rowdb2[ORDERLINE]'");
                                                                    $d_lebar = db2_fetch_assoc($q_lebar);
                                                                ?>
                                                                <?= number_format($d_lebar['LEBAR'],0); ?>
                                                            </td><!-- LEBAR -->
                                                            <td style="display:none;">
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
                                                            <td style="display:none;"><?= $rowdb2['NO_WARNA']; ?></td> <!-- NO WARNA -->
                                                            <td style="display:none;"><?= $rowdb2['DELIVERY']; ?></td> <!-- DELIVERY -->
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
                                                            <td>
                                                                <?php
                                                                    $q_orig_pd_code     = db2_exec($conn1, "SELECT 
                                                                                                                *, a.VALUESTRING AS ORIGINALPDCODE
                                                                                                            FROM 
                                                                                                                PRODUCTIONDEMAND p 
                                                                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'
                                                                                                            WHERE p.CODE = '$rowdb2[DEMAND]'");
                                                                    $d_orig_pd_code     = db2_fetch_assoc($q_orig_pd_code);
                                                                ?>
                                                                <?php if($d_orig_pd_code['ORIGINALPDCODE']) : ?>
                                                                    0
                                                                <?php else : ?>
                                                                    <?= number_format($rowdb2['QTY_BAGIKAIN'],2); ?>
                                                                <?php endif; ?>
                                                            </td> <!-- BRUTO/BAGI KAIN -->
                                                            <td>
                                                                <?php
                                                                    $q_orig_pd_code     = db2_exec($conn1, "SELECT 
                                                                                                                *, a.VALUESTRING AS ORIGINALPDCODE
                                                                                                            FROM 
                                                                                                                PRODUCTIONDEMAND p 
                                                                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'
                                                                                                            WHERE p.CODE = '$rowdb2[DEMAND]'");
                                                                    $d_orig_pd_code     = db2_fetch_assoc($q_orig_pd_code);
                                                                ?>
                                                                <?php if($d_orig_pd_code['ORIGINALPDCODE']) : ?>
                                                                    0
                                                                <?php else : ?>
                                                                    <?= number_format($rowdb2['QTY_BAGIKAIN_YD_MTR'],2); ?>
                                                                <?php endif; ?>
                                                            </td> <!-- BRUTO/BAGI KAIN YARD -->
                                                            <td>
                                                                <?php 
                                                                    $q_qtysalinan = db2_exec($conn1, "SELECT * FROM PRODUCTIONDEMAND WHERE CODE = '$rowdb2[DEMAND]'");
                                                                    $d_qtysalinan = db2_fetch_assoc($q_qtysalinan);
                                                                ?>
                                                                <?php if($d_orig_pd_code['ORIGINALPDCODE']) : ?>
                                                                    <?= number_format($d_qtysalinan['USERPRIMARYQUANTITY'],3) ?>
                                                                <?php else : ?>
                                                                    0
                                                                <?php endif; ?>
                                                            </td> <!-- QTY SALINAN -->
                                                            <td>
                                                                <?php
                                                                    $q_qtypacking = db2_exec($conn1, "SELECT * FROM ITXVIEW_QTYPACKING WHERE DEMANDCODE = '$rowdb2[DEMAND]'");
                                                                    $d_qtypacking = db2_fetch_assoc($q_qtypacking);
                                                                    echo $d_qtypacking['QTY_PACKING'];
                                                                ?>
                                                            </td> <!-- QTY PACKING -->
                                                            <td>
                                                                <?php
                                                                    $q_qtypacking = db2_exec($conn1, "SELECT * FROM ITXVIEW_QTYPACKING WHERE DEMANDCODE = '$rowdb2[DEMAND]'");
                                                                    $d_qtypacking = db2_fetch_assoc($q_qtypacking);
                                                                    echo $d_qtypacking['QTY_PACKING_YARD'];
                                                                ?>
                                                            </td> <!-- QTY PACKING YARD -->
                                                            <td><?= number_format($rowdb2['NETTO'],0); ?></td> <!-- NETTO KG-->
                                                            <td>
                                                                <?php 
                                                                    $sql_netto_yd = db2_exec($conn1, "SELECT * FROM ITXVIEW_NETTO WHERE CODE = '$rowdb2[DEMAND]'");
                                                                    $d_netto_yd = db2_fetch_assoc($sql_netto_yd);
                                                                    echo number_format($d_netto_yd['BASESECONDARYQUANTITY'],0);
                                                                ?>
                                                            </td> <!-- NETTO YD-->
                                                            <td style="display:none;"><?= $rowdb2['DELAY']; ?></td> <!-- DELAY -->
                                                            <td style="display:none;"><?= $kode_dept; ?></td> <!-- KODE DEPT -->
                                                            <td style="display:none;"><?= $status_terakhir; ?></td> <!-- STATUS TERAKHIR -->
                                                            <td style="display:none;"><?= $status_operation; ?></td> <!-- PROGRESS STATUS -->
                                                            <td><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?= $rowdb2['DEMAND']; ?>&prod_order=<?= $rowdb2['NO_KK']; ?>">`<?= $rowdb2['DEMAND']; ?></a></td> <!-- DEMAND -->
                                                            <td>`<?= $rowdb2['NO_KK']; ?></td> <!-- NO KARTU KERJA -->
                                                            <td style="display:none;">
                                                                <?php
                                                                    $sql_benang_booking_new		= db2_exec($conn1, "SELECT * FROM ITXVIEW_BOOKING_NEW WHERE SALESORDERCODE = '$rowdb2[NO_ORDER]'
                                                                                                                                            AND ORDERLINE = '$rowdb2[ORDERLINE]'");
                                                                    $r_benang_booking_new		= db2_fetch_assoc($sql_benang_booking_new);
                                                                    $d_benang_booking_new		= $r_benang_booking_new['SALESORDERCODE'];

                                                                ?>
                                                                <!-- <a href="http://online.indotaichen.com/laporan/ppc_catatan_po_greige.php?" target="_blank">Detail</a> -->
                                                                <?php if($d_benang_booking_new){ echo $d_benang_booking_new.'. Greige Ready'; } ?>
                                                            </td> <!-- CATATAN PO GREIGE -->
                                                            <td style="display:none;"></td> <!-- TARGET SELESAI -->
                                                            <td style="display:none;"><?= $rowdb2['KETERANGAN']; ?></td> <!-- KETERANGAN -->
                                                            <td><?= $d_orig_pd_code['ORIGINALPDCODE']; ?></td> <!-- ORIGINAL PD CODE -->
                                                            <?php if($_SERVER['REMOTE_ADDR'] == '10.0.5.132') : ?>
                                                            <td>
                                                                <?= $groupstep_option; ?>
                                                                <?= $status; ?>
                                                            </td>
                                                            <?php endif; ?>
                                                            <?php
                                                                $q_suratjalan   = db2_exec($conn1, "SELECT DISTINCT 
                                                                                                            p.PRODUCTIONORDERCODE,
                                                                                                            p.PRODUCTIONDEMANDCODE,
                                                                                                            isp.CODE,
                                                                                                            isp.PROVISIONALCODE AS SURAT_JALAN
                                                                                                        FROM 
                                                                                                            PRODUCTIONDEMANDSTEP p
                                                                                                        LEFT JOIN PRODUCTIONDEMAND p2 ON p2.CODE = p.PRODUCTIONDEMANDCODE
                                                                                                        LEFT JOIN ITXVIEW_ALLOCATION_SURATJALAN_PPC iasp ON iasp.LOTCODE = p.PRODUCTIONORDERCODE 
                                                                                                        RIGHT JOIN ITXVIEW_SURATJALAN_PPC isp ON isp.CODE = iasp.CODE 
                                                                                                        WHERE
                                                                                                            p.PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]'");
                                                                $d_suratjalan   = db2_fetch_assoc($q_suratjalan);

                                                                $q_lain_suratjalan   =   db2_exec($conn1, "SELECT 
                                                                                                            isp.CODE,
                                                                                                            isp.GOODSISSUEDATE AS TGL_KIRIM,
                                                                                                            CASE
                                                                                                                WHEN isp.PAYMENTMETHODCODE = 'FOC' THEN isp.PAYMENTMETHODCODE
                                                                                                                ELSE ''
                                                                                                            END AS FOC,
                                                                                                            SUM(iasp.BASEPRIMARYQUANTITY) AS QTY_KIRIM_KG,
                                                                                                            CASE
                                                                                                                WHEN isp.PRICEUNITOFMEASURECODE = 'yd' THEN SUM(iasp.BASESECONDARYQUANTITY) 
                                                                                                                WHEN isp.PRICEUNITOFMEASURECODE = 'kg' THEN SUM(iasp.BASESECONDARYQUANTITY)
                                                                                                                WHEN isp.PRICEUNITOFMEASURECODE = 'm' THEN SUM(round(iasp.BASESECONDARYQUANTITY * 0.9144, 2))
                                                                                                            END AS QTY_KIRIM_YARD_MTR
                                                                                                        FROM 
                                                                                                            ITXVIEW_SURATJALAN_PPC isp 
                                                                                                        LEFT JOIN ITXVIEW_ALLOCATION_SURATJALAN_PPC iasp ON iasp.CODE = isp.CODE 
                                                                                                        WHERE 
                                                                                                            isp.CODE = '$d_suratjalan[CODE]'
                                                                                                        GROUP BY
                                                                                                            isp.CODE,
                                                                                                            isp.GOODSISSUEDATE,
                                                                                                            isp.PAYMENTMETHODCODE,
                                                                                                            isp.PRICEUNITOFMEASURECODE");
                                                                $d_lain_suratjalan   = db2_fetch_assoc($q_lain_suratjalan);
                                                                
                                                            ?>
                                                            <td><?= $d_suratjalan['SURAT_JALAN']; ?></td> <!-- NO SURAT JALAN -->
                                                            <td><?= $d_lain_suratjalan['TGL_KIRIM']; ?></td> <!-- TGL KIRIM -->
                                                            <td><?= number_format($d_lain_suratjalan['QTY_KIRIM_KG'], 2); ?></td> <!-- QTY KIRIM KG -->
                                                            <td><?= number_format($d_lain_suratjalan['QTY_KIRIM_YARD_MTR'], 2); ?></td> <!-- QTY KIRIM YARD/METER -->
                                                            <td>
                                                                <?= number_format($rowdb2['NETTO'], 2) - number_format($d_lain_suratjalan['QTY_KIRIM_KG'],2); ?>
                                                            </td> <!-- QTY KURANG KG -->
                                                            <td>
                                                                <?= number_format
                                                                ($d_netto_yd['BASESECONDARYQUANTITY'],2) - number_format($d_lain_suratjalan['QTY_KIRIM_YARD_MTR'], 2); ?>
                                                            </td> <!-- QTY KURANG YARD/METER -->
                                                            <td><?= $d_lain_suratjalan['FOC']; ?></td> <!-- FOC -->
                                                            <td>
                                                                <?php 
                                                                    if($rowdb2['QTY_BAGIKAIN_KG']!=0){
                                                                        echo number_format(($rowdb2['QTY_BAGIKAIN']-$d_qtypacking['QTY_PACKING'])/$rowdb2['QTY_BAGIKAIN']*100,2)." %";
                                                                    } else{ 
                                                                        echo "0%";
                                                                    } 
                                                                ?>
                                                            </td><!-- LOSS -->
                                                        </tr>
                                                        <?php endif; ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif(isset($_POST['reset'])) : ?>
                                    <?php
                                        ini_set("error_reporting", 1);
                                        session_start();
                                        require_once "koneksi.php";
                                        mysqli_query($con_nowprd, "DELETE FROM itxview_poselesai");
                                        header("Location: ppc_filter_poselesai.php");
                                    ?>
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
<script>
    $('#table-excel').DataTable({
        dom: 'Bfrtip',
        buttons: [
                'excelHtml5',
            ],
        "ordering": false,
        "pageLength": 20
    });

</script>