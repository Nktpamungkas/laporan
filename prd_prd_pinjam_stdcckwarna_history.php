<head>
    <title>PRD - History</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <link rel="icon" href="files\assets\images\favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="files\bower_components\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\icon\themify-icons\themify-icons.css">
    <link rel="stylesheet" type="text/css" href="files\assets\icon\icofont\css\icofont.css">
    <link rel="stylesheet" type="text/css" href="files\assets\icon\feather\css\feather.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\prism\prism.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\pcoded-horizontal.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
</head>
<body>
    <table border="1" class="table compact table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Penanggung Jawab</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
                ini_set("error_reporting", 1);
                session_start();
                require_once "koneksi.php"; 
                $q_history  = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam_history WHERE id_buku_pinjam = '$_GET[id]'");
                while ($row_history = mysqli_fetch_array($q_history)) {
                    $no_absen    = ltrim($row_history['no_absen'], '0');
                    $cari_nama_in = mysqli_query($con_hrd, "SELECT * FROM tbl_makar WHERE no_scan = '$no_absen'");
                    $nama_in    = mysqli_fetch_assoc($cari_nama_in);
                    $ket = substr($row_history['ket'], 20);
            ?>
            <tr <?php if($ket == "Belum_Diarsipkan" OR $ket == "Diarsipkan") { echo "style='background-color: #00FF70;'"; } ?>>
                <td><?= $row_history['no_absen'].' - '.$nama_in['nama']; ?></td>
                <td><?= $row_history['tgl_in']; ?></td>
                <td><?= $row_history['tgl_out']; ?></td>
                <td><?= $row_history['ket']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
<?php require_once 'footer.php'; ?>