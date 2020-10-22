<div class="row no-gutters mt-5">
    <!-- CLASS MENU SIDE BAR -->

<div class="side-nav col-md-2 mb-3 bg-dark" style="box-shadow: 10px 10px 5px #888888;">
  <div class="container-sm" style="margin-top: 40px;" >
        <ul class="nav flex-column">
       
              <li class=" nav-item">
                <a class="nav-link text-white active" href="<?= base_url(); ?>pimpinan/home">
                <i class=" fas fa-home mr-2 mt-4"></i>Dashboard</a>
                <hr class="garis bg-secondary">
              </li>
   
            
              <div class="transaksi">
              <label class="ml-3" >  <b style="color: #a8b1e1">Transaksi</b></label>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url(); ?>pimpinan/permohonan"><i class="fas fa-tasks mr-2"></i>Permohonan Pekerjaan</a>
                    <hr class="garis bg-secondary">
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url(); ?>pimpinan/perijinan"><i class="fas fa-clipboard-check mr-2"></i>Pengajuan Diizinkan</a>
                    <hr class="garis bg-secondary">
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url(); ?>pimpinan/pekerjaan"><i class="fas fa-book-reader mr-2"></i></i>Pekerjaan Selesai</a>
                    <hr class="garis bg-secondary">
                  </li>
              </div>
          
              <div class="data-master">
              <label class="ml-3" >  <b style="color: #a8b1e1">Data Master</b></label>

                
                 <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"><i class="fas fa-bolt mr-2"></i> Data PLN</a>
                    <hr class="garis bg-secondary">
                    <div class="dropdown-menu ml-5" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url();?>pimpinan/pegawai">Pegawai</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url();?>pimpinan/ulp">ULP</a>
                        
                    </div>
                  </li>
            

                  <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url();?>pimpinan/vendor"><i class="fas fa-truck-pickup mr-2"></i>Data Vendor</a>
                    <hr class="garis bg-secondary">
                  </li>

                 <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"><i class="fas fa-bolt mr-2"></i> Data Aset</a>
                    <hr class="garis bg-secondary">
                    <div class="dropdown-menu ml-5" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url();?>pimpinan/penyulang">Penyulang</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url();?>pimpinan/gardu_induk">Gardu Induk</a>
                    </div>
                </li>
                <li class="nav-item " style="height: 300px;">
               
                    
                </li>
                
              </div>
        
            </ul>
        </div> 
      </div>

          
 