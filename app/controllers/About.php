<?php

class About extends Controller{

    public function index($nama = 'Muhammad Askar ', $hobi = "Main Futsal ", $umur = 19){

        $data['judul'] = 'About Me';
        $data['nama'] = $nama;
        $data['hobi'] = $hobi;
        $data['umur'] = $umur;

        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page(){
        
        $data['judul'] = 'Page';

        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');

    }
}

// TODO : Belajar Model