 <div class="container">
    <div class="row">
        

  <div class="col"><!--tampilan jika berasil menambah / mengubah data -->
            
            <a href="<?= base_url();?>pimpinan/permohonan/pdf" class="btn btn-warning mt-3 "><i class="fas fa-file mr-1"></i>Export PDF</a>         
        
        </div> 

        <div class="col"> <!-- membuat fitur pencarian -->
            <form class="form-inline float-right mt-3" action="" method="post">
                  <input class="form-control mr-sm-2" type="text" placeholder="Cari data Penyulang.." name="keyword" aria-label="Search">
                  <button class="btn btn-outline-primary my-2 my-sm-0" style="color: black" type="submit">Cari</button>
            </form>
        </div>    
    </div> <!-- akhir row -->
 </div> <!-- akhir container atas-->
 

        <div class="col-md-12 pl-5 mt-4 mb-5"> 
            <table class="table table-sm table-bordered" style="box-shadow: 6px 8px 6px 8px #aaaaaa;margin-top:5px;">
                        
          <div class="float-right"><?= $pagination; ?> </div>    

              <thead>
                <tr>                
                  <th class="text-center" scope="col">No</th>
                  <th class="text-center" scope="col">Status Permohonan</th>
                  <th class="text-center" scope="col">Tanggal Pekerjaan</th>
                  <th class="text-center" scope="col">ULP unit</th>
                  <th class="text-center" scope="col">Penyulang Padam</th>     
                  <th class="text-center" scope="col">Pekerjaan</th>           
                  <th class="text-center" scope="col">Pengawas</th>           
                  <th class="text-center" scope="col">Vendor Pelaksana</th>  
                  <th class="text-center" scope="col">AKSI</th>    
                </tr>
              </thead>
              <tbody>
              <?php foreach ( $permohonan as $pyl) : ?>
                <!-- <?php var_dump($pyl);?> -->
                <!--  -->
                <tr>
                <td class="text-center" scope="col"><?= ++$start;?> </td> 
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
                    <td class="text-center" scope="col"><?= $pyl['nama_vendor'] ;?> </td> 
                                   
                    <td class="text-center" scope="col ">
                      
                      <a href="<?= base_url();?>pimpinan/permohonan/detail/<?= $pyl['id_mohon'];?>"  
                      class="badge badge-primary ">Detail</a>
                      <?php if( ($pyl['status']) == "Belum Dicek") : ?>
                        <a href="<?= base_url();?>pimpinan/permohonan/keputusan/<?= $pyl['id_mohon'];?>"  
                      class="badge badge-warning ">Keputusan</a>
                    <?php endif; ?>
                      
                      </td>
                </tr>
                    
              <?php endforeach; ?>            
              </tbody>
            </table>
          

        </div> <!--akhir col konten tabel -->
