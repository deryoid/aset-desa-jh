<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

// Simpan
if (isset($_POST['tambah'])) {
    $nama_sumberdana = $_POST['nama_sumberdana'];
    $keterangan      = $_POST['keterangan'];

    $cek_nsd = $koneksi->query("SELECT * FROM sumberdana WHERE nama_sumberdana = '$nama_sumberdana'")->fetch_array();

        if($cek_nsd) {
            $_SESSION['alert'] = 'Gagal';
            header("location: ../sumberdana", true, 301);
        }else{

        $submit = $koneksi->query("INSERT INTO sumberdana VALUES (NULL, '$nama_sumberdana', '$keterangan')");

        if ($submit) {
            $_SESSION['alert'] = "Berhasil";
            header("location: ../sumberdana", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_sumberdana   = $_POST['id_sumberdana'];
        $nama_sumberdana = $_POST['nama_sumberdana'];
        $keterangan      = $_POST['keterangan'];

        $submit = $koneksi->query("UPDATE sumberdana SET 
        nama_sumberdana = '$nama_sumberdana', 
        keterangan = '$keterangan' 
        WHERE 
        id_sumberdana = '$id_sumberdana'");

        if ($submit) {
            $_SESSION['alert'] = "Berubah";
            header("location: ../sumberdana", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM sumberdana WHERE id_sumberdana = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Hapus";
                header("location: ../sumberdana", true, 301);
            }
        }
