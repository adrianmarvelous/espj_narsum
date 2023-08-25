<?php 
    require_once '../../koneksi.php';
    require_once('../../plugin/phpqrcode/qrlib.php');
    require_once('../../plugin/mpdf/vendor/autoload.php');
    $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
    ob_start();

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    require_once('../../plugin/phpqrcode/qrlib.php');

    $id_content = htmlentities($_GET['id_content']);

    $query_id_content = $db->prepare("SELECT /* approve_upload.pptk,*/ master_narasumber.ttd, ttd_narsum, narsum_daftar_hadir_header.id as id_acara, master_narasumber.nama FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header JOIN master_narasumber ON narsum_daftar_hadir_content.id_narsum = master_narasumber.id /*JOIN dokumen_realisasi ON dokumen_realisasi.id_acara_content = narsum_daftar_hadir_content.id JOIN approve_upload ON dokumen_realisasi.id = approve_upload.id_dokumen*/ WHERE narsum_daftar_hadir_content.id = :id_content");
    $query_id_content->bindParam(':id_content',$id_content);
    $query_id_content->execute();
    $content = $query_id_content->fetch(PDO::FETCH_ASSOC);

    $id_acara = $content['id_acara'];
    $query_header = $db->prepare("SELECT * FROM narsum_daftar_hadir_header WHERE id = :id_acara");
    $query_header->bindParam(':id_acara',$id_acara);
    $query_header->execute();
    $header = $query_header->fetch(PDO::FETCH_ASSOC);
    $id_bidang  = $header['id_bidang'];

    $query_pptk = $db->prepare("SELECT bidang_id_sub.id_sub FROM bidang_id_sub JOIN narsum_daftar_hadir_header ON bidang_id_sub.id_bidang = narsum_daftar_hadir_header.id_bidang WHERE narsum_daftar_hadir_header.id = :id_acara");
    $query_pptk->bindParam(':id_acara',$id_acara);
    $query_pptk->execute();
    $id_pptk = $query_pptk->fetch(PDO::FETCH_ASSOC);
    $id_sub = $id_pptk['id_sub'];
    include '../../config/pptk.php';
    //$query_pptk = mysqli_query($koneksi,"SELECT id, pptk FROM npd_header WHERE id = $id_npd");
    //$pptk = mysqli_fetch_array($query_pptk);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hadir</title>
    <link rel="stylesheet" href="../../css/narasumber/daftar_hadir.css">
</head>
<body>
    <p class="title">DAFTAR HADIR NARASUMBER</p>
    <div class="content">
        <div class="header">
            <table>
                <tr>
                    <td style="width: 100px;">Tanggal</td>
                    <td style="width: 50px;">:</td>
                    <td><?php echo date("d-m-Y", strtotime($header['tanggal']))?></td>
                </tr>
                <tr>
                    <td>Pukul</td>
                    <td>:</td>
                    <td><?php echo $header['pukul_mulai']?> - <?php echo $header['pukul_selesai']?></td>
                </tr>
                <tr>
                    <td>Acara</td>
                    <td>:</td>
                    <td><?php echo $header['acara']?></td>
                </tr>
                <tr>
                    <td>Tempat</td>
                    <td>:</td>
                    <td><?php echo $header['tempat']?></td>
                </tr>
            </table>
        </div>
        <div class="table_content">
            <table class="table1">
                <tr>
                    <th style="width: 50px;border:1px solid;">No</th>
                    <th style="border:1px solid;">Nama</th>
                    <th style="border:1px solid;">Tanda Tangan</th>
                    <th style="border:1px solid;">Keterangan</th>
                </tr>
                <tr>
                    <td style="border:1px solid;text-align:center;">1</td>
                    <td style="border:1px solid;"><?php echo $content['nama']?></td>
                    <td style="border:1px solid;"><center>
                    <?php 
                        if($content['ttd_narsum'] == 1){
                    ?>
                    <img src="../../config/narasumber/master/dokumen_master/ttd/<?=$content['ttd']?>" width="100">
                    <?php }?></center>
                    </td>
                    <td style="border:1px solid;">
                </tr>
            </table>
        </div>
        <table width="100%">
            <tr>
                <td width="50%"></td>
                <td style="text-align: center;">Pejabat Pembuat Komitmen</td>
            </tr>
            <tr>
                <td>
                    <?php
                    //file path
                    $name_file = $id_sub."_".$id_content;
                    $file = "../../qr_code/".$name_file.".png";

                    //other parameters
                    /*$ecc = 'M';
                    $pixel_size = 1.7;
                    $frame_size = 2;*/

                    // Generates QR Code and Save as PNG
                    QRcode::png($actual_link, $id_content/*, $ecc, $pixel_size, $frame_size*/);

                    // Displaying the stored QR code if you want
                    echo "<div><img width=15% src='".$id_content."'></div>";
                    ?>
                </td>
                <td><center>
                    <?php 
                    $query_ttd = $db->prepare("SELECT narsum_daftar_hadir_header.*, user_master_asn.nip, nama FROM narsum_daftar_hadir_content JOIN narsum_daftar_hadir_header ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header JOIN user_master_asn ON narsum_daftar_hadir_header.pptk = user_master_asn.nip WHERE narsum_daftar_hadir_content.id = :id_content");
                    $query_ttd->bindParam(':id_content',$id_content);
                    $query_ttd->execute();
                    $ttd = $query_ttd->fetch(PDO::FETCH_ASSOC);
                        if(htmlentities($ttd['status_ttd'] >= 1)){
                    ?>
                    <img src="../../config/specimen/<?=$ttd['pptk']?>.png" width="150">
                    </center>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center;"><?php echo $ttd['nama']?></td>
            </tr>
            <!-- <tr>
                <td></td>
                <td style="text-align: center;"><?php echo $jabatan?></td>
            </tr> -->
            <tr>
                <td></td>
                <td style="text-align: center;">NIP. <?php echo $ttd['nip']?></td>
            </tr>
            
            <?php }?>
        </table>
        <!--<div style="display: flex;">
            <div style="width: 50%;"></div>
            <div style="text-align: center;margin-left:350px;">
                <p>Pejabat Pembuat Komitmen</p>
                <?php 
                    if($header['ttd_ppk'] == 1){
                ?>
                    <img src="../../config/specimen/<?=$nip?>.png" width="200">
                <?php }?>
                <p><?php echo $pptk?></p>
                <p>Penata IV</p>
                <p>NIP. <?php echo $nip?></p>
            </div>
        </div>-->
    </div>
</body>
</html>
<?php
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>