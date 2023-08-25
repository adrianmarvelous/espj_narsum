<?php 
    require_once '../../../../koneksi.php';
    include '../../../../../session.php';

    $id = htmlentities($_GET['id']);

    $query_delete = $db->prepare("DELETE FROM master_peserta_umum WHERE id = :id");
    $query_delete->bindParam(':id',$id);
    $query_delete->execute();
    
    header('Location: ../../../../index.php?pages=index_peserta_umum');
?>