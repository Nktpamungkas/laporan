<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Data Resep.xls");
    header('Cache-Control: max-age=0');
?>
<table>
    <thead>
        <th width="4%">No Barcode</th>
        <th width="4%">No Warna</th>
        <th width="10%">Warna</th>
        <th width="3%">Kode</th>
        <th width="22%">Note</th>
        <th width="7%">Customer</th>
        <th width="20%">Status Pinjam</th>
    </thead>
    <tbody>
        <?php
            require_once "koneksi.php"; 
            if($_GET['arsip'] == 0) {
                $q_bukupinjam   = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam WHERE status_file IS NULL");
            }else{
                $q_bukupinjam   = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam WHERE status_file = 'Arsip'");
            }
        ?>
        <?php while ($row_bukupinjam = mysqli_fetch_array($q_bukupinjam)) { ?>
            <tr>
                <td>`<?= sprintf("%'.06d\n", $row_bukupinjam['id']); ?></td>
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
            </tr>
        <?php } ?>
    </tbody>
</table>