<?php 
require_once '../../../koneksi.php';
//include '../../../session.php';
    
    $id = htmlentities($_GET['id']);
    $paket_pekerjaan = htmlentities($_GET['paket_pekerjaan']);

    $query_komponen = $db->prepare("SELECT komponen FROM narsum_daftar_hadir_header WHERE id = :id");
    $query_komponen->bindParam(':id',$id);
    $query_komponen->execute();
    $_komponen = $query_komponen->fetch(PDO::FETCH_ASSOC);
    $komponen = $_komponen['komponen'];

    switch($komponen){
        case "eselon 2":
            $total = 1000000;
            break;
        case "eselon 3":
            $total = 700000;
            break;
        case "eselon 4":
            $total = 600000;
            break;
        case "staff":
            $total = 500000;
            break;
        case "pakarpraktisi":
            $total = 1300000;
            break;
    }

    if(isset($_GET['tambah_peserta_umum'])){
        $nik = htmlentities($_GET['nik_peserta_umum']);
        $asal_tabel = 'umum';

        $query_narsum = $db->prepare("INSERT INTO narsum_daftar_hadir_umum (id_acara, nik_peserta, asal_tabel) VALUES (:id,:nik,:asal_tabel)");
        $query_narsum->bindParam(':id',$id);
        $query_narsum->bindParam(':nik',$nik);
        $query_narsum->bindParam(':asal_tabel',$asal_tabel);
        $query_narsum->execute();

        echo "<script>window.location='../../../index.php?pages=view_resume&id=$id&paket_pekerjaan=$paket_pekerjaan'</script>";
    }elseif(isset($_GET['tambah_peserta_asn'])){
        $nik = htmlentities($_GET['nik_peserta_asn']);
        $asal_tabel = 'asn_bkpsdm';

        $query_narsum = $db->prepare("INSERT INTO narsum_daftar_hadir_umum (id_acara, nik_peserta, asal_tabel)VALUES (:id,:nik,:asal_tabel)");
        $query_narsum->bindParam(':id',$id);
        $query_narsum->bindParam(':nik',$nik);
        $query_narsum->bindParam(':asal_tabel',$asal_tabel);
        $query_narsum->execute();

        echo "<script>window.location='../../../index.php?pages=view_resume&id=$id&paket_pekerjaan=$paket_pekerjaan'</script>";
    }elseif(isset($_GET['tambah_peserta_tenaga_kontrak'])){
        $nik = htmlentities($_GET['nik_tenaga_kontrak']);
        $asal_tabel = 'tenaga_kontrak';

        $query_narsum = $db->prepare("INSERT INTO narsum_daftar_hadir_umum (id_acara, nik_peserta, asal_tabel)VALUES (:id,:nik,:asal_tabel)");
        $query_narsum->bindParam(':id',$id);
        $query_narsum->bindParam(':nik',$nik);
        $query_narsum->bindParam(':asal_tabel',$asal_tabel);
        $query_narsum->execute();

        echo "<script>window.location='../../../index.php?pages=view_resume&id=$id&paket_pekerjaan=$paket_pekerjaan'</script>";
    }
    elseif(isset($_GET['tambah_narsum'])){
        
        $id_narsum = htmlentities($_GET['narasumber']);

        $query_narsum = $db->prepare("INSERT INTO narsum_daftar_hadir_content (id_header, id_narsum) VALUES (:id,:id_narsum)");
        $query_narsum->bindParam(':id', $id);
        $query_narsum->bindParam(':id_narsum', $id_narsum);
        $query_narsum->execute();


        $query_select = $db->prepare("SELECT status FROM narsum_daftar_hadir_header WHERE id = :id");
        $query_select->bindParam(':id',$id);
        $query_select->execute();
        $sts = $query_select->fetch(PDO::FETCH_ASSOC);
        $incsts = $sts['status'] + 1;
        $query_status = $db->prepare("UPDATE narsum_daftar_hadir_header SET status = :incsts  WHERE id = :id");
        $query_status->bindParam(':incsts',$incsts);
        $query_status->bindParam(':id',$id);
        $query_status->execute();

        echo "<script>window.location='../../../index.php?pages=view_resume&id=$id&paket_pekerjaan=$paket_pekerjaan'</script>";
    }elseif(isset($_GET['simpan'])){
        
        $id_content = $_GET['id_content'];
        $no_surat = $_GET['no_surat'];
        $id_transaksi = $_GET['id_transaksi'];

        $jumlah = count($id_content);

        for($i=0;$i<$jumlah;$i++){
            $query_update = $db->prepare("UPDATE narsum_daftar_hadir_content SET nominal_honor = :total, no_surat=:no_surat, id_transaksi =:id_transaksi WHERE id = :id_content");
            $query_update->bindParam(':total',$total);
            $query_update->bindParam(':no_surat',$no_surat[$i]);
            $query_update->bindParam(':id_transaksi',$id_transaksi[$i]);
            $query_update->bindParam(':id_content',$id_content[$i]);
            $query_update->execute();
        }

        
        echo "<script>window.location='../../../index.php?pages=hasil_lamp_pendukung&id=$id'</script>";
    }
?>