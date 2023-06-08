<!DOCTYPE html>
<html lang="en">
<head>
    <title>DYE - Check Rcode DYE LAB</title>
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
                                                <div class="col-sm-12 col-xl-12 m-b-30">
                                                    <h4 class="sub-title">Production Order</h4>
                                                    <input type="text" name="prod_order" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['prod_order']; } ?>">
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
                                            <?php 
                                                ini_set("error_reporting", 1);
                                                session_start();
                                                require_once "koneksi.php";

                                                $hasil_celup = mysqli_query($con_db_dyeing, "SELECT * FROM tbl_hasilcelup WHERE nokk = '$_POST[prod_order]'");
                                                $dt_hc  = mysqli_fetch_assoc($hasil_celup);

                                                $_noprod    = substr($dt_hc['no_resep'], 0,8);
    						                    $_groupline	= substr($dt_hc['no_resep'], 9);
                                                $rcode_recipe   = db2_exec($conn1, "SELECT 
                                                                                        a.VALUESTRING AS RCODE
                                                                                    FROM
                                                                                        PRODUCTIONRESERVATION p
                                                                                    LEFT JOIN RECIPE r ON r.SUBCODE01 = p.SUBCODE01 AND r.SUFFIXCODE = p.SUFFIXCODE 
                                                                                    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = r.ABSUNIQUEID AND a.FIELDNAME = 'RCode'
                                                                                    WHERE 
                                                                                        p.PRODUCTIONORDERCODE = '$_noprod' AND GROUPLINE = '$_groupline'");
                                                $dt_rcode    	= db2_fetch_assoc($rcode_recipe);
                                            ?>
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-12 m-b-30">
                                                    <h4 class="sub-title">Rcode di dyeing (Legacy) : <b><?= $dt_hc['rcode']; ?></b> </h4>
                                                    <h4 class="sub-title">Rcode di Laborat (Recipe - Additional Data - Rcode)  : <b><?= $dt_rcode['RCODE']; ?></b> </h4>
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
</body>
<?php require_once 'footer.php'; ?>