<?php
    include 'koneksi.php';

    $nowarna    = $_GET['no_warna'];
    // Syntax MySql untuk melihat semua record yang
    $sql = "SELECT * FROM USERGENERICGROUP WHERE USERGENERICGROUPTYPECODE = 'CL1' AND TRIM(CODE) = '$nowarna' ORDER BY CODE ASC";

    //Execetute Query diatas
    $query = db2_exec($conn1, $sql);
    $dt    = db2_fetch_assoc($query);

    //Menampung data yang dihasilkan
    $json = array(
        'LONGDESCRIPTION'    => $dt['LONGDESCRIPTION']
    );

    //Merubah data kedalam bentuk JSON
    header('Content-Type: application/json');
    echo json_encode($json);
