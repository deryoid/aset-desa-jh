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
                    <div class="col-sm-4">
                        <div class="card-box">
                            <a href="#" class="btn btn-sm btn-default pull-right">View</a>
                            <h6 class="text-muted font-13 m-t-0 text-uppercase">Aset Barang</h6>
                            <h3 class="m-b-20 mt-3"><span>1,890</span></h3>
                            <div class="progress progress-sm m-0">
                                <!-- <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                    <span class="sr-only">77% Complete</span>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card-box">
                            <a href="#" class="btn btn-sm btn-default pull-right">View</a>
                            <h6 class="text-muted font-13 m-t-0 text-uppercase">Aset Bangunan</h6>
                            <h3 class="m-b-20 mt-3">$<span>22.56</span></h3>
                            <div class="progress progress-sm m-0">
                                <!-- <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                    <span class="sr-only">77% Complete</span>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card-box">
                            <a href="#" class="btn btn-sm btn-default pull-right">View</a>
                            <h6 class="text-muted m-t-0 font-13 text-uppercase">Aset Tanah</h6>
                            <h3 class="m-b-20 mt-3">9,754</h3>
                            <div class="progress progress-sm m-0">
                                <!-- <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                    <span class="sr-only">77% Complete</span>
                                </div> -->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h6 class="m-t-0">Contacts</h6>
                            <div class="table-responsive">
                                <table class="table table-hover mails m-0 table table-actions-bar">
                                    <thead>
                                    <tr>
                                        <th style="min-width: 95px;">
                                            <div class="checkbox checkbox-primary checkbox-single m-r-15">
                                                <input id="action-checkbox" type="checkbox">
                                                <label for="action-checkbox"></label>
                                            </div>
                                        </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Products</th>
                                        <th>Start Date</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
 
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- end container -->

            <!-- Footer -->
            <?php include_once '../template/admin/footer.php'; ?>
            <!-- End Footer -->

        </div>
        <!-- end wrapper -->





        <?php include_once '../template/admin/script.php'; ?>

    </body>
</html>