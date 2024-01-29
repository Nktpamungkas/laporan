<?php if($_SERVER['REMOTE_ADDR'] == '10.0.5.178') : ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Real-Time Table</title>
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
        <script>
            function fetchDataAndUpdateTable() {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'r_fetch_data_DB2.php', true);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var data = JSON.parse(xhr.responseText);
                        updateTable(data);
                        fetchDataAndInsertQuery(data)
                        // Melakukan polling lagi setelah jeda waktu tertentu (misalnya, 1 detik)
                        setTimeout(fetchDataAndUpdateTable, 1000);
                    }
                };
                xhr.send();
            }

            function fetchDataAndInsertQuery(data) {
                if (Array.isArray(data) && data.length > 0) {
                    var xhrInsert = new XMLHttpRequest();
                    xhrInsert.open('POST', 'r_insert_data_DB2.php', true);
                    xhrInsert.setRequestHeader('Content-Type', 'application/json');

                    xhrInsert.onreadystatechange = function () {
                        if (xhrInsert.readyState == 4) {
                            if (xhrInsert.status == 200) {
                                console.log('Data berhasil disisipkan ke database');
                            } else {
                                console.error('Gagal menyisipkan data ke database');
                            }
                        }
                    };

                    // Mengirim data dalam format JSON ke server
                    xhrInsert.send(JSON.stringify(data));
                } else {
                    console.error('Data yang dikirim dari klien tidak sesuai dengan yang diharapkan.');
                }
            }

            function updateTable(data) {
                // Membuat atau memperbarui tabel dengan data yang diterima
                var table = `JANGAN DI CLOSE`;

                // Menambahkan tabel ke elemen dengan id 'table_div'
                document.getElementById('table_div').innerHTML = table;
            }

            fetchDataAndUpdateTable();
        </script>
    </head>
    <body>
        <!-- Tempat untuk menampilkan atau menggambar tabel -->
        <div class="card">
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <div id="table_div"></div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-block">
                <?php 

                ?>
            </div>
        </div>
    </body>
    </html>
<?php endif; ?>
