<?php
//include 'session.php';
$tahun = $_SESSION['tahun'];
$username='organisasi_4p1';
$password='GUcygjX7FFC645ZwMEnFFtqVzJrbynrh';
$URL='https://edelivery.surabaya.go.id/'.$tahun.'/api/v1/bkd/list-transaksi/pekerjaan/'.$paket_pekerjaan.'';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$URL);
curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
$result=curl_exec ($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
curl_close ($ch);

$array = json_decode($result, true);
?>