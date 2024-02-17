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
            <form role="form" action="<?= base_url; ?>/perubahanjadwal/simpanPerubahanJadwal" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_peminjaman">ID Peminjaman</label>
                        <select class="form-control" id="id_peminjaman" name="id_peminjaman" onchange="getPeminjamanData()">
                            <option value="">Pilih</option>
                            <?php foreach ($data['peminjaman'] as $row) : ?>
                                <option value="<?= $row['id_peminjaman']; ?>" data-ruangan="<?= $row['nama_ruangan']; ?>" data-petugas="<?= $row['nama_petugas']; ?>" data-peminjam="<?= $row['nama_peminjam']; ?>" data-tanggal="<?= $row['tanggal_pinjam']; ?>">
                                    <?= $row['id_peminjaman']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_ruangan">Nama Ruangan</label>
                        <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_peminjam">Nama Peminjam</label>
                        <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                        <input type="text" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_perubahan">Tanggal Perubahan</label>
                        <input type="date" class="form-control" id="tanggal_perubahan" name="tanggal_perubahan">
                    </div>
                    <div class="form-group">
                        <label for="alasan_perubahan">Alasan Perubahan</label>
                        <textarea class="form-control" id="alasan_perubahan" name="alasan_perubahan" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="surat_permohonan">Surat Permohonan</label>
                        <input type="file" class="form-control" id="surat_permohonan" name="surat_permohonan">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
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

<script>
    function getPeminjamanData() {
        var idPeminjaman = document.getElementById("id_peminjaman").value;
        var namaRuangan = document.querySelector("option[value='" + idPeminjaman + "']").getAttribute("data-ruangan");
        var namaPetugas = document.querySelector("option[value='" + idPeminjaman + "']").getAttribute("data-petugas");
        var namaPeminjam = document.querySelector("option[value='" + idPeminjaman + "']").getAttribute("data-peminjam");
        var tanggalPinjam = document.querySelector("option[value='" + idPeminjaman + "']").getAttribute("data-tanggal");

        document.getElementById("nama_ruangan").value = namaRuangan;
        document.getElementById("nama_petugas").value = namaPetugas;
        document.getElementById("nama_peminjam").value = namaPeminjam;
        document.getElementById("tanggal_pinjam").value = tanggalPinjam;
    }
</script>