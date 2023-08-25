<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login_system/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="halaman">
        <form method="post" action="../config/login/login.php">
        <div class="kiri">
            <img src="../source/background.jpeg" class="bgimg">
        </div>
        <div class="kanan">
            <center><img src="../source/logo/Logo Kota Surabaya.png" width="100"></center>
            <p style="font-size: 48px; text-align:center; font-weight: bold; color:#0D6EFD;">SiJAKA</p>
            <p style="font-size: 12px; text-align:center;margin-top: -20px;">Sistem Informasi Pertanggungjawaban Keuangan dan Arsip</p>
            <p style="font-size: 14px">Selamat datang, silahkan masukkan username dan password anda</p>
            <p>Username :</p>
            <input class="form-control" type="text" name="username">
            <p style="margin-top: 20px;">Password :</p>
            <input class="form-control" type="password" name="password">
            <button class="btn btn-primary" type="submit" name="submit" style="margin-top: 20px;">Masuk</button>
        </div>
        </form>
    </div>
    
</body>
</html>