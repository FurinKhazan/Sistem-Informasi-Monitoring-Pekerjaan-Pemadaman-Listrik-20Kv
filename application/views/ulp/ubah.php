<div class="container">
	<div class="row-mt-3">
		<div class="col-md-12">
			
			<div class="card mt-4">
			  <div class="card-header">
			    UBAH DATA ULP
			  </div>
			  <div class="card-body">
<!-- 			   <?php if (validation_errors()) : ?>
			   		<div class="alert alert-danger" role="alert">
			   			<?= validation_errors(); ?>
			   		</div>
			   <?php endif ?> -->
			      <form action="" method="post">
					  <div class="form-group">
					  	<input type="hidden" name="id" value="<?= $ulp['id']; ?>">
					    <label for="nama">Nama ULP		: </label>
					    <input type="text" class="form-control" id="nama_ulp" name="nama_ulp" value="<?= $ulp['nama_ulp']; ?>">
					    <small class="form-text text-danger"><i><?= form_error('nama_ulp');?></i></small>
					  </div>
					   <div class="form-group">
					    <label for="nip">Alamat 		: </label>
					    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $ulp['alamat']; ?>">
					    <small class="form-text text-danger"><i><?= form_error('alamat');?></i></small>
					  </div>
					  <div class="form-group">
					    <label for="telepon">Telepon		: </label>
					    <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $ulp['telepon']; ?>">
					    <small class="form-text text-danger"><i><?= form_error('telepon');?></i></small>
					  </div>
					  <div class="form-group">
					    <label for="wilker">Wilayah kerja	: </label>
					    <input type="text" class="form-control" id="wilker" name="wilker" value="<?= $ulp['wilker']; ?>">
					  </div>

					  <a href="<?= base_url();?>ulp"class="btn btn-primary float-right ml-3">Kembali</a>
					  <button type="submit" name="submit" class="btn btn-primary float-right">Ubah Data</button>

					  </div>

		          </form>
			     
			    </blockquote>
			  </div>
			</div>
		</form>
		</div>
	</div>
</div>

<!-- // <?php var_dump($_POST); ?> -->