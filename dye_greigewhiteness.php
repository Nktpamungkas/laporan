<!DOCTYPE html>
<html lang="en">
<head>
    <title>DYE - Greige Whiteness</title>
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
                                        <h5>Filter Pencarian Greige Whiteness</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-1 m-b-30">
                                                    <h4 class="sub-title"><center>Fabric <br> type</center></h4>
                                                    <input type="text" name="subcode01" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['subcode01']; } ?>" onkeyup="this.value = this.value.toUpperCase();">
                                                </div>
                                                <div class="col-sm-12 col-xl-1 m-b-30">
                                                    <h4 class="sub-title"><center>Article <br> group</center></h4>
                                                    <input type="text" name="subcode02" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['subcode02']; } ?>" onkeyup="this.value = this.value.toUpperCase();">
                                                </div>
                                                <div class="col-sm-12 col-xl-1 m-b-30">
                                                    <h4 class="sub-title"><center>Article <br> Code</center></h4>
                                                    <input type="text" name="subcode03" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['subcode03']; } ?>" onkeyup="this.value = this.value.toUpperCase();">
                                                </div>
                                                <div class="col-sm-12 col-xl-1 m-b-30">
                                                    <h4 class="sub-title"><center>Variant <br> &nbsp;</center></h4>
                                                    <input type="text" name="subcode04" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['subcode04']; } ?>" onkeyup="this.value = this.value.toUpperCase();">
                                                </div>
                                                <div class="col-sm-12 col-xl-1 m-b-30">
                                                    <h4 class="sub-title"><center>Color <br> &nbsp;</center></h4>
                                                    <input type="text" name="subcode05" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['subcode05']; } ?>" onkeyup="this.value = this.value.toUpperCase();">
                                                </div>
                                                <div class="col-sm-12 col-xl-1 m-b-30">
                                                    <h4 class="sub-title"><center>Finish <br> code</center></h4>
                                                    <input type="text" name="subcode06" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['subcode06']; } ?>" onkeyup="this.value = this.value.toUpperCase();">
                                                </div>
                                                <div class="col-sm-12 col-xl-1 m-b-30">
                                                    <h4 class="sub-title"><center>Print <br> design</center></h4>
                                                    <input type="text" name="subcode07" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['subcode07']; } ?>" onkeyup="this.value = this.value.toUpperCase();">
                                                </div>
                                                <div class="col-sm-12 col-xl-1 m-b-30">
                                                    <h4 class="sub-title"><center>Print <br> variant</center></h4>
                                                    <input type="text" name="subcode08" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['subcode08']; } ?>" onkeyup="this.value = this.value.toUpperCase();">
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title"><center>From <br> date</center></h4>
                                                    <input type="date" name="tgl1" class="form-control" id="tgl1" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl1']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title"><center>until <br> &nbsp;</center></h4>
                                                    <input type="date" name="tgl2" class="form-control" id="tgl2" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl2']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary"><i class="icofont icofont-search-alt-1"></i> <i class="icofont icofont-search-alt-1"></i> Cari data</button>
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
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Full Item Code</th>
                                                            <th>Production Order</th>
                                                            <th>User Primary Qty</th>
                                                            <th>Operation</th>
                                                            <th>Recipe</th>
                                                            <th>Whiteness</th>
                                                            <th>Tint</th>
                                                            <th>Yellowness</th>
                                                            <th>Knitting Order</th>
                                                            <th>Reprocess/Add. Step</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php 
                                                            ini_set("error_reporting", 1);
                                                            session_start();
                                                            require_once "koneksi.php";
                                                            $subcode01  = $_POST['subcode01'];
                                                            $subcode02  = $_POST['subcode02'];
                                                            $subcode03  = $_POST['subcode03'];
                                                            $subcode04  = $_POST['subcode04'];
                                                            $subcode05  = $_POST['subcode05'];
                                                            $subcode06  = $_POST['subcode06'];
                                                            $subcode07  = $_POST['subcode07'];
                                                            $subcode08  = $_POST['subcode08'];
                                                            $_tgl1       = $_POST['tgl1'];
                                                            $_tgl2       = $_POST['tgl2'];

                                                            if($subcode01){
                                                                $where01 = "AND QUALITYDOCUMENTSUBCODE01 = '$subcode01'";
                                                            }else{
                                                                $where01 = "";
                                                            }
                                                            if($subcode02){
                                                                $where02 = "AND QUALITYDOCUMENTSUBCODE02 = '$subcode02'";
                                                            }else{
                                                                $where02 = "";
                                                            }
                                                            if($subcode03){
                                                                $where03 = "AND QUALITYDOCUMENTSUBCODE03 = '$subcode03'";
                                                            }else{
                                                                $where03 = "";
                                                            }
                                                            if($subcode04){
                                                                $where04 = "AND QUALITYDOCUMENTSUBCODE04 = '$subcode04'";
                                                            }else{
                                                                $where04 = "";
                                                            }
                                                            if($subcode05){
                                                                $where05 = "AND QUALITYDOCUMENTSUBCODE05 = '$subcode05'";
                                                            }else{
                                                                $where05 = "";
                                                            }
                                                            if($subcode06){
                                                                $where06 = "AND QUALITYDOCUMENTSUBCODE06 = '$subcode06'";
                                                            }else{
                                                                $where06 = "";
                                                            }
                                                            if($subcode07){
                                                                $where07 = "AND QUALITYDOCUMENTSUBCODE07 = '$subcode07'";
                                                            }else{
                                                                $where07 = "";
                                                            }
                                                            if($subcode08){
                                                                $where08 = "AND QUALITYDOCUMENTSUBCODE08 = '$subcode08'";
                                                            }else{
                                                                $where08 = "";
                                                            }
                                                            if($_tgl1 && $_tgl2){
                                                                $tgl_between = "AND substr(LASTUPDATEDATETIME,1,10) BETWEEN '$_tgl1' AND '$_tgl2'";
                                                            }else{
                                                                $tgl_between = "";
                                                            }

                                                            $query = "SELECT 
                                                                            TRIM(QUALITYDOCUMENTSUBCODE01) || '-' || TRIM(QUALITYDOCUMENTSUBCODE02) || '-' || TRIM(QUALITYDOCUMENTSUBCODE03) || '-' || TRIM(QUALITYDOCUMENTSUBCODE04) || '-' ||
                                                                            TRIM(QUALITYDOCUMENTSUBCODE05) || '-' || TRIM(QUALITYDOCUMENTSUBCODE06) || '-' || TRIM(QUALITYDOCUMENTSUBCODE07) || '-' || TRIM(QUALITYDOCUMENTSUBCODE08) AS FULL_ITEM_CODE,
                                                                            QUALITYDOCPRODUCTIONORDERCODE,
                                                                            QUALITYDOCUMENTHEADERNUMBERID,
                                                                            QUALITYDOCUMENTHEADERLINE
                                                                        FROM 
                                                                            QUALITYDOCLINE
                                                                        WHERE 
                                                                            NOT VALUEQUANTITY = 0 $tgl_between
                                                                            AND (CHARACTERISTICCODE = 'WHITENESS' OR CHARACTERISTICCODE = 'YELLOWNESS' OR CHARACTERISTICCODE = 'TINT')
                                                                            $where01 $where02 $where03 $where04 $where05 $where06 $where07 $where08
                                                                        GROUP BY 
                                                                            QUALITYDOCUMENTSUBCODE01,QUALITYDOCUMENTSUBCODE02,QUALITYDOCUMENTSUBCODE03,QUALITYDOCUMENTSUBCODE04,
                                                                            QUALITYDOCUMENTSUBCODE05,QUALITYDOCUMENTSUBCODE06,QUALITYDOCUMENTSUBCODE07,QUALITYDOCUMENTSUBCODE08,
                                                                            QUALITYDOCPRODUCTIONORDERCODE,QUALITYDOCUMENTHEADERNUMBERID,QUALITYDOCUMENTHEADERLINE";
                                                                // echo $query;

                                                            $stmt = db2_exec($conn1,$query);
                                                            while ($rowdb2 = db2_fetch_assoc($stmt)) {
                                                                    $prod_order     = db2_exec($conn1, "SELECT TOTALPRIMARYQUANTITY, ORDERDATE FROM PRODUCTIONORDER WHERE CODE = '$rowdb2[QUALITYDOCPRODUCTIONORDERCODE]'");
                                                                    $row_prod_order = db2_fetch_assoc($prod_order);

                                                                    $quality_doc    = db2_exec($conn1, "SELECT OPERATIONCODE FROM QUALITYDOCUMENT WHERE HEADERNUMBERID = '$rowdb2[QUALITYDOCUMENTHEADERNUMBERID]' AND HEADERLINE = '$rowdb2[QUALITYDOCUMENTHEADERLINE]'");
                                                                    $row_qual_row   = db2_fetch_assoc($quality_doc);

                                                                    $reservation    = db2_exec($conn1, "SELECT LISTAGG(TRIM(SUBCODE01), ',') AS RECIPE FROM PRODUCTIONRESERVATION WHERE PRODUCTIONORDERCODE = '$rowdb2[QUALITYDOCPRODUCTIONORDERCODE]' AND PRODRESERVATIONLINKGROUPCODE = '$row_qual_row[OPERATIONCODE]' AND (ITEMTYPEAFICODE = 'RFF' OR ITEMTYPEAFICODE ='RFD')");
                                                                    $row_reserv     = db2_fetch_assoc($reservation);

                                                                    $no_order       = db2_exec($conn1, "SELECT 
                                                                                                            p.PRODUCTIONDEMANDCODE,
                                                                                                            p.PRODUCTIONORDERCODE,
                                                                                                            p2.ORIGDLVSALORDLINESALORDERCODE,
                                                                                                            p2.ORIGDLVSALORDERLINEORDERLINE
                                                                                                        FROM 
                                                                                                            PRODUCTIONDEMANDSTEP p
                                                                                                        LEFT JOIN PRODUCTIONDEMAND p2 ON p2.CODE = p.PRODUCTIONDEMANDCODE 
                                                                                                        WHERE 
                                                                                                            PRODUCTIONORDERCODE = '$rowdb2[QUALITYDOCPRODUCTIONORDERCODE]' 
                                                                                                        GROUP BY 
                                                                                                            p.PRODUCTIONDEMANDCODE,
                                                                                                            p.PRODUCTIONORDERCODE,
                                                                                                            p2.ORIGDLVSALORDLINESALORDERCODE,
                                                                                                            p2.ORIGDLVSALORDERLINEORDERLINE");
                                                                    $row_no_order       = db2_fetch_assoc($no_order);

                                                                    $noko               = db2_exec($conn1, "SELECT * FROM ITXVIEWPOGREIGENEW3 
                                                                                                                WHERE SALESORDERCODE = '$row_no_order[ORIGDLVSALORDLINESALORDERCODE]' 
                                                                                                                AND ORDERLINE = '$row_no_order[ORIGDLVSALORDERLINEORDERLINE]'");
                                                                    $row_noko           = db2_fetch_assoc($noko);

                                                                    $re_proccess        = db2_exec($conn1, "SELECT CASE
                                                                                                                        WHEN COUNT(*) = 1 THEN 'No'
                                                                                                                        ELSE 'Yes'
                                                                                                                    END AS REPROCESS 
                                                                                                                FROM PRODUCTIONDEMANDSTEP WHERE PRODUCTIONORDERCODE = '$rowdb2[QUALITYDOCPRODUCTIONORDERCODE]' AND OPERATIONCODE LIKE '%DYE%'");
                                                                    $row_re_proccess    = db2_fetch_assoc($re_proccess);
                                                        ?>
                                                            <?php
                                                                $whiteness      = db2_exec($conn1, "SELECT * FROM QUALITYDOCLINE WHERE QUALITYDOCUMENTHEADERNUMBERID = '$rowdb2[QUALITYDOCUMENTHEADERNUMBERID]' AND QUALITYDOCUMENTHEADERLINE = '$rowdb2[QUALITYDOCUMENTHEADERLINE]' AND CHARACTERISTICCODE = 'WHITENESS'");
                                                                $row_whiteness  = db2_fetch_assoc($whiteness);

                                                                $yellowness     = db2_exec($conn1, "SELECT * FROM QUALITYDOCLINE WHERE QUALITYDOCUMENTHEADERNUMBERID = '$rowdb2[QUALITYDOCUMENTHEADERNUMBERID]' AND QUALITYDOCUMENTHEADERLINE = '$rowdb2[QUALITYDOCUMENTHEADERLINE]' AND CHARACTERISTICCODE = 'YELLOWNESS'");
                                                                $row_yellowness = db2_fetch_assoc($yellowness);

                                                                $tint           = db2_exec($conn1, "SELECT * FROM QUALITYDOCLINE WHERE QUALITYDOCUMENTHEADERNUMBERID = '$rowdb2[QUALITYDOCUMENTHEADERNUMBERID]' AND QUALITYDOCUMENTHEADERLINE = '$rowdb2[QUALITYDOCUMENTHEADERLINE]' AND CHARACTERISTICCODE = 'TINT'");
                                                                $row_tint       = db2_fetch_assoc($tint);
                                                            ?>
                                                            <tr>
                                                                <td><?= $row_prod_order['ORDERDATE']; ?></td>
                                                                <td><?= $rowdb2['FULL_ITEM_CODE']; ?></td>
                                                                <td><?= $rowdb2['QUALITYDOCPRODUCTIONORDERCODE']; ?></td>
                                                                <td><?= $row_prod_order['TOTALPRIMARYQUANTITY']; ?></td>
                                                                <td><?= $row_qual_row['OPERATIONCODE']; ?></td>
                                                                <td><?= $row_reserv['RECIPE']; ?></td>
                                                                <td><?= $row_whiteness['VALUEQUANTITY']; ?></td>
                                                                <td><?= $row_yellowness['VALUEQUANTITY']; ?></td>
                                                                <td><?= $row_tint['VALUEQUANTITY']; ?></td>
                                                                <td><?= $row_noko['LOTCODE']; ?></td>
                                                                <td><?= $row_re_proccess['REPROCESS']; ?>
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