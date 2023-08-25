<?php 
    $id = htmlentities($_GET['id']);

    $query_header = $db->prepare("SELECT narsum_daftar_hadir_header.*, sum(narsum_daftar_hadir_content.status_realisasi) as realisasi FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header WHERE narsum_daftar_hadir_header.id = :id");
    $query_header->bindParam(':id',$id);
    $query_header->execute();
    $data = $query_header->fetch(PDO::FETCH_ASSOC);
    if($data['paket_pekerjaan'] == 0){
        echo "<script>window.location='index.php?pages=view_daftar_hadir_tapd&id=$id'</script>";
    }
?>
<div class="content">
    <p class="title">Resume Rapat</p>
    <table>
        <tr>
            <td style="width: 200px;">Tanggal</td>
            <td style="width: 10px;">:</td>
            <td><?php echo date('d-m-Y',strtotime($data['tanggal']))?></td>
        </tr>
        <tr>
            <td>Pukul</td>
            <td>:</td>
            <td><?php echo $data['pukul_mulai']?> - <?php echo $data['pukul_selesai']?></td>
        </tr>
        <tr>
            <td>Acara</td>
            <td>:</td>
            <td><?php echo $data['acara']?></td>
        </tr>
        <tr>
            <td>Tempat</td>
            <td>:</td>
            <td><?php echo $data['tempat']?></td>
        </tr>
        <tr>
            <td>Tanggal Undangan</td>
            <td>:</td>
            <td><?php echo date("d-m-Y",strtotime($data['tgl_undangan']))?></td>
        </tr>
        <tr>
            <td>Tanggal Surat Kesediaan</td>
            <td>:</td>
            <td>
                <?php 
                    if($data['tanggal_surat_kesediaan'] == -1){
                        echo "H - 1";
                    }elseif($data['tanggal_surat_kesediaan'] == 0){
                        echo "Hari H";
                    }elseif($data['tanggal_surat_kesediaan'] == -2){
                        echo "H - 2";
                    }
                ?>
        </tr>
        <?php
            $query_nama_paket = $db->prepare("SELECT nama FROM f1 WHERE id = :paket_pekerjaan");
            $query_nama_paket->bindParam(':paket_pekerjaan',$data['paket_pekerjaan']);
            $query_nama_paket->execute();
            $nama_paket = $query_nama_paket->fetch(PDO::FETCH_ASSOC);
        ?>
        <tr>
            <td>Paket Pekerjaan</td>
            <td>:</td>
            <td><?=$data['paket_pekerjaan']?> - <?=$nama_paket['nama']?></td>
        </tr>    
    </table>
        <input type="hidden" name="id" value="<?=$id?>">
    <p style="text-decoration: underline;">Resume Rapat</p>
    <p><?php echo html_entity_decode($data['masukan']);?></p>
    <?php
        //if($data['realisasi'] != 0){
        if($_SESSION['role'] == "pembuat spj"){
    ?>
    <a class="btn btn-primary" href="?pages=edit_acara&id=<?php echo $id?>">Edit Acara <i class="fa fa-lock-open"></i></a>
    <?php }?>
    <!-- <a class="btn btn-primary" href="print/narsum_qr_code.php" target="_blank">QR Code</a> -->
    <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="#">Resume Rapat</a>
    </li>
    <div class="card mb-4">
        <div class="card-body">
            <p class="title">Daftar Hadir Narsum</p>
            <table class="table table-striped">
                <tr class="table-primary">
                    <th style="width: 50px;">No</th>
                    <th style="width: 600px;">Nama</th>
                    <th style="width: 200px;">Instansi</th>
                    <th style="width: 200px;">No. Surat Undangan</th>
                    <th style="width: 200px;">Id Transaksi</th>
                    <!--<th>Tanda Tangan</th>-->
                    <th>Aksi</th>
                </tr>
                <?php
                    $j = 1;
                    $query_content = $db->prepare("SELECT narsum_daftar_hadir_header.id, narsum_daftar_hadir_content.id as id_content, narsum_daftar_hadir_content.ttd_narsum, narsum_daftar_hadir_content.*, master_narasumber.*, master_narasumber.id as id_narsum FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header JOIN master_narasumber ON narsum_daftar_hadir_content.id_narsum = master_narasumber.id WHERE narsum_daftar_hadir_header.id = :id;");
                    $query_content->bindParam(':id',$id);
                    $query_content->execute();
                    while($content = $query_content->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <input type="hidden" name="id_content[]" value="<?=$content['id_content']?>">
                    <td><?php echo $j++?></td>
                    <td><?php echo $content['nama']?></td>
                    <td><?php echo $content['instansi']?></td>
                    <td><?php echo $content['no_surat']?></td>
                    <td><?php echo $content['id_transaksi']?></td>
                    <td>
                        <a class="btn btn-primary" href="narasumber/surat_ketersediaan_narsum/surat.php?id_header<?php echo $id?>&id_content=<?php echo $content['id_content']?>" target="_blank">Surat Kesediaan</i></a>
                        <a class="btn btn-primary" href="print/narasumber/masukan_narasumber.php?id_content=<?=$content['id_content']?>" target="_blank">Saran/Masukan</a>
                        <a class="btn btn-primary" href="print/narasumber/daftar_hadir_pernarsum.php?id_content=<?=$content['id_content']?>" target="_blank">Daftar Hadir Narasumber</a>
                        <a class="btn btn-primary" href="config/realisasi/web_service/penerimaan_honor.php?id_transaksi=<?=$content['id_transaksi']?>" target="_blank">Edelievery</a>
                    </td>
                </tr>
                <?php }?>
            </table>
            <!-- Button trigger modal -->

        </div>
    </div>
    <?php 
        $id = $_GET['id'];

        $query_header = $db->prepare("SELECT * FROM narsum_daftar_hadir_header WHERE id = :id");
        $query_header->bindParam(':id',$id);
        $query_header->execute();
        $data = $query_header->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="card mb-4" style="width:100%">
        <div class="card-body">
            <p class="title">Daftar Hadir Rapat</p>
            <table class="table table-striped">
                <tr class="table-primary">
                    <th style="width: 50px;">No</th>
                    <th style="width: 600px;">Nama</th>
                    <th style="width: 200px;">Instansi</th>
                    <th>Tanda Tangan</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    $i = 1;
                    $query_content = $db->prepare("SELECT narsum_daftar_hadir_umum.*, master_peserta_umum.nama as nama_umum, master_peserta_umum.instansi, user_master_asn.nama as nama_asn, user_tenaga_kontrak.nama as nama_tenaga_kontrak, narsum_daftar_hadir_umum.asal_tabel FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_umum ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_umum.id_acara LEFT JOIN master_peserta_umum ON narsum_daftar_hadir_umum.nik_peserta = master_peserta_umum.nik LEFT JOIN user_master_asn ON user_master_asn.nik = narsum_daftar_hadir_umum.nik_peserta LEFT JOIN user_tenaga_kontrak ON user_tenaga_kontrak.nik = narsum_daftar_hadir_umum.nik_peserta WHERE narsum_daftar_hadir_header.id = :id");
                    $query_content->bindParam(':id',$id);
                    $query_content->execute();
                    while($content = $query_content->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $i++?></td>
                    <td>
                        <?php 
                            if($content['asal_tabel'] == 'umum'){
                                echo $content['nama_umum'];
                            }elseif($content['asal_tabel'] == 'asn_bkpsdm'){
                                echo $content['nama_asn'];
                            }else{
                                echo $content['nama_tenaga_kontrak'];
                            }
                        ?>
                    </td>
                    <td>
                        <?php 
                            if($content['asal_tabel'] == 'umum'){
                                echo $content['instansi'];
                            }else{
                                echo "Badan Kepegawaian dan Pengembangan Sumber Daya Manusia";
                            }
                        ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
    <div>
        <?php 
            if($_SESSION['role'] == "pembuat spj"){
        ?>
        <a class="btn btn-primary" href="?pages=edit_view_narsum&id=<?=$id?>">Edit</a>
        <a class="btn btn-primary" href="narasumber/resume_rapat/resume_rapat.php?id=<?=$id?>" target="_blank">Resume Rapat</a>
        <a class="btn btn-primary" href="print/narasumber/daftar_hadir_peserta.php?id=<?=$id?>" target="_blank">Daftar Hadir Rapat</a>
        <?php }else{?>
        <a class="btn btn-primary" href="narasumber/resume_rapat/resume_rapat.php?id=<?=$id?>" target="_blank">Resume Rapat</a>
        <a class="btn btn-primary" href="print/narasumber/daftar_hadir_peserta.php?id=<?=$id?>" target="_blank">Daftar Hadir Rapat</a>
        <br>
        <?php 
        if($_SESSION['role'] == "pptk"){
            if($data['status_ttd'] == 0){
        ?>
        <a style="margin-top: 20px;" class="btn btn-primary" href="config/narasumber/approval.php?id=<?=$id?>">Approve</a>
        <?php }}elseif(htmlentities($_SESSION['role'] == "bendahara")){
            if($data['status_ttd'] == 1){?>
        <a style="margin-top: 20px;" class="btn btn-primary" href="config/narasumber/approval.php?id=<?=$id?>">Approve</a>
        <?php }}}?>
    </div>
</div>