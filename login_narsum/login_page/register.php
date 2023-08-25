<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Penyedia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <form method="post" action="login_system/register.php">
                <p class="title">Pendaftaran Penyedia</p>
                <label>Username :</label>
                <input class="form-control" type="text" name="username">
                <label>Password :</label>
                <input class="form-control" type="password" name="password">
                <label>Konfirmasi Password :</label>
                <input class="form-control" type="password" name="konfirmasi_password">
                <button style="margin-top: 30px;" class="btn btn-primary">Daftar</button>
            </form>
        </div>
    </div>
</body>
</html>