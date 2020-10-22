<?php

class Pekerjaan extends CI_Controller {

   public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('role_id') != '2')) {
          redirect('Forbiden');
                
      };

        $this->load->model('Pekerjaan_model');
        $this->load->model('Perijinan_model');
        $this->load->model('Permohonan_model');
        $this->load->model('Penyulang_model');
        $this->load->model('Pegawai_model');
        $this->load->model('Ulp_model');
        $this->load->model('Vendor_model');
        $this->load->model('Permohonan_model');
        $this->load->model('User_model');

        $this->load->library('form_validation');
    }

	public function index()
	{

       $data ['judul'] = 'Daftar Status Progres Pekerjaan';
       $this->load->library('pagination');

       $config['base_url']= base_url('/staff/pekerjaan/index');
       $config['total_rows']=$this->Pekerjaan_model->countAllPekerjaan();
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
      $data ['start'] = $this->uri->segment(4);
      $data['pagination'] = $this->pagination->create_links();
       
      $data ['Pekerjaan'] = $this->Pekerjaan_model->getJoinPekerjaan2($config['per_page'],$data['start']);
      
      //  $data ['Pekerjaan1'] = $this->Pekerjaan_model->getAllPekerjaan();
        if ($this->input->post('keyword')) {
        $data['Pekerjaan'] = $this->Pekerjaan_model->cariDataPekerjaan();
        }
      //  $data ['Pekerjaan'] = $this->Pekerjaan_model->getJoinPekerjaan();
       $email= $this->session->userdata('email');
       $user = $this->db->get_where('user',['email' => $email])->row_array();
       $iduser = $user['id'];
       $data ['user'] = $this->User_model->getJoinUser1($iduser);
      
       $this->load->view('templates/header-user',$data);
       $this->load->view('templates/side-navbar-staff',$data);
       $this->load->view('templates/konten',$data);
       $this->load->view('pekerjaan/index',$data);
       $this->load->view('templates/footer');

	}

  
    public function hapus($id)
    {

      $this->Pekerjaan_model->hapusDataPekerjaan($id);
      $this->session->set_flashdata('flash','Dihapus');
      redirect('staff/pekerjaan');
    }
 
    public function detail($id)
    {
       $data['judul'] = 'Status Progres Pekerjaan';
        
       $data ['ulp']= $this->Ulp_model->getAllUlp1();
       $data ['penyulang']= $this->Penyulang_model->getAllPenyulang();
       $data ['pegawai']= $this->Pegawai_model->getAllPegawai1();
       $data ['vendor']= $this->Vendor_model->getAllVendor1();
       $data ['Pekerjaan'] = $this->Pekerjaan_model->getJoinPekerjaan1($id);
      //  $data ['Pekerjaan'] = $this->Pekerjaan_model-> dataPekerjaanById($id);
      
       $this->load->view('templates/header', $data);
       $this->load->view('templates/side-navbar-staff', $data);
       $this->load->view('templates/konten', $data);
       $this->load->view('pekerjaan/detail',$data);
       $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
       $data['judul'] = 'Form Ubah Data permohonan';
       $data ['permohonan1'] = $this->Pekerjaan_model->getJoinPermohonan1($id);
       $data ['permohonan'] = $this->Pekerjaan_model->datapermohonanById($id);
       
       $data ['ulp']= $this->Ulp_model->getAllUlp1();
       $data ['penyulang']= $this->Penyulang_model->getAllPenyulang();
       $data ['pegawai']= $this->Pegawai_model->getAllPegawai1();
       $data ['vendor']= $this->Vendor_model->getAllVendor1();
       $this->form_validation->set_rules('pekerjaan','Pekerjaan','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
       
       
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header',$data);
                  $this->load->view('templates/side-navbar-staff', $data);
                  $this->load->view('templates/konten', $data);
                  $this->load->view('permohonan/ubah', $data);
                  $this->load->view('templates/footer');
                  
                }
                else
                {
                  $this->Pekerjaan_model->ubahDatapermohonan();
                  $this->session->set_flashdata('flash','Diubah');
                  redirect('permohonan'); //REDIRECT KE CONTROLLER PEGAWAI
                }
    }
    public function keputusan($id)
    {
       $data['judul'] = 'Progres Pekerjaan';
       $data ['pekerjaan1'] = $this->Pekerjaan_model->getJoinPekerjaan1($id);
       $data ['pekerjaan'] = $this->Pekerjaan_model->dataPekerjaanById($id);
       $email= $this->session->userdata('email');
       $user = $this->db->get_where('user',['email' => $email])->row_array();
       $iduser = $user['id'];
       $data ['user'] = $this->User_model->getJoinUser1($iduser);     
       $data ['ulp']= $this->Ulp_model->getAllUlp1();
       $data ['penyulang']= $this->Penyulang_model->getAllPenyulang();
       $data ['pegawai']= $this->Pegawai_model->getAllPegawai1();
       $data ['vendor']= $this->Vendor_model->getAllVendor1();
       $email= $this->session->userdata('email');
       $user = $this->db->get_where('user',['email' => $email])->row_array();
       $iduser = $user['id'];
       $data ['user'] = $this->User_model->getJoinUser1($iduser);
       $this->form_validation->set_rules('pekerjaan','Pekerjaan','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
     
      //           }
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header-user',$data);
                  $this->load->view('templates/side-navbar-staff', $data);
                  $this->load->view('templates/konten', $data);
                  $this->load->view('pekerjaan/keputusan', $data);
                  $this->load->view('templates/footer');
                  
                }
                else
                {
                  $this->Pekerjaan_model->keputusanDataPekerjaan();
                  $this->session->set_flashdata('flash','Diubah'); 
                  // $this->Permohonan_model->hapusDataPermohonan($id);
                  redirect('staff/pekerjaan'); //REDIRECT KE CONTROLLER izin  
                }
              
           
    }
    public function pdf()
    {   
      $email= $this->session->userdata('email');
      $user = $this->db->get_where('user',['email' => $email])->row_array();
      $id = $user['id'];
      $data ['user'] = $this->User_model->getJoinUser1($id);

      $this->load->library('dompdf_gen');
      $data ['Pekerjaan'] = $this->Pekerjaan_model->getJoinPekerjaan();
      $this->load->view('laporan/progres_pdf',$data);
      $paper_size = 'A4';
      $orientasi= 'landscape';
      $html = $this->output->get_output();
      $this->dompdf->set_paper($paper_size,$orientasi);
      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream("Laporan_progres_pekerjaan.pdf",array('Attachment'=>0));
    }


}