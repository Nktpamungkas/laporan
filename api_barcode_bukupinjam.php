<?php
    include 'koneksi.php';

    $id    = sprintf("%'.06d\n", $_GET['id']);
    // Syntax MySql untuk melihat semua record yang
    $sql = "SELECT * FROM buku_pinjam WHERE id = '$id'";

    //Execetute Query diatas
    $query = mysqli_query($con_nowprd, $sql);
    $dt    = mysqli_fetch_assoc($query);

    //Menampung data yang dihasilkan
    $json = array(
        'no_warna'    => $dt['no_warna']
    );

    //Merubah data kedalam bentuk JSON
    header('Content-Type: application/json');
    echo json_encode($json);
