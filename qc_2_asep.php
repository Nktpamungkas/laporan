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

                                                    $hostname="10.0.0.21"; // koneksi
                                                    $database = "NOWPRD";
                                                    $user = "db2admin";
                                                    $passworddb2 = "Sunkam@24809";
                                                    $port="25000";
                                                    $conn_string = "DRIVER={IBM ODBC DB2 DRIVER}; HOSTNAME=$hostname; PORT=$port; PROTOCOL=TCPIP; UID=$user; PWD=$passworddb2; DATABASE=$database;";
                                                    $con = db2_connect($conn_string,'', '');


                                                    function cekDemand($noDemand) { // 1. cek data
                                                        global $con; 

                                                        $query = "SELECT
                                                        TRIM(p.CODE) AS PRODUCTIONDEMANDCODE,
                                                        RIGHT(a.VALUESTRING, 8) AS ORIGINALPDCODE
                                                        FROM PRODUCTIONDEMAND p
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
                                                        FROM PRODUCTIONDEMAND p
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

                                                        $rootDemand = substr($rootDemand, 0, 8);

                                                        $query = "SELECT
                                                        TRIM(p.CODE) AS PRODUCTIONDEMANDCODE
                                                        FROM PRODUCTIONDEMAND p
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

                                                    function konversi($resultArray, $rootDemand, $highlightValue) {
                                                        $alphabetArray = range('a', 'z');
                                                    
                                                        $array_konversi = [];
                                                        $no = 0;
                                                    
                                                        $array_konversi['title']['value'] = '<b>MAPPING NO DEMAND</b>';
                                                        $array_konversi['title']['parent'] = '';
                                                    
                                                        $array_konversi[$rootDemand]['value'] = $rootDemand;
                                                        $array_konversi[$rootDemand]['parent'] = 'title';
                                                    
                                                        foreach ($resultArray as $v1) {
                                                            $pengait = isset($v1[0]) ? $v1[0] : null;
                                                    
                                                            if ($no == 0) {
                                                                $pengait = $resultArray[$no][0];
                                                            } else if (array_key_exists($resultArray[$no][0], $array_konversi)) {
                                                                $pengait = $alphabetArray[$no];
                                                            } else {
                                                                $pengait = $resultArray[$no][0];
                                                            }
                                                    
                                                            $value = ($highlightValue == $resultArray[$no][0]) ? '<div style="color:red">' . $resultArray[$no][0] . '</div>' : $resultArray[$no][0];
                                                    
                                                            $array_konversi[$pengait]['value'] = $value;
                                                            $array_konversi[$pengait]['parent'] = isset($resultArray[$no][1]) ? $resultArray[$no][1] : null;
                                                    
                                                            $no++;
                                                        }
                                                    
                                                        return $array_konversi;
                                                    }


                                                    $noDemand = $_POST['Demand'];
                                                    $noDemand = substr($noDemand, 0, 8); 
                                                    $result   = cekDemand($noDemand);

                                                    if ($result) {
                                                        
                                                        if (empty($result['ORIGINALPDCODE'])) { //jika tidak memiliki no salinan
                                                            echo 'Kartu Belum Pernah Disalin';
                                                            exit;
                                                        }
                                                        
                                                        $rootDemand     = cariRootDemand($noDemand);
                                                        $resultArray    = mapping($rootDemand, $rootDemand);
                                                        $array_konversi = konversi($resultArray,$rootDemand,$noDemand);
                                                    ?>
                                                        <link rel="stylesheet" href="dist/css/treeData.css">
                                                        <!--TIMPA-->
                                                    <style> 
                                                        .tree li a{
                                                        border: 1px solid #000;
                                                        padding: 5px 10px;
                                                        text-decoration: none;
                                                        color: #000;
                                                        font-family: arial, verdana, tahoma;
                                                        font-size: 24px;
                                                        display: inline-block;

                                                        border-radius: 5px;
                                                        -webkit-border-radius: 5px;
                                                        -moz-border-radius: 5px;

                                                        transition: all 0.5s;
                                                        -webkit-transition: all 0.5s;
                                                        -moz-transition: all 0.5s;
                                                        }

                                                        li a.disabled-link {
                                                        pointer-events: none;
                                                        color: #999; /* Opsional: Mengubah warna tautan menjadi abu-abu untuk menunjukkan bahwa itu dinonaktifkan */
                                                        text-decoration: none; /* Opsional: Menghilangkan garis bawah */
                                                        /* cursor: not-allowed; Opsional: Mengubah ikon kursor menjadi "not allowed" */
                                                        }
                                                    </style>
                                                        
                                                        <div id="tree" class="center" ></div>
                                                        <script type="text/javascript" src="dist/js/treeData.js"></script>
                                                        <script>
                                                        var tree = <?php echo json_encode($array_konversi); ?>;
                                                        TreeData(tree, "#tree");
                                                        </script>
                                                        
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