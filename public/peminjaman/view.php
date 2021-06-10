<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';
?>
<?php
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pinjam WHERE id_pinjam = '$id'")->fetch_array();
?>


<!DOCTYPE html>
<html>
<?php include_once '../../template/admin/head.php'; ?>


    <body>

        <!-- Navigation Bar-->
<?php include_once '../../template/admin/topbar.php'; ?>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Peminjaman Barang</h4>
                    </div>
                </div>

                <div class="m-t-5">
                    <div class="tab-content">
                        <div class="row">
                             
                             <div class="col-md-12">
                                <!-- Personal-Information -->
                                <div class="panel panel-primary panel-fill">
                                    <div class="panel-heading">
                                        <table border="0" width="100%">
                                        <th style="text-align: left; color:white;">Detail Peminjaman Barang</th>
                                        <th style="text-align: right; color:white;"><a href="index" class="btn btn-success btn-rounded" ><i class="mdi mdi-chevron-left-circle-outline"></i> Kembali</span></a></th>
                                        </table>
                                    </div>
                                    <div class="panel-body">
                                        <div class="m-b-20">
                                                <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted"><?= $_SESSION['nama_user']; ?></p>
                                            </div>
                                            <div class="m-b-20">
                                                <strong>Keperluan</strong>
                                                <br>
                                                <p class="text-muted"><?= $data['keperluan']; ?></p>
                                            </div>
                                            <div class="m-b-20">
                                                <strong>Kontak</strong>
                                                <br>
                                                <p class="text-muted"><?= $data['kontak']; ?></p>
                                            </div>
                                            <div class="about-info-p m-b-0">
                                                <strong>Tanggal</strong>
                                                <br>
                                                <p class="text-muted"><?= $data['tanggal_pinjam']; ?>/<?= $data['tanggal_kembali']; ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table  class="table table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode Barang</th>
                                                        <th>Nama Barang</th>
                                                        <th>Jumlah Pinjam</th>
                                                    </tr>
                                                    </thead>
                                                    <?php 
                                                    $no = 1;
                                                    $data = $koneksi->query("SELECT * FROM detail_pinjam AS dp 
                                                    LEFT JOIN pinjam AS p 
                                                    ON dp.id_pinjam = p.id_pinjam 
                                                    LEFT JOIN barang AS bg
                                                    ON dp.id_barang = bg.id_barang WHERE dp.id_pinjam = '$id'");
                                                    foreach ($data as $row) {  
                                                    ?>
                                                    <tbody>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row['kode_barang']; ?></td>
                                                        <td><?= $row['nama_barang']; ?></td>
                                                        <td><?= $row['jumlah_pinjam']; ?></td>
                                                    </tr>
                                                    </tbody>
                                                <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- Personal-Information -->
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- end container -->

            <!-- Footer -->
            <?php include_once '../../template/admin/footer.php'; ?>
            <!-- End Footer -->

        </div>
        <!-- end wrapper -->





        <?php include_once '../../template/admin/script.php'; ?>

    </body>
</html>

<script>
