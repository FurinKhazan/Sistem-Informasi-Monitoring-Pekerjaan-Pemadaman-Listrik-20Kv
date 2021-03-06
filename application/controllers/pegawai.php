<?php

class Pegawai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('role_id') != '1')) {
          redirect('null');
                
      };
        $this->load->model('Pegawai_model');
        $this->load->library('form_validation');//UNTUK VALIDASI INPUT FORM DI CONTROLLER PEGAWAI
    }

    public function index()
    {     
      $this->load->library('pagination');

      $config['base_url']= base_url('/pegawai/index');
      $config['total_rows']=$this->Pegawai_model->countAllPegawai();
      $config['per_page'] = 7;

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
     // $data ['permohonan'] = $this->Permohonan_model->getJoinPermohonan();
     //  $data ['permohonan'] = $this->Permohonan_model->getPermohonan($config["per_page"], $data["page"])->result_array();
      $data['pagination'] = $this->pagination->create_links();
      
       $data ['pegawai'] = $this->Pegawai_model->getAllPegawai($config['per_page'],$data['start']);
       $data ['judul'] = 'Daftar Pegawai';
      //  $data ['pegawai'] = $this->Pegawai_model->getAllPegawai();
        if ($this->input->post('keyword')) {
       $data['pegawai'] = $this->Pegawai_model->cariDataPegawai();
        }
       $this->load->view('templates/header', $data);
       $this->load->view('templates/side-navbar', $data);
       $this->load->view('templates/konten', $data);
       $this->load->view('pegawai/index', $data);
       $this->load->view('templates/footer');
    }

    public function tambah()
    {
       $data['judul'] = 'Form Tambah Data Pegawai';

       $this->form_validation->set_rules('nama','Nama','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
       $this->form_validation->set_rules('nip','NIP','required|numeric');
       $this->form_validation->set_rules('email','Email','required|valid_email');
       
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header',$data);
                  $this->load->view('templates/side-navbar', $data);
                  $this->load->view('templates/konten', $data);
                  $this->load->view('pegawai/tambah');
                  $this->load->view('templates/footer');
                }
                else
                {
                  $this->Pegawai_model->tambahDataPegawai();
                  $this->session->set_flashdata('flash','Ditambahkan');
                  redirect('pegawai'); //REDIRECT KE CONTROLLER PEGAWAI
                }
    }

    public function hapus($id)
    {

      // $where = array ('id' => $id);
      $this->Pegawai_model->hapusDataPegawai($id);
      $this->session->set_flashdata('flash','Dihapus');
      redirect('pegawai');
    }

    public function detail($id)
    {
      $data ['judul'] = 'Detail Pegawai';
      $data ['pegawai'] = $this->Pegawai_model->dataPegawaiById($id);
      $this->load->view('templates/header', $data);
       $this->load->view('templates/side-navbar', $data);
       $this->load->view('templates/konten', $data);
      $this->load->view('pegawai/detail',$data);
      $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
       $data['judul'] = 'Form Ubah Data Pegawai';
       $data ['pegawai'] = $this->Pegawai_model->dataPegawaiById($id);
       $data ['jabatan'] = ['Direksi Jaringan','Pimpinan','Staff','Dispatcher'];

       $this->form_validation->set_rules('nama','Nama','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
       $this->form_validation->set_rules('nip','NIP','required|numeric');
       $this->form_validation->set_rules('email','Email','required|valid_email');
       
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header',$data);
                  $this->load->view('templates/side-navbar', $data);
                  $this->load->view('templates/konten', $data);
                  $this->load->view('pegawai/ubah',$data);
                  $this->load->view('templates/footer');
                }
                else
                {
                  $this->Pegawai_model->ubahDataPegawai();
                  $this->session->set_flashdata('flash','Diubah');
                  redirect('pegawai'); //REDIRECT KE CONTROLLER PEGAWAI
                }
    }


}