<?php 
$id = htmlentities($_GET['id']);

$query_narsum = $db->prepare("SELECT * FROM master_narasumber WHERE id = :id");
$query_narsum->bindParam(':id',$id);
$query_narsum->execute();
$data = $query_narsum->fetch(PDO::FETCH_ASSOC);
?>

<div class="card mb-4">
<div class="card-body">
<p class="title">Edit Narasumber</p>
<div class="content">
    <form method="post" action="config/narasumber/master/update.php"  enctype="multipart/form-data">
    <table class="table table-striped">
        <tr class="table-primary">
            <td colspan="3">Kelengkapan</td>
        </tr>
        <tr>
            <td style="width: 200px;">NIP</td>
            <td>:</td>
            <td><input class="form-control" type="number" name="nip" value="<?php echo $data['nip']?>"></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><input class="form-control" type="number" name="nik" value="<?php echo $data['nik']?>"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="nama" value="<?php echo $data['nama']?>"></td>
        </tr>
        <tr>
            <td>Instansi</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="instansi" value="<?php echo $data['instansi']?>"></td>
        </tr>
        <tr>
            <td>NPWP</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="npwp" value="<?php echo $data['npwp']?>"></td>
        </tr>
        <tr>
            <td>Status Wajib Pajak</td>
            <td>:</td>
            <td>
                <select class="form-select" name="status" id="status"  onchange="setGol()">
                    <?php 
                        if($data['status'] == 'asn'){
                    ?>
                    <option value="asn">PNS</option>
                    <option value="non_asn">Non PNS</option>
                    <?php }else{?>
                    <option value="non_asn">Non PNS</option>
                    <option value="asn">PNS</option>
                    <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Golongan</td>
            <td>:</td>
            <td>
                <?php 
                    if($data['status'] != 'asn'){
                ?>
                <select class="form-select" name="golongan" id="golongan" disabled>
                <?php }else{?>
                <select class="form-select" name="golongan" id="golongan">
                <?php }?>
                    <option value="<?=$data['golongan']?>"><?php echo $data['golongan']?></option>
                    <option value="-" disabled>Pilih salah satu</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nama Bank</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="nama_bank" value="<?php echo $data['nama_bank']?>"></td>
        </tr>
        <tr>
            <td>Rekening Narasumber</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="rekening_narsum" value="<?php echo $data['rekening_narsum']?>"></td>
        </tr>
    </table>
    <table class="table table-striped">
        <tr class="table-dark">
            <td style="width: 200px;">Kelengkapan</td>
            <td style="width: 20px;"></td>
            <td>File Lama</td>
            <td>File Baru</td>
        </tr>
        <tr>
            <td>Upload NPWP</td>
            <td>:</td>
            <td>
                <?php 
                    if($data['upload_npwp'] != ""){
                ?>
                <a class="btn btn-primary" href="config/narasumber/master/dokumen_master/npwp/<?=$data['upload_npwp']?>" target="_blank">View</a>
                <?php }?>
            </td>
            <td><input class="form-control" type="file" name="upload_npwp" accept="application/pdf"></td>
        </tr>
        <tr>
            <td>Upload KTP</td>
            <td>:</td>
            <td>
                <?php 
                    if($data['upload_ktp'] != ""){
                ?>
                <a class="btn btn-primary" href="config/narasumber/master/dokumen_master/ktp/<?=$data['upload_ktp']?>" target="_blank">View</a>
                <?php }?>
            </td>
            <td><input class="form-control" type="file" name="upload_ktp" accept="application/pdf"></td>
        </tr>
        <tr>
            <td>Upload CV</td>
            <td>:</td>
            <td>
                <?php 
                    if($data['upload_cv'] != ""){
                ?>
                <a class="btn btn-primary" href="config/narasumber/master/dokumen_master/cv/<?=$data['upload_cv']?>" target="_blank">View</a>
                <?php }?>
            </td>
            <td><input class="form-control" type="file"  name="upload_cv" accept="application/pdf"></td>
        </tr>
        <tr>
            <td>Upload KAK</td>
            <td>:</td>
            <td>
                <?php 
                    if($data['upload_kak'] != ""){
                ?>
                <a class="btn btn-primary" href="config/narasumber/master/dokumen_master/kak/<?=$data['upload_kak']?>" target="_blank">View</a>
                <?php }?>
            </td>
            <td><input class="form-control" type="file" name="upload_kak" accept="application/pdf"></td>
        </tr>
        <tr>
            <td>Upload Specimen</td>
            <td>:</td>
            <td>
                <?php 
                    if($data['ttd'] != ""){
                ?>
                <a class="btn btn-primary" href="config/narasumber/master/dokumen_master/ttd/<?=$data['ttd']?>" target="_blank">View</a>
                <?php }?>
            </td>
            <td><input class="form-control" type="file" name="ttd"></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?php echo $id?>">
    <button class="btn btn-primary" name="submit" type="submit">Simpan</button>
    </form>
</div>
</div>
</div>
<script type="text/javascript">
    function setGol(){
        if(document.getElementById("status").value == "asn"){
            document.getElementById("golongan").removeAttribute("disabled");
        }else{
            document.getElementById("golongan").selectedIndex = "1";
            document.getElementById("golongan").setAttribute("disabled", "disabled");
        }
    }
</script>