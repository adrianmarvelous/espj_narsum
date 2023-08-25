<?php 
    $id = htmlentities($_GET['id']);

    $query_acara = $db->prepare("SELECT * FROM narsum_daftar_hadir_header WHERE id = :id");
    $query_acara->bindParam(':id',$id);
    $query_acara->execute();
    $acara = $query_acara->fetch(PDO::FETCH_ASSOC);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Edit Acara Narasumber</h1>
            <div class="card">
                <div class="card-body">
                    <form method="GET" action="proses/narsum/daftar_hadir/update_header_acara.php">
                        <input type="hidden" name="id" value="<?=$id?>">
                    <table>
                        <tr>
                            <td style="width: 120px;">ID</td>
                            <td style="width: 20px;">:</td>
                            <td><?php echo $acara['id']?></td>
                        </tr>
                        <tr>
                            <td>Nama Acara</td>
                            <td>:</td>
                            <td><textarea class="form-control" name="acara" id="" cols="900" rows="3"><?php echo $acara['acara']?></textarea></td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td>:</td>
                            <td><input class="form-control" type="text" name="tempat" value="<?=$acara['tempat']?>"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Acara</td>
                            <td>:</td>
                            <td><input class="form-control" type="date" name="tanggal" value="<?=$acara['tanggal']?>"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Kesediaan Acara</td>
                            <td>:</td>
                            <td>
                                <select class="form-control" name="tanggal_surat_kesediaan" id="">
                                    <option value="<?=$acara['tanggal_surat_kesediaan']?>"><?php echo $acara['tanggal_surat_kesediaan']?></option>
                                    <option value="-1">H - 1</option>
                                    <option value="0">Hari H</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Surat Undangan</td>
                            <td>:</td>
                            <td><input class="form-control" type="date" name="tgl_undangan" value="<?=$acara['tgl_undangan']?>"></td>
                        </tr>
                        <tr>
                            <td>Pukul Mulai</td>
                            <td>:</td>
                            <td><input class="form-control" type="time" name="pukul_mulai" value="<?=$acara['pukul_mulai']?>"></td>
                        </tr>
                        <tr>
                            <td>Pukul Selesai</td>
                            <td>:</td>
                            <td><input class="form-control" type="time" name="pukul_selesai" value="<?=$acara['pukul_selesai']?>"></td>
                        </tr>
                        <tr>
                            <td>Komponen Narasumber</td>
                            <td>:</td>
                            <td>
                                <select class="form-control" name="komponen" id="">
                                    <option value="<?=$acara['komponen']?>"><?php echo $acara['komponen']?></option>
                                    <option value="eselon 2">Narasumber Setingkat Eselon 2</option>
                                    <option value="eselon 3">Narasumber Setingkat Eselon 3</option>
                                    <option value="eselon 4">Narasumber Setingkat Eselon 4</option>
                                    <option value="staff">Narasumber Setingkat Staff</option>
                                    <option value="pakarpraktisi">Tenaga Pakar/Praktisi</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Status Daring/Luring</td>
                            <td>:</td>
                            <td>
                                <select class="form-control" name="daring_luring" id="">
                                    <option value="<?=$acara['daring_luring']?>"><?php echo $acara['daring_luring']?></option>
                                    <option value="luring">Luring</option>
                                    <option value="daring">Daring</option>
                                </select>
                            </td>
                        </tr>
                        <?php 
                            $query_nama_paket_pekerjaan = $db->prepare("SELECT nama FROM f1 WHERE id = :paket_pekerjaan");
                            $query_nama_paket_pekerjaan->bindParam(':paket_pekerjaan', $acara['paket_pekerjaan']);
                            $query_nama_paket_pekerjaan->execute();
                            $nama_paket = $query_nama_paket_pekerjaan->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <tr>
                            <td>Peket Pekerjaan</td>
                            <td>:</td>
                            <td>
                                <select class="form-control" name="paket_pekerjaan" id="">
                                    <option value="<?=$acara['paket_pekerjaan']?>"><?php echo $acara['paket_pekerjaan']." - ".$nama_paket['nama']?></option>
                                <?php 
                                    $query_paket_pekerjaan = $db->prepare("SELECT f1.id, f1.nama FROM f1 JOIN bidang_id_sub ON f1.id_sub = bidang_id_sub.id_sub WHERE bidang_id_sub.id_bidang = :id_bidang AND f1.nama LIKE '%Narasumber%'");
                                    $query_paket_pekerjaan->bindParam(':id_bidang',$acara['id_bidang']);
                                    $query_paket_pekerjaan->execute();
                                    while($paket_pekerjaan = $query_paket_pekerjaan->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <option value="<?=$paket_pekerjaan['id']?>"><?php echo $paket_pekerjaan['id']." - ".$paket_pekerjaan['nama']?></option>
                                <?php }?>
                                </select>
                            </td>
                        </tr>
                    </table>
                        <button class="btn btn-primary">Simpan</button>
                        </form>
                </div>
            </div>