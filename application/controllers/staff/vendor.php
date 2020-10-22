<?php

class Vendor extends CI_Controller {

   public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('role_id') != '2')) {
          redirect('Forbiden');
                
      };
        $this->load->model('Vendor_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
	   $data ['judul'] = 'Daftar Vendor';
     $this->load->library('pagination');

     $config['base_url']= base_url('/staff/vendor/index');
     $config['total_rows']=$this->Vendor_model->countAllVendor();
     $config['per_page'] = 4;

    $config['full_tag_open'] = '<nav><ul class="pagination">';
    $config['full_tag_close'] = '</ul></nav>';
     
    $config['first_link'] = 'First';
    $config['first_tag_open'] = ' <li class="page-item">';
    $config['first_tag_close'] = '</li>';
     
    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';
     
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="page-item active"><div class="page-link">';
    $config['cur_tag_close'] = '</li>';

    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    $config['attributes'] = array('class' => 'page-link');


    $this->pagination->initialize($config);
    $data ['start'] = $this->uri->segment(4);

     $data ['vendor'] = $this->Vendor_model->getAllVendor2($config['per_page'],$data['start']);
     if ($this->input->post('keyword')) {
        $data['vendor'] = $this->Vendor_model->cariDataVendor();
      }
      $data['pagination'] = $this->pagination->create_links();
        $email= $this->session->userdata('email');
        $user = $this->db->get_where('user',['email' => $email])->row_array();
        $id = $user['id'];
        $data ['user'] = $this->User_model->getJoinUser1($id);
       $this->load->view('templates/header-user', $data);
        $this->load->view('templates/side-navbar-staff', $data);
       $this->load->view('templates/konten', $data);
       $this->load->view('vendor/index', $data);
       $this->load->view('templates/footer');
	}



   
    public function detail($id)
    {
      $data ['judul'] = 'Detail Vendor';
      $data ['vendor'] = $this->Vendor_model->dataVendorById($id);
      $email= $this->session->userdata('email');
      $user = $this->db->get_where('user',['email' => $email])->row_array();
      $iduser = $user['id'];
      $data ['user'] = $this->User_model->getJoinUser1($iduser);
      $this->load->view('templates/header-user', $data);
      $this->load->view('templates/side-navbar-staff', $data);
      $this->load->view('templates/konten', $data);
      $this->load->view('vendor/detail',$data);
      $this->load->view('templates/footer');
    }

   

}