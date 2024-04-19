<?php
 header("content-type:application/vnd-ms-excel");
header("content-disposition:attachment;filename=Memo Penting.xls");
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
            <th title="Sumber data: &#013; 1. Production Order &#013; 2. Reservation &#013; 3. KFF/KGF User Primary Quantity">QTY SALINAN</th>
            <th>QTY PACKING</th>
            <th>NETTO(kg)</th>
            <th>NETTO(yd)</th>
            <th>DELAY</th>
            <th>KODE DEPT</th>
            <th>STATUS TERAKHIR</th>
            <th>NOMOR MESIN SCHEDULE</th>
            <th>NOMOR URUT SCHEDULE</th>
            <th>DELAY PROGRESS STATUS</th>
            <th>PROGRESS STATUS</th>
            <th>TOTAL HARI </th>
            <th>JAM (IN - OUT)</th>
            <th>ALUR PROSES</th>
            <th>LOT</th>
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
            $sqlDB2 = "SELECT DISTINCT * FROM itxview_memopentingppc WHERE (PROGRESSSTATUS <> '6' AND PROGRESSSTATUS_DEMAND <> '6') $where_order2 $where_date2 AND IPADDRESS = '$_SERVER[REMOTE_ADDR]'";
            $stmt   = mysqli_query($con_nowprd, $sqlDB2);
            while ($rowdb2 = mysqli_fetch_array($stmt)) {
        ?>
            <?php 
                //Deteksi Production Demand Closed Atau Belum
                if($rowdb2['PROGRESSSTATUS_DEMAND'] == 6){
                    $status = 'AAA';
                    $kode_dept          = '-';
                    $status_terakhir    = '-';
                    $status_operation   = 'KK Oke';
                }else{
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

                       // UNTUK DELAY PROGRESS STATUS PERMINTAAN MS. AMY
                            if($row_status_close['PROGRESSSTATUS'] == '2'){ // KALAU PROGRESS STATUSNYA ENTERED
                                $q_delay_progress_selesai   = db2_exec($conn1, "SELECT 
                                                                                    p.PRODUCTIONORDERCODE AS PRODUCTIONORDERCODE, 
                                                                                    CASE
                                                                                        WHEN TRIM(p.STEPTYPE) = '0' THEN p.GROUPSTEPNUMBER
                                                                                        WHEN TRIM(p.STEPTYPE) = '3' THEN p2.STEPNUMBER 
                                                                                        ELSE p.GROUPSTEPNUMBER
                                                                                    END AS GROUPSTEPNUMBER,
                                                                                    iptip.MULAI,
                                                                                    DAYS(CURRENT DATE) - DAYS(iptip.MULAI) AS DELAY_PROGRESSSTATUS,
                                                                                    p.PROGRESSSTATUS AS PROGRESSSTATUS
                                                                                FROM 
                                                                                    PRODUCTIONDEMANDSTEP p
                                                                                LEFT JOIN PRODUCTIONDEMANDSTEP p2 ON p2.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND p2.STEPTYPE = p.STEPTYPE AND p2.OPERATIONCODE = p.OPERATIONCODE 
                                                                                LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                WHERE
                                                                                    p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND p.PROGRESSSTATUS = '2' ORDER BY p.GROUPSTEPNUMBER DESC LIMIT 1");
                                $d_delay_progress_selesai   = db2_fetch_assoc($q_delay_progress_selesai);
                                $jam_status_terakhir        = $d_delay_progress_selesai['MULAI'];
                                $delay_progress_status      = $d_delay_progress_selesai['DELAY_PROGRESSSTATUS'].' Hari';
                            }elseif($row_status_close['PROGRESSSTATUS'] == '3'){ // KALAU PROGRESS STATUSNYA PROGRESS
                                $q_delay_progress_mulai   = db2_exec($conn1, "SELECT 
                                                                                    p.PRODUCTIONORDERCODE AS PRODUCTIONORDERCODE, 
                                                                                    CASE
                                                                                        WHEN TRIM(p.STEPTYPE) = '0' THEN p.GROUPSTEPNUMBER
                                                                                        WHEN TRIM(p.STEPTYPE) = '3' THEN p2.STEPNUMBER 
                                                                                        ELSE p.GROUPSTEPNUMBER
                                                                                    END AS GROUPSTEPNUMBER,
                                                                                    COALESCE(iptop.SELESAI, SUBSTRING(p2.LASTUPDATEDATETIME, 1, 19)) AS SELESAI,
                                                                                    DAYS(CURRENT DATE) - COALESCE(DAYS(iptop.SELESAI), DAYS(p2.LASTUPDATEDATETIME)) AS DELAY_PROGRESSSTATUS,
                                                                                    p.PROGRESSSTATUS AS PROGRESSSTATUS
                                                                                FROM 
                                                                                    VIEWPRODUCTIONDEMANDSTEP p
                                                                                LEFT JOIN PRODUCTIONDEMANDSTEP p2 ON p2.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND p2.STEPTYPE = p.STEPTYPE AND p2.OPERATIONCODE = p.OPERATIONCODE
                                                                                LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE 
                                                                                                                                    AND iptop.DEMANDSTEPSTEPNUMBER = 
                                                                                                                                        CASE
                                                                                                                                            WHEN TRIM(p.STEPTYPE) = '0' THEN p.GROUPSTEPNUMBER
                                                                                                                                            WHEN TRIM(p.STEPTYPE) = '3' THEN p2.STEPNUMBER 
                                                                                                                                            ELSE p.GROUPSTEPNUMBER
                                                                                                                                        END
                                                                                WHERE
                                                                                    p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND p.PROGRESSSTATUS = '3' 
                                                                                    AND (NOT iptop.SELESAI IS NULL OR NOT p2.LASTUPDATEDATETIME IS NULL)
                                                                                ORDER BY 
                                                                                    CASE
                                                                                        WHEN TRIM(p.STEPTYPE) = '0' THEN p.GROUPSTEPNUMBER 
                                                                                        WHEN TRIM(p.STEPTYPE) = '3' THEN p2.STEPNUMBER 
                                                                                        ELSE p.GROUPSTEPNUMBER
                                                                                    END DESC 
                                                                                LIMIT 1");
                                $d_delay_progress_mulai   = db2_fetch_assoc($q_delay_progress_mulai);
                                $jam_status_terakhir      = $d_delay_progress_mulai['SELESAI'];
                                $delay_progress_status    = $d_delay_progress_mulai['DELAY_PROGRESSSTATUS'].' Hari';
                            }else{
                                $jam_status_terakhir      = '';
                                $delay_progress_status    = '';
                            }
                        // UNTUK DELAY PROGRESS STATUS PERMINTAAN MS. AMY

                        if(!empty($row_status_close['GROUPSTEPNUMBER'])){
                            $groupstepnumber    = $row_status_close['GROUPSTEPNUMBER'];
                        }else{
                            $groupstepnumber    = '0';
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
                                $groupstep_option   = "= 0";
                            }else{
                                $status = 'D';
                                if($row_status_close['PROGRESSSTATUS'] == 2){
                                    $status = 'E';
                                    $groupstep_option       = "= '$groupstepnumber'";
                                }else{ //kalau status terakhirnya bukan PPC dan status terakhirnya CLOSED
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
                                                                                TRIM(o.OPERATIONGROUPCODE) AS OPERATIONGROUPCODE,
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

                                if($d_not_cnp_close){
                                    $kode_dept          = $d_not_cnp_close['OPERATIONGROUPCODE'];
                                    $status_terakhir    = $d_not_cnp_close['LONGDESCRIPTION'];
                                    $status_operation   = $d_not_cnp_close['STATUS_OPERATION'];
                                }else{
                                    $status = 'H';
                                    $groupstep_option       = "= '$groupstepnumber'";
                                    $q_not_cnp1             = db2_exec($conn1, "SELECT 
                                                                                GROUPSTEPNUMBER,
                                                                                TRIM(OPERATIONCODE) AS OPERATIONCODE,
                                                                                TRIM(o.OPERATIONGROUPCODE) AS OPERATIONGROUPCODE,
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
                                    
                                    $kode_dept          = $d_not_cnp_close['OPERATIONGROUPCODE'];
                                    $status_terakhir    = $d_not_cnp_close['LONGDESCRIPTION'];
                                    $status_operation   = $d_not_cnp_close['STATUS_OPERATION'];
                                }
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
                                                                        TRIM(o.OPERATIONGROUPCODE) AS OPERATIONGROUPCODE,
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
                            $kode_dept          = $d_StatusTerakhir['OPERATIONGROUPCODE'];
                            $status_terakhir    = $d_StatusTerakhir['LONGDESCRIPTION'];
                            $status_operation   = $d_StatusTerakhir['STATUS_OPERATION'];
                        }
                    }
                }
            ?>
            <?php
                // Cek stepnya udah close semua atau belum
                $q_deteksi_total_step   = db2_exec($conn1, "SELECT COUNT(*) AS TOTALSTEP FROM VIEWPRODUCTIONDEMANDSTEP 
                                                            WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]'");
                $d_deteksi_total_step   = db2_fetch_assoc($q_deteksi_total_step);

                $q_deteksi_total_close  = db2_exec($conn1, "SELECT COUNT(*) AS TOTALCLOSE FROM VIEWPRODUCTIONDEMANDSTEP 
                                                            WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND PROGRESSSTATUS = 3");
                $d_deteksi_total_close  = db2_fetch_assoc($q_deteksi_total_close);

                if($d_deteksi_total_step['TOTALSTEP'] ==  $d_deteksi_total_close['TOTALCLOSE']){ // jika stepnya SUDAH close semua, lalu...
                    // cari PPC4 -> ada atau tidak
                    $q_cek_ppc4     = db2_exec($conn1, "SELECT COUNT(*) AS KKOKE FROM VIEWPRODUCTIONDEMANDSTEP 
                                                            WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND OPERATIONCODE = 'PPC4'");
                    $d_cek_ppc4     = db2_fetch_assoc($q_cek_ppc4);
                    if($d_cek_ppc4['KKOKE'] == 0){ // jika TIDAK ADA PPC4
                        $show_hide   = 'hide';
                    }else{ // jika ADA PPC4
                        $show_hide   = 'show';
                    }
                }else{// Jika stepnya BELUM close semua, lalu
                    $show_hide   = 'show';
                }
            ?>
            <?php if($show_hide == 'show') : ?>
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
                                echo $d_gramasi['GRAMASI_KFF'];
                            } else {
                                echo $d_gramasi['GRAMASI_FKF'];
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
                    <td>
                        <?php
                            $q_orig_pd_code     = db2_exec($conn1, "SELECT 
                                                                        *, a.VALUESTRING AS ORIGINALPDCODE
                                                                    FROM 
                                                                        PRODUCTIONDEMAND p 
                                                                    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'
                                                                    WHERE p.CODE = '$rowdb2[DEMAND]'");
                            $d_orig_pd_code     = db2_fetch_assoc($q_orig_pd_code);
                        ?>
                        <?php if($d_orig_pd_code['ORIGINALPDCODE']) : ?>
                            0
                        <?php else : ?>
                            <?= number_format($rowdb2['QTY_BAGIKAIN'],2); ?>
                        <?php endif; ?>
                    </td> <!-- BRUTO/BAGI KAIN -->
                    <td>
                        <?php 
                            $q_qtysalinan = db2_exec($conn1, "SELECT * FROM PRODUCTIONDEMAND WHERE CODE = '$rowdb2[DEMAND]'");
                            $d_qtysalinan = db2_fetch_assoc($q_qtysalinan);
                        ?>
                        <?php if($d_orig_pd_code['ORIGINALPDCODE']) : ?>
                            <?= number_format($d_qtysalinan['USERPRIMARYQUANTITY'],3) ?>
                        <?php else : ?>
                            0
                        <?php endif; ?>
                    </td> <!-- QTY SALINAN -->
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
                    <td><?= $kode_dept; ?></td> <!-- KODE DEPT -->
                    <td><?= $status_terakhir; ?> (<?= $jam_status_terakhir; ?>)</td> <!-- STATUS TERAKHIR -->
                    <td>
                        <?php
                            if($kode_dept == 'DYE'){
                                $q_schedule_dye     = mysqli_query($con_db_dyeing, "SELECT * FROM `tbl_schedule` WHERE nokk = '$rowdb2[NO_KK]'  AND NOT `status` = 'selesai'");
                                $data_schedule_dye  = mysqli_fetch_assoc($q_schedule_dye);
                                $nomesin            = $data_schedule_dye['no_mesin'];
                                $nourut             = $data_schedule_dye['no_urut'];
                            }elseif($kode_dept == 'FIN'){
                                $schedule_fin       = mysqli_query($con_db_finishing, "SELECT * FROM `tbl_schedule_new` WHERE nokk = '$rowdb2[NO_KK]' AND nodemand = '$rowdb2[DEMAND]' ORDER BY id DESC LIMIT 1");
                                $data_schedule_fin  = mysqli_fetch_assoc($schedule_fin);
                                $nomesin            = $data_schedule_fin['no_mesin']. '-'.substr(TRIM($data_schedule_fin['no_mesin']), -5, 2).substr(TRIM($data_schedule_fin['no_mesin']), -2);
                                $nourut             = $data_schedule_fin['nourut'];
                            }else{
                                $nomesin            = '';
                                $nourut             = '';
                            }
                        ?>
                        <?= $nomesin; ?>
                    </td> <!-- NOMOR MESIN SCHEDULE -->
                    <td><?= $nourut; ?></td> <!-- NOMOR URUT SCHEDULE -->
                    <td><?= $delay_progress_status; ?></td> <!-- DELAY PROGRESS STATUS -->
                    <td><?= $status_operation; ?></td> <!-- PROGRESS STATUS -->
                    <td>
                        <?php
                            if(!empty($d_tglbagikain['TRANSACTIONDATE'])){
                                $tgl_bagikain   = date_create(substr($d_tglbagikain['TRANSACTIONDATE'], 0, 10));
                                $tglsekarang    = date_create(date('Y-m-d H:i:s'));
                                $diff_totalharibagikain = date_diff($tgl_bagikain, $tglsekarang);

                                // echo $diff_totalharibagikain->m. ' Bulan, '.$diff_totalharibagikain->d. ' Hari';
                                echo $diff_totalharibagikain->days. ' Hari';
                            }else{
                                $tgl_buka_kartu   = date_create(substr($rowdb2['ORDERDATE'], 0, 10));
                                $tglsekarang    = date_create(date('Y-m-d H:i:s'));
                                $diff_totalharibagikain = date_diff($tgl_buka_kartu, $tglsekarang);

                                // echo $diff_totalharibagikain->m. ' Bulan, '.$diff_totalharibagikain->d. ' Hari';
                                echo $diff_totalharibagikain->days. ' Hari';
                            }
                        ?>
                    </td> <!-- TOTAL HARI BAGI KAIN -->
                    <td>
                        <?php
                            session_start();
                            require_once "koneksi.php";
                            $q_jam  = db2_exec($conn1, "SELECT
                                                            iptip.MULAI,
                                                            iptop.SELESAI
                                                        FROM 
                                                            PRODUCTIONDEMANDSTEP p 
                                                        LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                        WHERE
                                                            p.PRODUCTIONORDERCODE  = '$rowdb2[NO_KK]' AND p.PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]' AND p.GROUPSTEPNUMBER $groupstep_option
                                                        ORDER BY p.GROUPSTEPNUMBER ASC LIMIT 1");
                            $d_jam  = db2_fetch_assoc($q_jam);
                            if(!empty($d_jam['MULAI'])){
                                echo $d_jam['MULAI'].' - '.$d_jam['SELESAI'];
                            }else{
                                echo '-';
                            }
                        ?>
                    </td><!-- JAM -->
                    <td></td><!-- ALUR PROSES -->
                    <td>`<?= $rowdb2['LOT']; ?></td> <!-- LOT -->
                    <td><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?= $rowdb2['DEMAND']; ?>&prod_order=<?= $rowdb2['NO_KK']; ?>">`<?= $rowdb2['DEMAND']; ?></a></td> <!-- DEMAND -->
                    <td>`<?= $rowdb2['NO_KK']; ?></td> <!-- NO KARTU KERJA -->
                    <td>
                        <?php
                            $sql_benang_booking_new		= db2_exec($conn1, "SELECT * FROM ITXVIEW_BOOKING_NEW WHERE SALESORDERCODE = '$rowdb2[NO_ORDER]'
                                                                                                    AND ORDERLINE = '$rowdb2[ORDERLINE]'");
                            $r_benang_booking_new		= db2_fetch_assoc($sql_benang_booking_new);
                            $d_benang_booking_new		= $r_benang_booking_new['SALESORDERCODE'];

                        ?>
                        <?php
                            $sql_benang_rajut		= db2_exec($conn1, "SELECT
                                                                            *
                                                                        FROM
                                                                            ITXVIEW_RAJUT
                                                                        WHERE
                                                                            (ITEMTYPEAFICODE ='KGF' OR ITEMTYPEAFICODE ='FKG')
                                                                            AND TRIM(SUBCODE01) = '$d_qtysalinan[SUBCODE01]'
                                                                            AND TRIM(SUBCODE02) = '$d_qtysalinan[SUBCODE02]'
                                                                            AND TRIM(SUBCODE03) = '$d_qtysalinan[SUBCODE03]'
                                                                            AND TRIM(SUBCODE04) = '$d_qtysalinan[SUBCODE04]'
                                                                            AND TRIM(ORIGDLVSALORDLINESALORDERCODE) = '$rowdb2[NO_ORDER]'");
                            $r_benang_rajut		= db2_fetch_assoc($sql_benang_rajut);
                            $d_benang_rajut		= $r_benang_rajut['CODE'];
                        ?>
                        <!-- <a href="http://online.indotaichen.com/laporan/ppc_catatan_po_greige.php?" target="_blank">Detail</a> -->
                        <?php if($d_benang_booking_new){ echo $d_benang_booking_new.'. Greige Ready'; } ?>
                        <?php if($d_benang_rajut){ echo $d_benang_rajut.'. Rajut'; } ?>
                    </td> <!-- CATATAN PO GREIGE -->
                    <td></td> <!-- TARGET SELESAI -->
                    <td><?= $rowdb2['KETERANGAN']; ?></td> <!-- KETERANGAN -->
                    <td><?= $d_orig_pd_code['ORIGINALPDCODE']; ?></td> <!-- ORIGINAL PD CODE -->
                </tr>
            <?php endif; ?>
        <?php } ?>
    </tbody>
</table>