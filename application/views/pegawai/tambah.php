<div class="container">
	<div class="row-mt-3">
		<div class="col-md-12">
			
			<div class="card mt-4">
			  <div class="card-header">
			    TAMBAH DATA PEGAWAI
			  </div>
			  <div class="card-body">
<!-- 			   <?php if (validation_errors()) : ?>
			   		<div class="alert alert-danger" role="alert">
			   			<?= validation_errors(); ?>
			   		</div>
			   <?php endif ?> -->
			      <form action="" method="post">
					  <div class="form-group">
					    <label for="nama">Nama 		: </label>
					    <input type="text" class="form-control" id="nama" name="nama" placeholder="Isi nama . .">
					    <small class="form-text text-danger"><i><?= form_error('nama');?></i></small>
					  </div>
					   <div class="form-group">
					    <label for="nip">NIP 		: </label>
					    <input type="text" class="form-control" id="nip" name="nip"placeholder="Isi NIP . .">
					    <small class="form-text text-danger"><i><?= form_error('nip');?></i></small>
					  </div>
					  <div class="form-group">
					    <label for="email">Email		: </label>
					    <input type="text" class="form-control" id="email" name="email" placeholder="Isi email . .">
					    <small class="form-text text-danger"><i><?= form_error('email');?></i></small>
					  </div>
					  <div class="form-group">
					    <label for="posisi">Posisi		: </label>
					    <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Isi posisi . .">
					    <small class="form-text text-danger"><i><?= form_error('posisi');?></i></small>
					  </div>
					  <div class="form-group">
					    <label for="ulp">Ulp Kerja		: </label>
					    <input type="text" class="form-control" id="ulp" name="ulp" placeholder="Isi ulp . .">
					    <small class="form-text text-danger"><i><?= form_error('ulp');?></i></small>
					  </div>
					  <div class="form-group">
					  <label for="jabatan">Jabatan</label>
					  <select class="form-control" id="jabatan" name="jabatan">
				        <option value="Pimpinan">Manajer</option>
				        <option value="Staff">Staff</option>
				        <option value="Dispatcher">Dispatcher</option>
		   		      </select>
		   		      </div>
		   		      <a href="<?= base_url();?>pegawai"class="btn btn-primary float-right ml-3  mb-5">Kembali</a>
		   		      <button type="submit" name="submit" class="btn btn-primary float-right  mb-5">Tambah Data</button>
					
		          </form>
			     
			    </blockquote>
			  </div>
			</div>
		</form>
		</div>
	</div>
</div>

<!-- // <?php var_dump($_POST); ?> -->