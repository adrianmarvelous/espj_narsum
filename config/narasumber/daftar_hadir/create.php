<?php 
require_once '../../../koneksi.php';
include '../../../session.php';

$tanggal = htmlentities($_GET['tanggal']);
$tanggal_surat_kesediaan = htmlentities($_GET['tanggal_surat_kesediaan']);
$acara = htmlentities($_GET['acara']);
$tempat = htmlentities($_GET['tempat']);
$pukul_mulai = htmlentities($_GET['pukul_mulai']);
$pukul_selesai = htmlentities($_GET['pukul_selesai']);
$id_bidang = htmlentities($_GET['id_bidang']);
$tgl_undangan = htmlentities($_GET['tgl_undangan']);
$komponen = htmlentities($_GET['komponen']);
$daring_luring = htmlentities($_GET['daring_luring']);
$paket_pekerjaan = htmlentities($_GET['paket_pekerjaan']);
//$id_npd = htmlentities($_GET['id_npd']);

$query_last_id = $db->prepare("SELECT max(id) as id FROM narsum_daftar_hadir_header");
$query_last_id->execute();
$id_terakhir = $query_last_id->fetch(PDO::FETCH_ASSOC);
$last_id = $id_terakhir['id']+1;

$query_header = $db->prepare("INSERT INTO narsum_daftar_hadir_header (id, tanggal, tanggal_surat_kesediaan, acara, tempat,pukul_mulai, pukul_selesai, id_bidang, tgl_undangan, komponen, paket_pekerjaan, daring_luring) VALUES (:last_id,:tanggal,:tanggal_surat_kesediaan,:acara,:tempat,:pukul_mulai,:pukul_selesai,:id_bidang,:tgl_undangan,:komponen,:paket_pekerjaan,:daring_luring)");
$query_header->bindParam(':last_id',$last_id);
$query_header->bindParam(':tanggal',$tanggal);
$query_header->bindParam(':tanggal_surat_kesediaan',$tanggal_surat_kesediaan);
$query_header->bindParam(':acara',$acara);
$query_header->bindParam(':tempat',$tempat);
$query_header->bindParam(':pukul_mulai',$pukul_mulai);
$query_header->bindParam(':pukul_selesai',$pukul_selesai);
$query_header->bindParam(':id_bidang',$id_bidang);
$query_header->bindParam(':tgl_undangan',$tgl_undangan);
$query_header->bindParam(':komponen',$komponen);
$query_header->bindParam(':paket_pekerjaan',$paket_pekerjaan);
$query_header->bindParam(':daring_luring',$daring_luring);
$query_header->execute();

echo "<script>window.location='../../../index.php?pages=view_resume&id=$last_id&paket_pekerjaan=$paket_pekerjaan'</script>";
?>