<?php
$id_narsum = htmlentities($_SESSION['id']);
$query_narsum = $db->prepare("SELECT * FROM login_narsum WHERE id = :id_narsum");
$query_narsum->bindParam(':id_narsum', $id_narsum);
$query_narsum->execute();
$id_narsum_ = $query_narsum->fetch(PDO::FETCH_ASSOC);
$id = $id_narsum_['id_dokumen'];

$bulan = date("m");
include '../config/bulan.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link <?php if(!isset($_GET['status'])){echo "active";}?>" href="index.php"><?php echo $bulan_?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if(isset($_GET['status'])){echo "active";}?>" href="index.php?status=history">History</a>
        </li>
    </ul>
    <?php $i = 1;
    if(!isset($_GET['status'])){
        $query_acara = $db->prepare("SELECT narsum_daftar_hadir_header.*, narsum_daftar_hadir_content.ttd_narsum FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header WHERE narsum_daftar_hadir_content.id_narsum = :id_narsum AND month(narsum_daftar_hadir_header.tanggal) = :bulan");
        $query_acara->bindParam(':id_narsum', $id);
        $query_acara->bindParam(':bulan', $bulan);
    }else{
        $query_acara = $db->prepare("SELECT narsum_daftar_hadir_header.*, narsum_daftar_hadir_content.ttd_narsum FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header WHERE narsum_daftar_hadir_content.id_narsum = :id_narsum");
        $query_acara->bindParam(':id_narsum', $id);
    }
    $query_acara->execute();
    while ($acara = $query_acara->fetch(PDO::FETCH_ASSOC)) {
        $bulan = date('m', strtotime($acara['tanggal']));
        include '../config/bulan.php';
    ?>
        <div class="card" style="margin-top:20px;padding:20px;border-radius:15px;background-color:hsl(<?= rand(10, 100) ?>,<?= rand(70, 100) ?>%,<?= rand(85, 100) ?>%);box-shadow: 3px 3px 5px lightblue;">
            <div style="display: flex;justify-content:space-between">
                <p><?php echo $acara['acara'] ?></p>
                <?php 
                    if($acara['ttd_narsum'] == 0){
                ?>
                <i class="fa fa-lock-open"></i>
                <?php }else{?>
                <i class="fa fa-lock"></i>
                <?php }?>
            </div>
            <div style="display: flex;justify-content:space-between">
                <p><?php echo date('d', strtotime($acara['tanggal']))." - ".$bulan_ ." - ".date("Y", strtotime($acara['tanggal'])) ?></p>
                <p><?php echo date('H:i', strtotime($acara['pukul_mulai'])) ?></p>
            </div>
            <a class="stretched-link" href="index.php?pages=detail_acara&id_acara=<?= $acara['id'] ?>"></a>
        </div>
    <?php } ?>
</body>