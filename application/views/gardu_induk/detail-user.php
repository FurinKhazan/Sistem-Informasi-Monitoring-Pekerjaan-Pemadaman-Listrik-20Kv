<div class="container ">
	<div class="row mt-3">
		<div class="col-md-12 ">
			<div class="card ">
			  <div class="card-header text-center"><b>Detail Data Gardu Induk</b></div>

			  <div class="card-body">
			  

					 <table class="table">             
		              <tbody>		              
		                <tr>
		                	<td  scope="col">Nama</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $gardu_induk['nama_gardu'];?></td>
		                </tr>
		                <tr>
		                	<td  scope="col">Alamat</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $gardu_induk['alamat'];?></td>
		                </tr>
		              		               
		              </tbody>
		            </table>
		            <?php if (($this->session->userdata('role_id') == '3')) : ?>
        				 <a href="<?= base_url();?>pimpinan/gardu_induk"class="btn btn-primary float-right">Kembali</a>;                 
					<?php endif; ?>
					<?php if (($this->session->userdata('role_id') == '2')) : ?>
        				 <a href="<?= base_url();?>staff/gardu_induk"class="btn btn-primary float-right">Kembali</a>;                 
					<?php endif; ?>
		            
			  </div>
			</div>
		</div>
	</div>
</div>

