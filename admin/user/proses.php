<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

// Simpan
if (isset($_POST['tambah'])) {
    $nama_user = $_POST['nama_user'];
    $username      = $_POST['username'];
    $password      = $_POST['password'];
    $role      = $_POST['role'];
    $pass     = md5($password);

    $cek_nsd = $koneksi->query("SELECT * FROM user WHERE username = '$username'")->fetch_array();

        if($cek_nsd) {
            $_SESSION['alert'] = 'Gagal';
            header("location: ../user", true, 301);
        }else{

        $submit = $koneksi->query("INSERT INTO user VALUES (NULL, '$nama_user', '$username', '$pass', '$role')");

        if ($submit) {
            $_SESSION['alert'] = "Berhasil";
            header("location: ../user", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_user = $_POST['id_user'];
        $nama_user = $_POST['nama_user'];
        $username = $_POST['username'];

        if (!empty($_POST['password'])) {
           $password = md5($_POST['password']);
        }else{
            $password = $row['password'];
        }
        $role  = $_POST['role'];

        $submit = $koneksi->query("UPDATE user SET 
        nama_user = '$nama_user', 
        username = '$username', 
        password = '$password', 
        role = '$role' 
        WHERE 
        id_user = '$id_user'");

        if ($submit) {
            $_SESSION['alert'] = "Berubah";
            header("location: ../user", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM user WHERE id_user = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Hapus";
                header("location: ../user", true, 301);
            }
        }
