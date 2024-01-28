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
            <form role="form" action="<?= base_url; ?>/peminjaman/simpanPeminjaman" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label>Ruangan</label>
                        <select class="form-control" name="id_ruangan">
                            <option value="">Pilih</option>
                            <?php foreach ($data['ruangan'] as $row) : ?>
                                <option value="<?= $row['id_ruangan']; ?>"><?= $row['nama_ruangan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Petugas</label>
                        <select class="form-control" name="id_petugas">
                            <option value="">Pilih</option>
                            <?php foreach ($data['petugas'] as $row) : ?>
                                <option value="<?= $row['id_petugas']; ?>"><?= $row['nama_petugas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Peminjam</label>
                        <select class="form-control" name="id_peminjam">
                            <option value="">Pilih</option>
                            <?php foreach ($data['peminjam'] as $row) : ?>
                                <option value="<?= $row['id_peminjam']; ?>"><?= $row['nama_peminjam']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tanggal_pinjam">
                    </div>
                    <div class="form-group">
                        <label>Surat Permohonan</label>
                        <input type="file" class="form-control" name="surat_permohonan">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="Menunggu">Menunggu</option>
                            <option value="Disetujui">Disetujui</option>
                            <option value="Ditolak">Ditolak</option>
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