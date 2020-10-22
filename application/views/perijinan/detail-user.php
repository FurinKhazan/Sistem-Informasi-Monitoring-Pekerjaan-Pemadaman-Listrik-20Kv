<div class="container ">
	<div class="row mt-3">
		<div class="col-md-12 ">
			<div class="card ">
			  <div class="card-header text-center"><b>Detail Status Perijinan Pekerjaan</b></div>

			  <div class="card-body">
				
			 
					 <table class="table">             
		              <tbody>	
					  <h4>1. PEKERJAAN </h4>	              
		                <tr>
		                	<td  scope="col">Tanggal Pelasanaan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $permohonan1[0]['tanggal_pekerjaan'] ?></td>
		                </tr>
		                <tr>
		                	<td  scope="col">ULP Pelaksana</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $permohonan1[0]['nama_ulp'] ?></td>
						</tr>
						<tr>
		                	<td  scope="col">Penyulang Padam</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $permohonan1[0]['nama_penyulang'] ?></td>
						</tr>
						<tr>
		                	<td  scope="col">Vendor Pelaksana</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $permohonan1[0]['nama_vendor'] ?></td>
		                </tr>
						<tr>
		                	<td  scope="col">Pengawas Pekerjaan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $permohonan1[0]['nama'] ?></td>
		                </tr>
						<tr>
		                	<td  scope="col">Detail Pekerjaan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $permohonan1[0]['pekerjaan']?></td>
		                </tr>
						<tr>
		                	<td  scope="col">Status Perijinan Pekerjaan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><b><?= $permohonan1[0]['status']?></b></td>
		                </tr>
						
		              </tbody>
					</table>
			
					<?php if (($this->session->userdata('role_id') == '3')) : ?>
        				 <a href="<?= base_url();?>pimpinan/perijinan"class="btn btn-primary float-right">Kembali</a>                 
					<?php endif; ?>
					<?php if (($this->session->userdata('role_id') == '2')) : ?>
        				 <a href="<?= base_url();?>staff/perijinan"class="btn btn-primary float-right">Kembali</a>                
					<?php endif; ?>
			  </div>
			</div>
		</div>
	</div>
</div>

