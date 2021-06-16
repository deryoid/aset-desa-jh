<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';
?>
<?php
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pinjam AS p LEFT JOIN user AS u ON p.id_user = u.id_user  WHERE p.id_pinjam = '$id'")->fetch_array();
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

                <div class="m-t-5">
                    <div class="tab-content">
                        <div class="row">
                             <div class="col-md-3">
                                <!-- Personal-Information -->
                                <div class="panel panel-primary panel-fill">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" style="color: white;">Peminjaman Barang</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="m-b-20">
                                            <strong>Full Name</strong>
                                            <br>
                                            <p class="text-muted"><?= $data['nama_user']; ?></p>
                                        </div>
                                        <div class="m-b-20">
                                            <strong>Keperluan</strong>
                                            <br>
                                            <p class="text-muted"><?= $data['keperluan']; ?></p>
                                        </div>
                                        <div class="m-b-20">
                                            <strong>Kontak</strong>
                                            <br>
                                            <p class="text-muted"><?= $data['kontak']; ?></p>
                                        </div>
                                        <div class="about-info-p m-b-0">
                                            <strong>Tanggal</strong>
                                            <br>
                                            <p class="text-muted"><?= $data['tanggal_pinjam']; ?>/<?= $data['tanggal_kembali']; ?></p>
                                        </div>
                                        </div>
                                </div>
                            <!-- Personal-Information -->
                             </div>
                             <div class="col-md-9">
                                <!-- Personal-Information -->
                                <div class="panel panel-primary panel-fill">
                                    <div class="panel-heading">
                                        <table border="0" width="100%">
                                            <th style="text-align: left; color:white;">Barang</th>
                                            <th style="text-align: right; color:white;">
                                                <?php 
                                                if ($data['status_pinjam'] != 'Disetujui'){
                                                ?>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success mdi mdi-plus"> Status</button>
                                                    <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="proses-verif?id=<?= $id; ?>&sts=1">Disetujui</a>
                                                    <a class="dropdown-item" href="proses-verif?id=<?= $id; ?>&sts=2">Ditolak</a>
                                                </div>
                                                <?php }?>
                                            </th>
                                        </table>
                                    </div>
                                    <div class="panel-body">
                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table id="key-table" class="table table-bordered" cellspacing="0" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Kode Barang</th>
                                                                    <th>Nama Barang</th>
                                                                    <th>Jumlah Pinjam</th>
                                                                </tr>
                                                                </thead>
                                                                <?php 
                                                                $no = 1;
                                                                $data = $koneksi->query("SELECT * FROM detail_pinjam AS dp 
                                                                LEFT JOIN pinjam AS p 
                                                                ON dp.id_pinjam = p.id_pinjam 
                                                                LEFT JOIN barang AS bg
                                                                ON dp.id_barang = bg.id_barang");
                                                                foreach ($data as $row) {  
                                                                ?>
                                                                <tbody>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $row['kode_barang']; ?></td>
                                                                    <td><?= $row['nama_barang']; ?></td>
                                                                    <td><?= $row['jumlah_pinjam']; ?></td>
                                                                </tr>
                                                                </tbody>
                                                            <?php } ?>
                                                            </table>
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
