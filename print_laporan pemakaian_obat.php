<?php
    session_start();

    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=DYE-Laporan Pemakaian Obat.xls");
    header('Cache-Control: max-age=0');
?>

<table width="100%" border="1">
    <thead>
        <tr>
            <th rowspan="2" style="text-align: center;">NO</th>
            <th rowspan="2" style="text-align: center;">KODE OBAT ERP NOW</th>
            <th rowspan="2" style="text-align: center;">NAMA DAN JENIS BAHAN KIMIA/DYESTUFF</th>
            <th rowspan="2" style="text-align: center;">STOCK AWAL  (Gr)</th>
            <th rowspan="2" style="text-align: center;">MASUK  (Gr)</th>
            <th colspan="6" style="text-align: center;">PEMAKAIAN</th>   
            <th rowspan="2" style="text-align: center;">TOTAL PEMAKAIAN (Gr)</th>
            <th rowspan="2" style="text-align: center;">SISA STOK (Gr)</th>
            <th rowspan="2" style="text-align: center;">STOK AMAN</th>
            <th rowspan="2" style="text-align: center;">STATUS</th>
            <th rowspan="2" style="text-align: center;">BUKA PO</th>
            <th rowspan="2" style="text-align: center;">SISA PO</th>
            <th rowspan="2" style="text-align: center;">STOK CATATAN GK</th>
            <th rowspan="2" style="text-align: center;">SELISIH</th>        
        </tr>
        <tr>
            <th style="text-align: center;">Normal</th>
            <th style="text-align: center;">Perbaikan (Gr)</th>
            <th style="text-align: center;">Tambahan (Gr)</th>
            <th style="text-align: center;">Finishing</th>
            <th style="text-align: center;">Printing</th>
            <th style="text-align: center;">Yarn Dye</th>
        </tr>
    </thead>
    <tbody>
<?php 
    require_once "koneksi.php";

    if(isset($_SESSION['tgl']) && isset($_SESSION['time']) && isset($_SESSION['tgl2']) && isset($_SESSION['time2']) && isset($_SESSION['warehouse'])) {
        $tgl = $_SESSION['tgl'];
        $time = $_SESSION['time'];
        $tgl2 = $_SESSION['tgl2'];
        $time2 = $_SESSION['time2'];
        $warehouse = $_SESSION['warehouse'];
    } else {
        echo "Data tidak tersedia.";
    }

    session_unset();
    session_destroy();

    $db_stocktransaction = db2_exec($conn1, "SELECT DISTINCT 
                                                            -- TGL,
                                                            PRODUCTIONORDERCODE,
                                                            DECOSUBCODE01,
                                                            DECOSUBCODE02,
                                                            DECOSUBCODE03
                                                            -- KODE_OBAT,
                                                            -- SUM(AKTUAL_QTY) AS TOTAL_AKTUAL_QTY,
                                                            -- SATUAN,
                                                            -- LONGDESCRIPTION/
                                                            -- TEMPLATECODE,
                                                            -- KETERANGAN
                                                        FROM 
                                                            (SELECT
                                                                s.TRANSACTIONDATE AS TGL,
                                                                TIMESTAMP(s.TRANSACTIONDATE, s.TRANSACTIONTIME) AS TGL_WAKTU,
                                                                CASE
                                                                    WHEN s.PRODUCTIONORDERCODE IS NULL THEN s.ORDERCODE
                                                                    ELSE s.PRODUCTIONORDERCODE
                                                                END AS PRODUCTIONORDERCODE,
                                                                --  s.ORDERLINE,
                                                                s.DECOSUBCODE01,
                                                                s.DECOSUBCODE02,
                                                                s.DECOSUBCODE03,
                                                                CASE
                                                                    WHEN s.TEMPLATECODE = '120' THEN TRIM(s.DECOSUBCODE01) || '-' || TRIM(s.DECOSUBCODE02) || '-' || TRIM(s.DECOSUBCODE03)
                                                                WHEN s.TEMPLATECODE = '303' THEN TRIM(s.DECOSUBCODE01) || '-' || TRIM(s.DECOSUBCODE02) || '-' || TRIM(s.DECOSUBCODE03)
                                                                WHEN s.TEMPLATECODE = '304' THEN TRIM(s.DECOSUBCODE01) || '-' || TRIM(s.DECOSUBCODE02) || '-' || TRIM(s.DECOSUBCODE03)
                                                                WHEN s.TEMPLATECODE = '203' THEN TRIM(s.DECOSUBCODE01) || '-' || TRIM(s.DECOSUBCODE02) || '-' || TRIM(s.DECOSUBCODE03)
                                                                WHEN s.TEMPLATECODE = '201' THEN TRIM(s.DECOSUBCODE01) || '-' || TRIM(s.DECOSUBCODE02) || '-' || TRIM(s.DECOSUBCODE03)
                                                                    ELSE s.TEMPLATECODE
                                                                END AS KODE_OBAT,
                                                                SUM(s.USERPRIMARYQUANTITY) AS AKTUAL_QTY,
                                                                s.USERPRIMARYUOMCODE AS SATUAN,
                                                                p.LONGDESCRIPTION,
                                                                s.TEMPLATECODE,
                                                                CASE
                                                                    WHEN s.TEMPLATECODE = '303' THEN l2.LONGDESCRIPTION
                                                                WHEN s.TEMPLATECODE = '203' THEN l.LONGDESCRIPTION
                                                                WHEN s.TEMPLATECODE = '201' THEN l.LONGDESCRIPTION
                                                                        ELSE NULL
                                                                    END AS KETERANGAN
                                                            FROM
                                                                STOCKTRANSACTION s
                                                            LEFT JOIN PRODUCT p ON
                                                                p.ITEMTYPECODE = s.ITEMTYPECODE
                                                                AND p.SUBCODE01 = s.DECOSUBCODE01
                                                                AND p.SUBCODE02 = s.DECOSUBCODE02
                                                                AND p.SUBCODE03 = s.DECOSUBCODE03
                                                            LEFT JOIN INTERNALDOCUMENT i ON
                                                                i.PROVISIONALCODE = s.ORDERCODE
                                                            LEFT JOIN ORDERPARTNER o ON
                                                                o.CUSTOMERSUPPLIERCODE = i.ORDPRNCUSTOMERSUPPLIERCODE
                                                            LEFT JOIN LOGICALWAREHOUSE l ON
                                                                l.CODE = o.CUSTOMERSUPPLIERCODE
                                                            LEFT JOIN STOCKTRANSACTION s2 ON
                                                                s2.TRANSACTIONNUMBER = s.TRANSACTIONNUMBER
                                                                AND s2.DETAILTYPE = 2
                                                            LEFT JOIN LOGICALWAREHOUSE l2 ON
                                                                l2.CODE = s2.LOGICALWAREHOUSECODE
                                                            WHERE
                                                                s.ITEMTYPECODE = 'DYC'
                                                                AND s.LOGICALWAREHOUSECODE = '$warehouse'
                                                                AND s.TRANSACTIONDATE BETWEEN '$tgl' AND '$tgl2'
                                                                AND NOT s.TEMPLATECODE = '313'
                                                                AND (s.DETAILTYPE = 1 OR s.DETAILTYPE = 0)
                                                            GROUP BY 
                                                                s.TRANSACTIONDATE, 
                                                                s.TRANSACTIONTIME,
                                                                s.PRODUCTIONORDERCODE,
                                                                s.ORDERCODE,
                                                                s.DECOSUBCODE01,
                                                                s.DECOSUBCODE02,
                                                                s.DECOSUBCODE03,
                                                                s.TEMPLATECODE,
                                                                s.USERPRIMARYUOMCODE,
                                                                p.LONGDESCRIPTION,
                                                                l2.LONGDESCRIPTION,
                                                                l.LONGDESCRIPTION,
                                                                l.LONGDESCRIPTION
                                                            ORDER BY
                                                                s.PRODUCTIONORDERCODE ASC)
                                                        WHERE
                                                            TGL_WAKTU BETWEEN '$tgl $time:00' AND '$tgl2 $time2:00'
                                                        GROUP BY 
                                                        PRODUCTIONORDERCODE,
                                                            DECOSUBCODE01,
                                                            DECOSUBCODE02,
                                                            DECOSUBCODE03
                                                            ");
    // Periksa apakah query berhasil dieksekusi
    if (!$db_stocktransaction) {
        die("Error executing query: " . db2_stmt_errormsg());
    }
    $no = 1;
    while ($row_stocktransaction = db2_fetch_assoc($db_stocktransaction)) {

        $db_reservation     = db2_exec($conn1, "SELECT 
                                                    KODE_OBAT,
                                                    LONGDESCRIPTION,
                                                    SUBCODE01,
                                                    SUBCODE02,
                                                    SUBCODE03,
                                                    SUM(QTY_NORMAL) AS QTY_NORMAL,
                                                    SUM(QTY_TAMBAH_OBAT) AS QTY_TAMBAH_OBAT,
                                                    SUM(QTY_OBAT_PERBAIKAN) AS QTY_OBAT_PERBAIKAN,
                                                    SUM(QTY_OBAT_DYE) AS QTY_OBAT_DYE
                                                    from
                                                    (SELECT DISTINCT 
                                                    KODE_OBAT,
                                                    LONGDESCRIPTION,
                                                    SUBCODE01,
                                                    SUBCODE02,
                                                    SUBCODE03,
                                                    CASE 
                                                        WHEN KETERANGAN NOT IN ('DYE','Perbaikan','Tambah Obat') then SUM(QTY_NORMAL)
                                                        ELSE 0
                                                    END AS QTY_NORMAL,
                                                    SUM(QTY_TAMBAH_OBAT) AS QTY_TAMBAH_OBAT,
                                                    SUM(QTY_OBAT_PERBAIKAN) AS QTY_OBAT_PERBAIKAN,
                                                    SUM(QTY_OBAT_DYE) AS QTY_OBAT_DYE
                                                    --KETERANGAN
                                                    FROM
                                                    (
                                                    SELECT 
                                                        p.PRODUCTIONORDERCODE,
                                                        p.GROUPLINE,
                                                        p.SUBCODE01,
                                                        p.SUBCODE02,
                                                        p.SUBCODE03,
                                                        TRIM(p.SUBCODE01) || '-' || TRIM(p.SUBCODE02) || '-' || TRIM(p.SUBCODE03) AS KODE_OBAT,
                                                        p3.LONGDESCRIPTION,
                                                        CASE 
                                                            WHEN p2.CODE LIKE '%T1%' OR p2.CODE LIKE '%T2%' OR p2.CODE LIKE '%T3%' OR p2.CODE LIKE '%T4%' OR p2.CODE LIKE '%T5%' OR p2.CODE LIKE '%T6%' OR p2.CODE LIKE '%T7%' THEN s2.USERPRIMARYQUANTITY
                                                            ELSE 0
                                                            END QTY_TAMBAH_OBAT, 
                                                        CASE 
                                                            WHEN p2.CODE LIKE '%R1%' OR p2.CODE LIKE '%R2%' OR p2.CODE LIKE '%R3%' OR p2.CODE LIKE '%R4%' OR p2.CODE LIKE '%R5%' OR p2.CODE LIKE '%R6%' OR p2.CODE LIKE '%R7%' THEN s3.USERPRIMARYQUANTITY
                                                            ELSE 0
                                                        END QTY_OBAT_PERBAIKAN, 
                                                        CASE 
                                                            WHEN p.PRODRESERVATIONLINKGROUPCODE LIKE '%DYE%' THEN  s4.USERPRIMARYQUANTITY
                                                            ELSE 0
                                                        END QTY_OBAT_DYE,
                                                        s5.USERPRIMARYQUANTITY AS QTY_NORMAL,		
                                                        p.GROUPSTEPNUMBER,
                                                        CASE
                                                            WHEN p2.CODE LIKE '%T1%' OR p2.CODE LIKE '%T2%' OR p2.CODE LIKE '%T3%' OR p2.CODE LIKE '%T4%' OR p2.CODE LIKE '%T5%' OR p2.CODE LIKE '%T6%' OR p2.CODE LIKE '%T7%' THEN 'Tambah Obat'
                                                            WHEN p2.CODE LIKE '%R1%' OR p2.CODE LIKE '%R2%' OR p2.CODE LIKE '%R3%' OR p2.CODE LIKE '%R4%' OR p2.CODE LIKE '%R5%' OR p2.CODE LIKE '%R6%' OR p2.CODE LIKE '%R7%' THEN 'Perbaikan'
                                                            -- ELSE 'Normal'
                                                                WHEN p.PRODRESERVATIONLINKGROUPCODE LIKE '%DYE%' THEN 'DYE'
                                                            ELSE p.PRODRESERVATIONLINKGROUPCODE
                                                        END AS KETERANGAN
                                                    FROM
                                                        PRODUCTIONRESERVATION p
                                                    LEFT JOIN PRODRESERVATIONLINKGROUP p2 ON p2.CODE = p.PRODRESERVATIONLINKGROUPCODE 
                                                    LEFT JOIN (
                                                            SELECT 
                                                                STOCKTRANSACTION.PRODUCTIONORDERCODE,
                                                                STOCKTRANSACTION.ORDERLINE,
                                                                STOCKTRANSACTION.DECOSUBCODE01,
                                                                STOCKTRANSACTION.DECOSUBCODE02,
                                                                STOCKTRANSACTION.DECOSUBCODE03,
                                                                STOCKTRANSACTION.DECOSUBCODE04,
                                                                STOCKTRANSACTION.DECOSUBCODE05,
                                                                STOCKTRANSACTION.DECOSUBCODE06,
                                                                STOCKTRANSACTION.DECOSUBCODE07,
                                                                STOCKTRANSACTION.DECOSUBCODE08,
                                                                STOCKTRANSACTION.USERPRIMARYQUANTITY 
                                                            FROM STOCKTRANSACTION STOCKTRANSACTION
                                                            WHERE 
                                                                STOCKTRANSACTION.ITEMTYPECODE ='DYC'
                                                                AND NOT STOCKTRANSACTION.TEMPLATECODE = '313'
                                                                AND (STOCKTRANSACTION.DETAILTYPE = 1 OR STOCKTRANSACTION.DETAILTYPE = 0)
                                                    ) s2 ON s2.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE 
                                                            AND s2.ORDERLINE = p.GROUPLINE 
                                                        AND s2.DECOSUBCODE01 = p.SUBCODE01 
                                                        AND s2.DECOSUBCODE02 = p.SUBCODE02 
                                                        AND s2.DECOSUBCODE03 = p.SUBCODE03 
                                                        AND s2.DECOSUBCODE04 = p.SUBCODE04 
                                                        AND s2.DECOSUBCODE05 = p.SUBCODE05 
                                                        AND s2.DECOSUBCODE06 = p.SUBCODE06 
                                                        AND s2.DECOSUBCODE07 = p.SUBCODE07
                                                        AND s2.DECOSUBCODE08 = p.SUBCODE08
                                                    LEFT JOIN (
                                                                SELECT 
                                                                    STOCKTRANSACTION.PRODUCTIONORDERCODE,
                                                                    STOCKTRANSACTION.ORDERLINE,
                                                                    STOCKTRANSACTION.DECOSUBCODE01,
                                                                    STOCKTRANSACTION.DECOSUBCODE02,
                                                                    STOCKTRANSACTION.DECOSUBCODE03,
                                                                    STOCKTRANSACTION.DECOSUBCODE04,
                                                                    STOCKTRANSACTION.DECOSUBCODE05,
                                                                    STOCKTRANSACTION.DECOSUBCODE06,
                                                                    STOCKTRANSACTION.DECOSUBCODE07,
                                                                    STOCKTRANSACTION.DECOSUBCODE08,
                                                                    STOCKTRANSACTION.USERPRIMARYQUANTITY 
                                                                    FROM STOCKTRANSACTION STOCKTRANSACTION
                                                                WHERE 
                                                                    STOCKTRANSACTION.ITEMTYPECODE ='DYC'
                                                                    AND NOT STOCKTRANSACTION.TEMPLATECODE = '313'
                                                                    AND (STOCKTRANSACTION.DETAILTYPE = 1 OR STOCKTRANSACTION.DETAILTYPE = 0)
                                                    ) s3 ON s3.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE 
                                                            AND s3.ORDERLINE = p.GROUPLINE 
                                                        AND s3.DECOSUBCODE01 = p.SUBCODE01 
                                                        AND s3.DECOSUBCODE02 = p.SUBCODE02 
                                                        AND s3.DECOSUBCODE03 = p.SUBCODE03 
                                                        AND s3.DECOSUBCODE04 = p.SUBCODE04 
                                                        AND s3.DECOSUBCODE05 = p.SUBCODE05 
                                                        AND s3.DECOSUBCODE06 = p.SUBCODE06 
                                                        AND s3.DECOSUBCODE07 = p.SUBCODE07
                                                        AND s3.DECOSUBCODE08 = p.SUBCODE08 
                                                    LEFT JOIN (
                                                                SELECT 
                                                                    STOCKTRANSACTION.PRODUCTIONORDERCODE,
                                                                    STOCKTRANSACTION.ORDERLINE,
                                                                    STOCKTRANSACTION.DECOSUBCODE01,
                                                                    STOCKTRANSACTION.DECOSUBCODE02,
                                                                    STOCKTRANSACTION.DECOSUBCODE03,
                                                                    STOCKTRANSACTION.DECOSUBCODE04,
                                                                    STOCKTRANSACTION.DECOSUBCODE05,
                                                                    STOCKTRANSACTION.DECOSUBCODE06,
                                                                    STOCKTRANSACTION.DECOSUBCODE07,
                                                                    STOCKTRANSACTION.DECOSUBCODE08,
                                                                    STOCKTRANSACTION.USERPRIMARYQUANTITY 
                                                                    FROM STOCKTRANSACTION STOCKTRANSACTION
                                                                WHERE 
                                                                    STOCKTRANSACTION.ITEMTYPECODE ='DYC'
                                                                    AND NOT STOCKTRANSACTION.TEMPLATECODE = '313'
                                                                    AND (STOCKTRANSACTION.DETAILTYPE = 1 OR STOCKTRANSACTION.DETAILTYPE = 0)
                                                    ) s4 ON s4.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE 
                                                            AND s4.ORDERLINE = p.GROUPLINE 
                                                        AND s4.DECOSUBCODE01 = p.SUBCODE01 
                                                        AND s4.DECOSUBCODE02 = p.SUBCODE02 
                                                        AND s4.DECOSUBCODE03 = p.SUBCODE03 
                                                        AND s4.DECOSUBCODE04 = p.SUBCODE04 
                                                        AND s4.DECOSUBCODE05 = p.SUBCODE05 
                                                        AND s4.DECOSUBCODE06 = p.SUBCODE06 
                                                        AND s4.DECOSUBCODE07 = p.SUBCODE07
                                                        AND s4.DECOSUBCODE08 = p.SUBCODE08 
                                                    LEFT JOIN (
                                                                SELECT 
                                                                    STOCKTRANSACTION.PRODUCTIONORDERCODE,
                                                                    STOCKTRANSACTION.ORDERLINE,
                                                                    STOCKTRANSACTION.ITEMTYPECODE,
                                                                    STOCKTRANSACTION.DECOSUBCODE01,
                                                                    STOCKTRANSACTION.DECOSUBCODE02,
                                                                    STOCKTRANSACTION.DECOSUBCODE03,
                                                                    STOCKTRANSACTION.DECOSUBCODE04,
                                                                    STOCKTRANSACTION.DECOSUBCODE05,
                                                                    STOCKTRANSACTION.DECOSUBCODE06,
                                                                    STOCKTRANSACTION.DECOSUBCODE07,
                                                                    STOCKTRANSACTION.DECOSUBCODE08,
                                                                    STOCKTRANSACTION.USERPRIMARYQUANTITY 
                                                                    FROM STOCKTRANSACTION STOCKTRANSACTION
                                                                WHERE 
                                                                    STOCKTRANSACTION.ITEMTYPECODE ='DYC'
                                                                    AND NOT STOCKTRANSACTION.TEMPLATECODE = '313'
                                                                    AND (STOCKTRANSACTION.DETAILTYPE = 1 OR STOCKTRANSACTION.DETAILTYPE = 0)
                                                    ) s5 ON s5.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE 
                                                            AND s5.ORDERLINE = p.GROUPLINE 
                                                        AND s5.DECOSUBCODE01 = p.SUBCODE01 
                                                        AND s5.DECOSUBCODE02 = p.SUBCODE02 
                                                        AND s5.DECOSUBCODE03 = p.SUBCODE03 
                                                        AND s5.DECOSUBCODE04 = p.SUBCODE04 
                                                        AND s5.DECOSUBCODE05 = p.SUBCODE05 
                                                        AND s5.DECOSUBCODE06 = p.SUBCODE06 
                                                        AND s5.DECOSUBCODE07 = p.SUBCODE07
                                                        AND s5.DECOSUBCODE08 = p.SUBCODE08 
                                                    LEFT JOIN PRODUCT p3 ON
                                                        p3.ITEMTYPECODE = s5.ITEMTYPECODE
                                                        AND p3.SUBCODE01 = s5.DECOSUBCODE01
                                                        AND p3.SUBCODE02 = s5.DECOSUBCODE02
                                                        AND p3.SUBCODE03 = s5.DECOSUBCODE03
                                                    WHERE 
                                                        p.PRODUCTIONORDERCODE = '$row_stocktransaction[PRODUCTIONORDERCODE]' 
                                                        AND (s2.USERPRIMARYQUANTITY is NOT NULL 
                                                            OR s3.USERPRIMARYQUANTITY is NOT NULL 
                                                            or  s4.USERPRIMARYQUANTITY is NOT NULL 
                                                        or s5.USERPRIMARYQUANTITY is NOT NULL)
                                                    -- AND TRIM(p.SUBCODE01) || '-' || TRIM(p.SUBCODE02) || '-' || TRIM(p.SUBCODE03) = 'E-1-002'
                                                    -- AND s2.USERPRIMARYQUANTITY IS NOT NULL
                                                    --    AND GROUPLINE = '$row_stocktransaction[ORDERLINE]'
                                                        AND p.SUBCODE01 = '$row_stocktransaction[DECOSUBCODE01]' 
                                                        AND p.SUBCODE02 = '$row_stocktransaction[DECOSUBCODE02]' 
                                                        AND p.SUBCODE03 = '$row_stocktransaction[DECOSUBCODE03]'
                                                    GROUP BY
                                                        p.PRODUCTIONORDERCODE,
                                                        p3.LONGDESCRIPTION,
                                                        p.GROUPLINE,
                                                        p.GROUPSTEPNUMBER,
                                                        s2.USERPRIMARYQUANTITY,
                                                        s3.USERPRIMARYQUANTITY,
                                                        s4.USERPRIMARYQUANTITY,
                                                        s5.USERPRIMARYQUANTITY,
                                                        p2.CODE,
                                                        p.GROUPLINE,
                                                        p.SUBCODE01,
                                                        p.SUBCODE02,
                                                        p.SUBCODE03,
                                                        p.PRODRESERVATIONLINKGROUPCODE
                                                        )
                                                        GROUP BY 
                                                        KODE_OBAT,
                                                        LONGDESCRIPTION,
                                                        SUBCODE01,
                                                        SUBCODE02,
                                                        SUBCODE03,
                                                        KETERANGAN
                                                        )
                                                    GROUP BY 
                                                        KODE_OBAT,
                                                        LONGDESCRIPTION,
                                                        SUBCODE01,
                                                        SUBCODE02,
                                                        SUBCODE03");
                                                    
        $row_reservation    = db2_fetch_assoc($db_reservation);
?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row_reservation['KODE_OBAT']; ?></td>
            <td><?= $row_reservation['LONGDESCRIPTION']; ?></td>
            <td></td>
            <td></td>
            <td><?= number_format($row_reservation['QTY_NORMAL'], 2); ?></td>
            <td><?= number_format($row_reservation['QTY_OBAT_PERBAIKAN'], 2); ?></td>
            <td><?= number_format($row_reservation['QTY_TAMBAH_OBAT'], 2); ?></td>
            <td></td>
            <td></td>
            <td><?= number_format($row_reservation['QTY_OBAT_DYE'], 2); ?></td>
            <td><?= number_format($row_reservation['QTY_NORMAL']+$row_reservation['QTY_OBAT_PERBAIKAN']+$row_reservation['QTY_TAMBAH_OBAT']+$row_reservation['QTY_OBAT_DYE'], 2); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    <?php
} ?>
    </tbody>
</table>
</body>
</html>
