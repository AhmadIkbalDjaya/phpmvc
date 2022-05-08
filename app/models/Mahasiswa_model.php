<?php

class Mahasiswa_model{
    // connect db dengan driver pdo(php data object)
    // lebih muda dari mysqli
    private $dbh;   //dbh(database handler) untk menampung koneksi ke db
    private $stmt;  //stmt(statement) untuk menyimpan query

    public function __construct(){
        // data source name
        $dsn = 'mysql:host=localhost;dbname=phpmvc';

        try{
            // PDO(dsn, username, password);
            $this->dbh = new PDO($dsn, 'root', '');
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa(){

        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        // menjalankan query
        $this->stmt->execute();
        // mengmabil semua data sebagai array assosiatif
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}