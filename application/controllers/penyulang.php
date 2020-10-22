<?php

class Penyulang extends CI_Controller {

   public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('role_id') != '1')) {
          redirect('null');
                
      };
        $this->load->model('Penyulang_model');
        $this->load->model('GarduInduk_model');
        $this->load->library('form_validation');
    }

	public function index()
	{

       $data ['judul'] = 'Daftar Penyulang';
       $this->load->library('pagination');

       $config['base_url']= base_url('/penyulang/index');
       $config['total_rows']=$this->Penyulang_model->countAllPenyulang();
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
       
      $data ['penyulang'] = $this->Penyulang_model->getAllPenyulang1($config['per_page'],$data['start']);
      //  $data ['penyulang'] = $this->Penyulang_model->getAllPenyulang();
        if ($this->input->post('keyword')) {
        $data['penyulang'] = $this->Penyulang_model->cariDataPenyulang();
        }
       $this->load->view('templates/header',$data);
       $this->load->view('templates/side-navbar',$data);
       $this->load->view('templates/konten',$data);
       $this->load->view('penyulang/index',$data);
       $this->load->view('templates/footer');
   
      // $this->Penyulang_model->getJoinPenyulang();
	}

  public function tambah()
   {
       $data['judul'] = 'Form Tambah Data Penyulang';
       $data ['penyulang'] = $this->Penyulang_model->getJoinPenyulang();
       $data ['gardu_induk']= $this->GarduInduk_model->getAllGi();
       $this->form_validation->set_rules('nama_penyulang','Nama','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
      
       
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header',$data);
                   $this->load->view('templates/side-navbar', $data);
                   $this->load->view('templates/konten', $data);
                  $this->load->view('penyulang/tambah', $data);
                  $this->load->view('templates/footer');
                }
                else
                {
                  $this->Penyulang_model->tambahDataPenyulang();
                  $this->session->set_flashdata('flash','Ditambahkan');
                  redirect('penyulang'); //REDIRECT KE CONTROLLER vendor
                }
    }

    public function hapus($id)
    {

      // $where = array ('id' => $id);
      $this->Penyulang_model->hapusDataPenyulang($id);
      $this->session->set_flashdata('flash','Dihapus');
      redirect('penyulang');
    }
 
    public function detail($id)
    {
      $data ['judul'] = 'Detail Data Penyulang';
      $data ['penyulang'] = $this->Penyulang_model->getJoinPenyulangId($id);
      $this->load->view('templates/header', $data);
       $this->load->view('templates/side-navbar', $data);
       $this->load->view('templates/konten', $data);
      $this->load->view('penyulang/detail',$data);
      $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
       $data['judul'] = 'Form Ubah Data Penyulang';
       $data ['penyulang'] = $this->Penyulang_model->dataPenyulangById($id);
       $this->form_validation->set_rules('nama_penyulang','Nama','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
       
       
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header',$data);
                  $this->load->view('templates/side-navbar', $data);
                  $this->load->view('templates/konten', $data);
                  $this->load->view('penyulang/ubah',$data);
                  $this->load->view('templates/footer');
                }
                else
                {
                  $this->Penyulang_model->ubahDataPenyulang();
                  $this->session->set_flashdata('flash','Diubah');
                  redirect('penyulang'); //REDIRECT KE CONTROLLER PEGAWAI
                }
    }

}