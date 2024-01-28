<?php

class RuanganModel
{
    private $table = 'ruangan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllRuangan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getRuanganById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_ruangan=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahRuangan($data)
    {
        $query = "INSERT INTO ruangan(nama_ruangan, kapasitas, fasilitas) VALUES (:nama_ruangan, :kapasitas, :fasilitas)";
        $this->db->query($query);
        $this->db->bind('nama_ruangan', $data['nama_ruangan']);
        $this->db->bind('kapasitas', $data['kapasitas']);
        $this->db->bind('fasilitas', $data['fasilitas']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataRuangan($data)
    {
        $query = 'UPDATE ruangan SET nama_ruangan=:nama_ruangan, kapasitas=:kapasitas, fasilitas=:fasilitas WHERE id_ruangan=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id_ruangan']);
        $this->db->bind('nama_ruangan', $data['nama_ruangan']);
        $this->db->bind('kapasitas', $data['kapasitas']);
        $this->db->bind('fasilitas', $data['fasilitas']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteRuangan($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_ruangan=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariRuangan()
    {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_ruangan LIKE :key");
        $this->db->bind('key', "%$key%");
        return $this->db->resultSet();
    }
}
