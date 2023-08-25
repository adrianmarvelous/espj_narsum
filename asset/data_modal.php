<script type="text/javascript">
        // Get the <datalist> and <input> elements.
        var dataList = document.getElementById('json-datalist');
        var input = document.getElementById('ajax');

// Create a new XMLHttpRequest.
var request = new XMLHttpRequest();

// Handle state changes for the request.
request.onreadystatechange = function(response) {
    if (request.readyState === 4) {
        if (request.status === 200) {
      // Parse the JSON
      var jsonOptions = JSON.parse(request.responseText);

      // Loop over the JSON array.
      jsonOptions.forEach(function(item) {
        // Create a new <option> element.
        var option = document.createElement('option');
        // Set the value using the item in the JSON array.
        option.value = item;
        // Add the <option> element to the <datalist>.
        dataList.appendChild(option);
    });
      
      // Update the placeholder text.
      input.placeholder = "e.g. datalist";
  } else {
      // An error occured :(
      input.placeholder = "Couldn't load datalist options :(";
  }
}
};

// Update the placeholder text.
input.placeholder = "Loading options...";

// Set up and make the request.
request.open('GET', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/4621/html-elements.json', true);
request.send();
</script>

<!-- Modal Surat -->
<div class="row">
    <div id="modal-add_nomor_surat" tabindex="-1" class="modal fade">
        <div class="modal-dialog">
            <?php 
            $query_select_max_no_hal = mysqli_query($koneksi,"select max(id_halaman) as id_halaman,max(halaman) as max_no_hal from halaman_surat");
            $data_no_hal = mysqli_fetch_array($query_select_max_no_hal);
            $id_halaman = $data_no_hal['id_halaman'];
            $max_no_hal = $data_no_hal['max_no_hal'];
            $hal_baru = $max_no_hal+1;

            if (is_null($max_no_hal)) {
                $query_insert_no_hal = mysqli_query($koneksi,"INSERT INTO `halaman_surat`(`id_halaman`, `halaman`) VALUES ('','0')");
            }

            $query_select_max_nomor_urut = mysqli_query($koneksi,"select max(no_urut) as max_no_urut from daftar_nomor_surat where id_halaman = '$id_halaman'");
            $data_nomor_urut = mysqli_fetch_array($query_select_max_nomor_urut);
            $max_nomor_urut = $data_nomor_urut['max_no_urut'];
            $mulai_nomor_urut = 0;
            ?>
            <form action="proses_insert_daftar_pengendali_surat.php" method="POST">

                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><font color="#f8f9fc">Tambah Daftar Pengendali Surat</font></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="InputHalaman">Halaman</label>
                            <input type="hidden" name="id_halaman" value="<?php echo $id_halaman; ?>" required>
                            <input type="text" name="no_hal" value="<?php echo $max_no_hal; ?>" class="form-control" id="InputHalaman" readonly>
                        </div>
                        <input type="hidden" name="nomor" value="<?php if ($max_nomor_urut == 99){echo $mulai_nomor_urut;} else if (is_null($max_nomor_urut)){echo $mulai_nomor_urut;} else{ echo $max_nomor_urut+1; }  ?>" class="form-control" id="InputNomor" readonly>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="NoSurat">KD Permasalahan</label>
                                <!--<select name="no_surat" class="form-control" id="InputNoSurat">
                                    <option disabled selected> Pilih </option>
                                    <?php
                                    $query_get_permasalahan = mysqli_query($koneksi,"select * from permasalahan");
                                    while ($data_permasalahan = mysqli_fetch_array($query_get_permasalahan)){
                                        ?>
                                        <option value="<?php echo $data_permasalahan['kode_permasalahan'];?>"><?php echo $data_permasalahan['kode_permasalahan'];?></option>
                                        <?php 
                                    }
                                    ?>
                                </select>-->
                                <!--<input type="text" name="no_surat" id="kode_permasalahan" class="form-control">-->
                                

                                <input type="text" class="form-control" name="no_surat" id="default" list="kode_permasalahan">

                                <datalist id="kode_permasalahan">
                                    <?php
                                    $query_get_permasalahan = mysqli_query($koneksi,"select * from permasalahan");
                                    while ($data_permasalahan = mysqli_fetch_array($query_get_permasalahan)){
                                        ?>
                                        <option value="<?php echo $data_permasalahan['kode_permasalahan'];?>"><?php echo $data_permasalahan['uraian'];?></option>
                                        <?php 
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <!--<div class="form-group col-sm-4">
                                <label for="BidangSurat">Bidang</label>
                                <select name="bidang_surat" class="form-control" id="InputBidang">
                                    <option disabled selected> Pilih </option>
                                    <?php
                                    $query_get_bidang = mysqli_query($koneksi,"select * from bidang");
                                    while ($data_bidang = mysqli_fetch_array($query_get_bidang)){
                                        ?>
                                        <option style="width:150px" value="<?php echo $data_bidang['id_bidang'];?>"><?php echo $data_bidang['nama_bidang'];?></option>
                                        <?php 
                                    }
                                    ?>
                                </select>
                            </div>-->
                            <input type="hidden" name="bidang_surat" class="form-control" value="<?php echo $_SESSION['id_bidang']; ?>">
                            <div class="form-group col-sm-6">
                                <label for="id_naskah_dinas_surat">Jenis Surat</label>
                                <select name="id_naskah_dinas_surat" class="form-control" id="id_naskah_dinas_surat">
                                    <option disabled selected> Pilih </option>
                                    <?php
                                    $query_get_naskah_dinas_surat = mysqli_query($koneksi,"select * from naskah_dinas where jenis_naskah_dinas = 'Surat'");
                                    while ($data_naskah_dinas_surat = mysqli_fetch_array($query_get_naskah_dinas_surat)){
                                        ?>
                                        <option value="<?php echo $data_naskah_dinas_surat['id_naskah_dinas'];?>"><?php echo $data_naskah_dinas_surat['uraian'];?></option>
                                        <?php 
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" name="tahun_surat" class="form-control" id="InputTahun" value="<?php echo date('Y'); ?>"  readonly>
                        </div>
                        <div class="form-group">
                            <label for="InputPerihal">Perihal</label>
                            <input type="text" name="perihal_surat" class="form-control" id="InptPerihal">
                        </div>
                        <div class="form-group">
                            <label for="InputTanggal">Tanggal</label>
                            <input type="date" name="tanggal_keluar" class="form-control" id="InputTanggal" placeholder="Input Tanggal Keluar" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary"><i class="icon-pencil5"></i> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Produk Hukum -->
    <div class="row">
        <div id="modal-add_produk_hukum" tabindex="-1" class="modal fade">
            <div class="modal-dialog">
                <?php 
                $query_select_max_no_hal = mysqli_query($koneksi,"select max(id_halaman) as id_halaman,max(halaman) as max_no_hal from halaman_produk_hukum");
                $data_no_hal = mysqli_fetch_array($query_select_max_no_hal);
                $id_halaman = $data_no_hal['id_halaman'];
                $max_no_hal = $data_no_hal['max_no_hal'];
                $hal_baru = $max_no_hal+1;

                if (is_null($max_no_hal)) {
                    $query_insert_no_hal = mysqli_query($koneksi,"INSERT INTO `halaman_produk_hukum`(`id_halaman`, `halaman`) VALUES ('','0')");
                }

                $query_select_max_nomor_urut = mysqli_query($koneksi,"select max(no_urut) as max_no_urut from daftar_nomor_produk_hukum where id_halaman = '$id_halaman'");
                $data_nomor_urut = mysqli_fetch_array($query_select_max_nomor_urut);
                $max_nomor_urut = $data_nomor_urut['max_no_urut'];
                $mulai_nomor_urut = 0;
                ?>
                <form action="proses_insert_daftar_pengendali_produk_hukum.php" method="POST">

                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title"><font color="#f8f9fc">Tambah Daftar Pengendali Produk Hukum</font></h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="InputHalaman">Halaman</label>
                                <input type="hidden" name="id_halaman" value="<?php echo $id_halaman; ?>" required>
                                <input type="text" name="no_hal" value="<?php echo $max_no_hal; ?>" class="form-control" id="InputHalaman" readonly>
                            </div>
                            <input type="hidden" name="nomor" value="<?php if ($max_nomor_urut == 99){echo $mulai_nomor_urut;} else if (is_null($max_nomor_urut)){echo $mulai_nomor_urut;} else{ echo $max_nomor_urut+1; }  ?>" class="form-control" id="InputNomor" readonly>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="NoSurat">KD Permasalahan</label>
                                    <!--<select name="no_surat" class="form-control" id="InputNoSurat">
                                        <option disabled selected> Pilih </option>
                                        <?php
                                        $query_get_permasalahan = mysqli_query($koneksi,"select * from surat");
                                        while ($data_permasalahan = mysqli_fetch_array($query_get_permasalahan)){
                                            ?>
                                            <option value="<?php echo $data_permasalahan['kode_permasalahan'];?>"><?php echo $data_permasalahan['kode_permasalahan'];?></option>
                                            <?php 
                                        }
                                        ?>
                                    </select>-->
                                    <input type="text" class="form-control" name="no_surat" id="default" list="kode_permasalahan">

                                    <datalist id="kode_permasalahan">
                                        <?php
                                        $query_get_permasalahan = mysqli_query($koneksi,"select * from permasalahan");
                                        while ($data_permasalahan = mysqli_fetch_array($query_get_permasalahan)){
                                            ?>
                                            <option value="<?php echo $data_permasalahan['kode_permasalahan'];?>"><?php echo $data_permasalahan['uraian'];?></option>
                                            <?php 
                                        }
                                        ?>
                                    </datalist>
                                </div>
                                <!--<div class="form-group col-sm-4">
                                    <label for="BidangSurat">Bidang</label>
                                    <select name="bidang_surat" class="form-control" id="InputBidang">
                                        <option disabled selected> Pilih </option>
                                        <?php
                                        $query_get_bidang = mysqli_query($koneksi,"select * from bidang");
                                        while ($data_bidang = mysqli_fetch_array($query_get_bidang)){
                                            ?>
                                            <option style="width:150px" value="<?php echo $data_bidang['id_bidang'];?>"><?php echo $data_bidang['nama_bidang'];?></option>
                                            <?php 
                                        }
                                        ?>
                                    </select>
                                </div>-->
                                <input type="hidden" name="bidang_surat" class="form-control" value="<?php echo $_SESSION['id_bidang']; ?>">
                                <div class="form-group col-sm-6">
                                    <label for="id_naskah_dinas_surat">Jenis Surat</label>
                                    <!--<select name="id_naskah_dinas_surat" class="form-control" id="id_naskah_dinas_surat">
                                        <option disabled selected> Pilih </option>
                                        <?php
                                        $query_get_naskah_dinas_surat = mysqli_query($koneksi,"select * from naskah_dinas where jenis_naskah_dinas = 'Produk Hukum'");
                                        while ($data_naskah_dinas_surat = mysqli_fetch_array($query_get_naskah_dinas_surat)){
                                            ?>
                                            <option value="<?php echo $data_naskah_dinas_surat['id_naskah_dinas'];?>"><?php echo $data_naskah_dinas_surat['uraian'];?></option>
                                            <?php 
                                        }
                                        ?>
                                    </select>-->
                                    <?php
                                    $query_get_naskah_dinas_surat = mysqli_query($koneksi,"select * from naskah_dinas where jenis_naskah_dinas = 'Produk Hukum'");
                                    $data_naskah_dinas_surat = mysqli_fetch_array($query_get_naskah_dinas_surat);
                                    ?>
                                    <input type="text" class="form-control" name="id_naskah_dinas_surat" value="<?php echo $data_naskah_dinas_surat['uraian'];?>" disabled>
                                </div>
                                <input type="hidden" name="tahun_surat" class="form-control" id="InputTahun" value="<?php echo date('Y'); ?>"  readonly>
                            </div>
                            <div class="form-group">
                                <label for="InputPerihal">Perihal</label>
                                <input type="text" name="perihal_surat" class="form-control" id="InptPerihal">
                            </div>
                            <div class="form-group">
                                <label for="InputTanggal">Tanggal</label>
                                <input type="date" name="tanggal_keluar" class="form-control" id="InputTanggal" placeholder="Input Tanggal Keluar" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="submit" id="submit" class="btn btn-primary"><i class="icon-pencil5"></i> Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal TENAGA KONTRAK -->
        <div class="row">
            <div id="modal-add_spk_tenaga_kontrak" tabindex="-1" class="modal fade">
                <div class="modal-dialog">
                    <?php 
                    $query_select_max_no_hal = mysqli_query($koneksi,"select max(id_halaman) as id_halaman,max(halaman) as max_no_hal from halaman_spk_tenaga_kontrak");
                    $data_no_hal = mysqli_fetch_array($query_select_max_no_hal);
                    $id_halaman = $data_no_hal['id_halaman'];
                    $max_no_hal = $data_no_hal['max_no_hal'];
                    $hal_baru = $max_no_hal+1;

                    if (is_null($max_no_hal)) {
                        $query_insert_no_hal = mysqli_query($koneksi,"INSERT INTO `halaman_spk_tenaga_kontrak`(`id_halaman`, `halaman`) VALUES ('','0')");
                    }

                    $query_select_max_nomor_urut = mysqli_query($koneksi,"select max(no_urut) as max_no_urut from daftar_nomor_spk_tenaga_kontrak where id_halaman = '$id_halaman'");
                    $data_nomor_urut = mysqli_fetch_array($query_select_max_nomor_urut);
                    $max_nomor_urut = $data_nomor_urut['max_no_urut'];
                    $mulai_nomor_urut = 0;
                    ?>
                    <form action="proses_insert_daftar_pengendali_spk_tenaga_kontrak.php" method="POST">

                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title"><font color="#f8f9fc">Tambah Daftar Pengendali SPK Tenaga Kontrak</font></h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <?php
                                $query_get_pengadaan_barjas_surat = mysqli_query($koneksi,"select * from pengadaan_barjas where id = 1");
                                $data_pengadaan_barjas_surat = mysqli_fetch_array($query_get_pengadaan_barjas_surat);
                                echo "<b>Jenis Surat : ".$data_pengadaan_barjas_surat['uraian']."</b>";
                                echo "<b><hr></b>";
                                ?>
                                <div class="form-group">
                                    <label for="InputHalaman">Halaman</label>
                                    <input type="hidden" name="id_halaman" value="<?php echo $id_halaman; ?>" required>
                                    <input type="text" name="no_hal" value="<?php echo $max_no_hal; ?>" class="form-control" id="InputHalaman" readonly>
                                </div>
                                <input type="hidden" name="nomor" value="<?php if ($max_nomor_urut == 99){echo $mulai_nomor_urut;} else if (is_null($max_nomor_urut)){echo $mulai_nomor_urut;} else{ echo $max_nomor_urut+1; }  ?>" class="form-control" id="InputNomor" readonly>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="NoSurat">KD Permasalahan</label>
                                        <input type="text" class="form-control" name="no_surat" id="default" list="kode_permasalahan">
                                        <datalist id="kode_permasalahan">
                                            <?php
                                            $query_get_permasalahan = mysqli_query($koneksi,"select * from permasalahan");
                                            while ($data_permasalahan = mysqli_fetch_array($query_get_permasalahan)){
                                                ?>
                                                <option value="<?php echo $data_permasalahan['kode_permasalahan'];?>"><?php echo $data_permasalahan['uraian'];?></option>
                                                <?php 
                                            }
                                            ?>
                                        </datalist>
                                    </div>

                                    <input type="hidden" name="bidang_surat" class="form-control" value="<?php echo $_SESSION['id_bidang']; ?>">

                                    <input type="hidden" name="id_pengadaan_barjas_surat" class="form-control" id="id_pengadaan_barjas_surat" value="<?php echo $data_pengadaan_barjas_surat['id'];?>">

                                    <input type="hidden" name="tahun_surat" class="form-control" id="InputTahun" value="<?php echo date('Y'); ?>"  readonly>
                                </div>
                                <div class="form-group">
                                    <label for="InputPerihal">Perihal</label>
                                    <input type="text" name="perihal_surat" class="form-control" id="InptPerihal" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="InputTanggal">Tanggal</label>
                                    <input type="date" name="tanggal_keluar" class="form-control" id="InputTanggal" placeholder="Input Tanggal Keluar" value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="submit" id="submit" class="btn btn-primary"><i class="icon-pencil5"></i> Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal SPK DENGAN PIHAK KETIGA-->
            <div class="row">
                <div id="modal-add_spk_dengan_pihak_ketiga" tabindex="-1" class="modal fade">
                    <div class="modal-dialog">
                        <?php 
                        $query_select_max_no_hal = mysqli_query($koneksi,"select max(id_halaman) as id_halaman,max(halaman) as max_no_hal from halaman_spk_dengan_pihak_ketiga");
                        $data_no_hal = mysqli_fetch_array($query_select_max_no_hal);
                        $id_halaman = $data_no_hal['id_halaman'];
                        $max_no_hal = $data_no_hal['max_no_hal'];
                        $hal_baru = $max_no_hal+1;

                        if (is_null($max_no_hal)) {
                            $query_insert_no_hal = mysqli_query($koneksi,"INSERT INTO `halaman_spk_dengan_pihak_ketiga`(`id_halaman`, `halaman`) VALUES ('','0')");
                        }

                        $query_select_max_nomor_urut = mysqli_query($koneksi,"select max(no_urut) as max_no_urut from daftar_nomor_spk_dengan_pihak_ketiga where id_halaman = '$id_halaman'");
                        $data_nomor_urut = mysqli_fetch_array($query_select_max_nomor_urut);
                        $max_nomor_urut = $data_nomor_urut['max_no_urut'];
                        $mulai_nomor_urut = 0;
                        ?>
                        <form action="proses_insert_daftar_pengendali_spk_dengan_pihak_ketiga.php" method="POST">

                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title"><font color="#f8f9fc">Tambah Daftar Pengendali SPK Dengan Pihak Ketiga</font></h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <?php
                                    $query_get_pengadaan_barjas_surat = mysqli_query($koneksi,"select * from pengadaan_barjas where id = 2");
                                    $data_pengadaan_barjas_surat = mysqli_fetch_array($query_get_pengadaan_barjas_surat);
                                    echo "<b>Jenis Surat : ".$data_pengadaan_barjas_surat['uraian']."</b>";
                                    echo "<b><hr></b>";
                                    ?>
                                    <div class="form-group">
                                        <label for="InputHalaman">Halaman</label>
                                        <input type="hidden" name="id_halaman" value="<?php echo $id_halaman; ?>" required>
                                        <input type="text" name="no_hal" value="<?php echo $max_no_hal; ?>" class="form-control" id="InputHalaman" readonly>
                                    </div>
                                    <input type="hidden" name="nomor" value="<?php if ($max_nomor_urut == 99){echo $mulai_nomor_urut;} else if (is_null($max_nomor_urut)){echo $mulai_nomor_urut;} else{ echo $max_nomor_urut+1; }  ?>" class="form-control" id="InputNomor" readonly>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="NoSurat">KD Permasalahan</label>
                                            <input type="text" class="form-control" name="no_surat" id="default" list="kode_permasalahan">

                                            <datalist id="kode_permasalahan">
                                                <?php
                                                $query_get_permasalahan = mysqli_query($koneksi,"select * from permasalahan");
                                                while ($data_permasalahan = mysqli_fetch_array($query_get_permasalahan)){
                                                    ?>
                                                    <option value="<?php echo $data_permasalahan['kode_permasalahan'];?>"><?php echo $data_permasalahan['uraian'];?></option>
                                                    <?php 
                                                }
                                                ?>
                                            </datalist>
                                        </div>
                                        <input type="hidden" name="bidang_surat" class="form-control" value="<?php echo $_SESSION['id_bidang']; ?>">
                                        
                                        <input type="hidden" name="id_pengadaan_barjas_surat" class="form-control" id="id_pengadaan_barjas_surat" value="<?php echo $data_pengadaan_barjas_surat['id'];?>">

                                        <input type="hidden" name="tahun_surat" class="form-control" id="InputTahun" value="<?php echo date('Y'); ?>"  readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputPerihal">Perihal</label>
                                        <input type="text" name="perihal_surat" class="form-control" id="InptPerihal">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputTanggal">Tanggal</label>
                                        <input type="date" name="tanggal_keluar" class="form-control" id="InputTanggal" placeholder="Input Tanggal Keluar" value="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" name="submit" id="submit" class="btn btn-primary"><i class="icon-pencil5"></i> Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div id="modal-add_KodePermasalahan" tabindex="-1" class="modal fade">
                        <div class="modal-dialog">
                            <form action="proses_tambah_nomor_surat.php" method="POST">

                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title"><font color="#f8f9fc">Tambah Kode Permasalahan</font></h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="TambahNoSurat">Kode Permasalahan</label>
                                            <input type="text" name="kode_permasalahan" class="form-control" id="InputNoSurat" placeholder="Masukkan Kode Permasalahan" onkeypress="return isNumberKey(event)" maxlength="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="uraian">Uraian</label>
                                            <input type="text" name="uraian" class="form-control" id="uraian" placeholder="Masukkan Uraian" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary"><i class="icon-pencil5"></i> Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                      $( function() {

                        $( "#kode_permasalahan" ).autocomplete({
                          source: "data_kode_permasalahan.php"
                      });
                    });
                    </script>