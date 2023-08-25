<?php
$id_bidang = htmlentities($_SESSION['id_bidang']);
?>
<div class="card mb-4">
  <div class="card-body">
    <p class="title">List Acara</p>

    <div class="content">
            <?php
            if ($_SESSION['role'] == "pembuat spj") {
            ?>
          <div style="display:flex; justify-content:space-between">
                <div>
                    <a class="btn btn-primary" href="?pages=tambah_acara">Tambah Acara +</a>
                    <!-- <a class="btn btn-primary" href="?pages=tambah_acara_tapd">Tambah Acara TAPD +</a> -->
                </div>
                <!-- <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Rekap per Bulan
                    </button>
                </div> -->
            </div>
            <?php } ?>
            <br><br>
            <table class="table table-striped">
                <tr class="table-primary">
                    <th>No</th>
                    <th style="width: 100px;">Tanggal</th>
                    <th style="width: 500px;">Acara</th>
                    <th>Tempat</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $i = 1;
                if($id_bidang != 5){
                    $query_acara = $db->prepare("SELECT * FROM narsum_daftar_hadir_header WHERE id_bidang = :id_bidang and year(tanggal) = :tahun");
                    $query_acara->bindParam(':id_bidang', $id_bidang);
                }else{
                    $query_acara = $db->prepare("SELECT * FROM narsum_daftar_hadir_header WHERE year(tanggal) = :tahun");
                }
                $query_acara->bindParam(':tahun', $_SESSION['tahun']);
                $query_acara->execute();
                while ($data = $query_acara->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data['tanggal'])) ?></td>
                        <td><?php echo $data['acara'] ?></td>
                        <td><?php echo $data['tempat'] ?></td>
                        <td><?php echo $data['pukul_mulai'] ?></td>
                        <td><?php echo $data['pukul_selesai'] ?></td>
                        <td>
                            <a class="btn btn-primary" title="detail" href="?pages=hasil_lamp_pendukung&id=<?php echo $data['id'] ?>">Detail</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
    </div>
  </div>
</div><!-- Button trigger modal -->

<!-- Modal -->
<form action="config/narasumber/filter_rekap.php" method="get">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Bulan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
            include 'config/bulan_dropdown.php';
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Pilih</button>
      </div>
    </div>
  </div>
</div>
</form>