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

    public function tambah(){
        if( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ){
            Flasher::setFlash('Berhasil','Ditambahkan','success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('Gagal','Ditambahkan','danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
    
    public function hapus($nis){
        if( $this->model('Mahasiswa_model')->hapusDataMahasiswa($nis) > 0 ){
            Flasher::setFlash('Berhasil','Dihapus','success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('Gagal','Dihapus','danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getUbah(){
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaByNIS($_POST['nis']));
    }
    
    public function ubah(){
        if( $this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0 ){
            Flasher::setFlash('Berhasil','Diubah','success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('Gagal','Diubah','danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari(){
        $data['judul'] = "Data Mahasiswa";
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

}