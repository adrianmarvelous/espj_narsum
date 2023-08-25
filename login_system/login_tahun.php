<?php
require_once("../koneksi.php");
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
    <link rel="icon" href="../source/logo/Logo Kota Surabaya.png">
</head>

<body>
    <div class="container-fluid">
        <div class="row mh-100vh">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
                <div class="m-auto w-lg-75 w-xl-50">
                    <img src="../source/logo/Logo Kota Surabaya.png" width="100" style="margin-left: -20px;">
                    <h1 class="text-info font-weight-bold mb-6">SiJAKA</h1>
                    <h4 class="text-info font-weight-light mb-6"></i><b>Sistem Informasi Pertanggungjawaban Keuangan dan Arsip</b></h4>
                    <font color="red"><?=show_alert();?></font>
                    <form method="post" action="login.php">
                            <label class="text-secondary"><b>Pilih Tahun</b></label>
                            <select class="form-control" name="tahun" required>
                            <option selected disabled value="">- Pilih Periode Tahun -</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                            <button class="btn btn-info mt-2" name="submit" type="submit">Pilih</button>
                        </form>
                        <p class="mt-3 mb-0"></p>
                    </div>
                </div>
                <img src="../source/bg2.png" style="width: 650px;padding: 100px;">

                <p class="ml-auto small text-dark mb-2">
                </div>
            </div>
        </div>
        <script src="../asset/assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
    </html>