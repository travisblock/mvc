<?php
echo $data['error'];
foreach ($data['siswa'] as $key): ?>
<li class="list-group-item "><?= $key['nama']; ?>
  <a href="<?= BASEURL . 'siswa/delete/' . $key['id']; ?>" onclick="return confirm('Yakin akan menghapus?');" class="badge badge-danger float-right ml-1">delete</a>
  <a href="<?= BASEURL . 'siswa/ubah/' . $key['id']; ?>" class="badge badge-success float-right ml-1 modalEdit" data-toggle="modal" data-target="#addSiswa" data-id="<?= $key['id']; ?>">edit</a>
  <a href="<?= BASEURL . 'siswa/detail/' . $key['id']; ?>" class="badge badge-info float-right ml-1">detail</a>
</li>

<?php endforeach;?>

<script src="<?= BASEURL; ?>public/js/script.js"></script>
