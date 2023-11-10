<!DOCTYPE html>
<html lang="en">
<head>
    <title>DIT - Riwayat Salin Kartu Kerja by Demand</title>
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
</head>
<style>
    .timeline {
        list-style: none;
        padding: 20px 0 20px;
        position: relative;
    }

    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: #eeeeee;
        left: 50%;
        margin-left: -1.5px;
    }

    .timeline>li {
        margin-bottom: 20px;
        position: relative;
    }

    .timeline>li:before,
    .timeline>li:after {
        content: " ";
        display: table;
    }

    .timeline>li:after {
        clear: both;
    }

    .timeline>li:before,
    .timeline>li:after {
        content: " ";
        display: table;
    }

    .timeline>li:after {
        clear: both;
    }

    .timeline>li>.timeline-panel {
        width: 46%;
        float: left;
        border: 1px solid #d4d4d4;
        border-radius: 2px;
        padding: 20px;
        position: relative;
        -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
    }

    .timeline>li>.timeline-panel:before {
        position: absolute;
        top: 26px;
        right: -15px;
        display: inline-block;
        border-top: 15px solid transparent;
        border-left: 15px solid #ccc;
        border-right: 0 solid #ccc;
        border-bottom: 15px solid transparent;
        content: " ";
    }

    .timeline>li>.timeline-panel:after {
        position: absolute;
        top: 27px;
        right: -14px;
        display: inline-block;
        border-top: 14px solid transparent;
        border-left: 14px solid #fff;
        border-right: 0 solid #fff;
        border-bottom: 14px solid transparent;
        content: " ";
    }

    .timeline>li>.timeline-badge {
        color: #fff;
        width: 50px;
        height: 50px;
        line-height: 50px;
        font-size: 1.4em;
        text-align: center;
        position: absolute;
        top: 16px;
        left: 50%;
        margin-left: -25px;
        background-color: #999999;
        z-index: 100;
        border-top-right-radius: 50%;
        border-top-left-radius: 50%;
        border-bottom-right-radius: 50%;
        border-bottom-left-radius: 50%;
    }

    .timeline>li.timeline-inverted>.timeline-panel {
        float: right;
    }

    .timeline>li.timeline-inverted>.timeline-panel:before {
        border-left-width: 0;
        border-right-width: 15px;
        left: -15px;
        right: auto;
    }

    .timeline>li.timeline-inverted>.timeline-panel:after {
        border-left-width: 0;
        border-right-width: 14px;
        left: -14px;
        right: auto;
    }

    .timeline-badge.primary {
        background-color: #2e6da4 !important;
    }

    .timeline-badge.success {
        background-color: #3f903f !important;
    }

    .timeline-badge.warning {
        background-color: #f0ad4e !important;
    }

    .timeline-badge.danger {
        background-color: #d9534f !important;
    }

    .timeline-badge.info {
        background-color: #5bc0de !important;
    }

    .timeline-title {
        margin-top: 0;
        color: inherit;
    }

    .timeline-body>p,
    .timeline-body>ul {
        margin-bottom: 0;
    }

    .timeline-body>p+p {
        margin-top: 5px;
    }

    @media (max-width: 767px) {
        ul.timeline:before {
            left: 40px;
        }

        ul.timeline>li>.timeline-panel {
            width: calc(100% - 90px);
            width: -moz-calc(100% - 90px);
            width: -webkit-calc(100% - 90px);
        }

        ul.timeline>li>.timeline-badge {
            left: 15px;
            margin-left: 0;
            top: 16px;
        }

        ul.timeline>li>.timeline-panel {
            float: right;
        }

        ul.timeline>li>.timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        ul.timeline>li>.timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }
    }
</style>
<?php require_once 'header.php'; ?>
<span class="count" hidden></span>
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
                                        <h5>Filter Pencarian Riwayat Kartu Kerja By Demand</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-6 col-xl-12 m-b-30">
                                                    <h4 class="sub-title">Production Demand:</h4>
                                                    <!-- <input type="text" name="demand" class="form-control" placeholder="Wajib di isi" required value="<?php if (isset($_POST['submit'])) {
                                                                                                                                                                echo $_POST['demand'];
                                                                                                                                                            } ?>"> -->
                                                    <input type="text" name="Demand" class="form-control" value="<?php if (isset($_POST['submit'])) {
                                                                                                                        echo $_POST['Demand'];
                                                                                                                    } ?>">
                                                </div>
                                                <h4 class="sub-title">&nbsp; </h4>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary">Cari data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST['submit']) or isset($_GET['demand'])) : ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <?php
                                                $hostname = "10.0.0.21";
                                                $database = "NOWPRD";
                                                $user = "db2admin";
                                                $passworddb2 = "Sunkam@24809";
                                                $port = "25000";
                                                $conn_string = "DRIVER={IBM ODBC DB2 DRIVER}; HOSTNAME=$hostname; PORT=$port; PROTOCOL=TCPIP; UID=$user; PWD=$passworddb2; DATABASE=$database;";
                                                $con = db2_connect($conn_string, '', '');

                                                function cekDemand($noDemand)
                                                { // 1. cek data
                                                    global $con;
                                                    $query = "SELECT
                                                                TRIM(p.CODE) AS PRODUCTIONDEMANDCODE,
                                                                RIGHT(a.VALUESTRING, 8) AS ORIGINALPDCODE
                                                            FROM
                                                                PRODUCTIONDEMAND p
                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'   
                                                            WHERE p.CODE = '$noDemand'";

                                                    $stmt = db2_exec($con, $query);
                                                    $row = db2_fetch_assoc($stmt);
                                                    return $row;
                                                }

                                                // untuk mencari demand awal (ke atas)
                                                function cariRootDemand($noDemand){ // 2. cari root demand
                                                    global $con;
                                                    $query = "SELECT
                                                                RIGHT(a.VALUESTRING, 8) AS ORIGINALPDCODE
                                                            FROM
                                                                PRODUCTIONDEMAND p
                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'   
                                                            WHERE LEFT(p.CODE,8) = '$noDemand'";
                                                    $stmt = db2_exec($con, $query);

                                                    if ($stmt) {
                                                        $row = db2_fetch_assoc($stmt);
                                                        if ($row['ORIGINALPDCODE']) {
                                                            $x = cariRootDemand($row['ORIGINALPDCODE']);
                                                            return $x;
                                                        } else {
                                                            return $noDemand;
                                                        }
                                                    }
                                                }

                                                function mapping($rootDemand, $highlight, $prefix = '')
                                                { // 3. mapping demand
                                                    global $con;
                                                    $rootDemand = substr($rootDemand, 0, 8);
                                                    $query = "SELECT
                                                                    TRIM(p.CODE) AS PRODUCTIONDEMANDCODE
                                                                FROM
                                                                    PRODUCTIONDEMAND p
                                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'   
                                                                WHERE  RIGHT(a.VALUESTRING, 8) = '$rootDemand'";
                                                    
                                                    $stmt = db2_exec($con, $query, array('cursor' => DB2_SCROLLABLE));

                                                    $highlighted = ($rootDemand === $highlight) ? '<label class="label label-danger">' . $rootDemand . '</label>' : '<label class="label label-inverse-info-border">' . $rootDemand . '</label>';
                                                    echo "<p> ".$prefix . $highlighted . "</p>";
                                                    

                                                    if (db2_num_rows($stmt) > 0) {
                                                        while ($row = db2_fetch_assoc($stmt)) {
                                                            mapping($row['PRODUCTIONDEMANDCODE'], $highlight, $prefix . '-------------');
                                                        }
                                                    }
                                                }

                                                $noDemand = $_POST['Demand'];
                                                $result = cekDemand($noDemand);  
                                                if ($result) {
                                                    echo '<h3>Riwayat Salin Nomor Demand</h3><hr>';
                                                    $rootDemand = cariRootDemand($noDemand);
                                                    $highlightCode = $noDemand; // data highlight like button
                                                    mapping($rootDemand, $highlightCode);
                                                } else {
                                                    echo "PRODUCTIONDEMANDCODE tidak ditemukan.";
                                                }                                             
                                            ?>  
                                            </div>                                         
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Cara membaca Riwayat Salin No Demand</h5><hr>
                                            <img src="img/History.jpg" width="900px" height="500px">
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
</body>
<?php require_once 'footer.php'; ?>