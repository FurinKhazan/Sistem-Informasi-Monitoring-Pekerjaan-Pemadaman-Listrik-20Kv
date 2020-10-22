
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center ">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><img class="mr-2"src="<?= base_url();?>assets/img/logopln.png">LOGIN <b>SIMPANA</b></h1>
                  </div>
                
                  <?php if ($this->session->flashdata() ) : ?> 
                  <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert"> <?= $this->session->flashdata('message');?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                  </div>
                <?php endif;?>
                  <form class="user" method="POST" action="<?= base_url('Auth'); ?>">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Username / Email">
                    </div>
                    <small class="form-text text-danger"><i><?= form_error('email');?></i></small>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password"  name="password" placeholder="Password">
                    </div>
                    <small class="form-text text-danger"><i><?= form_error('password');?></i></small>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                  </form>
                  
                    <h5 class="text-center"><b><i>Sistem Informasi Monitoring Pekerjaan Pemadaman Terencana</i></b></h5>
                
            
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  
