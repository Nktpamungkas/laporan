<?php
    // ini_set("error_reporting", 1);
    // session_start();
    require_once "koneksi.php";

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
                                                ITXVIEW_INVOICE_NOINVOICE");
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
        echo "Berhasil Update invoice";
?>