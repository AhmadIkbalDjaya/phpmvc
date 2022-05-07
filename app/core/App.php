<?php

class App {
    // properti untuk menentukan controller dan method default
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->parseURL();

        // controller
        // cek apakah controller yg di parameter pertama di url ada atau tidak
        // apakah filenya ada
        // mengambil controller
        if(!empty($url)){
            if( file_exists('../app/controllers/' . $url[0]  . '.php') ){
                // jika ada maka tinpa property controller
                $this->controller = $url[0];
                // hilangkan controller dari elemen arraynya
                unset($url[0]);
            }
        }
        
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
    
        //method
        if ( isset($url[1]) ){
            if( method_exists($this->controller, $url[1]) ){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if( !empty($url) ){
            $this->params = array_values($url);
        }

        //  jalankan controlle& method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    
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