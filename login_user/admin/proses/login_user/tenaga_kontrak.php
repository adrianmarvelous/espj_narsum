<?php 
    require_once '../../../../koneksi.php';
    session_start();

    $nik = htmlentities($_GET['nik']);

    $query_tenaga_kontrak = $db->prepare("SELECT * FROM tenaga_kontrak_master WHERE nik = :nik");
    $query_tenaga_kontrak->bindParam(':nik',$nik);
    $query_tenaga_kontrak->execute();
    $tenaga_kontrak = $query_tenaga_kontrak->fetch(PDO::FETCH_ASSOC);

    $_SESSION['nama'] = $tenaga_kontrak['nama'];
    $_SESSION['nik'] = $tenaga_kontrak['nik'];

    header('Location: ../../../../tenaga_kontrak/tenaga_kontrak_approve/index.php');
?>