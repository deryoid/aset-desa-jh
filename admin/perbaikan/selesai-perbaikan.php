<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';
?>
<?php
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM perbaikan AS pb
LEFT JOIN barang AS bg
ON pb.id_barang = bg.id_barang
WHERE pb.id_perbaikan = '$id'")->fetch_array();
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
                        <h4 class="header-title m-t-0 m-b-20">Perbaikan Barang</h4>
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
                                        <th style="text-align: left; color:white;"><a href="index" class="btn btn-info btn-rounded" ><i class="mdi mdi-chevron-left-circle-outline"></i></span></a> Detail Perbaikan Barang</th>
                                        <th style="text-align: right; color:white;">Ubah Status : 
                                                <div class="btn-group">
                                                
                                                    <button type="button" class="btn btn-success  mdi mdi-clipboard"> <?php echo $data['status_perbaikan']?></button>
                                      
                                                    <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="proses-selesai?id=<?= $id; ?>&sts=1">Telah Diperbaiki</a>
                                                </div>
                                        </th>
                                        </table>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-12">
                                        <div class="m-b-20">
                                                <strong>Nama</strong>
                                                <br>
                                                <p class="text-muted"><?= $_SESSION['nama_user']; ?></p>
                                            </div>
                                            <div class="m-b-20">
                                                <strong>Kode Barang</strong>
                                                <br>
                                                <p class="text-muted"><?= $data['kode_barang']; ?></p>
                                            </div>
                                            <div class="m-b-20">
                                                <strong>Nama Barang</strong>
                                                <br>
                                                <p class="text-muted"><?= $data['nama_barang']; ?></p>
                                            </div>
                                            <div class="about-info-p m-b-0">
                                                <strong>Jumlah Barang yang Diperbaiki</strong>
                                                <br>
                                                <p class="text-muted"><?= $data['jumlah_perbaikan']; ?></p>
                                            </div>
                                            <br>
                                            <div class="about-info-p m-b-0">
                                                <strong>Tanggal Perbaikan</strong>
                                                <br>
                                                <p class="text-muted"><?= $data['tgl_perbaikan']; ?></p>
                                            </div>
                                            <br>
                                            <div class="about-info-p m-b-0">
                                                <strong>Status Perbaikan</strong>
                                                <br>
                                                <p class="text-muted"><span class="badge badge-warning"><?= $data['status_perbaikan']; ?></span></p>
                                            </div>
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
