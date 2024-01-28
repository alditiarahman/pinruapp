<?php

class Pembatalan extends Controller
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
        $data['title'] = 'Data Pembatalan';
        $data['pembatalan'] = $this->model('PembatalanModel')->getAllPembatalan();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pembatalan/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Pembatalan';
        $data['pembatalan'] = $this->model('PembatalanModel')->cariPembatalan($_POST['key']);
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pembatalan/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Pembatalan';
        $data['peminjaman'] = $this->model('PeminjamanModel')->getAllPeminjaman();
        $data['petugas'] = $this->model('PetugasModel')->getAllPetugas();
        $data['peminjam'] = $this->model('PeminjamModel')->getAllPeminjam();
        $data['pembatalan'] = $this->model('PembatalanModel')->getPembatalanById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pembatalan/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Pembatalan';
        $data['peminjaman'] = $this->model('PeminjamanModel')->getAllPeminjaman();
        $data['petugas'] = $this->model('PetugasModel')->getAllPetugas();
        $data['peminjam'] = $this->model('PeminjamModel')->getAllPeminjam();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pembatalan/create', $data);
        $this->view('templates/footer');
    }

    public function simpanPembatalan()
    {
        if ($this->model('PembatalanModel')->tambahPembatalan($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/pembatalan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/pembatalan');
            exit;
        }
    }

    public function updatePembatalan()
    {
        if ($this->model('PembatalanModel')->updateDataPembatalan($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/pembatalan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/pembatalan');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('PembatalanModel')->deletePembatalan($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/pembatalan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/pembatalan');
            exit;
        }
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Pembatalan';
        $data['pembatalan'] = $this->model('PembatalanModel')->getAllPembatalan();
        $this->view('pembatalan/lihatlaporan', $data);
    }
}
