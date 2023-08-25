<?php 
    require_once '../../../../koneksi.php';
    require_once '../../../../session.php';

    $id = htmlentities($_GET['id']);
    $id_narsum = htmlentities($_GET['narasumber']);

    $query_narsum = $db->prepare("INSERT INTO narsum_daftar_hadir_content (id_header, id_narsum) VALUES (:id,:id_narsum)");
    $query_narsum->bindParam(':id',$id);
    $query_narsum->bindParam(':id_narsum',$id_narsum);
    $query_narsum->execute();
    $query_select = $db->prepare("SELECT status FROM narsum_daftar_hadir_header WHERE id = :id");
    $query_select->bindParam(':id',$id);
    $query_select->execute();
    $sts =$query_select->fetch(PDO::FETCH_ASSOC);
    $incsts = $sts['status'] + 1;
    $query_status = $db->prepare("UPDATE narsum_daftar_hadir_header SET status = :incsts  WHERE id = :id");
    $query_status->bindParam(':sts',$sts);
    $query_status->bindParam(':id',$id);
    $query_status->execute();

    echo "<script>window.location='../../../../index.php?pages=view_resume&id=$id'</script>";
?>