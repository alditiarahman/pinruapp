<?php

class PengembalianModel
{
    private $table = 'pengembalian';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengembalian()
    {
        $this->db->query('SELECT pengembalian.*, peminjaman.id_peminjaman, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam, peminjaman.tanggal_pinjam 
                            FROM ' . $this->table . ' 
                            JOIN peminjaman ON peminjaman.id_peminjaman = pengembalian.id_peminjaman 
                            JOIN ruangan ON ruangan.id_ruangan = pengembalian.id_ruangan 
                            JOIN petugas ON petugas.id_petugas = pengembalian.id_petugas 
                            JOIN peminjam ON peminjam.id_peminjam = pengembalian.id_peminjam');
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

    public function getPengembalianById($id)
    {
        $this->db->query('SELECT pengembalian.*, peminjaman.id_peminjaman, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam, peminjaman.tanggal_pinjam 
                            FROM ' . $this->table . ' 
                            JOIN peminjaman ON peminjaman.id_peminjaman = pengembalian.id_peminjaman 
                            JOIN ruangan ON ruangan.id_ruangan = pengembalian.id_ruangan 
                            JOIN petugas ON petugas.id_petugas = pengembalian.id_petugas 
                            JOIN peminjam ON peminjam.id_peminjam = pengembalian.id_peminjam 
                            WHERE pengembalian.id_pengembalian=:id_pengembalian');
        $this->db->bind('id_pengembalian', $id);
        return $this->db->single();
    }

    public function tambahPengembalian($data)
    {
        $peminjaman = $this->getPeminjamanDataById($data['id_peminjaman']);

        $query = "INSERT INTO pengembalian(id_peminjaman, id_ruangan, id_petugas, id_peminjam, tanggal_pinjam, tanggal_pengembalian) 
                VALUES (:id_peminjaman, :id_ruangan, :id_petugas, :id_peminjam, :tanggal_pinjam, :tanggal_pengembalian)";
        $this->db->query($query);
        $this->db->bind('id_peminjaman', $data['id_peminjaman']);
        $this->db->bind('id_ruangan', $peminjaman['id_ruangan']);
        $this->db->bind('id_petugas', $peminjaman['id_petugas']);
        $this->db->bind('id_peminjam', $peminjaman['id_peminjam']);
        $this->db->bind('tanggal_pinjam', $peminjaman['tanggal_pinjam']);
        $this->db->bind('tanggal_pengembalian', $data['tanggal_pengembalian']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPengembalian($data)
    {
        $query = "UPDATE pengembalian 
                SET tanggal_pengembalian=:tanggal_pengembalian 
                WHERE id_pengembalian=:id_pengembalian";
        $this->db->query($query);
        $this->db->bind('id_pengembalian', $data['id_pengembalian']);
        $this->db->bind('tanggal_pengembalian', $data['tanggal_pengembalian']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePengembalian($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_pengembalian=:id_pengembalian');
        $this->db->bind('id_pengembalian', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPengembalian($key)
    {
        $this->db->query('SELECT pengembalian.*, peminjaman.id_peminjaman, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam, peminjaman.tanggal_pinjam 
                            FROM ' . $this->table . ' 
                            JOIN peminjaman ON peminjaman.id_peminjaman = pengembalian.id_peminjaman 
                            JOIN ruangan ON ruangan.id_ruangan = pengembalian.id_ruangan 
                            JOIN petugas ON petugas.id_petugas = pengembalian.id_petugas 
                            JOIN peminjam ON peminjam.id_peminjam = pengembalian.id_peminjam 
                            WHERE petugas.nama_petugas LIKE :key OR peminjam.nama_peminjam LIKE :key');
        $this->db->bind('key', '%' . $key . '%'); // Perbaikan pada bagian ini

        return $this->db->resultSet();
    }
}
