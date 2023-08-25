<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Daftar Acara Narasumber</h1>
            
            <div class="card mb-4">
                    <!--<div class="card-header"><i class="fas fa-table mr-1"></i>Data NPD</div>-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Pukul</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                ?>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $query_acara = $db->prepare("SELECT  DISTINCT tanggal, pukul_mulai, pukul_selesai FROM narsum_daftar_hadir_header ORDER BY id DESC;");
                                    $query_acara->execute();
                                    while($acara = $query_acara->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                echo $i++;?>
                                            </td>
                                            <td>
                                                <?php 
                                                echo date("d-m-Y",strtotime($acara['tanggal'])); 
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo date("H:i",strtotime($acara['pukul_mulai']))." - ".date("H:i",strtotime($acara['pukul_selesai']))
                                                ?>
                                            </td>
                                            <td>
                                                <a href="?pages=detail_per_tgl&tanggal=<?=$acara['tanggal']?>" class="btn btn-primary" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
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