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
}