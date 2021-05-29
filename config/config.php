<?php
function base_url($url = null)
{
    $base_url = "http://localhost/aset-desa-jh/";
    if ($url != null) {
        return $base_url . "/" . $url;
    } else {
        return $base_url;
    }
}

function page_active($page_now)
{
    $url =  $_SERVER['REQUEST_URI'];
    $ex  = explode('/', $url);
    $co  = count($ex);
    $page = $ex[$co - 2];
    
    if ($page == $page_now) {
        return 'active';
    }
}

// KONEKSI DATABASE
$host = "localhost";
$user = "root";
$password = "";
$name = "project_asetdesajh";

$koneksi = mysqli_connect($host, $user, $password, $name);

if (!$koneksi) {
    die("Gagal Terkoneksi" . mysqli_connect_errno() . " - " . mysqli_connect_error());
    exit();
}

// ZONA WAKTU INDONESIA
date_default_timezone_set('Asia/Makassar');

session_start();
$no = 1;
