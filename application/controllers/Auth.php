<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->model('Pegawai_model');
		$this->load->library('form_validation');
		// if (($this->session->userdata('role_id') != '1')) {
        //     redirect('null');
                  
        // };
		
    }

	public function index()
	{
		$this->form_validation->set_rules('email','Email','required|valid_email');
		//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
		$this->form_validation->set_rules('password','Password','required|trim');
		
		if ($this->form_validation->run() == FALSE) //VALIDASI
				 {
					$this->load->view('templates/auth_header');
					$this->load->view('auth/index');
					$this->load->view('templates/auth_footer');
	
				 }
				 else
				 {
					 $this->_login();

				 }
	 
	}
	
	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user',['email' => $email])->row_array();
		$data = [
			'email' => $user['email'],
			'role_id'=>$user['role_id']
		];
		// jika usernya ada
		if ($user) 
			{// jika user aktif
			if ($user['is_active'] == 1 ) {
			// 	// jika password benar
					if (password_verify($password,$user['password'])) {					
						if($data['role_id'] == 1)
						{$this->session->set_userdata($data);
						redirect('home');
						} elseif ($data['role_id'] == 2) 
						{$this->session->set_userdata($data);
							redirect('staff/home');
						} elseif ($data['role_id'] == 3) 
						{$this->session->set_userdata($data);
							redirect('pimpinan/home');
						}
					} else {
						$this->session->set_flashdata('message','password salah');
				      	redirect('auth');
					}
				} else {
					$this->session->set_flashdata('message','Email tidak aktif !');
                  	redirect('auth');
				}
			

			}
			else {
				$this->session->set_flashdata('message','Email belum terdaftar sistem !');
                  redirect('auth');
			}
		
	}

	public function regis()
    {
	   $data['judul'] = 'HALAMAN BUAT AKUN';
	   $data['data'] = $this->Auth_model->getJoinUser();
	   $data['role'] = $this->Auth_model->getAllrole();
	   $data ['pegawai']= $this->Pegawai_model->getAllPegawai1();
	//    var_dump($data['pegawai']);die;

    //    $this->form_validation->set_rules('nama_user','Nama','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
	   $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]',[
		   'is_unique'=> 'Email sudah dipakai !'
	   ]);
	   $this->form_validation->set_rules('password','Password','required|trim');
       
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header',$data);
                  $this->load->view('templates/side-navbar', $data);
                  $this->load->view('templates/konten', $data);
                  $this->load->view('auth/regis',$data);
                  $this->load->view('templates/footer');
                }
                else
                {
                  $this->Auth_model->tambahDataUser();
                  $this->session->set_flashdata('flash','Ditambahkan');
                  redirect('auth/regis'); //REDIRECT KE CONTROLLER PEGAWAI
                }
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message','You have been logout!');
		redirect('auth');
	}
}
