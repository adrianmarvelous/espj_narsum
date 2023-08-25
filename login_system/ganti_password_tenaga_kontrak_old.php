<?php 
$username = htmlentities($_POST['username']);
$password = htmlentities($_POST['password']);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/login_system/login.css">
    <script language="javascript">
        function passwordChanged() {
            var strength = document.getElementById('strength');
            var strongRegex = new RegExp("^(?=.{14,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
            var mediumRegex = new RegExp("^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
            var enoughRegex = new RegExp("(?=.{8,}).*", "g");
            var pwd = document.getElementById("password");
            if (pwd.value.length == 0) {
                strength.innerHTML = 'Password Checker';
            } else if (false == enoughRegex.test(pwd.value)) {
                strength.innerHTML = '<span style="color:blue">Minimal 8 Karakter</span>';
            } else if (strongRegex.test(pwd.value)) {
                strength.innerHTML = '<span style="color:green">Keamanan Kuat!</span>';
            } else if (mediumRegex.test(pwd.value)) {
                strength.innerHTML = '<span style="color:orange">Keamanan Sedang!</span>';
            } else {
                strength.innerHTML = '<span style="color:red">Keamanan Lemah!</span>';
            }
        }
    </script>
</head>
<body>
    <div class="content">
        <div class="inner">
            <form method="post" action="ganti_password_tenaga_kontrak.php">
                <p class="title">Silahkan Ganti Password Anda</p>
                <label>Username</label>
                <input class="form-control" type="text" name="username" value="<?=$username?>" readonly>
                <label>Masukan Password anda</label>
                <input class="form-control" type="password" name="password">
                <label>Masukan Password Baru anda</label>
                <input class="form-control" type="password" name="password_baru" id="password" onkeyup="return passwordChanged();"> <span id="strength" style="color:blue;">Password Checker</span>
                <br><br>
                <label>Masukan Konfirmasi Password Baru anda</label>
                <input class="form-control" type="password" name="password_konfirmasi">
                <button class="btn btn-primary">Ganti Password</button>
            </form>
        </div>
    </div>
</body>
</html>