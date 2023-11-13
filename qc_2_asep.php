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
    /* body {
        font-family: Arial, sans-serif;
        font-size: 20px; 
        color: #333; 
        padding:50px
	}

	h3 {
        font-size: 24; 
        font-family: Arial, sans-serif;
	} */
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
                                                $hostname="10.0.0.21";
                                                $database = "NOWPRD";
                                                $user = "db2admin";
                                                $passworddb2 = "Sunkam@24809";
                                                $port="25000";
                                                $conn_string = "DRIVER={IBM ODBC DB2 DRIVER}; HOSTNAME=$hostname; PORT=$port; PROTOCOL=TCPIP; UID=$user; PWD=$passworddb2; DATABASE=$database;";
                                                $con = db2_connect($conn_string,'', '');


                                                function cekDemand($noDemand) { // 1. cek data
                                                    global $con;$query = "SELECT
                                                    TRIM(p.CODE) AS PRODUCTIONDEMANDCODE,
                                                    RIGHT(a.VALUESTRING, 8) AS ORIGINALPDCODE
                                                    FROM
                                                    PRODUCTIONDEMAND p
                                                    LEFT JOIN ADSTORAGE a ON
                                                    a.UNIQUEID = p.ABSUNIQUEID
                                                    AND a.FIELDNAME = 'OriginalPDCode'   
                                                    WHERE p.CODE = '$noDemand'"; 

                                                    $stmt=db2_exec($con,$query);
                                                    $row = db2_fetch_assoc($stmt);
                                                    return $row ; 
                                                }

                                                function cariRootDemand($noDemand) { // 2. cari root demand
                                                    global $con; 
                                                    $query = "SELECT
                                                    RIGHT(a.VALUESTRING, 8) AS ORIGINALPDCODE
                                                    FROM
                                                    PRODUCTIONDEMAND p
                                                    LEFT JOIN ADSTORAGE a ON
                                                    a.UNIQUEID = p.ABSUNIQUEID
                                                    AND a.FIELDNAME = 'OriginalPDCode'   
                                                    WHERE LEFT(p.CODE,8) = '$noDemand'";

                                                    $stmt = db2_exec($con, $query);
                                                    if ($stmt) {	
                                                        $row = db2_fetch_assoc($stmt);	
                                                        if ($row['ORIGINALPDCODE']) {
                                                            $x = cariRootDemand($row['ORIGINALPDCODE']);     
                                                            return $x ;
                                                        } else {     
                                                            return $noDemand;
                                                        }
                                                        
                                                    }
                                                }

                                                function mapping($rootDemand, $parent = null) { // 3. mapping demand
                                                    global $con; 
                                                    global $tabel;
                                                    $rootDemand = substr($rootDemand, 0, 8);
                                                    $query = "SELECT
                                                    TRIM(p.CODE) AS PRODUCTIONDEMANDCODE
                                                    FROM
                                                    PRODUCTIONDEMAND p
                                                    LEFT JOIN ADSTORAGE a ON
                                                    a.UNIQUEID = p.ABSUNIQUEID
                                                    AND a.FIELDNAME = 'OriginalPDCode'   
                                                    WHERE  RIGHT(a.VALUESTRING, 8) = '$rootDemand'";

                                                    $stmt = db2_exec($con, $query,array('cursor'=>DB2_SCROLLABLE) );
                                                $output = [];
                                                    if (db2_num_rows($stmt) > 0) {
                                                        while ($row = db2_fetch_assoc($stmt)) {
                                                            $output[] = [$row['PRODUCTIONDEMANDCODE'], $parent];
                                                            $output = array_merge($output, mapping($row['PRODUCTIONDEMANDCODE'], $row['PRODUCTIONDEMANDCODE']));
                                                        } 	
                                                    } 
                                                    return $output;
                                                }


                                                $noDemand = $_POST['Demand'];
                                                $noDemand = substr($noDemand, 0, 8); 

                                                $result = cekDemand($noDemand);
                                                //$result = 1;

                                                if ($result) {
                                                    
                                                
                                                    $rootDemand = cariRootDemand($noDemand);
                                                    $resultArray = mapping($rootDemand, $rootDemand);
                                                    
                                                    $highlightValue = $noDemand;
                                                    $resultArray = array_map(function ($row) use ($highlightValue) { // highlight
                                                    return array_map(function ($value) use ($highlightValue) {
                                                        return ($value === $highlightValue) ? '<div style="color:red;font-weight:bold;font-size:15px">' . $highlightValue . '</div>' : $value;
                                                    }, $row);
                                                    }, $resultArray); ?>

                                                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                                    <script type="text/javascript">
                                                    google.charts.load('current', { 'packages': ['orgchart'] });
                                                    google.charts.setOnLoadCallback(drawChart);

                                                    function drawChart() {
                                                    var data = new google.visualization.DataTable();
                                                    data.addColumn('string', 'DemandChild');
                                                    data.addColumn('string', 'DemandParent');
                                                    //data.addColumn('string', 'ToolTip');

                                                    var phpArray = <?php echo json_encode($resultArray, JSON_UNESCAPED_UNICODE); ?>;
                                                    var jsData = phpArray.map(function (item) {
                                                    return [item[0], item[1]]; 
                                                    });
                                                    data.addRows(jsData);
                                                    var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
                                                    chart.draw(data, { allowHtml: true });
                                                    }
                                                    </script>
                                                <h3>Struktur Mapping No Demand</h3>
                                                <div id="chart_div" style="border:dotted thin #000;width:100%;padding:10px" ></div>

                                                <?php } else {
                                                    echo "PRODUCTIONDEMANDCODE tidak ditemukan.";
                                                }
                                                ?>
                                            </div>                                         
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Cara membaca Riwayat Salin No Demand</h5><hr>
                                            <img src="img/Carabaca.PNG" width="800px" height="500px">
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