<?php
ini_set("error_reporting", 1);
session_start();
require_once "../koneksi.php";
$tgl        = date('Y-m-d H:i:s');


mysqli_query($con_nowprd, "UPDATE buku_pinjam SET archive = '$_POST[value]' WHERE id = '$_POST[pk]'");
mysqli_query($con_nowprd, "INSERT INTO buku_pinjam_history(id_buku_pinjam,ket) VALUE('$_POST[pk]','$tgl $_POST[value]')");

echo json_encode("success");
var_dump("a");
