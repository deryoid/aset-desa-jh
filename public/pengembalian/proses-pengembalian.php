<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

// Simpan Detail
if (isset($_GET['id'])) {
    $id_pinjam          = $_GET['id'];
    $stspjm             = $_GET['stspjm'];

    if ($stspjm == 1) {
        $upstat = $koneksi->query("UPDATE pinjam SET 
        status_kembali = 'Ajukan Pengembalian'
        WHERE
        id_pinjam = '$id_pinjam'
        ");

    }elseif ($stspjm == 2) {
        $upstat = $koneksi->query("UPDATE pinjam SET 
        status_kembali = 'Batalkan Pengembalian'
        WHERE
        id_pinjam = '$id_pinjam'
        ");
    }
        
        if ($upstat) {
            $_SESSION['alert'] = "Berhasil";
            header("location: ../pengembalian", true, 301);
        }
} 


        