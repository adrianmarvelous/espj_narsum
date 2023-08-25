<?php
if (htmlentities(!isset($_POST['tahun']))) {
    //header("Location: login_system/login.php");
    header("Location: login_tahun.php");
}
else{
    $tahun = htmlentities($_POST['tahun']);
    if(htmlentities(isset($_GET['percobaan']))){
        $percobaan = htmlentities($_GET['percobaan']);
        $percobaan++;
    }else{
        $percobaan=0;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>login</title>
        <link rel="stylesheet" href="../asset/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../asset/assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="../asset/assets/css/-Login-form-Page-BS4-.css">
        <link rel="stylesheet" href="../asset/assets/css/styles.css">

        <style>
            #wrapper {
                text-align:center;
                border:1px solid #7F7F7F;
                width:300px;
                margin:10px auto;
                padding:25px;
            }

            #myTimer {
                font:64px Tahoma bold;
                padding:20px;
                display:block;
            }

            button {
                width:125px;
                padding:10px;
            }

            .btnEnable {
                background-color:#E6F9D2;
                border:1px solid #97DE4C;
                color:#232323;
                cursor:pointer;
            }

            .btnDisable {
                background-color:#FCBABA;
                border:1px solid #DD3939;
                color:#232323;
                cursor:wait;
            }
        </style>
    </head>

    <body>
    <!--<div class="alert alert-warning" role="alert">
        <?php //echo $_SESSION['error']; ?>
    </div>-->
    <div class="container-fluid">
        <div class="row mh-100vh">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
                <div class="m-auto w-lg-75 w-xl-50">
                    <img src="../source/logo/Logo Kota Surabaya.png" width="100" style="margin-left: -20px;">
                    <h1 class="text-info font-weight-bold mb-6">SiJAKA</h1>
                    <h4 class="text-info font-weight-light mb-6"></i><b>Sistem Informasi Pertanggungjawaban Keuangan dan Arsip</b></h4>
                    <form method="post" action="../config/login/login.php">
                        <input type="hidden" name="percobaan" value="<?=$percobaan?>">
                        <div class="form-group"><label class="text-secondary">Username</label><input class="form-control" type="text" name="username" value="" required></div>
                        <div class="form-group"><label class="text-secondary">Password</label><input class="form-control" type="password" name="password" value="" required></div>
                        <label class="text-secondary">Captcha <img src='captcha.php' alt='captcha'></label>
                        <input type="hidden" name="tahun" value="<?=$tahun?>">
                        <input class="form-control" type='text' name='captcha_code' placeholder="Input Captcha">
                        <button class="btn btn-info mt-2" name="submit" type="submit">Log In</button>
                        <?php /*
                        if(htmlentities(!isset($_GET['percobaan']))){?>
                            <button class="btn btn-info mt-2" name="submit" type="submit">Log In</button>
                        <?php }
                            if(htmlentities(isset($_GET['percobaan']))){
                                if($percobaan <=3){
                        ?>
                        <button class="btn btn-info mt-2" name="submit" type="submit">Log In</button>
                        <?php }else{?>
                        <!--<label class="text-secondary">Captcha <img src='captcha.php' alt='captcha'></label>
                        <input class="form-control" type='text' name='captcha_code' placeholder="Input Captcha">-->
                        <button class="btn btn-info mt-2" name="submit" type="submit">Log In</button>
                            <!--<div id="wrapper">
                                <div id="myTimer"></div>
                                <button name="submit" type="submit" id="myBtn" class="btnDisable" disabled >
                                    Please wait...
                                </button>
                            </div>-->
                        <?php }} */?>
                    </form>
                    <p class="mt-3 mb-0"></p>
                </div>
            </div>
            <img src="../source/bg2.png" style="width: 650px;padding: 100px;">
            <!--<div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image:url(&quot;../asset/img/bg2.png&quot;);background-size:cover;background-position:center center; width: 100px;">-->

                <p class="ml-auto small text-dark mb-2"><!--<em>Photo by&nbsp;</em><a class="text-dark" href="https://unsplash.com/photos/v0zVmWULYTg?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText" target="_blank"><em>Aldain Austria</em></a><br></p>-->
            </div>
        </div>
    </div>
    <script src="../asset/assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <?php 
    if(htmlentities(isset($_GET['status']))){
        $status = htmlentities($_GET['status']);

        if($status == 'password_salah'){
            ?>
            <script>alert('Username atau Password salah');</script>
        <?php } elseif($status == 'captcha_salah'){?>
            <script>alert('Login gagal! Capctha tidak sesuai!');</script>
        <?php }}?>
    </body>
    <script>
        var sec = 15;
        var myTimer = document.getElementById('myTimer');
        var myBtn = document.getElementById('myBtn');
        window.onload = countDown;

        function countDown() {
            if (sec < 10) {
                myTimer.innerHTML = "0" + sec;
            } else {
                myTimer.innerHTML = sec;
            }
            if (sec <= 0) {
                $("#myBtn").removeAttr("disabled");
                $("#myBtn").removeClass().addClass("btnEnable");
                $("#myTimer").fadeTo(2500, 0);
                myBtn.innerHTML = "Log in";
                return;
            }
            sec -= 1;
            window.setTimeout(countDown, 1000);
        }
    </script>
    </html>
    <?php
}
?>