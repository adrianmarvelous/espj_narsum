<?php
//login-proses.php
require_once '../../koneksi.php';
$periode_tahun = htmlentities($_POST['tahun']);

/*if(!$login->cek_salah_login()){
	//kalau user salah login melebihi batas yang ditentukan, maka proses langsung berhenti
	create_alert("error","Mohon maaf Anda tidak dapat login lagi karena kesalahan login Anda terlalu banyak. Hubungi Administrator untuk informasi lebih lanjut","../../login_system/filter.php");
}*/

//tombol $_POST['btn'] harus ditekan. kalau tidak ditekan artinya nggak ada proses apapun yang dijalankan
if(isset($_POST['submit'])){
	// Secret Key ini kita ambil dari halaman Google reCaptcha
    // Sesuai pada catatan saya di STEP 1 nomor 6
	$secret_key = "6LcyqVQkAAAAACFIHiPFJXWjQ_tYcJbMOCbO9XCs";

    // Disini kita akan melakukan komunkasi dengan google recpatcha
    // dengan mengirimkan scret key dan hasil dari response recaptcha nya
	$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
	$response = json_decode($verify);

    //if($response->success){ // Jika proses validasi captcha berhasil
    	$username = htmlentities($_POST['username']);
    	$password = htmlentities($_POST['password']);

	//step 1 : cek apakah username ada di tabel 
    	$cek = $db->query("SELECT * FROM user_master_asn WHERE nip = ".$db->quote($username));

	//step 2 : cek apakah username tenaga kontrak ada di tabel 
    	$cek_tenaga_kontrak = $db->query("SELECT * FROM user_tenaga_kontrak WHERE nik = ".$db->quote($username));

	//step 3 : cek apakah username ada di tabel 
		$cek_admin = $db->query("SELECT * FROM user_admin WHERE username = ".$db->quote($username));

    	if($cek->rowCount() > 0){
		//username ada, tangkap password yg ada di database
    		$row = $cek->fetch();
    		$password_db = $row['password'];
		#password_verify adalah fungsi PHP 5.5> yang otomatis mengecek kesamaan inputan dengan hash 
    		if(password_verify($password, $password_db)){
			//password sudah cocok

    			$expired = 0;
    			if(isset($_POST['remember'])){
    				if($_POST['remember'] = 1){
					$expired = '+1 year'; // 1 tahun
				}
			}
			#kalau remember me dicentang, login akan expired dalam waktu 1 tahun, selain itu ya akan seperti session biasa yang hilang ketika diclose

			if ($row['ganti_password'] == 0) {
			$login->ganti_password($username); //pencatatan token akan dilakukan disini
		}
		else{
			$login->true_login($username, $expired,$periode_tahun); //pencatatan token akan dilakukan disini
			create_alert("success","Log In Berhasil","../../login_system/filter.php");
		}
	}
	else{
		if ($row['ganti_password'] == 0) {
			$login->ganti_password($username); //pencatatan token akan dilakukan disini
		}
		else{
			//password tidak cocok
			$login->salah_login_action($username,$periode_tahun); //pencatatan kesalahan login
			create_alert("error","Username atau password tersebut salah","../../login_system/filter.php");
		}
	}

}

if($cek_tenaga_kontrak->rowCount() > 0){
		//username ada, tangkap password yg ada di database
	$row_tenaga_kontrak = $cek_tenaga_kontrak->fetch();
	$password_db = $row_tenaga_kontrak['password'];
		#password_verify adalah fungsi PHP 5.5> yang otomatis mengecek kesamaan inputan dengan hash 
	if(password_verify($password, $password_db)){
			//password sudah cocok

		$expired = 0;
		if(isset($_POST['remember'])){
			if($_POST['remember'] = 1){
					$expired = '+1 year'; // 1 tahun
				}
			}
			#kalau remember me dicentang, login akan expired dalam waktu 1 tahun, selain itu ya akan seperti session biasa yang hilang ketika diclose
			if ($row_tenaga_kontrak['ganti_password'] == 0) {
			$login->ganti_password_tenaga_kontrak($username); //pencatatan token akan dilakukan disini
		}
		else{
			$login->true_login($username, $expired,$periode_tahun); //pencatatan token akan dilakukan disini
			create_alert("success","Log In Berhasil","../../login_system/filter.php");
		}
	}
	else{
		if ($row_tenaga_kontrak['ganti_password'] == 0) {
			$login->ganti_password_tenaga_kontrak($username); //pencatatan token akan dilakukan disini
		}
		else{
			//password tidak cocok
			$login->salah_login_action($username,$periode_tahun); //pencatatan kesalahan login
			create_alert("error","Username atau password tersebut salah","../../login_system/filter.php");
		}
	}

}

if($cek_admin->rowCount() > 0){
	$admin = $cek_admin->fetch();
	$password_db = $admin['password'];

	if(password_verify($password, $password_db)){
		//password sudah cocok

	$expired = 0;
	if(isset($_POST['remember'])){
		if($_POST['remember'] = 1){
				$expired = '+1 year'; // 1 tahun
			}
		}
		$login->true_login($username, $expired,$periode_tahun); //pencatatan token akan dilakukan disini
		create_alert("success","Log In Berhasil","../../login_system/filter.php");
	}else{
		$login->salah_login_action($username,$periode_tahun); //pencatatan kesalahan login
		create_alert("error","Username atau password tersebut salah","../../login_system/filter.php");
	}
}

else{
		$login->salah_login_action($username,$periode_tahun); //pencatatan kesalahan login
		create_alert("error","Username atau password tersebut tidak terdaftar","../../login_system/filter.php");
	}
/*}

else{
	echo "<h2>Captcha Tidak Valid</h2>";
	echo "Ohh sorry, you're not human (Anda bukan manusia)<hr>";
	echo "Silahkan klik kotak I'm not robot (reCaptcha) untuk verifikasi";
}*/
}
?>
