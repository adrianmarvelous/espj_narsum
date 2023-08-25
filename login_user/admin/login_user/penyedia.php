<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Penyedia</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td>Nama</td>
                                        <td>Aksi</td>
                                    </tr>
                                    <?php 
                                        $query_penyedia = $db->prepare("SELECT login_penyedia.*, penyedia.* FROM login_penyedia RIGHT JOIN penyedia ON login_penyedia.id_dokumen = penyedia.id_penyedia");
                                        $query_penyedia->execute();
                                        while($penyedia = $query_penyedia->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                    <tr>
                                        <td><?php echo $penyedia['nama_penyedia']?></td>
                                        <td>
                                            <?php 
                                                if($penyedia['username']){
                                            ?>
                                            <a class="btn btn-primary" href="proses/login_user/penyedia.php?username=<?=$penyedia['username']?>">Login</a>
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </thead>
                            </table>
                        </div>
                    </div>