<?php 
    require_once '../../koneksi.php';
    require_once '../../session.php';

    $id_acara = htmlentities($_GET['id_acara']);
    $id_narsum = htmlentities($_GET['id_narsum']);

    $approve = $db->prepare("UPDATE narsum_daftar_hadir_content SET ttd_narsum = 1 WHERE id_header = :id_acara AND id_narsum = :id_narsum");
    $approve->bindParam(':id_acara',$id_acara);
    $approve->bindParam(':id_narsum',$id_narsum);
    $approve->execute();

    header('Location: ../index.php?pages=detail_acara&id_acara='.$id_acara.'');
?>