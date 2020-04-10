
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-6">
				<h3 class="mb-3">Daftar All Siswa</h3>
			</div>
		</div>
		<div class="row mb-1">
			<div class="col-md-6">
				<?= Msg::show(); ?>
			</div>
		</div>
		<div class="row mb-1">
			<div class="col-md-6">
				<button type="button" class="btn btn-primary mb-3 btnTambah" data-toggle="modal" data-target="#addSiswa">
				  + Tambah siswa
				</button>
			</div>
		</div>
		<div class="row mb-1">
			<div class="col-md-6">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="cari siswa" name="cari" id="cari" autocomplete="off">
					</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-6">
				<ul class="list-group" id="cariData">

					<?php
					foreach ($data['siswa'] as $key): ?>
				  <li class="list-group-item "><?= $key['nama']; ?>
						<a href="<?= BASEURL . 'siswa/delete/' . $key['id']; ?>" onclick="return confirm('Yakin akan menghapus?');" class="badge badge-danger float-right ml-1">delete</a>
						<a href="<?= BASEURL . 'siswa/ubah/' . $key['id']; ?>" class="badge badge-success float-right ml-1 modalEdit" data-toggle="modal" data-target="#addSiswa" data-id="<?= $key['id']; ?>">edit</a>
						<a href="<?= BASEURL . 'siswa/detail/' . $key['id']; ?>" class="badge badge-info float-right ml-1">detail</a>
				  </li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
	</div>
	<div class="modal fade" id="addSiswa" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addSiswaLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="addSiswaLabel">Tambah Data Siswa</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form class="" method="post" action="<?= BASEURL; ?>siswa/tambah">
						<input type="hidden" name="id" id="id">
					  <div class="form-group">
					    <label for="addsiswa">Nama</label>
					    <input type="text" class="form-control" id="nama" name="nama" required>
					  </div>
					  <div class="form-group">
					    <label for="addsiswa">Kelas</label>
					    <input type="text" class="form-control" id="kelas" name="kelas" required>
					  </div>
					  <div class="form-group">
					    <label for="addsiswa">Jurusan</label>
					    <input type="text" class="form-control" id="jurusan" name="jurusan" required>
					  </div>
					  <div class="form-group">
					    <label for="addsiswa">Email</label>
					    <input type="email" class="form-control" id="email" name="email" required>
					  </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" id="btnSubmitModal" class="btn btn-primary">Tambah</button>
			      </div>
	  			</form>
				</div>
	    </div>
	  </div>
	</div>
