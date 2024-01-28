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
            <form role="form" action="<?= base_url; ?>/peminjam/updatePeminjam" method="POST">
                <input type="hidden" name="id_peminjam" value="<?= $data['peminjam']['id_peminjam']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Peminjam</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama peminjam..." name="nama_peminjam" value="<?= $data['peminjam']['nama_peminjam']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" placeholder="Masukkan alamat peminjam..." name="alamat" value="<?= $data['peminjam']['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" placeholder="Masukkan nomor telepon peminjam..." name="no_telp" value="<?= $data['peminjam']['no_telp']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Masukkan email peminjam..." name="email" value="<?= $data['peminjam']['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Asal Peminjam</label>
                        <select class="form-control" name="asal_peminjam">
                            <option value="">Pilih</option>
                            <option value="Masyarakat Umum" <?php if ($data['peminjam']['asal_peminjam'] == 'Masyarakat Umum') echo 'selected'; ?>>Masyarakat Umum</option>
                            <option value="Organisasi" <?php if ($data['peminjam']['asal_peminjam'] == 'Organisasi') echo 'selected'; ?>>Organisasi</option>
                            <option value="Forum" <?php if ($data['peminjam']['asal_peminjam'] == 'Forum') echo 'selected'; ?>>Forum</option>
                            <option value="Internal" <?php if ($data['peminjam']['asal_peminjam'] == 'Internal') echo 'selected'; ?>>Internal</option>
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