<?php
// Buat koneksi ke database (sesuaikan dengan koneksi Anda)
require_once "koneksi.php"; 

// Query untuk mengambil data dari tabel (sesuaikan dengan struktur tabel Anda)
$query = db2_exec($conn1, "SELECT
                                SUBSTR(NOW() + 14 MINUTES + 30 SECOND, 1, 19) AS WAKTUSEKARANG,
                                STMT_TEXT AS QUERY,
                                APPL_ID AS IPADDRESS,
                                *
                            FROM
                                TABLE(MON_GET_ACTIVITY(NULL,-2)) AS ACTIVITY
                            WHERE 
                                SUBSTR(LOCAL_START_TIME, 1, 19)  = SUBSTR(NOW(), 1,19) 
                            ORDER BY
                                LOCAL_START_TIME DESC");
$data = array();

while ($row = db2_fetch_assoc($query)) {
    $data[] = $row;
}

$response = array(
    'data' => $data,
    'length' => count($data)
);

// $data['length'] = count($data);

echo json_encode($data);
?>