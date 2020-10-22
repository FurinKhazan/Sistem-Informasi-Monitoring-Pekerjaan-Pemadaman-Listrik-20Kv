 <div class="container">
    <div class="row">
        
        <div class="col"><!-- tampilan jika berasil menambah / mengubah data -->
            <?php if ($this->session->flashdata() ) : ?> 
              <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">Data Gardu Induk
                      <strong>berhasil</strong> <?= $this->session->flashdata('flash');?>.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
              </div>
            <?php endif;?>
        </div>

        <div class="col"> <!-- membuat fitur pencarian -->
            <form class="form-inline float-right mt-3" action="" method="post">
                  <input class="form-control mr-sm-2" type="text" placeholder="Cari data GI.." name="keyword" aria-label="Search">
                  <button class="btn btn-outline-primary my-2 my-sm-0" style="color: black" type="submit">Cari</button>
            </form>
        </div>    
    </div> <!-- akhir row -->
 </div> <!-- akhir container atas-->


        <div class="col-md-12 pl-5 mt-4"> 
            <table class="table table-striped table-bordered">
              <thead>
                <tr>                
                  <th class="text-center" scope="col">NAMA</th>
                  <th class="text-center" scope="col">ALAMAT</th>
                  <th class="text-center" scope="col">AKSI</th>                
                </tr>
              </thead>
              <tbody>
              <?php foreach ( $gardu_induk as $gi) : ?>
                <tr>
                    <td scope="col"><?= $gi['nama_gardu'];?> </td>
                    <td scope="col"><?= $gi['alamat'];?></td>
                
                    <td class="text-center" scope="col ">
                      
                      <a href="<?= base_url();?>pimpinan/gardu_induk/detail/<?= $gi['id_gi'];?>"  
                      class="badge badge-primary ">Detail</a>
                      </td>
                </tr>
              <?php endforeach ?>            
              </tbody>
            </table>

        </div> <!--akhir col konten tabel -->
