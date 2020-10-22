<div class="container">
	<div class="row-mt-3">
		<div class="col-md-12">
			
			<div class="card mt-4">
			  <div class="card-header">
			    TAMBAH DATA ULP
			  </div>
			  <div class="card-body">
			   <?php if (validation_errors()) : ?>
			   		<div class="alert alert-danger" role="alert">
			   			<?= validation_errors(); ?>
			   		</div>
			   <?php endif ?>
			      <form action="" method="post">
					  <div class="form-group">
					    <label for="nama_ulp">Nama ULP	: </label>
					    <input type="text" class="form-control" id="nama_ulp" name="nama_ulp" placeholder="Isi nama . .">
					  </div>
					   <div class="form-group">
					    <label for="alamat">Alamat 		: </label>
					    <input type="text" class="form-control" id="alamat" name="alamat"placeholder="Isi alamat . .">
					  </div>
					  <div class="form-group">
					    <label for="telepon">No Telepon	: </label>
					    <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Isi telepon . .">
					  </div>
					  <div class="form-group">
					    <label for="wilker">Wilayah kerja	: </label>
					    <input type="text" class="form-control" id="wilker" name="wilker" placeholder="Isi wilker . .">
					  </div>
					  </div>
					  
		   		      
					<!--    <div class="form-group">
					    <label for="nama">Foto 		: </label>
					    <input type="text" class="form-control" id="nama" placeholder="Isi foto . .">
					  </div> -->
				  </form>
				  <button type="submit" name="submit" class="btn btn-primary float-right mb-5">Tambah Data</button>
			     
			    </blockquote>
			  </div>
			</div>
		</form>
		</div>
	</div>
</div>

<!-- // <?php var_dump($_POST); ?> -->