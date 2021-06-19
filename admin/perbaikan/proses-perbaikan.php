<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

// Musnah
if (isset($_POST['perbaikan'])) {
    $id_barang              = $_POST['id_barang'];
    $jumlah_perbaikan          = $_POST['jumlah_perbaikan'];
    $tgl_perbaikan          = $_POST['tgl_perbaikan'];
    
    


        $submit = $koneksi->query("INSERT INTO perbaikan VALUES (
            NULL,  
            '$id_barang', 
            '$jumlah_perbaikan',
            '$tgl_perbaikan',
            'Sedang Diperbaiki'
            )");

// var_dump($submit, $koneksi->error); die;
            
        if ($submit) {
            $databrg = $koneksi->query("SELECT * FROM barang WHERE id_barang = '$id_barang'")->fetch_array();
            $koneksi->query("UPDATE barang SET 
                jumlah_stok = jumlah_stok - '$jumlah_perbaikan' 
                 WHERE id_barang = '$id_barang'
                ");
            // $databrg = $koneksi->query("SELECT * FROM perbaikan AS pb
            // LEFT JOIN barang AS bg
            // ON pb.id_barang = bg.id_barang");
            // foreach ($databrg as $brg){
            //     $koneksi->query("UPDATE barang SET 
            //     jumlah_stok = jumlah_stok - '$brg[jumlah_perbaikan]' 
            //     WHERE id_barang = '$brg[id_barang]'
            //     ");
                
            // }
            $_SESSION['alert'] = "Berhasil";
            header("location: ../perbaikan", true, 301);
        }
        
}

        