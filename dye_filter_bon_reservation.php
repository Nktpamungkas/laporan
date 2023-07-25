<!DOCTYPE html>
<html lang="en">
<head>
    <title>DYE - Bon Resep Reservation</title>
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
                                                    <h4 class="sub-title">PRODUCTION ORDER </h4>
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
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="table-responsive dt-responsive">
                                                    <table border='1' style='font-family:"Microsoft Sans Serif"' width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align: center;">GROUP LINE</th>
                                                                <th style="text-align: center;">LINK GROUP</th>
                                                                <th style="text-align: center;">IT</th>
                                                                <th style="text-align: center;">ITEM CODE</th>
                                                                <th style="text-align: center;">DESCRIPTION</th>
                                                                <th style="text-align: center;">USER PRM QTY</th>
                                                                <th style="text-align: center;">UoM</th>
                                                                <th style="text-align: center;">USED USER PRM QTY</th>
                                                                <th style="text-align: center;">PROGRESS STATUS</th>
                                                                <th style="text-align: center;">WHS</th>
                                                                <th style="text-align: center;">ISSUE DATE</th>
                                                                <th style="text-align: center;">PROJECT</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                ini_set("error_reporting", 1);
                                                                require_once "koneksi.php";
                                                                $sql_reservation = "SELECT 
                                                                                        DISTINCT 
                                                                                        r.GROUPLINE,
                                                                                        r.GROUPSTEPNUMBER,
                                                                                        r.PRODRESERVATIONLINKGROUPCODE,
                                                                                        r.ITEMTYPEAFICODE AS IT,
                                                                                        CASE
                                                                                            WHEN r.ITEMTYPEAFICODE = 'KGF' THEN TRIM(r.SUBCODE01) || '-' || TRIM(r.SUBCODE02) || '-' || TRIM(r.SUBCODE03) || '-' || TRIM(r.SUBCODE04)
                                                                                            WHEN r.ITEMTYPEAFICODE = 'DYC' THEN TRIM(r.SUBCODE01) || '-' || TRIM(r.SUBCODE02) || '-' || TRIM(r.SUBCODE03)
                                                                                            WHEN r.ITEMTYPEAFICODE = 'RFD' THEN TRIM(r.SUBCODE01) || '-' || TRIM(r.SUFFIXCODE) 
                                                                                            WHEN r.ITEMTYPEAFICODE = 'RFF' THEN TRIM(r.SUBCODE01) || '-' || TRIM(r.SUFFIXCODE) 
                                                                                            WHEN r.ITEMTYPEAFICODE = 'WTR' THEN TRIM(r.SUBCODE01) 
                                                                                        END AS ITEMCODE,
                                                                                        CASE
                                                                                            WHEN p.LONGDESCRIPTION IS NULL THEN r2.LONGDESCRIPTION 
                                                                                            ELSE p.LONGDESCRIPTION 
                                                                                        END AS LONGDESCRIPTION,
                                                                                        SUM(r.USERPRIMARYQUANTITY) AS USERPRIMARYQUANTITY,
                                                                                        TRIM(r.USERPRIMARYUOMCODE) AS USERPRIMARYUOMCODE,
                                                                                        r.USEDUSERPRIMARYQUANTITY,
                                                                                        CASE
                                                                                            WHEN r.PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                            WHEN r.PROGRESSSTATUS = 1 THEN 'Partially Used'
                                                                                            WHEN r.PROGRESSSTATUS = 2 THEN 'Closed'
                                                                                        END AS PROGRESSSTATUS,
                                                                                        r.WAREHOUSECODE,
                                                                                        r.ISSUEDATE,
                                                                                        r.PROJECTCODE 
                                                                                    FROM 
                                                                                        PRODUCTIONRESERVATION r
                                                                                    LEFT JOIN PRODUCT p ON p.SUBCODE01 = r.SUBCODE01 
                                                                                                        AND p.SUBCODE02 = r.SUBCODE02 
                                                                                                        AND p.SUBCODE03 = r.SUBCODE03
                                                                                                        AND p.SUBCODE04 = r.SUBCODE04
                                                                                                        AND p.ITEMTYPECODE = r.ITEMTYPEAFICODE
                                                                                    LEFT JOIN RECIPE r2 ON r2.SUBCODE01 = r.SUBCODE01 AND r2.SUFFIXCODE = r.SUFFIXCODE
                                                                                    WHERE r.PRODUCTIONORDERCODE = '$_POST[bon_resep]' AND (NOT r.ITEMTYPEAFICODE = 'KGF' OR r.ITEMTYPEAFICODE = 'KFF')
                                                                                    GROUP BY
                                                                                        r.GROUPLINE,
                                                                                        r.GROUPSTEPNUMBER,
                                                                                        r.PRODRESERVATIONLINKGROUPCODE,
                                                                                        r.ITEMTYPEAFICODE,
                                                                                        r.SUBCODE01,
                                                                                        r.SUBCODE02,
                                                                                        r.SUBCODE03,
                                                                                        r.SUBCODE04,
                                                                                        r.SUFFIXCODE,
                                                                                        p.LONGDESCRIPTION,
                                                                                        r2.LONGDESCRIPTION,
                                                                                        r.USERPRIMARYUOMCODE,
                                                                                        r.USEDUSERPRIMARYQUANTITY,
                                                                                        r.PROGRESSSTATUS,
                                                                                        r.WAREHOUSECODE,
                                                                                        r.ISSUEDATE,
                                                                                        r.PROJECTCODE 
                                                                                    ORDER BY 
                                                                                        r.GROUPLINE,
                                                                                        r.GROUPSTEPNUMBER ASC";
                                                                $stmt   = db2_exec($conn1, $sql_reservation);
                                                                while ($row_reservation = db2_fetch_assoc($stmt)) {
                                                            ?>
                                                            <tr>
                                                                <td style="text-align: center;"><?= $row_reservation['GROUPLINE']; ?></td>
                                                                <td style="text-align: left;"><?= $row_reservation['PRODRESERVATIONLINKGROUPCODE']; ?></td>
                                                                <td style="text-align: left;"><?= $row_reservation['IT']; ?></td>
                                                                <td style="text-align: left;"><?= $row_reservation['ITEMCODE']; ?></td>
                                                                <td style="text-align: left;"><?= $row_reservation['LONGDESCRIPTION']; ?></td>
                                                                <td style="text-align: right;"><?= $row_reservation['USERPRIMARYQUANTITY']; ?></td>
                                                                <td style="text-align: left;">
                                                                    <?php 
                                                                        if($row_reservation['USERPRIMARYUOMCODE'] == 'l'){
                                                                            echo 'Liter';
                                                                        }elseif($row_reservation['USERPRIMARYUOMCODE'] == 'g'){
                                                                            echo 'Gram';
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td style="text-align: right;"><?= $row_reservation['USEDUSERPRIMARYQUANTITY']; ?></td>
                                                                <td style="text-align: left;"><?= $row_reservation['PROGRESSSTATUS']; ?></td>
                                                                <td style="text-align: left;"><?= $row_reservation['WAREHOUSECODE']; ?></td>
                                                                <td style="text-align: left;"><?= $row_reservation['ISSUEDATE']; ?></td>
                                                                <td style="text-align: left;"><?= $row_reservation['PROJECTCODE']; ?></td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
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

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
</body>
</html>