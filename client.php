<?php
include "koneksi.php";
//session_start();
if (!isset($_SESSION['nama'])) {
    header("location: login.php");
}
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
                        Daftar Hadir
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                                    >Narasumber
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                        ></a>
                                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                            <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="?pages=index_acara">Acara</a></nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sb-sidenav-footer">
                                <div class="small">Logged in as:</div>
                                <b><?php echo $_SESSION['nama']; ?></b>
                            </div>
                        </nav>
                    </div>
                    <?php if(@htmlentities($_GET['pages']) == ''){ ?>
                    <div id="layoutSidenav_content">
                        <main>
<?php
}
else if(@htmlentities($_GET['pages']) == 'index_acara'){
    include "client/acara/index.php";
}
elseif(htmlentities($_GET['pages']) == 'detail_acara'){
    include "client/acara/detail.php";
}
include "footer.php";
?>