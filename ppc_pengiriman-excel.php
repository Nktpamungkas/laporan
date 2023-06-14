<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Laporan Pengiriman.xls");
    header('Cache-Control: max-age=0');
?>
<table border="1" width="100%">
    <thead>
        <tr>
            <th colspan="15">Laporan Harian Pengiriman Export</th>
        </tr>
        <tr>
            <th colspan="15">FW-02-PPC-04/02</th>
        </tr>
        <tr>
            <th colspan="15"><?php $date = date_create($_GET['tgl1'] ); echo date_format($date,"M-Y"); ?></th>
        </tr>
        <tr>
            <th>NO</th>
            <th>TANGGAL</th>
            <th>NO SJ</th>
            <th>WARNA</th>
            <th>ROLL</th>
            <th>QUANTITY</th>
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

            if($tgl1){
                $where_date     = "i.GOODSISSUEDATE = '$tgl1'";
            }else{
                $where_date     = "";
            }
            $sqlDB2 = "SELECT 
                            i.PROVISIONALCODE,
                            i.DEFINITIVEDOCUMENTDATE,
                            i.ORDERPARTNERBRANDCODE,
                            i.PO_NUMBER,
                            i.PROJECTCODE,
                            DAY(i.GOODSISSUEDATE) ||'-'|| MONTHNAME(i.GOODSISSUEDATE) ||'-'|| YEAR(i.GOODSISSUEDATE) AS GOODSISSUEDATE,
                            i.ORDPRNCUSTOMERSUPPLIERCODE,
                            i.PAYMENTMETHODCODE,
                            i.EXTERNALITEMCODE,    
                            i.ITEMTYPEAFICODE,
                            i.SUBCODE01,
                            i.SUBCODE02,
                            i.SUBCODE03,
                            i.SUBCODE04,
                            i.SUBCODE05,
                            i.SUBCODE06,
                            i.SUBCODE07,
                            i.SUBCODE08,
                            i.DLVSALORDERLINESALESORDERCODE,
                            i.DLVSALESORDERLINEORDERLINE,
                            i.ITEMDESCRIPTION,
                            i.ORDERLINE,
                            LISTAGG(TRIM(i.LOTCODE), ', ') AS LOTCODE,
                            LISTAGG(DBL.PRODUCTIONDEMANDCODE, ', ') AS PRODUCTIONDEMANDCODE,
                            i.CODE,
                            i2.WARNA
                        FROM 
                            ITXVIEWLAPKIRIMPPC i 
                        LEFT JOIN ITXVIEW_DEMANDBYLOTCODE DBL ON DBL.PRODUCTIONORDERCODE = i.LOTCODE AND DBL.DLVSALESORDERLINEORDERLINE = i.DLVSALESORDERLINEORDERLINE
                        LEFT JOIN ITXVIEWCOLOR i2 ON i2.ITEMTYPECODE =  i.ITEMTYPEAFICODE
                                                AND i2.SUBCODE01 = i.SUBCODE01 AND i2.SUBCODE02 = i.SUBCODE02
                                                AND i2.SUBCODE03 = i.SUBCODE03 AND i2.SUBCODE04 = i.SUBCODE04
                                                AND i2.SUBCODE05 = i.SUBCODE05 AND i2.SUBCODE06 = i.SUBCODE06
                                                AND i2.SUBCODE07 = i.SUBCODE07 AND i2.SUBCODE08 = i.SUBCODE08
                        WHERE 
                            $where_date
                        GROUP BY 
                            i.PROVISIONALCODE,
                            i.DEFINITIVEDOCUMENTDATE,
                            i.ORDERPARTNERBRANDCODE,
                            i.PO_NUMBER,
                            i.PROJECTCODE,
                            i.GOODSISSUEDATE,
                            i.ORDPRNCUSTOMERSUPPLIERCODE,
                            i.PAYMENTMETHODCODE,
                            i.EXTERNALITEMCODE,    
                            i.ITEMTYPEAFICODE,
                            i.SUBCODE01,
                            i.SUBCODE02,
                            i.SUBCODE03,
                            i.SUBCODE04,
                            i.SUBCODE05,
                            i.SUBCODE06,
                            i.SUBCODE07,
                            i.SUBCODE08,
                            i.DLVSALORDERLINESALESORDERCODE,
                            i.DLVSALESORDERLINEORDERLINE,
                            i.ITEMDESCRIPTION,
                            i.ORDERLINE,
                            i.CODE,
                            i2.WARNA
                        ORDER BY 
	                        i.PROVISIONALCODE ASC";
            $stmt   = db2_exec($conn1,$sqlDB2);
            $no = 1;
            while ($rowdb2 = db2_fetch_assoc($stmt)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $rowdb2['GOODSISSUEDATE']; ?></td> 
            <td><?= $rowdb2['PROVISIONALCODE']; ?></td> 
            <td><?= $rowdb2['WARNA']; ?></td> 
            <td>
                <?php
                    $q_roll     = db2_exec($conn1, "SELECT COUNT(CODE) AS ROLL,
                                                            SUM(BASEPRIMARYQUANTITY) AS QTY_SJ
                                                    FROM 
                                                        ITXVIEWALLOCATION0 
                                                    WHERE 
                                                        CODE = '$rowdb2[CODE]'");
                    $d_roll     = db2_fetch_assoc($q_roll);
                    echo $d_roll['ROLL'];
                ?>
            </td> 
            <td><?= $d_roll['QTY_SJ'] ?></td> 
            <td><?= $rowdb2['ORDERPARTNERBRANDCODE']; ?></td> 
            <td>
                <?php
                    $q_pelanggan    = db2_exec($conn1, "SELECT * FROM ITXVIEW_PELANGGAN WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$rowdb2[ORDPRNCUSTOMERSUPPLIERCODE]' 
                                                                                        AND CODE = '$rowdb2[DLVSALORDERLINESALESORDERCODE]'");
                    $r_pelanggan    = db2_fetch_assoc($q_pelanggan);
                    echo $r_pelanggan['LANGGANAN'];
                ?>
            </td> 
            <td>`<?= $rowdb2['PO_NUMBER']; ?></td> 
            <td><?= $rowdb2['DLVSALORDERLINESALESORDERCODE']; ?></td> 
            <td><?= $rowdb2['ITEMDESCRIPTION']; ?></td> 
            <td>`<?= $rowdb2['LOTCODE']; ?></td> 
            <td>`<?= $rowdb2['PRODUCTIONDEMANDCODE']; ?></td> 
            <td><?php if($rowdb2['PAYMENTMETHODCODE'] == 'FOC'){ echo $rowdb2['PAYMENTMETHODCODE']; } ?></td> 
            <td><?= $rowdb2['ITEMTYPEAFICODE']; ?></td> 
        </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" align="left">Total Tanggal <?php $date = date_create($_GET['tgl1'] ); echo date_format($date,"d"); ?></th>
            <th colspan="1" align="center">
                <?php
                    $q_sumRoll   = db2_exec($conn1, "SELECT 
                                                            COUNT(i2.BASEPRIMARYQUANTITY) AS SUM_ROLL_SJ
                                                        FROM 
                                                            ITXVIEWLAPKIRIMPPC i 
                                                        LEFT JOIN ITXVIEWALLOCATION0 i2 ON i2.CODE = i.CODE
                                                        WHERE 
                                                            i.GOODSISSUEDATE = '$_GET[tgl1]'");
                    $r_sumRoll   = db2_fetch_assoc($q_sumRoll);
                    echo number_format($r_sumRoll['SUM_ROLL_SJ'], 0)
                ?>
            </th>
            <th colspan="2" align="center">
                <?php
                    $q_sumQty   = db2_exec($conn1, "SELECT 
                                                            SUM(i2.BASEPRIMARYQUANTITY) AS SUM_QTY_SJ
                                                        FROM 
                                                            ITXVIEWLAPKIRIMPPC i 
                                                        LEFT JOIN ITXVIEWALLOCATION0 i2 ON i2.CODE = i.CODE
                                                        WHERE 
                                                            i.GOODSISSUEDATE = '$_GET[tgl1]'");
                    $r_sumQty   = db2_fetch_assoc($q_sumQty);
                    echo number_format($r_sumQty['SUM_QTY_SJ'], 2)
                ?>
            </th>
            <th colspan="3" align="center">SINGGIH</th>
            <th colspan="5" align="center">PUTRI</th>
        </tr>
        <tr>
            <th colspan="4" align="left">Total Tanggal 01 S/D <?php echo date('d', strtotime('-1 days', strtotime($_GET['tgl1']))); ?></th>
            <th colspan="1" align="center">
                <?php
                    $tanggal_awal               = date('Y-m', strtotime('-1 days', strtotime($_GET['tgl1']))).'-01';
                    $tanggal_akhir_minus1Hari   = date('Y-m-d', strtotime('-1 days', strtotime($_GET['tgl1'])));
                    $q_sumRoll_2   = db2_exec($conn1, "SELECT 
                                                            COUNT(i2.BASEPRIMARYQUANTITY) AS SUM_ROLL_SJ
                                                        FROM 
                                                            ITXVIEWLAPKIRIMPPC i 
                                                        LEFT JOIN ITXVIEWALLOCATION0 i2 ON i2.CODE = i.CODE
                                                        WHERE 
                                                            i.GOODSISSUEDATE BETWEEN '$tanggal_awal' AND '$tanggal_akhir_minus1Hari'");
                    $r_sumRoll_2   = db2_fetch_assoc($q_sumRoll_2);
                    echo number_format($r_sumRoll_2['SUM_ROLL_SJ'], 0)
                ?>
            </th>
            <th colspan="2" align="center">
                <?php
                    $tanggal_awal               = date('Y-m', strtotime('-1 days', strtotime($_GET['tgl1']))).'-01';
                    $tanggal_akhir_minus1Hari   = date('Y-m-d', strtotime('-1 days', strtotime($_GET['tgl1'])));
                    $q_sumQty_2   = db2_exec($conn1, "SELECT 
                                                            SUM(i2.BASEPRIMARYQUANTITY) AS SUM_QTY_SJ
                                                        FROM 
                                                            ITXVIEWLAPKIRIMPPC i 
                                                        LEFT JOIN ITXVIEWALLOCATION0 i2 ON i2.CODE = i.CODE
                                                        WHERE 
                                                            i.GOODSISSUEDATE BETWEEN '$tanggal_awal' AND '$tanggal_akhir_minus1Hari'");
                    $r_sumQty_2   = db2_fetch_assoc($q_sumQty_2);
                    echo number_format($r_sumQty_2['SUM_QTY_SJ'], 2)
                ?>
            </th>
            <th colspan="3" align="center">STAFF</th>
            <th colspan="5" align="center">PPC AST. MANAGER</th>
        </tr>
        <tr>
            <th colspan="4" align="left">Total Tanggal 01 S/D <?= date('d', $_GET['tgl1']); ?></th>
            <th colspan="1" align="center">
                <?php
                    $tanggal_awal   = date('Y-m', strtotime('-1 days', strtotime($_GET['tgl1']))).'-01';
                    $tanggal_akhir  = date('Y-m-d', strtotime($_GET['tgl1']));
                    $q_sumRoll_3   = db2_exec($conn1, "SELECT 
                                                            COUNT(i2.BASEPRIMARYQUANTITY) AS SUM_ROLL_SJ
                                                        FROM 
                                                            ITXVIEWLAPKIRIMPPC i 
                                                        LEFT JOIN ITXVIEWALLOCATION0 i2 ON i2.CODE = i.CODE
                                                        WHERE 
                                                            i.GOODSISSUEDATE BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
                    $r_sumRoll_3   = db2_fetch_assoc($q_sumRoll_3);
                    echo number_format($r_sumRoll_3['SUM_ROLL_SJ'], 2)
                ?>
            </th>
            <th colspan="2" align="center">
                <?php
                    $tanggal_awal   = date('Y-m', strtotime('-1 days', strtotime($_GET['tgl1']))).'-01';
                    $tanggal_akhir  = date('Y-m-d', strtotime($_GET['tgl1']));
                    $q_sumQty_3   = db2_exec($conn1, "SELECT 
                                                            SUM(i2.BASEPRIMARYQUANTITY) AS SUM_QTY_SJ
                                                        FROM 
                                                            ITXVIEWLAPKIRIMPPC i 
                                                        LEFT JOIN ITXVIEWALLOCATION0 i2 ON i2.CODE = i.CODE
                                                        WHERE 
                                                            i.GOODSISSUEDATE BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
                    $r_sumQty_3   = db2_fetch_assoc($q_sumQty_3);
                    echo number_format($r_sumQty_3['SUM_QTY_SJ'], 2)
                ?>
            </th>
            <th colspan="3" align="center"><?= date('d-M-Y', strtotime($_GET['tgl1'])); ?></th>
            <th colspan="5" align="center"><?= date('d-M-Y', strtotime($_GET['tgl1'])); ?></th>
        </tr>
        <tr>
            <th colspan="5"><br></th>
            <th colspan="2"><br></th>
            <th colspan="3"><br><br><br></th>
            <th colspan="5"><br><br><br></th>
        </tr>
    </tfoot>
</table>