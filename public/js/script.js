$(function(){

    $('.tampilModalUbah').on('click', function(){
        // console.log('OK');
        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', "http://localhost/phpmvc/public/mahasiswa/ubah")

        const nis = $(this).data('nis');

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: {nis : nis},
            method: 'post',
            dataType: 'json',
            success:function(data){
                $('#nama').val(data.nama);
                $('#nis').val(data.nis);
                $('#email').val(data.email);
                $('#alamat').val(data.alamat);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        })
    })

    $('.tombolTambahData').on('click', function(){
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        $('#nama').val('');
        $('#nis').val('');
        $('#email').val('');
        $('#alamat').val('');
        $('#jurusan').val('');
    })
})