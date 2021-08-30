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
                        <h4 class="header-title m-t-0 m-b-20">Pengadaan Barang</h4>
                    </div>
                </div>

                <div class="m-t-5">
                    
                    <div class="tab-content">
                        <div class="tab-pane <?= $_SESSION['alert'] == "Berhasil" || $_SESSION['alert'] == "Berubah" ||  $_SESSION['alert'] == "Hapus" || !$_SESSION['alert'] ? "active" : "" ?>" id="tabel">
                            <div class="row">

                                <div class="col-md-12">
                                    <!-- Tabel -->
                                    <div class="panel panel-primary panel-fill">
                                        <div class="panel-heading">
                                            <h3 class="panel-title" style="color: white;">Barang</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row p-t-5">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table id="key-table" class="table table-bordered" cellspacing="0" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama Barang</th>
                                                                    <th>pengelompokan</th>
                                                                    <th>Nilai Aset</th>
                                                                    <th>Sumber Dana</th>
                                                                    <th>Status</th>
                                                                    <th style="text-align: center;"><span class="badge badge-primary"><i class="mdi mdi-cogs"></i></span></th>
                                                                </tr>
                                                                </thead>
                                                                <?php 
                                                                $no = 1;
                                                                $data = $koneksi->query("SELECT * FROM barang AS br LEFT JOIN sumberdana AS sd ON br.id_sumberdana = sd.id_sumberdana WHERE br.status_pengadaan = 'Diusulkan' OR br.status_pengadaan = 'Disetujui'");
                                                                foreach ($data as $row) {  
                                                                ?>
                                                                <tbody>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $row['nama_barang']; ?></td>
                                                                    <td><?= $row['pengelompokan']; ?></td>
                                                                    <td><?= $row['nilai_aset']; ?></td>
                                                                    <td><?= $row['nama_sumberdana']; ?></td>
                                                                    <td><b><u><?= $row['status_pengadaan']; ?></u></b></td>
                                                                    <td style="text-align: center;">
                                                                    <a href="update?id=<?= $row['id_barang'] ?>"><span class="badge badge-success badge-lg"><i class="mdi mdi-briefcase-edit-outline"></i> Status Pengadaan</span></a>
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
