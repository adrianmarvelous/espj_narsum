<?php 
    require_once '../../../koneksi.php';
    require_once '../../../session.php';

    $id = htmlentities($_GET['id']);
    $nik = htmlentities($_GET['nik']);

    $query_narsum = $db->prepare("INSERT INTO narsum_daftar_hadir_umum (id_acara, nik_peserta) VALUES (:id,:nik)");
    $query_narsum->bindParam(':id',$id);
    $query_narsum->bindParam(':nik',$nik);
    $query_narsum->execute();

    echo "<script>window.location='../../../index.php?pages=view_resume&id=".filter_var($id, FILTER_SANITIZE_STRING)."'</script>";
?>