<?php
require_once '../config/config.php';
include_once '../config/auth-cek.php';
?>
<!DOCTYPE html>
<html>
<?php include_once '../template/admin/head.php'; ?>


    <body>

        <!-- Navigation Bar-->
<?php include_once '../template/admin/topbar.php'; ?>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">SELAMAT DATANG DI APLIKASI PENGELOLAAN ADMINISTRASI PENGADAAN 
                         INVENTARIS DAN MUTASI ASET DESA JAMBU HULU BERBASIS WEB</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-3">
                        <div class="card-box">
                            <!-- <a href="#" class="btn btn-sm btn-default pull-right">View</a> -->
                            <h6 class="text-muted font-13 m-t-0 text-uppercase">Aset Barang</h6>
                            <?php 
                            $data1 = $koneksi->query("SELECT * FROM barang");
                            $jumlah1 = mysqli_num_rows($data1);
                            ?>
                            <h3 class="m-b-20 mt-3"><span><?php echo $jumlah1 ?></span></h3>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                    <span class="sr-only">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card-box">
                            <!-- <a href="#" class="btn btn-sm btn-default pull-right">View</a> -->
                            <h6 class="text-muted font-13 m-t-0 text-uppercase">Aset Bangunan</h6>
                            <?php 
                            $data2 = $koneksi->query("SELECT * FROM bangunan");
                            $jumlah2 = mysqli_num_rows($data2);
                            ?>
                            <h3 class="m-b-20 mt-3"><span><?php echo $jumlah2 ?></span></h3>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                    <span class="sr-only">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card-box">
                            <!-- <a href="#" class="btn btn-sm btn-default pull-right">View</a> -->
                            <h6 class="text-muted m-t-0 font-13 text-uppercase">Aset Tanah</h6>
                            <?php 
                            $data3 = $koneksi->query("SELECT * FROM tanah");
                            $jumlah3 = mysqli_num_rows($data3);
                            ?>
                            <h3 class="m-b-20 mt-3"><span><?php echo $jumlah3 ?></span></h3>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                    <span class="sr-only">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card-box">
                            <!-- <a href="#" class="btn btn-sm btn-default pull-right">View</a> -->
                            <h6 class="text-muted m-t-0 font-13 text-uppercase">Aset Jalan</h6>
                            <?php 
                            $data4 = $koneksi->query("SELECT * FROM jalan");
                            $jumlah4 = mysqli_num_rows($data4);
                            ?>
                            <h3 class="m-b-20 mt-3"><span><?php echo $jumlah4 ?></span></h3>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                    <span class="sr-only">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-sm-4">
                        <div class="card-box">
                            <!-- <a href="#" class="btn btn-sm btn-default pull-right">View</a> -->
                            <h6 class="text-muted font-13 m-t-0 text-uppercase">Peminjaman Barang</h6>
                            <?php 
                            $data5 = $koneksi->query("SELECT * FROM pinjam");
                            $jumlah5 = mysqli_num_rows($data5);
                            ?>
                            <h3 class="m-b-20 mt-3"><span><?php echo $jumlah5 ?></span></h3>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                    <span class="sr-only">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card-box">
                            <!-- <a href="#" class="btn btn-sm btn-default pull-right">View</a> -->
                            <h6 class="text-muted font-13 m-t-0 text-uppercase">Pengembalian Barang</h6>
                            <?php 
                            $data6 = $koneksi->query("SELECT * FROM pinjam WHERE status_kembali = 'Pengembalian Disetujui'");
                            $jumlah6 = mysqli_num_rows($data6);
                            ?>
                            <h3 class="m-b-20 mt-3"><span><?php echo $jumlah6 ?></span></h3>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                    <span class="sr-only">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card-box">
                            <!-- <a href="#" class="btn btn-sm btn-default pull-right">View</a> -->
                            <h6 class="text-muted m-t-0 font-13 text-uppercase">Perbaikan</h6>
                            <?php 
                            $data7 = $koneksi->query("SELECT * FROM perbaikan");
                            $jumlah7 = mysqli_num_rows($data7);
                            ?>
                            <h3 class="m-b-20 mt-3"><span><?php echo $jumlah7 ?></span></h3>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                    <span class="sr-only">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end container -->

            <!-- Footer -->
            <?php include_once '../template/admin/footer.php'; ?>
            <!-- End Footer -->

        </div>
        <!-- end wrapper -->





        <?php include_once '../template/admin/script.php'; ?>

    </body>
</html>