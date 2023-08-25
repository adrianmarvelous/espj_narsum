<?php 
    require_once '../../koneksi.php';
    require_once '../../koneksi.php';
    require_once('../../plugin/phpqrcode/qrlib.php');
    require_once('../../plugin/mpdf/vendor/autoload.php');
    $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
    ob_start();

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    require_once('../../plugin/phpqrcode/qrlib.php');

    $id_content = htmlentities($_GET['id_content']);

    $query_header = $db->prepare("SELECT master_narasumber.ttd, narsum_daftar_hadir_header.*, narsum_daftar_hadir_content.ttd_narsum, narsum_daftar_hadir_content.masukan as masukan_narsum, master_narasumber.nama FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header JOIN master_narasumber ON narsum_daftar_hadir_content.id_narsum = master_narasumber.id WHERE narsum_daftar_hadir_content.id = :id_content");
    $query_header->bindParam(':id_content',$id_content);
    $query_header->execute();
    $data = $query_header->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masukan dari Narasumber</title>
    <link rel="stylesheet" href="../../css/resume_rapat.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
    <div class="content">
        <p class="title">Saran/Masukan Narasumber</p>
        <table>
            <tr>
                <td style="width: 100px;">Tanggal</td>
                <td style="width: 50px;">:</td>
                <td><?php echo date('d-m-Y',strtotime($data['tanggal']))?></td>
            </tr>
            <tr>
                <td>Pukul</td>
                <td>:</td>
                <td><?php echo $data['pukul_mulai']?> - <?php echo $data['pukul_selesai']?></td>
            </tr>
            <tr>
                <td>Acara</td>
                <td>:</td>
                <td><?php echo $data['acara']?></td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>:</td>
                <td><?php echo $data['tempat']?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $data['nama']?></td>
            </tr>
        </table>

        <p style="text-decoration: underline;">Masukan Rapat : </p>
        <?php echo html_entity_decode($data['masukan_narsum']); ?>
        
        <table style="margin-top: 200px;text-align:center;">
            <tr>
                <td style="width: 500px"></td>
                <td>Hormat Saya</td>
            </tr>
            <tr style="height: 100px;">
                <td>
                    <?php
                    //file path
                    $name_file = "surat_kesediaan_".$id_content;
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
                <td>
                    <?php
                        if($data['ttd_narsum'] == 1){
                    ?>
                    <img src="../../config/narasumber/master/dokumen_master/ttd/<?=$data['ttd']?>" width="150">
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $data['nama']?></td>
            </tr>
        </table>
        
    </div>
    <!--<script>window.print()</script>-->
</body>
</html>
<?php
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>