<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Laporan Persediaan Kain Jadi.xls");
?>
<table id="harian-fin" class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>TGL</td>
            <td>NO ITEM</td>
            <td>LANGGANAN</td>
            <td>BUYER</td>
            <td>PO</td>
            <td>ORDER</td>
            <td>JENIS KAIN</td>
            <td>NO WARNA</td>
            <td>WARNA</td>
            <td>DELIVERY</td>
            <td>LOT</td>
            <td>SN</td>
            <td>KG</td>
            <td>GRADE</td>
            <td>LENGTH</td>
            <td>SATUAN</td>
            <td>ZONA</td>
            <td>LOKASI</td>
            <td>STATUS</td>
        </tr>
    </thead>
    <tbody>
        <?php 
            ini_set("error_reporting", 1);
            session_start();
            require_once "koneksi.php"; 
        ?>
        <?php
            $thn    = $_GET['thn'];
            $lot    = $_GET['lot'];
            $sqlDB2 = "SELECT
                            VARCHAR_FORMAT(BALANCE.CREATIONDATETIME, 'dd MONTH yyyy') AS TGL_BALANCE,
                            trim(BALANCE.DECOSUBCODE02) || trim(BALANCE.DECOSUBCODE03) AS NO_ITEM,
                            trim(BUSINESSPARTNER.LEGALNAME1) AS LANGGANAN,
                            CASE 
                                WHEN trim(SALESORDER.ORDERPARTNERBRANDCODE) IS NULL THEN 'Periksa kembali kolom BRAND di SALESORDER. User : ' || trim(SALESORDER.CREATIONUSER)
                                ELSE trim(SALESORDER.ORDERPARTNERBRANDCODE) 
                            END AS BUYER,
                            CASE 
                                WHEN trim(SALESORDER.EXTERNALREFERENCE) IS NULL THEN trim(SALESORDERLINE.EXTERNALREFERENCE)
                                ELSE trim(SALESORDER.EXTERNALREFERENCE)
                            END AS PO,
                            BALANCE.PROJECTCODE AS NO_ORDER,
                            trim(SALESORDERLINE.ITEMDESCRIPTION) AS JENIS_KAIN,
                            BALANCE.DECOSUBCODE05 AS NO_WARNA,
                            ITXVIEWCOLOR.WARNA AS WARNA,
                            CASE 
                                WHEN trim(SALESORDER.REQUIREDDUEDATE) IS NULL THEN 'Periksa kembali kolom REQUEST DUE DATE & CONFIRM DUE DATE di SALESORDER. User : ' || trim(SALESORDER.CREATIONUSER)
                                ELSE VARCHAR_FORMAT(SALESORDER.REQUIREDDUEDATE, 'dd MONTH yyyy')
                            END AS DELIVERY,	
                            BALANCE.LOTCODE AS LOT,
                            BALANCE.ELEMENTSCODE AS SN ,
                            BALANCE.BASEPRIMARYQUANTITYUNIT AS KG,
                            CASE 
                                WHEN BALANCE.QUALITYLEVELCODE = '1' THEN 'A'
                                WHEN BALANCE.QUALITYLEVELCODE = '2' THEN 'B'
                                ELSE 'C'
                            END AS GRADE,
                            BALANCE.BASESECONDARYQUANTITYUNIT AS LENGTH,
                            BALANCE.BASESECONDARYUNITCODE AS SATUAN,
                            BALANCE.WHSLOCATIONWAREHOUSEZONECODE AS ZONA,
                            BALANCE.WAREHOUSELOCATIONCODE AS LOKASI,
                            trim(SALESORDER.CREATIONUSER) AS USER_SALESORDER,
                            CASE
                                WHEN STOCKTRANSACTION.QUALITYREASONCODE IS NULL THEN 
                                    CASE 
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) IS NULL AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'OPN' THEN 'Booking'
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) IS NULL AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'STO' THEN 'Booking'
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) IS NULL AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'RPE' THEN 'Sisa Ganti Kain'
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) IS NULL AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'REP' THEN 'Sisa Ganti Kain'
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) IS NULL AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'SAM' THEN 'Sisa MOQ'
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) IS NULL AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'SME' THEN 'Sisa MOQ'
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) IS NULL AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'RFD' THEN 'Sisa Ganti Kain'
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) IS NULL AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'RFE' THEN 'Sisa Ganti Kain'
                                        ---------------------------------------------------------------------------------------------------------------------
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) = '.' AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'OPN' THEN 'Booking'
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) = '.' AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'STO' THEN 'Booking'
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) = '.' AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'RPE' THEN 'Sisa Ganti Kain'
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) = '.' AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'REP' THEN 'Sisa Ganti Kain'
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) = '.' AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'SAM' THEN 'Sisa MOQ'
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) = '.' AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'SME' THEN 'Sisa MOQ'
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) = '.' AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'RFD' THEN 'Sisa Ganti Kain'
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) = '.' AND SUBSTRING(STOCKTRANSACTION.PROJECTCODE, 0,4) = 'RFE' THEN 'Sisa Ganti Kain'
                                        ELSE 'Tunggu Kirim'
                                    END
                                WHEN STOCKTRANSACTION.QUALITYREASONCODE IS NOT NULL THEN 
                                    CASE 
                                        WHEN trim(QUALITYREASON.LONGDESCRIPTION) = '.' THEN 'Tunggu Kirim'
                                        ELSE trim(QUALITYREASON.LONGDESCRIPTION)
                                    END
                            END AS STATUS_KAIN
                        FROM
                            BALANCE BALANCE
                            LEFT JOIN SALESORDER SALESORDER ON BALANCE.PROJECTCODE = SALESORDER.CODE
                            LEFT JOIN ORDERPARTNER ORDERPARTNER ON ORDERPARTNER.CUSTOMERSUPPLIERCODE = SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE
                            LEFT JOIN BUSINESSPARTNER BUSINESSPARTNER ON BUSINESSPARTNER.NUMBERID = ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID
                            LEFT JOIN PRODUCTIONRESERVATION PRODUCTIONRESERVATION ON PRODUCTIONRESERVATION.PRODUCTIONORDERCODE = BALANCE.LOTCODE AND PRODUCTIONRESERVATION.PROJECTCODE = BALANCE.PROJECTCODE 
                            LEFT JOIN PRODUCTIONDEMAND PRODUCTIONDEMAND ON PRODUCTIONDEMAND.CODE = PRODUCTIONRESERVATION.ORDERCODE 
                            LEFT JOIN SALESORDERLINE SALESORDERLINE ON SALESORDERLINE.SALESORDERCODE = BALANCE.PROJECTCODE 
                                    AND BALANCE.DECOSUBCODE01 = SALESORDERLINE.SUBCODE01 AND BALANCE.DECOSUBCODE02 = SALESORDERLINE.SUBCODE02 
                                    AND BALANCE.DECOSUBCODE03 = SALESORDERLINE.SUBCODE03 AND BALANCE.DECOSUBCODE04 = SALESORDERLINE.SUBCODE04 
                                    AND BALANCE.DECOSUBCODE05 = SALESORDERLINE.SUBCODE05 AND BALANCE.DECOSUBCODE06 = SALESORDERLINE.SUBCODE06 
                                    AND BALANCE.DECOSUBCODE07 = SALESORDERLINE.SUBCODE07 AND BALANCE.DECOSUBCODE08 = SALESORDERLINE.SUBCODE08 
                                    AND SALESORDERLINE.ORDERLINE = PRODUCTIONDEMAND.DLVSALESORDERLINEORDERLINE
                            LEFT JOIN ITXVIEWCOLOR ITXVIEWCOLOR ON ITXVIEWCOLOR.SUBCODE03 = BALANCE.DECOSUBCODE03 AND ITXVIEWCOLOR.SUBCODE05 = BALANCE.DECOSUBCODE05
                            LEFT JOIN (
                                SELECT
                                    *
                                FROM( SELECT 
                                            ROW_NUMBER() OVER(ORDER BY STOCKTRANSACTION.CREATIONDATETIME DESC) AS MYROW, 
                                            STOCKTRANSACTION.ITEMELEMENTCODE, 
                                            STOCKTRANSACTION.PROJECTCODE, 
                                            STOCKTRANSACTION.QUALITYREASONCODE   
                                        FROM STOCKTRANSACTION )
                            )STOCKTRANSACTION ON STOCKTRANSACTION.ITEMELEMENTCODE = BALANCE.ELEMENTSCODE AND STOCKTRANSACTION.PROJECTCODE = BALANCE.PROJECTCODE
                            LEFT JOIN QUALITYREASON QUALITYREASON ON STOCKTRANSACTION.QUALITYREASONCODE = QUALITYREASON.CODE
                        WHERE
                            BALANCE.ITEMTYPECODE = 'KFF' 
                            AND BALANCE.LOGICALWAREHOUSECODE = 'M031' 
                            AND BALANCE.LOTCODE LIKE '%$lot%' 
                            AND VARCHAR_FORMAT(BALANCE.CREATIONDATETIME, 'yyyy') = '$thn' 
                            AND NOT SALESORDER.CODE IS NULL 
                            AND TRIM(BALANCE.WHSLOCATIONWAREHOUSEZONECODE) LIKE '%Y%' OR TRIM(BALANCE.WHSLOCATIONWAREHOUSEZONECODE) LIKE '%Z%' OR TRIM(BALANCE.WHSLOCATIONWAREHOUSEZONECODE) LIKE '%W%' OR TRIM(BALANCE.WHSLOCATIONWAREHOUSEZONECODE) LIKE '%X%'
                        GROUP BY 
                            BALANCE.CREATIONDATETIME,
                            BALANCE.DECOSUBCODE02,
                            BALANCE.DECOSUBCODE03,
                            BUSINESSPARTNER.LEGALNAME1,
                            SALESORDER.ORDERPARTNERBRANDCODE,
                            SALESORDER.EXTERNALREFERENCE,
                            SALESORDERLINE.EXTERNALREFERENCE,
                            SALESORDERLINE.ITEMDESCRIPTION,
                            BALANCE.PROJECTCODE,
                            BALANCE.DECOSUBCODE05,
                            SALESORDER.REQUIREDDUEDATE,	
                            BALANCE.LOTCODE,
                            BALANCE.ELEMENTSCODE,
                            BALANCE.BASEPRIMARYQUANTITYUNIT,
                            BALANCE.QUALITYLEVELCODE,
                            BALANCE.BASESECONDARYQUANTITYUNIT,
                            BALANCE.BASESECONDARYUNITCODE,
                            BALANCE.WHSLOCATIONWAREHOUSEZONECODE,
                            BALANCE.WAREHOUSELOCATIONCODE,
                            SALESORDER.CREATIONUSER,
                            STOCKTRANSACTION.QUALITYREASONCODE,
                            STOCKTRANSACTION.PROJECTCODE,
                            QUALITYREASON.LONGDESCRIPTION,
                            ITXVIEWCOLOR.WARNA";
            $stmt   = db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
            $no     = 1;
            while ($rowdb2 = db2_fetch_assoc($stmt)) {
        ?>
        <tr>
            <td><?= $rowdb2['TGL_BALANCE']; ?></td> <!-- TGL -->
            <td><?= $rowdb2['NO_ITEM']; ?></td> <!-- NO ITEM -->
            <td><?= $rowdb2['LANGGANAN']; ?></td> <!-- LANGGANAN -->
            <td><?= $rowdb2['BUYER']; ?></td> <!-- BUYER -->
            <td><?= $rowdb2['PO']; ?></td> <!-- PO -->
            <td><?= $rowdb2['NO_ORDER']; ?></td> <!-- ORDER -->
            <td><?= $rowdb2['JENIS_KAIN']; ?></td> <!-- JENIS_KAIN -->
            <td><?= $rowdb2['NO_WARNA']; ?></td> <!-- NO WARNA -->
            <td><?= $rowdb2['WARNA']; ?></td> <!-- WARNA -->
            <td><?= $rowdb2['DELIVERY']; ?></td> <!-- DELIVERY -->
            <td><?= $rowdb2['LOT']; ?></td> <!-- LOT -->
            <td><?= $rowdb2['SN']; ?></td> <!-- SN -->
            <td><?= $rowdb2['KG']; ?></td> <!-- KG -->
            <td><?= $rowdb2['GRADE']; ?></td> <!-- GRADE -->
            <td><?= $rowdb2['LENGTH']; ?></td> <!-- LENGTH -->
            <td><?= $rowdb2['SATUAN']; ?></td> <!-- SATUAN -->
            <td><?= $rowdb2['ZONA']; ?></td> <!-- ZONA -->
            <td><?= $rowdb2['LOKASI']; ?></td> <!-- LOKASI -->
            <td><?= $rowdb2['STATUS_KAIN']; ?></td> <!-- STATUS -->
        </tr>
    <?php } ?>
    </tbody>
</table>