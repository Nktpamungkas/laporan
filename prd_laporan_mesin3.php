<?php
ini_set("error_reporting", 1);
session_start();
set_time_limit(0);
require_once "koneksi.php";
$tgl1 = @$_POST['tgl'];
$tgl2 = @$_POST['tgl2'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PRD - laporan Macro Mesin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
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
    <link rel="stylesheet" type="text/css"
        href="files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css"
        href="files\assets\pages\data-table\extensions\buttons\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\jquery.mCustomScrollbar.css">
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
                                                <div class="col-sm-12 col-xl-2 m-b-0">
                                                    <h4 class="sub-title">Tanggal Awal</h4>
                                                    <div class="input-group input-group-sm">
                                                        <input type="date" class="form-control" required
                                                            placeholder="input-group-sm" name="tgl" value="<?php if (isset($_POST['submit'])) {
                                                                echo $_POST['tgl'];
                                                            } ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-0">
                                                    <h4 class="sub-title">Tanggal Akhir</h4>
                                                    <div class="input-group input-group-sm">
                                                        <input type="date" class="form-control" required
                                                            placeholder="input-group-sm" name="tgl2" value="<?php if (isset($_POST['submit'])) {
                                                                echo $_POST['tgl2'];
                                                            } ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-2">
                                                    <h4 class="sub-title">&nbsp;</h4>
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary btn-sm"><i
                                                            class="icofont icofont-search-alt-1"></i> Cari data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST['submit'])): ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header table-card-header">
                                                    <h5>Macro Data</h5>
                                                </div>
                                                <div class="card-block">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="basic-btn"
                                                            class="table compact table-bordered nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <!-- <th>No</th> -->
                                                                    <th></th>
                                                                    <th>Buyer</th>
                                                                    <th>Operation</th>
                                                                    <th>Hanger</th>
                                                                    <th>Bulan 1 Minggu 1</th>
                                                                    <th>Bulan 1 Minggu 2</th>
                                                                    <th>Bulan 1 Minggu 3</th>
                                                                    <th>Bulan 1 Minggu 4</th>
                                                                    <th>Bulan 2 Minggu 1</th>
                                                                    <th>Bulan 2 Minggu 2</th>
                                                                    <th>Bulan 2 Minggu 3</th>
                                                                    <th>Bulan 2 Minggu 4</th>
                                                                    <th>Bulan 3 Minggu 1</th>
                                                                    <th>Bulan 3 Minggu 2</th>
                                                                    <th>Bulan 3 Minggu 3</th>
                                                                    <th>Bulan 3 Minggu 4</th>
                                                                    <th>Bulan 4 Minggu 1</th>
                                                                    <th>Bulan 4 Minggu 2</th>
                                                                    <th>Bulan 4 Minggu 3</th>
                                                                    <th>Bulan 4 Minggu 4</th>
                                                                    <th>Bulan 5 Minggu 1</th>
                                                                    <th>Bulan 5 Minggu 2</th>
                                                                    <th>Bulan 5 Minggu 3</th>
                                                                    <th>Bulan 5 Minggu 4</th>
                                                                    <th>Bulan 6 Minggu 1</th>
                                                                    <th>Bulan 6 Minggu 2</th>
                                                                    <th>Bulan 6 Minggu 3</th>
                                                                    <th>Bulan 6 Minggu 4</th>
                                                                    <th>Bulan 7 Minggu 1</th>
                                                                    <th>Bulan 7 Minggu 2</th>
                                                                    <th>Bulan 7 Minggu 3</th>
                                                                    <th>Bulan 7 Minggu 4</th>
                                                                    <th>Bulan 8 Minggu 1</th>
                                                                    <th>Bulan 8 Minggu 2</th>
                                                                    <th>Bulan 8 Minggu 3</th>
                                                                    <th>Bulan 8 Minggu 4</th>
                                                                    <th>Bulan 9 Minggu 1</th>
                                                                    <th>Bulan 9 Minggu 2</th>
                                                                    <th>Bulan 9 Minggu 3</th>
                                                                    <th>Bulan 9 Minggu 4</th>
                                                                    <th>Bulan 10 Minggu 1</th>
                                                                    <th>Bulan 10 Minggu 2</th>
                                                                    <th>Bulan 10 Minggu 3</th>
                                                                    <th>Bulan 10 Minggu 4</th>
                                                                    <th>Bulan 11 Minggu 1</th>
                                                                    <th>Bulan 11 Minggu 2</th>
                                                                    <th>Bulan 11 Minggu 3</th>
                                                                    <th>Bulan 11 Minggu 4</th>
                                                                    <th>Bulan 12 Minggu 1</th>
                                                                    <th>Bulan 12 Minggu 2</th>
                                                                    <th>Bulan 12 Minggu 3</th>
                                                                    <th>Bulan 12 Minggu 4</th>
                                                                    <th>Grand Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $query4 = "SELECT DISTINCT 
                                                                t.ORDERPARTNERBRANDCODE AS CUSTOMER,
                                                                --t.OPERATIONCODE AS operation,
                                                                --t.HANGER,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 1 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                END),0) AS QTYM1_W1,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 1 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                END),0) AS QTYM1_W2,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 1 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                END),0) AS QTYM1_W3,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 1 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                END),0) AS QTYM1_W4,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 2 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                END),0) AS QTYM2_W1,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 2 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                END),0) AS QTYM2_W2,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 2 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                END),0) AS QTYM2_W3,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 2 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                END),0) AS QTYM2_W4,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 3 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                END),0) AS QTYM3_W1,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 3 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                END),0) AS QTYM3_W2,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 3 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                END),0) AS QTYM3_W3,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 3 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                END),0) AS QTYM3_W4,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 4 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                END),0) AS QTYM4_W1,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 4 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                END),0) AS QTYM4_W2,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 4 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                END),0) AS QTYM4_W3,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 4 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                END),0) AS QTYM4_W4,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 5 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                END),0) AS QTYM5_W1,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 5 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                END),0) AS QTYM5_W2,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 5 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                END),0) AS QTYM5_W3,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 5 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                END),0) AS QTYM5_W4,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 6 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                END),0) AS QTYM6_W1,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 6 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                END),0) AS QTYM6_W2,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 6 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                END),0) AS QTYM6_W3,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 6 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                END),0) AS QTYM6_W4,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 7 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                END),0) AS QTYM7_W1,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 7 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                END),0) AS QTYM7_W2,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 7 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                END),0) AS QTYM7_W3,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 7 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                END),0) AS QTYM7_W4,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 8 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                END),0) AS QTYM8_W1,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 8 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                END),0) AS QTYM8_W2,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 8 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                END),0) AS QTYM8_W3,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 8 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                END),0) AS QTYM8_W4,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 9 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                END),0) AS QTYM9_W1,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 9 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                END),0) AS QTYM9_W2,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 9 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                END),0) AS QTYM9_W3,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 9 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                END),0) AS QTYM9_W4,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 10 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                END),0) AS QTYM10_W1,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 10 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                END),0) AS QTYM10_W2,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 10 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                END),0) AS QTYM10_W3,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 10 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                END),0) AS QTYM10_W4,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 11 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                END),0) AS QTYM11_W1,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 11 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                END),0) AS QTYM11_W2,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 11 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                END),0) AS QTYM11_W3,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 11 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                END),0) AS QTYM11_W4,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 12 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                END),0) AS QTYM12_W1,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 12 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                END),0) AS QTYM12_W2,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 12 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                END),0) AS QTYM12_W3,
                                                                ROUND(sum(CASE 
                                                                    WHEN t.bulan = 12 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                END),0) AS QTYM12_W4,
                                                                ROUND(sum(T.QTY),0) AS Total
                                                                FROM (
                                                                SELECT DISTINCT 
                                                                --s.CODE,
                                                                s.ORDERPARTNERBRANDCODE,
                                                                p2.OPERATIONCODE,
                                                                trim(p.SUBCODE02)||trim(p.SUBCODE03)AS HANGER,
                                                                MONTH(s2.DELIVERYDATE) AS bulan,
                                                                DAY(s2.DELIVERYDATE) AS tanggal,
                                                                CASE 
                                                                    WHEN p.ITEMTYPEAFICODE ='KFF' THEN p.USERPRIMARYQUANTITY
                                                                    WHEN p.ITEMTYPEAFICODE ='FKF' THEN p.USERSECONDARYQUANTITY 
                                                                END AS qty
                                                                FROM 
                                                                    SALESORDER s
                                                                LEFT JOIN SALESORDERDELIVERY s2 ON s2.SALESORDERLINESALESORDERCODE = s.CODE  
                                                                LEFT JOIN PRODUCTIONDEMAND p ON p.DLVSALORDERLINESALESORDERCODE = s.CODE 
                                                                LEFT JOIN PRODUCTIONDEMANDSTEP p2 ON p2.PRODUCTIONDEMANDCODE = p.CODE 
                                                                WHERE 
                                                                (p2.WORKCENTERCODE = 'P3RS1' OR p2.WORKCENTERCODE = 'P3SU1' OR p2.WORKCENTERCODE = 'P3ST1' OR p2.WORKCENTERCODE = 'P3CP1' OR p2.WORKCENTERCODE = 'P3TD1' OR p2.WORKCENTERCODE = 'P3SH1'
                                                                    OR p2.WORKCENTERCODE = 'P3CO1'OR p2.WORKCENTERCODE = 'P3AR1'OR p2.WORKCENTERCODE = 'P3BC1')
                                                                AND s.CREATIONDATETIME BETWEEN '$tgl1' AND '$tgl2'
                                                                AND NOT p.ORIGDLVSALORDLINESALORDERCODE IS NULL
                                                                --AND ORDERPARTNERBRANDCODE ='TOYMIZ'
                                                                --AND p2.OPERATIONCODE ='FNJ1'
                                                                ) t
                                                                GROUP BY
                                                                t.ORDERPARTNERBRANDCODE
                                                                --t.OPERATIONCODE
                                                                --t.HANGER
                                                                            ";
                                                                $db_sumbuy = db2_exec($conn1, $query4, array('cursor' => DB2_SCROLLABLE));
                                                                while ($row_sumbuy = db2_fetch_assoc($db_sumbuy)) {

                                                                    $query5 = "SELECT DISTINCT 
                                                                    -- t.ORDERPARTNERBRANDCODE AS CUSTOMER,
                                                                    t.OPERATIONCODE AS OPERATION,
                                                                    --t.HANGER,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 1 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                    END),0) AS QTYM1_W1,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 1 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                    END),0) AS QTYM1_W2,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 1 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                    END),0) AS QTYM1_W3,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 1 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                    END),0) AS QTYM1_W4,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 2 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                    END),0) AS QTYM2_W1,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 2 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                    END),0) AS QTYM2_W2,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 2 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                    END),0) AS QTYM2_W3,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 2 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                    END),0) AS QTYM2_W4,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 3 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                    END),0) AS QTYM3_W1,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 3 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                    END),0) AS QTYM3_W2,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 3 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                    END),0) AS QTYM3_W3,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 3 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                    END),0) AS QTYM3_W4,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 4 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                    END),0) AS QTYM4_W1,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 4 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                    END),0) AS QTYM4_W2,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 4 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                    END),0) AS QTYM4_W3,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 4 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                    END),0) AS QTYM4_W4,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 5 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                    END),0) AS QTYM5_W1,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 5 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                    END),0) AS QTYM5_W2,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 5 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                    END),0) AS QTYM5_W3,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 5 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                    END),0) AS QTYM5_W4,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 6 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                    END),0) AS QTYM6_W1,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 6 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                    END),0) AS QTYM6_W2,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 6 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                    END),0) AS QTYM6_W3,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 6 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                    END),0) AS QTYM6_W4,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 7 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                    END),0) AS QTYM7_W1,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 7 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                    END),0) AS QTYM7_W2,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 7 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                    END),0) AS QTYM7_W3,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 7 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                    END),0) AS QTYM7_W4,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 8 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                    END),0) AS QTYM8_W1,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 8 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                    END),0) AS QTYM8_W2,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 8 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                    END),0) AS QTYM8_W3,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 8 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                    END),0) AS QTYM8_W4,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 9 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                    END),0) AS QTYM9_W1,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 9 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                    END),0) AS QTYM9_W2,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 9 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                    END),0) AS QTYM9_W3,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 9 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                    END),0) AS QTYM9_W4,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 10 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                    END),0) AS QTYM10_W1,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 10 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                    END),0) AS QTYM10_W2,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 10 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                    END),0) AS QTYM10_W3,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 10 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                    END),0) AS QTYM10_W4,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 11 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                    END),0) AS QTYM11_W1,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 11 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                    END),0) AS QTYM11_W2,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 11 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                    END),0) AS QTYM11_W3,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 11 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                    END),0) AS QTYM11_W4,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 12 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                    END),0) AS QTYM12_W1,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 12 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                    END),0) AS QTYM12_W2,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 12 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                    END),0) AS QTYM12_W3,
                                                                    ROUND(sum(CASE 
                                                                        WHEN t.bulan = 12 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                    END),0) AS QTYM12_W4,
                                                                    ROUND(sum(T.QTY),0) AS Total
                                                                    FROM (
                                                                    SELECT DISTINCT 
                                                                    --s.CODE,
                                                                    s.ORDERPARTNERBRANDCODE,
                                                                    p2.OPERATIONCODE,
                                                                    trim(p.SUBCODE02)||trim(p.SUBCODE03)AS HANGER,
                                                                    MONTH(s2.DELIVERYDATE) AS bulan,
                                                                    DAY(s2.DELIVERYDATE) AS tanggal,
                                                                    CASE 
                                                                        WHEN p.ITEMTYPEAFICODE ='KFF' THEN p.USERPRIMARYQUANTITY
                                                                        WHEN p.ITEMTYPEAFICODE ='FKF' THEN p.USERSECONDARYQUANTITY 
                                                                    END AS qty
                                                                    FROM 
                                                                        SALESORDER s
                                                                    LEFT JOIN SALESORDERDELIVERY s2 ON s2.SALESORDERLINESALESORDERCODE = s.CODE  
                                                                    LEFT JOIN PRODUCTIONDEMAND p ON p.DLVSALORDERLINESALESORDERCODE = s.CODE 
                                                                    LEFT JOIN PRODUCTIONDEMANDSTEP p2 ON p2.PRODUCTIONDEMANDCODE = p.CODE 
                                                                    WHERE 
                                                                    (p2.WORKCENTERCODE = 'P3RS1' OR p2.WORKCENTERCODE = 'P3SU1' OR p2.WORKCENTERCODE = 'P3ST1' OR p2.WORKCENTERCODE = 'P3CP1' OR p2.WORKCENTERCODE = 'P3TD1' OR p2.WORKCENTERCODE = 'P3SH1'
                                                                        OR p2.WORKCENTERCODE = 'P3CO1'OR p2.WORKCENTERCODE = 'P3AR1'OR p2.WORKCENTERCODE = 'P3BC1')
                                                                    AND s.CREATIONDATETIME BETWEEN '$tgl1' AND '$tgl2'
                                                                    AND NOT p.ORIGDLVSALORDLINESALORDERCODE IS NULL
                                                                    AND ORDERPARTNERBRANDCODE ='$row_sumbuy[CUSTOMER]'
                                                                    --AND p2.OPERATIONCODE ='FNJ1'
                                                                    ) t
                                                                    GROUP BY
                                                                    -- t.ORDERPARTNERBRANDCODE
                                                                    t.OPERATIONCODE
                                                                    --t.HANGER
                                                                            ";
                                                                    $db_sumop = db2_exec($conn1, $query5, array('cursor' => DB2_SCROLLABLE));
                                                                    while ($row_sumop = db2_fetch_assoc($db_sumop)) {

                                                                        $query6 = "SELECT DISTINCT 
                                                                        -- t.ORDERPARTNERBRANDCODE AS CUSTOMER,
                                                                        --t.OPERATIONCODE AS operation,
                                                                        t.HANGER,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 1 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                        END),0) AS QTYM1_W1,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 1 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                        END),0) AS QTYM1_W2,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 1 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                        END),0) AS QTYM1_W3,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 1 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                        END),0) AS QTYM1_W4,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 2 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                        END),0) AS QTYM2_W1,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 2 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                        END),0) AS QTYM2_W2,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 2 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                        END),0) AS QTYM2_W3,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 2 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                        END),0) AS QTYM2_W4,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 3 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                        END),0) AS QTYM3_W1,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 3 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                        END),0) AS QTYM3_W2,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 3 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                        END),0) AS QTYM3_W3,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 3 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                        END),0) AS QTYM3_W4,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 4 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                        END),0) AS QTYM4_W1,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 4 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                        END),0) AS QTYM4_W2,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 4 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                        END),0) AS QTYM4_W3,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 4 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                        END),0) AS QTYM4_W4,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 5 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                        END),0) AS QTYM5_W1,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 5 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                        END),0) AS QTYM5_W2,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 5 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                        END),0) AS QTYM5_W3,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 5 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                        END),0) AS QTYM5_W4,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 6 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                        END),0) AS QTYM6_W1,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 6 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                        END),0) AS QTYM6_W2,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 6 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                        END),0) AS QTYM6_W3,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 6 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                        END),0) AS QTYM6_W4,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 7 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                        END),0) AS QTYM7_W1,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 7 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                        END),0) AS QTYM7_W2,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 7 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                        END),0) AS QTYM7_W3,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 7 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                        END),0) AS QTYM7_W4,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 8 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                        END),0) AS QTYM8_W1,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 8 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                        END),0) AS QTYM8_W2,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 8 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                        END),0) AS QTYM8_W3,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 8 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                        END),0) AS QTYM8_W4,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 9 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                        END),0) AS QTYM9_W1,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 9 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                        END),0) AS QTYM9_W2,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 9 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                        END),0) AS QTYM9_W3,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 9 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                        END),0) AS QTYM9_W4,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 10 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                        END),0) AS QTYM10_W1,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 10 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                        END),0) AS QTYM10_W2,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 10 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                        END),0) AS QTYM10_W3,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 10 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                        END),0) AS QTYM10_W4,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 11 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                        END),0) AS QTYM11_W1,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 11 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                        END),0) AS QTYM11_W2,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 11 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                        END),0) AS QTYM11_W3,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 11 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                        END),0) AS QTYM11_W4,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 12 AND t.tanggal BETWEEN 1 AND 7 THEN t.QTY
                                                                        END),0) AS QTYM12_W1,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 12 AND t.tanggal BETWEEN 8 AND 15 THEN t.QTY
                                                                        END),0) AS QTYM12_W2,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 12 AND t.tanggal BETWEEN 16 AND 23 THEN t.QTY
                                                                        END),0) AS QTYM12_W3,
                                                                        ROUND(sum(CASE 
                                                                            WHEN t.bulan = 12 AND t.tanggal BETWEEN 24 AND 31 THEN t.QTY
                                                                        END),0) AS QTYM12_W4,
                                                                        ROUND(sum(T.QTY),0) AS Total
                                                                        FROM (
                                                                        SELECT DISTINCT 
                                                                        --s.CODE,
                                                                        s.ORDERPARTNERBRANDCODE,
                                                                        p2.OPERATIONCODE,
                                                                        trim(p.SUBCODE02)||trim(p.SUBCODE03)AS HANGER,
                                                                        MONTH(s2.DELIVERYDATE) AS bulan,
                                                                        DAY(s2.DELIVERYDATE) AS tanggal,
                                                                        CASE 
                                                                            WHEN p.ITEMTYPEAFICODE ='KFF' THEN p.USERPRIMARYQUANTITY
                                                                            WHEN p.ITEMTYPEAFICODE ='FKF' THEN p.USERSECONDARYQUANTITY 
                                                                        END AS qty
                                                                        FROM 
                                                                            SALESORDER s
                                                                        LEFT JOIN SALESORDERDELIVERY s2 ON s2.SALESORDERLINESALESORDERCODE = s.CODE  
                                                                        LEFT JOIN PRODUCTIONDEMAND p ON p.DLVSALORDERLINESALESORDERCODE = s.CODE 
                                                                        LEFT JOIN PRODUCTIONDEMANDSTEP p2 ON p2.PRODUCTIONDEMANDCODE = p.CODE 
                                                                        WHERE 
                                                                        (p2.WORKCENTERCODE = 'P3RS1' OR p2.WORKCENTERCODE = 'P3SU1' OR p2.WORKCENTERCODE = 'P3ST1' OR p2.WORKCENTERCODE = 'P3CP1' OR p2.WORKCENTERCODE = 'P3TD1' OR p2.WORKCENTERCODE = 'P3SH1'
                                                                            OR p2.WORKCENTERCODE = 'P3CO1'OR p2.WORKCENTERCODE = 'P3AR1'OR p2.WORKCENTERCODE = 'P3BC1')
                                                                        AND s.CREATIONDATETIME BETWEEN '$tgl1' AND '$tgl2'
                                                                        AND NOT p.ORIGDLVSALORDLINESALORDERCODE IS NULL
                                                                        AND ORDERPARTNERBRANDCODE ='$row_sumbuy[CUSTOMER]'
                                                                        AND p2.OPERATIONCODE ='$row_sumop[OPERATION]'
                                                                        ) t
                                                                        GROUP BY
                                                                        -- t.ORDERPARTNERBRANDCODE
                                                                        --t.OPERATIONCODE
                                                                        t.HANGER 
                                                                        ";
                                                                        $db_sumhang = db2_exec($conn1, $query6, array('cursor' => DB2_SCROLLABLE));
                                                                        while ($row_sumhang = db2_fetch_assoc($db_sumhang)) {
                                                                                
                                                                                
                                                                            if ($current_buyer != $row_sumbuy['CUSTOMER']) {
                                                                                echo "<tr bgcolor = '#fbff0a'>";
                                                                                echo "<td></td>";
                                                                                echo "<td>" . $row_sumbuy['CUSTOMER'] . "</td>";
                                                                                echo "<td></td>";
                                                                                echo "<td></td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM1_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM1_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM1_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM1_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM2_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM2_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM2_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM2_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM3_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM3_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM3_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM3_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM4_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM4_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM4_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM4_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM5_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM5_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM5_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM5_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM6_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM6_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM6_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM6_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM7_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM7_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM7_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM7_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM8_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM8_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM8_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM8_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM9_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM9_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM9_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM9_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM10_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM10_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM10_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM10_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM11_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM11_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM11_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM11_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM12_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM12_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM12_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM12_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumbuy['QTYM1_W1'] + $row_sumbuy['QTYM1_W2'] + $row_sumbuy['QTYM1_W3'] + $row_sumbuy['QTYM1_W4'] + $row_sumbuy['QTYM2_W1'] + $row_sumbuy['QTYM2_W2'] + $row_sumbuy['QTYM2_W3'] + $row_sumbuy['QTYM2_W4'] + $row_sumbuy['QTYM3_W1'] + $row_sumbuy['QTYM3_W2'] + $row_sumbuy['QTYM3_W3'] + $row_sumbuy['QTYM3_W4'] + $row_sumbuy['QTYM4_W1'] + $row_sumbuy['QTYM4_W2'] + $row_sumbuy['QTYM4_W3'] + $row_sumbuy['QTYM4_W4'] + $row_sumbuy['QTYM5_W1'] + $row_sumbuy['QTYM5_W2'] + $row_sumbuy['QTYM5_W3'] + $row_sumbuy['QTYM5_W4'] + $row_sumbuy['QTYM6_W1'] + $row_sumbuy['QTYM6_W2'] + $row_sumbuy['QTYM6_W3'] + $row_sumbuy['QTYM6_W4'] + $row_sumbuy['QTYM7_W1'] + $row_sumbuy['QTYM7_W2'] + $row_sumbuy['QTYM7_W3'] + $row_sumbuy['QTYM7_W4'] + $row_sumbuy['QTYM8_W1'] + $row_sumbuy['QTYM8_W2'] + $row_sumbuy['QTYM8_W3'] + $row_sumbuy['QTYM8_W4'] + $row_sumbuy['QTYM9_W1'] + $row_sumbuy['QTYM9_W2'] + $row_sumbuy['QTYM9_W3'] + $row_sumbuy['QTYM9_W4'] + $row_sumbuy['QTYM10_W1'] + $row_sumbuy['QTYM10_W2'] + $row_sumbuy['QTYM10_W3'] + $row_sumbuy['QTYM10_W4'] + $row_sumbuy['QTYM11_W1'] + $row_sumbuy['QTYM11_W2'] + $row_sumbuy['QTYM11_W3'] + $row_sumbuy['QTYM11_W4'] + $row_sumbuy['QTYM12_W1'] + $row_sumbuy['QTYM12_W2'] + $row_sumbuy['QTYM12_W3'] + $row_sumbuy['QTYM12_W4']) . "</td>";
                                                                                // echo "<td>" . number_format($row_sumbuy['TOTAL'])."</td>";
                                                                                echo "</tr>";
                                                                                $current_buyer = $row_sumbuy['CUSTOMER'];
                                                                            }
                                                                                
                                                                            if ($current_operation != $row_sumop['OPERATION']) {
                                                                                // Tampilkan operasi dan data transaksi
                                                                                echo "<tr bgcolor= '#0ae2ff'>";
                                                                                echo "<td></td>";
                                                                                echo "<td></td>"; // Kolom nomor kosong
                                                                                echo "<td>" . $row_sumop['OPERATION'] . "</td>";
                                                                                echo "<td></td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM1_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM1_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM1_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM1_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM2_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM2_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM2_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM2_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM3_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM3_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM3_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM3_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM4_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM4_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM4_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM4_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM5_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM5_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM5_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM5_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM6_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM6_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM6_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM6_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM7_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM7_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM7_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM7_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM8_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM8_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM8_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM8_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM9_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM9_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM9_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM9_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM10_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM10_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM10_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM10_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM11_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM11_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM11_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM11_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM12_W1']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM12_W2']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM12_W3']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM12_W4']) . "</td>";
                                                                                echo "<td>" . number_format($row_sumop['QTYM1_W1'] + $row_sumop['QTYM1_W2'] + $row_sumop['QTYM1_W3'] + $row_sumop['QTYM1_W4'] + $row_sumop['QTYM2_W1'] + $row_sumop['QTYM2_W2'] + $row_sumop['QTYM2_W3'] + $row_sumop['QTYM2_W4'] + $row_sumop['QTYM3_W1'] + $row_sumop['QTYM3_W2'] + $row_sumop['QTYM3_W3'] + $row_sumop['QTYM3_W4'] + $row_sumop['QTYM4_W1'] + $row_sumop['QTYM4_W2'] + $row_sumop['QTYM4_W3'] + $row_sumop['QTYM4_W4'] + $row_sumop['QTYM5_W1'] + $row_sumop['QTYM5_W2'] + $row_sumop['QTYM5_W3'] + $row_sumop['QTYM5_W4'] + $row_sumop['QTYM6_W1'] + $row_sumop['QTYM6_W2'] + $row_sumop['QTYM6_W3'] + $row_sumop['QTYM6_W4'] + $row_sumop['QTYM7_W1'] + $row_sumop['QTYM7_W2'] + $row_sumop['QTYM7_W3'] + $row_sumop['QTYM7_W4'] + $row_sumop['QTYM8_W1'] + $row_sumop['QTYM8_W2'] + $row_sumop['QTYM8_W3'] + $row_sumop['QTYM8_W4'] + $row_sumop['QTYM9_W1'] + $row_sumop['QTYM9_W2'] + $row_sumop['QTYM9_W3'] + $row_sumop['QTYM9_W4'] + $row_sumop['QTYM10_W1'] + $row_sumop['QTYM10_W2'] + $row_sumop['QTYM10_W3'] + $row_sumop['QTYM10_W4'] + $row_sumop['QTYM11_W1'] + $row_sumop['QTYM11_W2'] + $row_sumop['QTYM11_W3'] + $row_sumop['QTYM11_W4'] + $row_sumop['QTYM12_W1'] + $row_sumop['QTYM12_W2'] + $row_sumop['QTYM12_W3'] + $row_sumop['QTYM12_W4']) . "</td>";
                                                                                // echo "<td>" . number_format($row_sumop['TOTAL'])."</td>";
                                                                                echo "</tr>";
                                                                                $current_operation = $row_sumop['OPERATION'];
                                                                            }
                                                                            echo "<tr>";
                                                                            echo "<td></td>"; // Kolom nomor kosong
                                                                            echo "<td></td>";
                                                                            echo "<td></td>";
                                                                            echo "<td>" . $row_sumhang['HANGER'] . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM1_W1']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM1_W2']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM1_W3']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM1_W4']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM2_W1']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM2_W2']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM2_W3']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM2_W4']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM3_W1']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM3_W2']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM3_W3']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM3_W4']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM4_W1']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM4_W2']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM4_W3']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM4_W4']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM5_W1']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM5_W2']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM5_W3']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM5_W4']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM6_W1']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM6_W2']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM6_W3']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM6_W4']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM7_W1']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM7_W2']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM7_W3']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM7_W4']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM8_W1']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM8_W2']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM8_W3']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM8_W4']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM9_W1']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM9_W2']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM9_W3']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM9_W4']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM10_W1']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM10_W2']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM10_W3']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM10_W4']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM11_W1']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM11_W2']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM11_W3']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM11_W4']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM12_W1']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM12_W2']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM12_W3']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM12_W4']) . "</td>";
                                                                            echo "<td>" . number_format($row_sumhang['QTYM1_W1'] + $row_sumhang['QTYM1_W2'] + $row_sumhang['QTYM1_W3'] + $row_sumhang['QTYM1_W4'] + $row_sumhang['QTYM2_W1'] + $row_sumhang['QTYM2_W2'] + $row_sumhang['QTYM2_W3'] + $row_sumhang['QTYM2_W4'] + $row_sumhang['QTYM3_W1'] + $row_sumhang['QTYM3_W2'] + $row_sumhang['QTYM3_W3'] + $row_sumhang['QTYM3_W4'] + $row_sumhang['QTYM4_W1'] + $row_sumhang['QTYM4_W2'] + $row_sumhang['QTYM4_W3'] + $row_sumhang['QTYM4_W4'] + $row_sumhang['QTYM5_W1'] + $row_sumhang['QTYM5_W2'] + $row_sumhang['QTYM5_W3'] + $row_sumhang['QTYM5_W4'] + $row_sumhang['QTYM6_W1'] + $row_sumhang['QTYM6_W2'] + $row_sumhang['QTYM6_W3'] + $row_sumhang['QTYM6_W4'] + $row_sumhang['QTYM7_W1'] + $row_sumhang['QTYM7_W2'] + $row_sumhang['QTYM7_W3'] + $row_sumhang['QTYM7_W4'] + $row_sumhang['QTYM8_W1'] + $row_sumhang['QTYM8_W2'] + $row_sumhang['QTYM8_W3'] + $row_sumhang['QTYM8_W4'] + $row_sumhang['QTYM9_W1'] + $row_sumhang['QTYM9_W2'] + $row_sumhang['QTYM9_W3'] + $row_sumhang['QTYM9_W4'] + $row_sumhang['QTYM10_W1'] + $row_sumhang['QTYM10_W2'] + $row_sumhang['QTYM10_W3'] + $row_sumhang['QTYM10_W4'] + $row_sumhang['QTYM11_W1'] + $row_sumhang['QTYM11_W2'] + $row_sumhang['QTYM11_W3'] + $row_sumhang['QTYM11_W4'] + $row_sumhang['QTYM12_W1'] + $row_sumhang['QTYM12_W2'] + $row_sumhang['QTYM12_W3'] + $row_sumhang['QTYM12_W4']) . "</td>";
                                                                            // echo "<td>" . number_format($row_sumhang['TOTAL'])."</td>";
                                                                            echo "</tr>";
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
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
    <script type="text/javascript"
        src="files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
    <script type="text/javascript"
        src="files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
    <script src="files\assets\pages\data-table\extensions\buttons\js\extension-btns-custom.js"></script>
    <script src="files\assets\js\pcoded.min.js"></script>
    <script src="files\assets\js\menu\menu-hori-fixed.js"></script>
    <script src="files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="files\assets\js\script.js"></script>

</body>

</html>