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
                                        <td style="width: 800px;">Nama</td>
                                        <td style="text-align: center;">Aksi</td>
                                    </tr>
                                    <?php 
                                        $query_narsum = $db->prepare("SELECT login_narsum.*, master_narasumber.* FROM login_narsum RIGHT JOIN master_narasumber ON login_narsum.id_dokumen = master_narasumber.id;");
                                        $query_narsum->execute();
                                        while($narsum = $query_narsum->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                    <tr>
                                        <td><?php echo $narsum['nama']?></td>
                                        <td>
                                            <?php 
                                                if($narsum['username']){
                                            ?>
                                            <a class="btn btn-primary" href="proses/login_user/narsum.php?username=<?=$narsum ['username']?>">Login</a>
                                            <?php }else{?>
                                                Belum Dibuatkan Akun
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </thead>
                            </table>
                        </div>
                    </div>