<?php

class Ulp_model extends CI_model {

    
    public function getAllUlp1()
    {
        return $this->db->get('ulp')->result_array();  // Produces: SELECT * FROM mytablessds//

    }
    public function getAllUlp($limit, $start)
    {
      $this->db->order_by('nama_ulp','ASC');
      $query=$this->db->get('ulp',$limit,$start);
      return $query->result_array();
        // Produces: SELECT * FROM mytablessds//

    }
    public function tambahDataUlp()
    {
    	//memasukka data dari form ke database / INSERT
    	$data = [
    	"nama_ulp" => $this->input->post('nama_ulp',true),
    	"alamat" => $this->input->post('alamat',true),
    	"wilker" => $this->input->post('wilker',true),
    	"telepon" => $this->input->post('telepon', true)
        
    	];

    	$this->db->insert('ulp',$data);
    }

    public function hapusDataUlp($id)
    {
    	$this->db->where('id', $id);
    	$this->db->delete('ulp');
    	// $this->db->delete('pegawai', array('id' => $id)); //query ci untuk hapus data
    }
    public function dataUlpById($id)
    {
        return $this->db->get_where('ulp', ['id' => $id])->row_array();
    }

    public function ubahDataUlp()
    {
        //memasukka data dari form ke database / INSERT
        $data = [
        "nama_ulp" => $this->input->post('nama_ulp',true),
        "alamat" => $this->input->post('alamat',true),
        "wilker" => $this->input->post('wilker',true),
        "telepon" => $this->input->post('telepon',true)   

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('ulp', $data);
    }

    public function cariDataUlp()
    {
        $keyword = $this->input->post('keyword',true);
        $this->db->like('nama_ulp',$keyword);
        $this->db->or_like('alamat',$keyword);
        $this->db->or_like('telepon',$keyword);
        
        return $this->db->get('ulp')->result_array();
    }
    public function countAllUlp()
    {
        return $this->db->get('ulp')->num_rows();
    }


}