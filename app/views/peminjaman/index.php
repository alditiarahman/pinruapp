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
                    <a href="<?= base_url; ?>/peminjaman/tambah" class="btn float-right btn btn-primary"><i class="fas fa-plus"></i> Tambah Peminjaman</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url; ?>/peminjaman/cari" method="post">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="" name="key">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                                    <a class="btn btn-outline-danger" href="<?= base_url; ?>/peminjaman"><i class="fas fa-undo-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Ruangan</th>
                            <th>Petugas</th>
                            <th>Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Surat Permohonan</th>
                            <th>Status</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['peminjaman'] as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['nama_ruangan']; ?></td>
                                <td><?= $row['nama_petugas']; ?></td>
                                <td><?= $row['nama_peminjam']; ?></td>
                                <td><?= $row['tanggal_pinjam']; ?></td>
                                <td><?= $row['surat_permohonan']; ?></td>
                                <td><?= $row['status']; ?></td>
                                <td>
                                    <a href="<?= base_url; ?>/peminjaman/edit/<?= $row['id_peminjaman'] ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url; ?>/peminjaman/hapus/<?= $row['id_peminjaman'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
                <br>
                <a href="<?= base_url; ?>/peminjaman/lihatlaporan" class="btn float-left btn btn-warning" target="_blank"><i class="fas fa-file-alt"></i> Lihat Laporan</a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->