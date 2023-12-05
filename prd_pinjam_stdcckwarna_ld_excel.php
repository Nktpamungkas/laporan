<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Data Transaksi LD.xls");
    header('Cache-Control: max-age=0');
?>
<table border="1">
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
    </thead>
    <tbody>
        <?php
            require_once "koneksi.php";
            $q_bukupinjam   = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam WHERE (tgl_in IS NOT NULL OR tgl_out IS NOT NULL) AND kode = 'LD' ORDER BY id DESC LIMIT 10000");
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
                <td>
                    <a style="border-bottom:1px dashed green;" data-pk="<?= $row_bukupinjam['id'] ?>" data-value="<?= $row_bukupinjam['kode'] ?>" class="kode_edit">
                        <?= $row_bukupinjam['kode']; ?>
                    </a>
                </td>
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
                <td><?= $row_bukupinjam['archive']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>