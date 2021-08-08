<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

    // Edit
    if (isset($_POST['edit'])) {
        $id_barang = $_POST['id_barang'];
        $status_pengadaan = $_POST['status_pengadaan'];

        $submit = $koneksi->query("UPDATE barang SET 
        status_pengadaan = '$status_pengadaan'
        WHERE 
        id_barang = '$id_barang'");
//  var_dump($submit, $koneksi->error); die;
        if ($submit) {
            $_SESSION['alert'] = "Berubah";
            header("location: ../pengadaan", true, 301);
        }
    } 