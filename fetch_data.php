<?php
// Buat koneksi ke database (sesuaikan dengan koneksi Anda)
$pdo = new PDO('mysql:host=10.0.0.10;dbname=nowprd', 'dit', '4dm1n');

// Query untuk mengambil data dari tabel (sesuaikan dengan struktur tabel Anda)
$query = "SELECT
                SCHEMA_NAME,
                SUBSTR(DIGEST_TEXT, 1, 150) AS `QUERY`, 
                COUNT_STAR AS JML_TOTAL_EXC_QUERY,
                floor((SUM_TIMER_WAIT / 1000000000) / 60) AS TIME_IN_MINUTES,
                floor((SUM_TIMER_WAIT / 1000000000) / 60 / 60) AS TIME_IN_HOUR,
                LAST_SEEN
            FROM
                PERFORMANCE_SCHEMA.events_statements_summary_by_digest 
            WHERE
                SCHEMA_NAME IS NOT NULL
                AND (DIGEST_TEXT LIKE '%SELECT%' OR DIGEST_TEXT LIKE '%UPDATE%' OR DIGEST_TEXT LIKE '%DELETE%')
            ORDER BY
                LAST_SEEN DESC LIMIT 50";
$result = $pdo->query($query);

// Mengambil hasil query sebagai array asosiatif
$data = $result->fetchAll(PDO::FETCH_ASSOC);

// Menampilkan data sebagai JSON
echo json_encode($data);
?>


