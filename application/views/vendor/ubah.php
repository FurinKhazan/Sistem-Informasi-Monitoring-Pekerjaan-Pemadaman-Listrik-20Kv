<div class="container">
	<div class="row-mt-3">
		<div class="col-md-12">
			
			<div class="card mt-4">
			  <div class="card-header">
			    UBAH DATA VENDOR
			  </div>
			  <div class="card-body">
<!-- 			   <?php if (validation_errors()) : ?>
			   		<div class="alert alert-danger" role="alert">
			   			<?= validation_errors(); ?>
			   		</div>
			   <?php endif ?> -->
			      <form action="" method="post">
					  <div class="form-group">
					  	<input type="hidden" name="id" value="<?= $vendor['id']; ?>">
					    <label for="nama">Nama Vendor		: </label>
					    <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" value="<?= $vendor['nama_vendor']; ?>">
					    <small class="form-text text-danger"><i><?= form_error('nama_vendor');?></i></small>
					  </div>
					   <div class="form-group">
					    <label for="nip">Alamat 		: </label>
					    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $vendor['alamat']; ?>">
					    <small class="form-text text-danger"><i><?= form_error('alamat');?></i></small>
					  </div>
					  <div class="form-group">
					    <label for="telepon">Telepon		: </label>
					    <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $vendor['telepon']; ?>">
					    <small class="form-text text-danger"><i><?= form_error('telepon');?></i></small>
					  </div>
					  <div class="form-group">
					    <label for="telepon">Email			: </label>
					    <input type="text" class="form-control" id="email" name="email" value="<?= $vendor['email']; ?>">
					    <small class="form-text text-danger"><i><?= form_error('vendor');?></i></small>
					  </div>
					  <div class="form-group">
					    <label for="telepon">Keterangan		: </label>
					    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $vendor['keterangan']; ?>">
					    <small class="form-text text-danger"><i><?= form_error('keterangan');?></i></small>
					  </div>

					  <a href="<?= base_url();?>vendor"class="btn btn-primary float-right ml-3">Kembali</a>
					  <button type="submit" name="submit" class="btn btn-primary float-right">Ubah Data</button>
		          </form>
			     
			    </blockquote>
			  </div>
			</div>
		</form>
		</div>
	</div>
</div>

<!--  <?php var_dump($_POST); ?>  -->