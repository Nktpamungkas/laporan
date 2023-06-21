<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Hasil Aktual CAMS.xls");
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
            $bonresep = substr($_GET['bon_resep'], 0, 8);
            $bonresep_line = substr($_GET['bon_resep'], 9,4);
            $sql_CAMS = "SELECT
                                rs_reservationline,
                                rs_creationdatetime,
                                rs_productionordercode,
                                rs_subcode01,
                                rs_subcode02,
                                rs_subcode03,
                                CASE
                                    WHEN (rs_subcode02 = '' AND rs_subcode03 = '')OR(rs_subcode02 IS NULL AND rs_subcode03 IS NULL) THEN rs_subcode01
                                    ELSE CONCAT(rs_subcode01, '-', rs_subcode02,'-', rs_subcode03)
                                END AS CODE,
                                RS_USERPRIMARYQUANTITY AS ACUAN_QTY,
                                RS_USEDUSERPRIMARYQUANTITY AS AKTUAL_QTY
                            FROM
                                tab_rs 
                            WHERE
                                rs_productionordercode LIKE '%$bonresep%' AND rs_reservationline > $bonresep_line AND rs_reservationline < $bonresep_line+100 AND NOT (rs_subcode02 = '' OR rs_subcode03 = '')";
            $stmt_CAMS = sqlsrv_query($conn_cams, $sql_CAMS);
            $no     = 1;
            while ($row_CAMS= sqlsrv_fetch_array($stmt_CAMS)) {
        ?>
        <tr>
            <td hidden><?= $row_CAMS['rs_reservationline']; ?></td>
            <td><?= $row_CAMS['rs_creationdatetime']->format('d-m-Y, H:i:s'); ?></td>
            <td>
                <?php
                    $sql_desc = db2_exec($conn1, "SELECT * FROM PRODUCT WHERE SUBCODE01 = '$row_CAMS[rs_subcode01]' AND
                                                                            SUBCODE02 = '$row_CAMS[rs_subcode02]' AND 
                                                                            SUBCODE03 = '$row_CAMS[rs_subcode03]'");
                    $d_row_desc = db2_fetch_assoc($sql_desc);
                    echo $d_row_desc['LONGDESCRIPTION'];
                ?>
            </td>
            <td><?= $row_CAMS['rs_productionordercode']; ?>-<?= $bonresep_line; ?></td>
            <td></td>
            <td><?= $row_CAMS['CODE']; ?></td>
            <td><?= $row_CAMS['ACUAN_QTY']; ?></td>
            <td><?php if($row_CAMS['AKTUAL_QTY'] != 0){ echo $row_CAMS['AKTUAL_QTY']; }else{ echo '';} ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>