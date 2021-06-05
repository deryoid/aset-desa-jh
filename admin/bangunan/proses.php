<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

// Simpan
if (isset($_POST['tambah'])) {
    $kode_bangunan = $_POST['kode_bangunan'];
    $nama_bangunan = $_POST['nama_bangunan'];
    $lokasi        = $_POST['lokasi'];
    $nilai_aset    = $_POST['nilai_aset'];
    $id_sumberdana = $_POST['id_sumberdana'];
    $tanggal_pembuatan      = $_POST['tanggal_pembuatan'];
    $kondisi       = $_POST['kondisi'];
    $ulb           = $_POST['ulb'];

    $cek_kb = $koneksi->query("SELECT * FROM bangunan WHERE kode_bangunan = '$kode_bangunan'")->fetch_array();

        if($cek_kb) {
            $_SESSION['alert'] = 'Gagal';
            header("location: ../bangunan", true, 301);
        }else{

        $submit = $koneksi->query("INSERT INTO bangunan VALUES (
            NULL, 
            '$kode_bangunan', 
            '$nama_bangunan', 
            '$lokasi', 
            '$nilai_aset', 
            '$id_sumberdana', 
            '$tanggal_pembuatan', 
            '$kondisi', 
            '$ulb'
            )");
            //  var_dump($submit, $koneksi->error); die;
        if ($submit) {
            $_SESSION['alert'] = "Berhasil";
            header("location: ../bangunan", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_bangunan = $_POST['id_bangunan'];
        $kode_bangunan = $_POST['kode_bangunan'];
        $nama_bangunan = $_POST['nama_bangunan'];
        $lokasi        = $_POST['lokasi'];
        $nilai_aset    = $_POST['nilai_aset'];
        $id_sumberdana = $_POST['id_sumberdana'];
        $tanggal_pembuatan      = $_POST['tanggal_pembuatan'];
        $kondisi       = $_POST['kondisi'];
        $ulb           = $_POST['ulb'];

        $submit = $koneksi->query("UPDATE bangunan SET 
        kode_bangunan = '$kode_bangunan', 
        nama_bangunan = '$nama_bangunan', 
        lokasi = '$lokasi', 
        nilai_aset = '$nilai_aset', 
        id_sumberdana = '$id_sumberdana', 
        tanggal_pembuatan = '$tanggal_pembuatan', 
        kondisi = '$kondisi', 
        ulb = '$ulb' 
        WHERE 
        id_bangunan = '$id_bangunan'");
//  var_dump($submit, $koneksi->error); die;
        if ($submit) {
            $_SESSION['alert'] = "Berubah";
            header("location: ../bangunan", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM bangunan WHERE id_bangunan = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Hapus";
                header("location: ../bangunan", true, 301);
            }
        }
