<?php
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php";

    if(isset($_POST['simpanin_catch'])){
        $productionorder    = $_POST['productionorder'];
        $productiondemand   = $_POST['productiondemand'];
        $stepnumber         = $_POST['stepnumber'];
        $tanggal_proses_in  = $_POST['tanggal_proses_in'];
        $tanggal_out        = $_POST['tanggal_out'];
        $operation          = $_POST['operation'];
        $longdescription    = $_POST['longdescription'];
        $status             = $_POST['status'];
        $ipaddress          = $_POST['ipaddress'];
        $createdatetime     = $_POST['createdatetime'];

        $simpan_cache_in    = mysqli_query($con_nowprd, "INSERT INTO posisikk_cache_in(productionorder,
                                                            productiondemand,
                                                            stepnumber,
                                                            tanggal_in,
                                                            tanggal_out,
                                                            operation,
                                                            longdescription,
                                                            `status`,
                                                            ipaddress,
                                                            createdatetime)
                                        VALUES('$productionorder',
                                                '$productiondemand',
                                                '$stepnumber',
                                                '$tanggal_proses_in',
                                                '$tanggal_out',
                                                '$operation',
                                                '$longdescription',
                                                '$status',
                                                '$ipaddress',
                                                '$createdatetime')");
        if($simpan_cache_in){
            echo '<script>window.history.back()</script>';
        }else{
            echo("Error description: " . mysqli_error($simpan_cache_in));
        }
    }elseif (isset($_POST['simpanout_catch'])) {
        # code...
    }
?>