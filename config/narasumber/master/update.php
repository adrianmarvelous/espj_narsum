<?php 
require_once '../../../koneksi.php';
include '../../../session.php';

    $id = htmlentities($_POST['id']);
    $nik = htmlentities($_POST['nik']);
    $nip = htmlentities($_POST['nip']);
    $nama = htmlentities($_POST['nama']);
    $instansi = htmlentities($_POST['instansi']);
    $npwp = htmlentities($_POST['npwp']);
    $status = htmlentities($_POST['status']);
    $golongan = htmlentities($_POST['golongan']);
    $nama_bank = htmlentities($_POST['nama_bank']);
    $rekening_narsum = htmlentities($_POST['rekening_narsum']);

    $query_update = $db->prepare("UPDATE master_narasumber SET nik=:nik,nip=:nip,nama=:nama,instansi=:instansi,npwp=:npwp,status=:status,golongan=:golongan,nama_bank=:nama_bank, rekening_narsum=:rekening_narsum WHERE id = :id");
    $query_update->bindParam(':nik',$nik);
    $query_update->bindParam(':nip',$nip);
    $query_update->bindParam(':nama',$nama);
    $query_update->bindParam(':instansi',$instansi);
    $query_update->bindParam(':npwp',$npwp);
    $query_update->bindParam(':status',$status);
    $query_update->bindParam(':golongan',$golongan);
    $query_update->bindParam(':nama_bank',$nama_bank);
    $query_update->bindParam(':rekening_narsum',$rekening_narsum);
    $query_update->bindParam(':id',$id);
    $query_update->execute();

    $kelengkapan = array("upload_npwp","upload_ktp","upload_cv","upload_kak","ttd");
    $lokasi = array("npwp","ktp","cv","kak","ttd");
    $jumlah = count($kelengkapan);
    for($i=0;$i<$jumlah;$i++){
        ${$kelengkapan[$i]} = $_FILES[$kelengkapan[$i]];

        $file_name = $_FILES[$kelengkapan[$i]]['name'];
        $file_size = $_FILES[$kelengkapan[$i]]['size'];
        if(!empty($file_name)){
            if($file_size > 10000000){
                echo "<script>alert('Ukuran file $kelengkapan[$i] terlalu besar');history.go(-1);</script>";
            }else{
                $query_file = $db->prepare("SELECT ".$kelengkapan[$i]." FROM master_narasumber WHERE id = :id");
                $query_file->bindParam(':id',$id);
                $query_file->execute();
                $query_file_lama = $query_file->fetch(PDO::FETCH_ASSOC);
                $file_lama = $query_file_lama[$kelengkapan[$i]];
                $file_lama;

                $directory = 'dokumen_master/'.$lokasi[$i].'/';
                $directory_delete = 'dokumen_master/'.$lokasi[$i].'/'.$file_lama;
                unlink($directory_delete);

                $acak = rand(00000000, 99999999);
                $FileExt       = substr($file_name, strrpos($file_name, '.'));
                $FileExt       = str_replace('.','',$FileExt);
                $file_name = preg_replace("/\.[^.\s]{3,4}$/", "", $file_name);
                $NewFileName   = $acak.'_'.$file_name.'.'.$FileExt;

                move_uploaded_file($_FILES[$kelengkapan[$i]]['tmp_name'],$directory.$NewFileName);
                //return $NewFileName;

                $query_insert = $db->prepare("UPDATE master_narasumber SET ".$kelengkapan[$i]." = :NewFileName WHERE id = :id");
                $query_insert->bindParam(':NewFileName',$NewFileName);
                $query_insert->bindParam(':id',$id);
                $query_insert->execute();
            }
        }
    }
    
    header('Location: ../../../index.php?pages=detail_narsum&id='.$id.'');
?>