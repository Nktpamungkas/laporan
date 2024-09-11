<?php
ini_set("error_reporting", 1);
session_start();
set_time_limit(0);
require_once "koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PRD - Cek Elements</title>
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
                                                    <h4 class="sub-title">Masukkan Nomor Elements</h4>
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" class="form-control" required
                                                            placeholder="Masukkan Nomor Elements" name="elements" value="<?php if (isset($_POST['submit'])) {
                                                                echo $_POST['elements'];
                                                            } ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-2">
                                                    <h4 class="sub-title">&nbsp;</h4>
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary btn-sm"><i
                                                            class="icofont icofont-search-alt-1"></i> Cari data</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST['submit'])):
                                    $elements = TRIM($_POST['elements']); ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header table-card-header">
                                                </div>
                                                <div class="card-block">
                                                    <h5>Data Elements Cut</h5>
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="btn" class="table compact table-bordered nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>No Elements</th>
                                                                    <th>Hanger</th>
                                                                    <th>Item</th>
                                                                    <th>LOT</th>
                                                                    <th>QTY</th>
                                                                    <th>Warehouse</th>
                                                                    <th>Project</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $query_cut = db2_exec($conn1, "SELECT * 
                                                                                                                    FROM 
                                                                                                                        STOCKTRANSACTION 
                                                                                                                    WHERE 
                                                                                                                        ITEMELEMENTCODE ='$elements' 
                                                                                                                    ORDER BY TRANSACTIONNUMBER DESC
                                                                                                                    LIMIT 1  
                                                                                                                    ");
                                                                while ($datacut = db2_fetch_assoc($query_cut)) { ?>
                                                                    <tr>
                                                                        <td><?php echo $datacut['ITEMELEMENTCODE']; ?></td>
                                                                        <td><?php $query_hang = db2_exec($conn1, "SELECT * FROM ELEMENTS WHERE CODE ='$elements' ");
                                                                        $data_hanger = db2_fetch_assoc($query_hang);
                                                                        echo TRIM($data_hanger['DECOSUBCODE02']) . '-' . TRIM($data_hanger['DECOSUBCODE03']); ?>
                                                                        </td>
                                                                        <td><?php $query_nama = db2_exec($conn1, "SELECT *
                                                                                                                                    FROM PRODUCT p 
                                                                                                                                    WHERE p.ITEMTYPECODE ='$datacut[ITEMTYPECODE]'
                                                                                                                                    AND SUBCODE01 ='$datacut[DECOSUBCODE01]'
                                                                                                                                    AND SUBCODE02 ='$datacut[DECOSUBCODE02]'
                                                                                                                                    AND SUBCODE03 ='$datacut[DECOSUBCODE03]'
                                                                                                                                    AND SUBCODE04 ='$datacut[DECOSUBCODE04]'
                                                                                                                                    AND SUBCODE05 ='$datacut[DECOSUBCODE05]'
                                                                                                                                    AND SUBCODE06 ='$datacut[DECOSUBCODE06]'
                                                                                                                                    AND SUBCODE07 ='$datacut[DECOSUBCODE07]'
                                                                                                                                    AND SUBCODE08 ='$datacut[DECOSUBCODE08]' ");
                                                                        $data_product = db2_fetch_assoc($query_nama);
                                                                        echo TRIM($data_product['LONGDESCRIPTION']); ?>
                                                                        </td>
                                                                        <td><?php $query_balance = db2_exec($conn1, "SELECT *
                                                                                                                                                FROM STOCKTRANSACTION s 
                                                                                                                                                WHERE ITEMELEMENTCODE ='$elements'
                                                                                                                                                ORDER BY TRANSACTIONNUMBER DESC
                                                                                                                                                LIMIT 1 ");
                                                                        $data_transaction = db2_fetch_assoc($query_balance);
                                                                        echo TRIM($data_transaction['LOTCODE']); ?>
                                                                        </td>
                                                                        <td><?php echo TRIM($data_transaction['USERPRIMARYQUANTITY']) . ' ' . TRIM($data_transaction['USERPRIMARYUOMCODE']); ?>
                                                                        </td>
                                                                        <td><?php echo TRIM($data_transaction['LOGICALWAREHOUSECODE']); ?>
                                                                        </td>
                                                                        <td><?php echo TRIM($datacut['PROJECTCODE']); ?>
                                                                        </td>
                                                                    </tr>



                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <?php $query = db2_exec($conn1, "SELECT * FROM ITXVIEW_CUT_ELEMENT WHERE ITEMELEMENTCODE ='$elements' ");
                                                ?>
                                                <div class="card-block">
                                                    <h5>Data Elements Awal</h5>
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="basic" class="table compact table-bordered nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>No Elements</th>
                                                                    <th>Hanger</th>
                                                                    <th>Item</th>
                                                                    <th>LOT</th>
                                                                    <th>QTY</th>
                                                                    <th>Warehouse</th>
                                                                    <th>Project</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                while ($datael = db2_fetch_assoc($query)) { ?>
                                                                    <tr>
                                                                        <td><?php echo $datael['ELEMENTSCUT']; ?></td>
                                                                        <td><?php $query_hang = db2_exec($conn1, "SELECT * FROM ELEMENTS WHERE CODE ='$elements' ");
                                                                        $data_hanger = db2_fetch_assoc($query_hang);
                                                                        echo TRIM($data_hanger['DECOSUBCODE02']) . '-' . TRIM($data_hanger['DECOSUBCODE03']); ?>
                                                                        </td>
                                                                        <td><?php $query_nama = db2_exec($conn1, "SELECT *
                                                                                                                                    FROM PRODUCT p 
                                                                                                                                    WHERE p.ITEMTYPECODE ='$datael[ITEMTYPECODE]'
                                                                                                                                    AND SUBCODE01 ='$datael[DECOSUBCODE01]'
                                                                                                                                    AND SUBCODE02 ='$datael[DECOSUBCODE02]'
                                                                                                                                    AND SUBCODE03 ='$datael[DECOSUBCODE03]'
                                                                                                                                    AND SUBCODE04 ='$datael[DECOSUBCODE04]'
                                                                                                                                    AND SUBCODE05 ='$datael[DECOSUBCODE05]'
                                                                                                                                    AND SUBCODE06 ='$datael[DECOSUBCODE06]'
                                                                                                                                    AND SUBCODE07 ='$datael[DECOSUBCODE07]'
                                                                                                                                    AND SUBCODE08 ='$datael[DECOSUBCODE08]' ");
                                                                        $data_product = db2_fetch_assoc($query_nama);
                                                                        echo TRIM($data_product['LONGDESCRIPTION']); ?>
                                                                        </td>
                                                                        <td><?php $query_balance = db2_exec($conn1, "SELECT *
                                                                                                                                                FROM STOCKTRANSACTION s 
                                                                                                                                                WHERE ITEMELEMENTCODE ='$datael[ELEMENTSCUT]'
                                                                                                                                                ORDER BY TRANSACTIONNUMBER DESC
                                                                                                                                                LIMIT 1 ");
                                                                        $data_transaction = db2_fetch_assoc($query_balance);
                                                                        echo TRIM($datael['LOTCODE']); ?>
                                                                        </td>
                                                                        <td><?php echo TRIM($data_transaction['USERPRIMARYQUANTITY']) . ' ' . TRIM($data_transaction['USERPRIMARYUOMCODE']); ?>
                                                                        </td>
                                                                        <td><?php echo TRIM($data_transaction['LOGICALWAREHOUSECODE']); ?>
                                                                        </td>
                                                                        <td><?php echo TRIM($data_transaction['PROJECTCODE']); ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
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
    <script type="text/javascript" src="files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js">
    </script>
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