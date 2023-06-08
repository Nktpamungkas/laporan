<?php
    include_once "koneksi.php";
    $_noorder   = $_GET['bonorder'];
    $_tgl1      = $_GET['tgl1'];
    $_tgl2      = $_GET['tgl2'];
    if(!empty($_noorder)){
        $query_kk   = db2_exec($conn1, "SELECT 
                                            CASE
                                                WHEN a.TRANSACTIONDATE IS NULL THEN '-'
                                                WHEN a.TRANSACTIONDATE = '' THEN '-'
                                                ELSE a.TRANSACTIONDATE
                                            END AS TRANSACTIONDATE, 
                                            i.PROJECTCODE AS PROJECTCODE_VIEWKK,
                                            i.*,s.*,i2.USEDUSERPRIMARYQUANTITY AS QTY_BAGIKAIN,s.*,i2.USEDUSERPRIMARYQUANTITY AS QTY_BAGIKAIN
                                    FROM ITXVIEWKK i
                                    LEFT JOIN SALESORDERDELIVERY s ON s.SALESORDERLINESALESORDERCODE = i.PROJECTCODE AND s.SALESORDERLINEORDERLINE = i.ORDERLINE 
                                    LEFT JOIN PRODUCTIONRESERVATION i2 ON i2.ORDERCODE = i.PRODUCTIONDEMANDCODE AND i2.ITEMTYPEAFICODE = 'KGF'
                                    LEFT JOIN (SELECT PRODUCTIONORDERCODE, LISTAGG(TRANSACTIONDATE, ', ') AS TRANSACTIONDATE
                                                FROM (
                                                    SELECT 
                                                        s4.PRODUCTIONORDERCODE,
                                                        s4.TRANSACTIONDATE
                                                    FROM 
                                                        STOCKTRANSACTION s4 
                                                    LEFT JOIN ITXVIEWKK i2 ON i2.PRODUCTIONORDERCODE = s4.PRODUCTIONORDERCODE 
                                                    WHERE 
                                                        s4.ITEMTYPECODE = 'KGF' 
                                                    GROUP BY 
                                                        s4.TRANSACTIONDATE,
                                                        s4.PRODUCTIONORDERCODE)
                                                GROUP BY 
                                                        PRODUCTIONORDERCODE) a ON a.PRODUCTIONORDERCODE = i.PRODUCTIONORDERCODE
                                    WHERE i.PROJECTCODE = '$_noorder' AND i2.USERPRIMARYQUANTITY IS NOT NULL
                                    ORDER BY a.TRANSACTIONDATE DESC");
    }else{
        $query_kk   = db2_exec($conn1, "SELECT 
                                            CASE
                                                WHEN a.TRANSACTIONDATE IS NULL THEN '-'
                                                WHEN a.TRANSACTIONDATE = '' THEN '-'
                                                ELSE a.TRANSACTIONDATE
                                            END AS TRANSACTIONDATE, i.*,s.*,i2.USEDUSERPRIMARYQUANTITY AS QTY_BAGIKAIN
                                    FROM ITXVIEWKK i
                                    LEFT JOIN SALESORDERDELIVERY s ON s.SALESORDERLINESALESORDERCODE = i.PROJECTCODE AND s.SALESORDERLINEORDERLINE = i.ORDERLINE 
                                    LEFT JOIN PRODUCTIONRESERVATION i2 ON i2.ORDERCODE = i.PRODUCTIONDEMANDCODE AND i2.ITEMTYPEAFICODE = 'KGF'
                                    LEFT JOIN (SELECT PRODUCTIONORDERCODE, LISTAGG(TRANSACTIONDATE, ', ') AS TRANSACTIONDATE
                                                FROM (
                                                    SELECT 
                                                        s4.PRODUCTIONORDERCODE,
                                                        s4.TRANSACTIONDATE
                                                    FROM 
                                                        STOCKTRANSACTION s4 
                                                    LEFT JOIN ITXVIEWKK i2 ON i2.PRODUCTIONORDERCODE = s4.PRODUCTIONORDERCODE 
                                                    WHERE 
                                                        s4.ITEMTYPECODE = 'KGF' 
                                                    GROUP BY 
                                                        s4.TRANSACTIONDATE,
                                                        s4.PRODUCTIONORDERCODE)
                                                GROUP BY 
                                                        PRODUCTIONORDERCODE) a ON a.PRODUCTIONORDERCODE = i.PRODUCTIONORDERCODEs
                                    WHERE s.DELIVERYDATE BETWEEN '$_tgl1' AND '$_tgl2' AND i2.USERPRIMARYQUANTITY IS NOT NULL
                                    ORDER BY a.TRANSACTIONDATE DESC");
    }
    
    //Menampung data yang dihasilkan
    while ($row    = db2_fetch_assoc($query_kk)) {
        $query_pelanggan = db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$row[ORDPRNCUSTOMERSUPPLIERCODE]' AND CODE = '$row[PROJECTCODE_VIEWKK]'");
        $row_pelanggan  = db2_fetch_assoc($query_pelanggan);

        $query_kgbruto  = db2_exec($conn1, "SELECT * FROM ITXVIEW_KGBRUTO WHERE PROJECTCODE = '$row[PROJECTCODE_VIEWKK]' AND ORIGDLVSALORDERLINEORDERLINE = '$row[ORIGDLVSALORDERLINEORDERLINE]' AND CODE = '$row[PRODUCTIONDEMANDCODE]'");
        $row_kgbruto    = db2_fetch_assoc($query_kgbruto);
        if(!empty($row_kgbruto['EXTERNALREFERENCE'])){
            $no_po      = $row_kgbruto['EXTERNALREFERENCE'];
        }else{
            $no_po      = '';
        }

        $q_lebar = db2_exec($conn1, "SELECT * FROM ITXVIEWLEBAR WHERE SALESORDERCODE = '$row[PROJECTCODE_VIEWKK]' AND ORDERLINE = '$row[ORIGDLVSALORDERLINEORDERLINE]'");
        $row_lebar = db2_fetch_assoc($q_lebar);

        $q_gramasi = db2_exec($conn1, "SELECT * FROM ITXVIEWGRAMASI WHERE SALESORDERCODE = '$row[PROJECTCODE_VIEWKK]' AND ORDERLINE = '$row[ORIGDLVSALORDERLINEORDERLINE]'");
        $row_gramasi = db2_fetch_assoc($q_gramasi);
        if($row_gramasi['GRAMASI_KFF']){
            $gramasi =  number_format($row_gramasi['GRAMASI_KFF'],0);
        }else{
            $gramasi = number_format($row_gramasi['GRAMASI_FKF'],0);
        }

        $q_color     = db2_exec($conn1, "SELECT * FROM ITXVIEWCOLOR WHERE ITEMTYPECODE = '$row[ITEMTYPEAFICODE]'
                                                                    AND SUBCODE01 = '$row[SUBCODE01]' AND SUBCODE02 = '$row[SUBCODE02]' 
                                                                    AND SUBCODE03 = '$row[SUBCODE03]' AND SUBCODE04 = '$row[SUBCODE04]' 
                                                                    AND SUBCODE05 = '$row[SUBCODE05]' AND SUBCODE06 = '$row[SUBCODE06]' 
                                                                    AND SUBCODE07 = '$row[SUBCODE07]' AND SUBCODE08 = '$row[SUBCODE08]' 
                                                                    AND SUBCODE09 = '$row[SUBCODE09]' AND SUBCODE10 = '$row[SUBCODE10]'");
        $row_color  = db2_fetch_assoc($q_color);

        $q_delivery     = db2_exec($conn1, "SELECT *,
                                                    CASE
                                                        WHEN Days(now()) - Days(Timestamp_Format(DELIVERYDATE, 'YYYY-MM-DD')) < 0 THEN 0
                                                        ELSE Days(now()) - Days(Timestamp_Format(DELIVERYDATE, 'YYYY-MM-DD'))
                                                    END	AS DELAY 
                                                    FROM SALESORDERDELIVERY WHERE SALESORDERLINESALESORDERCODE = '$row[PROJECTCODE_VIEWKK]' AND SALESORDERLINEORDERLINE = '$row[ORIGDLVSALORDERLINEORDERLINE]'");
        $row_delivery   = db2_fetch_assoc($q_delivery);

        $q_tglbagikain  = db2_exec($conn1, "SELECT PRODUCTIONORDERCODE, LISTAGG(TRANSACTIONDATE, ', ') AS TRANSACTIONDATE
                                                FROM (
                                                    SELECT 
                                                        PRODUCTIONORDERCODE,
                                                        TRANSACTIONDATE
                                                    FROM 
                                                        STOCKTRANSACTION s4 
                                                    WHERE 
                                                        ITEMTYPECODE = 'KGF' AND PRODUCTIONORDERCODE = '$row[PRODUCTIONORDERCODE]'
                                                    GROUP BY 
                                                        TRANSACTIONDATE,
                                                        PRODUCTIONORDERCODE)
                                                GROUP BY 
                                                        PRODUCTIONORDERCODE");
        $row_tglbagikain    = db2_fetch_assoc($q_tglbagikain);
        if (!empty($row_tglbagikain['TRANSACTIONDATE'])) {
            $tglbagikain    = $row_tglbagikain['TRANSACTIONDATE'];
        }else{
            $tglbagikain    = '';
        }

        $q_roll     = db2_exec($conn1, "SELECT count(*) AS ROLL 
                                        FROM STOCKTRANSACTION 
                                        WHERE PRODUCTIONORDERCODE = '$row[PRODUCTIONORDERCODE]' AND ITEMTYPECODE = 'KGF'
                                        GROUP BY PRODUCTIONORDERCODE, ITEMTYPECODE");
        $row_roll   = db2_fetch_assoc($q_roll);
        if (!empty($row_roll['ROLL'])) {
            $roll   = $row_roll['ROLL'];
        }else{
            $roll = '';
        }

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
                                        WHERE LENGTH(TRIM(e.ELEMENTCODE))= 13 AND e.DEMANDCODE = '$row[PRODUCTIONDEMANDCODE]'");
        $row_qtypacking = db2_fetch_assoc($q_qtypacking);

        $q_netto    = db2_exec($conn1, "SELECT * FROM ITXVIEW_NETTO WHERE CODE = '$row[PRODUCTIONDEMANDCODE]' AND SALESORDERLINESALESORDERCODE = '$row[PROJECTCODE_VIEWKK]'");
        $row_netto  = db2_fetch_assoc($q_netto);

        // mendeteksi statusnya close
        $q_deteksi_status_close = db2_exec($conn1, "SELECT 
                                                        p.PRODUCTIONORDERCODE AS PRODUCTIONORDERCODE, 
                                                        p.PRODUCTIONDEMANDCODE AS PRODUCTIONDEMANDCODE, 
                                                        p.GROUPSTEPNUMBER AS GROUPSTEPNUMBER
                                                    FROM 
                                                        PRODUCTIONDEMANDSTEP p
                                                    WHERE
                                                    p.PRODUCTIONORDERCODE = '$row[PRODUCTIONORDERCODE]' AND p.PRODUCTIONDEMANDCODE = '$row[PRODUCTIONDEMANDCODE]'
                                                    AND p.PROGRESSSTATUS = '3' ORDER BY p.GROUPSTEPNUMBER DESC LIMIT 1");
        $row_status_close = db2_fetch_assoc($q_deteksi_status_close);

        $q_StatusTerakhir = db2_exec($conn1, "SELECT 
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
                                                    p.PRODUCTIONORDERCODE = '$row_status_close[PRODUCTIONORDERCODE]' AND p.PRODUCTIONDEMANDCODE = '$row_status_close[PRODUCTIONDEMANDCODE]' 
                                                    AND (p.PROGRESSSTATUS = '0' OR p.PROGRESSSTATUS = '1' OR p.PROGRESSSTATUS ='2') 
                                                    AND p.GROUPSTEPNUMBER > '$row_status_close[GROUPSTEPNUMBER]'
                                                ORDER BY p.GROUPSTEPNUMBER ASC LIMIT 1");
        $row_StatusTerakhir = db2_fetch_assoc($q_StatusTerakhir);
        if(!empty($row_StatusTerakhir['DEPT'])){
            $dept   = $row_StatusTerakhir['DEPT'];
        }else{
            $dept   = '';
        }
        if(!empty($row_StatusTerakhir['LONGDESCRIPTION'])){
            $status_terakhir    = $row_StatusTerakhir['LONGDESCRIPTION'];
        }else{
            $status_terakhir    = '';
        }
        // if(!empty($row_StatusTerakhir['STATUS_OPERATION']) AND $row['PROGRESSSTATUS'] == 3){
        if(!empty($row_StatusTerakhir['STATUS_OPERATION'])){
            $status_operation   = $row_StatusTerakhir['STATUS_OPERATION'];
        // }elseif(!empty($row_StatusTerakhir['STATUS_OPERATION']) AND $row['PROGRESSSTATUS'] == 0){
        //     $status_operation   = "KK Oke<span style='color: red;'>(Segera Closed Production Order)</span>";
        }else{
            $status_operation   = 'KK Oke';
        }

        $q_jam_progress1     = db2_exec($conn1, "SELECT 
                                                    p2.PRODUCTIONORDERCODE, 
                                                    p2.OPERATIONCODE, 
                                                    p2.PROGRESSTEMPLATECODE,
                                                    p2.PROGRESSSTARTPROCESSDATE, 
                                                    p2.PROGRESSSTARTPROCESSTIME, 
                                                    p2.PROGRESSENDDATE, 
                                                    p2.PROGRESSENDTIME
                                                FROM 
                                                    PRODUCTIONPROGRESSSTEPUPDATED p 
                                                LEFT JOIN PRODUCTIONPROGRESS p2 ON p2.PROGRESSNUMBER = p.PROPROGRESSPROGRESSNUMBER 
                                                WHERE 
                                                    p.DEMANDSTEPPRODUCTIONDEMANDCODE = '$row[PRODUCTIONDEMANDCODE]' 
                                                    AND 
                                                        p2.OPERATIONCODE = '$row_StatusTerakhir[OPERATIONCODE]'
                                                    AND 
                                                        PROGRESSTEMPLATECODE = 'S01'");
        $row_jam_progress1   = db2_fetch_assoc($q_jam_progress1);
        
        $q_jam_progress2     = db2_exec($conn1, "SELECT 
                                                        p2.PRODUCTIONORDERCODE, 
                                                        p2.OPERATIONCODE, 
                                                        p2.PROGRESSTEMPLATECODE,
                                                        p2.PROGRESSSTARTPROCESSDATE, 
                                                        p2.PROGRESSSTARTPROCESSTIME, 
                                                        p2.PROGRESSENDDATE, 
                                                        p2.PROGRESSENDTIME
                                                    FROM 
                                                        PRODUCTIONPROGRESSSTEPUPDATED p 
                                                    LEFT JOIN PRODUCTIONPROGRESS p2 ON p2.PROGRESSNUMBER = p.PROPROGRESSPROGRESSNUMBER 
                                                    WHERE 
                                                        p.DEMANDSTEPPRODUCTIONDEMANDCODE = '$row[PRODUCTIONDEMANDCODE]' 
                                                        AND 
                                                            p2.OPERATIONCODE = '$row_StatusTerakhir[OPERATIONCODE]'
                                                        AND 
                                                            PROGRESSTEMPLATECODE = 'E01'");
        $row_jam_progress2   = db2_fetch_assoc($q_jam_progress2);

        $jam = $row_jam_progress1['PROGRESSSTARTPROCESSDATE'].'.'.$row_jam_progress1['PROGRESSSTARTPROCESSTIME'].' - '.$row_jam_progress2['PROGRESSENDDATE'].'.'.$row_jam_progress2['PROGRESSENDTIME'];

        $q_CatatanPOGreige2     = db2_exec($conn1, "SELECT * FROM ITXVIEWPOGREIGENEW2 WHERE SALESORDERCODE = '$row[PROJECTCODE_VIEWKK]' AND ORDERLINE = '$row[ORIGDLVSALORDERLINEORDERLINE]'");
        $row_CatatanPOGreige2   = db2_fetch_assoc($q_CatatanPOGreige2);
        $q_CatatanPOGreige3     = db2_exec($conn1, "SELECT * FROM ITXVIEWPOGREIGENEW3 WHERE SALESORDERCODE = '$row[PROJECTCODE_VIEWKK]' AND ORDERLINE = '$row[ORIGDLVSALORDERLINEORDERLINE]'");
        $row_CatatanPOGreige3   = db2_fetch_assoc($q_CatatanPOGreige3);
        $q_projectADS           = db2_exec($conn1, "SELECT 
                                                        LISTAGG(POGREIGE, ',') AS POGREIGE
                                                    FROM (SELECT 
                                                            CASE
                                                                WHEN trim(b.NAMENAME) = 'ProAllow' THEN b.VALUESTRING
                                                                WHEN trim(b.NAMENAME) = 'ProAllow2' THEN b.VALUESTRING
                                                                WHEN trim(b.NAMENAME) = 'ProAllow3' THEN b.VALUESTRING
                                                                WHEN trim(b.NAMENAME) = 'ProAllow4' THEN b.VALUESTRING
                                                                WHEN trim(b.NAMENAME) = 'ProAllow5' THEN b.VALUESTRING
                                                            END AS POGREIGE
                                                        FROM PRODUCTIONDEMAND a 
                                                        LEFT JOIN ADSTORAGE b ON b.UNIQUEID = a.ABSUNIQUEID
                                                        WHERE a.DLVSALORDERLINESALESORDERCODE = '$row[PROJECTCODE]' AND DLVSALESORDERLINEORDERLINE = '$row[ORIGDLVSALORDERLINEORDERLINE]')");
        $row_projectADS         = db2_fetch_assoc($q_projectADS);
        $q_projectAKJ           = db2_exec($conn1, "SELECT * FROM PRODUCTIONDEMAND WHERE DLVSALORDERLINESALESORDERCODE = '$row[PROJECTCODE_VIEWKK]' AND DLVSALESORDERLINEORDERLINE = '$row[ORIGDLVSALORDERLINEORDERLINE]'");
        $row_projectAKJ         = db2_fetch_assoc($q_projectAKJ);

        $poGreige2               = 'No KO:. '.$row_CatatanPOGreige2['LOTCODE'].'; Demand KGF : '.$row_CatatanPOGreige2['DEMAND_KG'];
        $poGreige3               = 'No KO:. '.$row_CatatanPOGreige3['LOTCODE'].'; Demand KGF : '.$row_CatatanPOGreige3['DEMAND_KG'];
        $poGreigeADS             = $row_projectADS['POGREIGE'];
        $poGreigeAKJ             = $row_projectAKJ['INTERNALREFERENCE'];

        $q_keterangan           = db2_exec($conn1, "SELECT u.LONGDESCRIPTION AS KETERANGAN 
                                                        FROM ADSTORAGE a
                                                        LEFT JOIN USERGENERICGROUP u ON u.CODE = a.VALUESTRING 
                                                        WHERE a.UNIQUEID = '$row[ABSUNIQUEID_DEMAND]' AND TRIM(a.NAMENAME) = 'DefectType'");
        $row_keterangan         = db2_fetch_assoc($q_keterangan);
        if(!empty($row_keterangan['KETERANGAN'])){
            $ket    = $row_keterangan['KETERANGAN'];
        }else{
            $ket    = '';
        }

        $data[]    = array(
                        "TGLTERIMAORDER"        => $row['ORDERDATE'],
                        "PELANGGAN"             => $row_pelanggan['LANGGANAN'].' | '.$row_pelanggan['BUYER'],
                        "NO_ORDER"              => TRIM($row['PROJECTCODE_VIEWKK']),
                        "NO_PO"                 => $no_po,
                        "KETERANGAN_PRODUCT"    => TRIM($row['SUBCODE01']).'-'.TRIM($row['SUBCODE02']).'-'.TRIM($row['SUBCODE03']).'-'.TRIM($row['SUBCODE04']).'-'.TRIM($row['SUBCODE05']).'-'.TRIM($row['SUBCODE06']).'-'.TRIM($row['SUBCODE07']).'-'.TRIM($row['SUBCODE08']),
                        "LEBAR"                 => number_format($row_lebar['LEBAR'],0),
                        "GRAMASI"               => $gramasi,
                        "WARNA"                 => $row_color['WARNA'],
                        "NO_WARNA"              => $row['SUBCODE05'],
                        "DELIVERY"              => $row_delivery['DELIVERYDATE'],
                        // "TGLBAGIKAIN"           => $row['TRANSACTIONDATE'],
                        // "TGLBAGIKAIN"           => $tglbagikain,
                        "ROLL"                  => $roll,
                        "QTYBAGIKAIN"           => number_format($row['QTY_BAGIKAIN'],2),
                        "QTYPACKING"            => number_format($row_qtypacking['QTY_PACKING'],2),
                        "NETTO"                 => number_format($row_netto['USERPRIMARYQUANTITY'],0),
                        "DELAY"                 => $row_delivery['DELAY'],
                        "KODE_DEPT"             => $dept,
                        "STATUS_TERAKHIR"       => $status_terakhir,
                        "STATUS_OPERATION"      => $status_operation,
                        "PRODUCTIONDEMANDCODE"  => $row['PRODUCTIONDEMANDCODE'],
                        "PRODUCTIONORDERCODE"   => $row['PRODUCTIONORDERCODE'],
                        "CATATAN_PO_GREIGE"     => $poGreige2.$poGreige3.$poGreigeADS.$poGreigeAkj,
                        "KETERANGAN"            => $ket,
                        "JAM"                   => $jam
                    );
    }
    
    //Merubah data kedalam bentuk JSON
    header('Content-Type: application/json');
    $arr = array();
    $arr['info'] = 'success';
    $arr['num'] = count($data);
    $arr['result'] = $data;
    echo json_encode($arr);
?>