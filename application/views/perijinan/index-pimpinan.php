<div class="container">
    <div class="row">
       
    <div class="col"> <!-- tombol tmbh -->             
            <a href="<?= base_url();?>pimpinan/perijinan/pdf" class="btn btn-warning mt-3 "><i class="fas fa-file mr-1"></i>Export PDF</a>         
          </div>
  <div class="col"><!--tampilan jika berasil menambah / mengubah data -->
            <?php if ($this->session->flashdata() ) : ?> 
             <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">Data Ijin Pekerjaan
                      <strong>berhasil</strong> <?= $this->session->flashdata('flash');?>.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
              </div> 
            <?php endif;?>
        </div> 

        <div class="col"> <!-- membuat fitur pencarian -->
            <form class="form-inline float-right mt-3" action="" method="post">
                  <input class="form-control mr-sm-2" type="text" placeholder="Cari data Penyulang.." name="keyword" aria-label="Search">
                  <button class="btn btn-outline-primary my-2 my-sm-0" style="color: black" type="submit">Cari</button>
            </form>
        </div>    
    </div> <!-- akhir row -->
 </div> <!-- akhir container atas-->
 

        <div class="col-md-12 pl-5 mt-4 mb-5 mr-3"> 
            <table class="table table-sm table-bordered" style="box-shadow: 6px 8px 6px 8px #aaaaaa;">
              <thead>
                <tr>                
                  <th class="text-center" scope="col">Tanggal Pekerjaan</th>
                  <th class="text-center" scope="col">ULP unit</th>
                  <th class="text-center" scope="col">Penyulang Padam</th>     
                  <th class="text-center" scope="col">Pekerjaan</th>           
                  <th class="text-center" scope="col">Pengawas</th>           
                  <th class="text-center" scope="col">Vendor Pelaksana</th>  
                  <th class="text-center" scope="col">Status</th>  
                  <th class="text-center" scope="col">AKSI</th>    
                </tr>
              </thead>
              <tbody>
              <?php foreach ( $perijinan as $pyl) : ?>
                <!-- <?php var_dump($pyl);?> -->
                <!--  -->
                <tr>
  
                    <td class="text-center" scope="col"><?= $pyl['tanggal_pekerjaan'];?> </td> 
                    <td class="text-center" scope="col"><?= $pyl['nama_ulp'] ;?> </td>       
                    <td class="text-center" scope="col"><?= $pyl['nama_penyulang'] ;?> </td>   
                    <td class="text-center" scope="col"><?= $pyl['pekerjaan'];?> </td>  
                    <td class="text-center" scope="col"><?= $pyl['nama'] ;?> </td>      
                    <td class="text-center" scope="col"><?= $pyl['nama_vendor'] ;?> </td> 
                    <td class="text-center" scope="col">
                    <?php if( ($pyl['status']) == "Disetujui") : ?>
                      <div class="alert alert-success" role="alert">
                        <?= $pyl['status']; ?> 
                      </div>
                    <?php endif; ?> 
                    <?php if( ($pyl['status']) == "Akan Dikerjakan") : ?>
                      <div class="alert alert-info" role="alert">
                        <?= $pyl['status']; ?> 
                      </div>
                    <?php endif; ?> 
                    <?php if( ($pyl['status']) == "Ditolak") : ?>
                      <div class="alert alert-danger" role="alert">
                        <?= $pyl['status']; ?> 
                      </div>
                    <?php endif; ?>
                    <?php if( ($pyl['status']) == "Ditunda") : ?>
                      <div class="alert alert-warning" role="alert">
                        <?= $pyl['status']; ?> 
                      </div>
                    <?php endif; ?></td> 
                                   
                    <td class="text-center" scope="col ">
                      
                      <a href="<?= base_url();?>pimpinan/perijinan/detail/<?= $pyl['id_ijin'];?>"  
                      class="badge badge-primary ">Detail</a>
                      </td>
                </tr>
                    
              <?php endforeach; ?>            
              </tbody>
            </table>

        </div> 
