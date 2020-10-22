 <div class="container">
    <div class="row">

        <div class="col"><!-- tampilan jika berasil menambah / mengubah data -->
           
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
            <table class="table table-striped table-bordered">
              <thead>
                <tr>                
                  <th class="text-center" scope="col">NAMA</th>
                  <th class="text-center" scope="col">ALAMAT</th>
                  <th class="text-center" scope="col">TELEPON</th>
                  <th class="text-center" scope="col">AKSI</th>                
                </tr>
              </thead>
              <tbody>
              <?php foreach ( $ulp as $ulp) : ?>
                <tr>
                    <td scope="col"><?= $ulp['nama_ulp'];?> </td>
                    <td scope="col"><?= $ulp['alamat'];?></td>
                    <td scope="col"><?= $ulp['telepon'];?></td>                 
                    <td class="text-center" scope="col ">
                      
                      <a href="<?= base_url();?>pimpinan/ulp/detail/<?= $ulp['id'];?>"  
                      class="badge badge-primary ">Detail</a>
                      </td>
                </tr>
              <?php endforeach ?>            
              </tbody>
            </table>

        </div> <!--akhir col konten tabel -->
