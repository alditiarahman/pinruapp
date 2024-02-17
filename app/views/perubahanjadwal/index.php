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
                <div class="btn-group float-right">
                    <a href="<?= base_url; ?>/perubahanjadwal/tambah" class="btn float-right btn btn-primary"><i class="fas fa-plus"></i> Tambah Perubahan Jadwal</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url; ?>/perubahanjadwal/cari" method="post">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="" name="key">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                                    <a class="btn btn-outline-danger" href="<?= base_url; ?>/perubahanjadwal"><i class="fas fa-undo-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr style="text-align: center;">
                            <th style="width: 10px">No</th>
                            <th>Ruangan</th>
                            <th>Petugas</th>
                            <th>Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Perubahan</th>
                            <th>Alasan Perubahan</th>
                            <th>Surat Permohonan</th>
                            <th>Status</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['perubahan_jadwal'] as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['nama_ruangan']; ?></td>
                                <td><?= $row['nama_petugas']; ?></td>
                                <td><?= $row['nama_peminjam']; ?></td>
                                <td><?= $row['tanggal_pinjam']; ?></td>
                                <td><?= $row['tanggal_perubahan']; ?></td>
                                <td><?= $row['alasan_perubahan']; ?></td>
                                <td style="text-align: center;">
                                    <a href="<?= $row['surat_permohonan'] ?>" target="_blank" class="btn btn-outline-dark" role="button"><i class="fas fa-eye"></i></a>
                                </td>
                                <td><?= $row['status']; ?></td>
                                <td style="text-align: center;">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="<?= base_url; ?>/perubahanjadwal/edit/<?= $row['id_perubahan'] ?>" class="btn btn-info" role="button"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url; ?>/perubahanjadwal/hapus/<?= $row['id_perubahan'] ?>" class="btn btn-warning" role="button" onclick="return confirm('Hapus data?');"><i class="fas fa-trash"></i></a>
                                        <?php if ($row['status'] === 'Menunggu') : ?>
                                            <?php // Tombol "lihatlaporan" disembunyikan jika status adalah 'Menunggu' 
                                            ?>
                                        <?php else : ?>
                                            <a href="<?= base_url; ?>/perubahanjadwal/lihatlaporan" class="btn float-left btn btn-success" target="_blank"><i class="fas fa-download"></i></a>
                                        <?php endif; ?>
                                        <?php if ($row['status'] === 'Menunggu') : ?>
                                            <a href="<?= base_url; ?>/perubahanjadwal/setuju/<?= $row['id_perubahan'] ?>" class="btn btn-success" role="button" onclick="return confirm('Permohonan Disetujui?');"><i class="fas fa-check"></i></a>
                                            <a href="<?= base_url; ?>/perubahanjadwal/tolak/<?= $row['id_perubahan'] ?>" class="btn btn-danger" role="button" onclick="return confirm('Permohonan Ditolak?');"><i class="fas fa-times"></i></a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
                <br>
                <a href="<?= base_url; ?>/perubahanjadwal/lihatlaporan" class="btn float-left btn btn-warning" target="_blank"><i class="fas fa-file-alt"></i> Lihat Laporan</a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->