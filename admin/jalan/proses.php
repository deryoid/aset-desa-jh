<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

// Simpan
if (isset($_POST['tambah'])) {
    $kode_jalan = $_POST['kode_jalan'];
    $nama_jalan = $_POST['nama_jalan'];
    $lokasi        = $_POST['lokasi'];
    $nilai_aset    = $_POST['nilai_aset'];
    $id_sumberdana = $_POST['id_sumberdana'];
    $tanggal_pembuatan      = $_POST['tanggal_pembuatan'];
    $kondisi       = $_POST['kondisi'];
    $ulj           = $_POST['ulj'];

    $cek_kb = $koneksi->query("SELECT * FROM jalan WHERE kode_jalan = '$kode_jalan'")->fetch_array();

        if($cek_kb) {
            $_SESSION['alert'] = 'Gagal';
            header("location: ../jalan", true, 301);
        }else{

        $submit = $koneksi->query("INSERT INTO jalan VALUES (
            NULL, 
            '$kode_jalan', 
            '$nama_jalan', 
            '$lokasi', 
            '$nilai_aset', 
            '$id_sumberdana', 
            '$tanggal_pembuatan', 
            '$kondisi', 
            '$ulj'
            )");
            //  var_dump($submit, $koneksi->error); die;
        if ($submit) {
            $_SESSION['alert'] = "Berhasil";
            header("location: ../jalan", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_jalan = $_POST['id_jalan'];
        $kode_jalan = $_POST['kode_jalan'];
        $nama_jalan = $_POST['nama_jalan'];
        $lokasi        = $_POST['lokasi'];
        $nilai_aset    = $_POST['nilai_aset'];
        $id_sumberdana = $_POST['id_sumberdana'];
        $tanggal_pembuatan      = $_POST['tanggal_pembuatan'];
        $kondisi       = $_POST['kondisi'];
        $ulj           = $_POST['ulj'];

        $submit = $koneksi->query("UPDATE jalan SET 
        kode_jalan = '$kode_jalan', 
        nama_jalan = '$nama_jalan', 
        lokasi = '$lokasi', 
        nilai_aset = '$nilai_aset', 
        id_sumberdana = '$id_sumberdana', 
        tanggal_pembuatan = '$tanggal_pembuatan', 
        kondisi = '$kondisi', 
        ulj = '$ulj' 
        WHERE 
        id_jalan = '$id_jalan'");
//  var_dump($submit, $koneksi->error); die;
        if ($submit) {
            $_SESSION['alert'] = "Berubah";
            header("location: ../jalan", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM jalan WHERE id_jalan = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Hapus";
                header("location: ../jalan", true, 301);
            }
        }
