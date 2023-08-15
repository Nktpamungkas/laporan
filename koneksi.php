<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
date_default_timezone_set('Asia/Jakarta');
$host="10.0.4.8";
$username="sa";
$password="Q?o*]vdjDb#w";
$db_name="TICKET";
$connInfo = array( "Database"=>$db_name, "UID"=>$username, "PWD"=>$password);
$conn_sql     = sqlsrv_connect( $host, $connInfo);

$host="10.0.4.8";
$username="sa";
$password="Q?o*]vdjDb#w";
$db_name="LA1000_Exchange";
$connInfo = array( "Database"=>$db_name, "UID"=>$username, "PWD"=>$password);
$conn_sql2     = sqlsrv_connect( $host, $connInfo);

$host="S-CATS";
$username="progm";
$password="BW#bbfW";
$db_name="TAICHEN_CAMS_LIVE";
$connInfo = array( "Database"=>$db_name, "UID"=>$username, "PWD"=>$password);
$conn_cams     = sqlsrv_connect( $host, $connInfo);

$hostname="10.0.0.21";
// $database = "NOWTEST"; // SERVER NOW 20
$database = "NOWPRD"; // SERVER NOW 22
$user = "db2admin";
$passworddb2 = "Sunkam@24809";
$port="25000";
$conn_string = "DRIVER={IBM ODBC DB2 DRIVER}; HOSTNAME=$hostname; PORT=$port; PROTOCOL=TCPIP; UID=$user; PWD=$passworddb2; DATABASE=$database;";
// $conn1 = db2_pconnect($conn_string,'', '');
$conn1 = db2_connect($conn_string,'', '');

$con_invoice    = mysqli_connect("10.0.0.10","dit","4dm1n","invoice");
$con_nowprd     = mysqli_connect("10.0.0.10","dit","4dm1n","nowprd");
$con_db_dyeing  = mysqli_connect("10.0.0.10","dit","4dm1n","db_dying");
$con_dbnow_mkt  = mysqli_connect("10.0.0.10","dit","4dm1n","dbnow_mkt");
$con_db_qc      = mysqli_connect("10.0.0.10","dit","4dm1n","db_qc");

if($conn1) {
    // echo "koneksi berhasil";
}
else{
    exit("DB2 Connection failed");
}

// $con=mysqli_connect("10.0.0.10","dit","4dm1n","db_finishing");
?>