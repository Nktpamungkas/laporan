<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Sales Report $_GET[tgl1] s/d $_GET[tgl2].xls");
    header('Cache-Control: max-age=0');
?>
<table>
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
            require_once "koneksi.php";
            $_tgl1  = $_GET['tgl1'];
            $_tgl2  = $_GET['tgl2'];
            $q_salesreport = "SELECT *,
                                    case 
                                        when length(tax_ID) = 15 then CONCAT(left(tax_ID,2),'.',mid(tax_ID,3,3),'.',mid(tax_ID,6,3),'.',mid(tax_ID,9,1),'-',mid(tax_ID,10,3),'.',mid(tax_ID,13,3))
                                        else
                                        CONCAT('0',left(tax_ID,1),'.',mid(tax_ID,2,3),'.',mid(tax_ID,5,3),'.',mid(tax_ID,8,1),'-',mid(tax_ID,9,3),'.',mid(tax_ID,12,3))
                                    end as NPWP,
                                    CONCAT(idinvoicetype_normal,'/ ',purchaseorder_normal,buyernumber_normal) as PO_NO
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