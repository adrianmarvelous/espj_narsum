<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Daftar Acara</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Acara</th>
                                    <th>Jam Mulai</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php
                                    $nik = htmlentities($_SESSION['nik']);
                                    $query_acara = $db->prepare("SELECT narsum_daftar_hadir_header.*, narsum_daftar_hadir_umum.status as status_umum FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_umum ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_umum.id_acara WHERE narsum_daftar_hadir_umum.nik_peserta = :nik");
                                    $query_acara->bindParam(':nik',$nik);
                                    $query_acara->execute();?>
                                    
                            <tbody>
                                <?php
                                $i=1;
                                    while($acara = $query_acara->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                    <tr>
                                        <td><?=$i++?></td>
                                        <td><?=$acara['tanggal']?></td>
                                        <td><?=$acara['acara']?></td>
                                        <td><?=$acara['pukul_mulai']?></td>
                                        <td>
                                            <?php
                                                if($acara['status_umum'] == 1){
                                            ?>
                                            <a class="btn btn-secondary" href="?pages=detail_acara&id=<?=$acara['id']?>"><i class="fa fa-lock"></i></a>
                                            <?php }else{?>
                                            <a class="btn btn-primary" href="?pages=detail_acara&id=<?=$acara['id']?>"><i class="fa fa-lock-open"></i></a>
                                            <?php }?>
                                            <a class="btn btn-warning" href="print/narasumber/daftar_hadir_peserta.php?id=<?=$acara['id']?>"><i class="fa fa-file-pdf" target="_blank"></i></a>
                                        </td>
                                    </tr>
                                <?php }?>
                                    </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>