<div class="container">
  <div class="row">
  
  
  
    <div class="col"><!-- tampilan jika berasil menambah / mengubah data -->
     
    </div>
    <!-- membuat fitur pencarian -->
    <div class="col">
      <form class="form-inline float-right mt-3" action="" method="post">
            <input class="form-control mr-sm-2" type="text" placeholder="Cari data pegawai.." name="keyword" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" style="color: black" type="submit">Cari</button>
      </form>
    </div>
</div> <!--div row-->
</div> <!-- kontainer-->

      <div class="col-md-12 pl-5 mt-4">
          <!-- memberikan efek tulisan tidk ditemukan saat pencarin kosong -->
          <?php if (empty($pegawai)) : ?>
            <div class="alert alert-danger" role="alert">
             Data pegawai tidak ditemukan.
            </div>
          <?php endif; ?>
           
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th class="text-center" scope="col">NIP</th>
                  <th class="text-center" scope="col">NAMA</b></th>
                  <th class="text-center" scope="col">EMAIL</th>
                  <th class="text-center" scope="col">JABATAN</th>
                  <th class="text-center" scope="col">AKSI</th>
                 
                </tr>
              </thead>
              <tbody>
              <?php foreach ( $pegawai as $pgw) : ?>
                <tr>
                <td  scope="col"><?= $pgw['nip'];?></td>
                  <td scope="col"><?= $pgw['nama'];?></td>
                  <td scope="col"><?= $pgw['email'];?></td>
                  <td scope="col"><?= $pgw['jabatan'];?></td>
                  <td class="text-center" scope="col ">
                 
                  <a href="<?= base_url();?>pimpinan/pegawai/detail/<?= $pgw['id'];?>"  
                  class="badge badge-primary ">Detail</a>
                  </td>
                </tr>
              <?php endforeach ?>
               

              </tbody>
            </table>
        <!--     </div>
        </div> -->
    </div>
<!-- </div>