<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';
?>

<?php
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM barang WHERE id_barang = '$id'")->fetch_array();
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
                        <h4 class="header-title m-t-0 m-b-20"></h4>Pengadaan Barang</h4>
                    </div>
                </div>

                <div class="m-t-5">
                    <div class="tab-content">
                            <!-- Personal-Information -->
                            <div class="panel panel-primary panel-fill">
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="color: white;">Ubah Data</h3>
                                </div>
                                <div class="panel-body">
                                <form role="form" action="proses" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id_barang" value="<?= $data['id_barang'] ?>">
                                        <div class="form-group">
                                            <label for="nama_barang">Nama Barang</label>
                                            <input type="text"  id="nama_barang" value="<?= $data['nama_barang'] ?>" class="form-control" name="nama_barang" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="pengelompokan">pengelompokan</label>
                                            <input type="text"  id="pengelompokan" value="<?= $data['pengelompokan'] ?>" class="form-control" name="pengelompokan" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nilai_aset">Nilai Aset</label>
                                            <input type="text"  id="nilai_aset" value="<?= $data['nilai_aset'] ?>" class="form-control" name="nilai_aset" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="sumberdana">Sumber Dana</label>
                                            <input type="text"  id="pengelompokan" value="<?= $data['pengelompokan'] ?>" class="form-control" name="pengelompokan" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="sumberdana">Ubah Status Pengadaan</label>
                                            <select class="form-control select2" data-placeholder="Pilih" id="status_pengadaan" name="status_pengadaan" required="">
                                                    <option value="Disetujui" <?php if ($data['status_pengadaan'] == "Disetujui") {
                                                                            echo "selected";
                                                                            } ?>>Disetujui</option>
                                                    <option value="Diusulkan" <?php if ($data['status_pengadaan'] == "Diusulkan") {
                                                                                echo "selected";
                                                                            } ?>>Diusulkan</option>
                                            </select>
                                        </div>
                                       
                                        <button class="btn btn-primary waves-effect waves-light w-md" name="edit" type="submit">Ubah</button>
                                 </form>

                                </div>
                            </div>
                            <!-- Personal-Information -->
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