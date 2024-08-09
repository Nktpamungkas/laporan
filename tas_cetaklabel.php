<?php
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php"; 
    $demand = $_GET['demand'];
    // $order = $_GET['order'];
    $sqlcetaklabel = "SELECT 
                            *
                        FROM 
                            ITXVIEW_KK_TAS i
                        WHERE i.NO_DEMAND LIKE '%$demand%'";
    $stmt_cetaklabel = db2_exec($conn1, $sqlcetaklabel);
    $rowdb2_cetaklabel = db2_fetch_assoc($stmt_cetaklabel);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Label</title>
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
<table width="100%" border="0" style="width: 7in;">
  <tbody>    
    <tr>
        <td align="left" valign="top" style="height: 1.6in;"><table width="100%" border="0" class="table-list1" style="width: 2.3in;">
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 8px;">PRD.ORDER : <?php echo $rowdb2_cetaklabel['NO_PROD_ORDER']; ?> </div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 8px;">PRD.DEMAND : <?php echo $rowdb2_cetaklabel['NO_DEMAND']; ?></div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 8px;"><?php echo $rowdb2_cetaklabel['BUYER']; ?></div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">
                <?php echo $rowdb2_cetaklabel['PELANGGAN'];?></div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"></div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><strong></div></td>
            </tr>
            <tr>
            <td colspan="3" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:6px;"><?= $rowdb2_cetaklabel['JENIS_KAIN'];?></div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><span style="font-size:7px;"><?php echo "<strong><span style='font-size:7px;'>".substr($rowdb2_cetaklabel['WARNA'],0,60)."</span></strong>" ?></span></div></td>
            </tr>
            <tr>
            <td width="41%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">Tgl: <?= date('d-m-Y'); ?></div></td>
            <td colspan="2" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"></div></td>
            <td width="32%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"></div></td>
            </tr>
            <tr>
            <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">L&amp;G : <?= number_format($rowdb2_cetaklabel['LEBAR'], 0); ?> x <?= number_format($rowdb2_cetaklabel['GRAMASI'], 0); ?></div></td>
            <td colspan="2" align="left" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"></div></td>
            </tr>
            <tr>
            <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">Proses : </div></td>
            <td width="27%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"></div></td>
            
            </tr>
            </table>
        </td>
        <td align="left" valign="top" style="height: 1.6in;"><table width="100%" border="0" class="table-list1" style="width: 2.3in;">
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 8px;">PRD.ORDER : <?php echo $rowdb2_cetaklabel['NO_PROD_ORDER']; ?> </div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 8px;">PRD.DEMAND : <?php echo $rowdb2_cetaklabel['NO_DEMAND']; ?></div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 8px;"><?php echo $rowdb2_cetaklabel['BUYER']; ?></div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">
                <?php echo $rowdb2_cetaklabel['PELANGGAN'];?></div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"></div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><strong></div></td>
            </tr>
            <tr>
            <td colspan="3" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:6px;"><?= $rowdb2_cetaklabel['JENIS_KAIN'];?></div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><span style="font-size:7px;"><?php echo "<strong><span style='font-size:7px;'>".substr($rowdb2_cetaklabel['WARNA'],0,60)."</span></strong>" ?></span></div></td>
            </tr>
            <tr>
            <td width="41%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">Tgl: <?= date('d-m-Y'); ?></div></td>
            <td colspan="2" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"></div></td>
            <td width="32%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"></div></td>
            </tr>
            <tr>
            <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">L&amp;G : <?= number_format($rowdb2_cetaklabel['LEBAR'], 0); ?> x <?= number_format($rowdb2_cetaklabel['GRAMASI'], 0); ?></div></td>
            <td colspan="2" align="left" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"></div></td>
            </tr>
            <tr>
            <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">Proses : </div></td>
            <td width="27%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"></div></td>
            
            </tr>
            </table>
        </td>
        <td align="left" valign="top" style="height: 1.6in;"><table width="100%" border="0" class="table-list1" style="width: 2.3in;">
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 8px;">PRD.ORDER : <?php echo $rowdb2_cetaklabel['NO_PROD_ORDER']; ?> </div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 8px;">PRD.DEMAND : <?php echo $rowdb2_cetaklabel['NO_DEMAND']; ?></div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 8px;"><?php echo $rowdb2_cetaklabel['BUYER']; ?></div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">
                <?php echo $rowdb2_cetaklabel['PELANGGAN'];?></div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"></div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><strong></div></td>
            </tr>
            <tr>
            <td colspan="3" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:6px;"><?= $rowdb2_cetaklabel['JENIS_KAIN'];?></div></td>
            </tr>
            <tr>
            <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><span style="font-size:7px;"><?php echo "<strong><span style='font-size:7px;'>".substr($rowdb2_cetaklabel['WARNA'],0,60)."</span></strong>" ?></span></div></td>
            </tr>
            <tr>
            <td width="41%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">Tgl: <?= date('d-m-Y'); ?></div></td>
            <td colspan="2" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"></div></td>
            <td width="32%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"></div></td>
            </tr>
            <tr>
            <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">L&amp;G : <?= number_format($rowdb2_cetaklabel['LEBAR'], 0); ?> x <?= number_format($rowdb2_cetaklabel['GRAMASI'], 0); ?></div></td>
            <td colspan="2" align="left" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"></div></td>
            </tr>
            <tr>
            <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">Proses : </div></td>
            <td width="27%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"></div></td>
            
            </tr>
            </table>
        </td>
    </tr>
  </tbody>
</table>
</body>
</html>