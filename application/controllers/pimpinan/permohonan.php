<?php

class Permohonan extends CI_Controller {

   public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('role_id') != '3')) {
          redirect('Forbiden');                 
        };
        $this->load->model('Permohonan_model');
        $this->load->model('Penyulang_model');
        $this->load->model('Pegawai_model');
        $this->load->model('Ulp_model');
        $this->load->model('Vendor_model');
        $this->load->model('User_model');

        $this->load->library('form_validation');
    }

	public function index()
	{

       $data ['judul'] = 'Daftar Permohonan Ijin Pekerjaan';
       $email= $this->session->userdata('email');
       $user = $this->db->get_where('user',['email' => $email])->row_array();
       $id = $user['id'];
       $data ['user'] = $this->User_model->getJoinUser1($id);
      //  $data['permohonan'] = $this->Permohonan_model->getPermohonan()->result_array();
       
      $this->load->library('pagination');

      $config['base_url']= base_url('/pimpinan/permohonan/index');
      $config['total_rows']=$this->Permohonan_model->countAllPermohonan();
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
     // $data ['permohonan'] = $this->Permohonan_model->getJoinPermohonan();
     //  $data ['permohonan'] = $this->Permohonan_model->getPermohonan($config["per_page"], $data["page"])->result_array();
      $data['pagination'] = $this->pagination->create_links();
      
     $data ['permohonan'] = $this->Permohonan_model->getJoinPermohonan2($config['per_page'],$data['start']);
     if ($this->input->post('keyword')) {
      $data['permohonan'] = $this->Permohonan_model->cariDataPermohonan();
       }
       $this->load->view('templates/header-user',$data);
       $this->load->view('templates/side-navbar-pimpinan',$data);
       $this->load->view('templates/konten',$data);
       $this->load->view('permohonan/index-pimpinan',$data);
       $this->load->view('templates/footer');

	}
 
    public function detail($id)
    {
       $data['judul'] = 'Detail Permohonan Pekerjaan';
       $email= $this->session->userdata('email');
       $user = $this->db->get_where('user',['email' => $email])->row_array();
       $iduser = $user['id'];
       $data ['user'] = $this->User_model->getJoinUser1($iduser);
       $data ['permohonan1'] = $this->Permohonan_model->getJoinPermohonan3($id);
       $data ['permohonan'] = $this->Permohonan_model->datapermohonanById($id);      
       $data ['ulp']= $this->Ulp_model->getAllUlp1();
       $data ['penyulang']= $this->Penyulang_model->getAllPenyulang();
       $data ['pegawai']= $this->Pegawai_model->getAllPegawai1();
       $data ['vendor']= $this->Vendor_model->getAllVendor1();

       $this->load->view('templates/header-user', $data);
       $this->load->view('templates/side-navbar-pimpinan', $data);
       $this->load->view('templates/konten', $data);
       $this->load->view('permohonan/detail-pimpinan',$data);
       $this->load->view('templates/footer');
    }

    public function keputusan($id)
    {
       $data['judul'] = 'Keputusan Data permohonan';
       $data ['permohonan1'] = $this->Permohonan_model->getJoinPermohonan3($id);
       $data ['permohonan'] = $this->Permohonan_model->datapermohonanById($id);
       $email= $this->session->userdata('email');
       $user = $this->db->get_where('user',['email' => $email])->row_array();
       $id = $user['id'];
       $data ['user'] = $this->User_model->getJoinUser1($id);
       
       $data ['ulp']= $this->Ulp_model->getAllUlp1();
       $data ['penyulang']= $this->Penyulang_model->getAllPenyulang();
       $data ['pegawai']= $this->Pegawai_model->getAllPegawai1();
       $data ['vendor']= $this->Vendor_model->getAllVendor1();
       $this->form_validation->set_rules('pekerjaan','Pekerjaan','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
       
     
      //           }
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header-user',$data);
                  $this->load->view('templates/side-navbar-pimpinan', $data);
                  $this->load->view('templates/konten', $data);
                  $this->load->view('permohonan/keputusan', $data);
                  $this->load->view('templates/footer');
                  
                }
                else
                {
                  $this->Permohonan_model->keputusanDatapermohonan();
                  $this->session->set_flashdata('flash','Diubah'); 
                  // $this->Permohonan_model->hapusDataPermohonan($id);
                  redirect('pimpinan/perijinan'); //REDIRECT KE CONTROLLER izin  
                }   
    }
    public function pdf()
    {   
      $this->load->library('dompdf_gen');
      $data ['permohonan'] = $this->Permohonan_model->getJoinPermohonan();
      $this->load->view('laporan_pdf',$data);
      $paper_size = 'A4';
      $orientasi= 'landscape';
      $html = $this->output->get_output();
      $this->dompdf->set_paper($paper_size,$orientasi);
      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream("Laporan_pengajuan_pekerjaan.pdf",array('Attachment'=>0));
    }

}