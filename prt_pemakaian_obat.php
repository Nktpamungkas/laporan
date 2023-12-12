<?php 
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>LAB - laporan Pemakaian Obat Gd. Kimia</title>
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

    <link rel="stylesheet" type="text/css" href="files\assets\pages\data-table\extensions\buttons\css\buttons.dataTables.min.css">
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
                                                    <h4 class="sub-title">Tanggal</h4>
                                                    <div class="input-group input-group-sm">
                                                        <input type="date" class="form-control" placeholder="input-group-sm" name="tgl" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl']; } ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-2">
                                                    <h4 class="sub-title">&nbsp;</h4>
                                                    <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="icofont icofont-search-alt-1"></i> Cari data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST['submit'])) : ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header table-card-header">
                                                    <h5>LAPORAN HARIAN PEMAKAIAN OBAT GUDANG KIMIA</h5>
                                                </div>
                                                <div class="card-block">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="basic-btn" class="table compact table-striped table-bordered nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <!-- <th>No</th> -->
                                                                    <th>No. Group Line</th>
                                                                    <th>No. KK</th>
                                                                    <th>Kode Obat</th>
                                                                    <th>QTY (Gram) TARGET</th>
                                                                    <th>QTY (Gram) Actual</th>
                                                                    <th>Volume Air</th>
                                                                    <th>Keterangan</th>
                                                                    <th>Nama Obat</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $db_stocktransaction   = db2_exec($conn1, "SELECT
                                                                                                                    CASE
                                                                                                                        WHEN s.PRODUCTIONORDERCODE IS NULL THEN s.ORDERCODE 
                                                                                                                        ELSE s.PRODUCTIONORDERCODE 
                                                                                                                    END AS PRODUCTIONORDERCODE,
                                                                                                                    s.DECOSUBCODE01,
                                                                                                                    s.DECOSUBCODE02,
                                                                                                                    s.DECOSUBCODE03,
                                                                                                                    CASE
                                                                                                                        WHEN s.TEMPLATECODE = '120' THEN TRIM(s.DECOSUBCODE01) || '-' || TRIM(s.DECOSUBCODE02) || '-' || TRIM(s.DECOSUBCODE03) 
                                                                                                                        ELSE s.TEMPLATECODE 
                                                                                                                    END	AS KODE_OBAT,
                                                                                                                    s.USERPRIMARYQUANTITY AS AKTUAL_QTY,
                                                                                                                    p.LONGDESCRIPTION 
                                                                                                                FROM
                                                                                                                    STOCKTRANSACTION s
                                                                                                                LEFT JOIN PRODUCT p ON p.ITEMTYPECODE = s.ITEMTYPECODE 
                                                                                                                                    AND p.SUBCODE01 = s.DECOSUBCODE01 
                                                                                                                                    AND p.SUBCODE02 = s.DECOSUBCODE02 
                                                                                                                                    AND p.SUBCODE03 = s.DECOSUBCODE03
                                                                                                                WHERE 
                                                                                                                    s.ITEMTYPECODE = 'DYC'
                                                                                                                    AND s.LOGICALWAREHOUSECODE = 'M516'
                                                                                                                    AND s.TRANSACTIONDATE = '$_POST[tgl]'
                                                                                                                ORDER BY 
                                                                                                                    s.PRODUCTIONORDERCODE ASC");
                                                                    $no = 1;
                                                                    while ($row_stocktransaction = db2_fetch_assoc($db_stocktransaction)) {
                                                                        $db_reservation     = db2_exec($conn1, "SELECT 
                                                                                                                    TRIM(p.PRODUCTIONORDERCODE) || '-' || TRIM(p.GROUPSTEPNUMBER) AS NO_RESEP,
                                                                                                                    SUM(p.USERPRIMARYQUANTITY) AS USERPRIMARYQUANTITY,
                                                                                                                    CASE
                                                                                                                        WHEN p2.CODE = 'T1' OR p2.CODE = 'T2' OR p2.CODE = 'T3' OR p2.CODE = 'T4' OR p2.CODE = 'T5' OR p2.CODE = 'T6' OR p2.CODE = 'T7' THEN 'Tambah Obat'
                                                                                                                        WHEN p2.CODE = 'R1' OR p2.CODE = 'R2' OR p2.CODE = 'R3' OR p2.CODE = 'R4' OR p2.CODE = 'R5' OR p2.CODE = 'R6' OR p2.CODE = 'R7' THEN 'Perbaikan'
                                                                                                                        ELSE 'Normal'
                                                                                                                    END AS KETERANGAN
                                                                                                                FROM
                                                                                                                    PRODUCTIONRESERVATION p
                                                                                                                LEFT JOIN PRODRESERVATIONLINKGROUP p2 ON p2.CODE = p.PRODRESERVATIONLINKGROUPCODE 
                                                                                                                WHERE 
                                                                                                                    p.PRODUCTIONORDERCODE = '$row_stocktransaction[PRODUCTIONORDERCODE]' 
                                                                                                                    AND p.SUBCODE01 = '$row_stocktransaction[DECOSUBCODE01]' 
                                                                                                                    AND p.SUBCODE02 = '$row_stocktransaction[DECOSUBCODE02]' 
                                                                                                                    AND p.SUBCODE03 = '$row_stocktransaction[DECOSUBCODE03]'
                                                                                                                GROUP BY
                                                                                                                    p.PRODUCTIONORDERCODE,
                                                                                                                    p.GROUPSTEPNUMBER,
                                                                                                                    p2.CODE");
                                                                        $row_reservation    = db2_fetch_assoc($db_reservation);
                                                                ?>
                                                                <tr>
                                                                    <!-- <td><?= $no++; ?></td> -->
                                                                    <td><?= $row_reservation['NO_RESEP']; ?></td>
                                                                    <td><?= $row_stocktransaction['PRODUCTIONORDERCODE']; ?></td>
                                                                    <td><?= $row_stocktransaction['KODE_OBAT']; ?></td>
                                                                    <td><?= number_format($row_reservation['USERPRIMARYQUANTITY'], 2); ?></td>
                                                                    <td><?= number_format($row_stocktransaction['AKTUAL_QTY'], 2); ?></td>
                                                                    <td></td>
                                                                    <td><?= $row_reservation['KETERANGAN']; ?></td>
                                                                    <td><?= $row_stocktransaction['LONGDESCRIPTION']; ?></td>
                                                                </tr>
                                                                <?php } ?>
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
    <script type="text/javascript" src="files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
    <script src="files\assets\pages\data-table\extensions\buttons\js\extension-btns-custom.js"></script>
    <script src="files\assets\js\pcoded.min.js"></script>
    <script src="files\assets\js\menu\menu-hori-fixed.js"></script>
    <script src="files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="files\assets\js\script.js"></script>

</body>
</html>