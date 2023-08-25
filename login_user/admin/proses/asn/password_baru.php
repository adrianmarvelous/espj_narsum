<?php
    require_once '../../../../koneksi.php';
    $nip = htmlentities($_GET['nip']);
    $password = htmlentities($_GET['password']);
    
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $update = $db->prepare("UPDATE user_master_asn SET password = :password WHERE nip = :nip");
    $update->bindParam(':password',$hashedPassword);
    $update->bindParam(':nip',$nip);
    $update->execute();
    
    header('Location: ../../index.php?pages=login_user_asn');
?>