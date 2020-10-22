<?php

class User_model extends CI_model {

    public function getAllUser()
    {
        return $this->db->get('user')->result_array();  // Produces: SELECT * FROM mytablessds//

    }
    // public function getUser($limit,$start)
    // {
    //     $query = $this->db->get('user',$limit, $start);
    //     return $query;  // Produces: SELECT * FROM mytablessds//

    // }

    public function tambahDataUser()
    {
    	//memasukka data dari form ke database / INSERT
    	$data = [
        "tanggal_pekerjaan" => $this->input->post('tanggal_pekerjaan',true),
        "id_ulp" => $this->input->post('id_ulp',true),
        "id_pegawai" => $this->input->post('id_pegawai',true),
        "id_vendor" => $this->input->post('id_vendor',true),
        "id_penyulang" => $this->input->post('id_penyulang',true),
        "id_status" => $this->input->post('id_status',true),
        "pekerjaan" => $this->input->post('pekerjaan',true)
    	];

    	$this->db->insert('user',$data);
    }

    public function hapusDataUser($id)
    {
    	// $this->db->where('id_mohon', $id);
    	// $this->db->delete('user');
    	$this->db->delete('user', array('id_mohon' => $id)); //query ci untuk hapus data
    }
    public function dataUserById($id)
    {
        return $this->db->get_where('user', ['id_mohon' => $id])->row_array();
    }

    public function ubahDataUser()
    {
        //memasukka data dari form ke database / INSERT
        $id = $this->input->post('id_mohon');
        $tanggal_pekerjaan = $this->input->post('tanggal_pekerjaan');
        $id_ulp = $this->input->post('id_ulp');
        $id_penyulang = $this->input->post('id_penyulang');
        $id_vendor = $this->input->post('id_vendor');
        $id_pegawai = $this->input->post('id_pegawai');
        $pekerjaan = $this->input->post('pekerjaan');


        $data = [
        "tanggal_pekerjaan" => $tanggal_pekerjaan,
        "id_ulp" => $id_ulp,
        "id_penyulang" => $id_penyulang,
        "id_vendor" => $id_vendor,
        "id_pegawai" => $id_pegawai,
        "pekerjaan" => $pekerjaan   
        ];

        $this->db->where('id_mohon', $this->input->post('id_mohon'));
        $this->db->update('user', $data);
        // var_dump($_POST);
        // die;
    }
   

    public function cariDataUser()
    {
        $keyword = $this->input->post('keyword',true);
        $this->db->like('pekerjaan',$keyword);
        // $this->db->like('nama_penyulang',$keyword);
        // $this->db->like('nama_ulp',$keyword);
        // $this->db->like('nama_vendor',$keyword);
        
        return $this->db->get('user')->result_array();

    }
    
    public function getJoinUser()
    {
        $this->db->select('*');
        $this->db->from('pegawai,user_role');
        $this->db->join('user', 'pegawai.id=user.id_pegawai AND user_role.id= user.role_id' );
        $query = $this->db->get();

        return $query->result_array();
       
    }

    public function getJoinUser1($id)
    {
        $this->db->select('*');
        $this->db->from('pegawai,user_role');
        $this->db->join('user', "pegawai.id=user.id_pegawai AND user_role.id= user.role_id AND user.id='$id'" );
        $query = $this->db->get();

        return $query->result_array();
       
    }

    public function countAllUser()
    {
        return $this->db->get('user')->num_rows();
    }

   
    

}