<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

// Musnah
if (isset($_POST['mutasi'])) {
    $id_barang              = $_POST['id_barang'];
    $jumlah_mutasi          = $_POST['jumlah_mutasi'];
    $tgl_mutasi          = $_POST['tgl_mutasi'];
    $tujuan_mutasi          = $_POST['tujuan_mutasi'];
    
    


        $submit = $koneksi->query("INSERT INTO mutasi VALUES (
            NULL,  
            '$id_barang', 
            '$jumlah_mutasi',
            '$tgl_mutasi',
            '$tujuan_mutasi'
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
             jumlah_stok = jumlah_stok - '$jumlah_mutasi' 
                WHERE id_barang = '$id_barang'
                ");

            $_SESSION['alert'] = "Berhasil";
            header("location: ../mutasi", true, 301);
        }
        
}

        