<?php 
require_once '../../../koneksi.php';
include '../../../session.php';

    $nama = htmlentities($_POST['nama']);
    $nik = htmlentities($_POST['nik']);
    $instansi = htmlentities($_POST['instansi']);
    $npwp = htmlentities($_POST['npwp']);
    $status = htmlentities($_POST['status']);
    //$golongan = htmlentities($_POST['golongan']);
    //$nip = htmlentities($_POST['nip']);
    $nama_bank = htmlentities($_POST['nama_bank']);
    $rekening_narsum = htmlentities($_POST['rekening_narsum']);

    if(htmlentities(isset($_POST['golongan']))){
        $golongan = htmlentities($_POST['golongan']);
    }else{
        $golongan = "";
    }
    if(htmlentities(isset($_POST['nip']))){
        $nip = htmlentities($_POST['nip']);
    }else{
        $nip = "";
    }
        
        function re_name($nama){
            $file_name = htmlentities($_FILES[$nama]['name']);
            $file_size = htmlentities($_FILES[$nama]['size']);
            if(!empty($file_name)){
                if($file_size > 10000000){
                    echo "<script>alert('Ukuran file $nama terlalu besar');history.go(-1);</script>";
                }else{
                    $acak = rand(00000000, 99999999);
                    $FileExt       = substr($file_name, strrpos($file_name, '.'));
                    $FileExt       = str_replace('.','',$FileExt);
                    $file_name = preg_replace("/\.[^.\s]{3,4}$/", "", $file_name);
                    $NewFileName   = $acak.'_'.$file_name.'.'.$FileExt;
                    if($nama == 'upload_npwp'){
                        $directory = 'dokumen_master/npwp/';
                    }elseif($nama == 'upload_ktp'){
                        $directory = 'dokumen_master/ktp/';
                    }elseif($nama == 'upload_cv'){
                        $directory = 'dokumen_master/cv/';
                    }elseif($nama == 'upload_kak'){
                        $directory = 'dokumen_master/kak/';
                    }elseif($nama == 'ttd'){
                        $directory = 'dokumen_master/ttd/';
                    }
                    //$directory = $nama.'/';

                    move_uploaded_file($_FILES[$nama]['tmp_name'],$directory.$NewFileName);
                    return $NewFileName;
                }
            }
        }
        //$nama_edelivery = re_name("edelivery");
        $nama_upload_npwp = re_name("upload_npwp");
        $nama_upload_ktp = re_name("upload_ktp");
        $nama_upload_cv = re_name("upload_cv");
        $nama_upload_kak = re_name("upload_kak");
        $nama_ttd = re_name("ttd");
        /*
        $upload_npwp = $_FILES['upload_npwp'];
        $upload_ktp = $_FILES['upload_ktp'];
        $upload_cv = $_FILES['upload_cv'];
        $upload_kak = $_FILES['upload_kak'];

        $files_npwp = $_FILES['upload_npwp']['name'];
        $files_ktp = $_FILES['upload_ktp']['name'];
        $files_cv = $_FILES['upload_cv']['name'];
        $files_kak = $_FILES['upload_kak']['name'];

        move_uploaded_file($_FILES['upload_npwp']['tmp_name'],'dokumen_master/npwp/'.$files_npwp);
        move_uploaded_file($_FILES['upload_ktp']['tmp_name'],'dokumen_master/ktp/'.$files_ktp);
        move_uploaded_file($_FILES['upload_cv']['tmp_name'],'dokumen_master/cv/'.$files_cv);
        move_uploaded_file($_FILES['upload_kak']['tmp_name'],'dokumen_master/kak/'.$files_cv);*/

        $query_narasumber = $db->prepare("INSERT INTO master_narasumber (nip, nik, nama, instansi, npwp, status, golongan, nama_bank, rekening_narsum, upload_npwp, upload_ktp, upload_cv, upload_kak, ttd) VALUES (:nip,:nik,:nama,:instansi,:npwp,:status,:golongan,:nama_bank,:rekening_narsum,:nama_upload_npwp,:nama_upload_ktp,:nama_upload_cv,:nama_upload_kak,:nama_ttd)");
        $query_narasumber->bindParam(':nip',$nip);
        $query_narasumber->bindParam(':nik',$nik);
        $query_narasumber->bindParam(':nama',$nama);
        $query_narasumber->bindParam(':instansi',$instansi);
        $query_narasumber->bindParam(':npwp',$npwp);
        $query_narasumber->bindParam(':status',$status);
        $query_narasumber->bindParam(':golongan',$golongan);
        $query_narasumber->bindParam(':nama_bank',$nama_bank);
        $query_narasumber->bindParam(':rekening_narsum',$rekening_narsum);
        $query_narasumber->bindParam(':nama_upload_npwp',$nama_upload_npwp);
        $query_narasumber->bindParam(':nama_upload_ktp',$nama_upload_ktp);
        $query_narasumber->bindParam(':nama_upload_cv',$nama_upload_cv);
        $query_narasumber->bindParam(':nama_upload_kak',$nama_upload_kak);
        $query_narasumber->bindParam(':nama_ttd',$nama_ttd);
        $query_narasumber->execute();
    
    echo "<script>window.location='../../../index.php?pages=narasumber'</script>";

?>