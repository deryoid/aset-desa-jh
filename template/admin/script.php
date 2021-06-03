        <!-- jQuery  -->
        <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/jquery.slimscroll.js"></script>

        <!--Morris Chart-->
        <script src="<?= base_url() ?>/assets/plugins/morris/morris.min.js"></script>
        <script src="<?= base_url() ?>/assets/plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="<?= base_url() ?>/assets/pages/jquery.dashboard.js"></script>

        <!-- Required datatable js -->
        <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>/assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?= base_url() ?>/assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?= base_url() ?>/assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?= base_url() ?>/assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?= base_url() ?>/assets/plugins/datatables/buttons.print.min.js"></script>

        <!-- Key Tables -->
        <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.keyTable.min.js"></script>

        <!-- Responsive examples -->
        <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?= base_url() ?>/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Selection table -->
        <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.select.min.js"></script>
        <!-- Sweet-Alert  -->
        <script src="<?= base_url() ?>/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
        <script src="<?= base_url() ?>/assets/pages/jquery.sweet-alert.init.js"></script>
        <!-- App js -->
        <script src="<?= base_url() ?>/assets/js/jquery.core.js"></script>
        <script src="<?= base_url() ?>/assets/js/jquery.app.js"></script>

        
        <script type="text/javascript">
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );
            $(function() {
        $('.select2').select2({
            allowClear: true
        });

        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });

    // FORMAT RUPIAH
    $(".rupiah").mask("000.000.000.000", {
        reverse: true
    });

    $(".delete").click(function() {
        let data = $(this).data("link");
        let name = $(this).data("name");
        $('.tombol-delete').attr("href", data);
        $('#name').empty();
        $('#name').append(name);
        $('#modal-delete').modal('show');
    });

    // FORMAT ANGKA SAJA
    function Angkasaja(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    // LIHAT PASSWORD
    function lihatpass(id) {
        var getid = document.getElementById(id).id;
        let tipe = document.getElementById(id).type;

        if (getid == 'pass_lama') {
            if (tipe == 'password') {
                document.getElementById(id).type = 'text';
                document.getElementById('btn_lama').innerHTML =
                    '<button type="button" class="btn bg-gradient-success" onclick=lihatpass("pass_lama") title="Sembunyikan Password"><i class="fas fa-eye"></i></button>';
            } else {
                document.getElementById(id).type = 'password';
                document.getElementById('btn_lama').innerHTML =
                    '<button type="button" class="btn bg-gradient-dark" onclick=lihatpass("pass_lama"); title="Tampilkan Password"><i class="fas fa-eye-slash"></i></button>';
            }
        }

        if (getid == 'pass_baru') {
            if (tipe == 'password') {
                document.getElementById(id).type = 'text';
                document.getElementById('btn_baru').innerHTML =
                    '<button type="button" class="btn bg-gradient-success" onclick=lihatpass("pass_baru") title="Sembunyikan Password"><i class="fas fa-eye"></i></button>';
            } else {
                document.getElementById(id).type = 'password';
                document.getElementById('btn_baru').innerHTML =
                    '<button type="button" class="btn bg-gradient-dark" onclick=lihatpass("pass_baru"); title="Tampilkan Password"><i class="fas fa-eye-slash"></i></button>';
            }
        }

        if (getid == 'pass') {
            if (tipe == 'password') {
                document.getElementById(id).type = 'text';
                document.getElementById('btn_pass').innerHTML =
                    '<button type="button" class="btn bg-gradient-success" onclick=lihatpass("pass") title="Sembunyikan Password"><i class="fas fa-eye"></i></button>';
            } else {
                document.getElementById(id).type = 'password';
                document.getElementById('btn_pass').innerHTML =
                    '<button type="button" class="btn bg-gradient-dark" onclick=lihatpass("pass"); title="Tampilkan Password"><i class="fas fa-eye-slash"></i></button>';
            }
        }
    }
        </script>
