<?php

class Auth_model extends CI_model {

    public function getAllUser()
    {
        return $this->db->get('user')->result_array();  // Produces: SELECT * FROM mytablessds//sdsds

    }
    public function getAllrole()
    {
        return $this->db->get('user_role')->result_array();  // Produces: SELECT * FROM mytablessds//sdsds

    }

    public function tambahDataUser()
    {
    	//memasukka data dari form ke database / INSERT
    	$data = [
    	// "nama_user" => htmlspecialchars($this->input->post('nama_user',true)),
    	"email" => htmlspecialchars($this->input->post('email',true)),
    	"id_pegawai" => ($this->input->post('id_pegawai',true)),
        "password" => password_hash ($this->input->post('password'),PASSWORD_DEFAULT),
        "role_id" => ($this->input->post('role_id',true)),
        "is_active" => 1,
        "date_create" => time()
    	];

    	$this->db->insert('user',$data);
    }
    public function getJoinUser()
    {
        $this->db->select('*');
        $this->db->from('pegawai,user_role');
        $this->db->join('user', 'pegawai.id=user.id_pegawai AND user_role.id= user.role_id' );
        $query = $this->db->get();

        return $query->result_array();
       
    }


}