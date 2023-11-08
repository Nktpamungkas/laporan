<?php
    include 'koneksi.php';

    $no_absen    = ltrim($_GET['no_absen'], '0');
    // Syntax MySql untuk melihat semua record yang
    $sql = "SELECT * FROM tbl_makar WHERE no_scan = '$no_absen'";

    //Execetute Query diatas
    $query = mysqli_query($con_hrd, $sql);
    $dt    = mysqli_fetch_assoc($query);

    //Menampung data yang dihasilkan
    $json = array(
        'nama'    => $dt['nama']
    );

    //Merubah data kedalam bentuk JSON
    header('Content-Type: application/json');
    echo json_encode($json);
