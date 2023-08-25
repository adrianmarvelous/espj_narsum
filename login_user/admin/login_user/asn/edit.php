<?php
    $nip = htmlentities($_GET['nip']);
    $query_asn = $db->prepare("SELECT * FROM user_master_asn WHERE nip = :nip");
    $query_asn->bindParam(':nip',$nip);
    $query_asn->execute();
    $asn = $query_asn->fetch(PDO::FETCH_ASSOC);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Edit ASN</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="proses/asn/password_baru.php" method="get">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <td style="width:200px">Nama</td>
                                <td style="width:50px">:</td>
                                <td><?=$asn['nama']?></td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td>:</td>
                                <td><?=$asn['nip']?></td>
                            </tr>
                            <tr>
                                <td>Password Baru</td>
                                <td>:</td>
                                <td><input class="form-control" name="password" type="text"></td>
                            </tr>
                        </table>
                        <input type="hidden" name="nip" value="<?=$nip?>">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>