<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

// Simpan
if (isset($_POST['tambah'])) {
    $kode_tanah = $_POST['kode_tanah'];
    $nama_tanah = $_POST['nama_tanah'];
    $lokasi        = $_POST['lokasi'];
    $nilai_aset    = $_POST['nilai_aset'];
    $id_sumberdana = $_POST['id_sumberdana'];
    $tanggal_perolehan      = $_POST['tanggal_perolehan'];
    $ult           = $_POST['ult'];

    $cek_kb = $koneksi->query("SELECT * FROM tanah WHERE kode_tanah = '$kode_tanah'")->fetch_array();

        if($cek_kb) {
            $_SESSION['alert'] = 'Gagal';
            header("location: ../tanah", true, 301);
        }else{

        $submit = $koneksi->query("INSERT INTO tanah VALUES (
            NULL, 
            '$kode_tanah', 
            '$nama_tanah', 
            '$lokasi', 
            '$nilai_aset', 
            '$id_sumberdana', 
            '$tanggal_perolehan', 
            '$ult'
            )");
            //  var_dump($submit, $koneksi->error); die;
        if ($submit) {
            $_SESSION['alert'] = "Berhasil";
            header("location: ../tanah", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_tanah = $_POST['id_tanah'];
        $kode_tanah = $_POST['kode_tanah'];
        $nama_tanah = $_POST['nama_tanah'];
        $lokasi        = $_POST['lokasi'];
        $nilai_aset    = $_POST['nilai_aset'];
        $id_sumberdana = $_POST['id_sumberdana'];
        $tanggal_perolehan      = $_POST['tanggal_perolehan'];
        $ult           = $_POST['ult'];

        $submit = $koneksi->query("UPDATE tanah SET 
        kode_tanah = '$kode_tanah', 
        nama_tanah = '$nama_tanah', 
        lokasi = '$lokasi', 
        nilai_aset = '$nilai_aset', 
        id_sumberdana = '$id_sumberdana', 
        tanggal_perolehan = '$tanggal_perolehan', 
        ult = '$ult' 
        WHERE 
        id_tanah = '$id_tanah'");
//  var_dump($submit, $koneksi->error); die;
        if ($submit) {
            $_SESSION['alert'] = "Berubah";
            header("location: ../tanah", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM tanah WHERE id_tanah = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Hapus";
                header("location: ../tanah", true, 301);
            }
        }
