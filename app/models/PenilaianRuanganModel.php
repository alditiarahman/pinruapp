<?php

class PenilaianRuanganModel
{
    private $table = 'penilaian_ruangan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPenilaianRuangan()
    {
        $this->db->query('SELECT penilaian_ruangan.*, ruangan.nama_ruangan, peminjam.nama_peminjam 
                          FROM ' . $this->table . ' 
                          JOIN ruangan ON ruangan.id_ruangan = penilaian_ruangan.id_ruangan 
                          JOIN peminjam ON peminjam.id_peminjam = penilaian_ruangan.id_peminjam');
        return $this->db->resultSet();
    }

    public function getPenilaianRuanganById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_penilaian=:id_penilaian');
        $this->db->bind('id_penilaian', $id);
        return $this->db->single();
    }

    public function tambahPenilaianRuangan($data)
    {
        $query = "INSERT INTO penilaian_ruangan(id_ruangan, id_peminjam, kebersihan, kondisi_fasilitas) 
                VALUES (:id_ruangan, :id_peminjam, :kebersihan, :kondisi_fasilitas)";
        $this->db->query($query);
        $this->db->bind('id_ruangan', $data['id_ruangan']);
        $this->db->bind('id_peminjam', $data['id_peminjam']);
        $this->db->bind('kebersihan', $data['kebersihan']);
        $this->db->bind('kondisi_fasilitas', $data['kondisi_fasilitas']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPenilaianRuangan($data)
    {
        $query = "UPDATE penilaian_ruangan 
                    SET id_ruangan=:id_ruangan, id_peminjam=:id_peminjam, 
                        kebersihan=:kebersihan, kondisi_fasilitas=:kondisi_fasilitas 
                    WHERE id_penilaian=:id_penilaian";
        $this->db->query($query);
        $this->db->bind('id_penilaian', $data['id_penilaian']);
        $this->db->bind('id_ruangan', $data['id_ruangan']);
        $this->db->bind('id_peminjam', $data['id_peminjam']);
        $this->db->bind('kebersihan', $data['kebersihan']);
        $this->db->bind('kondisi_fasilitas', $data['kondisi_fasilitas']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePenilaianRuangan($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_penilaian=:id_penilaian');
        $this->db->bind('id_penilaian', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPenilaianRuangan($key)
    {
        $this->db->query('SELECT penilaian_ruangan.*, ruangan.nama_ruangan, peminjam.nama_peminjam 
                          FROM ' . $this->table . ' 
                          JOIN ruangan ON ruangan.id_ruangan = penilaian_ruangan.id_ruangan 
                          JOIN peminjam ON peminjam.id_peminjam = penilaian_ruangan.id_peminjam 
                    WHERE peminjam.nama_peminjam LIKE :key');
        $this->db->bind('key', '%' . $key . '%'); // Perbaikan pada bagian ini

        return $this->db->resultSet();
    }
}
