<?php

class Gardu_induk extends CI_Controller {

   public function __construct()
    {
        parent::__construct();
      
          if (($this->session->userdata('role_id') != '3')) {
            redirect('Forbiden');                 
          };
        $this->load->model('GarduInduk_model');
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

	public function index()
	{

       $data ['judul'] = 'Daftar Gardu Induk';
       $data ['gardu_induk'] = $this->GarduInduk_model->getAllGi();
        if ($this->input->post('keyword')) {
          $data['gardu_induk'] = $this->GarduInduk_model->cariDataGi();
        }
        $email= $this->session->userdata('email');
        $user = $this->db->get_where('user',['email' => $email])->row_array();
        $id = $user['id'];
        $data ['user'] = $this->User_model->getJoinUser1($id);

       $this->load->view('templates/header-user', $data);
       $this->load->view('templates/side-navbar-pimpinan', $data);
       $this->load->view('templates/konten', $data);
       $this->load->view('gardu_induk/index-user', $data);
       $this->load->view('templates/footer');
	}

 
    public function detail($id)
    {
      $data ['judul'] = 'Detail Data GI';
      $data ['gardu_induk'] = $this->GarduInduk_model->dataGiById($id);

      $email= $this->session->userdata('email');
        $user = $this->db->get_where('user',['email' => $email])->row_array();
        $id = $user['id'];
        $data ['user'] = $this->User_model->getJoinUser1($id);

       $this->load->view('templates/header-user', $data);
       $this->load->view('templates/side-navbar-pimpinan', $data);
       $this->load->view('templates/konten', $data);
       $this->load->view('gardu_induk/detail-user', $data);
       $this->load->view('templates/footer');
    }


}