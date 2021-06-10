<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';
?>

<?php
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM jalan WHERE id_jalan = '$id'")->fetch_array();
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
                        <h4 class="header-title m-t-0 m-b-20">Jalan</h4>
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
                                <input type="hidden" name="id_jalan" value="<?= $data['id_jalan'] ?>">
                                
                                        <div class="form-group">
                                            <label for="kode_jalan">Kode Jalan</label>
                                            <input type="text"  id="kode_jalan" value="<?= $data['kode_jalan'] ?>" class="form-control" name="kode_jalan">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_jalan">Nama Jalan</label>
                                            <input type="text"  id="nama_jalan" value="<?= $data['nama_jalan'] ?>" class="form-control" name="nama_jalan">
                                        </div>
                                        <div class="form-group">
                                            <label for="lokasi">Lokasi</label>
                                            <input type="text"  id="lokasi" value="<?= $data['lokasi'] ?>" class="form-control" name="lokasi">
                                        </div>
                                        <div class="form-group">
                                            <label for="nilai_aset">Nilai Aset</label>
                                            <input type="text"  id="nilai_aset" value="<?= $data['nilai_aset'] ?>" class="form-control" name="nilai_aset">
                                        </div>
                                        <div class="form-group">
                                            <label for="sumberdana">Sumber Dana</label>
                                            <select class="form control select2" name="id_sumberdana" id="id_sumberdana" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $sd = $koneksi->query("SELECT * FROM sumberdana ORDER BY id_sumberdana DESC");
                                                    foreach ($sd as $item) {
                                                    ?>
                                                        <option value="<?= $item['id_sumberdana'] ?>" <?= $data['id_sumberdana'] == $item['id_sumberdana'] ? 'selected' : '' ?>><?= $item['nama_sumberdana'] ?></option>
                                                    <?php } ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_pembuatan">Tanggal Pembuatan</label>
                                            <div class="input-group">
                                            <input type="date" class="form-control" value="<?= $data['tanggal_pembuatan'] ?>" name="tanggal_pembuatan">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                     </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kondisi">Kondisi</label>
                                            <input type="text"  id="kondisi" class="form-control" value="<?= $data['kondisi'] ?>" name="kondisi" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ulj">Ukuran Luas jalan</label>
                                            <input type="text"  id="ulj" class="form-control" value="<?= $data['ulj'] ?>" name="ulj">
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