<div class="container ">
	<div class="row mt-3">
		<div class="col-md-12 ">
			<div class="card ">
			  <div class="card-header text-center"><b>Detail Data Gardu Induk</b></div>

			  <div class="card-body">
			  <!-- <?php var_dump($permohonan1); ?> -->
				
			  <?php foreach($permohonan1 as $pmh) : ?>
					 <table class="table">             
		              <tbody>	
					  <h4>PEKERJAAN </h4>	              
		                <tr>
		                	<td  scope="col">Tanggal Pelasanaan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pmh['tanggal_pekerjaan'] ?></td>
		                </tr>
		                <tr>
		                	<td  scope="col">ULP Pelaksana</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pmh['nama_ulp'] ?></td>
						</tr>
						<tr>
		                	<td  scope="col">Penyulang Padam</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pmh['nama_penyulang'] ?></td>
						</tr>
						<tr>
		                	<td  scope="col">Vendor Pelaksana</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pmh['nama_vendor'] ?></td>
		                </tr>
						<tr>
		                	<td  scope="col">Pengawas Pekerjaan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pmh['nama'] ?></td>
		                </tr>
						<tr>
		                	<td  scope="col">Detail Pekerjaan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pmh['pekerjaan'] ?></td>
		                </tr>
						<tr>
		                	<td  scope="col">Status Perjinan Pekerjaan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pmh['status'] ?></td>
		                </tr>

						
		              </tbody>
					</table>
				<?php endforeach; ?>
		            <a href="<?= base_url();?>perijinan"class="btn btn-primary float-right">Kembali</a>
			  </div>
			</div>
		</div>
	</div>
</div>

