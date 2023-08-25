<?php 
    require_once '../../../../koneksi.php';
    include '../../../../../session.php';

    $nik = htmlentities($_POST['nik']);
    $nip = htmlentities($_POST['nip']);
    $nama = htmlentities($_POST['nama']);
    $instansi = htmlentities($_POST['instansi']);

    function re_name($nama){
        $file_name = $_FILES[$nama]['name'];
        $file_size = $_FILES[$nama]['size'];
        if(!empty($file_name)){
            if($file_size > 10000000){
                echo "<script>alert('Ukuran file $nama terlalu besar');history.go(-1);</script>";
            }else{
                $acak = rand(00000000, 99999999);
                $FileExt       = substr($file_name, strrpos($file_name, '.'));
                $FileExt       = str_replace('.','',$FileExt);
                $file_name = preg_replace("/\.[^.\s]{3,4}$/", "", $file_name);
                $NewFileName   = $acak.'_'.$file_name.'.'.$FileExt;
                $directory = $nama.'/';

                move_uploaded_file($_FILES[$nama]['tmp_name'],$directory.$NewFileName);
                return $NewFileName;
            }
        }
    }

    $nama_specimen = re_name("specimen");

    $query_insert = $db->prepare("INSERT INTO master_peserta_umum (nik, nip, nama, instansi, specimen) VALUES (:nik,:nip,:nama,:instansi,:nama_specimen)");
    $query_insert->bindParam(':nik',$nik);
    $query_insert->bindParam(':nip',$nip);
    $query_insert->bindParam(':nama',$nama);
    $query_insert->bindParam(':instansi',$instansi);
    $query_insert->bindParam(':nama_specimen',$nama_specimen);
    $query_insert->execute();

    header('Location: ../../../../index.php?pages=index_peserta_umum');
?>