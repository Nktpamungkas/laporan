<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Laporan Pengiriman.xls");
    header('Cache-Control: max-age=0');
?>
<table border="1" width="100%">
    <thead>
        <tr>
            <th colspan="16">Laporan Harian Pengiriman</th>
        </tr>
        <tr>
            <th colspan="16">FW-02-PPC-04/02</th>
        </tr>
        <tr>
            <th colspan="16">BULAN <?php $date = date_create($_GET['tgl1'] ); echo date_format($date,"M-Y"); ?></th>
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
                                WHEN TRIM(i.DEFINITIVECOUNTERCODE) = 'CESDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'CESPROV' OR
                                    TRIM(i.DEFINITIVECOUNTERCODE) = 'DREDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'DREPROV' OR 
                                    TRIM(i.DEFINITIVECOUNTERCODE) = 'DSEDEF' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'EXDDEF' OR
                                    TRIM(i.DEFINITIVECOUNTERCODE) = 'EXDPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'EXPDEF' OR
                                    TRIM(i.DEFINITIVECOUNTERCODE) = 'EXPPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'GSEDEF' OR 
                                    TRIM(i.DEFINITIVECOUNTERCODE) = 'GSEPROV' OR TRIM(i.DEFINITIVECOUNTERCODE) = 'PSEPROV' THEN '' ELSE i.DLVSALORDERLINESALESORDERCODE
                            END AS DLVSALORDERLINESALESORDERCODE,
                            CASE
                                WHEN $codeExport THEN 0 ELSE i.DLVSALESORDERLINEORDERLINE
                            END AS DLVSALESORDERLINEORDERLINE,
                            CASE
                                WHEN $codeExport THEN '' ELSE i.ITEMDESCRIPTION
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
                            $where_no_order $where_date AND i.DOCUMENTTYPETYPE = 05 AND NOT i.CODE IS NULL AND i.PROGRESSSTATUS_SALDOC = 2
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
                            i.CODE
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
                                                    ITXVIEW_SURATJALAN_EXIM2 ise 
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
                <td><?php if($rowdb2['PAYMENTMETHODCODE'] == 'FOC'){ echo $rowdb2['PAYMENTMETHODCODE']; } ?></td> 
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
                                                                ITXVIEW_SURATJALAN_EXIM2 ise 
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
                                                                    SUM(BASESECONDARYQUANTITY) AS QTY_SJ_YARD
                                                            FROM 
                                                                ITXVIEWALLOCATION0 
                                                            WHERE 
                                                                CODE = '$rowdb2[CODE]'");
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
                                                                COUNT(ise.COUNTROLL) AS ROLL,
                                                                SUM(ise.QTY_KG) AS QTY_SJ_KG,
                                                                SUM(ise.QTY_YARDMETER) AS QTY_SJ_YARD,
                                                                inpe.PROJECT,
                                                                ise.ADDRESSEE,
                                                                ise.BRAND_NM
                                                            FROM
                                                                ITXVIEW_SURATJALAN_EXIM2 ise 
                                                            LEFT JOIN ITXVIEW_NO_PROJECTS_EXIM inpe ON inpe.PROVISIONALCODE = ise.PROVISIONALCODE 
                                                            WHERE 
                                                                ise.PROVISIONALCODE = '$rowdb2[PROVISIONALCODE]'
                                                            GROUP BY 
                                                                inpe.PROJECT,ise.ADDRESSEE,ise.BRAND_NM");
                            $d_roll     = db2_fetch_assoc($q_roll);
                            if($d_ket_foc['ROLL'] > 0 AND $d_ket_foc['KG'] > 0 AND $d_ket_foc['YARD_MTR'] > 0) { // MENGHITUNG JIKA FOC SEBAGIAN, MAKA ROLL UNTUK FOC DIPISAH DARI KESELURUHAN
                                echo $d_roll['ROLL'] - $d_ket_foc['ROLL'];
                            }else{
                                echo $d_roll['ROLL'];
                            }
                        }else{
                            $q_roll     = db2_exec($conn1, "SELECT COUNT(CODE) AS ROLL,
                                                                    SUM(BASEPRIMARYQUANTITY) AS QTY_SJ_KG,
                                                                    SUM(BASESECONDARYQUANTITY) AS QTY_SJ_YARD
                                                            FROM 
                                                                ITXVIEWALLOCATION0 
                                                            WHERE 
                                                                CODE = '$rowdb2[CODE]'");
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
        <tr>
            <th colspan="4" align="left">Total Tanggal <?php $date = date_create($_GET['tgl1'] ); echo date_format($date,"d"); ?></th>
            <th colspan="1" align="center">
                
            </th>
            <th colspan="2" align="center">
                
            </th>
            <th colspan="3" align="center">SINGGIH</th>
            <th colspan="6" align="center">PUTRI</th>
        </tr>
        <tr>
            <th colspan="4" align="left">Total Tanggal 01 S/D <?php echo date('d', strtotime('-1 days', strtotime($_GET['tgl1']))); ?></th>
            <th colspan="1" align="center">
                
            </th>
            <th colspan="2" align="center">
                
            </th>
            <th colspan="3" align="center">STAFF</th>
            <th colspan="6" align="center">PPC AST. MANAGER</th>
        </tr>
        <tr>
            <th colspan="4" align="left">Total Tanggal 01 S/D <?php $date = date_create($_GET['tgl1'] ); echo date_format($date,"d"); ?></th>
            <th colspan="1" align="center">
                
            </th>
            <th colspan="2" align="center">
                
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