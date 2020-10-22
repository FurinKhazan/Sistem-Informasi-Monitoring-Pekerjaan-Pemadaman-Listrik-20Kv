 <div class="container">
    <div class="row">
        <div class="col"> <!-- tombol tmbh -->
        <div class="float-left sm">
           <?php if (($this->session->userdata('role_id') == '2')) :?>                   
            <a href="<?= base_url();?>staff/permohonan/tambah" class="btn btn-primary mt-3 "><i class="fas fa-user-plus mr-1"></i>Tambah Pengajuan</a>         
          <?php endif;  ?>  
           <?php if (($this->session->userdata('role_id') == '1')) :?>                   
            <a href="<?= base_url();?>permohonan/tambah" class="btn btn-primary mt-3 "><i class="fas fa-user-plus mr-1"></i>Tambah Pengajuan</a>         
          <?php endif;  ?>  
          </div>
        <div class="float-left ml-2"> <!-- tombol tmbh -->     
          <?php if (($this->session->userdata('role_id') == '2')) :?>                   
            <a href="<?= base_url();?>staff/permohonan/pdf" class="btn btn-warning mt-3 "><i class="fas fa-file mr-1"></i>Export PDF</a>          
          <?php endif;  ?>          
          <?php if (($this->session->userdata('role_id') == '1')) :?>                   
            <a href="<?= base_url();?>permohonan/pdf" class="btn btn-warning mt-3 "><i class="fas fa-file mr-1"></i>Export PDF</a>          
          <?php endif;  ?>                      
        </div>
       </div>

  <div class="col"><!--tampilan jika berasil menambah / mengubah data -->
            <?php if ($this->session->flashdata() ) : ?> 
             <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">Data Permohonan Ijin Pekerjaan
                      <strong>berhasil</strong> <?= $this->session->flashdata('flash');?>.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
              </div> 
            <?php endif;?>
        </div> 

        <div class="col"> <!-- membuat fitur pencarian -->
            <form class="form-inline float-right mt-3" action="" method="post">
                  <input class="form-control mr-sm-1" type="text" placeholder="Cari data Pekerjaan.." name="keyword" aria-label="Search">
                  <button class="btn btn-outline-primary my-2 my-sm-0" style="color: black" type="submit">Cari</button>
            </form>
        </div>    
    </div> <!-- akhir row -->
 </div> <!-- akhir container atas-->
 

        <div class="col-md-12 pl-5 mt-4 mb-5"> 
        <?php if (($this->session->userdata('role_id') == '1')) :?>                   
          <div class="float-right"><?= $pagination; ?> </div>    
        <?php endif;  ?>      
        <?php if (($this->session->userdata('role_id') == '2')) :?>                   
          <div class="float-right"><?= $pagination1; ?> </div>    
        <?php endif;  ?>      

      
            <table class="table table-sm table-bordered" style="box-shadow: 6px 8px 6px 8px #aaaaaa;">
              <thead>
                <tr>                
                  <th class="text-center" scope="col">NO</th>  
                  <th class="text-center" scope="col">Status Permohonan</th>
                  <th class="text-center" scope="col">Tanggal Pekerjaan</th>
                  <th class="text-center" scope="col">ULP unit</th>
                  <th class="text-center" scope="col">Penyulang Padam</th>     
                  <th class="text-center" scope="col">Pekerjaan</th>           
                  <th class="text-center" scope="col">Pengawas</th>           
                  <!-- <th class="text-center" scope="col">Vendor Pelaksana</th>   -->
                  <th class="text-center" scope="col">AKSI</th>    
                </tr>
              </thead>
              <tbody>
              <?php foreach ( $permohonan as $pyl) : ?>
                <!-- <?php var_dump($pyl);?> -->
                <!--  -->
                <tr>
                    <td scope="col"><?= ++$start ?></td>
                    <td class="text-center" scope="col"><?php if( ($pyl['status']) == "Dicek") : ?>
                      <div class="alert alert-success" role="alert">
                        <?= $pyl['status']; ?> 
                      </div>
                    <?php endif; ?> 
                    <?php if( ($pyl['status']) == "Belum Dicek") : ?>
                      <div class="alert alert-danger" role="alert">
                        <?= $pyl['status']; ?> 
                      </div>
                    <?php endif; ?>
                  </td> 
                  
                    <td class="text-center" scope="col"><?= $pyl['tanggal_pekerjaan'];?> </td> 
                    <td class="text-center" scope="col"><?= $pyl['nama_ulp'] ;?> </td>       
                    <td class="text-center" scope="col"><?= $pyl['nama_penyulang'] ;?> </td>   
                    <td class="text-center" scope="col"><?= $pyl['pekerjaan'];?> </td>  
                    <td class="text-center" scope="col"><?= $pyl['nama'] ;?> </td>      
                    <!-- <td class="text-center" scope="col"><?= $pyl['nama_vendor'] ;?> </td>  -->
                                   
                    <td class="text-center" scope="col ">
                     

                    <?php if (($this->session->userdata('role_id') == '3')) :?>                   
                      <?php if( ($pyl['status']) == "Belum Dicek") : ?>
                        <a href="<?= base_url();?>pimpinan/permohonan/keputusan/<?= $pyl['id_mohon'];?>"  
                      class="badge badge-warning ">Keputusan</a>
                    <?php endif; ?> 
                    <a href="<?= base_url();?>pimpinan/permohonan/detail/<?= $pyl['id_mohon'];?>"  
                      class="badge badge-primary ">Detail</a>          
                      <?php endif;  ?>   

                    <?php if (($this->session->userdata('role_id') == '2')) :?>                   
                      <!-- <a href="<?= base_url();?>staff/permohonan/hapus/<?= $pyl['id_mohon'];?>"  
                      class="badge badge-danger " onclick="return confirm ('Apakah anda yakin ?');">Hapus</a> -->
                      <a href="<?= base_url();?>staff/permohonan/ubah/<?= $pyl['id_mohon'];?>"  
                      class="badge badge-success ">Ubah</a>
                      <a href="<?= base_url();?>staff/permohonan/detail/<?= $pyl['id_mohon'];?>"  
                      class="badge badge-primary ">Detail</a>                                   
                      <?php endif;  ?>      
                      
                     <?php if (($this->session->userdata('role_id') == '1')) :?>                 
                      <!-- <a href="<?= base_url();?>permohonan/hapus/<?= $pyl['id_mohon'];?>"  
                      class="badge badge-danger " onclick="return confirm ('Apakah anda yakin ?');">Hapus</a> -->
                      <a href="<?= base_url();?>permohonan/ubah/<?= $pyl['id_mohon'];?>"  
                      class="badge badge-success ">Ubah</a>
                      <a href="<?= base_url();?>permohonan/detail/<?= $pyl['id_mohon'];?>"  
                      class="badge badge-primary ">Detail</a>
                          <?php if( ($pyl['status']) == "Belum Dicek") : ?>
                            <a href="<?= base_url();?>permohonan/keputusan/<?= $pyl['id_mohon'];?>"  
                          class="badge badge-warning ">Keputusan</a>
                        <?php endif; ?>                           
                     <?php endif;?>   
                      
                      </td>
                </tr>
                    
              <?php endforeach; ?>            
              </tbody>
            </table>
          

        </div> <!--akhir col konten tabel -->
