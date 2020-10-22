<div class="container ">
	<div class="row mt-3">
		<div class="col-md-12 ">
			<div class="card ">
			  <div class="card-header text-center"><b>Detail Pengajuan Pekerjaan Pemadaman</b></div>

			  <div class="card-body">
			  <!-- <?php var_dump($permohonan1); ?> -->
				
			  <?php foreach($permohonan1 as $pmh) : ?>
					 <table class="table">             
		              <tbody>	
					  <h4>PEKERJAAN </h4>	              
		                <tr>
		                	<td  scope="col">Tanggal Pelasanaan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pmh->tanggal_pekerjaan ?></td>
		                </tr>
		                <tr>
		                	<td  scope="col">ULP Pelaksana</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pmh->nama_ulp ?></td>
						</tr>
						<tr>
		                	<td  scope="col">Penyulang Padam</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pmh->nama_penyulang ?></td>
						</tr>
						<tr>
		                	<td  scope="col">Vendor Pelaksana</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pmh->nama_vendor ?></td>
		                </tr>
						<tr>
		                	<td  scope="col">Pengawas Pekerjaan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pmh->nama ?></td>
		                </tr>
						<tr>
		                	<td  scope="col">Detail Pekerjaan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pmh->pekerjaan ?></td>
		                </tr>
						
		              </tbody>
					</table>
				<?php endforeach; ?>
					
					<?php if (($this->session->userdata('role_id') == '1')) :?>
						<a href="<?= base_url();?>permohonan"class="btn btn-primary float-right">Kembali</a>
            		<?php endif;  ?>    
					<?php if (($this->session->userdata('role_id') == '2')) :?>
						<a href="<?= base_url();?>staff/permohonan"class="btn btn-primary float-right">Kembali</a>
            		<?php endif;  ?>    
			  </div>
			</div>
		</div>
	</div>
</div>

