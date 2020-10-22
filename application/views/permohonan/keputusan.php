<div class="container">
	<div class="row-mt-3">
		<div class="col-md-12">
			
			<div class="card mt-4">
			  <div class="card-header">
			    TAMBAH PERMOHONAN PEKERJAAN 
			  </div>
			
              <div class="card-body">
			   <?php if (validation_errors()) : ?>
			   		<div class="alert alert-danger" role="alert">
			   			<?= validation_errors(); ?>
			   		</div>
			   <?php endif ?>
			   <!-- <?= var_dump($permohonan1); ?> -->
			  
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
							</SELECT>
                        </div>
					  <div class="form-group">
                      <input type="hidden" name="id_mohon" value="<?= $pmh->id_mohon ?>">
                        <label>ULP</label>
                        
							<SELECT name="id_ulp" class="form-control">
							<OPTION value="<?= $pmh->id_ulp ?>"><?= $pmh->nama_ulp ?></OPTION>						
							</SELECT>
                        </div>
					  <div class="form-group">
                        <label>PENGAWAS</label>
                        <input type="hidden" name="id_mohon" value="<?= $pmh->id_mohon ?>">
							<SELECT name="id_pegawai" class="form-control">
							<OPTION value="<?= $pmh->id_pegawai ?>"><?= $pmh->nama ?></OPTION>													
							</SELECT>
                        </div>
					  <div class="form-group">
                        <label>VENDOR</label>
                        <input type="hidden" name="id_mohon" value="<?= $pmh->id_mohon ?>">
							<SELECT name="id_vendor" class="form-control">
							<OPTION value="<?= $pmh->id_vendor ?>"><?= $pmh->nama_vendor ?></OPTION>
								
							</SELECT>
						</div>	
                        <div class="form-group">
						<label for="pekerjaan">Pekerjaan	: </label>
					    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $pmh->pekerjaan ?>">
					  </div>
					  <div class="card-body">
					  <div class="form-group text-center" >
					  <label class="alert alert-warning text-center" role="alert"><b>Status Pekerjaan	: </b></label> <br>
						<div class="form-check form-check-inline mr-3">
							<input class="form-check-input" type="checkbox" name="id_status" id="keputusan" value="1">
							<label class="form-check-label" for="keputusan">Pekerjaan Disetujui</label>
						</div>
						<div class="form-check form-check-inline mr-3">
							<input class="form-check-input" type="checkbox" name="id_status" id="keputusan" value="2">
							<label class="form-check-label" for="keputusan">Pekerjaan Ditolak</label>
						</div>
						<div class="form-check form-check-inline mr-3">
							<input class="form-check-input" type="checkbox" name="id_status" id="keputusan" value="3">
							<label class="form-check-label" for="keputusan">Pekerjaan Ditunda</label>
						</div>
					   </div>
				

					   </div>

					  <a href="<?= base_url();?>permohonan"class="btn btn-primary float-right ml-3 mb-5">Kembali</a>
					  <?php if(!isset($_POST['id_status'])) :?>
		   		      <button type="submit" name="submit" class="btn btn-primary float-right mb-5">Eksekusi Pengajuan</button>
					  <?php endif ?>
					</form>
                    <?php endforeach; ?>
			
			  </div>
			  
			
              </div>
		
		</div>
	</div>
</div>

