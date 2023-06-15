<?php 
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php";
    mysqli_query($con_nowprd, "DELETE FROM itxview_terimaorder WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY");
    mysqli_query($con_nowprd, "DELETE FROM itxview_terimaorder WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]'"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>MKT - Terima Order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <link rel="icon" href="files\assets\images\favicon.ico" type="image/x-icon">
     <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet"> -->
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
                                        <h5>Filter Data</h5>
                                        
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Create date bon order</h4>
                                                    <input type="date" name="tgl1" class="form-control" id="tgl1" value="<?php if (isset($_POST['submit'])){ echo $_POST['tgl1']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30"><br><br>
                                                    <button type="submit" name="submit" class="btn btn-primary">Cari data</button>
                                                    <?php if (isset($_POST['submit'])) : ?>
                                                        <!-- <a class="btn btn-mat btn-success" href="ppc_memopenting-excel.php?no_order=<?= $_POST['no_order']; ?>&tgl1=<?= $_POST['tgl1']; ?>&tgl2=<?= $_POST['tgl2']; ?>">CETAK EXCEL</a> -->
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST['submit'])) : ?>
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table id="lang-dt" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="1">CREATE BO</th>
                                                            <th colspan="1">TERIMA ORDER</th>
                                                            <th colspan="1">BAGI LOT</th>
                                                            <th colspan="1">BUKA KK</th>
                                                            <th colspan="1">HITUNG WAKTU (TERIMA ORDER s/d BUKA KK)</th>
                                                            <th colspan="1">TUNGGU GREIGE OUT</th>
                                                            <th colspan="1">KK OKE</th>
                                                            <th colspan="1">HITUNG WAKTU (CREATE BO s/d KK OKE)</th>
                                                            <th colspan="1">TGL KIRIM</th>
                                                            <th colspan="1">HITUNG WAKTU (CREATE BO s/d TGL KIRIM)</th>
                                                            <th colspan="1">NO KK</th>
                                                            <th colspan="1">NO DEMAND</th>
                                                            <th colspan="1">BON ORDER</th>
                                                            <th colspan="1">NO PO</th>
                                                            <th colspan="1">WARNA</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php 
                                                            ini_set("error_reporting", 1);
                                                            session_start();
                                                            require_once "koneksi.php";
                                                            $tgl1     = $_POST['tgl1'];

                                                            // itxview_terimaorder
                                                            $itxviewmemo                = db2_exec($conn1, "SELECT * FROM itxview_memopentingppc 
                                                                                                            WHERE SUBSTR(CREATIONDATETIME_SALESORDER, 1,10) = '$tgl1'");
                                                            while ($row_itxviewmemo   = db2_fetch_assoc($itxviewmemo)) {
                                                                $r_itxviewmemo[]      = "('".TRIM(addslashes($row_itxviewmemo['ORDERDATE']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['PELANGGAN']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_ORDER']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_PO']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['KETERANGAN_PRODUCT']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['WARNA']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_WARNA']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['DELIVERY']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['QTY_BAGIKAIN']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NETTO']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['DELAY']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['NO_KK']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['DEMAND']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['ORDERLINE']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['PROGRESSSTATUS']))."',"
                                                                                        ."'".TRIM(addslashes($row_itxviewmemo['CREATIONDATETIME_SALESORDER']))."',"
                                                                                        ."'".$_SERVER['REMOTE_ADDR']."',"
                                                                                        ."'".date('Y-m-d H:i:s')."')";
                                                            }
                                                            $value_itxviewmemo        = implode(',', $r_itxviewmemo);
                                                            $insert_itxviewmemo       = mysqli_query($con_nowprd, "INSERT INTO itxview_terimaorder(ORDERDATE,PELANGGAN,NO_ORDER,NO_PO,KETERANGAN_PRODUCT,WARNA,NO_WARNA,DELIVERY,QTY_BAGIKAIN,NETTO,`DELAY`,NO_KK,DEMAND,ORDERLINE,PROGRESSSTATUS,CREATIONDATETIME_SALESORDER,IPADDRESS,CREATEDATETIME) VALUES $value_itxviewmemo");

                                                            // --------------------------------------------------------------------------------------------------------------- //
                                                            $tgl1_2     = $_POST['tgl1'];
                                                            $sqlDB2 = "SELECT DISTINCT * FROM itxview_terimaorder WHERE SUBSTR(CREATIONDATETIME_SALESORDER, 1,10) = '$tgl1_2' AND IPADDRESS = '$_SERVER[REMOTE_ADDR]' ORDER BY DELIVERY ASC";
                                                            $stmt   = mysqli_query($con_nowprd,$sqlDB2);
                                                            while ($rowdb2 = mysqli_fetch_array($stmt)) {
                                                        ?>
                                                        <tr>
                                                            <td><?= substr($rowdb2['CREATIONDATETIME_SALESORDER'], 0, 19); ?></td> <!-- CREATE BO -->
                                                            <td></td><!-- TERIMA ORDER -->
                                                            <td></td><!-- BAGI LOT -->
                                                            <td><?= substr($rowdb2['ORDERDATE'], 0, 19); ?></td><!-- BUKA KK -->
                                                            <td></td><!-- HITUNG WAKTU (TERIMA ORDER s/d BUKA KK) -->
                                                            <?php
                                                                $q_posisikk_tunggu_greige = "SELECT
                                                                                            p.PRODUCTIONORDERCODE,
                                                                                            p.GROUPSTEPNUMBER AS STEPNUMBER,
                                                                                            p.OPERATIONCODE,
                                                                                            o.LONGDESCRIPTION,
                                                                                            CASE
                                                                                                WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                                WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
                                                                                                WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
                                                                                                WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
                                                                                            END AS STATUS_OPERATION,
                                                                                            iptip.MULAI,
                                                                                            iptop.SELESAI,
                                                                                            p.PRODUCTIONORDERCODE,
                                                                                            p.PRODUCTIONDEMANDCODE
                                                                                        FROM 
                                                                                            PRODUCTIONDEMANDSTEP p 
                                                                                        LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                                                        -- LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.GROUPSTEPNUMBER
                                                                                        -- LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.GROUPSTEPNUMBER
                                                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                        WHERE
                                                                                            p.PRODUCTIONORDERCODE  = '$rowdb2[NO_KK]' AND p.PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]' 
                                                                                            AND p.OPERATIONCODE = 'WAIT2'
                                                                                        ORDER BY p.STEPNUMBER ASC";
                                                                $r_posisikk_tunggu_greige = db2_exec($conn1, $q_posisikk_tunggu_greige);
                                                                $d_posisikk_tunggu_greige = db2_fetch_assoc($r_posisikk_tunggu_greige);
                                                                $TUNGGU_GREIGE            = $d_posisikk_tunggu_greige['SELESAI'];
                                                                
                                                                $q_posisikk_kkoke = "SELECT
                                                                                            p.PRODUCTIONORDERCODE,
                                                                                            p.GROUPSTEPNUMBER AS STEPNUMBER,
                                                                                            p.OPERATIONCODE,
                                                                                            o.LONGDESCRIPTION,
                                                                                            CASE
                                                                                                WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                                WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
                                                                                                WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
                                                                                                WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
                                                                                            END AS STATUS_OPERATION,
                                                                                            iptip.MULAI,
                                                                                            iptop.SELESAI,
                                                                                            p.PRODUCTIONORDERCODE,
                                                                                            p.PRODUCTIONDEMANDCODE
                                                                                        FROM 
                                                                                            PRODUCTIONDEMANDSTEP p 
                                                                                        LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                                                        -- LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.GROUPSTEPNUMBER
                                                                                        -- LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.GROUPSTEPNUMBER
                                                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                        WHERE
                                                                                            p.PRODUCTIONORDERCODE  = '$rowdb2[NO_KK]' AND p.PRODUCTIONDEMANDCODE = '$rowdb2[DEMAND]' 
                                                                                            AND p.OPERATIONCODE = 'PPC4'
                                                                                        ORDER BY p.STEPNUMBER ASC";
                                                                $r_posisikk_kkoke = db2_exec($conn1, $q_posisikk_kkoke);
                                                                $d_posisikk_kkoke = db2_fetch_assoc($r_posisikk_kkoke);
                                                                $KK_OKE           = $d_posisikk_kkoke['SELESAI'];
                                                            ?>
                                                            <td><?= $TUNGGU_GREIGE; ?></td><!-- TUNGGU GREIGE OUT -->
                                                            <td><?= $KK_OKE; ?></td><!-- KK OKE -->
                                                            <td>
                                                                <?php
                                                                    if($KK_OKE){
                                                                        $CREATE_PO  = new DateTime(substr($rowdb2['CREATIONDATETIME_SALESORDER'], 0, 19));
                                                                        $KKOKE      = new DateTime($KK_OKE);
                                                                        $d          = $KKOKE->diff($CREATE_PO)->days + 1;
                                                                        if($d >= 1){
                                                                            echo $d." hari";
                                                                        }else{
                                                                            echo "Delay ".$d." hari";
                                                                        }
                                                                    }
                                                                ?>
                                                            </td><!-- HITUNG WAKTU (CREATE BO s/d KK OKE) -->
                                                            <td>
                                                                <?php
                                                                    $q_tglsuratjalan    = db2_exec($conn1, "SELECT 
                                                                                                                    DISTINCT 
                                                                                                                    s.GOODSISSUEDATE AS TGL_SURATJALAN
                                                                                                                FROM 
                                                                                                                    SALESDOCUMENT s	
                                                                                                                LEFT JOIN SALESDOCUMENTLINE s2 ON s2.SALESDOCUMENTPROVISIONALCODE = s.PROVISIONALCODE 
                                                                                                                WHERE 
                                                                                                                    s2.DLVSALORDERLINESALESORDERCODE = '$rowdb2[NO_ORDER]' 
                                                                                                                    AND s2.DOCUMENTTYPETYPE = 05");
                                                                    $d_tglsuratjalan    = db2_fetch_assoc($q_tglsuratjalan);
                                                                    echo $d_tglsuratjalan['TGL_SURATJALAN'];
                                                                ?>
                                                            </td><!-- TGL KIRIM -->
                                                            <td>
                                                                <?php
                                                                    if($KK_OKE){
                                                                        $CREATE_PO      = new DateTime(substr($rowdb2['CREATIONDATETIME_SALESORDER'], 0, 19));
                                                                        $TGLKIRIM_SJ    = new DateTime($d_tglsuratjalan['TGL_SURATJALAN']);
                                                                        $d2          = $TGLKIRIM_SJ->diff($CREATE_PO)->days + 1;
                                                                        if($d2 >= 1){
                                                                            echo $d2." hari";
                                                                        }else{
                                                                            echo "Delay ".$d2." hari";
                                                                        }
                                                                    }
                                                                ?>
                                                            </td><!-- HITUNG WAKTU (CREATE BO s/d TGL KIRIM) -->
                                                            <td><?= $rowdb2['NO_KK']; ?></td><!-- NO KK -->
                                                            <td><a target="_BLANK" href="http://10.0.0.10/laporan/ppc_filter_steps.php?demand=<?= $rowdb2['DEMAND']; ?>&prod_order=<?= $rowdb2['NO_KK']; ?>">`<?= $rowdb2['DEMAND']; ?></a></td> <!-- DEMAND -->
                                                            <td><?= $rowdb2['NO_ORDER']; ?></td><!-- NO ORDER -->
                                                            <td><?= $rowdb2['NO_PO']; ?></td><!-- NO PO -->
                                                            <td><?= $rowdb2['WARNA']; ?></td><!-- WARNA -->
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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