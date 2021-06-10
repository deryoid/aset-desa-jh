<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

// Simpan
if (isset($_POST['tambah'])) {
    $keperluan          = $_POST['keperluan'];
    $kontak             = $_POST['kontak'];
    $tanggal_pinjam     = $_POST['tanggal_pinjam'];
    $tanggal_kembali    = $_POST['tanggal_kembali'];
    $id_user    = $_SESSION['id_user'];


        $submit = $koneksi->query("INSERT INTO pinjam VALUES (
            NULL, 
            '$keperluan', 
            '$kontak', 
            '$tanggal_pinjam', 
            '$tanggal_kembali', 
            '$id_user', 
            'Menunggu',
            NULL
            )");
            //  var_dump($submit, $koneksi->error); die;
        if ($submit) {
            $_SESSION['alert'] = "Berhasil";
            header("location: ../peminjaman", true, 301);
        }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_pinjam          = $_POST['id_pinjam'];
        $keperluan          = $_POST['keperluan'];
        $kontak             = $_POST['kontak'];
        $tanggal_pinjam     = $_POST['tanggal_pinjam'];
        $tanggal_kembali    = $_POST['tanggal_kembali'];
        // $id_user            = $_SESSION['id_user'];

        $submit = $koneksi->query("UPDATE pinjam SET 
        keperluan = '$keperluan', 
        kontak = '$kontak', 
        tanggal_pinjam = '$tanggal_pinjam', 
        tanggal_kembali = '$tanggal_kembali'
        WHERE 
        id_pinjam = '$id_pinjam'");
//  var_dump($submit, $koneksi->error); die;
        if ($submit) {
            $_SESSION['alert'] = "Berubah";
            header("location: ../peminjaman", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM pinjam WHERE id_pinjam = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Hapus";
                header("location: ../peminjaman", true, 301);
            }
        }


        