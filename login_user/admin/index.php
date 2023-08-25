<?php
include "../../koneksi.php";

// if(htmlentities(!isset($_SESSION['admin']))){
//     echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='../../login_system/login.php'</script>";
// }
/*session_start();
if (!isset($_SESSION['nama'])) {
    header("location: login.php");
}*/
if(htmlentities(!isset($_SESSION['admin']))){
    header("location: ../../login_system/login.php");
}
include "assets/header.php";

/*$nip = htmlentities($_SESSION['nip']);
$query_nik = $db->prepare("SELECT nip, nik FROM user_master_asn WHERE nip = '$nip'");
$query_nik->execute();
$nik_ = $query_nik->fetch(PDO::FETCH_ASSOC);
$nik = $nik_['nik'];

$query_resume_rapat = $db->prepare("SELECT * FROM narsum_daftar_hadir_umum WHERE nik_peserta = '$nik'");
$query_resume_rapat->execute();*/
//$check = mysqli_num_rows($query_resume_rapat);

?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <?php
                        //if($query_resume_rapat->rowCount() > 0){
                    ?>
                    <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        NPD
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="?pages=NPD">Data NPD</a>
                        </nav>
                    </div> -->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Login User
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="?pages=login_user_asn">ASN</a>
                            <a class="nav-link" href="?pages=login_user_tenaga_kontrak">Tenaga Kontrak</a>
                            <a class="nav-link" href="?pages=login_user_penyedia">Penyedia</a>
                            <a class="nav-link" href="?pages=login_user_narsum">Narasumber</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Narasumber
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="?pages=index_daftar_hadir">List Daftar Hadir</a>
                            <a class="nav-link" href="?pages=daftar_hadir_per_tgl">Daftar Hadir per Tanggal</a>
                        </nav>
                    </div>
                    <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Gaji Tenaga Kontrak
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="?pages=id_sub_tenaga_kontrak">Id Sub</a>
                        </nav>
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="?pages=periode_master_tenaga_kontrak">Periode</a>
                        </nav>
                    </div> -->
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <b><?php //echo $_SESSION['nama']; ?></b>
            </div>
        </nav>
    </div>
    <?php if (@$_GET['pages'] == '') { ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Admin</h1>
                    <div class="card mb-4">
                    </div>
                </div>
                <?php
            }
            elseif (@$_GET['pages'] == 'NPD'){
                include "npd/npd.php";
            }elseif(htmlentities($_GET['pages']) == 'detail_npd'){
                include "npd/detail.php";
            }elseif(htmlentities($_GET['pages']) == 'login_user_asn'){
                include "login_user/index.php";
            }elseif(htmlentities($_GET['pages']) == 'login_user_tenaga_kontrak'){
                include "login_user/tenaga_kontrak.php";
            }elseif(htmlentities($_GET['pages']) == 'login_user_penyedia'){
                include "login_user/penyedia.php";
            }elseif(htmlentities($_GET['pages']) == 'login_user_narsum'){
                include "login_user/narasumber.php";
            }elseif(htmlentities(($_GET['pages']) == 'index_daftar_hadir')){
                include "narasumber/daftar_hadir/index.php";
            }elseif(htmlentities($_GET['pages'] == 'detail_acara')){
                include "narasumber/daftar_hadir/detail_daftar_hadir.php";
            }elseif(htmlentities($_GET['pages'] == 'edit_daftar_hadir_header')){
                include "narasumber/daftar_hadir/edit_daftar_hadir_header.php";
            }elseif(htmlentities($_GET['pages'] == 'daftar_hadir_per_tgl')){
                include "narasumber/daftar_hadir_per_tgl/index.php";
            }elseif(htmlentities($_GET['pages'] == 'detail_per_tgl')){
                include "narasumber/daftar_hadir_per_tgl/detail.php";
            }elseif(htmlentities($_GET['pages'] == 'id_sub_tenaga_kontrak')){
                include "tenaga_kontrak/gaji/index.php";
            }elseif(htmlentities($_GET['pages'] == 'detail_id_sub')){
                include "tenaga_kontrak/gaji/detail.php";
            }elseif(htmlentities($_GET['pages'] == 'detail_absensi')){
                include "../../tenaga_kontrak/data_import_tenaga_kontrak_bulan.php";
            }elseif(htmlentities($_GET['pages'] == 'edit_absensi')){
                include "tenaga_kontrak/gaji/absensi/edit.php";
            }elseif(htmlentities($_GET['pages'] == 'periode_master_tenaga_kontrak')){
                include "tenaga_kontrak/periode_master_tenaga_kontrak.php";
            }

            elseif(htmlentities($_GET['pages'] == 'buat_akun_asn')){
                include "login_user/asn/create.php";
            }elseif(htmlentities($_GET['pages'] == 'edit_asn')){
                include "login_user/asn/edit.php";
            }
            include "assets/footer.php";
?>