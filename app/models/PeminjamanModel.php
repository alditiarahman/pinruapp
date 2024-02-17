<?php

class PeminjamanModel
{
    private $table = 'peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPeminjaman()
    {
        $this->db->query('SELECT peminjaman.*, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam 
                            FROM ' . $this->table . ' 
                            JOIN ruangan ON ruangan.id_ruangan = peminjaman.id_ruangan 
                            JOIN petugas ON petugas.id_petugas = peminjaman.id_petugas 
                            JOIN peminjam ON peminjam.id_peminjam = peminjaman.id_peminjam');
        return $this->db->resultSet();
    }

    public function getPeminjamanById($id)
    {
        $this->db->query('SELECT peminjaman.*, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam 
                            FROM ' . $this->table . ' 
                            JOIN ruangan ON ruangan.id_ruangan = peminjaman.id_ruangan 
                            JOIN petugas ON petugas.id_petugas = peminjaman.id_petugas 
                            JOIN peminjam ON peminjam.id_peminjam = peminjaman.id_peminjam 
                            WHERE peminjaman.id_peminjaman=:id_peminjaman');
        $this->db->bind('id_peminjaman', $id);
        return $this->db->single();
    }

    public function tambahPeminjaman($data)
    {
        // Check if there is already a booking with the same date
        $query = "SELECT COUNT(*) AS count FROM peminjaman WHERE tanggal_pinjam = :tanggal_pinjam";
        $this->db->query($query);
        $this->db->bind('tanggal_pinjam', $data['tanggal_pinjam']);
        $result = $this->db->single();

        if ($result['count'] > 0) {
            // If there is already a booking with the same date, return an error
            return -1; // Or you can throw an exception here
        }

        $query = "INSERT INTO peminjaman(id_ruangan, id_petugas, id_peminjam, tanggal_pinjam, surat_permohonan, status) 
                VALUES (:id_ruangan, :id_petugas, :id_peminjam, :tanggal_pinjam, :surat_permohonan, :status)";
        $this->db->query($query);
        $this->db->bind('id_ruangan', $data['id_ruangan']);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('id_peminjam', $data['id_peminjam']);
        $this->db->bind('tanggal_pinjam', $data['tanggal_pinjam']);

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

    // Metode lainnya tetap sama seperti sebelumnya...

    public function updateDataPeminjaman($data)
    {
        // Check if there is already a booking with the same date
        $query = "SELECT COUNT(*) AS count FROM peminjaman WHERE id_peminjaman != :id_peminjaman AND tanggal_pinjam = :tanggal_pinjam";
        $this->db->query($query);
        $this->db->bind('id_peminjaman', $data['id_peminjaman']);
        $this->db->bind('tanggal_pinjam', $data['tanggal_pinjam']);
        $result = $this->db->single();

        if ($result['count'] > 0) {
            // If there is already a booking with the same date, return an error
            return -1; // Or you can throw an exception here
        }

        // Check if there is a file uploaded
        if (!empty($_FILES['surat_permohonan']['name'])) {
            // If there is a file uploaded, handle file upload
            $file = $_FILES['surat_permohonan'];
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileError = $file['error'];
            $fileSize = $file['size'];

            if ($fileError === UPLOAD_ERR_OK) {
                $fileDestination = 'uploads/' . $fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $surat_permohonan = $fileDestination;
            } else {
                // Handle file upload error
                return false; // Or you can throw an exception here
            }
        } else {
            // If there is no file uploaded, keep the existing file path
            $surat_permohonan = $data['surat_permohonan'];
        }

        $query = "UPDATE peminjaman 
            SET id_ruangan=:id_ruangan, id_petugas=:id_petugas, id_peminjam=:id_peminjam, 
                tanggal_pinjam=:tanggal_pinjam, status=:status 
            WHERE id_peminjaman=:id_peminjaman";
        $this->db->query($query);
        $this->db->bind('id_peminjaman', $data['id_peminjaman']);
        $this->db->bind('id_ruangan', $data['id_ruangan']);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('id_peminjam', $data['id_peminjam']);
        $this->db->bind('tanggal_pinjam', $data['tanggal_pinjam']);
        $this->db->bind('status', $data['status']);
        $this->db->execute();

        return $this->db->rowCount();
    }



    public function deletePeminjaman($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_peminjaman=:id_peminjaman');
        $this->db->bind('id_peminjaman', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function setujuiPeminjaman($id)
    {
        $this->db->query('UPDATE ' . $this->table . ' SET status=\'Disetujui\' WHERE id_peminjaman=:id_peminjaman');
        $this->db->bind('id_peminjaman', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tolakPeminjaman($id)
    {
        $this->db->query('UPDATE ' . $this->table . ' SET status=\'Ditolak\' WHERE id_peminjaman=:id_peminjaman');
        $this->db->bind('id_peminjaman', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPeminjaman($key)
    {
        $this->db->query('SELECT peminjaman.*, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam 
                    FROM ' . $this->table . ' 
                    JOIN ruangan ON ruangan.id_ruangan = peminjaman.id_ruangan 
                    JOIN petugas ON petugas.id_petugas = peminjaman.id_petugas 
                    JOIN peminjam ON peminjam.id_peminjam = peminjaman.id_peminjam 
                    WHERE petugas.nama_petugas LIKE :key OR peminjam.nama_peminjam LIKE :key');
        $this->db->bind('key', '%' . $key . '%'); // Perbaikan pada bagian ini

        return $this->db->resultSet();
    }
}
