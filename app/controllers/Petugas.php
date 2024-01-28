<?php

class Petugas extends Controller
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
        $data['title'] = 'Data Petugas';
        $data['petugas'] = $this->model('PetugasModel')->getAllPetugas();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('petugas/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Petugas';
        $data['petugas'] = $this->model('PetugasModel')->cariPetugas();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('petugas/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Petugas';
        $data['petugas'] = $this->model('PetugasModel')->getPetugasById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('petugas/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Petugas';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('petugas/create', $data);
        $this->view('templates/footer');
    }

    public function simpanPetugas()
    {
        if ($this->model('PetugasModel')->tambahPetugas($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/petugas');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/petugas');
            exit;
        }
    }

    public function updatePetugas()
    {
        if ($this->model('PetugasModel')->updateDataPetugas($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/petugas');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/petugas');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('PetugasModel')->deletePetugas($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/petugas');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/petugas');
            exit;
        }
    }
}
