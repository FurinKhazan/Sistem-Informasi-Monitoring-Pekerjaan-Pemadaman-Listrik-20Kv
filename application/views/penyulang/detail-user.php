<div class="container ">
	<div class="row mt-3">
		<div class="col-md-12 ">
			<div class="card ">
			  <div class="card-header text-center"><b>Detail Data Penyulang</b></div>

			  <div class="card-body">
			  
			  <?php foreach ( $penyulang as $pyl) : ?>
					 <table class="table">             
		              <tbody>		              
		                <tr>
		                	<td  scope="col">Nama Penyulang</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pyl['nama_penyulang'];?></td>
		                </tr>
		                <tr>
		                	<td  scope="col">Nama Gardu Induk</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pyl['nama_gardu'] ;?></td>
						</tr>
						<tr>
		                	<td  scope="col">Panjang Jaringan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pyl['kms'];?> Kilometer</td>
		                </tr>	     
		                		              		               
		              </tbody>
					</table>
					<?php endforeach;?>
					<?php if (($this->session->userdata('role_id') == '3')) : ?>
        				 <a href="<?= base_url();?>pimpinan/penyulang"class="btn btn-primary float-right">Kembali</a>;                 
					<?php endif; ?>
					<?php if (($this->session->userdata('role_id') == '2')) : ?>
        				 <a href="<?= base_url();?>staff/penyulang"class="btn btn-primary float-right">Kembali</a>;                 
					<?php endif; ?>
		            
			  </div>
			</div>
		</div>
	</div>
</div>

