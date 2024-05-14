<?php
ini_set("error_reporting", 1);
session_start();
require_once "koneksi.php";
if (isset($_POST['simpan'])) {
    $id = TRIM(sprintf("%'.06d\n", $_POST['id']));
    $no_absen = $_POST['no_absen'];
    $ket = $_POST['ket'];
    $status = $_POST['status'];
    $tgl = date('Y-m-d H:i:s');

    if ($status == 'Pinjam') {
        $in = mysqli_query($con_db_dyeing, "UPDATE tbl_montemp
                                                                SET absen_in = '$no_absen',
                                                                    tgl_in = '$tgl',
                                                                    keterangan = '$ket',
                                                                    absen_out = null,
                                                                    tgl_out = null,
                                                                    archive = 'Belum_Diarsipkan'
                                                                WHERE
                                                                    id = '$id'");
        $in_history = mysqli_query($con_nowprd, "INSERT INTO buku_pinjam_history(id_buku_pinjam,kode,no_absen,tgl_in,ket)VALUES('$id','te','$no_absen', '$tgl', '$ket')");
        if ($in_history) {
            echo '<script language="javascript">';
            echo 'let text = "Berhasil menyimpan data !";
                        if (confirm(text) == true) {
                            document.location.href = "prd_pinjam_stdcckwarna_te.php";
                        } else {
                            document.location.href = "prd_pinjam_stdcckwarna_te.php";
                        }';
            echo '</script>';
        }
    } else {
        $out = mysqli_query($con_db_dyeing, "UPDATE tbl_montemp
                                                                SET absen_out = '$no_absen',
                                                                    tgl_out = '$tgl',
                                                                    keterangan = '$ket'
                                                                WHERE
                                                                    id = '$id'");
        $out_history = mysqli_query($con_nowprd, "INSERT INTO buku_pinjam_history(id_buku_pinjam,kode,no_absen,tgl_out,ket)VALUES('$id','te','$no_absen', '$tgl', '$ket')");
        if ($out_history) {
            echo '<script language="javascript">';
            echo 'let text = "Berhasil menyimpan data !";
                        if (confirm(text) == true) {
                            document.location.href = "prd_pinjam_stdcckwarna_te.php";
                        } else {
                            document.location.href = "prd_pinjam_stdcckwarna_te.php";
                        }';
            echo '</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PRD - PINJAM BUKU STD CCK WARNA TE</title>
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
    <link rel="stylesheet" href="files\bower_components\select2\css\select2.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\prism\prism.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\pcoded-horizontal.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
</head>
<style>
    .blink_me {
        animation: blinker 1s linear infinite;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }
</style>
<?php require_once 'header.php'; ?>

<body>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Form Pinjam Buku</h5>
                                    </div>
                                    <form action="" method="post">
                                        <div class="card-block" <?php if (isset($_POST['tambah']) or $_GET['tambah'] == '1') : ?> hidden <?php else : ?> show <?php endif; ?>>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Scan Barcode</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control input-sm" name="id" id="id" value="<?= $_POST['id']; ?>" onchange="barcode()" placeholder="Scan Barcode..." autofocus>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" style="background: rgba(0, 0, 0, 0); border: none; outline: none;" disabled id="muncul_nowarna">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Penanggung Jawab</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control input-sm" name="no_absen" id="no_absen" value="<?= $_POST['no_absen']; ?>" onchange="absen()" placeholder="Scan No Absen...">
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" style="background: rgba(0, 0, 0, 0); border: none; outline: none;" disabled id="nama">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Status</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control input-sm" name='status'>
                                                        <option value="" selected disabled>Pilih Status pinjam/kembalikan</option>
                                                        <option value="Pinjam" <?php if ($_POST['status'] == 'Pinjam') {
                                                                                    echo 'SELECTED';
                                                                                } ?>>Pinjam</option>
                                                        <option value="Kembali" <?php if ($_POST['status'] == 'Kembali') {
                                                                                    echo 'SELECTED';
                                                                                } ?>>Kembali</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Keterangan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control input-sm" name="ket" value="<?= $_POST['ket']; ?>" placeholder="Keterangan...">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xl-12 m-b-30">
                                                <button type="submit" style="background-color: transparent; background-repeat: no-repeat; border: none; cursor: pointer;overflow: hidden;outline: none;"></button>
                                                <button type="submit" name="simpan" class="btn btn-primary btn-sm"><i class="icofont icofont-save"></i> Simpan TE</button>
                                                <button type="submit" name="lihatdata_bergerak" class="btn btn-danger btn-sm"><i class="icofont icofont-external"></i> Lihat data transaksi</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php if (isset($_POST['lihatdata_bergerak'])) : ?>
                                    <div class="card">
                                        <form action="printbarcode_bukupinjam.php" method="POST" target="_blank">
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table class="table table-striped table-bordered nowrap" id="example2" style="width:100%">
                                                        <thead>
                                                            <th>No Barcode</th>
                                                            <th>No KK</th>
                                                            <th>No Demand</th>
                                                            <th>LOT</th>
                                                            <th>No Mesin</th>
                                                            <th>No Warna</t>
                                                            <th>Warna</t>
                                                            <th>Status Pinjam</th>
                                                            <th>Keterangan</th>
                                                            <th>Archive</th>
                                                            <th>Opsi</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $q_bukupinjam = mysqli_query($con_db_dyeing, "SELECT
                                                                                                                    a.id,
                                                                                                                    a.nokk,
                                                                                                                    a.nodemand,
                                                                                                                    b.no_mesin,
                                                                                                                    b.no_warna,
                                                                                                                    b.warna,
                                                                                                                    a.absen_in,
                                                                                                                    a.tgl_in,
                                                                                                                    a.tgl_out,
                                                                                                                    a.archive,
                                                                                                                    a.keterangan
                                                                                                                FROM
                                                                                                                    tbl_montemp a
                                                                                                                LEFT JOIN tbl_schedule b ON b.id = a.id_schedule
                                                                                                                WHERE
                                                                                                                    (a.tgl_in IS NOT NULL OR a.tgl_out IS NOT NULL)
                                                                                                                ORDER BY
                                                                                                                    a.id DESC");
                                                            ?>
                                                            <?php while ($row_bukupinjam = mysqli_fetch_array($q_bukupinjam)) {
                                                                // Mendapatkan nilai nokk dari setiap baris
                                                                $nokk = $row_bukupinjam['nokk'];

                                                                // Eksekusi query kedua untuk setiap nokk
                                                                $db2 = db2_exec($conn1, "SELECT
                                                                                            LOT
                                                                                        FROM
                                                                                            ITXVIEWKK
                                                                                        WHERE
                                                                                            PRODUCTIONORDERCODE = '$nokk'");

                                                                // Ambil data dari hasil query kedua
                                                                $row_db2 = db2_fetch_assoc($db2);

                                                            ?>
                                                                <tr>
                                                                    <td><?= sprintf("%'.06d\n", $row_bukupinjam['id']); ?></td>
                                                                    <td><?= $row_bukupinjam['nokk']; ?></td>
                                                                    <td><?= $row_bukupinjam['nodemand']; ?></td>
                                                                    <td><?= $row_db2['LOT']; ?></td>
                                                                    <td><?= $row_bukupinjam['no_mesin']; ?></td>
                                                                    <td><?= $row_bukupinjam['no_warna']; ?></td>
                                                                    <td><?= $row_bukupinjam['warna']; ?></td>
                                                                    <td>
                                                                        <?php
                                                                        $no_absen = ltrim($row_bukupinjam['absen_in'], '0');
                                                                        $cari_nama_in = mysqli_query($con_hrd, "SELECT * FROM tbl_makar WHERE no_scan = '$no_absen'");
                                                                        $cari_nama_out = mysqli_query($con_hrd, "SELECT * FROM tbl_makar WHERE no_scan = '$no_absen'");
                                                                        $nama_in = mysqli_fetch_assoc($cari_nama_in);
                                                                        $nama_out = mysqli_fetch_assoc($cari_nama_out);
                                                                        if (!empty($row_bukupinjam['tgl_in'])) {
                                                                            echo "Dipinjam : $nama_in[nama] <br>";
                                                                            echo "Waktu Pinjam :$row_bukupinjam[tgl_in] <br><br>";
                                                                        }
                                                                        if (!empty($row_bukupinjam['tgl_out'])) {
                                                                            echo "Dikembalikan : $nama_out[nama] <br>";
                                                                            echo "Waktu Kembali : $row_bukupinjam[tgl_out]";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td><?= $row_bukupinjam['keterangan']; ?></td>
                                                                    <td>
                                                                        <a data-pk="<?= $row_bukupinjam['id'] ?>" data-value="<?= $row_bukupinjam['archive'] ?>" class="archive_edit_te" href="javascipt:void(0)">
                                                                            <?= $row_bukupinjam['archive']; ?>
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="prd_prd_pinjam_stdcckwarna_history.php?id=<?= $row_bukupinjam['id'] ?>&kode=te" target="_blank" class="btn btn-primary btn-round btn-sm"><i class="icofont icofont-history"></i>History</a>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once 'footer.php'; ?>
<script>
    $(function() {
        $('#example2').DataTable({
            'searching': true
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
    })
</script>