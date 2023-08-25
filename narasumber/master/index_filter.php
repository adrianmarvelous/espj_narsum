<?php 
	$filter = htmlentities($_GET['filter']);
?>
<p class="title">Data Narasumber</p>
    <div class="content">
        <a class="btn btn-primary" href="?pages=tambah_narsum">Tambah Narasumber +</a>
        <br>
		<form method="get" action="config/narasumber/search.php">
		<label>Cari Narassumber</label>
		<input class="form-control" type="text" name="filter" style="width: 300px; margin-bottom: 10px;">
		<button class="btn btn-primary" type="submit" name="search">Cari</button>
		<br><br>
		</form>
        <table class="table table-striped">
            <tr class="table-dark">
                <th>No.</th>
                <th>Nama Narasumber</th>
                <th>Instansi</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $i = 1;
                $query_narasumber = $db->prepare("SELECT * FROM master_narasumber WHERE nama = :filter");
                $query_narasumber->bindParam(':filter',$filter);
                $query_narasumber->execute();
                while($data = $query_narasumber->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo $i++?></td>
                <td><?php echo $data['nama']?></td>
                <td><?php echo $data['instansi']?></td>
                <td>
                    <!--<a class="btn btn-primary" href="edit.php?id=<?php echo $data['id']?>">Edit</a>-->
                    <a class="btn btn-primary" href="?pages=detail_narsum&id=<?php echo $data['id']?>">Detail</a>
                    <a class="btn btn-danger" href="config/narasumber/master/delete.php?id=<?php echo $data['id']?>">Hapus</a>
                </td>
            </tr>
            <?php }?>
        </table>