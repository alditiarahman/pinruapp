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
            <form role="form" action="<?= base_url; ?>/pembatalan/updatePembatalan" method="POST">
                <input type="hidden" name="id_pembatalan" value="<?= $data['pembatalan']['id_pembatalan']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>ID Peminjaman</label>
                        <select class="form-control" name="id_peminjaman">
                            <option value="">Pilih</option>
                            <?php foreach ($data['peminjaman'] as $row) : ?>
                                <option value="<?= $row['id_peminjaman']; ?>" <?php if ($data['pembatalan']['id_peminjaman'] == $row['id_peminjaman']) {
                                                                                    echo "selected";
                                                                                } ?>>
                                    <?= $row['id_peminjaman']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Petugas</label>
                        <select class="form-control" name="id_petugas">
                            <option value="">Pilih</option>
                            <?php foreach ($data['petugas'] as $row) : ?>
                                <option value="<?= $row['id_petugas']; ?>" <?php if ($data['pembatalan']['id_petugas'] == $row['id_petugas']) {
                                                                                echo "selected";
                                                                            } ?>>
                                    <?= $row['nama_petugas']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Peminjam</label>
                        <select class="form-control" name="id_peminjam">
                            <option value="">Pilih</option>
                            <?php foreach ($data['peminjam'] as $row) : ?>
                                <option value="<?= $row['id_peminjam']; ?>" <?php if ($data['pembatalan']['id_peminjam'] == $row['id_peminjam']) {
                                                                                echo "selected";
                                                                            } ?>>
                                    <?= $row['nama_peminjam']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pembatalan</label>
                        <input type="date" class="form-control" name="tanggal_pembatalan" value="<?= $data['pembatalan']['tanggal_pembatalan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Waktu Pembatalan</label>
                        <input type="time" class="form-control" name="waktu_pembatalan" value="<?= $data['pembatalan']['waktu_pembatalan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alasan Pembatalan</label>
                        <textarea class="form-control" name="alasan_pembatalan" rows="4"><?= $data['pembatalan']['alasan_pembatalan']; ?></textarea>
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