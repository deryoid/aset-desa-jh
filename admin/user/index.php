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
                        <h4 class="header-title m-t-0 m-b-20">Pengguna</h4>
                    </div>
                </div>

                <div class="m-t-30">
                    <ul class="nav nav-tabs tabs-bordered">
                        <li class="nav-item">
                            <a href="#tabel" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                Pengguna
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
                                            <h3 class="panel-title" style="color: white;">Pengguna</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row p-t-50">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama Pengguna</th>
                                                                    <th>Username</th>
                                                                    <th>Password</th>
                                                                    <th style="text-align: center;"><span class="badge badge-primary"><i class="mdi mdi-cogs"></i></span></th>
                                                                </tr>
                                                                </thead>
                                                                <?php 
                                                                $no = 1;
                                                                $data = $koneksi->query("SELECT * FROM user ORDER BY id_user ASC");
                                                                foreach ($data as $row) {  
                                                                ?>
                                                                <tbody>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $row['nama_user']; ?></td>
                                                                    <td><?= $row['username']; ?></td>
                                                                    <td><?= $row['password']; ?></td>
                                                                    <td style="text-align: center;">
                                                                    <a href="update?id=<?= $row['id_user'] ?>"><span class="badge badge-success badge-lg"><i class="mdi mdi-briefcase-edit-outline"></i></span></a>
                                                                    <a href="proses?id=<?= $row['id_user'] ?>"><span class="badge badge-danger badge-lg"><i class="mdi mdi-trash-can"></i></span></a>
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
                                            <label for="nama_user">Nama Pengguna</label>
                                            <input type="text"  id="nama_user" class="form-control" name="nama_user">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text"  id="username" class="form-control" name="username">
                                        </div>
                                        <div class="form-group  m-t-10">
                                            <label for="username">Password</label>
                                            <input type="password" class="form-control" name="password" id="pass" autocomplete="off" minlength="5" maxlength="10" required>
                                                    <div class="input-group-append" id="btn_pass">
                                                        <button type="button" class="btn btn-primary waves-effect waves-light w-sm" onclick="lihatpass('pass');" title="Tampilkan Password"><i class="mdi mdi-eye-circle"></i></button>
                                                    </div>
                                            <small class="form-text text-muted font-italic">*Password Minimal 5 Karakter dan Maksimal 10 Karakter</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Role</label>
                                            <select class="form-control" name="role" id="role" required>
                                                    <option value="" disabled selected>--Pilih--</option>
                                                    <option value="superadmin">Admin</option>
                                                    <option value="public">Masyarakat</option>
                                                </select>
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
