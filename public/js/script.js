$(function () {

    $('.tampilModalTambah').on('click', function () {

        $('#judulModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        $('#nama').val('');
        $('#nim').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');
    });


    // jika kelas tampilModalUbah di klik
    $('.tampilModalUbah').on('click', function () {

        // maka id judulModalLabel akan diset menjadi Ubah Data Mahasiswa
        $('#judulModalLabel').html('Ubah Data Mahasiswa');

        // kelas modal-footer yang type submit textnya akan di set Menjadi Ubah Data
        $('.modal-footer button[type=submit]').html('Ubah Data');

        // kelas modal-body form actionnya akan diset menjadi method ubah pada kelas controller mahasiswa
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getUbah',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });


    });

});