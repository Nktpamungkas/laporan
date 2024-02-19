<?php 
    ini_set("error_reporting", 0);
    session_start();
    require_once "koneksi.php";
    mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_ins3 WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY");
    mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_ins3 WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]'"); 
    mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_cnp1 WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY");
    mysqli_query($con_nowprd, "DELETE FROM itxview_posisikk_tgl_in_prodorder_cnp1 WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]'"); 
    if($_GET['demand']){
        $demand     = $_GET['demand'];
    }else{
        $demand     = $_POST['demand'];
    }

    $q_ITXVIEWKK    = db2_exec($conn1, "SELECT * FROM ITXVIEWKK WHERE PRODUCTIONDEMANDCODE = '$demand'");
    $d_ITXVIEWKK    = db2_fetch_assoc($q_ITXVIEWKK);
    
    if($_GET['prod_order']){
        $prod_order     = $_GET['prod_order'];
    }elseif($_POST['prod_order']) {
        $prod_order     = $_POST['prod_order'];
    }else{
        $prod_order     = $d_ITXVIEWKK['PRODUCTIONORDERCODE'];
    }

    if(isset($_POST['simpanin_catch'])){
        $productionorder    = $_POST['productionorder'];
        $productiondemand   = $_POST['productiondemand'];
        $stepnumber         = $_POST['stepnumber'];
        $tanggal_proses_in  = $_POST['tanggal_proses_in'];
        $operation          = $_POST['operation'];
        $longdescription    = $_POST['longdescription'];
        $status             = $_POST['status'];
        $ipaddress          = $_POST['ipaddress'];
        $createdatetime     = $_POST['createdatetime'];

        $simpan_cache_in    = mysqli_query($con_nowprd, "INSERT INTO posisikk_cache_in(productionorder,
                                                            productiondemand,
                                                            stepnumber,
                                                            tanggal_in,
                                                            operation,
                                                            longdescription,
                                                            `status`,
                                                            ipaddress,
                                                            createdatetime)
                                        VALUES('$productionorder',
                                                '$productiondemand',
                                                '$stepnumber',
                                                '$tanggal_proses_in',
                                                '$operation',
                                                '$longdescription',
                                                '$status',
                                                '$ipaddress',
                                                '$createdatetime')");
        if($simpan_cache_in){
            header('Location: https://online.indotaichen.com/laporan/ppc_filter_steps.php?demand='.TRIM($productiondemand).'&prod_order='.TRIM($productionorder).'');
            exit;
        }else{
            echo("Error description: " . mysqli_error($simpan_cache_in));
        }
    }elseif (isset($_POST['simpanout_catch'])) {
        $productionorder    = $_POST['productionorder'];
        $productiondemand   = $_POST['productiondemand'];
        $stepnumber         = $_POST['stepnumber'];
        $tanggal_proses_out = $_POST['tanggal_proses_out'];
        $operation          = $_POST['operation'];
        $longdescription    = $_POST['longdescription'];
        $status             = $_POST['status'];
        $ipaddress          = $_POST['ipaddress'];
        $createdatetime     = $_POST['createdatetime'];

        $simpan_cache_out   = mysqli_query($con_nowprd, "INSERT INTO posisikk_cache_out(productionorder,
                                                            productiondemand,
                                                            stepnumber,
                                                            tanggal_out,
                                                            operation,
                                                            longdescription,
                                                            `status`,
                                                            ipaddress,
                                                            createdatetime)
                                        VALUES('$productionorder',
                                                '$productiondemand',
                                                '$stepnumber',
                                                '$tanggal_proses_out',
                                                '$operation',
                                                '$longdescription',
                                                '$status',
                                                '$ipaddress',
                                                '$createdatetime')");
        if($simpan_cache_out){
            header('Location: https://online.indotaichen.com/laporan/ppc_filter_steps.php?demand='.TRIM($productiondemand).'&prod_order='.TRIM($productionorder).'');
            exit;
        }else{
            echo("Error description: " . mysqli_error($simpan_cache_out));
        }
    }elseif (isset($_POST['simpan_keterangan'])) {
        $productionorder    = $_POST['productionorder'];
        $productiondemand   = $_POST['productiondemand'];
        $keterangan         = $_POST['keterangan'];
        $ipaddress          = $_POST['ipaddress'];
        $createdatetime     = $_POST['createdatetime'];

        $simpan_keterangan  = mysqli_query($con_nowprd, "INSERT INTO posisikk_keterangan(productionorder,
                                                                                productiondemand,
                                                                                keterangan,
                                                                                ipaddress,
                                                                                createdatetime)
                                                            VALUES('$productionorder',
                                                                    '$productiondemand',
                                                                    '$keterangan',
                                                                    '$ipaddress',
                                                                    '$createdatetime')");
        if($simpan_keterangan){
            header('Location: https://online.indotaichen.com/laporan/ppc_filter_steps.php?demand='.TRIM($productiondemand).'&prod_order='.TRIM($productionorder).'');
            exit;
        }else{
            echo("Error description: " . mysqli_error($simpan_keterangan));
        }
    }elseif ($_GET['simpan_note'] == 'simpan_note'){
        $productionorder    = $_GET['PRODUCTIONORDERCODE'];
        $productiondemand   = $_GET['PRODUCTIONDEMANDCODE'];
        $stepnumber         = $_GET['STEPNUMBER'];
        $operationcode      = $_GET['OPERATIONCODE'];
        $keterangan         = str_replace ("'","\'", $_GET['KETERANGAN']);
        $ipaddress          = $_GET['IPADDRESS'];
        $createdatetime     = $_GET['CREATEDATETIME'];

        $simpan_keterangan  = mysqli_query($con_nowprd, "INSERT INTO keterangan_leader(PRODUCTIONORDERCODE,
                                                                                        PRODUCTIONDEMANDCODE,
                                                                                        STEPNUMBER,
                                                                                        OPERATIONCODE,
                                                                                        KETERANGAN,
                                                                                        IPADDRESS,
                                                                                        CREATEDATETIME)
                                                            VALUES('$productionorder',
                                                                    '$productiondemand',
                                                                    '$stepnumber',
                                                                    '$operationcode',
                                                                    '$keterangan',
                                                                    '$ipaddress',
                                                                    '$createdatetime')");
        if($simpan_keterangan){
            header("Location: https://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=$productiondemand&prod_order=$productionorder");
            exit;
        }else{
            echo("Error description: ".$mysqli -> error);
            echo "INSERT INTO keterangan_leader(PRODUCTIONORDERCODE,
                                                            PRODUCTIONDEMANDCODE,
                                                            STEPNUMBER,
                                                            OPERATIONCODE,
                                                            KETERANGAN,
                                                            IPADDRESS,
                                                            CREATEDATETIME)
                                                VALUES('$productionorder',
                                                '$productiondemand',
                                                '$stepnumber',
                                                '$operationcode',
                                                '$keterangan',
                                                '$ipaddress',
                                                '$createdatetime')";
            exit();
        }
    }elseif ($_GET['edit_note'] == 'edit_note'){
        $productionorder    = $_GET['PRODUCTIONORDERCODE'];
        $productiondemand   = $_GET['PRODUCTIONDEMANDCODE'];
        $stepnumber         = $_GET['STEPNUMBER'];
        $keterangan         = str_replace ("'","\'", $_GET['KETERANGAN']);
        $ipaddress          = $_GET['IPADDRESS'];
        $createdatetime     = $_GET['CREATEDATETIME'];

        $ubah_keterangan  = mysqli_query($con_nowprd, "UPDATE keterangan_leader SET KETERANGAN = '$keterangan'
                                                            WHERE PRODUCTIONORDERCODE = '$productionorder'
                                                            AND PRODUCTIONDEMANDCODE = '$productiondemand'
                                                            AND STEPNUMBER = '$stepnumber'");
        
        if($ubah_keterangan){
            header("Location: https://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=$productiondemand&prod_order=$productionorder");
            exit;
        }else{
            echo("Error description: ".$mysqli -> error);
            echo "UPDATE keterangan_leader SET KETERANGAN = '$keterangan'
                                        WHERE PRODUCTIONORDERCODE = '$productionorder'
                                        AND PRODUCTIONDEMANDCODE = '$productiondemand'
                                        AND STEPNUMBER = '$stepnumber'";
            exit();
        }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRD - CARI GEROBAK</title>
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
                                        <h5>Filter Pencarian Gerobak berdasarkan tanggal IN Gerobak</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-6 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Tanggal Awal:</h4>
                                                    <input type="date" name="tgl1" class="form-control" value="<?php if(isset($_POST['submit'])){ echo $_POST['tgl1']; } ?>">
                                                </div>
                                                <div class="col-sm-6 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Tanggal Akhir:</h4>
                                                    <input type="date" name="tgl2" class="form-control" value="<?php if(isset($_POST['submit'])){ echo $_POST['tgl2']; } ?>">
                                                </div>
                                                <div class="col-sm-6 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Departemen:</h4>
                                                    <select name="dept" class="form-control">
                                                        <option value="">Pilih Dept</option>
                                                        <?php
                                                            $q_operation = db2_exec($conn1, "SELECT TRIM(OPERATIONGROUPCODE) AS OPERATIONGROUPCODE FROM operation WHERE NOT OPERATIONGROUPCODE IS NULL GROUP BY OPERATIONGROUPCODE ORDER BY OPERATIONGROUPCODE ASC");
                                                        ?>
                                                        <?php while($row_operation = db2_fetch_assoc($q_operation)) : ?>
                                                            <option value="<?= $row_operation['OPERATIONGROUPCODE'] ?>" <?php if($row_operation['OPERATIONGROUPCODE'] == $_POST['dept']) { echo "SELECTED";} ?>>
                                                                <?= $row_operation['OPERATIONGROUPCODE'] ?>
                                                            </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 col-xl-6 m-b-30">
                                                    <h4 class="sub-title">&nbsp;</h4>
                                                    <button type="submit" name="submit" class="btn btn-primary"><i class="icofont icofont-search-alt-1"></i> Cari data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> 
                                </div>
                                <?php if (isset($_POST['submit']) OR isset($_GET['demand']) OR isset($_GET['prod_order'])) : ?>
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="table-responsive dt-responsive">
                                                <table border="1" style='font-family:"Microsoft Sans Serif"' width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: center;" rowspan="2">TANGGAL</th>
                                                            <th style="text-align: center;" rowspan="2">PROD. ORDER</th>
                                                            <th style="text-align: center;" rowspan="2">PROD. DEMAND</th>
                                                            <th style="text-align: center;" rowspan="2">OPERATION</th>
                                                            <th style="text-align: center;" rowspan="2">DEPARTEMEN</th>
                                                            <th style="text-align: center; background: #B97E6F; color: #FCFCFC;" colspan="8">POSISI GEROBAK SEBELUMNYA</th>
                                                        </tr>
                                                        <tr>
                                                            <th style="text-align: center;">OPERATION</th>
                                                            <th style="text-align: center;">DEPARTEMEN</th>
                                                            <th style="text-align: center;">STATUS</th>
                                                            <th style="text-align: center;">MULAI</th>
                                                            <th style="text-align: center;">SELESAI</th>
                                                            <th style="text-align: center;">OPERATOR IN</th>
                                                            <th style="text-align: center;">OPERATOR OUT</th>
                                                            <th style="text-align: center;">GEROBAK</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php
                                                            $q_iptip    = db2_exec($conn1, "SELECT
                                                                                                iptip.PROGRESSSTARTPROCESSDATE,
                                                                                                TRIM(p.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE,
                                                                                                TRIM(p.PRODUCTIONDEMANDCODE) AS PRODUCTIONDEMANDCODE,
                                                                                                TRIM(p.OPERATIONCODE) AS OPERATIONCODE,
                                                                                                p.PROGRESSSTATUS,
                                                                                                TRIM(o.OPERATIONGROUPCODE) AS OPERATIONGROUPCODE 
                                                                                            FROM
                                                                                                ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip 
                                                                                            LEFT JOIN PRODUCTIONDEMANDSTEP p ON p.PRODUCTIONORDERCODE = iptip.PRODUCTIONORDERCODE AND p.STEPNUMBER = iptip.DEMANDSTEPSTEPNUMBER
                                                                                            LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                                                            WHERE 
                                                                                                PROGRESSSTARTPROCESSDATE BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]'
                                                                                                AND PROGRESSSTATUS  ='2' AND OPERATIONGROUPCODE = '$_POST[dept]'");
                                                        ?>
                                                        <?php while($row_iptip = db2_fetch_assoc($q_iptip)) : ?>
                                                            <?php
                                                                $q_posisikk     = db2_exec($conn1, "SELECT
                                                                                                        p.STEPNUMBER AS STEPNUMBER,
                                                                                                        TRIM(p.OPERATIONCODE) AS OPERATIONCODE,
                                                                                                        TRIM(o.OPERATIONGROUPCODE) AS DEPT,
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
                                                                                                        p.PRODUCTIONDEMANDCODE,
                                                                                                        iptip.LONGDESCRIPTION AS OP1,
                                                                                                        iptop.LONGDESCRIPTION AS OP2,
                                                                                                        LISTAGG(FLOOR(idqd.VALUEQUANTITY), ', ') AS GEROBAK
                                                                                                    FROM 
                                                                                                        PRODUCTIONDEMANDSTEP p 
                                                                                                    LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                                                                    LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                                    LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                                    LEFT JOIN ITXVIEW_DETAIL_QA_DATA idqd ON idqd.PRODUCTIONDEMANDCODE = p.PRODUCTIONDEMANDCODE AND idqd.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE
                                                                                                                                        AND idqd.OPERATIONCODE = p.OPERATIONCODE 
                                                                                                                                        AND (idqd.CHARACTERISTICCODE = 'GRB1' OR
                                                                                                                                            idqd.CHARACTERISTICCODE = 'GRB2' OR
                                                                                                                                            idqd.CHARACTERISTICCODE = 'GRB3' OR
                                                                                                                                            idqd.CHARACTERISTICCODE = 'GRB4' OR
                                                                                                                                            idqd.CHARACTERISTICCODE = 'GRB5' OR
                                                                                                                                            idqd.CHARACTERISTICCODE = 'GRB6' OR
                                                                                                                                            idqd.CHARACTERISTICCODE = 'GRB7' OR
                                                                                                                                            idqd.CHARACTERISTICCODE = 'GRB8')
                                                                                                                                        AND NOT (idqd.VALUEQUANTITY = 9 OR idqd.VALUEQUANTITY = 999 OR idqd.VALUEQUANTITY = 1 OR idqd.VALUEQUANTITY = 9999 OR idqd.VALUEQUANTITY = 99999 OR idqd.VALUEQUANTITY = 99 OR idqd.VALUEQUANTITY = 91)
                                                                                                    WHERE
                                                                                                        p.PRODUCTIONORDERCODE  = '$row_iptip[PRODUCTIONORDERCODE]' AND p.PRODUCTIONDEMANDCODE = '$row_iptip[PRODUCTIONDEMANDCODE]'
                                                                                                        AND NOT idqd.VALUEQUANTITY IS NULL
                                                                                                    GROUP BY
                                                                                                        p.PRODUCTIONORDERCODE,
                                                                                                        p.STEPNUMBER,
                                                                                                        p.OPERATIONCODE,
                                                                                                        o.LONGDESCRIPTION,
                                                                                                        o.OPERATIONGROUPCODE,
                                                                                                        p.PROGRESSSTATUS,
                                                                                                        iptip.MULAI,
                                                                                                        iptop.SELESAI,
                                                                                                        p.PRODUCTIONORDERCODE,
                                                                                                        p.PRODUCTIONDEMANDCODE,
                                                                                                        iptip.LONGDESCRIPTION,
                                                                                                        iptop.LONGDESCRIPTION
                                                                                                    ORDER BY 
                                                                                                        p.STEPNUMBER
                                                                                                    DESC
                                                                                                    LIMIT 1");
                                                            ?>
                                                            <?php $row_posisikk = db2_fetch_assoc($q_posisikk); ?>
                                                            <tr>
                                                                <td><?= $row_iptip['PROGRESSSTARTPROCESSDATE'] ?></td>
                                                                <td><?= $row_iptip['PRODUCTIONORDERCODE'] ?></td>
                                                                <td><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?= $row_iptip['PRODUCTIONDEMANDCODE']; ?>&prod_order=<?= $row_iptip['PRODUCTIONORDERCODE']; ?>"><?= $row_iptip['PRODUCTIONDEMANDCODE'] ?></a></td>
                                                                <td align="center"><?= $row_iptip['OPERATIONCODE'] ?></td>
                                                                <td align="center"><?= $row_iptip['OPERATIONGROUPCODE'] ?></td>

                                                                <td align="center"><?= $row_posisikk['OPERATIONCODE'] ?></td>
                                                                <td align="center"><?= $row_posisikk['DEPT'] ?></td>
                                                                <td
                                                                    <?php 
                                                                        if($row_posisikk['STATUS_OPERATION'] == 'Closed'){ 
                                                                            echo 'style="background-color:#DC526E; color:#F7F7F7;"'; 
                                                                            
                                                                        }elseif($row_posisikk['STATUS_OPERATION'] == 'Progress'){ 
                                                                            echo 'style="background-color:#41CC11;"'; 
                                                                        }else{ 
                                                                            echo 'style="background-color:#CECECE;"'; 
                                                                        } 
                                                                    ?>>
                                                                    <center><?= $row_posisikk['STATUS_OPERATION']; ?></center>
                                                                </td>
                                                                <td><?= $row_posisikk['MULAI'] ?></td>
                                                                <td><?= $row_posisikk['SELESAI'] ?></td>
                                                                <td><?= $row_posisikk['OP1'] ?></td>
                                                                <td><?= $row_posisikk['OP2'] ?></td>
                                                                <td><?= $row_posisikk['GEROBAK'] ?></td>
                                                            </tr>
                                                        <?php endwhile; ?>
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
<script src="files\assets\js\pcoded.min.js"></script>
<script type="text/javascript" src="files\assets\js\script.js"></script>
<?php require_once 'footer.php'; ?>