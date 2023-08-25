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
            <h1 class="mt-4">Detail Acara</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <table>
                        <tr>
                            <td style="width:100px">Acara</td>
                            <td style="width:20px">:</td>
                            <td><?=$acara['acara']?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?=date("d-M-Y",strtotime($acara['tanggal']))?></td>
                        </tr>
                        <tr>
                            <td>Pukul</td>
                            <td>:</td>
                            <td><?=$acara['pukul_mulai']?> - <?=$acara['pukul_selesai']?></td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td>:</td>
                            <td><?=$acara['tempat']?></td>
                        </tr>
                    </table>
                    <form action="config/client/acara/approval.php" method="GET">
                        <p>Resume Rapat</p>
                        <textarea name="masukan" id="content" class="form-control ckeditor" cols="40" rows="10"><?php echo $acara['masukan']?></textarea>
                        <br>
                        <input type="hidden" name="id" value=<?=$id?>>
                        <button class="btn btn-primary" type="submit">Approve dan Simpan</button>
                    </form>
                </div>
            </div>