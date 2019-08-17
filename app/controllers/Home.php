<?php

class Home extends Controller{

    public function index(){

        // memanggil method view yang ada di dalam kelas Controller
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('UserModel')->getUser();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
        
    }

}