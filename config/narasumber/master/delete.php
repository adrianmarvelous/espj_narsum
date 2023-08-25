<?php 
require_once '../../../koneksi.php';
include '../../../session.php';
    
$id = htmlentities($_GET['id']);

$delete = $db->prepare("DELETE FROM master_narasumber WHERE id=:id");
$delete->bindParam(':id',$id);
$delete->execute();

echo "<script>window.location='../../../index.php?pages=narasumber'</script>";

?>