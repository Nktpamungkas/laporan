<?php
ini_set("error_reporting", 1);
include "koneksi.php";

$search = $_GET['search'];
$sql = mysqli_query($con_nowprd,"SELECT DISTINCT no_warna, long_description FROM `buku_pinjam` WHERE no_warna LIKE '%$search%' ORDER BY id DESC");
$result = mysqli_num_rows($sql);

if ($result > 0) {
    $list = array();
    $key = 0;
    while ($row = mysqli_fetch_array($sql)) {
        $list[$key]['id'] = $row['no_warna'];
        $list[$key]['text'] = $row['no_warna'];
        $key++;
    }
    echo json_encode($list);
} else {
    echo "Keyword tidak cocok!";
}
