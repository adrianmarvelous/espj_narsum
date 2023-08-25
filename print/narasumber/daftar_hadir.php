<?php 
    require_once '../../koneksi.php';

    $id_acara = $_GET['id_acara'];
    //$id_npd = $_GET['id_npd'];
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
    //$query_pptk = $db->prepare($koneksi,"SELECT id, pptk FROM npd_header WHERE id = $id_npd");
    //$pptk = mysqli_fetch_array($query_pptk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hadir</title>
    <link rel="stylesheet" href="../../css/narasumber/daftar_hadir.css">
</head>
<body>
    <p class="title">DAFTAR HADIR</p>
    <div class="content">
        <div class="header">
            <table>
                <tr>
                    <td style="width: 100px;">Tanggal</td>
                    <td style="width: 50px;">:</td>
                    <td><?php echo $header['tanggal']?></td>
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
                    <th style="border:1px solid;">Instansi</th>
                    <th style="border:1px solid;">Tanda Tangan</th>
                </tr>
                <?php 
                $i = 1;
                    $query_content = $db->prepare("SELECT narsum_daftar_hadir_content.*, 
                    master_narasumber.* FROM narsum_daftar_hadir_content JOIN master_narasumber ON 
                    narsum_daftar_hadir_content.id_narsum = master_narasumber.id WHERE id_header = :id_acara;");
                    $query_content->bindParam(':id_acara',$id_acara);
                    $query_content->execute();
                    while($content = $query_content->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td style="border:1px solid;text-align:center;"><?php echo $i++?></td>
                    <td style="border:1px solid;"><?php echo $content['nama']?></td>
                    <td style="border:1px solid;"><?php echo $content['instansi']?></td>
                    <td style="border:1px solid;">
                    <?php 
                        if($content['ttd_narsum'] == 1){
                    ?>
                    <img src="../../config/narasumber/master/dokumen_master/ttd/<?=$content['ttd']?>" width="100">
                    <?php }?>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
        <div style="display: flex;">
            <div style="width: 50%;"></div>
            <div style="width: 50%;">
            <div style="text-align: center;">
                <p>Pejabat Pembuat Komitmen</p>
                <?php 
                    if($header['ttd_ppk'] == 1){
                ?>
                    <img src="../../config/specimen/<?=$nip?>.png">
                <?php }?>
                <p><?php echo $pptk?></p>
                <p>Penata IV</p>
                <p>NIP. <?php echo $nip?></p>
            </div>
            </div>
        </div>
    </div>
</body>
</html>