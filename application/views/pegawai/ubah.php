<div class="container">
	<div class="row-mt-3">
		<div class="col-md-12">
			
			<div class="card mt-4">
			  <div class="card-header">
			    UBAH DATA PEGAWAI
			  </div>
			  <div class="card-body">
<!-- 			   <?php if (validation_errors()) : ?>
			   		<div class="alert alert-danger" role="alert">
			   			<?= validation_errors(); ?>
			   		</div>
			   <?php endif ?> -->
			      <form action="" method="post">
					  <div class="form-group">
					  	<input type="hidden" name="id" value="<?= $pegawai['id']; ?>">
					    <label for="nama">Nama 		: </label>
					    <input type="text" class="form-control" id="nama" name="nama" value="<?= $pegawai['nama']; ?>">
					    <small class="form-text text-danger"><i><?= form_error('nama');?></i></small>
					  </div>
					   <div class="form-group">
					    <label for="nip">NIP 		: </label>
					    <input type="text" class="form-control" id="nip" name="nip" value="<?= $pegawai['nip']; ?>">
					    <small class="form-text text-danger"><i><?= form_error('nip');?></i></small>
					  </div>
					  <div class="form-group">
					    <label for="email">Email		: </label>
					    <input type="text" class="form-control" id="email" name="email" value="<?= $pegawai['email']; ?>">
					    <small class="form-text text-danger"><i><?= form_error('email');?></i></small>
					  </div>
					  <div class="form-group">
					  <label for="jabatan">Jabatan</label>
					  <select class="form-control" id="jabatan" name="jabatan">
							<?php foreach ($jabatan as $j ) : ?>
								<?php if ($j == $pegawai['jabatan']) : ?>			  			
								<option value="<?= $j;?>" selected><?= $j; ?></option>
									<?php else :?>
										<option value="<?= $j;?>"><?= $j; ?></option>
								<?php endif; ?>
							<?php endforeach; ?>	        
		   		      </select>
		   		      </div>
					  <a href="<?= base_url();?>pegawai"class="btn btn-primary float-right ml-3">Kembali</a>
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