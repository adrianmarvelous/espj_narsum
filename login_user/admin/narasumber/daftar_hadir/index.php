<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Daftar Acara Narasumber</h1>
            <div>
                <a class="btn btn-primary" href="index.php?pages=index_daftar_hadir&bidang=1">Sekretariat</a>
                <a class="btn btn-primary" href="index.php?pages=index_daftar_hadir&bidang=2">PAIK</a>
                <a class="btn btn-primary" href="index.php?pages=index_daftar_hadir&bidang=3">PKP</a>
                <a class="btn btn-primary" href="index.php?pages=index_daftar_hadir&bidang=4">BangKom</a>
            </div>
            <!--<li class="breadcrumb-item active">-->
                <table border="0" align="right">
                    <tr>
                        <td align="left">
                        </td>
                    </tr>
                </table>     
                <!--</li>-->
                <br><br>
                <div class="card mb-4">
                    <!--<div class="card-header"><i class="fas fa-table mr-1"></i>Data NPD</div>-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tanggal</th>
                                        <th>Acara</th>
                                        <th>Bidang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                ?>
                                <tbody>
                                    <?php
                                    if(htmlentities(!isset($_GET['bidang']))){
                                        $query_acara = $db->prepare("SELECT * FROM narsum_daftar_hadir_header");
                                    }else{
                                        $id_bidang = htmlentities($_GET['bidang']);
                                        $query_acara = $db->prepare("SELECT * FROM narsum_daftar_hadir_header WHERE id_bidang = :id_bidang");
                                        $query_acara->bindParam(':id_bidang', $id_bidang);
                                    }
                                    $query_acara->execute();
                                    while($acara = $query_acara->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                echo $acara['id'];?>
                                            </td>
                                            <td>
                                                <?php 
                                                echo date("d-m-Y",strtotime($acara['tanggal'])); 
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $acara['acara'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                if($acara['id_bidang'] == 1){
                                                    echo "Sekretariat";
                                                }elseif($acara['id_bidang'] == 2){
                                                    echo "PAIK";
                                                }elseif($acara['id_bidang'] == 3){
                                                    echo "PKP";
                                                }elseif($acara['id_bidang'] == 4){
                                                    echo "BangKom";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="?pages=detail_acara&id=<?=$acara['id']?>" class="btn btn-primary" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>

                                                <a href="?pages=edit_daftar_hadir_header&id=<?=$acara['id']?>" class="btn btn-warning" title="Edit"><i class="fa fa-pen"></i>
                                                </a>

                                                 <a href="proses/narsum/daftar_hadir/delete.php?id=<?=$acara['id']?>" class="btn btn-danger" title="Edit"><i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>