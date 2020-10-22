<?php

class Perijinan_model extends CI_model {

    public function getAllPerijinan()
    {
        $this->db->order_by('id_status', 'DESC');
        return $this->db->get('tb_perijinan')->result_array();  // Produces: SELECT * FROM mytablessds//

    }

    public function hapusDataPerijinan($id)
    {
    	$this->db->where('id_ijin', $id);
    	$this->db->delete('tb_perijinan');
    	// $this->db->delete('pegawai', array('id' => $id)); //query ci untuk hapus data
    }
    public function dataPerijinanById($id)
    {
        return $this->db->get_where('tb_perijinan', ['id_ijin' => $id])->row_array();
    }

    public function RescheduleDataPerijinan()
    {
        //memasukka data dari form ke database / INSERT
        $id = $this->input->post('id_mohon');
        $id_ijin = $this->input->post('id_ijin');
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

        $status = ["id_status" => '6'];
        
        if($this->db->update('tb_permohonan', $data, array('id_mohon' => $id)) == true )
        {
               $this->db->where('id_ijin', $id_ijin);
               $this->db->delete('tb_perijinan');
          
        }


        if(  isset($_POST["reschedule"])) {

            $this->db->update('tb_permohonan', $status, array('id_mohon' => $id)) ;
                
           }
           

       
       
        // var_dump($_POST);
        // die;
    }
    public function keputusanDataPerijinan()
    {
        
        $data = [
            "id_ijin" => $this->input->post('id_ijin',true),
            "id_mohon" => $this->input->post('id_mohon',true),
            "id_status" => $this->input->post('id_status',true),
            "id_ulp" => $this->input->post('id_ulp',true),
            "id_pegawai" => $this->input->post('id_pegawai',true),
            "id_vendor" => $this->input->post('id_vendor',true),
            "id_penyulang" => $this->input->post('id_penyulang',true),      
            ];
            // $this->db->insert('tb_perijinan',$data);

           
            if(  $this->db->insert('tb_pekerjaanselesai',$data) == TRUE) {
                $data = [
                   
                    "id_status" => '7'
                    
                    ];
            }
            $this->db->where('id_ijin', $this->input->post('id_ijin'));
            $this->db->update('tb_perijinan', $data);
           
           
    }

    public function cariDataPerijinan()
    {
        $keyword = $this->input->post('keyword',true);
        $this->db->select('*');
        $this->db->from('ulp, penyulang, pegawai,vendor,tb_permohonan,status_pekerjaan');
        $this->db->join('tb_perijinan', 'ulp.id = tb_perijinan.id_ulp AND penyulang.id_penyulang = tb_perijinan.id_penyulang AND 
                        pegawai.id=tb_perijinan.id_pegawai AND vendor.id=tb_perijinan.id_vendor AND status_pekerjaan.id_status=tb_perijinan.id_status 
                        AND tb_permohonan.id_mohon=tb_perijinan.id_mohon');
                        $this->db->like('nama_vendor',$keyword);
                        $this->db->or_like('pekerjaan',$keyword);
                        $this->db->or_like('nama',$keyword);
                        $this->db->or_like('nama_penyulang',$keyword);
                        $query = $this->db->get();     
        
        return $query->result_array();
    }
    
    public function getJoinPerijinan()
    {   
        
        $this->db->select('*');
        $this->db->from('ulp, penyulang, pegawai,vendor,tb_permohonan,status_pekerjaan');
        $this->db->join('tb_perijinan', 'ulp.id = tb_perijinan.id_ulp AND penyulang.id_penyulang = tb_perijinan.id_penyulang AND 
                        pegawai.id=tb_perijinan.id_pegawai AND vendor.id=tb_perijinan.id_vendor AND status_pekerjaan.id_status=tb_perijinan.id_status 
                        AND tb_permohonan.id_mohon=tb_perijinan.id_mohon');
        
        $query = $this->db->get();
        
        
        return $query->result_array();
       
    }

    public function getJoinPerijinan2($limit,$start)
    {   
        
        $this->db->select('*');
        $this->db->from('ulp, penyulang, pegawai,vendor,tb_permohonan,status_pekerjaan');
        $this->db->join('tb_perijinan', 'ulp.id = tb_perijinan.id_ulp AND penyulang.id_penyulang = tb_perijinan.id_penyulang AND 
                        pegawai.id=tb_perijinan.id_pegawai AND vendor.id=tb_perijinan.id_vendor AND status_pekerjaan.id_status=tb_perijinan.id_status 
                        AND tb_permohonan.id_mohon=tb_perijinan.id_mohon');
        $query=$this->db->order_by('status_id','ASC')->limit($limit,$start)->get();
        
        return $query->result_array();
       
    }

    public function getJoinPerijinan1($id)
    {
        $this->db->select('*');
        $this->db->from('ulp, penyulang, pegawai,vendor,status_pekerjaan,tb_permohonan');
        $this->db->join('tb_perijinan', "ulp.id = tb_perijinan.id_ulp AND penyulang.id_penyulang = tb_perijinan.id_penyulang AND status_pekerjaan.id_status=tb_perijinan.id_status  
                        AND pegawai.id=tb_perijinan.id_pegawai AND vendor.id=tb_perijinan.id_vendor AND tb_permohonan.id_mohon=tb_perijinan.id_mohon AND tb_perijinan.id_ijin='$id'" );
        $query = $this->db->get();
        
        return $query->result_array();
       
    }

    public function countAllPerijinan()
    {
        return $this->db->get('tb_perijinan')->num_rows();
    }

   
    

}