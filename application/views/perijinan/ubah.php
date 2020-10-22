<div class="container">
	<div class="row-mt-3">
		<div class="col-md-12">
			
			<div class="card mt-4">
			  <div class="card-header">
			    RESCHEDULE RENCANA PEKERJAAN 
			  </div>
			
              <div class="card-body">
			   <?php if (validation_errors()) : ?>
			   		<div class="alert alert-danger" role="alert">
			   			<?= validation_errors(); ?>
			   		</div>
			   <?php endif ?>
			  
       
			  
			      <form action="" method="post">

				
				  <input type="hidden" name="id_ijin" value="<?= $perijinan1[0]['id_ijin'] ?>">
					<input type="hidden" name="id_mohon" value="<?= $perijinan1[0]['id_mohon'] ?>">


					  <div class="form-group">
					    <label for="tanggal_pekerjaan">Tanggal Pekerjaan	: </label>
					    <input type="date" class="form-control" id="tanggal_pekerjaan" name="tanggal_pekerjaan" value="<?= $perijinan1[0]['tanggal_pekerjaan'] ?>">
					  </div>
					  
					  <div class="form-group">
                        <label>Penyulang</label>                        
							<SELECT name="id_penyulang" class="form-control">
							<OPTION value="<?= $perijinan1[0]['id_penyulang'] ?>"><?= $perijinan1[0]['nama_penyulang'] ?></OPTION>	
							<?php foreach($penyulang as $pyl) : ?>
								<OPTION value="<?= $pyl['id_penyulang'] ?>"><?php echo $pyl['nama_penyulang'] ?></OPTION>
                            <?php endforeach; ?>				
							</SELECT>
                        </div>
					  <div class="form-group">
                
                        <label>ULP</label>
                        
							<SELECT name="id_ulp" class="form-control">
							<OPTION value="<?= $perijinan1[0]['id_ulp'] ?>"><?= $perijinan1[0]['nama_ulp'] ?></OPTION>
							<?php foreach($ulp as $pyl) : ?>
								<OPTION value="<?= $pyl['id'] ?>"><?php echo $pyl['nama_ulp'] ?></OPTION>
                            <?php endforeach; ?>	
                            					
							</SELECT>
                        </div>
					  <div class="form-group">
                        <label>PENGAWAS</label>
                  
							<SELECT name="id_pegawai" class="form-control">
							<OPTION value="<?= $perijinan1[0]['id_pegawai']?>"><?= $perijinan1[0]['nama']?></OPTION>
							<?php foreach($pegawai as $pyl) : ?>
								<OPTION value="<?= $pyl['id'] ?>"><?php echo $pyl['nama'] ?></OPTION>
                            <?php endforeach; ?>
                            						
							</SELECT>
                        </div>
					  <div class="form-group">
                        <label>VENDOR</label>                   
							<SELECT name="id_vendor" class="form-control">
							<OPTION value="<?= $perijinan1[0]['id_vendor']?>"><?= $perijinan1[0]['nama_vendor']?></OPTION>
							<?php foreach($vendor as $pyl) : ?>
								<OPTION value="<?= $pyl['id'] ?>"><?php echo $pyl['nama_vendor'] ?></OPTION>
                            <?php endforeach; ?>									                           					
							</SELECT>
						</div>
						
                        <div class="form-group">
						<label for="pekerjaan">Pekerjaan	: </label>
					    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $perijinan1[0]['pekerjaan']?>">
					  </div>

                      <a href="<?= base_url();?>permohonan"class="btn btn-primary float-right ml-3">Kembali</a>
		   		      <button type="submit" name="reschedule" class="btn btn-primary float-right mb-5">Atur Ulang Pekerjaan</button>						
					</form>                  
			  </div>
	
			
              </div>		
		</div>
	</div>
</div>

