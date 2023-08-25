<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Buat Akun ASN Baru</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="proses/asn/create.php" method="get">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <?php
                                $nama = array('NIP','Password','NIK','Nama','Golongan','NPWP','Jabatan','Role');
                                $kolom = array('nip','password','nik','nama','golongan','npwp','jabatan','role');

                                $jumlah = count($nama);

                                for($i=0;$i<$jumlah;$i++){
                            ?>
                            <tr>
                                <td style="width:200px"><?=$nama[$i]?></td>
                                <td>:</td>
                                <td><input class="form-control" type="text" name="<?=$kolom[$i]?>"></td>
                            </tr>
                            <?php }?>
                        </table>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>