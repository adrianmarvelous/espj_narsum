<?php
    require_once '../../../../koneksi.php';
    
    $nip = htmlentities($_GET['nip']);
    $password = htmlentities($_GET['password']);
    $nik = htmlentities($_GET['nik']);
    $nama = htmlentities($_GET['nama']);
    $golongan = htmlentities($_GET['golongan']);
    $npwp = htmlentities($_GET['npwp']);
    $jabatan = htmlentities($_GET['jabatan']);
    $role = htmlentities($_GET['role']);
    
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $insert = $db->prepare("INSERT INTO user_master_asn (nip,password,nik,nama,gol,npwp,jabatan,role) VALUES (:nip,:password,:nik,:nama,:golongan,:npwp,:jabatan,:role)");
    $insert->bindParam(':nip',$nip);
    $insert->bindParam(':password',$hashedPassword);
    $insert->bindParam(':nik',$nik);
    $insert->bindParam(':nama',$nama);
    $insert->bindParam(':golongan',$golongan);
    $insert->bindParam(':npwp',$npwp);
    $insert->bindParam(':jabatan',$jabatan);
    $insert->bindParam(':role',$role);
    $insert->execute();

    header('Location: ../../index.php?pages=login_user_asn');
?>