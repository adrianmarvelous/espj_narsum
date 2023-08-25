<?php 
    require_once '../../koneksi.php';

    $id_header = $_GET['id_header'];

    $query_header = mysqli_query($koneksi,"SELECT narsum_daftar_hadir_header.*, 
    narsum_daftar_hadir_content.*, master_narasumber.* FROM narsum_daftar_hadir_header JOIN 
    narsum_daftar_hadir_content ON narsum_daftar_hadir_header.id = 
    narsum_daftar_hadir_content.id_header JOIN master_narasumber ON 
    narsum_daftar_hadir_content.id_narsum = master_narasumber.id WHERE 
    narsum_daftar_hadir_header.id = $id_header");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Ketersediaan Narasumber</title>
    <link rel="stylesheet" href="../../css/surat_ketersediaan_narsum.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php 
        while($data = mysqli_fetch_array($query_header)){
    ?>
    <div class="content">
        <div class="header">
            <div class="header_kiri">
                <div class="sub_header_kiri">
                    <div>
                        <p class="hal">Hal</p>
                    </div>
                    <div>
                        <p>Kesediaan sebagai</p><p style="text-decoration: underline;">Narasumber</p>
                    </div>
                </div>
            </div>
            <div class="header_kanan">
                <p class="tanggal">Surabaya, <?php echo date('d-m-Y',strtotime($data['tanggal']))?></p>
                <p>Kepada</p>
                <p class="yth">Yth. Kepala Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Kota Surabaya</p>
                <p>di - </p><p style="text-decoration: underline;">Surabaya</p>
                
            </div>
        </div>
        <div class="isi_surat">
            <p>Sehubungan dengan surat Kepala Badan Kepegawaian Pengembangan Sumber Daya 
            Manusia Kota Surabaya Nomor : 005/1848/436.8.4/2022 tanggal <?php echo date('d-m-Y',strtotime($data['tanggal']))?>, 
        Hal : Permohonan Sebagai Narasumber, maka saya bersedia hadir dalam kegiatan <?php echo $data['acara']?></p>
        </div>
        <div class="ttd">
            <div class="ttd_kiri"></div>
            <div class="ttd_kanan">
                <p class="hormat">Hormat Saya,</p>
                <p>( <?php echo $data['nama']?> )</p>
            </div>
        </div>
    </div>
</body>
<?php }?>
</html>