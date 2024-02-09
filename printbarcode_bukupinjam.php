
<?php if(isset($_POST['print_select_zebra'])) : ?>
    <style>
        @page {
            size: 6cm 3cm;
            margin: 0.21cm;
        }

        body {
            margin: 0;
            padding: 0;
            width: 6cm;
            height: 3cm;
        }
    </style>
    <?php
        require_once "phpqrcode/qrlib.php"; 
        require_once "koneksi.php";
        $id_generate = $_POST['id_barcode'];
        if (empty($id_generate)) {
            echo ("You didn't select anything");
        } else {
            $total_selected = count($id_generate);

            for ($i = 0 ; $i < 100; $i++) {
                $value_generate[]   =  "'".$id_generate[$i]."'";
            }
            $where_value    = implode(', ', $value_generate);

            $q_pinjambuku   = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam WHERE id IN ($where_value)");
        }
    ?>
    <?php if (!empty($id_generate)) { ?>
        <?php
            $penyimpanan = "temp/";
        ?>
        <?php while ($row_data = mysqli_fetch_array($q_pinjambuku)) { ?>
            <!-- <p> -->
                <?php
                    $isi = $row_data['id'];

                    $nama_file = $penyimpanan .  $row_data['id']. '.png';

                    QRcode::png($isi, $nama_file, QR_ECLEVEL_Q, 6,1); 
                ?>
                &nbsp;
                <img src="temp/<?= $row_data['id']; ?>.png" width="85">
                <span style="font-size: 12px;"><?= $row_data['id']; ?></span>
                <br>
                <!-- <img src="barcode.php?text=<?= sprintf("%'.06d\n", $row_data['id']); ?>&print=true" width="210" height="106"> -->
            <!-- </p> -->
        <?php } ?>
    <?php } ?>
<?php else : ?>
<html>
<head>
    <link href="styles_cetak.css" rel="stylesheet" type="text/css">
    <?php if(isset($_POST['print_select'])){ ?>
        <title>Print Barcode</title>
    <?php }elseif(isset($_POST['arsip_select'])){ ?>
        <title>Arsip Data Resep</title>
    <?php } ?>
    <style>
        td{
            border-top:0px #000000 solid; 
            border-bottom:0px #000000 solid;
            border-left:0px #000000 solid; 
            border-right:0px #000000 solid;
        }
    </style>
</head>
<body onload="print();">
<?php if(isset($_POST['print_select'])){ ?>
    <?php
        require_once "koneksi.php";
        require_once "phpqrcode/qrlib.php"; 

        $id_generate = $_POST['id_barcode'];
        if (empty($id_generate)) {
            echo ("You didn't select anything");
        } else {
            $total_selected = count($id_generate);

            for ($i = 0 ; $i < 3; $i++) {
                $value_generate[]   =  "'".$id_generate[$i]."'";
            }
            $where_value    = implode(', ', $value_generate);

            $q_pinjambuku   = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam WHERE id IN ($where_value)");
        }
    ?>
    <table width="100%" border="0" style="width: 7in;">
        <tbody>    
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <?php if (!empty($id_generate)) { ?>
                    <?php
                        $penyimpanan = "temp/";
                    ?>
                    <?php while ($row_data = mysqli_fetch_array($q_pinjambuku)) { ?>
                        <td align="left" valign="top" style="height: 1.6in;">
                        <table width="100%" border="0" class="table-list1" style="width: 2.3in;">
                            <tr>
                                <?php
                                    // $isi = $row_data['id'];

                                    // $nama_file = $penyimpanan .  $row_data['id']. '.png';

                                    // QRcode::png($isi, $nama_file); 
                                ?>
                                &nbsp;
                                <!-- <img src="temp/<?= $row_data['id']; ?>.png" width="82px"> -->
                                <img src="barcode.php?text=<?= sprintf("%'.06d\n", $row_data['id']); ?>&print=true&size=60" width="160px">
                                <!-- <img src='https://barcode.tec-it.com/barcode.ashx?data=<?= sprintf("%'.06d\n", $row_data['id']); ?>&code=Code128&translate-esc=on'/> -->
                            </tr>
                        </table>
                        </td>
                    <?php } ?>
                <?php } ?>
            </tr>
        </tbody>
    </table>
<?php }elseif(isset($_POST['arsip_select'])){ ?>
    <?php
        require_once "koneksi.php";
        $id_generate = $_POST['id_barcode'];
        if (empty($id_generate)) {
            echo ("You didn't select anything");
        } else {
            $total_selected = count($id_generate);
    
            for ($i = 0 ; $i < 50; $i++) {
                $value_generate[]   =  "'".$id_generate[$i]."'";
            }
            $where_value    = implode(', ', $value_generate);
    
            $q_pinjambuku   = mysqli_query($con_nowprd, "UPDATE buku_pinjam 
                                                            SET status_file = 'Arsip' 
                                                            WHERE id IN ($where_value)");
            if($q_pinjambuku){
                echo '<script language="javascript">';
                echo 'let text = "Data Resep Berhasil di arsip !";
                        if (confirm(text) == true) {
                            document.location.href = "prd_pinjam_stdcckwarna.php";
                        } else {
                            document.location.href = "prd_pinjam_stdcckwarna.php";
                        }';
                echo '</script>';

            }
        }
    ?>
<?php }elseif(isset($_POST['batalkan_arsip'])){
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
} ?>
</body>
</html>
<?php endif; ?>