<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

// Simpan Detail
if (isset($_GET['id'])) {
    $id_pinjam          = $_GET['id'];
    $sts                = $_GET['sts'];

    if ($sts == 1) {
        $upstat = $koneksi->query("UPDATE pinjam SET 
        status_pinjam = 'Disetujui'
        WHERE
        id_pinjam = '$id_pinjam'
        ");

        $databrg = $koneksi->query("SELECT * FROM detail_pinjam AS dp 
        LEFT JOIN barang AS b 
        ON dp.id_barang = b.id_barang WHERE dp.id_pinjam = '$id_pinjam'");
        foreach ($databrg as $brg){
            $koneksi->query("UPDATE barang SET 
            jumlah_stok = jumlah_stok - '$brg[jumlah_pinjam]' 
            WHERE id_barang = '$brg[id_barang]'
            ");
            // var_dump($brg['id_barang']);
            
        }



    }elseif ($sts == 2) {
        $upstat = $koneksi->query("UPDATE pinjam SET 
        status_pinjam = 'Ditolak'
        WHERE
        id_pinjam = '$id_pinjam'
        ");
    }
        
        if ($upstat) {
            $_SESSION['alert'] = "Berhasil";
            header("location: ../peminjaman/detail?id=$id_pinjam", true, 301);
        }
} 


        