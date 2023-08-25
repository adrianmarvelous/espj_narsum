<?php 

    $id = htmlentities($_GET['id']);
    $tanggal = date("Y-m-d");
    $jenis_checklist = 'narasumber pakar praktisi';


    $query_header = $db->prepare("SELECT narsum_daftar_hadir_header.*, sum(narsum_daftar_hadir_content.status_realisasi) as realisasi, narsum_daftar_hadir_content.id_narsum FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header WHERE narsum_daftar_hadir_header.id = :id");
    $query_header->bindParam(':id',$id);
    $query_header->execute();
    $data = $query_header->fetch(PDO::FETCH_ASSOC);

    $query_rekening = $db->prepare("SELECT rekening FROM rekening WHERE id_pekerjaan = :paket_pekerjaan");
    $query_rekening->bindParam(':paket_pekerjaan',$data['paket_pekerjaan']);
    $query_rekening->execute();
    $rekening = $query_rekening->fetch(PDO::FETCH_ASSOC);

    if(htmlentities(isset($_GET['id_dokumen']))){
        $id_temp = $id;
        $last_id = htmlentities($_GET['id_dokumen']);
        include 'config/checklist/create.php';
        $query_id_npd = $db->prepare("SELECT id FROM npd_header WHERE no_epayment = :id");
        $query_id_npd->bindParam(':id',$data['no_npd']);
        $query_id_npd->execute();
        $id_npd = $query_id_npd->fetch(PDO::FETCH_ASSOC);

        $query_npd_content = $db->prepare("SELECT id FROM npd_content WHERE id_header = :id_header AND paket_pekerjaan = :paket_pekerjaan");
        $query_npd_content->bindParam(':id_header',$id_npd['id']);
        $query_npd_content->bindParam(':paket_pekerjaan',$data['paket_pekerjaan']);
        $query_npd_content->execute();
        $npd_content = $query_npd_content->fetch(PDO::FETCH_ASSOC);

        $update_id_header = $db->prepare("UPDATE dokumen_realisasi SET id_header = :id_header, status_undangan_narsum = 1, status_sp_narsum = 1 WHERE id = :id");
        $update_id_header->bindParam(':id',$id_npd['id']);
        $update_id_header->bindParam(':id_header',$npd_content['id']);
        $update_id_header->execute();

        $id = $id_temp;
    }

    $query_content = $db->prepare("SELECT id, id_transaksi, id_narsum FROM narsum_daftar_hadir_content WHERE id_header = :id_header");
    $query_content->bindParam(':id_header',$id);
    $query_content->execute();
    while($data_content = $query_content->fetch(PDO::FETCH_ASSOC)){
        $last_id_dokumen = $db->prepare("SELECT max(id) max_id FROM dokumen_realisasi");
        $last_id_dokumen->execute();
        $_last_id = $last_id_dokumen->fetch(PDO::FETCH_ASSOC);
        $last_id = $_last_id['max_id'] + 1;
        
        $id_transaksi = $data_content['id_transaksi'];
        include 'config/web_service/honor.php';

        foreach($array as $result => $value) {
            if(isset($value['skpd'])){
            $komponen = $value['komponen'];
            $uraian = $value['uraian'];
            foreach($komponen as $komponen1 =>$kom){
                $uraian_komponen = $kom['komponen'];
                $detail_penerimaan = $kom['detail_penerima'];
                foreach($detail_penerimaan as $detail1 => $detail){
                    $total = $detail['jumlah'];
                    $pph = $detail['pph'];
                }
                
            }}}

        $check_dokumen = $db->prepare("SELECT id_transaksi FROM approve_upload WHERE id_transaksi = :id_transaksi");
        $check_dokumen->bindParam(':id_transaksi',$id_transaksi);
        $check_dokumen->execute();
        if($check_dokumen->rowCount() == 0){
            $id_dokumen = $last_id;
            $data_content['id_narsum'];
            $tanggal;
            $total;
            $pph;
            $rekening['rekening'];
            $uraian;
            $id;
            $data_content['id'];
            $jenis_checklist;
            
            $create_dokumen_realisasi = $db->prepare("INSERT INTO dokumen_realisasi (id,id_penyedia,tanggal,total,pph21,rekening,uraian,id_acara_content,id_acara,jenis_checklist) VALUES (:last_id,:id_penyedia,:tanggal,:total,:pph21,:rekening,:uraian,:id_acara_content,:id_acara,:jenis_checklist)");
            $create_dokumen_realisasi->bindParam(':last_id',$last_id);
            $create_dokumen_realisasi->bindParam(':id_penyedia',$data_content['id_narsum']);
            $create_dokumen_realisasi->bindParam(':tanggal',$tanggal);
            $create_dokumen_realisasi->bindParam(':total',$total);
            $create_dokumen_realisasi->bindParam(':pph21',$pph);
            $create_dokumen_realisasi->bindParam(':rekening',$rekening['rekening']);
            $create_dokumen_realisasi->bindParam(':uraian',$uraian);
            $create_dokumen_realisasi->bindParam(':id_acara_content',$data_content['id']);
            $create_dokumen_realisasi->bindParam(':id_acara',$id);
            $create_dokumen_realisasi->bindParam(':jenis_checklist',$jenis_checklist);
            $create_dokumen_realisasi->execute();

            $create_dokumen_upload = $db->prepare("INSERT INTO dokumen_realisasi_upload (id_dokumen) VALUES (:id_dokumen)");
            $create_dokumen_upload->bindParam(':id_dokumen',$last_id);
            $create_dokumen_upload->execute();

            $create_approve_upload = $db->prepare("INSERT INTO approve_upload (id_dokumen,jenis_dokumen,jenis_sub_dokumen,id_transaksi) VALUES (:id_dokumen,'edelivery','honorarium',:id_transaksi)");
            $create_approve_upload->bindParam(':id_dokumen',$id_dokumen);
            $create_approve_upload->bindParam(':id_transaksi',$id_transaksi);
            $create_approve_upload->execute();

            $create_bku = $db->prepare("INSERT INTO bku (id_dokumen,id_transaksi,jenis_sub_dokumen) VALUES (:id_dokumen,:id_transaksi,'honorarium')");
            $create_bku->bindParam(':id_dokumen',$id_dokumen);
            $create_bku->bindParam(':id_transaksi',$id_transaksi);
            $create_bku->execute();

            if($pph != 0){
                $create_bku = $db->prepare("INSERT INTO bku (id_dokumen,jenis_sub_dokumen) VALUES (:id_dokumen,'pph')");
                $create_bku->bindParam(':id_dokumen',$id_dokumen);
                $create_bku->execute();
            }
        }
        
    }


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
        </table>
            <input type="hidden" name="id" value="<?=$id?>">
        <p style="text-decoration: underline;">Resume Rapat</p>
        <p><?php echo html_entity_decode($data['masukan']);?></p>
        <?php 
            //if($data['realisasi'] != 0){
            if($_SESSION['role'] == "pembuat spj"){
        ?>
        <a class="btn btn-primary" href="?pages=edit_acara&id=<?php echo $id?>">Edit Acara <i class="fa fa-lock-open"></i></a>
        <a class="btn btn-primary" href="print/narsum_qr_code.php" target="_blank">QR Code</a>
        <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="?pages=hasil_lamp_pendukung&id=<?=$id?>">Resume Rapat</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="#">Lampiran Pendukung</a>
  </li>
</ul>
<?php }?>
<div class="card mb-4">
        <div class="card-body">
            <p class="title">Daftar Hadir Narsum</p>
                <table class="table table-striped">
                    <tr class="table-primary">
                        <th style="width: 5%;">No</th>
                        <th style="width: 45%;">Nama</th>
                        <th style="width: 10%;">Id Transaksi</th>
                        <th style="width: 45%;" colspan="3">Kelengkapan</th>
                    </tr>
                    <?php
                        $j = 1;
                        $k = 0;
                        $query_content = $db->prepare("SELECT narsum_daftar_hadir_header.id, narsum_daftar_hadir_content.id as id_content, narsum_daftar_hadir_content.ttd_narsum, narsum_daftar_hadir_content.*, master_narasumber.*, master_narasumber.id as id_narsum FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header JOIN master_narasumber ON narsum_daftar_hadir_content.id_narsum = master_narasumber.id WHERE narsum_daftar_hadir_header.id = :id;");
                        $query_content->bindParam(':id',$id);
                        $query_content->execute();
                        while($content = $query_content->fetch(PDO::FETCH_ASSOC)){
                            $k++;
                    ?>
                    <tr>
                        <input type="hidden" name="id_content[]" value="<?=$content['id_content']?>">
                        <td><?php echo $j++?></td>
                        <td><?php echo $content['nama']?></td>
                        <td><?php echo $content['id_transaksi']?></td>
                        <td>
                            <table>
                        <tr>
                            <td>Ebilling PPh</td>
                            <?php 
                                $query_ebilling = $db->prepare("SELECT ebilling_pph FROM dokumen_realisasi JOIN approve_upload ON dokumen_realisasi.id = approve_upload.id_dokumen WHERE approve_upload.id_transaksi = :id_transaksi;");
                                $query_ebilling->bindParam(':id_transaksi', $content['id_transaksi']);
                                $query_ebilling->execute();
                                $ebilling = $query_ebilling->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <td>
                                <?php
                                    echo $ebilling['ebilling_pph'];
                                ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ebilling<?=$k?>">
                                Input Ebilling
                                </button>
                            </td>
                            <!-- Button trigger modal -->

                            <form method="POST" action="config/realisasi/upload/kode_ebilling_narsum.php" enctype="multipart/form-data">
                            <!-- Modal -->
                            <div class="modal fade" id="ebilling<?=$k?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?=$content['nama']?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="">Ebilling PPh</label>
                                    <input class="form-control" name="ebilling_pph" type="text" value="<?=$ebilling['ebilling_pph']?>">
                                    <input type="hidden" name="id_transaksi" value="<?=$content['id_transaksi']?>">
                                    <input type="hidden" name="id_resume" value="<?=$id?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                </div>
                                </form>
                            </div>
                            </div>
                        </tr>
                        <?php
                            $komponen = array("ebilling_pph_file", "ssp_pph", "bukti_potong_pajak", "undangan", "surat_perintah", "surat_permohonan", "pointer", "dokumentasi1");
                            $nama = array("Upload File Ebilling PPh", "Upload SSP PPh", "Upload Bupot PPh", "Upload Undangan", "Uplaod Surat Perintah", "Upload Surat Permohonan", "Upload Pointer", "Dokumentasi");
                            $jumlah = count($komponen);
                            for($i=0;$i<$jumlah;$i++){
                        ?>
                        <tr>
                            <td style="width:300px"><?=$nama[$i]?></td>
                            <?php
                                $query_check = $db->prepare("SELECT dokumen_realisasi.id as id_dokumen, dokumen_realisasi_upload.".$komponen[$i]." FROM dokumen_realisasi JOIN dokumen_realisasi_upload ON dokumen_realisasi.id = dokumen_realisasi_upload.id_dokumen JOIN approve_upload ON approve_upload.id_dokumen = dokumen_realisasi.id WHERE approve_upload.id_transaksi = :id_transaksi");
                                $query_check->bindParam(':id_transaksi',$content['id_transaksi']);
                                $query_check->execute();
                                $check = $query_check->fetch(PDO::FETCH_ASSOC);$i.$j;
                            ?>
                            <td><a href="config/realisasi/upload/<?=$komponen[$i]?>/<?=$check[$komponen[$i]]?>" target="_blank"><?=$check[$komponen[$i]]?></a></td>
                            <td>
                                <button style="width:100%" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?=$j.$i?>">
                                Upload
                                </button>
                            </td>
                            
                            <!-- Button trigger modal -->

                            <form method="POST" action="config/realisasi/upload/upload_narsum_perdokumen.php" enctype="multipart/form-data">
                            <!-- Modal -->
                            <div class="modal fade" id="modal<?=$j.$i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?=$nama[$i]?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><?=$content['nama']?></p>
                                    <input class="form-control" type="file" name="<?=$komponen[$i]?>" accept="application/pdf" required>
                                    <input type="hidden" name="kelengkapan" value="<?=$komponen[$i]?>">
                                    <input type="hidden" name="id_transaksi" value="<?=$content['id_transaksi']?>">
                                    <input type="hidden" name="id_resume" value="<?=$id?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                                </div>
                                </form>
                            </div>
                            </div>
                        </tr>
                        <?php }?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <?php
                                    $query_kelengkapan = $db->prepare("SELECT dokumen_realisasi.id as id_dokumen, ebilling_pph_file, ssp_pph, bukti_potong_pajak, undangan, surat_permohonan, pointer, dokumentasi1 FROM dokumen_realisasi JOIN approve_upload ON dokumen_realisasi.id = approve_upload.id_dokumen JOIN narsum_daftar_hadir_content ON approve_upload.id_transaksi = narsum_daftar_hadir_content.id_transaksi JOIN master_narasumber ON narsum_daftar_hadir_content.id_narsum = master_narasumber.id JOIN dokumen_realisasi_upload ON dokumen_realisasi.id = dokumen_realisasi_upload.id_dokumen WHERE narsum_daftar_hadir_content.id_transaksi = :id_transaksi");
                                    $query_kelengkapan->bindParam('id_transaksi',$content['id_transaksi']);
                                    $query_kelengkapan->execute();
                                    $kelengkapan = $query_kelengkapan->fetch(PDO::FETCH_ASSOC);

                                    $check_checklist = $db->prepare("SELECT id_dokumen FROM checklist WHERE id_dokumen = :id_dokumen");
                                    $check_checklist->bindParam(':id_dokumen',$kelengkapan['id_dokumen']);
                                    $check_checklist->execute();

                                    if(!$kelengkapan['ebilling_pph_file'] && !$kelengkapan['ssp_pph'] && !$kelengkapan['bukti_potong_pajak'] && !$kelengkapan['undangan'] && !$kelengkapan['surat_permohonan'] && !$kelengkapan['pointer'] && !$kelengkapan['dokumentasi1']){
                                ?>
                                <button class="btn btn-primary" title="Lengkapi dokumen terlebih dahulu" disabled>Forward PPTK</button>
                                <?php }elseif($check_checklist->rowCount() == 0){?>
                                <a class="btn btn-primary" href="?pages=upload_lamp_narsum&id=<?=$id?>&id_dokumen=<?=$kelengkapan['id_dokumen']?>">Forward PPTK</a>
                                <?php }?>
                            </td>
                        </tr>
                            </table>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <?php }?>
                </table>
                <!-- Button trigger modal -->

        </div>
        </div>
</body>
</html>