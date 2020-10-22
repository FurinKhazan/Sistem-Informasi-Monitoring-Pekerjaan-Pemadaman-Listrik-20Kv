<div class="container ">
	<div class="row mt-3">
		<div class="col-md-12 ">
			<div class="card ">
			  <div class="card-header text-center"><b>Detail Data ULP</b></div>

			  <div class="card-body">
			  

					 <table class="table">             
		              <tbody>		              
		                <tr>
		                	<td  scope="col">Nama</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $ulp['nama_ulp'];?></td>
		                </tr>
		                <tr>
		                	<td  scope="col">Alamat</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $ulp['alamat'];?></td>
		                </tr>
		                <tr>
		                	<td  scope="col">No Telepon</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $ulp['telepon'];?></td>
		                </tr>		              		               
	        
		                <tr>
		                	<td  scope="col">Wilayah Kerja</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $ulp['wilker'];?></td>
		                </tr>		              		               
		              </tbody>
		            </table>
					
					<?php if (($this->session->userdata('role_id') == '1')) :?>                   
						<a href="<?= base_url();?>ulp"class="btn btn-primary float-right">Kembali</a>
                      <?php endif;  ?>      
					<?php if (($this->session->userdata('role_id') == '2')) :?>                   
						<a href="<?= base_url();?>staff/ulp"class="btn btn-primary float-right">Kembali</a>
                      <?php endif;  ?>      
					<?php if (($this->session->userdata('role_id') == '3')) :?>                   
						<a href="<?= base_url();?>pimpinan/ulp"class="btn btn-primary float-right">Kembali</a>
                      <?php endif;  ?>      
			  </div>
			</div>
		</div>
	</div>
</div>

