<?php

if(empty($data['siswa'])){
  header('Location:'. BASEURL . 'siswa');
  exit();
}
?>
<div class="card mt-5" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $data['siswa']['nama']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?= $data['siswa']['kelas'] . ' ' . $data['siswa']['jurusan']; ?></h6>
    <p class="card-text"><?= $data['siswa']['email']; ?></p>
    <a href="<?= BASEURL . 'siswa';?>" class="card-link">Kembali</a>
  </div>
</div>
