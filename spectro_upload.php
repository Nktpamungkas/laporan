<?php
    ini_set("error_reporting", 1);
    session_start();
    require_once "koneksi.php";
    mysqli_query($con_nowprd, "DELETE FROM itxview_memopentingppc WHERE CREATEDATETIME BETWEEN NOW() - INTERVAL 3 DAY AND NOW() - INTERVAL 1 DAY");
    mysqli_query($con_nowprd, "DELETE FROM itxview_memopentingppc WHERE IPADDRESS = '$_SERVER[REMOTE_ADDR]'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload Spectro</title>
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
                                        <h5>Unggah file baru (*.txt)</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input type="file" name="file">
                                            <button type="submit" name="import" class="btn btn-primary"><i class="icofont icofont-search-alt-1"></i> Import Data</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="lang-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>BATCH NAME</th>
                                                        <th>WHITENESS</th>
                                                        <th>TINT</th>
                                                        <th>YELLOWNESS</th>
                                                        <th>DATETIME</th>
                                                        <th>STATUS</th>
                                                        <th>INFO</th>
                                                        <th>OPTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $q_dataupload = mysqli_query($con_nowprd, "SELECT * FROM upload_spectro WHERE SUBSTR(creationdate, 1, 9) = SUBSTR(now(), 1,9) ORDER BY id DESC");
                                                    $no = 1;
                                                    while ($row_dataupload = mysqli_fetch_array($q_dataupload)) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $no++; ?></td>
                                                            <td><?= $row_dataupload['batch_name']; ?></td>
                                                            <td><?= $row_dataupload['whiteness']; ?></td>
                                                            <td><?= $row_dataupload['tint']; ?></td>
                                                            <td><?= $row_dataupload['yellowness']; ?></td>
                                                            <td><?= $row_dataupload['creationdate']; ?></td>
                                                            <td><?= $row_dataupload['statusheader']; ?></td>
                                                            <td><?= $row_dataupload['status']; ?></td>
                                                            <td>
                                                                <?php if($row_dataupload['status'] != 'Deleted') : ?>
                                                                    <button type="button" class="btn btn-danger btn-outline-danger btn-mini" data-toggle="modal" data-target="#confirm-delete<?= $row_dataupload['batch_name']; ?>">
                                                                        Delete this data
                                                                    </button>
                                                                    <span style="font-size: 11px;">
                                                                        Once you delete a quality data, there is no going back. Please be certain.
                                                                    </span>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                        <div id="confirm-delete<?= $row_dataupload['batch_name']; ?>" class="modal fade" role="dialog">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="login-card card-block login-card-modal">
                                                                    <form action="" method="post" enctype="multipart/form-data">
                                                                        <dialog id="repo-delete-menu-dialog" aria-modal="true" aria-labelledby="repo-delete-menu-dialog-title" aria-describedby="repo-delete-menu-dialog-description" data-view-component="true" class="Overlay Overlay-whenNarrow Overlay--size-medium-portrait Overlay--motion-scaleFade" open="">
                                                                            <div data-view-component="true" class="Overlay-header Overlay-header--divided">
                                                                                <div class="Overlay-headerContentWrap">
                                                                                    <div class="Overlay-titleWrap">
                                                                                        <h1 class="Overlay-title " id="repo-delete-menu-dialog-title">
                                                                                            Delete upload spectro/<?= TRIM($row_dataupload['batch_name']) ?>
                                                                                        </h1>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <scrollable-region data-labelled-by="repo-delete-menu-dialog-title" data-catalyst="" style="overflow: auto;">
                                                                                <div data-view-component="true" class="Overlay-body">
                                                                                    <div class="text-center">
                                                                                        <svg aria-hidden="true" height="24" viewBox="0 0 24 24" version="1.1" width="24" data-view-component="true" class="octicon octicon-repo-locked color-fg-muted mt-2">
                                                                                            <path d="M2 2.75A2.75 2.75 0 0 1 4.75 0h14.5a.75.75 0 0 1 .75.75v8a.75.75 0 0 1-1.5 0V1.5H4.75c-.69 0-1.25.56-1.25 1.25v12.651A2.987 2.987 0 0 1 5 15h6.25a.75.75 0 0 1 0 1.5H5A1.5 1.5 0 0 0 3.5 18v1.25c0 .69.56 1.25 1.25 1.25h6a.75.75 0 0 1 0 1.5h-6A2.75 2.75 0 0 1 2 19.25V2.75Z"></path>
                                                                                            <path d="M15 14.5a3.5 3.5 0 1 1 7 0V16h.25c.966 0 1.75.784 1.75 1.75v4.5A1.75 1.75 0 0 1 22.25 24h-7.5A1.75 1.75 0 0 1 13 22.25v-4.5c0-.966.784-1.75 1.75-1.75H15Zm3.5-2a2 2 0 0 0-2 2V16h4v-1.5a2 2 0 0 0-2-2Z"></path>
                                                                                        </svg>

                                                                                        <p data-view-component="true" class="text-bold f3 mt-2">upload spectro/<?= TRIM($row_dataupload['batch_name']) ?></p>

                                                                                    </div>
                                                                                </div>
                                                                            </scrollable-region>
                                                                            <div data-view-component="true" class="Overlay-footer Overlay-footer--alignEnd Overlay-footer--divided">
                                                                                <div class="full-button width-full">
                                                                                    <div class="full-button width-full">
                                                                                        <primer-text-field class="FormControl width-full FormControl--fullWidth" data-catalyst="">
                                                                                            <label class="FormControl-label" for="verification_field">
                                                                                                To confirm, type "Password" in the box below
                                                                                            </label>
                                                                                            <div class="FormControl-input-wrap">
                                                                                                <input class="form-control form-control-inverse mb-2" type="text" name="batch_name">
                                                                                            </div>
                                                                                            <div class="FormControl-inlineValidation" id="validation-ee1ac74f-1e74-4128-b75a-a66475d4c2ce" hidden="hidden">
                                                                                                <span class="FormControl-inlineValidation--visual" data-target="primer-text-field.validationSuccessIcon" hidden="">
                                                                                                    <svg aria-hidden="true" height="12" viewBox="0 0 12 12" version="1.1" width="12" data-view-component="true" class="octicon octicon-check-circle-fill">
                                                                                                        <path d="M6 0a6 6 0 1 1 0 12A6 6 0 0 1 6 0Zm-.705 8.737L9.63 4.403 8.392 3.166 5.295 6.263l-1.7-1.702L2.356 5.8l2.938 2.938Z"></path>
                                                                                                    </svg>
                                                                                                </span>
                                                                                                <span class=" FormControl-inlineValidation--visual" data-target="primer-text-field.validationErrorIcon">
                                                                                                    <svg aria-hidden="true" height="12" viewBox="0 0 12 12" version="1.1" width="12" data-view-component="true" class="octicon octicon-alert-fill">
                                                                                                        <path d="M4.855.708c.5-.896 1.79-.896 2.29 0l4.675 8.351a1.312 1.312 0 0 1-1.146 1.954H1.33A1.313 1.313 0 0 1 .183 9.058ZM7 7V3H5v4Zm-1 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"></path>
                                                                                                    </svg>
                                                                                                </span>
                                                                                            </div>

                                                                                        </primer-text-field>
                                                                                        <button class="btn btn-danger btn-outline-danger btn-block" name="delete_data">Delete this data</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </dialog>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php if (isset($_POST['import'])) : ?>
                                    <?php
                                    ini_set("error_reporting", 1);
                                    $ip = $_SERVER['REMOTE_ADDR'];
                                    $os = $_SERVER['HTTP_USER_AGENT'];

                                    if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
                                        $fileContent = file_get_contents($_FILES['file']['tmp_name']);
                                        $lines = explode("\n", $fileContent);

                                        require_once "koneksi.php";
                                        // Proses data dan masukkan ke database
                                        foreach ($lines as $line) {
                                            // Memecah kolom-kolom berdasarkan TAB
                                            $columns = explode("\t", $line);

                                            // Mengambil data dari kolom yang diinginkan
                                            $column1 = $columns[0];
                                            $column2 = $columns[1];
                                            $column3 = $columns[2];
                                            $column4 = $columns[3];
                                            $column5 = date('Y-m-d H:i:s');
                                            $column6 = $ip;

                                            // proses transfer ke NOW QUALITYDOCUMENTBEAN
                                            $nokk     = sprintf("%08d", $column1);
                                            $strip = substr($column1, -3, 1);
                                            if ($strip != "-") {
                                                $stepnumber = substr($column1, -3);
                                            } else {
                                                $stepnumber = substr($column1, -2);
                                            }

                                            if(is_numeric($stepnumber)){
                                                $q_QUALITYDOCUMENTBEAN      = db2_exec($conn1, "SELECT
                                                                                                        q.PRODUCTIONORDERCODE,
                                                                                                        a.VALUEINT,
                                                                                                        q.HEADERNUMBERID,
                                                                                                        q.HEADERLINE,
                                                                                                        q.ITEMTYPEAFICODE,
                                                                                                        q.SUBCODE01,
                                                                                                        q.SUBCODE02,
                                                                                                        q.SUBCODE03,
                                                                                                        q.SUBCODE04,
                                                                                                        q.SUBCODE05,
                                                                                                        q.SUBCODE06,
                                                                                                        q.SUBCODE07,
                                                                                                        q.SUBCODE08,
                                                                                                        q.SUBCODE09,
                                                                                                        q.SUBCODE10,
                                                                                                        q.WORKCENTERCODE,
                                                                                                        q.OPERATIONCODE,
                                                                                                        q.LASTUPDATEUSER,
                                                                                                        q.FULLITEMIDENTIFIER 
                                                                                                    FROM
                                                                                                        QUALITYDOCUMENT q  
                                                                                                    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = q.ABSUNIQUEID AND a.FIELDNAME = 'GroupStepNumber'
                                                                                                    WHERE
                                                                                                        q.PRODUCTIONORDERCODE = '$nokk'
                                                                                                        AND a.VALUEINT = '$stepnumber'");
                                                $row_QUALITYDOCUMENTBEAN    = db2_fetch_assoc($q_QUALITYDOCUMENTBEAN);

                                                $q_IMPORTAUTOCOUNTER    = mysqli_query($con_nowprd, "SELECT * FROM importautocounter");
                                                $row_IMPORTAUTOCOUNTER  = mysqli_fetch_assoc($q_IMPORTAUTOCOUNTER);

                                                $next_number_IMPORTAUTOCOUNTER_HEADER  = $row_IMPORTAUTOCOUNTER['nomor_urut'] + 1;

                                                $date = date('Y-m-d');
                                                $IMPCREATIONDATETIME = date('Y-m-d H:i:s');
                                                $q_QUALITYDOCUMENTBEAN_HEADER      = db2_exec($conn1, "INSERT INTO QUALITYDOCUMENTBEAN(IMPORTAUTOCOUNTER,
                                                                                                                                        COMPANYCODE,
                                                                                                                                        DETAILREQUIRED,
                                                                                                                                        HEADERCODE,
                                                                                                                                        HEADERSUBGROUPCODE,
                                                                                                                                        HEADERNUMBERID,
                                                                                                                                        HEADERLINE,
                                                                                                                                        HEADERDATE,
                                                                                                                                        ITEMTYPEAFICODE,
                                                                                                                                        SUBCODE01,
                                                                                                                                        SUBCODE02,
                                                                                                                                        SUBCODE03,
                                                                                                                                        SUBCODE04,
                                                                                                                                        SUBCODE05,
                                                                                                                                        SUBCODE06,
                                                                                                                                        SUBCODE07,
                                                                                                                                        SUBCODE08,
                                                                                                                                        SUBCODE09,
                                                                                                                                        SUBCODE10,
                                                                                                                                        LOTCODE,
                                                                                                                                        ITEMELEMENTSUBCODEKEY,
                                                                                                                                        ITEMELEMENTCODE,
                                                                                                                                        DEMANDCOUNTERCODE,
                                                                                                                                        DEMANDCODE,
                                                                                                                                        PRODUCTIONORDERCODE,
                                                                                                                                        ORDERPARTNERREQUIRED,
                                                                                                                                        ORDPRNCUSTOMERSUPPLIERCODE,
                                                                                                                                        WORKCENTERCODE,
                                                                                                                                        OPERATIONCODE,
                                                                                                                                        STATUS,
                                                                                                                                        NOTEINTERNE,
                                                                                                                                        SAMPLE,
                                                                                                                                        SAMPLEINSTRUCTIONCODE,
                                                                                                                                        SAMPLELENGTH,
                                                                                                                                        SAMPLENUMBER,
                                                                                                                                        TESTSTATUS,
                                                                                                                                        PROGRESSSTATUS,
                                                                                                                                        QUALITYREASONCODE,
                                                                                                                                        EXPORTEDTOPDM,
                                                                                                                                        FULLITEMIDENTIFIER,
                                                                                                                                        WSOPERATION,
                                                                                                                                        IMPOPERATIONUSER,
                                                                                                                                        IMPORTSTATUS,
                                                                                                                                        IMPCREATIONDATETIME,
                                                                                                                                        IMPCREATIONUSER,
                                                                                                                                        IMPLASTUPDATEDATETIME,
                                                                                                                                        IMPLASTUPDATEUSER,
                                                                                                                                        IMPORTDATETIME,
                                                                                                                                        RETRYNR,
                                                                                                                                        NEXTRETRY,
                                                                                                                                        IMPORTID,
                                                                                                                                        RELATEDDEPENDENTID) 
                                                                                                                                VALUES('$next_number_IMPORTAUTOCOUNTER_HEADER',
                                                                                                                                        '100',
                                                                                                                                        '5 ',
                                                                                                                                        'FAB01               ',
                                                                                                                                        'CAMS ',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[HEADERNUMBERID]',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[HEADERLINE]',
                                                                                                                                        '$date',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[ITEMTYPEAFICODE]',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[SUBCODE01]',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[SUBCODE02]',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[SUBCODE03]',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[SUBCODE04]',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[SUBCODE05]',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[SUBCODE06]',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[SUBCODE07]',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[SUBCODE08]',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[SUBCODE09]',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[SUBCODE10]',
                                                                                                                                        ' ',
                                                                                                                                        ' ',
                                                                                                                                        ' ',
                                                                                                                                        ' ',
                                                                                                                                        ' ',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[PRODUCTIONORDERCODE]',
                                                                                                                                        '0',
                                                                                                                                        ' ',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[WORKCENTERCODE]',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[OPERATIONCODE]',
                                                                                                                                        '1',
                                                                                                                                        ' ',
                                                                                                                                        '0',
                                                                                                                                        ' ',
                                                                                                                                        '0',
                                                                                                                                        ' ',
                                                                                                                                        '0',
                                                                                                                                        '0',
                                                                                                                                        ' ',
                                                                                                                                        '0',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[FULLITEMIDENTIFIER]',
                                                                                                                                        '5',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[LASTUPDATEUSER]',
                                                                                                                                        '0',
                                                                                                                                        '$IMPCREATIONDATETIME',
                                                                                                                                        '$row_QUALITYDOCUMENTBEAN[LASTUPDATEUSER]',
                                                                                                                                        '$IMPCREATIONDATETIME',
                                                                                                                                        'system',
                                                                                                                                        '$IMPCREATIONDATETIME',
                                                                                                                                        '0',
                                                                                                                                        '0',
                                                                                                                                        '0',
                                                                                                                                        '$next_number_IMPORTAUTOCOUNTER_HEADER')");
                                                // proses transfer ke NOW QUALITYDOCLINEBEAN
                                                // WHITENESS
                                                $qty_whiteness  = $column2;
                                                $IMPCREATIONDATETIME = date('Y-m-d H:i:s');
                                                $q_IMPORTAUTOCOUNTER_WHITENESS    = mysqli_query($con_nowprd, "SELECT * FROM no_urut_spectro");
                                                $row_IMPORTAUTOCOUNTER_WHITENESS  = mysqli_fetch_assoc($q_IMPORTAUTOCOUNTER_WHITENESS);

                                                $next_number_IMPORTAUTOCOUNTER_WHITENESS  = $row_IMPORTAUTOCOUNTER_WHITENESS['nourut'] + 10;

                                                $q_QUALITYDOCUMENTBEAN_WHITENESS        = db2_exec($conn1, "INSERT INTO QUALITYDOCLINEBEAN(FATHERID,
                                                                                                                                    IMPORTAUTOCOUNTER,
                                                                                                                                    LINE,
                                                                                                                                    SEQUENCE,
                                                                                                                                    TESTLINESTATUS,
                                                                                                                                    CANCELED,
                                                                                                                                    CHARACTERISTICCODE,
                                                                                                                                    UOMCODE,
                                                                                                                                    INTERNALSPECIFICATIONCODE,
                                                                                                                                    ISOSPECIFICATIONCODE,
                                                                                                                                    SUBCODESTANDARD,
                                                                                                                                    VALUEBOOLEAN,
                                                                                                                                    VALUESTRING,
                                                                                                                                    VALUEQUANTITY,
                                                                                                                                    VALUEQUANTITY2,
                                                                                                                                    VALUEQUANTITY3,
                                                                                                                                    STATUS,
                                                                                                                                    VALUEGROUPCODE,
                                                                                                                                    REPETITIONNUMBER,
                                                                                                                                    REPETITIONPERFORMED,
                                                                                                                                    ANNOTATION,
                                                                                                                                    ADDITIONALLINE,
                                                                                                                                    DATATYPE,
                                                                                                                                    WSOPERATION,
                                                                                                                                    IMPOPERATIONUSER,
                                                                                                                                    IMPORTSTATUS,
                                                                                                                                    IMPCREATIONDATETIME,
                                                                                                                                    IMPCREATIONUSER,
                                                                                                                                    IMPLASTUPDATEDATETIME,
                                                                                                                                    IMPLASTUPDATEUSER,
                                                                                                                                    IMPORTDATETIME,
                                                                                                                                    RETRYNR,
                                                                                                                                    NEXTRETRY,
                                                                                                                                    IMPORTID,
                                                                                                                                    RELATEDDEPENDENTID,
                                                                                                                                    FORCEEMPTYVALUE,
                                                                                                                                    ISFROMAUTOCREATE)
                                                                                                                            VALUES('$next_number_IMPORTAUTOCOUNTER_HEADER',
                                                                                                                                    '$next_number_IMPORTAUTOCOUNTER_WHITENESS',
                                                                                                                                    '11',
                                                                                                                                    '0',
                                                                                                                                    '0',
                                                                                                                                    '0',
                                                                                                                                    'WHITENESS ',
                                                                                                                                    ' ',
                                                                                                                                    ' ',
                                                                                                                                    ' ',
                                                                                                                                    ' ',
                                                                                                                                    '0',
                                                                                                                                    ' ',
                                                                                                                                    '$qty_whiteness',
                                                                                                                                    '0',
                                                                                                                                    '0',
                                                                                                                                    '0',
                                                                                                                                    ' ',
                                                                                                                                    '0',
                                                                                                                                    '0',
                                                                                                                                    NULL,
                                                                                                                                    '0',
                                                                                                                                    '1',
                                                                                                                                    '5',
                                                                                                                                    ' ',
                                                                                                                                    '0',
                                                                                                                                    '$IMPCREATIONDATETIME',
                                                                                                                                    '$row_QUALITYDOCUMENTBEAN[LASTUPDATEUSER]',
                                                                                                                                    '$IMPCREATIONDATETIME',
                                                                                                                                    'system',
                                                                                                                                    '$IMPCREATIONDATETIME',
                                                                                                                                    '0',
                                                                                                                                    '0',
                                                                                                                                    '0',
                                                                                                                                    '$next_number_IMPORTAUTOCOUNTER_WHITENESS',
                                                                                                                                    '0',
                                                                                                                                    '0')");
                                                $q_update_IMPORTAUTOCOUNTER_WHITENESS   = mysqli_query($con_nowprd, "UPDATE no_urut_spectro SET nourut = '$next_number_IMPORTAUTOCOUNTER_WHITENESS'");

                                                // TINT
                                                $qty_tint  = $column3;
                                                $IMPCREATIONDATETIME = date('Y-m-d H:i:s');
                                                $q_IMPORTAUTOCOUNTER_TINT    = mysqli_query($con_nowprd, "SELECT * FROM no_urut_spectro");
                                                $row_IMPORTAUTOCOUNTER_TINT  = mysqli_fetch_assoc($q_IMPORTAUTOCOUNTER_TINT);

                                                $next_number_IMPORTAUTOCOUNTER_TINT  = $row_IMPORTAUTOCOUNTER_TINT['nourut'] + 10;

                                                $q_QUALITYDOCUMENTBEAN_TINT         = db2_exec($conn1, "INSERT INTO QUALITYDOCLINEBEAN(FATHERID,
                                                                                                                                            IMPORTAUTOCOUNTER,
                                                                                                                                            LINE,
                                                                                                                                            SEQUENCE,
                                                                                                                                            TESTLINESTATUS,
                                                                                                                                            CANCELED,
                                                                                                                                            CHARACTERISTICCODE,
                                                                                                                                            UOMCODE,
                                                                                                                                            INTERNALSPECIFICATIONCODE,
                                                                                                                                            ISOSPECIFICATIONCODE,
                                                                                                                                            SUBCODESTANDARD,
                                                                                                                                            VALUEBOOLEAN,
                                                                                                                                            VALUESTRING,
                                                                                                                                            VALUEQUANTITY,
                                                                                                                                            VALUEQUANTITY2,
                                                                                                                                            VALUEQUANTITY3,
                                                                                                                                            STATUS,
                                                                                                                                            VALUEGROUPCODE,
                                                                                                                                            REPETITIONNUMBER,
                                                                                                                                            REPETITIONPERFORMED,
                                                                                                                                            ANNOTATION,
                                                                                                                                            ADDITIONALLINE,
                                                                                                                                            DATATYPE,
                                                                                                                                            WSOPERATION,
                                                                                                                                            IMPOPERATIONUSER,
                                                                                                                                            IMPORTSTATUS,
                                                                                                                                            IMPCREATIONDATETIME,
                                                                                                                                            IMPCREATIONUSER,
                                                                                                                                            IMPLASTUPDATEDATETIME,
                                                                                                                                            IMPLASTUPDATEUSER,
                                                                                                                                            IMPORTDATETIME,
                                                                                                                                            RETRYNR,
                                                                                                                                            NEXTRETRY,
                                                                                                                                            IMPORTID,
                                                                                                                                            RELATEDDEPENDENTID,
                                                                                                                                            FORCEEMPTYVALUE,
                                                                                                                                            ISFROMAUTOCREATE)
                                                                                                                                    VALUES('$next_number_IMPORTAUTOCOUNTER_HEADER',
                                                                                                                                            '$next_number_IMPORTAUTOCOUNTER_TINT',
                                                                                                                                            '13',
                                                                                                                                            '0',
                                                                                                                                            '0',
                                                                                                                                            '0',
                                                                                                                                            'TINT ',
                                                                                                                                            ' ',
                                                                                                                                            ' ',
                                                                                                                                            ' ',
                                                                                                                                            ' ',
                                                                                                                                            '0',
                                                                                                                                            ' ',
                                                                                                                                            '$qty_tint',
                                                                                                                                            '0',
                                                                                                                                            '0',
                                                                                                                                            '0',
                                                                                                                                            ' ',
                                                                                                                                            '0',
                                                                                                                                            '0',
                                                                                                                                            NULL,
                                                                                                                                            '0',
                                                                                                                                            '1',
                                                                                                                                            '5',
                                                                                                                                            ' ',
                                                                                                                                            '0',
                                                                                                                                            '$IMPCREATIONDATETIME',
                                                                                                                                            '$row_QUALITYDOCUMENTBEAN[LASTUPDATEUSER]',
                                                                                                                                            '$IMPCREATIONDATETIME',
                                                                                                                                            'system',
                                                                                                                                            '$IMPCREATIONDATETIME',
                                                                                                                                            '0',
                                                                                                                                            '0',
                                                                                                                                            '0',
                                                                                                                                            '$next_number_IMPORTAUTOCOUNTER_TINT',
                                                                                                                                            '0',
                                                                                                                                            '0')");
                                                $q_update_IMPORTAUTOCOUNTER_TINT    = mysqli_query($con_nowprd, "UPDATE no_urut_spectro SET nourut = '$next_number_IMPORTAUTOCOUNTER_TINT'");

                                                $q_update_IMPORTAUTOCOUNTER_HEADER      = mysqli_query($con_nowprd, "UPDATE importautocounter SET nomor_urut = '$next_number_IMPORTAUTOCOUNTER_HEADER'");

                                                // YELLOWNESS
                                                $qty_yellowness  = $column4;
                                                $IMPCREATIONDATETIME = date('Y-m-d H:i:s');
                                                $q_IMPORTAUTOCOUNTER_YELLOWNESS    = mysqli_query($con_nowprd, "SELECT * FROM no_urut_spectro");
                                                $row_IMPORTAUTOCOUNTER_YELLOWNESS  = mysqli_fetch_assoc($q_IMPORTAUTOCOUNTER_YELLOWNESS);

                                                $next_number_IMPORTAUTOCOUNTER_YELLOWNESS  = $row_IMPORTAUTOCOUNTER_YELLOWNESS['nourut'] + 10;

                                                $q_QUALITYDOCUMENTBEAN_YELLOWNESS       = db2_exec($conn1, "INSERT INTO QUALITYDOCLINEBEAN(FATHERID,
                                                                                                                                            IMPORTAUTOCOUNTER,
                                                                                                                                            LINE,
                                                                                                                                            SEQUENCE,
                                                                                                                                            TESTLINESTATUS,
                                                                                                                                            CANCELED,
                                                                                                                                            CHARACTERISTICCODE,
                                                                                                                                            UOMCODE,
                                                                                                                                            INTERNALSPECIFICATIONCODE,
                                                                                                                                            ISOSPECIFICATIONCODE,
                                                                                                                                            SUBCODESTANDARD,
                                                                                                                                            VALUEBOOLEAN,
                                                                                                                                            VALUESTRING,
                                                                                                                                            VALUEQUANTITY,
                                                                                                                                            VALUEQUANTITY2,
                                                                                                                                            VALUEQUANTITY3,
                                                                                                                                            STATUS,
                                                                                                                                            VALUEGROUPCODE,
                                                                                                                                            REPETITIONNUMBER,
                                                                                                                                            REPETITIONPERFORMED,
                                                                                                                                            ANNOTATION,
                                                                                                                                            ADDITIONALLINE,
                                                                                                                                            DATATYPE,
                                                                                                                                            WSOPERATION,
                                                                                                                                            IMPOPERATIONUSER,
                                                                                                                                            IMPORTSTATUS,
                                                                                                                                            IMPCREATIONDATETIME,
                                                                                                                                            IMPCREATIONUSER,
                                                                                                                                            IMPLASTUPDATEDATETIME,
                                                                                                                                            IMPLASTUPDATEUSER,
                                                                                                                                            IMPORTDATETIME,
                                                                                                                                            RETRYNR,
                                                                                                                                            NEXTRETRY,
                                                                                                                                            IMPORTID,
                                                                                                                                            RELATEDDEPENDENTID,
                                                                                                                                            FORCEEMPTYVALUE,
                                                                                                                                            ISFROMAUTOCREATE)
                                                                                                                                    VALUES('$next_number_IMPORTAUTOCOUNTER_HEADER',
                                                                                                                                            '$next_number_IMPORTAUTOCOUNTER_YELLOWNESS',
                                                                                                                                            '12',
                                                                                                                                            '0',
                                                                                                                                            '0',
                                                                                                                                            '0',
                                                                                                                                            'YELLOWNESS',
                                                                                                                                            ' ',
                                                                                                                                            ' ',
                                                                                                                                            ' ',
                                                                                                                                            ' ',
                                                                                                                                            '0',
                                                                                                                                            ' ',
                                                                                                                                            '$qty_yellowness',
                                                                                                                                            '0',
                                                                                                                                            '0',
                                                                                                                                            '0',
                                                                                                                                            ' ',
                                                                                                                                            '0',
                                                                                                                                            '0',
                                                                                                                                            NULL,
                                                                                                                                            '0',
                                                                                                                                            '1',
                                                                                                                                            '5',
                                                                                                                                            ' ',
                                                                                                                                            '0',
                                                                                                                                            '$IMPCREATIONDATETIME',
                                                                                                                                            '$row_QUALITYDOCUMENTBEAN[LASTUPDATEUSER]',
                                                                                                                                            '$IMPCREATIONDATETIME',
                                                                                                                                            'system',
                                                                                                                                            '$IMPCREATIONDATETIME',
                                                                                                                                            '0',
                                                                                                                                            '0',
                                                                                                                                            '0',
                                                                                                                                            '$next_number_IMPORTAUTOCOUNTER_YELLOWNESS',
                                                                                                                                            '0',
                                                                                                                                            '0')");
                                                $q_update_IMPORTAUTOCOUNTER_YELLOWNESS  = mysqli_query($con_nowprd, "UPDATE no_urut_spectro SET nourut = '$next_number_IMPORTAUTOCOUNTER_YELLOWNESS'");

                                                // jika berhasil terkirim maka status nya berhasil, kalau gagal ya gagal lah 
                                                if ($q_QUALITYDOCUMENTBEAN_HEADER) {
                                                    $statusheader = "Berhasil";
                                                } else {
                                                    $statusheader = "Gagal";
                                                }

                                                if ($q_QUALITYDOCUMENTBEAN_WHITENESS) {
                                                    $statusw = "Berhasil";
                                                } else {
                                                    $statusw = "Gagal";
                                                }

                                                if ($q_QUALITYDOCUMENTBEAN_TINT) {
                                                    $statust = "Berhasil";
                                                } else {
                                                    $statust = "Gagal";
                                                }

                                                if ($q_QUALITYDOCUMENTBEAN_YELLOWNESS) {
                                                    $statusy = "Berhasil";
                                                } else {
                                                    $statusy = "Gagal";
                                                }

                                                $sql = "INSERT INTO upload_spectro (batch_name,whiteness,tint,yellowness,creationdate,ipaddress,statusheader,statuswhiteness,statustint,statusyellowness) VALUES ('$column1', '$column2', '$column3', '$column4', '$column5','$column6','$statusheader','$statusw','$statust','$statusy')";
                                                $con_nowprd->query($sql);
                                            }
                                        }
                                        $con_nowprd->close();
                                        echo "<script type=\"text/javascript\">
                                                    window.location = \"spectro_upload.php\"
                                                    alert(\"CSV File berhasil terkirim ke NOW\");
                                                </script>";
                                    } else {
                                        echo "<script type=\"text/javascript\">
                                                    alert(\"CSV File gagal terkirim ke NOW\");
                                                    window.location = \"spectro_upload.php\"
                                                </script>";
                                    }
                                    ?>
                                <?php elseif (isset($_POST['delete_data'])) : ?>
                                    <?php
                                        $nokk       = sprintf("%08d", $_POST['batch_name']);
                                        $strip      = substr($_POST['batch_name'], -3, 1);

                                        if ($strip != "-") {
                                            $stepnumber = substr($_POST['batch_name'], -3);
                                        } else {
                                            $stepnumber = substr($_POST['batch_name'], -2);
                                        }

                                        $q_caridata     = mysqli_query($con_nowprd, "SELECT * FROM upload_spectro WHERE batch_name='$_POST[batch_name]'");
                                        $row_data       = mysqli_fetch_assoc($q_caridata);

                                        if($row_data['batch_name']){
                                            // CARI HEADLINENYA DULU DI QUALITYDOCUMENT
                                            $q_qualitydoc       = db2_exec($conn1, "SELECT
                                                                                        TRIM(q.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE,
                                                                                        q.HEADERLINE
                                                                                    FROM
                                                                                        QUALITYDOCUMENT q  
                                                                                    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = q.ABSUNIQUEID AND a.FIELDNAME = 'GroupStepNumber'
                                                                                    WHERE
                                                                                        q.PRODUCTIONORDERCODE = '$nokk'
                                                                                        AND a.VALUEINT = '$stepnumber'");
                                            $data_qualitydoc    = db2_fetch_assoc($q_qualitydoc);

                                            if($data_qualitydoc['HEADERLINE']){
                                                $q_line         = db2_exec($conn1, "DELETE
                                                                                    FROM
                                                                                        QUALITYDOCLINE q
                                                                                    WHERE
                                                                                        QUALITYDOCPRODUCTIONORDERCODE = '$nokk'
                                                                                        AND QUALITYDOCUMENTHEADERLINE = '$data_qualitydoc[HEADERLINE]'
                                                                                        AND LINE IN ('11', '12', '13')
                                                                                        AND TRIM(CHARACTERISTICCODE) IN ('WHITENESS', 'TINT', 'YELLOWNESS')");
                                                $update_statusspectro = mysqli_query($con_nowprd, "UPDATE upload_spectro
                                                                                                    SET `status` = 'Deleted'
                                                                                                    WHERE batch_name='$_POST[batch_name]'");
                                                echo "<script type=\"text/javascript\">
                                                            alert(\"Your data was successfully deleted.\");
                                                            window.location = \"spectro_upload.php\"
                                                        </script>";
                                            }else{
                                                if(!is_numeric($stepnumber)){
                                                    $q_line                 = db2_exec($conn1, "DELETE
                                                                                    FROM
                                                                                        QUALITYDOCLINE q
                                                                                    WHERE
                                                                                        QUALITYDOCPRODUCTIONORDERCODE = '$nokk'
                                                                                        AND LINE IN ('11', '12', '13')
                                                                                        AND TRIM(CHARACTERISTICCODE) IN ('WHITENESS', 'TINT', 'YELLOWNESS')");
                                                    $update_statusspectro   = mysqli_query($con_nowprd, "UPDATE upload_spectro
                                                                                                        SET `status` = 'Deleted'
                                                                                                        WHERE batch_name='$_POST[batch_name]'");
                                                    echo "<script type=\"text/javascript\">
                                                                alert(\"Your data was successfully deleted, but not database ERP.\");
                                                                window.location = \"spectro_upload.php\"
                                                            </script>";
                                                }else{
                                                    echo "<script type=\"text/javascript\">
                                                            alert(\"Your data not successfully deleted.\");
                                                            window.location = \"spectro_upload.php\"
                                                        </script>";
                                                }
                                            }
                                        }
                                    ?>
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