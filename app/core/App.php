<?php

class App {

    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        
        $url = $this->parseURL();
        
        /*--------------------
        |     CONTROLLER    |
         --------------------*/

        // jika file php ada di dalam controller
        if ( file_exists('../app/controllers/' . $url[0] . '.php') ){
            $this->controller = $url[0];    // maka file dari akan disimpan di dalam property controller
            unset($url[0]);                 // file url dihapus
        }

        // mengambil folder app dan folder controller kemudian menambahkan file dari property dan disimpan bertipe file php
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        /*--------------------
        |       METHOD      |
         --------------------*/

        // jika nilai pada variabel url index ke-1 ada
        if ( isset($url[1]) ){
            // jika method pada atribut controller ada dan variabel url index ke-1 ada
            if (method_exists( $this->controller, $url[1] )){
                $this->method = $url[1];        // maka nilai dari variabel url index ke-1 disimpan di dalam atribut method
                unset($url[1]);                 // menghapus nilai dari variabel url index ke-1
            }
        }
        
        /*--------------------
        |     PARAMETER      |
         --------------------*/

        // jika nilai dari variabel url kosong
        if( !empty($url) ) {
            $this->params = array_values($url);     // maka variabel url diparse ke array kemudian disimpan ke dalam atribut
        }
        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function parseURL(){
        if ( isset($_GET['url']) ){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

}