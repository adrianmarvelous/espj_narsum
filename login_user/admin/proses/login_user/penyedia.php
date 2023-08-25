<?php 
    require_once '../../../../koneksi.php';
    session_start();

    $username = htmlentities($_GET['username']);

    $query_penyedia = $db->prepare("SELECT login_penyedia.*,penyedia.id_penyedia FROM login_penyedia JOIN penyedia WHERE login_penyedia.username = :username");
    $query_penyedia->bindParam(':username',$username);
    $query_penyedia->execute();
    $penyedia = $query_penyedia->fetch(PDO::FETCH_ASSOC);

    $_SESSION['id'] = $penyedia['id'];

    header('Location: ../../../../login_penyedia/index.php');
?>