<?php 

$id = htmlentities($_GET['id']);

$query_narsum = $db->prepare("SELECT * FROM master_narasumber WHERE id = :id");
$query_narsum->bindParam(':id',$id);
$query_narsum->execute();
$data = $query_narsum->fetch(PDO::FETCH_ASSOC);
?>

<div class="card mb-4">
<div class="card-body">
<p class="title">Detail Narasumber</p>
<div class="content">
<!--<form method="get" action="../../config/narasumber/master/create.php">-->
<table class="table table-striped">
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td><?php echo $data['nik']?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo $data['nama']?></td>
    </tr>
    <tr>
        <td>Instansi</td>
        <td>:</td>
        <td><?php echo $data['instansi']?></td>
    </tr>
    <tr>
        <td>NPWP</td>
        <td>:</td>
        <td><?php echo $data['npwp']?></td>
    </tr>
    <tr>
        <td>Status</td>
        <td>:</td>
        <td>
            <?php 
                if($data['status'] == "asn"){
            ?>
            <p>ASN</p>
            <?php }else {?>
            <p>Non ASN</p>
            <?php }?>
        </td>
    </tr>
    <tr>
        <td>Golongan</td>
        <td>:</td>
        <td><?php echo $data['golongan']?></td>
    </tr>
    <tr>
        <td>File NPWP</td>
        <td>:</td>
        <td>
            <?php 
                if($data['upload_npwp'] != ""){
            ?>
            <a class="btn btn-primary" href="config/narasumber/master/dokumen_master/npwp/<?php echo $data['upload_npwp']?>" target="_blank">View</a>
            <?php }?>
        </td>
    </tr>
    <tr>
        <td>File KTP</td>
        <td>:</td>
        <td>
            <?php 
                if($data['upload_ktp'] != ""){
            ?>
            <a class="btn btn-primary" href="config/narasumber/master/dokumen_master/ktp/<?php echo $data['upload_ktp']?>"  target="_blank">View</a>
            <?php }?>
        </td>
    </tr>
    <tr>
        <td>File CV</td>
        <td>:</td>
        <td>
            <?php 
                if($data['upload_cv'] != ""){
            ?>
            <a class="btn btn-primary" href="config/narasumber/master/dokumen_master/cv/<?php echo $data['upload_cv']?>"  target="_blank">View</a>
            <?php }?>
        </td>
    </tr>
    <tr>
        <td>File KAK</td>
        <td>:</td>
        <td>
            <?php 
                if($data['upload_kak'] != ""){
            ?>
            <a class="btn btn-primary" href="config/narasumber/master/dokumen_master/kak/<?php echo $data['upload_kak']?>"  target="_blank">View</a>
            <?php }?>
        </td>
    </tr>
    <tr>
        <td>Specimen</td>
        <td>:</td>
        <td>
            <?php 
                if($data['ttd'] != ""){
            ?>
            <img src="config/narasumber/master/dokumen_master/ttd/<?=$data['ttd']?>" width="100">
            <?php }?>
        </td>
    </tr>
</table>
<input type="hidden" name="id" value="<?php echo $id?>">
<a class="btn btn-primary" href="?pages=edit_master_penyedia&id=<?=$id?>">Edit</a>
<?php
    if(htmlentities(isset($_SESSION['admin']))){
        $query_login_narsum = $db->prepare("SELECT * FROM login_narsum WHERE id_dokumen = :id_dokumen");
        $query_login_narsum->bindParam(':id_dokumen',$id);
        $query_login_narsum->execute();

        if($query_login_narsum->rowCount() == 0){
        ?>
        <a class="btn btn-warning" href="?pages=buat_akun_narsum&id=<?=$id?>">Buat Akun</a>
    <?php }}
?>
</div>
</div>
<!--<button class="btn btn-primary" name="submit" type="submit">Simpan</button>
</form>-->