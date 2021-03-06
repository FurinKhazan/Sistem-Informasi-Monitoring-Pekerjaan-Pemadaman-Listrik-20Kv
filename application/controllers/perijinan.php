<?php

class Perijinan extends CI_Controller {

   public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('role_id') != '1')) {
          redirect('null');
                
      };

        $this->load->model('Perijinan_model');
        $this->load->model('Permohonan_model');
        $this->load->model('Penyulang_model');
        $this->load->model('Pegawai_model');
        $this->load->model('Ulp_model');
        $this->load->model('Vendor_model');
        $this->load->model('Permohonan_model');
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

	public function index()
	{

       $data ['judul'] = 'Daftar Status Ijin Pekerjaan';     
       $this->load->library('pagination');

       $config['base_url']= base_url('/perijinan/index');
       $config['total_rows']=$this->Perijinan_model->countAllPerijinan();
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
      $data['pagination'] = $this->pagination->create_links();
       
      $data ['perijinan'] = $this->Perijinan_model->getJoinPerijinan2($config['per_page'],$data['start']);
      // $data ['perijinan'] = $this->Perijinan_model->getAllPerijinan();
        if ($this->input->post('keyword')) {
        $data['perijinan'] = $this->Perijinan_model->cariDataPerijinan();
        }
      //  $data ['perijinan'] = $this->Perijinan_model->getJoinPerijinan();
       $this->load->view('templates/header',$data);
       $this->load->view('templates/side-navbar',$data);
       $this->load->view('templates/konten',$data);
       $this->load->view('perijinan/index',$data);
       $this->load->view('templates/footer');

	}

    public function hapus($id)
    {
      $this->Perijinan_model->hapusDatapermohonan($id);
      $this->session->set_flashdata('flash','Dihapus');
      redirect('permohonan');
    }
 
    public function detail($id)
    {
       $data['judul'] = 'Detail Permohonan Pekerjaan';
       $data ['permohonan1'] = $this->Perijinan_model->getJoinPerijinan1($id);
       $data ['permohonan'] = $this->Perijinan_model->dataPerijinanById($id);      
       $data ['ulp']= $this->Ulp_model->getAllUlp1();
       $data ['penyulang']= $this->Penyulang_model->getAllPenyulang();
       $data ['pegawai']= $this->Pegawai_model->getAllPegawai1();
       $data ['vendor']= $this->Vendor_model->getAllVendor1();
       $this->load->view('templates/header', $data);
       $this->load->view('templates/side-navbar', $data);
       $this->load->view('templates/konten', $data);
       $this->load->view('perijinan/detail',$data);
       $this->load->view('templates/footer');
    }

    public function kerjakan($id)
    {
       $data['judul'] = 'Tindak Lanjut Pekerjaan';
       $data ['perijinan1'] = $this->Perijinan_model->getJoinPerijinan1($id);
       $data ['perijinan'] = $this->Perijinan_model->dataperijinanById($id);
       $data ['ulp']= $this->Ulp_model->getAllUlp1();
       $data ['penyulang']= $this->Penyulang_model->getAllPenyulang();
       $data ['pegawai']= $this->Pegawai_model->getAllPegawai1();
       $data ['vendor']= $this->Vendor_model->getAllVendor1();
       
       $this->form_validation->set_rules('pekerjaan','Pekerjaan','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
  
      //           }
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header',$data);
                  $this->load->view('templates/side-navbar', $data);
                  $this->load->view('templates/konten', $data);
                  $this->load->view('perijinan/keputusan', $data);
                  $this->load->view('templates/footer');
                  
                }
                else
                {
                  $this->Perijinan_model->keputusanDataPerijinan();
                  $this->session->set_flashdata('flash','Diubah'); 
                  // $this->Permohonan_model->hapusDataPermohonan($id);
                  redirect('pekerjaan'); //REDIRECT KE CONTROLLER izin            
                }         
    }
   
    public function reschedule($id)
    {
       $data['judul'] = 'Reschedule Rencana Pekerjaan';

       $data ['perijinan1'] = $this->Perijinan_model->getJoinPerijinan1($id);
       $data ['perijinan'] = $this->Perijinan_model->dataperijinanById($id);
       $data ['ulp']= $this->Ulp_model->getAllUlp1();
       $data ['penyulang']= $this->Penyulang_model->getAllPenyulang();
       $data ['pegawai']= $this->Pegawai_model->getAllPegawai1();
       $data ['vendor']= $this->Vendor_model->getAllVendor1();
       $this->form_validation->set_rules('pekerjaan','Pekerjaan','required');//SETING VALIDASI FORM TAMBAH| ('name','pesan yang akan di munculkan','metode vlidasi')
       
       if ($this->form_validation->run() == FALSE) //VALIDASI
                {
                  $this->load->view('templates/header',$data);
                  $this->load->view('templates/side-navbar', $data);
                  $this->load->view('templates/konten', $data);
                  $this->load->view('perijinan/ubah', $data);
                  $this->load->view('templates/footer');          
                }
                else
                {
                  $this->Perijinan_model->RescheduleDataPerijinan();
                  $this->session->set_flashdata('flash','Diubah');
                  redirect('permohonan'); //REDIRECT KE CONTROLLER PEGAWAI
                }
    }
    
    public function pdf()
    {   
      $email= $this->session->userdata('email');
      $user = $this->db->get_where('user',['email' => $email])->row_array();
      $id = $user['id'];
      $data ['user'] = $this->User_model->getJoinUser1($id);

      $this->load->library('dompdf_gen');
      $data ['perijinan'] = $this->Perijinan_model->getJoinPerijinan();
      $this->load->view('laporan/izin_pdf',$data);
      $paper_size = 'A4';
      $orientasi= 'landscape';
      $html = $this->output->get_output();
      $this->dompdf->set_paper($paper_size,$orientasi);
      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream("Laporan_perijinan_pekerjaan.pdf",array('Attachment'=>0));
    }
}