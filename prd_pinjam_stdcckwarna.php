<?php 
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php";
    $pinjambuku = 'pinjam_buku';

    if (isset($_POST['Simpan'])){
        $nowarna = $_POST['no_warna'];
        $kode    = $_POST['kode'];
        $note    = $_POST['note'];

        if(empty($nowarna) && empty($kode)){
            $warning1 = 'Silahkan pilih No Warna';
            $warning2 = 'Silahkan pilih Kode';
        }elseif(!empty($nowarna) && empty($kode)){
            $warning1 = '';
            $warning2 = 'Silahkan pilih Kode';
        }elseif(empty($nowarna) && !empty($kode)){
            $warning1 = 'Silahkan pilih No Warna';
            $warning2 = '';
        }else{
            $warning1 = '';
            $warning2 = '';
            $insert_master      = mysqli_query($con_nowprd, "INSERT INTO buku_pinjam(no_warna,kode,note)VALUES('$nowarna', '$kode', '$note')");
        }

        if($insert_master){
            header("Location: prd_pinjam_stdcckwarna.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRD - PINJAM BUKU STD CCK WARNA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <link rel="icon" href="files\assets\images\favicon.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" type="text/css" href="files\bower_components\bootstrap\css\bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="files\assets\icon\themify-icons\themify-icons.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="files\assets\icon\icofont\css\icofont.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="files\assets\icon\feather\css\feather.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="files\assets\pages\prism\prism.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="files\assets\css\style.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="files\assets\css\jquery.mCustomScrollbar.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css"> -->


    <link rel="stylesheet" type="text/css" href="files\assets\css\pcoded-horizontal.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\icon\themify-icons\themify-icons.css">
    <link rel="stylesheet" type="text/css" href="files\assets\icon\icofont\css\icofont.css">
    <link rel="stylesheet" type="text/css" href="files\assets\icon\feather\css\feather.css">
    <link rel="stylesheet" href="files\bower_components\select2\css\select2.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\bootstrap-multiselect\css\bootstrap-multiselect.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\multiselect\css\multi-select.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\style.css">
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
                                        <h5>Input data </h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"><span style="color: red;"><i><?= $warning1; ?></i></span><br>Pilih No Warna</label>
                                                <div class="col-sm-10">
                                                    <select name="no_warna" class="js-example-basic-single">
                                                        <option value="" selected disabled>Pilih No Warna</option>
                                                        <?php
                                                            $q_usergeneric  = db2_exec($conn1, "SELECT TRIM(CODE) AS CODE, TRIM(LONGDESCRIPTION) AS LONGDESCRIPTION FROM USERGENERICGROUP WHERE USERGENERICGROUPTYPECODE = 'CL1'");
                                                        ?>
                                                        <?php while ($row_usergeneric = db2_fetch_assoc($q_usergeneric)) { ?>
                                                            <option value="<?= $row_usergeneric['CODE']; ?>"><?= $row_usergeneric['CODE'].'- '.$row_usergeneric['LONGDESCRIPTION']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"><span style="color: red;"><i><?= $warning2; ?></i></span><br>Kode</label>
                                                <div class="col-sm-10">
                                                    <select name="kode" class="form-control">
                                                        <option value="" selected disabled>Kode</option>
                                                        <option value="DL">DL - Dye Lot Card</option>
                                                        <option value="RC">RC - Recipe Card</option>
                                                        <option value="OR">OR - Original</option>
                                                        <option value="LD">LD - Lab Dip</option>
                                                        <option value="SL">SL - Sample L/D</option>
                                                        <option value="TE">TE - Tempelan Sample Celup</option>
                                                        <option value="FL">FL - Frist Lot</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Note</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="note" placeholder="Note...">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" name="Simpan" class="btn btn-primary m-b-0">Submit</button>
                                                    <button type="submit" name="Lihat" class="btn btn-warning m-b-0">Lihat Data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST['Lihat'])) : ?>
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <th>No Warna</th>
                                                        <th>Kode</th>
                                                        <th>Note</th>
                                                        <th>Barcode</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $q_bukupinjam   = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam");
                                                        ?>
                                                        <?php while ($row_bukupinjam = mysqli_fetch_array($q_bukupinjam)) { ?>
                                                            <tr>
                                                                <td><?= $row_bukupinjam['no_warna']; ?></td>
                                                                <td>
                                                                    <a style="border-bottom:1px dashed green;" data-pk="<?= $row_bukupinjam['id'] ?>" data-value="<?= $row_bukupinjam['kode'] ?>" class="kode_edit" href="javascipt:void(0)">
                                                                        <?= $row_bukupinjam['kode']; ?>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a style="border-bottom:1px dashed green;" data-pk="<?= $row_bukupinjam['id'] ?>" data-value="<?= $row_bukupinjam['note'] ?>" class="note_edit" href="javascipt:void(0)">
                                                                        <?= $row_bukupinjam['note']; ?>
                                                                    </a>
                                                                </td>
                                                                <td><a href="printbarcode_bukupinjam.php?id=<?= sprintf("%'.06d\n", $row_bukupinjam['id']); ?>" class="btn btn-success btn-sm" target="_blank">Print Barcode</a></td>
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