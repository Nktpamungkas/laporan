<!DOCTYPE html>
<html lang="en">
<head>
    <title>PPC - Qty Knt</title>
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
                                                <div class="col-sm-12 col-xl-6 m-b-30">
                                                    <h4 class="sub-title">No Order/Project</h4>
                                                    <input type="text" name="project" class="form-control" value="<?php if(isset($_POST['submit'])){ echo $_POST['project']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-6 m-b-30">
                                                    <h4 class="sub-title">Nomor Demand</h4>
                                                    <input type="text" name="demand" class="form-control" value="<?php if(isset($_POST['submit'])){ echo $_POST['demand']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary"><i class="icofont icofont-search-alt-1"></i> Cari data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST['submit'])) : ?>
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="table-responsive dt-responsive">
                                                <table id="table" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr align="center">
                                                            <th width="100px">PROJECT</th>
                                                            <th width="100px">TGL RAJUT AWAL</th>
                                                            <th width="100px">TGL RAJUT AKHIR</th>
                                                            <th width="200px">PRODUCTION DEMAND</th>
                                                            <th width="100px">TOTAL QTY RAJUT</th>
                                                            <th width="100px">QTY SUDAH RAJUT</th>
                                                            <th width="100px">ACUAN QUALITY (ITEM)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php 
                                                            ini_set("error_reporting", 1);
                                                            session_start();
                                                            require_once "koneksi.php";
                                                            $project = $_POST['project'];
                                                            $demand = $_POST['demand'];
                                                            if($project AND empty($demand)){
                                                                $WHERE = "WHERE PRODUCTIONDEMAND.PROJECTCODE = '$project' AND PRODUCTIONDEMAND.ITEMTYPEAFICODE ='KGF' ";
                                                            }elseif(empty($project) AND $demand){
                                                                $WHERE = "WHERE PRODUCTIONDEMAND.CODE = '$demand' AND PRODUCTIONDEMAND.ITEMTYPEAFICODE ='KGF' ";
                                                            }else{
                                                                $WHERE = "WHERE PRODUCTIONDEMAND.PROJECTCODE = '$project' AND PRODUCTIONDEMAND.CODE = '$demand' AND PRODUCTIONDEMAND.ITEMTYPEAFICODE ='KGF' ";
                                                            }
                                                            $sqlDB2 = "SELECT 
                                                                            PRODUCTIONDEMAND.PROJECTCODE,
                                                                            PRODUCTIONDEMAND.INITIALSCHEDULEDDATE,
                                                                            PRODUCTIONDEMAND.FINALSCHEDULEDDATE,
                                                                            PRODUCTIONDEMAND.CODE,
                                                                            PRODUCTIONDEMAND.USERPRIMARYQUANTITY,
                                                                            PRODUCTIONDEMAND.ENTEREDUSERPRIMARYQUANTITY,
                                                                            TRIM(SALESORDERLINE.SUBCODE01) || ' - ' ||
                                                                            TRIM(SALESORDERLINE.SUBCODE02) || ' - ' ||
                                                                            TRIM(SALESORDERLINE.SUBCODE03) || ' - ' ||
                                                                            TRIM(SALESORDERLINE.SUBCODE04) || ' - ' ||
                                                                            TRIM(SALESORDERLINE.SUBCODE05) || ' - ' ||
                                                                            TRIM(SALESORDERLINE.SUBCODE06) || ' - ' ||
                                                                            TRIM(SALESORDERLINE.SUBCODE07) || ' - ' ||
                                                                            TRIM(SALESORDERLINE.SUBCODE08) AS ACUAN_QUALITY
                                                                        FROM 
                                                                            PRODUCTIONDEMAND PRODUCTIONDEMAND
                                                                        LEFT JOIN SALESORDER SALESORDER ON PRODUCTIONDEMAND.PROJECTCODE = SALESORDER.CODE
                                                                        LEFT JOIN SALESORDERLINE SALESORDERLINE ON SALESORDERLINE.SALESORDERCODE = SALESORDER.CODE
                                                                                                AND SALESORDERLINE.ORDERLINE = PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE
                                                                        LEFT JOIN PRODUCT PRODUCT ON PRODUCT.ITEMTYPECODE = PRODUCTIONDEMAND.ITEMTYPEAFICODE
                                                                                                AND PRODUCT.SUBCODE01 = PRODUCTIONDEMAND.SUBCODE01
                                                                                                AND PRODUCT.SUBCODE02 = PRODUCTIONDEMAND.SUBCODE02
                                                                                                AND PRODUCT.SUBCODE03 = PRODUCTIONDEMAND.SUBCODE03
                                                                                                AND PRODUCT.SUBCODE04 = PRODUCTIONDEMAND.SUBCODE04
                                                                                                AND PRODUCT.SUBCODE05 = PRODUCTIONDEMAND.SUBCODE05
                                                                                                AND PRODUCT.SUBCODE06 = PRODUCTIONDEMAND.SUBCODE06
                                                                                                AND PRODUCT.SUBCODE07 = PRODUCTIONDEMAND.SUBCODE07
                                                                                                AND PRODUCT.SUBCODE08 = PRODUCTIONDEMAND.SUBCODE08
                                                                                                AND PRODUCT.SUBCODE09 = PRODUCTIONDEMAND.SUBCODE09
                                                                                                AND PRODUCT.SUBCODE10 = PRODUCTIONDEMAND.SUBCODE10
                                                                        $WHERE";
                                                            $stmt = db2_exec($conn1,$sqlDB2);
                                                            while ($rowdb2 = db2_fetch_assoc($stmt)) {
                                                        ?>
                                                            <tr>
                                                                <td align="center"><?= $rowdb2['PROJECTCODE']; ?></td>
                                                                <td align="center"><?= $rowdb2['INITIALSCHEDULEDDATE']; ?></td>
                                                                <td align="center"><?= $rowdb2['FINALSCHEDULEDDATE']; ?></td>
                                                                <td align="center"><?= $rowdb2['CODE']; ?></td>
                                                                <td align="right"><?= $rowdb2['USERPRIMARYQUANTITY']; ?></td>
                                                                <td align="right"><?= $rowdb2['ENTEREDUSERPRIMARYQUANTITY']; ?></td>
                                                                <td align="left"><?= $rowdb2['ACUAN_QUALITY']; ?></td>
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
</body>
<?php require_once 'footer.php'; ?>