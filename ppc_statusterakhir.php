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
            $kode_dept          = $d_StatusTerakhir['DEPT'];
            $status_terakhir    = $d_StatusTerakhir['LONGDESCRIPTION'];
            $status_operation   = $d_StatusTerakhir['STATUS_OPERATION'];
        }
    }
?>