<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Memo Penting.xls");
    header('Cache-Control: max-age=0');
?>
<style> .str{ mso-number-format:\@; } </style>
<table>
<thead>
    <tr>
        <th>TGL TERIMA ORDER</th>
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
        <th>NETTO</th>
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
    </tr>
</thead>
<tbody> 
    <?php 
        ini_set("error_reporting", 1);
        session_start();
        require_once "koneksi.php";
        $no_order = $_GET['no_order'];
        $tgl1     = $_GET['tgl1'];
        $tgl2     = $_GET['tgl2'];
        $query = "SELECT 
                    i.ORDERDATE AS ORDERDATE,
                    TRIM(ip.LANGGANAN) || '|' || TRIM(ip.BUYER) AS PELANGGAN,
                    i.PROJECTCODE AS NO_ORDER,
                    ik.EXTERNALREFERENCE AS NO_PO,
                    TRIM(i.SUBCODE01) || '-' || TRIM(i.SUBCODE02) || '-' || TRIM(i.SUBCODE03) || '-' || TRIM(i.SUBCODE04) || '-' ||
                    TRIM(i.SUBCODE05) || '-' || TRIM(i.SUBCODE06) || '-' || TRIM(i.SUBCODE07) || '-' || TRIM(i.SUBCODE08) AS KETERANGAN_PRODUCT,
                    i4.WARNA AS WARNA,
                    i.SUBCODE05 AS NO_WARNA,
                    s.DELIVERYDATE AS DELIVERY,
                    s4.TRANSACTIONDATE,
                    s2.ROLL AS ROLL,
                    i2.USEDUSERPRIMARYQUANTITY AS QTY_BAGIKAIN,
                    in2.USERPRIMARYQUANTITY AS NETTO,
                    CASE
                        WHEN Days(now()) - Days(Timestamp_Format(s.DELIVERYDATE, 'YYYY-MM-DD')) < 0 THEN 0
                        ELSE Days(now()) - Days(Timestamp_Format(s.DELIVERYDATE, 'YYYY-MM-DD'))
                    END	AS DELAY,
                    i.PRODUCTIONORDERCODE AS NO_KK,
                    i.DEAMAND AS DEMAND,
                    i.SUBCODE01,i.SUBCODE02,i.SUBCODE03,i.SUBCODE04,i.ORDERLINE,
                    TRIM(i.PROGRESSSTATUS) AS PROGRESSSTATUS,
                    u.LONGDESCRIPTION AS KETERANGAN
                FROM ITXVIEWKK i 
                LEFT JOIN ITXVIEW_KGBRUTO ik ON ik.PROJECTCODE = i.PROJECTCODE 
                                            AND ik.ORIGDLVSALORDERLINEORDERLINE = i.ORIGDLVSALORDERLINEORDERLINE  
                                            AND ik.CODE = i.DEAMAND 
                LEFT JOIN SALESORDERDELIVERY s ON s.SALESORDERLINESALESORDERCODE = i.PROJECTCODE AND s.SALESORDERLINEORDERLINE = i.ORDERLINE 
                LEFT JOIN (SELECT count(*) AS ROLL, s2.PRODUCTIONORDERCODE, s2.ITEMTYPECODE FROM STOCKTRANSACTION s2 GROUP BY s2.PRODUCTIONORDERCODE, s2.ITEMTYPECODE) s2 ON s2.PRODUCTIONORDERCODE = i.PRODUCTIONORDERCODE AND s2.ITEMTYPECODE ='KGF'
                LEFT JOIN (SELECT SUM(s3.USERPRIMARYQUANTITY) AS QTY_BAGIKAIN, s3.PRODUCTIONORDERCODE, s3.ITEMTYPECODE FROM STOCKTRANSACTION s3 GROUP BY s3.PRODUCTIONORDERCODE, s3.ITEMTYPECODE) s3 ON s3.PRODUCTIONORDERCODE = i.PRODUCTIONORDERCODE AND s3.ITEMTYPECODE ='KGF'
                LEFT JOIN PRODUCTIONRESERVATION i2 ON i2.ORDERCODE = i.PRODUCTIONDEMANDCODE AND i2.ITEMTYPEAFICODE = 'KGF'
                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = i.ABSUNIQUEID_DEMAND AND TRIM(a.NAMENAME) = 'DefectType'
                LEFT JOIN USERGENERICGROUP u ON u.CODE = a.VALUESTRING 
                LEFT JOIN ITXVIEWCOLOR i4 ON i4.ITEMTYPECODE = i.ITEMTYPEAFICODE 
                                        AND i4.SUBCODE01 = i.SUBCODE01 AND i4.SUBCODE02 = i.SUBCODE02 
                                        AND i4.SUBCODE03 = i.SUBCODE03 AND i4.SUBCODE04 = i.SUBCODE04 
                                        AND i4.SUBCODE05 = i.SUBCODE05 AND i4.SUBCODE06 = i.SUBCODE06 
                                        AND i4.SUBCODE07 = i.SUBCODE07 AND i4.SUBCODE08 = i.SUBCODE08 
                                        AND i4.SUBCODE09 = i.SUBCODE09 AND i4.SUBCODE10 = i.SUBCODE10
                LEFT JOIN 
                    (SELECT 
                        PRODUCTIONORDERCODE,
                        LISTAGG(TRANSACTIONDATE, ', ') AS TRANSACTIONDATE
                    FROM (
                        SELECT 
                            s4.PRODUCTIONORDERCODE,
                            s4.TRANSACTIONDATE
                        FROM 
                            STOCKTRANSACTION s4 
                        LEFT JOIN ITXVIEWKK i5 ON i5.PRODUCTIONORDERCODE = s4.PRODUCTIONORDERCODE 
                        WHERE 
                            s4.ITEMTYPECODE ='KGF'
                        GROUP BY 
                            s4.TRANSACTIONDATE,
                            s4.PRODUCTIONORDERCODE)
                    GROUP BY 
                            PRODUCTIONORDERCODE)s4 ON s4.PRODUCTIONORDERCODE = i.PRODUCTIONORDERCODE
                LEFT JOIN ITXVIEW_NETTO in2 ON in2.CODE = i.DEAMAND AND in2.SALESORDERLINESALESORDERCODE = i.PROJECTCODE
                LEFT JOIN ITXVIEW_PELANGGAN ip ON ip.ORDPRNCUSTOMERSUPPLIERCODE = i.ORDPRNCUSTOMERSUPPLIERCODE AND ip.CODE = i.BONORDER";
        $groupby = "GROUP BY 
                        i.ORDERDATE,
                        i.PROJECTCODE,
                        ik.EXTERNALREFERENCE,
                        i.SUBCODE01,i.SUBCODE02,i.SUBCODE03,i.SUBCODE04,
                        i.SUBCODE05,i.SUBCODE06,i.SUBCODE07,i.SUBCODE08,
                        i4.WARNA,
                        s.DELIVERYDATE,
                        s2.ROLL,
                        s3.QTY_BAGIKAIN,
                        s4.TRANSACTIONDATE,
                        i2.USEDUSERPRIMARYQUANTITY,
                        in2.USERPRIMARYQUANTITY,
                        i.PRODUCTIONORDERCODE,
                        i.DEAMAND,
                        i.ORDERLINE,
                        i.PROGRESSSTATUS,
                        u.LONGDESCRIPTION,
                        ip.LANGGANAN,
                        ip.BUYER";
        if ($no_order) {
            $sqlDB2="$query WHERE 
                                i.PROGRESSSTATUS <> '6' 
                                AND i2.USERPRIMARYQUANTITY IS NOT NULL
                                AND i.PROJECTCODE = '$no_order' $groupby";
        } else {
            $sqlDB2="$query WHERE 
                                i.PROGRESSSTATUS <> '6' 
                                AND i2.USERPRIMARYQUANTITY IS NOT NULL
                                AND s.DELIVERYDATE BETWEEN '$tgl1' AND '$tgl2' $groupby";
        }
        $stmt=db2_exec($conn1,$sqlDB2);
        $nourut_roll = 1;
        $nourut_roll2 = 1;
        $nourut_kk = 1;
        $nourut_kk2 = 1;
        while ($rowdb2 = db2_fetch_assoc($stmt)) {
    ?>
    <tr>
        <td><?= $rowdb2['ORDERDATE']; ?></td>
        <td><?= $rowdb2['PELANGGAN']; ?></td>
        <td><?= $rowdb2['NO_ORDER']; ?></td>
        <td><?= $rowdb2['NO_PO']; ?></td>
        <td><?= $rowdb2['KETERANGAN_PRODUCT']; ?></td>
        <td>
            <?php 
                $q_lebar = db2_exec($conn1, "SELECT * FROM ITXVIEWLEBAR WHERE SALESORDERCODE = '$rowdb2[NO_ORDER]' AND ORDERLINE = '$rowdb2[ORDERLINE]'");
                $d_lebar = db2_fetch_assoc($q_lebar);
            ?>
            <?= number_format($d_lebar['LEBAR'],0); ?>
        </td>
        <td>
            <?php 
                $q_gramasi = db2_exec($conn1, "SELECT * FROM ITXVIEWGRAMASI WHERE SALESORDERCODE = '$rowdb2[NO_ORDER]' AND ORDERLINE = '$rowdb2[ORDERLINE]'");
                $d_gramasi = db2_fetch_assoc($q_gramasi);
            ?>
            <?php 
                if($d_gramasi['GRAMASI_KFF']){
                    echo number_format($d_gramasi['GRAMASI_KFF'],0);
                }else{
                    echo number_format($d_gramasi['GRAMASI_FKF'],0);
                }
            ?>
        </td>
        <td><?= $rowdb2['WARNA']; ?></td>
        <td><?= $rowdb2['NO_WARNA']; ?></td>
        <td><?= $rowdb2['DELIVERY']; ?></td>
        <td>
            <?php
                $q_tglBagiKain = db2_exec($conn1, "SELECT TRANSACTIONDATE,PRODUCTIONORDERCODE FROM STOCKTRANSACTION WHERE PRODUCTIONORDERCODE= '$rowdb2[NO_KK]' AND ITEMTYPECODE ='KGF' GROUP BY TRANSACTIONDATE,PRODUCTIONORDERCODE");
            ?>
            <?php while ($rowdb_tglBagiKain = db2_fetch_assoc($q_tglBagiKain)) : ?>
                <?= $rowdb_tglBagiKain['TRANSACTIONDATE'].','; ?>
            <?php endwhile; ?>
        </td>
        <td><?= $rowdb2['ROLL']; ?></td>
        <td><?= number_format($rowdb2['QTY_BAGIKAIN'],2); ?></td>
        <td>
            <?php
                $q_qtypacking = db2_exec($conn1, "SELECT 
                                                        CASE
                                                            WHEN sum(b.BASEPRIMARYQUANTITYUNIT) IS NULL THEN 0
                                                            ELSE sum(b.BASEPRIMARYQUANTITYUNIT)
                                                        END +
                                                        CASE
                                                            WHEN sum(b2.BASEPRIMARYQUANTITYUNIT) IS NULL THEN 0
                                                            ELSE sum(b2.BASEPRIMARYQUANTITYUNIT)
                                                        END +
                                                        CASE
                                                            WHEN SUM(b3.BASEPRIMARYQUANTITYUNIT) IS NULL THEN 0
                                                            ELSE SUM(b3.BASEPRIMARYQUANTITYUNIT)
                                                        END +
                                                        CASE
                                                            WHEN SUM(s.BASEPRIMARYQUANTITY) IS NULL THEN 0
                                                            ELSE SUM(s.BASEPRIMARYQUANTITY)
                                                        END +
                                                        CASE
                                                            WHEN sum(s2.BASEPRIMARYQUANTITY) IS NULL THEN 0
                                                            ELSE sum(s2.BASEPRIMARYQUANTITY)
                                                        END AS QTY_PACKING
                                                    FROM ELEMENTSINSPECTION e 
                                                    LEFT JOIN BALANCE b ON b.ELEMENTSCODE = e.ELEMENTCODE AND b.LOGICALWAREHOUSECODE = 'M039'
                                                    LEFT JOIN BALANCE b2 ON b2.ELEMENTSCODE = e.ELEMENTCODE AND b2.LOGICALWAREHOUSECODE = 'M031'
                                                    LEFT JOIN BALANCE b3 ON b3.ELEMENTSCODE = e.ELEMENTCODE AND b3.LOGICALWAREHOUSECODE = 'M504'
                                                    LEFT JOIN STOCKTRANSACTION s ON s.ITEMELEMENTCODE = e.ELEMENTCODE AND s.LOGICALWAREHOUSECODE='M031' AND s.TEMPLATECODE ='S02'
                                                    LEFT JOIN STOCKTRANSACTION s2 ON s2.TEMPLATECODE = '098' AND s2.ITEMELEMENTCODE = e.ELEMENTCODE 
                                                    WHERE LENGTH(TRIM(e.ELEMENTCODE))= 13 AND e.DEMANDCODE = '$rowdb2[DEMAND]'");
                $d_qtypacking = db2_fetch_assoc($q_qtypacking);
                echo $d_qtypacking['QTY_PACKING'];
            ?>
        </td>
        <td><?= number_format($rowdb2['NETTO'],0); ?></td>
        <td><?= $rowdb2['DELAY']; ?></td>
            <?php 
                // mendeteksi statusnya close
                $q_deteksi_status_close = db2_exec($conn1, "SELECT 
                                                                p.PRODUCTIONORDERCODE AS PRODUCTIONORDERCODE, 
                                                                p.PRODUCTIONDEMANDCODE AS PRODUCTIONDEMANDCODE, 
                                                                p.GROUPSTEPNUMBER AS GROUPSTEPNUMBER
                                                            FROM 
                                                                PRODUCTIONDEMANDSTEP p
                                                            WHERE
                                                            -- p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND 
                                                                p.PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]'
                                                            AND p.PROGRESSSTATUS = '3' ORDER BY p.GROUPSTEPNUMBER DESC LIMIT 1");
                $row_status_close = db2_fetch_assoc($q_deteksi_status_close);
                if(!empty($row_status_close['GROUPSTEPNUMBER'])){
                $groupstepnumber    = $row_status_close['GROUPSTEPNUMBER'];
                }else{
                $groupstepnumber    = '10';
                }

                $q_cnp1             = db2_exec($conn1, "SELECT OPERATIONCODE, PROGRESSSTATUS FROM PRODUCTIONDEMANDSTEP 
                                                            WHERE 
                                                            -- PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND 
                                                            PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]' AND PROGRESSSTATUS = 3 AND OPERATIONCODE = 'CNP1'");
                $d_cnp_close        = db2_fetch_assoc($q_cnp1);

                if($d_cnp_close['PROGRESSSTATUS'] == 3){ // 3 is Closed
                    if($rowdb2['PROGRESSSTATUS'] == 6){
                        $kode_dept          = '-';
                        $status_terakhir    = '-';
                        $status_operation   = 'KK Oke';
                    }else{
                        $kode_dept          = '-';
                        $status_terakhir    = '-';
                        $status_operation   = 'KK Oke | Segera Closed Production Order!';
                    }
                }else{
                    $q_StatusTerakhir   = db2_exec($conn1, "SELECT 
                                                                p.PRODUCTIONORDERCODE, 
                                                                p.PRODUCTIONDEMANDCODE, 
                                                                p.GROUPSTEPNUMBER, 
                                                                p.OPERATIONCODE, 
                                                                p.LONGDESCRIPTION AS LONGDESCRIPTION, 
                                                                CASE
                                                                    WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
                                                                    WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
                                                                    WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
                                                                    WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
                                                                END AS STATUS_OPERATION,
                                                                wc.LONGDESCRIPTION AS DEPT, 
                                                                p.WORKCENTERCODE
                                                            FROM 
                                                                PRODUCTIONDEMANDSTEP p
                                                            LEFT JOIN WORKCENTER wc ON wc.CODE = p.WORKCENTERCODE
                                                            WHERE 
                                                                -- p.PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' AND 
                                                                p.PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]' 
                                                                AND (p.PROGRESSSTATUS = '0' OR p.PROGRESSSTATUS = '1' OR p.PROGRESSSTATUS ='2') 
                                                                AND p.GROUPSTEPNUMBER > '$groupstepnumber'
                                                            ORDER BY p.GROUPSTEPNUMBER ASC LIMIT 1");
                    $d_StatusTerakhir   = db2_fetch_assoc($q_StatusTerakhir);
                    $kode_dept          = $d_StatusTerakhir['DEPT'];
                    $status_terakhir    = $d_StatusTerakhir['LONGDESCRIPTION'];
                    $status_operation   = $d_StatusTerakhir['STATUS_OPERATION'];
                }
            ?>
        <td><?= $kode_dept; ?></td> <!--  KODE DEPT -->
        <td><?= $status_terakhir; ?></td> <!--  STATUS TERAKHIR -->
        <td><?= $status_operation; ?></td> <!--  STATUS_OPERATION -->
        <td></td> <!--  JAM -->
            <?php
                $q_demandstep   = db2_exec($conn1, "SELECT * FROM PRODUCTIONDEMANDSTEP WHERE PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]' ORDER BY STEPNUMBER ASC");
            ?>
        <td>
            <?php while ($d_demandstep = db2_fetch_assoc($q_demandstep)) { echo $d_demandstep['OPERATIONCODE'].'-'; } ?> 
        </td> <!--  ALUR PROSES -->
        <td><a href="http://10.0.0.10/laporan/ppc_filter_steps.php?demand=<?= $rowdb2['DEMAND']; ?>"><?= $rowdb2['DEMAND']; ?></a></td>
        <td><?= $rowdb2['NO_KK']; ?></td>
            <?php
                $q_CatatanPOGreige = db2_exec($conn1, "SELECT * FROM ITXVIEWPOGREIGENEW WHERE SALESORDERCODE = '$rowdb2[NO_ORDER]' AND ORDERLINE = '$rowdb2[ORDERLINE]'");
            ?>
        <td>
            <!-- <?php while ($rowdb_CatatanPOGreige = db2_fetch_assoc($q_CatatanPOGreige)) : ?>
                <?= 'Allocation:. '.$rowdb_CatatanPOGreige['LOTCODE'].'; Demand KGF : '.$rowdb_CatatanPOGreige['DEMAND_KG']; ?>
            <?php endwhile; ?> -->
        </td> <!--  catatan po greige -->
        <td></td> <!--  TARGET SELESAI -->
        <td><?= $rowdb2['KETERANGAN']; ?></td> <!--  KETERANGAN -->
    </tr>
    <?php } ?>
</tbody>