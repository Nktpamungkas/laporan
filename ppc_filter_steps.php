<!DOCTYPE html>
<html lang="en">
<head>
    <title>PPC - Posisi KK</title>
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
                                        <h5>Filter Pencarian Steps / Posisi KK</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-6 col-xl-6 m-b-30">
                                                    <h4 class="sub-title">Production Order:</h4>
                                                    <input type="text" name="prod_order" class="form-control" required value="<?php if(isset($_POST['submit'])){ echo $_POST['prod_order']; }elseif(isset($_GET['prod_order'])){ echo $_GET['prod_order']; } ?>">
                                                </div>
                                                <div class="col-sm-6 col-xl-6 m-b-30">
                                                    <h4 class="sub-title">Production Demand:</h4>
                                                    <input type="text" name="demand" class="form-control" required value="<?php if(isset($_POST['submit'])){ echo $_POST['demand']; }elseif(isset($_GET['demand'])){ echo $_GET['demand']; } ?>">
                                                </div>
                                                <div class="col-sm-12 col-xl-4 m-b-30">
                                                    <button type="submit" name="submit" class="btn btn-primary">Cari data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> 
                                </div>
                                <?php if (isset($_POST['submit']) OR isset($_GET['demand']) OR isset($_GET['prod_order'])) : ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <?php
                                                ini_set("error_reporting", 1);
                                                session_start();
                                                require_once "koneksi.php";

                                                if($_GET['demand']){
                                                    $demand     = $_GET['demand'];
                                                }else{
                                                    $demand     = $_POST['demand'];
                                                }
                                                
                                                $q_demand   = db2_exec($conn1, "SELECT * FROM PRODUCTIONDEMAND WHERE CODE = '$demand'");
                                                $d_demand   = db2_fetch_assoc($q_demand);

                                                $sql_warna		= db2_exec($conn1, "SELECT DISTINCT TRIM(WARNA) AS WARNA FROM ITXVIEWCOLOR 
                                                                                        WHERE ITEMTYPECODE = '$d_demand[ITEMTYPEAFICODE]' 
                                                                                        AND SUBCODE01 = '$d_demand[SUBCODE01]' 
                                                                                        AND SUBCODE02 = '$d_demand[SUBCODE02]'
                                                                                        AND SUBCODE03 = '$d_demand[SUBCODE03]' 
                                                                                        AND SUBCODE04 = '$d_demand[SUBCODE04]'
                                                                                        AND SUBCODE05 = '$d_demand[SUBCODE05]' 
                                                                                        AND SUBCODE06 = '$d_demand[SUBCODE06]'
                                                                                        AND SUBCODE07 = '$d_demand[SUBCODE07]' 
                                                                                        AND SUBCODE08 = '$d_demand[SUBCODE08]'
                                                                                        AND SUBCODE09 = '$d_demand[SUBCODE09]' 
                                                                                        AND SUBCODE10 = '$d_demand[SUBCODE10]'");
                                                $dt_warna		= db2_fetch_assoc($sql_warna);
                                            ?>
                                            <table border="0" style='font-family:"Microsoft Sans Serif"'>
                                                <tr>
                                                    <td>Kode Product/Kode Warna </td>
                                                    <td>&nbsp;&nbsp;&nbsp; : &nbsp;</td>
                                                    <td><?= TRIM($d_demand['SUBCODE02']).TRIM($d_demand['SUBCODE03']).'-'.TRIM($d_demand['SUBCODE05']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Warna</td>
                                                    <td>&nbsp;&nbsp;&nbsp; : &nbsp;</td>
                                                    <td><?= $dt_warna['WARNA']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>No Order</td>
                                                    <td>&nbsp;&nbsp;&nbsp; : &nbsp;</td>
                                                    <td><?= $d_demand['ORIGDLVSALORDLINESALORDERCODE']; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="card-block">
                                            <div class="table-responsive dt-responsive">
                                                <table border='1' style='font-family:"Microsoft Sans Serif"' width="100%">
                                                    <thead>
                                                        <tr text-align="center">
                                                            <th width="100px">STEP NUMBER</th>
                                                            <th width="300px">TANGGAL IN</th>
                                                            <th width="300px">TANGGAL OUT</th>
                                                            <th width="100px">OPERATION</th>
                                                            <th width="500px">LONGDESCRIPTION</th>
                                                            <th width="100px">STATUS</th>
                                                            <th width="100px">PROD. ORDER</th>
                                                            <th width="100px">PROD. DEMAND</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php 
                                                            ini_set("error_reporting", 1);
                                                            session_start();
                                                            require_once "koneksi.php";

                                                            if($_GET['demand']){
                                                                $demand     = $_GET['demand'];
                                                            }else{
                                                                $demand     = $_POST['demand'];
                                                            }
                                                            
                                                            if($_GET['prod_order']){
                                                                $prod_order     = $_GET['prod_order'];
                                                            }else{
                                                                $prod_order     = $_POST['prod_order'];
                                                            }
                                                            
                                                            if(!empty($demand) && empty($prod_order)){ 
                                                                $sqlDB2 = "SELECT
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
                                                                                p.PRODUCTIONDEMANDCODE = '$demand'
                                                                            ORDER BY p.STEPNUMBER ASC";
                                                            }elseif(empty($demand) && !empty($prod_order)){
                                                                $sqlDB2 = "SELECT
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
                                                                                p.PRODUCTIONORDERCODE  = '$prod_order'  
                                                                            ORDER BY p.STEPNUMBER ASC";
                                                            }elseif(!empty($demand) && !empty($prod_order)){
                                                                $sqlDB2 = "SELECT
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
                                                                                p.PRODUCTIONORDERCODE  = '$prod_order' AND p.PRODUCTIONDEMANDCODE = '$demand' 
                                                                            ORDER BY p.STEPNUMBER ASC";
                                                            }
                                                            
                                                            $stmt = db2_exec($conn1,$sqlDB2);
                                                            while ($rowdb2 = db2_fetch_assoc($stmt)) {
                                                        ?>
                                                            <tr>
                                                                <td align="center"><?= $rowdb2['STEPNUMBER']; ?></td>
                                                                <?php if($demand) : ?>
                                                                    <td align="center"><?= $rowdb2['MULAI']; ?></td>
                                                                    <td align="center"><?= $rowdb2['SELESAI']; ?></td>
                                                                <?php else : ?>
                                                                    <td align="center"><?= $rowdb2['MULAI']; ?></td>
                                                                    <td align="center"><?= $rowdb2['SELESAI']; ?></td>
                                                                <?php endif; ?>
                                                                <td align="center"><?= $rowdb2['OPERATIONCODE']; ?></td>
                                                                <td><?= $rowdb2['LONGDESCRIPTION']; ?></td>
                                                                <td <?php if($rowdb2['STATUS_OPERATION'] == 'Closed'){ echo 'bgcolor="#E76057"'; }elseif($rowdb2['STATUS_OPERATION'] == 'Progress'){ echo "bgcolor='#41CC11'"; }else{ echo "bgcolor='#ECECEC'"; } ?>><?= $rowdb2['STATUS_OPERATION']; ?></td>
                                                                <td><?= $rowdb2['PRODUCTIONORDERCODE']; ?></td>
                                                                <td><?= $rowdb2['PRODUCTIONDEMANDCODE']; ?></td>
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