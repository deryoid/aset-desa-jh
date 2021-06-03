<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';
?>

<?php
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM sumberdana WHERE id_sumberdana = '$id'")->fetch_array();
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
                        <h4 class="header-title m-t-0 m-b-20">Sumber Dana</h4>
                    </div>
                </div>

                <div class="m-t-30">
                    <div class="tab-content">
                            <!-- Personal-Information -->
                            <div class="panel panel-primary panel-fill">
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="color: white;">Ubah Data</h3>
                                </div>
                                <div class="panel-body">
                                <form role="form" action="proses" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id_sumberdana" value="<?= $data['id_sumberdana'] ?>">
                                        <div class="form-group">
                                            <label for="sumberdana">Nama Sumber Dana</label>
                                            <input type="text"  value="<?= $data['nama_sumberdana'] ?>" class="form-control" name="nama_sumberdana">
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan Sumber Dana</label>
                                            <input type="text"  value="<?= $data['keterangan'] ?>" class="form-control" name="keterangan">
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