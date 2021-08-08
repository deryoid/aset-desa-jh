<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

// Musnah
if (isset($_POST['distribusi'])) {
    $id_barang              = $_POST['id_barang'];
    $jumlah_distribusi          = $_POST['jumlah_distribusi'];
    $tgl_distribusi          = $_POST['tgl_distribusi'];
    $nama_pj          = $_POST['nama_pj'];
    $jabatan          = $_POST['jabatan'];
    $bagian          = $_POST['bagian'];
    
    


        $submit = $koneksi->query("INSERT INTO distribusi VALUES (
            NULL,  
            '$id_barang', 
            '$jumlah_distribusi',
            '$tgl_distribusi',
            '$nama_pj',
            '$jabatan',
            '$bagian'
            )");
        // var_dump($submit, $koneksi->error);die();
            
            
        if ($submit) {
            // $databrg = $koneksi->query("SELECT * FROM pemusnahan AS pm
            // LEFT JOIN barang AS bg
            // ON pm.id_barang = bg.id_barang");
            // foreach ($databrg as $brg){
            //     $koneksi->query("UPDATE barang SET 
            //     jumlah_stok = jumlah_stok - '$brg[jumlah_musnah]' 
            //     WHERE id_barang = '$brg[id_barang]'
            //     ");
            // }
            $koneksi->query("UPDATE barang SET 
             jumlah_stok = jumlah_stok - '$jumlah_distribusi' 
                WHERE id_barang = '$id_barang'
                ");

            $_SESSION['alert'] = "Berhasil";
            header("location: ../distribusi", true, 301);
        }
        
}

        