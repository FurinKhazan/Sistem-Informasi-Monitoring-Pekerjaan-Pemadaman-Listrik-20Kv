<div class="container">
	<div class="row-mt-3">
		<div class="col-md-12">
			
			<div class="card mt-4">
			  <div class="card-header">
			    BUAT DATA AKUN
			  </div>
			  <div class="card-body">

			  <div class="col"><!-- tampilan jika berasil menambah / mengubah data -->
     				 <?php if ($this->session->flashdata() ) : ?> 
      			     <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">Data User Rahasia
               		 <strong>berhasil</strong> <?= $this->session->flashdata('flash');?>.
              		 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  	 <span aria-hidden="true">&times;</span>
              		 </button>
				   </div>
				   <?php endif;?>
			   </div>
				   
			      <form action="" method="post">
					 <div class="form-group">
					 <label for="email">Username	: </label>
                      
							<SELECT name="id_pegawai" class="form-control">
							<OPTION >Pilih Nama-</OPTION>
								
                            <?php foreach($pegawai as $pyl) : ?>
								<OPTION value="<?= $pyl['id'] ?>"><?php echo $pyl['nama'] ?></OPTION>
                            <?php endforeach; ?>						
							</SELECT>
					  </div> 
					  
				
					  <div class="form-group">
					  <SELECT name="email" class="form-control">
							<OPTION >Pilih Email-</OPTION>
								
                            <?php foreach($pegawai as $pyl) : ?>
								<OPTION value="<?= $pyl['email'] ?>"><?php echo $pyl['email'] ?></OPTION>
                            <?php endforeach; ?>						
							</SELECT>
                      </div>

                      <div class="form-group">
					    <label for="password">Password Akun		: </label>
					    <input type="text" class="form-control" id="password" name="password" placeholder="Isi password . .">
					    <small class="form-text text-danger"><i><?= form_error('password');?></i></small>
					  </div>
					  <div class="form-group">
					 <label for="role">Jabatan	: </label>
                      
							<SELECT name="role_id" class="form-control">
							<OPTION >Pilih Role Jabatan-</OPTION>
								
                            <?php foreach($role as $pyl) : ?>
								<OPTION value="<?= $pyl['id'] ?>"><?php echo $pyl['role'] ?></OPTION>
                            <?php endforeach; ?>						
							</SELECT>
					  </div> 
                      					  
		   		      <a href="<?= base_url();?>pegawai"class="btn btn-primary float-right ml-3">Kembali</a>
		   		      <button type="submit" name="submit" class="btn btn-primary float-right">Tambah Data</button>
					
				  </form>
			 
			     
			    </blockquote>
			  </div>
			</div>
		</form>
		</div>
	</div>
</div>

