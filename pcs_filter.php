<!DOCTYPE html>
<html lang="en">

<head>
    <title>PCS - History Pembelian Barang</title>
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
    <link rel="stylesheet" type="text/css" href="files\bower_components\bootstrap-multiselect\css\bootstrap-multiselect.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\multiselect\css\multi-select.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\prism\prism.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\pcoded-horizontal.min.css">

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
                                        <h5>History Pembelian Barang</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-12 m-b-30">
                                                    <h4 class="sub-title">Pilih Barang:</h4>
                                                    <select name="kode_barang" class="js-example-basic-single col-sm-12" style="width: 100%;" required>
                                                        <option value="" disabled selected>Pilih Barang</option>
                                                        <?php 
                                                            require_once "koneksi.php"; 
                                                            $sqlDB="SELECT
                                                                        a.LONGDESCRIPTION,
                                                                        p.ITEMDESCRIPTION,
                                                                        CASE WHEN a.SUBCODE01 = ' ' THEN '-' ELSE TRIM( a.SUBCODE01 ) END || ' ' || 
                                                                        CASE WHEN a.SUBCODE02 = ' ' THEN '-' ELSE TRIM( a.SUBCODE02 ) END || ' ' || 
                                                                        CASE WHEN a.SUBCODE03 = ' ' THEN '-' ELSE TRIM( a.SUBCODE03 ) END || ' ' || 
                                                                        CASE WHEN a.SUBCODE04 = ' ' THEN '-' ELSE TRIM( a.SUBCODE04 ) END || ' ' || 
                                                                        CASE WHEN a.SUBCODE05 = ' ' THEN '-' ELSE TRIM( a.SUBCODE05 ) END || ' ' || 
                                                                        CASE WHEN a.SUBCODE06 = ' ' THEN '-' ELSE TRIM( a.SUBCODE06 ) END || ' ' || 
                                                                        CASE WHEN a.SUBCODE07 = ' ' THEN '-' ELSE TRIM( a.SUBCODE07 ) END || ' ' || 
                                                                        CASE WHEN a.SUBCODE08 = ' ' THEN '-' ELSE TRIM( a.SUBCODE08 ) END || ' ' || 
                                                                        CASE WHEN a.SUBCODE09 = ' ' THEN '-' ELSE TRIM( a.SUBCODE09 ) END || ' ' || 
                                                                        CASE WHEN a.SUBCODE10 = ' ' THEN '-' ELSE TRIM( a.SUBCODE10 ) END AS KODE_BARANG 
                                                                    FROM
                                                                        PRODUCT a
                                                                    RIGHT JOIN PURCHASEORDERLINE p ON CASE WHEN p.SUBCODE01 = ' ' THEN '-' ELSE TRIM( p.SUBCODE01 ) END = CASE WHEN a.SUBCODE01 = ' ' THEN '-' ELSE TRIM( a.SUBCODE01 ) END AND
                                                                                                    CASE WHEN p.SUBCODE02 = ' ' THEN '-' ELSE TRIM( p.SUBCODE02 ) END = CASE WHEN a.SUBCODE02 = ' ' THEN '-' ELSE TRIM( a.SUBCODE02 ) END AND
                                                                                                    CASE WHEN p.SUBCODE03 = ' ' THEN '-' ELSE TRIM( p.SUBCODE03 ) END = CASE WHEN a.SUBCODE03 = ' ' THEN '-' ELSE TRIM( a.SUBCODE03 ) END AND
                                                                                                    CASE WHEN p.SUBCODE04 = ' ' THEN '-' ELSE TRIM( p.SUBCODE04 ) END = CASE WHEN a.SUBCODE04 = ' ' THEN '-' ELSE TRIM( a.SUBCODE04 ) END AND
                                                                                                    CASE WHEN p.SUBCODE05 = ' ' THEN '-' ELSE TRIM( p.SUBCODE05 ) END = CASE WHEN a.SUBCODE05 = ' ' THEN '-' ELSE TRIM( a.SUBCODE05 ) END AND
                                                                                                    CASE WHEN p.SUBCODE06 = ' ' THEN '-' ELSE TRIM( p.SUBCODE06 ) END = CASE WHEN a.SUBCODE06 = ' ' THEN '-' ELSE TRIM( a.SUBCODE06 ) END AND
                                                                                                    CASE WHEN p.SUBCODE07 = ' ' THEN '-' ELSE TRIM( p.SUBCODE07 ) END = CASE WHEN a.SUBCODE07 = ' ' THEN '-' ELSE TRIM( a.SUBCODE07 ) END AND
                                                                                                    CASE WHEN p.SUBCODE08 = ' ' THEN '-' ELSE TRIM( p.SUBCODE08 ) END = CASE WHEN a.SUBCODE08 = ' ' THEN '-' ELSE TRIM( a.SUBCODE08 ) END AND
                                                                                                    CASE WHEN p.SUBCODE09 = ' ' THEN '-' ELSE TRIM( p.SUBCODE09 ) END = CASE WHEN a.SUBCODE09 = ' ' THEN '-' ELSE TRIM( a.SUBCODE09 ) END AND
                                                                                                    CASE WHEN p.SUBCODE10 = ' ' THEN '-' ELSE TRIM( p.SUBCODE10 ) END = CASE WHEN a.SUBCODE10 = ' ' THEN '-' ELSE TRIM( a.SUBCODE10 ) END 
                                                                    WHERE NOT 
                                                                        a.LONGDESCRIPTION LIKE '%To Be Deleted%'
                                                                    GROUP BY
                                                                        a.LONGDESCRIPTION,
                                                                        p.ITEMDESCRIPTION,
                                                                        a.SUBCODE01,
                                                                        a.SUBCODE02,
                                                                        a.SUBCODE03,
                                                                        a.SUBCODE04,
                                                                        a.SUBCODE05,
                                                                        a.SUBCODE06,
                                                                        a.SUBCODE07,
                                                                        a.SUBCODE08,
                                                                        a.SUBCODE09,
                                                                        a.SUBCODE10";
                                                            $stmt=db2_exec($conn1, $sqlDB);
                                                            while ($rowdb = db2_fetch_assoc($stmt)) {
                                                        ?>
                                                        <option value="<?= $rowdb['KODE_BARANG']; ?>">
                                                            <?= $rowdb['LONGDESCRIPTION']; ?>
                                                        </option>
                                                        <?php } ?> 
                                                    </select>
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
                                            <div class="table-responsive dt-responsive">
                                                <table id="excel-bg" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>NAMA BARANG</th>
                                                            <th>VENDOR</th>
                                                            <th>TANGGAL PEMESANAN</th>
                                                            <th>MATA UANG</th>
                                                            <th>HARGA SATUAN</th>
                                                            <th>SATUAN</th=>
                                                            <th>QTY</th>
                                                            <th>TOTAL HARGA (SETELAH PAJAK)</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            ini_set("error_reporting", 1);
                                                            session_start();
                                                            require_once "koneksi.php"; 
                                                        ?>
                                                        <?php
                                                            $kode_barang  = $_POST['kode_barang'];
                                                            $sqlDB2       = "SELECT
                                                                                    p2.CODE,
                                                                                    TRIM(p.SUBCODE01),TRIM(p.SUBCODE02),TRIM(p.SUBCODE03),TRIM(p.SUBCODE04),TRIM(p.SUBCODE05),
                                                                                    TRIM(p.SUBCODE06),TRIM(p.SUBCODE07),TRIM(p.SUBCODE08),TRIM(p.SUBCODE09),TRIM(p.SUBCODE10),
                                                                                    p.ITEMDESCRIPTION,
                                                                                    VARCHAR_FORMAT(p.CREATIONDATETIME, 'DD MONTH YYYY') AS TGL_PEMESANAN,
                                                                                    p.CREATIONDATETIME,
                                                                                    p.PRICE,
                                                                                    p.PRICEUNITOFMEASURECODE,
                                                                                    p.USERPRIMARYQUANTITY,
                                                                                    p.NETVALUEINCLUDINGTAX,
                                                                                    TRIM(p2.CURRENCYCODE) AS CURRENCYCODE,
                                                                                    b.LEGALNAME1  
                                                                                FROM
                                                                                    PURCHASEORDERLINE p 
                                                                                LEFT JOIN PURCHASEORDER p2 ON p2.CODE = p.PURCHASEORDERCODE 
                                                                                LEFT JOIN ORDERPARTNER o ON o.CUSTOMERSUPPLIERCODE = p2.ORDPRNCUSTOMERSUPPLIERCODE 
                                                                                LEFT JOIN BUSINESSPARTNER b ON b.NUMBERID = o.ORDERBUSINESSPARTNERNUMBERID
                                                                                WHERE 
                                                                                    CASE WHEN p.SUBCODE01 = ' ' THEN '-' ELSE TRIM( p.SUBCODE01 ) END || ' ' || 
                                                                                    CASE WHEN p.SUBCODE02 = ' ' THEN '-' ELSE TRIM( p.SUBCODE02 ) END || ' ' || 
                                                                                    CASE WHEN p.SUBCODE03 = ' ' THEN '-' ELSE TRIM( p.SUBCODE03 ) END || ' ' || 
                                                                                    CASE WHEN p.SUBCODE04 = ' ' THEN '-' ELSE TRIM( p.SUBCODE04 ) END || ' ' || 
                                                                                    CASE WHEN p.SUBCODE05 = ' ' THEN '-' ELSE TRIM( p.SUBCODE05 ) END || ' ' || 
                                                                                    CASE WHEN p.SUBCODE06 = ' ' THEN '-' ELSE TRIM( p.SUBCODE06 ) END || ' ' || 
                                                                                    CASE WHEN p.SUBCODE07 = ' ' THEN '-' ELSE TRIM( p.SUBCODE07 ) END || ' ' || 
                                                                                    CASE WHEN p.SUBCODE08 = ' ' THEN '-' ELSE TRIM( p.SUBCODE08 ) END || ' ' || 
                                                                                    CASE WHEN p.SUBCODE09 = ' ' THEN '-' ELSE TRIM( p.SUBCODE09 ) END || ' ' || 
                                                                                    CASE WHEN p.SUBCODE10 = ' ' THEN '-' ELSE TRIM( p.SUBCODE10 ) END = '$kode_barang'
                                                                                GROUP BY
                                                                                    p2.CODE,
                                                                                    p.SUBCODE01,p.SUBCODE02,p.SUBCODE03,p.SUBCODE04,p.SUBCODE05,
                                                                                    p.SUBCODE06,p.SUBCODE07,p.SUBCODE08,p.SUBCODE09,p.SUBCODE10,
                                                                                    p.ITEMDESCRIPTION,
                                                                                    p.FULLITEMIDENTIFIER,
                                                                                    p.CREATIONDATETIME,
                                                                                    p.PRICE,
                                                                                    p.PRICEUNITOFMEASURECODE,
                                                                                    p.USERPRIMARYQUANTITY,
                                                                                    p.NETVALUEINCLUDINGTAX,
                                                                                    p2.CURRENCYCODE,
                                                                                    b.LEGALNAME1 
                                                                                ORDER BY 
                                                                                    p.CREATIONDATETIME DESC";
                                                            $stmt = db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
                                                            $no = 1;
                                                            while ($rowdb2 = db2_fetch_assoc($stmt)) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $rowdb2['ITEMDESCRIPTION']; ?></td> <!-- NAMA BARANG -->
                                                            <td><?= $rowdb2['LEGALNAME1']; ?></td> <!-- VENDOR -->
                                                            <td><?= $rowdb2['TGL_PEMESANAN']; ?></td> <!-- TANGGAL PEMESANAN -->
                                                            <td align="center"><?= $rowdb2['CURRENCYCODE']; ?></td> <!-- MATA UANG -->
                                                            <td align="right"> 
                                                                <!-- HARGA SATUAN -->
                                                                <?php
                                                                    if($rowdb2['CURRENCYCODE'] == "USD") {
                                                                        echo number_format($rowdb2['PRICE'], 2,",",".");
                                                                    } else {
                                                                        echo number_format($rowdb2['PRICE'], 0,",",".");
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td align="center"><?= $rowdb2['PRICEUNITOFMEASURECODE']; ?></td> <!-- SATUAN -->
                                                            <td align="right"><?= number_format($rowdb2['USERPRIMARYQUANTITY'], 0,",","."); ?></td> <!-- QTY -->
                                                            <td align="right"> 
                                                                <!-- TOTAL HARGA (SETELAH PAJAK) -->
                                                                <?php
                                                                    if($rowdb2['CURRENCYCODE'] == "USD") {
                                                                        echo number_format($rowdb2['NETVALUEINCLUDINGTAX'], 2,",",".");
                                                                    } else {
                                                                        echo number_format($rowdb2['NETVALUEINCLUDINGTAX'], 0,",",".");
                                                                    }
                                                                ?>
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
    <script type="text/javascript" src="files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <script type="text/javascript" src="files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <script type="text/javascript" src="files\bower_components\modernizr\js\modernizr.js"></script>
    <script type="text/javascript" src="files\bower_components\modernizr\js\css-scrollbars.js"></script>

    <script type="text/javascript" src="files\bower_components\i18next\js\i18next.min.js"></script>
    <script type="text/javascript" src="files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
    <script type="text/javascript" src="files\bower_components\select2\js\select2.full.min.js"></script>
    <script type="text/javascript" src="files\bower_components\bootstrap-multiselect\js\bootstrap-multiselect.js"></script>
    <script type="text/javascript" src="files\bower_components\multiselect\js\jquery.multi-select.js"></script>
    <script type="text/javascript" src="files\assets\js\jquery.quicksearch.js"></script>
    <script type="text/javascript" src="files\assets\pages\advance-elements\select2-custom.js"></script>
    <script src="files\assets\js\pcoded.min.js"></script>
    <script src="files\assets\js\menu\menu-hori-fixed.js"></script>
    <script src="files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="files\assets\js\script.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

    <script type="text/javascript" src="files\assets\pages\prism\custom-prism.js"></script>
    <script src="files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="files\assets\js\script.js"></script>

    <script src="files\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
    <script src="files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
    <script src="files\assets\pages\data-table\js\jszip.min.js"></script>
    <script src="files\assets\pages\data-table\js\pdfmake.min.js"></script>
    <script src="files\assets\pages\data-table\js\vfs_fonts.js"></script>
    <script src="files\bower_components\datatables.net-buttons\js\buttons.print.min.js"></script>
    <script src="files\bower_components\datatables.net-buttons\js\buttons.html5.min.js"></script>
    <script src="files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
    <script src="files\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
    <script src="files\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
</body>
</html>