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
                <!-- <h3 class="card-title"><?= $data['title'] ?></h3>  -->
                <a href="<?= base_url; ?>/petugas/tambah" class="btn float-right btn btn-primary"><i class="fas fa-plus"></i> Tambah Petugas</a>
            </div>
            <div class="card-body">
                <form action="<?= base_url; ?>/petugas/cari" method="post">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="" name="key">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                                    <a class="btn btn-outline-danger" href="<?= base_url; ?>/petugas"><i class="fas fa-undo-alt"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr style="text-align: center;">
                            <th style="width: 10px">No</th>
                            <th>ID Petugas</th>
                            <th>Nama Petugas</th>
                            <th>Jabatan</th>
                            <th>No. Telepon</th>
                            <th>Email</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['petugas'] as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['id_petugas']; ?></td>
                                <td><?= $row['nama_petugas']; ?></td>
                                <td><?= $row['jabatan']; ?></td>
                                <td><?= $row['no_telp']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td style="text-align: center;">
                                    <a href="<?= base_url; ?>/petugas/edit/<?= $row['id_petugas'] ?>" class="btn btn-info "><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url; ?>/petugas/hapus/<?= $row['id_petugas'] ?>" class="btn btn-warning" onclick="return confirm('Hapus data?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->