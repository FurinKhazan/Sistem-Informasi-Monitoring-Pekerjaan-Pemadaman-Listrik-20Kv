<div class="container">
    <div class="row">
        <div class="col float-left"> <!-- tombol tmbh -->
        <?php if (($this->session->userdata('role_id') == '1')) :?>                   
          <a href="<?= base_url();?>vendor/tambah" class="btn btn-primary mt-3 "><i class="fas fa-truck-pickup mr-1"></i>Tambah Data Vendor</a>           
                      <?php endif;  ?>
           
        </div>

        <div class="col"><!-- tampilan jika berasil menambah / mengubah data -->
            <?php if ($this->session->flashdata() ) : ?> 
              <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">Data Vendor
                      <strong>berhasil</strong> <?= $this->session->flashdata('flash');?>.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
              </div>
            <?php endif;?>
        </div>

        <div class="col"> <!-- membuat fitur pencarian -->
            <form class="form-inline float-right mt-3" action="" method="post">
                  <input class="form-control mr-sm-2" type="text" placeholder="Cari data vendor.." name="keyword" aria-label="Search">
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
                  <th class="text-center" scope="col">KETERANGAN</th>
                  <th class="text-center" scope="col">AKSI</th>                
                </tr>
              </thead>
              <tbody>
              <?php foreach ( $vendor as $vdr) : ?>
                <tr>
                    <td scope="col"><?= ++$start ?></td>
                    <td scope="col"><?= $vdr['nama_vendor'];?> </td>
                    <td scope="col"><?= $vdr['alamat'];?></td>
                    <td scope="col"><?= $vdr['keterangan'];?></td>                 
                    <td class="text-center" scope="col ">
                     
                      <?php if (($this->session->userdata('role_id') == '2')) :?>                   
                        <a href="<?= base_url();?>staff/vendor/detail/<?= $vdr['id'];?>"  
                      class="badge badge-primary ">Detail</a>            
                      <?php endif;  ?>      
                      <?php if (($this->session->userdata('role_id') == '3')) :?>                   
                        <a href="<?= base_url();?>pimpinan/vendor/detail/<?= $vdr['id'];?>"  
                      class="badge badge-primary ">Detail</a>            
                      <?php endif;  ?>      
                      
                     <?php if (($this->session->userdata('role_id') == '1')) :?>                 
                      <a href="<?= base_url();?>vendor/hapus/<?= $vdr['id'];?>"  
                      class="badge badge-danger " onclick="return confirm ('Apakah anda yakin ?');">Hapus</a>
                      <a href="<?= base_url();?>vendor/ubah/<?= $vdr['id'];?>"  
                      class="badge badge-success ">Ubah</a>
                      <a href="<?= base_url();?>vendor/detail/<?= $vdr['id'];?>"  
                      class="badge badge-primary ">Detail</a>  
                     <?php endif;?>   
                      </td>
                </tr>
              <?php endforeach ?>            
              </tbody>
            </table>
          
            
        </div> <!--akhir col konten tabel -->
       