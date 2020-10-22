<div class="container ">
	<div class="row mt-3">
		<div class="col-md-12 mb-4 ">
			<div class="card ">
			  <div class="card-header text-center"><b>Detail Pekerjaan Yang Dikerjakan</b></div>

			  <div class="card-body">
			  
					 <table class="table">             
		              <tbody>	
					  <h4>PEKERJAAN </h4>	              
		                <tr>
		                	<td  scope="col">Tanggal Pelasanaan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $Pekerjaan[0]['tanggal_pekerjaan']; ?></td>
		                </tr>
		                <tr>
		                	<td  scope="col">ULP Pelaksana</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $Pekerjaan[0]['nama_ulp']; ?></td>
						</tr>
						<tr>
		                	<td  scope="col">Penyulang Padam</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $Pekerjaan[0]['nama_penyulang'] ?></td>
						</tr>
						<tr>
		                	<td  scope="col">Vendor Pelaksana</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $Pekerjaan[0]['nama_vendor'] ?></td>
		                </tr>
						<tr>
		                	<td  scope="col">Pengawas Pekerjaan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $Pekerjaan[0]['nama'] ?></td>
		                </tr>
						<tr>
		                	<td  scope="col">Detail Pekerjaan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $Pekerjaan[0]['pekerjaan'] ?></td>
						</tr>
						<label for="Jam Pekerjaan"> </label>
						<tr>
		                	<td  scope="col">Jam Padam</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $Pekerjaan[0]['jam_padam'] ?></td>
		                </tr>
						<tr>
		                	<td  scope="col">Jam Nyala</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?php if($Pekerjaan[0]['jam_nyala'] == "00:00:00") {
								 echo "Jaringan Masih Padam";
							 } else {echo $Pekerjaan[0]['jam_nyala'];}?></td>
		                </tr>
						<tr>
		                	<td  scope="col">Progres Pekerjaan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $Pekerjaan[0]['progres'] ?>% ( <?php if($Pekerjaan[0]['progres'] == 5){
								 echo "<i>Cek Tegangan Padam, Pasang Grounding, & pengecekan APD lengkap</i>";
							 } elseif($Pekerjaan[0]['progres'] == 40){
								 echo "<i?>Pekerjaan tahap awal</i>";
								} elseif($Pekerjaan[0]['progres'] == 65){
								 echo "<i>Pekerjaan tahap akhir</i>";
								 } elseif ($Pekerjaan[0]['progres'] == 75){
								  echo "<i>Pelepasan Grounding</i>";
								  } elseif($Pekerjaan[0]['progres'] == 100){
								  echo "<i>Pekerjaan Selesai</i>";}?>)</td>
		                </tr>
						
		              </tbody>
					</table>
				
					<?php if (($this->session->userdata('role_id') == '3')) : ?>
        				 <a href="<?= base_url();?>pimpinan/pekerjaan"class="btn btn-primary float-right">Kembali</a>                 
					<?php endif; ?>
					<?php if (($this->session->userdata('role_id') == '2')) : ?>
        				 <a href="<?= base_url();?>staff/pekerjaan"class="btn btn-primary float-right">Kembali</a>                
					<?php endif; ?>
					<?php if (($this->session->userdata('role_id') == '1')) : ?>
        				 <a href="<?= base_url();?>pekerjaan"class="btn btn-primary float-right">Kembali</a>                
					<?php endif; ?>
			  </div>
			</div>
		</div>
	</div>
</div>

