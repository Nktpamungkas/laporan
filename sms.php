<?php
function sendsms($to, $msg)
{
    //init SMS gateway, look at android SMS gateway
    $idmesin = "404";
    $pin = "022737";
    $to = '081293517242';
    $msg = 'Pesan pertama';

    // create curl resource
    $ch = curl_init();

    // set url
    curl_setopt($ch, CURLOPT_URL, "https://sms.indositus.com/sendsms.php?idmesin=$idmesin&pin=$pin&to=$to&text=$msg");

    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // $output contains the output string
    $output = curl_exec($ch);

    // close curl resource to free up system resources
    curl_close($ch);
    return ($output);
}
