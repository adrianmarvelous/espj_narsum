<?php 
    require_once '../../../koneksi.php';
    $id_content = htmlentities($_GET['id_content']);
    $id_acara = htmlentities($_GET['id_acara']);
    $paket_pekerjaan = htmlentities($_GET['paket_pekerjaan']);

    $query_delete = $db->prepare("DELETE FROM narsum_daftar_hadir_umum WHERE id = :id_content");
    $query_delete->bindParam(':id_content',$id_content);
    $query_delete->execute();

    echo "<script>window.location='../../../index.php?pages=view_resume&id=$id_acara&paket_pekerjaan=$paket_pekerjaan'</script>";
?>