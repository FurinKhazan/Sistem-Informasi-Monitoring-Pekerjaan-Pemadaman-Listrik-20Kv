<?php

class GarduInduk_model extends CI_model {

    public function getAllGi()
    {
        return $this->db->get('gardu_induk')->result_array();  // Produces: SELECT * FROM mytablessds//

    }
    public function getAllGi1($limit, $start)
    {
        return $this->db->get('gardu_induk',$limit, $start)->result_array();  // Produces: SELECT * FROM mytablessds//

    }

    public function tambahDataGi()
    {
    	//memasukka data dari form ke database / INSERT
    	$data = [
    	"nama_gardu" => $this->input->post('nama_gardu',true),
    	"jml_trafo" => $this->input->post('jml_trafo',true),
        "alamat" => $this->input->post('alamat',true)
    	];

    	$this->db->insert('gardu_induk',$data);
    }

    public function hapusDataGi($id)
    {
    	$this->db->where('id_gi', $id);
    	$this->db->delete('gardu_induk');
    	// $this->db->delete('pegawai', array('id' => $id)); //query ci untuk hapus data
    }
    public function dataGiById($id)
    {
        return $this->db->get_where('gardu_induk', ['id_gi' => $id])->row_array();
    }

    public function ubahDataGi()
    {
        //memasukka data dari form ke database / INSERT
        $data = [
        "nama_gardu" => $this->input->post('nama_gardu',true),
        "alamat" => $this->input->post('alamat',true)  
        ];

        $this->db->where('id_gi', $this->input->post('id'));
        $this->db->update('gardu_induk', $data);
    }

    public function cariDataGi()
    {
        $keyword = $this->input->post('keyword',true);
        $this->db->like('nama_gardu',$keyword);
        
        return $this->db->get('gardu_induk')->result_array();
    }
    function getData()
    {
		$query=$this->db->query("select * from gardu_induk");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
    }
    public function countAllGi()
    {
        $this->db->get('gardu_induk')->num_rows();
    }

}