<?php

class Msg{

  public static function setMSG($pesan, $tipe){

    //Msg::setMSG('Siswa', 'berhasil', 'success', 'ditambahkan')
    $_SESSION['msg'] = [
      'pesan' => $pesan,
      'tipe'  => $tipe
    ];
  }

  public static function show(){
    if(isset($_SESSION['msg'])){
      echo '<div class="alert alert-dismissible fade show alert-msg alert-'. $_SESSION['msg']['tipe'] .' role="alert">
              '. $_SESSION['msg']['pesan'] .'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>';

      unset($_SESSION['msg']);
    }
  }


}
