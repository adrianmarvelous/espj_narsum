<?php 
require_once '../../../koneksi.php';

    // echo $nomer = htmlentities($_GET['nomer']);
    echo $id = htmlentities($_GET['id']);
    $tanggal = htmlentities($_GET['tanggal']);
    $tanggal_surat_kesediaan = htmlentities($_GET['tanggal_surat_kesediaan']);
    $tgl_undangan = htmlentities($_GET['tgl_undangan']);
    $pukul_mulai = htmlentities($_GET['pukul_mulai']);
    $pukul_selesai = htmlentities($_GET['pukul_selesai']);
    $acara = htmlentities($_GET['acara']);
    $tempat = htmlentities($_GET['tempat']);
    $resume = htmlentities($_GET['resume']);

    
    // $update = $db->prepare("UPDATE dokumen_realisasi SET id_header = :nomer WHERE id_acara = :id_acara");
    // $update->bindParam(':nomer',$nomer);
    // $update->bindParam(':id_acara',$id);
    // $update->execute();

    $query_daftar = $db->prepare("UPDATE `narsum_daftar_hadir_header` SET `tanggal`=:tanggal,`tanggal_surat_kesediaan`=:tanggal_surat_kesediaan,`tgl_undangan`=:tgl_undangan, `pukul_mulai`=:pukul_mulai, `pukul_selesai`=:pukul_selesai, `acara`=:acara, `tempat`=:tempat, `masukan`=:resume, `no_npd`=:nomer WHERE id=:id");
    $query_daftar->bindParam(':tanggal',$tanggal);
    $query_daftar->bindParam(':tanggal_surat_kesediaan',$tanggal_surat_kesediaan);
    $query_daftar->bindParam(':tgl_undangan',$tgl_undangan);
    $query_daftar->bindParam(':pukul_mulai',$pukul_mulai);
    $query_daftar->bindParam(':pukul_selesai',$pukul_selesai);
    $query_daftar->bindParam(':acara',$acara);
    $query_daftar->bindParam(':tempat',$tempat);
    $query_daftar->bindParam(':resume',$resume);
    $query_daftar->bindParam(':id',$id);
    $query_daftar->bindParam(':nomer',$nomer);
    $query_daftar->execute();
    
    echo "<script>window.location='../../../index.php?pages=hasil_lamp_pendukung&id=".filter_var($id, FILTER_SANITIZE_STRING)."'</script>";

?>