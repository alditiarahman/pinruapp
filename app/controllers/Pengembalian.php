<?php

class Pengembalian extends Controller
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
        $data['title'] = 'Data Pengembalian';
        $data['pengembalian'] = $this->model('PengembalianModel')->getAllPengembalian();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pengembalian/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Pengembalian';
        $data['pengembalian'] = $this->model('PengembalianModel')->cariPengembalian($_POST['key']);
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pengembalian/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Pengembalian';
        $data['pengembalian'] = $this->model('PengembalianModel')->getPengembalianById($id);
        $data['peminjaman'] = $this->model('PeminjamanModel')->getAllPeminjaman();
        $data['ruangan'] = $this->model('RuanganModel')->getAllRuangan();
        $data['petugas'] = $this->model('PetugasModel')->getAllPetugas();
        $data['peminjam'] = $this->model('PeminjamModel')->getAllPeminjam();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pengembalian/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Pengembalian';
        $data['peminjaman'] = $this->model('PeminjamanModel')->getAllPeminjaman();
        $data['ruangan'] = $this->model('RuanganModel')->getAllRuangan();
        $data['petugas'] = $this->model('PetugasModel')->getAllPetugas();
        $data['peminjam'] = $this->model('PeminjamModel')->getAllPeminjam();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pengembalian/create', $data);
        $this->view('templates/footer');
    }

    public function simpanPengembalian()
    {
        if ($this->model('PengembalianModel')->tambahPengembalian($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/pengembalian');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/pengembalian');
            exit;
        }
    }

    public function updatePengembalian()
    {
        if ($this->model('PengembalianModel')->updateDataPengembalian($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/pengembalian');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/pengembalian');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('PengembalianModel')->deletePengembalian($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/pengembalian');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/pengembalian');
            exit;
        }
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Pengembalian';
        $data['pengembalian'] = $this->model('PengembalianModel')->getAllPengembalian();
        $this->view('pengembalian/lihatlaporan', $data);
    }
}
