<div class="container">
	<div class="row-mt-3">
		<div class="col-md-12">
			
			<div class="card mt-4">
			  <div class="card-header">
			    UBAH DATA GARDU INDUK
			  </div>
			  <div class="card-body">
<!-- 			   <?php if (validation_errors()) : ?>
			   		<div class="alert alert-danger" role="alert">
			   			<?= validation_errors(); ?>
			   		</div>
			   <?php endif ?> -->
			      <form action="" method="post">
					  <div class="form-group">
					  	<input type="hidden" name="id" value="<?= $gardu_induk['id_gi']; ?>">
					    <label for="nama">Nama GI		: </label>
					    <input type="text" class="form-control" id="nama_gardu" name="nama_gardu" value="<?= $gardu_induk['nama_gardu']; ?>">
					    <small class="form-text text-danger"><i><?= form_error('nama_gardu');?></i></small>
					  </div>
					   <div class="form-group">
					    <label for="nip">Alamat 		: </label>
					    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $gardu_induk['alamat']; ?>">
					    <small class="form-text text-danger"><i><?= form_error('alamat');?></i></small>
					  </div>

					  <a href="<?= base_url();?>gardu_induk"class="btn btn-primary float-right ml-3">Kembali</a>
					  <button type="submit" name="submit" class="btn btn-primary float-right">Ubah Data</button>
		          </form>
			     
			    </blockquote>
			  </div>
			</div>
		</form>
		</div>
	</div>
</div>

<!-- // <?php var_dump($_POST); ?> -->