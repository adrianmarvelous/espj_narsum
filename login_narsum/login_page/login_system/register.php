<?php 
    require_once '../../../koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    $query_penyedia = mysqli_query($koneksi, "SELECT * FROM login_penyedia WHERE username = '$username'");
    $check_username = mysqli_num_rows($query_penyedia);

    if($check_username != 0){
        echo "<script>alert('Username sudah terdaftar');window.location='../register.php'</script>";
    }else{
        if($password != $konfirmasi_password){
            echo "<script>alert('Password dan Konfirmasi Password tidak sesuai');window.location='../register.php'</script>";
        }else{
            if(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST['username']))){
                echo "<script>alert('Username hanya boleh huruf, angka dan underscore');history.go(-1)</script>";
            }else{
                $query_last_id = mysqli_query($koneksi, "SELECT max(id) as id_terakhir FROM login_penyedia");
                $id_terakhir = mysqli_fetch_array($query_last_id);
                $last_id = $id_terakhir['id_terakhir']+1;
                $insert = mysqli_query($koneksi, "INSERT INTO login_penyedia (id, username, password) VALUES ($last_id, '$username', '$password')");
                echo "<script>window.location='../login.php'</script>";
            }
        }
    }
?>