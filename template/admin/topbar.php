<header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!--<a href="index.html" class="logo">-->
                            <!--<span class="logo-small"><i class="mdi mdi-radar"></i></span>-->
                            <!--<span class="logo-large"><i class="mdi mdi-radar"></i> Simple</span>-->
                        <!--</a>-->
                        <!-- Image Logo -->
                        <a href="<?= base_url('admin') ?>" class="logo">
                            <img src="<?= base_url() ?>/assets/images/logo-kab-hss.png" alt="" height="50px" class="logo-small">
                            <img src="<?= base_url() ?>/assets/images/logo-kab-hss.png" alt="" height="50px" class="logo-large"><i>ASET DESA</i>
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="navbar-custom">
                        <div id="navigation">
                            <!-- Navigation Menu-->
                            <ul class="navigation-menu">
                            <?php if ($_SESSION['role'] == 'superadmin') : ?>
                                <li class="has-submenu">
                                    <a href="index" class="<?= page_active('admin') ? 'active' : '' ?>">
                                        <span><i class="mdi mdi-desktop-mac-dashboard"></i></span><span> Dashboard </span> </a>
                                    </li>

                                <li class="has-submenu <?= page_active('sumberdana') ? 'active' : '' ?>">
                                    <a href="#"><span><i class="mdi mdi-briefcase-edit-outline"></i></span><span> Data Master </span> </a>
                                    <ul class="submenu">
                                        <li><a href="<?= base_url('admin/sumberdana') ?>">Sumber Dana</a></li>
                                        <li><a href="<?= base_url('admin/user') ?>">Pengguna</a></li>
                                        <li>
                                            <a href="<?= base_url('admin/bangunan') ?>">Bangunan</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/barang') ?>">Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/jalan') ?>">Jalan</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/tanah') ?>">Tanah</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="has-submenu <?= page_active('aset') ? 'active' : '' ?>"">
                                    <a href="#"><span><i class="mdi mdi-table-edit"></i></span><span> Transaksi </span> </a>
                                    <ul class="submenu">
                                         <li>
                                            <a href="<?= base_url('admin/usulan_barang') ?>">Daftar Usulan Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/pengadaan') ?>">Pengadaan Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/penerimaan') ?>">Penerimaan Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/distribusi') ?>">Pendistribusian Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/mutasi') ?>">Mutasi Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/peminjaman') ?>">Peminjaman Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/pengembalian') ?>">Pengembalian Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/perbaikan') ?>">Perbaikan/Maintance Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/pemusnahan') ?>">Pemusnahan Barang</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="has-submenu <?= page_active('laporan') ? 'active' : '' ?>"">
                                    <a href="#"><span><i class="mdi mdi-printer-settings"></i></span><span> Report </span> </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="<?= base_url('admin/laporan/lap-usulanpengadaan') ?>" target="_blank">Daftar Usulan Pengadaan</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/laporan/lap-pengadaan') ?>" target="_blank">Pengadaan Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/laporan/lap-penerimaanbarang') ?>" target="_blank"> Penerimaan Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/laporan/lap-pendistribusian') ?>" target="_blank"> Pendistribusian Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/laporan/lap-pendistribusian') ?>" target="_blank"> Pemindahan Barang atau Mutasi</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/laporan/lap-asetbangunan') ?>" target="_blank">Aset Bangunan</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/laporan/lap-asetbarang') ?>" target="_blank">Aset Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/laporan/lap-asetjalan') ?>" target="_blank">Aset Jalan</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/laporan/lap-asettanah') ?>" target="_blank">Aset Tanah</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/laporan/lap-pinjambarang') ?>" target="_blank">Peminjaman Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/laporan/lap-kembalibarang') ?>" target="_blank">Pengembalian Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/laporan/lap-musnahbarang') ?>" target="_blank">Pemusnahan Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/laporan/lap-kerusakan') ?>" target="_blank">Kerusakan Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/laporan/lap-perbaikanbarang') ?>" target="_blank">Perbaikan Barang</a>
                                        </li>
                                       

                                    </ul>
                                </li>

                                

                            <?php endif; ?>

                            <?php if ($_SESSION['role'] == 'public') : ?>
                                <li class="has-submenu">
                                    <a href="index" class="<?= page_active('public') ? 'active' : '' ?>">
                                        <span><i class="ti-home"></i></span><span> Dashboard </span> </a>
                                    </li>

                                <li class="has-submenu <?= page_active('barang') ? 'active' : '' ?>">
                                    <a href="#"><span><i class="ti-files"></i></span><span> Peminjaman </span> </a>
                                    <ul class="submenu">
                                        <li><a href="<?= base_url('public/peminjaman') ?>">Peminjaman Barang</a></li>
                                        <li><a href="<?= base_url('public/pengembalian') ?>">Pengembalian Barang</a></li>
                                    </ul>
                                </li>                          

                            <?php endif; ?>
                            <?php if ($_SESSION['role'] == 'pimpinan') : ?>
                                <li class="has-submenu">
                                    <a href="index" class="<?= page_active('pimpinan') ? 'active' : '' ?>">
                                        <span><i class="ti-home"></i></span><span> Dashboard </span> </a>
                                    </li>
                                <li class="has-submenu">
                                    <a href="#" data-toggle="modal" data-target="#modal-kel" target="_blank" class="<?= page_active('pengelompokan') ? 'active' : '' ?>">
                                        <span><i class="ti-search" ></i></span><span> Pengelompokan </span> </a>
                                    </li>

                                    <li class="has-submenu <?= page_active('laporan') ? 'active' : '' ?>"">
                                    <a href="#"><span><i class="mdi mdi-printer-settings"></i></span><span> Report </span> </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="<?= base_url('pimpinan/laporan/lap-usulanpengadaan') ?>" target="_blank">Daftar Usulan Pengadaan</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('pimpinan/laporan/lap-pengadaan') ?>" target="_blank">Pengadaan Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('pimpinan/laporan/lap-penerimaanbarang') ?>" target="_blank"> Penerimaan Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('pimpinan/laporan/lap-pendistribusian') ?>" target="_blank"> Pendistribusian Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('pimpinan/laporan/lap-pendistribusian') ?>" target="_blank"> Pemindahan Barang atau Mutasi</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('pimpinan/laporan/lap-asetbangunan') ?>" target="_blank">Aset Bangunan</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('pimpinan/laporan/lap-asetbarang') ?>" target="_blank">Aset Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('pimpinan/laporan/lap-asetjalan') ?>" target="_blank">Aset Jalan</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('pimpinan/laporan/lap-asettanah') ?>" target="_blank">Aset Tanah</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('pimpinan/laporan/lap-pinjambarang') ?>" target="_blank">Peminjaman Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('pimpinan/laporan/lap-kembalibarang') ?>" target="_blank">Pengembalian Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('pimpinan/laporan/lap-musnahbarang') ?>" target="_blank">Pemusnahan Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('pimpinan/laporan/lap-kerusakan') ?>" target="_blank">Kerusakan Barang</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('pimpinan/laporan/lap-perbaikanbarang') ?>" target="_blank">Perbaikan Barang</a>
                                        </li>
                                       

                                    </ul>
                                </li>
                

                            <?php endif; ?>
                            </ul>
                            <!-- End navigation menu -->
                        </div> <!-- end #navigation -->
                    </div> <!-- end navbar-custom -->


                    <div class="menu-extras topbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <li class="menu-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
                            

 

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="<?= base_url() ?>/assets/images/users/user.png" alt="user" class="rounded-circle"> <span class="ml-1 pro-user-name"><?= $_SESSION['nama_user'] ?> <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                   

                                    <!-- item-->
                                    <a href="<?= base_url('logout') ?>" class="dropdown-item notify-item">
                                        <i class="ti-power-off"></i> <span>Logout</span>
                                    </a>

                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

        </header>

        
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="modal-kel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Pengelompokan Barang/Aset</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="xmodal-body">
                <p>
                <form role="form" action="<?= base_url('pimpinan/laporan/lap-kelaset') ?>" target="_blank" method="POST" enctype="multipart/form-data">    

                                        <div class="form-group">
                                            <label for="kode_barang">Pengelompokan Aset/Barang</label>
                                            <select class="form control select2" name="pengelompokan" id="pengelompokan" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $sd = $koneksi->query("SELECT pengelompokan FROM barang GROUP BY pengelompokan");
                                                    foreach ($sd as $item) {
                                                    ?>
                                                        <option value="<?= $item['pengelompokan'] ?>"><?= $item['pengelompokan'] ?></option>
                                                    <?php } ?>
                                                </select>
                                        </div>
                                       
                                        <button class="btn btn-primary waves-effect waves-light w-md" target="_blank" name="print" type="submit">Pengelompokan</button>
                                 </form>
                                 </p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

