<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=PERMOHONAN PEMBELIAN $_POST[applicant].xls");
    header('Cache-Control: max-age=0');
?>
<table>
    <thead>
        <tr>
            <th>HEADER CODE</th>
            <th>CODE</th>
            <th>APPLICANT</th>
            <th>DESTINATION WAREHOUSE</th>
            <th>ITEM TYPE</th>
            <th>ITEM</th>
            <th>DESCRIPTION</th>
            <th>QTY</th>
            <th>PURCHASE ORDER TEMPLATE</th>
            <th>REMARK</th>
            <th>REQUEST REASON</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            ini_set("error_reporting", 1);
            require_once "koneksi.php";
            $applicant = $_POST['applicant'];
            $sql_reservation = "SELECT * FROM REPLENISHMENTREQUISITION WHERE APPLICANTCODE LIKE '%$applicant%'";
            $stmt   = db2_exec($conn1, $sql_reservation);
            while ($row_reservation = db2_fetch_assoc($stmt)) {
        ?>
        <tr>
            <td><?= $row_reservation['HEADERCODE']; ?></td>
            <td><?= $row_reservation['CODE']; ?></td>
            <td><?= $row_reservation['APPLICANTCODE']; ?></td>
            <td style="text-align: center;"><?= $row_reservation['DESTINATIONWAREHOUSECODE']; ?></td>
            <td style="text-align: center;"><?= $row_reservation['ITEMTYPEAFICODE']; ?></td>
            <td><?= $row_reservation['SUBCODE01'].'-'.$row_reservation['SUBCODE02']; ?></td>
            <td><?= $row_reservation['LONGDESCRIPTION']; ?></td>
            <td style="text-align: center;"><?= $row_reservation['ORDERUSERPRIMARYQUANTITY']; ?></td>
            <td style="text-align: center;"><?= $row_reservation['REQUISITIONTEMPLATECODE']; ?></td>
            <td><?= $row_reservation['REMARK']; ?></td>
            <td><?= $row_reservation['REQUESTREASON']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>