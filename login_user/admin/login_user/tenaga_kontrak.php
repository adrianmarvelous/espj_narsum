<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Tenaga Kontrak</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                            <a class="nav-link" href="?pages=login_user_tenaga_kontrak">Login User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?pages=login_user_tenaga_kontrak">Absensi</a>
                        </li>
                    </ul>
                    <br>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td>Nama</td>
                                <td>Jabatan</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query_tenaga_kontrak = $db->prepare("SELECT * FROM tenaga_kontrak_master");
                            $query_tenaga_kontrak->execute();
                            while($tenaga_kontrak = $query_tenaga_kontrak->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <tr>
                                    <td><?php echo $tenaga_kontrak['nama']?></td>
                                    <td><?php echo $tenaga_kontrak['jenis_jabatan']?></td>
                                    <td align="center">
                                        <a class="btn btn-primary" href="proses/login_user/tenaga_kontrak.php?nik=<?=$tenaga_kontrak['nik']?>">Login</a>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>