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
                        <h4 class="header-title m-t-0 m-b-20">Sumber Dana</h4>
                    </div>
                </div>

                <div class="m-t-30">
                    <ul class="nav nav-tabs tabs-bordered">
                        <li class="nav-item">
                            <a href="#tabel" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                Sumber Dana
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
                                            <h3 class="panel-title" style="color: white;">Sumber Dana</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row p-t-50">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama Sumber Dana</th>
                                                                    <th>Keterangan</th>
                                                                    <th style="text-align: center;"><span class="badge badge-primary"><i class="mdi mdi-cogs"></i></span></th>
                                                                </tr>
                                                                </thead>
                                                                <?php 
                                                                $no = 1;
                                                                $data = $koneksi->query("SELECT * FROM sumberdana ORDER BY id_sumberdana ASC");
                                                                foreach ($data as $row) {  
                                                                ?>
                                                                <tbody>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $row['nama_sumberdana']; ?></td>
                                                                    <td><?= $row['keterangan']; ?></td>
                                                                    <td style="text-align: center;">
                                                                    <a href="update?id=<?= $row['id_sumberdana'] ?>"><span class="badge badge-success badge-lg"><i class="mdi mdi-briefcase-edit-outline"></i></span></a>
                                                                    <a href="proses?id=<?= $row['id_sumberdana'] ?>"><span class="badge badge-danger badge-lg"><i class="mdi mdi-trash-can"></i></span></a>
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
                                            <label for="sumberdana">Nama Sumber Dana</label>
                                            <input type="text"  id="sumberdana" class="form-control" name="nama_sumberdana">
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan Sumber Dana</label>
                                            <input type="text"  id="keterangan" class="form-control" name="keterangan">
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
