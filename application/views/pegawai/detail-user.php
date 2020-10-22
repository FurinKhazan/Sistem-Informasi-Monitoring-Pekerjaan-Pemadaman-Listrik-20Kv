<div class="container ">
	<div class="row mt-3">
		<div class="col-md-12 ">
			<div class="card ">
			  <div class="card-header text-center"><b>Detail Data Pegawai</b></div>

			  <div class="card-body">
			  

					 <table class="table">             
		              <tbody>		              
		                <tr>
		                	<td  scope="col">Nama</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pegawai['nama'];?></td>
		                </tr>
		                <tr>
		                	<td  scope="col">NIP</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pegawai['nip'];?></td>
		                </tr>
		                <tr>
		                	<td  scope="col">Email</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pegawai['email'];?></td>
		                </tr>
		                <tr>
		                	<td  scope="col">Jabatan</td>
		                	<td  scope="col">:</td>
		                 	<td scope="col"><?= $pegawai['jabatan'];?></td>
		                </tr>  		               
		              </tbody>
		            </table>
		            <?php if (($this->session->userdata('role_id') == '3')) : ?>
        				 <a href="<?= base_url();?>pimpinan/pegawai"class="btn btn-primary float-right">Kembali</a>;                 
					<?php endif; ?>
					<?php if (($this->session->userdata('role_id') == '2')) : ?>
        				 <a href="<?= base_url();?>staff/pegawai"class="btn btn-primary float-right">Kembali</a>;                 
					<?php endif; ?>
		            
			  </div>
			</div>
		</div>
	</div>
</div>

