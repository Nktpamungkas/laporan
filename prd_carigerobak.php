<?php
    ini_set("error_reporting", 0);
    session_start();
    require_once "koneksi.php";
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
                                                <!-- <div class="col-sm-6 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Tanggal Awal:</h4>
                                                    <input type="datetime-local" name="tgl1" class="form-control" value="<?php if(isset($_POST['submit'])){ echo $_POST['tgl1']; } ?>">
                                                </div>
                                                <div class="col-sm-6 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Tanggal Akhir:</h4>
                                                    <input type="datetime-local" name="tgl2" class="form-control" value="<?php if(isset($_POST['submit'])){ echo $_POST['tgl2']; } ?>">
                                                </div> -->
                                                <div class="col-sm-6 col-xl-2 m-b-30">
                                                    <h4 class="sub-title">Production Demand:</h4>
                                                    <input type="text" name="demand" class="form-control" value="<?php if(isset($_POST['submit'])){ echo $_POST['demand']; } ?>">
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
                                                <!-- <table border="1" style='font-family:"Microsoft Sans Serif"' width="100%"> -->
                                                <table id="basic-btn" class="table compact table-striped table-bordered nowrap" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <?php
                                                                $dept   = $_POST['dept'];

                                                                if($dept == 'DYE'){
                                                                    $colspan    = '9';
                                                                    $th         = '<th style="text-align: center;" rowspan="2">KETERANGAN</th>
                                                                                    <th style="text-align: center;" rowspan="2">NO URUT</th>';
                                                                }else{
                                                                    $colspan    = '6';
                                                                    $th         = '';
                                                                }
                                                            ?>
                                                            <th style="text-align: center; background: #B97E6F; color: #FCFCFC;" colspan="<?= $colspan; ?>">POSISI GEROBAK SEKARANG</th>
                                                            <th style="text-align: center; background: #83D46E; color: Black;" colspan="15">POSISI GEROBAK SEBELUMNYA</th>
                                                        </tr>
                                                        <tr>
                                                            <th style="text-align: center;" rowspan="2">STEP NB</th>
                                                            <th style="text-align: center;" rowspan="2">NO HANGER</th>
                                                            <th style="text-align: center;" rowspan="2">NO WARNA</th>
                                                            <th style="text-align: center;" rowspan="2">WARNA</th>
                                                            <th style="text-align: center;" rowspan="2">PROD. ORDER</th>
                                                            <th style="text-align: center;" rowspan="2">PROD. DEMAND</th>
                                                            <th style="text-align: center;" rowspan="2">OPERATION</th>
                                                            <th style="text-align: center;" rowspan="2">DEPARTEMEN</th>
                                                            <th style="text-align: center;" rowspan="2">STATUS</th>
                                                            <?= $th; ?>
                                                        </tr>
                                                        <tr>
                                                            <th style="text-align: center;">PROD. ORDER ORIGINAL</th>
                                                            <th style="text-align: center;">PROD. DEMAND ORIGINAL</th>
                                                            <th style="text-align: center;">OPERATION</th>
                                                            <th style="text-align: center;">DEPARTEMEN</th>
                                                            <th style="text-align: center;">STATUS</th>
                                                            <th style="text-align: center;">MULAI</th>
                                                            <th style="text-align: center;">SELESAI</th>
                                                            <th style="text-align: center;">OPERATOR IN</th>
                                                            <th style="text-align: center;">OPERATOR OUT</th>
                                                            <th style="text-align: center;">GEROBAK</th>
                                                            <th style="text-align: center;">QTY</th>
                                                            <th style="text-align: center;">JML GEROBAK</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php
                                                            if($_POST['demand']){
                                                                $where_demand    = "AND p.PRODUCTIONDEMANDCODE = '$_POST[demand]'";
                                                            }else{
                                                                $where_demand    = "";
                                                            }
                                                            $q_iptip    = db2_exec($conn1, "SELECT DISTINCT
                                                                                                PRODUCTIONORDERCODE,
                                                                                                REPLACE(LISTAGG( '`'|| PRODUCTIONDEMANDCODE || '`', ', '), '`', '''')  AS PRODUCTIONDEMANDCODE2,
                                                                                                LISTAGG(PRODUCTIONDEMANDCODE, ', ')  AS PRODUCTIONDEMANDCODE,
                                                                                                STEPNUMBER,
                                                                                                OPERATIONCODE,
                                                                                                STATUS_OPERATION,
                                                                                                HANGER,
                                                                                                NO_WARNA,
                                                                                                WARNA,
                                                                                                SUBCODE06,
                                                                                                OPERATIONGROUPCODE,
                                                                                                ABSUNIQUEID_OPERATION
                                                                                            FROM
                                                                                                (SELECT	
                                                                                                    TRIM(p.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE,
                                                                                                    TRIM(p.PRODUCTIONDEMANDCODE) AS PRODUCTIONDEMANDCODE,
                                                                                                    p.STEPNUMBER,
                                                                                                    TRIM(p.OPERATIONCODE) AS OPERATIONCODE,
                                                                                                    CASE
                                                                                                        WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                                        WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
                                                                                                        WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
                                                                                                        WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
                                                                                                    END AS STATUS_OPERATION,
                                                                                                    TRIM(o.OPERATIONGROUPCODE) AS OPERATIONGROUPCODE,
                                                                                                    TRIM(p2.SUBCODE02) || '-' || TRIM(p2.SUBCODE03) AS HANGER,
                                                                                                    TRIM(p2.SUBCODE06) AS SUBCODE06,
                                                                                                    i.SUBCODE05 AS NO_WARNA,
                                                                                                    i.WARNA,
                                                                                                    ROW_NUMBER() OVER (PARTITION BY p.PRODUCTIONORDERCODE, p.PRODUCTIONDEMANDCODE ORDER BY p.STEPNUMBER) AS RN,
                                                                                                    o.ABSUNIQUEID AS ABSUNIQUEID_OPERATION
                                                                                                FROM
                                                                                                    PRODUCTIONDEMANDSTEP p
                                                                                                LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                                                                LEFT JOIN PRODUCTIONDEMAND p2 ON p2.CODE = p.PRODUCTIONDEMANDCODE
                                                                                                LEFT JOIN ITXVIEWCOLOR i ON i.ITEMTYPECODE = p2.ITEMTYPEAFICODE
                                                                                                                        AND i.SUBCODE01 = p2.SUBCODE01
                                                                                                                        AND i.SUBCODE02 = p2.SUBCODE02
                                                                                                                        AND i.SUBCODE03 = p2.SUBCODE03
                                                                                                                        AND i.SUBCODE04 = p2.SUBCODE04
                                                                                                                        AND i.SUBCODE05 = p2.SUBCODE05
                                                                                                                        AND i.SUBCODE06 = p2.SUBCODE06
                                                                                                                        AND i.SUBCODE07 = p2.SUBCODE07
                                                                                                                        AND i.SUBCODE08 = p2.SUBCODE08
                                                                                                                        AND i.SUBCODE09 = p2.SUBCODE09
                                                                                                                        AND i.SUBCODE10 = p2.SUBCODE10
                                                                                                WHERE 
                                                                                                    TRIM(p.PROGRESSSTATUS) IN ('2', '0')
                                                                                                    $where_demand
                                                                                                    AND p.CREATIONDATETIME >= '2023-11-01'
                                                                                                    AND NOT p.PRODUCTIONORDERCODE IS NULL
                                                                                                    AND (TRIM(p2.DESTINATIONORDER) = '1' OR NOT p2.PROJECTCODE IS NULL)
                                                                                                    )
                                                                                            -- LEFT JOIN ADSTORAGE a ON a.UNIQUEID = ABSUNIQUEID_OPERATION AND a.FIELDNAME = 'Gerobak'
                                                                                            WHERE
                                                                                                RN = 1
                                                                                                AND NOT OPERATIONCODE = 'BAT1'
                                                                                                AND TRIM(OPERATIONGROUPCODE) = '$_POST[dept]'
                                                                                                -- AND (a.VALUEBOOLEAN IS NULL OR a.VALUEBOOLEAN = 0)
                                                                                            GROUP BY 
                                                                                                PRODUCTIONORDERCODE,
                                                                                                STEPNUMBER,
                                                                                                OPERATIONCODE,
                                                                                                STATUS_OPERATION,
                                                                                                HANGER,
                                                                                                NO_WARNA,
                                                                                                WARNA,
                                                                                                SUBCODE06,
                                                                                                OPERATIONGROUPCODE,
                                                                                                ABSUNIQUEID_OPERATION");
                                                        ?>
                                                        <?php while($row_iptip = db2_fetch_assoc($q_iptip)) : ?>
                                                            <?php
                                                                if($dept == 'DYE'){
                                                                    $gerobak    = "CASE
                                                                                        WHEN TRIM(p.OPERATIONCODE) = 'DYE2' THEN 'Poly'
                                                                                        WHEN TRIM(p.OPERATIONCODE) = 'DYE4' THEN 'Cotton'
                                                                                        ELSE LISTAGG(DISTINCT FLOOR(idqd.VALUEQUANTITY), ', ')
                                                                                    END AS GEROBAK";
                                                                }else{
                                                                    $gerobak    = "LISTAGG(DISTINCT FLOOR(idqd.VALUEQUANTITY), ', ') AS GEROBAK";
                                                                }

                                                                $q_posisikk     = db2_exec($conn1, "SELECT DISTINCT
                                                                                                        p.STEPNUMBER AS STEPNUMBER,
                                                                                                        CASE
                                                                                                            WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) IS NULL OR TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE)
                                                                                                            ELSE TRIM(p.PRODRESERVATIONLINKGROUPCODE)
                                                                                                        END AS OPERATIONCODE,
                                                                                                        TRIM(o.OPERATIONGROUPCODE) AS DEPT,
                                                                                                        o.LONGDESCRIPTION,
                                                                                                        CASE
                                                                                                            WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                                            WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
                                                                                                            WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
                                                                                                            WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
                                                                                                        END AS STATUS_OPERATION,
                                                                                                        iptip.MULAI,
                                                                                                        CASE
                                                                                                            WHEN p.PROGRESSSTATUS = 3 THEN COALESCE(iptop.SELESAI, SUBSTRING(p.LASTUPDATEDATETIME, 1, 19) || '(Run Manual Closures)')
                                                                                                            ELSE iptop.SELESAI
                                                                                                        END AS SELESAI,
                                                                                                        p.PRODUCTIONORDERCODE,
                                                                                                        p.PRODUCTIONDEMANDCODE,
                                                                                                        iptip.LONGDESCRIPTION AS OP1,
                                                                                                        iptop.LONGDESCRIPTION AS OP2,
                                                                                                        $gerobak
                                                                                                    FROM 
                                                                                                        PRODUCTIONDEMANDSTEP p 
                                                                                                    LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                                                                    -- LEFT JOIN ADSTORAGE a ON a.UNIQUEID = o.ABSUNIQUEID AND a.FIELDNAME = 'Gerobak'
                                                                                                    LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                                    LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                                    LEFT JOIN ITXVIEW_DETAIL_QA_DATA idqd ON idqd.PRODUCTIONDEMANDCODE = p.PRODUCTIONDEMANDCODE AND idqd.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE
                                                                                                                                        AND idqd.OPERATIONCODE = CASE
                                                                                                                                                                    WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) IS NULL OR TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE)
                                                                                                                                                                    ELSE TRIM(p.PRODRESERVATIONLINKGROUPCODE)
                                                                                                                                                                END
                                                                                                                                        AND (idqd.VALUEINT = p.STEPNUMBER OR idqd.VALUEINT = p.GROUPSTEPNUMBER) 
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
                                                                                                        p.PRODUCTIONORDERCODE  = '$row_iptip[PRODUCTIONORDERCODE]' 
                                                                                                        AND p.PRODUCTIONDEMANDCODE IN ($row_iptip[PRODUCTIONDEMANDCODE2])
                                                                                                        AND p.STEPNUMBER < '$row_iptip[STEPNUMBER]'
                                                                                                        AND NOT idqd.VALUEQUANTITY IS NULL
                                                                                                        -- AND (a.VALUEBOOLEAN IS NULL OR a.VALUEBOOLEAN = 0)
                                                                                                    GROUP BY
                                                                                                        p.PRODUCTIONORDERCODE,
                                                                                                        p.STEPNUMBER,
                                                                                                        p.OPERATIONCODE,
                                                                                                        p.PRODRESERVATIONLINKGROUPCODE,
                                                                                                        o.OPERATIONGROUPCODE,
                                                                                                        o.LONGDESCRIPTION,
                                                                                                        p.PROGRESSSTATUS,
                                                                                                        iptip.MULAI,
                                                                                                        iptop.SELESAI,
                                                                                                        p.LASTUPDATEDATETIME,
                                                                                                        p.PRODUCTIONORDERCODE,
                                                                                                        p.PRODUCTIONDEMANDCODE,
                                                                                                        iptip.LONGDESCRIPTION,
                                                                                                        iptop.LONGDESCRIPTION
                                                                                                    ORDER BY 
                                                                                                        p.STEPNUMBER
                                                                                                    DESC
                                                                                                    LIMIT 1");
                                                                                                    
                                                                $row_posisikk = db2_fetch_assoc($q_posisikk);

                                                                $count_gerobak  = db2_exec($conn1, "SELECT 
                                                                                                     COUNT(DISTINCT idqd.VALUEQUANTITY) AS JML_GEROBAK
                                                                                                    FROM 
                                                                                                        PRODUCTIONDEMANDSTEP p 
                                                                                                    LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                                                                    -- LEFT JOIN ADSTORAGE a ON a.UNIQUEID = o.ABSUNIQUEID AND a.FIELDNAME = 'Gerobak'
                                                                                                    LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                                    LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                                    LEFT JOIN ITXVIEW_DETAIL_QA_DATA idqd ON idqd.PRODUCTIONDEMANDCODE = p.PRODUCTIONDEMANDCODE AND idqd.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE
                                                                                                                                        AND idqd.OPERATIONCODE = CASE
                                                                                                                                                                    WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) IS NULL OR TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE)
                                                                                                                                                                    ELSE TRIM(p.PRODRESERVATIONLINKGROUPCODE)
                                                                                                                                                                END
                                                                                                                                        AND (idqd.VALUEINT = p.STEPNUMBER OR idqd.VALUEINT = p.GROUPSTEPNUMBER) 
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
                                                                                                        p.PRODUCTIONORDERCODE  = '$row_iptip[PRODUCTIONORDERCODE]' 
                                                                                                        AND p.PRODUCTIONDEMANDCODE IN ($row_iptip[PRODUCTIONDEMANDCODE2])
                                                                                                        AND p.STEPNUMBER < '$row_iptip[STEPNUMBER]'
                                                                                                        AND NOT idqd.VALUEQUANTITY IS NULL
                                                                                                        -- AND (a.VALUEBOOLEAN IS NULL OR a.VALUEBOOLEAN = 0)
                                                                                                    GROUP BY
                                                                                                        p.PRODUCTIONORDERCODE,
                                                                                                        p.STEPNUMBER,
                                                                                                        p.OPERATIONCODE,
                                                                                                        p.PRODRESERVATIONLINKGROUPCODE,
                                                                                                        o.OPERATIONGROUPCODE,
                                                                                                        o.LONGDESCRIPTION,
                                                                                                        p.PROGRESSSTATUS,
                                                                                                        iptip.MULAI,
                                                                                                        iptop.SELESAI,
                                                                                                        p.LASTUPDATEDATETIME,
                                                                                                        p.PRODUCTIONORDERCODE,
                                                                                                        p.PRODUCTIONDEMANDCODE,
                                                                                                        iptip.LONGDESCRIPTION,
                                                                                                        iptop.LONGDESCRIPTION
                                                                                                    ORDER BY 
                                                                                                        p.STEPNUMBER
                                                                                                    DESC
                                                                                                    LIMIT 1");
                                                                $row_count_gerobak = db2_fetch_assoc($count_gerobak);
                                                            ?>
                                                            <?php if(!empty($row_posisikk['GEROBAK'])) :?>
                                                                <tr>
                                                                    <td><?= $row_iptip['STEPNUMBER'] ?></td>
                                                                    <td><?= $row_iptip['HANGER'] ?> - <?= $row_iptip['SUBCODE06'] ?></td>
                                                                    <td><?= $row_iptip['NO_WARNA']; ?></td>
                                                                    <td><?= $row_iptip['WARNA']; ?></td>
                                                                    <td><?= $row_iptip['PRODUCTIONORDERCODE'] ?></td>
                                                                    <td><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?= $row_iptip['PRODUCTIONDEMANDCODE']; ?>&prod_order=<?= $row_iptip['PRODUCTIONORDERCODE']; ?>"><?= $row_iptip['PRODUCTIONDEMANDCODE'] ?></a></td>
                                                                    <td align="center"><?= $row_iptip['OPERATIONCODE'] ?></td>
                                                                    <td align="center"><?= $row_iptip['OPERATIONGROUPCODE'] ?></td>
                                                                    <td
                                                                        <?php 
                                                                            if($row_iptip['STATUS_OPERATION'] == 'Closed'){ 
                                                                                echo 'style="background-color:#DC526E; color:#F7F7F7;"'; 
                                                                                
                                                                            }elseif($row_iptip['STATUS_OPERATION'] == 'Progress'){ 
                                                                                echo 'style="background-color:#41CC11;"'; 
                                                                            }else{ 
                                                                                echo 'style="background-color:#CECECE;"'; 
                                                                            } 
                                                                        ?>>
                                                                        <center><?= $row_iptip['STATUS_OPERATION']; ?></center>
                                                                    </td>
                                                                    <?php if($dept == 'DYE') : ?>
                                                                        <?php
                                                                            $q_schedule_dye     = mysqli_query($con_db_dyeing, "SELECT DISTINCT
                                                                                                                                    nokk,
                                                                                                                                    id,
                                                                                                                                    GROUP_CONCAT( lot SEPARATOR '/' ) AS lot,
                                                                                                                                    if(COUNT(lot)>1,'Gabung Kartu','') as ket_kartu,
                                                                                                                                    no_mesin,
                                                                                                                                    nodemand,
                                                                                                                                    no_urut,
                                                                                                                                    buyer,
                                                                                                                                    langganan,
                                                                                                                                    GROUP_CONCAT(DISTINCT no_order SEPARATOR '-' ) AS no_order,
                                                                                                                                    no_resep,
                                                                                                                                    nokk,
                                                                                                                                    jenis_kain,
                                                                                                                                    warna,
                                                                                                                                    no_warna,
                                                                                                                                    sum(rol) as rol,
                                                                                                                                    sum(bruto) as bruto,
                                                                                                                                    proses,
                                                                                                                                    ket_status,
                                                                                                                                    tgl_delivery,
                                                                                                                                    ket_kain,
                                                                                                                                    mc_from,
                                                                                                                                    GROUP_CONCAT(DISTINCT personil SEPARATOR ',' ) AS personil
                                                                                                                                FROM
                                                                                                                                    tbl_schedule 
                                                                                                                                WHERE
                                                                                                                                    (`status` = 'sedang jalan' or `status` ='antri mesin') and nokk = '$row_iptip[PRODUCTIONORDERCODE]'
                                                                                                                                GROUP BY
                                                                                                                                    no_mesin,
                                                                                                                                    no_urut 
                                                                                                                                ORDER BY
                                                                                                                                    id ASC");
                                                                            $row_schedule_dye   = mysqli_fetch_assoc($q_schedule_dye);
                                                                            $ket    = $row_schedule_dye['ket_status'].'- '.$row_schedule_dye['ket_kain'].' '.$row_schedule_dye['proses'].' MC '.$row_schedule_dye['mc_from'];
                                                                        ?>
                                                                        <td align="center"><?= $ket; ?></td>
                                                                        <td align="center"><?= $row_schedule_dye['no_urut']; ?></td>
                                                                    <?php endif; ?>

                                                                    <td align="center"></td>
                                                                    <td align="center"></td>
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
                                                                    <td>
                                                                        <?php
                                                                            $sql_qtyorder   = db2_exec($conn1, "SELECT DISTINCT
                                                                                                                        GROUPSTEPNUMBER,
                                                                                                                        INITIALUSERPRIMARYQUANTITY AS QTY_ORDER,
                                                                                                                        INITIALUSERSECONDARYQUANTITY AS QTY_ORDER_YARD
                                                                                                                    FROM 
                                                                                                                        VIEWPRODUCTIONDEMANDSTEP 
                                                                                                                    WHERE 
                                                                                                                        PRODUCTIONORDERCODE = '$row_iptip[PRODUCTIONORDERCODE]'
                                                                                                                        -- AND GROUPSTEPNUMBER = '$row_iptip[STEPNUMBER]'
                                                                                                                    ORDER BY
                                                                                                                        GROUPSTEPNUMBER ASC LIMIT 1");
                                                                            $dt_qtyorder    = db2_fetch_assoc($sql_qtyorder);
                                                                        ?>
                                                                        <?= $dt_qtyorder['QTY_ORDER']; ?>
                                                                    </td>
                                                                    <td><?= $row_count_gerobak['JML_GEROBAK'] ?></td>
                                                                </tr>
                                                            <?php else : ?>
                                                                <?php
                                                                    $q_carisalinan1  = db2_exec($conn1, "SELECT
                                                                                                            PRODUCTIONORDERCODE,
                                                                                                            PRODUCTIONDEMANDCODE,
                                                                                                            SUBSTR(ORIGINALPDCODE, 5) AS ORIGINALPDCODE 
                                                                                                        FROM 
                                                                                                            ITXVIEWKK i 
                                                                                                        WHERE 
                                                                                                            PRODUCTIONDEMANDCODE = '$row_iptip[PRODUCTIONDEMANDCODE]'");
                                                                    $row_carisalinan1    = db2_fetch_assoc($q_carisalinan1);
                                                                    
                                                                    $q_carisalinan  = db2_exec($conn1, "SELECT
                                                                                                            PRODUCTIONORDERCODE,
                                                                                                            PRODUCTIONDEMANDCODE,
                                                                                                            SUBSTR(ORIGINALPDCODE, 5) AS ORIGINALPDCODE 
                                                                                                        FROM 
                                                                                                            ITXVIEWKK i 
                                                                                                        WHERE 
                                                                                                            PRODUCTIONDEMANDCODE = '$row_carisalinan1[ORIGINALPDCODE]'");
                                                                    $row_carisalinan    = db2_fetch_assoc($q_carisalinan);
                                                                ?>
                                                                <?php if($row_carisalinan) : ?>
                                                                    <?php
                                                                        if($dept == 'DYE'){
                                                                            $gerobak    = "CASE
                                                                                                WHEN TRIM(p.OPERATIONCODE) = 'DYE2' THEN 'Poly'
                                                                                                WHEN TRIM(p.OPERATIONCODE) = 'DYE4' THEN 'Cotton'
                                                                                                ELSE LISTAGG(DISTINCT FLOOR(idqd.VALUEQUANTITY), ', ')
                                                                                            END AS GEROBAK";
                                                                        }else{
                                                                            $gerobak    = "LISTAGG(DISTINCT FLOOR(idqd.VALUEQUANTITY), ', ') AS GEROBAK";
                                                                        }

                                                                        $qsalinan = "SELECT DISTINCT
                                                                                            p.STEPNUMBER AS STEPNUMBER,
                                                                                            CASE
                                                                                                WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) IS NULL OR TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE)
                                                                                                ELSE TRIM(p.PRODRESERVATIONLINKGROUPCODE)
                                                                                            END AS OPERATIONCODE,
                                                                                            TRIM(o.OPERATIONGROUPCODE) AS DEPT,
                                                                                            o.LONGDESCRIPTION,
                                                                                            CASE
                                                                                                WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
                                                                                                WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
                                                                                                WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
                                                                                                WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
                                                                                            END AS STATUS_OPERATION,
                                                                                            iptip.MULAI,
                                                                                            CASE
                                                                                                WHEN p.PROGRESSSTATUS = 3 THEN COALESCE(iptop.SELESAI, SUBSTRING(p.LASTUPDATEDATETIME, 1, 19) || '(Run Manual Closures)')
                                                                                                ELSE iptop.SELESAI
                                                                                            END AS SELESAI,
                                                                                            p.PRODUCTIONORDERCODE,
                                                                                            p.PRODUCTIONDEMANDCODE,
                                                                                            iptip.LONGDESCRIPTION AS OP1,
                                                                                            iptop.LONGDESCRIPTION AS OP2,
                                                                                            $gerobak
                                                                                        FROM 
                                                                                            PRODUCTIONDEMANDSTEP p 
                                                                                        LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                        LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                        LEFT JOIN ITXVIEW_DETAIL_QA_DATA idqd ON idqd.PRODUCTIONDEMANDCODE = p.PRODUCTIONDEMANDCODE AND idqd.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE
                                                                                                                            AND idqd.OPERATIONCODE = CASE
                                                                                                                                                        WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) IS NULL OR TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE)
                                                                                                                                                        ELSE TRIM(p.PRODRESERVATIONLINKGROUPCODE)
                                                                                                                                                    END
                                                                                                                            AND (idqd.VALUEINT = p.STEPNUMBER OR idqd.VALUEINT = p.GROUPSTEPNUMBER) 
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
                                                                                            p.PRODUCTIONORDERCODE  = '$row_carisalinan[PRODUCTIONORDERCODE]' 
                                                                                            AND p.PRODUCTIONDEMANDCODE = '$row_carisalinan[PRODUCTIONDEMANDCODE]'
                                                                                            AND NOT idqd.VALUEQUANTITY IS NULL
                                                                                        GROUP BY
                                                                                            p.PRODUCTIONORDERCODE,
                                                                                            p.STEPNUMBER,
                                                                                            p.OPERATIONCODE,
                                                                                            p.PRODRESERVATIONLINKGROUPCODE,
                                                                                            o.OPERATIONGROUPCODE,
                                                                                            o.LONGDESCRIPTION,
                                                                                            p.PROGRESSSTATUS,
                                                                                            iptip.MULAI,
                                                                                            iptop.SELESAI,
                                                                                            p.LASTUPDATEDATETIME,
                                                                                            p.PRODUCTIONORDERCODE,
                                                                                            p.PRODUCTIONDEMANDCODE,
                                                                                            iptip.LONGDESCRIPTION,
                                                                                            iptop.LONGDESCRIPTION
                                                                                        ORDER BY 
                                                                                            p.STEPNUMBER
                                                                                        DESC
                                                                                        LIMIT 1";
                                                                        $q_posisikksalinan     = db2_exec($conn1, $qsalinan);
                                                                        $row_posisikk_salinan = db2_fetch_assoc($q_posisikksalinan);

                                                                        $count_gerobaksalinan  = db2_exec($conn1, "SELECT 
                                                                                                            COUNT(DISTINCT idqd.VALUEQUANTITY) AS JML_GEROBAK
                                                                                                            FROM 
                                                                                                                PRODUCTIONDEMANDSTEP p 
                                                                                                            LEFT JOIN OPERATION o ON o.CODE = p.OPERATIONCODE 
                                                                                                            -- LEFT JOIN ADSTORAGE a ON a.UNIQUEID = o.ABSUNIQUEID AND a.FIELDNAME = 'Gerobak'
                                                                                                            LEFT JOIN ITXVIEW_POSISIKK_TGL_IN_PRODORDER iptip ON iptip.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptip.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                                            LEFT JOIN ITXVIEW_POSISIKK_TGL_OUT_PRODORDER iptop ON iptop.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE AND iptop.DEMANDSTEPSTEPNUMBER = p.STEPNUMBER
                                                                                                            LEFT JOIN ITXVIEW_DETAIL_QA_DATA idqd ON idqd.PRODUCTIONDEMANDCODE = p.PRODUCTIONDEMANDCODE AND idqd.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE
                                                                                                                                                AND idqd.OPERATIONCODE = CASE
                                                                                                                                                                            WHEN TRIM(p.PRODRESERVATIONLINKGROUPCODE) IS NULL OR TRIM(p.PRODRESERVATIONLINKGROUPCODE) = '' THEN TRIM(p.OPERATIONCODE)
                                                                                                                                                                            ELSE TRIM(p.PRODRESERVATIONLINKGROUPCODE)
                                                                                                                                                                        END
                                                                                                                                                AND (idqd.VALUEINT = p.STEPNUMBER OR idqd.VALUEINT = p.GROUPSTEPNUMBER) 
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
                                                                                                                p.PRODUCTIONORDERCODE  = '$row_carisalinan[PRODUCTIONORDERCODE]' 
                                                                                                                AND p.PRODUCTIONDEMANDCODE IN ($row_carisalinan[PRODUCTIONDEMANDCODE])
                                                                                                                AND NOT idqd.VALUEQUANTITY IS NULL
                                                                                                            GROUP BY
                                                                                                                p.PRODUCTIONORDERCODE,
                                                                                                                p.STEPNUMBER,
                                                                                                                p.OPERATIONCODE,
                                                                                                                p.PRODRESERVATIONLINKGROUPCODE,
                                                                                                                o.OPERATIONGROUPCODE,
                                                                                                                o.LONGDESCRIPTION,
                                                                                                                p.PROGRESSSTATUS,
                                                                                                                iptip.MULAI,
                                                                                                                iptop.SELESAI,
                                                                                                                p.LASTUPDATEDATETIME,
                                                                                                                p.PRODUCTIONORDERCODE,
                                                                                                                p.PRODUCTIONDEMANDCODE,
                                                                                                                iptip.LONGDESCRIPTION,
                                                                                                                iptop.LONGDESCRIPTION
                                                                                                            ORDER BY 
                                                                                                                p.STEPNUMBER
                                                                                                            DESC
                                                                                                            LIMIT 1");
                                                                        $row_count_gerobaksalinan = db2_fetch_assoc($count_gerobaksalinan);
                                                                    ?>
                                                                    <tr>
                                                                        <td><?= $row_iptip['STEPNUMBER'] ?></td>
                                                                        <td><?= $row_iptip['HANGER'] ?> - <?= $row_iptip['SUBCODE06'] ?></td>
                                                                        <td><?= $row_iptip['NO_WARNA']; ?></td>
                                                                        <td><?= $row_iptip['WARNA']; ?></td>
                                                                        <td><?= $row_iptip['PRODUCTIONORDERCODE'] ?></td>
                                                                        <td><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?= $row_iptip['PRODUCTIONDEMANDCODE']; ?>&prod_order=<?= $row_iptip['PRODUCTIONORDERCODE']; ?>"><?= $row_iptip['PRODUCTIONDEMANDCODE'] ?></a></td>
                                                                        <td align="center"><?= $row_iptip['OPERATIONCODE'] ?></td>
                                                                        <td align="center"><?= $row_iptip['OPERATIONGROUPCODE'] ?></td>
                                                                        <td
                                                                            <?php 
                                                                                if($row_iptip['STATUS_OPERATION'] == 'Closed'){ 
                                                                                    echo 'style="background-color:#DC526E; color:#F7F7F7;"'; 
                                                                                    
                                                                                }elseif($row_iptip['STATUS_OPERATION'] == 'Progress'){ 
                                                                                    echo 'style="background-color:#41CC11;"'; 
                                                                                }else{ 
                                                                                    echo 'style="background-color:#CECECE;"'; 
                                                                                } 
                                                                            ?>>
                                                                            <center><?= $row_iptip['STATUS_OPERATION']; ?></center>
                                                                        </td>
                                                                        <?php if($dept == 'DYE') : ?>
                                                                            <?php
                                                                                $q_schedule_dye     = mysqli_query($con_db_dyeing, "SELECT DISTINCT
                                                                                                                                        nokk,
                                                                                                                                        id,
                                                                                                                                        GROUP_CONCAT( lot SEPARATOR '/' ) AS lot,
                                                                                                                                        if(COUNT(lot)>1,'Gabung Kartu','') as ket_kartu,
                                                                                                                                        no_mesin,
                                                                                                                                        nodemand,
                                                                                                                                        no_urut,
                                                                                                                                        buyer,
                                                                                                                                        langganan,
                                                                                                                                        GROUP_CONCAT(DISTINCT no_order SEPARATOR '-' ) AS no_order,
                                                                                                                                        no_resep,
                                                                                                                                        nokk,
                                                                                                                                        jenis_kain,
                                                                                                                                        warna,
                                                                                                                                        no_warna,
                                                                                                                                        sum(rol) as rol,
                                                                                                                                        sum(bruto) as bruto,
                                                                                                                                        proses,
                                                                                                                                        ket_status,
                                                                                                                                        tgl_delivery,
                                                                                                                                        ket_kain,
                                                                                                                                        mc_from,
                                                                                                                                        GROUP_CONCAT(DISTINCT personil SEPARATOR ',' ) AS personil
                                                                                                                                    FROM
                                                                                                                                        tbl_schedule 
                                                                                                                                    WHERE
                                                                                                                                        (`status` = 'sedang jalan' or `status` ='antri mesin') and nokk = '$row_posisikk_salinan[PRODUCTIONORDERCODE]'
                                                                                                                                    GROUP BY
                                                                                                                                        no_mesin,
                                                                                                                                        no_urut 
                                                                                                                                    ORDER BY
                                                                                                                                        id ASC");
                                                                                $row_schedule_dye   = mysqli_fetch_assoc($q_schedule_dye);
                                                                                $ket    = $row_schedule_dye['ket_status'].'- '.$row_schedule_dye['ket_kain'].' '.$row_schedule_dye['proses'].' MC '.$row_schedule_dye['mc_from'];
                                                                            ?>
                                                                            <td align="center"><?= $ket; ?></td>
                                                                            <td align="center"><?= $row_schedule_dye['no_urut']; ?></td>
                                                                        <?php endif; ?>

                                                                        <td align="center"><?= $row_posisikk_salinan['PRODUCTIONORDERCODE'] ?></td>
                                                                        <td align="center"><?= $row_posisikk_salinan['PRODUCTIONDEMANDCODE'] ?></td>
                                                                        <td align="center"><?= $row_posisikk_salinan['OPERATIONCODE'] ?></td>
                                                                        <td align="center"><?= $row_posisikk_salinan['DEPT'] ?></td>
                                                                        <td
                                                                            <?php 
                                                                                if($row_posisikk_salinan['STATUS_OPERATION'] == 'Closed'){ 
                                                                                    echo 'style="background-color:#DC526E; color:#F7F7F7;"'; 
                                                                                    
                                                                                }elseif($row_posisikk_salinan['STATUS_OPERATION'] == 'Progress'){ 
                                                                                    echo 'style="background-color:#41CC11;"'; 
                                                                                }else{ 
                                                                                    echo 'style="background-color:#CECECE;"'; 
                                                                                } 
                                                                            ?>>
                                                                            <center><?= $row_posisikk_salinan['STATUS_OPERATION']; ?></center>
                                                                        </td>
                                                                        <td><?= $row_posisikk_salinan['MULAI'] ?></td>
                                                                        <td><?= $row_posisikk_salinan['SELESAI'] ?></td>
                                                                        <td><?= $row_posisikk_salinan['OP1'] ?></td>
                                                                        <td><?= $row_posisikk_salinan['OP2'] ?></td>
                                                                        <td><?= $row_posisikk_salinan['GEROBAK'] ?></td>
                                                                        <td>
                                                                            <?php
                                                                                $sql_qtyorder   = db2_exec($conn1, "SELECT DISTINCT
                                                                                                                            GROUPSTEPNUMBER,
                                                                                                                            INITIALUSERPRIMARYQUANTITY AS QTY_ORDER,
                                                                                                                            INITIALUSERSECONDARYQUANTITY AS QTY_ORDER_YARD
                                                                                                                        FROM 
                                                                                                                            VIEWPRODUCTIONDEMANDSTEP 
                                                                                                                        WHERE 
                                                                                                                            PRODUCTIONORDERCODE = '$row_posisikk_salinan[PRODUCTIONORDERCODE]'
                                                                                                                            -- AND GROUPSTEPNUMBER = '$row_iptip[STEPNUMBER]'
                                                                                                                        ORDER BY
                                                                                                                            GROUPSTEPNUMBER ASC LIMIT 1");
                                                                                $dt_qtyorder    = db2_fetch_assoc($sql_qtyorder);
                                                                            ?>
                                                                            <?= $dt_qtyorder['QTY_ORDER']; ?>
                                                                        </td>
                                                                        <td><?= $row_count_gerobaksalinan['JML_GEROBAK'] ?></td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
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
    <script type="text/javascript" src="files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <script type="text/javascript" src="files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <script type="text/javascript" src="files\bower_components\modernizr\js\modernizr.js"></script>
    <script type="text/javascript" src="files\bower_components\modernizr\js\css-scrollbars.js"></script>
    <script src="files\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
    <script src="files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
    <script src="files\assets\pages\data-table\js\jszip.min.js"></script>
    <script src="files\assets\pages\data-table\js\pdfmake.min.js"></script>
    <script src="files\assets\pages\data-table\js\vfs_fonts.js"></script>
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
</body>
</html>