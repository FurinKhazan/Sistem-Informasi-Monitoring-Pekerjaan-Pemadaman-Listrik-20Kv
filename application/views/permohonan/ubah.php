<div class="container">
	<div class="row-mt-3">
		<div class="col-md-12">
			
			<div class="card mt-4">
			  <div class="card-header">
			    UBAH PERMOHONAN PEKERJAAN 
			  </div>
			
              <div class="card-body">
			   <?php if (validation_errors()) : ?>
			   		<div class="alert alert-danger" role="alert">
			   			<?= validation_errors(); ?>
			   		</div>
			   <?php endif ?>
			  
               <?php foreach($permohonan1 as $pmh) : ?>
			  
			      <form action="" method="post">
				
					  <div class="form-group">
					    <label for="tanggal_pekerjaan">Tanggal Pekerjaan	: </label>
					    <input type="date" class="form-control" id="tanggal_pekerjaan" name="tanggal_pekerjaan" value="<?= $permohonan['tanggal_pekerjaan']; ?>">
					  </div>
					  
					  <div class="form-group">
                        <label>Penyulang</label>
                        <input type="hidden" name="id_mohon" value="<?= $pmh->id_mohon ?>">
							<SELECT name="id_penyulang" class="form-control">
							<OPTION value="<?= $pmh->id_penyulang ?>"><?= $pmh->nama_penyulang ?></OPTION>
								
                            <?php foreach($penyulang as $pyl) : ?>
								<OPTION value="<?= $pyl['id_penyulang'] ?>"><?php echo $pyl['nama_penyulang'] ?></OPTION>
                            <?php endforeach; ?>						
							</SELECT>
                        </div>
					  <div class="form-group">
                      <input type="hidden" name="id_mohon" value="<?= $pmh->id_mohon ?>">
                        <label>ULP</label>
                        
							<SELECT name="id_ulp" class="form-control">
							<OPTION value="<?= $pmh->id_ulp ?>"><?= $pmh->nama_ulp ?></OPTION>
								
                            <?php foreach($ulp as $pyl) : ?>
								<OPTION value="<?= $pyl['id'] ?>"><?php echo $pyl['nama_ulp'] ?></OPTION>
                            <?php endforeach; ?>						
							</SELECT>
                        </div>
					  <div class="form-group">
                        <label>PENGAWAS</label>
                        <input type="hidden" name="id_mohon" value="<?= $pmh->id_mohon ?>">
							<SELECT name="id_pegawai" class="form-control">
							<OPTION value="<?= $pmh->id_pegawai ?>"><?= $pmh->nama ?></OPTION>
								
                            <?php foreach($pegawai as $pyl) : ?>
								<OPTION value="<?= $pyl['id'] ?>"><?php echo $pyl['nama'] ?></OPTION>
                            <?php endforeach; ?>						
							</SELECT>
                        </div>
					  <div class="form-group">
                        <label>VENDOR</label>
                        <input type="hidden" name="id_mohon" value="<?= $pmh->id_mohon ?>">
							<SELECT name="id_vendor" class="form-control">
							<OPTION value="<?= $pmh->id_vendor ?>"><?= $pmh->nama_vendor ?></OPTION>
								
                            <?php foreach($vendor as $pyl) : ?>
								<OPTION value="<?= $pyl['id'] ?>"><?php echo $pyl['nama_vendor'] ?></OPTION>
                            <?php endforeach; ?>						
							</SELECT>
						</div>
						
                        <div class="form-group">
						<label for="pekerjaan">Pekerjaan	: </label>
						<!-- <textarea class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $pmh->pekerjaan ?>" ></textarea> -->
					    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $pmh->pekerjaan ?>">
					  </div>
					  

                      <a href="<?= base_url();?>permohonan"class="btn btn-primary float-right ml-3">Kembali</a>
		   		      <button type="submit" name="submit" class="btn btn-primary float-right mb-5">ubah Data</button>
						
					</form>
                    <?php endforeach; ?>
			
			  </div>
			  
			
              </div>
		
		</div>
	</div>
</div>

