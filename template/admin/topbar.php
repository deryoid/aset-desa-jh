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
                                        <span><i class="ti-home"></i></span><span> Dashboard </span> </a>
                                    </li>

                                <li class="has-submenu <?= page_active('sumberdana') ? 'active' : '' ?>">
                                    <a href="#"><span><i class="ti-files"></i></span><span> Data Master </span> </a>
                                    <ul class="submenu">
                                        <li><a href="<?= base_url('admin/sumberdana') ?>">Sumber Dana</a></li>
                                    </ul>
                                </li>

                                <li class="has-submenu">
                                    <a href="#"><span><i class="ti-spray"></i></span><span> Other </span> </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="ui-elements.html">UI Elements</a>
                                        </li>

                                        <li class="has-submenu">
                                            <a href="#">Components</a>
                                            <ul class="submenu">
                                                <li><a href="components-range-slider.html">Range Slider</a></li>
                                                <li><a href="components-alerts.html">Alerts</a></li>
                                                <li><a href="components-icons.html">Icons</a></li>
                                                <li><a href="components-widgets.html">Widgets</a></li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="typography.html"> Typography </a>
                                        </li>

                                        <li class="has-submenu">
                                            <a href="#"> Forms </a>
                                            <ul class="submenu">
                                                <li><a href="forms-general.html">General Elements</a></li>
                                                <li><a href="forms-advanced.html">Advanced Form</a></li>
                                            </ul>
                                        </li>

                                        <li class="has-submenu">
                                            <a href="#"> Tables </a>
                                            <ul class="submenu">
                                                <li><a href="tables-basic.html">Basic tables</a></li>
                                                <li><a href="tables-advanced.html">Advanced tables</a></li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="charts.html"> Charts </a>
                                        </li>

                                        <li>
                                            <a href="maps.html"> Maps </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="has-submenu">
                                    <a href="#"> <span><i class="ti-widget"></i></span><span> Extra Pages </span> </a>
                                    <ul class="submenu">
                                        <li><a href="extras-timeline.html">Timeline</a></li>
                                        <li><a href="extras-invoice.html">Invoice</a></li>
                                        <li><a href="extras-profile.html">Profile</a></li>
                                        <li><a href="extras-calendar.html">Calendar</a></li>
                                        <li><a href="extras-faqs.html">FAQs</a></li>
                                        <li><a href="extras-pricing.html">Pricing</a></li>
                                        <li><a href="extras-contacts.html">Contacts</a></li>
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