<div class="container">
	<div class="row-mt-3">
		<div class="col-md-12">
			
			<div class="card mt-4">
			  <div class="card-header">
			    LAKSANAKAN PEKERJAAN 
			  </div>
			
              <div class="card-body">
			   <?php if (validation_errors()) : ?>
			   		<div class="alert alert-danger" role="alert">
			   			<?= validation_errors(); ?>
			   		</div>
			   <?php endif ?>
			  
              
		
			      <form action="" method="post">
					<!-- <?= var_dump($perijinan1);?> -->
				
				
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
							</SELECT>
                        </div>
					  <div class="form-group">
                
                        <label>ULP</label>
                        
							<SELECT name="id_ulp" class="form-control">
							<OPTION value="<?= $perijinan1[0]['id_ulp'] ?>"><?= $perijinan1[0]['nama_ulp'] ?></OPTION>
								
                            					
							</SELECT>
                        </div>
					  <div class="form-group">
                        <label>PENGAWAS</label>
                  
							<SELECT name="id_pegawai" class="form-control">
							<OPTION value="<?= $perijinan1[0]['id_pegawai']?>"><?= $perijinan1[0]['nama']?></OPTION>
								
                            						
							</SELECT>
                        </div>
					  <div class="form-group">
                        <label>VENDOR</label>                   
							<SELECT name="id_vendor" class="form-control">
							<OPTION value="<?= $perijinan1[0]['id_vendor']?>"><?= $perijinan1[0]['nama_vendor']?></OPTION>								                           					
							</SELECT>
						</div>
						
                        <div class="form-group">
						<label for="pekerjaan">Pekerjaan	: </label>
					    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $perijinan1[0]['pekerjaan']?>">
					  </div>


					  <div class="card-body">			 
					  <div class="form-group text-center" >
					  <label class="alert alert-warning text-center" role="alert"><b>Status Pekerjaan	: </b></label> <br>
						<div class="form-check form-check-inline mr-3">
							<input class="form-check-input" type="checkbox" name="id_status" id="keputusan" value="7" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong')" oninput="setCustomValidity('')">
							<label class="form-check-label" for="keputusan">Melaksanakan Pekerjaan</label>
						</div>
						
					   </div>
					   </div>

                      <a href="<?= base_url();?>perijinan"class="btn btn-primary float-right ml-3">Kembali</a>
		   		      <button type="submit" name="submit" class="btn btn-primary float-right mb-5">Lanjutkan</button>
				
					</form>
                   
			
			  </div>
			  
			
              </div>
		
		</div>
	</div>
</div>

