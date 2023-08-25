<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/global.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<div class="navbar">
		<p class="icon">e-spj</p>
	</div>
    <div class="content">
        <form method="post" action="../config/login/register.php">
        <p class="title">Register</p>
        <div style="display: flex;flex-direction:column; width:300px;">
            <p>Username :</p>
            <input class="form-control" type="text" name="username">
            <p>Password :</p>
            <input class="form-control" type="password" name="password">
            <p>Konfirmasi Password :</p>
            <input class="form-control" type="password" name="password1">
            <button class="btn btn-primary" type="submit" name="submit">Daftar</button>
        </form>
        </div>
    </div>
</body>
</html>