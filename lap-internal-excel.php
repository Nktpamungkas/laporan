<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=lap-internal-" . date($_GET['tgl']) . ".xls"); //ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php
ini_set("error_reporting", 1);
include("../../koneksi.php");
session_start();

// $ct=mysqli_connect("10.0.5.42","dit","4dm1n");
// $db1=mysqli_select_db("dyeing",$ct)or die("Gagal Koneksi Dyeing");

?>

<div align="center">
  <h1>LAPORAN INTERNAL LEAD TEAM (DAYS)</h1>
</div>
<!--script disini -->
<?php
if ($_GET['tgl'] != "") {
  $tgl = $_GET['tgl'];
  $tgl1 = $_GET['tgl1'];
  $shift = $_GET['shift'];
}
if ($shift != "All") {
  $shft = " AND `shift`='$shift' ";
} else {
  $shft = " ";
}
?>
Tanggal : <?php echo $tgl; ?> s/d <?php echo $tgl1; ?><br />
Shift :<?php echo $shift; ?>
<?php
function noldepan($value, $places)
{
  if (is_numeric($value)) {
    for ($x = 1; $x <= $places; $x++) {
      $ceiling = pow(10, $x);
      if ($value < $ceiling) {
        $zeros = $places - $x;
        for ($y = 1; $y <= $zeros; $y++) {
          $leading .= "0";
        }
        $x = $places + 1;
      }
    }
    $output = $leading . $value;
  } else {
    $output = $value;
  }
  return $output;
}
?>
<br>
<table width="100%" border="1">
  <tr>
    <td width="2%" rowspan="2">
      <h4 align="center">No</h4>
    </td>
    <td width="7%" rowspan="2">
      <h4 align="center">Pelanggan</h4>
    </td>
    <td width="6%" rowspan="2">
      <h4 align="center">No Order</h4>
    </td>
    <td width="6%" rowspan="2">
      <h4 align="center">Jenis Kain</h4>
    </td>
    <td width="6%" rowspan="2">
      <h4 align="center">Warna</h4>
    </td>
    <td width="7%" rowspan="2">
      <h4 align="center">Tgl Pengiriman</h4>
    </td>
    <td width="4%" rowspan="2">
      <h4 align="center">Lot</h4>
    </td>
    <td colspan="2">
      <h4 align="center">Qty Bruto</h4>
    </td>
    <td width="8%" rowspan="2">
      <h4 align="center">Netto</h4>
    </td>
    <td width="6%" rowspan="2">
      <h4 align="center">Length</h4>
    </td>
    <td width="9%" rowspan="2">
      <h4 align="center">Tgl Celup Greige</h4>
    </td>
    <td width="8%" rowspan="2">
      <h4>Jam Celup</h4>
    </td>
    <td width="8%" rowspan="2">
      <h4 align="center">Tgl Packing</h4>
    </td>
    <td width="5%" rowspan="2">
      <h4>Tgl Ins Meja</h4>
    </td>
    <td width="7%" rowspan="2">
      <h4>Jam Packing</h4>
    </td>
    <td width="7%" rowspan="2">
      <h4 align="center">Lead Team Produksi</h4>
    </td>
    <td width="9%" rowspan="2">
      <h4 align="center">Internal Lead Time Excluding Testing</h4>
    </td>
  </tr>
  <tr>
    <td width="4%" height="50">
      <div align="center"><strong>Jml Rol</strong></div>
    </td>
    <td width="6%">
      <div align="center"><strong>KGs</strong></div>
    </td>
  </tr>
  <?php
  $no = 1;
  $sql = mysqli_query($con, "SELECT * FROM tbl_lap_inspeksi WHERE `tgl_update` BETWEEN '$tgl' AND '$tgl1' $shft AND (`dept`='PACKING' or `dept`='INSPEK MEJA') ORDER BY tgl_update ASC");
  while ($row = mysqli_fetch_array($sql)) {
    $sql_dyeing = mysqli_query($con1, "SELECT tgl_buat,jam_in FROM tbl_produksi WHERE nokk='$row[nokk]' and proses='Celup Greige' ORDER BY id ASC LIMIT 1");
    $dt = mysqli_fetch_array($sql_dyeing);

    $tgl_packing = date("Y-m-d", strtotime($row['tgl_update']));
    $tgl_celup = date("Y-m-d", strtotime($dt['tgl_buat']));
    $pecah1 = explode("-", $tgl_packing);
    $date1 = $pecah1[2];
    $month1 = $pecah1[1];
    $year1 = $pecah1[0];
    $pecah2 = explode("-", $tgl_celup);
    $date2 = $pecah2[2];
    $month2 = $pecah2[1];
    $year2 = $pecah2[0];
    $jd1 = gregoriantojd($month1, $date1, $year1);
    $jd2 = gregoriantojd($month2, $date2, $year2);
    $selisih = $jd1 - $jd2;
    $jm_in = date("H:i", strtotime(trim($dt['jam_in'])));
    $jm_mutasi = date("H:i", strtotime(trim($row['jam_mutasi'])));
    $old = date("Y-m-d", strtotime($dt['tgl_buat'])) . " " . $jm_in;
    $new = date("Y-m-d", strtotime($row['tgl_update'])) . " " . $jam_mutasi;
    $hourdiff0  = round(round(round((strtotime($new) - strtotime($old)) / 3600, 1), 2) / 24, 2);
    $hourdiff1  = round((strtotime($new) - strtotime($old)) % 3600, 1 / 3600, 2);
    $hourdiff2  = $hourdiff0;



  ?>
    <tr>
      <td>
        <div align="center"><?php echo $no; ?></div>
      </td>
      <td><?php echo $row['pelanggan']; ?></td>
      <td>
        <div align="center"><?php echo $row['no_order']; ?></div>
      </td>
      <td><?php echo $row['jenis_kain']; ?></td>
      <td><?php echo $row['warna']; ?></td>
      <td>
        <div align="center"><?php echo date("m/d/Y", strtotime($row['tgl_pengiriman'])); ?></div>
      </td>
      <td>
        <div align="center">'<?php echo $row['lot']; ?></div>
      </td>
      <td>
        <div align="right"><?php echo $row['jml_roll']; ?></div>
      </td>
      <td>
        <div align="right"><?php echo $row['bruto']; ?></div>
      </td>
      <td>
        <div align="right"><?php echo $row['netto']; ?></div>
      </td>
      <td>
        <div align="right"><?php echo $row['panjang'] . " " . $row['satuan']; ?></div>
      </td>
      <td>
        <div align="center">
          <?php if ($dt['tgl_buat'] != "") {
            echo date("m/d/Y", strtotime($dt['tgl_buat']));
          } ?>
        </div>
      </td>
      <td>
        <div align="center"><?php echo $jm_in; ?></div>
      </td>
      <td>
        <div align="center">
          <?php if ($row['dept'] == "PACKING") {
            echo date("m/d/Y", strtotime($row['tgl_update']));
          } ?>
        </div>
      </td>
      <td>
        <div align="center">
          <?php if ($row['dept'] == "INSPEK MEJA") {
            echo date("m/d/Y", strtotime($row['tgl_update']));
          } ?>
        </div>
      </td>
      <td>
        <div align="center"><?php echo $jm_mutasi; ?></div>
      </td>
      <td>
        <div align="center">
          <?php if ($dt['tgl_buat'] != "") {
            echo $hourdiff0;
          } else {
            echo "0";
          } ?>
        </div>
      </td>
      <td>
        <div align="center">
          <?php if ($dt['tgl_buat'] != "" and $hourdiff2 > 2) {
            echo ($hourdiff2 - 2);
          } else {
            echo "0";
          } ?>
        </div>
      </td>
    </tr>
  <?php $no++;
  } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>