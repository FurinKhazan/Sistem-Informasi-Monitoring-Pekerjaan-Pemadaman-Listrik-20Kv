<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if(empty($this->session->userdata('email'))){
          redirect('auth');
        };
        $this->load->library('form_validation');
    }

	public function index()
    {
	   $data ['user'] = $this->db->get_where('user',['email' =>$this->session->userdata('email') ])->row_array();
       $data ['judul'] = 'Monitoring Pekerjaan ';
       $this->load->view('templates/header', $data);
       $this->load->view('templates/side-navbar', $data);
       $this->load->view('templates/konten', $data);
       $this->load->view('home/index');
       $this->load->view('templates/footer');
	}	
}
