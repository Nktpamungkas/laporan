<?php 
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php"; 
    if (isset($_POST['simpan'])) {
        $id         = TRIM(sprintf("%'.06d\n", $_POST['id']));
        $no_absen   = $_POST['no_absen'];
        $ket        = $_POST['ket'];
        $status     = $_POST['status'];
        $tgl        = date('Y-m-d H:i:s');

        if($status == 'Pinjam'){
            $in             = mysqli_query($con_nowprd, "UPDATE buku_pinjam 
                                                            SET absen_in = '$no_absen',
                                                                tgl_in = '$tgl',
                                                                ket = '$ket',
                                                                absen_out = null,
                                                                tgl_out = null,
                                                                archive = 'Belum_Diarsipkan'
                                                            WHERE
                                                                id = '$id'");
            $in_history     = mysqli_query($con_nowprd, "INSERT INTO buku_pinjam_history(id_buku_pinjam,no_absen,tgl_in,ket)VALUES('$id','$no_absen', '$tgl', '$ket')");
            if($in_history){
                echo '<script language="javascript">';
                echo 'let text = "Berhasil menyimpan data !";
                        if (confirm(text) == true) {
                            document.location.href = "prd_pinjam_stdcckwarna_ld.php";
                        } else {
                            document.location.href = "prd_pinjam_stdcckwarna_ld.php";
                        }';
                echo '</script>';
            }
        }else{
            $out            = mysqli_query($con_nowprd, "UPDATE buku_pinjam 
                                                                SET absen_out = '$no_absen',
                                                                    tgl_out = '$tgl',
                                                                    ket = '$ket'
                                                                WHERE
                                                                    id = '$id'");
            $out_history    = mysqli_query($con_nowprd, "INSERT INTO buku_pinjam_history(id_buku_pinjam,no_absen,tgl_out,ket)VALUES('$id','$no_absen', '$tgl', '$ket')");
            if($out_history){
                echo '<script language="javascript">';
                echo 'let text = "Berhasil menyimpan data !";
                        if (confirm(text) == true) {
                            document.location.href = "prd_pinjam_stdcckwarna_ld.php";
                        } else {
                            document.location.href = "prd_pinjam_stdcckwarna_ld.php";
                        }';
                echo '</script>';
            }
        }

    }elseif (isset($_POST['simpan_tambah'])) {
        if($_POST['no_warna']){
            $no_warna           = $_POST['no_warna'];
        }elseif(empty($_POST['no_warna'])){
            $no_warna           = $_POST['no_warna_manual'];
        }
        $long_description   = $_POST['long_description'];
        $kode               = $_POST['kode'];
        $customer           = $_POST['customer'];
        $note               = $_POST['note'];
        $tgl                = date('Y-m-d H:i:s');
        $ip                 = $_SERVER['REMOTE_ADDR'];

        $buku_pinjam     = mysqli_query($con_nowprd, "INSERT INTO buku_pinjam(no_warna,long_description,kode,note,customer,IPADDRESS,CREATEDATETIME)VALUES('$no_warna','$long_description','$kode','$note','$customer','$ip','$tgl')");
        if($buku_pinjam){
            echo '<script language="javascript">';
            echo 'let text = "Berhasil menyimpan data !";
                    if (confirm(text) == true) {
                        document.location.href = "prd_pinjam_stdcckwarna_ld.php";
                    } else {
                        document.location.href = "prd_pinjam_stdcckwarna_ld.php";
                    }';
            echo '</script>';
        }
    }elseif(isset($_POST['update_warna'])){
        $q_updatewarna  = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam WHERE long_description = '' AND kode = 'RC'");
        while($row_updatewarna    = mysqli_fetch_array($q_updatewarna)){
            $q_cekwarna = db2_exec($conn1, "SELECT
                                                CODE,
                                                LONGDESCRIPTION
                                            FROM
                                                USERGENERICGROUP
                                            WHERE
                                                TRIM(CODE) = '$row_updatewarna[no_warna]'");
            $row_namawarna = db2_fetch_assoc($q_cekwarna);
            $update_warna = mysqli_query($con_nowprd, "UPDATE buku_pinjam 
                                                        SET long_description = '$row_namawarna[LONGDESCRIPTION]' 
                                                        WHERE no_warna = '$row_updatewarna[no_warna]'");
        }
        if($update_warna){
            echo '<script language="javascript">';
            echo 'let text = "update nama warna data berhasil !";
                    if (confirm(text) == true) {
                        document.location.href = "prd_pinjam_stdcckwarna_ld.php";
                    } else {
                        document.location.href = "prd_pinjam_stdcckwarna_ld.php";
                    }';
            echo '</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRD - PINJAM BUKU STD CCK WARNA</title>
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
<script type="text/javascript">
	function barcode(){
		var id		= document.getElementById("id").value;

		$.get("api_barcode_bukupinjam.php?id="+id,function(data){
			document.getElementById("muncul_nowarna").value = data.no_warna;
		});
	}
	function absen(){
		var no_absen		= document.getElementById("no_absen").value;

		$.get("api_hris.php?no_absen="+no_absen,function(data){
			document.getElementById("nama").value = data.nama;
		});
	}

    function cari_no_warna(){
		var no_warna		= document.getElementById("no_warna").value;

        $.get("api_usergenericcode.php?no_warna="+no_warna,function(data){
			document.getElementById("muncul_longdescription").value = data.LONGDESCRIPTION;
			document.getElementById("customer").value = data.CUSTOMER;
		});
    }
    
    function cari_std_cck_warna(){
		var no_warna		= document.getElementById("no_warna").value;

        $.get("api_laboratmatching.php?no_warna="+no_warna,function(data){
			document.getElementById("muncul_longdescription").value = data.warna;
			document.getElementById("customer").value = data.langganan;
		});
    }

    function toggleSelect() {
        // Mendapatkan elemen checkbox dan select
        var checkbox = document.getElementById('manual');
        var no_warna_manual = document.getElementById('no_warna_manual');

        // Jika checkbox dicentang, sembunyikan select; jika tidak, tampilkan select
        no_warna_manual.style.display = checkbox.checked ? 'block' : 'none';
    }

</script>
<?php require_once 'header.php'; ?>
<body>
<?= $diff_total_waktu->i; ?>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Form Pinjam Buku LD</h5>
                                    </div>
                                    <form action="" method="post">
                                        <div class="card-block" <?php if (isset($_POST['tambah']) OR $_GET['tambah'] == '1') : ?> hidden <?php else : ?> show <?php endif; ?>>
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
                                                        <option value="Pinjam" <?php if($_POST['status'] == 'Pinjam'){ echo 'SELECTED'; } ?>>Pinjam</option>
                                                        <option value="Kembali" <?php if($_POST['status'] == 'Kembali'){ echo 'SELECTED'; } ?>>Kembali</option>
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
                                                <?php if($_SERVER['REMOTE_ADDR'] == '10.0.5.132') : ?>
                                                    <button type="submit" name="update_warna" class="btn btn-primary btn-sm"><i class="icofont icofont-save"></i> Update Warna</button>
                                                <?php endif; ?>

                                                <button type="submit" style="background-color: transparent; background-repeat: no-repeat; border: none; cursor: pointer;overflow: hidden;outline: none;"></button>
                                                <button type="submit" name="simpan" class="btn btn-primary btn-sm"><i class="icofont icofont-save"></i> Simpan</button>
                                                <button type="submit" name="lihatdata_ld" class="btn btn-warning btn-sm"><i class="icofont icofont-save"></i> Lihat semua data LD</button>
                                                <button type="submit" name="lihatdata_bergerak" class="btn btn-danger btn-sm"><i class="icofont icofont-external"></i> Lihat data transaksi LD</button>
                                                <button type="submit" name="lihatdata_arsip" class="btn btn-inverse btn-sm"><i class="icofont icofont-ui-file"></i>Lihat arsip LD</button>
                                                <button type="submit" name="tambah" class="btn btn-default btn-sm"><i class="icofont icofont-ui-add"></i> Tambah Baru</button>
                                            </div>
                                            <!-- 
                                                <div class="card-header">
                                                    <h5>Filter Pencarian</h5>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">No Warna</label>
                                                    <div class="col-sm-2">
                                                        <select class="js-example-basic-multiple-limit col-sm-2" name='no_warna'>
                                                            <option value="-" disabled selected>Pilih</option>
                                                            <?php
                                                                $q_buku_pinjam  = mysqli_query($con_nowprd, "SELECT DISTINCT no_warna, long_description FROM `buku_pinjam` ORDER BY id DESC");
                                                            ?>
                                                            <?php while($row_buku_pinjam = mysqli_fetch_array($q_buku_pinjam)) { ?>
                                                                <option value="<?= $row_buku_pinjam['no_warna']; ?>"><?= $row_buku_pinjam['no_warna']; ?> | <?= $row_buku_pinjam['long_description']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button type="submit" name="cari_data" class="btn btn-danger btn-xl"><i class="icofont icofont-ui-search"></i> <i class="icofont icofont-search-alt-1"></i> Cari data</button>
                                                    </div>
                                                </div>
                                            -->
                                        </div>
                                    </form>
                                    <?php if (isset($_POST['tambah']) OR $_GET['tambah'] == '1') : ?>
                                        <div class="card-block">
                                            <form action="" method="post">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Standart Cocok Warna</label>
                                                    <div class="col-sm-2">
                                                        <select  name="no_warna" id="no_warna" onchange="cari_std_cck_warna()" class="js-example-basic-single col-sm-2">
                                                            <option value="" disabled selected>Pilih</option>
                                                            <?php
                                                                $q_usergeneric = mysqli_query($con_db_lab, "SELECT DISTINCT no_warna FROM `tbl_matching` WHERE not recipe_code = ''");
                                                                while ($row_usergeneric = mysqli_fetch_array($q_usergeneric)) { 
                                                            ?>
                                                                <option value="<?= TRIM($row_usergeneric['no_warna']); ?>"><?= TRIM($row_usergeneric['no_warna']); ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control input-sm" name="long_description" id="muncul_longdescription" placeholder="Nama Warna..." required>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="checkbox" id="manual" name="manual" onclick="toggleSelect()">
                                                        <label for="vehicle1"> Manual</label><br>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" style="display: none;" class="form-control input-sm" name="no_warna_manual" id="no_warna_manual" placeholder="No Warna manual...">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Kode</label>
                                                    <div class="col-sm-2">
                                                        <select name="kode" class="form-control" id="kode" onchange="window.location='prd_pinjam_stdcckwarna_ld.php?kode='+this.value+'&tambah=1'" required>
                                                            <!-- <option value="DL" <?php if($kode == 'DL'){ echo "SELECTED"; } ?>>DL - Dye Lot Card</option> -->
                                                            <!-- <option value="RC" <?php if($kode == 'RC'){ echo "SELECTED"; } ?>>RC - Recipe Card</option> -->
                                                            <!-- <option value="OR" <?php if($kode == 'OR'){ echo "SELECTED"; } ?>>OR - Original</option> -->
                                                            <option value="LD" selected>LD - Lab Dip</option>
                                                            <!-- <option value="SL" <?php if($kode == 'SL'){ echo "SELECTED"; } ?>>SL - Sample L/D</option> -->
                                                            <!-- <option value="TE" <?php if($kode == 'TE'){ echo "SELECTED"; } ?>>TE - Tempelan Sample Celup</option> -->
                                                            <!-- <option value="FL" <?php if($kode == 'FL'){ echo "SELECTED"; } ?>>FL - Frist Lot</option> -->
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control input-sm" name="customer" id="customer" placeholder="Nama Customer..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Note</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control input-sm" name="note" placeholder="Catatan...">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-12 m-b-30">
                                                    <button type="submit" name="simpan_tambah" class="btn btn-primary btn-sm"><i class="icofont icofont-save"></i> Simpan</button>
                                                    <a href="prd_pinjam_stdcckwarna_ld.php" class="btn btn-info btn-sm"><i class="icofont icofont-undo"></i> Kembali</a>
                                                </div>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if (isset($_POST['lihatdata_ld']) OR isset($_POST['lihatdata_bergerak']) OR isset($_POST['lihatdata_arsip'])) : ?>
                                    <div class="card">
                                        <form action="printbarcode_bukupinjam.php" method="POST" target="_blank">
                                            <div class="card-header text-right">
                                                <?php if (isset($_POST['lihatdata_ld']) OR isset($_POST['lihatdata_bergerak'])) : ?>
                                                    <a class="btn btn-mat btn-success btn-sm" href="prd_pinjam_stdcckwarna_ld_excel.php">Export Excel</a>
                                                    <button type="submit" name="print_select_zebra" class="btn btn-danger btn-sm">Print Barcode (Zebra)</button>
                                                    <button type="submit" name="print_select" class="btn btn-primary btn-sm">Print Barcode</button>
                                                    <button type="submit" name="arsip_select" class="btn btn-inverse btn-sm">Arsipkan</button>
                                                    <span>Maks. 3 Barcode untuk dipilih</span>
                                                    <span>Untuk Print Barcode Zebra tidak ada batas maksimal.</span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table class="table table-striped table-bordered nowrap" id="example2" style="width:100%">
                                                        <thead>
                                                            <th align="center" width="3%">#</th>
                                                            <th style="width:4%">No Barcode</th>
                                                            <th style="width:3%">Std Cck Warna</th>
                                                            <th style="width:5%">Warna</th>
                                                            <th style="width:3%">Kode</th>
                                                            <th>Note</th>
                                                            <th>Customer</t>
                                                            <th>Status Pinjam</th>
                                                            <th>Archive</th>
                                                            <th>Opsi</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                if (isset($_POST['lihatdata_bergerak'])){
                                                                    $q_bukupinjam   = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam WHERE (tgl_in IS NOT NULL OR tgl_out IS NOT NULL) AND kode = 'LD' ORDER BY id DESC LIMIT 10000");
                                                                }elseif (isset($_POST['lihatdata_arsip'])){
                                                                    $q_bukupinjam   = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam WHERE kode = 'LD' AND archive = 'Diarsipkan' ORDER BY id DESC LIMIT 10000");
                                                                }elseif (isset($_POST['lihatdata_ld'])){
                                                                    $q_bukupinjam   = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam WHERE kode = 'LD' ORDER BY id DESC LIMIT 10000");
                                                                }
                                                            ?>
                                                            <?php while ($row_bukupinjam = mysqli_fetch_array($q_bukupinjam)) { ?>
                                                                <tr>
                                                                    <td align="center">
                                                                        <?php if (isset($_POST['lihatdata_ld'])) : ?>
                                                                            <input type="checkbox" name="id_barcode[]" value="<?= sprintf("%'.06d\n", $row_bukupinjam['id']); ?>">
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td><?= sprintf("%'.06d\n", $row_bukupinjam['id']); ?></td>
                                                                    <td><?= $row_bukupinjam['no_warna']; ?></td>
                                                                    <td><?= $row_bukupinjam['long_description']; ?></td>
                                                                    <td><?= $row_bukupinjam['kode']; ?></td>
                                                                    <td>
                                                                        <a data-pk="<?= $row_bukupinjam['id'] ?>" data-value="<?= $row_bukupinjam['note'] ?>" class="note_edit" href="javascipt:void(0)">
                                                                            <?= $row_bukupinjam['note'] ?>
                                                                        </a>
                                                                    </td>
                                                                    <td><?= $row_bukupinjam['customer']; ?></td>
                                                                    <td>
                                                                        <?php
                                                                            $no_absen    = ltrim($row_bukupinjam['absen_in'], '0');
                                                                            $cari_nama_in = mysqli_query($con_hrd, "SELECT * FROM tbl_makar WHERE no_scan = '$no_absen'");
                                                                            $cari_nama_out = mysqli_query($con_hrd, "SELECT * FROM tbl_makar WHERE no_scan = '$no_absen'");
                                                                            $nama_in    = mysqli_fetch_assoc($cari_nama_in);
                                                                            $nama_out   = mysqli_fetch_assoc($cari_nama_out);
                                                                            if(!empty($row_bukupinjam['tgl_in'])){
                                                                                echo    "Dipinjam : $nama_in[nama] <br>";
                                                                                echo    "Waktu Pinjam :$row_bukupinjam[tgl_in] <br><br>";
                                                                            }
                                                                            if(!empty($row_bukupinjam['tgl_out'])){
                                                                                echo    "Dikembalikan : $nama_out[nama] <br>";
                                                                                echo    "Waktu Kembali : $row_bukupinjam[tgl_out]";
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <a data-pk="<?= $row_bukupinjam['id'] ?>" data-value="<?= $row_bukupinjam['archive'] ?>" class="archive_edit" href="javascipt:void(0)">
                                                                            <?= $row_bukupinjam['archive']; ?>
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="prd_prd_pinjam_stdcckwarna_history.php?id=<?= $row_bukupinjam['id'] ?>" target="_blank" class="btn btn-primary btn-round btn-sm"><i class="icofont icofont-history"></i>History</a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
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