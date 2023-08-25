<?php 
    require_once '../../../../koneksi.php';

    $nip = htmlentities($_GET['nip']);

    $query_pejabat = $db->prepare("SELECT * FROM user_master_asn WHERE nip = :nip");
    $query_pejabat->bindParam(':nip',$nip);
    $query_pejabat->execute();
    $pejabat = $query_pejabat->fetch(PDO::FETCH_ASSOC);

    $username = $pejabat['nip'];
    $expired = '+1 year';
    $periode_tahun = 2023;

    $login->true_login($username,$expired,$periode_tahun);
    create_alert("success","Log In Berhasil","../../../../login_system/filter.php");


    /*
    echo $pejabat['role'];

    
    session_start();
    
    $tahun = 2023;
    $_SESSION['nama'] = $pejabat['nama'];
    $_SESSION['nip'] = $pejabat['nip'];
    $_SESSION['id_bidang'] = $pejabat['id_bidang'];
    $_SESSION['role'] = $pejabat['role'];
    $_SESSION['username'] = $pejabat['nip'];
    $_SESSION['tahun'] = $tahun;
    $_SESSION['role_login'] = 'ASN';

    if(htmlentities(isset($_GET['status']))){
        header('Location: ../../../../tpp/client/index.php');
    }else{
        if($pejabat['role'] == 'pembuat spj'){
            header('Location: ../../../../index.php');
        }elseif($pejabat['role'] == 'bendahara'){
            header('Location: ../../../../login_user/bendahara/index.php');
        }elseif($pejabat['role'] == 'pptk'){
            header('Location: ../../../../login_user/pptk/index.php');
        }elseif($pejabat['role'] == 'ppkskpd'){
            header('Location: ../../../../login_user/ppkskpd/index.php');
        }elseif($pejabat['role'] == 'kepala badan'){
            header('Location: ../../../../login_user/pa/index.php');
        }elseif($pejabat['role'] == 'pengadministrasi keuangan'){
            header('Location: ../../../../login_user/pengadministrasi_keuangan/index.php');
        }
    }

*/

?>