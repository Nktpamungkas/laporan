<!DOCTYPE html>
<html lang="en">
<head>
    <title>PPC - Memo Penting</title>
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
    <script src="TabCounter.js"></script>
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
                                        <h5>Filter by</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Issue Date From</h4>
                                                    <input type="date" name="tgl1" class="form-control" id="tgl1" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl1']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Until Date</h4>
                                                    <input type="date" name="tgl2" class="form-control" id="tgl2" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl2']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary">Cari data</button>
                                                    <?php if (isset($_POST['submit'])) : ?>
                                                        <a class="btn btn-mat btn-success" href="ppc_memopenting-excel.php?no_order=<?= $_POST['no_order']; ?>&tgl1=<?= $_POST['tgl1']; ?>&tgl2=<?= $_POST['tgl2']; ?>">CETAK EXCEL</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST['submit'])) : ?>
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table id="lang-dt" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>KETERANGAN</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php 
                                                            ini_set("error_reporting", 1);
                                                            session_start();
                                                            require_once "koneksi.php";
                                                            $tgl1     = $_POST['tgl1'];
                                                            $tgl2     = $_POST['tgl2'];

                                                            if($tgl1 & $tgl2){
                                                                $where_date     = "DELIVERY BETWEEN '$tgl1' AND '$tgl2'";
                                                            }else{
                                                                $where_date     = "";
                                                            }
                                                            $sqlDB2 = "";
                                                            $stmt   = db2_exec($conn1,$sqlDB2);
                                                            while ($rowdb2 = db2_fetch_assoc($stmt)) {
                                                        ?>
                                                        <tr>
                                                            <td></td> <!-- TGL TERIMA ORDER -->
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