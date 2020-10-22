<div class="container ">
	<div class="row mt-3">
		<div class="col-md-12 ">
			<div class="card ">
			  <div class="card-header text-center"><b>Detail Data Vendor</b></div>

			  <div class="card-body">
			  

					 <table class="table">             
		              <tbody>		              
		                <tr>
		                	<td  scope="col">Nama Vendor</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $vendor['nama_vendor'];?></td>
		                </tr>
		                <tr>
		                	<td  scope="col">Alamat</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $vendor['alamat'];?></td>
		                </tr>
		                <tr>
		                	<td  scope="col">Email</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $vendor['email'];?></td>
		                </tr>
		                <tr>
		                	<td  scope="col">Telepon</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $vendor['telepon'];?></td>
		                </tr>
		                <tr>
		                	<td  scope="col">Keterangan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $vendor['keterangan'];?></td>
		                </tr>
		                		              		               
		              </tbody>
		            </table>
					
					<?php if (($this->session->userdata('role_id') == '1')) :?>                   
						<a href="<?= base_url();?>vendor"class="btn btn-primary float-right">Kembali</a>            
                      <?php endif;  ?>      
					  
			  </div>
			</div>
		</div>
	</div>
</div>

