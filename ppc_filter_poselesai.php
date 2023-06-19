<!DOCTYPE html>
<html lang="en">
<head>
    <title>PPC - PO Selesai</title>
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
                                        <h5>Filter Pencarian PO Selesai PPC</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <h4 class="sub-title">Bon Order</h4>
                                                    <input type="text" name="no_order" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['no_order']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <h4 class="sub-title">Dari Tanggal</h4>
                                                    <input type="date" name="tgl1" class="form-control" id="tgl1" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl1']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <h4 class="sub-title">Sampai Tanggal</h4>
                                                    <input type="date" name="tgl2" class="form-control" id="tgl2" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl2']; } ?>">
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
                                                            <th>NO</th>
                                                            <th>NO. ORDER</th>
                                                            <th>NO. PO</th>
                                                            <th>PELANGGAN</th>
                                                            <th>KODE ITEM</th>
                                                            <th>WARNA</th>
                                                            <th>QTY KEBUTUHAN (KG)</th>
                                                            <th>QTY KEBUTUHAN (YARD/METER)</th>
                                                            <th>QTY PACKING (KG)</th>
                                                            <th>QTY PACKING (YARD/METER)</th>
                                                            <th>QTY KURANG (KG)</th>
                                                            <th>QTY KURANG (YARD/METER)</th>
                                                            <th>NO DEMAND</th>
                                                            <th>NO PROD ORDER</th>
                                                            <th>NO SURAT JALAN</th>
                                                            <th>FOC</th>
                                                            <th>TGL KIRIM</th>
                                                            <th>QTY KIRIM (KG)</th>
                                                            <th>QTY KIRIM (YARD/METER)</th>
                                                            <th>QTY BAGI KAIN (KG)</th>
                                                            <th>QTY BAGI KAIN (YARD/METER)</th>
                                                            <th>LOSS (KG)</th>
                                                            <th>LOSS (YARD/METER)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            ini_set("error_reporting", 1);
                                                            session_start();
                                                            require_once "koneksi.php";
                                                            $no_order = $_POST['no_order'];
                                                            $tgl1     = $_POST['tgl1'];
                                                            $tgl2     = $_POST['tgl2'];

                                                            if(!empty($no_order) && empty($tgl1) && empty($tgl2)) {
                                                                $where      = "im.NO_ORDER = '$no_order'";
                                                            }elseif(empty($no_order) && !empty($tgl1) && !empty($tgl2)){
                                                                $where      = "im.REQUIREDDUEDATE BETWEEN '$tgl1' AND '$tgl2'";
                                                            }elseif(!empty($no_order) && !empty($tgl1) && !empty($tgl2)){
                                                                $where      = "im.NO_ORDER = '$no_order' AND im.REQUIREDDUEDATE BETWEEN '$tgl1' AND '$tgl2'";
                                                            }

                                                            $sqlDB2="SELECT DISTINCT
                                                                            im.NO_ORDER,
                                                                            im.NO_PO,
                                                                            im.PELANGGAN,
                                                                            im.KETERANGAN_PRODUCT,
                                                                            im.WARNA,
                                                                            s.USERPRIMARYQUANTITY AS QTY_BUTUH_KG,
                                                                            s.USERPRIMARYUOMCODE AS UOM_BUTUH_KG,
                                                                            s.USERSECONDARYQUANTITY AS QTY_BUTUH_SECOND,
                                                                            s.USERSECONDARYUOMCODE AS UOM_BUTUH_SECOND,
                                                                            D.QTY_PACKING_KG,
                                                                            D.UOM_PACKING_KG,
                                                                            D.QTY_PACKING_SECOND,
                                                                            D.UOM_PACKING_SECOND,
                                                                            im.DEMAND,
                                                                            im.NO_KK,
                                                                            s2.SALESDOCUMENTPROVISIONALCODE AS NO_SJ,
                                                                            CASE
                                                                                WHEN s3.PAYMENTMETHODCODE = 'FOC' THEN 'FOC'
                                                                                ELSE NULL
                                                                            END PAYMENTMETHODCODE,
                                                                            s3.DEFINITIVEDOCUMENTDATE AS TGL_KIRIM_SJ,
                                                                            E.QTY_KIRIM_KG,
                                                                            E.UOM_KIRIM_KG,
                                                                            E.QTY_KIRIM_SECOND,
                                                                            E.UOM_KIRIM_SECOND,
                                                                            F.QTY_BAGIKAIN_KG,
                                                                            F.UOM_BAGIKAIN_KG,
                                                                            F.QTY_BAGIKAIN_SECOND,
                                                                            F.UOM_BAGIKAIN_SECOND
                                                                        FROM 
                                                                            itxview_memopentingppc im 
                                                                        LEFT JOIN SALESORDERLINE s ON s.SALESORDERCODE = im.NO_ORDER AND s.ORDERLINE = im.ORDERLINE 
                                                                        LEFT JOIN 
                                                                            (SELECT  
                                                                                PRODUCTIONDEMAND.CODE,
                                                                                PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE,
                                                                                PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE,
                                                                                SUM(PRODUCTIONDEMAND.ENTEREDBASEPRIMARYQUANTITY) AS QTY_PACKING_KG,
                                                                                PRODUCTIONDEMAND.BASEPRIMARYUOMCODE AS UOM_PACKING_KG,
                                                                                SUM(PRODUCTIONDEMAND.ENTEREDBASESECONDARYQUANTITY) AS QTY_PACKING_SECOND,
                                                                                PRODUCTIONDEMAND.BASESECONDARYUOMCODE AS UOM_PACKING_SECOND
                                                                            FROM
                                                                                PRODUCTIONDEMAND PRODUCTIONDEMAND
                                                                            WHERE
                                                                                PRODUCTIONDEMAND.ITEMTYPEAFICODE = 'KFF'
                                                                            GROUP BY
                                                                                PRODUCTIONDEMAND.CODE,
                                                                                PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE,
                                                                                PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE,
                                                                                PRODUCTIONDEMAND.BASEPRIMARYUOMCODE,
                                                                                PRODUCTIONDEMAND.BASESECONDARYUOMCODE) D ON D.ORIGDLVSALORDLINESALORDERCODE = im.NO_ORDER AND D.ORIGDLVSALORDERLINEORDERLINE = im.ORDERLINE AND D.CODE = im.DEMAND  
                                                                        LEFT JOIN SALESDOCUMENTLINE s2 ON s2.DLVSALORDERLINESALESORDERCODE = s.SALESORDERCODE AND s2.DLVSALESORDERLINEORDERLINE = s.ORDERLINE AND s2.DOCUMENTTYPETYPE = 05
                                                                        LEFT JOIN SALESDOCUMENT s3 ON s3.PROVISIONALCODE = s2.SALESDOCUMENTPROVISIONALCODE 
                                                                        LEFT JOIN (SELECT
                                                                                        SALESDOCUMENTLINE.DLVSALORDERLINESALESORDERCODE,
                                                                                        SALESDOCUMENTLINE.DLVSALESORDERLINEORDERLINE,
                                                                                        SALESDOCUMENTLINE.DOCUMENTTYPETYPE,
                                                                                        SUM(SALESDOCUMENTLINE.SHIPPEDBASEPRIMARYQUANTITY) AS QTY_KIRIM_KG,
                                                                                        SALESDOCUMENTLINE.BASEPRIMARYUOMCODE AS UOM_KIRIM_KG,
                                                                                        SUM(SALESDOCUMENTLINE.SHIPPEDBASESECONDARYQUANTITY) AS QTY_KIRIM_SECOND,
                                                                                        SALESDOCUMENTLINE.BASESECONDARYUOMCODE AS UOM_KIRIM_SECOND
                                                                                    FROM
                                                                                        SALESDOCUMENTLINE SALESDOCUMENTLINE
                                                                                    WHERE
                                                                                        SALESDOCUMENTLINE.PREVIOUSORIGINFROM = '1'
                                                                                    GROUP BY 
                                                                                        SALESDOCUMENTLINE.BASEPRIMARYUOMCODE, 
                                                                                        SALESDOCUMENTLINE.BASESECONDARYUOMCODE, 
                                                                                        SALESDOCUMENTLINE.DLVSALORDERLINESALESORDERCODE,
                                                                                        SALESDOCUMENTLINE.DLVSALESORDERLINEORDERLINE,
                                                                                        SALESDOCUMENTLINE.DOCUMENTTYPETYPE) E ON E.DLVSALORDERLINESALESORDERCODE = s.SALESORDERCODE 
                                                                                                                            AND E.DLVSALESORDERLINEORDERLINE = s.ORDERLINE 
                                                                                                                            AND E.DOCUMENTTYPETYPE = 05
                                                                        LEFT JOIN 
                                                                            (SELECT
                                                                                PRODUCTIONRESERVATION.ORDERCODE,
                                                                                SUM(PRODUCTIONRESERVATION.USEDBASEPRIMARYQUANTITY) AS QTY_BAGIKAIN_KG,
                                                                                PRODUCTIONRESERVATION.BASEPRIMARYUOMCODE AS UOM_BAGIKAIN_KG,
                                                                                SUM(PRODUCTIONRESERVATION.USEDBASESECONDARYQUANTITY) AS QTY_BAGIKAIN_SECOND,
                                                                                PRODUCTIONRESERVATION.BASESECONDARYUOMCODE AS UOM_BAGIKAIN_SECOND
                                                                            FROM
                                                                                PRODUCTIONRESERVATION PRODUCTIONRESERVATION
                                                                            WHERE
                                                                                PRODUCTIONRESERVATION.ITEMTYPEAFICODE = 'KGF'
                                                                            GROUP BY
                                                                                PRODUCTIONRESERVATION.ORDERCODE,
                                                                                PRODUCTIONRESERVATION.BASEPRIMARYUOMCODE,
                                                                                PRODUCTIONRESERVATION.BASESECONDARYUOMCODE) F ON F.ORDERCODE = im.DEMAND 
                                                                        WHERE 
                                                                            $where";

                                                            $stmt   = db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
                                                            $NO     = 1;
                                                            while($rowdb2 = db2_fetch_assoc($stmt)){
                                                        ?>
                                                        <tr>
                                                            <td><?= $NO; ?></td>
                                                            <td><?= $rowdb2['NO_ORDER']; ?></td>
                                                            <td><?= $rowdb2['NO_PO']; ?></td>
                                                            <td><?= $rowdb2['PELANGGAN']; ?></td>
                                                            <td><?= $rowdb2['KETERANGAN_PRODUCT']." "; ?></td>
                                                            <td><?= $rowdb2['WARNA']; ?></td>
                                                            <td><?= number_format($rowdb2['QTY_BUTUH_KG'],2)." ".$rowdb2['UOM_BUTUH_KG']; ?></td>
                                                            <td><?= number_format($rowdb2['QTY_BUTUH_SECOND'],2)." ".$rowdb2['UOM_BUTUH_SECOND']; ?></td>
                                                            <td><?= number_format($rowdb2['QTY_PACKING_KG'],2)." ".$rowdb2['UOM_PACKING_KG']; ?></td>
                                                            <td><?= number_format($rowdb2['QTY_PACKING_SECOND'],2)." ".$rowdb2['UOM_PACKING_SECOND']; ?></td>
                                                            <td><?= number_format($rowdb2['QTY_PACKING_KG']-$rowdb2['QTY_BUTUH_KG'],2)." ".$rowdb2['UOM_BUTUH_KG']; ?></td>
                                                            <td><?= number_format($rowdb2['QTY_PACKING_SECOND']-$rowdb2['QTY_BUTUH_SECOND'],2)." ".$rowdb2['UOM_BUTUH_SECOND']; ?></td>
                                                            <td><?= $rowdb2['DEMAND']; ?></td>
                                                            <td><?= $rowdb2['NO_KK']; ?></td>
                                                            <td><?= $rowdb2['NO_SJ']; ?></td>
                                                            <td><?= $rowdb2['PAYMENTMETHODCODE']; ?></td>
                                                            <td><?= $rowdb2['TGL_KIRIM_SJ']; ?></td>
                                                            <td><?= number_format($rowdb2['QTY_KIRIM_KG'],2)." ".$rowdb2['UOM_KIRIM_KG']; ?></td>
                                                            <td><?= number_format($rowdb2['QTY_KIRIM_SECOND'],2)." ".$rowdb2['UOM_KIRIM_SECOND']; ?></td>
                                                            <td><?= number_format($rowdb2['QTY_BAGIKAIN_KG'],2)." ".$rowdb2['UOM_BAGIKAIN_KG']; ?></td>
                                                            <td><?= number_format($rowdb2['QTY_BAGIKAIN_SECOND'],2)." ".$rowdb2['UOM_BAGIKAIN_SECOND']; ?></td>
                                                            <td><?php if($rowdb2['QTY_BAGIKAIN_KG']!=0){echo number_format(($rowdb2['QTY_BAGIKAIN_KG']-$rowdb2['QTY_PACKING_KG'])/$rowdb2['QTY_BAGIKAIN_KG']*100,2)." %";} else{ echo "0%";} ?></td>
                                                            <td><?php if($rowdb2['QTY_BAGIKAIN_SECOND']!=0){echo number_format(($rowdb2['QTY_BAGIKAIN_SECOND']-$rowdb2['QTY_PACKING_SECOND'])/$rowdb2['QTY_BAGIKAIN_SECOND']*100,2)." %";} else{ echo "0%";} ?></td>
                                                        </tr>
                                                            <?php $NO++; } ?>
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
            <!-- <div id="styleSelector">

            </div> -->
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