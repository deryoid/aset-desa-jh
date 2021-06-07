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

                <div class="m-t-30">
                    <div class="tab-content">
                            <!-- Personal-Information -->
                            <div class="panel panel-primary panel-fill">
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="color: white;">Peminjaman Barang</h3>
                                </div>
                                <div class="panel-body">
                                <form role="form" action="proses" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="jumlah_stok">Nama </label>
                                            <input type="text" id="jumlah_stok" value="<?= $_SESSION['nama_user']; ?>" class="form-control" readonly>
                                        </div>
                                        

                                        <div class="form-group">
                                            <label for="keperluan">Keperluan</label>
                                            <textarea type="text"  id="keperluan" class="form-control" name="keperluan"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="kontak">Kontak </label>
                                            <input type="number" id="kontak" name="kontak" placeholder="Nomor Telp/Whatsapp" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                            <div class="input-group">
                                            <input type="date" class="form-control" name="tanggal_pinjam">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                     </div>
                                        </div>

                                        
                                        <div class="form-group">
                                            <label for="tanggal_kembali">Tanggal Kembali</label>
                                            <div class="input-group">
                                            <input type="date" class="form-control" name="tanggal_kembali">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                     </div>
                                        </div>


                                       
                                        <button class="btn btn-primary waves-effect waves-light w-md" name="tambah" type="submit">Pinjam</button>
                                        <a href="index" class="btn btn-outline-info"> Kembali</a>
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