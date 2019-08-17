<?php

    class Mahasiswa extends Controller{

        public function index(){

            $data['judul'] = 'Daftar Mahasiswa';
            $data['mhs'] = $this->model('MahasiswaModel')->getAllMahasiswa();
            $this->view('templates/header', $data);
            $this->view('mahasiswa/index', $data);
            $this->view('templates/footer');

        }

        public function detail($id){

            $data['judul'] = 'Detail Mahasiswa';
            $data['mhs'] = $this->model('MahasiswaModel')->getMahasiswaById($id);
            $this->view('templates/header', $data);
            $this->view('mahasiswa/detail', $data);
            $this->view('templates/footer');
            
        }

        public function tambah(){
            
            if ($this->model('MahasiswaModel')->tambahDataMahasiswa($_POST) > 0){
                Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
                header('Location: ' .BASEURL . '/mahasiswa');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
                header('Location: ' .BASEURL . '/mahasiswa');
                exit;
            }
        }

        public function hapus($id){
            if( $this->model('MahasiswaModel')->hapusDataMahasiswa($id) > 0 ) {
                Flasher::setFlash('Berhasil', 'dihapus', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'dihapus', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }

        public function getUbah(){
            echo json_encode($this->model('MahasiswaModel')->getMahasiswaById($_POST['id']));
        }

        public function ubah(){

            if ($this->model('MahasiswaModel')->ubahDataMahasiswa($_POST) > 0){
                Flasher::setFlash('Berhasil', 'Diubah', 'success');
                header('Location: ' .BASEURL . '/mahasiswa');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'Diubah', 'danger');
                header('Location: ' .BASEURL . '/mahasiswa');
                exit;
            }
        }

        public function cari(){
            $data['judul'] = 'Daftar Mahasiswa';
            $data['mhs'] = $this->model('MahasiswaModel')->cariDataMahasiswa();
            $this->view('templates/header', $data);
            $this->view('mahasiswa/index', $data);
            $this->view('templates/footer');
        }

    }