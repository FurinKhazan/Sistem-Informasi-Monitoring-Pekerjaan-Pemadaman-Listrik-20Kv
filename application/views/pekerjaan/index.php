<div class="container">
    <div class="row">
  
        <div class="col"> <!-- tombol tmbh -->     
          <?php if (($this->session->userdata('role_id') == '2')) :?>                   
            <a href="<?= base_url();?>staff/pekerjaan/pdf" class="btn btn-warning mt-3 "><i class="fas fa-file mr-1"></i>Export PDF</a>          
          <?php endif;  ?>          
          <?php if (($this->session->userdata('role_id') == '1')) :?>                   
            <a href="<?= base_url();?>pekerjaan/pdf" class="btn btn-warning mt-3 "><i class="fas fa-file mr-1"></i>Export PDF</a>          
          <?php endif;  ?>                      
          <?php if (($this->session->userdata('role_id') == '3')) :?>                   
            <a href="<?= base_url();?>pimpinan/pekerjaan/pdf" class="btn btn-warning mt-3 "><i class="fas fa-file mr-1"></i>Export PDF</a>          
          <?php endif;  ?>                      
        </div>

  <div class="col"><!--tampilan jika berasil menambah / mengubah data -->
            <?php if ($this->session->flashdata() ) : ?> 
             <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">Data Progres Pekerjaan
                      <strong>berhasil</strong> <?= $this->session->flashdata('flash');?>.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
              </div> 
            <?php endif;?>
        </div> 
        <div class="col"> <!-- membuat fitur pencarian -->
            <form class="form-inline float-right mt-3" action="" method="post">
                  <input class="form-control mr-sm-2" type="text" placeholder="Cari data Pekerjaan.." name="keyword" aria-label="Search">
                  <button class="btn btn-outline-primary my-2 my-sm-0" style="color: black" type="submit">Cari</button>
            </form>
        </div>    
    </div> <!-- akhir row -->
 </div> <!-- akhir container atas-->
 <!-- <?php var_dump($Pekerjaan);?> -->

        <div class="col-md-12 pl-5 mt-4 mb-5 mr-3"> 
        <div class="float-right"><?= $pagination; ?> </div>
       
            <table class="table table-bordered" style="box-shadow: 6px 8px 6px 8px #aaaaaa;">
              <thead>
                <tr>   
                  <th class="text-center" scope="col">NO</th>             
                  <th class="text-center" scope="col">Tanggal Pekerjaan</th>
                  <th class="text-center" scope="col">ULP unit</th>
                  <th class="text-center" scope="col">Penyulang Padam</th>     
                  <th class="text-center" scope="col">Pekerjaan</th>           
                  <th class="text-center" scope="col">Pengawas</th>           
                  <th class="text-center" scope="col">Vendor Pelaksana</th>  
                  <th class="text-center" scope="col">Status</th>  
                  <th class="text-center" scope="col">AKSI</th>   
                  <th class="text-center" scope="col">Progres</th>   

                </tr>
              </thead>
              <tbody>
              <?php foreach ( $Pekerjaan as $pyl) : ?>
                
                <tr>
                    <td scope="col"><?= ++$start ?></td>
                    <td class="text-center" scope="col"><?= $pyl['tanggal_pekerjaan'];?> </td> 
                    <td class="text-center" scope="col"><?= $pyl['nama_ulp'] ;?> </td>       
                    <td class="text-center" scope="col"><?= $pyl['nama_penyulang'] ;?> </td>   
                    <td class="text-center" scope="col"><?= $pyl['pekerjaan'];?> </td>  
                    <td class="text-center" scope="col"><?= $pyl['nama'] ;?> </td>      
                    <td class="text-center" scope="col"><?= $pyl['nama_vendor'] ;?> </td> 
                    <td class="text-center" scope="col">
                          <?php if( ($pyl['status']) == "Selesai") : ?>
                            <div class="alert alert-success" role="alert">
                              <?= $pyl['status']; ?> <i class="fas fa-check-circle"></i>
                            </div>
                          <?php endif; ?> 
                          <?php if( ($pyl['status']) == "Akan Dikerjakan") : ?>
                            <div class="alert alert-primary" role="alert">
                              <?= $pyl['status']; ?> 
                            </div>
                          <?php endif; ?> 
                      
                          <?php if( ($pyl['status']) == "Dalam Proses") : ?>
                            <div class="alert alert-warning" role="alert">
                              <?= $pyl['status']; ?> 
                            </div>
                          <?php endif; ?>
                    </td> 
                    <td class="text-center" scope="col ">                    
                          <?php if (($this->session->userdata('role_id') == '2')) :?>   <!-- untuk STAFF -->                 
                              <a href="<?= base_url();?>staff/pekerjaan/hapus/<?= $pyl['id_selesai'];?>"  
                              class="badge badge-danger " onclick="return confirm ('Apakah anda yakin ?');">Hapus</a>               
                          <?php endif;  ?>                         
                          <?php if (($this->session->userdata('role_id') == '1')) :?>   <!-- untuk ADMIN -->                 
                              <a href="<?= base_url();?>pekerjaan/hapus/<?= $pyl['id_selesai'];?>"  
                              class="badge badge-danger " onclick="return confirm ('Apakah anda yakin ?');">Hapus</a>               
                          <?php endif;  ?>                         
                          <?php if (($this->session->userdata('role_id') == '3')) :?>
                          <a href="<?= base_url();?>pimpinan/pekerjaan/detail/<?= $pyl['id_selesai'];?>"  
                            class="badge badge-primary ">Detail</a>             
                        <?php endif;  ?>      
                      
                        <?php if (($this->session->userdata('role_id') == '2')) :?>  <!-- untuk staff -->
                          <a href="<?= base_url();?>staff/pekerjaan/detail/<?= $pyl['id_selesai'];?>"  
                            class="badge badge-primary ">Detail</a>  
                            <?php if (( ($pyl['status']) == "Dalam Proses")) : ?>
                              <a href="<?= base_url();?>staff/pekerjaan/keputusan/<?= $pyl['id_selesai'];?>"  
                            class="badge badge-success ">Update Progres</a>
                          <?php endif; ?>
                            <?php if (( ($pyl['status']) == "Akan Dikerjakan")) : ?>
                              <a href="<?= base_url();?>staff/pekerjaan/keputusan/<?= $pyl['id_selesai'];?>"  
                            class="badge badge-success ">Update Progres</a>
                          <?php endif; ?>    
                        <?php endif;  ?>      
                      
                        <?php if (($this->session->userdata('role_id') == '1')) :?> <!-- untuk admin -->
                        <a href="<?= base_url();?>pekerjaan/detail/<?= $pyl['id_selesai'];?>"  
                          class="badge badge-primary ">Detail</a> 
                          <?php if (( ($pyl['status']) == "Dalam Proses")) : ?>
                              <a href="<?= base_url();?>pekerjaan/keputusan/<?= $pyl['id_selesai'];?>"  
                            class="badge badge-success ">Update Progres</a>
                          <?php endif; ?>
                            <?php if (( ($pyl['status']) == "Akan Dikerjakan")) : ?>
                              <a href="<?= base_url();?>pekerjaan/keputusan/<?= $pyl['id_selesai'];?>"  
                            class="badge badge-success ">Update Progres</a>
                          <?php endif; ?>         
                      <?php endif;  ?>      
                      </td> 
                      


                      <td class="text-center" scope="col ">
                          <h3><?= $pyl['progres'] ?>%</h3>
                      </td>
                </tr>
                    
              <?php endforeach; ?>            
              </tbody>
            </table>

        </div> 
