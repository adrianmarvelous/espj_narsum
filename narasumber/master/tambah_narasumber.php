    
<div class="card mb-4">
<div class="card-body">
<p class="title">Tambah Narasumber</p>
    <div class="content">
        <form method="post" action="config/narasumber/master/create.php" enctype="multipart/form-data">
        <table class="table table-striped">
            <tr>
                <td style="width: 200px;">Nama</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nama"></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nik"></td>
            </tr>
            <tr>
                <td>Instansi</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="instansi"></td>
            </tr>
            <tr>
                <td>NPWP</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="npwp"></td>
                
            </tr>
            <tr>
                <td>Status Wajib Pajak</td>
                <td>:</td>
                <td>
                    <select class="form-select" name="status" id="status" onchange="setGol()">
                        <option selected disabled>Pilih Salah Satu</option>
                        <option value="asn">PNS</option>
                        <option value="non_asn">Non PNS</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Golongan</td>
                <td>:</td>
                <td>
                    <select class="form-select" name="golongan" id="golongan" disabled>
                        <option value="-" selected disabled>Pilih Salah Satu</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nip" id="nip" disabled></td>
            </tr>
            <tr>
                <td>Nama Bank Rekening</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nama_bank"></td>
            </tr>
            <tr>
                <td>No Rekening</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="rekening_narsum"></td>
            </tr>
            <tr>
                <td>Upload NPWP</td>
                <td>:</td>
                <td><input class="form-control" type="file" name="upload_npwp" accept="application/pdf"></td>
            </tr>
            <tr>
                <td>Upload KTP</td>
                <td>:</td>
                <td><input class="form-control" type="file" name="upload_ktp" accept="application/pdf"></td>
            </tr>
            <tr>
                <td>Upload CV</td>
                <td>:</td>
                <td><input class="form-control" type="file" name="upload_cv" accept="application/pdf"></td>
            </tr>
            <tr>
                <td>Upload KAK</td>
                <td>:</td>
                <td><input class="form-control" type="file" name="upload_kak" accept="application/pdf"></td>
            </tr>
            <tr>
                <td>Upload Specimen</td>
                <td>:</td>
                <td><input class="form-control" type="file" name="ttd"></td>
            </tr>
        </table>
        <button class="btn btn-primary" name="submit" type="submit">Simpan</button>
        </form>
    </div>
    </div>
<script type="text/javascript">
    function setGol(){
        if(document.getElementById("status").value == "asn"){
            document.getElementById("golongan").removeAttribute("disabled");
            document.getElementById("nip").removeAttribute("disabled");
        }else{
            document.getElementById("golongan").selectedIndex = "0";
            document.getElementById("golongan").setAttribute("disabled", "disabled");
            document.getElementById("nip").setAttribute("disabled", "disabled");
        }
    }
</script>