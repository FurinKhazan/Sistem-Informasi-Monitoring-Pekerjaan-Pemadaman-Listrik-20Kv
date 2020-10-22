<?php

class Ulp extends CI_Controller {

   public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('role_id') != '1')) {
          redirect('null');
                
      };
        $this->load->model('Ulp_model');
        $this->load->library('form_validation');
    }

	public function index()
	{

       $data ['judul'] = 'Daftar ULP';
       $this->load->library('pagination');

      $config['base_url']= base_url('/ulp/index');
      $config['total_rows']=$this->Ulp_model->countAllUlp();
      $config['per_page'] = 5;

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
     $data ['start'] = $this->uri->segment(3);
     $data['pagination'] = $this->pagination->create_links();
      
     $data ['ulp'] = $this->Ulp_model->getAllUlp($config['per_page'],$data['start']);
      //  $data ['ulp'] = $this->Ulp_model->getAllUlp();
        if ($this->input->post('keyword')) {
          $data['ulp'] = $this->Ulp_model->cariDataUlp();
        }
       $this->load->view('templates/header', $data);
       $this->load->view('templates/side-navbar', $data);
       $this->load->view('templates/konten', $data);
       $this->load->view('ulp/index', $data);
       $this->load->view('templates/footer');
	}

  public function tambah()
   {
       $data['judul'] = 'Form Tambah Data ULP';

       $this->form_validation->set_rules('nama_ulp','Nama','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
       $this->form_validation->set_rules('alamat','Alamat','required');
       $this->form_validation->set_rules('telepon','telepon','required|numeric');
       
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header',$data);
                   $this->load->view('templates/side-navbar', $data);
                   $this->load->view('templates/konten', $data);
                  $this->load->view('ulp/tambah');
                  $this->load->view('templates/footer');
                }
                else
                {
                  $this->Ulp_model->tambahDataUlp();
                  $this->session->set_flashdata('flash','Ditambahkan');
                  redirect('ulp'); //REDIRECT KE CONTROLLER vendor
                }
    }

    public function hapus($id)
    {

      // $where = array ('id' => $id);
      $this->Ulp_model->hapusDataUlp($id);
      $this->session->set_flashdata('flash','Dihapus');
      redirect('ulp');
    }
 
    public function detail($id)
    {
      $data ['judul'] = 'Detail Data ULP';
      $data ['ulp'] = $this->Ulp_model->dataUlpById($id);
      $this->load->view('templates/header', $data);
       $this->load->view('templates/side-navbar', $data);
       $this->load->view('templates/konten', $data);
      $this->load->view('ulp/detail',$data);
      $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
       $data['judul'] = 'Form Ubah Data ULP';
       $data ['ulp'] = $this->Ulp_model->dataUlpById($id);
       $this->form_validation->set_rules('nama_ulp','Nama','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
       $this->form_validation->set_rules('alamat','Alamat','required');
       $this->form_validation->set_rules('telepon','telepon','required|numeric');
       
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header',$data);
                  $this->load->view('templates/side-navbar', $data);
                  $this->load->view('templates/konten', $data);
                  $this->load->view('ulp/ubah',$data);
                  $this->load->view('templates/footer');
                }
                else
                {
                  $this->Ulp_model->ubahDataUlp();
                  $this->session->set_flashdata('flash','Diubah');
                  redirect('ulp'); //REDIRECT KE CONTROLLER PEGAWAI
                }
    }

}