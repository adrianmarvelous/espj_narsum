<?php 
    require_once '../../koneksi.php';

    $id_acara = htmlentities($_GET['id_acara']);
    $id_narsum = htmlentities($_GET['id_narsum']);
    $masukan = htmlentities($_GET['masukan']);

    $insert = $db->prepare("UPDATE narsum_daftar_hadir_content SET masukan = :masukan, ttd_narsum = 1 WHERE id_header = :id_acara AND id_narsum = :id_narsum");
    $insert->bindParam(':masukan',$masukan);
    $insert->bindParam(':id_acara',$id_acara);
    $insert->bindParam(':id_narsum',$id_narsum);
    $insert->execute();

    header('Location: ../index.php?pages=detail_acara&id_acara='.$id_acara.'');
?>