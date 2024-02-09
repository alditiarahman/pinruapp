<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="dist/img/logo-bawaslu.png" alt="Bawaslu Logo" class="brand-image img-square elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-black"><b>PinRuApp</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Aldi Tiarahman</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2" style="overflow-y: auto; max-height: 70vh;">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url; ?>/home" class="nav-link">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <hr class="border-dark-grey">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url; ?>/ruangan" class="nav-link">
                                <i class="nav-icon fas fa-school"></i>
                                <p>
                                    Data Ruangan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url; ?>/petugas" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Data Petugas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url; ?>/peminjam" class="nav-link">
                                <i class="nav-icon fas fa-user-tag"></i>
                                <p>
                                    Data Peminjam
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <hr class="border-dark-grey">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Data Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url; ?>/peminjaman" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    Data Peminjaman
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url; ?>/pembatalan" class="nav-link">
                                <i class="nav-icon fas fa-user-times"></i>
                                <p>
                                    Data Pembatalan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url; ?>/penilaianruangan" class="nav-link">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>
                                    Data Penilaian Ruangan
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <hr class="border-dark-grey">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            Lainnya
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url; ?>/user" class="nav-link">
                                <i class="nav-icon fas fa-user-circle"></i>
                                <p>
                                    Pengguna
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url; ?>/about" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    About Me
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>