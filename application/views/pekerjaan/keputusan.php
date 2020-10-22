<div class="container">
	<div class="row-mt-3">
		<div class="col-md-12">
			
			<div class="card mt-4">
			  <div class="card-header">
			    PROGRES PEKERJAAN 
			  </div>
			
              <div class="card-body">
			   <?php if (validation_errors()) : ?>
			   		<div class="alert alert-danger" role="alert">
			   			<?= validation_errors(); ?>
			   		</div>
			   <?php endif ?>		
			   <?php foreach($pekerjaan1 as $pmh) : ?>					 
			      <form action="" method="post">
				  <input type="hidden" name="id_mohon" value="<?= $pmh['id_mohon'] ?>">
					  <div class="form-group">
					    <label for="tanggal_pekerjaan">Tanggal Pekerjaan	: </label>
					    <input type="date" class="form-control" id="tanggal_pekerjaan" name="tanggal_pekerjaan" value="<?= $pmh['tanggal_pekerjaan']; ?>">
					  </div>					  
					  <div class="form-group">
                        <label>Penyulang</label>
                        <input type="hidden" name="id_selesai" value="<?= $pmh['id_selesai'] ?>">
							<SELECT name="id_penyulang" class="form-control">
							<OPTION value="<?= $pmh['id_penyulang'] ?>"><?= $pmh['nama_penyulang'] ?></OPTION>								                        				
							</SELECT>
                        </div>
					  <div class="form-group">
                      <input type="hidden" name="id_selesai" value="<?=  $pmh['id_selesai'] ?>">
                        <label>ULP</label>                        
							<SELECT name="id_ulp" class="form-control">
							<OPTION value="<?= $pmh['id_ulp'] ?>"><?= $pmh['nama_ulp'] ?></OPTION>										
							</SELECT>
                        </div>
					  <div class="form-group">
                        <label>PENGAWAS</label>
                        <input type="hidden" name="id_selesai" value="<?=  $pmh['id_selesai'] ?>">
							<SELECT name="id_pegawai" class="form-control">
							<OPTION value="<?= $pmh['id_pegawai'] ?>"><?= $pmh['nama'] ?></OPTION>                           					
							</SELECT>
                        </div>
					  <div class="form-group">
                        <label>VENDOR</label>
                        <input type="hidden" name="id_selesai" value="<?=  $pmh['id_selesai'] ?>">
							<SELECT name="id_vendor" class="form-control">
							<OPTION value="<?= $pmh['id_vendor'] ?>"><?= $pmh['nama_vendor'] ?></OPTION>				
							</SELECT>
						</div>						
                        <div class="form-group">
						<label for="pekerjaan">Pekerjaan	: </label>
						<!-- <textarea class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $pmh['pekerjaan'] ?>" ></textarea> -->
					    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $pmh['pekerjaan'] ?>">
					  </div>
					  <div class="form-group">
					    <label for="tanggal_pekerjaan">Jam Padam	: </label>
					    <input type="time" class="form-control" id="jam_padam" name="jam_padam" value="<?= $pmh['jam_padam'];?>" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong')" oninput="setCustomValidity('')">
					  </div>
					  <?php if($pmh['progres'] == 100 ) : ?>
					  <div class="form-group">
					    <label for="tanggal_pekerjaan">Jam Nyala	: </label>
					    <input type="time" class="form-control" id="jam_nyala" name="jam_nyala" value="<?= $pmh['jam_nyala']; ?>">
					  </div>
					  <?php endif ?>
					
						  
						  <div class="form-group" >
					  <label class="alert alert-info text-center" role="alert"><b>Progres Pekerjaan	: </b></label> <br>
						<div class="form-check form-check-inline mr-3">
							<?php if($pmh['id_progres1'] == 5 ) : ?>
							<input class="form-check-input" disabled type="checkbox" name="progres1" id="progres1" value="5">
							<label class="form-check-label" for="progres1">Cek Tegangan Padam, Pasang Grounding, APD lengkap</label>
							<input type="hidden" name="progres1" id="progres1" value="5">
							<?php endif ?> 
							<?php if($pmh['id_progres1'] != 5 ) : ?>
								<input class="form-check-input" type="checkbox" name="progres1" id="progres1" value="5">
							<label class="form-check-label" for="progres1">Cek Tegangan Padam, Pasang Grounding, APD lengkap</label>
							<?php endif ?>
						</div><br>
						<!-- batas 1 -->
						<div class="form-check form-check-inline mr-3">
							<?php if($pmh['id_progres2'] == 35 ) : ?>		
							<input class="form-check-input" disabled type="checkbox" name="progres2" id="progres2" value="35">
							<label class="form-check-label" for="progres2">Pekerjaan tahap awal</label>
							<input type="hidden" name="progres2" id="progres2" value="35">
							<?php endif ?> 
							<?php if($pmh['id_progres2'] != 35 ) : ?>		
							<input class="form-check-input" type="checkbox" name="progres2" id="progres2" value="35">
							<label class="form-check-label" for="progres2">Pekerjaan tahap awal</label>
							<?php endif ?> 
						</div><br> 
						<!-- batas 2 -->
						<div class="form-check form-check-inline mr-3">
							<?php if($pmh['id_progres3'] == 25 ) : ?>
							<input class="form-check-input" disabled type="checkbox" name="progres3" id="progres3" value="25">
							<label class="form-check-label" for="progres3">Pekerjaan tahap akhir</label>
							<input type="hidden" name="progres3" id="progres3" value="25">
							<?php endif ?>
							<?php if($pmh['id_progres3'] != 25 ) : ?>
							<input class="form-check-input" type="checkbox" name="progres3" id="progres3" value="25">
							<label class="form-check-label" for="progres3">Pekerjaan tahap akhir</label>
							<?php endif ?>
						</div><br>
					
						<!-- batas 3 -->
						<div class="form-check form-check-inline mr-3">
							<?php if($pmh['id_progres4'] == 10 ) : ?>
							<input class="form-check-input" disabled type="checkbox" name="progres4" id="progres4" value="10">
							<label class="form-check-label" for="progres4">Pelepasan Grounding</label>
							<input type="hidden" name="progres4" id="progres4" value="10">
							<?php endif ?>
							<?php if($pmh['id_progres4'] != 10 ) : ?>
								<input class="form-check-input" type="checkbox" name="progres4" id="progres4" value="10">
								<label class="form-check-label" for="progres4">Pelepasan Grounding</label>
								<?php endif ?>
							</div><br>
							<!-- batas 4 -->
							<div class="form-check form-check-inline mr-3">
							<?php if($pmh['id_progres5'] == 25 ) : ?>
							<input class="form-check-input" disabled type="checkbox" name="progres5" id="progres5" value="25">
							<label class="form-check-label" for="progres5">Penyalaan tegangan</label>
							<input type="hidden" name="progres5" id="progres5" value="25">
							<?php endif ?>
							<?php if($pmh['id_progres5'] != 25 ) : ?>
							<input class="form-check-input" type="checkbox" name="progres5" id="progres5" value="25">
							<label class="form-check-label" for="progres5">Penyalaan tegangan</label>
							<?php endif ?>
						</div>
						<!-- batas 5 -->

					




					  <div class="card-body">
					  <div class="form-group text-center" >
					  <label class="alert alert-warning text-center" role="alert"><b>Status Pekerjaan	: </b></label> <br>
					  <?php if($pmh['progres'] == 100 ) : ?>
					 	 <div class="form-check form-check-inline mr-3">
							<input class="form-check-input" disabled type="checkbox" name="id_status" id="keputusan" value="8">
							<label class="form-check-label" for="keputusan">Dalam Proses Pekerjaan</label>
						</div>
					  <?php endif ?>
					  <?php if($pmh['progres'] != 100 ) : ?>
					 	 <div class="form-check form-check-inline mr-3">
							<input class="form-check-input" type="checkbox" name="id_status" id="keputusan" value="8" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong')" oninput="setCustomValidity('')">
							<label class="form-check-label" for="keputusan">Dalam Proses Pekerjaan</label>
						</div>
					  <?php endif ?>

						<?php if($pmh['progres'] == 100 ) : ?>
						<div class="form-check form-check-inline mr-3">
							<input class="form-check-input" type="checkbox" name="id_status" id="keputusan" value="4" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong')" oninput="setCustomValidity('')">
							<label class="form-check-label" for="keputusan"><b>Pekerjaan Selesai</b></label>
						</div>	
						<?php endif ?>
					   </div>
					   </div>

                      <a href="<?= base_url();?>pekerjaan"class="btn btn-primary float-right ml-3">Kembali</a>
		   		      <button type="submit" name="submit" class="btn btn-primary float-right mb-5">ubah Data</button>
					</form>

                    <?php endforeach; ?>
			
			  </div>
			  
			
              </div>
		
		</div>
	</div>
</div>

