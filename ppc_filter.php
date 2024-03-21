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
<span class="count" hidden></span>
<script>
    tabCount.onTabChange(function(count){
        document.querySelector(".count").innerText = count;
        document.querySelector("title").innerText=count + " Tabs opened Memo Penting.";
    },true);
</script>
<body>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header" style="background-color: #ffeb3b; padding: 12px; font-family: 'Courier New', monospace;">
                                        <h5>Reminder :</h5><br>
                                        - Jika data terasa mulai <b>lambat</b> cobalah untuk klik tombol <b><i class="icofont icofont-refresh"></i> Reset</b> untuk menghapus semua history pencarian<br>
                                        - Khusus Memo Penting <b>dilarang</b> membuka lebih dari 1 Tab atau 1 Browser<br>
                                        - Pencarian WARNA hanya bisa dikombinasikan.
                                    </div>
                                    <div class="card-header">
                                        <h5>Filter Data</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Bon Order</h4>
                                                    <input type="text" name="no_order" class="form-control" onkeyup="this.value = this.value.toUpperCase()" value="<?php if (isset($_POST['submit'])){ echo $_POST['no_order']; } ?>">
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
                                                <!-- <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 style="font-size: 12px;" class="sub-title">DEPARTEMENT</h4>
                                                    <?php
                                                        require_once "koneksi.php";
                                                        $q_operation    = db2_exec($conn1, "SELECT DISTINCT OPERATIONGROUPCODE FROM OPERATION WHERE NOT OPERATIONGROUPCODE IS NULL ORDER BY OPERATIONGROUPCODE ASC");
                                                    ?>
                                                    <select class="form-control input-xl" name="operation">
                                                        <option selected value="">-</option>
                                                        <?php while ($d_operation = db2_fetch_assoc($q_operation)) { ?>
                                                            <option value="<?= $d_operation['OPERATIONGROUPCODE']; ?>" 
                                                            <?php 
                                                                if(isset($_POST['submit'])){ 
                                                                    if($d_operation['OPERATIONGROUPCODE'] == $_POST['operation']){ echo "SELECTED"; }
                                                                } 
                                                            ?>><?= $d_operation['OPERATIONGROUPCODE']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div> -->
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Nomor PO</h4>
                                                    <input type="text" name="no_po" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['no_po']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-1 m-b-30">
                                                    <h4 style="font-size: 12px;" class="sub-title">Article Group</h4>
                                                    <input type="text" name="article_group" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['article_group']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-1 m-b-30">
                                                    <h4 style="font-size: 12px;" class="sub-title">Article Code</h4>
                                                    <input type="text" name="article_code" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['article_code']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Nama Warna</h4>
                                                    <input type="text" name="nama_warna" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['nama_warna']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-12 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary"><i class="icofont icofont-search-alt-1"></i> Cari data</button>
                                                    <a class="btn btn-warning" href="ppc_filter.php"><i class="icofont icofont-refresh"></i> Reset</a>
                                                    <!-- <button type="submit" name="<i class="icofont icofont-refresh"></i> Reset" class="btn btn-warning"><i class="icofont icofont-refresh"></i> Reset Data</button> -->
                                                    <?php if (isset($_POST['submit'])) : ?>
                                                        <a class="btn btn-mat btn-success" href="ppc_memopenting-excel.php?no_order=<?= $_POST['no_order']; ?>&tgl1=<?= $_POST['tgl1']; ?>&tgl2=<?= $_POST['tgl2']; ?>&operation=<?= $_POST['operation']; ?>">CETAK EXCEL</a>
                                                        <a class="btn btn-mat btn-warning" href="ppc_memopenting-libre.php?no_order=<?= $_POST['no_order']; ?>&tgl1=<?= $_POST['tgl1']; ?>&tgl2=<?= $_POST['tgl2']; ?>&operation=<?= $_POST['operation']; ?>">CETAK EXCEL (LIBRE)</a>
                                                        <a class="btn btn-mat btn-danger" href="ppc_memopenting-excel_qc.php?no_order=<?= $_POST['no_order']; ?>&tgl1=<?= $_POST['tgl1']; ?>&tgl2=<?= $_POST['tgl2']; ?>&operation=<?= $_POST['operation']; ?>">CETAK EXCEL (QC)</a>
                                                    <?php endif; ?>
                                                    <!-- <p>Warning : Jika melakukan<b><i class="icofont icofont-refresh"></i> Reset Data</b>, pastikan tidak ada yang menggunakan Memo Penting</p> -->
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
                                                            <th title="Sumber data: &#013; 1. Production Order &#013; 2. Reservation &#013; 3. KFF/KGF User Primary Quantity">QTY SALINAN</th>
                                                            <th title="Sumber data: &#013; 1. Production Demand &#013; 2. Bagian group Entered quantity &#013; 3. User Primary Quantity">QTY PACKING</th>
                                                            <th>NETTO(kg)</th>
                                                            <th>NETTO(yd)</th>
                                                            <th>DELAY</th>
                                                            <th>KODE DEPT</th>
                                                            <th>STATUS TERAKHIR</th>
                                                            <th>NOMOR MESIN SCHEDULE</th>
                                                            <th>NOMOR URUT SCHEDULE</th>
                                                            <th>DELAY PROGRESS STATUS</th>
                                                            <th>PROGRESS STATUS</th>
                                                            <th>TOTAL HARI</th>
                                                            <th>LOT</th>
                                                            <th>NO DEMAND</th>
                                                            <th>NO KARTU KERJA</th>
                                                            <th>ORIGINAL PD CODE</th>
                                                            <th>CATATAN PO GREIGE</th>
                                                            <th>TARGET SELESAI</th>
                                                            <th>KETERANGAN</th>
                                                            <?php if($_SERVER['REMOTE_ADDR'] == '10.0.5.132') : ?>
                                                            <th>Only Nilo</th>
                                                            <?php endif; ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php 
                                                            ini_set("error_reporting", 0);
                                                            session_start();
                                                            require_once "koneksi.php";
                                                            $prod_order     = $_POST['prod_order'];
                                                            $prod_demand    = $_POST['prod_demand'];
                                                            $no_order       = $_POST['no_order'];
                                                            $tgl1           = $_POST['tgl1'];
                                                            $tgl2           = $_POST['tgl2'];
                                                            $no_po          = $_POST['no_po'];
                                                            $article_group  = $_POST['article_group'];
                                                            $article_code   = $_POST['article_code'];
                                                            $nama_warna     = $_POST['nama_warna'];

                                                            if($nama_warna){
                                                                $where_nama_warna   = "AND WARNA LIKE '%$nama_warna%'";
                                                            }else{
                                                                $where_nama_warna   = "";
                                                            }
                                                            if($prod_order){
                                                                $where_prodorder        = "NO_KK  = '$prod_order'";
                                                            }else{
                                                                $where_prodorder        = "";
                                                            }
                                                            if($prod_demand){
                                                                $where_proddemand       = "DEMAND = '$prod_demand'";
                                                            }else{
                                                                $where_proddemand       = "";
                                                            }
                                                            if($no_order){
                                                                $where_order            = "NO_ORDER = '$no_order'";
                                                            }else{
                                                                $where_order            = "";
                                                            }
                                                            if($tgl1 & $tgl2){
                                                                $where_date             = "DELIVERY BETWEEN '$tgl1' AND '$tgl2'";
                                                            }else{
                                                                $where_date             = "";
                                                            }
                                                            if($no_po){
                                                                $where_no_po            = "NO_PO = '$no_po'";
                                                            }else{
                                                                $where_no_po            = "";
                                                            }
                                                            if($article_group & $article_code){
                                                                $where_article          = "SUBCODE02 = '$article_group' AND SUBCODE03 = '$article_code'";
                                                            }else{
                                                                $where_article          = "";
                                                            }

                                                            // ITXVIEW_MEMOPENTINGPPC
                                                            $itxviewmemo              = db2_exec($conn1, "SELECT * FROM ITXVIEW_MEMOPENTINGPPC WHERE $where_prodorder $where_proddemand $where_order $where_date $where_no_po $where_article $where_nama_warna");
                                                            while ($row_itxviewmemo   = db2_fetch_assoc($itxviewmemo)) {
                                                                $r_itxviewmemo[]      = "('".TRIM(addslashes($row_itxviewmemo['ORDERDATE']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['PELANGGAN']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_ORDER']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_PO']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['SUBCODE02']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['SUBCODE03']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['KETERANGAN_PRODUCT']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['WARNA']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_WARNA']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['DELIVERY']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['QTY_BAGIKAIN']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NETTO']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['DELAY']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_KK']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['DEMAND']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['LOT']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['ORDERLINE']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['PROGRESSSTATUS']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['PROGRESSSTATUS_DEMAND']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['KETERANGAN']))."',"
                                                                                        ."'".$_SERVER['REMOTE_ADDR']."',"
                                                                                        ."'".date('Y-m-d H:i:s')."',"
                                                                                        ."'".'MEMO'."')";

                                                            }
                                                            $value_itxviewmemo        = implode(',', $r_itxviewmemo);
                                                            $insert_itxviewmemo       = mysqli_query($con_nowprd, "INSERT INTO itxview_memopentingppc(ORDERDATE,PELANGGAN,NO_ORDER,NO_PO,ARTICLE_GROUP,ARTICLE_CODE,KETERANGAN_PRODUCT,WARNA,NO_WARNA,DELIVERY,QTY_BAGIKAIN,NETTO,`DELAY`,NO_KK,DEMAND,LOT,ORDERLINE,PROGRESSSTATUS,PROGRESSSTATUS_DEMAND,KETERANGAN,IPADDRESS,CREATEDATETIME,ACCESS_TO) VALUES $value_itxviewmemo");
                                                            
                                                            // --------------------------------------------------------------------------------------------------------------- //
                                                            $prod_order_2   = $_POST['prod_order'];
                                                            $prod_demand_2  = $_POST['prod_demand'];
                                                            $no_order_2     = $_POST['no_order'];
                                                            $tgl1_2         = $_POST['tgl1'];
                                                            $tgl2_2         = $_POST['tgl2'];
                                                            $no_po2         = $_POST['no_po'];
                                                            $article_group2 = $_POST['article_group'];
                                                            $article_code2  = $_POST['article_code'];

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
                                                            if($no_po2){
                                                                $where_no_po2            = "NO_PO = '$no_po'";
                                                            }else{
                                                                $where_no_po2            = "";
                                                            }
                                                            if($article_group2 & $article_code2){
                                                                $where_article2          = "ARTICLE_GROUP = '$article_group2' AND ARTICLE_CODE = '$article_code2'";
                                                            }else{
                                                                $where_article2          = "";
                                                            }
                                                            $sqlDB2 = "SELECT DISTINCT * FROM itxview_memopentingppc WHERE $where_prodorder2 $where_proddemand2 $where_order2 $where_date2 $where_no_po2 $where_article2 AND ACCESS_TO = 'MEMO' AND IPADDRESS = '$_SERVER[REMOTE_ADDR]' ORDER BY DELIVERY ASC";
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
                                                                                                                    -- CASE
                                                                                                                    --     WHEN TRIM(p.STEPTYPE) = '0' THEN p.GROUPSTEPNUMBER
                                                                                                                    --     WHEN TRIM(p.STEPTYPE) = '3' THEN p2.STEPNUMBER 
                                                                                                                    --     ELSE p.GROUPSTEPNUMBER
                                                                                                                    -- END AS GROUPSTEPNUMBER,
                                                                                                                    TRIM(p.GROUPSTEPNUMBER) AS GROUPSTEPNUMBER,
                                                                                                                    TRIM(p.PROGRESSSTATUS) AS PROGRESSSTATUS
                                                                                                                FROM 
                                                                                                                    VIEWPRODUCTIONDEMANDSTEP p
                                                                                                                -- LEFT JOIN PRODUCTIONDEMANDSTEP p2 ON p2.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND p2.STEPTYPE = p.STEPTYPE AND p2.OPERATIONCODE = p.OPERATIONCODE 
                                                                                                                WHERE
                                                                                                                    p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND
                                                                                                                    (p.PROGRESSSTATUS = '3' OR p.PROGRESSSTATUS = '2') ORDER BY p.GROUPSTEPNUMBER DESC LIMIT 1");
                                                                    $row_status_close = db2_fetch_assoc($q_deteksi_status_close);

                                                                    // UNTUK DELAY PROGRESS STATUS PERMINTAAN MS. AMY
                                                                        if($row_status_close['PROGRESSSTATUS'] == '2'){ // KALAU PROGRESS STATUSNYA ENTERED
                                                                            $q_delay_progress_selesai   = db2_exec($conn1, "SELECT 
                                                                                                                                p.PRODUCTIONORDERCODE AS PRODUCTIONORDERCODE, 
                                                                                                                                CASE
                                                                                                                                    WHEN TRIM(p.STEPTYPE) = '0' THEN p.GROUPSTEPNUMBER
                                                                                                                                    WHEN TRIM(p.STEPTYPE) = '3' THEN p2.STEPNUMBER 
                                                                                                                                    ELSE p.GROUPSTEPNUMBER
                                                                                                                                END AS GROUPSTEPNUMBER,
                                                                                                                                iptip.MULAI,
                                                                                                                                DAYS(CURRENT DATE) - DAYS(iptip.MULAI) AS DELAY_PROGRESSSTATUS,
                                                                                                                                p.PROGRESSSTATUS AS PROGRESSSTATUS
                                                                                                                            FROM 
                                                                                                                                PRODUCTIONDEMANDSTEP p
                                                                                                                            LEFT JOIN PRODUCTIONDEMANDSTEP p2 ON p2.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND p2.STEPTYPE = p.STEPTYPE AND p2.OPERATIONCODE = p.OPERATIONCODE 
                                                                                                                            LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                                                            WHERE
                                                                                                                                p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND p.PROGRESSSTATUS = '2' ORDER BY p.GROUPSTEPNUMBER DESC LIMIT 1");
                                                                            $d_delay_progress_selesai   = db2_fetch_assoc($q_delay_progress_selesai);
                                                                            $jam_status_terakhir        = $d_delay_progress_selesai['MULAI'];
                                                                            $delay_progress_status      = $d_delay_progress_selesai['DELAY_PROGRESSSTATUS'].' Hari';
                                                                        }elseif($row_status_close['PROGRESSSTATUS'] == '3'){ // KALAU PROGRESS STATUSNYA PROGRESS
                                                                            $q_delay_progress_mulai   = db2_exec($conn1, "SELECT 
                                                                                                                                p.PRODUCTIONORDERCODE AS PRODUCTIONORDERCODE, 
                                                                                                                                CASE
                                                                                                                                    WHEN TRIM(p.STEPTYPE) = '0' THEN p.GROUPSTEPNUMBER
                                                                                                                                    WHEN TRIM(p.STEPTYPE) = '3' THEN p2.STEPNUMBER 
                                                                                                                                    ELSE p.GROUPSTEPNUMBER
                                                                                                                                END AS GROUPSTEPNUMBER,
                                                                                                                                COALESCE(iptop.SELESAI, SUBSTRING(p2.LASTUPDATEDATETIME, 1, 19)) AS SELESAI,
                                                                                                                                DAYS(CURRENT DATE) - COALESCE(DAYS(iptop.SELESAI), DAYS(p2.LASTUPDATEDATETIME)) AS DELAY_PROGRESSSTATUS,
                                                                                                                                p.PROGRESSSTATUS AS PROGRESSSTATUS
                                                                                                                            FROM 
                                                                                                                                VIEWPRODUCTIONDEMANDSTEP p
                                                                                                                            LEFT JOIN PRODUCTIONDEMANDSTEP p2 ON p2.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND p2.STEPTYPE = p.STEPTYPE AND p2.OPERATIONCODE = p.OPERATIONCODE
                                                                                                                            LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE 
                                                                                                                                                                                AND iptop.DEMANDSTEPSTEPNUMBER = 
                                                                                                                                                                                    CASE
                                                                                                                                                                                        WHEN TRIM(p.STEPTYPE) = '0' THEN p.GROUPSTEPNUMBER
                                                                                                                                                                                        WHEN TRIM(p.STEPTYPE) = '3' THEN p2.STEPNUMBER 
                                                                                                                                                                                        ELSE p.GROUPSTEPNUMBER
                                                                                                                                                                                    END
                                                                                                                            WHERE
                                                                                                                                p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND p.PROGRESSSTATUS = '3' 
                                                                                                                                AND (NOT iptop.SELESAI IS NULL OR NOT p2.LASTUPDATEDATETIME IS NULL)
                                                                                                                            ORDER BY 
                                                                                                                                CASE
                                                                                                                                    WHEN TRIM(p.STEPTYPE) = '0' THEN p.GROUPSTEPNUMBER 
                                                                                                                                    WHEN TRIM(p.STEPTYPE) = '3' THEN p2.STEPNUMBER 
                                                                                                                                    ELSE p.GROUPSTEPNUMBER
                                                                                                                                END DESC 
                                                                                                                            LIMIT 1");
                                                                            $d_delay_progress_mulai   = db2_fetch_assoc($q_delay_progress_mulai);
                                                                            $jam_status_terakhir      = $d_delay_progress_mulai['SELESAI'];
                                                                            $delay_progress_status    = $d_delay_progress_mulai['DELAY_PROGRESSSTATUS'].' Hari';
                                                                        }else{
                                                                            $jam_status_terakhir      = '';
                                                                            $delay_progress_status    = '';
                                                                        }
                                                                    // UNTUK DELAY PROGRESS STATUS PERMINTAAN MS. AMY

                                                                    if(!empty($row_status_close['GROUPSTEPNUMBER'])){
                                                                        $groupstepnumber    = $row_status_close['GROUPSTEPNUMBER'];
                                                                    }else{
                                                                        $groupstepnumber    = '0';
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
                                                                                                                            TRIM(o.OPERATIONGROUPCODE) AS OPERATIONGROUPCODE,
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
                                                                                $kode_dept          = $d_not_cnp_close['OPERATIONGROUPCODE'];
                                                                                $status_terakhir    = $d_not_cnp_close['LONGDESCRIPTION'];
                                                                                $status_operation   = $d_not_cnp_close['STATUS_OPERATION'];
                                                                            }else{
                                                                                $status = 'H';
                                                                                $groupstep_option       = "= '$groupstepnumber'";
                                                                                $q_not_cnp1             = db2_exec($conn1, "SELECT 
                                                                                                                            GROUPSTEPNUMBER,
                                                                                                                            TRIM(OPERATIONCODE) AS OPERATIONCODE,
                                                                                                                            TRIM(o.OPERATIONGROUPCODE) AS OPERATIONGROUPCODE,
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
                                                                                
                                                                                $kode_dept          = $d_not_cnp_close['OPERATIONGROUPCODE'];
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
                                                                                                                    TRIM(o.OPERATIONGROUPCODE) AS OPERATIONGROUPCODE,
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
                                                                                                                    VIEWPRODUCTIONDEMANDSTEP p
                                                                                                                LEFT JOIN WORKCENTER wc ON wc.CODE = p.WORKCENTERCODE
                                                                                                                LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE
                                                                                                                WHERE 
                                                                                                                    p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND
                                                                                                                    (p.PROGRESSSTATUS = '0' OR p.PROGRESSSTATUS = '1' OR p.PROGRESSSTATUS ='2') 
                                                                                                                    AND p.GROUPSTEPNUMBER $groupstep_option
                                                                                                                ORDER BY p.GROUPSTEPNUMBER ASC LIMIT 1");
                                                                        $d_StatusTerakhir   = db2_fetch_assoc($q_StatusTerakhir);
                                                                        $kode_dept          = $d_StatusTerakhir['OPERATIONGROUPCODE'];
                                                                        $status_terakhir    = $d_StatusTerakhir['LONGDESCRIPTION'];
                                                                        $status_operation   = $d_StatusTerakhir['STATUS_OPERATION'];
                                                                    }
                                                                }
                                                            }
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
                                                            <td><?= number_format($rowdb2['NETTO'],0); ?></td> <!-- NETTO KG-->
                                                            <td>
                                                                <?php 
                                                                    $sql_netto_yd = db2_exec($conn1, "SELECT * FROM ITXVIEW_NETTO WHERE CODE = '$rowdb2[DEMAND]'");
                                                                    $d_netto_yd = db2_fetch_assoc($sql_netto_yd);
                                                                    echo number_format($d_netto_yd['BASESECONDARYQUANTITY'],0);
                                                                ?>
                                                            </td> <!-- NETTO YD-->
                                                            <td><?= $rowdb2['DELAY']; ?></td> <!-- DELAY -->
                                                            <td><?= $kode_dept; ?></td> <!-- KODE DEPT -->
                                                            <td>
                                                                <?= $status_terakhir; ?> 
                                                                <?php if($status_operation != 'KK Oke') : ?> 
                                                                    (<?= $jam_status_terakhir; ?>) 
                                                                <?php endif; ?>
                                                            </td> <!-- STATUS TERAKHIR -->
                                                            <td>
                                                                <?php
                                                                    if($kode_dept == 'DYE'){
                                                                        $q_schedule_dye     = mysqli_query($con_db_dyeing, "SELECT * FROM `tbl_schedule` WHERE nokk = '$rowdb2[NO_KK]'  AND NOT `status` = 'selesai'");
                                                                        $data_schedule_dye  = mysqli_fetch_assoc($q_schedule_dye);
                                                                    }elseif($kode_dept == 'FIN'){
                                                                        $schedule_fin       = mysqli_query($con_db_finishing, "SELECT * FROM `tbl_schedule` WHERE nokk = '$rowdb2[NO_KK]' AND NOT catatan = 'data diinput dari finishing' ORDER BY id DESC LIMIT 1");
                                                                        $data_schedule_fin  = mysqli_fetch_assoc($schedule_fin);
                                                                    }
                                                                ?>
                                                                <?= $data_schedule_dye['no_mesin']; ?>
                                                                <?= $data_schedule_fin['no_mesin']; ?>
                                                            </td> <!-- NOMOR MESIN SCHEDULE -->
                                                            <td><?= $data_schedule_dye['no_urut']; ?><?= $data_schedule_fin['no_urut']; ?></td> <!-- NOMOR URUT SCHEDULE -->
                                                            <td>
                                                                <?php if($status_operation != 'KK Oke') : ?>
                                                                    <?= $delay_progress_status; ?>
                                                                <?php endif; ?>
                                                            </td> <!-- DELAY PROGRESS STATUS -->
                                                            <td><?= $status_operation; ?></td> <!-- PROGRESS STATUS -->
                                                            <td>
                                                                <?php
                                                                    if(!empty($d_tglbagikain['TRANSACTIONDATE'])){
                                                                        $tgl_bagikain   = date_create(substr($d_tglbagikain['TRANSACTIONDATE'], 0, 10));
                                                                        $tglsekarang    = date_create(date('Y-m-d H:i:s'));
                                                                        $diff_totalharibagikain = date_diff($tgl_bagikain, $tglsekarang);

                                                                        // echo $diff_totalharibagikain->m. ' Bulan, '.$diff_totalharibagikain->d. ' Hari';
                                                                        echo $diff_totalharibagikain->days. ' Hari';
                                                                    }else{
                                                                        $tgl_buka_kartu   = date_create(substr($rowdb2['ORDERDATE'], 0, 10));
                                                                        $tglsekarang    = date_create(date('Y-m-d H:i:s'));
                                                                        $diff_totalharibagikain = date_diff($tgl_buka_kartu, $tglsekarang);

                                                                        // echo $diff_totalharibagikain->m. ' Bulan, '.$diff_totalharibagikain->d. ' Hari';
                                                                        echo $diff_totalharibagikain->days. ' Hari';
                                                                    }
                                                                ?>
                                                            </td> <!-- TOTAL HARI BAGI KAIN -->
                                                            <td><?= $rowdb2['LOT']; ?></td> <!-- LOT -->
                                                            <td><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?= $rowdb2['DEMAND']; ?>&prod_order=<?= $rowdb2['NO_KK']; ?>">`<?= $rowdb2['DEMAND']; ?></a></td> <!-- DEMAND -->
                                                            <td>`<?= $rowdb2['NO_KK']; ?></td> <!-- NO KARTU KERJA -->
                                                            <td><?= $d_orig_pd_code['ORIGINALPDCODE']; ?></td> <!-- ORIGINAL PD CODE -->
                                                            <td>
                                                                <?php
                                                                    $sql_benang_booking_new		= db2_exec($conn1, "SELECT * FROM ITXVIEW_BOOKING_NEW WHERE SALESORDERCODE = '$rowdb2[NO_ORDER]'
                                                                                                                                            AND ORDERLINE = '$rowdb2[ORDERLINE]'");
                                                                    $r_benang_booking_new		= db2_fetch_assoc($sql_benang_booking_new);
                                                                    $d_benang_booking_new		= $r_benang_booking_new['SALESORDERCODE'];

                                                                ?>
                                                                <?php
                                                                    $sql_benang_rajut		= db2_exec($conn1, "SELECT
                                                                                                                    *
                                                                                                                FROM
                                                                                                                    ITXVIEW_RAJUT
                                                                                                                WHERE
                                                                                                                    (ITEMTYPEAFICODE ='KGF' OR ITEMTYPEAFICODE ='FKG')
                                                                                                                    AND TRIM(SUBCODE01) = '$d_qtysalinan[SUBCODE01]'
                                                                                                                    AND TRIM(SUBCODE02) = '$d_qtysalinan[SUBCODE02]'
                                                                                                                    AND TRIM(SUBCODE03) = '$d_qtysalinan[SUBCODE03]'
                                                                                                                    AND TRIM(SUBCODE04) = '$d_qtysalinan[SUBCODE04]'
                                                                                                                    AND TRIM(ORIGDLVSALORDLINESALORDERCODE) = '$rowdb2[NO_ORDER]'");
                                                                    $r_benang_rajut		= db2_fetch_assoc($sql_benang_rajut);
                                                                    $d_benang_rajut		= $r_benang_rajut['CODE'];
                                                                ?>
                                                                <!-- <a href="http://online.indotaichen.com/laporan/ppc_catatan_po_greige.php?" target="_blank">Detail</a> -->
                                                                <?php if($d_benang_booking_new){ echo $d_benang_booking_new.'. Greige Ready'; } ?>
                                                                <?php if($d_benang_rajut){ echo $d_benang_rajut.'. Rajut'; } ?>
                                                            </td> <!-- CATATAN PO GREIGE -->
                                                            <td></td> <!-- TARGET SELESAI -->
                                                            <td><?= $rowdb2['KETERANGAN']; ?></td> <!-- KETERANGAN -->
                                                            <?php if($_SERVER['REMOTE_ADDR'] == '10.0.5.132') : ?>
                                                            <td>
                                                                <?= $groupstep_option; ?>
                                                                <?= $status; ?>
                                                            </td>
                                                            <?php endif; ?>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif(isset($_POST['<i class="icofont icofont-refresh"></i> Reset'])) : ?>
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