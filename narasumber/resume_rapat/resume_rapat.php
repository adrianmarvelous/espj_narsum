<?php 
    require_once '../../koneksi.php';
    require_once('../../plugin/phpqrcode/qrlib.php');
    require_once('../../plugin/mpdf/vendor/autoload.php');
    $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
    ob_start();

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    require_once('../../plugin/phpqrcode/qrlib.php');

    $id = htmlentities($_GET['id']);

    $query_header = $db->prepare("SELECT * FROM narsum_daftar_hadir_header WHERE id = :id");
    $query_header->bindParam(':id',$id);
    $query_header->execute();
    $data = $query_header->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Rapat</title>
    <link rel="stylesheet" href="../../css/resume_rapat.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
    <div class="content">
        <p class="title">Resume Rapat</p>
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
        </table>

        <p style="text-decoration: underline;">Masukan Rapat : </p>
        <?php echo html_entity_decode($data['masukan']);?>
        <p style="margin-top: 150px; text-decoration:underline; font-weight:bold;">Hadir Dalam Rapat :</p>
        <table class="table-responsive">
            <tr class="table table-bordered">
                <th>No</th>
                <th style="width: 200px;">Nama</th>
                <th style="width: 150px;">Instansi</th>
                <th>TTD</th>
            </tr>
        <?php 
            $i = 1;
            $query_kehadiran = $db->prepare("SELECT narsum_daftar_hadir_header.id, narsum_daftar_hadir_content.id as id_content,narsum_daftar_hadir_content.*, master_narasumber.* FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header JOIN master_narasumber ON narsum_daftar_hadir_content.id_narsum = master_narasumber.id WHERE narsum_daftar_hadir_header.id = :id");
            $query_kehadiran->bindParam(':id',$id);
            $query_kehadiran->execute();
            while($narsum = $query_kehadiran->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
                <td><?php echo $i++?></td>
                <td><?php echo $narsum['nama']?></td>
                <td><?php echo $narsum['instansi']?></td>
                <td>
                    <?php 
                        if($narsum['ttd_narsum'] == 0){}else{
                    ?>
                        <img src="../../config/narasumber/master/dokumen_master/ttd/<?=$narsum['ttd']?>" width="15%" height="13%">
                    <?php }?>
                </td>
            </tr>
        <?php }
            $query_content = $db->prepare("SELECT narsum_daftar_hadir_umum.*, master_peserta_umum.nama as nama_umum, master_peserta_umum.instansi, user_master_asn.nama as nama_asn, user_master_asn.nip as nip_asn, user_tenaga_kontrak.nama as nama_tenaga_kontrak, narsum_daftar_hadir_umum.asal_tabel, master_peserta_umum.specimen as ttd_umum FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_umum ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_umum.id_acara LEFT JOIN master_peserta_umum ON narsum_daftar_hadir_umum.nik_peserta = master_peserta_umum.nik LEFT JOIN user_master_asn ON user_master_asn.nik = narsum_daftar_hadir_umum.nik_peserta LEFT JOIN user_tenaga_kontrak ON user_tenaga_kontrak.nik = narsum_daftar_hadir_umum.nik_peserta WHERE narsum_daftar_hadir_header.id = :id");
            $query_content->bindParam(':id',$id);
            $query_content->execute();
            while($content = $query_content->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo $i++?></td>
            <td>
                <?php 
                    if($content['asal_tabel'] == 'umum'){
                        echo $content['nama_umum'];
                    }elseif($content['asal_tabel'] == 'asn_bkpsdm'){
                        echo $content['nama_asn'];
                    }else{
                        echo $content['nama_tenaga_kontrak'];
                    }
                ?>
            </td>
            <td>
                <?php 
                    if($content['asal_tabel'] == 'umum'){
                        echo $content['instansi'];
                    }else{
                        echo "Bagian Organisasi";
                    }
                ?>
            </td>
            <td>
            <?php 
                if($content['status'] == 1){
            ?>
            <?php 
                if($content['asal_tabel'] == 'umum'){?>
                    <img src="../../config/narasumber/master/dokumen_master/ttd/<?=$content['ttd']?>" width="100">
                <?php }elseif($content['asal_tabel'] == 'asn_bkpsdm'){?>
                    <img src="../../config/specimen/<?=$content['nip_asn']?>.png" width="100">
                <?php }else{?>
                    <img src="../../tenaga_kontrak/tenaga_kontrak_approve/specimen/<?=$content['nik_peserta']?>.png" width="100">
                <?php }
            ?>
            <?php }?>
            </td>
        </tr>
        <?php }?>
        </table>
    </div>
    <?php
    //file path
    $name_file = "resume_rapat_".$id;
    $file = "../../qr_code/".$name_file.".png";

    //other parameters
    /*$ecc = 'M';
    $pixel_size = 1.7;
    $frame_size = 2;*/

    // Generates QR Code and Save as PNG
    QRcode::png($actual_link, $id/*, $ecc, $pixel_size, $frame_size*/);

    // Displaying the stored QR code if you want
    echo "<div><img width=15% src='".$id."'></div>";
    ?>
    <!--<script>window.print()</script>-->
</body>
</html>
<?php
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>