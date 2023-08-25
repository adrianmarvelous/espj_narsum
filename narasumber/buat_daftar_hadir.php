<?php 
    $id_bidang = htmlentities($_SESSION['id_bidang']);
?>
<div class="card mb-4">
<div class="card-body">
<p class="title">Buat Acara</p>
<div class="content">
    <form action="config/narasumber/daftar_hadir/create.php">
    <table class="table table-striped">
        <tr>
            <td style="width: 220px;">Tanggal Acara</td>
            <td style="width: 50px;">:</td>
            <td><input class="form-control" type="date" name="tanggal" required></td>
        </tr>
        <tr>
            <td>Tanggal Surat Kesediaan</td>
            <td>:</td>
            <td>
                <select class="form-select" name="tanggal_surat_kesediaan">
                    <option value="-1">H - 1</option>
                    <option value="0">Hari H</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Acara</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="acara" required></td>
        </tr>
        <tr>
            <td>Tempat</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="tempat" required></td>
        </tr>
        <tr>
            <td>Pukul Mulai</td>
            <td>:</td>
            <td><input class="form-control" type="time" name="pukul_mulai" required></td>
        </tr>
        <tr>
            <td>Pukul Selesai</td>
            <td>:</td>
            <td><input class="form-control" type="time" name="pukul_selesai" required></td>
        </tr>
        <tr>
            <td>Tanggal Undangan</td>
            <td>:</td>
            <td><input class="form-control" type="date" name="tgl_undangan" required></td>
        </tr>
        <tr>
            <td>Komponen Narsum yang dipilih</td>
            <td>:</td>
            <td>
                <select class="form-select" name="komponen" id="">
                    <option value="eselon 2">Narasumber Setingkat Eselon 2</option>
                    <option value="eselon 3">Narasumber Setingkat Eselon 3</option>
                    <option value="eselon 4">Narasumber Setingkat Eselon 4</option>
                    <option value="staff">Narasumber Setingkat Staff</option>
                    <option value="pakarpraktisi">Tenaga Pakar/Praktisi</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Status Daring atau Luring</td>
            <td>:</td>
            <td>
                <select class="form-select" name="daring_luring" required>
                    <option value="luring">Luring</option>
                    <option value="daring">Daring</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Paket Pekerjaan</td>
            <td>:</td>
            <td>
                <select class="form-select" name="paket_pekerjaan">
                    <?php 
                        $query_paket_pekerjaan = $db->prepare("SELECT f1.id, f1.nama FROM f1 JOIN bidang_id_sub ON f1.id_sub = bidang_id_sub.id_sub WHERE bidang_id_sub.id_bidang = :id_bidang AND f1.tahun = :tahun AND f1.nama LIKE '%Honorarium%'");
                        $query_paket_pekerjaan->bindParam(':id_bidang',$id_bidang);
                        $query_paket_pekerjaan->bindParam(':tahun',$_SESSION['tahun']);
                        $query_paket_pekerjaan->execute();
                        while($paket_pekerjaan = $query_paket_pekerjaan->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <option value="<?=$paket_pekerjaan['id']?>"><?php echo $paket_pekerjaan['id']." - ".$paket_pekerjaan['nama']?></option>
                    <?php }?>
                </select>
            </td>
        </tr>
    </table>
    <input type="hidden" name="id_bidang" value="<?=$id_bidang?>">
    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</div>
</div>
    