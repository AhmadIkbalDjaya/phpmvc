<?php

class Mahasiswa extends Controller{
    public function index(){
        $data['judul'] = "Data Mahasiswa";
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($nis){
        $data['judul'] = "Detail Mahasiswa";
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaByNIS($nis);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }    
}