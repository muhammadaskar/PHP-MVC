
    <div class="container mt-3">

      <div class="row mt-5 mb-2">
        <div class="col-lg-6">
          <?php Flasher::flash(); ?>
        </div>
      </div>

          <div class="row mt-3">
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary tampilModalTambah" data-toggle="modal" data-target="#formModal">
                  Tambah Data Mahasiswa
                </button>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6 mb-3">
                <form action="<?=BASEURL;?>/mahasiswa/cari" method="post">
                  <div class="input-group mt-3">
                    <input type="text" class="form-control" placeholder="Masukkan NIM Mahasiswa" name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                    </div>
                  </div>
                </form>
            </div>
          </div>

        <div class="row">
            <div class="col-lg-6">
                <h3 class="text-center">Daftar Mahasiswa</h3>
                <ul class="list-group">
                    <?php foreach( $data['mhs'] as $mhs) :?>
                    <li class="list-group-item">  <strong> <?= $mhs['nama']; ?>  </strong>
                    <br>
                      <?= $mhs['nim'] ?>
                        <a href="<?= BASEURL; ?> /mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger float-right ml-1" onClick="return confirm('Apakah Anda Yakin Ingin Menghapus ?');">hapus</a>
                        <a href="<?= BASEURL; ?> /mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id'] ?>">ubah</a>
                        <a href="<?= BASEURL; ?> /mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary float-right">detail</a>
                    </li>
                    <?php endforeach; ?>

                    <?php if($data['mhs'] == null): ?>
                        <h5 class="text-center mt-5">Data Mahasiswa Tidak Ada</h5>
                    <?php endif;?>
                    
                 </ul>
            </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
          <input type="hidden" name="id" id="id">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="number" class="form-control" id="nim" name="nim">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="ex : mahasiswa@gmail.com">
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select class="form-control" id="jurusan" name="jurusan">
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            </select>
        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
      </form>
    </div>
  </div>
</div>