<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=After Sales - Memo Penting Sudah kirim.xls");
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
            <th>TGL BUKA BON ORDER</th>
            <th>PELANGGAN</th>
            <th>NO. ORDER</th>
            <th>NO. PO</th>
            <th>ARTICLE GROUP</th>
            <th>ARTICLE CODE</th>
            <th>WARNA</th>
            <th>NO DEMAND</th>
            <th>NO KARTU KERJA</th>
            <th>QTY PACKING (KG)</th>
            <th>QTY PACKING (YD)</th>
            <th>QTY ORDER(KG) NETTO</th> 
            <th>QTY ORDER(YD) NETTO</th>
            <th>TGL SURAT JALAN</th>
            <th>NO. SURAT JALAN</th>
            <th>QTY KIRIM (KG)</th>
            <th>QTY KIRIM (YD)</th>
        </tr>
    </thead>
    <tbody>
        <?php
            ini_set("error_reporting", 1);
            session_start();
            require_once "koneksi.php";

            $prod_order_2   = $_GET['prod_order'];
            $prod_demand_2  = $_GET['prod_demand'];
            $no_order_2     = $_GET['no_order'];
            $tgl1_2         = $_GET['tgl1'];
            $tgl2_2         = $_GET['tgl2'];
            $operation_2    = $_GET['operation'];
            $no_po2         = $_GET['no_po'];
            $article_group2 = $_GET['article_group'];
            $article_code2  = $_GET['article_code'];
            $langganan_2    = $_GET['langganan'];
            $warna_2        = $_GET['warna'];
            $tgl1_orderdate_2 = $_GET['tgl1_orderdate'];
            $tgl2_orderdate_2 = $_GET['tgl2_orderdate'];

            if($prod_order_2){
                $where_prodorder2    = "NO_KK  = '$prod_order'";
            }else{
                $where_prodorder2    = "";
            }
            if($prod_demand_2){
                $where_proddemand2    = "DEMAND = '$prod_demand'";
            }else{
                $where_proddemand2    = "";
            }

            if($no_order_2){
                $where_order2            = "NO_ORDER LIKE '%$no_order_2%' AND CREATIONDATETIME_SALESORDER BETWEEN '$tgl1_orderdate_2' AND '$tgl2_orderdate_2'";
            }else{
                $where_order2            = "";
            }

            if($tgl1_2 & $tgl2_2){
                $where_date2     = "DELIVERY BETWEEN '$tgl1_2' AND '$tgl2_2' AND (SUBSTR(NO_ORDER, 1,3) = 'RFD' OR SUBSTR(NO_ORDER, 1,3) = 'RFE' OR SUBSTR(NO_ORDER, 1,3) = 'RPE' OR SUBSTR(NO_ORDER, 1,3) = 'REP')";
            }else{
                $where_date2     = "";
            }
            if($no_po2){
                $where_no_po2            = "NO_PO LIKE '%$no_po2%'";
            }else{
                $where_no_po2            = "";
            }
            if(!empty($article_group2) & !empty($article_code2)){
                $where_article2          = "ARTICLE_GROUP = '$article_group2' AND ARTICLE_CODE = '$article_code2'";
            }elseif(empty($article_group2) & !empty($article_code2)){
                $where_article2          = "ARTICLE_CODE = '$article_code2'";
            }elseif(!empty($article_group2) & empty($article_code2)){
                $where_article2          = "ARTICLE_GROUP = '$article_group2'";
            }else{
                $where_article2          = "";
            }
            if($langganan_2){
                if($tgl1_orderdate_2 & $tgl2_orderdate_2){
                    $where_langganan2            = "PELANGGAN LIKE '%$langganan_2%' AND CREATIONDATETIME_SALESORDER BETWEEN '$tgl1_orderdate_2' AND '$tgl2_orderdate_2'";
                }else{
                    $where_langganan2            = "PELANGGAN LIKE '%$langganan_2%'";
                }
            }else{
                $where_langganan2            = "";
            }
            if($warna_2){
                if($tgl1_orderdate_2 & $tgl2_orderdate_2){
                    $where_warna2            = "WARNA LIKE '%$warna_2%' AND CREATIONDATETIME_SALESORDER BETWEEN '$tgl1_orderdate_2' AND '$tgl2_orderdate_2'";
                }else{
                    $where_warna2            = "WARNA LIKE '%$warna_2%'";
                }
            }else{
                $where_warna2            = "";
            }
            if($tgl1_orderdate_2 && $tgl2_orderdate_2){
                if($no_order_2){
                    $where_datecreatesalesorder2 = "";
                }elseif($langganan_2){
                    $where_datecreatesalesorder2 = "";
                }elseif($warna_2){
                    $where_datecreatesalesorder2 = "";
                }else{
                    $where_datecreatesalesorder2 = "CREATIONDATETIME_SALESORDER BETWEEN '$tgl1_orderdate_2' AND '$tgl2_orderdate_2' AND (SUBSTR(NO_ORDER, 1,3) = 'RFD' OR SUBSTR(NO_ORDER, 1,3) = 'RFE' OR SUBSTR(NO_ORDER, 1,3) = 'RPE' OR SUBSTR(NO_ORDER, 1,3) = 'REP')";
                }
            }
            if($operation_2){
                $sqlDB2 = "SELECT DISTINCT * FROM itxview_memopentingppc_aftersales WHERE OPERATIONCODE = '$operation_2' AND ACCESS_TO = 'MEMO W OPR' AND IPADDRESS = '$_SERVER[REMOTE_ADDR]' ORDER BY DELIVERY ASC";
            }else{
                $sqlDB2 = "SELECT DISTINCT * FROM itxview_memopentingppc_aftersales WHERE $where_prodorder2 $where_proddemand2 $where_order2 $where_date2 $where_no_po2 $where_article2 $where_langganan2 $where_warna2 $where_datecreatesalesorder2 AND ACCESS_TO = 'MEMO AFTERSALES' AND IPADDRESS = '$_SERVER[REMOTE_ADDR]' ORDER BY CREATIONDATETIME_SALESORDER ASC";
            }
            $stmt   = mysqli_query($con_nowprd,$sqlDB2);
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
                                                                                p.GROUPSTEPNUMBER AS GROUPSTEPNUMBER,
                                                                                iptip.MULAI,
                                                                                DAYS(CURRENT DATE) - DAYS(iptip.MULAI) AS DELAY_PROGRESSSTATUS,
                                                                                p.PROGRESSSTATUS AS PROGRESSSTATUS
                                                                            FROM 
                                                                                PRODUCTIONDEMANDSTEP p
                                                                            LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                            WHERE
                                                                                p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND p.PROGRESSSTATUS = '2' ORDER BY p.GROUPSTEPNUMBER DESC LIMIT 1");
                            $d_delay_progress_selesai   = db2_fetch_assoc($q_delay_progress_selesai);
                            $jam_status_terakhir        = $d_delay_progress_selesai['MULAI'];
                            $delay_progress_status      = $d_delay_progress_selesai['DELAY_PROGRESSSTATUS'].' Hari';
                        }elseif($row_status_close['PROGRESSSTATUS'] == '3'){ // KALAU PROGRESS STATUSNYA PROGRESS
                            $q_delay_progress_mulai   = db2_exec($conn1, "SELECT 
                                                                                p.PRODUCTIONORDERCODE AS PRODUCTIONORDERCODE, 
                                                                                p.GROUPSTEPNUMBER AS GROUPSTEPNUMBER,
                                                                                iptop.SELESAI,
                                                                                DAYS(CURRENT DATE) - DAYS(iptop.SELESAI) AS DELAY_PROGRESSSTATUS,
                                                                                p.PROGRESSSTATUS AS PROGRESSSTATUS
                                                                            FROM 
                                                                                VIEWPRODUCTIONDEMANDSTEP p
                                                                            LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.GROUPSTEPNUMBER
                                                                            WHERE
                                                                                p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND p.PROGRESSSTATUS = '3' ORDER BY p.GROUPSTEPNUMBER DESC LIMIT 1");
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
                                $kode_dept          = $d_not_cnp_close['OPERATIONCODE'];
                                $status_terakhir    = $d_not_cnp_close['LONGDESCRIPTION'];
                                $status_operation   = $d_not_cnp_close['STATUS_OPERATION'];
                            }else{
                                $status = 'H';
                                $groupstep_option       = "= '$groupstepnumber'";
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
        <?php 
            if($operation_2){
                if($rowdb2['OPERATIONCODE'] == $kode_dept) {
                    $cek_operation  = "MUNCUL";
                }else{
                    $cek_operation  = "TIDAK MUNCUL";
                }
            }
        ?>
        <!-- KONEKSI KE LAPORAN PENGIRIMAN PPC -->
        <?php
            $q_suratjalan   = db2_exec($conn1, "SELECT
                                                        *
                                                    FROM
                                                        ITXVIEW_PENGIRIMAN 
                                                    WHERE 
                                                        NO_ORDER = '$rowdb2[NO_ORDER]'
                                                        AND LOTCODE = '$rowdb2[NO_KK]'");
            $row_suratjalan = db2_fetch_assoc($q_suratjalan);
        ?>
        <?php if (!empty($row_suratjalan['PROVISIONALCODE'])) : ?>
            <?php if($cek_operation == "MUNCUL" OR $cek_operation == NULL) : ?>
                <tr>
                    <td><?= $rowdb2['CREATIONDATETIME_SALESORDER']; ?></td> <!-- TGL BUKA BON ORDER -->
                    <td><?= $rowdb2['PELANGGAN']; ?></td> <!-- PELANGGAN -->
                    <td><?= $rowdb2['NO_ORDER']; ?></td> <!-- NO. ORDER -->
                    <td><?= $rowdb2['NO_PO']; ?></td> <!-- NO. PO -->
                    <td><?= $rowdb2['ARTICLE_GROUP']; ?></td> <!-- ARTICLE GROUP -->
                    <td><?= $rowdb2['ARTICLE_CODE']; ?></td> <!-- ARTICLE CODE -->
                    <td><?= $rowdb2['WARNA']; ?></td> <!-- WARNA -->
                    <td><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?= $rowdb2['DEMAND']; ?>&prod_order=<?= $rowdb2['NO_KK']; ?>">`<?= $rowdb2['DEMAND']; ?></a></td> <!-- DEMAND -->
                    <td>`<?= $rowdb2['NO_KK']; ?></td> <!-- NO KARTU KERJA -->
                    <td>
                        <?php
                            $q_qtypacking = db2_exec($conn1, "SELECT * FROM ITXVIEW_QTYPACKING WHERE DEMANDCODE = '$rowdb2[DEMAND]'");
                            $d_qtypacking = db2_fetch_assoc($q_qtypacking);
                            echo $d_qtypacking['QTY_PACKING'];
                        ?>
                    </td> <!-- QTY PACKING (KG) -->
                    <td><?= $d_qtypacking['QTY_PACKING_YARD']; ?></td><!-- QTY PACKING (YD) -->
                    <td><?= number_format($rowdb2['NETTO'], 0); ?></td> <!-- NETTO KG-->
                    <td>
                        <?php 
                            $sql_netto_yd = db2_exec($conn1, "SELECT * FROM ITXVIEW_NETTO WHERE CODE = '$rowdb2[DEMAND]'");
                            $d_netto_yd = db2_fetch_assoc($sql_netto_yd);
                            echo number_format($d_netto_yd['BASESECONDARYQUANTITY'],0);
                        ?>
                    </td> <!-- NETTO YD-->
                    <td><?= $row_suratjalan['GOODSISSUEDATE']; ?></td> <!-- TGL SURAT JALAN -->
                    <td><?= $row_suratjalan['PROVISIONALCODE']; ?></td> <!-- NO. SURAT JALAN -->
                    <td><?= number_format($d_roll['QTY_SJ_KG'], 2); ?></td> <!-- QTY KIRIM (KG) -->
                    <td>
                        <?php 
                            if($row_suratjalan['PRICEUNITOFMEASURECODE'] == 'm'){
                                echo round(number_format($d_roll['QTY_SJ_YARD'], 2) * 0.9144, 2);
                            }else{
                                echo number_format($d_roll['QTY_SJ_YARD'], 2);
                            }
                        ?>
                    </td> <!-- QTY KIRIM (YD) -->
                </tr>
            <?php endif; ?>
        <?php endif; ?>
        <?php } ?>
    </tbody>
</table>