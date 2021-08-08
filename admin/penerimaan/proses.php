<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';


    // Edit
    if (isset($_POST['edit'])) {
        $id_barang = $_POST['id_barang'];
        $kode_barang = $_POST['kode_barang'];
        $tanggal_perolehan      = $_POST['tanggal_perolehan'];
        $jumlah_stok           = $_POST['jumlah_stok'];

        $submit = $koneksi->query("UPDATE barang SET 
        kode_barang = '$kode_barang', 
        tanggal_perolehan = '$tanggal_perolehan', 
        jumlah_stok = '$jumlah_stok', 
        kondisi = 'Baik', 
        status_pengadaan = 'Diterima' 
        WHERE 
        id_barang = '$id_barang'");
//  var_dump($submit, $koneksi->error); die;
        if ($submit) {
            $_SESSION['alert'] = "Berubah";
            header("location: ../barang", true, 301);
        }
    } 