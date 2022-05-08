<?php

class Mahasiswa_model{
    private $mhs = [
        [
            "nama" => "Ahmad Ikbal Djaya",
            "nis" => "17091608",
            "email" => "ikbaldjaya@gmail.com",
            "alamat" => "Misten"
        ],
        [
            "nama" => "Ahmad Syidqi Ramadan",
            "nis" => "17091609",
            "email" => "Syidqi11@gmail.com",
            "alamat" => "Batangase"
        ]
    ];

    public function getAllMahasiswa(){
        return $this->mhs;
    }
}