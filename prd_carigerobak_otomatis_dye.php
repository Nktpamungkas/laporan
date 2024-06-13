<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=LaporanPencarianGerobakDYEING-".date_default_timezone_set('Asia/Jakarta').date('Y-m-d H:i:s').".xls");
    header('Cache-Control: max-age=0');
?>
<?php
    ini_set("error_reporting", 0);
    session_start();
    require_once "koneksi.php";
?>
<table width="100%">
<thead>
    <tr>
        <?php
            $dept   = $_GET['dept'];

            if($dept == 'DYE'){
                $colspan    = '9';
                $th         = '<th style="text-align: center;" rowspan="2">KETERANGAN</th>
                                <th style="text-align: center;" rowspan="2">NO URUT</th>';
            }else{
                $colspan    = '9';
                $th         = '';
            }
        ?>
        <th style="text-align: center; background: #B97E6F; color: #FCFCFC;" colspan="<?= $colspan; ?>">POSISI GEROBAK SEKARANG</th>
        <th style="text-align: center; background: #83D46E; color: Black;" colspan="15">POSISI GEROBAK SEBELUMNYA</th>
    </tr>
    <tr>
        <th style="text-align: center;" rowspan="2">STEP NB</th>
        <th style="text-align: center;" rowspan="2">NO HANGER</th>
        <th style="text-align: center;" rowspan="2">NO WARNA</th>
        <th style="text-align: center;" rowspan="2">WARNA</th>
        <th style="text-align: center;" rowspan="2">PROD. ORDER</th>
        <th style="text-align: center;" rowspan="2">PROD. DEMAND</th>
        <th style="text-align: center;" rowspan="2">OPERATION</th>
        <th style="text-align: center;" rowspan="2">DEPARTEMEN</th>
        <th style="text-align: center;" rowspan="2">STATUS</th>
        <?= $th; ?>
    </tr>
    <tr>
        <th style="text-align: center;">PROD. ORDER ORIGINAL</th>
        <th style="text-align: center;">PROD. DEMAND ORIGINAL</th>
        <th style="text-align: center;">OPERATION</th>
        <th style="text-align: center;">DEPARTEMEN</th>
        <th style="text-align: center;">STATUS</th>
        <th style="text-align: center;">MULAI</th>
        <th style="text-align: center;">SELESAI</th>
        <th style="text-align: center;">OPERATOR IN</th>
        <th style="text-align: center;">OPERATOR OUT</th>
        <th style="text-align: center;">GEROBAK</th>
        <th style="text-align: center;">QTY</th>
        <th style="text-align: center;">JML GEROBAK</th>
    </tr>
</thead>
<tbody> 
    <?php
        if($_GET['demand']){
            $where_demand    = "AND p.PRODUCTIONDEMANDCODE = '$_GET[demand]'";
        }else{
            $where_demand    = "";
        }
        if($_GET['dept'] == 'ALL'){
            $where_all  = "AND NOT TRIM(OPERATIONGROUPCODE) IS NULL";
        }else{
            $where_all  = "AND TRIM(OPERATIONGROUPCODE) = '$_GET[dept]'";
        }
        if($_GET['dept'] == 'DYE'){
            $where_entered_dye = "AND STATUS_OPERATION IN ('Entered', 'Progress')";
        }else{
            $where_entered_dye = "";
        }
        if($_GET['dept'] == 'DYE'){
            $where_operation_dye = "WHERE NOT (OPERATIONCODE IN ('DYE1', 'DYE2', 'DYE4', 'SOA1', 'RDC1', 'LVL1', 'NEU1', 'CBL1', 'RLX1', 'FEW1', 'FIX1', 'HEW1', 'HOT1', 'SCO1', 'SCO2', 'SOF1', 'STR1') AND STATUS_OPERATION = 'Progress')";
        }else{
            $where_operation_dye = "";
        }
        $q_iptip    = db2_exec($conn1, "SELECT * FROM 
                                        (SELECT DISTINCT
                                            PRODUCTIONORDERCODE,
                                            REPLACE(LISTAGG( '`'|| PRODUCTIONDEMANDCODE || '`', ', '), '`', '''')  AS PRODUCTIONDEMANDCODE2,
                                            LISTAGG(PRODUCTIONDEMANDCODE, ', ')  AS PRODUCTIONDEMANDCODE,
                                            STEPNUMBER,
                                            OPERATIONCODE,
                                            STATUS_OPERATION,
                                            HANGER,
                                            NO_WARNA,
                                            WARNA,
                                            SUBCODE06,
                                            OPERATIONGROUPCODE,
                                            ABSUNIQUEID_OPERATION,
                                            CREATIONDATETIME
                                        FROM
                                            (SELECT	
                                                TRIM(p.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE,
                                                TRIM(p.PRODUCTIONDEMANDCODE) AS PRODUCTIONDEMANDCODE,
                                                p.STEPNUMBER,
                                                TRIM(p.OPERATIONCODE) AS OPERATIONCODE,
                                                CASE
                                                    WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
                                                    WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
                                                    WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
                                                    WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
                                                END AS STATUS_OPERATION,
                                                TRIM(o.OPERATIONGROUPCODE) AS OPERATIONGROUPCODE,
                                                TRIM(p2.SUBCODE02) || '-' || TRIM(p2.SUBCODE03) AS HANGER,
                                                TRIM(p2.SUBCODE06) AS SUBCODE06,
                                                i.SUBCODE05 AS NO_WARNA,
                                                i.WARNA,
                                                ROW_NUMBER() OVER (PARTITION BY p.PRODUCTIONORDERCODE, p.PRODUCTIONDEMANDCODE ORDER BY p.STEPNUMBER) AS RN,
                                                o.ABSUNIQUEID AS ABSUNIQUEID_OPERATION,
                                                p2.CREATIONDATETIME
                                            FROM
                                                PRODUCTIONDEMANDSTEP p
                                            LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                            LEFT JOIN PRODUCTIONDEMAND p2 ON p2.CODE = p.PRODUCTIONDEMANDCODE
                                            LEFT JOIN ITXVIEWCOLOR i ON i.ITEMTYPECODE = p2.ITEMTYPEAFICODE
                                                                    AND i.SUBCODE01 = p2.SUBCODE01
                                                                    AND i.SUBCODE02 = p2.SUBCODE02
                                                                    AND i.SUBCODE03 = p2.SUBCODE03
                                                                    AND i.SUBCODE04 = p2.SUBCODE04
                                                                    AND i.SUBCODE05 = p2.SUBCODE05
                                                                    AND i.SUBCODE06 = p2.SUBCODE06
                                                                    AND i.SUBCODE07 = p2.SUBCODE07
                                                                    AND i.SUBCODE08 = p2.SUBCODE08
                                                                    AND i.SUBCODE09 = p2.SUBCODE09
                                                                    AND i.SUBCODE10 = p2.SUBCODE10
                                            WHERE 
                                                TRIM(p.PROGRESSSTATUS) IN ('0', '2')
                                                $where_demand
                                                AND p2.CREATIONDATETIME >= '2023-11-01'
                                                AND NOT p.PRODUCTIONORDERCODE IS NULL
                                                AND (TRIM(p2.DESTINATIONORDER) = '1' OR NOT p2.PROJECTCODE IS NULL)
                                                )
                                        LEFT JOIN ADSTORAGE a ON a.UNIQUEID = ABSUNIQUEID_OPERATION AND a.FIELDNAME = 'Gerobak'
                                        WHERE
                                            RN = 1
                                            AND NOT OPERATIONCODE = 'BAT1'
                                            $where_all
                                            $where_entered_dye
                                            AND (a.VALUEBOOLEAN IS NULL OR a.VALUEBOOLEAN = 0)
                                        GROUP BY 
                                            PRODUCTIONORDERCODE,
                                            STEPNUMBER,
                                            OPERATIONCODE,
                                            STATUS_OPERATION,
                                            HANGER,
                                            NO_WARNA,
                                            WARNA,
                                            SUBCODE06,
                                            OPERATIONGROUPCODE,
                                            ABSUNIQUEID_OPERATION,
                                            CREATIONDATETIME
                                        ORDER BY 
                                            OPERATIONGROUPCODE ASC)
                                        $where_operation_dye");
        $totalGerobak_QC = 0;
        $totalGerobak_BRS = 0;
        $totalGerobak_DYE = 0;
        $totalGerobak_FIN = 0;
        $totalGerobak_GKG = 0;
        $totalGerobak_KNT = 0;
        $totalGerobak_LAB = 0;
        $totalGerobak_PPC = 0;
        $totalGerobak_PRT = 0;
        $totalGerobak_RMP = 0;
        $totalGerobak_TAS = 0;
    ?>
    <?php while($row_iptip = db2_fetch_assoc($q_iptip)) : ?>
        <?php
            if($dept == 'DYE'){
                $gerobak    = "CASE
                                    WHEN TRIM(p.OPERATIONCODE) = 'DYE2' THEN 'Poly'
                                    WHEN TRIM(p.OPERATIONCODE) = 'DYE4' THEN 'Cotton'
                                    ELSE LISTAGG(DISTINCT FLOOR(idqd.VALUEQUANTITY), ', ')
                                END AS GEROBAK";
            }else{
                $gerobak    = "LISTAGG(DISTINCT FLOOR(idqd.VALUEQUANTITY), ', ') AS GEROBAK";
            }

            $q_posisikk     = db2_exec($conn1, "SELECT DISTINCT
                                                    p.STEPNUMBER AS STEPNUMBER,
                                                    CASE
                                                        WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) IS NULL OR TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE)
                                                        ELSE TRIM(p.PRODRESERVATIONLINKGROUPCODE)
                                                    END AS OPERATIONCODE,
                                                    TRIM(o.OPERATIONGROUPCODE) AS DEPT,
                                                    o.LONGDESCRIPTION,
                                                    CASE
                                                        WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
                                                        WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
                                                        WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
                                                        WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
                                                    END AS STATUS_OPERATION,
                                                    iptip.MULAI,
                                                    CASE
                                                        WHEN p.PROGRESSSTATUS = 3 THEN COALESCE(iptop.SELESAI, SUBSTRING(p.LASTUPDATEDATETIME, 1, 19) || '(Run Manual Closures)')
                                                        ELSE iptop.SELESAI
                                                    END AS SELESAI,
                                                    p.PRODUCTIONORDERCODE,
                                                    p.PRODUCTIONDEMANDCODE,
                                                    iptip.LONGDESCRIPTION AS OP1,
                                                    iptop.LONGDESCRIPTION AS OP2,
                                                    $gerobak
                                                FROM 
                                                    PRODUCTIONDEMANDSTEP p 
                                                LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = o.ABSUNIQUEID AND a.FIELDNAME = 'Gerobak'
                                                LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                LEFT JOIN ITXVIEW_DETAIL_QA_DATA idqd ON idqd.PRODUCTIONDEMANDCODE = p.PRODUCTIONDEMANDCODE AND idqd.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE
                                                                                    AND idqd.OPERATIONCODE = CASE
                                                                                                                WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) IS NULL OR TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE)
                                                                                                                ELSE TRIM(p.PRODRESERVATIONLINKGROUPCODE)
                                                                                                            END
                                                                                    AND (idqd.VALUEINT = p.STEPNUMBER OR idqd.VALUEINT = p.GROUPSTEPNUMBER) 
                                                                                    AND (idqd.CHARACTERISTICCODE = 'GRB1' OR
                                                                                        idqd.CHARACTERISTICCODE = 'GRB2' OR
                                                                                        idqd.CHARACTERISTICCODE = 'GRB3' OR
                                                                                        idqd.CHARACTERISTICCODE = 'GRB4' OR
                                                                                        idqd.CHARACTERISTICCODE = 'GRB5' OR
                                                                                        idqd.CHARACTERISTICCODE = 'GRB6' OR
                                                                                        idqd.CHARACTERISTICCODE = 'GRB7' OR
                                                                                        idqd.CHARACTERISTICCODE = 'GRB8')
                                                                                    AND NOT (idqd.VALUEQUANTITY = 999 OR idqd.VALUEQUANTITY = 1 OR idqd.VALUEQUANTITY = 9999 OR idqd.VALUEQUANTITY = 99999 OR idqd.VALUEQUANTITY = 91)
                                                WHERE
                                                    p.PRODUCTIONORDERCODE  = '$row_iptip[PRODUCTIONORDERCODE]' 
                                                    AND p.PRODUCTIONDEMANDCODE IN ($row_iptip[PRODUCTIONDEMANDCODE2])
                                                    AND p.STEPNUMBER < '$row_iptip[STEPNUMBER]'
                                                    AND NOT idqd.VALUEQUANTITY IS NULL
                                                    AND (a.VALUEBOOLEAN IS NULL OR a.VALUEBOOLEAN = 0)
                                                GROUP BY
                                                    p.PRODUCTIONORDERCODE,
                                                    p.STEPNUMBER,
                                                    p.OPERATIONCODE,
                                                    p.PRODRESERVATIONLINKGROUPCODE,
                                                    o.OPERATIONGROUPCODE,
                                                    o.LONGDESCRIPTION,
                                                    p.PROGRESSSTATUS,
                                                    iptip.MULAI,
                                                    iptop.SELESAI,
                                                    p.LASTUPDATEDATETIME,
                                                    p.PRODUCTIONORDERCODE,
                                                    p.PRODUCTIONDEMANDCODE,
                                                    iptip.LONGDESCRIPTION,
                                                    iptop.LONGDESCRIPTION
                                                ORDER BY 
                                                    p.STEPNUMBER
                                                DESC
                                                LIMIT 1");
                                                
            $row_posisikk = db2_fetch_assoc($q_posisikk);

            $count_gerobak  = db2_exec($conn1, "SELECT 
                                                    TRIM(o.OPERATIONGROUPCODE) AS DEPT,
                                                    COUNT(DISTINCT idqd.VALUEQUANTITY) AS JML_GEROBAK
                                                FROM 
                                                    PRODUCTIONDEMANDSTEP p 
                                                LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = o.ABSUNIQUEID AND a.FIELDNAME = 'Gerobak'
                                                LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                LEFT JOIN ITXVIEW_DETAIL_QA_DATA idqd ON idqd.PRODUCTIONDEMANDCODE = p.PRODUCTIONDEMANDCODE AND idqd.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE
                                                                                    AND idqd.OPERATIONCODE = CASE
                                                                                                                WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) IS NULL OR TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE)
                                                                                                                ELSE TRIM(p.PRODRESERVATIONLINKGROUPCODE)
                                                                                                            END
                                                                                    AND (idqd.VALUEINT = p.STEPNUMBER OR idqd.VALUEINT = p.GROUPSTEPNUMBER) 
                                                                                    AND (idqd.CHARACTERISTICCODE = 'GRB1' OR
                                                                                        idqd.CHARACTERISTICCODE = 'GRB2' OR
                                                                                        idqd.CHARACTERISTICCODE = 'GRB3' OR
                                                                                        idqd.CHARACTERISTICCODE = 'GRB4' OR
                                                                                        idqd.CHARACTERISTICCODE = 'GRB5' OR
                                                                                        idqd.CHARACTERISTICCODE = 'GRB6' OR
                                                                                        idqd.CHARACTERISTICCODE = 'GRB7' OR
                                                                                        idqd.CHARACTERISTICCODE = 'GRB8')
                                                                                    AND NOT (idqd.VALUEQUANTITY = 999 OR idqd.VALUEQUANTITY = 1 OR idqd.VALUEQUANTITY = 9999 OR idqd.VALUEQUANTITY = 99999 OR idqd.VALUEQUANTITY = 91)
                                                WHERE
                                                    p.PRODUCTIONORDERCODE  = '$row_iptip[PRODUCTIONORDERCODE]' 
                                                    AND p.PRODUCTIONDEMANDCODE IN ($row_iptip[PRODUCTIONDEMANDCODE2])
                                                    AND p.STEPNUMBER < '$row_iptip[STEPNUMBER]'
                                                    AND NOT idqd.VALUEQUANTITY IS NULL
                                                    AND (a.VALUEBOOLEAN IS NULL OR a.VALUEBOOLEAN = 0)
                                                GROUP BY
                                                    p.PRODUCTIONORDERCODE,
                                                    p.STEPNUMBER,
                                                    p.OPERATIONCODE,
                                                    p.PRODRESERVATIONLINKGROUPCODE,
                                                    o.OPERATIONGROUPCODE,
                                                    o.LONGDESCRIPTION,
                                                    p.PROGRESSSTATUS,
                                                    iptip.MULAI,
                                                    iptop.SELESAI,
                                                    p.LASTUPDATEDATETIME,
                                                    p.PRODUCTIONORDERCODE,
                                                    p.PRODUCTIONDEMANDCODE,
                                                    iptip.LONGDESCRIPTION,
                                                    iptop.LONGDESCRIPTION
                                                ORDER BY 
                                                    p.STEPNUMBER
                                                DESC
                                                LIMIT 1");
            $row_count_gerobak = db2_fetch_assoc($count_gerobak);
            if($row_iptip['OPERATIONGROUPCODE'] == 'BRS'){
                $totalGerobak_BRS += $row_count_gerobak['JML_GEROBAK'];
            }
            if($row_iptip['OPERATIONGROUPCODE'] == 'DYE'){
                $totalGerobak_DYE += $row_count_gerobak['JML_GEROBAK'];
            }
            if($row_iptip['OPERATIONGROUPCODE'] == 'FIN'){
                $totalGerobak_FIN += $row_count_gerobak['JML_GEROBAK'];
            }
            if($row_iptip['OPERATIONGROUPCODE'] == 'GKG'){
                $totalGerobak_GKG += $row_count_gerobak['JML_GEROBAK'];
            }
            if($row_iptip['OPERATIONGROUPCODE'] == 'KNT'){
                $totalGerobak_KNT += $row_count_gerobak['JML_GEROBAK'];
            }
            if($row_iptip['OPERATIONGROUPCODE'] == 'LAB'){
                $totalGerobak_LAB += $row_count_gerobak['JML_GEROBAK'];
            }
            if($row_iptip['OPERATIONGROUPCODE'] == 'PPC'){
                $totalGerobak_PPC += $row_count_gerobak['JML_GEROBAK'];
            }
            if($row_iptip['OPERATIONGROUPCODE'] == 'PRT'){
                $totalGerobak_PRT += $row_count_gerobak['JML_GEROBAK'];
            }
            if($row_iptip['OPERATIONGROUPCODE'] == 'RMP'){
                $totalGerobak_RMP += $row_count_gerobak['JML_GEROBAK'];
            }
            if($row_iptip['OPERATIONGROUPCODE'] == 'TAS'){
                $totalGerobak_TAS += $row_count_gerobak['JML_GEROBAK'];
            }
            if($row_iptip['OPERATIONGROUPCODE'] == 'QC'){
                $totalGerobak_QC += $row_count_gerobak['JML_GEROBAK'];
            }
        ?>
        <?php if(!empty($row_posisikk['GEROBAK'])) :?>
            <tr>
                <td><?= $row_iptip['STEPNUMBER'] ?></td>
                <td><?= $row_iptip['HANGER'] ?> - <?= $row_iptip['SUBCODE06'] ?></td>
                <td><?= $row_iptip['NO_WARNA']; ?></td>
                <td><?= $row_iptip['WARNA']; ?></td>
                <td><?= $row_iptip['PRODUCTIONORDERCODE'] ?></td>
                <td><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?= $row_iptip['PRODUCTIONDEMANDCODE']; ?>&prod_order=<?= $row_iptip['PRODUCTIONORDERCODE']; ?>"><?= $row_iptip['PRODUCTIONDEMANDCODE'] ?></a></td>
                <td align="center"><?= $row_iptip['OPERATIONCODE'] ?></td>
                <td align="center"><?= $row_iptip['OPERATIONGROUPCODE'] ?></td>
                <td
                    <?php 
                        if($row_iptip['STATUS_OPERATION'] == 'Closed'){ 
                            echo 'style="background-color:#DC526E; color:#F7F7F7;"'; 
                            
                        }elseif($row_iptip['STATUS_OPERATION'] == 'Progress'){ 
                            echo 'style="background-color:#41CC11;"'; 
                        }else{ 
                            echo 'style="background-color:#CECECE;"'; 
                        } 
                    ?>>
                    <center><?= $row_iptip['STATUS_OPERATION']; ?></center>
                </td>
                <?php if($dept == 'DYE') : ?>
                    <?php
                        $q_schedule_dye     = mysqli_query($con_db_dyeing, "SELECT DISTINCT
                                                                                nokk,
                                                                                id,
                                                                                GROUP_CONCAT( lot SEPARATOR '/' ) AS lot,
                                                                                if(COUNT(lot)>1,'Gabung Kartu','') as ket_kartu,
                                                                                no_mesin,
                                                                                nodemand,
                                                                                no_urut,
                                                                                buyer,
                                                                                langganan,
                                                                                GROUP_CONCAT(DISTINCT no_order SEPARATOR '-' ) AS no_order,
                                                                                no_resep,
                                                                                nokk,
                                                                                jenis_kain,
                                                                                warna,
                                                                                no_warna,
                                                                                sum(rol) as rol,
                                                                                sum(bruto) as bruto,
                                                                                proses,
                                                                                ket_status,
                                                                                tgl_delivery,
                                                                                ket_kain,
                                                                                mc_from,
                                                                                GROUP_CONCAT(DISTINCT personil SEPARATOR ',' ) AS personil
                                                                            FROM
                                                                                tbl_schedule 
                                                                            WHERE
                                                                                (`status` = 'sedang jalan' or `status` ='antri mesin') and nokk = '$row_iptip[PRODUCTIONORDERCODE]'
                                                                            GROUP BY
                                                                                no_mesin,
                                                                                no_urut 
                                                                            ORDER BY
                                                                                id ASC");
                        $row_schedule_dye   = mysqli_fetch_assoc($q_schedule_dye);
                        $ket    = $row_schedule_dye['ket_status'].'- '.$row_schedule_dye['ket_kain'].' '.$row_schedule_dye['proses'].' MC '.$row_schedule_dye['mc_from'];
                    ?>
                    <td align="center"><?= $ket; ?></td>
                    <td align="center"><?= $row_schedule_dye['no_urut']; ?></td>
                <?php endif; ?>

                <td align="center"></td>
                <td align="center"></td>
                <td align="center"><?= $row_posisikk['OPERATIONCODE'] ?></td>
                <td align="center"><?= $row_posisikk['DEPT'] ?></td>
                <td
                    <?php 
                        if($row_posisikk['STATUS_OPERATION'] == 'Closed'){ 
                            echo 'style="background-color:#DC526E; color:#F7F7F7;"'; 
                            
                        }elseif($row_posisikk['STATUS_OPERATION'] == 'Progress'){ 
                            echo 'style="background-color:#41CC11;"'; 
                        }else{ 
                            echo 'style="background-color:#CECECE;"'; 
                        } 
                    ?>>
                    <center><?= $row_posisikk['STATUS_OPERATION']; ?></center>
                </td>
                <td><?= $row_posisikk['MULAI'] ?></td>
                <td><?= $row_posisikk['SELESAI'] ?></td>
                <td><?= $row_posisikk['OP1'] ?></td>
                <td><?= $row_posisikk['OP2'] ?></td>
                <td><?= $row_posisikk['GEROBAK'] ?></td>
                <td>
                    <?php
                        $sql_qtyorder   = db2_exec($conn1, "SELECT DISTINCT
                                                                    GROUPSTEPNUMBER,
                                                                    INITIALUSERPRIMARYQUANTITY AS QTY_ORDER,
                                                                    INITIALUSERSECONDARYQUANTITY AS QTY_ORDER_YARD
                                                                FROM 
                                                                    VIEWPRODUCTIONDEMANDSTEP 
                                                                WHERE 
                                                                    PRODUCTIONORDERCODE = '$row_iptip[PRODUCTIONORDERCODE]'
                                                                    -- AND GROUPSTEPNUMBER = '$row_iptip[STEPNUMBER]'
                                                                ORDER BY
                                                                    GROUPSTEPNUMBER ASC LIMIT 1");
                        $dt_qtyorder    = db2_fetch_assoc($sql_qtyorder);
                    ?>
                    <?= $dt_qtyorder['QTY_ORDER']; ?>
                </td>
                <td><?= $row_count_gerobak['JML_GEROBAK'] ?></td>
            </tr>
        <?php else : ?>
            <?php 
                // FIELDNYA = tempat, kain_gerobak
                $q_ncp      = mysqli_query($con_db_qc, "SELECT * FROM `tbl_ncp_qcf_now` WHERE nokk = '$row_iptip[PRODUCTIONORDERCODE]' AND nodemand = '$row_iptip[PRODUCTIONDEMANDCODE]'");
                $row_ncp    = mysqli_fetch_assoc($q_ncp);
            ?>
            <?php if($row_ncp) : ?>
                <tr>
                    <td><?= $row_iptip['STEPNUMBER'] ?></td>
                    <td><?= $row_iptip['HANGER'] ?> - <?= $row_iptip['SUBCODE06'] ?></td>
                    <td><?= $row_iptip['NO_WARNA']; ?></td>
                    <td><?= $row_iptip['WARNA']; ?></td>
                    <td><?= $row_iptip['PRODUCTIONORDERCODE'] ?></td>
                    <td><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?= $row_iptip['PRODUCTIONDEMANDCODE']; ?>&prod_order=<?= $row_iptip['PRODUCTIONORDERCODE']; ?>"><?= $row_iptip['PRODUCTIONDEMANDCODE'] ?></a></td>
                    <td align="center"><?= $row_iptip['OPERATIONCODE'] ?></td>
                    <td align="center"><?= $row_iptip['OPERATIONGROUPCODE'] ?></td>
                    <td
                        <?php 
                            if($row_iptip['STATUS_OPERATION'] == 'Closed'){ 
                                echo 'style="background-color:#DC526E; color:#F7F7F7;"'; 
                                
                            }elseif($row_iptip['STATUS_OPERATION'] == 'Progress'){ 
                                echo 'style="background-color:#41CC11;"'; 
                            }else{ 
                                echo 'style="background-color:#CECECE;"'; 
                            } 
                        ?>>
                        <center><?= $row_iptip['STATUS_OPERATION']; ?></center>
                    </td>
                    <?php if($dept == 'DYE') : ?>
                        <?php
                            $q_schedule_dye     = mysqli_query($con_db_dyeing, "SELECT DISTINCT
                                                                                    nokk,
                                                                                    id,
                                                                                    GROUP_CONCAT( lot SEPARATOR '/' ) AS lot,
                                                                                    if(COUNT(lot)>1,'Gabung Kartu','') as ket_kartu,
                                                                                    no_mesin,
                                                                                    nodemand,
                                                                                    no_urut,
                                                                                    buyer,
                                                                                    langganan,
                                                                                    GROUP_CONCAT(DISTINCT no_order SEPARATOR '-' ) AS no_order,
                                                                                    no_resep,
                                                                                    nokk,
                                                                                    jenis_kain,
                                                                                    warna,
                                                                                    no_warna,
                                                                                    sum(rol) as rol,
                                                                                    sum(bruto) as bruto,
                                                                                    proses,
                                                                                    ket_status,
                                                                                    tgl_delivery,
                                                                                    ket_kain,
                                                                                    mc_from,
                                                                                    GROUP_CONCAT(DISTINCT personil SEPARATOR ',' ) AS personil
                                                                                FROM
                                                                                    tbl_schedule 
                                                                                WHERE
                                                                                    (`status` = 'sedang jalan' or `status` ='antri mesin') and nokk = '$row_iptip[PRODUCTIONORDERCODE]'
                                                                                GROUP BY
                                                                                    no_mesin,
                                                                                    no_urut 
                                                                                ORDER BY
                                                                                    id ASC");
                            $row_schedule_dye   = mysqli_fetch_assoc($q_schedule_dye);
                            $ket    = $row_schedule_dye['ket_status'].'- '.$row_schedule_dye['ket_kain'].' '.$row_schedule_dye['proses'].' MC '.$row_schedule_dye['mc_from'];
                        ?>
                        <td align="center"><?= $ket; ?></td>
                        <td align="center"><?= $row_schedule_dye['no_urut']; ?></td>
                    <?php endif; ?>
                    
                    <td align="center"><?= $row_ncp['nokk'] ?></td>
                    <td align="center"><?= $row_ncp['nodemand'] ?></td>
                    <td align="center"><?= $row_posisikk['OPERATIONCODE'] ?></td>
                    <td align="center"><?= $row_ncp['dept'] ?></td>
                    <td><center><?= $row_ncp['status']; ?></center></td>
                    <td><?= $row_ncp['tgl_buat'] ?></td>
                    <td>-</td>
                    <td><?= $row_ncp['peninjau_awal'] ?></td>
                    <td><?= $row_ncp['peninjau_akhir'] ?></td>
                    <td><?= $row_ncp['tempat'] ?></td>
                    <td><?= $row_ncp['berat'] ?></td>
                    <td></td>
                </tr>
            <?php else : ?>
                <!-- QTY SALINAN
                <?php
                    $q_carisalinan1  = db2_exec($conn1, "SELECT
                                                            PRODUCTIONORDERCODE,
                                                            PRODUCTIONDEMANDCODE,
                                                            SUBSTR(ORIGINALPDCODE, 5) AS ORIGINALPDCODE 
                                                        FROM 
                                                            ITXVIEWKK i 
                                                        WHERE 
                                                            PRODUCTIONDEMANDCODE = '$row_iptip[PRODUCTIONDEMANDCODE]'");
                    $row_carisalinan1    = db2_fetch_assoc($q_carisalinan1);
                    
                    $q_carisalinan  = db2_exec($conn1, "SELECT
                                                            PRODUCTIONORDERCODE,
                                                            PRODUCTIONDEMANDCODE,
                                                            SUBSTR(ORIGINALPDCODE, 5) AS ORIGINALPDCODE 
                                                        FROM 
                                                            ITXVIEWKK i 
                                                        WHERE 
                                                            PRODUCTIONDEMANDCODE = '$row_carisalinan1[ORIGINALPDCODE]'");
                    $row_carisalinan    = db2_fetch_assoc($q_carisalinan);
                ?>
                <?php if($row_carisalinan) : ?>
                    <?php
                        if($dept == 'DYE'){
                            $gerobak    = "CASE
                                                WHEN TRIM(p.OPERATIONCODE) = 'DYE2' THEN 'Poly'
                                                WHEN TRIM(p.OPERATIONCODE) = 'DYE4' THEN 'Cotton'
                                                ELSE LISTAGG(DISTINCT FLOOR(idqd.VALUEQUANTITY), ', ')
                                            END AS GEROBAK";
                        }else{
                            $gerobak    = "LISTAGG(DISTINCT FLOOR(idqd.VALUEQUANTITY), ', ') AS GEROBAK";
                        }

                        $qsalinan = "SELECT DISTINCT
                                            p.STEPNUMBER AS STEPNUMBER,
                                            CASE
                                                WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) IS NULL OR TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE)
                                                ELSE TRIM(p.PRODRESERVATIONLINKGROUPCODE)
                                            END AS OPERATIONCODE,
                                            TRIM(o.OPERATIONGROUPCODE) AS DEPT,
                                            o.LONGDESCRIPTION,
                                            CASE
                                                WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
                                                WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
                                                WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
                                                WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
                                            END AS STATUS_OPERATION,
                                            iptip.MULAI,
                                            CASE
                                                WHEN p.PROGRESSSTATUS = 3 THEN COALESCE(iptop.SELESAI, SUBSTRING(p.LASTUPDATEDATETIME, 1, 19) || '(Run Manual Closures)')
                                                ELSE iptop.SELESAI
                                            END AS SELESAI,
                                            p.PRODUCTIONORDERCODE,
                                            p.PRODUCTIONDEMANDCODE,
                                            iptip.LONGDESCRIPTION AS OP1,
                                            iptop.LONGDESCRIPTION AS OP2,
                                            $gerobak
                                        FROM 
                                            PRODUCTIONDEMANDSTEP p 
                                        LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                        LEFT JOIN ITXVIEW_DETAIL_QA_DATA idqd ON idqd.PRODUCTIONDEMANDCODE = p.PRODUCTIONDEMANDCODE AND idqd.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE
                                                                            AND idqd.OPERATIONCODE = CASE
                                                                                                        WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) IS NULL OR TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE)
                                                                                                        ELSE TRIM(p.PRODRESERVATIONLINKGROUPCODE)
                                                                                                    END
                                                                            AND (idqd.VALUEINT = p.STEPNUMBER OR idqd.VALUEINT = p.GROUPSTEPNUMBER) 
                                                                            AND (idqd.CHARACTERISTICCODE = 'GRB1' OR
                                                                                idqd.CHARACTERISTICCODE = 'GRB2' OR
                                                                                idqd.CHARACTERISTICCODE = 'GRB3' OR
                                                                                idqd.CHARACTERISTICCODE = 'GRB4' OR
                                                                                idqd.CHARACTERISTICCODE = 'GRB5' OR
                                                                                idqd.CHARACTERISTICCODE = 'GRB6' OR
                                                                                idqd.CHARACTERISTICCODE = 'GRB7' OR
                                                                                idqd.CHARACTERISTICCODE = 'GRB8')
                                                                            AND NOT (idqd.VALUEQUANTITY = 999 OR idqd.VALUEQUANTITY = 1 OR idqd.VALUEQUANTITY = 9999 OR idqd.VALUEQUANTITY = 99999 OR idqd.VALUEQUANTITY = 91)
                                        WHERE
                                            p.PRODUCTIONORDERCODE  = '$row_carisalinan[PRODUCTIONORDERCODE]' 
                                            AND p.PRODUCTIONDEMANDCODE = '$row_carisalinan[PRODUCTIONDEMANDCODE]'
                                            AND NOT idqd.VALUEQUANTITY IS NULL
                                        GROUP BY
                                            p.PRODUCTIONORDERCODE,
                                            p.STEPNUMBER,
                                            p.OPERATIONCODE,
                                            p.PRODRESERVATIONLINKGROUPCODE,
                                            o.OPERATIONGROUPCODE,
                                            o.LONGDESCRIPTION,
                                            p.PROGRESSSTATUS,
                                            iptip.MULAI,
                                            iptop.SELESAI,
                                            p.LASTUPDATEDATETIME,
                                            p.PRODUCTIONORDERCODE,
                                            p.PRODUCTIONDEMANDCODE,
                                            iptip.LONGDESCRIPTION,
                                            iptop.LONGDESCRIPTION
                                        ORDER BY 
                                            p.STEPNUMBER
                                        DESC
                                        LIMIT 1";
                        $q_posisikksalinan     = db2_exec($conn1, $qsalinan);
                        $row_posisikk_salinan = db2_fetch_assoc($q_posisikksalinan);

                        $count_gerobaksalinan  = db2_exec($conn1, "SELECT 
                                                            COUNT(DISTINCT idqd.VALUEQUANTITY) AS JML_GEROBAK
                                                            FROM 
                                                                PRODUCTIONDEMANDSTEP p 
                                                            LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                            -- LEFT JOIN ADSTORAGE a ON a.UNIQUEID = o.ABSUNIQUEID AND a.FIELDNAME = 'Gerobak'
                                                            LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                            LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                            LEFT JOIN ITXVIEW_DETAIL_QA_DATA idqd ON idqd.PRODUCTIONDEMANDCODE = p.PRODUCTIONDEMANDCODE AND idqd.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE
                                                                                                AND idqd.OPERATIONCODE = CASE
                                                                                                                            WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) IS NULL OR TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE)
                                                                                                                            ELSE TRIM(p.PRODRESERVATIONLINKGROUPCODE)
                                                                                                                        END
                                                                                                AND (idqd.VALUEINT = p.STEPNUMBER OR idqd.VALUEINT = p.GROUPSTEPNUMBER) 
                                                                                                AND (idqd.CHARACTERISTICCODE = 'GRB1' OR
                                                                                                    idqd.CHARACTERISTICCODE = 'GRB2' OR
                                                                                                    idqd.CHARACTERISTICCODE = 'GRB3' OR
                                                                                                    idqd.CHARACTERISTICCODE = 'GRB4' OR
                                                                                                    idqd.CHARACTERISTICCODE = 'GRB5' OR
                                                                                                    idqd.CHARACTERISTICCODE = 'GRB6' OR
                                                                                                    idqd.CHARACTERISTICCODE = 'GRB7' OR
                                                                                                    idqd.CHARACTERISTICCODE = 'GRB8')
                                                                                                AND NOT (idqd.VALUEQUANTITY = 999 OR idqd.VALUEQUANTITY = 1 OR idqd.VALUEQUANTITY = 9999 OR idqd.VALUEQUANTITY = 99999 OR idqd.VALUEQUANTITY = 91)
                                                            WHERE
                                                                p.PRODUCTIONORDERCODE  = '$row_carisalinan[PRODUCTIONORDERCODE]' 
                                                                AND p.PRODUCTIONDEMANDCODE IN ($row_carisalinan[PRODUCTIONDEMANDCODE])
                                                                AND NOT idqd.VALUEQUANTITY IS NULL
                                                            GROUP BY
                                                                p.PRODUCTIONORDERCODE,
                                                                p.STEPNUMBER,
                                                                p.OPERATIONCODE,
                                                                p.PRODRESERVATIONLINKGROUPCODE,
                                                                o.OPERATIONGROUPCODE,
                                                                o.LONGDESCRIPTION,
                                                                p.PROGRESSSTATUS,
                                                                iptip.MULAI,
                                                                iptop.SELESAI,
                                                                p.LASTUPDATEDATETIME,
                                                                p.PRODUCTIONORDERCODE,
                                                                p.PRODUCTIONDEMANDCODE,
                                                                iptip.LONGDESCRIPTION,
                                                                iptop.LONGDESCRIPTION
                                                            ORDER BY 
                                                                p.STEPNUMBER
                                                            DESC
                                                            LIMIT 1");
                        $row_count_gerobaksalinan = db2_fetch_assoc($count_gerobaksalinan);
                    ?>
                    <tr>
                        <td><?= $row_iptip['STEPNUMBER'] ?></td>
                        <td><?= $row_iptip['HANGER'] ?> - <?= $row_iptip['SUBCODE06'] ?></td>
                        <td><?= $row_iptip['NO_WARNA']; ?></td>
                        <td><?= $row_iptip['WARNA']; ?></td>
                        <td><?= $row_iptip['PRODUCTIONORDERCODE'] ?></td>
                        <td><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?= $row_iptip['PRODUCTIONDEMANDCODE']; ?>&prod_order=<?= $row_iptip['PRODUCTIONORDERCODE']; ?>"><?= $row_iptip['PRODUCTIONDEMANDCODE'] ?></a></td>
                        <td align="center"><?= $row_iptip['OPERATIONCODE'] ?></td>
                        <td align="center"><?= $row_iptip['OPERATIONGROUPCODE'] ?></td>
                        <td
                            <?php 
                                if($row_iptip['STATUS_OPERATION'] == 'Closed'){ 
                                    echo 'style="background-color:#DC526E; color:#F7F7F7;"'; 
                                    
                                }elseif($row_iptip['STATUS_OPERATION'] == 'Progress'){ 
                                    echo 'style="background-color:#41CC11;"'; 
                                }else{ 
                                    echo 'style="background-color:#CECECE;"'; 
                                } 
                            ?>>
                            <center><?= $row_iptip['STATUS_OPERATION']; ?></center>
                        </td>
                        <?php if($dept == 'DYE') : ?>
                            <?php
                                $q_schedule_dye     = mysqli_query($con_db_dyeing, "SELECT DISTINCT
                                                                                        nokk,
                                                                                        id,
                                                                                        GROUP_CONCAT( lot SEPARATOR '/' ) AS lot,
                                                                                        if(COUNT(lot)>1,'Gabung Kartu','') as ket_kartu,
                                                                                        no_mesin,
                                                                                        nodemand,
                                                                                        no_urut,
                                                                                        buyer,
                                                                                        langganan,
                                                                                        GROUP_CONCAT(DISTINCT no_order SEPARATOR '-' ) AS no_order,
                                                                                        no_resep,
                                                                                        nokk,
                                                                                        jenis_kain,
                                                                                        warna,
                                                                                        no_warna,
                                                                                        sum(rol) as rol,
                                                                                        sum(bruto) as bruto,
                                                                                        proses,
                                                                                        ket_status,
                                                                                        tgl_delivery,
                                                                                        ket_kain,
                                                                                        mc_from,
                                                                                        GROUP_CONCAT(DISTINCT personil SEPARATOR ',' ) AS personil
                                                                                    FROM
                                                                                        tbl_schedule 
                                                                                    WHERE
                                                                                        (`status` = 'sedang jalan' or `status` ='antri mesin') and nokk = '$row_posisikk_salinan[PRODUCTIONORDERCODE]'
                                                                                    GROUP BY
                                                                                        no_mesin,
                                                                                        no_urut 
                                                                                    ORDER BY
                                                                                        id ASC");
                                $row_schedule_dye   = mysqli_fetch_assoc($q_schedule_dye);
                                $ket    = $row_schedule_dye['ket_status'].'- '.$row_schedule_dye['ket_kain'].' '.$row_schedule_dye['proses'].' MC '.$row_schedule_dye['mc_from'];
                            ?>
                            <td align="center"><?= $ket; ?></td>
                            <td align="center"><?= $row_schedule_dye['no_urut']; ?></td>
                        <?php endif; ?>

                        <td align="center"><?= $row_posisikk_salinan['PRODUCTIONORDERCODE'] ?></td>
                        <td align="center"><?= $row_posisikk_salinan['PRODUCTIONDEMANDCODE'] ?></td>
                        <td align="center"><?= $row_posisikk_salinan['OPERATIONCODE'] ?></td>
                        <td align="center"><?= $row_posisikk_salinan['DEPT'] ?></td>
                        <td
                            <?php 
                                if($row_posisikk_salinan['STATUS_OPERATION'] == 'Closed'){ 
                                    echo 'style="background-color:#DC526E; color:#F7F7F7;"'; 
                                    
                                }elseif($row_posisikk_salinan['STATUS_OPERATION'] == 'Progress'){ 
                                    echo 'style="background-color:#41CC11;"'; 
                                }else{ 
                                    echo 'style="background-color:#CECECE;"'; 
                                } 
                            ?>>
                            <center><?= $row_posisikk_salinan['STATUS_OPERATION']; ?></center>
                        </td>
                        <td><?= $row_posisikk_salinan['MULAI'] ?></td>
                        <td><?= $row_posisikk_salinan['SELESAI'] ?></td>
                        <td><?= $row_posisikk_salinan['OP1'] ?></td>
                        <td><?= $row_posisikk_salinan['OP2'] ?></td>
                        <td><?= $row_posisikk_salinan['GEROBAK'] ?></td>
                        <td>
                            <?php
                                $sql_qtyorder   = db2_exec($conn1, "SELECT DISTINCT
                                                                            GROUPSTEPNUMBER,
                                                                            INITIALUSERPRIMARYQUANTITY AS QTY_ORDER,
                                                                            INITIALUSERSECONDARYQUANTITY AS QTY_ORDER_YARD
                                                                        FROM 
                                                                            VIEWPRODUCTIONDEMANDSTEP 
                                                                        WHERE 
                                                                            PRODUCTIONORDERCODE = '$row_posisikk_salinan[PRODUCTIONORDERCODE]'
                                                                            -- AND GROUPSTEPNUMBER = '$row_iptip[STEPNUMBER]'
                                                                        ORDER BY
                                                                            GROUPSTEPNUMBER ASC LIMIT 1");
                                $dt_qtyorder    = db2_fetch_assoc($sql_qtyorder);
                            ?>
                            <?= $dt_qtyorder['QTY_ORDER']; ?>
                        </td>
                        <td><?= $row_count_gerobaksalinan['JML_GEROBAK'] ?></td>
                    </tr>
                <?php endif; ?> 
                -->
            <?php endif; ?>
        <?php endif; ?>
    <?php endwhile; ?>
    <table class="table compact table-striped table-bordered nowrap" width="100%">
        <thead>
            <tr>
                <th>QC</th>
                <th>BRS</th>
                <th>DYE</th>
                <th>FIN</th>
                <th>GKG</th>
                <th>KNT</th>
                <th>LAB</th>
                <th>PPC</th>
                <th>PRT</th>
                <th>RMP</th>
                <th>TAS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $totalGerobak_QC; ?></td>
                <td><?= $totalGerobak_BRS; ?></td>
                <td><?= $totalGerobak_DYE; ?></td>
                <td><?= $totalGerobak_FIN; ?></td>
                <td><?= $totalGerobak_GKG; ?></td>
                <td><?= $totalGerobak_KNT; ?></td>
                <td><?= $totalGerobak_LAB; ?></td>
                <td><?= $totalGerobak_PPC; ?></td>
                <td><?= $totalGerobak_PRT; ?></td>
                <td><?= $totalGerobak_RMP; ?></td>
                <td><?= $totalGerobak_TAS; ?></td>
            </tr>
        </tbody>
    </table>
</tbody>
</table>