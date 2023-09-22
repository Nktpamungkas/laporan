<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Print Barcode</title>
<style>
	td{
        border-top:0px #000000 solid; 
        border-bottom:0px #000000 solid;
        border-left:0px #000000 solid; 
        border-right:0px #000000 solid;
	}
	</style>
</head>
<body>
<?php
if(isset($_POST['print_select'])){
    require_once "koneksi.php";
    $id_generate = $_POST['id_barcode'];
    if (empty($id_generate)) {
        echo ("You didn't select anything");
    } else {
        $total_selected = count($id_generate);

        for ($i = 3; $i < $total_selected; $i++) {
            $value_generate[]   =  "'".$id_generate[$i]."'";
        }
        $where_value    = implode(', ', $value_generate);

        $q_pinjambuku   = mysqli_query($con_nowprd, "SELECT * FROM buku_pinjam WHERE id IN ($where_value)");
    }
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
            <?php while ($row_data = mysqli_fetch_array($q_pinjambuku)) { ?>
                <td align="left" valign="top" style="height: 1.6in;"><table width="100%" border="0" class="table-list1" style="width: 2.3in;">
                    <tr>
                        <img src='https://barcode.tec-it.com/barcode.ashx?data=<?= sprintf("%'.06d\n", $row_data['id']); ?>&code=Code128&translate-esc=on'/>
                    </tr>
                    </table>
                </td>
            <?php } ?>
        </tr>
    </tbody>
</table>
</body>
</html>