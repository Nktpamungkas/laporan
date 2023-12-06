<?php
    include 'koneksi.php';

    $nowarna    = $_GET['no_warna'];
    // Syntax MySql untuk melihat semua record yang
    $sql = "SELECT 
                DISTINCT
                TRIM(p.SUBCODE02) || '-' || TRIM(p.SUBCODE03) || ' - '|| TRIM(p.SUBCODE05) AS NO_HANGER,
                p.LONGDESCRIPTION 
            FROM 
                PRODUCT p 
            WHERE 
                TRIM(p.SUBCODE02) || '-' || TRIM(p.SUBCODE03) || ' - '|| TRIM(p.SUBCODE05) = 'DKI-18362 - 230552L'";

    //Execetute Query diatas
    $query = db2_exec($conn1, $sql);
    $dt    = db2_fetch_assoc($query);

    //Menampung data yang dihasilkan
    $json = array(
        'LONGDESCRIPTION'      => $dt['LONGDESCRIPTION']
    );

    //Merubah data kedalam bentuk JSON
    header('Content-Type: application/json');
    echo json_encode($json);
