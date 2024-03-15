    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?= $data['title']; ?></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Data</h3>
                            Peminjaman
                        </div>
                        <div class="icon">
                            <i class="ion ion-plus-round"></i>
                        </div>
                        <a href="<?= base_url; ?>/peminjaman/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>Data</h3>
                            Pembatalan
                        </div>
                        <div class="icon">
                            <i class="ion ion-close-round"></i>
                        </div>
                        <a href="<?= base_url; ?>/pembatalan/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>Data</h3>
                            Pengembalian
                        </div>
                        <div class="icon">
                            <i class="ion ion-refresh"></i>
                        </div>
                        <a href="<?= base_url; ?>/pengembalian/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Data</h3>
                            Perubahan Jadwal
                        </div>
                        <div class="icon">
                            <i class="ion ion-calendar"></i>
                        </div>
                        <a href="<?= base_url; ?>/perubahanjadwal/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $data['title']; ?></h3>
                </div>
                <div class="card-body">
                    Selamat Datang di <b>PinRuApp</b> Aplikasi Peminjaman Ruangan
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Aplikasi ini diperuntukan sebagai laporan PKL
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->