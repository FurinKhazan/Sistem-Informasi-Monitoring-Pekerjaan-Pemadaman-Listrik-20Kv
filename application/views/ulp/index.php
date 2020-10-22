 <div class="container">
    <div class="row">
        <div class="col"> <!-- tombol tmbh -->
           
        
           <?php if (($this->session->userdata('role_id') == '1')) :?>                   
            <a href="<?= base_url();?>ulp/tambah" class="btn btn-primary mt-3 "><i class="fas fa-user-plus mr-1"></i>Tambah Data ULP</a>           
                      <?php endif;  ?>
          </div>

        <div class="col"><!-- tampilan jika berasil menambah / mengubah data -->
            <?php if ($this->session->flashdata() ) : ?> 
              <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">Data ULP
                      <strong>berhasil</strong> <?= $this->session->flashdata('flash');?>.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
              </div>
            <?php endif;?>
        </div>

        <div class="col"> <!-- membuat fitur pencarian -->
            <form class="form-inline float-right mt-3" action="" method="post">
                  <input class="form-control mr-sm-2" type="text" placeholder="Cari data ULP.." name="keyword" aria-label="Search">
                  <button class="btn btn-outline-primary my-2 my-sm-0" style="color: black" type="submit">Cari</button>
            </form>
        </div>    
    </div> <!-- akhir row -->
 </div> <!-- akhir container atas-->


        <div class="col-md-12 pl-5 mt-4"> 
        <div class="float-right"><?= $pagination; ?> </div>
            <table class="table table-striped table-bordered">
              <thead>
                <tr>    
                  <th class="text-center" scope="col">NO</th>            
                  <th class="text-center" scope="col">NAMA</th>
                  <th class="text-center" scope="col">ALAMAT</th>
                  <th class="text-center" scope="col">TELEPON</th>
                  <th class="text-center" scope="col">AKSI</th>                
                </tr>
              </thead>
              <tbody>
              <?php foreach ( $ulp as $ulp) : ?>
                <tr>
                    <td scope="col"><?= ++$start ?></td>
                    <td scope="col"><?= $ulp['nama_ulp'];?> </td>
                    <td scope="col"><?= $ulp['alamat'];?></td>
                    <td scope="col"><?= $ulp['telepon'];?></td>                 
                    <td class="text-center" scope="col ">
                     

                      <?php if (($this->session->userdata('role_id') == '2')) :?>                   
                        <a href="<?= base_url();?>staff/ulp/detail/<?= $ulp['id'];?>"  
                      class="badge badge-primary ">Detail</a>             
                      <?php endif;  ?>      

                      <?php if (($this->session->userdata('role_id') == '3')) :?>                   
                        <a href="<?= base_url();?>pimpinan/ulp/detail/<?= $ulp['id'];?>"  
                      class="badge badge-primary ">Detail</a>             
                      <?php endif;  ?>      
                      
                     <?php if (($this->session->userdata('role_id') == '1')) :?>                 
                      <a href="<?= base_url();?>ulp/hapus/<?= $ulp['id'];?>"  
                      class="badge badge-danger " onclick="return confirm ('Apakah anda yakin ?');">Hapus</a>
                      <a href="<?= base_url();?>ulp/ubah/<?= $ulp['id'];?>"  
                      class="badge badge-success ">Ubah</a>
                      <a href="<?= base_url();?>ulp/detail/<?= $ulp['id'];?>"  
                      class="badge badge-primary ">Detail</a>  
                     <?php endif;?>    
                      </td>
                </tr>
              <?php endforeach ?>            
              </tbody>
            </table>

        </div> <!--akhir col konten tabel -->
