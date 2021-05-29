<?php
session_start();

unset($_SESSION['id_user']);
unset($_SESSION['nama_user']);
unset($_SESSION['username']);
unset($_SESSION['role']);

session_unset();
session_destroy();

header("location: http://localhost/aset-desa-jh/", true, 301);
