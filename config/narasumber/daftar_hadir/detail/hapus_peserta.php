<?php 
    require_once '../../../../koneksi.php';
    include '../../../../session.php';
    $id_content = htmlentities($_GET['id_content']);
    $id_header = htmlentities($_GET['id_header']);
    $paket_pekerjaan = htmlentities($_GET['paket_pekerjaan']);

    $query_delete = $db->prepare("DELETE FROM narsum_daftar_hadir_content WHERE id = :id_content");
    $query_delete->bindParam(':id_content',$id_content);
    $query_delete->execute();

    $query_select = $db->prepare("SELECT status FROM narsum_daftar_hadir_header WHERE id = :id_header");
    $query_select->bindParam(':id_header',$id_header);
    $query_select->execute();
    $sts = $query_select->fetch(PDO::FETCH_ASSOC);
    $incsts = $sts['status'] - 1;
    $query_status = $db->prepare("UPDATE narsum_daftar_hadir_header SET status = :incsts  WHERE id = :id_header");
    $query_status->bindParam(':incsts',$incsts);
    $query_status->bindParam(':id_header',$id_header);
    $query_status->execute();

    echo "<script>window.location='../../../../index.php?pages=view_resume&id=$id_header&paket_pekerjaan=$paket_pekerjaan'</script>";
?>