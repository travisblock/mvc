$(function(){

  $('#cari').on('keyup', function(){
      $.ajax({
        type: 'POST',
        url: 'http://localhost:1337/siswa/getCari',
        data: {
          search: $(this).val()
        },
        cache: false,
        success: function(data){
          $('#cariData').html(data);
        }
      });
  });

  
})
