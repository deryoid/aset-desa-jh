<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

// Musnah
if (isset($_POST['musnah'])) {
    $id_barang              = $_POST['id_barang'];
    $jumlah_musnah          = $_POST['jumlah_musnah'];
    $tgl_pemusnahan          = $_POST['tgl_pemusnahan'];
    
    


        $submit = $koneksi->query("INSERT INTO pemusnahan VALUES (
            NULL,  
            '$id_barang', 
            '$jumlah_musnah',
            '$tgl_pemusnahan'
            )");

            
            
        if ($submit) {
            $databrg = $koneksi->query("SELECT * FROM pemusnahan AS pm
            LEFT JOIN barang AS bg
            ON pm.id_barang = bg.id_barang");
            foreach ($databrg as $brg){
                $koneksi->query("UPDATE barang SET 
                jumlah_stok = jumlah_stok - '$brg[jumlah_musnah]' 
                WHERE id_barang = '$brg[id_barang]'
                ");
            }


            $_SESSION['alert'] = "Berhasil";
            header("location: ../pemusnahan", true, 301);
        }
        
}

        