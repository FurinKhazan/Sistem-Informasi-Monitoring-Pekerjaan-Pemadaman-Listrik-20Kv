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
			      <form action="" method="post">
					  <div class="form-group">
					    <label for="tanggal_pekerjaan">Tanggal Pekerjaan	: </label>
					    <input type="date" class="form-control" id="tanggal_pekerjaan" name="tanggal_pekerjaan">
					  </div>

					  <div class="form-group">
						<label>Penyulang</label>
							<SELECT name="id_penyulang" class="form-control">
							<OPTION value="<?php echo isset($bahan[0]['id_penyulang'])?$bahan[0]['id_penyulang']:'';?>">
							<?php echo isset($bahan[0]['nama_penyulang'])?$bahan[0]['nama_penyulang']:'-PILIH-';?></OPTION>
								<?php
									if(!empty($penyulang))
									{
										foreach($penyulang as $data)
										{
										$id_penyulang=$data['id_penyulang'];
										$nama_penyulang=$data['nama_penyulang'];
								?>	

								<OPTION value="<?php echo $id_penyulang;?>"><?php echo $nama_penyulang;?></OPTION>
								<?php
									}
													}
								?>		
							</SELECT>
						</div>

					  <div class="form-group">
						<label>ULP</label>
							<SELECT name="id_ulp" class="form-control">
							<OPTION value="<?php echo isset($bahan[0]['id_ulp'])?$bahan[0]['id_ulp']:'';?>">
							<?php echo isset($bahan[0]['nama_ulp'])?$bahan[0]['nama_ulp']:'-PILIH-';?></OPTION>
								<?php
									if(!empty($ulp))
									{
										foreach($ulp as $data)
										{
										$id_ulp=$data['id'];
										$nama_ulp=$data['nama_ulp'];
								?>	

								<OPTION value="<?php echo $id_ulp;?>"><?php echo $nama_ulp;?></OPTION>
								<?php
									}
													}
								?>		
							</SELECT>
						</div>

					  <div class="form-group">
						<label>Pengawas</label>
							<SELECT name="id_pegawai" class="form-control">
							<OPTION value="<?php echo isset($bahan[0]['id_pegawai'])?$bahan[0]['id_pegawai']:'';?>">
							<?php echo isset($bahan[0]['nama_pegawai'])?$bahan[0]['nama_pegawai']:'-PILIH-';?></OPTION>
								<?php
									if(!empty($pegawai))
									{
										foreach($pegawai as $data)
										{
										$id_pegawai=$data['id'];
										$nama_pegawai=$data['nama'];
								?>	

								<OPTION value="<?php echo $id_pegawai;?>"><?php echo $nama_pegawai;?></OPTION>
								<?php
									}
													}
								?>		
							</SELECT>
						</div>

					  <div class="form-group">
						<label>Vendor</label>
							<SELECT name="id_vendor" class="form-control">
							<OPTION value="<?php echo isset($bahan[0]['id_vendor'])?$bahan[0]['id_vendor']:'';?>">
							<?php echo isset($bahan[0]['nama_vendor'])?$bahan[0]['nama_vendor']:'-PILIH-';?></OPTION>
								<?php
									if(!empty($vendor))
									{
										foreach($vendor as $data)
										{
										$id_vendor=$data['id'];
										$nama_vendor=$data['nama_vendor'];
								?>	

								<OPTION value="<?php echo $id_vendor;?>"><?php echo $nama_vendor;?></OPTION>
								<?php
									}
													}
								?>		
							</SELECT>
						</div>
						<div class="form-group">
					    <label for="pekerjaan">Pekerjaan	: </label>
						<textarea class="form-control" id="pekerjaan" name="pekerjaan" placeholder="isi uraian pekerjaan..." aria-label="With textarea"></textarea>				    
					    </div>
		   		      <button type="submit" name="submit" class="btn btn-primary float-right mb-5">Tambah Data</button>
		          </form>
				</blockquote>
			  </div>
			</div>
		
		</div>
	</div>
</div>

