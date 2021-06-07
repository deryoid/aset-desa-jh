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
            'Menunggu'
            )");
            //  var_dump($submit, $koneksi->error); die;
        if ($submit) {
            $_SESSION['alert'] = "Berhasil";
            header("location: ../peminjaman", true, 301);
        }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_barang = $_POST['id_barang'];
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $tipe        = $_POST['tipe'];
        $nilai_aset    = $_POST['nilai_aset'];
        $id_sumberdana = $_POST['id_sumberdana'];
        $tanggal_perolehan      = $_POST['tanggal_perolehan'];
        $kondisi       = $_POST['kondisi'];
        $jumlah_stok           = $_POST['jumlah_stok'];

        $submit = $koneksi->query("UPDATE barang SET 
        kode_barang = '$kode_barang', 
        nama_barang = '$nama_barang', 
        tipe = '$tipe', 
        nilai_aset = '$nilai_aset', 
        id_sumberdana = '$id_sumberdana', 
        tanggal_perolehan = '$tanggal_perolehan', 
        kondisi = '$kondisi', 
        jumlah_stok = '$jumlah_stok' 
        WHERE 
        id_barang = '$id_barang'");
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


        