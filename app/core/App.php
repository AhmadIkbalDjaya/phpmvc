<?php

class App {
    public function __construct(){
        $url = $this->parseURL();
        var_dump($url);
    }

    public function parseURL(){
        if( isset($_GET['url'])){
            // rtrim() untuk menghapus karakter tertentu
            $url = rtrim($_GET['url'], '/');
            // membersihkan url dari karakter aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // memecah url dengan delimiter / dan memasukkan ke dalam elemen array
            $url = explode('/', $url);
            return $url;
        }
    }
}