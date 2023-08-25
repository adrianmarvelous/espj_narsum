<?php
    require_once 'koneksi.php';
    $role = $_SESSION['role'];
    $login->login_redir($role);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="css/index.css">
    <script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SiJAKA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php
        if(htmlentities($role == 'pembuat spj')){
      ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Master
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="?pages=narasumber">Narasumber</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Lampiran Pendukung
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="?pages=list_acara">Honor</a></li>
          </ul>
        </li>
      <?php
        }else{
      ?>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Lampiran Pendukung
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="?pages=list_acara">Honor</a></li>
          </ul>
        </li>
      <?php }?>
      </ul>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item dropdown">
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <li class="nav-item dropdown">
                      
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <?php echo $_SESSION['nama']?>
                      </a>
              <!-- <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?php echo $_SESSION['nama']?></a> -->
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="margin-left:-150px">
                <?php
                  if(htmlentities(isset($_SESSION['admin']))){
                ?>
                <li><a href="login_user/admin/index.php" class="dropdown-item">Dashboard Admin</a></li>
                <?php }?>
                          <li><a href="config/guide book sijaka 1.3.pdf" target="_blank" class="dropdown-item"><i class='fas fa-file-pdf' style='font-size:25px;color:red'></i> Manual Book SiJAKA.pdf</a></li>
                          <hr style="color: red"></hr>
                <li><a href="client.php?role=<?php echo $_SESSION['role']?>" class="dropdown-item">Pribadi ASN</a></li>
                          <li><a href="config/login/logout.php" class="dropdown-item">Logout</a></li>
                      </ul>
                  </li>
              </div>
          </li>
      </ul>
    </div>
  </div>
  
</nav>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<?php
		?>
		<div class="container">
            <?php
                // if($role == 'pembuat spj'){
                    if(@htmlentities($_GET['pages']) == ""){
                        
                    }elseif(htmlentities($_GET['pages']) == "narasumber"){
                        include 'narasumber/master/index.php';
                    }elseif(htmlentities($_GET['pages']) == "tambah_narsum"){
                        include 'narasumber/master/tambah_narasumber.php';
                    }elseif(htmlentities($_GET['pages']) == "detail_narsum"){
                        include 'narasumber/master/detail.php';
                    }elseif(htmlentities($_GET['pages']) == "edit_master_penyedia"){
                        include 'narasumber/master/edit.php';
                    }elseif(htmlentities($_GET['pages']) == "index_peserta_umum"){
                        include 'narasumber/peserta_umum/index.php';
                    }elseif(htmlentities($_GET['pages']) == "detail_peserta_umum"){
                        include 'narasumber/peserta_umum/detail.php';
                    }elseif(htmlentities($_GET['pages']) == "create_peserta_umum"){
                        include 'narasumber/peserta_umum/create.php';
                    }

                    elseif(htmlentities($_GET['pages']) == "list_acara"){
                        include 'narasumber/index_daftar_hadir.php';
                    }elseif(htmlentities($_GET['pages']) == "hasil_lamp_pendukung"){
                        include 'narasumber/resume_rapat/hasil_lamp_pendukung.php';
                    }elseif(htmlentities($_GET['pages']) == "edit_acara"){
                        include 'narasumber/edit_daftar_hadir.php';
                    }elseif(htmlentities($_GET['pages']) == "tambah_acara"){
                      include 'narasumber/buat_daftar_hadir.php';
                    }elseif(htmlentities($_GET['pages']) == "view_resume"){
                      include 'narasumber/resume_rapat/view_resume.php';
                    }elseif(htmlentities($_GET['pages']) == "edit_view_narsum"){
                      include 'narasumber/resume_rapat/edit_view_resume.php';
                    }
                // }
            ?>
        </div>
    </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>