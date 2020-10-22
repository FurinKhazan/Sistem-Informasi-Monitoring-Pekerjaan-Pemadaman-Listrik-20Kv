<?php

class Permohonan_model extends CI_model {

    public function getAllPermohonan()
    {
        return $this->db->get('tb_permohonan')->result_array();  // Produces: SELECT * FROM mytablessds//

    }
    public function getPermohonan($limit,$start)
    {
        $query = $this->db->get('tb_permohonan',$limit, $start);
        return $query;  // Produces: SELECT * FROM mytablessds//

    }

    public function tambahDataPermohonan()
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

    	$this->db->insert('tb_permohonan',$data);
    }

    public function hapusDataPermohonan($id)
    {
    	// $this->db->where('id_mohon', $id);
    	// $this->db->delete('tb_permohonan');
    	$this->db->delete('tb_permohonan', array('id_mohon' => $id)); //query ci untuk hapus data
    }
    public function dataPermohonanById($id)
    {
        return $this->db->get_where('tb_permohonan', ['id_mohon' => $id])->row_array();
    }

    public function ubahDataPermohonan()
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
        $this->db->update('tb_permohonan', $data);
        // var_dump($_POST);
        // die;
    }
    public function keputusanDataPermohonan()
    {
        
        $data = [
            "id_mohon" => $this->input->post('id_mohon',true),
            "id_status" => $this->input->post('id_status',true),
            "id_ulp" => $this->input->post('id_ulp',true),
            "id_pegawai" => $this->input->post('id_pegawai',true),
            "id_vendor" => $this->input->post('id_vendor',true),
            "id_penyulang" => $this->input->post('id_penyulang',true),
            
            ];
            // $this->db->insert('tb_perijinan',$data);

           if( $this->db->insert('tb_perijinan',$data) == TRUE) {
            $data = [
               
                "id_status" => '5'
                
                ];
        
                $this->db->where('id_mohon', $this->input->post('id_mohon'));
                $this->db->update('tb_permohonan', $data);
           }           
           
    }
    
    public function getJoinPermohonan()
    {
        $this->db->select('*');
        $this->db->from('ulp, penyulang, pegawai,vendor,status_pekerjaan');
        $this->db->join('tb_permohonan', 'ulp.id = tb_permohonan.id_ulp AND penyulang.id_penyulang = tb_permohonan.id_penyulang AND 
                        pegawai.id=tb_permohonan.id_pegawai AND vendor.id=tb_permohonan.id_vendor AND status_pekerjaan.id_status=tb_permohonan.id_status' );
        $query = $this->db->get();

        return $query->result_array();
       
    }
    public function getJoinPermohonan2($limit,$start)
    {
        $this->db->select('*');
        $this->db->from('ulp, penyulang, pegawai,vendor,status_pekerjaan');
        $this->db->join('tb_permohonan', 'ulp.id = tb_permohonan.id_ulp AND penyulang.id_penyulang = tb_permohonan.id_penyulang AND 
                        pegawai.id=tb_permohonan.id_pegawai AND vendor.id=tb_permohonan.id_vendor AND status_pekerjaan.id_status=tb_permohonan.id_status' );
        $query=$this->db->order_by('status_id','DESC')->limit($limit,$start)->get();

        return $query->result_array();
       
    }
    public function cariDataPermohonan()
    {
        $keyword = $this->input->post('keyword',true);
        $this->db->select('*');
        $this->db->from('ulp, penyulang, pegawai,vendor,status_pekerjaan');
        $this->db->join('tb_permohonan', 'ulp.id = tb_permohonan.id_ulp AND penyulang.id_penyulang = tb_permohonan.id_penyulang AND 
                        pegawai.id=tb_permohonan.id_pegawai AND vendor.id=tb_permohonan.id_vendor AND status_pekerjaan.id_status=tb_permohonan.id_status' );
                        $this->db->like('nama_vendor',$keyword);
                        $this->db->or_like('pekerjaan',$keyword);
                        $this->db->or_like('nama',$keyword);
                        $this->db->or_like('nama_penyulang',$keyword);
                        $query = $this->db->get();

        return $query->result_array();
       
    }
    public function getJoinPermohonan1($id)
    {
        $this->db->select('*');
        $this->db->from('ulp, penyulang, pegawai,vendor, status_pekerjaan');
        $this->db->join('tb_permohonan', "status_pekerjaan.id_status=tb_permohonan.id_status AND ulp.id = tb_permohonan.id_ulp AND penyulang.id_penyulang = tb_permohonan.id_penyulang AND 
                        pegawai.id=tb_permohonan.id_pegawai AND vendor.id=tb_permohonan.id_vendor AND tb_permohonan.id_mohon='$id'" );
        $query = $this->db->get();

        return $query->result_array();
       
    }
    public function getJoinPermohonan3($id)
    {
        $this->db->select('*');
        $this->db->from('ulp, penyulang, pegawai,vendor, status_pekerjaan');
        $this->db->join('tb_permohonan', "status_pekerjaan.id_status=tb_permohonan.id_status AND ulp.id = tb_permohonan.id_ulp AND penyulang.id_penyulang = tb_permohonan.id_penyulang AND 
                        pegawai.id=tb_permohonan.id_pegawai AND vendor.id=tb_permohonan.id_vendor AND tb_permohonan.id_mohon='$id'" );
        $query = $this->db->get();

        return $query->result();
       
    }

    public function countAllPermohonan()
    {
        return $this->db->get('tb_permohonan')->num_rows();
    }

   
    

}