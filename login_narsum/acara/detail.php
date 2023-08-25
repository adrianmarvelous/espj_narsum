<?php 
    $id_login = htmlentities($_SESSION['id']);
    $query_id_narsum = $db->prepare("SELECT * FROM login_narsum WHERE id = $id_login");
    $query_id_narsum->bindParam(':id_login',$id_login);
    $query_id_narsum->execute();
    $query_narsum = $query_id_narsum->fetch(PDO::FETCH_ASSOC);
    $id_narsum = $query_narsum['id_dokumen'];
    $id_acara = htmlentities($_GET['id_acara']);
    $query_header = $db->prepare("SELECT *,  day(tanggal) as tgl, month(tanggal) as bln, year(tanggal) as thn FROM narsum_daftar_hadir_header WHERE id = :id_acara");
    $query_header->bindParam(':id_acara',$id_acara);
    $query_header->execute();
    $header = $query_header->fetch(PDO::FETCH_ASSOC);
    $bulan = $header['bln'];
    include '../config/bulan.php'; 
?>
<div id="layoutSidenav_content">
    <?php //echo $id_thr_master = $_GET['id_thr_master']; ?>
    <main>
        <div class="container-fluid">
            <h5 class="mt-4"><center>Detail Acara                                                                     
            </center></h5>
            <div class="card mb-4">
                <div class="card-body">
                    <table>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?php echo $header['tgl']." ".$bulan_." ".$header['thn']?></td>
                        </tr>
                        <tr>
                            <td>Pukul</td>
                            <td>:</td>
                            <td><?php echo $header['pukul_mulai']." - ".$header['pukul_selesai']?></td>
                        </tr>
                        <tr>
                            <td>Acara</td>
                            <td>:</td>
                            <td><?php echo $header['acara']?></td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td>:</td>
                            <td><?php echo $header['tempat']?></td>
                        </tr>
                    </table>
                    <div>
                        <?php 
                            $query_content = $db->prepare("SELECT narsum_daftar_hadir_content.id as id_content, narsum_daftar_hadir_content.ttd_narsum, narsum_daftar_hadir_content.masukan FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header WHERE narsum_daftar_hadir_header.id = :id_acara AND narsum_daftar_hadir_content.id_narsum = :id_narsum");
                            $query_content->bindParam(':id_acara',$id_acara);
                            $query_content->bindParam(':id_narsum',$id_narsum);
                            $query_content->execute();
                            $ttd = $query_content->fetch(PDO::FETCH_ASSOC);
                            $id_content = $ttd['id_content'];
                        ?>
                        Masukan : <?php echo html_entity_decode($ttd['masukan']); ?>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Instansi</th>
                                <th>Nominal Honor</th>
                                <th>Tanda Tangan</th>
                            </tr>
                            <?php 
                                $i = 1;
                                $query_nota = $db->prepare("SELECT narsum_daftar_hadir_content.*, master_narasumber.* FROM narsum_daftar_hadir_content JOIN master_narasumber ON narsum_daftar_hadir_content.id_narsum = master_narasumber.id WHERE narsum_daftar_hadir_content.id_header = :id_acara AND narsum_daftar_hadir_content.id_narsum = :id_narsum");
                                $query_nota->bindParam(':id_acara',$id_acara);
                                $query_nota->bindParam(':id_narsum',$id_narsum);
                                $query_nota->execute();
                                while($nota = $query_nota->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <tr><?php 
                                $time1 = date('h',strtotime($header['pukul_mulai']));
                                $time2 = date('h', strtotime($header['pukul_selesai']));
                                $difference = round(abs($time2-$time1));
                                $difference?>
                                <td><?php echo $i++?></td>
                                <td><?php echo $nota['nama']?></td>
                                <td><?php echo $nota['instansi']?></td>
                                <td>Rp. <?php echo number_format($nota['nominal_honor']*$difference,2,',','.')?></td>
                                <td>
                                    <?php 
                                        if($nota['ttd_narsum'] == 0){}else{
                                    ?>
                                        <img src="../config/narasumber/master/dokumen_master/ttd/<?=$nota['ttd']?>" width="100">
                                    <?php }?>
                                </td>
                            </tr>
                            <?php }?>
                        </table>
                        <div>
                            <div>
                                <form method="GET" action="acara/approve.php">
                                <input type="hidden" name="id_acara" value="<?=$id_acara?>">
                                <input type="hidden" name="id_narsum" value="<?=$id_narsum?>">
                                <?php 
                                if($ttd['masukan']){?>
                                    <a class="btn btn-primary" href="../narasumber/surat_ketersediaan_narsum/surat.php?id_content=<?=$id_content?>" target="_blank">Surat Kesediaan</a>
                                <?php }else{
                                ?>
                                <a class="btn btn-primary" href="index.php?pages=input_masukan&id_acara=<?=$id_acara?>&id_narsum=<?=$id_narsum?>">Berikan Masukan dan Approve</a>
                                <?php }?>
                                <?php 
                                    if($ttd['ttd_narsum'] == 0){
                                ?>
                                <!--<button class="btn btn-primary">Approve</button>
                                <p style="color: red;">* Bubuhkan tanda tangan pada daftar hadir dan surat kesediaan</p>-->
                                <?php }else{}?>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>