<div class="container">
	<div class="row-mt-3">
		<div class="col-md-12">
			
			<div class="card mt-4">
			  <div class="card-header">
			    TAMBAH DATA PENYULANG
			  </div>
			  <div class="card-body">
			   <?php if (validation_errors()) : ?>
			   		<div class="alert alert-danger" role="alert">
			   			<?= validation_errors(); ?>
			   		</div>
			   <?php endif ?>
			      <form action="" method="post">
					  <div class="form-group">
					    <label for="nama_ulp">Nama Penyulang	: </label>
					    <input type="text" class="form-control" id="nama_penyulang" name="nama_penyulang" placeholder="Isi nama . .">
					  </div>

						 <div class="form-group">
									<label>Gardu Induk</label>
										<SELECT name="id_gi" class="form-control">
											<OPTION value="<?php echo isset($bahan[0]['id_gi'])?$bahan[0]['id_gi']:'';?>">
											<?php echo isset($bahan[0]['nama_gardu'])?$bahan[0]['nama_gardu']:'-PILIH-';?></OPTION>
											<?php
												if(!empty($gardu_induk))
													{
														foreach($gardu_induk as $data)
														{
															$id_gi=$data['id_gi'];
															$nama_gardu=$data['nama_gardu'];
													?>	

														<OPTION value="<?php echo $id_gi;?>"><?php echo $nama_gardu;?></OPTION>
													<?php
														}
													}
													?>		
										</SELECT>
						</div>
						<div class="form-group">
					    <label for="kms">Panjang Penyulang	: </label>
					    <input type="text" class="form-control" id="kms" name="kms" placeholder="Isi data . .">
					  </div>
					  
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