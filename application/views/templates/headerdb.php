<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/responsif.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/fontawesome-free/css/all.min.css">
    <!-- <link href="<?= base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <title><?= $judul ?></title>
  </head>
  <body>
    <div class="container">
    <div class="navbar-atas">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">       
         <img src="<?= base_url();?>assets/img/logopln.png"><h5 class="navbar-brand ml-3" href="" style="color: white; "><b>SIMPANA</b></h5>
          <h5 class="navbar-judul d-none d-lg-block "style="color: white">| SI Monitoring Pekerjaan Terencana</h5>
         
            <div class="form-inline my-2 my-lg-0 ml-auto text-center">
              
                <h6 class="d-none d-sm-block" style="color: white;">Selamat Datang, Admin 
                 <b  class="d-none d-sm-block" style="color: #a8b1e1"> PLN UP3 SKH</b></h6>
                
            </div>
            <div class="icon ml-4 my-2 my-lg-0 ml-auto" >           
                <h5 class="logout"style="color: white">
                   
                    <b>Log Out</b>
                    <a class="ml-2" href="<?= base_url('auth/logout'); ?>">  <i class="fas fa-sign-out-alt mr-3" style="color: white" data-toggle="tooltip" title="Keluar"></i> </a>
                </h5>
                
            </div>
            
        </nav>
    </div>
    </div>
    <!-- <div class="header-atas">
        <div header class="row">
              <<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                  </li>
                </ul>
               
              </div>
            </nav>
    </div>
    </div> -->
