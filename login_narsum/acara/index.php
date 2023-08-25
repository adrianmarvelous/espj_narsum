<?php 
    $id_login = htmlentities($_SESSION['id']);
    $query_dokumen = $db->prepare("SELECT * FROM login_narsum WHERE id = :id_login");
    $query_dokumen->bindParam(':id_login',$id_login);
    $query_dokumen->execute();
    $dokumen = $query_dokumen->fetch(PDO::FETCH_ASSOC);
    $id_dokumen = $dokumen['id_dokumen'];
    $query_narsum = $db->prepare("SELECT * FROM master_narasumber WHERE id = :id_dokumen");
    $query_narsum->bindParam(':id_dokumen',$id_dokumen);
    $query_narsum->execute();
    $_narsum = $query_narsum->fetch(PDO::FETCH_ASSOC);
    $id_narsum = $_narsum['id'];

?>
<div id="layoutSidenav_content">
    <?php //echo $id_thr_master = $_GET['id_thr_master']; ?>
    <main>
        <div class="container-fluid">
            <h5 class="mt-4"><center>List Acara                                                                     
            </center></h5>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pukul</th>
                                <th>Nama Acara</th>
                                <th>Tempat</th>
                                <th>Aksi</th>
                            </tr>
                            <?php 
                                $i = 1;
                                $query_acara = $db->prepare("SELECT narsum_daftar_hadir_header.id, day(narsum_daftar_hadir_header.tanggal) as tgl, month(narsum_daftar_hadir_header.tanggal) as bln, year(narsum_daftar_hadir_header.tanggal) as thn, narsum_daftar_hadir_header.tanggal, narsum_daftar_hadir_header.pukul_mulai, narsum_daftar_hadir_header.pukul_selesai, narsum_daftar_hadir_header.acara, narsum_daftar_hadir_header.tempat, narsum_daftar_hadir_content.id_header, narsum_daftar_hadir_content.id_narsum, narsum_daftar_hadir_content.ttd_narsum FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header WHERE narsum_daftar_hadir_content.id_narsum = :id_narsum");
                                $query_acara->bindParam(':id_narsum',$id_narsum);
                                $query_acara->execute();
                                while($acara = $query_acara->fetch(PDO::FETCH_ASSOC)){
                                $bulan = $acara['bln'];
                                include '../config/bulan.php';
                            ?>
                            <tr>
                                <form method="GET" action="acara/redirect.php">
                                <td><?php echo $i++?></td>
                                <td><?php echo $acara['tgl']." ".$bulan_." ".$acara['thn']?></td>
                                <td><?php echo $acara['pukul_mulai']." - ".$acara['pukul_selesai']?></td>
                                <td><?php echo $acara['acara']?></td>
                                <td><?php echo $acara['tempat']?></td>
                                <input type="hidden" name="action" value="detail">
                                <input type="hidden" name="id_acara" value="<?=$acara['id']?>">
                                <td>
                                    <?php 
                                        if($acara['ttd_narsum'] == 0){
                                    ?>
                                    <button class="bnt btn-primary"><i class="fa fa-lock-open"></i></button>
                                    <?php }else{?>
                                    <button class="btn btn-secondary"><i class="fa fa-lock"></i></button>
                                    <?php }?>
                                </td>
                                </form>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
        </div>