<?php
    // function sendsms($to, $msg)
    // {
    //     //init SMS gateway, look at android SMS gateway
    //     $idmesin = "404";
    //     $pin = "022737";
    //     $to = '081293517242';
    //     $msg = 'Pesan pertama';

    //     // create curl resource
    //     $ch = curl_init();

    //     // set url
    //     curl_setopt($ch, CURLOPT_URL, "https://sms.indositus.com/sendsms.php?idmesin=$idmesin&pin=$pin&to=$to&text=$msg");

    //     //return the transfer as a string
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //     // $output contains the output string
    //     $output = curl_exec($ch);

    //     // close curl resource to free up system resources
    //     curl_close($ch);
    //     return ($output);
    // }
    //default time zone
    date_default_timezone_set("Asia/Jakarta");
    //fungsi check tanggal merah
    function tanggalMerah($value)
    {
        $array = json_decode(file_get_contents("https://raw.githubusercontent.com/guangrei/APIHariLibur_V2/main/calendar.json"), true);

        //check tanggal merah berdasarkan libur nasional
        if (isset($array[$value]) && $array[$value]["holiday"]) :        echo "tanggal merah\n";
            print_r($array[$value]);

        //check tanggal merah berdasarkan hari minggu
        elseif (
            date("D", strtotime($value)) === "Sun"
        ) :        echo "tanggal merah hari minggu";

        //bukan tanggal merah
        else : echo "bukan tanggal merah";
        endif;
    }

    //testing
    $hari_ini = date("Y-m-d");

    echo "<b>Check untuk hari ini (" . date("d-m-Y", strtotime($hari_ini)) . ")</b><br>";
    tanggalMerah($hari_ini);
