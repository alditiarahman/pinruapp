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
        <div class="row">
            <div class="col-sm-12">
                <?php Flasher::Message(); ?>
            </div>
        </div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <!-- <h3 class="card-title"><?= $data['title'] ?></h3> -->
                <div class="btn-group float-right">
                    <a href="<?= base_url; ?>/penilaianruangan/tambah" class="btn float-right btn btn-primary"><i class="fas fa-plus"></i> Tambah Penilaian</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url; ?>/penilaianruangan/cari" method="post">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="" name="key">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                                    <a class="btn btn-outline-danger" href="<?= base_url; ?>/penilaianruangan"><i class="fas fa-undo-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr style="text-align: center;">
                            <th style="width: 10px">No</th>
                            <th>Nama Ruangan</th>
                            <th>Nama Peminjam</th>
                            <th>Kebersihan</th>
                            <th>Kondisi Fasilitas</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['penilaian_ruangan'] as $row) : ?>
                            <tr>
                                <td style="text-align: center;"><?= $no; ?></td>
                                <td><?= $row['nama_ruangan']; ?></td>
                                <td><?= $row['nama_peminjam']; ?></td>
                                <td><?= $row['kebersihan']; ?></td>
                                <td><?= $row['kondisi_fasilitas']; ?></td>
                                <td style="text-align: center;">
                                    <a href="<?= base_url; ?>/penilaianruangan/edit/<?= $row['id_penilaian'] ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url; ?>/penilaianruangan/hapus/<?= $row['id_penilaian'] ?>" class="btn btn-warning" onclick="return confirm('Hapus data?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
                <br>
                <a href="<?= base_url; ?>/penilaianruangan/lihatlaporan" class="btn float-left btn btn-warning" target="_blank"><i class="fas fa-file-alt"></i> Lihat Laporan</a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->