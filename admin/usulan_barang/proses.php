<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

// Simpan
if (isset($_POST['tambah'])) {
    $nama_barang = $_POST['nama_barang'];
    $pengelompokan        = $_POST['pengelompokan'];
    $nilai_aset    = $_POST['nilai_aset'];
    $id_sumberdana = $_POST['id_sumberdana'];

    // $cek_kb = $koneksi->query("SELECT * FROM barang WHERE kode_barang = '$kode_barang'")->fetch_array();

        if($cek_kb) {
            $_SESSION['alert'] = 'Gagal';
            header("location: ../barang", true, 301);
        }else{

        $submit = $koneksi->query("INSERT INTO barang VALUES (
            NULL, 
            NULL, 
            '$nama_barang', 
            '$pengelompokan', 
            '$nilai_aset', 
            '$id_sumberdana', 
            NULL, 
            NULL, 
            NULL,
            'Diusulkan'
            )");
            //  var_dump($submit, $koneksi->error); die;
        if ($submit) {
            $_SESSION['alert'] = "Berhasil";
            header("location: ../usulan_barang", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_barang = $_POST['id_barang'];
        $nama_barang = $_POST['nama_barang'];
        $pengelompokan        = $_POST['pengelompokan'];
        $nilai_aset    = $_POST['nilai_aset'];
        $id_sumberdana = $_POST['id_sumberdana'];

        $submit = $koneksi->query("UPDATE barang SET 
        nama_barang = '$nama_barang', 
        pengelompokan = '$pengelompokan', 
        nilai_aset = '$nilai_aset', 
        id_sumberdana = '$id_sumberdana'
        WHERE 
        id_barang = '$id_barang'");
//  var_dump($submit, $koneksi->error); die;
        if ($submit) {
            $_SESSION['alert'] = "Berubah";
            header("location: ../usulan_barang", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM barang WHERE id_barang = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Hapus";
                header("location: ../usulan_barang", true, 301);
            }
        }
