<?php 
require_once '../../../koneksi.php';
include '../../../session.php';
    
$id = htmlentities($_GET['id']);

$delete1 = $db->prepare("DELETE FROM narsum_daftar_hadir_header WHERE id=:id");
$delete1->bindParam(':id',$id);
$delete1->execute();

$delete2 = $db->prepare("DELETE FROM narsum_daftar_hadir_content WHERE id_header=:id");
$delete2->bindParam(':id',$id);
$delete2->execute();

echo "<script>window.location='../../../index.php?pages=list_acara'</script>";

?>