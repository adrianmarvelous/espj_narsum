<?php 
    require_once '../../session.php';
    $action = htmlentities($_GET['action']);
    
    if($action == "detail"){
        $id_acara = htmlentities($_GET['id_acara']);
        
        header('Location: ../index.php?pages=detail_acara&id_acara='.$id_acara.'');
    }
?>