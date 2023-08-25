<?php
    require_once '../../koneksi.php';
    $id = htmlentities($_GET['id']);
    $nip = htmlentities($_SESSION['nip']);

    if(htmlentities($_SESSION['role']) == "pptk"){
        $update = $db->prepare("UPDATE narsum_daftar_hadir_header SET status_ttd = 1, pptk = :nip WHERE id = :id");
        $update->bindParam(':id',$id);
        $update->bindParam(':nip',$nip);
    }elseif(htmlentities($_SESSION['role']) == "bendahara"){
        $update = $db->prepare("UPDATE narsum_daftar_hadir_header SET status_ttd = 2, bendahara = :nip WHERE id = :id");
        $update->bindParam(':id',$id);
        $update->bindParam(':nip',$nip);
    }

    $update->execute();

    
    echo "<script>window.location='../../index.php?pages=hasil_lamp_pendukung&id=".filter_var($id, FILTER_SANITIZE_STRING)."'</script>";
?>