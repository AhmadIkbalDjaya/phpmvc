<?php

class Mahasiswa_model{
    private $table = 'mahasiswa';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllMahasiswa(){
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet ();
    }

    public function getMahasiswaByNIS($nis){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nis=:nis');
        $this->db->bind('nis', $nis);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data){
        $query =    "INSERT INTO mahasiswa
                        VALUES
                    ('', :nama, :nis, :email, :alamat, :jurusan)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->hitungBaris();
    }

    public function hapusDataMahasiswa($nis){
        $query = "DELETE FROM mahasiswa WHERE nis= :nis";
        $this->db->query($query);
        $this->db->bind('nis', $nis);

        $this->db->execute();

        return $this->db->hitungBaris();
    }

    public function ubahDataMahasiswa($data){
        $query =    "UPDATE mahasiswa SET
                    nama = :nama,
                    nis = :nis,
                    email = :email,
                    alamat = :alamat,
                    jurusan = :jurusan
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->hitungBaris();
    }
}