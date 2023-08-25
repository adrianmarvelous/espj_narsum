
<div class="card mb-4">
<div class="card-body">
<p class="title">List Peserta Umum</p>
<a class="btn btn-primary" href="?pages=create_peserta_umum">Tambah Peserta Baru +</a>
<table class="table table-striped">
    <tr class="table-primary">
        <td>No</td>
        <td>Nama</td>
        <td>Instansi</td>
        <td>Aksi</td>
    </tr>
    <?php $i = 1; 
        $query_data = $db->prepare("SELECT * FROM master_peserta_umum");
        $query_data->execute();
        while($data = $query_data->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
        <td><?php echo $i++?></td>
        <td><?php echo $data['nama']?></td>
        <td><?php echo $data['instansi']?></td>
        <td>
            <a class="btn btn-primary" href="?pages=detail_peserta_umum&id=<?=$data['id']?>">Detail</a>
            <a class="btn btn-danger" href="config/narasumber/peserta_umum/master/delete.php?id=<?=$data['id']?>">Hapus</a>
        </td>
    </tr>
    <?php }?>
</table>
</div>
</div>