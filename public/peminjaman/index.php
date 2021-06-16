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
                        <h4 class="header-title m-t-0 m-b-20">Peminjaman Barang</h4>
                    </div>
                </div>
                <a href="create" class="btn btn-primary"><i class="mdi mdi-plus-circle-multiple-outline"> Pinjam</i></a>
                <div class="m-t-5">
                    <div class="tab-content">
                            <!-- Personal-Information -->
                            <div class="panel panel-primary panel-fill">
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="color: white;">Peminjaman Barang</h3>
                                </div>
                                <div class="panel-body">

                                <div class="row p-t-5">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table id="key-table" class="table table-bordered" cellspacing="0" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Peminjaman</th>
                                                                    <th>Keperluan</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Status</th>
                                                                    <th style="text-align: center;"><span class="badge badge-primary"><i class="mdi mdi-eye-circle"></i></span></th>
                                                                    <th style="text-align: center;"><span class="badge badge-primary"><i class="mdi mdi-cogs"></i></span></th>
                                                                </tr>
                                                                </thead>
                                                                <?php 
                                                                $no = 1;
                                                                $data = $koneksi->query("SELECT * FROM pinjam AS p LEFT JOIN user AS u ON p.id_user = u.id_user ORDER BY id_pinjam DESC");
                                                                foreach ($data as $row) {  
                                                                ?>
                                                                <tbody>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td>
                                                                    Nama : <?= $_SESSION['nama_user']; ?><br>
                                                                    Kontak : <?= $row['kontak']; ?><br>
                                                                    </td>
                                                                    <td><?= $row['keperluan']; ?></td>
                                                                    <td>
                                                                    Tanggal Pinjam :<?= $row['tanggal_pinjam']; ?><br>
                                                                    Tanggal Kembali :<?= $row['tanggal_kembali']; ?>
                                                                    </td>
                                                                    <td style="text-align: center;">
                                                                    <?php if ($row['status_pinjam'] == 'Menunggu'){ ?>
                                                                        <span class="badge badge-warning badge-lg"><?= $row['status_pinjam'] ?></span>
                                                                    <?php }elseif ($row['status_pinjam'] == 'Disetujui'){ ?>
                                                                        <span class="badge badge-success badge-lg"><?= $row['status_pinjam'] ?></span>
                                                                    <?php }else{ ?>
                                                                        <span class="badge badge-danger badge-lg"><?= $row['status_pinjam'] ?></span>
                                                                    <?php }?>
                                                                    </td>
                                                                    <td style="text-align: center;">
                                                                    <a href="view?id=<?= $row['id_pinjam'] ?>" ><span class="badge badge-info badge-lg"><i class="mdi mdi-eye-circle"></i> Lihat</span></a>
                                                                    </td>
                                                                    <td style="text-align: center;">
                                                                    <?php 
                                                                    if ($row['status_pinjam'] != 'Disetujui'){
                                                                    ?>
                                                                    <a href="update?id=<?= $row['id_pinjam'] ?>"><span class="badge badge-success badge-lg"><i class="mdi mdi-pencil-outline"></i></span></a>
                                                                    <a href="detail?id=<?= $row['id_pinjam'] ?>"><span class="badge badge-primary badge-lg"><i class="mdi mdi-ballot-outline"></i></span></a>
                                                                    <a href="proses?id=<?= $row['id_pinjam'] ?>"><span class="badge badge-danger badge-lg"><i class="mdi mdi-trash-can"></i></span></a>
                                                                    <?php }?>
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

<script>

$('#id_barang').change(function(){
    var id_barang = $(this).val();
     $.ajax({
         url: 'get.php',
         method: 'POST',
         dataType: 'json',
         data: {
             id:id_barang             
         },
         success: function (data) {
             $('#jumlah_stok').val(data.jumlah_stok);
         }
     });
});

function validstok() {
    var stok = $('#jumlah_stok').val();
    var jumlah_pinjam = $('#jumlah_pinjam').val();

    if(parseInt(jumlah_pinjam) > parseInt(stok)){
        swal(
            {
                title: 'Stok Tidak Mencukupi',
                text: 'Tekan Tombol Ok Untuk Melanjutkan!',
                type: 'error',
            }
        );
        $('#jumlah_pinjam').val('');
    }  
}


</script>

