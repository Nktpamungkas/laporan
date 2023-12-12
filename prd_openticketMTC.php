<!DOCTYPE html>
<html lang="en">

<head>
    <title>OPENTICKET MTC</title>
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
                                        <h5>DEPARTEMENT :</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Departemen:</h4>
                                                    <select name="dept" class="js-example-basic-single col-sm-12" style="width: 100%;" required>
                                                        <option value="-" disabled selected>-</option>
                                                        <?php 
                                                            require_once "koneksi.php"; 
                                                            $sqlDB  = "SELECT DEPARTMENTCODE, DEPTNAME FROM ITXVIEW_OPENTICKET_MTC GROUP BY DEPARTMENTCODE, DEPTNAME";
                                                            $stmt   = db2_exec($conn1, $sqlDB);
                                                            while ($rowdb = db2_fetch_assoc($stmt)) {
                                                        ?>
                                                        <option value="<?= $rowdb['DEPARTMENTCODE']; ?>" <?php if($_POST['dept'] == $rowdb['DEPARTMENTCODE']){ echo "SELECTED"; } ?>>                                
                                                            <?= $rowdb['DEPTNAME']; ?>
                                                        </option>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Status:</h4>
                                                    <select name="status" class="js-example-basic-single col-sm-12" style="width: 100%;" required>
                                                        <option value="-" disabled selected>-</option>
                                                        <option value="All" <?php if($_POST['status'] == 'All'){ echo "SELECTED"; } ?>>All</option>
                                                        <option value="Open" <?php if($_POST['status'] == 'Open'){ echo "SELECTED"; } ?>>Open</option>
                                                        <option value="In Progress" <?php if($_POST['status'] == 'In Progress'){ echo "SELECTED"; } ?>>In Progress</option>
                                                        <option value="Closed" <?php if($_POST['status'] == 'Closed'){ echo "SELECTED"; } ?>>Closed</option>
                                                        <option value="Suspended" <?php if($_POST['status'] == 'Suspended'){ echo "SELECTED"; } ?>>Suspended</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">&nbsp;</h4>
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
                                                <table id="lang-dt" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>CODE</th>
                                                            <th>DEPT</th>
                                                            <th>CREATIONUSER</th>
                                                            <th>Responsible of scheduling</th>
                                                            <th>Default assigned to</th>
                                                            <th>PRIORITY LEVEL</th=>
                                                            <th>STATUS</th>
                                                            <th>PERMASALAHAN</th>
                                                            <th>PENYELESAIAN</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            ini_set("error_reporting", 1);
                                                            session_start();
                                                            require_once "koneksi.php"; 
                                                        ?>
                                                        <?php
                                                            $dept   = $_POST['dept'];
                                                            $status = $_POST['status'];
                                                            if($status = 'All'){
                                                                $sqlDB2     = "SELECT * FROM ITXVIEW_OPENTICKET_MTC WHERE TRIM(DEPARTMENTCODE) = '$dept' ORDER BY CODE ASC";
                                                            }else{
                                                                $sqlDB2     = "SELECT * FROM ITXVIEW_OPENTICKET_MTC WHERE TRIM(DEPARTMENTCODE) = '$dept' AND STATUS = '$status' ORDER BY CODE ASC";
                                                            }
                                                            $stmt       = db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
                                                            $no = 1;
                                                            while ($rowdb2 = db2_fetch_assoc($stmt)) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $rowdb2['CODE']; ?></td>
                                                            <td><?= $rowdb2['DEPTNAME']; ?></td>
                                                            <td><?= $rowdb2['CREATIONUSER']; ?></td>
                                                            <td><?= $rowdb2['RESPONSIBLEOFSCHEDULINGUSERID']; ?></td>
                                                            <td><?= $rowdb2['DEFAULTASSIGNEDTOUSERID']; ?></td>
                                                            <td><?= $rowdb2['PRIORITYLEVEL']; ?></td>
                                                            <td><?= $rowdb2['STATUS']; ?></td>
                                                            <td><?= $rowdb2['PERMASALAHAN']; ?></td>
                                                            <td><?= $rowdb2['PERBAIKAN']; ?></td>
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