<?php
    session_start();

    require_once "koneksi.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_POST['submit'])) {
        $stmt = $con_nowprd->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $_SESSION['username'] = $username;
            header("Location: prd_pinjam_stdcckwarna_dl.php"); // Ganti dengan halaman setelah login
            $date = date('Y-m-d H:i:s');
            mysqli_query($con_nowprd, "INSERT INTO log_activity_users(user,IPADDRESS,CREATEDATETIME) VALUES('$username','$_SERVER[REMOTE_ADDR]','$date')");
        }else{
            $error_message = "Username atau password salah. Silakan coba lagi.";
        }
        // Tutup koneksi dan statement
        $stmt->close();
        $con_nowprd->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRD - PINJAM BUKU STD CCK WARNA</title>
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
    <link rel="stylesheet" href="files\bower_components\select2\css\select2.min.css">
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <section style="margin: 0 auto 0 auto; max-width: 50%">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <form class="md-float-material form-material" action="" method="post">
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-center"><i class="feather icon-lock text-primary f-60 p-t-15 p-b-20 d-block"></i></h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="username" style="text-align: center;" class="form-control" required placeholder="Username">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" style="text-align: center;" class="form-control" required placeholder="Password">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"><i class="icofont icofont-lock"></i> Buka Halaman ini </button>
                                    </div>
                                </div>
                                <?php if (isset($error_message)) { ?>
                                    <center>
                                        <p class="error-message">
                                            <code>
                                                <b><?php echo $error_message; ?></b>
                                            </code>
                                        </p>
                                    </center>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Anda Belum login, silahkan login terlebih dahulu !</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<?php require_once 'footer.php'; ?>