<?php
// header("content-type:application/vnd-ms-excel");
header("content-disposition:attachment;filename=Memo Penting.ods");
header('Cache-Control: max-age=0');
?>
<style>
    .str {
        mso-number-format: \@;
    }
</style>
<table>
    <thead>
        <tr>
            <th>TGL BUKA KARTU</th>
            <th>PELANGGAN</th>
            <th>NO. ORDER</th>
            <th>NO. PO</th>
            <th>KETERANGAN PRODUCT</th>
            <th>LEBAR</th>
            <th>GRAMASI</th>
            <th>WARNA</th>
            <th>NO WARNA</th>
            <th>DELIVERY</th>
            <th>BAGI KAIN TGL</th>
            <th>ROLL</th>
            <th>BRUTO/BAGI KAIN</th>
            <th>QTY PACKING</th>
            <th>NETTO(kg)</th>
            <th>NETTO(yd)</th>
            <th>DELAY</th>
            <th>KODE DEPT</th>
            <th>STATUS TERAKHIR</th>
            <th>PROGRESS STATUS</th>
            <th>JAM</th>
            <th>ALUR PROSES</th>
            <th>NO DEMAND</th>
            <th>NO KARTU KERJA</th>
            <th>CATATAN PO GREIGE</th>
            <th>TARGET SELESAI</th>
            <th>KETERANGAN</th>
            <th>ORIGINAL PD CODE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            ini_set("error_reporting", 1);
            session_start();
            require_once "koneksi.php";

            $no_order_2 = $_GET['no_order'];
            $tgl1_2     = $_GET['tgl1'];
            $tgl2_2     = $_GET['tgl2'];

            if ($no_order_2) {
                $where_order2    = "AND NO_ORDER = '$no_order_2'";
            } else {
                $where_order2    = "";
            }
            if ($tgl1_2 & $tgl2_2) {
                $where_date2     = "AND DELIVERY BETWEEN '$tgl1_2' AND '$tgl2_2'";
            } else {
                $where_date2     = "";
            }
            $sqlDB2 = "SELECT DISTINCT * FROM itxview_memopentingppc WHERE PROGRESSSTATUS <> '6' $where_order2 $where_date2 AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'";
            $stmt   = mysqli_query($con_nowprd, $sqlDB2);
            while ($rowdb2 = mysqli_fetch_array($stmt)) {
        ?>
            <tr>
                <td><?= $rowdb2['ORDERDATE']; ?></td> <!-- TGL TERIMA ORDER -->
                <td><?= $rowdb2['PELANGGAN']; ?></td> <!-- PELANGGAN -->
                <td><?= $rowdb2['NO_ORDER']; ?></td> <!-- NO. ORDER -->
                <td><?= $rowdb2['NO_PO']; ?></td> <!-- NO. PO -->
                <td><?= $rowdb2['KETERANGAN_PRODUCT']; ?></td> <!-- KETERANGAN PRODUCT -->
                <td>
                    <?php
                        $q_lebar = db2_exec($conn1, "SELECT * FROM ITXVIEWLEBAR WHERE SALESORDERCODE = '$rowdb2[NO_ORDER]' AND ORDERLINE = '$rowdb2[ORDERLINE]'");
                        $d_lebar = db2_fetch_assoc($q_lebar);
                    ?>
                    <?= number_format($d_lebar['LEBAR'], 0); ?>
                </td> <!-- LEBAR -->
                <td>
                    <?php
                        $q_gramasi = db2_exec($conn1, "SELECT * FROM ITXVIEWGRAMASI WHERE SALESORDERCODE = '$rowdb2[NO_ORDER]' AND ORDERLINE = '$rowdb2[ORDERLINE]'");
                        $d_gramasi = db2_fetch_assoc($q_gramasi);
                        ?>
                        <?php
                        if ($d_gramasi['GRAMASI_KFF']) {
                            echo number_format($d_gramasi['GRAMASI_KFF'], 0);
                        } else {
                            echo number_format($d_gramasi['GRAMASI_FKF'], 0);
                        }
                    ?>
                </td> <!-- GRAMASI -->
                <td><?= $rowdb2['WARNA']; ?></td> <!-- WARNA -->
                <td><?= $rowdb2['NO_WARNA']; ?></td> <!-- NO WARNA -->
                <td><?= $rowdb2['DELIVERY']; ?></td> <!-- DELIVERY -->
                <td>
                    <?php
                        $q_tglbagikain = db2_exec($conn1, "SELECT * FROM ITXVIEW_TGLBAGIKAIN WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]'");
                        $d_tglbagikain = db2_fetch_assoc($q_tglbagikain);
                    ?>
                    <?= $d_tglbagikain['TRANSACTIONDATE']; ?>
                </td> <!-- BAGI KAIN TGL -->
                <td>
                    <?php
                        // KK GABUNG
                        // $q_roll_gabung      = db2_exec($conn1, "SELECT 
                        //                                     COUNT(*) AS ROLL
                        //                                 FROM 
                        //                                     PRODUCTIONDEMAND p 
                        //                                 LEFT JOIN STOCKTRANSACTION s ON s.ORDERCODE = p.CODE
                        //                                 WHERE 
                        //                                     p.RESERVATIONORDERCODE = '$rowdb2[DEMAND]'");
                        // $d_roll_gabung      = db2_fetch_assoc($q_roll_gabung);

                        // KK TIDAK GABUNG
                        $q_roll_tdk_gabung  = db2_exec($conn1, "SELECT count(*) AS ROLL, s2.PRODUCTIONORDERCODE
                                                                    FROM STOCKTRANSACTION s2 
                                                                    WHERE s2.ITEMTYPECODE ='KGF' AND s2.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]'
                                                                    GROUP BY s2.PRODUCTIONORDERCODE");
                        $d_roll_tdk_gabung  = db2_fetch_assoc($q_roll_tdk_gabung);

                        // if(!empty($d_roll_gabung['ROLL'])){
                            // $roll   = $d_roll_gabung['ROLL'];
                        // }else{
                            $roll   = $d_roll_tdk_gabung['ROLL'];
                        // }
                    ?>
                    <?= $roll; ?>
                </td> <!-- ROLL -->
                <td><?= number_format($rowdb2['QTY_BAGIKAIN'], 2); ?></td> <!-- BRUTO/BAGI KAIN -->
                <td>
                    <?php
                        $q_qtypacking = db2_exec($conn1, "SELECT * FROM ITXVIEW_QTYPACKING WHERE DEMANDCODE = '$rowdb2[DEMAND]'");
                        $d_qtypacking = db2_fetch_assoc($q_qtypacking);
                        echo $d_qtypacking['QTY_PACKING'];
                    ?>
                </td> <!-- QTY PACKING -->
                <td><?= number_format($rowdb2['NETTO'], 0); ?></td> <!-- NETTO -->
                <td>
                    <?php 
                        $sql_netto_yd = db2_exec($conn1, "SELECT * FROM ITXVIEW_NETTO WHERE CODE = '$rowdb2[DEMAND]'");
                        $d_netto_yd = db2_fetch_assoc($sql_netto_yd);
                        echo number_format($d_netto_yd['BASESECONDARYQUANTITY'],0);
                    ?>
                </td> <!-- NETTO KG-->
                <td><?= $rowdb2['DELAY']; ?></td> <!-- DELAY -->
                <?php 
                    // 1. Deteksi Production Order Closed Atau belum
                    if($rowdb2['PROGRESSSTATUS'] == 6){
                        $status = 'AA';
                        $kode_dept          = '-';
                        $status_terakhir    = '-';
                        $status_operation   = 'KK Oke';
                    }else{
                        // mendeteksi statusnya close
                        $q_deteksi_status_close = db2_exec($conn1, "SELECT 
                                                                        p.PRODUCTIONORDERCODE AS PRODUCTIONORDERCODE, 
                                                                        p.GROUPSTEPNUMBER AS GROUPSTEPNUMBER,
                                                                        p.PROGRESSSTATUS AS PROGRESSSTATUS
                                                                    FROM 
                                                                        VIEWPRODUCTIONDEMANDSTEP p
                                                                    WHERE
                                                                        p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND
                                                                        (p.PROGRESSSTATUS = '3' OR p.PROGRESSSTATUS = '2') ORDER BY p.GROUPSTEPNUMBER DESC LIMIT 1");
                        $row_status_close = db2_fetch_assoc($q_deteksi_status_close);
                        if(!empty($row_status_close['GROUPSTEPNUMBER'])){
                            $groupstepnumber    = $row_status_close['GROUPSTEPNUMBER'];
                        }else{
                            $groupstepnumber    = '10';
                        }

                        $q_cnp1             = db2_exec($conn1, "SELECT 
                                                                    GROUPSTEPNUMBER,
                                                                    TRIM(OPERATIONCODE) AS OPERATIONCODE,
                                                                    o.LONGDESCRIPTION AS LONGDESCRIPTION,
                                                                    PROGRESSSTATUS,
                                                                    CASE
                                                                        WHEN PROGRESSSTATUS = 0 THEN 'Entered'
                                                                        WHEN PROGRESSSTATUS = 1 THEN 'Planned'
                                                                        WHEN PROGRESSSTATUS = 2 THEN 'Progress'
                                                                        WHEN PROGRESSSTATUS = 3 THEN 'Closed'
                                                                    END AS STATUS_OPERATION
                                                                FROM 
                                                                    VIEWPRODUCTIONDEMANDSTEP v
                                                                LEFT JOIN OPERATION o ON o.CODE = v.OPERATIONCODE
                                                                WHERE 
                                                                    PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND PROGRESSSTATUS = 3 
                                                                ORDER BY 
                                                                    GROUPSTEPNUMBER DESC LIMIT 1");
                        $d_cnp_close        = db2_fetch_assoc($q_cnp1);

                        if($d_cnp_close['PROGRESSSTATUS'] == 3){ // 3 is Closed From Demands Steps 
                            $status = 'A';
                            if($d_cnp_close['OPERATIONCODE'] == 'PPC4'){
                                if($rowdb2['PROGRESSSTATUS'] == 6){
                                    $status = 'B';
                                    $kode_dept          = '-';
                                    $status_terakhir    = '-';
                                    $status_operation   = 'KK Oke';
                                }else{
                                    $status = 'C';
                                    $kode_dept          = '-';
                                    $status_terakhir    = '-';
                                    $status_operation   = 'KK Oke | Segera Closed Production Order!';
                                }
                            }else{
                                $status = 'D';
                                if($row_status_close['PROGRESSSTATUS'] == 2){
                                    $status = 'E';
                                    $groupstep_option       = "= '$groupstepnumber'";
                                }else{
                                    $status = 'F';
                                    $q_deteksi_total_step    = db2_exec($conn1, "SELECT COUNT(*) AS TOTALSTEP FROM VIEWPRODUCTIONDEMANDSTEP 
                                                                                WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]'");
                                    $d_deteksi_total_step    = db2_fetch_assoc($q_deteksi_total_step);

                                    $q_deteksi_total_close  = db2_exec($conn1, "SELECT COUNT(*) AS TOTALCLOSE FROM VIEWPRODUCTIONDEMANDSTEP 
                                                                                WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]'
                                                                                AND PROGRESSSTATUS = 3");
                                    $d_deteksi_total_close  = db2_fetch_assoc($q_deteksi_total_close);

                                    if($d_deteksi_total_step['TOTALSTEP'] ==  $d_deteksi_total_close['TOTALCLOSE']){
                                        $groupstep_option       = "= '$groupstepnumber'";
                                    }else{
                                        $groupstep_option       = "> '$groupstepnumber'";
                                    }
                                }
                                // $status = 'G';
                                $q_not_cnp1             = db2_exec($conn1, "SELECT 
                                                                                GROUPSTEPNUMBER,
                                                                                TRIM(OPERATIONCODE) AS OPERATIONCODE,
                                                                                o.LONGDESCRIPTION AS LONGDESCRIPTION,
                                                                                PROGRESSSTATUS,
                                                                                CASE
                                                                                    WHEN PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                    WHEN PROGRESSSTATUS = 1 THEN 'Planned'
                                                                                    WHEN PROGRESSSTATUS = 2 THEN 'Progress'
                                                                                    WHEN PROGRESSSTATUS = 3 THEN 'Closed'
                                                                                END AS STATUS_OPERATION
                                                                            FROM 
                                                                                VIEWPRODUCTIONDEMANDSTEP v
                                                                            LEFT JOIN OPERATION o ON o.CODE = v.OPERATIONCODE
                                                                            WHERE 
                                                                                PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND 
                                                                                GROUPSTEPNUMBER $groupstep_option
                                                                            ORDER BY 
                                                                                GROUPSTEPNUMBER ASC LIMIT 1");
                                $d_not_cnp_close        = db2_fetch_assoc($q_not_cnp1);

                                $kode_dept          = $d_not_cnp_close['OPERATIONCODE'];
                                $status_terakhir    = $d_not_cnp_close['LONGDESCRIPTION'];
                                $status_operation   = $d_not_cnp_close['STATUS_OPERATION'];
                            }
                        }else{
                            $status = 'H';
                            if($row_status_close['PROGRESSSTATUS'] == 2){
                                $status = 'I';
                                $groupstep_option       = "= '$groupstepnumber'";
                            }else{
                                $status = 'J';
                                $groupstep_option       = "> '$groupstepnumber'";
                            }
                            $status = 'K';
                            $q_StatusTerakhir   = db2_exec($conn1, "SELECT 
                                                                        p.PRODUCTIONORDERCODE, 
                                                                        p.GROUPSTEPNUMBER, 
                                                                        p.OPERATIONCODE, 
                                                                        o.LONGDESCRIPTION AS LONGDESCRIPTION, 
                                                                        CASE
                                                                            WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
                                                                            WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
                                                                            WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
                                                                            WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
                                                                        END AS STATUS_OPERATION,
                                                                        wc.LONGDESCRIPTION AS DEPT, 
                                                                        p.WORKCENTERCODE
                                                                    FROM 
                                                                        VIEWPRODUCTIONDEMANDSTEP p                                                                                                        -- p.PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]' AND
                                                                    LEFT JOIN WORKCENTER wc ON wc.CODE = p.WORKCENTERCODE
                                                                    LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE
                                                                    WHERE 
                                                                        p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND
                                                                        (p.PROGRESSSTATUS = '0' OR p.PROGRESSSTATUS = '1' OR p.PROGRESSSTATUS ='2') 
                                                                        AND p.GROUPSTEPNUMBER $groupstep_option
                                                                    ORDER BY p.GROUPSTEPNUMBER ASC LIMIT 1");
                            $d_StatusTerakhir   = db2_fetch_assoc($q_StatusTerakhir);
                            $kode_dept          = $d_StatusTerakhir['OPERATIONCODE'];
                            $status_terakhir    = $d_StatusTerakhir['LONGDESCRIPTION'];
                            $status_operation   = $d_StatusTerakhir['STATUS_OPERATION'];
                        }
                    }
                ?>
                <td><?= $kode_dept; ?></td> <!-- KODE DEPT -->
                <td><?= $status_terakhir; ?></td> <!-- STATUS TERAKHIR -->
                <td><?= $status_operation; ?></td> <!-- PROGRESS STATUS -->
                <td></td><!-- JAM -->
                <td></td><!-- ALUR PROSES -->
                <td><a target="_BLANK" href="http://10.0.0.10/laporan/ppc_filter_steps.php?demand=<?= $rowdb2['DEMAND']; ?>&prod_order=<?= $rowdb2['NO_KK']; ?>">`<?= $rowdb2['DEMAND']; ?></a></td> <!-- DEMAND -->
                <td>`<?= $rowdb2['NO_KK']; ?></td> <!-- NO KARTU KERJA -->
                <td>
                    <?php
                        $sql_benang_booking_new		= db2_exec($conn1, "SELECT * FROM ITXVIEW_BOOKING_NEW WHERE SALESORDERCODE = '$rowdb2[NO_ORDER]'
                                                                                                AND ORDERLINE = '$rowdb2[ORDERLINE]'");
                        $r_benang_booking_new		= db2_fetch_assoc($sql_benang_booking_new);
                        $d_benang_booking_new		= $r_benang_booking_new['SALESORDERCODE'];

                    ?>
                    <!-- <a href="http://online.indotaichen.com/laporan/ppc_catatan_po_greige.php?" target="_blank">Detail</a> -->
                    <?php if($d_benang_booking_new){ echo $d_benang_booking_new.'. Greige Ready'; } ?>
                </td> <!-- CATATAN PO GREIGE -->
                <td></td> <!-- TARGET SELESAI -->
                <td><?= $rowdb2['KETERANGAN']; ?></td> <!-- KETERANGAN -->
                <td>
                    <?php
                        $q_orig_pd_code     = db2_exec($conn1, "SELECT 
                                                                    *, a.VALUESTRING AS ORIGINALPDCODE
                                                                FROM 
                                                                    PRODUCTIONDEMAND p 
                                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'
                                                                WHERE p.CODE = '$rowdb2[DEMAND]'");
                        $d_orig_pd_code     = db2_fetch_assoc($q_orig_pd_code);
                        echo $d_orig_pd_code['ORIGINALPDCODE'];
                    ?>
                </td> <!-- ORIGINAL PD CODE -->
            </tr>
        <?php } ?>
    </tbody>