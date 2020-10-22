<div class="container">
	<div class="row-mt-3">
		<div class="col-md-12">
			
			<div class="card mt-4">
			  <div class="card-header">
			    UBAH DATA PENYULANG
			  </div>
			  <div class="card-body">
<!-- 			   <?php if (validation_errors()) : ?>
			   		<div class="alert alert-danger" role="alert">
			   			<?= validation_errors(); ?>
			   		</div>
			   <?php endif ?> -->
			      <form action="" method="post">
					  <div class="form-group">
					  	<input type="hidden" name="id" value="<?= $penyulang['id_penyulang']; ?>">
					    <label for="nama">Nama Penyulang		: </label>
					    <input type="text" class="form-control" id="nama_penyulang" name="nama_penyulang" value="<?= $penyulang['nama_penyulang']; ?>">
					    <small class="form-text text-danger"><i><?= form_error('nama_penyulang');?></i></small>
					  </div>
					  

					  <a href="<?= base_url();?>penyulang"class="btn btn-primary float-right ml-3">Kembali</a>
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