<?php 
    require_once '../../../koneksi.php';

    $id = $_POST['id'];
    $nama_penyedia = $_POST['nama_penyedia'];
    $nama_direktur = $_POST['nama_direktur'];
    $alamat_penyedia = $_POST['alamat_penyedia'];
    $telephone_penyedia = $_POST['telephone_penyedia'];
    $rekening_penyedia = $_POST['rekening_penyedia'];
    $npwp = $_POST['npwp'];

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

                //move_uploaded_file($_FILES[$nama]['tmp_name'],$directory.$NewFileName);
                return $NewFileName;
            }
        }
    }
    $file_npwp = re_name("file_npwp");
    $file_pkp = re_name("file_pkp");
    $file_referensi_bank = re_name("file_referensi_bank");
    $file_siup = re_name("file_siup");
    $file_nib = re_name("file_nib");
    $file_specimen = re_name("file_specimen");
    $file_stempel = re_name("file_stempel");

    $update = mysqli_query($koneksi, "UPDATE login_penyedia SET status_dokumen = 1 WHERE id = $id");

    $insert = mysqli_query($koneksi, "INSERT INTO `penyedia`(`id_penyedia`, `nama_penyedia`, `nama_direktur`, `alamat_penyedia`, `telephone_penyedia`, `rekening_penyedia`, `npwp`, `npwp_pendukung`, `pkp_pendukung`, `referensi_bank_pendukung`, `siup_pendukung`, `nib_pendukung`, `specimen`, `stempel`) VALUES ('$id','$nama_penyedia','$nama_direktur','$alamat_penyedia','$telephone_penyedia','$rekening_penyedia','$npwp','$file_npwp','$file_pkp','$file_referensi_bank','$file_siup','$file_nib','$file_specimen','$file_stempel')");
    
    echo "<script>window.location='../../index.php'</script>";
?>