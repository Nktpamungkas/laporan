<?php 
    // ini_set("error_reporting", 1);
    // session_start();
    // require_once "koneksi.php";
    // mysqli_query($con_nowprd, "DELETE FROM itxview_leadtime WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY");
    // mysqli_query($con_nowprd, "DELETE FROM itxview_leadtime WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]'"); 

    // mysqli_query($con_nowprd, "DELETE FROM posisikk_cache_leadtime WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY");
    // mysqli_query($con_nowprd, "DELETE FROM posisikk_cache_leadtime WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]'"); 

    // mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_ins3_leadtime WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY");
    // mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_ins3_leadtime WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]'"); 

    // mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_cnp1_leadtime WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY");
    // mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_cnp1_leadtime WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]'"); 
?>
<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Leadtime Lululemon.xls");
    header('Cache-Control: max-age=0');
?>
<table border="1">
    <thead>
        <tr>
            <th rowspan="2">PELANGGAN</th>
            <th rowspan="2">BUYER</th>
            <th rowspan="2">NO. ORDER</th>
            <th rowspan="2">ITEM</th>
            <th rowspan="2">JENIS KAIN</th>
            <th rowspan="2">WARNA</th>
            <th rowspan="2">NO KK</th>
            <th rowspan="2">NO DEMAND</th>
            <th rowspan="2">Original PD Code</th>
            <th rowspan="2">LOT</th>
            <th colspan="2" style="text-align: center;">Qty Bruto</th>
            <th rowspan="2">NETTO</th>
            <th rowspan="2">LENGTH</th>
            <th rowspan="2">TGL CELUP GREIGE</th>
            <th rowspan="2">TGL PACKING</th>
            <th rowspan="2">TGL INS MEJA</th>
            <th rowspan="2">LEAD TIME PRODUKSI</th>
            <th rowspan="2">Internal Lead Time Adidas</th>
            <th rowspan="2">Internal Lead Time Excluding Testing</th>

            <th style="text-align: center;">BAT1</th>
            <th style="text-align: center;">BAT2</th>
            <th style="text-align: center;">BKN1</th>
            <th style="text-align: center;">SCO1</th>
            <th style="text-align: center;">RLX1</th>
            <th style="text-align: center;">CBL1</th>
            <th style="text-align: center;">MAT1</th>
            <th style="text-align: center;">PRE1</th>
            <th style="text-align: center;">RSE1</th>
            <th style="text-align: center;">RSE2</th>
            <th style="text-align: center;">SHR1</th>
            <th style="text-align: center;">SHR2</th>
            <th style="text-align: center;">SUE1</th>
            <th style="text-align: center;">SUE2</th>
            <th style="text-align: center;">DYE1</th>
            <th style="text-align: center;">DYE2</th>
            <th style="text-align: center;">DYE3</th>
            <th style="text-align: center;">DYE4</th>
            <th style="text-align: center;">DYE5</th>
            <th style="text-align: center;">DYE6</th>
            <th style="text-align: center;">SOP1</th>
            <th style="text-align: center;">BLD1</th>
            <th style="text-align: center;">BLP1</th>
            <th style="text-align: center;">OPW1</th>
            <th style="text-align: center;">OVD1</th>
            <th style="text-align: center;">OVN1</th>
            <th style="text-align: center;">OVN2</th>
            <th style="text-align: center;">OVN3</th>
            <th style="text-align: center;">CPT1</th>
            <th style="text-align: center;">FIN1</th>
            <th style="text-align: center;">FNJ1</th>
            <th style="text-align: center;">STM1</th>
            <th style="text-align: center;">STM2</th>
            <th style="text-align: center;">TDR1</th>
            <th style="text-align: center;">SHR3</th>
            <th style="text-align: center;">SHR4</th>
            <th style="text-align: center;">SHR5</th>
            <th style="text-align: center;">SUE3</th>
            <th style="text-align: center;">SUE4</th>
            <th style="text-align: center;">FLT1</th>
            <th style="text-align: center;">INS2</th>
            <th style="text-align: center;">ROT1</th>
            <th style="text-align: center;">SPT1</th>
            <th style="text-align: center;">SUB1</th>
            <th style="text-align: center;">CUR1</th>
            <th style="text-align: center;">INS3</th>
            <th style="text-align: center;">QCF4</th>
            <th style="text-align: center;">CNP1</th>
            <th style="text-align: center;">GKJ1</th>
            <th style="text-align: center;">PPC4</th>
            <th rowspan="2">TOTAL LEADTIME</th>

        </tr>
        <tr>
            <td>Jml Rol</td>
            <td>Kgs</td>
            <td>BAGI KAIN</td>
            <td>BUKA KAIN</td>
            <td>BALIK KAIN</td>
            <td>SCOURING</td>
            <td>RELAXING</td>
            <td>CONTINOUS BLEACING</td>
            <td>LAB COLOR MATCH</td>
            <td>PRESET</td>
            <td>RAISING GREIGE FACE</td>
            <td>RAISING GREIGE BACK</td>
            <td>SHEARING GREIGE FACE</td>
            <td>SHEARING GREIGE BACK</td>
            <td>SUEDING GREIGE FACE</td>
            <td>SUEDING GREIGE BACK</td>
            <td>FABRIC DYEING (WHITE/HEATER)</td>
            <td>FABRIC DYEING (POLY)</td>
            <td>FABRIC DYEING (CD)</td>
            <td>FABRIC DYEING (COTTON/RAYON/TENCEL/MODAL)</td>
            <td>FABRIC DYEING (NYLON)</td>
            <td>FABRIC DYEING CVC+TC (POLY+COTTON)</td>
            <td>SOAPING</td>
            <td>BELAH DYEING</td>
            <td>BELAH PRESET</td>
            <td>BELAH CUCI</td>
            <td>OVEN DYEING</td>
            <td>OVEN STENTER</td>
            <td>OVEN KERING</td>
            <td>OVEN TAMBAH OBAT SETELAH PRT</td>
            <td>COMPACT</td>
            <td>FINISHING 1</td>
            <td>FINISHING JADI 1</td>
            <td>STEAM FINISHING</td>
            <td>STEAM PRINTING</td>
            <td>TUMBLE DRY</td>
            <td>SHEARING FINISHED FACE</td>
            <td>SHEARING FINISHED BACK</td>
            <td>SHEARING FINISHED FACE AFTER PRT</td>
            <td>SUEDING FINISHED FACE</td>
            <td>SUEDING FINISED BACK</td>
            <td>PRINTING FLAT</td>
            <td>INSPECTION (PRINTING)</td>
            <td>PRINTING ROTARY</td>
            <td>SOAPING AFTER PRINTING</td>
            <td>PRINTING SUBLIM</td>
            <td>CURING</td>
            <td>FINAL INSPECTION</td>
            <td>QC FINAL</td>
            <td>CUTTING + PACKING</td>
            <td>MUTASI</td>
            <td>KK OK</td>
        </tr>
    </thead>
    <tbody> 
        <?php 
            ini_set("error_reporting", 1);
            session_start();
            require_once "koneksi.php";
            $tgl1           = $_POST['tgl1'];
            $tgl2           = $_POST['tgl2'];

            $itxviewmemo              = db2_exec($conn1, "SELECT
                                                                im.ORDERDATE,
                                                                im.LANGGANAN,
                                                                im.BUYER,
                                                                im.NO_ITEM,
                                                                im.NO_ORDER,
                                                                im.NO_PO,
                                                                im.SUBCODE02,
                                                                im.SUBCODE03,
                                                                im.JENIS_KAIN,
                                                                im.WARNA,
                                                                im.NO_WARNA,
                                                                im.DELIVERY,
                                                                ipm.PROGRESSSTARTPROCESSDATE,
                                                                im.QTY_BAGIKAIN,
                                                                im.NETTO,
                                                                im.DELAY,
                                                                im.NO_KK,
                                                                im.DEMAND,
                                                                im.LOT,
                                                                im.ORDERLINE,
                                                                im.PROGRESSSTATUS,
                                                                im.PROGRESSSTATUS_DEMAND,
                                                                im.KETERANGAN
                                                            FROM
                                                                ITXVIEW_MEMOPENTINGPPC im 
                                                            LEFT JOIN ITXVIEW_POSISIKK_MUTASI ipm ON ipm.PRODUCTIONORDERCODE = im.NO_KK AND ipm.DEMANDSTEPPRODUCTIONDEMANDCODE = im.DEMAND 
                                                            WHERE
                                                                ipm.PROGRESSSTARTPROCESSDATE BETWEEN '$tgl1' AND '$tgl2'
                                                                -- im.NO_KK = '00101307'
                                                                ");
            while ($row_itxviewmemo   = db2_fetch_assoc($itxviewmemo)) {
                $r_itxviewmemo[]      = "('".TRIM(addslashes($row_itxviewmemo['ORDERDATE']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['LANGGANAN']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['BUYER']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_ITEM']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_ORDER']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_PO']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['SUBCODE02']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['SUBCODE03']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['JENIS_KAIN']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['WARNA']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_WARNA']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['DELIVERY']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['PROGRESSSTARTPROCESSDATE']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['QTY_BAGIKAIN']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['NETTO']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['DELAY']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_KK']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['DEMAND']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['LOT']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['ORDERLINE']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['PROGRESSSTATUS']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['PROGRESSSTATUS_DEMAND']))."',"
                                        ."'".TRIM(addslashes($row_itxviewmemo['KETERANGAN']))."',"
                                        ."'".$_SERVER['REMOTE_ADDR']."',"
                                        ."'".date('Y-m-d H:i:s')."',"
                                        ."'".'LEADTIME'."')";
            }
            $value_itxviewmemo        = implode(',', $r_itxviewmemo);
            $insert_itxviewmemo       = mysqli_query($con_nowprd, "INSERT INTO itxview_leadtime(ORDERDATE,PELANGGAN,BUYER,NO_ITEM,NO_ORDER,NO_PO,ARTICLE_GROUP,ARTICLE_CODE,KETERANGAN_PRODUCT,WARNA,NO_WARNA,DELIVERY,TGL_MUTASI,QTY_BAGIKAIN,NETTO,`DELAY`,NO_KK,DEMAND,LOT,ORDERLINE,PROGRESSSTATUS,PROGRESSSTATUS_DEMAND,KETERANGAN,IPADDRESS,CREATEDATETIME,ACCESS_TO) VALUES $value_itxviewmemo");
                
            // --------------------------------------------------------------------------------------------------------------- //
            $tgl1_2         = $_POST['tgl1'];
            $tgl2_2         = $_POST['tgl2'];
            if($tgl1_2 & $tgl2_2){
                $where_date2     = "TGL_MUTASI BETWEEN '$tgl1_2' AND '$tgl2_2'";
            }else{
                $where_date2     = "";
            }
            $sqlDB2 = "SELECT DISTINCT * FROM itxview_leadtime WHERE $where_date2 AND ACCESS_TO = 'LEADTIME' AND IPADDRESS = '$_SERVER[REMOTE_ADDR]' ORDER BY TGL_MUTASI ASC";
            // $sqlDB2 = "SELECT DISTINCT * FROM itxview_leadtime WHERE NO_KK = '00101307' AND ACCESS_TO = 'LEADTIME' AND IPADDRESS = '$_SERVER[REMOTE_ADDR]' ORDER BY DELIVERY ASC ";

            $stmt   = mysqli_query($con_nowprd, $sqlDB2);
            while ($rowdb2 = mysqli_fetch_array($stmt)) {
        ?>
        <?php
            ini_set("error_reporting", 1);

            // TANGGAL CELUP GREIGE
                $q_tglcelupgreige   = db2_exec($conn1, "SELECT
                                                            iptip.MULAI
                                                        FROM 
                                                            PRODUCTIONDEMANDSTEP p 
                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                        WHERE
                                                            p.PRODUCTIONORDERCODE  = '$rowdb2[NO_KK]' 
                                                            AND p.PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]'
                                                            AND (TRIM(p.OPERATIONCODE) = 'DYE1'
                                                            OR TRIM(p.OPERATIONCODE) = 'DYE2'
                                                            OR TRIM(p.OPERATIONCODE) = 'DYE2-TI'
                                                            OR TRIM(p.OPERATIONCODE) = 'DYE3'
                                                            OR TRIM(p.OPERATIONCODE) = 'DYE4'
                                                            OR TRIM(p.OPERATIONCODE) = 'DYE5'
                                                            OR TRIM(p.OPERATIONCODE) = 'DYE6')
                                                        ORDER BY p.STEPNUMBER ASC LIMIT 1");
                $row_tglcelupgreige = db2_fetch_assoc($q_tglcelupgreige);
            // TANGGAL CELUP GREIGE

            // TGL PACKING
                $q_tglpacking   = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_CNP1 WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' ORDER BY MULAI ASC LIMIT 1");
                $row_tglpacking = db2_fetch_assoc($q_tglpacking);
            // TGL PACKING
            
            // TGL INSPECT
                $q_tglinspect   = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_INS3 WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' ORDER BY MULAI ASC LIMIT 1");
                $row_tglinspect = db2_fetch_assoc($q_tglinspect);
            // TGL INSPECT

            // POSISI KK INS3
                // $posisikk_ins3 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_INS3 WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]'");
                // while ($row_posisikk_ins3   = db2_fetch_assoc($posisikk_ins3)) {
                //     $PRODUCTIONORDERCODE        = TRIM(addslashes($row_posisikk_ins3['PRODUCTIONORDERCODE']));
                //     $OPERATIONCODE              = TRIM(addslashes($row_posisikk_ins3['OPERATIONCODE']));
                //     $PROPROGRESSPROGRESSNUMBER  = TRIM(addslashes($row_posisikk_ins3['PROPROGRESSPROGRESSNUMBER']));
                //     $DEMANDSTEPSTEPNUMBER       = TRIM(addslashes($row_posisikk_ins3['DEMANDSTEPSTEPNUMBER']));
                //     $PROGRESSTEMPLATECODE       = TRIM(addslashes($row_posisikk_ins3['PROGRESSTEMPLATECODE']));
                //     $MULAI                      = TRIM(addslashes($row_posisikk_ins3['MULAI']));
                //     $OP                         = TRIM(addslashes($row_posisikk_ins3['OP']));
                //     $IPADDRESS                  = $_SERVER['REMOTE_ADDR'];
                //     $CREATEDATETIME             = date('Y-m-d H:i:s');
                // }
                // if($r_posisikk_ins3){
                //     $value_posisikk_ins3        = implode(',', $r_posisikk_ins3);
                //     $insert_posisikk_ins3       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_ins3_leadtime
                //                                                                         (PRODUCTIONORDERCODE,
                //                                                                         OPERATIONCODE,
                //                                                                         PROPROGRESSPROGRESSNUMBER,
                //                                                                         DEMANDSTEPSTEPNUMBER,
                //                                                                         PROGRESSTEMPLATECODE,
                //                                                                         MULAI,
                //                                                                         OP,
                //                                                                         IPADDRESS,
                //                                                                         CREATEDATETIME) 
                //                                                                 VALUES ('$PRODUCTIONORDERCODE',
                //                                                                 '$OPERATIONCODE',
                //                                                                 '$PROPROGRESSPROGRESSNUMBER',
                //                                                                 '$DEMANDSTEPSTEPNUMBER',
                //                                                                 '$PROGRESSTEMPLATECODE',
                //                                                                 '$MULAI',
                //                                                                 '$OP',
                //                                                                 '$IPADDRESS',
                //                                                                 '$CREATEDATETIME')");
                // }
            // POSISI KK INS3
            
            // POSISI KK CNP1
                // $posisikk_cnp1 = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_CNP1 WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]'");
                // while ($row_posisikk_cnp1   = db2_fetch_assoc($posisikk_cnp1)) {
                //     $PRODUCTIONORDERCODE            = TRIM(addslashes($row_posisikk_cnp1['PRODUCTIONORDERCODE']));
                //     $OPERATIONCODE                  = TRIM(addslashes($row_posisikk_cnp1['OPERATIONCODE']));
                //     $PROPROGRESSPROGRESSNUMBER      = TRIM(addslashes($row_posisikk_cnp1['PROPROGRESSPROGRESSNUMBER']));
                //     $DEMANDSTEPSTEPNUMBER           = TRIM(addslashes($row_posisikk_cnp1['DEMANDSTEPSTEPNUMBER']));
                //     $PROGRESSTEMPLATECODE           = TRIM(addslashes($row_posisikk_cnp1['PROGRESSTEMPLATECODE']));
                //     $MULAI                          = TRIM(addslashes($row_posisikk_cnp1['MULAI']));
                //     $OP                             = TRIM(addslashes($row_posisikk_cnp1['OP']));
                //     $IPADDRESS                      = $_SERVER['REMOTE_ADDR'];
                //     $CREATEDATETIME                 = date('Y-m-d H:i:s');

                //     $insert_posisikk_cnp1       = mysqli_query($con_nowprd, "INSERT INTO itxview_posisikk_tgl_in_prodorder_cnp1_leadtime
                //                                                                         (PRODUCTIONORDERCODE,
                //                                                                         OPERATIONCODE,
                //                                                                         PROPROGRESSPROGRESSNUMBER,
                //                                                                         DEMANDSTEPSTEPNUMBER,
                //                                                                         PROGRESSTEMPLATECODE,
                //                                                                         MULAI,
                //                                                                         OP,
                //                                                                         IPADDRESS,
                //                                                                         CREATEDATETIME) 
                //                                                                 VALUES ('$PRODUCTIONORDERCODE',
                //                                                                 '$OPERATIONCODE',
                //                                                                 '$PROPROGRESSPROGRESSNUMBER',
                //                                                                 '$DEMANDSTEPSTEPNUMBER',
                //                                                                 '$PROGRESSTEMPLATECODE',
                //                                                                 '$MULAI',
                //                                                                 '$OP',
                //                                                                 '$IPADDRESS',
                //                                                                 '$CREATEDATETIME')");
                // }
            // POSISI KK CNP1

            // POSISI KK
                $q_posisikk     = db2_exec($conn1, "SELECT
                                                        p.PRODUCTIONORDERCODE,
                                                        p.PRODUCTIONDEMANDCODE,
                                                        p.STEPNUMBER,
                                                        TRIM(p.OPERATIONCODE) AS OPERATIONCODE,
                                                        (iptip.MULAI) AS MULAI,
                                                        (iptop.SELESAI) AS SELESAI
                                                    FROM 
                                                        PRODUCTIONDEMANDSTEP p 
                                                    LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                    LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                    WHERE
                                                        p.PRODUCTIONORDERCODE  = '$rowdb2[NO_KK]' 
                                                        AND p.PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]'
                                                    ORDER BY p.STEPNUMBER ASC");
                while ($row_posisikk   = db2_fetch_assoc($q_posisikk)) {
                    $prod_order     = TRIM(addslashes($row_posisikk['PRODUCTIONORDERCODE']));
                    $prod_demand    = TRIM(addslashes($row_posisikk['PRODUCTIONDEMANDCODE']));
                    $stepnumber     = TRIM(addslashes($row_posisikk['STEPNUMBER']));
                    $operationcode  = TRIM(addslashes($row_posisikk['OPERATIONCODE']));
                    $mulai          = TRIM(addslashes($row_posisikk['MULAI']));
                    $selesai        = TRIM(addslashes($row_posisikk['SELESAI']));
                    $ipaddress      = $_SERVER['REMOTE_ADDR'];
                    $creationdate   = date('Y-m-d H:i:s');

                    $insert_posisikk    = mysqli_query($con_nowprd, "INSERT INTO posisikk_cache_leadtime
                                                                                (productionorder,
                                                                                productiondemand,
                                                                                stepnumber,
                                                                                operationcode,
                                                                                mulai,
                                                                                selesai,
                                                                                ipaddress,
                                                                                createdatetime) 
                                                                        VALUES ('$prod_order',
                                                                                '$prod_demand',
                                                                                '$stepnumber',
                                                                                '$operationcode',
                                                                                '$mulai',
                                                                                '$selesai',
                                                                                '$ipaddress',
                                                                                '$creationdate')");
                }
            // POSISI KK

            // BAT1
                $q_posisikk_bat1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'BAT1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_bat1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'BAT1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");
                $row_posisikk_bat1_1      = mysqli_fetch_assoc($q_posisikk_bat1_1);
                $row_posisikk_bat1_2      = mysqli_fetch_assoc($q_posisikk_bat1_2);

                if($row_posisikk_bat1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_bat1         = date_create($row_posisikk_bat1_2['mulai']);
                    $waktuakhir_bat1        = date_create($row_posisikk_bat1_2['selesai']);
                }elseif($row_posisikk_bat1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_bat1         = date_create($row_posisikk_bat1_1['mulai']);
                    $waktuakhir_bat1        = date_create($row_posisikk_bat1_1['mulai']);
                }else{
                    $waktuawal_bat1         = date_create($row_posisikk_bat1_1['mulai']);
                    $waktuakhir_bat1        = date_create($row_posisikk_bat1_2['selesai']);
                }

                $diff_bat1              = date_diff($waktuawal_bat1, $waktuakhir_bat1);  
            // BAT1

            // BAT2
                $q_posisikk_bat2_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'BAT2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_bat2_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'BAT2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_bat2_1      = mysqli_fetch_assoc($q_posisikk_bat2_1);
                $row_posisikk_bat2_2      = mysqli_fetch_assoc($q_posisikk_bat2_2);

                if($row_posisikk_bat2_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_bat2         = date_create($row_posisikk_bat2_2['mulai']);
                    $waktuakhir_bat2        = date_create($row_posisikk_bat2_2['selesai']);
                }elseif($row_posisikk_bat2_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_bat2         = date_create($row_posisikk_bat2_1['mulai']);
                    $waktuakhir_bat2        = date_create($row_posisikk_bat2_1['mulai']);
                }else{
                    $waktuawal_bat2         = date_create($row_posisikk_bat2_1['mulai']);
                    $waktuakhir_bat2        = date_create($row_posisikk_bat2_2['selesai']);
                }
                $diff_bat2              = date_diff($waktuawal_bat2, $waktuakhir_bat2);

            // BAT2

            // BKN1
                $q_posisikk_bkn1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'BKN1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_bkn1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'BKN1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");
                
                $row_posisikk_bkn1_1      = mysqli_fetch_assoc($q_posisikk_bkn1_1);
                $row_posisikk_bkn1_2      = mysqli_fetch_assoc($q_posisikk_bkn1_2);

                if($row_posisikk_bkn1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_bkn1        = date_create($row_posisikk_bkn1_2['mulai']);
                    $waktuawal_bkn1        = date_create($row_posisikk_bkn1_2['selesai']);
                }elseif($row_posisikk_bkn1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_bkn1         = date_create($row_posisikk_bkn1_1['mulai']);
                    $waktuakhir_bkn1        = date_create($row_posisikk_bkn1_1['mulai']);
                }else{
                    $waktuawal_bkn1         = date_create($row_posisikk_bkn1_1['mulai']);
                    $waktuakhir_bkn1        = date_create($row_posisikk_bkn1_2['selesai']);
                }
                $diff_bkn1              = date_diff($waktuawal_bkn1, $waktuakhir_bkn1);

            // BKN1
            
            // SCO1
                $q_posisikk_sco1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SCO1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_sco1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SCO1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");
                

                $row_posisikk_sco1_1      = mysqli_fetch_assoc($q_posisikk_sco1_1);
                $row_posisikk_sco1_2      = mysqli_fetch_assoc($q_posisikk_sco1_2);

                if($row_posisikk_sco1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_sco1        = date_create($row_posisikk_sco1_2['mulai']);
                    $waktuakhir_sco1        = date_create($row_posisikk_sco1_2['selesai']);
                }elseif($row_posisikk_sco1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_sco1         = date_create($row_posisikk_sco1_1['mulai']);
                    $waktuakhir_sco1        = date_create($row_posisikk_sco1_1['mulai']);
                }else{
                    $waktuawal_sco1         = date_create($row_posisikk_sco1_1['mulai']);
                    $waktuakhir_sco1        = date_create($row_posisikk_sco1_2['selesai']);
                }
                $diff_sco1              = date_diff($waktuawal_sco1, $waktuakhir_sco1);

            // SCO1

            // RLX1
                $q_posisikk_rlx1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'RLX1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_rlx1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'RLX1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_rlx1_1      = mysqli_fetch_assoc($q_posisikk_rlx1_1);
                $row_posisikk_rlx1_2      = mysqli_fetch_assoc($q_posisikk_rlx1_2);

                if($row_posisikk_rlx1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_rlx1         = date_create($row_posisikk_rlx1_2['mulai']);
                    $waktuakhir_rlx1        = date_create($row_posisikk_rlx1_2['selesai']);
                }elseif($row_posisikk_rlx1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_rlx1         = date_create($row_posisikk_rlx1_1['mulai']);
                    $waktuakhir_rlx1        = date_create($row_posisikk_rlx1_1['mulai']);
                }else{
                    $waktuawal_rlx1         = date_create($row_posisikk_rlx1_1['mulai']);
                    $waktuakhir_rlx1        = date_create($row_posisikk_rlx1_2['selesai']);
                }
                $diff_rlx1              = date_diff($waktuawal_rlx1, $waktuakhir_rlx1);

            // RLX1

            // CBL1
                $q_posisikk_cbl1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'CBL1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_cbl1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'CBL1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_cbl1_1      = mysqli_fetch_assoc($q_posisikk_cbl1_1);
                $row_posisikk_cbl1_2      = mysqli_fetch_assoc($q_posisikk_cbl1_2);

                if($row_posisikk_cbl1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_cbl1         = date_create($row_posisikk_cbl1_2['mulai']);
                    $waktuakhir_cbl1        = date_create($row_posisikk_cbl1_2['selesai']);
                }elseif($row_posisikk_cbl1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_cbl1         = date_create($row_posisikk_cbl1_1['mulai']);
                    $waktuakhir_cbl1        = date_create($row_posisikk_cbl1_1['mulai']);
                }else{
                    $waktuawal_cbl1         = date_create($row_posisikk_cbl1_1['mulai']);
                    $waktuakhir_cbl1        = date_create($row_posisikk_cbl1_2['selesai']);
                }
                $diff_cbl1              = date_diff($waktuawal_cbl1, $waktuakhir_cbl1);
            // CBL1

            // MAT1
                $q_posisikk_mat1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'MAT1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_mat1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'MAT1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_mat1_1      = mysqli_fetch_assoc($q_posisikk_mat1_1);
                $row_posisikk_mat1_2      = mysqli_fetch_assoc($q_posisikk_mat1_2);

                if($row_posisikk_mat1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_mat1         = date_create($row_posisikk_mat1_2['mulai']);
                    $waktuakhir_mat1        = date_create($row_posisikk_mat1_2['selesai']);
                }elseif($row_posisikk_mat1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_mat1         = date_create($row_posisikk_mat1_1['mulai']);
                    $waktuakhir_mat1        = date_create($row_posisikk_mat1_1['mulai']);
                }else{
                    $waktuawal_mat1         = date_create($row_posisikk_mat1_1['mulai']);
                    $waktuakhir_mat1        = date_create($row_posisikk_mat1_2['selesai']);
                }
                $diff_mat1              = date_diff($waktuawal_mat1, $waktuakhir_mat1);
            // MAT1

            // PRE1
                $q_posisikk_pre1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'PRE1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_pre1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'PRE1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_pre1_1      = mysqli_fetch_assoc($q_posisikk_pre1_1);
                $row_posisikk_pre1_2      = mysqli_fetch_assoc($q_posisikk_pre1_2);

                if($row_posisikk_pre1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_pre1         = date_create($row_posisikk_pre1_2['mulai']);
                    $waktuakhir_pre1        = date_create($row_posisikk_pre1_2['selesai']);
                }elseif($row_posisikk_pre1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_pre1         = date_create($row_posisikk_pre1_1['mulai']);
                    $waktuakhir_pre1        = date_create($row_posisikk_pre1_1['mulai']);
                }else{
                    $waktuawal_pre1         = date_create($row_posisikk_pre1_1['mulai']);
                    $waktuakhir_pre1        = date_create($row_posisikk_pre1_2['selesai']);
                }
                $diff_pre1              = date_diff($waktuawal_pre1, $waktuakhir_pre1);

            // PRE1

            // RSE1
                $q_posisikk_rse1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'RSE1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_rse1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'RSE1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_rse1_1      = mysqli_fetch_assoc($q_posisikk_rse1_1);
                $row_posisikk_rse1_2      = mysqli_fetch_assoc($q_posisikk_rse1_2);

                if($row_posisikk_rse1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_rse1         = date_create($row_posisikk_rse1_2['mulai']);
                    $waktuakhir_rse1        = date_create($row_posisikk_rse1_2['selesai']);
                }elseif($row_posisikk_rse1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_rse1         = date_create($row_posisikk_rse1_1['mulai']);
                    $waktuakhir_rse1        = date_create($row_posisikk_rse1_1['mulai']);
                }else{
                    $waktuawal_rse1         = date_create($row_posisikk_rse1_1['mulai']);
                    $waktuakhir_rse1        = date_create($row_posisikk_rse1_2['selesai']);
                }
                $diff_rse1              = date_diff($waktuawal_rse1, $waktuakhir_rse1);
            // RSE1

            // RSE2
                $q_posisikk_rse2_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'RSE2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_rse2_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'RSE2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_rse2_1      = mysqli_fetch_assoc($q_posisikk_rse2_1);
                $row_posisikk_rse2_2      = mysqli_fetch_assoc($q_posisikk_rse2_2);

                if($row_posisikk_rse2_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_rse2         = date_create($row_posisikk_rse2_2['mulai']);
                    $waktuakhir_rse2        = date_create($row_posisikk_rse2_2['selesai']);
                }elseif($row_posisikk_rse2_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_rse2         = date_create($row_posisikk_rse2_1['mulai']);
                    $waktuakhir_rse2        = date_create($row_posisikk_rse2_1['mulai']);
                }else{
                    $waktuawal_rse2         = date_create($row_posisikk_rse2_1['mulai']);
                    $waktuakhir_rse2        = date_create($row_posisikk_rse2_2['selesai']);
                }

                $diff_rse2              = date_diff($waktuawal_rse2, $waktuakhir_rse2);
            // RSE2

            // SHR1
                $q_posisikk_shr1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SHR1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_shr1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SHR1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_shr1_1      = mysqli_fetch_assoc($q_posisikk_shr1_1);
                $row_posisikk_shr1_2      = mysqli_fetch_assoc($q_posisikk_shr1_2);

                if($row_posisikk_shr1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_shr1         = date_create($row_posisikk_shr1_2['mulai']);
                    $waktuakhir_shr1        = date_create($row_posisikk_shr1_2['selesai']);
                }elseif($row_posisikk_shr1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_shr1         = date_create($row_posisikk_shr1_1['mulai']);
                    $waktuakhir_shr1        = date_create($row_posisikk_shr1_1['mulai']);
                }else{
                    $waktuawal_shr1         = date_create($row_posisikk_shr1_1['mulai']);
                    $waktuakhir_shr1        = date_create($row_posisikk_shr1_2['selesai']);
                }

                $diff_shr1              = date_diff($waktuawal_shr1, $waktuakhir_shr1);
            // SHR1

            // SHR2
                $q_posisikk_shr2_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SHR2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_shr2_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SHR2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_shr2_1      = mysqli_fetch_assoc($q_posisikk_shr2_1);
                $row_posisikk_shr2_2      = mysqli_fetch_assoc($q_posisikk_shr2_2);

                if($row_posisikk_shr2_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_shr2         = date_create($row_posisikk_shr2_2['mulai']);
                    $waktuakhir_shr2        = date_create($row_posisikk_shr2_2['selesai']);
                }elseif($row_posisikk_shr2_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_shr2         = date_create($row_posisikk_shr2_1['mulai']);
                    $waktuakhir_shr2        = date_create($row_posisikk_shr2_1['mulai']);
                }else{
                    $waktuawal_shr2         = date_create($row_posisikk_shr2_1['mulai']);
                    $waktuakhir_shr2        = date_create($row_posisikk_shr2_2['selesai']);
                }

                $diff_shr2              = date_diff($waktuawal_shr2, $waktuakhir_shr2);
            // SHR2

            // SUE1
                $q_posisikk_sue1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SUE1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_sue1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SUE1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");
                $row_posisikk_sue1_1      = mysqli_fetch_assoc($q_posisikk_sue1_1);
                $row_posisikk_sue1_2      = mysqli_fetch_assoc($q_posisikk_sue1_2);

                if($row_posisikk_sue1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_sue1         = date_create($row_posisikk_sue1_2['mulai']);
                    $waktuakhir_sue1        = date_create($row_posisikk_sue1_2['selesai']);
                }elseif($row_posisikk_sue1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_sue1         = date_create($row_posisikk_sue1_1['mulai']);
                    $waktuakhir_sue1        = date_create($row_posisikk_sue1_1['mulai']);
                }else{
                    $waktuawal_sue1         = date_create($row_posisikk_sue1_1['mulai']);
                    $waktuakhir_sue1        = date_create($row_posisikk_sue1_2['selesai']);
                }

                $diff_sue1              = date_diff($waktuawal_sue1, $waktuakhir_sue1);

            // SUE1

            // SUE2
                $q_posisikk_sue2_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SUE2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_sue2_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SUE2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_sue2_1      = mysqli_fetch_assoc($q_posisikk_sue2_1);
                $row_posisikk_sue2_2      = mysqli_fetch_assoc($q_posisikk_sue2_2);

                if($row_posisikk_sue2_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_sue2         = date_create($row_posisikk_sue2_2['mulai']);
                    $waktuakhir_sue2        = date_create($row_posisikk_sue2_2['selesai']);
                }elseif($row_posisikk_sue2_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_sue2         = date_create($row_posisikk_sue2_1['mulai']);
                    $waktuakhir_sue2        = date_create($row_posisikk_sue2_1['mulai']);
                }else{
                    $waktuawal_sue2         = date_create($row_posisikk_sue2_1['mulai']);
                    $waktuakhir_sue2        = date_create($row_posisikk_sue2_2['selesai']);
                }

                $diff_sue2              = date_diff($waktuawal_sue2, $waktuakhir_sue2);
            // SUE2

            // DYE1
                $q_posisikk_dye1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'DYE1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_dye1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'DYE1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_dye1_1      = mysqli_fetch_assoc($q_posisikk_dye1_1);
                $row_posisikk_dye1_2      = mysqli_fetch_assoc($q_posisikk_dye1_2);

                if($row_posisikk_dye1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_dye1         = date_create($row_posisikk_dye1_2['mulai']);
                    $waktuakhir_dye1        = date_create($row_posisikk_dye1_2['selesai']);
                }elseif($row_posisikk_dye1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_dye1         = date_create($row_posisikk_dye1_1['mulai']);
                    $waktuakhir_dye1        = date_create($row_posisikk_dye1_1['mulai']);
                }else{
                    $waktuawal_dye1         = date_create($row_posisikk_dye1_1['mulai']);
                    $waktuakhir_dye1        = date_create($row_posisikk_dye1_2['selesai']);
                }

                $diff_dye1              = date_diff($waktuawal_dye1, $waktuakhir_dye1);
            // DYE1

            // DYE2
                $q_posisikk_dye2_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'DYE2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_dye2_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'DYE2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_dye2_1      = mysqli_fetch_assoc($q_posisikk_dye2_1);
                $row_posisikk_dye2_2      = mysqli_fetch_assoc($q_posisikk_dye2_2);

                if($row_posisikk_dye2_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_dye2         = date_create($row_posisikk_dye2_2['mulai']);
                    $waktuakhir_dye2        = date_create($row_posisikk_dye2_2['selesai']);
                }elseif($row_posisikk_dye2_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_dye2         = date_create($row_posisikk_dye2_1['mulai']);
                    $waktuakhir_dye2        = date_create($row_posisikk_dye2_1['mulai']);
                }else{
                    $waktuawal_dye2         = date_create($row_posisikk_dye2_1['mulai']);
                    $waktuakhir_dye2        = date_create($row_posisikk_dye2_2['selesai']);
                }

                $diff_dye2              = date_diff($waktuawal_dye2, $waktuakhir_dye2);
            // DYE2

            // DYE3
                $q_posisikk_dye3_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'DYE3'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_dye3_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'DYE3'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_dye3_1      = mysqli_fetch_assoc($q_posisikk_dye3_1);
                $row_posisikk_dye3_2      = mysqli_fetch_assoc($q_posisikk_dye3_2);

                if($row_posisikk_dye3_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_dye3         = date_create($row_posisikk_dye3_2['mulai']);
                    $waktuakhir_dye3        = date_create($row_posisikk_dye3_2['selesai']);
                }elseif($row_posisikk_dye3_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_dye3         = date_create($row_posisikk_dye3_1['mulai']);
                    $waktuakhir_dye3        = date_create($row_posisikk_dye3_1['mulai']);
                }else{
                    $waktuawal_dye3         = date_create($row_posisikk_dye3_1['mulai']);
                    $waktuakhir_dye3        = date_create($row_posisikk_dye3_2['selesai']);
                }

                $diff_dye3              = date_diff($waktuawal_dye3, $waktuakhir_dye3);
            // DYE3

            // DYE4
                $q_posisikk_dye4_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'DYE4'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_dye4_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'DYE4'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_dye4_1      = mysqli_fetch_assoc($q_posisikk_dye4_1);
                $row_posisikk_dye4_2      = mysqli_fetch_assoc($q_posisikk_dye4_2);

                if($row_posisikk_dye4_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_dye4         = date_create($row_posisikk_dye4_2['mulai']);
                    $waktuakhir_dye4        = date_create($row_posisikk_dye4_2['selesai']);
                }elseif($row_posisikk_dye4_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_dye4         = date_create($row_posisikk_dye4_1['mulai']);
                    $waktuakhir_dye4        = date_create($row_posisikk_dye4_1['mulai']);
                }else{
                    $waktuawal_dye4         = date_create($row_posisikk_dye4_1['mulai']);
                    $waktuakhir_dye4        = date_create($row_posisikk_dye4_2['selesai']);
                }

                $diff_dye4              = date_diff($waktuawal_dye4, $waktuakhir_dye4);
            // DYE4

            // DYE5
                $q_posisikk_dye5_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'DYE5'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_dye5_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'DYE5'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");
                
                $row_posisikk_dye5_1      = mysqli_fetch_assoc($q_posisikk_dye5_1);
                $row_posisikk_dye5_2      = mysqli_fetch_assoc($q_posisikk_dye5_2);

                if($row_posisikk_dye5_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_dye5         = date_create($row_posisikk_dye5_2['mulai']);
                    $waktuakhir_dye5        = date_create($row_posisikk_dye5_2['selesai']);
                }elseif($row_posisikk_dye5_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_dye5         = date_create($row_posisikk_dye5_1['mulai']);
                    $waktuakhir_dye5        = date_create($row_posisikk_dye5_1['mulai']);
                }else{
                    $waktuawal_dye5         = date_create($row_posisikk_dye5_1['mulai']);
                    $waktuakhir_dye5        = date_create($row_posisikk_dye5_2['selesai']);
                }

                $diff_dye5              = date_diff($waktuawal_dye5, $waktuakhir_dye5);
            // DYE5

            // DYE6
                $q_posisikk_dye6_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'DYE6'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_dye6_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'DYE6'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_dye6_1      = mysqli_fetch_assoc($q_posisikk_dye6_1);
                $row_posisikk_dye6_2      = mysqli_fetch_assoc($q_posisikk_dye6_2);

                if($row_posisikk_dye6_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_dye6         = date_create($row_posisikk_dye6_2['mulai']);
                    $waktuakhir_dye6        = date_create($row_posisikk_dye6_2['selesai']);
                }elseif($row_posisikk_dye6_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_dye6         = date_create($row_posisikk_dye6_1['mulai']);
                    $waktuakhir_dye6        = date_create($row_posisikk_dye6_1['mulai']);
                }else{
                    $waktuawal_dye6         = date_create($row_posisikk_dye6_1['mulai']);
                    $waktuakhir_dye6        = date_create($row_posisikk_dye6_2['selesai']);
                }

                $diff_dye6              = date_diff($waktuawal_dye6, $waktuakhir_dye6);
            // DYE6

            // SOP1
                $q_posisikk_sop1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SOP1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_sop1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SOP1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_sop1_1      = mysqli_fetch_assoc($q_posisikk_sop1_1);
                $row_posisikk_sop1_2      = mysqli_fetch_assoc($q_posisikk_sop1_2);

                if($row_posisikk_sop1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_sop1         = date_create($row_posisikk_sop1_2['mulai']);
                    $waktuakhir_sop1        = date_create($row_posisikk_sop1_2['selesai']);
                }elseif($row_posisikk_sop1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_sop1         = date_create($row_posisikk_sop1_1['mulai']);
                    $waktuakhir_sop1        = date_create($row_posisikk_sop1_1['mulai']);
                }else{
                    $waktuawal_sop1         = date_create($row_posisikk_sop1_1['mulai']);
                    $waktuakhir_sop1        = date_create($row_posisikk_sop1_2['selesai']);
                }

                $diff_sop1              = date_diff($waktuawal_sop1, $waktuakhir_sop1);
            // SOP1

            // BLD1
                $q_posisikk_bld1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'BLD1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_bld1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'BLD1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_bld1_1      = mysqli_fetch_assoc($q_posisikk_bld1_1);
                $row_posisikk_bld1_2      = mysqli_fetch_assoc($q_posisikk_bld1_2);

                if($row_posisikk_bld1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_bld1         = date_create($row_posisikk_bld1_2['mulai']);
                    $waktuakhir_bld1        = date_create($row_posisikk_bld1_2['selesai']);
                }elseif($row_posisikk_bld1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_bld1         = date_create($row_posisikk_bld1_1['mulai']);
                    $waktuakhir_bld1        = date_create($row_posisikk_bld1_1['mulai']);
                }else{
                    $waktuawal_bld1         = date_create($row_posisikk_bld1_1['mulai']);
                    $waktuakhir_bld1        = date_create($row_posisikk_bld1_2['selesai']);
                }

                $diff_bld1              = date_diff($waktuawal_bld1, $waktuakhir_bld1);
            // BLD1

            // BLP1
                $q_posisikk_blp1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'BLP1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_blp1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'BLP1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_blp1_1      = mysqli_fetch_assoc($q_posisikk_blp1_1);
                $row_posisikk_blp1_2      = mysqli_fetch_assoc($q_posisikk_blp1_2);

                if($row_posisikk_blp1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_blp1         = date_create($row_posisikk_blp1_2['mulai']);
                    $waktuakhir_blp1        = date_create($row_posisikk_blp1_2['selesai']);
                }elseif($row_posisikk_blp1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_blp1         = date_create($row_posisikk_blp1_1['mulai']);
                    $waktuakhir_blp1        = date_create($row_posisikk_blp1_1['mulai']);
                }else{
                    $waktuawal_blp1         = date_create($row_posisikk_blp1_1['mulai']);
                    $waktuakhir_blp1        = date_create($row_posisikk_blp1_2['selesai']);
                }

                $diff_blp1              = date_diff($waktuawal_blp1, $waktuakhir_blp1);
            // BLP1

            // OPW1
                $q_posisikk_opw1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'OPW1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_opw1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'OPW1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_opw1_1      = mysqli_fetch_assoc($q_posisikk_opw1_1);
                $row_posisikk_opw1_2      = mysqli_fetch_assoc($q_posisikk_opw1_2);

                if($row_posisikk_opw1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_opw1         = date_create($row_posisikk_opw1_2['mulai']);
                    $waktuakhir_opw1        = date_create($row_posisikk_opw1_2['selesai']);
                }elseif($row_posisikk_opw1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_opw1         = date_create($row_posisikk_opw1_1['mulai']);
                    $waktuakhir_opw1        = date_create($row_posisikk_opw1_1['mulai']);
                }else{
                    $waktuawal_opw1         = date_create($row_posisikk_opw1_1['mulai']);
                    $waktuakhir_opw1        = date_create($row_posisikk_opw1_2['selesai']);
                }

                $diff_opw1              = date_diff($waktuawal_opw1, $waktuakhir_opw1);
            // OPW1

            // OVD1
                $q_posisikk_ovd1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'OVD1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_ovd1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'OVD1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_ovd1_1      = mysqli_fetch_assoc($q_posisikk_ovd1_1);
                $row_posisikk_ovd1_2      = mysqli_fetch_assoc($q_posisikk_ovd1_2);

                if($row_posisikk_ovd1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_ovd1         = date_create($row_posisikk_ovd1_2['mulai']);
                    $waktuakhir_ovd1        = date_create($row_posisikk_ovd1_2['selesai']);
                }elseif($row_posisikk_ovd1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_ovd1         = date_create($row_posisikk_ovd1_1['mulai']);
                    $waktuakhir_ovd1        = date_create($row_posisikk_ovd1_1['mulai']);
                }else{
                    $waktuawal_ovd1         = date_create($row_posisikk_ovd1_1['mulai']);
                    $waktuakhir_ovd1        = date_create($row_posisikk_ovd1_2['selesai']);
                }

                $diff_ovd1              = date_diff($waktuawal_ovd1, $waktuakhir_ovd1);
            // OVD1

            // OVN1
                $q_posisikk_ovn1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'OVN1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_ovn1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'OVN1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_ovn1_1      = mysqli_fetch_assoc($q_posisikk_ovn1_1);
                $row_posisikk_ovn1_2      = mysqli_fetch_assoc($q_posisikk_ovn1_2);

                if($row_posisikk_ovn1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_ovn1         = date_create($row_posisikk_ovn1_2['mulai']);
                    $waktuakhir_ovn1        = date_create($row_posisikk_ovn1_2['selesai']);
                }elseif($row_posisikk_ovn1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_ovn1         = date_create($row_posisikk_ovn1_1['mulai']);
                    $waktuakhir_ovn1        = date_create($row_posisikk_ovn1_1['mulai']);
                }else{
                    $waktuawal_ovn1         = date_create($row_posisikk_ovn1_1['mulai']);
                    $waktuakhir_ovn1        = date_create($row_posisikk_ovn1_2['selesai']);
                }

                $diff_ovn1              = date_diff($waktuawal_ovn1, $waktuakhir_ovn1);
            // OVN1

            // OVN2
                $q_posisikk_ovn2_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'OVN2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_ovn2_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'OVN2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_ovn2_1      = mysqli_fetch_assoc($q_posisikk_ovn2_1);
                $row_posisikk_ovn2_2      = mysqli_fetch_assoc($q_posisikk_ovn2_2);

                if($row_posisikk_ovn2_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_ovn2         = date_create($row_posisikk_ovn2_2['mulai']);
                    $waktuakhir_ovn2        = date_create($row_posisikk_ovn2_2['selesai']);
                }elseif($row_posisikk_ovn2_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_ovn2         = date_create($row_posisikk_ovn2_1['mulai']);
                    $waktuakhir_ovn2        = date_create($row_posisikk_ovn2_1['mulai']);
                }else{
                    $waktuawal_ovn2         = date_create($row_posisikk_ovn2_1['mulai']);
                    $waktuakhir_ovn2        = date_create($row_posisikk_ovn2_2['selesai']);
                }

                $diff_ovn2              = date_diff($waktuawal_ovn2, $waktuakhir_ovn2);
            // OVN2

            // OVN3
                $q_posisikk_ovn3_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'OVN3'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_ovn3_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'OVN3'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");
                
                $row_posisikk_ovn3_1      = mysqli_fetch_assoc($q_posisikk_ovn3_1);
                $row_posisikk_ovn3_2      = mysqli_fetch_assoc($q_posisikk_ovn3_2);

                if($row_posisikk_ovn3_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_ovn3         = date_create($row_posisikk_ovn3_2['mulai']);
                    $waktuakhir_ovn3        = date_create($row_posisikk_ovn3_2['selesai']);
                }elseif($row_posisikk_ovn3_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_ovn3         = date_create($row_posisikk_ovn3_1['mulai']);
                    $waktuakhir_ovn3        = date_create($row_posisikk_ovn3_1['mulai']);
                }else{
                    $waktuawal_ovn3         = date_create($row_posisikk_ovn3_1['mulai']);
                    $waktuakhir_ovn3        = date_create($row_posisikk_ovn3_2['selesai']);
                }

                $diff_ovn3              = date_diff($waktuawal_ovn3, $waktuakhir_ovn3);
            // OVN3

            // CPT1
                $q_posisikk_cpt1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'CPT1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_cpt1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'CPT1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_cpt1_1      = mysqli_fetch_assoc($q_posisikk_cpt1_1);
                $row_posisikk_cpt1_2      = mysqli_fetch_assoc($q_posisikk_cpt1_2);

                if($row_posisikk_cpt1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_cpt1         = date_create($row_posisikk_cpt1_2['mulai']);
                    $waktuakhir_cpt1        = date_create($row_posisikk_cpt1_2['selesai']);
                }elseif($row_posisikk_cpt1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_cpt1         = date_create($row_posisikk_cpt1_1['mulai']);
                    $waktuakhir_cpt1        = date_create($row_posisikk_cpt1_1['mulai']);
                }else{
                    $waktuawal_cpt1         = date_create($row_posisikk_cpt1_1['mulai']);
                    $waktuakhir_cpt1        = date_create($row_posisikk_cpt1_2['selesai']);
                }

                $diff_cpt1              = date_diff($waktuawal_cpt1, $waktuakhir_cpt1);
            // CPT1

            // FIN1
                $q_posisikk_fin1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'FIN1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_fin1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'FIN1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_fin1_1      = mysqli_fetch_assoc($q_posisikk_fin1_1);
                $row_posisikk_fin1_2      = mysqli_fetch_assoc($q_posisikk_fin1_2);

                if($row_posisikk_fin1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_fin1         = date_create($row_posisikk_fin1_2['mulai']);
                    $waktuakhir_fin1        = date_create($row_posisikk_fin1_2['selesai']);
                }elseif($row_posisikk_fin1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_fin1         = date_create($row_posisikk_fin1_1['mulai']);
                    $waktuakhir_fin1        = date_create($row_posisikk_fin1_1['mulai']);
                }else{
                    $waktuawal_fin1         = date_create($row_posisikk_fin1_1['mulai']);
                    $waktuakhir_fin1        = date_create($row_posisikk_fin1_2['selesai']);
                }

                $diff_fin1              = date_diff($waktuawal_fin1, $waktuakhir_fin1);
            // FIN1

            // FNJ1
                $q_posisikk_fnj1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'FNJ1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_fnj1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'FNJ1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_fnj1_1      = mysqli_fetch_assoc($q_posisikk_fnj1_1);
                $row_posisikk_fnj1_2      = mysqli_fetch_assoc($q_posisikk_fnj1_2);

                if($row_posisikk_fnj1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_fnj1         = date_create($row_posisikk_fnj1_2['mulai']);
                    $waktuakhir_fnj1        = date_create($row_posisikk_fnj1_2['selesai']);
                }elseif($row_posisikk_fnj1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_fnj1         = date_create($row_posisikk_fnj1_1['mulai']);
                    $waktuakhir_fnj1        = date_create($row_posisikk_fnj1_1['mulai']);
                }else{
                    $waktuawal_fnj1         = date_create($row_posisikk_fnj1_1['mulai']);
                    $waktuakhir_fnj1        = date_create($row_posisikk_fnj1_2['selesai']);
                }

                $diff_fnj1              = date_diff($waktuawal_fnj1, $waktuakhir_fnj1);
            // FNJ1

            // STM1
                $q_posisikk_stm1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'STM1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_stm1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'STM1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_stm1_1      = mysqli_fetch_assoc($q_posisikk_stm1_1);
                $row_posisikk_stm1_2      = mysqli_fetch_assoc($q_posisikk_stm1_2);

                if($row_posisikk_stm1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_stm1         = date_create($row_posisikk_stm1_2['mulai']);
                    $waktuakhir_stm1        = date_create($row_posisikk_stm1_2['selesai']);
                }elseif($row_posisikk_stm1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_stm1         = date_create($row_posisikk_stm1_1['mulai']);
                    $waktuakhir_stm1        = date_create($row_posisikk_stm1_1['mulai']);
                }else{
                    $waktuawal_stm1         = date_create($row_posisikk_stm1_1['mulai']);
                    $waktuakhir_stm1        = date_create($row_posisikk_stm1_2['selesai']);
                }

                $diff_stm1              = date_diff($waktuawal_stm1, $waktuakhir_stm1);
            // STM1

            // STM2
                $q_posisikk_stm2_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'STM2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_stm2_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'STM2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_stm2_1      = mysqli_fetch_assoc($q_posisikk_stm2_1);
                $row_posisikk_stm2_2      = mysqli_fetch_assoc($q_posisikk_stm2_2);

                if($row_posisikk_stm2_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_stm2         = date_create($row_posisikk_stm2_2['mulai']);
                    $waktuakhir_stm2        = date_create($row_posisikk_stm2_2['selesai']);
                }elseif($row_posisikk_stm2_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_stm2         = date_create($row_posisikk_stm2_1['mulai']);
                    $waktuakhir_stm2        = date_create($row_posisikk_stm2_1['mulai']);
                }else{
                    $waktuawal_stm2         = date_create($row_posisikk_stm2_1['mulai']);
                    $waktuakhir_stm2        = date_create($row_posisikk_stm2_2['selesai']);
                }

                $diff_stm2              = date_diff($waktuawal_stm2, $waktuakhir_stm2);
            // STM2

            // TDR1
                $q_posisikk_tdr1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'TDR1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_tdr1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'TDR1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_tdr1_1      = mysqli_fetch_assoc($q_posisikk_tdr1_1);
                $row_posisikk_tdr1_2      = mysqli_fetch_assoc($q_posisikk_tdr1_2);

                if($row_posisikk_tdr1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_tdr1         = date_create($row_posisikk_tdr1_2['mulai']);
                    $waktuakhir_tdr1        = date_create($row_posisikk_tdr1_2['selesai']);
                }elseif($row_posisikk_tdr1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_tdr1         = date_create($row_posisikk_tdr1_1['mulai']);
                    $waktuakhir_tdr1        = date_create($row_posisikk_tdr1_1['mulai']);
                }else{
                    $waktuawal_tdr1         = date_create($row_posisikk_tdr1_1['mulai']);
                    $waktuakhir_tdr1        = date_create($row_posisikk_tdr1_2['selesai']);
                }

                $diff_tdr1              = date_diff($waktuawal_tdr1, $waktuakhir_tdr1);
            // TDR1

            // SHR3
                $q_posisikk_shr3_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SHR3'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_shr3_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SHR3'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_shr3_1      = mysqli_fetch_assoc($q_posisikk_shr3_1);
                $row_posisikk_shr3_2      = mysqli_fetch_assoc($q_posisikk_shr3_2);

                if($row_posisikk_shr3_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_shr3         = date_create($row_posisikk_shr3_2['mulai']);
                    $waktuakhir_shr3        = date_create($row_posisikk_shr3_2['selesai']);
                }elseif($row_posisikk_shr3_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_shr3         = date_create($row_posisikk_shr3_1['mulai']);
                    $waktuakhir_shr3        = date_create($row_posisikk_shr3_1['mulai']);
                }else{
                    $waktuawal_shr3         = date_create($row_posisikk_shr3_1['mulai']);
                    $waktuakhir_shr3        = date_create($row_posisikk_shr3_2['selesai']);
                }

                $diff_shr3              = date_diff($waktuawal_shr3, $waktuakhir_shr3);
            // SHR3

            // SHR4
                $q_posisikk_shr4_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SHR4'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_shr4_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SHR4'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_shr4_1      = mysqli_fetch_assoc($q_posisikk_shr4_1);
                $row_posisikk_shr4_2      = mysqli_fetch_assoc($q_posisikk_shr4_2);

                if($row_posisikk_shr4_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_shr4         = date_create($row_posisikk_shr4_2['mulai']);
                    $waktuakhir_shr4        = date_create($row_posisikk_shr4_2['selesai']);
                }elseif($row_posisikk_shr4_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_shr4        = date_create($row_posisikk_shr4_1['mulai']);
                    $waktuakhir_shr4       = date_create($row_posisikk_shr4_1['mulai']);
                }else{
                    $waktuawal_shr4        = date_create($row_posisikk_shr4_1['mulai']);
                    $waktuakhir_shr4       = date_create($row_posisikk_shr4_2['selesai']);
                }

                $diff_shr4              = date_diff($waktuawal_shr4, $waktuakhir_shr4);
            // SHR4

            // SHR5
                $q_posisikk_shr5_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SHR5'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_shr5_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SHR5'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_shr5_1      = mysqli_fetch_assoc($q_posisikk_shr5_1);
                $row_posisikk_shr5_2      = mysqli_fetch_assoc($q_posisikk_shr5_2);

                if($row_posisikk_shr5_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_shr5         = date_create($row_posisikk_shr5_2['mulai']);
                    $waktuakhir_shr5        = date_create($row_posisikk_shr5_2['selesai']);
                }elseif($row_posisikk_shr5_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_shr5         = date_create($row_posisikk_shr5_1['mulai']);
                    $waktuakhir_shr5        = date_create($row_posisikk_shr5_1['selesai']);
                }else{
                    $waktuawal_shr5         = date_create($row_posisikk_shr5_1['mulai']);
                    $waktuakhir_shr5        = date_create($row_posisikk_shr5_2['selesai']);
                }

                $diff_shr5              = date_diff($waktuawal_shr5, $waktuakhir_shr5);
            // SHR5

            // SUE3
                $q_posisikk_sue3_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SUE3'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_sue3_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SUE3'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_sue3_1      = mysqli_fetch_assoc($q_posisikk_sue3_1);
                $row_posisikk_sue3_2      = mysqli_fetch_assoc($q_posisikk_sue3_2);

                if($row_posisikk_sue3_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_sue3         = date_create($row_posisikk_sue3_2['mulai']);
                    $waktuakhir_sue3        = date_create($row_posisikk_sue3_2['selesai']);
                }elseif($row_posisikk_sue3_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_sue3         = date_create($row_posisikk_sue3_1['mulai']);
                    $waktuakhir_sue3        = date_create($row_posisikk_sue3_1['mulai']);
                }else{
                    $waktuawal_sue3         = date_create($row_posisikk_sue3_1['mulai']);
                    $waktuakhir_sue3        = date_create($row_posisikk_sue3_2['selesai']);
                }

                $diff_sue3              = date_diff($waktuawal_sue3, $waktuakhir_sue3);
            // SUE3

            // SUE4
                $q_posisikk_sue4_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SUE4'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_sue4_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SUE4'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_sue4_1      = mysqli_fetch_assoc($q_posisikk_sue4_1);
                $row_posisikk_sue4_2      = mysqli_fetch_assoc($q_posisikk_sue4_2);

                if($row_posisikk_sue4_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_sue4         = date_create($row_posisikk_sue4_2['mulai']);
                    $waktuakhir_sue4        = date_create($row_posisikk_sue4_2['selesai']);
                }elseif($row_posisikk_sue4_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_sue4         = date_create($row_posisikk_sue4_1['mulai']);
                    $waktuakhir_sue4        = date_create($row_posisikk_sue4_1['mulai']);
                }else{
                    $waktuawal_sue4         = date_create($row_posisikk_sue4_1['mulai']);
                    $waktuakhir_sue4        = date_create($row_posisikk_sue4_2['selesai']);
                }

                $diff_sue4              = date_diff($waktuawal_sue4, $waktuakhir_sue4);
            // SUE4

            // FLT1
                $q_posisikk_flt1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'FLT1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_flt1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'FLT1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_flt1_1      = mysqli_fetch_assoc($q_posisikk_flt1_1);
                $row_posisikk_flt1_2      = mysqli_fetch_assoc($q_posisikk_flt1_2);

                if($row_posisikk_flt1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_flt1         = date_create($row_posisikk_flt1_2['mulai']);
                    $waktuakhir_flt1        = date_create($row_posisikk_flt1_2['selesai']);
                }elseif($row_posisikk_flt1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_flt1         = date_create($row_posisikk_flt1_1['mulai']);
                    $waktuakhir_flt1        = date_create($row_posisikk_flt1_1['mulai']);
                }else{
                    $waktuawal_flt1         = date_create($row_posisikk_flt1_1['mulai']);
                    $waktuakhir_flt1        = date_create($row_posisikk_flt1_2['selesai']);
                }

                $diff_flt1              = date_diff($waktuawal_flt1, $waktuakhir_flt1);
            // FLT1

            // INS2
                $q_posisikk_ins2_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'INS2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_ins2_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'INS2'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_ins2_1      = mysqli_fetch_assoc($q_posisikk_ins2_1);
                $row_posisikk_ins2_2      = mysqli_fetch_assoc($q_posisikk_ins2_2);

                if($row_posisikk_ins2_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_ins2         = date_create($row_posisikk_ins2_2['mulai']);
                    $waktuakhir_ins2        = date_create($row_posisikk_ins2_2['selesai']);
                }elseif($row_posisikk_ins2_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_ins2         = date_create($row_posisikk_ins2_1['mulai']);
                    $waktuakhir_ins2        = date_create($row_posisikk_ins2_1['mulai']);
                }else{
                    $waktuawal_ins2         = date_create($row_posisikk_ins2_1['mulai']);
                    $waktuakhir_ins2        = date_create($row_posisikk_ins2_2['selesai']);
                }

                $diff_ins2              = date_diff($waktuawal_ins2, $waktuakhir_ins2);
            // INS2

            // ROT1
                $q_posisikk_rot1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'ROT1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_rot1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'ROT1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_rot1_1      = mysqli_fetch_assoc($q_posisikk_rot1_1);
                $row_posisikk_rot1_2      = mysqli_fetch_assoc($q_posisikk_rot1_2);

                if($row_posisikk_rot1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_rot1         = date_create($row_posisikk_rot1_2['mulai']);
                    $waktuakhir_rot1        = date_create($row_posisikk_rot1_2['selesai']);
                }elseif($row_posisikk_rot1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_rot1         = date_create($row_posisikk_rot1_1['mulai']);
                    $waktuakhir_rot1        = date_create($row_posisikk_rot1_1['mulai']);
                }else{
                    $waktuawal_rot1         = date_create($row_posisikk_rot1_1['mulai']);
                    $waktuakhir_rot1        = date_create($row_posisikk_rot1_2['selesai']);
                }

                $diff_rot1              = date_diff($waktuawal_rot1, $waktuakhir_rot1);
            // ROT1

            // SPT1
                $q_posisikk_spt1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SPT1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_spt1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SPT1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_spt1_1      = mysqli_fetch_assoc($q_posisikk_spt1_1);
                $row_posisikk_spt1_2      = mysqli_fetch_assoc($q_posisikk_spt1_2);

                if($row_posisikk_spt1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_spt1         = date_create($row_posisikk_spt1_2['mulai']);
                    $waktuakhir_spt1        = date_create($row_posisikk_spt1_2['selesai']);
                }elseif($row_posisikk_spt1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_spt1         = date_create($row_posisikk_spt1_1['mulai']);
                    $waktuakhir_spt1        = date_create($row_posisikk_spt1_1['mulai']);
                }else{
                    $waktuawal_spt1         = date_create($row_posisikk_spt1_1['mulai']);
                    $waktuakhir_spt1        = date_create($row_posisikk_spt1_2['selesai']);
                }

                $diff_spt1              = date_diff($waktuawal_spt1, $waktuakhir_spt1);
            // SPT1

            // SUB1
                $q_posisikk_sub1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SUB1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_sub1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'SUB1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");
                
                $row_posisikk_sub1_1      = mysqli_fetch_assoc($q_posisikk_sub1_1);
                $row_posisikk_sub1_2      = mysqli_fetch_assoc($q_posisikk_sub1_2);

                if($row_posisikk_sub1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_sub1         = date_create($row_posisikk_sub1_2['mulai']);
                    $waktuakhir_sub1        = date_create($row_posisikk_sub1_2['selesai']);
                }elseif($row_posisikk_sub1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_sub1         = date_create($row_posisikk_sub1_1['mulai']);
                    $waktuakhir_sub1        = date_create($row_posisikk_sub1_1['mulai']);
                }else{
                    $waktuawal_sub1         = date_create($row_posisikk_sub1_1['mulai']);
                    $waktuakhir_sub1        = date_create($row_posisikk_sub1_2['selesai']);
                }

                $diff_sub1              = date_diff($waktuawal_sub1, $waktuakhir_sub1);
            // SUB1

            // CUR1
                $q_posisikk_cur1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'CUR1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_cur1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'CUR1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_cur1_1      = mysqli_fetch_assoc($q_posisikk_cur1_1);
                $row_posisikk_cur1_2      = mysqli_fetch_assoc($q_posisikk_cur1_2);

                if($row_posisikk_cur1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_cur1         = date_create($row_posisikk_cur1_2['mulai']);
                    $waktuakhir_cur1        = date_create($row_posisikk_cur1_2['selesai']);
                }elseif($row_posisikk_cur1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_cur1         = date_create($row_posisikk_cur1_1['mulai']);
                    $waktuakhir_cur1        = date_create($row_posisikk_cur1_1['mulai']);
                }else{
                    $waktuawal_cur1         = date_create($row_posisikk_cur1_1['mulai']);
                    $waktuakhir_cur1        = date_create($row_posisikk_cur1_2['selesai']);
                }

                $diff_cur1              = date_diff($waktuawal_cur1, $waktuakhir_cur1);
            // CUR1

            // INS3
                $q_posisikk_ins3_1      = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_INS3 WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' ORDER BY MULAI ASC LIMIT 1");                                                           
                $q_posisikk_ins3_2      = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_INS3 WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' ORDER BY MULAI DESC LIMIT 1");  

                $row_posisikk_ins3_1      = db2_fetch_assoc($q_posisikk_ins3_1);
                $row_posisikk_ins3_2      = db2_fetch_assoc($q_posisikk_ins3_2);

                $waktuawal_ins3         = date_create($row_posisikk_ins3_1['MULAI']);
                $waktuakhir_ins3        = date_create($row_posisikk_ins3_2['MULAI']);
                
                $diff_ins3              = date_diff($waktuawal_ins3, $waktuakhir_ins3);
            // INS3

            // QCF4
                $q_posisikk_qcf4_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'QCF4'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_qcf4_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'QCF4'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_qcf4_1      = mysqli_fetch_assoc($q_posisikk_qcf4_1);
                $row_posisikk_qcf4_2      = mysqli_fetch_assoc($q_posisikk_qcf4_2);

                if($row_posisikk_qcf4_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_qcf4         = date_create($row_posisikk_qcf4_2['mulai']);
                    $waktuakhir_qcf4        = date_create($row_posisikk_qcf4_2['selesai']);
                }elseif($row_posisikk_qcf4_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_qcf4         = date_create($row_posisikk_qcf4_1['mulai']);
                    $waktuakhir_qcf4        = date_create($row_posisikk_qcf4_1['mulai']);
                }else{
                    $waktuawal_qcf4         = date_create($row_posisikk_qcf4_1['mulai']);
                    $waktuakhir_qcf4        = date_create($row_posisikk_qcf4_2['selesai']);
                }

                $diff_qcf4              = date_diff($waktuawal_qcf4, $waktuakhir_qcf4);
            // QCF4

            // CNP1
                $q_posisikk_cnp1_1      = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_CNP1 WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' ORDER BY MULAI ASC LIMIT 1");                                                           
                $q_posisikk_cnp1_2      = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISIKK_TGL_IN_PRODORDER_CNP1 WHERE PRODUCTIONORDERCODE = '$rowdb2[NO_KK]' ORDER BY MULAI DESC LIMIT 1");                                                           

                $row_posisikk_cnp1_1      = db2_fetch_assoc($q_posisikk_cnp1_1);
                $row_posisikk_cnp1_2      = db2_fetch_assoc($q_posisikk_cnp1_2);

                $waktuawal_cnp1         = date_create($row_posisikk_cnp1_1['MULAI']);
                $waktuakhir_cnp1        = date_create($row_posisikk_cnp1_2['MULAI']);

                $diff_cnp1              = date_diff($waktuawal_cnp1, $waktuakhir_cnp1);
            // CNP1

            // GKJ1
                $q_posisikk_gkj1_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'GKJ1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_gkj1_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'GKJ1'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_gkj1_1      = mysqli_fetch_assoc($q_posisikk_gkj1_1);
                $row_posisikk_gkj1_2      = mysqli_fetch_assoc($q_posisikk_gkj1_2);

                if($row_posisikk_gkj1_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_gkj1         = date_create($row_posisikk_gkj1_2['mulai']);
                    $waktuakhir_gkj1        = date_create($row_posisikk_gkj1_2['selesai']);
                }elseif($row_posisikk_gkj1_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_gkj1         = date_create($row_posisikk_gkj1_1['mulai']);
                    $waktuakhir_gkj1        = date_create($row_posisikk_gkj1_1['selesai']);
                }else{
                    $waktuawal_gkj1         = date_create($row_posisikk_gkj1_1['mulai']);
                    $waktuakhir_gkj1        = date_create($row_posisikk_gkj1_2['selesai']);
                }

                $diff_gkj1              = date_diff($waktuawal_gkj1, $waktuakhir_gkj1);
            // GKJ1

            // PPC4
                $q_posisikk_ppc4_1        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'PPC4'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber ASC LIMIT 1");

                $q_posisikk_ppc4_2        = mysqli_query($con_nowprd, "SELECT
                                                                            * 
                                                                        FROM
                                                                            `posisikk_cache_leadtime` 
                                                                        WHERE
                                                                            productionorder = '$rowdb2[NO_KK]'
                                                                            AND productiondemand = '$rowdb2[DEMAND]'
                                                                            AND operationcode = 'PPC4'
                                                                            AND ipaddress = '$_SERVER[REMOTE_ADDR]'
                                                                        ORDER BY 
                                                                            stepnumber DESC LIMIT 1");

                $row_posisikk_ppc4_1      = mysqli_fetch_assoc($q_posisikk_ppc4_1);
                $row_posisikk_ppc4_2      = mysqli_fetch_assoc($q_posisikk_ppc4_2);

                if($row_posisikk_ppc4_1['mulai'] == '0000-00-00 00:00:00'){
                    $waktuawal_ppc4         = date_create($row_posisikk_ppc4_2['mulai']);
                    $waktuakhir_ppc4        = date_create($row_posisikk_ppc4_2['selesai']);
                }elseif($row_posisikk_ppc4_2['selesai'] == '0000-00-00 00:00:00'){
                    $waktuawal_ppc4         = date_create($row_posisikk_ppc4_1['mulai']);
                    $waktuakhir_ppc4        = date_create($row_posisikk_ppc4_1['mulai']);
                }else{
                    $waktuawal_ppc4         = date_create($row_posisikk_ppc4_1['mulai']);
                    $waktuakhir_ppc4        = date_create($row_posisikk_ppc4_2['selesai']);
                }

                $diff_ppc4              = date_diff($waktuawal_ppc4, $waktuakhir_ppc4);
            // PPC4

            // Internal Lead Time Adidas & Lead Time Produksi
                $diff_int_leadtime_adidas   = round($diff_dye1->d + $diff_dye1->h / 24 + $diff_dye1->i / 1440, 2) +
                                            round($diff_dye2->d + $diff_dye2->h / 24 + $diff_dye2->i / 1440, 2) +
                                            round($diff_dye3->d + $diff_dye3->h / 24 + $diff_dye3->i / 1440, 2) +
                                            round($diff_dye4->d + $diff_dye4->h / 24 + $diff_dye4->i / 1440, 2) +
                                            round($diff_dye5->d + $diff_dye5->h / 24 + $diff_dye5->i / 1440, 2) +
                                            round($diff_dye6->d + $diff_dye6->h / 24 + $diff_dye6->i / 1440, 2) +
                                            round($diff_sop1->d + $diff_sop1->h / 24 + $diff_sop1->i / 1440, 2) +
                                            round($diff_bld1->d + $diff_bld1->h / 24 + $diff_bld1->i / 1440, 2) +
                                            round($diff_blp1->d + $diff_blp1->h / 24 + $diff_blp1->i / 1440, 2) +
                                            round($diff_opw1->d + $diff_opw1->h / 24 + $diff_opw1->i / 1440, 2) +
                                            round($diff_ovd1->d + $diff_ovd1->h / 24 + $diff_ovd1->i / 1440, 2) +
                                            round($diff_ovn1->d + $diff_ovn1->h / 24 + $diff_ovn1->i / 1440, 2) +
                                            round($diff_ovn2->d + $diff_ovn2->h / 24 + $diff_ovn2->i / 1440, 2) +
                                            round($diff_ovn3->d + $diff_ovn3->h / 24 + $diff_ovn3->i / 1440, 2) +
                                            round($diff_cpt1->d + $diff_cpt1->h / 24 + $diff_cpt1->i / 1440, 2) +
                                            round($diff_fin1->d + $diff_fin1->h / 24 + $diff_fin1->i / 1440, 2) +
                                            round($diff_fnj1->d + $diff_fnj1->h / 24 + $diff_fnj1->i / 1440, 2) +
                                            round($diff_stm1->d + $diff_stm1->h / 24 + $diff_stm1->i / 1440, 2) +
                                            round($diff_stm2->d + $diff_stm2->h / 24 + $diff_stm2->i / 1440, 2) +
                                            round($diff_tdr1->d + $diff_tdr1->h / 24 + $diff_tdr1->i / 1440, 2) +
                                            round($diff_shr3->d + $diff_shr3->h / 24 + $diff_shr3->i / 1440, 2) +
                                            round($diff_shr4->d + $diff_shr4->h / 24 + $diff_shr4->i / 1440, 2) +
                                            round($diff_shr5->d + $diff_shr5->h / 24 + $diff_shr5->i / 1440, 2) +
                                            round($diff_sue3->d + $diff_sue3->h / 24 + $diff_sue3->i / 1440, 2) +
                                            round($diff_sue4->d + $diff_sue4->h / 24 + $diff_sue4->i / 1440, 2) +
                                            round($diff_flt1->d + $diff_flt1->h / 24 + $diff_flt1->i / 1440, 2) +
                                            round($diff_ins2->d + $diff_ins2->h / 24 + $diff_ins2->i / 1440, 2) +
                                            round($diff_rot1->d + $diff_rot1->h / 24 + $diff_rot1->i / 1440, 2) +
                                            round($diff_spt1->d + $diff_spt1->h / 24 + $diff_spt1->i / 1440, 2) +
                                            round($diff_sub1->d + $diff_sub1->h / 24 + $diff_sub1->i / 1440, 2) +
                                            round($diff_cur1->d + $diff_cur1->h / 24 + $diff_cur1->i / 1440, 2) +
                                            round($diff_ins3->d + $diff_ins3->h / 24 + $diff_ins3->i / 1440, 2) +
                                            round($diff_qcf4->d + $diff_qcf4->h / 24 + $diff_qcf4->i / 1440, 2) +
                                            round($diff_cnp1->d + $diff_cnp1->h / 24 + $diff_cnp1->i / 1440, 2) +
                                            round($diff_gkj1->d + $diff_gkj1->h / 24 + $diff_gkj1->i / 1440, 2) +
                                            round($diff_ppc4->d + $diff_ppc4->h / 24 + $diff_ppc4->i / 1440, 2);
            // Internal Lead Time Adidas & Lead Time Produksi
            
            // Internal Lead Time Excluding Testing & TOTAL LEADTIME
                $diff_waktuawal_exluding_testing      = round($diff_bat1->d + $diff_bat1->h / 24 + $diff_bat1->i / 1440, 2) +
                                                        round($diff_bat2->d + $diff_bat2->h / 24 + $diff_bat2->i / 1440, 2) +
                                                        round($diff_bkn1->d + $diff_bkn1->h / 24 + $diff_bkn1->i / 1440, 2) +
                                                        round($diff_sco1->d + $diff_sco1->h / 24 + $diff_sco1->i / 1440, 2) +
                                                        round($diff_rlx1->d + $diff_rlx1->h / 24 + $diff_rlx1->i / 1440, 2) +
                                                        round($diff_cbl1->d + $diff_cbl1->h / 24 + $diff_cbl1->i / 1440, 2) +
                                                        round($diff_mat1->d + $diff_mat1->h / 24 + $diff_mat1->i / 1440, 2) +
                                                        round($diff_pre1->d + $diff_pre1->h / 24 + $diff_pre1->i / 1440, 2) +
                                                        round($diff_rse1->d + $diff_rse1->h / 24 + $diff_rse1->i / 1440, 2) +
                                                        round($diff_rse2->d + $diff_rse2->h / 24 + $diff_rse2->i / 1440, 2) +
                                                        round($diff_shr1->d + $diff_shr1->h / 24 + $diff_shr1->i / 1440, 2) +
                                                        round($diff_shr2->d + $diff_shr2->h / 24 + $diff_shr2->i / 1440, 2) +
                                                        round($diff_sue1->d + $diff_sue1->h / 24 + $diff_sue1->i / 1440, 2) +
                                                        round($diff_sue2->d + $diff_sue2->h / 24 + $diff_sue2->i / 1440, 2) +
                                                        round($diff_dye1->d + $diff_dye1->h / 24 + $diff_dye1->i / 1440, 2) +
                                                        round($diff_dye2->d + $diff_dye2->h / 24 + $diff_dye2->i / 1440, 2) +
                                                        round($diff_dye3->d + $diff_dye3->h / 24 + $diff_dye3->i / 1440, 2) +
                                                        round($diff_dye4->d + $diff_dye4->h / 24 + $diff_dye4->i / 1440, 2) +
                                                        round($diff_dye5->d + $diff_dye5->h / 24 + $diff_dye5->i / 1440, 2) +
                                                        round($diff_dye6->d + $diff_dye6->h / 24 + $diff_dye6->i / 1440, 2) +
                                                        round($diff_sop1->d + $diff_sop1->h / 24 + $diff_sop1->i / 1440, 2) +
                                                        round($diff_bld1->d + $diff_bld1->h / 24 + $diff_bld1->i / 1440, 2) +
                                                        round($diff_blp1->d + $diff_blp1->h / 24 + $diff_blp1->i / 1440, 2) +
                                                        round($diff_opw1->d + $diff_opw1->h / 24 + $diff_opw1->i / 1440, 2) +
                                                        round($diff_ovd1->d + $diff_ovd1->h / 24 + $diff_ovd1->i / 1440, 2) +
                                                        round($diff_ovn1->d + $diff_ovn1->h / 24 + $diff_ovn1->i / 1440, 2) +
                                                        round($diff_ovn2->d + $diff_ovn2->h / 24 + $diff_ovn2->i / 1440, 2) +
                                                        round($diff_ovn3->d + $diff_ovn3->h / 24 + $diff_ovn3->i / 1440, 2) +
                                                        round($diff_cpt1->d + $diff_cpt1->h / 24 + $diff_cpt1->i / 1440, 2) +
                                                        round($diff_fin1->d + $diff_fin1->h / 24 + $diff_fin1->i / 1440, 2) +
                                                        round($diff_fnj1->d + $diff_fnj1->h / 24 + $diff_fnj1->i / 1440, 2) +
                                                        round($diff_stm1->d + $diff_stm1->h / 24 + $diff_stm1->i / 1440, 2) +
                                                        round($diff_stm2->d + $diff_stm2->h / 24 + $diff_stm2->i / 1440, 2) +
                                                        round($diff_tdr1->d + $diff_tdr1->h / 24 + $diff_tdr1->i / 1440, 2) +
                                                        round($diff_shr3->d + $diff_shr3->h / 24 + $diff_shr3->i / 1440, 2) +
                                                        round($diff_shr4->d + $diff_shr4->h / 24 + $diff_shr4->i / 1440, 2) +
                                                        round($diff_shr5->d + $diff_shr5->h / 24 + $diff_shr5->i / 1440, 2) +
                                                        round($diff_sue3->d + $diff_sue3->h / 24 + $diff_sue3->i / 1440, 2) +
                                                        round($diff_sue4->d + $diff_sue4->h / 24 + $diff_sue4->i / 1440, 2) +
                                                        round($diff_flt1->d + $diff_flt1->h / 24 + $diff_flt1->i / 1440, 2) +
                                                        round($diff_ins2->d + $diff_ins2->h / 24 + $diff_ins2->i / 1440, 2) +
                                                        round($diff_rot1->d + $diff_rot1->h / 24 + $diff_rot1->i / 1440, 2) +
                                                        round($diff_spt1->d + $diff_spt1->h / 24 + $diff_spt1->i / 1440, 2) +
                                                        round($diff_sub1->d + $diff_sub1->h / 24 + $diff_sub1->i / 1440, 2) +
                                                        round($diff_cur1->d + $diff_cur1->h / 24 + $diff_cur1->i / 1440, 2) +
                                                        round($diff_ins3->d + $diff_ins3->h / 24 + $diff_ins3->i / 1440, 2) +
                                                        round($diff_qcf4->d + $diff_qcf4->h / 24 + $diff_qcf4->i / 1440, 2) +
                                                        round($diff_cnp1->d + $diff_cnp1->h / 24 + $diff_cnp1->i / 1440, 2) +
                                                        round($diff_gkj1->d + $diff_gkj1->h / 24 + $diff_gkj1->i / 1440, 2) +
                                                        round($diff_ppc4->d + $diff_ppc4->h / 24 + $diff_ppc4->i / 1440, 2);
            // Internal Lead Time Excluding Testing & TOTAL LEADTIME
        ?>
        <tr>
            <td><?= $rowdb2['PELANGGAN']; ?></td> <!-- PELANGGAN -->
            <td><?= $rowdb2['BUYER']; ?></td> <!-- BUYER -->
            <td><?= $rowdb2['NO_ORDER']; ?></td> <!-- NO. ORDER -->
            <td><?= $rowdb2['NO_ITEM']; ?></td> <!-- NO ITEM -->
            <td><?= $rowdb2['KETERANGAN_PRODUCT']; ?></td> <!-- KETERANGAN PRODUCT -->
            <td><?= $rowdb2['WARNA']; ?></td> <!-- WARNA -->
            <td>`<?= $rowdb2['NO_KK']; ?></td> <!-- NO KARTU KERJA -->
            <td><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?= $rowdb2['DEMAND']; ?>&prod_order=<?= $rowdb2['NO_KK']; ?>">`<?= $rowdb2['DEMAND']; ?></a></td> <!-- DEMAND -->
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
                <?= $d_orig_pd_code['ORIGINALPDCODE'] ?>
            </td> <!-- Original PD Code -->
            <td>`<?= $rowdb2['LOT']; ?></td> <!-- LOT -->
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
            <td><?= number_format($rowdb2['NETTO'],0); ?></td> <!-- NETTO-->
            <td>
                <?php 
                    $sql_netto_yd = db2_exec($conn1, "SELECT * FROM ITXVIEW_NETTO WHERE CODE = '$rowdb2[DEMAND]'");
                    $d_netto_yd = db2_fetch_assoc($sql_netto_yd);
                    echo number_format($d_netto_yd['BASESECONDARYQUANTITY'],0);
                ?>
            </td> <!-- LENGTH -->
            <td><?= $row_tglcelupgreige['MULAI']; ?></td> <!-- TGL CELUP GREIGE -->
            <td><?= $row_tglpacking['MULAI']; ?></td> <!-- TGL PACKING -->
            <td><?= $row_tglinspect['MULAI']; ?></td> <!-- TGL INS MEJA -->

            <td><?php echo $diff_int_leadtime_adidas+3 ?></td> <!-- LEAD TIME PRODUKSI -->
            <td><?php echo $diff_int_leadtime_adidas; ?></td> <!-- Internal Lead Time Adidas -->
            <td><?php echo $diff_waktuawal_exluding_testing; ?></td> <!-- Internal Lead Time Excluding Testing -->

            <td><?php echo round($diff_bat1->d + $diff_bat1->h / 24 + $diff_bat1->i / 1440, 2); ?></td> <!-- BAT1 BAGI KAIN -->
            <td><?php echo round($diff_bat2->d + $diff_bat2->h / 24 + $diff_bat2->i / 1440, 2); ?></td> <!-- BAT2 BUKA KAIN -->
            <td><?php echo round($diff_bkn1->d + $diff_bkn1->h / 24 + $diff_bkn1->i / 1440, 2); ?></td> <!-- BKN1 BALIK KAIN -->
            <td><?php echo round($diff_sco1->d + $diff_sco1->h / 24 + $diff_sco1->i / 1440, 2); ?></td> <!-- SCO1 SCOURING -->
            <td><?php echo round($diff_rlx1->d + $diff_rlx1->h / 24 + $diff_rlx1->i / 1440, 2); ?></td> <!-- RLX1 RELAXING -->
            <td><?php echo round($diff_cbl1->d + $diff_cbl1->h / 24 + $diff_cbl1->i / 1440, 2); ?></td> <!-- CBL1 CONTINOUS BLEACING -->
            <td><?php echo round($diff_mat1->d + $diff_mat1->h / 24 + $diff_mat1->i / 1440, 2); ?></td> <!-- MAT1 LAB COLOR MATCH -->
            <td><?php echo round($diff_pre1->d + $diff_pre1->h / 24 + $diff_pre1->i / 1440, 2); ?></td> <!-- PRE1 PRESET -->
            <td><?php echo round($diff_rse1->d + $diff_rse1->h / 24 + $diff_rse1->i / 1440, 2); ?></td> <!-- RSE1 RAISING GREIGE FACE -->
            <td><?php echo round($diff_rse2->d + $diff_rse2->h / 24 + $diff_rse2->i / 1440, 2); ?></td> <!-- RSE2 RAISING GREIGE BACK -->
            <td><?php echo round($diff_shr1->d + $diff_shr1->h / 24 + $diff_shr1->i / 1440, 2); ?></td> <!-- SHR1 SHEARING GREIGE FACE -->
            <td><?php echo round($diff_shr2->d + $diff_shr2->h / 24 + $diff_shr2->i / 1440, 2); ?></td> <!-- SHR2 SHEARING GREIGE BACK -->
            <td><?php echo round($diff_sue1->d + $diff_sue1->h / 24 + $diff_sue1->i / 1440, 2); ?></td> <!-- SUE1 SUEDING GREIGE FACE -->
            <td><?php echo round($diff_sue2->d + $diff_sue2->h / 24 + $diff_sue2->i / 1440, 2); ?></td> <!-- SUE2 SUEDING GREIGE BACK -->
            <td><?php echo round($diff_dye1->d + $diff_dye1->h / 24 + $diff_dye1->i / 1440, 2); ?></td> <!-- DYE1 FABRIC DYEING (WHITE/HEATER) -->
            <td><?php echo round($diff_dye2->d + $diff_dye2->h / 24 + $diff_dye2->i / 1440, 2); ?></td> <!-- DYE2 FABRIC DYEING (POLY) -->
            <td><?php echo round($diff_dye3->d + $diff_dye3->h / 24 + $diff_dye3->i / 1440, 2); ?></td> <!-- DYE3 FABRIC DYEING (CD) -->
            <td><?php echo round($diff_dye4->d + $diff_dye4->h / 24 + $diff_dye4->i / 1440, 2); ?></td> <!-- DYE4 FABRIC DYEING (COTTON/RAYON/TENCEL/MODAL) -->
            <td><?php echo round($diff_dye5->d + $diff_dye5->h / 24 + $diff_dye5->i / 1440, 2); ?></td> <!-- DYE5 FABRIC DYEING (NYLON) -->
            <td><?php echo round($diff_dye6->d + $diff_dye6->h / 24 + $diff_dye6->i / 1440, 2); ?></td> <!-- DYE6 FABRIC DYEING CVC+TC (POLY+COTTON) -->
            <td><?php echo round($diff_sop1->d + $diff_sop1->h / 24 + $diff_sop1->i / 1440, 2); ?></td> <!-- SOP1 SOAPING -->
            <td><?php echo round($diff_bld1->d + $diff_bld1->h / 24 + $diff_bld1->i / 1440, 2); ?></td> <!-- BLD1 BELAH DYEING -->
            <td><?php echo round($diff_blp1->d + $diff_blp1->h / 24 + $diff_blp1->i / 1440, 2); ?></td> <!-- BLP1 BELAH PRESET -->
            <td><?php echo round($diff_opw1->d + $diff_opw1->h / 24 + $diff_opw1->i / 1440, 2); ?></td> <!-- OPW1 BELAH CUCI -->
            <td><?php echo round($diff_ovd1->d + $diff_ovd1->h / 24 + $diff_ovd1->i / 1440, 2); ?></td> <!-- OVD1 OVEN DYEING -->
            <td><?php echo round($diff_ovn1->d + $diff_ovn1->h / 24 + $diff_ovn1->i / 1440, 2); ?></td> <!-- OVN1 OVEN STENTER -->
            <td><?php echo round($diff_ovn2->d + $diff_ovn2->h / 24 + $diff_ovn2->i / 1440, 2); ?></td> <!-- OVN2 OVEN KERING -->
            <td><?php echo round($diff_ovn3->d + $diff_ovn3->h / 24 + $diff_ovn3->i / 1440, 2); ?></td> <!-- OVN3 OVEN TAMBAH OBAT SETELAH PRT -->
            <td><?php echo round($diff_cpt1->d + $diff_cpt1->h / 24 + $diff_cpt1->i / 1440, 2); ?></td> <!-- CPT1 COMPACT -->
            <td><?php echo round($diff_fin1->d + $diff_fin1->h / 24 + $diff_fin1->i / 1440, 2); ?></td> <!-- FIN1 FINISHING 1 -->
            <td><?php echo round($diff_fnj1->d + $diff_fnj1->h / 24 + $diff_fnj1->i / 1440, 2); ?></td> <!-- FNJ1 FINISHING JADI 1 -->
            <td><?php echo round($diff_stm1->d + $diff_stm1->h / 24 + $diff_stm1->i / 1440, 2); ?></td> <!-- STM1 STEAM FINISHING -->
            <td><?php echo round($diff_stm2->d + $diff_stm2->h / 24 + $diff_stm2->i / 1440, 2); ?></td> <!-- STM2 STEAM PRINTING -->
            <td><?php echo round($diff_tdr1->d + $diff_tdr1->h / 24 + $diff_tdr1->i / 1440, 2); ?></td> <!-- TDR1 TUMBLE DRY -->
            <td><?php echo round($diff_shr3->d + $diff_shr3->h / 24 + $diff_shr3->i / 1440, 2); ?></td> <!-- SHR3 SHEARING FINISHED FACE -->
            <td><?php echo round($diff_shr4->d + $diff_shr4->h / 24 + $diff_shr4->i / 1440, 2); ?></td> <!-- SHR4 SHEARING FINISHED BACK -->
            <td><?php echo round($diff_shr5->d + $diff_shr5->h / 24 + $diff_shr5->i / 1440, 2); ?></td> <!-- SHR5 SHEARING FINISHED FACE AFTER PRT -->
            <td><?php echo round($diff_sue3->d + $diff_sue3->h / 24 + $diff_sue3->i / 1440, 2); ?></td> <!-- SUE3 SUEDING FINISHED FACE -->
            <td><?php echo round($diff_sue4->d + $diff_sue4->h / 24 + $diff_sue4->i / 1440, 2); ?></td> <!-- SUE4 SUEDING FINISED BACK -->
            <td><?php echo round($diff_flt1->d + $diff_flt1->h / 24 + $diff_flt1->i / 1440, 2); ?></td> <!-- FLT1 PRINTING FLAT -->
            <td><?php echo round($diff_ins2->d + $diff_ins2->h / 24 + $diff_ins2->i / 1440, 2); ?></td> <!-- INS2 INSPECTION (PRINTING) -->
            <td><?php echo round($diff_rot1->d + $diff_rot1->h / 24 + $diff_rot1->i / 1440, 2); ?></td> <!-- ROT1 PRINTING ROTARY -->
            <td><?php echo round($diff_spt1->d + $diff_spt1->h / 24 + $diff_spt1->i / 1440, 2); ?></td> <!-- SPT1 SOAPING AFTER PRINTING -->
            <td><?php echo round($diff_sub1->d + $diff_sub1->h / 24 + $diff_sub1->i / 1440, 2); ?></td> <!-- SUB1 PRINTING SUBLIM -->
            <td><?php echo round($diff_cur1->d + $diff_cur1->h / 24 + $diff_cur1->i / 1440, 2); ?></td> <!-- CUR1 CURING -->
            <td><?php echo round($diff_ins3->d + $diff_ins3->h / 24 + $diff_ins3->i / 1440, 2); ?></td> <!-- INS3 FINAL INSPECTION -->
            <td><?php echo round($diff_qcf4->d + $diff_qcf4->h / 24 + $diff_qcf4->i / 1440, 2); ?></td> <!-- QCF4 QC FINAL -->
            <td><?php echo round($diff_cnp1->d + $diff_cnp1->h / 24 + $diff_cnp1->i / 1440, 2); ?></td> <!-- CNP1 CUTTING + PACKING -->
            <td><?php echo round($diff_gkj1->d + $diff_gkj1->h / 24 + $diff_gkj1->i / 1440, 2); ?></td> <!-- GKJ1 MUTASI -->
            <td><?php echo round($diff_ppc4->d + $diff_ppc4->h / 24 + $diff_ppc4->i / 1440, 2); ?></td> <!-- PPC4 KK OK -->
            <td><?php echo $diff_waktuawal_exluding_testing+3; ?></td> <!-- TOTAL LEADTIME -->
        </tr>
        <?php } ?>
    </tbody>
</table>