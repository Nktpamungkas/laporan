<?php 
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php";
    if (isset($_POST['submit'])) {
        $qry_usergeneric    = "SELECT
                                    CODE,
                                    VALUESTRING AS IDCUSTOMER,
                                    LEGALNAME1 AS CUSTOMER
                                FROM
                                    USERGENERICGROUP u 
                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = u.ABSUNIQUEID AND a.FIELDNAME = 'OriginalCustomerCode'
                                LEFT JOIN ORDERPARTNER o ON o.CUSTOMERSUPPLIERCODE = a.VALUESTRING 
                                LEFT JOIN BUSINESSPARTNER b ON b.NUMBERID = o.ORDERBUSINESSPARTNERNUMBERID
                                WHERE
                                    u.USERGENERICGROUPTYPECODE = 'CL1'";
        $usergenericgroup           = db2_exec($conn1, $qry_usergeneric);


        while ($row_usergenericgroup   = db2_fetch_assoc($usergenericgroup)) {
            $cekusergeneric_mysqli      = mysqli_query($con_nowprd, "SELECT COUNT(*) AS hasildata FROM buku_pinjam WHERE no_warna = '$row_usergenericgroup[CODE]'");
            $hasil_cek_mysqli           = mysqli_fetch_assoc($cekusergeneric_mysqli);

            if($hasil_cek_mysqli['hasildata'] == 0){
                $r_usergenericgroup[]      = "('".TRIM(addslashes($row_usergenericgroup['CODE']))."',"
                                            ."'RC',"
                                            ."'".TRIM(addslashes($row_usergenericgroup['IDCUSTOMER']))."',"
                                            ."'".TRIM(addslashes($row_usergenericgroup['CUSTOMER']))."',"
                                            ."'".$_SERVER['REMOTE_ADDR']."',"
                                            ."'".date('Y-m-d H:i:s')."')";
            }
        }
        if(!empty($r_usergenericgroup)){
            $value_usergenericgroup        = implode(',', $r_usergenericgroup);
            mysqli_query($con_nowprd, "INSERT INTO buku_pinjam(no_warna,kode,idcustomer,customer,IPADDRESS,CREATEDATETIME) VALUES $value_usergenericgroup");
        }

        header("Location: prd_pinjam_stdcckwarna.php");
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
                                        <h5>Sync Data</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-12 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-warning btn-sm">Fetch Data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Data Barcode</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="excel-LA" class="table compact table-striped table-bordered nowrap">
                                                <thead>
                                                    <th>No Barcode</th>
                                                    <th>No Warna</th>
                                                    <th>Kode</th>
                                                    <th>Note</th>
                                                    <th>Customer</th>
                                                    <th>Status Pinjam</th>
                                                    <th>Barcode</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $q_bukupinjam   = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam");
                                                    ?>
                                                    <?php while ($row_bukupinjam = mysqli_fetch_array($q_bukupinjam)) { ?>
                                                        <tr>
                                                            <td><?= sprintf("%'.06d\n", $row_bukupinjam['id']); ?></td>
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
                                                            <td><?= $row_bukupinjam['customer']; ?></td>
                                                            <td></td>
                                                            <td><a href="printbarcode_bukupinjam.php?id=<?= sprintf("%'.06d\n", $row_bukupinjam['id']); ?>" class="btn btn-success btn-sm" target="_blank">Print Barcode</a></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="files\bower_components\jquery\js\jquery.min.js"></script>
<script type="text/javascript" src="files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
<script src="files\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
<script src="files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
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
<?php require_once 'footer.php'; ?>