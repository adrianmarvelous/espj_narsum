<?php 
    //include '../../../../session.php';
error_reporting(0);
require_once '../../../koneksi.php';
$id_transaksi = htmlentities($_GET['id_transaksi']);
$session_tahun = htmlentities($_SESSION['tahun']);
//$id_transaksi = 5025994;
//$jenis_dok = $_GET['jenis_dok'];
$username='organisasi_4p1';
$password='GUcygjX7FFC645ZwMEnFFtqVzJrbynrh';
$URL='https://edelivery.surabaya.go.id/'.$session_tahun.'/api/v1/bkd/data-dokumen/jenis/dok-honor/transaksi/'.$id_transaksi.'';

$query_ttd = $db->prepare("SELECT status_ttd,bendahara,pptk FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header WHERE narsum_daftar_hadir_content.id_transaksi = :id_transaksi");
$query_ttd->bindParam(':id_transaksi',$id_transaksi);
$query_ttd->execute();
$ttd = $query_ttd->fetch(PDO::FETCH_ASSOC);

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
//print $obj->{'skpd'}; 
//echo $obj->{'ppk_nama'}; 
//var_dump($array);

include "../../terbilang.php";
require_once '../../../koneksi.php';
require_once('../../../plugin/phpqrcode/qrlib.php');
require_once('../../../plugin/mpdf/vendor/autoload.php');
$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
ob_start();
foreach($array as $result => $value) {
    if(isset($value['skpd'])){
    $komponen = $value['komponen'];
    $bulan = date("m",strtotime($value['tanggal_pelaksanaan']));
    include '../../bulan.php';
    foreach($komponen as $komponen1 =>$kom){
        $uraian_komponen = $kom['komponen'];
    }
    /*foreach($komponen as $komponen1 => $data){
        echo $data['komponen'];
    }*/

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body style="background-image: url('../../../source/logo/logo_template.gif');background-image-resize: 4;">
    <style>
        body{
            font-family:"Arial, Helvetica, sans-serif";
        }
    </style>
<table width="100%">
    <tr>
        <td width="70%"></td>
        <td style="font-weight: bold;">Id Pekerjaan: <?php echo $value['id_pekerjaan']?></td>
    </tr>
    <tr>
        <td width="70%"></td>
        <td style="font-weight: bold;">Id Transaksi: <?php echo $id_transaksi?></td>
    </tr>
    <tr>
        <td ></td>
        <td style="font-weight: bold; text-align: center;">UP/GU/TU</td>
    </tr>
</table>
<p style="text-align: center;font-size:16px; font-weight: bold;line-height:40%;margin-top:30px;">DAFTAR PENERIMAAN HONORARIUM</p>
<p style="text-align: center;font-size:16px; font-weight: bold;line-height:40%;text-transform:uppercase;">BULAN <?php echo $bulan_ ?> <?=htmlentities($_SESSION['tahun'])?></p>
<p style="text-align: center;font-size:16px; font-weight: bold;text-transform:uppercase;">DALAM RANGKA <?php echo $value['nama_sub_kegiatan']?></p>
<table>
    <tr>
        <td style="width: 150px;">Kode dan Nama Kegiatan</td>
        <td>:</td>
        <td><?php echo $value['kode_kegiatan']." - ".$value['nama_kegiatan']?></td>
    </tr>
    <tr>
        <td>Kode dan Nama Sub Kegiatan</td>
        <td>:</td>
        <td><?php echo $value['kode_sub_kegiatan']." - ".$value['nama_sub_kegiatan']?></td>
    </tr>
    <tr>
        <td>Kode dan Nama Rekening</td>
        <td>:</td>
        <td><?php echo $value['rekening']." - ".$value['nama_rekening']?></td>
    </tr>
    <tr>
        <td>Komponen</td>
        <td>:</td>
        <td><p>1) <?php echo $uraian_komponen?></p>
            <?php echo $value['uraian']?><br>
            <?php echo $value['topik_rapat'] ?></td>
    </tr>

    <tr>
        <td>Waktu</td>
        <td>:</td>
        <td><?php echo date("H-i",strtotime($value['waktu_mulai']))." s/d ".date("H-i",strtotime($value['waktu_selesai']))?></td>
    </tr>
</table>
<table border="1" width="100%" style="border-collapse: collapse;">
    <tr>
        <td style="text-align: center;font-weight:bold;">No</td>
        <td style="text-align: center;font-weight:bold;">Nama</td>
        <td style="text-align: center;font-weight:bold;">Uraian</td>
        <td style="text-align: center;font-weight:bold;">PPh</td>
        <td style="text-align: center;font-weight:bold;">Jumlah</td>
        <td style="text-align: center;font-weight:bold;">Tanda Tangan</td>
    </tr>
    <tr>
        <td colspan="6"><?php echo $uraian_komponen?></td>
    </tr>
    <?php 
        $i=1;
        foreach($komponen as $komponen1 =>$kom){
            $detail_penerima = $kom['detail_penerima'];
            foreach($detail_penerima as $detail_penerima1 => $data){
    ?>
    <tr>
        <td><?php echo $i++?></td>
        <td><?php echo $data['nama']?></td>
        <td><?php echo $data['volume_koef_1']." ".$data['satuan_koef_1']." x ".$data['volume_koef_2']." ".$data['satuan_koef_2']." x Rp. ".number_format($data['nominal'],2,',','.')." = Rp. ".number_format($jumlah = $data['nominal']*$data['volume_koef_2'],2,',','.')?></td>
        <td>Rp. <?php echo number_format($data['pph'],2,',','.')?></td>
        <td>Rp. <?php echo number_format($jumlah-$data['pph'],2,',','.')?></td>
        <td>
            <?php 
            $query_ttd_narsum = $db->prepare("SELECT narsum_daftar_hadir_content.ttd_narsum, narsum_daftar_hadir_content.id_transaksi, master_narasumber.ttd FROM narsum_daftar_hadir_content JOIN  master_narasumber ON master_narasumber.id = narsum_daftar_hadir_content.id_narsum WHERE narsum_daftar_hadir_content.id_transaksi = :id_transaksi");
            $query_ttd_narsum->bindParam(':id_transaksi',$id_transaksi);
            $query_ttd_narsum->execute();
            $ttd_narsum = $query_ttd_narsum->fetch(PDO::FETCH_ASSOC);
                if($ttd_narsum['ttd_narsum'] == 1){
            ?>
            <center>
            <img src="../../narasumber/master/dokumen_master/ttd/<?=$ttd_narsum['ttd']?>" width="90px">
            </center>
            <?php }?>
        </td>
    </tr>
    <?php }}?>
    <tr>
        <td colspan="2" style="text-align: left;font-weight:bold;">JUMLAH</td>
        <td style="text-align: right;font-weight:bold;">Rp. <?php echo number_format($jumlah,2,',','.')?></td>
        <td style="text-align: center;font-weight:bold;">Rp. <?php echo number_format($data['pph'],2,',','.')?></td>
        <td style="text-align: center;font-weight:bold;">Rp. <?php echo number_format($jumlah-$data['pph'],2,',','.')?></td>
        <td style="text-align: center;font-weight:bold;"></td>
    </tr>
    <tr>
        <td colspan="6" style="height: 20px;"></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;font-weight:bold;">Total</td>
        <td style="text-align: right;font-weight:bold;">Rp. <?php echo number_format($jumlah,2,',','.')?></td>
        <td style="text-align: center;font-weight:bold;">Rp. <?php echo number_format($data['pph'],2,',','.')?></td>
        <td style="text-align: center;font-weight:bold;">Rp. <?php echo number_format($jumlah-$data['pph'],2,',','.')?></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="6" style="text-align: left;font-weight:bold;">Terbilang: <?php echo terbilang($data['jumlah'])?> rupiah</td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td width="30%"></td>
        <td></td>
        <td width="30%" style="text-align: right; margin-right:20px;">Surabaya, <?php echo date('d',strtotime($value['tanggal_pelaksanaan']))." ".$bulan_." ".date('Y',strtotime($value['tanggal_pelaksanaan']))?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>Lunas Dibayar, 
            .....................
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">Mengetahui/Menyetujui</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td style="text-align: center;">Pejabat Pembuat Komitmen</td>
        <td></td>
        <td style="text-align: center;">Bendahara Pengeluaran</td>
    </tr>
    <tr>
        <td>
            <center>
            <?php 
                if($ttd['status_ttd'] >= 1){
            ?>
            <img src="../../specimen/<?=$value['ppk_nip']?>.png" width="100">
            <?php     } ?>
            </center>
            <!--<img src="../../specimen/<?=$value['ppk_nip']?>.png" width="150">-->
        </td>
        <td><center>
            <!--<?php
            //file path
            //$name_file = $id_sub."_".$id_content."_".$id_nota."_".$tanggal;
            $file = "../../qr_code/".$id_transaksi.".png";

            //other parameters
            /*$ecc = 'M';
            $pixel_size = 1.7;
            $frame_size = 2;*/

            // Generates QR Code and Save as PNG
            QRcode::png($actual_link, $file/*, $ecc, $pixel_size, $frame_size*/);

            // Displaying the stored QR code if you want
            echo "<div><img width=15% src='".$file."'></div>";
            ?>--></center>
        </td>
        <td><center>
            <?php
                if($ttd['status_ttd'] >= 2){
            ?>
            <img src="../../specimen/<?=$value['bendahara_nip']?>.png" width="80">
            <?php } ?>    
            </center>
            <!--<img src="../../specimen/<?=$value['bendahara_nip']?>.png" width="150">-->
        </td>
    </tr>
</table>
<br>
<table width="100%">
    <tr>
        <td width="30%" style="text-align: center;font-weight: bold;text-decoration:underline;"><?php echo $value['ppk_nama']?></td>
        <td></td>
        <td width="30%" style="text-align: center;font-weight: bold;text-decoration:underline;"><?php echo $value['bendahara_nama']?></td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold;"><?php echo $value['ppk_pangkat']?></td>
        <td></td>
        <td style="text-align: center;font-weight: bold;"><?php echo $value['bendahara_pangkat']?></td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold;">NIP.<?php echo $value['ppk_nip']?></td>
        <td></td>
        <td style="text-align: center;font-weight: bold;">NIP.<?php echo $value['bendahara_nip']?></td>
    </tr>
</table>
</body>
</html>
<?php 
}}

$html = ob_get_contents(); 
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>