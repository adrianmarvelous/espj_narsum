<?php
    require_once '../../../koneksi.php';

    $id = htmlentities($_GET['id']);
    $masukan = htmlentities($_GET['masukan']);
    $nik = htmlentities($_SESSION['nik']);

    $update_header = $db->prepare("UPDATE narsum_daftar_hadir_header SET masukan = :masukan WHERE id = :id");
    $update_header->bindParam(':masukan',$masukan);
    $update_header->bindParam(':id',$id);
    $update_header->execute();

    $update_content = $db->prepare("UPDATE narsum_daftar_hadir_umum SET status = 1 WHERE id_acara = :id AND nik_peserta = :nik");
    $update_content->bindParam(':id',$id);
    $update_content->bindParam(':nik',$nik);
    $update_content->execute();

    
    echo "<script>window.location='../../../client.php?pages=index_acara&id=".filter_var($id, FILTER_SANITIZE_STRING)."'</script>";


?>