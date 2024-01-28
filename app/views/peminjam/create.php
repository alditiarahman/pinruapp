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
            <form role="form" action="<?= base_url; ?>/peminjam/simpanPeminjam" method="POST" enctype="multipart/form-data>
                <div class=" card-body">
                <div class="form-group">
                    <label>Nama Peminjam</label>
                    <input type="text" class="form-control" placeholder="Masukkan nama peminjam..." name="nama_peminjam">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" placeholder="Masukkan alamat peminjam..." name="alamat">
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" class="form-control" placeholder="Masukkan nomor telepon peminjam..." name="no_telp">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Masukkan email peminjam..." name="email">
                </div>
                <div class="form-group">
                    <label>Asal Peminjam</label>
                    <select class="form-control" name="asal_peminjam">
                        <option value="">Pilih</option>
                        <option value="Masyarakat Umum">Masyarakat Umum</option>
                        <option value="Organisasi">Organisasi</option>
                        <option value="Forum">Forum</option>
                        <option value="Internal">Internal</option>
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