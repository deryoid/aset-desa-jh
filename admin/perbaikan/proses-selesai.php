<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

// Simpan Detail
if (isset($_GET['id'])) {
    $id_perbaikan          = $_GET['id'];
    $sts                = $_GET['sts'];

    if ($sts == 1) {
        $upstat = $koneksi->query("UPDATE perbaikan SET 
        status_perbaikan = 'Telah Diperbaiki'
        WHERE
        id_perbaikan = '$id_perbaikan'
        ");

        $databrg = $koneksi->query("SELECT * FROM perbaikan AS pb
        LEFT JOIN barang AS bg
        ON pb.id_barang = bg.id_barang");
        foreach ($databrg as $brg){
            $koneksi->query("UPDATE barang SET 
            jumlah_stok = jumlah_stok + '$brg[jumlah_perbaikan]' 
            WHERE id_barang = '$brg[id_barang]'
            ");



    }
} if ($upstat) {
    $_SESSION['alert'] = "Berhasil";
    header("location: ../perbaikan", true, 301);
}
}