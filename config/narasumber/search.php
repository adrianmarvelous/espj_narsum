<?php 
    include '../../session.php';
    $filter = htmlentities($_GET['filter']);
    
    header("Location: ../../index.php?pages=cari_narasumber&filter=$filter");
?>