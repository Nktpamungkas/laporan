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

    $db_stocktransaction = db2_exec($conn1, "SELECT DISTINCT DECOSUBCODE01,
                                                            DECOSUBCODE02,
                                                            DECOSUBCODE03,
                                                            LONGDESCRIPTION,
                                                            KODE_OBAT,
                                                            SUM(AKTUAL_QTY) AS AKTUAL_QTY
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
                                                                CASE
                                                                    WHEN s.TEMPLATECODE = '303' AND s.USERPRIMARYUOMCODE = 'kg' THEN SUM(s.USERPRIMARYQUANTITY)*1000
                                                                    WHEN s.TEMPLATECODE = '303' AND s.USERPRIMARYUOMCODE = 'g'  THEN SUM(s.USERPRIMARYQUANTITY)
                                                                    WHEN s.TEMPLATECODE = '203' AND s.USERPRIMARYUOMCODE = 'kg' THEN SUM(s.USERPRIMARYQUANTITY)*1000
                                                                    WHEN s.TEMPLATECODE = '203' AND s.USERPRIMARYUOMCODE = 'g'  THEN SUM(s.USERPRIMARYQUANTITY)
                                                                    WHEN s.TEMPLATECODE = '201' AND s.USERPRIMARYUOMCODE = 'kg' THEN SUM(s.USERPRIMARYQUANTITY)*1000
                                                                    WHEN s.TEMPLATECODE = '201' AND s.USERPRIMARYUOMCODE = 'g'  THEN SUM(s.USERPRIMARYQUANTITY)
                                                                    ELSE 0
                                                                END AS AKTUAL_QTY,
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
                                                        KODE_OBAT,
                                                            DECOSUBCODE01,
                                                            DECOSUBCODE02,
                                                            LONGDESCRIPTION,
                                                            DECOSUBCODE03
                                                            ");
// Periksa apakah query berhasil dieksekusi
if (!$db_stocktransaction) {
    die("Error executing query: " . db2_stmt_errormsg());
}
    $no = 1;
    while ($row_stocktransaction = db2_fetch_assoc($db_stocktransaction)) {

S$db_reservation   = db2_exec($conn1, "SELECT 
                                        KODE_OBAT,
                                        KETERANGAN,
                                        DECOSUBCODE01,
                                        DECOSUBCODE02,
                                        DECOSUBCODE03,
                                        SUM(USERPRIMARYQUANTITY) AS USERPRIMARYQUANTITY
                                        FROM (
                                        SELECT DISTINCT 
                                            CASE
                                                WHEN s.TEMPLATECODE = '120' THEN TRIM(s.DECOSUBCODE01) || '-' || TRIM(s.DECOSUBCODE02) || '-' || TRIM(s.DECOSUBCODE03)
                                                WHEN s.TEMPLATECODE IN ('303', '304', '203', '201') THEN TRIM(s.DECOSUBCODE01) || '-' || TRIM(s.DECOSUBCODE02) || '-' || TRIM(s.DECOSUBCODE03)
                                                ELSE s.TEMPLATECODE
                                            END AS KODE_OBAT,
                                            s.DECOSUBCODE01,
                                            s.DECOSUBCODE02,
                                            s.DECOSUBCODE03,
                                            CASE
                                                WHEN p2.CODE LIKE '%T[1-7]%' THEN 'Tambah Obat'
                                                WHEN p2.CODE LIKE '%R[1-7]%' THEN 'Perbaikan'
                                                ELSE COALESCE(p.PRODRESERVATIONLINKGROUPCODE, p3.OPERATIONCODE)
                                            END AS KETERANGAN,
                                            s.USERPRIMARYQUANTITY
                                        FROM 
                                            PRODUCTIONRESERVATION p 
                                        LEFT JOIN PRODRESERVATIONLINKGROUP p2 ON p2.CODE = p.PRODRESERVATIONLINKGROUPCODE 
                                        LEFT JOIN (
                                            SELECT 
                                                CASE
                                                    WHEN STOCKTRANSACTION.PRODUCTIONORDERCODE IS NULL THEN STOCKTRANSACTION.ORDERCODE
                                                    ELSE STOCKTRANSACTION.PRODUCTIONORDERCODE
                                                END AS PRODUCTIONORDERCODE,
                                                STOCKTRANSACTION.ORDERLINE,
                                                STOCKTRANSACTION.TEMPLATECODE,
                                                STOCKTRANSACTION.DECOSUBCODE01,
                                                STOCKTRANSACTION.DECOSUBCODE02,
                                                STOCKTRANSACTION.DECOSUBCODE03,
                                                STOCKTRANSACTION.USERPRIMARYQUANTITY 
                                            FROM STOCKTRANSACTION STOCKTRANSACTION
                                            WHERE 
                                                STOCKTRANSACTION.ITEMTYPECODE ='DYC'
                                                AND STOCKTRANSACTION.LOGICALWAREHOUSECODE = '$warehouse'
                                                AND NOT STOCKTRANSACTION.TEMPLATECODE = '313'
                                                AND STOCKTRANSACTION.TRANSACTIONDATE BETWEEN '$tgl' AND '$tgl2'
                                                AND CAST(STOCKTRANSACTION.TRANSACTIONDATE || ' ' || STOCKTRANSACTION.TRANSACTIONTIME AS TIMESTAMP) BETWEEN '$tgl $time:00' AND '$tgl2 $time2:00'
                                                AND (STOCKTRANSACTION.DETAILTYPE = 1 OR STOCKTRANSACTION.DETAILTYPE = 0)
                                        ) s ON s.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE 
                                        AND s.ORDERLINE = p.GROUPLINE 
                                        AND s.DECOSUBCODE01 = p.SUBCODE01 
                                        AND s.DECOSUBCODE02 = p.SUBCODE02 
                                        AND s.DECOSUBCODE03 = p.SUBCODE03 
                                        LEFT JOIN PRODUCTIONDEMANDSTEP p3 ON p3.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE
                                        AND p3.STEPNUMBER = p.STEPNUMBER 
                                        AND p3.GROUPSTEPNUMBER = p.GROUPSTEPNUMBER 
                                        WHERE 
                                            p.PROGRESSSTATUS IN (1, 2)
                                            AND p.USEDUSERPRIMARYQUANTITY <> 0
                                            AND p.ITEMTYPEAFICODE ='DYC'
                                        --        AND p.PRODUCTIONORDERCODE IN ('00131034','00131064')
                                        GROUP BY 
                                            s.DECOSUBCODE01,
                                            s.DECOSUBCODE02,
                                            s.DECOSUBCODE03,
                                            p3.OPERATIONCODE,
                                            s.TEMPLATECODE,
                                            s.USERPRIMARYQUANTITY,
                                            p.STEPNUMBER,
                                            p2.CODE,
                                            p.PRODRESERVATIONLINKGROUPCODE
                                        ) AS subquery
                                        WHERE 
                                        DECOSUBCODE01 IS NOT NULL
                                        AND DECOSUBCODE01 = '$row_stocktransaction[DECOSUBCODE01]' 
                                        AND DECOSUBCODE02 = '$row_stocktransaction[DECOSUBCODE02]' 
                                        AND DECOSUBCODE03 = '$row_stocktransaction[DECOSUBCODE03]' 
                                        GROUP BY 
                                        KODE_OBAT,
                                        DECOSUBCODE01,
                                        DECOSUBCODE02,
                                        DECOSUBCODE03,
                                        KETERANGAN");
$row_reservation    = db2_fetch_assoc($db_reservation);
?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row_stocktransaction['KODE_OBAT']; ?></td>
            <td><?= $row_stocktransaction['LONGDESCRIPTION']; ?></td>
            <td></td>
            <td></td>
            <td>
                <?php if($row_reservation['KETERANGAN'] !== 'Perbaikan' OR $row_reservation['KETERANGAN'] !== 'Tambah Obat') : ?>
                    <?php  echo number_format($row_reservation['USERPRIMARYQUANTITY'] + $row_stocktransaction['AKTUAL_QTY'], 2);  ?>
                <?php else : ?>
                    0
                <?php endif; ?>
            </td>
            <td>
                <?php if($row_reservation['KETERANGAN'] == 'Perbaikan' ): ?>
                    <?php  echo number_format($row_reservation['USERPRIMARYQUANTITY']);  ?>
                <?php else : ?>
                    0
                <?php endif; ?>
            </td>
            <td>
                <?php if($row_reservation['KETERANGAN'] == 'Tambah Obat') : ?>
                    <?php  echo number_format($row_reservation['USERPRIMARYQUANTITY']);  ?>
                <?php else : ?>
                    0
                <?php endif; ?>  
            </td>
            <td></td>
            <td></td>
            <td> </td>
            <td>
                <?php 
                    echo number_format( $row_qty_perbaikan['USERPRIMARYQUANTITY']+ $row_qty_tambahobat['USERPRIMARYQUANTITY']+ $row_qty_DYE['USERPRIMARYQUANTITY']+ $row_stocktransaction['AKTUAL_QTY'], 2);           
                ?> 
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
