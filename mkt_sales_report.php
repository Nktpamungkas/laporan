<!DOCTYPE html>
<html lang="en">
<head>
    <title>MKT - Sales Report</title>
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
                                        <h5>Sales Report</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <h4 class="sub-title">From Date</h4>
                                                    <input type="date" class="form-control" name="tgl1" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl1']; } ?>" required>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <h4 class="sub-title">Until Date</h4>
                                                    <input type="date" class="form-control" name="tgl2" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl2']; } ?>" required>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <h4 class="sub-title">Pencarian Berdasarkan</h4>
                                                    <select class="form-control" name="berdasarkan">
                                                        <option value="invoice" selected>Invoice</option>
                                                        <!-- <option value="sj">Surat Jalan</option> -->
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary"><i class="icofont icofont-search-alt-1"></i> Cari data</button>
                                                    <?php if (isset($_POST['submit'])) : ?>
                                                        <a class="btn btn-mat btn-success" href="mkt_salesreport-excel.php?tgl1=<?= $_POST['tgl1']; ?>&tgl2=<?= $_POST['tgl2']; ?>">CETAK KE EXCEL</a>
                                                    <?php endif; ?>
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
                                                            <th>INVOICE</th>
                                                            <th>DATE</th>
                                                            <th>DUE</th>
                                                            <th>DATE KB</th>
                                                            <th>DUE DATE KB</th>
                                                            <th>CUST</th>
                                                            <th>NAMA</th>
                                                            <th>NPWP</th>
                                                            <th>F.PAJAK</th>
                                                            <th>ORDER NO</th>
                                                            <th>PO NO.</th>
                                                            <th>P.TERMS</th>
                                                            <th>RATE</th>
                                                            <th>BERAT</th>
                                                            <th>YRD/PCS/MTR</th>
                                                            <th>DPP</th>
                                                            <th>DPP(BC)</th>
                                                            <th>VAT</th>
                                                            <th>VAT(BC)</th>
                                                            <th>TOTAL</th>
                                                            <th>TOTAL(BC)</th>
                                                            <th>AMOUNT</th>
                                                            <th>PAYMENT ID</th>
                                                            <th>PAYMENT (TOTAL)</th>
                                                            <th>ADJUSTMENT</th>
                                                            <th>DATE</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            ini_set("error_reporting", 1);
                                                            session_start();
                                                            require_once "koneksi.php";
                                                            $_tgl1  = $_POST['tgl1'];
                                                            $_tgl2  = $_POST['tgl2'];
                                                            $q_salesreport = "SELECT *,case 
                                                                                        when length(tax_ID) = 15 then CONCAT(left(tax_ID,2),'.',mid(tax_ID,3,3),'.',mid(tax_ID,6,3),'.',mid(tax_ID,9,1),'-',mid(tax_ID,10,3),'.',mid(tax_ID,13,3))
                                                                                        else
                                                                                        CONCAT('0',left(tax_ID,1),'.',mid(tax_ID,2,3),'.',mid(tax_ID,5,3),'.',mid(tax_ID,8,1),'-',mid(tax_ID,9,3),'.',mid(tax_ID,12,3))
                                                                                    end as NPWP,
                                                                                    CONCAT(idinvoicetype_normal,'/ ',purchaseorder_normal,buyernumber_normal) as PO_NO,
                                                                                    net_amount * ratecurrency_normal as DPP_BC,
                                                                                    ppn * (net_amount * ratecurrency_normal) as VAT,
                                                                                    net_amount + (ppn * (net_amount * ratecurrency_normal)) as TOTAL,
                                                                                    Floor((net_amount * ratecurrency_normal) + (ppn * (net_amount * ratecurrency_normal))) as TOTAL_BC
                                                                                FROM 
                                                                                    `laporan bulanan (payment)`
                                                                                WHERE datenow BETWEEN '$_tgl1' AND '$_tgl2'";
                                                            $stmt   = mysqli_query($con_invoice, $q_salesreport);
                                                            $no     = 1;
                                                            while ($row_salesreport = mysqli_fetch_array($stmt)) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $row_salesreport['inv']; ?></td>
                                                            <td><?= $row_salesreport['datenow']; ?></td>
                                                            <td><?= $row_salesreport['duedate_normal']; ?></td>
                                                            <td><?= $row_salesreport['date_kontrabon_normal']; ?></td>
                                                            <td><?= $row_salesreport['duedate_kontrabon_normal']; ?></td>
                                                            <td><?= $row_salesreport['idcustomerakunting_normal']; ?></td>
                                                            <td><?= $row_salesreport['namacustomerakunting_normal']; ?></td>
                                                            <td><?= $row_salesreport['NPWP']; ?></td>
                                                            <td><?= $row_salesreport['taxtransaction_normal']; ?></td>
                                                            <td><?= $row_salesreport['orderno_normal']; ?></td>
                                                            <td><?= $row_salesreport['PO_NO']; ?></td>
                                                            <td><?= $row_salesreport['terms_normal']; ?></td>
                                                            <td><?= $row_salesreport['ratecurrency_normal']; ?></td>
                                                            <td><?= $row_salesreport['Berat']; ?></td>
                                                            <td><?= $row_salesreport['berat_lain']; ?></td>
                                                            <td><?= $row_salesreport['net_amount']; ?></td> <!-- DPP -->
                                                            <td><?= $row_salesreport['net_amount'] * $row_salesreport['ratecurrency_normal']; ?></td> <!-- DPP BC -->
                                                            <td><?= $row_salesreport['net_amount'] * $row_salesreport['ppn']; ?></td> <!-- VAT -->
                                                            <td><?= ($row_salesreport['net_amount'] * $row_salesreport['ratecurrency_normal']) * $row_salesreport['ppn']; ?></td> <!-- VAT BC -->
                                                            <td><?= $row_salesreport['net_amount'] + ($row_salesreport['net_amount'] * $row_salesreport['ppn']); ?></td> <!-- TOTAL -->
                                                            <td><?= ($row_salesreport['net_amount'] * $row_salesreport['ratecurrency_normal']) + ($row_salesreport['net_amount'] * $row_salesreport['ratecurrency_normal']) * $row_salesreport['ppn']; ?></td> <!-- TOTAL BC -->
                                                            <td><?= $row_salesreport['net_amount'] + ($row_salesreport['net_amount'] * $row_salesreport['ppn']); ?></td> <!-- AMUONT -->
                                                            <td><?= $row_salesreport['PaymentID']; ?></td>
                                                            <td><?= $row_salesreport['Payment_total']; ?></td>
                                                            <td><?= $row_salesreport['biaya_bank']; ?></td>
                                                            <td><?= $row_salesreport['date']; ?></td>
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

    <script type="text/javascript" src="files\bower_components\i18next\js\i18next.min.js"></script>
    <script type="text/javascript" src="files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
    <script type="text/javascript" src="files\bower_components\select2\js\select2.full.min.js"></script>
    <script type="text/javascript" src="files\bower_components\bootstrap-multiselect\js\bootstrap-multiselect.js"></script>
    <script type="text/javascript" src="files\bower_components\multiselect\js\jquery.multi-select.js"></script>
    <script type="text/javascript" src="files\assets\js\jquery.quicksearch.js"></script>
    <script type="text/javascript" src="files\assets\pages\advance-elements\select2-custom.js"></script>
    <script src="files\assets\js\pcoded.min.js"></script>
    <script src="files\assets\js\menu\menu-hori-fixed.js"></script>
    <script src="files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="files\assets\js\script.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

    <script type="text/javascript" src="files\assets\pages\prism\custom-prism.js"></script>
    <script src="files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="files\assets\js\script.js"></script>

    <script src="files\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
    <script src="files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
    <script src="files\assets\pages\data-table\js\jszip.min.js"></script>
    <script src="files\assets\pages\data-table\js\pdfmake.min.js"></script>
    <script src="files\assets\pages\data-table\js\vfs_fonts.js"></script>
    <script src="files\bower_components\datatables.net-buttons\js\buttons.print.min.js"></script>
    <script src="files\bower_components\datatables.net-buttons\js\buttons.html5.min.js"></script>
    <script src="files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
    <script src="files\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
    <script src="files\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
</body>
</html>