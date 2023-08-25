
<div class="card mb-4">
<div class="card-body">
<p class="title">Tambah Peserta Baru</p>
<form method="post" action="config/narasumber/peserta_umum/master/create.php" enctype="multipart/form-data">
<table class="table table-striped">
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td><input class="form-control" type="number" name="nik"></td>
    </tr>
    <tr>
        <td>NIP</td>
        <td>:</td>
        <td><input class="form-control" type="number" name="nip"></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><input class="form-control" type="text" name="nama"></td>
    </tr>
    <tr>
        <td>Instansi</td>
        <td>:</td>
        <td><input class="form-control" type="text" name="instansi"></td>
    </tr>
    <tr>
        <td>Specimen</td>
        <td>:</td>
        <td><input class="form-control" type="file" name="specimen"></td>
    </tr>
</table>
<button class="btn btn-primary">Simpan</button>
</form>
</div>
</div>