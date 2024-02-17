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
            <form role="form" action="<?= base_url; ?>/peminjaman/updatePeminjaman" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_peminjaman" value="<?= $data['peminjaman']['id_peminjaman']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Ruangan</label>
                        <select class="form-control" name="id_ruangan">
                            <option value="">Pilih</option>
                            <?php foreach ($data['ruangan'] as $row) : ?>
                                <option value="<?= $row['id_ruangan']; ?>" <?php if ($data['peminjaman']['id_ruangan'] == $row['id_ruangan']) {
                                                                                echo "selected";
                                                                            } ?>>
                                    <?= $row['nama_ruangan']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Petugas</label>
                        <select class="form-control" name="id_petugas">
                            <option value="">Pilih</option>
                            <?php foreach ($data['petugas'] as $row) : ?>
                                <option value="<?= $row['id_petugas']; ?>" <?php if ($data['peminjaman']['id_petugas'] == $row['id_petugas']) {
                                                                                echo "selected";
                                                                            } ?>>
                                    <?= $row['nama_petugas']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Peminjam</label>
                        <select class="form-control" name="id_peminjam">
                            <option value="">Pilih</option>
                            <?php foreach ($data['peminjam'] as $row) : ?>
                                <option value="<?= $row['id_peminjam']; ?>" <?php if ($data['peminjaman']['id_peminjam'] == $row['id_peminjam']) {
                                                                                echo "selected";
                                                                            } ?>>
                                    <?= $row['nama_peminjam']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Tanggal Pinjam diganti menjadi tanggal_peminjaman -->
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tanggal_pinjam" value="<?= $data['peminjaman']['tanggal_pinjam']; ?>">
                    </div>
                    <!-- Menghapus nilai value dari input file -->
                    <div class="form-group">
                        <label>Surat Permohonan</label>
                        <input type="file" class="form-control" id="surat_permohonan" name="surat_permohonan" value="<?= $data['peminjaman']['surat_permohonan']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="Menunggu" <?php if ($data['peminjaman']['status'] == 'Menunggu') {
                                                            echo "selected";
                                                        } ?>>Menunggu</option>
                            <option value="Disetujui" <?php if ($data['peminjaman']['status'] == 'Disetujui') {
                                                            echo "selected";
                                                        } ?>>Disetujui</option>
                            <option value="Ditolak" <?php if ($data['peminjaman']['status'] == 'Ditolak') {
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