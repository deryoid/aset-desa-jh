<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';

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
                        <h4 class="header-title m-t-0 m-b-20">Bangunan</h4>
                    </div>
                </div>

                <div class="m-t-30">
                    <ul class="nav nav-tabs tabs-bordered">
                        <li class="nav-item">
                            <a href="#tabel" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                Bangunan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tambah-data" data-toggle="tab" aria-expanded="true" class="nav-link">
                                Tambah Data
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane <?= $_SESSION['alert'] == "Berhasil" || $_SESSION['alert'] == "Berubah" ||  $_SESSION['alert'] == "Hapus" || !$_SESSION['alert'] ? "active" : "" ?>" id="tabel">
                            <div class="row">

                                <div class="col-md-12">
                                    <!-- Tabel -->
                                    <div class="panel panel-primary panel-fill">
                                        <div class="panel-heading">
                                            <h3 class="panel-title" style="color: white;">Bangunan</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row p-t-50">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table id="key-table" class="table table-bordered" cellspacing="0" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Kode Bangunan</th>
                                                                    <th>Nama Bangunan</th>
                                                                    <th>Lokasi</th>
                                                                    <th>Nilai Aset</th>
                                                                    <th>Sumber Dana</th>
                                                                    <th>Tanggal Pembuatan</th>
                                                                    <th>Kondisi</th>
                                                                    <th>Ukuran Luas Bangunan</th>
                                                                    <th style="text-align: center;"><span class="badge badge-primary"><i class="mdi mdi-cogs"></i></span></th>
                                                                </tr>
                                                                </thead>
                                                                <?php 
                                                                $no = 1;
                                                                $data = $koneksi->query("SELECT * FROM bangunan AS b LEFT JOIN sumberdana AS sd ON b.id_sumberdana = sd.id_sumberdana ORDER BY id_bangunan ASC");
                                                                foreach ($data as $row) {  
                                                                ?>
                                                                <tbody>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $row['kode_bangunan']; ?></td>
                                                                    <td><?= $row['nama_bangunan']; ?></td>
                                                                    <td><?= $row['lokasi']; ?></td>
                                                                    <td><?= $row['nilai_aset']; ?></td>
                                                                    <td><?= $row['nama_sumberdana']; ?></td>
                                                                    <td><?= $row['tanggal_pembuatan']; ?></td>
                                                                    <td><?= $row['kondisi']; ?></td>
                                                                    <td><?= $row['ulb']; ?></td>
                                                                    <td style="text-align: center;">
                                                                    <a href="update?id=<?= $row['id_bangunan'] ?>"><span class="badge badge-success badge-lg"><i class="mdi mdi-briefcase-edit-outline"></i></span></a>
                                                                    <a href="proses?id=<?= $row['id_bangunan'] ?>"><span class="badge badge-danger badge-lg"><i class="mdi mdi-trash-can"></i></span></a>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            <?php } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div> <!-- end row -->
                                        </div>
                                    </div>
                                    <!-- Tabel -->

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane <?= $_SESSION['alert'] == "Gagal" ? "active" : "" ?>" id="tambah-data">
                            <!-- Personal-Information -->
                            <div class="panel panel-primary panel-fill">
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="color: white;">Tambah Data</h3>
                                </div>
                                <div class="panel-body">
                                    <form role="form" action="proses" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="kode_bangunan">Kode Bangunan</label>
                                            <input type="text"  id="kode_bangunan" class="form-control" name="kode_bangunan">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_bangunan">Nama Bangunan</label>
                                            <input type="text"  id="nama_bangunan" class="form-control" name="nama_bangunan">
                                        </div>
                                        <div class="form-group">
                                            <label for="lokasi">Lokasi</label>
                                            <input type="text"  id="lokasi" class="form-control" name="lokasi">
                                        </div>
                                        <div class="form-group">
                                            <label for="nilai_aset">Nilai Aset</label>
                                            <input type="text"  id="nilai_aset" class="form-control" name="nilai_aset">
                                        </div>
                                        <div class="form-group">
                                            <label for="sumberdana">Sumber Dana</label>
                                            <select class="form control select2" name="id_sumberdana" id="id_sumberdana" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $sd = $koneksi->query("SELECT * FROM sumberdana ORDER BY id_sumberdana DESC");
                                                    foreach ($sd as $item) {
                                                    ?>
                                                        <option value="<?= $item['id_sumberdana'] ?>"><?= $item['nama_sumberdana'] ?></option>
                                                    <?php } ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_pembuatan">Tanggal Pembuatan</label>
                                            <div class="input-group">
                                            <input type="date" class="form-control" name="tanggal_pembuatan">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                     </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kondisi">Kondisi</label>
                                            <input type="text"  id="kondisi" class="form-control" name="kondisi">
                                        </div>
                                        <div class="form-group">
                                            <label for="ulb">Ukuran Luas Bangunan</label>
                                            <input type="text"  id="ulb" class="form-control" name="ulb">
                                        </div>
                                        
                                        <button class="btn btn-primary waves-effect waves-light w-md" name="tambah" type="submit">Simpan</button>
                                    </form>

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

<?php
if (isset($_SESSION['alert'])) {
    if ($_SESSION['alert'] == "Berhasil") {
        echo "<script>
        swal(
            {
                title: 'Berhasil',
                text: 'Tekan Tombol Ok Untuk Melanjutkan!',
                type: 'success',
            }
        )
        </script>";
        unset($_SESSION['alert']);
    }elseif ($_SESSION['alert'] == "Gagal") {
        echo "<script>
        swal(
            {
                title: 'Gagal',
                text: 'Tekan Tombol Ok Untuk Melanjutkan!',
                type: 'error',
            }
        )
        </script>";
        unset($_SESSION['alert']);
    }elseif ($_SESSION['alert'] == "Berubah") {
        echo "<script>
        swal(
            {
                title: 'Berhasil Diubah',
                text: 'Tekan Tombol Ok Untuk Melanjutkan!',
                type: 'success',   
            }
        )
        </script>";
        unset($_SESSION['alert']);
    }elseif ($_SESSION['alert'] == "Hapus") {
        echo "<script>
        swal(
            {
                title: 'Berhasil Dihapus',
                text: 'Tekan Tombol Ok Untuk Melanjutkan!',
                type: 'warning',   
            }
        )
        </script>";
        unset($_SESSION['alert']);
    }
}
?>
