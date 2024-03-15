<?php

class Peminjaman extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
            header('location: ' . base_url . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Data Peminjaman';
        $data['peminjaman'] = $this->model('PeminjamanModel')->getAllPeminjaman();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('peminjaman/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Peminjaman';
        $data['peminjaman'] = $this->model('PeminjamanModel')->cariPeminjaman($_POST['key']);
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('peminjaman/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Peminjaman';
        $data['ruangan'] = $this->model('RuanganModel')->getAllRuangan();
        $data['petugas'] = $this->model('PetugasModel')->getAllPetugas();
        $data['peminjam'] = $this->model('PeminjamModel')->getAllPeminjam();
        $data['peminjaman'] = $this->model('PeminjamanModel')->getPeminjamanById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('peminjaman/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Peminjaman';
        $data['ruangan'] = $this->model('RuanganModel')->getAllRuangan();
        $data['petugas'] = $this->model('PetugasModel')->getAllPetugas();
        $data['peminjam'] = $this->model('PeminjamModel')->getAllPeminjam();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('peminjaman/create', $data);
        $this->view('templates/footer');
    }

    public function simpanPeminjaman()
    {
        if ($this->model('PeminjamanModel')->tambahPeminjaman($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/peminjaman');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/peminjaman');
            exit;
        }
    }

    public function updatePeminjaman()
    {
        if ($this->model('PeminjamanModel')->updateDataPeminjaman($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/peminjaman');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/peminjaman');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('PeminjamanModel')->deletePeminjaman($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/peminjaman');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/peminjaman');
            exit;
        }
    }

    public function setuju($id)
    {
        if ($this->model('PeminjamanModel')->setujuiPeminjaman($id) > 0) {
            Flasher::setMessage('Berhasil', 'disetujui', 'success');
            header('location:' . base_url . '/peminjaman');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'disetujui', 'danger');
            header('location: ' . base_url . '/peminjaman');
            exit;
        }
    }

    public function tolak($id)
    {
        if ($this->model('PeminjamanModel')->tolakPeminjaman($id) > 0) {
            Flasher::setMessage('Berhasil', 'ditolak', 'success');
            header('location:' . base_url . '/peminjaman');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditolak', 'danger');
            header('location: ' . base_url . '/peminjaman');
            exit;
        }
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Peminjaman';
        $data['peminjaman'] = $this->model('PeminjamanModel')->getAllPeminjaman();
        $this->view('peminjaman/lihatlaporan', $data);
    }
}
