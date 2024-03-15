<?php

class PerubahanJadwal extends Controller
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
        $data['title'] = 'Data Perubahan Jadwal';
        $data['perubahan_jadwal'] = $this->model('PerubahanJadwalModel')->getAllPerubahanJadwal();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('perubahanjadwal/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Perubahan Jadwal';
        $data['perubahan_jadwal'] = $this->model('PerubahanJadwalModel')->cariPerubahanJadwal($_POST['key']);
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('perubahanjadwal/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Perubahan Jadwal';
        $data['peminjaman'] = $this->model('PeminjamanModel')->getAllPeminjaman();
        $data['petugas'] = $this->model('PetugasModel')->getAllPetugas();
        $data['peminjam'] = $this->model('PeminjamModel')->getAllPeminjam();
        $data['perubahan_jadwal'] = $this->model('PerubahanJadwalModel')->getPerubahanJadwalById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('perubahanjadwal/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Perubahan Jadwal';
        $data['peminjaman'] = $this->model('PeminjamanModel')->getAllPeminjaman();
        $data['petugas'] = $this->model('PetugasModel')->getAllPetugas();
        $data['peminjam'] = $this->model('PeminjamModel')->getAllPeminjam();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('perubahanjadwal/create', $data);
        $this->view('templates/footer');
    }

    public function simpanPerubahanJadwal()
    {
        if ($this->model('PerubahanJadwalModel')->tambahPerubahanJadwal($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/perubahanjadwal');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/perubahanjadwal');
            exit;
        }
    }

    public function updatePerubahanJadwal()
    {
        if ($this->model('PerubahanJadwalModel')->updateDataPerubahanJadwal($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/perubahanjadwal');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/perubahanjadwal');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('PerubahanJadwalModel')->deletePerubahanJadwal($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/perubahanjadwal');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/perubahanjadwal');
            exit;
        }
    }

    public function setuju($id)
    {
        if ($this->model('PerubahanJadwalModel')->setujuiPerubahanJadwal($id) > 0) {
            Flasher::setMessage('Berhasil', 'disetujui', 'success');
            header('location:' . base_url . '/perubahanjadwal');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'disetujui', 'danger');
            header('location: ' . base_url . '/perubahanjadwal');
            exit;
        }
    }

    public function tolak($id)
    {
        if ($this->model('PerubahanJadwalModel')->tolakPerubahan($id) > 0) {
            Flasher::setMessage('Berhasil', 'ditolak', 'success');
            header('location:' . base_url . '/perubahanjadwal');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditolak', 'danger');
            header('location: ' . base_url . '/perubahanjadwal');
            exit;
        }
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Perubahan Jadwal';
        $data['perubahan_jadwal'] = $this->model('PerubahanJadwalModel')->getAllPerubahanJadwal();
        $this->view('perubahanjadwal/lihatlaporan', $data);
    }
}
