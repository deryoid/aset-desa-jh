<?php require_once 'config/config.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Login - Aplikasi Aset Desa Jambu Hulu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/logo-kab-hss.png">
        <!-- Sweet Alert -->
        <link href="<?= base_url() ?>/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
        <!-- App css -->
        <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="<?= base_url() ?>/assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 card-box">
                                <div class="text-center">
                                    <h2 class="text-uppercase m-t-0 m-b-30">
                                        <a href="index.html" class="text-success">
                                            <span><img src="assets/images/logo-kab-hss.png" alt="" height="150"></span><br>
                                            <i style="color: #00BFFF;">Aset Desa Jambu Hulu</i>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" action="" method="POST">

                                        <div class="form-group m-b-20">
                                            <div class="col-12">
                                                <label for="emailaddress">Username</label>
                                                <input class="form-control" type="text" name="username" id="emailaddress" required="" placeholder="Masukkan Username">
                                            </div>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <div class="col-12">
                                                <!-- <a href="pages-forget-password.html" class="text-muted pull-right font-14">Forgot your password?</a> -->
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" name="password" required="" id="password" placeholder="Masukkan password">
                                            </div>
                                        </div>

                                        <!-- <div class="form-group m-b-30">
                                            <div class="col-12">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox5" type="checkbox">
                                                    <label for="checkbox5">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-12">
                                                <button class="btn btn-lg btn-info btn-block" name="login" type="submit">Masuk</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                            <!-- <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-dark m-l-5">Sign Up</a></p>
                                </div>
                            </div> -->

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
        </section>


        <!-- jQuery  -->
        <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/jquery.slimscroll.js"></script>
        <!-- Sweet-Alert  -->
        <script src="<?= base_url() ?>/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
        <script src="<?= base_url() ?>/assets/pages/jquery.sweet-alert.init.js"></script>
        <!-- App js -->
        <script src="<?= base_url() ?>/assets/js/jquery.core.js"></script>
        <script src="<?= base_url() ?>/assets/js/jquery.app.js"></script>

    </body>
</html>


<?php
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $pass     = md5($password);

    $query = $koneksi->query("SELECT * FROM user WHERE username = '$username'");

    // CEK USERNAME
    if (mysqli_num_rows($query) === 1) {

        // CEK PASSWORD
        $data = mysqli_fetch_array($query);
        if ($pass == $data['password']) {
            $_SESSION['id_user']  = $data['id_user'];
            $_SESSION['nama_user']  = $data['nama_user'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role']     = $data['role'];

            if ($data['role'] == 'superadmin') {
                echo "
                <script type='text/javascript'>

                    swal(
                        {
                            title: 'Berhasil',
                            text: 'Tekan Tombol Ok Untuk Melanjutkan!',
                            type: 'success',
                        }
                    );
                </script>";
                echo '<meta http-equiv="refresh" content="2; url=admin">';
            } else
            if ($data['role'] == 'public') {
                echo "
                <script type='text/javascript'>

                    swal(
                        {
                            title: 'Berhasil',
                            text: 'Tekan Tombol Ok Untuk Melanjutkan!',
                            type: 'success',
                        }
                    );
                </script>";
                echo '<meta http-equiv="refresh" content="2; url=public">';
            } else
            if ($data['role'] == 'public') {
                $pasien = $koneksi->query("SELECT * FROM public WHERE id_user = '$data[id_user]'")->fetch_array();
                $_SESSION['id_public']   = $pasien['id_public'];
                $_SESSION['nama_public'] = $pasien['nama'];
                echo "
                <script type='text/javascript'>
                Toast.fire({
                    type: 'success',
                    title: 'Anda Login Sebagai Public'
                })
                </script>";
                echo '<meta http-equiv="refresh" content="2; url=' . base_url() . '">';
            }
        } else {
            echo "
            <script type='text/javascript'>
            Toast.fire({
                type: 'error',
                title: 'Username atau Password Tidak Ditemukan'
            })
            </script>";
        }
    } else {
        echo "
            <script type='text/javascript'>
            swal(
                {
                    title: 'Gagal',
                    text: 'Masukkan Username dan Password Kembali!',
                    type: 'error',
                }
            );
            </script>";
    }
}
?>