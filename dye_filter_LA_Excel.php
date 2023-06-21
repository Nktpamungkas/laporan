<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Hasil Aktual LA.xls");
    header('Cache-Control: max-age=0');
?>
<table>
    <thead>
        <tr align="center">
            <th width='5px' hidden>NO</th>
            <th width='100px'>TRANS DATE</th>
            <th width='100px'>DESCRIPTION</th>
            <th width='100px'>PROD ORDER</th>
            <th width='100px'>LOTCODE</th>
            <th width='100px'>DYC</th>
            <th width='100px'>TARGET</th>
            <th width='100px'>ACTUAL</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            ini_set("error_reporting", 1);
            require_once "koneksi.php";
            $sql_LA = "SELECT  
                                TICKET_DETAIL.RES_STRING3 AS BARIS,
                                TICKET_DETAIL.COMP_DATE,
                                TICKET_DETAIL.COMP_TIME,
                                TICKET_DETAIL.ID_NO,
                                TICKET_DETAIL.PRODUCT_CODE,
                                TICKET_DETAIL.TARGET_WT,
                                TICKET_DETAIL.ACTUAL_WT
                            FROM 
                                TICKET.dbo.TICKET_DETAIL TICKET_DETAIL
                            WHERE 
                                TICKET_DETAIL.ID_NO LIKE '%$_GET[bon_resep]%'
                            UNION ALL 
                                SELECT 
                                    Ticket_Detail_Addition.BARIS AS BARIS,
                                    Ticket_Detail_Addition.COMP_DATE,
                                    Ticket_Detail_Addition.COMP_TIME,
                                    Ticket_Detail_Addition.ID_NO,
                                    Ticket_Detail_Addition.PRODUCT_CODE,
                                    Ticket_Detail_Addition.TARGET_WT,
                                    Ticket_Detail_Addition.ACTUAL_WT
                                FROM 
                                    LA1000_Exchange.dbo.Ticket_Detail_Addition Ticket_Detail_Addition
                                WHERE 
                                    Ticket_Detail_Addition.ID_NO LIKE '%$_GET[bon_resep]%'
                            ORDER BY 
                                BARIS ASC";
            $stmt   = sqlsrv_query($conn_sql, $sql_LA);
            $no     = 1;
            while ($row_la = sqlsrv_fetch_array($stmt)) {
        ?>
        <tr>
            <td hidden><?= $row_la['BARIS']; ?></td>
            <td>
                <?php if(date('d-m-Y', strtotime($row_la['COMP_DATE'])) == '01-01-1970') : ?>
                <?php else : ?>
                    <?= date('d-m-Y', strtotime($row_la['COMP_DATE'])); ?>, <?= date('H:i:s', strtotime($row_la['COMP_TIME'])); ?>
                <?php endif; ?>
            </td>
            <td>
                <?php
                    $sql_desc = db2_exec($conn1, "SELECT * FROM PRODUCT WHERE TRIM(SUBCODE01) || '-' || TRIM(SUBCODE02) || '-' || TRIM(SUBCODE03) = '$row_la[PRODUCT_CODE]'");
                    $d_row_desc = db2_fetch_assoc($sql_desc);
                    echo $d_row_desc['LONGDESCRIPTION'];
                ?>
            </td>
            <td><?= $row_la['ID_NO']; ?></td>
            <td></td>
            <td><?= $row_la['PRODUCT_CODE']; ?></td>
            <td><?= $row_la['TARGET_WT']; ?></td>
            <td><?= $row_la['ACTUAL_WT']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>