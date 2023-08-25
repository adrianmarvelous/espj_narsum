<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Narsum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    <!-- Load Librari Google reCaptcha nya -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="icon" href="../../source/logo/Logo Kota Surabaya.png">
</head>
<body>
    <div class="container">
        <div class="card">
            <form method="post" action="login_system/login.php">
                <p class="title">Login Narasumber</p>
                <label>Username :</label>
                <input class="form-control" type="text" name="username">
                <label>Password :</label>
                <input class="form-control" type="password" name="password">
                <!--<br>
                <div class="g-recaptcha" data-sitekey="6LcyqVQkAAAAABAHVj0WDxbeRUj-9NwSDpLRvCRp"></div>-->
                <button style="margin-top: 30px;" class="btn btn-primary">Masuk</button>
            </form>
        </div>
    </div>
</body>
</html>