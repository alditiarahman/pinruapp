<?php

class PerubahanJadwalModel
{
    private $table = 'perubahan_jadwal';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPerubahanJadwal()
    {
        $this->db->query('SELECT perubahan_jadwal.*, peminjaman.id_peminjaman, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam, peminjaman.tanggal_pinjam 
                            FROM ' . $this->table . ' 
                            JOIN peminjaman ON peminjaman.id_peminjaman = perubahan_jadwal.id_peminjaman 
                            JOIN ruangan ON ruangan.id_ruangan = perubahan_jadwal.id_ruangan 
                            JOIN petugas ON petugas.id_petugas = perubahan_jadwal.id_petugas 
                            JOIN peminjam ON peminjam.id_peminjam = perubahan_jadwal.id_peminjam');
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

    public function getPerubahanJadwalById($id)
    {
        $this->db->query('SELECT perubahan_jadwal.*, peminjaman.id_peminjaman, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam, peminjaman.tanggal_pinjam 
                            FROM ' . $this->table . ' 
                            JOIN peminjaman ON peminjaman.id_peminjaman = perubahan_jadwal.id_peminjaman 
                            JOIN ruangan ON ruangan.id_ruangan = perubahan_jadwal.id_ruangan 
                            JOIN petugas ON petugas.id_petugas = perubahan_jadwal.id_petugas 
                            JOIN peminjam ON peminjam.id_peminjam = perubahan_jadwal.id_peminjam 
                            WHERE perubahan_jadwal.id_perubahan=:id_perubahan');
        $this->db->bind('id_perubahan', $id);
        return $this->db->single();
    }

    public function tambahPerubahanJadwal($data)
    {
        // Check if the proposed change date already exists in perubahan_jadwal table
        $query = "SELECT COUNT(*) AS count FROM perubahan_jadwal WHERE tanggal_perubahan = :tanggal_perubahan";
        $this->db->query($query);
        $this->db->bind('tanggal_perubahan', $data['tanggal_perubahan']);
        $result_perubahan = $this->db->single();

        // Check if the proposed change date already exists in peminjaman table
        $query = "SELECT COUNT(*) AS count FROM peminjaman WHERE tanggal_pinjam = :tanggal_perubahan";
        $this->db->query($query);
        $this->db->bind('tanggal_perubahan', $data['tanggal_perubahan']);
        $result_peminjaman = $this->db->single();

        if ($result_perubahan['count'] > 0 || $result_peminjaman['count'] > 0) {
            // If the proposed change date already exists in either perubahan_jadwal or peminjaman table, return an error
            return -1; // Or you can throw an exception here
        } else {
            $peminjaman = $this->getPeminjamanDataById($data['id_peminjaman']);

            $query = "INSERT INTO perubahan_jadwal (id_peminjaman, id_ruangan, id_petugas, id_peminjam, tanggal_pinjam, tanggal_perubahan, alasan_perubahan, surat_permohonan, status) 
                    VALUES (:id_peminjaman, :id_ruangan, :id_petugas, :id_peminjam, :tanggal_pinjam, :tanggal_perubahan, :alasan_perubahan, :surat_permohonan, :status)";
            $this->db->query($query);
            $this->db->bind('id_peminjaman', $data['id_peminjaman']);
            $this->db->bind('id_ruangan', $peminjaman['id_ruangan']);
            $this->db->bind('id_petugas', $peminjaman['id_petugas']);
            $this->db->bind('id_peminjam', $peminjaman['id_peminjam']);
            $this->db->bind('tanggal_pinjam', $peminjaman['tanggal_pinjam']); // Menggunakan tanggal_pinjam dari peminjaman
            $this->db->bind('tanggal_perubahan', $data['tanggal_perubahan']);
            $this->db->bind('alasan_perubahan', $data['alasan_perubahan']);
            // Handle file upload
            $file = $_FILES['surat_permohonan'];
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileError = $file['error'];
            $fileSize = $file['size'];

            if ($fileError === UPLOAD_ERR_OK) {
                $fileDestination = 'uploads/' . $fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $this->db->bind('surat_permohonan', $fileDestination);
            } else {
                $this->db->bind('surat_permohonan', '');
            }
            // $this->db->bind('surat_permohonan', $data['surat_permohonan']); // tambahkan binding untuk surat_permohonan
            $this->db->bind('status', $data['status']);
            $this->db->execute();

            return $this->db->rowCount();
        }
    }


    public function updateDataPerubahanJadwal($data)
    {
        // Check if there is already a booking with the same date
        $query = "SELECT COUNT(*) AS count FROM perubahan_jadwal WHERE id_perubahan != :id_perubahan AND tanggal_perubahan = :tanggal_perubahan";
        $this->db->query($query);
        $this->db->bind('id_perubahan', $data['id_perubahan']);
        $this->db->bind('tanggal_perubahan', $data['tanggal_perubahan']);
        $result = $this->db->single();

        if ($result['count'] > 0) {
            // If there is already a booking with the same date, return an error
            return -1; // Or you can throw an exception here
        }

        // Update data without handling file upload
        $query = "UPDATE perubahan_jadwal 
        SET tanggal_perubahan=:tanggal_perubahan, alasan_perubahan=:alasan_perubahan, status=:status 
        WHERE id_perubahan=:id_perubahan";
        $this->db->query($query);
        $this->db->bind('tanggal_perubahan', $data['tanggal_perubahan']);
        $this->db->bind('alasan_perubahan', $data['alasan_perubahan']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('id_perubahan', $data['id_perubahan']);
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function deletePerubahanJadwal($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_perubahan=:id_perubahan');
        $this->db->bind('id_perubahan', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function setujuiPerubahanJadwal($id)
    {
        $this->db->query('UPDATE ' . $this->table . ' SET status=\'Disetujui\' WHERE id_perubahan=:id_perubahan');
        $this->db->bind('id_perubahan', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tolakPerubahanJadwal($id)
    {
        $this->db->query('UPDATE ' . $this->table . ' SET status=\'Ditolak\' WHERE id_perubahan=:id_perubahan');
        $this->db->bind('id_perubahan', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPerubahanJadwal($key)
    {
        $this->db->query('SELECT perubahan_jadwal.*, peminjaman.*, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam 
                    FROM ' . $this->table . ' 
                    JOIN peminjaman ON peminjaman.id_peminjaman = perubahan_jadwal.id_peminjaman
                    JOIN ruangan ON ruangan.id_ruangan = peminjaman.id_ruangan 
                    JOIN petugas ON petugas.id_petugas = peminjaman.id_petugas 
                    JOIN peminjam ON peminjam.id_peminjam = peminjaman.id_peminjam 
                    WHERE ruangan.nama_ruangan LIKE :key OR petugas.nama_petugas LIKE :key OR peminjam.nama_peminjam LIKE :key');
        $this->db->bind('key', '%' . $key . '%');

        return $this->db->resultSet();
    }
}
