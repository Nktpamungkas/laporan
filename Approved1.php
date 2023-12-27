<?php
    require_once "koneksi.php";
    $cek_approved1      = db2_exec($conn1, "SELECT
                                                u.LONGDESCRIPTION 
                                            FROM
                                                ADSTORAGE a 
                                            LEFT JOIN USERGENERICGROUP u ON u.CODE = a.VALUESTRING AND USERGENERICGROUPTYPECODE = 'DIT'
                                            WHERE
                                                a.UNIQUEID = '$_GET[UNIQUEID]'
                                                AND a.FIELDNAME = 'ApprovalDeptDITCode'");
    $row_approved1      = db2_fetch_assoc($cek_approved1);

    if(isset($_POST['submit'])){ 
        $tgl_sekarang   = date('Y-m-d H:i:s');
        $name           = $_POST['nama'];
        $update_approved1   = db2_exec($conn1, "INSERT INTO ADSTORAGE (UNIQUEID,
                                                                        NAMEENTITYNAME,
                                                                        NAMENAME,
                                                                        FIELDNAME,
                                                                        KEYSEQUENCE,
                                                                        SHARED,
                                                                        DATATYPE,
                                                                        VALUESTRING,
                                                                        VALUEINT,
                                                                        VALUEBOOLEAN,
                                                                        VALUEDATE,
                                                                        VALUEDECIMAL,
                                                                        VALUELONG,
                                                                        VALUETIME,
                                                                        VALUETIMESTAMP,
                                                                        ABSUNIQUEID)
                                                    VALUES ('$_GET[UNIQUEID]', 
                                                            'PMBreakDownEntry',
                                                            'ApprovalDeptDIT',
                                                            'ApprovalDeptDITCode',
                                                            '0',
                                                            '0',
                                                            '3',
                                                            '$name',
                                                            '0',
                                                            '0',
                                                            '$tgl_sekarang',
                                                            NULL,
                                                            '0',
                                                            NULL,
                                                            NULL,
                                                            0)");
            header("Location: Approved1.php?UNIQUEID=$_GET[UNIQUEID]");

    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Automatically Approved</title>
        <style type="text/css">
            @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
                body[yahoo] .buttonwrapper { background-color: transparent !important; }
                body[yahoo] .button { padding: 0 !important; }
                body[yahoo] .button a { background-color: #9b59b6; padding: 15px 25px !important; }
            }

            @media only screen and (min-device-width: 601px) {
                .content { width: 600px !important; }
                .col387 { width: 387px !important; }
            }
            body{
                font-family:sans-serif;
                font-size:25px;
            }
            .btn-link{
                border:none;
                outline:none;
                background:none;
                cursor:pointer;
                /* color:#0000EE; */
                padding:0;
                /* text-decoration:underline; */
                font-family:inherit;
                font-size:inherit;
                font-weight:bold;
                color: #ffffff; 
                text-align: center; 
                text-decoration: none;
            }
                .btn-link:active{
                color:#FF0000;
            }
        </style>
    </head>
    <body bgcolor="#34495E" style="margin: 0; padding: 0;" yahoo="fix">
        <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; max-width: 600px;" class="content">
            <tr>
                <td style="padding: 15px 10px 15px 10px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="center" style="color: #fff; font-family: Arial, sans-serif; font-size: 12px;">
                                Email not displaying correctly?  <a href="#" style="color:#0073AA;">View it in your browser</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#0073AA " style="padding: 20px 20px 20px 20px; color: #ffffff; font-family: Arial, sans-serif; font-size: 36px; font-weight: bold;">
                    <img src="img\proui_logo.png" alt="ProUI Logo" width="152" height="152" style="display:block;">
                </td>
            </tr>
            <?php if(empty($row_approved1['LONGDESCRIPTION'])){ ?>
                <tr>
                    <td align="center" bgcolor="#ffffff" style="padding: 75px 20px 40px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 20px; line-height: 30px; border-bottom: 1px solid #f6f6f6;">
                        <b>Just one more step...</b><br>
                        Select your account and click the big button below to approved your account.
                    </td>
                </tr>
                <tr>
                    <td align="center" bgcolor="#f9f9f9" style="padding: 30px 20px 30px 20px; font-family: Arial, sans-serif;">
                        <table bgcolor="#0073AA" border="0" cellspacing="0" cellpadding="0" class="buttonwrapper">
                            <tr>
                                <form action="" method="post">
                                    <td align="center" height="50" style=" padding: 0 25px 0 25px; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;" class="button">
                                        <select class="form-control" name="nama" required>
                                            <option value="" disabled selected>Select Your Name</option>
                                            <?php
                                                $q_user_DIT     = db2_exec($conn1, "SELECT TRIM(CODE) AS CODE, TRIM(LONGDESCRIPTION) AS LONGDESCRIPTION FROM USERGENERICGROUP WHERE CODE = 'DIT1' OR CODE = 'DIT2'");
                                            ?>
                                            <?php while ($row_user_DIT = db2_fetch_assoc($q_user_DIT)) { ?>
                                                <option value="<?= $row_user_DIT['CODE'] ?>"><?= $row_user_DIT['LONGDESCRIPTION'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td align="center" height="50" style=" padding: 0 25px 0 25px; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;" class="button">
                                        <button type="submit" name="submit" class="btn-link"> Approved Form</button>
                                    </td>
                                </form>
                            </tr>
                        </table>
                    </td>
                </tr>
            <?php } else { ?>
                <tr>
                    <td align="center" bgcolor="#ffffff" style="padding: 75px 20px 40px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 20px; line-height: 30px; border-bottom: 1px solid #f6f6f6;">
                        <b>Approved..</b><br>
                        <?= $row_approved1['LONGDESCRIPTION']; ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td align="center" bgcolor="#dddddd" style="padding: 15px 10px 15px 10px; color: #555555; font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;">
                    <b>PT. Indo Taichen Textile Industri.</b><br>IT Programmer. &bull; 2023 
                </td>
            </tr>
            <tr>
                <td style="padding: 15px 10px 15px 10px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="center" width="100%" style="color: #fff; font-family: Arial, sans-serif; font-size: 12px;">
                                2023-24 &copy; <a href="#" style="color: #0073AA;">Nilo Pamungkas</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>