<!DOCTYPE html>
<html lang="en">
<head>
    <title>DYE - Hasil Aktual LA/CAMS</title>
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
                                                <div class="col-sm-12 col-xl-12 m-b-30">
                                                    <h4 class="sub-title">BON RESEP </h4>
                                                    <input type="text" class="form-control" name="bon_resep" value="<?php if (isset($_POST['submit'])){ echo $_POST['bon_resep']; } ?>" required>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary">Cari data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST['submit'])) : ?>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-block">
                                                    <div class="row">
                                                        <center><h4>FROM MECHINE LOGIC ART : TICKET</h4></center>
                                                        <div class="table-responsive dt-responsive">
                                                            <table id="excel-LA" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr align="center">
                                                                        <th width='5px' hidden>NO</th>
                                                                        <th width='100px'>TRANS DATE</th>
                                                                        <th width='100px'>DESCRIPTION</th>
                                                                        <th width='100px'>PROD ORDER</th>
                                                                        <th width='100px'>LOTCODE</th>
                                                                        <th width='100px'>DYC</th>
                                                                        <th width='100px'>TARGET</th>
                                                                        <th width='100px'>ACTUAL</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                        ini_set("error_reporting", 1);
                                                                        require_once "koneksi.php";
                                                                        $sql_LA = "SELECT  
                                                                                            TICKET_DETAIL.RES_STRING3 AS BARIS,
                                                                                            TICKET_DETAIL.COMP_DATE,
                                                                                            TICKET_DETAIL.COMP_TIME,
                                                                                            TICKET_DETAIL.ID_NO,
                                                                                            TICKET_DETAIL.PRODUCT_CODE,
                                                                                            TICKET_DETAIL.TARGET_WT,
                                                                                            TICKET_DETAIL.ACTUAL_WT
                                                                                        FROM 
                                                                                            TICKET.dbo.TICKET_DETAIL TICKET_DETAIL
                                                                                        WHERE 
                                                                                            TICKET_DETAIL.ID_NO LIKE '%$_POST[bon_resep]%'
                                                                                        UNION ALL 
                                                                                            SELECT 
                                                                                                Ticket_Detail_Addition.BARIS AS BARIS,
                                                                                                Ticket_Detail_Addition.COMP_DATE,
                                                                                                Ticket_Detail_Addition.COMP_TIME,
                                                                                                Ticket_Detail_Addition.ID_NO,
                                                                                                Ticket_Detail_Addition.PRODUCT_CODE,
                                                                                                Ticket_Detail_Addition.TARGET_WT,
                                                                                                Ticket_Detail_Addition.ACTUAL_WT
                                                                                            FROM 
                                                                                                LA1000_Exchange.dbo.Ticket_Detail_Addition Ticket_Detail_Addition
                                                                                            WHERE 
                                                                                                Ticket_Detail_Addition.ID_NO LIKE '%$_POST[bon_resep]%'
                                                                                        ORDER BY 
                                                                                            BARIS ASC";
                                                                        $stmt   = sqlsrv_query($conn_sql, $sql_LA);
                                                                        $no     = 1;
                                                                        while ($row_la = sqlsrv_fetch_array($stmt)) {
                                                                    ?>
                                                                    <tr>
                                                                        <td hidden><?= $row_la['BARIS']; ?></td>
                                                                        <td>
                                                                            <?php if(date('d-m-Y', strtotime($row_la['COMP_DATE'])) == '01-01-1970') : ?>
                                                                            <?php else : ?>
                                                                                <?= date('d-m-Y', strtotime($row_la['COMP_DATE'])); ?>, <?= date('H:i:s', strtotime($row_la['COMP_TIME'])); ?>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                                $sql_desc = db2_exec($conn1, "SELECT * FROM PRODUCT WHERE TRIM(SUBCODE01) || '-' || TRIM(SUBCODE02) || '-' || TRIM(SUBCODE03) = '$row_la[PRODUCT_CODE]'");
                                                                                $d_row_desc = db2_fetch_assoc($sql_desc);
                                                                                echo $d_row_desc['LONGDESCRIPTION'];
                                                                            ?>
                                                                        </td>
                                                                        <td><?= $row_la['ID_NO']; ?></td>
                                                                        <td></td>
                                                                        <td><?= $row_la['PRODUCT_CODE']; ?></td>
                                                                        <td><?= $row_la['TARGET_WT']; ?></td>
                                                                        <td><?= $row_la['ACTUAL_WT']; ?></td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if(substr($_POST['bon_resep'],8,1) == "-") : ?>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-block">
                                                    <div class="row">
                                                        <center><h4>FROM MECHINE CAMS : TAICHEN_CAMS_LIVE</h4></center>
                                                        <div class="table-responsive dt-responsive">
                                                            <table id="excel-cams" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr align="center">
                                                                        <th width='5px' hidden>NO</th>
                                                                        <th width='100px'>TRANS DATE</th>
                                                                        <th width='100px'>DESCRIPTION</th>
                                                                        <th width='100px'>PROD ORDER</th>
                                                                        <th width='100px'>LOTCODE</th>
                                                                        <th width='100px'>DYC</th>
                                                                        <th width='100px'>TARGET</th>
                                                                        <th width='100px'>ACTUAL</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                        ini_set("error_reporting", 1);
                                                                        require_once "koneksi.php";
                                                                        $bonresep = substr($_POST['bon_resep'], 0, 8);
                                                                        $bonresep_line = substr($_POST['bon_resep'], 9,4);
                                                                        $sql_CAMS = "SELECT
                                                                                            rs_reservationline,
                                                                                            rs_creationdatetime,
                                                                                            rs_productionordercode,
                                                                                            rs_subcode01,
                                                                                            rs_subcode02,
                                                                                            rs_subcode03,
                                                                                            CASE
                                                                                                WHEN (rs_subcode02 = '' AND rs_subcode03 = '')OR(rs_subcode02 IS NULL AND rs_subcode03 IS NULL) THEN rs_subcode01
                                                                                                ELSE CONCAT(rs_subcode01, '-', rs_subcode02,'-', rs_subcode03)
                                                                                            END AS CODE,
                                                                                            RS_USERPRIMARYQUANTITY AS ACUAN_QTY,
                                                                                            RS_USEDUSERPRIMARYQUANTITY AS AKTUAL_QTY
                                                                                        FROM
                                                                                            tab_rs 
                                                                                        WHERE
                                                                                            rs_productionordercode LIKE '%$bonresep%' AND rs_reservationline > $bonresep_line AND rs_reservationline < $bonresep_line+100 AND NOT (rs_subcode02 = '' OR rs_subcode03 = '')";
                                                                        $stmt_CAMS = sqlsrv_query($conn_cams, $sql_CAMS);
                                                                        $no     = 1;
                                                                        while ($row_CAMS= sqlsrv_fetch_array($stmt_CAMS)) {
                                                                    ?>
                                                                    <tr>
                                                                        <td hidden><?= $row_CAMS['rs_reservationline']; ?></td>
                                                                        <td><?= $row_CAMS['rs_creationdatetime']->format('d-m-Y, H:i:s'); ?></td>
                                                                        <td>
                                                                            <?php
                                                                                $sql_desc = db2_exec($conn1, "SELECT * FROM PRODUCT WHERE SUBCODE01 = '$row_CAMS[rs_subcode01]' AND
                                                                                                                                        SUBCODE02 = '$row_CAMS[rs_subcode02]' AND 
                                                                                                                                        SUBCODE03 = '$row_CAMS[rs_subcode03]'");
                                                                                $d_row_desc = db2_fetch_assoc($sql_desc);
                                                                                echo $d_row_desc['LONGDESCRIPTION'];
                                                                            ?>
                                                                        </td>
                                                                        <td><?= $row_CAMS['rs_productionordercode']; ?>-<?= $bonresep_line; ?></td>
                                                                        <td></td>
                                                                        <td><?= $row_CAMS['CODE']; ?></td>
                                                                        <td><?= $row_CAMS['ACUAN_QTY']; ?></td>
                                                                        <td><?php if($row_CAMS['AKTUAL_QTY'] != 0){ echo $row_CAMS['AKTUAL_QTY']; }else{ echo '';} ?></td>
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
        $('#excel-cams').DataTable({
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
</html>