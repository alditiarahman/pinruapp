<?php

class PembatalanModel
{
    private $table = 'pembatalan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPembatalan()
    {
        $this->db->query('SELECT pembatalan.*, peminjaman.id_peminjaman, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam, peminjaman.tanggal_pinjam 
                            FROM ' . $this->table . ' 
                            JOIN peminjaman ON peminjaman.id_peminjaman = pembatalan.id_peminjaman 
                            JOIN ruangan ON ruangan.id_ruangan = pembatalan.id_ruangan 
                            JOIN petugas ON petugas.id_petugas = pembatalan.id_petugas 
                            JOIN peminjam ON peminjam.id_peminjam = pembatalan.id_peminjam');
        return $this->db->resultSet();
    }

    public function getPeminjamanDataById($id_peminjaman)
    {
        $this->db->query('SELECT peminjaman.*, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam 
                            FROM peminjaman 
                            JOIN ruangan ON ruangan.id_ruangan = peminjaman.id_ruangan 
                            JOIN petugas ON petugas.id_petugas = peminjaman.id_petugas 
                            JOIN peminjam ON peminjam.id_peminjam = peminjaman.id_peminjam 
                            WHERE peminjaman.id_peminjaman = :id_peminjaman');
        $this->db->bind('id_peminjaman', $id_peminjaman);
        return $this->db->single();
    }

    public function getPembatalanById($id)
    {
        $this->db->query('SELECT pembatalan.*, peminjaman.id_peminjaman, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam, peminjaman.tanggal_pinjam 
                            FROM ' . $this->table . ' 
                            JOIN peminjaman ON peminjaman.id_peminjaman = pembatalan.id_peminjaman 
                            JOIN ruangan ON ruangan.id_ruangan = pembatalan.id_ruangan 
                            JOIN petugas ON petugas.id_petugas = pembatalan.id_petugas 
                            JOIN peminjam ON peminjam.id_peminjam = pembatalan.id_peminjam 
                            WHERE pembatalan.id_pembatalan=:id_pembatalan');
        $this->db->bind('id_pembatalan', $id);
        return $this->db->single();
    }

    public function tambahPembatalan($data)
    {
        $peminjaman = $this->getPeminjamanDataById($data['id_peminjaman']);

        $query = "INSERT INTO pembatalan(id_peminjaman, id_ruangan, id_petugas, id_peminjam, tanggal_pinjam, tanggal_pembatalan, waktu_pembatalan, alasan_pembatalan) 
                VALUES (:id_peminjaman, :id_ruangan, :id_petugas, :id_peminjam, :tanggal_pinjam, :tanggal_pembatalan, :waktu_pembatalan, :alasan_pembatalan)";
        $this->db->query($query);
        $this->db->bind('id_peminjaman', $data['id_peminjaman']);
        $this->db->bind('id_ruangan', $peminjaman['id_ruangan']);
        $this->db->bind('id_petugas', $peminjaman['id_petugas']);
        $this->db->bind('id_peminjam', $peminjaman['id_peminjam']);
        $this->db->bind('tanggal_pinjam', $peminjaman['tanggal_pinjam']);
        $this->db->bind('tanggal_pembatalan', $data['tanggal_pembatalan']);
        $this->db->bind('waktu_pembatalan', $data['waktu_pembatalan']);
        $this->db->bind('alasan_pembatalan', $data['alasan_pembatalan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPembatalan($data)
    {
        $query = "UPDATE pembatalan 
                SET alasan_pembatalan=:alasan_pembatalan 
                WHERE id_pembatalan=:id_pembatalan";
        $this->db->query($query);
        $this->db->bind('id_pembatalan', $data['id_pembatalan']);
        $this->db->bind('alasan_pembatalan', $data['alasan_pembatalan']);
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function deletePembatalan($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_pembatalan=:id_pembatalan');
        $this->db->bind('id_pembatalan', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPembatalan($key)
    {
        $this->db->query('SELECT pembatalan.*, peminjaman.tanggal_pinjam, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam 
                            FROM ' . $this->table . ' 
                            JOIN peminjaman ON peminjaman.id_peminjaman = pembatalan.id_peminjaman 
                            JOIN ruangan ON ruangan.id_ruangan = pembatalan.id_ruangan 
                            JOIN petugas ON petugas.id_petugas = pembatalan.id_petugas 
                            JOIN peminjam ON peminjam.id_peminjam = pembatalan.id_peminjam 
                            WHERE petugas.nama_petugas LIKE :key OR peminjam.nama_peminjam LIKE :key');
        $this->db->bind('key', '%' . $key . '%'); // Perbaikan pada bagian ini

        return $this->db->resultSet();
    }
}
