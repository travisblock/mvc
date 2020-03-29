
	<div class="col-md-6 mt-5 mb-5">
		<h3 class="mb-3">Daftar All Siswa</h3>
			<div class="row mb-1">
				<?php Msg::show(); ?>
				<?php Msg::setErrMsg(); ?>
			</div>
			<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addSiswa">
			  + Tambah siswa
			</button>
			<ul class="list-group">
				<?Php foreach ($data['siswa'] as $key): ?>
			  <li class="list-group-item d-flex justify-content-between align-items-center"><?= $key['nama']; ?>
			  	<a href="<?= BASEURL . 'siswa/detail/' . $key['id']; ?>" class="badge badge-info">detail</a>
			  </li>
				<?php endforeach;?>
			</ul>
	</div>
	<div class="modal fade" id="addSiswa" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addSiswaLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="addSiswaLabel">Tambah Siswa</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="post" action="<?= BASEURL; ?>siswa/tambah">
			  <div class="form-group">
			    <label for="addsiswa">Nama</label>
			    <input type="text" class="form-control" id="addsiswa" name="nama">
			  </div>
			  <div class="form-group">
			    <label for="addsiswa">Kelas</label>
			    <input type="text" class="form-control" id="addsiswa" name="kelas">
			  </div>
			  <div class="form-group">
			    <label for="addsiswa">Jurusan</label>
			    <input type="text" class="form-control" id="addsiswa" name="jurusan">
			  </div>
			  <div class="form-group">
			    <label for="addsiswa">Email</label>
			    <input type="email" class="form-control" id="addsiswa" name="email">
			  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Tambah</button>
	      </div>
	  </form>
	    </div>
	  </div>
	</div>
