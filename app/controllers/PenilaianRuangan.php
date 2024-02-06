<?php

class PenilaianRuangan extends Controller
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
        $data['title'] = 'Data Penilaian Ruangan';
        $data['penilaian_ruangan'] = $this->model('PenilaianRuanganModel')->getAllPenilaianRuangan();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('penilaianruangan/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Penilaian Ruangan';
        $data['penilaian_ruangan'] = $this->model('PenilaianRuanganModel')->cariPenilaianRuangan($_POST['key']);
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('penilaianruangan/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Penilaian Ruangan';
        $data['ruangan'] = $this->model('RuanganModel')->getAllRuangan();
        $data['peminjam'] = $this->model('PeminjamModel')->getAllPeminjam();
        $data['penilaian_ruangan'] = $this->model('PenilaianRuanganModel')->getPenilaianRuanganById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('penilaianruangan/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Penilaian Ruangan';
        $data['ruangan'] = $this->model('RuanganModel')->getAllRuangan();
        $data['peminjam'] = $this->model('PeminjamModel')->getAllPeminjam();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('penilaianruangan/create', $data);
        $this->view('templates/footer');
    }

    public function simpanPenilaianRuangan()
    {
        if ($this->model('PenilaianRuanganModel')->tambahPenilaianRuangan($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/penilaianruangan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/penilaianruangan');
            exit;
        }
    }

    public function updatePenilaianRuangan()
    {
        if ($this->model('PenilaianRuanganModel')->updateDataPenilaianRuangan($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/penilaianruangan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/penilaianruangan');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('PenilaianRuanganModel')->deletePenilaianRuangan($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/penilaianruangan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/penilaianruangan');
            exit;
        }
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Penilaian Ruangan';
        $data['penilaian_ruangan'] = $this->model('PenilaianRuanganModel')->getAllPenilaianRuangan();
        $this->view('penilaianruangan/lihatlaporan', $data);
    }
}
