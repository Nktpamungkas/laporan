<?php 
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php";
?>
<?php
// Mulai session
session_start();

// Set nilai-nilai $_POST ke dalam session saat formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['tgl'] = $_POST['tgl'];
    $_SESSION['time'] = $_POST['time'];
    $_SESSION['tgl2'] = $_POST['tgl2'];
    $_SESSION['time2'] = $_POST['time2'];
    $_SESSION['warehouse'] = $_POST['warehouse'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>LAB - laporan Pemakaian Obat Gd. Kimia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <link rel="icon" href="files\assets\images\favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="files\bower_components\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\icon\themify-icons\themify-icons.css">
    <link rel="stylesheet" type="text/css" href="files\assets\icon\icofont\css\icofont.css">
    <link rel="stylesheet" type="text/css" href="files\assets\icon\feather\css\feather.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\prism\prism.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\pcoded-horizontal.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\data-table\extensions\buttons\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\jquery.mCustomScrollbar.css">
</head>
<?php require_once 'header.php'; ?>
<body>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Filter Data</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-2 m-b-0">
                                                    <h4 class="sub-title">Tanggal Awal</h4>
                                                    <div class="input-group input-group-sm">
                                                        <input type="date" class="form-control" required placeholder="input-group-sm" name="tgl" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl']; } ?>" required>
                                                        <input name="time" type="text" class="form-control" id="time" placeholder="00:00" pattern="[0-9]{2}:[0-9]{2}$" title=" e.g 14:25" onkeyup="
																				var time = this.value;
																				if (time.match(/^\d{2}$/) !== null) {
																					this.value = time + ':';
																				} else if (time.match(/^\d{2}\:\d{2}$/) !== null) {
																					this.value = time + '';
																				}" value="<?php if (isset($_POST['submit'])){ echo $_POST['time']; } ?>" size="5" maxlength="5" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-0">
                                                    <h4 class="sub-title">Tanggal Akhir</h4>
                                                    <div class="input-group input-group-sm">
                                                        <input type="date" class="form-control" required placeholder="input-group-sm" name="tgl2" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl2']; } ?>" required>
                                                        <input name="time2" type="text" class="form-control" id="time2" placeholder="00:00" pattern="[0-9]{2}:[0-9]{2}$" title=" e.g 14:25" onkeyup="
																				var time = this.value;
																				if (time.match(/^\d{2}$/) !== null) {
																					this.value = time + ':';
																				} else if (time.match(/^\d{2}\:\d{2}$/) !== null) {
																					this.value = time + '';
																				}" value="<?php if (isset($_POST['submit'])){ echo $_POST['time2']; } ?>" size="5" maxlength="5" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-2 m-b-0">
                                                    <h4 class="sub-title">LOGICAL WAREHOUSE</h4>
                                                    <div class="input-group input-group-sm">
                                                        <select name="warehouse" class="form-control" style="width: 100%;" required>
                                                            <option value="M510">M510</option>
                                                            <?php 
                                                                $sqlDB  =   "SELECT  
                                                                                TRIM(CODE) AS CODE,
                                                                                LONGDESCRIPTION 
                                                                            FROM
                                                                                LOGICALWAREHOUSE
                                                                            ORDER BY 
                                                                                CODE ASC";
                                                                $stmt   =   db2_exec($conn1, $sqlDB);
                                                                while ($rowdb = db2_fetch_assoc($stmt)) {
                                                            ?>
                                                            <option value="<?= $rowdb['CODE']; ?>" <?php if($rowdb['CODE'] == $_POST['warehouse']){ echo "SELECTED"; } ?>>
                                                                <?= $rowdb['CODE']; ?> <?= $rowdb['LONGDESCRIPTION']; ?>
                                                            </option>
                                                            <?php } ?> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <h4 class="sub-title">&nbsp;</h4>
                                                    <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="icofont icofont-search-alt-1"></i> Cari data</button>
                                                        <?php if (isset($_POST['submit'])) { ?>
                                                            <a href="print_laporan pemakaian_obat2.php" class="btn btn-info btn-sm"><i class="icofont icofont-print"></i>Download Test</a>
                                                        <?php } ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST['submit'])) : ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header table-card-header">
                                                    <h5>LAPORAN HARIAN PEMAKAIAN OBAT GUDANG KIMIA</h5>
                                                </div>
                                                <div class="card-block">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="basic-btn" class="table compact table-striped table-bordered nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <!-- <th>No</th> -->
                                                                    <th>No. Group Line</th>
                                                                    <th>Tanggal & Jam</th>
                                                                    <th>Kode Obat</th>
                                                                    <th>QTY TARGET</th>
                                                                    <th>QTY Actual</th>
                                                                    <th>SATUAN</th>
                                                                    <th>KETERANGAN</th>
                                                                    <th>NAMA OBAT</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    if($_POST['time'] && $_POST['time2']){
                                                                        $where_time     = "AND s.TRANSACTIONTIME BETWEEN '$_POST[time]' AND '$_POST[time2]'";
                                                                    }else{
                                                                        $where_time     = "";
                                                                    }
                                                                    $db_stocktransaction   = db2_exec($conn1, "SELECT 
                                                                                                                    * 
                                                                                                                FROM 
                                                                                                                (SELECT
                                                                                                                    s.TRANSACTIONDATE || ' ' || s.TRANSACTIONTIME AS TGL,
                                                                                                                    TIMESTAMP(s.TRANSACTIONDATE, s.TRANSACTIONTIME) AS TGL_WAKTU,
                                                                                                                    CASE
                                                                                                                        WHEN s.PRODUCTIONORDERCODE IS NULL THEN COALESCE(s.ORDERCODE, s.LOTCODE)
                                                                                                                        ELSE s.PRODUCTIONORDERCODE
                                                                                                                    END AS PRODUCTIONORDERCODE,
                                                                                                                    s.ORDERLINE,
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
                                                                                                                    s.USERPRIMARYQUANTITY AS AKTUAL_QTY,
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
                                                                                                                LEFT JOIN PRODUCT p ON p.ITEMTYPECODE = s.ITEMTYPECODE
                                                                                                                    AND p.SUBCODE01 = s.DECOSUBCODE01
                                                                                                                    AND p.SUBCODE02 = s.DECOSUBCODE02
                                                                                                                    AND p.SUBCODE03 = s.DECOSUBCODE03
                                                                                                                LEFT JOIN INTERNALDOCUMENT i ON i.PROVISIONALCODE = s.ORDERCODE
                                                                                                                LEFT JOIN ORDERPARTNER o ON o.CUSTOMERSUPPLIERCODE = i.ORDPRNCUSTOMERSUPPLIERCODE
                                                                                                                LEFT JOIN LOGICALWAREHOUSE l ON l.CODE = o.CUSTOMERSUPPLIERCODE
                                                                                                                LEFT JOIN STOCKTRANSACTION s2 ON s2.TRANSACTIONNUMBER = s.TRANSACTIONNUMBER AND s2.DETAILTYPE = 2
                                                                                                                LEFT JOIN LOGICALWAREHOUSE l2 ON l2.CODE = s2.LOGICALWAREHOUSECODE
                                                                                                                WHERE
                                                                                                                    s.ITEMTYPECODE = 'DYC'
                                                                                                                    AND s.LOGICALWAREHOUSECODE = '$_POST[warehouse]'
                                                                                                                    AND s.TRANSACTIONDATE BETWEEN '$_POST[tgl]' AND '$_POST[tgl2]'
                                                                                                                    AND NOT s.TEMPLATECODE = '313'
                                                                                                                    AND (s.DETAILTYPE = 1 OR s.DETAILTYPE = 0)
                                                                                                                ORDER BY
                                                                                                                    s.PRODUCTIONORDERCODE ASC)
                                                                                                                WHERE
                                                                                                                    TGL_WAKTU BETWEEN '$_POST[tgl] $_POST[time]:00' AND '$_POST[tgl2] $_POST[time2]:00'");

                                                                                    if ($db_stocktransaction->num_rows > 0) {
                                                                                        // Inisialisasi array untuk menyimpan data
                                                                                        $data_array = array();
                                                                    $no = 1;
                                                                    while ($row_stocktransaction = db2_fetch_assoc($db_stocktransaction)) {
                                                                        $db_reservation     = db2_exec($conn1, "SELECT 
                                                                                                                    TRIM(p.PRODUCTIONORDERCODE) || '-' || TRIM(p.GROUPSTEPNUMBER) AS NO_RESEP,
                                                                                                                    p.GROUPSTEPNUMBER,
                                                                                                                    SUM(p.USERPRIMARYQUANTITY) AS USERPRIMARYQUANTITY,
                                                                                                                    CASE
                                                                                                                        WHEN p2.CODE LIKE '%T1%' OR p2.CODE LIKE '%T2%' OR p2.CODE LIKE '%T3%' OR p2.CODE LIKE '%T4%' OR p2.CODE LIKE '%T5%' OR p2.CODE LIKE '%T6%' OR p2.CODE LIKE '%T7%' THEN 'Tambah Obat'
                                                                                                                        WHEN p2.CODE LIKE '%R1%' OR p2.CODE LIKE '%R2%' OR p2.CODE LIKE '%R3%' OR p2.CODE LIKE '%R4%' OR p2.CODE LIKE '%R5%' OR p2.CODE LIKE '%R6%' OR p2.CODE LIKE '%R7%' THEN 'Perbaikan'
                                                                                                                        -- ELSE 'Normal'
                                                                                                                        -- ELSE p.PRODRESERVATIONLINKGROUPCODE
                                                                                                                        ELSE 
                                                                                                                            CASE
                                                                                                                	        	WHEN p.PRODRESERVATIONLINKGROUPCODE IS NULL THEN COALESCE(p3.OPERATIONCODE, p.PRODRESERVATIONLINKGROUPCODE)
                                                                                                                	        	ELSE p.PRODRESERVATIONLINKGROUPCODE
                                                                                                                	        END
                                                                                                                    END AS KETERANGAN
                                                                                                                FROM
                                                                                                                    PRODUCTIONRESERVATION p
                                                                                                                LEFT JOIN PRODRESERVATIONLINKGROUP p2 ON p2.CODE = p.PRODRESERVATIONLINKGROUPCODE 
                                                                                                                LEFT JOIN PRODUCTIONDEMANDSTEP p3 ON p3.STEPNUMBER = p.GROUPSTEPNUMBER AND p3.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE
                                                                                                                WHERE 
                                                                                                                    p.PRODUCTIONORDERCODE = '$row_stocktransaction[PRODUCTIONORDERCODE]' 
                                                                                                                    AND GROUPLINE = '$row_stocktransaction[ORDERLINE]'
                                                                                                                    -- AND p.SUBCODE01 = '$row_stocktransaction[DECOSUBCODE01]' 
                                                                                                                    -- AND p.SUBCODE02 = '$row_stocktransaction[DECOSUBCODE02]' 
                                                                                                                    -- AND p.SUBCODE03 = '$row_stocktransaction[DECOSUBCODE03]'
                                                                                                                GROUP BY
                                                                                                                    p.PRODUCTIONORDERCODE,
                                                                                                                    p.GROUPSTEPNUMBER,
                                                                                                                    p2.CODE,
                                                                                                                    p3.OPERATIONCODE,
                                                                                                                    p.PRODRESERVATIONLINKGROUPCODE");
                                                                        $row_reservation    = db2_fetch_assoc($db_reservation);

                                                                        if ($db_reservation->num_rows > 0) {
                                                                            $ $row_reservation = db2_fetch_assoc($db_reservation);
                                                                            $keterangan = $row_reservation['KETERANGAN'];
                                                                        }

                                                                        $row['keterangan'] = $keterangan;

                                                                ?>
                                                                <tr>
                                                                    <!-- <td><?= $no++; ?></td> -->
                                                                    <td><?php if($row_reservation['NO_RESEP']){ echo $row_reservation['NO_RESEP']; } else { echo $row_stocktransaction['PRODUCTIONORDERCODE']; } ?></td>
                                                                    <td><?= $row_stocktransaction['TGL']; ?></td>
                                                                    <td><?= $row_stocktransaction['KODE_OBAT']; ?></td>
                                                                    <td><?= number_format($row_reservation['USERPRIMARYQUANTITY'], 2); ?></td>
                                                                    <td>
                                                                        <?php if(substr(number_format($row_stocktransaction['AKTUAL_QTY'], 2), -3) == '.00') : ?>
                                                                            <?= number_format($row_stocktransaction['AKTUAL_QTY'], 0); ?>
                                                                        <?php else : ?>
                                                                            <?= number_format($row_stocktransaction['AKTUAL_QTY'], 2); ?>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td><?= $row_stocktransaction['SATUAN']; ?></td>
                                                                    <td>
                                                                        <?php if($row_stocktransaction['TEMPLATECODE'] == '303' OR $row_stocktransaction['TEMPLATECODE'] == '203' OR $row_stocktransaction['TEMPLATECODE'] == '201') : ?>
                                                                            <?= $row_stocktransaction['KETERANGAN']; ?>
                                                                        <?php else : ?>
                                                                            <?= $row_reservation['KETERANGAN']; ?>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td><?= $row_stocktransaction['LONGDESCRIPTION']; ?></td>
                                                                </tr>
                                                                <?php 
                                                                $row['keterangan'] = $keterangan;

                                                                // Menambahkan setiap baris hasil query ke dalam array
                                                                $data_array[] = $row;
                                                                }
                                                                echo "<pre>";
                                                                print_r($data_array);
                                                                echo "</pre>";
                                                            } else {
                                                                echo "Tidak ada data yang ditemukan";
                                                            }
                                                            
                                                                  
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <script type="text/javascript" src="files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <script type="text/javascript" src="files\bower_components\modernizr\js\modernizr.js"></script>
    <script type="text/javascript" src="files\bower_components\modernizr\js\css-scrollbars.js"></script>
    <script src="files\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
    <script src="files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
    <script src="files\assets\pages\data-table\js\jszip.min.js"></script>
    <script src="files\assets\pages\data-table\js\pdfmake.min.js"></script>
    <script src="files\assets\pages\data-table\js\vfs_fonts.js"></script>
    <script src="files\assets\pages\data-table\extensions\buttons\js\dataTables.buttons.min.js"></script>
    <script src="files\assets\pages\data-table\extensions\buttons\js\buttons.flash.min.js"></script>
    <script src="files\assets\pages\data-table\extensions\buttons\js\jszip.min.js"></script>
    <script src="files\assets\pages\data-table\extensions\buttons\js\vfs_fonts.js"></script>
    <script src="files\assets\pages\data-table\extensions\buttons\js\buttons.colVis.min.js"></script>
    <script src="files\bower_components\datatables.net-buttons\js\buttons.print.min.js"></script>
    <script src="files\bower_components\datatables.net-buttons\js\buttons.html5.min.js"></script>
    <script src="files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
    <script src="files\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
    <script src="files\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>
    <script type="text/javascript" src="files\bower_components\i18next\js\i18next.min.js"></script>
    <script type="text/javascript" src="files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
    <script src="files\assets\pages\data-table\extensions\buttons\js\extension-btns-custom.js"></script>
    <script src="files\assets\js\pcoded.min.js"></script>
    <script src="files\assets\js\menu\menu-hori-fixed.js"></script>
    <script src="files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="files\assets\js\script.js"></script>
</body>
</html>