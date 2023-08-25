<?php 
    require_once '../../koneksi.php';
    require_once('../../plugin/phpqrcode/qrlib.php');
    require_once('../../plugin/mpdf/vendor/autoload.php');
    $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
    ob_start();
    //error_reporting(0);

    $id_acara = htmlentities($_GET['id']);
    $query_header = $db->prepare("SELECT narsum_daftar_hadir_header.*, narsum_daftar_hadir_content.ttd_narsum, narsum_daftar_hadir_content.id_transaksi, master_narasumber.ttd FROM narsum_daftar_hadir_content JOIN master_narasumber ON master_narasumber.id = narsum_daftar_hadir_content.id_narsum JOIN narsum_daftar_hadir_header ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header WHERE narsum_daftar_hadir_header.id = :id_acara");
    $query_header->bindParam(':id_acara',$id_acara);
    $query_header->execute();
    $header = $query_header->fetch(PDO::FETCH_ASSOC);
    $id_bidang  = $header['id_bidang'];

    
    $query_header_ = $db->prepare("SELECT * FROM narsum_daftar_hadir_header WHERE id = :id");
    $query_header_->bindParam(':id',$id_acara);
    $query_header_->execute();
    $header_ = $query_header_->fetch(PDO::FETCH_ASSOC);

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
    <p class="title">DAFTAR HADIR ACARA</p>
    <div class="content">
        <div class="header">
            <table>
                <tr>
                    <td style="width: 100px;">Tanggal</td>
                    <td style="width: 50px;">:</td>
                    <td><?php echo date("d-m-Y", strtotime($header_['tanggal']))?></td>
                </tr>
                <tr>
                    <td>Pukul</td>
                    <td>:</td>
                    <td><?php echo $header_['pukul_mulai']?> - <?php echo $header_['pukul_selesai']?></td>
                </tr>
                <tr>
                    <td>Acara</td>
                    <td>:</td>
                    <td><?php echo $header_['acara']?></td>
                </tr>
                <tr>
                    <td>Tempat</td>
                    <td>:</td>
                    <td><?php echo $header_['tempat']?></td>
                </tr>
            </table>
        </div>
        <div class="table_content">
            <table class="table1">
                <tr>
                    <th style="width: 50px;border:1px solid;">No</th>
                    <th style="border:1px solid;">Nama</th>
                    <th style="border:1px solid;">Instansi</th>
                    <th style="border:1px solid;">Tanda Tangan</th>
                </tr>
                <?php 
                    $i = 1;
                    $query_narsum = $db->prepare("SELECT narsum_daftar_hadir_header.*, narsum_daftar_hadir_content.*, master_narasumber.nama, master_narasumber.instansi, master_narasumber.ttd FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header JOIN master_narasumber ON master_narasumber.id = narsum_daftar_hadir_content.id_narsum WHERE narsum_daftar_hadir_header.id = :id_acara");
                    $query_narsum->bindParam(':id_acara',$id_acara);
                    $query_narsum->execute();
                    while($narsum = $query_narsum->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td style="border:1px solid;text-align:center;"><?php echo $i++?></td>
                    <td style="border:1px solid;"><?php echo $narsum['nama']?></td>
                    <td style="border:1px solid;"><?php echo $narsum['instansi']?></td>
                    <td style="border:1px solid;">
                    <?php 
                        if($narsum['ttd_narsum'] == 1){
                    ?><center>
                    <img src="../../config/narasumber/master/dokumen_master/ttd/<?=$narsum['ttd']?>" width="14%" height="12%">
                    <?php }?></center>
                    </td>
                </tr>
                <?php }
                    $query_content = $db->prepare("SELECT narsum_daftar_hadir_umum.*, master_peserta_umum.nama as nama_umum, master_peserta_umum.instansi, user_master_asn.nama as nama_asn, user_master_asn.nip as nip_asn, user_tenaga_kontrak.nama as nama_tenaga_kontrak, narsum_daftar_hadir_umum.asal_tabel, master_peserta_umum.specimen as ttd_umum FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_umum ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_umum.id_acara LEFT JOIN master_peserta_umum ON narsum_daftar_hadir_umum.nik_peserta = master_peserta_umum.nik LEFT JOIN user_master_asn ON user_master_asn.nik = narsum_daftar_hadir_umum.nik_peserta LEFT JOIN user_tenaga_kontrak ON user_tenaga_kontrak.nik = narsum_daftar_hadir_umum.nik_peserta WHERE narsum_daftar_hadir_header.id = :id_acara");
                    $query_content->bindParam(':id_acara',$id_acara);
                    $query_content->execute();
                    while($content = $query_content->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td style="border:1px solid;text-align:center;"><?php echo $i++?></td>
                    <td style="border:1px solid;">
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
                    <td style="border:1px solid;">
                    <?php 
                        if($content['asal_tabel'] == 'umum'){
                            echo $content['instansi'];
                        }else{
                            echo "Badan Kepegawaian dan Pengembangan Sumber Daya Manusia";
                        }
                    ?>
                    </td>
                    <td style="border:1px solid;">
                    <?php 
                        if($content['status'] == 1){
                            if($content['asal_tabel'] == "umum"){
                    ?>
                    <img src="../../config/narasumber/peserta_umum/master/specimen/<?=$content['ttd_umum']?>" width="100">
                    <?php }elseif($content['asal_tabel'] == "asn_bkpsdm"){?>
                    <img src="../../config/specimen/<?=$content['nip_asn']?>.png" width="100">
                    <?php }else{?>
                    <img src="../../tenaga_kontrak/tenaga_kontrak_approve/specimen/<?=$content['nik_peserta']?>.png" width="100">
                    <?php }}?>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
        <div style="display: flex;">
            <div style="width: 50%;">
            </div>
            <div style="text-align: center;margin-left:350px">
                <p>Pejabat Pembuat Komitmen</p>
                <?php 
                    if($header['status_ttd'] >= 1){
                ?>
                    <img src="../../config/specimen/<?=$header['pptk']?>.png" width="150">
                <?php }?>
                <!-- <img src="../../config/specimen/<?=$nip?>.png" width="150"> -->
                <?php
                    $query_pptk = $db->prepare("SELECT * FROM user_master_asn WHERE nip = :pptk");
                    $query_pptk->bindParam(':pptk',$header['pptk']);
                    $query_pptk->execute();
                    $pptk = $query_pptk->fetch(PDO::FETCH_ASSOC);
                ?>
                <p><?php echo $pptk['nama']?></p>
                <p><?php //echo $pptk['jabatan']?></p>
                <p>NIP. <?php echo $pptk['nip']?></p>
            </div>
        </div>
    </div>
</body>
</html>
<?php
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>