<?php

class Peminjam extends Controller
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
        $data['title'] = 'Data Peminjam';
        $data['peminjam'] = $this->model('PeminjamModel')->getAllPeminjam();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('peminjam/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Peminjam';
        $data['peminjam'] = $this->model('PeminjamModel')->cariPeminjam();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('peminjam/index', $data);
        $this->view('templates/footer');
    }


    public function edit($id)
    {
        $data['title'] = 'Detail Peminjam';
        $data['peminjam'] = $this->model('PeminjamModel')->getPeminjamById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('peminjam/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Peminjam';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('peminjam/create', $data);
        $this->view('templates/footer');
    }

    public function simpanPeminjam()
    {
        if ($this->model('PeminjamModel')->tambahPeminjam($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/peminjam');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/peminjam');
            exit;
        }
    }

    public function updatePeminjam()
    {
        if ($this->model('PeminjamModel')->updateDataPeminjam($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/peminjam');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/peminjam');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('PeminjamModel')->deletePeminjam($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/peminjam');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/peminjam');
            exit;
        }
    }
}
