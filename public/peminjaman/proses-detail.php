<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

// Simpan Detail
if (isset($_POST['pinjam'])) {
    $id_pinjam          = $_POST['id_pinjam'];
    $id_barang             = $_POST['id_barang'];
    $jumlah_pinjam     = $_POST['jumlah_pinjam'];


        $submit = $koneksi->query("INSERT INTO detail_pinjam VALUES (
            NULL, 
            '$id_pinjam', 
            '$id_barang', 
            '$jumlah_pinjam'
            )");
            //  var_dump($submit, $koneksi->error); die;
        if ($submit) {
            $_SESSION['alert'] = "Berhasil";
            header("location: ../peminjaman/detail?id=$id_pinjam", true, 301);
        }
} else

        // Hapus Detail
        if (isset($_GET['id'])) {
            // var_dump($_GET['idp']);
            // die();
            $id_pinjam = $_GET['idp'];
            $hapus = $koneksi->query("DELETE FROM detail_pinjam WHERE id_detail = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Hapus";
                header("location: ../peminjaman/detail?id=$id_pinjam", true, 301);
            }
        }


        