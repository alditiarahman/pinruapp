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
                <!-- <h3 class="card-title"><?= $data['title'] ?></h3> -->
                <a href="<?= base_url; ?>/ruangan/tambah" class="btn float-right btn btn-primary"><i class="fas fa-plus"></i> Tambah Ruangan</a>
            </div>
            <div class="card-body">
                <form action="<?= base_url; ?>/ruangan/cari" method="post">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="" name="key">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                                    <a class="btn btn-outline-danger" href="<?= base_url; ?>/ruangan"><i class="fas fa-undo-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr style="text-align: center;">
                            <th style="width: 10px">No</th>
                            <th>Nama Ruangan</th>
                            <th>Kapasitas</th>
                            <th>Fasilitas</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['ruangan'] as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['nama_ruangan']; ?></td>
                                <td><?= $row['kapasitas']; ?></td>
                                <td><?= $row['fasilitas']; ?></td>
                                <td style="text-align: center;">
                                    <a href="<?= base_url; ?>/ruangan/edit/<?= $row['id_ruangan'] ?>" class="btn btn-info "><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url; ?>/ruangan/hapus/<?= $row['id_ruangan'] ?>" class="btn btn-warning" onclick="return confirm('Hapus data?');"><i class="fas fa-trash"></i></a>
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