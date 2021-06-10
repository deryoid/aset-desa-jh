<?php
require_once '../../config/config.php';
 
$id = $_POST['id'];
$data = $koneksi->query("SELECT * FROM barang WHERE id_barang = '$id'")->fetch_array();
echo json_encode($data);

?>