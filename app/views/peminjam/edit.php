<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Peminjam</h1>
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
                        <input type="text" class="form-control" placeholder="Masukkan nama peminjam" name="nama_peminjam" value="<?= $data['peminjam']['nama_peminjam']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" placeholder="Masukkan jabatan peminjam" name="jabatan" value="<?= $data['peminjam']['jabatan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Instansi</label>
                        <input type="text" class="form-control" placeholder="Masukkan asal instansi peminjam" name="instansi" value="<?= $data['peminjam']['instansi']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" placeholder="Masukkan alamat peminjam" name="alamat" value="<?= $data['peminjam']['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nomor KTP / SIM</label>
                        <input type="text" class="form-control" placeholder="Masukkan nomor identitas peminjam" name="no_identitas" value="<?= $data['peminjam']['no_identitas']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" placeholder="Masukkan nomor telepon peminjam" name="no_telp" value="<?= $data['peminjam']['no_telp']; ?>">
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