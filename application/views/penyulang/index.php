 <div class="container">
    <div class="row">
        <div class="col"> <!-- tombol tmbh -->
        <?php if (($this->session->userdata('role_id') == '1')) :?>                   
          <a href="<?= base_url();?>penyulang/tambah" class="btn btn-primary mt-3 "><i class="fas fa-user-plus mr-1"></i>Tambah Data Penyulang</a>             
         <?php endif;  ?>
           
        </div>

        <div class="col"><!-- tampilan jika berasil menambah / mengubah data -->
            <?php if ($this->session->flashdata() ) : ?> 
              <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">Data Penyulang
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
 

        <div class="col-md-12 pl-5 mt-4 mb-5"> 
        <div class="float-right"><?= $pagination; ?> </div>
            <table class="table table-sm table-striped table-bordered">
              <thead>
                <tr>                

                  <th class="text-center" scope="col">No</th>
                  <th class="text-center" scope="col">NAMA PENYULANG</th>
                  <th class="text-center" scope="col">NAMA GI</th>
                  

                  <th class="text-center" scope="col">AKSI</th>                
                </tr>
              </thead>
              <tbody>
              <?php foreach ( $penyulang as $pyl) : ?>
                <tr>
                  <!-- <?php var_dump($pyl); ?> -->

                    <td class="text-center" scope="col"><?= ++$start?> </td>
                    <td class="text-center" scope="col"><?= $pyl['nama_penyulang'];?> </td>
                    <td class="text-center" scope="col"><?= $pyl['nama_gardu'] ;?> </td>           
                    <td class="text-center" scope="col ">
                    

                      <?php if (($this->session->userdata('role_id') == '2')) :?>                   
                        <a href="<?= base_url();?>staff/penyulang/detail/<?= $pyl['id_penyulang'];?>"  
                        class="badge badge-primary ">Detail</a>             
                      <?php endif;  ?>      
                      <?php if (($this->session->userdata('role_id') == '3')) :?>                   
                        <a href="<?= base_url();?>pimpinan/penyulang/detail/<?= $pyl['id_penyulang'];?>"  
                        class="badge badge-primary ">Detail</a>             
                      <?php endif;  ?>      
                      
                     <?php if (($this->session->userdata('role_id') == '1')) :?>                 
                        <a href="<?= base_url();?>penyulang/detail/<?= $pyl['id_penyulang'];?>"  
                        class="badge badge-primary ">Detail</a>     
                        <a href="<?= base_url();?>penyulang/hapus/<?= $pyl['id_penyulang'];?>"  
                        class="badge badge-danger " onclick="return confirm ('Apakah anda yakin ?');">Hapus</a>
                        <a href="<?= base_url();?>penyulang/ubah/<?= $pyl['id_penyulang'];?>"  
                        class="badge badge-success ">Ubah</a>      
                     <?php endif;?>   
                      </td>
                </tr>
            
              <?php endforeach; ?>            
              </tbody>
            </table>

        </div> <!--akhir col konten tabel -->
