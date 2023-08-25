<?php 
    require_once '../../koneksi.php';
    require_once('../../plugin/phpqrcode/qrlib.php');
    require_once('../../plugin/mpdf/vendor/autoload.php');
    $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
    ob_start();

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    require_once('../../plugin/phpqrcode/qrlib.php');

    //$id_header = $_GET['id_header'];
    $id_content = htmlentities($_GET['id_content']);

    $query_header = $db->prepare("SELECT narsum_daftar_hadir_header.*, narsum_daftar_hadir_content.*, master_narasumber.nama, master_narasumber.ttd FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header JOIN master_narasumber ON master_narasumber.id = narsum_daftar_hadir_content.id_narsum WHERE narsum_daftar_hadir_content.id = :id_content");
    $query_header->bindParam(':id_content',$id_content);
    $query_header->execute();
    //$query_header = mysqli_query($koneksi,"SELECT narsum_daftar_hadir_header.id, narsum_daftar_hadir_header.tanggal, narsum_daftar_hadir_header.acara, narsum_daftar_hadir_content.id as id_content, narsum_daftar_hadir_content.id_header, narsum_daftar_hadir_content.id_narsum, master_narasumber.id, master_narasumber.nama FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header JOIN master_narasumber ON narsum_daftar_hadir_content.id_narsum = master_narasumber.id WHERE narsum_daftar_hadir_header.id = $id_header AND narsum_daftar_hadir_content.id_narsum = $id_content");
    $data = $query_header->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Ketersediaan Narasumber</title>
    <link rel="stylesheet" href="../../css/surat_ketersediaan_narsum.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="content">
        <!--<div class="header">
            <div class="header_kiri"style="width:50%;float:right;">
                <div class="sub_header_kiri">
                    <div>
                        <p class="hal">Hal</p>
                    </div>
                    <div>
                        <p>Kesediaan sebagai</p><p style="text-decoration: underline;">Narasumber</p>
                    </div>
                </div>
            </div>
            <div class="header_kanan" style="width:50%;float:right;">
                <p class="tanggal">Surabaya, <?php echo date('d-m-Y',strtotime($data['tanggal']))?></p>
                <p>Kepada</p>
                <p class="yth">Yth. Kepala Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Kota Surabaya</p>
                <p>di - </p><p style="text-decoration: underline;">Surabaya</p>
                
            </div>
        </div>-->
        <table>
            <tr>
                <td style="width: 50%;height:100px;"></td>
                <td>
                    Surabaya, <?php echo date('d-m-Y',strtotime($data['tanggal'].$data['tanggal_surat_kesediaan'].' day'))?>
                </td>
            </tr>
            <tr>
                <td style="height: 50px;"></td>
                <td>Kepada</td>
            </tr>
            <tr>
                <td style="height: 100px;"></td>
                <td>Yth. Kepala Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Kota Surabaya</td>
            </tr>
            <tr>
                <td style="height: 70px;">Hal <p>Kesediaan Sebagai Narasumber</p></td>
                <td>Di Surabaya</td>
            </tr>
            <tr>

            </tr>
        </table>
        <div class="isi_surat">
            <p>Sehubungan dengan surat Kepala Badan Kepegawaian Pengembangan Sumber Daya 
            Manusia Kota Surabaya Nomor : <?=$data['no_surat']?> tanggal <?php echo date('d-m-Y',strtotime($data['tgl_undangan']))?>, 
        Hal : Permohonan Sebagai Narasumber, maka saya bersedia hadir dalam kegiatan <?php echo $data['acara']?></p>
        </div>
        <!--<div class="ttd">
            <div class="ttd_kiri"></div>
            <div class="ttd_kanan">
                <p>Hormat Saya,</p>
                <?php 
                    if($data['ttd_narsum'] == 0){
                ?><br><br><br><br>
                <?php }else{?>
                    <img src="../../config/narasumber/master/dokumen_master/ttd/<?=$data['ttd']?>">
                <?php }?>
                <p>( <?php echo $data['nama']?> )</p>
            </div>
        </div>-->
        <table style="text-align:center;">
            <tr>
                <td style="width: 500px;"></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Hormat Saya,</td>
            </tr>
            <tr>
                <td style="height: 100px;">
            
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
                    if($data['ttd_narsum'] == 0){
                ?><br><br><br><br>
                <?php }else{?>
                    <img src="../../config/narasumber/master/dokumen_master/ttd/<?=$data['ttd']?>" width="200">
                <?php }?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>( <?php echo $data['nama']?> )</td>
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