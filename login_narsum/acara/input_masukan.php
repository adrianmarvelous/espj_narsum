<?php
$id_login = htmlentities($_SESSION['id']);
$query_id_narsum = $db->prepare("SELECT * FROM login_narsum WHERE id = :id_login");
$query_id_narsum->bindParam(':id_login', $id_login);
$query_id_narsum->execute();
$query_narsum = $query_id_narsum->fetch(PDO::FETCH_ASSOC);
$id_narsum = $query_narsum['id_dokumen'];
$id_acara = htmlentities($_GET['id_acara']);
$query_header = $db->prepare("SELECT *,  day(tanggal) as tgl, month(tanggal) as bln, year(tanggal) as thn FROM narsum_daftar_hadir_header WHERE id = :id_acara");
$query_header->bindParam(':id_acara', $id_acara);
$query_header->execute();
$header = $query_header->fetch(PDO::FETCH_ASSOC);
$bulan = $header['bln'];
include '../config/bulan.php';
?>
<div id="layoutSidenav_content">
    <?php //echo $id_thr_master = $_GET['id_thr_master']; 
    ?>
    <main>
        <div class="container-fluid">
            <h5 class="mt-4">
                <center>Detail Acara
                </center>
            </h5>
            <div class="card mb-4">
                <div class="card-body">
                    <table>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?php echo $header['tgl'] . " " . $bulan_ . " " . $header['thn'] ?></td>
                        </tr>
                        <tr>
                            <td>Pukul</td>
                            <td>:</td>
                            <td><?php echo $header['pukul_mulai'] . " - " . $header['pukul_selesai'] ?></td>
                        </tr>
                        <tr>
                            <td>Acara</td>
                            <td>:</td>
                            <td><?php echo $header['acara'] ?></td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td>:</td>
                            <td><?php echo $header['tempat'] ?></td>
                        </tr>
                    </table>
                    <div>
                        <form action="acara/simpan_masukan.php" method="get">
                            <div>
                                <?php
                                $query_content = $db->prepare("SELECT narsum_daftar_hadir_content.ttd_narsum, narsum_daftar_hadir_content.masukan FROM narsum_daftar_hadir_header JOIN narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = narsum_daftar_hadir_content.id_header WHERE narsum_daftar_hadir_header.id = :id_acara AND narsum_daftar_hadir_content.id_narsum = :id_narsum");
                                $query_content->bindParam(':id_acara', $id_acara);
                                $query_content->bindParam(':id_narsum', $id_narsum);
                                $query_content->execute();
                                $ttd = $query_content->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <input type="hidden" name="id_acara" value="<?= $id_acara ?>">
                                <input type="hidden" name="id_narsum" value="<?= $id_narsum ?>">
                                <p>Masukan : </p>
                                <div style="display: flex;flex-direction: column;">
                                    <textarea name="masukan" id="content" class="form-control ckeditor" cols="130" rows="10" style="margin-bottom:20px;"></textarea>
                                    <div style="display: flex;justify-content:flex-end;margin-bottom:20px;">
                                        <!--<button class="btn btn-primary" style="width: 130px;">Simpan dan Approve</button>-->
                                    </div>
                                </div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    Simpan dan Approve
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Perhatian</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Silahkan menandatangani surat kesediaan, daftar hadir, saran/masukan, resume dan daftar penerimaan honor.
                                            </div>
                                            <div class="modal-footer">

                                                <!--<form method="GET" action="transaksi/approve.php">-->
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <!--<input type="hidden" name="id_nota" value="<?= $id_nota ?>">-->
                                                <button type="sumbit" class="btn btn-primary">Approve</button>
                                                <!--</form>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Instansi</th>
                                <th>Tanda Tangan</th>
                            </tr>
                            <?php
                            $i = 1;
                            $query_nota = $db->prepare("SELECT narsum_daftar_hadir_content.*, master_narasumber.* FROM narsum_daftar_hadir_content JOIN master_narasumber ON narsum_daftar_hadir_content.id_narsum = master_narasumber.id WHERE narsum_daftar_hadir_content.id_header = :id_acara  AND narsum_daftar_hadir_content.id_narsum = :id_narsum");
                            $query_nota->bindParam(':id_acara', $id_acara);
                            $query_nota->bindParam(':id_narsum', $id_narsum);
                            $query_nota->execute();
                            while ($nota = $query_nota->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $nota['nama'] ?></td>
                                    <td><?php echo $nota['instansi'] ?></td>
                                    <td>
                                        <?php
                                        if ($nota['ttd_narsum'] == 0) {
                                        } else {
                                        ?>
                                            <img src="../config/narasumber/master/dokumen_master/ttd/<?= $nota['ttd'] ?>" width="100">
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>