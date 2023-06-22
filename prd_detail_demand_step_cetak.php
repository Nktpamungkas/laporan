<body onload="print()">
    <center><h4>DETAIL DEMAND STEP</h4></center>
    <center>
    <table width="100%" border="0">
        <?php
            require_once "koneksi.php";
            $q_ITXVIEWKK    = db2_exec($conn1, "SELECT * FROM ITXVIEWKK WHERE PRODUCTIONDEMANDCODE = '$_GET[demand]'");
            $d_ITXVIEWKK    = db2_fetch_assoc($q_ITXVIEWKK);

            $sql_pelanggan_buyer 	= db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$d_ITXVIEWKK[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                            AND CODE = '$d_ITXVIEWKK[PROJECTCODE]'");
            $dt_pelanggan_buyer		= db2_fetch_assoc($sql_pelanggan_buyer);

            $sql_qtyorder   = db2_exec($conn1, "SELECT DISTINCT
                                                        USEDUSERPRIMARYQUANTITY AS QTY_ORDER,
                                                        USEDUSERSECONDARYQUANTITY AS QTY_ORDER_YARD,
                                                        USERPRIMARYUOMCODE,
                                                        BASEPRIMARYUOMCODE,
                                                        CASE
                                                            WHEN TRIM(USERSECONDARYUOMCODE) = 'kg' THEN 'Kg'
                                                            WHEN TRIM(USERSECONDARYUOMCODE) = 'yd' THEN 'Yard'
                                                            WHEN TRIM(USERSECONDARYUOMCODE) = 'm' THEN 'Meter'
                                                            ELSE 'PCS'
                                                        END AS SATUAN_QTY
                                                    FROM 
                                                        ITXVIEW_RESERVATION_KK 
                                                    WHERE 
                                                        ORDERCODE = '$_GET[demand]'");
            $dt_qtyorder    = db2_fetch_assoc($sql_qtyorder);

            $q_qtypacking   = db2_exec($conn1, "SELECT * FROM PRODUCTIONDEMAND WHERE CODE = '$_GET[demand]'");
            $d_qtypacking   = db2_fetch_assoc($q_qtypacking);
        ?>
        <thead>
            <tr>
                <th>Prod. Demand</th>
                <th>:</th>
                <th><?= $_GET['demand'] ?></th>
                <th>Delivery Date</th>
                <th>:</th>
                <th><?= $d_ITXVIEWKK['DELIVERYDATE']; ?></th>
            </tr>
            <tr>
                <th>Prod. Order</th>
                <th>:</th>
                <th><?= $d_ITXVIEWKK['PRODUCTIONORDERCODE']; ?></th>
                <th>Full Item</th>
                <th>:</th>
                <th>
                    <?= TRIM($d_ITXVIEWKK['SUBCODE01']).'-'.
                    TRIM($d_ITXVIEWKK['SUBCODE02']).'-'.
                    TRIM($d_ITXVIEWKK['SUBCODE03']).'-'.
                    TRIM($d_ITXVIEWKK['SUBCODE04']).'-'.
                    TRIM($d_ITXVIEWKK['SUBCODE05']).'-'.
                    TRIM($d_ITXVIEWKK['SUBCODE06']).'-'.
                    TRIM($d_ITXVIEWKK['SUBCODE07']).'-'.
                    TRIM($d_ITXVIEWKK['SUBCODE08']).'-'.
                    TRIM($d_ITXVIEWKK['SUBCODE09']).'-'.
                    TRIM($d_ITXVIEWKK['SUBCODE10']); ?>
                </th>
            </tr>
            <tr>
                <th>Customer</th>
                <th>:</th>
                <th><?= $dt_pelanggan_buyer['LANGGANAN'].'/'.$dt_pelanggan_buyer['BUYER']; ?></th>
                <th>Collor Name</th>
                <th>:</th>
                <th><?= $d_ITXVIEWKK['WARNA']; ?></th>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <th>:</th>
                <th><?= $d_ITXVIEWKK['DESCRIPTION']; ?></th>
                <th>Quantity</th>
                <th>:</th>
                <th>
                    <?= number_format($dt_qtyorder['QTY_ORDER'], 2).' '.$dt_qtyorder['USERPRIMARYUOMCODE']; ?>
                    <?= number_format($dt_qtyorder['QTY_ORDER_YARD'], 2).' '.$dt_qtyorder['BASEPRIMARYUOMCODE']; ?>
                </th>
            </tr>
            <tr>
                <th>Bon Order</th>
                <th>:</th>
                <th><?= $d_ITXVIEWKK['PROJECTCODE']; ?></th>
                <th>Qty Packing</th>
                <th>:</th>
                <th><?= $qty_packing['ENTEREDUSERPRIMARYQUANTITY']; ?></th>
            </tr>
        </thead>
    </table>
    </center>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th rowspan="2" style="text-align: center;">WORKCENTER</th>
                <th rowspan="2" style="text-align: center;">OPERATION</th>
                <th rowspan="2" style="text-align: center;">DESKRIPSI</th>
                <th colspan="2" style="text-align: center;">TANGGAL PROGRESS</th>
                <th style="text-align: center;">QA DATA</th>
            </tr>
            <tr>
                <th style="text-align: center;">START</th>
                <th style="text-align: center;">END</th>
                <th style="text-align: center;">LINE | KETERANGAN | Nr/Qty</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                ini_set("error_reporting", 1);
                session_start();
                require_once "koneksi.php"; 
                $sqlDB2 = "SELECT
                                p.WORKCENTERCODE,
                                p.OPERATIONCODE,
                                o.LONGDESCRIPTION,
                                iptip.MULAI,
                                iptop.SELESAI,
                                p.PRODUCTIONORDERCODE,
                                p.PRODUCTIONDEMANDCODE,
                                p.GROUPSTEPNUMBER AS STEPNUMBER
                            FROM 
                                PRODUCTIONDEMANDSTEP p 
                            LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                            LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                            LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                            WHERE
                                p.PRODUCTIONORDERCODE  = '$_GET[prod_order]' AND p.PRODUCTIONDEMANDCODE = '$_GET[demand]' 
                            ORDER BY p.STEPNUMBER ASC";
                $stmt = db2_exec($conn1,$sqlDB2);
                while ($rowdb2 = db2_fetch_assoc($stmt)) {
            ?>
            <tr>
                <td style="vertical-align: text-top;"><?= $rowdb2['WORKCENTERCODE']; ?></td>
                <td style="vertical-align: text-top;"><?= $rowdb2['OPERATIONCODE']; ?></td>
                <td style="vertical-align: text-top;"><?= $rowdb2['LONGDESCRIPTION']; ?></td>
                <td style="vertical-align: text-top; text-align: center;"><?= $rowdb2['MULAI']; ?></td>
                <td style="vertical-align: text-top; text-align: center;"><?= $rowdb2['SELESAI']; ?></td>
                <?php
                    $q_QA_DATA  = mysqli_query($con_nowprd, "SELECT * FROM ITXVIEW_DETAIL_QA_DATA 
                                                                WHERE PRODUCTIONORDERCODE = '$d_ITXVIEWKK[PRODUCTIONORDERCODE]' 
                                                                AND PRODUCTIONDEMANDCODE = '$d_ITXVIEWKK[PRODUCTIONDEMANDCODE]' 
                                                                AND WORKCENTERCODE = '$rowdb2[WORKCENTERCODE]' 
                                                                AND OPERATIONCODE = '$rowdb2[OPERATIONCODE]' 
                                                                ORDER BY LINE ASC");
                ?>
                <td style="text-align: left;">
                <?php while ($d_QA_DATA = mysqli_fetch_array($q_QA_DATA)) : ?>
                    <?= $d_QA_DATA['LINE'].' : '.$d_QA_DATA['LONGDESCRIPTION'].' = '.$d_QA_DATA['VALUEQUANTITY'].'<br>'; ?> 
                <?php endwhile; ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>                            