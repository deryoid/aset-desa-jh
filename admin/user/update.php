<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';
if ($_SESSION['role'] != 'superadmin') {
    header("location:javascript://history.go(-1)");
}

?>

<?php
$id   = $_GET['id'] ? $_GET['id'] : header("location: ../user", true, 301);
$data = $koneksi->query("SELECT * FROM user WHERE id_user = '$id'")->fetch_array();
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
                                <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
                                        <div class="form-group">
                                            <label for="user">Nama Pengguna</label>
                                            <input type="text"  value="<?= $data['nama_user'] ?>" class="form-control" name="nama_user">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text"  value="<?= $data['username'] ?>" class="form-control" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" id="pass" autocomplete="off" minlength="5" maxlength="10" required>
                                                    <div class="input-group-append" id="btn_pass">
                                                        <button type="button" class="btn btn-primary waves-effect waves-light w-sm" onclick="lihatpass('pass');" title="Tampilkan Password"><i class="mdi mdi-eye-circle"></i></button>
                                                    </div>
                                            <small class="form-text text-muted font-italic">*Kosongkan Apabila Password Tidak Diubah</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Role</label>
                                            <select class="form-control select2" data-placeholder="Pilih Role" id="role" name="role" required="">
                                                    <option value="superadmin" <?php if ($data['role'] == "superadmin") {
                                                                            echo "selected";
                                                                            } ?>>Super Admin</option>
                                                    <option value="public" <?php if ($data['role'] == "public") {
                                                                                echo "selected";
                                                                            } ?>>Masyarakat</option>
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