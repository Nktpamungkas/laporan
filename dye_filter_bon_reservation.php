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
                                                <div class="col-sm-6 col-xl-6 m-b-30">
                                                    <h4 class="sub-title">Production Order:</h4>
                                                    <input type="text" name="prod_order" class="form-control" value="<?php if (isset($_POST['submit'])) {
                                                                                                                            echo $_POST['prod_order'];
                                                                                                                        } elseif (isset($_GET['prod_order'])) {
                                                                                                                            echo $_GET['prod_order'];
                                                                                                                        } ?>">
                                                </div>
                                                <div class="col-sm-6 col-xl-6 m-b-30">
                                                    <h4 class="sub-title">Production Demand:</h4>
                                                    <input type="text" name="demand" placeholder="Wajib di isi" class="form-control" required value="<?php if (isset($_POST['submit'])) {
                                                                                                                                                            echo $_POST['demand'];
                                                                                                                                                        } elseif (isset($_GET['demand'])) {
                                                                                                                                                            echo $_GET['demand'];
                                                                                                                                                        } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary"><i class="icofont icofont-search-alt-1"></i> Cari data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST['submit']) or isset($_GET['demand']) or isset($_GET['prod_order'])) : ?>
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="table-responsive dt-responsive">
                                                    <table border='1' style='font-family:"Microsoft Sans Serif"' width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align: center;">GROUPSTEP</th>
                                                                <th style="text-align: center;">LINK GROUP</th>
                                                                <th style="text-align: center;">IT</th>
                                                                <th style="text-align: center;">ITEM CODE</th>
                                                                <th style="text-align: center;">DESCRIPTION</th>
                                                                <th style="text-align: center;">CONSUMPTION</th>
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

                                                            if ($_GET['demand']) {
                                                                $demand     = $_GET['demand'];
                                                            } else {
                                                                $demand     = $_POST['demand'];
                                                            }

                                                            $q_ITXVIEWKK    = db2_exec($conn1, "SELECT * FROM ITXVIEWKK WHERE PRODUCTIONDEMANDCODE = '$demand'");
                                                            $d_ITXVIEWKK    = db2_fetch_assoc($q_ITXVIEWKK);

                                                            if ($_GET['prod_order']) {
                                                                $prod_order     = $_GET['prod_order'];
                                                            } elseif ($_POST['prod_order']) {
                                                                $prod_order     = $_POST['prod_order'];
                                                            } else {
                                                                $prod_order     = $d_ITXVIEWKK['PRODUCTIONORDERCODE'];
                                                            }

                                                            if ($_GET['OPERATION']) {
                                                                $where_operation    = "AND r.PRODRESERVATIONLINKGROUPCODE = '$_GET[OPERATION]'";
                                                            } else {
                                                                $where_operation    = "";
                                                            }
                                                            $sql_reservation = "SELECT 
                                                                                        DISTINCT 
                                                                                        r.GROUPLINE,
                                                                                        r.GROUPSTEPNUMBER,
                                                                                        r.PRODRESERVATIONLINKGROUPCODE,
                                                                                        r.ITEMTYPEAFICODE AS IT,
                                                                                        v.SUBCODE01 AS RCODE,
                                                                                        v.SUFFIXCODE AS SUFFIX,
                                                                                        r.RCPGROUPNOPATLEVEL AS NOMOR,
                                                                                        CASE
                                                                                            WHEN r.ITEMTYPEAFICODE IN ('RFD') THEN TRIM(r.SUBCODE01)
                                                                                        END AS RFD,
                                                                                        CASE
                                                                                            WHEN r.ITEMTYPEAFICODE IN ('RFF') THEN TRIM(r.SUBCODE01)
                                                                                        END AS RFF,
                                                                                        CASE
                                                                                            WHEN r.ITEMTYPEAFICODE IN ('RFD') THEN TRIM(r.SUFFIXCODE)
                                                                                        END AS SUFFIXCODE_RFD,
                                                                                        CASE
                                                                                            WHEN r.ITEMTYPEAFICODE IN ('RFF') THEN TRIM(r.SUFFIXCODE)
                                                                                        END AS SUFFIXCODE_RFF,
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
                                                                                        r.USERPRIMARYQUANTITY,
                                                                                        CASE
                                                                                            WHEN TRIM(r.USERPRIMARYUOMCODE) = 'l' THEN 'Liter'
                                                                                            WHEN TRIM(r.USERPRIMARYUOMCODE) = 'g' THEN 'Gram'
                                                                                        END AS USERPRIMARYUOMCODE,
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
                                                                                    LEFT JOIN VIEWPRODUCTIONRESERVATION v ON v.PRODUCTIONORDERCODE = r.PRODUCTIONORDERCODE 
                                                                                                                            AND v.SUFFIXCODE = r2.SUFFIXCODE
                                                                                                                            AND v.SUBCODE01 = r2.SUBCODE01
                                                                                    WHERE 
                                                                                        r.PRODUCTIONORDERCODE = '$prod_order' 
                                                                                        AND ORDERCODE = '$demand' 
                                                                                        AND (NOT r.ITEMTYPEAFICODE = 'KGF' OR r.ITEMTYPEAFICODE = 'KFF') 
                                                                                        $where_operation
                                                                                    ORDER BY 
                                                                                        r.GROUPLINE ASC";
                                                            $stmt   = db2_exec($conn1, $sql_reservation);
                                                            $lastRFD  = null;
                                                            $lastRFF  = null;
                                                            $lastSUF_RFD  = null;
                                                            $lastSUF_RFF  = null;
                                                            $rfdupd = null;
                                                            $lastsuf_rfdupd = null;
                                                            while ($row_reservation = db2_fetch_assoc($stmt)) {
                                                                $RFD  = $row_reservation['RFD'];
                                                                $SUF_RFD = $row_reservation['SUFFIXCODE_RFD'];
                                                                $RFF  = $row_reservation['RFF'];
                                                                $SUF_RFF = $row_reservation['SUFFIXCODE_RFF'];
                                                                // if ($row_reservation['ITEMCODE'] === 'WATER') {
                                                                //     // Jika sudah bertemu dengan 'WATER', hentikan loop
                                                                //     break;
                                                                // }
                                                                if (empty($RFD) && empty($SUF_RFD)) {
                                                                    $RFD = $lastRFD;
                                                                    $SUF_RFD = $lastSUF_RFD;
                                                                }
                                                                $lastRFD = $RFD;
                                                                $lastSUF_RFD = $SUF_RFD;
                                                                if (empty($lastRFD)) {
                                                                    $lastRFD = $RFF;
                                                                }
                                                                $lastRFD = $RFD;
                                                                if (empty($RFF) && empty($SUF_RFF)) {
                                                                    $RFF = $lastRFF;
                                                                    $SUF_RFF = $lastSUF_RFF;
                                                                }
                                                                $lastRFF = $RFF;
                                                                $lastSUF_RFF = $SUF_RFF;
                                                                if (empty($RFD) && empty($SUF_RFD)) {
                                                                    $RFD = $rfdup;
                                                                    $SUF_RFD = $lastsuf_rfdupd;
                                                                }
                                                                $rfdup = $RFF;
                                                                $lastsuf_rfdupd = $SUF_RFF;

                                                                $qry_suffix = "SELECT
                                                                DISTINCT 
                                                                    RECIPENUMBERID,
                                                                    RECIPEITEMTYPECODE,
                                                                    RECIPESUBCODE01,
                                                                    RECIPESUFFIXCODE,
                                                                CASE
                                                                    WHEN NOT ITEMTYPEAFICODE IN 'DYC' THEN SUBCODE01
                                                                    ELSE RECIPESUBCODE01
                                                                END AS RCODE,
                                                                CASE
                                                                    WHEN NOT ITEMTYPEAFICODE IN 'DYC' THEN SUFFIXCODE
                                                                    ELSE RECIPESUFFIXCODE
                                                                END AS SUFIX,
                                                                    groupnumber,
                                                                    grouptypecode,
                                                                    linetype,
                                                                    SEQUENCE,
                                                                    subsequence,
                                                                    itemtypeaficode,
                                                                    SUBCODE01,
                                                                    SUBCODE02,
                                                                    SUBCODE03,
                                                                    SUFFIXCODE,
                                                                    COMMENTLINE,
                                                                    CONSUMPTIONTYPE,
                                                                    CONSUMPTION,
                                                                    WATERMANAGEMENT,
                                                                    COSTINGPLANTCODE
                                                                FROM
                                                                    (
                                                                    SELECT
                                                                        *
                                                                    FROM
                                                                            RECIPECOMPONENT r
                                                                    WHERE
                                                                            RECIPESUBCODE01 = '$RFD'
                                                                        AND   
                                                                            RECIPESUFFIXCODE = '$SUF_RFD'
                                                                        AND GROUPNUMBER = '$row_reservation[NOMOR]'
                                                                        -- AND ITEMTYPEAFICODE='$row_reservation[IT]'
                                                                        -- AND SUBCODE01='$row_reservation[SUBCODE01]'
                                                                        -- AND SUBCODE02='$row_reservation[SUBCODE02]'
                                                                        -- AND SUBCODE03='$row_reservation[SUBCODE03]'
                                                            )";
                                                                $dsuffix = db2_exec($conn1, $qry_suffix);
                                                                $suffix = db2_fetch_assoc($dsuffix);
                                                                //Jangan dihapus dulu ya mas, masih cari cari cara buat munculin semua
                                                                // if (empty($RFD)) {
                                                                //     $RFD = $lastRFD;
                                                                // }
                                                                // if (empty($RFF)) {
                                                                //     $RFF = $lastRFF;
                                                                // }

                                                                $qpem = "SELECT
                                                                                *
                                                                            FROM
                                                                                ITXVIEWRESEP i
                                                                            WHERE
                                                                                PRODUCTIONORDERCODE = '$prod_order'
                                                                                AND SUBCODE01_RESERVATION = '$suffix[RCODE]'
                                                                                AND SUFFIXCODE_RESERVATION = '$suffix[SUFIX]'
                                                                                AND COMPANYCODE = '100'
                                                                                AND SUBCODE = '$row_reservation[ITEMCODE]'";
                                                                $dpem = db2_exec($conn1, $qpem);
                                                                $pem = db2_fetch_assoc($dpem)
                                                            ?>
                                                                <tr>
                                                                    <td style="text-align: center;"><?= $row_reservation['GROUPSTEPNUMBER']; ?></td>
                                                                    <td style="text-align: left;"><?= $row_reservation['PRODRESERVATIONLINKGROUPCODE']; ?></td>
                                                                    <td style="text-align: left;"><?= $row_reservation['IT']; ?></td>
                                                                    <td style="text-align: left;"><?= $row_reservation['ITEMCODE']; ?></td>
                                                                    <td style="text-align: left;"><?= $row_reservation['LONGDESCRIPTION']; ?></td>
                                                                    <td style="text-align: right;"><?= $pem['CONSUMPTION']; ?></td>
                                                                    <td style="text-align: right;"><?= $row_reservation['USERPRIMARYQUANTITY']; ?></td>
                                                                    <td style="text-align: left;"><?= $row_reservation['USERPRIMARYUOMCODE']; ?></td>
                                                                    <td style="text-align: right;"><?= $row_reservation['USEDUSERPRIMARYQUANTITY']; ?></td>
                                                                    <td style="text-align: left;"><?= $row_reservation['PROGRESSSTATUS']; ?></td>
                                                                    <td style="text-align: left;"><?= $row_reservation['WAREHOUSECODE']; ?></td>
                                                                    <td style="text-align: left;"><?= $row_reservation['ISSUEDATE']; ?></td>
                                                                    <td style="text-align: left;"><?= $row_reservation['PROJECTCODE']; ?><?php if ($_SERVER['REMOTE_ADDR'] == '10.0.5.132') {
                                                                                                                                                echo $RFD . '-' . $RFF;
                                                                                                                                            } ?></td>
                                                                    <!-- <td style="text-align: left;"><?= $suffix['SUFIX']; ?></td>                                                                        -->
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

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
</body>

</html>