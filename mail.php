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

        // START 1. Email pertama kali openticket untuk pemberitahuan ke staff atau spv IT SUPPORT/PROGRAMMER untuk membuatkan work order.
            // START IT SUPPORT
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
                        $mail->Subject = 'Open Ticket NOW';
                        $mail->Body    = "<html>
                                            <head>
                                            </head>
                                            <body>
                                                <h2>Hi, IT SUPPORT</h2><br>
                                                Nomor Ticket             : $row_opentiket_support[CODE] created <br><br>
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

            // IT PROGRAMMER
                require_once "koneksi.php"; 

                $q_opentiket_programmer    = db2_exec($conn1, "SELECT 
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
                                                                    p.BREAKDOWNTYPE = 'SF'");
                $no = 1;
                while ($row_opentiket_programmer   = db2_fetch_assoc($q_opentiket_programmer)) {

                    $q_cektiket     = mysqli_query($con_nowprd, "SELECT COUNT(*) AS jumlah 
                                                                    FROM email_auth 
                                                                    WHERE code = '$row_opentiket_programmer[CODE]'
                                                                    AND `status` = '1. Email Terkirim ke Programmer'");
                    $row_cektiket   = mysqli_fetch_assoc($q_cektiket);

                    if($row_cektiket['jumlah'] == '0'){            
                        // Menambahkan penerima
                        $q_email_support    = db2_exec($conn1, "SELECT
                                                                    TRIM(a.SENDEREMAIL) AS EMAIL
                                                                FROM
                                                                    ABSUSERDEF a
                                                                WHERE
                                                                    (TRIM(a.CUSTOMCSS) = 'IT PROGRAMMER' OR TRIM(a.CUSTOMCSS) = 'ALL') AND NOT a.SENDEREMAIL IS NULL");
                        while ($row_email_support   = db2_fetch_assoc($q_email_support)) {
                            $mail->AddAddress($row_email_support['EMAIL']);
                        }
                        $mail->setFrom('dept.it@indotaichen.com', 'Openticket IT PROGRAMMER'); // Pengirim
                        $mail->addReplyTo('dept.it@indotaichen.com', 'Openticket IT PROGRAMMER'); //jka emailnya dibalas otomatis balas ke email ini dan judulnya
                        $mail->isHTML(true);
                        $mail->Subject = 'Open Ticket NOW';
                        $mail->Body    = "<html>
                                            <head>
                                            </head>
                                            <body>
                                                <h2>Hi, IT PROGRAMMER</h2><br>
                                                Nomor Ticket             : $row_opentiket_programmer[CODE] created <br><br>
                                                <pre>Kode online/now     : $row_opentiket_programmer[KODE_MESIN]</pre> 
                                                <pre>Link online/now     : $row_opentiket_programmer[NAMA_MESIN]</pre> 
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
                                                                                        '1. Email Terkirim ke Programmer');");
                            echo "Log saved";
                        }
                    }
                }
            // END 
        // END
        

        // START 2. Email kedua setelah staff atau spv sudah membuat work order > email ke staff yang di tuju.
            // START IT SUPPORT 2
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
                        $mail->Subject = 'Open Ticket NOW';
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
            
            // START IT PROGRAMMER 2
                require_once "koneksi.php"; 
                $q_opentiket_programer_2    = db2_exec($conn1, "SELECT 
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
                                                                p.BREAKDOWNTYPE = 'SF'
                                                                AND NOT a.SENDEREMAIL IS NULL");
                $no = 1;
                while ($row_opentiket_programmer_2   = db2_fetch_assoc($q_opentiket_programer_2)) {
                    $q_cektiket     = mysqli_query($con_nowprd, "SELECT COUNT(*) AS jumlah 
                                                                            FROM email_auth 
                                                                            WHERE code = '$row_opentiket_programmer_2[CODE]' 
                                                                            AND `status` = '2. Email Terkirim ke Staff Programmer yang di tugaskan'");
                    $row_cektiket   = mysqli_fetch_assoc($q_cektiket);

                    if($row_cektiket['jumlah'] == '0'){            
                        // Menambahkan penerima
                        $mail->AddAddress($row_opentiket_programmer_2['EMAIL']);
                        $to = 'To '.$row_opentiket_programmer_2['DITUGASKAN_KPD'];
                        $mail->setFrom('dept.it@indotaichen.com', $to); // Pengirim
                        $mail->addReplyTo('dept.it@indotaichen.com', 'Openticket IT SUPPORT'); //jka emailnya dibalas otomatis balas ke email ini dan judulnya
                        $mail->isHTML(true);
                        $mail->Subject = 'Open Ticket NOW';
                        $mail->Body    = "<html>
                                            <head>
                                            </head>
                                            <body>
                                                <h2>Hi, $row_opentiket_programmer_2[DITUGASKAN_KPD]</h2><br>
                                                <h4>$row_opentiket_programmer_2[TUGASDIBUAT_OLEH] telah memberikan tiket #$row_opentiket_programmer_2[CODE] kepada anda!</h4><br>
                                                <pre>Nomor Tag/Mesin     : $row_opentiket_programmer_2[KODE_MESIN]</pre> 
                                                <pre>Nama Mesin          : $row_opentiket_programmer_2[NAMA_MESIN]</pre> 
                                                <pre>Deskripsi Mesin     : $row_opentiket_programmer_2[DESC_MESIN]</pre> 
                                                <pre>From                : $row_opentiket_programmer_2[CREATIONUSER] </pre>
                                                <pre>Department          : $row_opentiket_programmer_2[DEPT]</pre> 
                                                <pre>Gejala              : $row_opentiket_programmer_2[GEJALA]</pre> 
                                            </body>
                                        </html>";
                        $mail->AltBody = '';
                        $kirim = $mail->send();
                        if($kirim){
                            // JIKA EMAIL BERHASIL TERKIRIM MAKA SIMPAN LOG ke MYSQLI
                            $q_simpan_log = mysqli_query($con_nowprd, "INSERT INTO email_auth (code, gejala, dept, `status`)
                                                                                VALUES ('$row_opentiket_programmer_2[CODE]',
                                                                                        '$row_opentiket_programmer_2[GEJALA]',
                                                                                        '$row_opentiket_programmer_2[DEPT]',
                                                                                        '2. Email Terkirim ke Staff Programmer yang di tugaskan');");
                            echo "Log saved";
                        }
                    }
                }
            // END
        // END

        // START 3. Email ketiga setelah ticket close > pemberitahuan kepada manager DIT bahwa tiket sudah selesai dikerjakan.
            // START IT PROGRAMMER 3
            require_once "koneksi.php"; 
            $q_opentiket_3    = db2_exec($conn1, "SELECT 
                                                    TRIM(p.BREAKDOWNTYPE) AS BREAKDOWNTYPE,
                                                    TRIM(p.CODE) AS CODE,
                                                    TRIM(p.CREATIONUSER) AS CREATIONUSER,
                                                    TRIM(p3.ASSIGNEDBYUSERID) AS TUGASDIBUAT_OLEH,
                                                    TRIM(p3.ASSIGNEDTOUSERID) AS DITUGASKAN_KPD,
                                                    p.SYMPTOM AS GEJALA,
                                                    TRIM(d.LONGDESCRIPTION) AS DEPT,
                                                    TRIM(p2.CODE) AS KODE_MESIN,
                                                    TRIM(p2.LONGDESCRIPTION) AS NAMA_MESIN,
                                                    TRIM(p2.GENERICDATA1) || ' ' || TRIM(p2.GENERICDATA2) || ' ' || TRIM(p2.GENERICDATA3) || ' ' || TRIM(p2.GENERICDATA4) AS DESC_MESIN,
                                                    TRIM(a.SENDEREMAIL) AS EMAIL,
                                                    p.STATUS,
                                                    u.LONGDESCRIPTION AS APPROVE_DIT
                                                FROM
                                                    PMBREAKDOWNENTRY p
                                                LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE
                                                LEFT JOIN PMBOM p2 ON p2.CODE = p.PMBOMCODE 
                                                RIGHT JOIN PMWORKORDER p3 ON p3.PMBREAKDOWNENTRYCODE = p.CODE AND NOT p3.ASSIGNEDTOUSERID IS NULL
                                                LEFT JOIN ABSUSERDEF a ON a.USERID = p3.ASSIGNEDTOUSERID 
                                                LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p3.ABSUNIQUEID AND a2.FIELDNAME = 'ApprovalDeptDITCode'
                                                LEFT JOIN USERGENERICGROUP u ON u.CODE = a2.VALUESTRING 
                                                WHERE
                                                    p.BREAKDOWNTYPE = 'SF'
                                                    AND NOT a.SENDEREMAIL IS NULL
                                                    AND p.STATUS = 3
                                                    AND u.LONGDESCRIPTION IS NULL");
            $no = 1;
            while ($row_opentiket_3   = db2_fetch_assoc($q_opentiket_3)) {
                $q_cektiket     = mysqli_query($con_nowprd, "SELECT COUNT(*) AS jumlah 
                                                                        FROM email_auth 
                                                                        WHERE code = '$row_opentiket_3[CODE]' 
                                                                        AND `status` = '3. Email Terkirim ke MANAGER DIT untuk di approved'");
                $row_cektiket   = mysqli_fetch_assoc($q_cektiket);

                if($row_cektiket['jumlah'] == '0'){            
                    // Jika PROGRAMMER harus approve form permohonan aplikasi oleh manager DIT atau Ast. manager DIT
                    if($row_opentiket_3['BREAKDOWNTYPE'] == 'SF'){
                        $q_email_3      = db2_exec($conn1, "SELECT
                                                                TRIM(FULLNAME) AS FULLNAME,
                                                                TRIM(a.SENDEREMAIL) AS EMAIL
                                                            FROM
                                                                ABSUSERDEF a
                                                            WHERE
                                                                (TRIM(a.CUSTOMCSS) = 'Manager DIT' OR TRIM(a.CUSTOMCSS) = 'Ast. Manager DIT' OR TRIM(a.CUSTOMCSS) = 'ALL') 
                                                                AND NOT a.SENDEREMAIL IS NULL");
                        while ($row_email_3   = db2_fetch_assoc($q_email_3)) {
                            $mail->AddAddress($row_email_3['EMAIL']);
                        }
                    }
                    $mail->setFrom('dept.it@indotaichen.com', 'Manager DIT/Ast. Manager DIT'); // Pengirim
                    $mail->addReplyTo('dept.it@indotaichen.com', 'Form Permohonan Aplikasi'); //jka emailnya dibalas otomatis balas ke email ini dan judulnya
                    $mail->isHTML(true);
                    $mail->Subject = 'Open Ticket NOW';
                    $mail->Body    = "<html>
                                        <head>
                                        </head>
                                        <body>
                                            <h2>Hi,</h2>
                                            <h3>Mohon Segera Di Approved.</h3>
                                            <h4>$row_opentiket_3[DITUGASKAN_KPD] Telah menyelesaikan tiket #$row_opentiket_3[CODE] kepada anda!</h4><br>
                                            <pre>Kode online/now     : $row_opentiket_3[KODE_MESIN]</pre> 
                                            <pre>Link online/now     : $row_opentiket_3[NAMA_MESIN]</pre> 
                                            <pre>From                : $row_opentiket_3[CREATIONUSER] </pre>
                                            <pre>Department          : $row_opentiket_3[DEPT]</pre> 
                                            <pre>Gejala              : $row_opentiket_3[GEJALA]</pre>
                                        </body>
                                    </html>";
                    $mail->AltBody = '';
                    $kirim = $mail->send();
                    if($kirim){
                        // JIKA EMAIL BERHASIL TERKIRIM MAKA SIMPAN LOG ke MYSQLI
                        $q_simpan_log = mysqli_query($con_nowprd, "INSERT INTO email_auth (code, gejala, dept, `status`)
                                                                            VALUES ('$row_opentiket_3[CODE]',
                                                                                    '$row_opentiket_3[GEJALA]',
                                                                                    '$row_opentiket_3[DEPT]',
                                                                                    '3. Email Terkirim ke MANAGER DIT untuk di approved');");
                        echo "Log saved";
                    }
                }
            }
            // END
        // END
    }
?>