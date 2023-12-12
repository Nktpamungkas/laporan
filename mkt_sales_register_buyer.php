<!DOCTYPE html>
<html lang="en">
<head>
    <title>MKT - SALES REGISTER BUYER</title>
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
                                        <span class="count" hidden></span>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-4 col-xl-4 m-b-30">
                                                    <h4 class="sub-title">Tahun</h4>
                                                        <?php
                                                            $current_year =  date("Y");
                                                        ?>
                                                        <select value="tahun" name="tahun" class="form-control">
                                                            <?php
                                                            for ($i=-1; $i <6 ; $i++) {
                                                            ?>
                                                            <option value=" <?php echo($current_year + $i);  ?>"> <?php echo($current_year + $i);  ?>
                                                            </option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                </div>
                                                <div class="col-sm-4 col-xl-4 m-b-30">
                                                    <h4 >&nbsp;</h4>
                                                    <button type="submit" name="submit" class="btn btn-primary"><i class="icofont icofont-search-alt-1"></i> Cari data</button>
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
                                                            <th style="text-align: center" rowspan="2">BUYER</th>
                                                            <th style="text-align: center" colspan="2">JAN</th>
                                                            <th style="text-align: center" colspan="2">FEB</th>
                                                            <th style="text-align: center" colspan="2">MAR</th>
                                                            <th style="text-align: center" colspan="2">APR</th>
                                                            <th style="text-align: center" colspan="2">MAY</th>
                                                            <th style="text-align: center" colspan="2">JUN</th>
                                                            <th style="text-align: center" colspan="2">JUL</th>
                                                            <th style="text-align: center" colspan="2">AUG</th>
                                                            <th style="text-align: center" colspan="2">SEP</th>
                                                            <th style="text-align: center" colspan="2">OCT</th>
                                                            <th style="text-align: center" colspan="2">NOV</th>
                                                            <th style="text-align: center" colspan="2">DEC</th>
                                                            <!-- <th style="text-align: center" rowspan="2">TOTAL SUM OF BRUTO</th> -->
                                                            <!-- <th style="text-align: center" rowspan="2">TOTAL SUM OF NETTO</th> -->
                                                         </tr>
                                                         <tr>                                                         
                                                            <th>TOTAL BRUTO</th>
                                                            <th>TOTAL NETTO</th>
                                                            <th>TOTAL BRUTO</th>
                                                            <th>TOTAL NETTO</th>
                                                            <th>TOTAL BRUTO</th>
                                                            <th>TOTAL NETTO</th>
                                                            <th>TOTAL BRUTO</th>
                                                            <th>TOTAL NETTO</th>
                                                            <th>TOTAL BRUTO</th>
                                                            <th>TOTAL NETTO</th>
                                                            <th>TOTAL BRUTO</th>
                                                            <th>TOTAL NETTO</th>
                                                            <th>TOTAL BRUTO</th>
                                                            <th>TOTAL NETTO</th>
                                                            <th>TOTAL BRUTO</th>
                                                            <th>TOTAL NETTO</th>
                                                            <th>TOTAL BRUTO</th>
                                                            <th>TOTAL NETTO</th>
                                                            <th>TOTAL BRUTO</th>
                                                            <th>TOTAL NETTO</th>
                                                            <!-- <th>TOTAL BRUTO</th> -->
                                                            <!-- <th>TOTAL NETTO</th>                                                            
                                                   </thead>
                                                    <tbody> 
                                                        <?php 
                                                            ini_set("error_reporting", 1);
                                                            session_start();
                                                            require_once "koneksi.php";
                                                            $tahun  = $_POST['tahun'];

                                                            $itxviews_sumsales  = db2_exec($conn1, "SELECT DISTINCT 
                                                                                                            o.LONGDESCRIPTION AS BUYER,
                                                                                                            floor( br1.SUM_BRUTO) AS BRUTO_1,
                                                                                                            floor(is1.SUM_NETTO) AS NETTO_1,
                                                                                                            floor(br2.SUM_BRUTO) AS BRUTO_2,
                                                                                                            floor(is2.SUM_NETTO) AS NETTO_2,
                                                                                                            floor(br3.SUM_BRUTO) AS BRUTO_3,
                                                                                                            floor(is3.SUM_NETTO) AS NETTO_3,
                                                                                                            floor(br4.SUM_BRUTO) AS BRUTO_4,
                                                                                                            floor(is4.SUM_NETTO) AS NETTO_4,
                                                                                                            floor(br5.SUM_BRUTO) AS BRUTO_5,
                                                                                                            floor(is5.SUM_NETTO) AS NETTO_5,
                                                                                                            floor(br6.SUM_BRUTO) AS BRUTO_6,
                                                                                                            floor(is6.SUM_NETTO) AS NETTO_6,
                                                                                                            floor(br7.SUM_BRUTO) AS BRUTO_7,
                                                                                                            floor(is7.SUM_NETTO) AS NETTO_7,
                                                                                                            floor(br8.SUM_BRUTO) AS BRUTO_8,
                                                                                                            floor(is8.SUM_NETTO) AS NETTO_8,
                                                                                                            floor(br9.SUM_BRUTO) AS BRUTO_9,
                                                                                                            floor(is9.SUM_NETTO) AS NETTO_9,
                                                                                                            floor(br10.SUM_BRUTO) AS BRUTO_10,
                                                                                                            floor(is10.SUM_NETTO) AS NETTO_10,
                                                                                                            floor(br11.SUM_BRUTO) AS BRUTO_11,
                                                                                                            floor(is11.SUM_NETTO) AS NETTO_11,
                                                                                                            floor(br12.SUM_BRUTO) AS BRUTO_12,
                                                                                                            floor(is12.SUM_NETTO) AS NETTO_12
                                                                                                                -- SUM( is1.SUM_NETTO + is2.SUM_NETTO + is3.SUM_NETTO +  is4.SUM_NETTO +  is5.SUM_NETTO +  is6.SUM_NETTO +  is7.SUM_NETTO +  is8.SUM_NETTO +  is9.SUM_NETTO + is10.SUM_NETTO+ is11.SUM_NETTO+ is12.SUM_NETTO) AS TOTAL_NETTO,
                                                                                                                -- SUM( br1.SUM_BRUTO+ br2.SUM_BRUTO+ br3.SUM_BRUTO+ br4.SUM_BRUTO+ br5.SUM_BRUTO+ br6.SUM_BRUTO+ br7.SUM_BRUTO+ br8.SUM_BRUTO+ br9.SUM_BRUTO+ br10.SUM_BRUTO+ br11.SUM_BRUTO+ br12.SUM_BRUTO) AS TOTAL_BRUTO
                                                                                                    FROM 
                                                                                                        ORDERPARTNERBRAND o 
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER_BRUTO br1 ON br1.BUYER = o.LONGDESCRIPTION AND br1.BULAN = 1 AND br1.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER_BRUTO br2 ON br2.BUYER = o.LONGDESCRIPTION AND br2.BULAN = 2 AND br2.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER_BRUTO br3 ON br3.BUYER = o.LONGDESCRIPTION AND br3.BULAN = 3 AND br3.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER_BRUTO br4 ON br4.BUYER = o.LONGDESCRIPTION AND br1.BULAN = 4 AND br4.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER_BRUTO br5 ON br5.BUYER = o.LONGDESCRIPTION AND br5.BULAN = 5 AND br5.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER_BRUTO br6 ON br6.BUYER = o.LONGDESCRIPTION AND br6.BULAN = 6 AND br6.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER_BRUTO br7 ON br7.BUYER = o.LONGDESCRIPTION AND br7.BULAN = 7 AND br7.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER_BRUTO br8 ON br8.BUYER = o.LONGDESCRIPTION AND br8.BULAN = 8 AND br8.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER_BRUTO br9 ON br9.BUYER = o.LONGDESCRIPTION AND br9.BULAN = 9 AND br9.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER_BRUTO br10 ON br10.BUYER = o.LONGDESCRIPTION AND br10.BULAN = 10 AND br10.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER_BRUTO br11 ON br11.BUYER = o.LONGDESCRIPTION AND br11.BULAN = 11 AND br11.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER_BRUTO br12 ON br12.BUYER = o.LONGDESCRIPTION AND br12.BULAN = 12 AND br12.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER is1 ON is1.BUYER = o.LONGDESCRIPTION AND is1.BULAN = 1 AND is1.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER is2 ON is2.BUYER = o.LONGDESCRIPTION AND is2.BULAN = 2 AND is2.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER is3 ON is3.BUYER = o.LONGDESCRIPTION AND is3.BULAN = 3 AND is3.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER is4 ON is4.BUYER = o.LONGDESCRIPTION AND is4.BULAN = 4 AND is4.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER is5 ON is5.BUYER = o.LONGDESCRIPTION AND is5.BULAN = 5 AND is5.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER is6 ON is6.BUYER = o.LONGDESCRIPTION AND is6.BULAN = 6 AND is6.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER is7 ON is7.BUYER = o.LONGDESCRIPTION AND is7.BULAN = 7 AND is7.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER is8 ON is8.BUYER = o.LONGDESCRIPTION AND is8.BULAN = 8 AND is8.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER is9 ON is9.BUYER = o.LONGDESCRIPTION AND is9.BULAN = 9 AND is9.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER is10 ON is10.BUYER = o.LONGDESCRIPTION AND is10.BULAN = 10 AND is10.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER is11 ON is11.BUYER = o.LONGDESCRIPTION AND is11.BULAN = 11 AND is11.TAHUN = $tahun
                                                                                                        LEFT JOIN ITXVIEW_SUMSALESORDER is12 ON is12.BUYER = o.LONGDESCRIPTION AND is12.BULAN = 12 AND is12.TAHUN = $tahun
                                                                                                    ORDER BY 
                                                                                                                o.LONGDESCRIPTION ASC");
                                                            while ($row_itxviews_sumsales   = db2_fetch_assoc($itxviews_sumsales)) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $row_itxviews_sumsales['BUYER']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['BRUTO_1']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['NETTO_1']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['BRUTO_2']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['NETTO_2']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['BRUTO_3']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['NETTO_3']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['BRUTO_4']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['NETTO_4']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['BRUTO_5']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['NETTO_5']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['BRUTO_6']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['NETTO_6']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['BRUTO_7']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['NETTO_7']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['BRUTO_8']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['NETTO_8']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['BRUTO_9']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['NETTO_9']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['BRUTO_10']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['NETTO_10']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['BRUTO_10']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['NETTO_11']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['BRUTO_12']; ?></td>
                                                            <td><?= $row_itxviews_sumsales['NETTO_12']; ?></td>
                                                            <!-- <td><?= $row_itxviews_sumsales['TOTAL_BRUTO']; ?></td> -->
                                                            <!-- <td><?= $row_itxviews_sumsales['TOTAL_NETTO']; ?></td>/ -->
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php //endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once 'footer.php'; ?>