<?php 

    $id = htmlentities($_GET['id']);

    $query_header = $db->prepare("SELECT narsum_daftar_hadir_header.*, sum(narsum_daftar_hadir_content.status_realisasi) as realisasi FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header WHERE narsum_daftar_hadir_header.id = :id");
    $query_header->bindParam(':id',$id);
    $query_header->execute();
    $data = $query_header->fetch(PDO::FETCH_ASSOC);
    $paket_pekerjaan = $data['paket_pekerjaan'];
    $periode = date('Y-m',strtotime($data['tanggal']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lampiran Pendukung Narasumber</title>
    <link rel="stylesheet" href="../../css/resume_rapat.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
    <div class="content">
        <p class="title">Resume Rapat</p>
        <table>
            <tr>
                <td style="width: 100px;">Tanggal</td>
                <td style="width: 50px;">:</td>
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
        </table>
        <form method="GET" action="config/narasumber/daftar_hadir/simpan_lamp_pendukung.php">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="hidden" name="paket_pekerjaan" value="<?=$paket_pekerjaan?>">
        <p style="text-decoration: underline;">Resume Rapat</p>
        <p><?php echo html_entity_decode($data['masukan'])?></p>
        <?php 
            //if($data['realisasi'] != 0){
        ?>
        <a class="btn btn-primary" href="?pages=edit_acara&id=<?php echo $id?>">Edit Acara <i class="fa fa-lock-open"></i></a>
        <?php //}else{?>
        <!--<button class="btn btn-secondary" href="?pages=edit_acara&id=<?php echo $id?>">Edit Acara <i class="fa fa-lock" disabled></i></button>-->
        <?php //}?>
        <!--<p style="margin-top: 150px; text-decoration:underline; font-weight:bold;">Hadir Dalam Rapat :</p>
        <table class="table-responsive">
            <tr class="table table-bordered">
                <th>No</th>
                <th>Nama</th>
                <th>Instansi</th>
                <th>TTD</th>
            </tr>
        <?php 
            $i = 1;
            $query_kehadiran = $db->prepare("SELECT narsum_daftar_hadir_header.id, narsum_daftar_hadir_content.id as id_content,narsum_daftar_hadir_content.*, master_narasumber.* FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header JOIN master_narasumber ON narsum_daftar_hadir_content.id_narsum = master_narasumber.id WHERE narsum_daftar_hadir_header.id = :id");
            $query_kehadiran->bindParam(':id',$id);
            $query_kehadiran->execute();
            while($narsum = $query_kehadiran->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
                <td><?php echo $i++?></td>
                <td><?php echo $narsum['nama']?></td>
                <td><?php echo $narsum['instansi']?></td>
                <td>
                    <?php 
                        if($narsum['ttd_narsum'] == 0){}else{
                    ?>
                        <img src="config/narasumber/master/dokumen_master/ttd/<?=$narsum['ttd']?>" width="70">
                    <?php }?>
                </td>
            </tr>
        <?php }?>
        </table>
        <?php 
            //if($data['realisasi'] != 0){
        ?>
        <a class="btn btn-primary" href="?pages=edit_resume&id=<?php echo $data['id']?>">Masukan Resume Rapat <i class="fa fa-lock-open"></i></a>
        <a class="btn btn-primary" href="?pages=detail_acara&id=<?php echo $id?>">Masukan Daftar Hadir<i class="fa fa-lock-open"></i></a>
        <?php //}else{?>
        <button class="btn btn-secondary" href="?pages=edit_resume&id=<?php echo $data['id']?>" disabled>Masukan Resume Rapat <i class="fa fa-lock"></i></button>
        <button class="btn btn-secondary" href="?pages=detail_acara&id=<?php echo $id?>" target="_blank" disabled>Masukan Daftar Hadir <i class="fa fa-lock"></i></button>
        <?php //}?>
        <a class="btn btn-primary" href="?pages=daftar_hadir_peserta&id=<?=$id?>">Daftar Hadir Peserta</a>
        <a class="btn btn-primary" href="narasumber/resume_rapat/resume_rapat.php?id=<?=$id?>" target="_blank">Print</a>-->

        <div class="card mb-4">
        <div class="card-body">
            <p class="title">Daftar Hadir Narsum</p>
            <!--<form method="get"  action="config/narasumber/daftar_hadir/detail/tambah_peserta.php">-->
                <select class="form-select" name="narasumber" style="margin-bottom: 10px;">
                    <?php 
                        $query_narsum = $db->prepare("SELECT * FROM master_narasumber");
                        $query_narsum->execute();
                        while($narsum = $query_narsum->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <option value="<?php echo $narsum['id']?>"><?php echo $narsum['nama']?></option>
                    <?php }?>
                </select>
                <input type="hidden" name="id" value="<?php echo $id?>">
            <button class="btn btn-primary"  type="submit" name="tambah_narsum" value="1" style="margin-bottom:20px;">Tambah Narasumber +</button>
            <!--</form>-->
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
                        $i = 1;
                        $query_content = $db->prepare("SELECT narsum_daftar_hadir_header.id, narsum_daftar_hadir_content.id as id_content, narsum_daftar_hadir_content.ttd_narsum, narsum_daftar_hadir_content.*, master_narasumber.* FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header JOIN master_narasumber ON narsum_daftar_hadir_content.id_narsum = master_narasumber.id WHERE narsum_daftar_hadir_header.id = :id;");
                        $query_content->bindParam(':id',$id);
                        $query_content->execute();
                        while($content = $query_content->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <input type="hidden" name="id_content[]" value="<?=$content['id_content']?>">
                        <td><?php echo $i++?></td>
                        <td><?php echo $content['nama']?></td>
                        <td><?php echo $content['instansi']?></td>
                        <td><input type="text" name="no_surat[]" value="<?=$content['no_surat']?>"></td>
                        <td>
                            <?php
                            include 'config/web_service/id_transaksi.php';
                            $jumlah = count($array);
                            $dataa = $array['data'];
                            rsort($dataa);
                            ?>
                            <select class="form-select" name="id_transaksi[]" id="">
                                <option value="<?=$content['id_transaksi']?>"><?php echo $content['id_transaksi']?></option>
                                <?php 
                                    foreach($dataa as $data){
                                        $date = new DateTime($data['tanggal_transaksi']['date']);
                                        $query_id_transaksi = $db->prepare("SELECT id_transaksi FROM narsum_daftar_hadir_content WHERE id_transaksi = :id_transaksi");
                                        $query_id_transaksi->bindParam(':id_transaksi',$data['transaksi_id']);
                                        $query_id_transaksi->execute();
                                        echo $query_id_transaksi->rowCount();
                                        if($query_id_transaksi->rowCount() == 0){
                                        if ($date->format('Y-m') === $periode) {
                                ?>
                                <option value="<?=$data['transaksi_id']?>"><?php echo $data['transaksi_id']?></option>
                                <?php }}}?>
                            </select>
                            <!--<input type="number" name="id_transaksi[]">-->
                        </td>
                        <!--<td>
                            <?php 
                                if($content['ttd_narsum'] == 0){}else{
                            ?>
                            <img src="config/narasumber/master/dokumen_master/ttd/<?=$content['ttd']?>" width="100">
                            <?php }?>
                        </td>-->
                        <td>
                            <!--<a class="btn btn-primary" href="?pages=view_surat&id_header=<?php echo $id?>&id_content=<?php echo $content['id_content']?>">Surat Ketersediaan</i></a>
                            <a class="btn btn-primary" href="">Saran/Masukan</a>
                            <a class="btn btn-primary" href="">E-delivery</a>
                            <a class="btn btn-primary" href="">Daftar Hadir Narasumber</a>-->
                            <a class="btn btn-danger" href="config/narasumber/daftar_hadir/detail/hapus_peserta.php?id_content=<?php echo $content['id_content']?>&id_header=<?php echo $id?>&paket_pekerjaan=<?=$paket_pekerjaan?>">Hapus</a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
        </div>
        </div>
        <?php 
    $id = htmlentities($_GET['id']);

    $query_header = $db->prepare("SELECT * FROM narsum_daftar_hadir_header WHERE id = :id");
    $query_header->bindParam(':id',$id);
    $query_header->execute();
    $data = $query_header->fetch(PDO::FETCH_ASSOC);
?>
    
    <div class="card mb-4">
    <div class="card-body">
        <p class="title">Daftar Hadir Rapat</p>
        <!--<form method="get"  action="narasumber/resume_rapat/daftar_hadir_peserta/tambah_peserta.php">-->
        <p>Peserta Umum</p>
        <div style="display: flex;justify-content:space-between;">
            <div style="width:900px;">
                <select class="form-select" name="nik_peserta_umum">
                    <?php 
                        $query_narsum = $db->prepare("SELECT master_peserta_umum.* FROM master_peserta_umum");
                        $query_narsum->execute();
                        while($narsum = $query_narsum->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <option value="<?php echo $narsum['nik']?>"><?php echo $narsum['nama']?></option>
                    <?php }?>
                </select>
            </div>
            <div>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button class="btn btn-primary"  type="submit" name="tambah_peserta_umum" value="1" style="margin-bottom:20px;">Tambah Peserta +</button>
            </div>
        </div>
        <p>ASN BKPSDM</p>
        <div style="display: flex;justify-content:space-between;">
            <div style="width:900px;">
                <select class="form-select" name="nik_peserta_asn">
                    <?php 
                        $query_narsum = $db->prepare("SELECT * FROM user_master_asn");
                        $query_narsum->execute();
                        while($narsum = $query_narsum->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <option value="<?php echo $narsum['nik']?>"><?php echo $narsum['nama']?></option>
                    <?php }?>
                </select>
            </div>
            <div>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button class="btn btn-primary"  type="submit" name="tambah_peserta_asn" value="1" style="margin-bottom:20px;">Tambah Peserta +</button>
            </div>
        </div>
        <p>Tenaga Kontrak</p>
        <div style="display: flex;justify-content:space-between;">
            <div style="width:900px;">
                <select class="form-select" name="nik_tenaga_kontrak">
                    <?php 
                        $query_narsum = $db->prepare("SELECT * FROM user_tenaga_kontrak");
                        $query_narsum->execute();
                        while($narsum = $query_narsum->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <option value="<?php echo $narsum['nik']?>"><?php echo $narsum['nama']?></option>
                    <?php }?>
                </select>
            </div>
            <div>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button class="btn btn-primary"  type="submit" name="tambah_peserta_tenaga_kontrak" value="1" style="margin-bottom:20px;">Tambah Peserta +</button>
            </div>
        </div>
        <!--</form>-->
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
                $query_content = $db->prepare( "SELECT narsum_daftar_hadir_umum.*, master_peserta_umum.nama as nama_umum, master_peserta_umum.instansi, user_master_asn.nama as nama_asn, user_tenaga_kontrak.nama as nama_tenaga_kontrak, narsum_daftar_hadir_umum.asal_tabel FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_umum ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_umum.id_acara LEFT JOIN master_peserta_umum ON narsum_daftar_hadir_umum.nik_peserta = master_peserta_umum.nik LEFT JOIN user_master_asn ON user_master_asn.nik = narsum_daftar_hadir_umum.nik_peserta LEFT JOIN user_tenaga_kontrak ON user_tenaga_kontrak.nik = narsum_daftar_hadir_umum.nik_peserta WHERE narsum_daftar_hadir_header.id = :id");
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
                            echo "Bagian Organisasi";
                        }
                    ?>
                </td>
                <td><!--
                    <?php 
                        if($content['ttd_narsum'] == 0){}else{
                    ?>
                    <img src="config/narasumber/master/dokumen_master/ttd/<?=$content['ttd']?>" width="100">
                    <?php }?>-->
                </td>
                <td>
                    <a class="btn btn-danger" href="narasumber/resume_rapat/daftar_hadir_peserta/hapus_peserta.php?id_content=<?php echo $content['id']?>&id_acara=<?php echo $id?>&paket_pekerjaan=<?=$paket_pekerjaan?>">Hapus</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
    </div>
    <button class="btn btn-primary" type="submit" name="simpan" value="1" href="config/narasumber/daftar_hadir/simpan_lamp_pendukung.php">Simpan</button>
    </form>
    </div>
</div>
</body>
</html>