<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">LOGIN USER</h1>
            <a class="btn btn-primary" style="margin-bottom: 10px;" href="index.php?pages=login_user_asn&status=asn">Pejabat Keuangan</a>
            <a class="btn btn-primary" style="margin-bottom: 10px;" href="index.php?pages=login_user_asn">ASN</a>
            <a class="btn btn-primary" style="margin-bottom: 10px;" href="index.php?pages=buat_akun_asn">Tambah ASN Baru</a>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>Nama</td>
                                    <td>Jabatan</td>
                                    <?php 
                                    if(htmlentities(isset($_GET['status']))){
                                        ?>
                                        <td>Bidang</td>
                                    <?php }?>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <?php 
                            if(htmlentities(isset($_GET['status']))){
                                $query_asn = $db->prepare("SELECT * FROM user_master_asn WHERE role != 'asn'");
                            }else{
                                $query_asn = $db->prepare("SELECT * FROM user_master_asn");
                            }
                            $query_asn->execute();
                            while($asn = $query_asn->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <tr>
                                    <td><?php echo $asn['nama']?></td>
                                    <td><?php echo $asn['role']?></td>
                                    <?php 
                                    if(htmlentities(isset($_GET['status']))){
                                        ?>
                                        <td>
                                            <?php 
                                            if($asn['id_bidang'] == 1){
                                                echo "Pelayanan Publik dan Tata Laksana";
                                            }elseif($asn['id_bidang'] == 2){
                                                echo "Perencanaan, Pelaporan Kinerja dan Reformasi Birokrasi";
                                            }elseif($asn['id_bidang'] == 3){
                                                echo "Kelembagaan dan Analisis Jabatan";
                                            }
                                            ?>

                                        </td>
                                    <?php }?>
                                    <td>
                                        <a class="btn btn-primary" href="proses/login_user/login_pejabat_keuangan.php?nip=<?=$asn['nip']?>">Login</a>
                                        <a class="btn btn-warning" href="?pages=edit_asn&nip=<?=$asn['nip']?>">Edit</a>
                                    </td>
                                </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>