<?php
    if (isset($_POST['update'])) {
        require_once "koneksi.php";
        $tgl1   = $_POST['tgl1'];
        $tgl2   = $_POST['tgl2'];
        if($tgl1 && $tgl2){
            $where  = "WHERE TGL_INV BETWEEN '$tgl1' AND '$tgl2'";
        }else{
            $where  = "";
        }
        $q_cekinvoice_now   = db2_exec($conn1, "SELECT INVOICE,
                                                    TGL_INV,
                                                    DUE,
                                                    KODE_CUS,
                                                    NAMA_CUS,
                                                    NPWP,
                                                    FAKTUR_PAJAK,
                                                    NO_ORDER,
                                                    CASE
                                                        WHEN NO_PO IS NULL THEN '-'
                                                        ELSE NO_PO
                                                    END AS NO_PO,
                                                    DESC_KAIN,
                                                    CODE_PAYMENT,
                                                    CURR,
                                                    PPN,
                                                    CASE
                                                        WHEN PAYMENT_TERMS = 0 THEN CODE_PAYMENT
                                                        ELSE PAYMENT_TERMS
                                                    END AS PAYMENT_TERMS,
                                                    UNIT,
                                                    RATE,
                                                    BERAT,
                                                    BERAT_LAIN,
                                                    CASE
                                                        WHEN CURR = 'IDR' THEN TOTAL_BC
                                                        WHEN CURR = 'USD' THEN TOTAL
                                                    END AS TOTAL_PAYMENT,
                                                    KODE_BEP,
                                                    NAMA_BEP,
                                                    CASE
                                                        WHEN CURR = 'IDR' THEN DPP_BC
                                                        WHEN CURR = 'USD' THEN DPP 
                                                    END AS DPP,
                                                    TGL_CREATE
                                                FROM 
                                                    ITXVIEW_INVOICE_NOINVOICE
                                                $where");
        while ($row_invoicenow = db2_fetch_assoc($q_cekinvoice_now)) {
            // echo $row_invoicenow['INVOICE'].'<br>';
            $cek_invoice    = mysqli_query($con_invoice, "SELECT count(*) AS jumlah FROM new_invoice_normal_now WHERE invoice_normal = '$row_invoicenow[INVOICE]'");
            $row_invoice    = mysqli_fetch_assoc($cek_invoice);
            if($row_invoice['jumlah'] >= 1){
                $exec_updateinvoice    = mysqli_query($con_invoice, "UPDATE new_invoice_normal_now
                                                                        SET `date` = '$row_invoicenow[TGL_INV]',
                                                                            due = '$row_invoicenow[DUE]',
                                                                            terms = '$row_invoicenow[PAYMENT_TERMS]',
                                                                            `order` = '$row_invoicenow[NO_ORDER]',
                                                                            kodebep = '$row_invoicenow[KODE_BEP]',
                                                                            namabep = '$row_invoicenow[NAMA_BEP]',
                                                                            kodecus = '$row_invoicenow[KODE_CUS]',
                                                                            namacus = '$row_invoicenow[NAMA_CUS]',
                                                                            no_po = '$row_invoicenow[NO_PO]',
                                                                            curr = '$row_invoicenow[CURR]',
                                                                            ratecurrency_normal = '$row_invoicenow[RATE]',
                                                                            unit = '$row_invoicenow[UNIT]',
                                                                            ppn = '$row_invoicenow[PPN]',
                                                                            faktur_pajak = '$row_invoicenow[FAKTUR_PAJAK]',
                                                                            npwp = '$row_invoicenow[NPWP]',
                                                                            berat = '$row_invoicenow[BERAT]',
                                                                            berat_lain = '$row_invoicenow[BERAT_LAIN]',
                                                                            total_invoice = '$row_invoicenow[TOTAL_PAYMENT]',
                                                                            total_payment = '$row_invoicenow[TOTAL_PAYMENT]',
                                                                            template = '$row_invoicenow[DESC_KAIN]',
                                                                            dpp = '$row_invoicenow[DPP]',
                                                                            tgl_buatinv = '$row_invoicenow[TGL_CREATE]'
                                                                    WHERE 
                                                                            invoice_normal = '$row_invoicenow[INVOICE]'
                                                                            AND statuspayment = ''");
                
            }else{
                $exec_insertinvoice     = mysqli_query($con_invoice, "INSERT INTO new_invoice_normal_now(invoice_normal,
                                                                                                            `date`,
                                                                                                            due,
                                                                                                            terms,
                                                                                                            template,
                                                                                                            `order`,
                                                                                                            kodebep,
                                                                                                            namabep,
                                                                                                            kodecus,
                                                                                                            namacus,
                                                                                                            no_po,
                                                                                                            curr,
                                                                                                            ratecurrency_normal,
                                                                                                            unit,
                                                                                                            ppn,
                                                                                                            faktur_pajak,
                                                                                                            npwp,
                                                                                                            berat,
                                                                                                            berat_lain,
                                                                                                            dpp,
                                                                                                            total_invoice,
                                                                                                            total_payment,
                                                                                                            tgl_buatinv)
                                                                                                VALUES ('$row_invoicenow[INVOICE]',
                                                                                                        '$row_invoicenow[TGL_INV]',
                                                                                                        '$row_invoicenow[DUE]',
                                                                                                        '$row_invoicenow[PAYMENT_TERMS]',
                                                                                                        '$row_invoicenow[DESC_KAIN]',
                                                                                                        '$row_invoicenow[NO_ORDER]',
                                                                                                        '$row_invoicenow[KODE_BEP]',
                                                                                                        '$row_invoicenow[NAMA_BEP]',
                                                                                                        '$row_invoicenow[KODE_CUS]',
                                                                                                        '$row_invoicenow[NAMA_CUS]',
                                                                                                        '$row_invoicenow[NO_PO]',
                                                                                                        '$row_invoicenow[CURR]',
                                                                                                        '$row_invoicenow[RATE]',
                                                                                                        '$row_invoicenow[UNIT]',
                                                                                                        '$row_invoicenow[PPN]',
                                                                                                        '$row_invoicenow[FAKTUR_PAJAK]',
                                                                                                        '$row_invoicenow[NPWP]',
                                                                                                        '$row_invoicenow[BERAT]',
                                                                                                        '$row_invoicenow[BERAT_LAIN]',
                                                                                                        '$row_invoicenow[DPP]',
                                                                                                        '$row_invoicenow[TOTAL_PAYMENT]',
                                                                                                        '$row_invoicenow[TOTAL_PAYMENT]',
                                                                                                        '$row_invoicenow[TGL_CREATE]')");
            }
        }
        echo '<script language="javascript">';
        echo 'let text = "Berhasil menyimpan data !";
                if (confirm(text) == true) {
                    document.location.href = "mkt_update_invoicenow.php";
                } else {
                    document.location.href = "mkt_update_invoicenow.php";
                }';
        echo '</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>MKT - UPDATE INVOICE</title>
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
    <link rel="stylesheet" href="files\bower_components\select2\css\select2.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\prism\prism.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\pcoded-horizontal.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
</head>
<style>
    .blink_me {
        animation: blinker 1s linear infinite;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }
</style>
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
                                        <h5>Filter Update Invoice</h5>
                                    </div>
                                    <form action="" method="post">
                                        <div class="card-block">
                                            <div class="form-group row">
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Dari Tanggal</h4>
                                                    <input type="date" name="tgl1" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl1']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Sampai Tanggal</h4>
                                                    <input type="date" name="tgl2" class="form-control" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl2']; } ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xl-12 m-b-30">
                                                <button type="submit" name="update" class="btn btn-primary btn-sm"><i class="icofont icofont-save"></i> Update Invoice</button>
                                                <p>*Note : Jika ingin update seluruh tanggal, silahkan klik <b>Update Invoice</b> secara langsung tanpa memilih tanggal.</p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once 'footer.php'; ?>