<?php
require("../koneksi.php");

$login_status = $login->cek_login();
if($login_status){
	if ($_SESSION['role_login'] == 'ASN') {
		/*if($_SESSION['ganti_password'] == 0){
			include 'ganti_password.php';
		}
		else{*/
			if($_SESSION['id_bidang'] == 5 & $_SESSION['role'] == "bendahara"){
				// echo "<script>window.location='../login_user/bendahara/index.php'</script>";
				echo "<script>window.location='../index.php'</script>";
			}elseif($_SESSION['id_bidang'] == 5 & $_SESSION['role'] == "pengadministrasi keuangan"){
				echo "<script>window.location='../login_user/pengadministrasi_keuangan/index.php'</script>";
			}elseif($_SESSION['id_bidang'] == 5 & $_SESSION['role'] == "ppkskpd"){
				echo "<script>window.location='../login_user/ppkskpd/index.php'</script>";
			}elseif($_SESSION['id_bidang'] == 5 & $_SESSION['role'] == "kepala badan"){
				echo "<script>window.location='../login_user/pa/index.php'</script>";
			}elseif($_SESSION['role'] == "pptk"){
				// echo "<script>window.location='../login_user/pptk/index.php'</script>";
				echo "<script>window.location='../index.php'</script>";
			}elseif($_SESSION['id_bidang'] == 0){
				echo "<script>window.location='../client.php'</script>";
			}elseif($_SESSION['role'] == 'pembuat spj' || $_SESSION['role'] == 'pengadministrasi'){
				echo "<script>window.location='../index.php'</script>";
			}
		//}
	}
	if ($_SESSION['role_login'] == 'OS'){
		/*if($_SESSION['ganti_password'] == 0){
			echo "<script>window.location='ganti_password_tenaga_kontrak.php'</script>";
		}
		else{*/
		echo "<script>window.location='../client.php'</script>";
		//}
	}elseif($_SESSION['role_login'] == 'admin'){
		echo "<script>window.location='../login_user/admin/index.php'</script>";
	}

}
else{
	//include form log in jika belum log in
	include "login_tahun.php";
}
?>