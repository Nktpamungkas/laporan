<?php
$servername = "10.0.0.10";
$username = "dit";
$password = "4dm1n";
$dbname = "nowprd";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data dari permintaan POST
$dataArray = json_decode(file_get_contents('php://input'), true);

// Memeriksa dan menyisipkan setiap elemen array ke dalam database
foreach ($dataArray as $data) {
    // Memeriksa dan membersihkan data (hindari SQL injection)
    $field1 = mysqli_real_escape_string($conn, $data['WAKTUSEKARANG']);
    $field2 = mysqli_real_escape_string($conn, $data['QUERY']);
    $field3 = mysqli_real_escape_string($conn, $data['IPADDRESS']);

    // Melakukan operasi INSERT ke dalam tabel
    $sql = "INSERT INTO log_query_DB2 (WAKTUSEKARANG, QUERY, IPADDRESS) VALUES ('$field1', '$field2', '$field3')";


    if ($conn->query($sql) === TRUE) {
        // Jika penyisipan berhasil
        http_response_code(200);
    } else {
        // Jika terjadi kesalahan
        http_response_code(500);
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
