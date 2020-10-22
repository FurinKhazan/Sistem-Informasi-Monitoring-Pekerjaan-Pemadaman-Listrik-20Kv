

<div class="container">
    <div class="row">

        <div class="col"><!-- tampilan jika berasil menambah / mengubah data -->
            
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
            <table class="table table-striped table-bordered">
              <thead>
                <tr>                
                  <th class="text-center" scope="col">NAMA</th>
                  <th class="text-center" scope="col">ALAMAT</th>
                  <th class="text-center" scope="col">KETERANGAN</th>
                  <th class="text-center" scope="col">AKSI</th>                
                </tr>
              </thead>
              <tbody>
              <?php foreach ( $vendor as $vdr) : ?>
                <tr>
                    <td scope="col"><?= $vdr['nama_vendor'];?> </td>
                    <td scope="col"><?= $vdr['alamat'];?></td>
                    <td scope="col"><?= $vdr['keterangan'];?></td>                 
                    <td class="text-center" scope="col ">
                     
                      <a href="<?= base_url();?>pimpinan/vendor/detail/<?= $vdr['id'];?>"  
                      class="badge badge-primary ">Detail</a>
                      </td>
                </tr>
              <?php endforeach ?>            
              </tbody>
            </table>

        </div> <!--akhir col konten tabel -->