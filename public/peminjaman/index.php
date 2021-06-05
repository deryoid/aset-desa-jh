<?php
require_once '../../config/config.php';
include_once '../../config/auth-cek.php';
?>

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
                                <!-- <input type="hidden" name="id_barang" value="<?= $data['id_barang'] ?>"> -->
                                
                                        <div class="form-group">
                                            <label for="kode_barang">Barang</label>
                                            <select class="form control select2" name="id_barang" id="id_barang" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $sd = $koneksi->query("SELECT * FROM barang ORDER BY id_barang DESC");
                                                    foreach ($sd as $item) {
                                                    ?>
                                                        <option value="<?= $item['id_barang'] ?>"><?= "(".$item['kode_barang'].")" ?> <?= $item['nama_barang'] ?>| Stok : <?= $item['jumlah_stok'] ?></option>
                                                    <?php } ?>
                                                </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="jumlah_stok"Stok</label>
                                            <input type="number" id="jumlah_stok" class="form-control" readonly>
                                        </div>
                                        

                                        <div class="form-group">
                                            <label for="jumlah_pinjam">Jumlah Pinjam</label>
                                            <input type="number"  id="jumlah_pinjam" onkeyup="validstok()" class="form-control" name="jumlah_pinjam">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                            <div class="input-group">
                                            <input type="date" class="form-control" name="tanggal_pinjam" value="<?= date('Y-m-d') ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                     </div>
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