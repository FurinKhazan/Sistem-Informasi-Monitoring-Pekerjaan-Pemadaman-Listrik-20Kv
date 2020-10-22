<?php

class home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('role_id') != '1')) {
            redirect('null');
                  
        };
        $this->load->library('form_validation');
    }

    public function pageContoh()
    {
      echo tanggal_indo("2020-08-09");
    }

    public function index()
    {
            
      
            $dat ['judul'] = 'Monitoring Status Pengajuan Pekerjaan ';
      
    
            $jumlah_permohonan_pekerjaan=$this->db->count_all('tb_permohonan');
          
            $jumlah_permohonan_dicek=$this->db->get_where('tb_permohonan',array('id_status'=>'5'));
            $permohonan_belum_dicek=$this->db->get_where('tb_permohonan',array('id_status'=>'6'));
           
            
            $data = array(
            'jumlah_permohonan'                   =>  $jumlah_permohonan_pekerjaan,          
            'jumlah_permohonan_dicek'             =>  $jumlah_permohonan_dicek->num_rows(),
            'permohonan_belum_dicek'              =>  $permohonan_belum_dicek->num_rows()
            
        );
            //$total_mhs=$this->db->count_all('daftar_mhs');
            $this->load->view('templates/header', $dat);
            $this->load->view('templates/side-navbar', $data);
            $this->load->view('templates/konten', $dat);
            $this->load->view('home/index',$data);
            $this->load->view('templates/footer');
        }
    public function perijinan()
    {
            
      
            $dat ['judul'] = 'Monitoring Status Perijinan Pekerjaan ';
      
    
            $jumlah_permohonan_pekerjaan=$this->db->count_all('tb_perijinan');
          
           
            
            $disetujui1=$this->db->get_where('tb_perijinan',array('id_status'=>'1'));
            $ditolak=$this->db->get_where('tb_perijinan',array('id_status'=>'2'));
            $ditunda=$this->db->get_where('tb_perijinan',array('id_status'=>'3'));
            $disetujui2=$this->db->get_where('tb_perijinan',array('id_status'=>'7'));
            
            $disetujui= $disetujui1->num_rows() +  $disetujui2->num_rows();

            $data = array(
            'jumlah_pekerjaan'                   =>  $jumlah_permohonan_pekerjaan,          
            'jumlah_disetujui'             =>  $disetujui,
            'jumlah_ditolak'              =>  $ditolak->num_rows(),
            'jumlah_ditunda'              =>  $ditunda->num_rows()
            
           
            
        );
            //$total_mhs=$this->db->count_all('daftar_mhs');
            $this->load->view('templates/header', $dat);
            $this->load->view('templates/side-navbar', $data);
            $this->load->view('templates/konten', $dat);
            $this->load->view('home/index2',$data);
            $this->load->view('templates/footer');
        }
      
}