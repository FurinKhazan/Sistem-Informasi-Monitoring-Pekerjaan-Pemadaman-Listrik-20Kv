<?php

class Penyulang_model extends CI_model {

    public function getAllPenyulang()
    {
        
        return $this->db->get('penyulang')->result_array();  // Produces: SELECT * FROM mytablessds//

    }
    public function getAllPenyulang1($limit,$start)
    {
        $this->db->select('*');
        $this->db->from('gardu_induk');
        $this->db->join('penyulang', 'gardu_induk.id_gi = penyulang.id_gi');
        $query=$this->db->order_by('nama_penyulang','ASC')->limit($limit,$start)->get();

        return $query->result_array();
    }

    public function tambahDataPenyulang()
    {
    	//memasukka data dari form ke database / INSERT
    	$data = [
        "nama_penyulang" => $this->input->post('nama_penyulang',true),
        "kms" => $this->input->post('kms',true),
        "id_gi" => $this->input->post('id_gi',true)
        
    	
        
    	];

    	$this->db->insert('penyulang',$data);
    }

    public function hapusDataPenyulang($id)
    {
    	$this->db->where('id_penyulang', $id);
    	$this->db->delete('penyulang');
    	// $this->db->delete('pegawai', array('id' => $id)); //query ci untuk hapus data
    }
    public function dataPenyulangById($id)
    {
        return $this->db->get_where('penyulang', ['id_penyulang' => $id])->row_array();
    }

    public function ubahDataPenyulang()
    {
        //memasukka data dari form ke database / INSERT
        $data = [
        "nama_penyulang" => $this->input->post('nama_penyulang',true)
            
        ];

        $this->db->where('id_penyulang', $this->input->post('id'));
        $this->db->update('penyulang', $data);
    }

    public function cariDataPenyulang()
    {
        $keyword = $this->input->post('keyword',true);
        $this->db->select('*');
        $this->db->from('gardu_induk');
        $this->db->join('penyulang', 'gardu_induk.id_gi = penyulang.id_gi');

        $this->db->like('nama_penyulang',$keyword);
        
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function getJoinPenyulang()
    {
        $this->db->select('*');
        $this->db->from('gardu_induk');
        $this->db->join('penyulang', 'gardu_induk.id_gi = penyulang.id_gi');
        $query = $this->db->get();
        // foreach ($query->result() as $row)
        // {
        //    echo $row->nama_gardu;
        // }
        return $query->result_array();
       
    }
    public function getJoinPenyulangId($id)
    {
        $this->db->select('*');
        $this->db->from('gardu_induk');
        $this->db->join('penyulang', "gardu_induk.id_gi = penyulang.id_gi AND penyulang.id_penyulang='$id'");
        $query = $this->db->get();
        // foreach ($query->result() as $row)
        // {
        //    echo $row->nama_gardu;
        // }
        return $query->result_array();
       
    }
    function getPenyulang()
    {
		$query=$this->db->query("select * from penyulang");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
    }
    public function countAllPenyulang()
    {
        return $this->db->get('penyulang')->num_rows();
    }


}