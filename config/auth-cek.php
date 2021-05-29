<?php

if (!isset($_SESSION['id_user'])) {
    header("location: http://localhost/aset-desa-jh/", true, 301);
}
