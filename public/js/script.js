$(function(){



  $('.btnTambah').on('click', function(){
    $('#addSiswaLabel').html('Tambah Data Siswa');
    $('#btnSubmitModal').html('Tambah');
    $('.modal-body form').attr('action', 'http://localhost:1337/siswa/tambah');

    $('#nama').val('');
    $('#kelas').val('');
    $('#jurusan').val('');
    $('#email').val('');
    $('#id').val('');

  });

  $('.modalEdit').on('click', function(){
    $('#addSiswaLabel').html('Ubah Data Siswa');
    $('#btnSubmitModal').html('Ubah');
    $('.modal-body form').attr('action', 'http://localhost:1337/siswa/ubah');

    const id = $(this).data('id');

    $.ajax({
      url: 'http://localhost:1337/siswa/getUbah',
      data: {id : id},
      method: 'post',
      dataType: 'json',
      success: function(data){
        $('#nama').val(data.nama);
        $('#kelas').val(data.kelas);
        $('#jurusan').val(data.jurusan);
        $('#email').val(data.email);
        $('#id').val(data.id);
      }
    });

  })

});
