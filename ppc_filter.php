<?php 
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php";
    mysqli_query($con_nowprd, "DELETE FROM itxview_memopentingppc WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY");
    mysqli_query($con_nowprd, "DELETE FROM itxview_memopentingppc WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]'"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PPC - Memo Penting</title>
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
                                                document.querySelector("title").innerText=count + " Tabs opened Memo Penting.";
                                            },true);
                                        </script>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Bon Order</h4>
                                                    <input type="text" name="no_order" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['no_order']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Production Demand</h4>
                                                    <input type="text" name="prod_demand" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['prod_demand']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Production Order</h4>
                                                    <input type="text" name="prod_order" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['prod_order']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Dari Tanggal</h4>
                                                    <input type="date" name="tgl1" class="form-control" id="tgl1" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl1']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Sampai Tanggal</h4>
                                                    <input type="date" name="tgl2" class="form-control" id="tgl2" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl2']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary">Cari data</button>
                                                    <a class="btn btn-warning" href="ppc_filter.php">Reset</a>
                                                    <!-- <button type="submit" name="reset" class="btn btn-warning">Reset Data</button> -->
                                                    <?php if (isset($_POST['submit'])) : ?>
                                                        <a class="btn btn-mat btn-success" href="ppc_memopenting-excel.php?no_order=<?= $_POST['no_order']; ?>&tgl1=<?= $_POST['tgl1']; ?>&tgl2=<?= $_POST['tgl2']; ?>">CETAK EXCEL</a>
                                                        <a class="btn btn-mat btn-warning" href="ppc_memopenting-libre.php?no_order=<?= $_POST['no_order']; ?>&tgl1=<?= $_POST['tgl1']; ?>&tgl2=<?= $_POST['tgl2']; ?>">CETAK EXCEL (LIBRE)</a>
                                                    <?php endif; ?>
                                                    <!-- <p>Warning : Jika melakukan<b>Reset Data</b>, pastikan tidak ada yang menggunakan Memo Penting</p> -->
                                                </div>
                                            </div>
                                            <p>*Note : Jika data terasa mulai <b>lambat</b> cobalah untuk klik tombol <b>Reset</b> untuk menghapus semua history pencarian.</p>
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
                                                            <th>TGL BUKA KARTU</th>
                                                            <th>PELANGGAN</th>
                                                            <th>NO. ORDER</th>
                                                            <th>NO. PO</th>
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
                                                            <th>NO DEMAND</th>
                                                            <th>NO KARTU KERJA</th>
                                                            <th>CATATAN PO GREIGE</th>
                                                            <th>TARGET SELESAI</th>
                                                            <th>KETERANGAN</th>
                                                            <th>ORIGINAL PD CODE</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php 
                                                            ini_set("error_reporting", 1);
                                                            session_start();
                                                            require_once "koneksi.php";
                                                            $prod_order  = $_POST['prod_order'];
                                                            $prod_demand = $_POST['prod_demand'];
                                                            $no_order = $_POST['no_order'];
                                                            $tgl1     = $_POST['tgl1'];
                                                            $tgl2     = $_POST['tgl2'];

                                                            if($prod_order){
                                                                $where_prodorder    = "NO_KK  = '$prod_order'";
                                                            }else{
                                                                $where_prodorder    = "";
                                                            }
                                                            if($prod_demand){
                                                                $where_proddemand    = "DEMAND = '$prod_demand'";
                                                            }else{
                                                                $where_proddemand    = "";
                                                            }
                                                            if($no_order){
                                                                $where_order    = "NO_ORDER = '$no_order'";
                                                            }else{
                                                                $where_order    = "";
                                                            }
                                                            if($tgl1 & $tgl2){
                                                                $where_date     = "DELIVERY BETWEEN '$tgl1' AND '$tgl2'";
                                                            }else{
                                                                $where_date     = "";
                                                            }
                                                            // itxview_memopentingppc
                                                            $itxviewmemo              = db2_exec($conn1, "SELECT * FROM itxview_memopentingppc WHERE $where_prodorder $where_proddemand $where_order $where_date");
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
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['KETERANGAN']))."',"
                                                                                        ."'".$_SERVER['REMOTE_ADDR']."',"
                                                                                        ."'".date('Y-m-d H:i:s')."')";
                                                            }
                                                            $value_itxviewmemo        = implode(',', $r_itxviewmemo);
                                                            $insert_itxviewmemo       = mysqli_query($con_nowprd, "INSERT INTO itxview_memopentingppc(ORDERDATE,PELANGGAN,NO_ORDER,NO_PO,KETERANGAN_PRODUCT,WARNA,NO_WARNA,DELIVERY,QTY_BAGIKAIN,NETTO,`DELAY`,NO_KK,DEMAND,ORDERLINE,PROGRESSSTATUS,KETERANGAN,IPADDRESS,CREATEDATETIME) VALUES $value_itxviewmemo");

                                                            // --------------------------------------------------------------------------------------------------------------- //
                                                            $prod_order_2  = $_POST['prod_order'];
                                                            $prod_demand_2 = $_POST['prod_demand'];
                                                            $no_order_2 = $_POST['no_order'];
                                                            $tgl1_2     = $_POST['tgl1'];
                                                            $tgl2_2     = $_POST['tgl2'];

                                                            if($prod_order_2){
                                                                $where_prodorder2    = "NO_KK  = '$prod_order'";
                                                            }else{
                                                                $where_prodorder2    = "";
                                                            }
                                                            if($prod_demand_2){
                                                                $where_proddemand2    = "DEMAND = '$prod_demand'";
                                                            }else{
                                                                $where_proddemand2    = "";
                                                            }
                                                            if($no_order_2){
                                                                $where_order2    = "NO_ORDER = '$no_order_2'";
                                                            }else{
                                                                $where_order2    = "";
                                                            }
                                                            if($tgl1_2 & $tgl2_2){
                                                                $where_date2     = "DELIVERY BETWEEN '$tgl1_2' AND '$tgl2_2'";
                                                            }else{
                                                                $where_date2     = "";
                                                            }
                                                            $sqlDB2 = "SELECT DISTINCT * FROM itxview_memopentingppc WHERE $where_prodorder2 $where_proddemand2 $where_order2 $where_date2 AND IPADDRESS = '$_SERVER[REMOTE_ADDR]' ORDER BY DELIVERY ASC";
                                                            $stmt   = mysqli_query($con_nowprd,$sqlDB2);
                                                            while ($rowdb2 = mysqli_fetch_array($stmt)) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $rowdb2['ORDERDATE']; ?></td> <!-- TGL TERIMA ORDER -->
                                                            <td><?= $rowdb2['PELANGGAN']; ?></td> <!-- PELANGGAN -->
                                                            <td><?= $rowdb2['NO_ORDER']; ?></td> <!-- NO. ORDER -->
                                                            <td><?= $rowdb2['NO_PO']; ?></td> <!-- NO. PO -->
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
                                                            </td> <!-- NETTO KG-->
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
                                                            <td><a target="_BLANK" href="http://10.0.0.10/laporan/ppc_filter_steps.php?demand=<?= $rowdb2['DEMAND']; ?>&prod_order=<?= $rowdb2['NO_KK']; ?>">`<?= $rowdb2['DEMAND']; ?></a></td> <!-- DEMAND -->
                                                            <td>`<?= $rowdb2['NO_KK']; ?></td> <!-- NO KARTU KERJA -->
                                                            <td></td> <!-- CATATAN PO GREIGE -->
                                                            <td></td> <!-- TARGET SELESAI -->
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
                                <?php elseif(isset($_POST['reset'])) : ?>
                                    <?php
                                        ini_set("error_reporting", 1);
                                        session_start();
                                        require_once "koneksi.php";
                                        mysqli_query($con_nowprd, "DELETE FROM itxview_memopentingppc");
                                        header("Location: ppc_filter.php");
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