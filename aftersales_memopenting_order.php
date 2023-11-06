<?php 
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php";
    mysqli_query($con_nowprd, "DELETE FROM itxview_memopentingppc_aftersales WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY");
    mysqli_query($con_nowprd, "DELETE FROM itxview_memopentingppc_aftersales WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]'"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>AFTER SALES - MEMO PENTING ORDER REPLACEMENT DAN RETUR</title>
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
    <link rel="stylesheet" href="files\bower_components\select2\css\select2.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\prism\prism.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\pcoded-horizontal.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="files\bower_components\bootstrap-multiselect\css\bootstrap-multiselect.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\multiselect\css\multi-select.css">
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
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 style="font-size: 12px;" class="sub-title">Status Terakhir</h4>
                                                    <?php
                                                        require_once "koneksi.php";
                                                        $q_operation    = db2_exec($conn1, "SELECT * FROM OPERATION WHERE NOT LONGDESCRIPTION LIKE '%DO NOT USE%' ORDER BY CODE ASC");
                                                    ?>
                                                    <select class="form-control input-sm" name="operation">
                                                        <option selected value="">-</option>
                                                        <?php while ($d_operation = db2_fetch_assoc($q_operation)) { ?>
                                                            <option value="<?= $d_operation['CODE']; ?>" 
                                                            <?php 
                                                                if(isset($_POST['submit'])){ 
                                                                    if($d_operation['CODE'] == $_POST['operation']){ echo "SELECTED"; }
                                                                } 
                                                            ?>><?= $d_operation['CODE'].'- '.$d_operation['LONGDESCRIPTION']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 style="font-size: 12px;" class="sub-title">Nomor PO</h4>
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
                                                <!-- <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">LANGGANAN</h4>
                                                    <?php
                                                        require_once "koneksi.php";
                                                        $q_langganan    = db2_exec($conn1, "SELECT DISTINCT 
                                                                                                    ORDPRNCUSTOMERSUPPLIERCODE,
                                                                                                    LANGGANAN 
                                                                                                FROM
                                                                                                    ITXVIEW_PELANGGAN
                                                                                                ORDER BY 
                                                                                                    ORDPRNCUSTOMERSUPPLIERCODE ASC");
                                                    ?>
                                                    <select class="js-example-basic-single input-xl" name="langganan">
                                                        <option disabled selected value="">-</option>
                                                        <?php while ($d_langganan = db2_fetch_assoc($q_langganan)) { ?>
                                                            <option value="<?= $d_langganan['ORDPRNCUSTOMERSUPPLIERCODE']; ?>" 
                                                            <?php 
                                                                if(isset($_POST['submit'])){ 
                                                                    if($d_langganan['ORDPRNCUSTOMERSUPPLIERCODE'] == $_POST['langganan']){ echo "SELECTED"; }
                                                                } 
                                                            ?>><?= $d_langganan['ORDPRNCUSTOMERSUPPLIERCODE'].'- '.$d_langganan['LANGGANAN']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">WARNA</h4>
                                                    <?php
                                                        require_once "koneksi.php";
                                                        $q_warna    = db2_exec($conn1, "SELECT  
                                                                                            ITEMTYPECODE,
                                                                                            TRIM(SUBCODE01) || '-' || TRIM(SUBCODE02) || '-' || TRIM(SUBCODE03) || '-' || TRIM(SUBCODE04) || '-' ||
                                                                                            TRIM(SUBCODE05) || '-' || TRIM(SUBCODE06) || '-' || TRIM(SUBCODE07) || '-' || TRIM(SUBCODE08) AS KODE_WARNA,
                                                                                            WARNA 
                                                                                        FROM
                                                                                            ITXVIEWCOLOR
                                                                                        GROUP BY
                                                                                            ITEMTYPECODE,
                                                                                            SUBCODE01,SUBCODE02,SUBCODE03,SUBCODE04,SUBCODE05,SUBCODE06,SUBCODE07,SUBCODE08,SUBCODE09,SUBCODE10,
                                                                                            WARNA");
                                                    ?>
                                                    <select class="js-example-basic-single input-xl" name="warna">
                                                        <option disabled selected value="">-</option>
                                                        <?php while ($d_warna = db2_fetch_assoc($q_warna)) { ?>
                                                            <option value="<?= $d_warna['KODE_WARNA']; ?>" 
                                                            <?php 
                                                                if(isset($_POST['submit'])){ 
                                                                    if($d_warna['KODE_WARNA'] == $_POST['warna']){ echo "SELECTED"; }
                                                                } 
                                                            ?>><?= $d_warna['KODE_WARNA']; ?> - <b><?= $d_warna['WARNA']; ?></b></option>
                                                        <?php } ?>
                                                    </select>
                                                </div> -->
                                                <div class="col-sm-12 col-xl-12 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary">Cari data</button>
                                                    <a class="btn btn-warning" href="aftersales_memopenting_order.php">Reset</a>
                                                    <!-- <button type="submit" name="reset" class="btn btn-warning">Reset Data</button> -->
                                                    <?php if (isset($_POST['submit'])) : ?>
                                                        <a class="btn btn-mat btn-success" title="Keseluruhan muncul" href="aftersales_memopenting-excel-all.php?no_order=<?= $_POST['no_order']; ?>&tgl1=<?= $_POST['tgl1']; ?>&tgl2=<?= $_POST['tgl2']; ?>&operation=<?= $_POST['operation']; ?>">CETAK EXCEL</a>
                                                        <a class="btn btn-mat btn-warning" title="Untuk statusnya belum kirim" href="aftersales_memopenting-excel.php?no_order=<?= $_POST['no_order']; ?>&tgl1=<?= $_POST['tgl1']; ?>&tgl2=<?= $_POST['tgl2']; ?>&operation=<?= $_POST['operation']; ?>">MEMO PENTING</a>
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
                                                            <th title="Sumber data: &#013; 1. Production Order &#013; 2. Reservation &#013; 3. KFF/KGF User Primary Quantity">QTY SALINAN</th>
                                                            <th title="Sumber data: &#013; 1. Production Demand &#013; 2. Bagian group Entered quantity &#013; 3. User Primary Quantity">QTY PACKING</th>
                                                            <th>NETTO(kg)</th>
                                                            <th>NETTO(yd)</th>
                                                            <th>DELAY</th>
                                                            <th>KODE DEPT</th>
                                                            <th>STATUS TERAKHIR</th>
                                                            <th>DELAY PROGRESS STATUS</th>
                                                            <th>PROGRESS STATUS</th>
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
                                                            ini_set("error_reporting", 1);
                                                            session_start();
                                                            require_once "koneksi.php";
                                                            $prod_order     = $_POST['prod_order'];
                                                            $prod_demand    = $_POST['prod_demand'];
                                                            $no_order       = $_POST['no_order'];
                                                            $tgl1           = $_POST['tgl1'];
                                                            $tgl2           = $_POST['tgl2'];
                                                            $operation      = $_POST['operation'];
                                                            $no_po          = $_POST['no_po'];
                                                            $article_group  = $_POST['article_group'];
                                                            $article_code   = $_POST['article_code'];
                                                            $langganan      = $_POST['langganan'];
                                                            $warna          = $_POST['warna'];

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
                                                            if(strlen($no_order) == 3){
                                                                $where_order            = "SUBSTR(NO_ORDER, 1,3) = '$no_order'";
                                                            }elseif(strlen($no_order) > 3){
                                                                $where_order            = "NO_ORDER = '$no_order'";
                                                            }else{
                                                                $where_order            = "";
                                                            }
                                                            if($tgl1 & $tgl2){
                                                                $where_date             = "DELIVERY BETWEEN '$tgl1' AND '$tgl2' AND (SUBSTR(NO_ORDER, 1,3) = 'RFD' OR SUBSTR(NO_ORDER, 1,3) = 'RFE' OR SUBSTR(NO_ORDER, 1,3) = 'RPE' OR SUBSTR(NO_ORDER, 1,3) = 'REP')";
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
                                                            if($langganan){
                                                                $where_langganan            = "ORDPRNCUSTOMERSUPPLIERCODE = '$langganan'";
                                                            }else{
                                                                $where_langganan            = "";
                                                            }
                                                            if($warna){
                                                                $where_warna            = "WARNA = '$warna'";
                                                            }else{
                                                                $where_warna            = "";
                                                            }

                                                            if($operation){
                                                                // ITXVIEW_MEMOPENTINGPPC_WITHOPERATIONS
                                                                $itxviewmemo              = db2_exec($conn1, "SELECT * FROM ITXVIEW_MEMOPENTINGPPC_WITHOPERATIONS WHERE OPERATIONCODE = '$operation' AND NOT PROGRESSSTATUS = '6'");
                                                                while ($row_itxviewmemo   = db2_fetch_assoc($itxviewmemo)) {
                                                                    $r_itxviewmemo[]      = "('".TRIM(addslashes($row_itxviewmemo['OPERATIONCODE']))."',"
                                                                                            ."'".TRIM(addslashes($row_itxviewmemo['ORDERDATE']))."',"
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
                                                                                            ."'".TRIM(addslashes($row_itxviewmemo['PROGRESSSTATUS_DEMAND']))."',"
                                                                                            ."'".TRIM(addslashes($row_itxviewmemo['KETERANGAN']))."',"
                                                                                            ."'".$_SERVER['REMOTE_ADDR']."',"
                                                                                            ."'".date('Y-m-d H:i:s')."',"
                                                                                            ."'".'MEMO W OPR'."')";

                                                                }
                                                                $value_itxviewmemo        = implode(',', $r_itxviewmemo);
                                                                $insert_itxviewmemo       = mysqli_query($con_nowprd, "INSERT INTO itxview_memopentingppc_aftersales(OPERATIONCODE,ORDERDATE,PELANGGAN,NO_ORDER,NO_PO,KETERANGAN_PRODUCT,WARNA,NO_WARNA,DELIVERY,QTY_BAGIKAIN,NETTO,`DELAY`,NO_KK,DEMAND,ORDERLINE,PROGRESSSTATUS,PROGRESSSTATUS_DEMAND,KETERANGAN,IPADDRESS,CREATEDATETIME,ACCESS_TO) VALUES $value_itxviewmemo");
                                                                
                                                            }else{
                                                                // ITXVIEW_MEMOPENTINGPPC
                                                                $itxviewmemo              = db2_exec($conn1, "SELECT * FROM ITXVIEW_MEMOPENTINGPPC WHERE $where_prodorder $where_proddemand $where_order $where_date $where_no_po $where_article $where_langganan $where_warna");
                                                                while ($row_itxviewmemo   = db2_fetch_assoc($itxviewmemo)) {
                                                                    $r_itxviewmemo[]      = "('".TRIM(addslashes($row_itxviewmemo['ORDERDATE']))."',"
                                                                                            ."'".TRIM(addslashes($row_itxviewmemo['ORDPRNCUSTOMERSUPPLIERCODE']))."',"
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
                                                                                            ."'".'MEMO AFTERSALES'."')";
                                                                }
                                                                $value_itxviewmemo        = implode(',', $r_itxviewmemo);
                                                                $insert_itxviewmemo       = mysqli_query($con_nowprd, "INSERT INTO itxview_memopentingppc_aftersales(ORDERDATE,ORDPRNCUSTOMERSUPPLIERCODE,PELANGGAN,NO_ORDER,NO_PO,ARTICLE_GROUP,ARTICLE_CODE,KETERANGAN_PRODUCT,WARNA,NO_WARNA,DELIVERY,QTY_BAGIKAIN,NETTO,`DELAY`,NO_KK,DEMAND,LOT,ORDERLINE,PROGRESSSTATUS,PROGRESSSTATUS_DEMAND,KETERANGAN,IPADDRESS,CREATEDATETIME,ACCESS_TO) VALUES $value_itxviewmemo");
                                                            }
                                                            
                                                            // --------------------------------------------------------------------------------------------------------------- //
                                                            $prod_order_2   = $_POST['prod_order'];
                                                            $prod_demand_2  = $_POST['prod_demand'];
                                                            $no_order_2     = $_POST['no_order'];
                                                            $tgl1_2         = $_POST['tgl1'];
                                                            $tgl2_2         = $_POST['tgl2'];
                                                            $operation_2    = $_POST['operation'];
                                                            $no_po2         = $_POST['no_po'];
                                                            $article_group2 = $_POST['article_group'];
                                                            $article_code2  = $_POST['article_code'];
                                                            $langganan_2    = $_POST['langganan'];
                                                            $warna_2        = $_POST['warna'];

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

                                                            if(strlen($no_order_2) == 3){
                                                                $where_order2            = "SUBSTR(NO_ORDER, 1,3) = '$no_order_2'";
                                                            }elseif(strlen($no_order_2) > 3){
                                                                $where_order2            = "NO_ORDER = '$no_order_2'";
                                                            }else{
                                                                $where_order2            = "";
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
                                                            if($langganan_2){
                                                                $where_langganan2            = "ORDPRNCUSTOMERSUPPLIERCODE = '$langganan_2'";
                                                            }else{
                                                                $where_langganan2            = "";
                                                            }
                                                            if($warna_2){
                                                                $where_warna2            = "WARNA = '$warna_2'";
                                                            }else{
                                                                $where_warna2            = "";
                                                            }
                                                            if($operation_2){
                                                                $sqlDB2 = "SELECT DISTINCT * FROM itxview_memopentingppc_aftersales WHERE OPERATIONCODE = '$operation_2' AND ACCESS_TO = 'MEMO W OPR' AND IPADDRESS = '$_SERVER[REMOTE_ADDR]' ORDER BY DELIVERY ASC";
                                                            }else{
                                                                $sqlDB2 = "SELECT DISTINCT * FROM itxview_memopentingppc_aftersales WHERE $where_prodorder2 $where_proddemand2 $where_order2 $where_date2 $where_no_po2 $where_article2 $where_langganan2 $where_warna2 AND ACCESS_TO = 'MEMO AFTERSALES' AND IPADDRESS = '$_SERVER[REMOTE_ADDR]' ORDER BY DELIVERY ASC";
                                                            }
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
                                                                                                                    TRIM(p.PROGRESSSTATUS) AS PROGRESSSTATUS
                                                                                                                FROM 
                                                                                                                    VIEWPRODUCTIONDEMANDSTEP p
                                                                                                                WHERE
                                                                                                                    p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND
                                                                                                                    (p.PROGRESSSTATUS = '3' OR p.PROGRESSSTATUS = '2') ORDER BY p.GROUPSTEPNUMBER DESC LIMIT 1");
                                                                    $row_status_close = db2_fetch_assoc($q_deteksi_status_close);

                                                                    // UNTUK DELAY PROGRESS STATUS PERMINTAAN MS. AMY
                                                                        if($row_status_close['PROGRESSSTATUS'] == '2'){ // KALAU PROGRESS STATUSNYA ENTERED
                                                                            $q_delay_progress_selesai   = db2_exec($conn1, "SELECT 
                                                                                                                                p.PRODUCTIONORDERCODE AS PRODUCTIONORDERCODE, 
                                                                                                                                p.GROUPSTEPNUMBER AS GROUPSTEPNUMBER,
                                                                                                                                iptip.MULAI,
                                                                                                                                DAYS(CURRENT DATE) - DAYS(iptip.MULAI) AS DELAY_PROGRESSSTATUS,
                                                                                                                                p.PROGRESSSTATUS AS PROGRESSSTATUS
                                                                                                                            FROM 
                                                                                                                                PRODUCTIONDEMANDSTEP p
                                                                                                                            LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                                                            WHERE
                                                                                                                                p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND p.PROGRESSSTATUS = '2' ORDER BY p.GROUPSTEPNUMBER DESC LIMIT 1");
                                                                            $d_delay_progress_selesai   = db2_fetch_assoc($q_delay_progress_selesai);
                                                                            $jam_status_terakhir        = $d_delay_progress_selesai['MULAI'];
                                                                            $delay_progress_status      = $d_delay_progress_selesai['DELAY_PROGRESSSTATUS'].' Hari';
                                                                        }elseif($row_status_close['PROGRESSSTATUS'] == '3'){ // KALAU PROGRESS STATUSNYA PROGRESS
                                                                            $q_delay_progress_mulai   = db2_exec($conn1, "SELECT 
                                                                                                                                p.PRODUCTIONORDERCODE AS PRODUCTIONORDERCODE, 
                                                                                                                                p.GROUPSTEPNUMBER AS GROUPSTEPNUMBER,
                                                                                                                                iptop.SELESAI,
                                                                                                                                DAYS(CURRENT DATE) - DAYS(iptop.SELESAI) AS DELAY_PROGRESSSTATUS,
                                                                                                                                p.PROGRESSSTATUS AS PROGRESSSTATUS
                                                                                                                            FROM 
                                                                                                                                VIEWPRODUCTIONDEMANDSTEP p
                                                                                                                            LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.GROUPSTEPNUMBER
                                                                                                                            WHERE
                                                                                                                                p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND p.PROGRESSSTATUS = '3' ORDER BY p.GROUPSTEPNUMBER DESC LIMIT 1");
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
                                                            <td><?= $status_terakhir; ?> <?php if($status_operation != 'KK Oke') : ?> (<?= $jam_status_terakhir; ?>) <?php endif; ?></td> <!-- STATUS TERAKHIR -->
                                                            <td> <?php if($status_operation != 'KK Oke') : ?><?= $delay_progress_status; ?><?php endif; ?></td> <!-- DELAY PROGRESS STATUS -->
                                                            <td><?= $status_operation; ?></td> <!-- PROGRESS STATUS -->
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
                                                                <!-- <a href="http://online.indotaichen.com/laporan/ppc_catatan_po_greige.php?" target="_blank">Detail</a> -->
                                                                <?php if($d_benang_booking_new){ echo $d_benang_booking_new.'. Greige Ready'; } ?>
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
                                        mysqli_query($con_nowprd, "DELETE FROM itxview_memopentingppc_aftersales");
                                        header("Location: aftersales_memopenting_order.php");
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