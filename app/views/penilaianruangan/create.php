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
            <form role="form" action="<?= base_url; ?>/penilaianruangan/simpanPenilaianRuangan" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Ruangan</label>
                        <select class="form-control" name="id_ruangan">
                            <option value="">Pilih</option>
                            <?php foreach ($data['ruangan'] as $row) : ?>
                                <option value="<?= $row['id_ruangan']; ?>"><?= $row['nama_ruangan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Peminjam</label>
                        <select class="form-control" name="id_peminjam">
                            <option value="">Pilih</option>
                            <?php foreach ($data['peminjam'] as $row) : ?>
                                <option value="<?= $row['id_peminjam']; ?>"><?= $row['nama_peminjam']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kebersihan</label>
                        <select class="form-control" name="kebersihan">
                            <option value="">Pilih</option>
                            <option value="Bersih">Bersih</option>
                            <option value="Cukup Bersih">Cukup Bersih</option>
                            <option value="Kurang Bersih">Kurang Bersih</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kondisi Fasilitas</label>
                        <input type="text" class="form-control" placeholder="Masukkan kondisi fasilitas ruangan" name="kondisi_fasilitas">
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