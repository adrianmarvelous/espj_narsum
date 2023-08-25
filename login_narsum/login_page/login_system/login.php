<?php 
require_once '../../../koneksi.php';
//session_start();

// Secret Key ini kita ambil dari halaman Google reCaptcha
// Sesuai pada catatan saya di STEP 1 nomor 6
$secret_key = "6LcyqVQkAAAAACFIHiPFJXWjQ_tYcJbMOCbO9XCs";

// Disini kita akan melakukan komunkasi dengan google recpatcha
// dengan mengirimkan scret key dan hasil dari response recaptcha nya
/*$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
$response = json_decode($verify);*/


//if($response->success){ // Jika proses validasi captcha berhasil
$username = htmlentities($_POST['username']);
$password = htmlentities($_POST['password']);

$check_username = $db->prepare("SELECT * FROM login_narsum WHERE username = :username");
$check_username->bindParam(':username',$username);
$check_username->execute();
    //$check = mysqli_num_rows($check_username);
$data = $check_username->fetch(PDO::FETCH_ASSOC);
$id = $data['id'];
$data['password'];
if($check_username->rowCount() == 0){
    echo "<script>alert('Username belum terdaftar');window.location='../login.php'</script>";
}
else{
    if(password_verify($password,$data['password'])){
        $_SESSION['id'] = $data['id'];
        $_SESSION['role'] = "narsum";
        echo "<script>window.location='../../index.php'</script>";
    }else{
        echo "<script>alert('Password Salah');window.location='../login.php'</script>";
    }
}
/*}
else{
        echo "<script>alert('Captcha Tidak Valid');window.location='../login.php'</script>";
}*/
?>