<?php
    $tanggal = htmlentities($_GET['tanggal']);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Detail Acara Tanggal <?php echo date("d-M-Y",strtotime($tanggal))?></h1>
            <div class="card mb-4">
                    <!--<div class="card-header"><i class="fas fa-table mr-1"></i>Data NPD</div>-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bidang</th>
                                        <th>Nama</th>
                                        <th>Masukan</th>
                                    </tr>
                                </thead>
                                <?php
                                ?>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $query_acara = $db->prepare("SELECT narsum_daftar_hadir_header.id_bidang, master_narasumber.nama, narsum_daftar_hadir_content.masukan FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header JOIN master_narasumber ON narsum_daftar_hadir_content.id_narsum = master_narasumber.id WHERE narsum_daftar_hadir_header.tanggal = :tanggal;");
                                    $query_acara->bindParam(':tanggal',$tanggal);
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
                                                    switch($acara['id_bidang']){
                                                        case 1:
                                                            echo "Sekretariat";
                                                            break;
                                                        case 2:
                                                            echo "PAIK";
                                                            break;
                                                        case 3:
                                                            echo "PKP";
                                                            break;
                                                        case 4:
                                                            echo "Bangkom";
                                                            break;
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $acara['nama'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo html_entity_decode($acara['masukan']);
                                                ?>
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