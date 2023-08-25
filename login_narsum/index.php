<?php
include "../koneksi.php";
//include "../session.php";
//session_start();
if (!isset($_SESSION['id'])) {
    header("location: login_page/login.php");
}
$id = $_SESSION['id'];
$query_narsum = $db->prepare("SELECT login_narsum.id, master_narasumber.nama FROM login_narsum JOIN master_narasumber ON login_narsum.id_dokumen = master_narasumber.id WHERE login_narsum.id = :id");
$query_narsum->bindParam(':id',$id);
$query_narsum->execute();
$narsum = $query_narsum->fetch(PDO::FETCH_ASSOC);
include "header.php";
?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.php"
                    ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard Admin</a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                >
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Menu
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                    ></a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                            >Acara
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="?pages=list_acara">Daftar Acara</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <b><?php echo $narsum['nama']; ?></b>
                </div>
            </nav>
        </div>
        <?php 
        $actual_link = "http://$_SERVER[REQUEST_URI]";
        if (strrpos($actual_link, $_SESSION['role']) !== false){ //cek path role sesuai login_user
            //if($_SESSION['role'] == 'narsum'){
          if($_SESSION['role'] == 'narsum'){
            if(@$_GET['pages'] == ''){
                ?>
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid">
                            <h1 class="mt-4">Acara</h1>
                            <?php
                            include 'home/index.php';
                            ?>
                        </div>
                        <?php
                    }elseif($_GET['pages'] == "list_acara"){
                        include "acara/index.php";
                    }elseif($_GET['pages'] == "detail_acara"){
                        include "acara/detail.php";
                    }elseif($_GET['pages'] == "input_masukan"){
                        include "acara/input_masukan.php";
                    }}
                    //}
                    else{
                      echo "<h1>404 Not Found</h1>";
                      echo "The page that you have requested could not be found.";
                      exit();
                  }
              //}
          }
              else{
                  $message = "Akses Tidak Diijinkan";
                  echo "<script type='text/javascript'>alert('$message');history.back();</script>";
              }
              include "footer.php";
              ?>