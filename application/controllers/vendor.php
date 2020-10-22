<?php

class Vendor extends CI_Controller {

   public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('role_id') != '1')) {
          redirect('null');
                
      };
        $this->load->model('Vendor_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
     $data ['judul'] = 'Daftar Vendor';
     
     $this->load->library('pagination');

       $config['base_url']= base_url('/vendor/index');
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
      $data ['start'] = $this->uri->segment(3);

       $data ['vendor'] = $this->Vendor_model->getAllVendor2($config['per_page'],$data['start']);
       if ($this->input->post('keyword')) {
          $data['vendor'] = $this->Vendor_model->cariDataVendor();
        }
        $data['pagination'] = $this->pagination->create_links();
       $this->load->view('templates/header', $data);
       $this->load->view('templates/side-navbar', $data);
       $this->load->view('templates/konten', $data);
       $this->load->view('vendor/index', $data);
       $this->load->view('templates/footer');
	}

  public function tambah()
   {
       $data['judul'] = 'Form Tambah Data Vendor';

       $this->form_validation->set_rules('nama_vendor','Nama','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
       $this->form_validation->set_rules('alamat','Alamat','required');
       $this->form_validation->set_rules('email','Email','required|valid_email');
       
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header',$data);
                   $this->load->view('templates/side-navbar', $data);
                   $this->load->view('templates/konten', $data);
                  $this->load->view('vendor/tambah');
                  $this->load->view('templates/footer');
                }
                else
                {
                  $this->Vendor_model->tambahDataVendor();
                  $this->session->set_flashdata('flash','Ditambahkan');
                  redirect('vendor'); //REDIRECT KE CONTROLLER vendor
                }
    }

    public function hapus($id)
    {

      // $where = array ('id' => $id);
      $this->Vendor_model->hapusDataVendor($id);
      $this->session->set_flashdata('flash','Dihapus');
      redirect('vendor');
    }

    public function detail($id)
    {
      $data ['judul'] = 'Detail Vendor';
      $data ['vendor'] = $this->Vendor_model->dataVendorById($id);
      $this->load->view('templates/header', $data);
       $this->load->view('templates/side-navbar', $data);
       $this->load->view('templates/konten', $data);
      $this->load->view('vendor/detail',$data);
      $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
       $data['judul'] = 'Form Ubah Data Vendor';
       $data ['vendor'] = $this->Vendor_model->dataVendorById($id);
       $this->form_validation->set_rules('nama_vendor','Nama','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
       $this->form_validation->set_rules('alamat','Alamat','required');
       $this->form_validation->set_rules('keterangan','Keterangan','required');
       
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header',$data);
                  $this->load->view('templates/side-navbar', $data);
                  $this->load->view('templates/konten', $data);
                  $this->load->view('vendor/ubah',$data);
                  $this->load->view('templates/footer');
                }
                else
                {
                  $this->Vendor_model->ubahDataVendor();
                  $this->session->set_flashdata('flash','Diubah');
                  redirect('vendor'); //REDIRECT KE CONTROLLER PEGAWAI
                }
    }

}