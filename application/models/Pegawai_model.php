<?php

class Pegawai_model extends CI_model {

    public function getAllPegawai1()
    {
        return $this->db->get('pegawai')->result_array();  // Produces: SELECT * FROM mytablessds//sdsds

    }
    public function getAllPegawai($limit,$start)
    {
        
       $this->db->order_by('nama','ASC');
       $query=$this->db->get('pegawai',$limit,$start);
        return $query->result_array();

    }

    public function tambahDataPegawai()
    {
    	//memasukka data dari form ke database / INSERT
    	$data = [
    	"nama" => $this->input->post('nama',true),
    	"nip" => $this->input->post('nip',true),
    	"email" => $this->input->post('email',true),
    	"posisi" => $this->input->post('posisi',true),
    	"ulp" => $this->input->post('ulp',true),
    	"jabatan" => $this->input->post('jabatan', true)
    	];

    	$this->db->insert('pegawai',$data);
    }

    public function hapusDataPegawai($id)
    {
    	$this->db->where('id', $id);
    	$this->db->delete('pegawai');
    	// $this->db->delete('pegawai', array('id' => $id)); //query ci untuk hapus data
    }

    public function dataPegawaiById($id)
    {
        return $this->db->get_where('pegawai', ['id' => $id])->row_array();
    }

    public function ubahDataPegawai()
    {
        //memasukka data dari form ke database / INSERT
        $data = [
        "nama" => $this->input->post('nama',true),
        "nip" => $this->input->post('nip',true),
        "email" => $this->input->post('email',true),
        "jabatan" => $this->input->post('jabatan', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('pegawai', $data);
    }

    public function cariDataPegawai()
    {
        $keyword = $this->input->post('keyword',true);
        $this->db->like('nama',$keyword);
        $this->db->or_like('jabatan',$keyword);
        $this->db->or_like('email',$keyword);
        $this->db->or_like('nip',$keyword);
        return $this->db->get('pegawai')->result_array();
    }
    public function countAllPegawai()
    {
        return $this->db->get('pegawai')->num_rows();
    }

}