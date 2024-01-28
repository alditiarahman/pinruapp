<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Petugas</h1>
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
            <form role="form" action="<?= base_url; ?>/petugas/updatePetugas" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_petugas" value="<?= $data['petugas']['id_petugas']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>ID Petugas</label>
                        <input readonly type="text" class="form-control" placeholder="Masukkan id petugas..." name="id_petugas" value="<?= $data['petugas']['id_petugas']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Petugas</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama petugas..." name="nama_petugas" value="<?= $data['petugas']['nama_petugas']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" placeholder="Masukkan jabatan petugas..." name="jabatan" value="<?= $data['petugas']['jabatan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" class="form-control" placeholder="Masukkan nomor telepon petugas..." name="no_telp" value="<?= $data['petugas']['no_telp']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Masukkan email petugas..." name="email" value="<?= $data['petugas']['email']; ?>">
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