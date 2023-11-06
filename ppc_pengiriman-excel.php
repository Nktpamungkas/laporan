<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Laporan Pengiriman.xls");
    header('Cache-Control: max-age=0');
?>
<table border='1'>
    <thead>
        <?php
            $dateformat = date_create($_GET['tgl1'] ); 
        ?>
        <tr align="center">
            <th colspan="16">LAPORAN HARIAN PENGIRIMAN</th>
        </tr>
        <tr>
            <th colspan="16">
                <?php
                    $date   = $_GET['tgl1'];
                    if($date <= '2023-09-20'){
                        echo "FW-02-PPC-04/02";
                    }else{
                        echo "FW-02-PPC-04/03";
                    }
                ?>
            </th>
        </tr>
        <tr>
            <th colspan="16">BULAN <?= date_format($dateformat,"M Y"); ?></th>
        </tr>
        <tr>
            <th>NO</th>
            <th>TANGGAL</th>
            <th>NO SJ</th>
            <th>WARNA</th>
            <th>ROLL</th>
            <th>QTY KG</th>
            <th>QTY YARD/MTR</th>
            <th>BUYER</th>
            <th>CUSTOMER</th>
            <th>NO PO</th>
            <th>NO ORDER</th>
            <th>JENIS KAIN</th>
            <th>LOTCODE</th>
            <th>DEMAND</th>
            <th>FOC</th>
            <th>TYPE</th>
        </tr>
    </thead>
    <tbody> 
        <?php 
            ini_set("error_reporting", 1);
            session_start();
            require_once "koneksi.php";
            $tgl1     = $_GET['tgl1'];
            $no_order = $_GET['no_order'];

            if($tgl1){
                $where_date     = "i.GOODSISSUEDATE = '$tgl1'";
            }else{
                $where_date     = "";
            }
            if($no_order){
                $where_no_order     = "i.DLVSALORDERLINESALESORDERCODE = '$no_order'";
            }else{
                $where_no_order     = "";
            }
            $codeExport     = "TRIM(i.DEFINITIVECOUNTERCODE) = 'CESDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'CESPROV' OR
                                TRIM(i.DEFINITIVECOUNTERCODE) = 'DREDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'DREPROV' OR 
                                TRIM(i.DEFINITIVECOUNTERCODE) = 'DSEDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'EXDDEF' OR
                                TRIM(i.DEFINITIVECOUNTERCODE) = 'EXDPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'EXPDEF' OR
                                TRIM(i.DEFINITIVECOUNTERCODE) = 'EXPPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'GSEDEF' OR 
                                TRIM(i.DEFINITIVECOUNTERCODE) = 'GSEPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'PSEPROV'";
            $sqlDB2 = "SELECT DISTINCT
                            i.PROVISIONALCODE,
                            TRIM(i.PRICEUNITOFMEASURECODE) AS PRICEUNITOFMEASURECODE,
                            i.DEFINITIVECOUNTERCODE,
                            i.DEFINITIVEDOCUMENTDATE,
                            i.ORDERPARTNERBRANDCODE,
                            CASE
                                WHEN $codeExport THEN '' ELSE i.PO_NUMBER
                            END AS PO_NUMBER,
                            i.PROJECTCODE,
                            DAY(i.GOODSISSUEDATE) ||'-'|| MONTHNAME(i.GOODSISSUEDATE) ||'-'|| YEAR(i.GOODSISSUEDATE) AS GOODSISSUEDATE,
                            i.ORDPRNCUSTOMERSUPPLIERCODE,
                            i.PAYMENTMETHODCODE,   
                            i.ITEMTYPEAFICODE,
                            CASE
                                WHEN $codeExport THEN '' ELSE i.DLVSALORDERLINESALESORDERCODE
                            END AS DLVSALORDERLINESALESORDERCODE,
                            CASE
                                WHEN $codeExport THEN 0 ELSE i.DLVSALESORDERLINEORDERLINE
                            END AS DLVSALESORDERLINEORDERLINE,
                            CASE
                                WHEN $codeExport THEN '' ELSE 
                                    TRIM(i.SUBCODE01) || '-' || TRIM(i.SUBCODE02) || '-' || TRIM(i.SUBCODE03) || '-' || TRIM(i.SUBCODE04) || '-' ||
                                    TRIM(i.SUBCODE05) || '-' || TRIM(i.SUBCODE06) || '-' || TRIM(i.SUBCODE07) || '-' || TRIM(i.SUBCODE08)
                            END AS ITEMDESCRIPTION,
                            CASE
                                WHEN $codeExport THEN '' ELSE iasp.LOTCODE
                            END AS LOTCODE,
                            CASE
                                WHEN $codeExport THEN '' ELSE i2.WARNA
                            END AS WARNA,
                            i.LEGALNAME1,
                            CASE
                                WHEN $codeExport THEN 'EXPORT' ELSE i.CODE
                            END AS CODE
                        FROM 
                            ITXVIEW_SURATJALAN_PPC_FOR_POSELESAI i
                        LEFT JOIN ITXVIEW_ALLOCATION_SURATJALAN_PPC iasp ON iasp.CODE = i.CODE
                        LEFT JOIN ITXVIEWCOLOR i2 ON i2.ITEMTYPECODE =  i.ITEMTYPEAFICODE
                                                AND i2.SUBCODE01 = i.SUBCODE01 AND i2.SUBCODE02 = i.SUBCODE02
                                                AND i2.SUBCODE03 = i.SUBCODE03 AND i2.SUBCODE04 = i.SUBCODE04
                                                AND i2.SUBCODE05 = i.SUBCODE05 AND i2.SUBCODE06 = i.SUBCODE06
                                                AND i2.SUBCODE07 = i.SUBCODE07 AND i2.SUBCODE08 = i.SUBCODE08
                                                AND i2.SUBCODE09 = i.SUBCODE09 AND i2.SUBCODE10 = i.SUBCODE10
                        WHERE 
                            $where_no_order $where_date 
                            AND i.DOCUMENTTYPETYPE = 05 
                            AND NOT i.CODE IS NULL 
                            AND i.PROGRESSSTATUS_SALDOC = 2
                        GROUP BY
                            i.PROVISIONALCODE,
                            i.PRICEUNITOFMEASURECODE,
                            i.DEFINITIVEDOCUMENTDATE,
                            i.ORDERPARTNERBRANDCODE,
                            i.PO_NUMBER,
                            i.PROJECTCODE,
                            i.GOODSISSUEDATE,
                            i.ORDPRNCUSTOMERSUPPLIERCODE,
                            i.PAYMENTMETHODCODE,
                            i.PO_NUMBER,    
                            i.ITEMTYPEAFICODE,
                            i.DLVSALORDERLINESALESORDERCODE,
                            i.DLVSALESORDERLINEORDERLINE,
                            i.ITEMDESCRIPTION,
                            iasp.LOTCODE,
                            i.DEFINITIVECOUNTERCODE,
                            i2.WARNA,
                            i.LEGALNAME1,
                            i.CODE,
                            i.SUBCODE01,
                            i.SUBCODE02,
                            i.SUBCODE03,
                            i.SUBCODE04,
                            i.SUBCODE05,
                            i.SUBCODE06,
                            i.SUBCODE07,
                            i.SUBCODE08,
                            i.SUBCODE09,
                            i.SUBCODE10
                        ORDER BY 
                            i.PROVISIONALCODE ASC";
            $stmt   = db2_exec($conn1,$sqlDB2);
            $no = 1;
            while ($rowdb2 = db2_fetch_assoc($stmt)) {
        ?>
        <?php
            $q_ket_foc  = db2_exec($conn1, "SELECT 
                                                COUNT(QUALITYREASONCODE) AS ROLL,
                                                SUM(FOC_KG) AS KG,
                                                SUM(FOC_YARDMETER) AS YARD_MTR,
                                                KET_YARDMETER
                                            FROM
                                                ITXVIEW_SURATJALAN_EXIM2A
                                            WHERE 
                                                QUALITYREASONCODE = 'FOC'
                                                AND PROVISIONALCODE = '$rowdb2[PROVISIONALCODE]'
                                            GROUP BY 
                                                KET_YARDMETER");
            $d_ket_foc  = db2_fetch_assoc($q_ket_foc);
        ?>
        <?php if($d_ket_foc['ROLL'] > 0 AND $d_ket_foc['KG'] > 0 AND $d_ket_foc['YARD_MTR'] > 0) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $rowdb2['GOODSISSUEDATE']; ?></td> 
                <td><?= $rowdb2['PROVISIONALCODE']; ?></td> 
                <td><?= $rowdb2['WARNA']; ?></td> 
                <td><?= $d_ket_foc['ROLL']; ?></td> 
                <td><?= number_format($d_ket_foc['KG'], 2); ?></td> 
                <td><?= number_format($d_ket_foc['YARD_MTR'], 2); ?></td> 
                <td><?= $rowdb2['ORDERPARTNERBRANDCODE']; ?></td> 
                <td>
                    <?php
                        $q_roll     = db2_exec($conn1, "SELECT
                                                            COUNT(ise.COUNTROLL) AS ROLL,
                                                            SUM(ise.QTY_KG) AS QTY_SJ_KG,
                                                            SUM(ise.QTY_YARDMETER) AS QTY_SJ_YARD,
                                                            inpe.PROJECT,
                                                            ise.ADDRESSEE,
                                                            ise.BRAND_NM
                                                        FROM
                                                            ITXVIEW_SURATJALAN_EXIM2A ise 
                                                        LEFT JOIN ITXVIEW_NO_PROJECTS_EXIM inpe ON inpe.PROVISIONALCODE = ise.PROVISIONALCODE 
                                                        WHERE 
                                                            ise.PROVISIONALCODE = '$rowdb2[PROVISIONALCODE]'
                                                        GROUP BY 
                                                            inpe.PROJECT,ise.ADDRESSEE,ise.BRAND_NM");
                        $d_roll     = db2_fetch_assoc($q_roll);
                        $q_pelanggan    = db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$rowdb2[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                            AND CODE = '$rowdb2[DLVSALORDERLINESALESORDERCODE]'");
                        $r_pelanggan    = db2_fetch_assoc($q_pelanggan);
                        if($rowdb2['CODE'] == 'EXPORT'){
                            echo $d_roll['ADDRESSEE'].' - '.$d_roll['BRAND_NM'];
                        }else{
                            echo $r_pelanggan['LANGGANAN'];

                        }
                    ?>
                </td> 
                <td>`<?= $rowdb2['PO_NUMBER']; ?></td> 
                <td>
                    <?php
                        if($rowdb2['CODE'] == 'EXPORT'){
                            echo $d_roll['PROJECT'];
                        }else{
                            echo $rowdb2['DLVSALORDERLINESALESORDERCODE'];
                        }
                    ?>
                </td> 
                <td><?= $rowdb2['ITEMDESCRIPTION']; ?></td> 
                <td>`<?= $rowdb2['LOTCODE']; ?></td> 
                <td>
                    <?php
                        $q_demand   = db2_exec($conn1, "SELECT 
                                                            PRODUCTIONDEMANDCODE
                                                        FROM 
                                                            ITXVIEW_DEMANDBYLOTCODE 
                                                        WHERE 
                                                            PRODUCTIONORDERCODE = '$rowdb2[LOTCODE]'
                                                            AND DLVSALESORDERLINEORDERLINE = '$rowdb2[DLVSALESORDERLINEORDERLINE]'");
                        $d_demand   = db2_fetch_assoc($q_demand);
                    ?>
                    <?= $d_demand['PRODUCTIONDEMANDCODE']; ?>
                </td> 
                <td>FOC</td> 
                <td><?= $rowdb2['ITEMTYPEAFICODE']; ?></td> 
            </tr>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $rowdb2['GOODSISSUEDATE']; ?></td> 
                <td><?= $rowdb2['PROVISIONALCODE']; ?></td> 
                <td><?= $rowdb2['WARNA']; ?></td> 
                <td>
                    <?php
                        if($rowdb2['CODE'] == 'EXPORT'){
                            $q_roll     = db2_exec($conn1, "SELECT
                                                                COUNT(ise.COUNTROLL) AS ROLL,
                                                                SUM(ise.QTY_KG) AS QTY_SJ_KG,
                                                                SUM(ise.QTY_YARDMETER) AS QTY_SJ_YARD,
                                                                inpe.PROJECT,
                                                                ise.ADDRESSEE,
                                                                ise.BRAND_NM
                                                            FROM
                                                                ITXVIEW_SURATJALAN_EXIM2A ise 
                                                            LEFT JOIN ITXVIEW_NO_PROJECTS_EXIM inpe ON inpe.PROVISIONALCODE = ise.PROVISIONALCODE 
                                                            WHERE 
                                                                ise.PROVISIONALCODE = '$rowdb2[PROVISIONALCODE]'
                                                            GROUP BY 
                                                                inpe.PROJECT,ise.ADDRESSEE,ise.BRAND_NM");
                            $d_roll     = db2_fetch_assoc($q_roll);
                            if($d_ket_foc['KG'] != 0) { // MENGHITUNG JIKA FOC SEBAGIAN, MAKA ROLL UNTUK FOC DIPISAH DARI KESELURUHAN
                                echo $d_roll['ROLL'] - $d_ket_foc['ROLL'];
                            }else{
                                echo $d_roll['ROLL'];
                            }
                        }else{
                            $q_roll     = db2_exec($conn1, "SELECT COUNT(CODE) AS ROLL,
                                                                    SUM(BASEPRIMARYQUANTITY) AS QTY_SJ_KG,
                                                                    SUM(BASESECONDARYQUANTITY) AS QTY_SJ_YARD,
                                                                    LOTCODE
                                                            FROM 
                                                                ITXVIEWALLOCATION0 
                                                            WHERE 
                                                                CODE = '$rowdb2[CODE]' AND LOTCODE = '$rowdb2[LOTCODE]'
                                                            GROUP BY 
                                                                LOTCODE");
                            $d_roll     = db2_fetch_assoc($q_roll);
                            echo $d_roll['ROLL'];
                        }
                    ?>
                </td> 
                <td><?= number_format($d_roll['QTY_SJ_KG'], 2); ?></td> 
                <td>
                    <?php 
                        if($rowdb2['PRICEUNITOFMEASURECODE'] == 'm'){
                            echo round(number_format($d_roll['QTY_SJ_YARD'], 2) * 0.9144, 2);
                        }else{
                            echo number_format($d_roll['QTY_SJ_YARD'], 2);
                        }
                    ?>
                </td> 
                <td><?= $rowdb2['ORDERPARTNERBRANDCODE']; ?></td> 
                <td>
                    <?php
                        $q_pelanggan    = db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$rowdb2[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                            AND CODE = '$rowdb2[DLVSALORDERLINESALESORDERCODE]'");
                        $r_pelanggan    = db2_fetch_assoc($q_pelanggan);
                        if($rowdb2['CODE'] == 'EXPORT'){
                            echo $d_roll['ADDRESSEE'].' - '.$d_roll['BRAND_NM'];
                        }else{
                            echo $r_pelanggan['LANGGANAN'];

                        }
                    ?>
                </td> 
                <td>`<?= $rowdb2['PO_NUMBER']; ?></td> 
                <td>
                    <?php
                        if($rowdb2['CODE'] == 'EXPORT'){
                            echo $d_roll['PROJECT'];
                        }else{
                            echo $rowdb2['DLVSALORDERLINESALESORDERCODE'];
                        }
                    ?>
                </td> 
                <td><?= $rowdb2['ITEMDESCRIPTION']; ?></td> 
                <td>`<?= $rowdb2['LOTCODE']; ?></td> 
                <td>
                    <?php
                        $q_demand   = db2_exec($conn1, "SELECT 
                                                            PRODUCTIONDEMANDCODE
                                                        FROM 
                                                            ITXVIEW_DEMANDBYLOTCODE 
                                                        WHERE 
                                                            PRODUCTIONORDERCODE = '$rowdb2[LOTCODE]'
                                                            AND DLVSALESORDERLINEORDERLINE = '$rowdb2[DLVSALESORDERLINEORDERLINE]'");
                        $d_demand   = db2_fetch_assoc($q_demand);
                    ?>
                    <?= $d_demand['PRODUCTIONDEMANDCODE']; ?>
                </td> 
                <td><?php if($rowdb2['PAYMENTMETHODCODE'] == 'FOC'){ echo $rowdb2['PAYMENTMETHODCODE']; } ?></td> 
                <td><?= $rowdb2['ITEMTYPEAFICODE']; ?></td> 
            </tr>
        <?php else : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $rowdb2['GOODSISSUEDATE']; ?></td> 
                <td><?= $rowdb2['PROVISIONALCODE']; ?></td> 
                <td><?= $rowdb2['WARNA']; ?></td> 
                <td>
                    <?php
                        if($rowdb2['CODE'] == 'EXPORT'){
                            $q_roll     = db2_exec($conn1, "SELECT
                                                                ise.ITEMTYPEAFICODE,
                                                                COUNT(ise.COUNTROLL) AS ROLL,
                                                                SUM(ise.QTY_KG) AS QTY_SJ_KG,
                                                                SUM(ise.QTY_YARDMETER) AS QTY_SJ_YARD,
                                                                inpe.PROJECT,
                                                                ise.ADDRESSEE,
                                                                ise.BRAND_NM
                                                            FROM
                                                                ITXVIEW_SURATJALAN_EXIM2A ise 
                                                            LEFT JOIN ITXVIEW_NO_PROJECTS_EXIM inpe ON inpe.PROVISIONALCODE = ise.PROVISIONALCODE 
                                                            WHERE 
                                                                ise.PROVISIONALCODE = '$rowdb2[PROVISIONALCODE]' AND ise.ITEMTYPEAFICODE = '$rowdb2[ITEMTYPEAFICODE]'
                                                            GROUP BY 
                                                                ise.ITEMTYPEAFICODE,
                                                                inpe.PROJECT,
                                                                ise.ADDRESSEE,
                                                                ise.BRAND_NM");
                            $d_roll     = db2_fetch_assoc($q_roll);
                            if($d_ket_foc['ROLL'] > 0 AND $d_ket_foc['KG'] > 0 AND $d_ket_foc['YARD_MTR'] > 0) { // MENGHITUNG JIKA FOC SEBAGIAN, MAKA ROLL UNTUK FOC DIPISAH DARI KESELURUHAN
                                echo $d_roll['ROLL'] - $d_ket_foc['ROLL'];
                            }else{
                                echo $d_roll['ROLL'];
                            }
                        }else{
                            $q_roll     = db2_exec($conn1, "SELECT COUNT(CODE) AS ROLL,
                                                                    SUM(BASEPRIMARYQUANTITY) AS QTY_SJ_KG,
                                                                    SUM(BASESECONDARYQUANTITY) AS QTY_SJ_YARD,
                                                                    LOTCODE
                                                            FROM 
                                                                ITXVIEWALLOCATION0 
                                                            WHERE 
                                                                CODE = '$rowdb2[CODE]' AND LOTCODE = '$rowdb2[LOTCODE]'
                                                            GROUP BY 
                                                                LOTCODE");
                            $d_roll     = db2_fetch_assoc($q_roll);
                            echo $d_roll['ROLL'];
                        }
                    ?>
                </td> 
                <td><?= number_format($d_roll['QTY_SJ_KG'], 2); ?></td> 
                <td>
                    <?php 
                        if($rowdb2['PRICEUNITOFMEASURECODE'] == 'm'){
                            echo round(number_format($d_roll['QTY_SJ_YARD'], 2) * 0.9144, 2);
                        }else{
                            echo number_format($d_roll['QTY_SJ_YARD'], 2);
                        }
                    ?>
                </td> 
                <td><?= $rowdb2['ORDERPARTNERBRANDCODE']; ?></td> 
                <td>
                    <?php
                        $q_pelanggan    = db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$rowdb2[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                            AND CODE = '$rowdb2[DLVSALORDERLINESALESORDERCODE]'");
                        $r_pelanggan    = db2_fetch_assoc($q_pelanggan);
                        if($rowdb2['CODE'] == 'EXPORT'){
                            echo $d_roll['ADDRESSEE'].' - '.$d_roll['BRAND_NM'];
                        }else{
                            echo $r_pelanggan['LANGGANAN'];

                        }
                    ?>
                </td> 
                <td>`<?= $rowdb2['PO_NUMBER']; ?></td> 
                <td>
                    <?php
                        if($rowdb2['CODE'] == 'EXPORT'){
                            echo $d_roll['PROJECT'];
                        }else{
                            echo $rowdb2['DLVSALORDERLINESALESORDERCODE'];
                        }
                    ?>
                </td> 
                <td><?= $rowdb2['ITEMDESCRIPTION']; ?></td> 
                <td>`<?= $rowdb2['LOTCODE']; ?></td> 
                <td>
                    <?php
                        $q_demand   = db2_exec($conn1, "SELECT 
                                                            PRODUCTIONDEMANDCODE
                                                        FROM 
                                                            ITXVIEW_DEMANDBYLOTCODE 
                                                        WHERE 
                                                            PRODUCTIONORDERCODE = '$rowdb2[LOTCODE]'
                                                            AND DLVSALESORDERLINEORDERLINE = '$rowdb2[DLVSALESORDERLINEORDERLINE]'");
                        $d_demand   = db2_fetch_assoc($q_demand);
                    ?>
                    <?= $d_demand['PRODUCTIONDEMANDCODE']; ?>
                </td> 
                <td><?php if($rowdb2['PAYMENTMETHODCODE'] == 'FOC'){ echo $rowdb2['PAYMENTMETHODCODE']; } ?></td> 
                <td><?= $rowdb2['ITEMTYPEAFICODE']; ?></td> 
            </tr>
        <?php endif; ?>
        <?php } ?>
    </tbody>
    <tfoot>
        <?php
        // ROLL TANGGAL HARI 
            $q_roll_harian     = "SELECT DISTINCT
                                    TRIM(i.PROVISIONALCODE) AS PROVISIONALCODE,
                                    CASE
                                        WHEN TRIM(i.DEFINITIVECOUNTERCODE) = 'CESDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'CESPROV' OR
                                            TRIM(i.DEFINITIVECOUNTERCODE) = 'DREDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'DREPROV' OR 
                                            TRIM(i.DEFINITIVECOUNTERCODE) = 'DSEDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'EXDDEF' OR
                                            TRIM(i.DEFINITIVECOUNTERCODE) = 'EXDPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'EXPDEF' OR
                                            TRIM(i.DEFINITIVECOUNTERCODE) = 'EXPPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'GSEDEF' OR 
                                            TRIM(i.DEFINITIVECOUNTERCODE) = 'GSEPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'PSEPROV' THEN 'EXPORT' 
                                        ELSE TRIM(i.CODE)
                                    END AS CODE
                                FROM 
                                    ITXVIEW_SURATJALAN_PPC_FOR_POSELESAI i
                                LEFT JOIN ITXVIEW_ALLOCATION_SURATJALAN_PPC iasp ON iasp.CODE = i.CODE
                                LEFT JOIN ITXVIEWCOLOR i2 ON i2.ITEMTYPECODE =  i.ITEMTYPEAFICODE
                                                        AND i2.SUBCODE01 = i.SUBCODE01 AND i2.SUBCODE02 = i.SUBCODE02
                                                        AND i2.SUBCODE03 = i.SUBCODE03 AND i2.SUBCODE04 = i.SUBCODE04
                                                        AND i2.SUBCODE05 = i.SUBCODE05 AND i2.SUBCODE06 = i.SUBCODE06
                                                        AND i2.SUBCODE07 = i.SUBCODE07 AND i2.SUBCODE08 = i.SUBCODE08
                                                        AND i2.SUBCODE09 = i.SUBCODE09 AND i2.SUBCODE10 = i.SUBCODE10
                                WHERE 
                                    i.GOODSISSUEDATE = '$_GET[tgl1]' AND i.DOCUMENTTYPETYPE = 05 AND NOT i.CODE IS NULL AND i.PROGRESSSTATUS_SALDOC = 2
                                GROUP BY
                                    i.PROVISIONALCODE,
                                    i.DEFINITIVECOUNTERCODE,
                                    i.CODE";
            $db2_roll_harian_local    = db2_exec($conn1, $q_roll_harian);
            $db2_roll_harian_export   = db2_exec($conn1, $q_roll_harian);

            // LOCAL
                while ($row_roll_harian_code_local     = db2_fetch_assoc($db2_roll_harian_local)) {
                    if($row_roll_harian_code_local['CODE'] != 'EXPORT'){
                        $r_roll_harian_code_local[]        = "'" .$row_roll_harian_code_local['CODE']. "'";
                    }
                }
                if($r_roll_harian_code_local){
                    $value_roll_harian_code_local     = implode(',', $r_roll_harian_code_local);
                    $data_roll_harian_code_local      = db2_exec($conn1, "SELECT COUNT(CODE) AS ROLL,
                                                                                SUM(BASEPRIMARYQUANTITY) AS QTY_SJ_KG,
                                                                                SUM(BASESECONDARYQUANTITY) AS QTY_SJ_YARD
                                                                        FROM 
                                                                            ITXVIEWALLOCATION0 
                                                                        WHERE 
                                                                            CODE IN ($value_roll_harian_code_local)");
                    $fetch_roll_harian_local  = db2_fetch_assoc($data_roll_harian_code_local);
                }
            // LOCAL

            // EXPORT
                while ($row_roll_harian_code_export     = db2_fetch_assoc($db2_roll_harian_export)) {
                    if($row_roll_harian_code_export['CODE'] == 'EXPORT'){
                        $r_roll_harian_code_export[]        = "'" .$row_roll_harian_code_export['PROVISIONALCODE']. "'";
                    }
                }
                if(!empty($r_roll_harian_code_export)){
                    $value_roll_harian_code_export     = implode(',', $r_roll_harian_code_export);
                    $data_roll_harian_code_export      = db2_exec($conn1, "SELECT COUNT(ise.COUNTROLL) AS ROLL,
                                                                                SUM(ise.QTY_KG) AS QTY_SJ_KG,
                                                                                SUM(ise.QTY_YARDMETER) AS QTY_SJ_YARD
                                                                            FROM
                                                                                ITXVIEW_SURATJALAN_EXIM2A ise 
                                                                            LEFT JOIN ITXVIEW_NO_PROJECTS_EXIM inpe ON inpe.PROVISIONALCODE = ise.PROVISIONALCODE 
                                                                            WHERE 
                                                                                ise.PROVISIONALCODE IN ($value_roll_harian_code_export)");
                    $fetch_roll_harian_export  = db2_fetch_assoc($data_roll_harian_code_export);
                }
            // EXPORT
        // ROLL TANGGAL HARI
        
        // ROLL TANGGAL HARI -1
            $tgl1_kurang = $_GET['tgl1'];// pendefinisian tanggal awal
            if(substr($tgl1_kurang, 8, 2) != '01'){
                $tgl2_kurang = date('Y-m-d', strtotime('-1 days', strtotime($tgl1_kurang))); //operasi pengurangan tanggal sebanyak 1 hari
            }else{
                $tgl2_kurang = substr($_GET['tgl1'], 0,8).'01'; // operasi pengurang tidak dikurangi jika tanggal 01 disetiap bulan
            }

            $awal_bulan = substr($_GET['tgl1'], 0,8).'01';

            $q_roll_harian_1     = "SELECT DISTINCT
                                            TRIM(i.PROVISIONALCODE) AS PROVISIONALCODE,
                                            CASE
                                                WHEN TRIM(i.DEFINITIVECOUNTERCODE) = 'CESDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'CESPROV' OR
                                                    TRIM(i.DEFINITIVECOUNTERCODE) = 'DREDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'DREPROV' OR 
                                                    TRIM(i.DEFINITIVECOUNTERCODE) = 'DSEDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'EXDDEF' OR
                                                    TRIM(i.DEFINITIVECOUNTERCODE) = 'EXDPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'EXPDEF' OR
                                                    TRIM(i.DEFINITIVECOUNTERCODE) = 'EXPPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'GSEDEF' OR 
                                                    TRIM(i.DEFINITIVECOUNTERCODE) = 'GSEPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'PSEPROV' THEN 'EXPORT' 
                                                ELSE TRIM(i.CODE)
                                            END AS CODE
                                        FROM 
                                            ITXVIEW_SURATJALAN_PPC_FOR_POSELESAI i
                                        LEFT JOIN ITXVIEW_ALLOCATION_SURATJALAN_PPC iasp ON iasp.CODE = i.CODE
                                        LEFT JOIN ITXVIEWCOLOR i2 ON i2.ITEMTYPECODE =  i.ITEMTYPEAFICODE
                                                                AND i2.SUBCODE01 = i.SUBCODE01 AND i2.SUBCODE02 = i.SUBCODE02
                                                                AND i2.SUBCODE03 = i.SUBCODE03 AND i2.SUBCODE04 = i.SUBCODE04
                                                                AND i2.SUBCODE05 = i.SUBCODE05 AND i2.SUBCODE06 = i.SUBCODE06
                                                                AND i2.SUBCODE07 = i.SUBCODE07 AND i2.SUBCODE08 = i.SUBCODE08
                                                                AND i2.SUBCODE09 = i.SUBCODE09 AND i2.SUBCODE10 = i.SUBCODE10
                                        WHERE 
                                            i.GOODSISSUEDATE BETWEEN '$awal_bulan' AND '$tgl2_kurang' AND i.DOCUMENTTYPETYPE = 05 AND NOT i.CODE IS NULL AND i.PROGRESSSTATUS_SALDOC = 2
                                        GROUP BY
                                            i.PROVISIONALCODE,
                                            i.DEFINITIVECOUNTERCODE,
                                            i.CODE";
            $db2_roll_harian_local_1    = db2_exec($conn1, $q_roll_harian_1);
            $db2_roll_harian_export_1   = db2_exec($conn1, $q_roll_harian_1);

            // LOCAL
                while ($row_roll_harian_code_local_1     = db2_fetch_assoc($db2_roll_harian_local_1)) {
                    if($row_roll_harian_code_local_1['CODE'] != 'EXPORT'){
                        $r_roll_harian_code_local_1[]        = "'" .$row_roll_harian_code_local_1['CODE']. "'";
                    }
                }
                if($r_roll_harian_code_local_1){
                    $value_roll_harian_code_local_1     = implode(',', $r_roll_harian_code_local_1);
                    $data_roll_harian_code_local_1      = db2_exec($conn1, "SELECT COUNT(CODE) AS ROLL,
                                                                                SUM(BASEPRIMARYQUANTITY) AS QTY_SJ_KG,
                                                                                SUM(BASESECONDARYQUANTITY) AS QTY_SJ_YARD
                                                                        FROM 
                                                                            ITXVIEWALLOCATION0 
                                                                        WHERE 
                                                                            CODE IN ($value_roll_harian_code_local_1)");
                    $fetch_roll_harian_local_1  = db2_fetch_assoc($data_roll_harian_code_local_1);
                }
            // LOCAL

            // EXPORT
                while ($row_roll_harian_code_export_1     = db2_fetch_assoc($db2_roll_harian_export_1)) {
                    if($row_roll_harian_code_export_1['CODE'] == 'EXPORT'){
                        $r_roll_harian_code_export_1[]        = "'" .$row_roll_harian_code_export_1['PROVISIONALCODE']. "'";
                    }
                }
                if($r_roll_harian_code_export_1){
                    $value_roll_harian_code_export_1     = implode(',', $r_roll_harian_code_export_1);
                    $data_roll_harian_code_export_1      = db2_exec($conn1, "SELECT COUNT(ise.COUNTROLL) AS ROLL,
                                                                                SUM(ise.QTY_KG) AS QTY_SJ_KG,
                                                                                SUM(ise.QTY_YARDMETER) AS QTY_SJ_YARD
                                                                            FROM
                                                                                ITXVIEW_SURATJALAN_EXIM2A ise 
                                                                            LEFT JOIN ITXVIEW_NO_PROJECTS_EXIM inpe ON inpe.PROVISIONALCODE = ise.PROVISIONALCODE 
                                                                            WHERE 
                                                                                ise.PROVISIONALCODE IN ($value_roll_harian_code_export_1)");
                    $fetch_roll_harian_export_1  = db2_fetch_assoc($data_roll_harian_code_export_1);
                }
            // EXPORT
        // ROLL TANGGAL HARI -1
        
        // ROLL TANGGAL HARI sd hari H
            $tgl1_hariH = $_GET['tgl1'];// pendefinisian tanggal awal

            if(substr($tgl1_kurang, 8, 2) != '01'){
                $tgl2_hariH = date('Y-m-d', strtotime('+1 days', strtotime($tgl1_hariH))); //operasi pengurangan tanggal sebanyak 1 hari
            }else{
                $tgl2_hariH = substr($_GET['tgl1'], 0,8).'01'; // operasi pengurang tidak dikurangi jika tanggal 01 disetiap bulan
            }
            $awal_bulan_hariH = substr($_GET['tgl1'], 0,8).'01';


            $q_roll_harian_hariH     = "SELECT DISTINCT
                                    TRIM(i.PROVISIONALCODE) AS PROVISIONALCODE,
                                    CASE
                                        WHEN TRIM(i.DEFINITIVECOUNTERCODE) = 'CESDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'CESPROV' OR
                                            TRIM(i.DEFINITIVECOUNTERCODE) = 'DREDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'DREPROV' OR 
                                            TRIM(i.DEFINITIVECOUNTERCODE) = 'DSEDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'EXDDEF' OR
                                            TRIM(i.DEFINITIVECOUNTERCODE) = 'EXDPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'EXPDEF' OR
                                            TRIM(i.DEFINITIVECOUNTERCODE) = 'EXPPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'GSEDEF' OR 
                                            TRIM(i.DEFINITIVECOUNTERCODE) = 'GSEPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'PSEPROV' THEN 'EXPORT' 
                                        ELSE TRIM(i.CODE)
                                    END AS CODE
                                FROM 
                                    ITXVIEW_SURATJALAN_PPC_FOR_POSELESAI i
                                LEFT JOIN ITXVIEW_ALLOCATION_SURATJALAN_PPC iasp ON iasp.CODE = i.CODE
                                LEFT JOIN ITXVIEWCOLOR i2 ON i2.ITEMTYPECODE =  i.ITEMTYPEAFICODE
                                                        AND i2.SUBCODE01 = i.SUBCODE01 AND i2.SUBCODE02 = i.SUBCODE02
                                                        AND i2.SUBCODE03 = i.SUBCODE03 AND i2.SUBCODE04 = i.SUBCODE04
                                                        AND i2.SUBCODE05 = i.SUBCODE05 AND i2.SUBCODE06 = i.SUBCODE06
                                                        AND i2.SUBCODE07 = i.SUBCODE07 AND i2.SUBCODE08 = i.SUBCODE08
                                                        AND i2.SUBCODE09 = i.SUBCODE09 AND i2.SUBCODE10 = i.SUBCODE10
                                WHERE 
                                    i.GOODSISSUEDATE BETWEEN '$awal_bulan_hariH' AND '$tgl2_hariH' AND i.DOCUMENTTYPETYPE = 05 AND NOT i.CODE IS NULL AND i.PROGRESSSTATUS_SALDOC = 2
                                GROUP BY
                                    i.PROVISIONALCODE,
                                    i.DEFINITIVECOUNTERCODE,
                                    i.CODE";
            $db2_roll_harian_local_hariH    = db2_exec($conn1, $q_roll_harian_hariH);
            $db2_roll_harian_export_hariH   = db2_exec($conn1, $q_roll_harian_hariH);

            // LOCAL
                while ($row_roll_harian_code_local_hariH     = db2_fetch_assoc($db2_roll_harian_local_hariH)) {
                    if($row_roll_harian_code_local_hariH['CODE'] != 'EXPORT'){
                        $r_roll_harian_code_local_hariH[]        = "'" .$row_roll_harian_code_local_hariH['CODE']. "'";
                    }
                }
                if($r_roll_harian_code_local_hariH){
                    $value_roll_harian_code_local_hariH     = implode(',', $r_roll_harian_code_local_hariH);
                    $data_roll_harian_code_local_hariH      = db2_exec($conn1, "SELECT COUNT(CODE) AS ROLL,
                                                                                SUM(BASEPRIMARYQUANTITY) AS QTY_SJ_KG,
                                                                                SUM(BASESECONDARYQUANTITY) AS QTY_SJ_YARD
                                                                        FROM 
                                                                            ITXVIEWALLOCATION0 
                                                                        WHERE 
                                                                            CODE IN ($value_roll_harian_code_local_hariH)");
                    $fetch_roll_harian_local_hariH  = db2_fetch_assoc($data_roll_harian_code_local_hariH);
                }
            // LOCAL

            // EXPORT
                while ($row_roll_harian_code_export_hariH     = db2_fetch_assoc($db2_roll_harian_export_hariH)) {
                    if($row_roll_harian_code_export_hariH['CODE'] == 'EXPORT'){
                        $r_roll_harian_code_export_hariH[]        = "'" .$row_roll_harian_code_export_hariH['PROVISIONALCODE']. "'";
                    }
                }
                if($r_roll_harian_code_export_hariH){
                    $value_roll_harian_code_export_hariH     = implode(',', $r_roll_harian_code_export_hariH);
                    $data_roll_harian_code_export_hariH      = db2_exec($conn1, "SELECT COUNT(ise.COUNTROLL) AS ROLL,
                                                                                SUM(ise.QTY_KG) AS QTY_SJ_KG,
                                                                                SUM(ise.QTY_YARDMETER) AS QTY_SJ_YARD
                                                                            FROM
                                                                                ITXVIEW_SURATJALAN_EXIM2A ise 
                                                                            LEFT JOIN ITXVIEW_NO_PROJECTS_EXIM inpe ON inpe.PROVISIONALCODE = ise.PROVISIONALCODE 
                                                                            WHERE 
                                                                                ise.PROVISIONALCODE IN ($value_roll_harian_code_export_hariH)");
                    $fetch_roll_harian_export_hariH  = db2_fetch_assoc($data_roll_harian_code_export_hariH);
                }
            // EXPORT
        // ROLL TANGGAL HARI sd hari H
        
        // TOTAL SURAT JALAN
            $q_countSJ  = db2_exec($conn1, "SELECT
                                                COUNT(*) AS TOTAL_SJ
                                            FROM
                                                (SELECT
                                                        (i.PROVISIONALCODE) AS JUMLAH_SJ
                                                    FROM
                                                        ITXVIEW_SURATJALAN_PPC_FOR_POSELESAI i
                                                    WHERE
                                                        $where_date
                                                        AND i.DOCUMENTTYPETYPE = 05
                                                        AND NOT i.CODE IS NULL
                                                        AND i.PROGRESSSTATUS_SALDOC = 2
                                                    GROUP BY
                                                        i.PROVISIONALCODE)");
            $row_countSJ   = db2_fetch_assoc($q_countSJ);
        // TOTAL SURAT JALAN
        ?>
        <tr>
            <th colspan="4" align="left">Total Tanggal <?php $date = date_create($_GET['tgl1'] ); echo date_format($date,"d"); ?></th>
            <th colspan="1" align="center">
                <?= number_format($fetch_roll_harian_local['ROLL'] + $fetch_roll_harian_export['ROLL'], 0); ?>
            </th>
            <th colspan="1" align="center">
                <?= number_format($fetch_roll_harian_local['QTY_SJ_KG'] + $fetch_roll_harian_export['QTY_SJ_KG'], 2); ?>
            </th>
            <th colspan="1" align="center">
                <?= number_format($fetch_roll_harian_local['QTY_SJ_YARD'] + $fetch_roll_harian_export['QTY_SJ_YARD'], 2); ?>
            </th>
            <th colspan="3" align="center">SINGGIH</th>
            <th colspan="6" align="center">PUTRI</th>
        </tr>
        <tr>
            <th colspan="4" align="left">Total Tanggal 01 S/D 
                <?php 
                    if(substr($_GET['tgl1'], 8, 2) != '01'){ 
                        echo date('d', strtotime('-1 days', strtotime($_GET['tgl1']))); 
                    }else{
                        $date = date_create($_GET['tgl1'] ); 
                        echo date_format($date,"d");
                    }
                ?>
            </th>
            <th colspan="1" align="center">
                <?= number_format($fetch_roll_harian_local_1['ROLL'] + $fetch_roll_harian_export_1['ROLL'], 0); ?>
            </th>
            <th colspan="1" align="center">
            <?= number_format($fetch_roll_harian_local_1['QTY_SJ_KG'] + $fetch_roll_harian_export_1['QTY_SJ_KG'], 2); ?>
                
            </th>
            <th colspan="1" align="center">
            <?= number_format($fetch_roll_harian_local_1['QTY_SJ_YARD'] + $fetch_roll_harian_export_1['QTY_SJ_YARD'], 2); ?>
            </th>
            <th colspan="3" align="center">STAFF</th>
            <th colspan="6" align="center">PPC AST. MANAGER</th>
        </tr>
        <tr>
            <th colspan="4" align="left">Total Tanggal 01 S/D 
                <?php 
                    if(substr($tgl1_kurang, 8, 2) != '01'){ 
                        $date = date_create($_GET['tgl1'] ); 
                        echo date_format($date,"d");
                    }else{
                        
                    }
                ?>
            </th>
            <th colspan="1" align="center">
                <?= number_format($fetch_roll_harian_local_hariH['ROLL'] + $fetch_roll_harian_export_hariH['ROLL'], 2); ?>
            </th>
            <th colspan="1" align="center">
                <?= number_format($fetch_roll_harian_local_hariH['QTY_SJ_KG'] + $fetch_roll_harian_export_hariH['QTY_SJ_KG'], 2); ?>
            </th>
            </th>
            <th colspan="1" align="center">
                <?= number_format($fetch_roll_harian_local_hariH['QTY_SJ_YARD'] + $fetch_roll_harian_export_hariH['QTY_SJ_YARD'], 2); ?>
            </th>
            <th colspan="3" align="center"><?php $date = date_create($_GET['tgl1'] ); echo date_format($date,"d-M-Y"); ?></th>
            <th colspan="6" align="center"><?php $date = date_create($_GET['tgl1'] ); echo date_format($date,"d-M-Y"); ?></th>
        </tr>
        <tr>
            <th colspan="5"><br></th>
            <th colspan="2"><br></th>
            <th colspan="3"><br><br><br></th>
            <th colspan="6"><br><br><br></th>
        </tr>       
    </tfoot>
</table>
<table border="0">
    <thead>
        <tr>
            <th>Total SJ</th>
            <th><?= $row_countSJ['TOTAL_SJ']; ?></th>
        </tr>
    </thead>
</table>