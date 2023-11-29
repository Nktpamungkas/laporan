<?php
    include 'koneksi.php';

    $nowarna    = $_GET['no_warna'];
    // Syntax MySql untuk melihat semua record yang
    $sql = "SELECT
                CODE,
                LONGDESCRIPTION,
                VALUESTRING AS IDCUSTOMER,
                LEGALNAME1 AS CUSTOMER
            FROM
                USERGENERICGROUP u 
            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = u.ABSUNIQUEID AND a.FIELDNAME = 'OriginalCustomerCode'
            LEFT JOIN ORDERPARTNER o ON o.CUSTOMERSUPPLIERCODE = a.VALUESTRING 
            LEFT JOIN BUSINESSPARTNER b ON b.NUMBERID = o.ORDERBUSINESSPARTNERNUMBERID
            WHERE
                USERGENERICGROUPTYPECODE = 'CL1' 
                AND TRIM(CODE) = '$nowarna'";

    //Execetute Query diatas
    $query = db2_exec($conn1, $sql);
    $dt    = db2_fetch_assoc($query);

    //Menampung data yang dihasilkan
    $json = array(
        'LONGDESCRIPTION'    => $dt['LONGDESCRIPTION'],
        'CUSTOMER'           => $dt['CUSTOMER']
    );

    //Merubah data kedalam bentuk JSON
    header('Content-Type: application/json');
    echo json_encode($json);
