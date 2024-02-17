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
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/perubahanjadwal/updatePerubahanJadwal" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_perubahan" value="<?= $data['perubahan_jadwal']['id_perubahan']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_ruangan">ID Peminjaman</label>
                        <input type="text" class="form-control" id="id_peminjaman" name="id_peminjaman" value="<?= $data['perubahan_jadwal']['id_peminjaman']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_ruangan">Nama Ruangan</label>
                        <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" value="<?= $data['perubahan_jadwal']['nama_ruangan']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="<?= $data['perubahan_jadwal']['nama_petugas']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_peminjam">Nama Peminjam</label>
                        <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $data['perubahan_jadwal']['nama_peminjam']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                        <input type="text" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= $data['perubahan_jadwal']['tanggal_pinjam']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pembatalan">Tanggal Perubahan</label>
                        <input type="date" class="form-control" id="tanggal_perubahan" name="tanggal_perubahan" value="<?= $data['perubahan_jadwal']['tanggal_perubahan']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="alasan_pembatalan">Alasan Perubahan</label>
                        <textarea class="form-control" id="alasan_perubahan" name="alasan_perubahan" rows="3"><?= $data['perubahan_jadwal']['alasan_perubahan']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Menunggu" <?php if ($data['perubahan_jadwal']['status'] == 'Menunggu') {
                                                            echo "selected";
                                                        } ?>>Menunggu</option>
                            <option value="Disetujui" <?php if ($data['perubahan_jadwal']['status'] == 'Disetujui') {
                                                            echo "selected";
                                                        } ?>>Disetujui</option>
                            <option value="Ditolak" <?php if ($data['perubahan_jadwal']['status'] == 'Ditolak') {
                                                        echo "selected";
                                                    } ?>>Ditolak</option>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->