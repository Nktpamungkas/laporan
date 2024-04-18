<?php
ini_set("error_reporting", 1);
session_start();
set_time_limit(0);
require_once "koneksi.php";
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
                                                            class="table compact table-striped table-bordered nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <!-- <th>No</th> -->
                                                                    <th>No</th>
                                                                    <th>Row Col</th>
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
                                                                $query = "SELECT  
                                                                buyer,
                                                                -- CONCAT (s2,s3) AS item,
                                                                -- operationcode,
                                                                sum(CASE 
                                                                WHEN bulan = 1 THEN qty1 ELSE null END) AS bln1_week1,
                                                                sum(CASE 
                                                                WHEN bulan = 1 THEN qty2 ELSE null END) AS bln1_week2,
                                                                sum(CASE 
                                                                WHEN bulan = 1 THEN qty3 ELSE null END) AS bln1_week3,
                                                                sum(CASE 
                                                                WHEN bulan = 1 THEN qty4 ELSE null END) AS bln1_week4,
                                                                sum(CASE 
                                                                WHEN bulan = 2 THEN qty1 ELSE null END) AS bln2_week1,
                                                                sum(CASE 
                                                                WHEN bulan = 2 THEN qty2 ELSE null END) AS bln2_week2,
                                                                sum(CASE 
                                                                WHEN bulan = 2 THEN qty3 ELSE null END) AS bln2_week3,
                                                                sum(CASE 
                                                                WHEN bulan = 2 THEN qty4 ELSE null END) AS bln2_week4,
                                                                sum(CASE 
                                                                WHEN bulan = 3 THEN qty1 ELSE null END) AS bln3_week1,
                                                                sum(CASE 
                                                                WHEN bulan = 3 THEN qty2 ELSE null END) AS bln3_week2,
                                                                sum(CASE 
                                                                WHEN bulan = 3 THEN qty3 ELSE null END) AS bln3_week3,
                                                                sum(CASE 
                                                                WHEN bulan = 3 THEN qty4 ELSE null END) AS bln3_week4,
                                                                sum(CASE 
                                                                WHEN bulan = 4 THEN qty1 ELSE null END) AS bln4_week1,
                                                                sum(CASE 
                                                                WHEN bulan = 4 THEN qty2 ELSE null END) AS bln4_week2,
                                                                sum(CASE 
                                                                WHEN bulan = 4 THEN qty3 ELSE null END) AS bln4_week3,
                                                                sum(CASE 
                                                                WHEN bulan = 4 THEN qty4 ELSE null END) AS bln4_week4,
                                                                sum(CASE 
                                                                WHEN bulan = 5 THEN qty1 ELSE null END) AS bln5_week1,
                                                                sum(CASE 
                                                                WHEN bulan = 5 THEN qty2 ELSE null END) AS bln5_week2,
                                                                sum(CASE 
                                                                WHEN bulan = 5 THEN qty3 ELSE null END) AS bln5_week3,
                                                                sum(CASE 
                                                                WHEN bulan = 5 THEN qty4 ELSE null END) AS bln5_week4,
                                                                sum(CASE 
                                                                WHEN bulan = 6 THEN qty1 ELSE null END) AS bln6_week1,
                                                                sum(CASE 
                                                                WHEN bulan = 6 THEN qty2 ELSE null END) AS bln6_week2,
                                                                sum(CASE 
                                                                WHEN bulan = 6 THEN qty3 ELSE null END) AS bln6_week3,
                                                                sum(CASE 
                                                                WHEN bulan = 6 THEN qty4 ELSE null END) AS bln6_week4,
                                                                sum(CASE 
                                                                WHEN bulan = 7 THEN qty1 ELSE null END) AS bln7_week1,
                                                                sum(CASE 
                                                                WHEN bulan = 7 THEN qty2 ELSE null END) AS bln7_week2,
                                                                sum(CASE 
                                                                WHEN bulan = 7 THEN qty3 ELSE null END) AS bln7_week3,
                                                                sum(CASE 
                                                                WHEN bulan = 7 THEN qty4 ELSE null END) AS bln7_week4,
                                                                sum(CASE 
                                                                WHEN bulan = 8 THEN qty1 ELSE null END) AS bln8_week1,
                                                                sum(CASE 
                                                                WHEN bulan = 8 THEN qty2 ELSE null END) AS bln8_week2,
                                                                sum(CASE 
                                                                WHEN bulan = 8 THEN qty3 ELSE null END) AS bln8_week3,
                                                                sum(CASE 
                                                                WHEN bulan = 8 THEN qty4 ELSE null END) AS bln8_week4,
                                                                sum(CASE 
                                                                WHEN bulan = 9 THEN qty1 ELSE null END) AS bln9_week1,
                                                                sum(CASE 
                                                                WHEN bulan = 9 THEN qty2 ELSE null END) AS bln9_week2,
                                                                sum(CASE 
                                                                WHEN bulan = 9 THEN qty3 ELSE null END) AS bln9_week3,
                                                                sum(CASE 
                                                                WHEN bulan = 9 THEN qty4 ELSE null END) AS bln9_week4,
                                                                sum(CASE 
                                                                WHEN bulan = 10 THEN qty1 ELSE null END) AS bln10_week1,
                                                                sum(CASE 
                                                                WHEN bulan = 10 THEN qty2 ELSE null END) AS bln10_week2,
                                                                sum(CASE 
                                                                WHEN bulan = 10 THEN qty3 ELSE null END) AS bln10_week3,
                                                                sum(CASE 
                                                                WHEN bulan = 10 THEN qty4 ELSE null END) AS bln10_week4,
                                                                sum(CASE 
                                                                WHEN bulan = 11 THEN qty1 ELSE null END) AS bln11_week1,
                                                                sum(CASE 
                                                                WHEN bulan = 11 THEN qty2 ELSE null END) AS bln11_week2,
                                                                sum(CASE 
                                                                WHEN bulan = 11 THEN qty3 ELSE null END) AS bln11_week3,
                                                                sum(CASE 
                                                                WHEN bulan = 11 THEN qty4 ELSE null END) AS bln11_week4,
                                                                sum(CASE 
                                                                WHEN bulan = 12 THEN qty1 ELSE null END) AS bln12_week1,
                                                                sum(CASE
                                                                WHEN bulan = 12 THEN qty2 ELSE null END) AS bln12_week2,
                                                                sum(CASE 
                                                                WHEN bulan = 12 THEN qty3 ELSE null END) AS bln12_week3,
                                                                sum(CASE 
                                                                WHEN bulan = 12 THEN qty4 ELSE null END) AS bln12_week4
                                                                --sum(qty2) AS qty2,
                                                                --sum(qty3) AS qty3,
                                                                --sum(qty4) AS qty4
                                                                FROM (
                                                                SELECT DISTINCT
                                                                    CASE
                                                                        WHEN DAY(s2.DELIVERYDATE) BETWEEN 1 AND 7 THEN  1 
                                                                        WHEN DAY(s2.DELIVERYDATE) BETWEEN 8 AND 15 THEN  2
                                                                        WHEN DAY(s2.DELIVERYDATE) BETWEEN 16 AND 23 THEN  3 
                                                                        WHEN DAY(s2.DELIVERYDATE) BETWEEN 24 AND 31 THEN  4
                                                                    END AS MINGGU,
                                                                    MONTH (s2.DELIVERYDATE) AS BULAN,
                                                                    TRIM(p.SUBCODE02) AS S2,
                                                                    TRIM(p.SUBCODE03) AS S3,
                                                                    ip.BUYER,
                                                                    p2.OPERATIONCODE,
                                                                    CASE
                                                                        WHEN i2.ITEMTYPE_DEMAND = 'KFF' AND DAY(s2.DELIVERYDATE) BETWEEN 1 AND 7 THEN sum(i2.USERPRIMARYQUANTITY) 
                                                                        WHEN i2.ITEMTYPE_DEMAND = 'FKF' AND DAY(s2.DELIVERYDATE) BETWEEN 1 AND 7 THEN sum(i2.USERSECONDARYQUANTITY)
                                                                    END AS QTY1,
                                                                    CASE
                                                                        WHEN i3.ITEMTYPE_DEMAND = 'KFF' AND DAY(s2.DELIVERYDATE) BETWEEN 8 AND 15 THEN sum(i3.USERPRIMARYQUANTITY) 
                                                                        WHEN i3.ITEMTYPE_DEMAND = 'FKF' AND DAY(s2.DELIVERYDATE) BETWEEN 8 AND 15 THEN sum(i3.USERSECONDARYQUANTITY)
                                                                    END AS QTY2,
                                                                    CASE
                                                                        WHEN i4.ITEMTYPE_DEMAND = 'KFF' AND DAY(s2.DELIVERYDATE) BETWEEN 16 AND 23 THEN sum(i4.USERPRIMARYQUANTITY) 
                                                                        WHEN i4.ITEMTYPE_DEMAND = 'FKF' AND DAY(s2.DELIVERYDATE) BETWEEN 16 AND 23 THEN sum(i4.USERSECONDARYQUANTITY)
                                                                    END AS QTY3,
                                                                    CASE
                                                                        WHEN i5.ITEMTYPE_DEMAND = 'KFF' AND DAY(s2.DELIVERYDATE) BETWEEN 24 AND 31 THEN sum(i5.USERPRIMARYQUANTITY) 
                                                                        WHEN i5.ITEMTYPE_DEMAND = 'FKF' AND DAY(s2.DELIVERYDATE) BETWEEN 24 AND 31 THEN sum(i5.USERSECONDARYQUANTITY)
                                                                    END AS QTY4
                                                                FROM
                                                                    ITXVIEWBONORDER i 
                                                                LEFT JOIN PRODUCTIONDEMAND p ON p.CODE = i.DEMAND 
                                                                LEFT JOIN PRODUCTIONDEMANDSTEP p2 ON p2.PRODUCTIONDEMANDCODE = i.DEMAND 
                                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'
                                                                LEFT JOIN ITXVIEW_PELANGGAN ip ON ip.CODE = p.ORIGDLVSALORDLINESALORDERCODE
                                                                LEFT JOIN ITXVIEWKGBRUTOBONORDER2_FKF i2 ON i2.CODE = p.CODE
                                                                LEFT JOIN ITXVIEWKGBRUTOBONORDER2_FKF i3 ON  i3.CODE = p.CODE
                                                                LEFT JOIN ITXVIEWKGBRUTOBONORDER2_FKF i4 ON  i4.CODE = p.CODE
                                                                LEFT JOIN ITXVIEWKGBRUTOBONORDER2_FKF i5 ON  i5.CODE = p.CODE
                                                                LEFT JOIN SALESORDERDELIVERY s2 ON s2.SALESORDERLINESALESORDERCODE = p.DLVSALORDERLINESALESORDERCODE 
                                                                                                AND s2.SALESORDERLINEORDERLINE = p.DLVSALESORDERLINEORDERLINE
                                                                WHERE
                                                                    (p2.WORKCENTERCODE = 'P3RS1' OR p2.WORKCENTERCODE = 'P3SU1' OR p2.WORKCENTERCODE = 'P3ST1' OR p2.WORKCENTERCODE = 'P3CP1' OR p2.WORKCENTERCODE = 'P3TD1' OR p2.WORKCENTERCODE = 'P3SH1'
                                                                    OR p2.WORKCENTERCODE = 'P3CO1'OR p2.WORKCENTERCODE = 'P3AR1'OR p2.WORKCENTERCODE = 'P3BC1')
                                                                    AND i.CREATIONDATETIME_SALESORDER BETWEEN '$_POST[tgl]' AND '$_POST[tgl2]'
                                                                    AND a.VALUESTRING IS NULL
                                                                    AND NOT p.ORIGDLVSALORDLINESALORDERCODE IS NULL
                                                                --	AND ip.BUYER = 'ATH'
                                                                    -- AND p2.OPERATIONCODE = '$_POST[opr]'
                                                                --	AND TRIM(p.SUBCODE02) = 'SJY'
                                                                --	AND TRIM(p.SUBCODE03) = '11256'
                                                                GROUP BY 
                                                                p2.OPERATIONCODE,
                                                                i2.ITEMTYPE_DEMAND,
                                                                i3.ITEMTYPE_DEMAND,
                                                                i4.ITEMTYPE_DEMAND,
                                                                i5.ITEMTYPE_DEMAND,
                                                                s2.DELIVERYDATE,
                                                                s2.CREATIONDATETIME,
                                                                ip.BUYER,
                                                                p2.OPERATIONCODE,
                                                                TRIM(p.SUBCODE02),
                                                                TRIM(p.SUBCODE03)
                                                                )
                                                                GROUP BY 
                                                                -- s2,
                                                                -- s3,
                                                                buyer
                                                                -- operationcode
";
                                                                $db_stocktransaction = db2_exec($conn1, $query, array('cursor' => DB2_SCROLLABLE));
                                                                $no = 1;
                                                                while ($row_stocktransaction = db2_fetch_assoc($db_stocktransaction)) {
                                                                    $query2 = "SELECT  
                                                                    -- buyer,
                                                                    -- CONCAT (s2,s3) AS item,
                                                                    operationcode,
                                                                    sum(CASE 
                                                                    WHEN bulan = 1 THEN qty1 ELSE null END) AS bln1_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 1 THEN qty2 ELSE null END) AS bln1_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 1 THEN qty3 ELSE null END) AS bln1_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 1 THEN qty4 ELSE null END) AS bln1_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 2 THEN qty1 ELSE null END) AS bln2_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 2 THEN qty2 ELSE null END) AS bln2_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 2 THEN qty3 ELSE null END) AS bln2_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 2 THEN qty4 ELSE null END) AS bln2_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 3 THEN qty1 ELSE null END) AS bln3_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 3 THEN qty2 ELSE null END) AS bln3_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 3 THEN qty3 ELSE null END) AS bln3_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 3 THEN qty4 ELSE null END) AS bln3_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 4 THEN qty1 ELSE null END) AS bln4_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 4 THEN qty2 ELSE null END) AS bln4_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 4 THEN qty3 ELSE null END) AS bln4_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 4 THEN qty4 ELSE null END) AS bln4_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 5 THEN qty1 ELSE null END) AS bln5_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 5 THEN qty2 ELSE null END) AS bln5_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 5 THEN qty3 ELSE null END) AS bln5_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 5 THEN qty4 ELSE null END) AS bln5_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 6 THEN qty1 ELSE null END) AS bln6_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 6 THEN qty2 ELSE null END) AS bln6_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 6 THEN qty3 ELSE null END) AS bln6_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 6 THEN qty4 ELSE null END) AS bln6_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 7 THEN qty1 ELSE null END) AS bln7_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 7 THEN qty2 ELSE null END) AS bln7_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 7 THEN qty3 ELSE null END) AS bln7_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 7 THEN qty4 ELSE null END) AS bln7_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 8 THEN qty1 ELSE null END) AS bln8_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 8 THEN qty2 ELSE null END) AS bln8_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 8 THEN qty3 ELSE null END) AS bln8_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 8 THEN qty4 ELSE null END) AS bln8_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 9 THEN qty1 ELSE null END) AS bln9_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 9 THEN qty2 ELSE null END) AS bln9_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 9 THEN qty3 ELSE null END) AS bln9_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 9 THEN qty4 ELSE null END) AS bln9_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 10 THEN qty1 ELSE null END) AS bln10_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 10 THEN qty2 ELSE null END) AS bln10_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 10 THEN qty3 ELSE null END) AS bln10_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 10 THEN qty4 ELSE null END) AS bln10_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 11 THEN qty1 ELSE null END) AS bln11_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 11 THEN qty2 ELSE null END) AS bln11_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 11 THEN qty3 ELSE null END) AS bln11_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 11 THEN qty4 ELSE null END) AS bln11_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 12 THEN qty1 ELSE null END) AS bln12_week1,
                                                                    sum(CASE
                                                                    WHEN bulan = 12 THEN qty2 ELSE null END) AS bln12_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 12 THEN qty3 ELSE null END) AS bln12_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 12 THEN qty4 ELSE null END) AS bln12_week4
                                                                    --sum(qty2) AS qty2,
                                                                    --sum(qty3) AS qty3,
                                                                    --sum(qty4) AS qty4
                                                                    FROM (
                                                                    SELECT DISTINCT
                                                                        CASE
                                                                            WHEN DAY(s2.DELIVERYDATE) BETWEEN 1 AND 7 THEN  1 
                                                                            WHEN DAY(s2.DELIVERYDATE) BETWEEN 8 AND 15 THEN  2
                                                                            WHEN DAY(s2.DELIVERYDATE) BETWEEN 16 AND 23 THEN  3 
                                                                            WHEN DAY(s2.DELIVERYDATE) BETWEEN 24 AND 31 THEN  4
                                                                        END AS MINGGU,
                                                                        MONTH (s2.DELIVERYDATE) AS BULAN,
                                                                        TRIM(p.SUBCODE02) AS S2,
                                                                        TRIM(p.SUBCODE03) AS S3,
                                                                        ip.BUYER,
                                                                        p2.OPERATIONCODE,
                                                                        CASE
                                                                            WHEN i2.ITEMTYPE_DEMAND = 'KFF' AND DAY(s2.DELIVERYDATE) BETWEEN 1 AND 7 THEN sum(i2.USERPRIMARYQUANTITY) 
                                                                            WHEN i2.ITEMTYPE_DEMAND = 'FKF' AND DAY(s2.DELIVERYDATE) BETWEEN 1 AND 7 THEN sum(i2.USERSECONDARYQUANTITY)
                                                                        END AS QTY1,
                                                                        CASE
                                                                            WHEN i3.ITEMTYPE_DEMAND = 'KFF' AND DAY(s2.DELIVERYDATE) BETWEEN 8 AND 15 THEN sum(i3.USERPRIMARYQUANTITY) 
                                                                            WHEN i3.ITEMTYPE_DEMAND = 'FKF' AND DAY(s2.DELIVERYDATE) BETWEEN 8 AND 15 THEN sum(i3.USERSECONDARYQUANTITY)
                                                                        END AS QTY2,
                                                                        CASE
                                                                            WHEN i4.ITEMTYPE_DEMAND = 'KFF' AND DAY(s2.DELIVERYDATE) BETWEEN 16 AND 23 THEN sum(i4.USERPRIMARYQUANTITY) 
                                                                            WHEN i4.ITEMTYPE_DEMAND = 'FKF' AND DAY(s2.DELIVERYDATE) BETWEEN 16 AND 23 THEN sum(i4.USERSECONDARYQUANTITY)
                                                                        END AS QTY3,
                                                                        CASE
                                                                            WHEN i5.ITEMTYPE_DEMAND = 'KFF' AND DAY(s2.DELIVERYDATE) BETWEEN 24 AND 31 THEN sum(i5.USERPRIMARYQUANTITY) 
                                                                            WHEN i5.ITEMTYPE_DEMAND = 'FKF' AND DAY(s2.DELIVERYDATE) BETWEEN 24 AND 31 THEN sum(i5.USERSECONDARYQUANTITY)
                                                                        END AS QTY4
                                                                    FROM
                                                                        ITXVIEWBONORDER i 
                                                                    LEFT JOIN PRODUCTIONDEMAND p ON p.CODE = i.DEMAND 
                                                                    LEFT JOIN PRODUCTIONDEMANDSTEP p2 ON p2.PRODUCTIONDEMANDCODE = i.DEMAND 
                                                                    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'
                                                                    LEFT JOIN ITXVIEW_PELANGGAN ip ON ip.CODE = p.ORIGDLVSALORDLINESALORDERCODE
                                                                    LEFT JOIN ITXVIEWKGBRUTOBONORDER2_FKF i2 ON i2.CODE = p.CODE
                                                                    LEFT JOIN ITXVIEWKGBRUTOBONORDER2_FKF i3 ON  i3.CODE = p.CODE
                                                                    LEFT JOIN ITXVIEWKGBRUTOBONORDER2_FKF i4 ON  i4.CODE = p.CODE
                                                                    LEFT JOIN ITXVIEWKGBRUTOBONORDER2_FKF i5 ON  i5.CODE = p.CODE
                                                                    LEFT JOIN SALESORDERDELIVERY s2 ON s2.SALESORDERLINESALESORDERCODE = p.DLVSALORDERLINESALESORDERCODE 
                                                                                                    AND s2.SALESORDERLINEORDERLINE = p.DLVSALESORDERLINEORDERLINE
                                                                    WHERE
                                                                        (p2.WORKCENTERCODE = 'P3RS1' OR p2.WORKCENTERCODE = 'P3SU1' OR p2.WORKCENTERCODE = 'P3ST1' OR p2.WORKCENTERCODE = 'P3CP1' OR p2.WORKCENTERCODE = 'P3TD1' OR p2.WORKCENTERCODE = 'P3SH1'
                                                                        OR p2.WORKCENTERCODE = 'P3CO1'OR p2.WORKCENTERCODE = 'P3AR1'OR p2.WORKCENTERCODE = 'P3BC1')
                                                                        AND i.CREATIONDATETIME_SALESORDER BETWEEN '$_POST[tgl]' AND '$_POST[tgl2]'
                                                                        AND a.VALUESTRING IS NULL
                                                                        AND NOT p.ORIGDLVSALORDLINESALORDERCODE IS NULL
                                                                    	AND ip.BUYER = '$row_stocktransaction[BUYER]'
                                                                        -- AND p2.OPERATIONCODE = '$_POST[opr]'
                                                                    --	AND TRIM(p.SUBCODE02) = 'SJY'
                                                                    --	AND TRIM(p.SUBCODE03) = '11256'
                                                                    GROUP BY 
                                                                    p2.OPERATIONCODE,
                                                                    i2.ITEMTYPE_DEMAND,
                                                                    i3.ITEMTYPE_DEMAND,
                                                                    i4.ITEMTYPE_DEMAND,
                                                                    i5.ITEMTYPE_DEMAND,
                                                                    s2.DELIVERYDATE,
                                                                    s2.CREATIONDATETIME,
                                                                    ip.BUYER,
                                                                    p2.OPERATIONCODE,
                                                                    TRIM(p.SUBCODE02),
                                                                    TRIM(p.SUBCODE03)
                                                                    )
                                                                    GROUP BY 
                                                                    operationcode";
                                                                    $db_stocktransaction2 = db2_exec($conn1, $query2, array('cursor' => DB2_SCROLLABLE));
                                                                    while ($row_stocktransaction2 = db2_fetch_assoc($db_stocktransaction2)) {
                                                                        $query3 = "SELECT  
                                                                    -- buyer,
                                                                    CONCAT (s2,s3) AS item,
                                                                    -- operationcode,
                                                                    sum(CASE 
                                                                    WHEN bulan = 1 THEN qty1 ELSE null END) AS bln1_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 1 THEN qty2 ELSE null END) AS bln1_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 1 THEN qty3 ELSE null END) AS bln1_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 1 THEN qty4 ELSE null END) AS bln1_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 2 THEN qty1 ELSE null END) AS bln2_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 2 THEN qty2 ELSE null END) AS bln2_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 2 THEN qty3 ELSE null END) AS bln2_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 2 THEN qty4 ELSE null END) AS bln2_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 3 THEN qty1 ELSE null END) AS bln3_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 3 THEN qty2 ELSE null END) AS bln3_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 3 THEN qty3 ELSE null END) AS bln3_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 3 THEN qty4 ELSE null END) AS bln3_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 4 THEN qty1 ELSE null END) AS bln4_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 4 THEN qty2 ELSE null END) AS bln4_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 4 THEN qty3 ELSE null END) AS bln4_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 4 THEN qty4 ELSE null END) AS bln4_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 5 THEN qty1 ELSE null END) AS bln5_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 5 THEN qty2 ELSE null END) AS bln5_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 5 THEN qty3 ELSE null END) AS bln5_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 5 THEN qty4 ELSE null END) AS bln5_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 6 THEN qty1 ELSE null END) AS bln6_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 6 THEN qty2 ELSE null END) AS bln6_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 6 THEN qty3 ELSE null END) AS bln6_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 6 THEN qty4 ELSE null END) AS bln6_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 7 THEN qty1 ELSE null END) AS bln7_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 7 THEN qty2 ELSE null END) AS bln7_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 7 THEN qty3 ELSE null END) AS bln7_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 7 THEN qty4 ELSE null END) AS bln7_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 8 THEN qty1 ELSE null END) AS bln8_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 8 THEN qty2 ELSE null END) AS bln8_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 8 THEN qty3 ELSE null END) AS bln8_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 8 THEN qty4 ELSE null END) AS bln8_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 9 THEN qty1 ELSE null END) AS bln9_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 9 THEN qty2 ELSE null END) AS bln9_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 9 THEN qty3 ELSE null END) AS bln9_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 9 THEN qty4 ELSE null END) AS bln9_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 10 THEN qty1 ELSE null END) AS bln10_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 10 THEN qty2 ELSE null END) AS bln10_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 10 THEN qty3 ELSE null END) AS bln10_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 10 THEN qty4 ELSE null END) AS bln10_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 11 THEN qty1 ELSE null END) AS bln11_week1,
                                                                    sum(CASE 
                                                                    WHEN bulan = 11 THEN qty2 ELSE null END) AS bln11_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 11 THEN qty3 ELSE null END) AS bln11_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 11 THEN qty4 ELSE null END) AS bln11_week4,
                                                                    sum(CASE 
                                                                    WHEN bulan = 12 THEN qty1 ELSE null END) AS bln12_week1,
                                                                    sum(CASE
                                                                    WHEN bulan = 12 THEN qty2 ELSE null END) AS bln12_week2,
                                                                    sum(CASE 
                                                                    WHEN bulan = 12 THEN qty3 ELSE null END) AS bln12_week3,
                                                                    sum(CASE 
                                                                    WHEN bulan = 12 THEN qty4 ELSE null END) AS bln12_week4
                                                                    --sum(qty2) AS qty2,
                                                                    --sum(qty3) AS qty3,
                                                                    --sum(qty4) AS qty4
                                                                    FROM (
                                                                    SELECT DISTINCT
                                                                        CASE
                                                                            WHEN DAY(s2.DELIVERYDATE) BETWEEN 1 AND 7 THEN  1 
                                                                            WHEN DAY(s2.DELIVERYDATE) BETWEEN 8 AND 15 THEN  2
                                                                            WHEN DAY(s2.DELIVERYDATE) BETWEEN 16 AND 23 THEN  3 
                                                                            WHEN DAY(s2.DELIVERYDATE) BETWEEN 24 AND 31 THEN  4
                                                                        END AS MINGGU,
                                                                        MONTH (s2.DELIVERYDATE) AS BULAN,
                                                                        TRIM(p.SUBCODE02) AS S2,
                                                                        TRIM(p.SUBCODE03) AS S3,
                                                                        ip.BUYER,
                                                                        p2.OPERATIONCODE,
                                                                        CASE
                                                                            WHEN i2.ITEMTYPE_DEMAND = 'KFF' AND DAY(s2.DELIVERYDATE) BETWEEN 1 AND 7 THEN sum(i2.USERPRIMARYQUANTITY) 
                                                                            WHEN i2.ITEMTYPE_DEMAND = 'FKF' AND DAY(s2.DELIVERYDATE) BETWEEN 1 AND 7 THEN sum(i2.USERSECONDARYQUANTITY)
                                                                        END AS QTY1,
                                                                        CASE
                                                                            WHEN i3.ITEMTYPE_DEMAND = 'KFF' AND DAY(s2.DELIVERYDATE) BETWEEN 8 AND 15 THEN sum(i3.USERPRIMARYQUANTITY) 
                                                                            WHEN i3.ITEMTYPE_DEMAND = 'FKF' AND DAY(s2.DELIVERYDATE) BETWEEN 8 AND 15 THEN sum(i3.USERSECONDARYQUANTITY)
                                                                        END AS QTY2,
                                                                        CASE
                                                                            WHEN i4.ITEMTYPE_DEMAND = 'KFF' AND DAY(s2.DELIVERYDATE) BETWEEN 16 AND 23 THEN sum(i4.USERPRIMARYQUANTITY) 
                                                                            WHEN i4.ITEMTYPE_DEMAND = 'FKF' AND DAY(s2.DELIVERYDATE) BETWEEN 16 AND 23 THEN sum(i4.USERSECONDARYQUANTITY)
                                                                        END AS QTY3,
                                                                        CASE
                                                                            WHEN i5.ITEMTYPE_DEMAND = 'KFF' AND DAY(s2.DELIVERYDATE) BETWEEN 24 AND 31 THEN sum(i5.USERPRIMARYQUANTITY) 
                                                                            WHEN i5.ITEMTYPE_DEMAND = 'FKF' AND DAY(s2.DELIVERYDATE) BETWEEN 24 AND 31 THEN sum(i5.USERSECONDARYQUANTITY)
                                                                        END AS QTY4
                                                                    FROM
                                                                        ITXVIEWBONORDER i 
                                                                    LEFT JOIN PRODUCTIONDEMAND p ON p.CODE = i.DEMAND 
                                                                    LEFT JOIN PRODUCTIONDEMANDSTEP p2 ON p2.PRODUCTIONDEMANDCODE = i.DEMAND 
                                                                    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'
                                                                    LEFT JOIN ITXVIEW_PELANGGAN ip ON ip.CODE = p.ORIGDLVSALORDLINESALORDERCODE
                                                                    LEFT JOIN ITXVIEWKGBRUTOBONORDER2_FKF i2 ON i2.CODE = p.CODE
                                                                    LEFT JOIN ITXVIEWKGBRUTOBONORDER2_FKF i3 ON  i3.CODE = p.CODE
                                                                    LEFT JOIN ITXVIEWKGBRUTOBONORDER2_FKF i4 ON  i4.CODE = p.CODE
                                                                    LEFT JOIN ITXVIEWKGBRUTOBONORDER2_FKF i5 ON  i5.CODE = p.CODE
                                                                    LEFT JOIN SALESORDERDELIVERY s2 ON s2.SALESORDERLINESALESORDERCODE = p.DLVSALORDERLINESALESORDERCODE 
                                                                                                    AND s2.SALESORDERLINEORDERLINE = p.DLVSALESORDERLINEORDERLINE
                                                                    WHERE
                                                                        (p2.WORKCENTERCODE = 'P3RS1' OR p2.WORKCENTERCODE = 'P3SU1' OR p2.WORKCENTERCODE = 'P3ST1' OR p2.WORKCENTERCODE = 'P3CP1' OR p2.WORKCENTERCODE = 'P3TD1' OR p2.WORKCENTERCODE = 'P3SH1'
                                                                        OR p2.WORKCENTERCODE = 'P3CO1'OR p2.WORKCENTERCODE = 'P3AR1'OR p2.WORKCENTERCODE = 'P3BC1')
                                                                        AND i.CREATIONDATETIME_SALESORDER BETWEEN '$_POST[tgl]' AND '$_POST[tgl2]'
                                                                        AND a.VALUESTRING IS NULL
                                                                        AND NOT p.ORIGDLVSALORDLINESALORDERCODE IS NULL
                                                                    	AND ip.BUYER = '$row_stocktransaction[BUYER]'
                                                                        AND p2.OPERATIONCODE = '$row_stocktransaction2[OPERATIONCODE]'
                                                                    --	AND TRIM(p.SUBCODE02) = 'SJY'
                                                                    --	AND TRIM(p.SUBCODE03) = '11256'
                                                                    GROUP BY 
                                                                    p2.OPERATIONCODE,
                                                                    i2.ITEMTYPE_DEMAND,
                                                                    i3.ITEMTYPE_DEMAND,
                                                                    i4.ITEMTYPE_DEMAND,
                                                                    i5.ITEMTYPE_DEMAND,
                                                                    s2.DELIVERYDATE,
                                                                    s2.CREATIONDATETIME,
                                                                    ip.BUYER,
                                                                    p2.OPERATIONCODE,
                                                                    TRIM(p.SUBCODE02),
                                                                    TRIM(p.SUBCODE03)
                                                                    )
                                                                    GROUP BY 
                                                                    s2,
                                                                    s3";
                                                                        $db_stocktransaction3 = db2_exec($conn1, $query3, array('cursor' => DB2_SCROLLABLE));
                                                                        while ($row_stocktransaction3 = db2_fetch_assoc($db_stocktransaction3)) {

                                                                            if ($current_buyer != $row_stocktransaction['BUYER']) {
                                                                                echo "<tr>";
                                                                                echo "<td>" . $no++ . "</td>";
                                                                                echo "<td>" . $row_stocktransaction['BUYER'] . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN1_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN1_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN1_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN1_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN2_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN2_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN2_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN2_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN3_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN3_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN3_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN3_WEEK4']) . "</td>";
                                                                                // echo "<td>" . number_format($row_stocktransaction['BLN3_WEEK1']) . "</td>";
                                                                                // echo "<td>" . number_format($row_stocktransaction['BLN3_WEEK2']) . "</td>";
                                                                                // echo "<td>" . number_format($row_stocktransaction['BLN3_WEEK3']) . "</td>";
                                                                                // echo "<td>" . number_format($row_stocktransaction['BLN3_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN4_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN4_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN4_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN4_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN5_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN5_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN5_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN5_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN6_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN6_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN6_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN6_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN7_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN7_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN7_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN7_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN8_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN8_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN8_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN8_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN9_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN9_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN9_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN9_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN10_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN10_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN10_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN10_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN11_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN11_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN11_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN11_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN12_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN12_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN12_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN12_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction['BLN1_WEEK1'] + $row_stocktransaction['BLN1_WEEK2'] + $row_stocktransaction['BLN1_WEEK3'] + $row_stocktransaction['BLN1_WEEK4'] + $row_stocktransaction['BLN2_WEEK1'] + $row_stocktransaction['BLN2_WEEK2'] + $row_stocktransaction['BLN2_WEEK3'] + $row_stocktransaction['BLN2_WEEK4'] + $row_stocktransaction['BLN3_WEEK1'] + $row_stocktransaction['BLN3_WEEK2'] + $row_stocktransaction['BLN3_WEEK3'] + $row_stocktransaction['BLN3_WEEK4'] + $row_stocktransaction['BLN4_WEEK1'] + $row_stocktransaction['BLN4_WEEK2'] + $row_stocktransaction['BLN4_WEEK3'] + $row_stocktransaction['BLN4_WEEK4'] + $row_stocktransaction['BLN5_WEEK1'] + $row_stocktransaction['BLN5_WEEK2'] + $row_stocktransaction['BLN5_WEEK3'] + $row_stocktransaction['BLN5_WEEK4'] + $row_stocktransaction['BLN6_WEEK1'] + $row_stocktransaction['BLN6_WEEK2'] + $row_stocktransaction['BLN6_WEEK3'] + $row_stocktransaction['BLN6_WEEK4'] + $row_stocktransaction['BLN7_WEEK1'] + $row_stocktransaction['BLN7_WEEK2'] + $row_stocktransaction['BLN7_WEEK3'] + $row_stocktransaction['BLN7_WEEK4'] + $row_stocktransaction['BLN8_WEEK1'] + $row_stocktransaction['BLN8_WEEK2'] + $row_stocktransaction['BLN8_WEEK3'] + $row_stocktransaction['BLN8_WEEK4'] + $row_stocktransaction['BLN9_WEEK1'] + $row_stocktransaction['BLN9_WEEK2'] + $row_stocktransaction['BLN9_WEEK3'] + $row_stocktransaction['BLN9_WEEK4'] + $row_stocktransaction['BLN10_WEEK1'] + $row_stocktransaction['BLN10_WEEK2'] + $row_stocktransaction['BLN10_WEEK3'] + $row_stocktransaction['BLN10_WEEK4'] + $row_stocktransaction['BLN11_WEEK1'] + $row_stocktransaction['BLN11_WEEK2'] + $row_stocktransaction['BLN11_WEEK3'] + $row_stocktransaction['BLN11_WEEK4'] + $row_stocktransaction['BLN12_WEEK1'] + $row_stocktransaction['BLN12_WEEK2'] + $row_stocktransaction['BLN12_WEEK3'] + $row_stocktransaction['BLN12_WEEK4']) . "</td>";
                                                                                echo "</tr>";
                                                                                $current_buyer = $row_stocktransaction['BUYER'];
                                                                            }

                                                                            if ($current_operation != $row_stocktransaction2['OPERATIONCODE']) {
                                                                                // Tampilkan operasi dan data transaksi
                                                                                echo "<tr>";
                                                                                echo "<td></td>"; // Kolom nomor kosong
                                                                                echo "<td>" . $row_stocktransaction2['OPERATIONCODE'] . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN1_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN1_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN1_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN1_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN2_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN2_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN2_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN2_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN3_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN3_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN3_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN3_WEEK4']) . "</td>";
                                                                                // echo "<td>" . number_format($row_stocktransaction2['BLN3_WEEK1']) . "</td>";
                                                                                // echo "<td>" . number_format($row_stocktransaction2['BLN3_WEEK2']) . "</td>";
                                                                                // echo "<td>" . number_format($row_stocktransaction2['BLN3_WEEK3']) . "</td>";
                                                                                // echo "<td>" . number_format($row_stocktransaction2['BLN3_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN4_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN4_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN4_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN4_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN5_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN5_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN5_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN5_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN6_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN6_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN6_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN6_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN7_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN7_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN7_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN7_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN8_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN8_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN8_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN8_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN9_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN9_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN9_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN9_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN10_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN10_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN10_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN10_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN11_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN11_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN11_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN11_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN12_WEEK1']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN12_WEEK2']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN12_WEEK3']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN12_WEEK4']) . "</td>";
                                                                                echo "<td>" . number_format($row_stocktransaction2['BLN1_WEEK1'] + $row_stocktransaction2['BLN1_WEEK2'] + $row_stocktransaction2['BLN1_WEEK3'] + $row_stocktransaction2['BLN1_WEEK4'] + $row_stocktransaction2['BLN2_WEEK1'] + $row_stocktransaction2['BLN2_WEEK2'] + $row_stocktransaction2['BLN2_WEEK3'] + $row_stocktransaction2['BLN2_WEEK4'] + $row_stocktransaction2['BLN3_WEEK1'] + $row_stocktransaction2['BLN3_WEEK2'] + $row_stocktransaction2['BLN3_WEEK3'] + $row_stocktransaction2['BLN3_WEEK4'] + $row_stocktransaction2['BLN4_WEEK1'] + $row_stocktransaction2['BLN4_WEEK2'] + $row_stocktransaction2['BLN4_WEEK3'] + $row_stocktransaction2['BLN4_WEEK4'] + $row_stocktransaction2['BLN5_WEEK1'] + $row_stocktransaction2['BLN5_WEEK2'] + $row_stocktransaction2['BLN5_WEEK3'] + $row_stocktransaction2['BLN5_WEEK4'] + $row_stocktransaction2['BLN6_WEEK1'] + $row_stocktransaction2['BLN6_WEEK2'] + $row_stocktransaction2['BLN6_WEEK3'] + $row_stocktransaction2['BLN6_WEEK4'] + $row_stocktransaction2['BLN7_WEEK1'] + $row_stocktransaction2['BLN7_WEEK2'] + $row_stocktransaction2['BLN7_WEEK3'] + $row_stocktransaction2['BLN7_WEEK4'] + $row_stocktransaction2['BLN8_WEEK1'] + $row_stocktransaction2['BLN8_WEEK2'] + $row_stocktransaction2['BLN8_WEEK3'] + $row_stocktransaction2['BLN8_WEEK4'] + $row_stocktransaction2['BLN9_WEEK1'] + $row_stocktransaction2['BLN9_WEEK2'] + $row_stocktransaction2['BLN9_WEEK3'] + $row_stocktransaction2['BLN9_WEEK4'] + $row_stocktransaction2['BLN10_WEEK1'] + $row_stocktransaction2['BLN10_WEEK2'] + $row_stocktransaction2['BLN10_WEEK3'] + $row_stocktransaction2['BLN10_WEEK4'] + $row_stocktransaction2['BLN11_WEEK1'] + $row_stocktransaction2['BLN11_WEEK2'] + $row_stocktransaction2['BLN11_WEEK3'] + $row_stocktransaction2['BLN11_WEEK4'] + $row_stocktransaction2['BLN12_WEEK1'] + $row_stocktransaction2['BLN12_WEEK2'] + $row_stocktransaction2['BLN12_WEEK3'] + $row_stocktransaction2['BLN12_WEEK4']) . "</td>";
                                                                                echo "</tr>";
                                                                                $current_operation = $row_stocktransaction2['OPERATIONCODE'];
                                                                            }
                                                                            echo "<tr>";
                                                                            echo "<td></td>"; // Kolom nomor kosong
                                                                            echo "<td>" . $row_stocktransaction3['ITEM'] . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN1_WEEK2']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN1_WEEK1']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN1_WEEK3']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN1_WEEK4']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN2_WEEK1']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN2_WEEK2']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN2_WEEK3']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN2_WEEK4']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN3_WEEK1']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN3_WEEK2']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN3_WEEK3']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN3_WEEK4']) . "</td>";
                                                                            // echo "<td>" . number_format($row_stocktransaction2['BLN3_WEEK1']) . "</td>";
                                                                            // echo "<td>" . number_format($row_stocktransaction2['BLN3_WEEK2']) . "</td>";
                                                                            // echo "<td>" . number_format($row_stocktransaction2['BLN3_WEEK3']) . "</td>";
                                                                            // echo "<td>" . number_format($row_stocktransaction2['BLN3_WEEK4']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN4_WEEK1']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN4_WEEK2']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN4_WEEK3']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN4_WEEK4']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN5_WEEK1']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN5_WEEK2']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN5_WEEK3']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN5_WEEK4']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN6_WEEK1']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN6_WEEK2']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN6_WEEK3']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN6_WEEK4']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN7_WEEK1']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN7_WEEK2']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN7_WEEK3']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN7_WEEK4']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN8_WEEK1']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN8_WEEK2']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN8_WEEK3']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN8_WEEK4']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN9_WEEK1']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN9_WEEK2']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN9_WEEK3']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN9_WEEK4']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN10_WEEK1']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN10_WEEK2']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN10_WEEK3']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN10_WEEK4']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN11_WEEK1']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN11_WEEK2']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN11_WEEK3']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN11_WEEK4']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN12_WEEK1']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN12_WEEK2']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN12_WEEK3']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN12_WEEK4']) . "</td>";
                                                                            echo "<td>" . number_format($row_stocktransaction3['BLN1_WEEK1'] + $row_stocktransaction3['BLN1_WEEK2'] + $row_stocktransaction3['BLN1_WEEK3'] + $row_stocktransaction3['BLN1_WEEK4'] + $row_stocktransaction3['BLN2_WEEK1'] + $row_stocktransaction3['BLN2_WEEK2'] + $row_stocktransaction3['BLN2_WEEK3'] + $row_stocktransaction3['BLN2_WEEK4'] + $row_stocktransaction3['BLN3_WEEK1'] + $row_stocktransaction3['BLN3_WEEK2'] + $row_stocktransaction3['BLN3_WEEK3'] + $row_stocktransaction3['BLN3_WEEK4'] + $row_stocktransaction3['BLN4_WEEK1'] + $row_stocktransaction3['BLN4_WEEK2'] + $row_stocktransaction3['BLN4_WEEK3'] + $row_stocktransaction3['BLN4_WEEK4'] + $row_stocktransaction3['BLN5_WEEK1'] + $row_stocktransaction3['BLN5_WEEK2'] + $row_stocktransaction3['BLN5_WEEK3'] + $row_stocktransaction3['BLN5_WEEK4'] + $row_stocktransaction3['BLN6_WEEK1'] + $row_stocktransaction3['BLN6_WEEK2'] + $row_stocktransaction3['BLN6_WEEK3'] + $row_stocktransaction3['BLN6_WEEK4'] + $row_stocktransaction3['BLN7_WEEK1'] + $row_stocktransaction3['BLN7_WEEK2'] + $row_stocktransaction3['BLN7_WEEK3'] + $row_stocktransaction3['BLN7_WEEK4'] + $row_stocktransaction3['BLN8_WEEK1'] + $row_stocktransaction3['BLN8_WEEK2'] + $row_stocktransaction3['BLN8_WEEK3'] + $row_stocktransaction3['BLN8_WEEK4'] + $row_stocktransaction3['BLN9_WEEK1'] + $row_stocktransaction3['BLN9_WEEK2'] + $row_stocktransaction3['BLN9_WEEK3'] + $row_stocktransaction3['BLN9_WEEK4'] + $row_stocktransaction3['BLN10_WEEK1'] + $row_stocktransaction3['BLN10_WEEK2'] + $row_stocktransaction3['BLN10_WEEK3'] + $row_stocktransaction3['BLN10_WEEK4'] + $row_stocktransaction3['BLN11_WEEK1'] + $row_stocktransaction3['BLN11_WEEK2'] + $row_stocktransaction3['BLN11_WEEK3'] + $row_stocktransaction3['BLN11_WEEK4'] + $row_stocktransaction3['BLN12_WEEK1'] + $row_stocktransaction3['BLN12_WEEK2'] + $row_stocktransaction3['BLN12_WEEK3'] + $row_stocktransaction['BLN12_WEEK4']) . "</td>";
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