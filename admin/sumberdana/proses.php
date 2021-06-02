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
        // var_dump($submit);
        // die;
        $_SESSION['alert'] = "Berhasil";
        header("location: ../sumberdana", true, 301);
    }
}
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_kelompok = strip_tags($_POST['id_kelompok']);
        $nama        = strip_tags($_POST['nama']);

        $submit = $koneksi->query("UPDATE kelompok_tanaman SET nama = '$nama' WHERE id_kelompok = '$id_kelompok'");

        if ($submit) {
            $_SESSION['alert'] = "Data Berhasil Diubah";
            header("location: ../kelompok-tanaman", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM kelompok_tanaman WHERE id_kelompok = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Data Berhasil Dihapus";
                header("location: ../kelompok-tanaman", true, 301);
            }
        }
