<?php

class PeminjamModel
{
    private $table = 'peminjam';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPeminjam()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPeminjamById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_peminjam=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahPeminjam($data)
    {
        $query = "INSERT INTO peminjam(nama_peminjam, jabatan, instansi, alamat, no_identitas, no_telp) 
                    VALUES (:nama_peminjam, :jabatan, :instansi, :alamat, :no_identitas, :no_telp)";
        $this->db->query($query);
        $this->db->bind('nama_peminjam', $data['nama_peminjam']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('instansi', $data['instansi']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_identitas', $data['no_identitas']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPeminjam($data)
    {
        $query = "UPDATE peminjam SET nama_peminjam=:nama_peminjam, jabatan=:jabatan, instansi=:instansi, alamat=:alamat, no_identitas=:no_identitas, no_telp=:no_telp 
                    WHERE id_peminjam=:id_peminjam";
        $this->db->query($query);
        $this->db->bind('id_peminjam', $data['id_peminjam']);
        $this->db->bind('nama_peminjam', $data['nama_peminjam']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('instansi', $data['instansi']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_identitas', $data['no_identitas']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePeminjam($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_peminjam=:id_peminjam');
        $this->db->bind('id_peminjam', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPeminjam()
    {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_peminjam LIKE :key");
        $this->db->bind('key', "%$key%");
        return $this->db->resultSet();
    }
}
