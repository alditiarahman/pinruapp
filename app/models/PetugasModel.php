<?php

class PetugasModel
{
    private $table = 'petugas';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPetugas()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getPetugasById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_petugas=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahPetugas($data)
    {
        $query = "INSERT INTO petugas(id_petugas, nama_petugas, jabatan, no_telp, email) VALUES (:id_petugas, :nama_petugas, :jabatan, :no_telp, :email)";
        $this->db->query($query);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('nama_petugas', $data['nama_petugas']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->bind('email', $data['email']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPetugas($data)
    {
        $query = 'UPDATE petugas SET id_petugas=:id_petugas, nama_petugas=:nama_petugas, jabatan=:jabatan, no_telp=:no_telp, email=:email WHERE id_petugas=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id_petugas']);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('nama_petugas', $data['nama_petugas']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->bind('email', $data['email']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePetugas($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_petugas=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPetugas()
    {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_petugas LIKE :key");
        $this->db->bind('key', "%$key%");
        return $this->db->resultSet();
    }
}
