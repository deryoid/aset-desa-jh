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
                        <h4 class="header-title m-t-0 m-b-20">Perbaikan Barang</h4>
                    </div>
                </div>

                <div class="m-t-5">
                    <div class="tab-content">
                        <div class="row">
                             <div class="col-md-12">
                                <!-- Personal-Information -->
                                <div class="panel panel-primary panel-fill">
                                    <div class="panel-heading">
                                        <table border="0" width="100%">
                                        <th style="text-align: left; color:white;">Perbaikan Barang</th>
                                        <th style="text-align: right; color:white;"><a href="" class="btn btn-success btn-rounded" data-toggle="modal" data-target="#modal-perbaikan"><i class="mdi mdi-cogs"></i> Tambah</span></a></th>
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
                                                                    <th>Status Perbaikan Barang</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Jumlah yang Diperbaiki</th>
                                                                    <th><span class="badge badge-primary"><i class="mdi mdi-cogs"></i></span></th>
                                                                    
                                                                </tr>
                                                                </thead>
                                                                <?php 
                                                                $no = 1;
                                                                $data = $koneksi->query("SELECT * FROM perbaikan AS pb
                                                                LEFT JOIN barang AS bg
                                                                ON pb.id_barang = bg.id_barang");
                                                                foreach ($data as $row) {  
                                                                ?>
                                                                <tbody>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $row['kode_barang']; ?></td>
                                                                    <td><?= $row['nama_barang']; ?></td>
                                                                    <td style="text-align: center;">
                                                                    <?php if ($row['status_perbaikan'] == 'Sedang Diperbaiki'){ ?>
                                                                    <span class="badge badge-warning badge-lg"><i class="mdi mdi-check-decagram"></i> Sedang Diperbaiki</span><br>
                                                                    <?php }elseif ($row['status_perbaikan'] == 'Telah Diperbaiki'){ ?>
                                                                    <span class="badge badge-success badge-lg"><i class="mdi mdi-close-octagon"> Telah Diperbaiki</i></span>
                                                                    <?php }?>
                                                                   </td>
                                                                    <td><?= $row['tgl_perbaikan']; ?></td>
                                                                    <td><?= $row['jumlah_perbaikan']; ?></td>
                                                                    <td style="text-align: center;">
                                                                   <?php if ($row['status_perbaikan'] == 'Sedang Diperbaiki'){ ?>
                                                                    <a href="selesai-perbaikan?id=<?= $row['id_perbaikan'] ?>" ><span class="badge badge-primary badge-lg"><i class="mdi mdi-eye"></i> Aksi</span></a>
                                                                    <?php }else{ ?>
                                                                    <span>Tidak ada Aksi</span>
                                                                    <?php } ?>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            <?php }
                                                            
                                                            
                                                            ?>
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

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="modal-perbaikan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Perbaikan Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="xmodal-body">
                <p>
                <form role="form" action="proses-perbaikan" method="POST" enctype="multipart/form-data">    

                                        

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
                                            <label for="jumlah_stok">Stok</label>
                                            <input type="number" id="jumlah_stok" class="form-control" readonly>
                                        </div>
                                        

                                        <div class="form-group">
                                            <label for="jumlah_perbaikan">Jumlah yang Diperbaiki</label>
                                            <input type="number"  id="jumlah_perbaikan" onkeyup="validstok()" class="form-control" name="jumlah_perbaikan">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_perbaikan">Tanggal Perbaikan</label>
                                            <div class="input-group">
                                            <input type="date" class="form-control" name="tgl_perbaikan">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                     </div>
                                        </div>
                                       
                                        <button class="btn btn-primary waves-effect waves-light w-md" name="perbaikan" type="submit">Perbaikan</button>
                                 </form>
                                 </p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



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
    var jumlah_perbaikan = $('#jumlah_perbaikan').val();

    if(parseInt(jumlah_perbaikan) > parseInt(stok)){
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
