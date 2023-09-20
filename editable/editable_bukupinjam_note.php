<?php
ini_set("error_reporting", 1);
session_start();
require_once "../koneksi.php";

mysqli_query($con_nowprd, "UPDATE buku_pinjam SET note = '$_POST[value]' WHERE id = '$_POST[pk]'");

echo json_encode("success");
var_dump("a");
