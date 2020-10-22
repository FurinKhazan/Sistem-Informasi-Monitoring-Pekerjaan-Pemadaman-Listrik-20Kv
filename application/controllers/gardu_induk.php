<?php

class Gardu_induk extends CI_Controller {

   public function __construct()
    {
        parent::__construct();
      
          if (($this->session->userdata('role_id') != '1')) {
            redirect('null');
                  
        };
        $this->load->model('GarduInduk_model');
        $this->load->library('form_validation');
    }

	public function index()
	{

       $data ['judul'] = 'Daftar Gardu Induk';
       $this->load->library('pagination');

       $config['base_url']= base_url('/gardu_induk/index');
       $config['total_rows']=$this->GarduInduk_model->countAllGi();
       $config['per_page'] = 8;

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
      $data ['gardu_induk'] = $this->GarduInduk_model->getAllGi1($config['per_page'],$data['start']);
      
      $data['pagination'] = $this->pagination->create_links();
        if ($this->input->post('keyword')) {
          $data['gardu_induk'] = $this->GarduInduk_model->cariDataGi();
        }
       $this->load->view('templates/header', $data);
       $this->load->view('templates/side-navbar', $data);
       $this->load->view('templates/konten', $data);
       $this->load->view('gardu_induk/index', $data);
       $this->load->view('templates/footer');
	}

  public function tambah()
   {
       $data['judul'] = 'Form Tambah Data Gardu Induk';

       $this->form_validation->set_rules('nama_gardu','Nama','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
       $this->form_validation->set_rules('alamat','Alamat','required');

       
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header',$data);
                   $this->load->view('templates/side-navbar', $data);
                   $this->load->view('templates/konten', $data);
                  $this->load->view('gardu_induk/tambah');
                  $this->load->view('templates/footer');
                }
                else
                {
                  $this->GarduInduk_model->tambahDataGi();
                  $this->session->set_flashdata('flash','Ditambahkan');
                  redirect('gardu_induk'); //REDIRECT KE CONTROLLER vendor
                }
    }

    public function hapus($id)
    {

      // $where = array ('id' => $id);
      $this->GarduInduk_model->hapusDataGi($id);
      $this->session->set_flashdata('flash','Dihapus');
      redirect('gardu_induk');
    }
 
    public function detail($id)
    {
      $data ['judul'] = 'Detail Data GI';
      $data ['gardu_induk'] = $this->GarduInduk_model->dataGiById($id);
      $this->load->view('templates/header', $data);
       $this->load->view('templates/side-navbar', $data);
       $this->load->view('templates/konten', $data);
      $this->load->view('gardu_induk/detail',$data);
      $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
       $data['judul'] = 'Form Ubah Data GI';
       $data ['gardu_induk'] = $this->GarduInduk_model->dataGiById($id);
       $this->form_validation->set_rules('nama_gardu','Nama','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
       $this->form_validation->set_rules('alamat','Alamat','required');

       
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header',$data);
                  $this->load->view('templates/side-navbar', $data);
                  $this->load->view('templates/konten', $data);
                  $this->load->view('gardu_induk/ubah',$data);
                  $this->load->view('templates/footer');
                }
                else
                {
                  $this->GarduInduk_model->ubahDataGi();
                  $this->session->set_flashdata('flash','Diubah');
                  redirect('gardu_induk'); //REDIRECT KE CONTROLLER PEGAWAI
                }
    }

}