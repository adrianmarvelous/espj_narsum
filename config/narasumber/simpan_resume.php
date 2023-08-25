<?php 
    require_once '../../koneksi.php';
    require_once '../../session.php';
    $id = htmlentities($_GET['id']);
    $masukan = htmlentities($_GET['masukan']);

    $query_masukan = $db->prepare("UPDATE narsum_daftar_hadir_header SET `masukan` = :masukan WHERE id = :id");
    $query_masukan->bindParam(':masukan',$masukan);
    $query_masukan->bindParam(':id',$id);
    $query_masukan->execute();

    echo "<script>window.location='../../index.php?pages=view_resume&id=".filter_var($id, FILTER_SANITIZE_STRING)."'</script>";
?>