<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

$pengelompokan = $_POST['pengelompokan'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aset Barang</title>
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/logo-kab-hss.png">

    <style>
        .kop {
            justify-content: space-between;
            font-size: 25px;
            font-weight: bold;
            line-height: 25px;
            text-align: center;
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .judul {
            justify-content: center;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
            line-height: 20px;
        }

        .alamat {
            font-size: 15px;
            /* text-decoration: underline; */
            font-style: italic;
            font-weight: bold;
            justify-content: center;
            line-height: 10px;
            text-align: center;
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-top: -4px;
        }

        .gambar-kab {
            width: 53px;
            height: 60px;
        }

        .gambar-puskes {
            width: 55px;
            height: 60px;
        }

        .ttd {
            justify-content: right;
            text-align: center;
            float: right;
            margin-top: 8vh;
        }

        table {
            width: 100%;
            margin-top: 15px;
        }

        th {
            vertical-align: middle;
        }
    </style>
</head>

<body>

    <div class="kop">
    <table width="100%">
    <th><img src="<?= base_url('assets/images/logo-kab-hss.png') ?>" class="gambar-kab"></th>
    <th>PEMERINTAH KABUPATEN HULU SUNGAI SELATAN <br> KANTOR DESA JAMBU HULU</th>
    <th></th>
    </table>
        
        
    </div>
    <div class="alamat">
        
        Kecamatan Padang Batung, Kabupaten Hulu Sungai Selatan
    </div>

    <hr size="1.5" style="margin-bottom: 5px; color: black; font-weight: bold;">

    <div class="judul">
   
        Aset Desa Barang
    </div>

    <table border="1" cellspacing="0  ">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>pengelompokan</th>
            <th>Nilai Aset</th>
            <th>Sumber Dana</th>
            <th>Tanggal Perolehan</th>
            <th>Kondisi</th>
            <th>Jumlah Stok</th>
        </tr>
        </thead>
        <?php 
        $no = 1;
        $data = $koneksi->query("SELECT * FROM barang AS br LEFT JOIN sumberdana AS sd ON br.id_sumberdana = sd.id_sumberdana WHERE br.pengelompokan = '$pengelompokan'");
        foreach ($data as $row) {  
        ?>
        <tbody>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['kode_barang']; ?></td>
            <td><?= $row['nama_barang']; ?></td>
            <td><?= $row['pengelompokan']; ?></td>
            <td><?= $row['nilai_aset']; ?></td>
            <td><?= $row['nama_sumberdana']; ?></td>
            <td><?= $row['tanggal_perolehan']; ?></td>
            <td><?= $row['kondisi']; ?></td>
            <td><?= $row['jumlah_stok']; ?></td>
            </td>
        </tr>
        </tbody>
    <?php } ?>
    </table>

    <!-- <div style="margin-top: 10px;">
        Total :
        <span style="text-align: justify;"></span>
    </div> -->

    <div class="ttd">
        Desa Jambu Hulu, <?= date('d-m-Y'); ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        __________________
    </div>

</body>


<script type="text/javascript">
    window.print();
</script>

</html>