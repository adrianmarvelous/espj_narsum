<?php 
    $id = htmlentities($_GET['id']);

    $query_header = $db->prepare("SELECT * FROM narsum_daftar_hadir_header WHERE id = :id");
    $query_header->bindParam(':id',$id);
    $query_header->execute();
    $header = $query_header->fetch(PDO::FETCH_ASSOC);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Detail Acara Narasumber</h1>
            <div class="card">
                <div class="card-body">
                    <table>
                        <tr>
                            <td style="width: 200px;">Id</td>
                            <td style="width: 20px;">:</td>
                            <td><?php echo $header['id']?></td>
                        </tr>
                        <tr>
                            <td>Nama Acara</td>
                            <td>:</td>
                            <td><?php echo $header['acara']?></td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td>:</td>
                            <td><?php echo $header['tempat']?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Acara</td>
                            <td>:</td>
                            <td><?php echo date("d-M-Y",strtotime($header['tanggal']))?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Surat Kesediaan</td>
                            <td>:</td>
                            <td><?php echo date('d-M-Y',strtotime($header['tanggal'].$header['tanggal_surat_kesediaan'].' day'))?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Surat Undangan</td>
                            <td>:</td>
                            <td><?php echo date("d-M-Y",strtotime($header['tgl_undangan']))?></td>
                        </tr>
                        <tr>
                            <td>Pukul</td>
                            <td>:</td>
                            <td><?php echo date("h:i",strtotime($header['pukul_mulai']))." - ".date("h:i",strtotime($header['pukul_selesai']))?></td>
                        </tr>
                        <tr>
                            <td>Komponen Narasumber</td>
                            <td>:</td>
                            <td><?php echo $header['komponen']?></td>
                        </tr>
                        <tr>
                            <td>Status Daring/Luring</td>
                            <td>:</td>
                            <td><?php echo $header['daring_luring']?></td>
                        </tr>
                        <?php 
                            $query_paket_pekerjaan = $db->prepare("SELECT f1.nama FROM f1 JOIN narsum_daftar_hadir_header ON f1.id = narsum_daftar_hadir_header.paket_pekerjaan WHERE f1.id = :paket_pekerjaan");
                            $query_paket_pekerjaan->bindParam(":paket_pekerjaan",$header['paket_pekerjaan']);
                            $query_paket_pekerjaan->execute();
                            $paket_pekerjaan = $query_paket_pekerjaan->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <tr>
                            <td>Paket Pekerjaan</td>
                            <td>:</td>
                            <td><?php echo $header['paket_pekerjaan']." - ".$paket_pekerjaan['nama']?></td>
                        </tr>
                        <tr>
                            <td>Bidang</td>
                            <td>:</td>
                            <td>
                                <?php 
                                    if($header['id_bidang'] == 1){
                                        echo "Sekretariat";
                                    }elseif($header['id_bidang'] == 2){
                                        echo "PAIK";
                                    }elseif($header['id_bidang'] == 3){
                                        echo "PKP";
                                    }elseif($header['id_bidang'] == 4){
                                        echo "BangKom";
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>
                        <a class="btn btn-primary" href="index.php?pages=edit_daftar_hadir_header&id=<?=$id?>">Edit</a>
                </div>
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
                    <h1 class="mt-4">Daftar Hadir Narasumber</h1>
                    <!--<div class="card-header"><i class="fas fa-table mr-1"></i>Data NPD</div>-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Acara</th>
                                        <th>Bidang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                ?>
                                <tbody>
                                    <?php
                                    $i = 1;
                                        $query_narsum = $db->prepare("SELECT narsum_daftar_hadir_content.id_narsum, master_narasumber.nama, narsum_daftar_hadir_content.id_transaksi, narsum_daftar_hadir_content.ttd_narsum FROM narsum_daftar_hadir_content JOIN master_narasumber ON narsum_daftar_hadir_content.id_narsum = master_narasumber.id WHERE narsum_daftar_hadir_content.id_header = :id_header");
                                        $query_narsum->bindParam(':id_header',$id);
                                        $query_narsum->execute();
                                        while($narsum = $query_narsum->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $i++?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $narsum['nama']
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $narsum['id_transaksi'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if($narsum['ttd_narsum'] == 1){
                                                        $query_ttd = $db->prepare("SELECT ttd FROM master_narasumber WHERE id = :id");
                                                        $query_ttd->bindParam(':id', $narsum['id_narsum']);
                                                        $query_ttd->execute();
                                                        $ttd = $query_ttd->fetch(PDO::FETCH_ASSOC);?>
                                                        <img src="../../config/narasumber/master/dokumen_master/ttd/<?=$ttd['ttd']?>" width="100">
                                                    <?php }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="?pages=detail_acara&id=<?=$acara['id']?>" class="btn btn-primary" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>

                                                <a href="" class="btn btn-warning" title="Edit"><i class="fa fa-pen"></i>
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