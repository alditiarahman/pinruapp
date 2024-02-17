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
            <form role="form" action="<?= base_url; ?>/pengembalian/updatePengembalian" method="POST">
                <input type="hidden" name="id_pengembalian" value="<?= $data['pengembalian']['id_pengembalian']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_peminjaman">ID Peminjaman</label>
                        <input type="text" class="form-control" id="id_peminjaman" name="id_peminjaman" value="<?= $data['pengembalian']['id_peminjaman']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_ruangan">Nama Ruangan</label>
                        <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" value="<?= $data['pengembalian']['nama_ruangan']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="<?= $data['pengembalian']['nama_petugas']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_peminjam">Nama Peminjam</label>
                        <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $data['pengembalian']['nama_peminjam']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                        <input type="text" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= $data['pengembalian']['tanggal_pinjam']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" value="<?= $data['pengembalian']['tanggal_pengembalian']; ?>">
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
        var selectedOption = document.getElementById("id_peminjaman").options[document.getElementById("id_peminjaman").selectedIndex];
        var namaRuangan = selectedOption.getAttribute("data-ruangan");
        var namaPetugas = selectedOption.getAttribute("data-petugas");
        var namaPeminjam = selectedOption.getAttribute("data-peminjam");
        var tanggalPinjam = selectedOption.getAttribute("data-tanggal");

        document.getElementById("nama_ruangan").value = namaRuangan;
        document.getElementById("nama_petugas").value = namaPetugas;
        document.getElementById("nama_peminjam").value = namaPeminjam;
        document.getElementById("tanggal_pinjam").value = tanggalPinjam;

        document.getElementById("id_peminjaman").disabled = true;
    }
</script>