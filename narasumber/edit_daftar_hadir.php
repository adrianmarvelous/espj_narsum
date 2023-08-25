<?php 

$id = htmlentities($_GET['id']);
$tahun = htmlentities($_SESSION['tahun']);

$query_daftar = $db->prepare("SELECT * FROM narsum_daftar_hadir_header WHERE id = :id");
$query_daftar->bindParam(':id',$id);
$query_daftar->execute();
$data = $query_daftar->fetch(PDO::FETCH_ASSOC);
?>
<div class="card mb-4">
    <div class="card-body">
    <p class="title">Edit Acara</p>
    <div class="content">
        <form action="config/narasumber/daftar_hadir/update.php">
        <table class="table table-striped">
            <tr>
                <td style="width: 220px;">Hari/Tanggal Acara</td>
                <td style="width: 50px;">:</td>
                <td><input class="form-control" type="date" name="tanggal" value="<?php echo $data['tanggal']?>" required></td>
            </tr>
            <tr>
                <td style="width: 220px;">Tanggal Surat Kesediaan</td>
                <td style="width: 50px;">:</td>
                <td>
                    <select class="form-select" name="tanggal_surat_kesediaan">
                        <option value="<?=$data['tanggal_surat_kesediaan']?>"><?=$data['tanggal_surat_kesediaan']?></option>
                        <option value="0">Hari H</option>
                        <option value="-1">Hari - 1</option>
                    </select>    
                </td>
            </tr>
            <tr>
                <td style="width: 220px;">Tanggal Undangan</td>
                <td style="width: 50px;">:</td>
                <td><input class="form-control" type="date" name="tgl_undangan" value="<?php echo $data['tgl_undangan']?>" required></td>
            </tr>
            <tr>
                <td>Pukul</td>
                <td>:</td>
                <td>Mulai : <input class="form-control" type="time" name="pukul_mulai" value="<?php echo $data['pukul_mulai']?>" required> Sampai : <input class="form-control" type="time" name="pukul_selesai" value="<?php echo $data['pukul_selesai']?>" required></td>
            </tr>
            <tr>
                <td>Acara</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="acara" value="<?php echo $data['acara']?>" required></td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="tempat" value="<?php echo $data['tempat']?>" required></td>
            </tr>
            <tr>
                <td>Resume Rapat</td>
                <td>:</td>
                <td>
                <textarea name="resume"  id="content" class="form-control ckeditor" cols="120" rows="10"><?php echo $data['masukan']?></textarea>
                </td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $data['id']?>">
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    </div>
    </div>