<?php
ini_set("error_reporting", 0);
// set_time_limit(0);
session_start();
// require_once "koneksi.php";

$hostname = "10.0.0.21";
$database = "NOWTEST"; // SERVER NOW 20
// $database = "NOWPRD"; // SERVER NOW 22
$user = "db2admin";
$passworddb2 = "Sunkam@24809";
$port = "25000";
$conn_string = "DRIVER={IBM ODBC DB2 DRIVER}; HOSTNAME=$hostname; PORT=$port; PROTOCOL=TCPIP; UID=$user; PWD=$passworddb2; DATABASE=$database;";
// $conn1 = db2_pconnect($conn_string,'', '');
$conn1 = db2_connect($conn_string, '', '');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PRD - Tracking Report TAS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <link rel="icon" href="files\assets\images\favicon.ico" type="image/x-icon">
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="files\bower_components\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\icon\themify-icons\themify-icons.css">
    <link rel="stylesheet" type="text/css" href="files\assets\icon\icofont\css\icofont.css">
    <link rel="stylesheet" type="text/css" href="files\assets\icon\feather\css\feather.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\prism\prism.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\pcoded-horizontal.min.css">
    <link rel="stylesheet" type="text/css"
        href="files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
    <script src="TabCounter.js"></script>
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
                                        <h5>Filter Pencarian Report TAS</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <!-- <div class="col-sm-6 col-xl-12 m-b-30">
                                                    <h4 class="sub-title">No MRN:</h4>
                                                    <input type="text" name="nomrn" class="form-control"
                                                        value="<?= ''//isset($_POST['submit']) ? $_POST['nomrn'] : ''   ?>">
                                                </div> -->
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <h4 class="sub-title">From Date</h4>
                                                    <input type="date" class="form-control" name="tgl1" value="<?php if (isset($_POST['submit'])) {
                                                        echo $_POST['tgl1'];
                                                    } ?>" required>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <h4 class="sub-title">Until Date</h4>
                                                    <input type="date" class="form-control" name="tgl2" value="<?php if (isset($_POST['submit'])) {
                                                        echo $_POST['tgl2'];
                                                    } ?>" required>
                                                </div>
                                                <h4 class="sub-title">&nbsp; </h4>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary"><i
                                                            class="icofont icofont-search-alt-1"></i> Cari data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <?php
                                $tgl1 = @$_POST['tgl1'];
                                $tgl2 = @$_POST['tgl2'];
                                if (isset($tgl1) && !empty($tgl1) && isset($tgl2) && !empty($tgl2)) { ?>
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table id="lang-dt" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>TGL. HPB</th>
                                                            <th>TGL. TERIMA</th>
                                                            <th>LAB PREP</th>
                                                            <th>NO PO</th>
                                                            <th>TGL MRN</th>
                                                            <th>SUPPLIER</th>
                                                            <th>CHEMICAL/DYSTUFF</th>
                                                            <th>QUANTITY(KG)</th>
                                                            <th>NO. LOT</th>
                                                            <th colspan="2">PH</th>
                                                            <th>BJ</th>
                                                            <th>SC</th>
                                                            <th>DELTA E</th>
                                                            <th>DELTA L</th>
                                                            <th colspan="2">STATUS TEST</th>
                                                            <th>DITEST OLEH</th>
                                                            <th>TOTAL DAYS</th>
                                                            <th>KETERANGAN</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $query = "SELECT 
                                                                    MRNHEADER.PURCHASEORDERCODE,
                                                                    BUSINESSPARTNER.LEGALNAME1,
                                                                    FULLITEMKEYDECODER.SHORTDESCRIPTION,
                                                                    MRNDETAIL.RECEIVEDQUANTITY,
                                                                    STOCKTRANSACTION.LOTCODE,
                                                                    QUALITYDOCUMENT.HEADERDATE,
                                                                    QUALITYDOCUMENT.LASTUPDATEUSER,
                                                                    QUALITYDOCUMENT.HEADERLINE,
                                                                    A.TGLHPB,
                                                                    A.TGLTERIMA
                                                                FROM
                                                                    MRNHEADER MRNHEADER
                                                                LEFT JOIN MRNDETAIL MRNDETAIL
                                                                    ON MRNDETAIL.MRNHEADERCODE = MRNHEADER.CODE 
                                                                LEFT JOIN STOCKTRANSACTION STOCKTRANSACTION
                                                                    ON STOCKTRANSACTION.TRANSACTIONNUMBER = MRNDETAIL.TRANSACTIONNUMBER
                                                                LEFT JOIN QUALITYDOCUMENT QUALITYDOCUMENT
                                                                    ON QUALITYDOCUMENT.LOTCODE = STOCKTRANSACTION.LOTCODE
                                                                LEFT JOIN FULLITEMKEYDECODER FULLITEMKEYDECODER
                                                                    ON FULLITEMKEYDECODER.ITEMTYPECODE = STOCKTRANSACTION.ITEMTYPECODE 
                                                                    AND FULLITEMKEYDECODER.SUBCODE01 = STOCKTRANSACTION.DECOSUBCODE01
                                                                    AND FULLITEMKEYDECODER.SUBCODE02 = STOCKTRANSACTION.DECOSUBCODE02
                                                                    AND FULLITEMKEYDECODER.SUBCODE03 = STOCKTRANSACTION.DECOSUBCODE03
                                                                    AND FULLITEMKEYDECODER.SUBCODE04 = STOCKTRANSACTION.DECOSUBCODE04
                                                                    AND FULLITEMKEYDECODER.SUBCODE05 = STOCKTRANSACTION.DECOSUBCODE05
                                                                    AND FULLITEMKEYDECODER.SUBCODE06 = STOCKTRANSACTION.DECOSUBCODE06
                                                                    AND FULLITEMKEYDECODER.SUBCODE07 = STOCKTRANSACTION.DECOSUBCODE07
                                                                    AND FULLITEMKEYDECODER.SUBCODE08 = STOCKTRANSACTION.DECOSUBCODE08
                                                                    AND FULLITEMKEYDECODER.SUBCODE09 = STOCKTRANSACTION.DECOSUBCODE09
                                                                    AND FULLITEMKEYDECODER.SUBCODE10 = STOCKTRANSACTION.DECOSUBCODE10
                                                                    AND FULLITEMKEYDECODER.IDENTIFIER = STOCKTRANSACTION.FULLITEMIDENTIFIER
                                                                LEFT JOIN ORDERPARTNER ORDERPARTNER
                                                                    ON ORDERPARTNER.CUSTOMERSUPPLIERCODE = MRNHEADER.ORDPRNCUSTOMERSUPPLIERCODE
                                                                LEFT JOIN BUSINESSPARTNER BUSINESSPARTNER
                                                                    ON BUSINESSPARTNER.NUMBERID = ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID
                                                                LEFT JOIN (SELECT
                                                                            UNIQUEID,
                                                                            MAX(CASE WHEN FIELDNAME = 'tglhpb' THEN VALUEDATE END) AS tglhpb,
                                                                            MAX(CASE WHEN FIELDNAME = 'tglterima' THEN VALUEDATE END) AS tglterima
                                                                            FROM ADSTORAGE
                                                                            WHERE 
                                                                                NAMEENTITYNAME = 'QualityDocument'
                                                                                AND FIELDNAME = 'tglterima' OR FIELDNAME = 'tglhpb'
                                                                            GROUP BY UNIQUEID) A 
                                                                    ON A.UNIQUEID = QUALITYDOCUMENT.ABSUNIQUEID 
                                                                WHERE MRNHEADER.MRNDATE BETWEEN '$tgl1' AND '$tgl2'
                                                                ";

                                                        $stmt = db2_exec($conn1, $query, array('cursor' => DB2_SCROLLABLE));
                                                        while ($row = db2_fetch_assoc($stmt)) {

                                                            $query2 = "SELECT 
                                                                        QUALITYDOCLINE.CHARACTERISTICCODE,
                                                                        QUALITYDOCLINE.VALUEQUANTITY,
                                                                        QUALITYDOCLINE.VALUEQUANTITY2,
                                                                        QUALITYDOCLINE.VALUEQUANTITY3,
                                                                        CASE 
                                                                            WHEN QUALITYDOCLINE.TESTLINESTATUS = 0 THEN 'N/A'
                                                                            WHEN QUALITYDOCLINE.TESTLINESTATUS = 1 THEN 'Out limit'
                                                                            WHEN QUALITYDOCLINE.TESTLINESTATUS = 2 THEN 'In limit'
                                                                            WHEN QUALITYDOCLINE.TESTLINESTATUS = 3 THEN 'Good'
                                                                        END AS TESTSTATUS,
                                                                        QUALITYDOCLINE.LASTUPDATEUSER,
                                                                        QUALITYDOCLINE.ANNOTATION,
                                                                        QUALITYDOCLINE.TESTLINESTATUS,
                                                                        QUALITYDOCUMENT.HEADERDATE
                                                                    FROM QUALITYDOCUMENT QUALITYDOCUMENT
                                                                    LEFT JOIN QUALITYDOCLINE QUALITYDOCLINE 
                                                                        ON QUALITYDOCUMENT.LOTCODE = QUALITYDOCLINE.QUALITYDOCUMENTLOTCODE
                                                                    LEFT JOIN QUALITYCHARACTERISTICTYPE QUALITYCHARACTERISTICTYPE
                                                                        ON QUALITYCHARACTERISTICTYPE.CODE = QUALITYDOCLINE.CHARACTERISTICCODE
                                                                    WHERE 
                                                                    CASE
                                                                        WHEN (QUALITYDOCLINE.QUALITYDOCUMENTSUBCODE01 = 'R' OR QUALITYDOCLINE.QUALITYDOCUMENTSUBCODE01 = 'D') THEN QUALITYDOCLINE.CHARACTERISTICCODE = 'DL' OR QUALITYDOCLINE.CHARACTERISTICCODE = 'DE'
                                                                        ELSE QUALITYDOCLINE.CHARACTERISTICCODE <> 'DL' OR QUALITYDOCLINE.CHARACTERISTICCODE <> 'DE'
                                                                    END 
                                                                    AND QUALITYDOCLINE.QUALITYDOCUMENTHEADERLINE = '$row[HEADERLINE]'
                                                                    ORDER BY QUALITYDOCLINE.LINE ASC
                                                                ";

                                                            $stmt2 = db2_exec($conn1, $query2, array('cursor' => DB2_SCROLLABLE));
                                                            $rowspan = db2_num_rows($stmt2);
                                                            $count = 0;
                                                            while ($row2 = db2_fetch_assoc($stmt2)) {
                                                                ?>
                                                                <tr>
                                                                    <?php
                                                                    if ($count < 1) {
                                                                        $count = 1;
                                                                        ?>
                                                                        <td rowspan="<?= $rowspan ?>">
                                                                            <?= $row['TGLHPB'] ?>
                                                                        </td>
                                                                        <td rowspan="<?= $rowspan ?>">
                                                                            <?= $row['TGLTERIMA'] ?>
                                                                        </td>
                                                                        <td rowspan="<?= $rowspan ?>"></td>
                                                                        <td rowspan="<?= $rowspan ?>">
                                                                            <?= $row['PURCHASEORDERCODE'] ?>
                                                                        </td>
                                                                        <td rowspan="<?= $rowspan ?>">
                                                                            <?= $row['MRNDATE'] ?>
                                                                        </td>
                                                                        <td rowspan="<?= $rowspan ?>">
                                                                            <?= $row['LEGALNAME1'] ?>
                                                                        </td>
                                                                        <td rowspan="<?= $rowspan ?>">
                                                                            <?= $row['SHORTDESCRIPTION'] ?>
                                                                        </td>
                                                                        <td rowspan="<?= $rowspan ?>">
                                                                            <?= $row['RECEIVEDQUANTITY'] ?>
                                                                        </td>
                                                                        <td rowspan="<?= $rowspan ?>">
                                                                            <?= $row['LOTCODE'] ?>
                                                                        </td>
                                                                    <?php } ?>
                                                                    <td>
                                                                        <?php
                                                                        if (substr($row2['CHARACTERISTICCODE'], 0, 2) == 'PH') {
                                                                            if ($row2['VALUEQUANTITY3'] != NULL and $row2['VALUEQUANTITY3'] != 0) {
                                                                                echo $row2['VALUEQUANTITY3'];
                                                                            } else if ($row2['VALUEQUANTITY2'] != NULL and $row2['VALUEQUANTITY2'] != 0) {
                                                                                echo $row2['VALUEQUANTITY2'];
                                                                            } else if ($row2['VALUEQUANTITY'] != NULL and $row2['VALUEQUANTITY'] != 0) {
                                                                                echo $row2['VALUEQUANTITY'];
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td></td>
                                                                    <td>
                                                                        <?php
                                                                        if (substr($row2['CHARACTERISTICCODE'], 0, 2) == 'BJ') {
                                                                            if ($row2['VALUEQUANTITY3'] != NULL and $row2['VALUEQUANTITY3'] != 0) {
                                                                                echo $row2['VALUEQUANTITY3'];
                                                                            } else if ($row2['VALUEQUANTITY2'] != NULL and $row2['VALUEQUANTITY2'] != 0) {
                                                                                echo $row2['VALUEQUANTITY2'];
                                                                            } else if ($row2['VALUEQUANTITY'] != NULL and $row2['VALUEQUANTITY'] != 0) {
                                                                                echo $row2['VALUEQUANTITY'];
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if (substr($row2['CHARACTERISTICCODE'], 0, 2) == 'SC') {
                                                                            if ($row2['VALUEQUANTITY3'] != NULL and $row2['VALUEQUANTITY3'] != 0) {
                                                                                echo $row2['VALUEQUANTITY3'];
                                                                            } else if ($row2['VALUEQUANTITY2'] != NULL and $row2['VALUEQUANTITY2'] != 0) {
                                                                                echo $row2['VALUEQUANTITY2'];
                                                                            } else if ($row2['VALUEQUANTITY'] != NULL and $row2['VALUEQUANTITY'] != 0) {
                                                                                echo $row2['VALUEQUANTITY'];
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if (substr($row2['CHARACTERISTICCODE'], 0, 2) == 'DE') {
                                                                            if ($row2['VALUEQUANTITY3'] != NULL and $row2['VALUEQUANTITY3'] != 0) {
                                                                                echo $row2['VALUEQUANTITY3'];
                                                                            } else if ($row2['VALUEQUANTITY2'] != NULL and $row2['VALUEQUANTITY2'] != 0) {
                                                                                echo $row2['VALUEQUANTITY2'];
                                                                            } else if ($row2['VALUEQUANTITY'] != NULL and $row2['VALUEQUANTITY'] != 0) {
                                                                                echo $row2['VALUEQUANTITY'];
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if (substr($row2['CHARACTERISTICCODE'], 0, 2) == 'DL') {
                                                                            if ($row2['VALUEQUANTITY3'] != NULL and $row2['VALUEQUANTITY3'] != 0) {
                                                                                echo $row2['VALUEQUANTITY3'];
                                                                            } else if ($row2['VALUEQUANTITY2'] != NULL and $row2['VALUEQUANTITY2'] != 0) {
                                                                                echo $row2['VALUEQUANTITY2'];
                                                                            } else if ($row2['VALUEQUANTITY'] != NULL and $row2['VALUEQUANTITY'] != 0) {
                                                                                echo $row2['VALUEQUANTITY'];
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $row2['TESTSTATUS'] ?>
                                                                    </td>
                                                                    <td></td>
                                                                    <td>
                                                                        <?= $row2['LASTUPDATEUSER'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if ($row['TGLTERIMA'] != null) {
                                                                            $date1 = date_create($row2['HEADERDATE']);
                                                                            $date2 = date_create($row['TGLTERIMA']);
                                                                            $diff = date_diff($date1, $date2);
                                                                            echo $diff->format("%a days");
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $row2['ANNOTATION'] ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once 'footer.php'; ?>