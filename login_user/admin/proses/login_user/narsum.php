<?php 
    require_once '../../../../koneksi.php';
    session_start();

    $username = htmlentities($_GET['username']);

    $query_narsum = $db->prepare("SELECT login_narsum.*,master_narasumber.id FROM login_narsum JOIN master_narasumber WHERE login_narsum.username = :username");
    $query_narsum->bindParam(':username',$username);
    $query_narsum->execute();
    $narsum = $query_narsum->fetch(PDO::FETCH_ASSOC);

    $_SESSION['id'] = $narsum['id'];

    header('Location: ../../../../login_narsum/index.php');
?>