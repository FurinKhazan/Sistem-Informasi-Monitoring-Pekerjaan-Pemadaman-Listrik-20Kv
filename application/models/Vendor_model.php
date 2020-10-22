<?php

class Vendor_model extends CI_model {

    public function getAllVendor2($limit, $start)
    {
        return $this->db->get('vendor', $limit, $start)->result_array();  // Produces: SELECT * FROM mytablessds//

    }
    public function getAllVendor1()
    {
        return $this->db->get('vendor')->result_array();  // Produces: SELECT * FROM mytablessds//

    }
  

    public function tambahDataVendor()
    {
    	//memasukka data dari form ke database / INSERT
    	$data = [
    	"nama_vendor" => $this->input->post('nama_vendor',true),
    	"alamat" => $this->input->post('alamat',true),
    	"email" => $this->input->post('email',true),
    	"telepon" => $this->input->post('telepon', true),
        "keterangan" => $this->input->post('keterangan', true)
    	];

    	$this->db->insert('vendor',$data);
    }

    public function hapusDataVendor($id)
    {
    	$this->db->where('id', $id);
    	$this->db->delete('vendor');
    	// $this->db->delete('pegawai', array('id' => $id)); //query ci untuk hapus data
    }

    public function dataVendorById($id)
    {
        return $this->db->get_where('vendor', ['id' => $id])->row_array();
    }

    public function ubahDataVendor()
    {
        //memasukka data dari form ke database / INSERT
        $data = [
        "nama_vendor" => $this->input->post('nama_vendor',true),
        "alamat" => $this->input->post('alamat',true),
        "telepon" => $this->input->post('telepon',true),
        "email" => $this->input->post('email', true),
        "keterangan" => $this->input->post('keterangan',true)
      
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('vendor', $data);
    }

    public function cariDataVendor()
    {
        $keyword = $this->input->post('keyword',true);
        $this->db->like('nama_vendor',$keyword);
        $this->db->or_like('alamat',$keyword);
        $this->db->or_like('keterangan',$keyword);
        return $this->db->get('vendor')->result_array();
    }

    public function countAllVendor()
    {
        return $this->db->get('vendor')->num_rows();
    }

}