<?php 
    $id = htmlentities($_GET['id']);

    $query_data = $db->prepare("SELECT * FROM master_peserta_umum WHERE id = :id");
    $query_data->bindParam(':id',$id);
    $query_data->execute();
    $data = $query_data->fetch(PDO::FETCH_ASSOC);
?>
<div class="card mb-4">
<div class="card-body">
<p class="title">Tambah Peserta Baru</p>
<form method="post" action="config/narasumber/peserta_umum/master/create.php" enctype="multipart/form-data">
<table class="table table-striped">
    <tr>
        <td style="width: 200px;">NIK</td>
        <td style="width: 20px;">:</td>
        <td><?php echo $data['nik']?></td>
    </tr>
    <tr>
        <td>NIP</td>
        <td>:</td>
        <td><?php echo $data['nip']?></td>
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
        <td>Specimen</td>
        <td>:</td>
        <td>
            <?php 
                if($data['specimen'] != ""){
            ?>
            <img src="config/narasumber/peserta_umum/master/specimen/<?=$data['specimen']?>">
            <?php }?>
        </td>
    </tr>
</table>
<!--<button class="btn btn-primary">Simpan</button>-->
</form>
</div>
</div>