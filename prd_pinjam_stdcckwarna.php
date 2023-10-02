<?php 
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php"; 
    if (isset($_POST['submit'])) {
        $qry_usergeneric    = "SELECT
                                    CODE,
                                    VALUESTRING AS IDCUSTOMER,
                                    LEGALNAME1 AS CUSTOMER
                                FROM
                                    USERGENERICGROUP u 
                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = u.ABSUNIQUEID AND a.FIELDNAME = 'OriginalCustomerCode'
                                LEFT JOIN ORDERPARTNER o ON o.CUSTOMERSUPPLIERCODE = a.VALUESTRING 
                                LEFT JOIN BUSINESSPARTNER b ON b.NUMBERID = o.ORDERBUSINESSPARTNERNUMBERID
                                WHERE
                                    u.USERGENERICGROUPTYPECODE = 'CL1'";
        $usergenericgroup           = db2_exec($conn1, $qry_usergeneric);

        while ($row_usergenericgroup   = db2_fetch_assoc($usergenericgroup)) {
            $cekusergeneric_mysqli      = mysqli_query($con_nowprd, "SELECT COUNT(*) AS hasildata FROM buku_pinjam WHERE no_warna = '$row_usergenericgroup[CODE]'");
            $hasil_cek_mysqli           = mysqli_fetch_assoc($cekusergeneric_mysqli);

            if($hasil_cek_mysqli['hasildata'] == 0){
                $r_usergenericgroup[]      = "('".TRIM(addslashes($row_usergenericgroup['CODE']))."',"
                                            ."'RC',"
                                            ."'".TRIM(addslashes($row_usergenericgroup['IDCUSTOMER']))."',"
                                            ."'".TRIM(addslashes($row_usergenericgroup['CUSTOMER']))."',"
                                            ."'".$_SERVER['REMOTE_ADDR']."',"
                                            ."'".date('Y-m-d H:i:s')."')";
            }
        }
        if(!empty($r_usergenericgroup)){
            $value_usergenericgroup        = implode(',', $r_usergenericgroup);
            mysqli_query($con_nowprd, "INSERT INTO buku_pinjam(no_warna,kode,idcustomer,customer,IPADDRESS,CREATEDATETIME) VALUES $value_usergenericgroup");
        }

        header("Location: prd_pinjam_stdcckwarna.php");
    }elseif (isset($_POST['simpan'])) {
        $id         = sprintf("%'.00d\n", $_POST['id']);
        $no_absen   = $_POST['no_absen'];
        $ket        = $_POST['ket'];
        $tgl        = date('Y-m-d H:i:s');

        $caritgl_in = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam WHERE id ='$id'");
        $row_tgl_in = mysqli_fetch_assoc($caritgl_in);

        if(empty($row_tgl_in['tgl_in'])){
            $in             = mysqli_query($con_nowprd, "UPDATE buku_pinjam 
                                                            SET absen_in = '$no_absen',
                                                                ket = '$ket',
                                                                tgl_in = '$tgl'
                                                            WHERE
                                                                id = '$id'");
            $in_history     = mysqli_query($con_nowprd, "INSERT INTO buku_pinjam_history(id_buku_pinjam,no_absen,tgl_in,ket)VALUES('$id','$no_absen', '$tgl', '$ket')");
        }else{
            $out            = mysqli_query($con_nowprd, "UPDATE buku_pinjam 
                                                            SET absen_out = '$no_absen',
                                                                ket = '$ket',
                                                                tgl_out = '$tgl'
                                                            WHERE
                                                                id = '$id'");
            $out_history    = mysqli_query($con_nowprd, "INSERT INTO buku_pinjam_history(id_buku_pinjam,no_absen,tgl_out,ket)VALUES('$id','$no_absen', '$tgl', '$ket')");
        }
        header("Location: prd_pinjam_stdcckwarna.php");

    }if(isset($_POST['batalkan_arsip'])){
        require_once "koneksi.php";
        $id_generate = $_POST['id_barcode'];
        if (empty($id_generate)) {
            echo ("You didn't select anything");
        } else {
            $total_selected = count($id_generate);
    
            for ($i = 0 ; $i < 3; $i++) {
                $value_generate[]   =  "'".$id_generate[$i]."'";
            }
            $where_value    = implode(', ', $value_generate);
    
            $q_pinjambuku   = mysqli_query($con_nowprd, "UPDATE buku_pinjam 
                                                            SET status_file = null 
                                                            WHERE id IN ($where_value)");
            if($q_pinjambuku){
                echo '<script language="javascript">';
                echo 'let text = "Arsip berhasil di batalkan !";
                        if (confirm(text) == true) {
                            document.location.href = "prd_pinjam_stdcckwarna.php";
                        } else {
                            document.location.href = "prd_pinjam_stdcckwarna.php";
                        }';
                echo '</script>';

            }
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
    <link rel="stylesheet" type="text/css" href="files\assets\pages\prism\prism.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="files\assets\css\pcoded-horizontal.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="files\bower_components\select2\css\select2.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\bootstrap-multiselect\css\bootstrap-multiselect.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\multiselect\css\multi-select.css">
</head>
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

</script>
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
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Scan Barcode</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control input-sm" name="id" id="id" onchange="barcode()" placeholder="Scan Barcode..." autofocus>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" style="background: rgba(0, 0, 0, 0); border: none; outline: none;" disabled id="muncul_nowarna">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Scan No Absen</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control input-sm" name="no_absen" id="no_absen" onchange="absen()" placeholder="Scan No Absen...">
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" style="background: rgba(0, 0, 0, 0); border: none; outline: none;" disabled id="nama">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Keterangan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control input-sm" name="ket" placeholder="Keterangan...">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xl-12 m-b-30">
                                                <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
                                                <button type="submit" name="submit" class="btn btn-success btn-sm">Fetch Data</button>
                                                <button type="submit" name="lihatdata" class="btn btn-warning btn-sm">Lihat Data</button>
                                                <button type="submit" name="lihatdata_arsip" class="btn btn-inverse btn-sm"><i class="icofont icofont-ui-file"></i>Lihat Arsip</button>
                                                <?php if (isset($_POST['lihatdata'])) : ?>
                                                    <a href="prd_prd_pinjam_stdcckwarna_excel.php?arsip=0" class="btn btn-info btn-sm"><i class="fa fa-file-excel-o"></i>Export Excel</a>
                                                <?php elseif (isset($_POST['lihatdata_arsip'])) : ?>
                                                    <a href="prd_prd_pinjam_stdcckwarna_excel.php?arsip=1" class="btn btn-info btn-sm"><i class="fa fa-file-excel-o"></i>Export Excel</a>
                                                <?php endif; ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST['lihatdata'])) : ?>
                                    <div class="card">
                                        <form action="printbarcode_bukupinjam.php" method="POST" target="_blank">
                                            <div class="card-header text-right">
                                                <button type="submit" name="print_select" class="btn btn-primary btn-sm">Print Barcode</button>
                                                <button type="submit" name="arsip_select" class="btn btn-inverse btn-sm">Arsipkan</button>
                                                <span>Maks. 3 Barcode untuk dipilih</span>
                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="lang-dt" class="table compact table-striped table-bordered nowrap" style="width:100%">
                                                        <thead>
                                                            <th align="center" width="3%">Print</th>
                                                            <th width="4%">No Barcode</th>
                                                            <th width="4%">No Warna</th>
                                                            <th width="10%">Warna</th>
                                                            <th width="3%">Kode</th>
                                                            <th width="22%">Note</th>
                                                            <th width="7%">Customer</th>
                                                            <th width="20%">Status Pinjam</th>
                                                            <th width="10%">Opsi</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $q_bukupinjam   = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam WHERE status_file IS NULL");
                                                            ?>
                                                            <?php while ($row_bukupinjam = mysqli_fetch_array($q_bukupinjam)) { ?>
                                                                <tr>
                                                                    <td align="center">
                                                                        <input type="checkbox" name="id_barcode[]" value="<?= sprintf("%'.06d\n", $row_bukupinjam['id']); ?>">
                                                                    </td>
                                                                    <td><?= sprintf("%'.06d\n", $row_bukupinjam['id']); ?></td>
                                                                    <td><?= $row_bukupinjam['no_warna']; ?></td>
                                                                    <td>
                                                                        <?php
                                                                            $q_warna    = db2_exec($conn1, "SELECT * FROM USERGENERICGROUP WHERE CODE = '$row_bukupinjam[no_warna]'");
                                                                            $row_warna  = db2_fetch_assoc($q_warna);
                                                                            echo $row_warna['LONGDESCRIPTION'];
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <a style="border-bottom:1px dashed green;" data-pk="<?= $row_bukupinjam['id'] ?>" data-value="<?= $row_bukupinjam['kode'] ?>" class="kode_edit" href="javascipt:void(0)">
                                                                            <?= $row_bukupinjam['kode']; ?>
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <a style="border-bottom:1px dashed green;" data-pk="<?= $row_bukupinjam['id'] ?>" data-value="<?= $row_bukupinjam['note'] ?>" class="note_edit" href="javascipt:void(0)">
                                                                            <?= $row_bukupinjam['note']; ?>
                                                                        </a>
                                                                    </td>
                                                                    <td><?= $row_bukupinjam['customer']; ?></td>
                                                                    <td>
                                                                        <?php
                                                                            $cari_nama_in = mysqli_query($con_hrd, "SELECT * FROM tbl_makar WHERE no_scan = '$row_bukupinjam[absen_in]'");
                                                                            $cari_nama_out = mysqli_query($con_hrd, "SELECT * FROM tbl_makar WHERE no_scan = '$row_bukupinjam[absen_out]'");
                                                                            $nama_in    = mysqli_fetch_assoc($cari_nama_in);
                                                                            $nama_out   = mysqli_fetch_assoc($cari_nama_out);
                                                                            if(!empty($row_bukupinjam['tgl_in'])){
                                                                                echo    "Dipinjam : $nama_in[nama], $row_bukupinjam[tgl_in] <br>";
                                                                            }
                                                                            if(!empty($row_bukupinjam['tgl_out'])){
                                                                                echo    "Dikembalikan : $nama_out[nama], $row_bukupinjam[tgl_out]";
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" style="color: #4778FF;" data-toggle="modal" data-target="#history<?= $row_bukupinjam['id']; ?>">
                                                                            <i class="icofont icofont-speech-comments"></i>History
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <!-- <div id="history<?= $row_bukupinjam['id']; ?>" class="modal fade" role="dialog">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="login-card card-block login-card-modal">
                                                                            <table class="table table-xs">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Nama</th>
                                                                                        <th>Tanggal Pinjam</th>
                                                                                        <th>Tanggal Kembali</th>
                                                                                        <th>Ket</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                                                                        $q_history  = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam_history WHERE id_buku_pinjam = '$row_bukupinjam[id]'");
                                                                                        while ($row_history = mysqli_fetch_array($q_history)) {
                                                                                    ?>
                                                                                    <tr>
                                                                                        <th scope="row"><?= $row_history['no_absen']; ?></th>
                                                                                        <td><?= $row_history['tgl_in']; ?></td>
                                                                                        <td><?= $row_history['tgl_out']; ?></td>
                                                                                        <td><?= $row_history['ket']; ?></td>
                                                                                    </tr>
                                                                                    <?php } ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <?php elseif (isset($_POST['lihatdata_arsip'])) : ?>
                                    <div class="card">
                                        <form action="" method="POST">
                                            <div class="card-header text-right">
                                                <button type="submit" name="batalkan_arsip" class="btn btn-inverse btn-sm">Batalkan Arsip</button>
                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="lang-dt" class="table compact table-striped table-bordered nowrap" style="width:100%">
                                                        <thead>
                                                            <th align="center" width="3%">Print</th>
                                                            <th width="4%">No Barcode</th>
                                                            <th width="4%">No Warna</th>
                                                            <th width="10%">Warna</th>
                                                            <th width="3%">Kode</th>
                                                            <th width="22%">Note</th>
                                                            <th width="7%">Customer</th>
                                                            <th width="20%">Status Pinjam</th>
                                                            <th width="10%">Opsi</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $q_bukupinjam   = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam WHERE status_file = 'Arsip'");
                                                            ?>
                                                            
                                                            <?php while ($row_bukupinjam = mysqli_fetch_array($q_bukupinjam)) { ?>
                                                                <tr>
                                                                    <td align="center">
                                                                        <input type="checkbox" name="id_barcode[]" value="<?= sprintf("%'.06d\n", $row_bukupinjam['id']); ?>">
                                                                    </td>
                                                                    <td><?= sprintf("%'.06d\n", $row_bukupinjam['id']); ?></td>
                                                                    <td><?= $row_bukupinjam['no_warna']; ?></td>
                                                                    <td>
                                                                        <?php
                                                                            $q_warna    = db2_exec($conn1, "SELECT * FROM USERGENERICGROUP WHERE CODE = '$row_bukupinjam[no_warna]'");
                                                                            $row_warna  = db2_fetch_assoc($q_warna);
                                                                            echo $row_warna['LONGDESCRIPTION'];
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <a style="border-bottom:1px dashed green;" data-pk="<?= $row_bukupinjam['id'] ?>" data-value="<?= $row_bukupinjam['kode'] ?>" class="kode_edit" href="javascipt:void(0)">
                                                                            <?= $row_bukupinjam['kode']; ?>
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <a style="border-bottom:1px dashed green;" data-pk="<?= $row_bukupinjam['id'] ?>" data-value="<?= $row_bukupinjam['note'] ?>" class="note_edit" href="javascipt:void(0)">
                                                                            <?= $row_bukupinjam['note']; ?>
                                                                        </a>
                                                                    </td>
                                                                    <td><?= $row_bukupinjam['customer']; ?></td>
                                                                    <td>
                                                                        <?php
                                                                            $cari_nama_in = mysqli_query($con_hrd, "SELECT * FROM tbl_makar WHERE no_scan = '$row_bukupinjam[absen_in]'");
                                                                            $cari_nama_out = mysqli_query($con_hrd, "SELECT * FROM tbl_makar WHERE no_scan = '$row_bukupinjam[absen_out]'");
                                                                            $nama_in    = mysqli_fetch_assoc($cari_nama_in);
                                                                            $nama_out   = mysqli_fetch_assoc($cari_nama_out);
                                                                            if(!empty($row_bukupinjam['tgl_in'])){
                                                                                echo    "Dipinjam : $nama_in[nama], $row_bukupinjam[tgl_in] <br>";
                                                                            }
                                                                            if(!empty($row_bukupinjam['tgl_out'])){
                                                                                echo    "Dikembalikan : $nama_out[nama], $row_bukupinjam[tgl_out]";
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" style="color: #4778FF;" data-toggle="modal" data-target="#history<?= $row_bukupinjam['id']; ?>">
                                                                            <i class="icofont icofont-speech-comments"></i>History
                                                                        </button>
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
<script type="text/javascript" src="files\bower_components\jquery\js\jquery.min.js"></script>
<script type="text/javascript" src="files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
<script src="files\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
<script src="files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
<script src="files\assets\pages\data-table\extensions\buttons\js\dataTables.buttons.min.js"></script>
<script src="files\assets\pages\data-table\extensions\buttons\js\buttons.flash.min.js"></script>
<script src="files\assets\pages\data-table\extensions\buttons\js\jszip.min.js"></script>
<script src="files\assets\pages\data-table\extensions\buttons\js\vfs_fonts.js"></script>
<script src="files\assets\pages\data-table\extensions\buttons\js\buttons.colVis.min.js"></script>
<script src="files\bower_components\datatables.net-buttons\js\buttons.print.min.js"></script>
<script src="files\bower_components\datatables.net-buttons\js\buttons.html5.min.js"></script>
<script src="files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
<script src="files\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
<script src="files\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="files\bower_components\i18next\js\i18next.min.js"></script>
<script type="text/javascript" src="files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
<script src="files\assets\pages\data-table\extensions\buttons\js\extension-btns-custom.js"></script>
<script src="files\assets\js\pcoded.min.js"></script>
<script src="files\assets\js\menu\menu-hori-fixed.js"></script>
<script src="files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="files\assets\js\script.js"></script>
<script>
    $('#excel-LA').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="F"]', sheet).each(function() {
                    if ($('is t', this).text().replace(/[^\d]/g, '') * 1 >= 500000) {
                        $(this).attr('s', '20');
                    }
                });
            }
        }]
    });
</script>
<?php require_once 'footer.php'; ?>