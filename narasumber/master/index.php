<div class="card mb-4">
    <div class="card-body">
        <p class="title">Data Narasumber</p>
        <div class="content">
            <a class="btn btn-primary" href="?pages=index_peserta_umum">Peserta Umum</a>
            <a class="btn btn-primary" href="?pages=tambah_narsum">Tambah Narasumber +</a>
            <br>
            <!--<form method="get" action="config/narasumber/search.php">-->
                <form method="get" action="index.php">
                    <input type="hidden" name="pages" value="narasumber">
                    <br>
                    <label>Cari Narassumber</label>
                    <input class="form-control" type="text" name="filter" style="width: 300px; margin-bottom: 10px;">
                    <button class="btn btn-primary" type="submit" name="search">
                        <i class="fa fa-search" aria-hidden="true"></i> Cari
                    </button>
                    <br><br>
                </form>
                <table class="table table-striped">
                    <tr class="table-primary">
                        <th>No.</th>
                        <th>Nama Narasumber</th>
                        <th>Instansi</th>
                        <th>Aksi</th>
                    </tr>
                    <?php 
                    $i = 1;
                    if (htmlentities(isset($_GET['filter']))){
                    $filter = htmlentities($_GET['filter']);
                    $query_narasumber = $db->prepare("SELECT * FROM master_narasumber where nama like :filter");
                    $filter_get = "%".$filter."%";
                    $query_narasumber->bindParam(':filter',$filter_get);
                    }
                    else{
                    $query_narasumber = $db->prepare("SELECT * FROM master_narasumber");
                    }
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
            </div>
        </div>