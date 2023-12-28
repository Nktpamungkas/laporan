<?php
    //ini wajib dipanggil paling atas
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    header("refresh: 5");

    if($_SERVER['REMOTE_ADDR'] == '10.0.5.178' OR $_SERVER['REMOTE_ADDR'] == '10.0.5.132'){
        //ini sesuaikan foldernya ke file 3 ini
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = 'mail.indotaichen.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'dept.it@indotaichen.com';
        $mail->Password   = 'Xr7PzUWoyPA';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // START 1. MTC
            require_once "koneksi.php"; 
            $q_opentiket_mtc    = db2_exec($conn1, "SELECT 
                                                        VARCHAR_FORMAT(IDENTIFIEDDATE, 'YYYY-MM-DD hh:ii:ss') AS IDENTIFIEDDATE,
                                                        TRIM(p.CODE) AS CODE,
                                                        p.SYMPTOM AS GEJALA,
                                                        TRIM(p.CREATIONUSER) AS CREATIONUSER,
                                                        TRIM(d.LONGDESCRIPTION) AS DEPT,
                                                        TRIM(p2.CODE) AS KODE_MESIN,
                                                        TRIM(p2.LONGDESCRIPTION) AS NAMA_MESIN,
                                                        TRIM(p2.GENERICDATA1) || ' ' || TRIM(p2.GENERICDATA2) || ' ' || TRIM(p2.GENERICDATA3) || ' ' || TRIM(p2.GENERICDATA4) AS DESC_MESIN 
                                                    FROM
                                                        PMBREAKDOWNENTRY p
                                                    LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE
                                                    LEFT JOIN PMBOM p2 ON p2.CODE = p.PMBOMCODE 
                                                    WHERE
                                                        (p.BREAKDOWNTYPE = '002'
                                                        OR p.BREAKDOWNTYPE = '003')
                                                        AND VARCHAR_FORMAT(IDENTIFIEDDATE, 'YYYY-MM-DD') = VARCHAR_FORMAT(CURRENT_DATE, 'YYYY-MM-DD')");
            $no = 1;
            while ($row_opentiket_mtc   = db2_fetch_assoc($q_opentiket_mtc)) {
                $q_cektiket     = mysqli_query($con_nowprd, "SELECT COUNT(*) AS jumlah 
                                                                    FROM email_auth 
                                                                    WHERE code = '$row_opentiket_mtc[CODE]' 
                                                                        AND `status` = '1. Email Terkirim ke MTC Mekanikal & Utility'");
                $row_cektiket   = mysqli_fetch_assoc($q_cektiket);

                if($row_cektiket['jumlah'] == '0'){            
                    // Menambahkan penerima
                    $q_email_support    = db2_exec($conn1, "SELECT
                                                                FULLNAME,
                                                                TRIM(a.SENDEREMAIL) AS EMAIL
                                                            FROM
                                                                ABSUSERDEF a
                                                            WHERE
                                                                (TRIM(a.CUSTOMCSS) = 'MTC') AND NOT a.SENDEREMAIL IS NULL");
                    while ($row_email_support   = db2_fetch_assoc($q_email_support)) {
                        $mail->AddAddress($row_email_support['EMAIL']);
                    }
                    $mail->setFrom('dept.it@indotaichen.com', 'Openticket MTC'); // Pengirim
                    $mail->addReplyTo('dept.it@indotaichen.com', 'Openticket MTC'); //jka emailnya dibalas otomatis balas ke email ini dan judulnya

                    $mail->isHTML(true);
                    $mail->Subject = 'Open Ticket NOW';
                    $mail->Body    = "<html>
                                        <head>
                                        </head>
                                        <body>
                                            <h2>Hi, MAINTENANCE</h2>
                                            silahkan <b>CREATE work order</b> untuk menugaskan ticket kepada team!<br>
                                            Nomor Ticket             : $row_opentiket_mtc[CODE] created <br><br>
                                            <pre>Tanggal Openticket  : $row_opentiket_mtc[IDENTIFIEDDATE]</pre> 
                                            <pre>Nomor Tag/Mesin     : $row_opentiket_mtc[KODE_MESIN]</pre> 
                                            <pre>Nama Mesin          : $row_opentiket_mtc[NAMA_MESIN]</pre> 
                                            <pre>Deskripsi Mesin     : $row_opentiket_mtc[DESC_MESIN]</pre> 
                                            <pre>From                : $row_opentiket_mtc[CREATIONUSER] </pre>
                                            <pre>Department          : $row_opentiket_mtc[DEPT]</pre> 
                                            <pre>Gejala              : $row_opentiket_mtc[GEJALA]</pre> 
                                        </body>
                                    </html>";
                    $mail->AltBody = '';
                    $kirim = $mail->send();
                    if($kirim){
                        // JIKA EMAIL BERHASIL TERKIRIM MAKA SIMPAN LOG ke MYSQLI
                        $q_simpan_log = mysqli_query($con_nowprd, "INSERT INTO email_auth (code, gejala, dept, `status`)
                                                                            VALUES ('$row_opentiket_mtc[CODE]',
                                                                                    '$row_opentiket_mtc[GEJALA]',
                                                                                    '$row_opentiket_mtc[DEPT]',
                                                                                    '1. Email Terkirim ke MTC Mekanikal & Utility');");
                        echo "Log saved";
                    }
                }
            }
        // END

        // START IT SUPPORT 
            // START 1. Email pertama kali openticket untuk pemberitahuan ke staff atau spv IT SUPPORT untuk membuatkan work order.
                require_once "koneksi.php"; 
                $q_opentiket_support    = db2_exec($conn1, "SELECT 
                                                                TRIM(p.CODE) AS CODE,
                                                                p.SYMPTOM AS GEJALA,
                                                                TRIM(p.CREATIONUSER) AS CREATIONUSER,
                                                                TRIM(d.LONGDESCRIPTION) AS DEPT,
                                                                TRIM(p2.CODE) AS KODE_MESIN,
                                                                TRIM(p2.LONGDESCRIPTION) AS NAMA_MESIN,
                                                                TRIM(p2.GENERICDATA1) || ' ' || TRIM(p2.GENERICDATA2) || ' ' || TRIM(p2.GENERICDATA3) || ' ' || TRIM(p2.GENERICDATA4) AS DESC_MESIN 
                                                            FROM
                                                                PMBREAKDOWNENTRY p
                                                            LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE
                                                            LEFT JOIN PMBOM p2 ON p2.CODE = p.PMBOMCODE 
                                                            WHERE
                                                                (p.BREAKDOWNTYPE = 'HD'
                                                                OR p.BREAKDOWNTYPE = 'NW'
                                                                OR p.BREAKDOWNTYPE = 'EM')");
                $no = 1;
                while ($row_opentiket_support   = db2_fetch_assoc($q_opentiket_support)) {
                    $q_cektiket     = mysqli_query($con_nowprd, "SELECT COUNT(*) AS jumlah 
                                                                        FROM email_auth 
                                                                        WHERE code = '$row_opentiket_support[CODE]' 
                                                                            AND `status` = '1. Email Terkirim ke Support'");
                    $row_cektiket   = mysqli_fetch_assoc($q_cektiket);

                    if($row_cektiket['jumlah'] == '0'){            
                        // Menambahkan penerima
                        $q_email_support    = db2_exec($conn1, "SELECT
                                                                    TRIM(a.SENDEREMAIL) AS EMAIL
                                                                FROM
                                                                    ABSUSERDEF a
                                                                WHERE
                                                                    (TRIM(a.CUSTOMCSS) = 'IT SUPPORT' OR TRIM(a.CUSTOMCSS) = 'ALL') AND NOT a.SENDEREMAIL IS NULL");
                        while ($row_email_support   = db2_fetch_assoc($q_email_support)) {
                            $mail->AddAddress($row_email_support['EMAIL']);
                        }
                        $mail->setFrom('dept.it@indotaichen.com', 'Openticket IT SUPPORT'); // Pengirim
                        $mail->addReplyTo('dept.it@indotaichen.com', 'Openticket IT SUPPORT'); //jka emailnya dibalas otomatis balas ke email ini dan judulnya

                        $mail->isHTML(true);
                        $mail->Subject = 'Open Ticket IT SUPPORT';
                        $mail->Body    = "<html>
                                            <head>
                                            </head>
                                            <body>
                                                <h2>Hi, IT SUPPORT</h2>
                                                silahkan <b>CREATE work order</b> untuk menugaskan ticket kepada team!<br>
                                                <pre>Nomor Ticket       : #<b>$row_opentiket_support[CODE]</b></pre>
                                                <pre>Nomor Tag/Mesin     : $row_opentiket_support[KODE_MESIN]</pre> 
                                                <pre>Nama Mesin          : $row_opentiket_support[NAMA_MESIN]</pre> 
                                                <pre>Deskripsi Mesin     : $row_opentiket_support[DESC_MESIN]</pre> 
                                                <pre>From                : $row_opentiket_support[CREATIONUSER] </pre>
                                                <pre>Department          : $row_opentiket_support[DEPT]</pre> 
                                                <pre>Gejala              : $row_opentiket_support[GEJALA]</pre> 
                                            </body>
                                        </html>";
                        $mail->AltBody = '';
                        $kirim = $mail->send();
                        if($kirim){
                            // JIKA EMAIL BERHASIL TERKIRIM MAKA SIMPAN LOG ke MYSQLI
                            $q_simpan_log = mysqli_query($con_nowprd, "INSERT INTO email_auth (code, gejala, dept, `status`)
                                                                                VALUES ('$row_opentiket_support[CODE]',
                                                                                        '$row_opentiket_support[GEJALA]',
                                                                                        '$row_opentiket_support[DEPT]',
                                                                                        '1. Email Terkirim ke Support');");
                            echo "Log saved";
                        }
                    }
                }
            // END

            // START 2. Email kedua setelah staff atau spv sudah membuat work order > email ke staff yang di tuju.
                require_once "koneksi.php"; 
                $q_opentiket_support_2    = db2_exec($conn1, "SELECT 
                                                                TRIM(p.CODE) AS CODE,
                                                                TRIM(p.CREATIONUSER) AS CREATIONUSER,
                                                                TRIM(p3.ASSIGNEDBYUSERID) AS TUGASDIBUAT_OLEH,
                                                                TRIM(p3.ASSIGNEDTOUSERID) AS DITUGASKAN_KPD,
                                                                p.SYMPTOM AS GEJALA,
                                                                TRIM(d.LONGDESCRIPTION) AS DEPT,
                                                                TRIM(p2.CODE) AS KODE_MESIN,
                                                                TRIM(p2.LONGDESCRIPTION) AS NAMA_MESIN,
                                                                TRIM(p2.GENERICDATA1) || ' ' || TRIM(p2.GENERICDATA2) || ' ' || TRIM(p2.GENERICDATA3) || ' ' || TRIM(p2.GENERICDATA4) AS DESC_MESIN,
                                                                TRIM(a.SENDEREMAIL) AS EMAIL
                                                            FROM
                                                                PMBREAKDOWNENTRY p
                                                            LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE
                                                            LEFT JOIN PMBOM p2 ON p2.CODE = p.PMBOMCODE 
                                                            RIGHT JOIN PMWORKORDER p3 ON p3.PMBREAKDOWNENTRYCODE = p.CODE AND NOT p3.ASSIGNEDTOUSERID IS NULL
                                                            LEFT JOIN ABSUSERDEF a ON a.USERID = p3.ASSIGNEDTOUSERID
                                                            WHERE
                                                                (p.BREAKDOWNTYPE = 'HD'
                                                                OR p.BREAKDOWNTYPE = 'NW'
                                                                OR p.BREAKDOWNTYPE = 'EM')
                                                                AND NOT a.SENDEREMAIL IS NULL");
                $no = 1;
                while ($row_opentiket_support_2   = db2_fetch_assoc($q_opentiket_support_2)) {
                    $q_cektiket     = mysqli_query($con_nowprd, "SELECT COUNT(*) AS jumlah 
                                                                            FROM email_auth 
                                                                            WHERE code = '$row_opentiket_support_2[CODE]' 
                                                                            AND `status` = '2. Email Terkirim ke Staff Support yang di tugaskan'");
                    $row_cektiket   = mysqli_fetch_assoc($q_cektiket);

                    if($row_cektiket['jumlah'] == '0'){            
                        // Menambahkan penerima
                        $mail->AddAddress($row_opentiket_support_2['EMAIL']);
                        $to = 'To '.$row_opentiket_support_2['DITUGASKAN_KPD'];
                        $mail->setFrom('dept.it@indotaichen.com', $to); // Pengirim
                        $mail->addReplyTo('dept.it@indotaichen.com', 'Openticket IT SUPPORT'); //jka emailnya dibalas otomatis balas ke email ini dan judulnya
                        $mail->isHTML(true);
                        $mail->Subject = 'Work Order IT SUPPORT';
                        $mail->Body    = "<html>
                                            <head>
                                            </head>
                                            <body>
                                                <h2>Hi, $row_opentiket_support_2[DITUGASKAN_KPD]</h2><br>
                                                <h4>$row_opentiket_support_2[TUGASDIBUAT_OLEH] telah memberikan tiket #$row_opentiket_support_2[CODE] kepada anda!</h4><br>
                                                <pre>Nomor Tag/Mesin     : $row_opentiket_support_2[KODE_MESIN]</pre> 
                                                <pre>Nama Mesin          : $row_opentiket_support_2[NAMA_MESIN]</pre> 
                                                <pre>Deskripsi Mesin     : $row_opentiket_support_2[DESC_MESIN]</pre> 
                                                <pre>From                : $row_opentiket_support_2[CREATIONUSER] </pre>
                                                <pre>Department          : $row_opentiket_support_2[DEPT]</pre> 
                                                <pre>Gejala              : $row_opentiket_support_2[GEJALA]</pre> 
                                            </body>
                                        </html>";
                        $mail->AltBody = '';
                        $kirim = $mail->send();
                        if($kirim){
                            // JIKA EMAIL BERHASIL TERKIRIM MAKA SIMPAN LOG ke MYSQLI
                            $q_simpan_log = mysqli_query($con_nowprd, "INSERT INTO email_auth (code, gejala, dept, `status`)
                                                                                VALUES ('$row_opentiket_support_2[CODE]',
                                                                                        '$row_opentiket_support_2[GEJALA]',
                                                                                        '$row_opentiket_support_2[DEPT]',
                                                                                        '2. Email Terkirim ke Staff Support yang di tugaskan');");
                            echo "Log saved";
                        }
                    }
                }
            // END 
        // END 

        // START IT PROGRAMMER 
            // IT PROGRAMMER 1. Email pemberitahuan ke pak yohanes & Pak bin untuk segera aprroved permohonan permintaan aplikasi.
            // syaratnya : Kepala dept user harus sudah approved.
                require_once "koneksi.php"; 

                $q_opentiket_head_programmer    = db2_exec($conn1, "SELECT 
                                                                    TRIM(p.CODE) AS CODE,
                                                                    p.SYMPTOM AS GEJALA,
                                                                    TRIM(p.CREATIONUSER) AS CREATIONUSER,
                                                                    TRIM(d.LONGDESCRIPTION) AS DEPT,
                                                                    TRIM(p2.CODE) AS KODE_MESIN,
                                                                    TRIM(p2.LONGDESCRIPTION) AS NAMA_MESIN,
                                                                    TRIM(p2.GENERICDATA1) || ' ' || TRIM(p2.GENERICDATA2) || ' ' || TRIM(p2.GENERICDATA3) || ' ' || TRIM(p2.GENERICDATA4) AS DESC_MESIN,
                                                                    u.LONGDESCRIPTION AS APPROVED_DEPT,
                                                                    a2.VALUEDATE AS TGL_APPROVED_DEPT,
                                                                    p.ABSUNIQUEID 
                                                                FROM
                                                                    PMBREAKDOWNENTRY p
                                                                LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE
                                                                LEFT JOIN PMBOM p2 ON p2.CODE = p.PMBOMCODE
                                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'ApprovalDeptUserCode' 
                                                                LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'TglApprvDeptUser'
                                                                LEFT JOIN USERGENERICGROUP u ON u.CODE = a.VALUESTRING AND USERGENERICGROUPTYPECODE = 'HED'
                                                                WHERE
                                                                    p.BREAKDOWNTYPE = 'SF'
                                                                    AND NOT u.LONGDESCRIPTION IS NULL 
                                                                    AND NOT a2.VALUEDATE IS NULL");
                $no = 1;
                while ($row_opentiket_head_programmer   = db2_fetch_assoc($q_opentiket_head_programmer)) {
                    $q_cektiket1     = mysqli_query($con_nowprd, "SELECT COUNT(*) AS jumlah 
                                                                    FROM email_auth 
                                                                    WHERE code = '$row_opentiket_head_programmer[CODE]'
                                                                    AND `status` = '1. Email Terkirim ke Manager dan Ast. Manager'");
                    $row_cektiket1   = mysqli_fetch_assoc($q_cektiket1);

                    if($row_cektiket1['jumlah'] == '0'){   
                        // Menambahkan penerima
                        $q_email_programmer1    = db2_exec($conn1, "SELECT
                                                                        TRIM(a.SENDEREMAIL) AS EMAIL
                                                                    FROM
                                                                        ABSUSERDEF a
                                                                    WHERE
                                                                        (TRIM(a.CUSTOMCSS) = 'ALL' OR TRIM(a.CUSTOMCSS) = 'Manager DIT' OR TRIM(a.CUSTOMCSS) = 'Ast. Manager DIT')
                                                                         AND NOT a.SENDEREMAIL IS NULL");
                        while ($row_email_programmer1   = db2_fetch_assoc($q_email_programmer1)) {
                            $mail->AddAddress($row_email_programmer1['EMAIL']);
                        }
                        $mail->setFrom('dept.it@indotaichen.com', 'Openticket Approved'); // Pengirim
                        $mail->addReplyTo('dept.it@indotaichen.com', 'Openticket Approved'); //jka emailnya dibalas otomatis balas ke email ini dan judulnya
                        $mail->isHTML(true);
                        $mail->Subject = 'Open Ticket Approved DIT';
                        $mail->Body    = "<html>
                                            <head>
                                            <style>
                                            </style>
                                            </head>
                                            <body>
                                                <h2>Hi, Manager & Ast. Manager DIT</h2>
                                                silahkan <a href='online.indotaichen.com/laporan/Approved1.php?UNIQUEID=$row_opentiket_head_programmer[ABSUNIQUEID]'>Klik disini</a>, untuk <b>Approved Permohonan Permintaan Aplikasi</b> untuk segera menugaskan ticket kepada team!<br>
                                                Note : Tanggal Aprrove otomatis menyesuaikan tanggal komputer.<br><br>
                                                <u>Detail Tiket</u><br>
                                                <pre>Nomor Ticket       : #<b>$row_opentiket_head_programmer[CODE]</b></pre>
                                                <pre>Kode online/now    : $row_opentiket_head_programmer[KODE_MESIN]</pre> 
                                                <pre>Link online/now    : $row_opentiket_head_programmer[NAMA_MESIN]</pre> 
                                                <pre>From               : $row_opentiket_head_programmer[CREATIONUSER] </pre>
                                                <pre>Department         : $row_opentiket_head_programmer[DEPT]</pre> 
                                                <pre>Gejala             : $row_opentiket_head_programmer[GEJALA]</pre>
                                            </body>
                                        </html>";
                        $mail->AltBody = '';
                        $kirim = $mail->send();
                        if($kirim){
                            // JIKA EMAIL BERHASIL TERKIRIM MAKA SIMPAN LOG ke MYSQLI
                            $q_simpan_log = mysqli_query($con_nowprd, "INSERT INTO email_auth (code, gejala, dept, `status`)
                                                                                VALUES ('$row_opentiket_head_programmer[CODE]',
                                                                                        '$row_opentiket_head_programmer[GEJALA]',
                                                                                        '$row_opentiket_head_programmer[DEPT]',
                                                                                        '1. Email Terkirim ke Manager dan Ast. Manager');");
                            echo "Log saved";
                            $mailer->clearAllRecipients();
                        }
                    }
                }
            // END
            
            // IT PROGRAMMER 2. Email pemberitahuan ke programmer untuk membuat work order.
            // syaratnya : work order DIBUAT (bisa dibuat sebelum kepala dept DIT belum approved, WAJIB kepala dept user harus sudah approved).
                // require_once "koneksi.php"; 

                $q_opentiket_programmer    = db2_exec($conn1, "SELECT 
                                                                    TRIM(p.CODE) AS CODE,
                                                                    p.SYMPTOM AS GEJALA,
                                                                    TRIM(p.CREATIONUSER) AS CREATIONUSER,
                                                                    TRIM(d.LONGDESCRIPTION) AS DEPT,
                                                                    TRIM(p2.CODE) AS KODE_MESIN,
                                                                    TRIM(p2.LONGDESCRIPTION) AS NAMA_MESIN,
                                                                    TRIM(p2.GENERICDATA1) || ' ' || TRIM(p2.GENERICDATA2) || ' ' || TRIM(p2.GENERICDATA3) || ' ' || TRIM(p2.GENERICDATA4) AS DESC_MESIN,
                                                                    u.LONGDESCRIPTION AS APPROVED_DEPT,
                                                                    a2.VALUEDATE AS TGL_APPROVED_DEPT,
                                                                    p.ABSUNIQUEID 
                                                                FROM
                                                                    PMBREAKDOWNENTRY p
                                                                LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE
                                                                LEFT JOIN PMBOM p2 ON p2.CODE = p.PMBOMCODE
                                                                LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'ApprovalDeptUserCode' 
                                                                LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p.ABSUNIQUEID AND a2.FIELDNAME = 'TglApprvDeptUser'
                                                                LEFT JOIN USERGENERICGROUP u ON u.CODE = a.VALUESTRING AND USERGENERICGROUPTYPECODE = 'HED'
                                                                WHERE
                                                                    p.BREAKDOWNTYPE = 'SF'
                                                                    AND NOT u.LONGDESCRIPTION IS NULL 
                                                                    AND NOT a2.VALUEDATE IS NULL");
                $no = 1;
                while ($row_opentiket_programmer   = db2_fetch_assoc($q_opentiket_programmer)) {
                    $q_cektiket2     = mysqli_query($con_nowprd, "SELECT COUNT(*) AS jumlah 
                                                                    FROM email_auth 
                                                                    WHERE code = '$row_opentiket_programmer[CODE]'
                                                                    AND `status` = '2. Email Terkirim ke IT PROGRAMMER'");
                    $row_cektiket2   = mysqli_fetch_assoc($q_cektiket2);

                    if($row_cektiket2['jumlah'] == '0'){   
                        // Menambahkan penerima
                        $q_email_programmer2    = db2_exec($conn1, "SELECT
                                                                        TRIM(a.SENDEREMAIL) AS EMAIL
                                                                    FROM
                                                                        ABSUSERDEF a
                                                                    WHERE
                                                                        (TRIM(a.CUSTOMCSS) = 'ALL' OR TRIM(a.CUSTOMCSS) = 'IT PROGRAMMER')
                                                                        AND NOT a.SENDEREMAIL IS NULL");
                        while ($row_email_programmer2   = db2_fetch_assoc($q_email_programmer2)) {
                            $mail->AddAddress($row_email_programmer2['EMAIL']);
                        }
                        $mail->setFrom('dept.it@indotaichen.com', 'Openticket IT PROGRAMMER'); // Pengirim
                        $mail->addReplyTo('dept.it@indotaichen.com', 'Openticket IT PROGRAMMER'); //jka emailnya dibalas otomatis balas ke email ini dan judulnya
                        $mail->isHTML(true);
                        $mail->Subject = 'Open Ticket Create Work Order';
                        $mail->Body    = "<html>
                                            <head>
                                            </head>
                                            <body>
                                                <h2>Hi, IT PROGRAMMER</h2>
                                                silahkan <b>CREATE work order</b> untuk menugaskan ticket kepada team!<br>
                                                <pre>Nomor Ticket       : #<b>$row_opentiket_programmer[CODE]</b></pre>
                                                <pre>Nomor Tag/Mesin     : $row_opentiket_programmer[KODE_MESIN]</pre> 
                                                <pre>Nama Mesin          : $row_opentiket_programmer[NAMA_MESIN]</pre> 
                                                <pre>Deskripsi Mesin     : $row_opentiket_programmer[DESC_MESIN]</pre> 
                                                <pre>From                : $row_opentiket_programmer[CREATIONUSER] </pre>
                                                <pre>Department          : $row_opentiket_programmer[DEPT]</pre> 
                                                <pre>Gejala              : $row_opentiket_programmer[GEJALA]</pre> 
                                            </body>
                                        </html>";
                        $mail->AltBody = '';
                        $kirim = $mail->send();
                        if($kirim){
                            // JIKA EMAIL BERHASIL TERKIRIM MAKA SIMPAN LOG ke MYSQLI
                            $q_simpan_log = mysqli_query($con_nowprd, "INSERT INTO email_auth (code, gejala, dept, `status`)
                                                                                VALUES ('$row_opentiket_programmer[CODE]',
                                                                                        '$row_opentiket_programmer[GEJALA]',
                                                                                        '$row_opentiket_programmer[DEPT]',
                                                                                        '2. Email Terkirim ke IT PROGRAMMER');");
                            echo "Log saved";
                            $mailer->clearAllRecipients();
                        }
                    }
                }
            // END

            // START 3. Email pemberitahuan kepada programmer yang di tugaskan.
                require_once "koneksi.php"; 
                $q_opentiket_programmer_3    = db2_exec($conn1, "SELECT 
                                                                TRIM(p.CODE) AS CODE,
                                                                TRIM(p.CREATIONUSER) AS CREATIONUSER,
                                                                TRIM(p3.ASSIGNEDBYUSERID) AS TUGASDIBUAT_OLEH,
                                                                TRIM(p3.ASSIGNEDTOUSERID) AS DITUGASKAN_KPD,
                                                                p.SYMPTOM AS GEJALA,
                                                                TRIM(d.LONGDESCRIPTION) AS DEPT,
                                                                TRIM(p2.CODE) AS KODE_MESIN,
                                                                TRIM(p2.LONGDESCRIPTION) AS NAMA_MESIN,
                                                                TRIM(p2.GENERICDATA1) || ' ' || TRIM(p2.GENERICDATA2) || ' ' || TRIM(p2.GENERICDATA3) || ' ' || TRIM(p2.GENERICDATA4) AS DESC_MESIN,
                                                                TRIM(a.SENDEREMAIL) AS EMAIL
                                                            FROM
                                                                PMBREAKDOWNENTRY p
                                                            LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE
                                                            LEFT JOIN PMBOM p2 ON p2.CODE = p.PMBOMCODE 
                                                            RIGHT JOIN PMWORKORDER p3 ON p3.PMBREAKDOWNENTRYCODE = p.CODE AND NOT p3.ASSIGNEDTOUSERID IS NULL
                                                            LEFT JOIN ABSUSERDEF a ON a.USERID = p3.ASSIGNEDTOUSERID
                                                            WHERE
                                                                (p.BREAKDOWNTYPE = 'SF')
                                                                AND NOT a.SENDEREMAIL IS NULL");
                $no = 1;
                while ($row_opentiket_programmer_3   = db2_fetch_assoc($q_opentiket_programmer_3)) {
                    $q_cektiket3     = mysqli_query($con_nowprd, "SELECT COUNT(*) AS jumlah 
                                                                            FROM email_auth 
                                                                            WHERE code = '$row_opentiket_programmer_3[CODE]' 
                                                                            AND `status` = '3. Email Terkirim ke Staff Programmer yang di tugaskan'");
                    $row_cektiket3   = mysqli_fetch_assoc($q_cektiket3);

                    if($row_cektiket3['jumlah'] == '0'){            
                        // Menambahkan penerima
                        $mail->AddAddress($row_opentiket_programmer_3['EMAIL']);
                        $to = 'To '.$row_opentiket_programmer_3['DITUGASKAN_KPD'];
                        $mail->setFrom('dept.it@indotaichen.com', $to); // Pengirim
                        $mail->addReplyTo('dept.it@indotaichen.com', 'Openticket IT SUPPORT'); //jka emailnya dibalas otomatis balas ke email ini dan judulnya
                        $mail->isHTML(true);
                        $mail->Subject = 'Work Order IT Programmer';
                        $mail->Body    = "<html>
                                            <head>
                                            </head>
                                            <body>
                                                <h2>Hi, $row_opentiket_programmer_3[DITUGASKAN_KPD]</h2><br>
                                                <h4>$row_opentiket_programmer_3[TUGASDIBUAT_OLEH] telah memberikan tiket #$row_opentiket_programmer_3[CODE] kepada anda!</h4><br>
                                                <pre>Nomor Tag/Mesin     : $row_opentiket_programmer_3[KODE_MESIN]</pre> 
                                                <pre>Nama Mesin          : $row_opentiket_programmer_3[NAMA_MESIN]</pre> 
                                                <pre>Deskripsi Mesin     : $row_opentiket_programmer_3[DESC_MESIN]</pre> 
                                                <pre>From                : $row_opentiket_programmer_3[CREATIONUSER] </pre>
                                                <pre>Department          : $row_opentiket_programmer_3[DEPT]</pre> 
                                                <pre>Gejala              : $row_opentiket_programmer_3[GEJALA]</pre> 
                                            </body>
                                        </html>";
                        $mail->AltBody = '';
                        $kirim = $mail->send();
                        if($kirim){
                            // JIKA EMAIL BERHASIL TERKIRIM MAKA SIMPAN LOG ke MYSQLI
                            $q_simpan_log = mysqli_query($con_nowprd, "INSERT INTO email_auth (code, gejala, dept, `status`)
                                                                                VALUES ('$row_opentiket_programmer_3[CODE]',
                                                                                        '$row_opentiket_programmer_3[GEJALA]',
                                                                                        '$row_opentiket_programmer_3[DEPT]',
                                                                                        '3. Email Terkirim ke Staff Programmer yang di tugaskan');");
                            echo "Log saved";
                            $mailer->clearAllRecipients();
                        }
                    }
                }
            // END

            // START 4. Email pemberitahuan ke pak yohanes / pak bintoro jika sudah selesai mengerjakan open tiketnya.
                require_once "koneksi.php"; 

                $q_opentiket_head_programmer_close    = db2_exec($conn1, "SELECT 
                                                                            TRIM(p.CODE) AS CODE,
                                                                            TRIM(p.CREATIONUSER) AS CREATIONUSER,
                                                                            TRIM(p3.ASSIGNEDBYUSERID) AS TUGASDIBUAT_OLEH,
                                                                            TRIM(p3.ASSIGNEDTOUSERID) AS DITUGASKAN_KPD,
                                                                            p.SYMPTOM AS GEJALA,
                                                                            p3.REMARKS AS KOMENTAR_PROGRAMMER,
                                                                            TRIM(d.LONGDESCRIPTION) AS DEPT,
                                                                            TRIM(p2.CODE) AS KODE_MESIN,
                                                                            TRIM(p2.LONGDESCRIPTION) AS NAMA_MESIN,
                                                                            TRIM(p2.GENERICDATA1) || ' ' || TRIM(p2.GENERICDATA2) || ' ' || TRIM(p2.GENERICDATA3) || ' ' || TRIM(p2.GENERICDATA4) AS DESC_MESIN,
                                                                            TRIM(a.SENDEREMAIL) AS EMAIL,
                                                                            p3.STATUS,
                                                                            p3.ABSUNIQUEID 
                                                                        FROM
                                                                            PMBREAKDOWNENTRY p
                                                                        LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE
                                                                        LEFT JOIN PMBOM p2 ON p2.CODE = p.PMBOMCODE 
                                                                        RIGHT JOIN PMWORKORDER p3 ON p3.PMBREAKDOWNENTRYCODE = p.CODE AND NOT p3.ASSIGNEDTOUSERID IS NULL
                                                                        LEFT JOIN ABSUSERDEF a ON a.USERID = p3.ASSIGNEDTOUSERID
                                                                        WHERE
                                                                            (p.BREAKDOWNTYPE = 'SF')
                                                                            AND NOT a.SENDEREMAIL IS NULL
                                                                            AND p3.STATUS = '3'");
                $no = 1;
                while ($row_opentiket_head_programmer_close   = db2_fetch_assoc($q_opentiket_head_programmer_close)) {
                    $q_cektiket4     = mysqli_query($con_nowprd, "SELECT COUNT(*) AS jumlah 
                                                                    FROM email_auth 
                                                                    WHERE code = '$row_opentiket_head_programmer_close[CODE]'
                                                                    AND `status` = '4. Email Terkirim ke Manager dan Ast. Manager Untuk Approved Closed'");
                    $row_cektiket4   = mysqli_fetch_assoc($q_cektiket4);

                    if($row_cektiket4['jumlah'] == '0'){   
                        // Menambahkan penerima
                        $q_email_programmer4    = db2_exec($conn1, "SELECT
                                                                        TRIM(a.SENDEREMAIL) AS EMAIL
                                                                    FROM
                                                                        ABSUSERDEF a
                                                                    WHERE
                                                                        (TRIM(a.CUSTOMCSS) = 'ALL' OR TRIM(a.CUSTOMCSS) = 'Manager DIT' OR TRIM(a.CUSTOMCSS) = 'Ast. Manager DIT')
                                                                        AND NOT a.SENDEREMAIL IS NULL");
                        while ($row_email_programmer4   = db2_fetch_assoc($q_email_programmer4)) {
                            $mail->AddAddress($row_email_programmer4['EMAIL']);
                        }
                        $mail->setFrom('dept.it@indotaichen.com', 'Openticket Approved Close'); // Pengirim
                        $mail->addReplyTo('dept.it@indotaichen.com', 'Openticket Approved Close'); //jka emailnya dibalas otomatis balas ke email ini dan judulnya
                        $mail->isHTML(true);
                        $mail->Subject = 'Open Ticket Approved DIT Close';
                        $mail->Body    = "<html>
                                            <head>
                                            <style>
                                            </style>
                                            </head>
                                            <body>
                                                <h2>Hi, Manager & Ast. Manager DIT</h2>
                                                <u>Detail Tiket</u><br>
                                                <pre>Nomor Ticket       : #<b>$row_opentiket_head_programmer_close[CODE]</b></pre>
                                                <pre>Kode online/now    : $row_opentiket_head_programmer_close[KODE_MESIN]</pre> 
                                                <pre>Link online/now    : $row_opentiket_head_programmer_close[NAMA_MESIN]</pre> 
                                                <pre>User Departement   : $row_opentiket_head_programmer_close[CREATIONUSER]</pre>
                                                <pre>Ditugaskan Oleh    : $row_opentiket_head_programmer_close[TUGASDIBUAT_OLEH]</pre>
                                                <pre>Programmer 	    : $row_opentiket_head_programmer_close[DITUGASKAN_KPD]</pre>
                                                <pre>Department         : $row_opentiket_head_programmer_close[DEPT]</pre> 
                                                <pre>Gejala             : $row_opentiket_head_programmer_close[GEJALA]</pre><br>
                                                <pre>Remarks		    : $row_opentiket_head_programmer_close[KOMENTAR_PROGRAMMER]</pre><br>                                                

                                                Silahkan <a href='online.indotaichen.com/laporan/ApprovedClose_programmer.php?UNIQUEID=$row_opentiket_head_programmer_close[ABSUNIQUEID]'>Klik disini</a>, untuk Approve Permohonan Permintaan Aplikasi bahwa Sudah Selesai (Close) dikerjakan.

                                            </body>
                                        </html>";
                        $mail->AltBody = '';
                        $kirim = $mail->send();
                        if($kirim){
                            // JIKA EMAIL BERHASIL TERKIRIM MAKA SIMPAN LOG ke MYSQLI
                            $q_simpan_log = mysqli_query($con_nowprd, "INSERT INTO email_auth (code, gejala, dept, `status`)
                                                                                VALUES ('$row_opentiket_head_programmer_close[CODE]',
                                                                                        '$row_opentiket_head_programmer_close[GEJALA]',
                                                                                        '$row_opentiket_head_programmer_close[DEPT]',
                                                                                        '4. Email Terkirim ke Manager dan Ast. Manager Untuk Approved Closed');");
                            echo "Log saved";
                            $mailer->clearAllRecipients();
                        }
                    }
                }
            // END
        // END
    }
?>