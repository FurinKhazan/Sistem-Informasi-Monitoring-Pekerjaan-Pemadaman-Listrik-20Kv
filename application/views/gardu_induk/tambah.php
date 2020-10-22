<div class="container">
	<div class="row-mt-3">
		<div class="col-md-12">
			
			<div class="card mt-4">
			  <div class="card-header">
			    TAMBAH DATA GARDU INDUK
			  </div>
			  <div class="card-body">
			   <?php if (validation_errors()) : ?>
			   		<div class="alert alert-danger" role="alert">
			   			<?= validation_errors(); ?>
			   		</div>
			   <?php endif ?>
			      <form action="" method="post">
					  <div class="form-group">
					    <label for="nama_gardu">Nama GI	: </label>
					    <input type="text" class="form-control" id="nama_gardu" name="nama_gardu" placeholder="Isi nama . .">
					  </div>
					   <div class="form-group">
					    <label for="alamat">Alamat 		: </label>
					    <input type="text" class="form-control" id="alamat" name="alamat"placeholder="Isi alamat . .">
					  </div>
					   <div class="form-group">
					    <label for="alamat">Jumlah Trafo 		: </label>
					    <input type="text" class="form-control" id="jml_trafo" name="jml_trafo"placeholder="Isi jml_trafo . .">
					  </div>
					  
					  <a href="<?= base_url();?>gardu_induk"class="btn btn-primary float-right ml-3">Kembali</a>
		   		      <button type="submit" name="submit" class="btn btn-primary float-right">Tambah Data</button>
					<!--    <div class="form-group">
					    <label for="nama">Foto 		: </label>
					    <input type="text" class="form-control" id="nama" placeholder="Isi foto . .">
					  </div> -->
		          </form>
			     
			    </blockquote>
			  </div>
			</div>
		</form>
		</div>
	</div>
</div>

<!-- // <?php var_dump($_POST); ?> -->