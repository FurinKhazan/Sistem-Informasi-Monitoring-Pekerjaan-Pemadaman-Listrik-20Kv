<?php

class Pekerjaan_model extends CI_model {

    public function getAllPekerjaan()
    {
        return $this->db->get('tb_pekerjaanselesai')->result_array();  // Produces: SELECT * FROM mytablessds//

    }

    public function hapusDataPekerjaan($id)
    {
    	$this->db->where('id_selesai', $id);
    	$this->db->delete('tb_pekerjaanselesai');
    	// $this->db->delete('pegawai', array('id' => $id)); //query ci untuk hapus data
    }
    public function dataPekerjaanById($id)
    {
        return $this->db->get_where('tb_pekerjaanselesai', ['id_selesai' => $id])->row_array();
    }

    public function ubahDataPekerjaan()
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

        // $where= [
        //     "id_mohon" => $id
        // ];

        $this->db->where('id_mohon', $this->input->post('id_mohon'));
        $this->db->update('tb_permohonan', $data);
        // var_dump($_POST);
        // die;
    }
    public function keputusanDataPekerjaan()
    {
        // $progres2 = $this->input->post('progres2');
        // if (!empty ($progres2) ) {
        // if ( $progres2 == 20 ) {
        //    $id_progres2 = "1";} }  else {
        //     $id_progres2 = "1";
        //    }              
        // $progres1 = $this->input->post('progres1');
        // if (!empty ($progres1)) {
        // if ( $progres1 == 20 ) {
        //    $id_progres1 = "1";}  }        
        // $progres3 = $this->input->post('progres3');
        // if (!empty ($progres3)) {
        // if ( $progres3 == 20 ) {
        //    $id_progres3 = "1";}} else {
        //     $id_progres3 = "1";
        //    }       
        
        // $progres2 = $this->input->post('$progres1');
        // if (  $progres2 == 20 ) {
        //    $id_progres2 = "1";}          
        // $progres3 = $this->input->post('progres3');
        // if ( isset($progres3)) {
        //    $id_progres3 = 1;}          
        // $progres4 = $this->input->post('progres4');
        // if (isset($progres4)) {
        //    $id_progres4 = 1;}          
        // $progres5 = $this->input->post('progres5');
        // if ( isset($progres5)) {
        //    $id_progres5 = 1;}   
        // var_dump($progres2);die;       

        $progres = (
                    $this->input->post('progres1')+
                    $this->input->post('progres2')+
                    $this->input->post('progres3')+
                    $this->input->post('progres4')+
                    $this->input->post('progres5')
                    );
    
        
        $data = [
            "id_mohon" => $this->input->post('id_mohon',true),
            "id_status" => $this->input->post('id_status',true),
            "id_ulp" => $this->input->post('id_ulp',true),
            "id_pegawai" => $this->input->post('id_pegawai',true),
            "id_vendor" => $this->input->post('id_vendor',true),
            "id_penyulang" => $this->input->post('id_penyulang',true),
            "jam_padam" => $this->input->post('jam_padam',true),
            "jam_nyala" => $this->input->post('jam_nyala',true),
            "id_progres1" => $this->input->post('progres1'),
            "id_progres2" => $this->input->post('progres2'),
            "id_progres3" => $this->input->post('progres3'),
            "id_progres4" => $this->input->post('progres4'),
            "id_progres5" => $this->input->post('progres5'),           
            "progres" => $progres  
            ];
            $this->db->where('id_selesai', $this->input->post('id_selesai'));
            $this->db->update('tb_pekerjaanselesai',$data);
    }

    public function cariDataPekerjaan()
    {
        $keyword = $this->input->post('keyword',true);
        $this->db->select('*');
        $this->db->from('ulp, penyulang, pegawai,vendor,tb_permohonan,tb_perijinan,status_pekerjaan');
        $this->db->join('tb_pekerjaanselesai', 'ulp.id = tb_pekerjaanselesai.id_ulp 
                        AND penyulang.id_penyulang = tb_pekerjaanselesai.id_penyulang 
                        AND pegawai.id=tb_pekerjaanselesai.id_pegawai 
                        AND vendor.id=tb_pekerjaanselesai.id_vendor 
                        AND status_pekerjaan.id_status=tb_pekerjaanselesai.id_status 
                        AND tb_perijinan.id_ijin=tb_pekerjaanselesai.id_ijin 
                        AND tb_permohonan.id_mohon=tb_pekerjaanselesai.id_mohon');

                        $this->db->like('nama_vendor',$keyword);
                        $this->db->or_like('pekerjaan',$keyword);
                        $this->db->or_like('nama',$keyword);
                        $this->db->or_like('nama_penyulang',$keyword);
                        $query = $this->db->get();
                        return $query->result_array();
    }
    
    public function getJoinPekerjaan()
    {
        $this->db->select('*');
        $this->db->from('ulp, penyulang, pegawai,vendor,tb_permohonan,tb_perijinan,status_pekerjaan');
        $this->db->join('tb_pekerjaanselesai', 'ulp.id = tb_pekerjaanselesai.id_ulp 
                        AND penyulang.id_penyulang = tb_pekerjaanselesai.id_penyulang 
                        AND pegawai.id=tb_pekerjaanselesai.id_pegawai 
                        AND vendor.id=tb_pekerjaanselesai.id_vendor 
                        AND status_pekerjaan.id_status=tb_pekerjaanselesai.id_status 
                        AND tb_perijinan.id_ijin=tb_pekerjaanselesai.id_ijin 
                        AND tb_permohonan.id_mohon=tb_pekerjaanselesai.id_mohon');
        
        $query=$this->db->order_by('tanggal_pekerjaan','DESC')->get();

        return $query->result_array();
       
    }

    public function getJoinPekerjaan2($limit,$start)
    {
        $this->db->select('*');
        $this->db->from('ulp, penyulang, pegawai,vendor,tb_permohonan,tb_perijinan,status_pekerjaan');
        $this->db->join('tb_pekerjaanselesai', 'ulp.id = tb_pekerjaanselesai.id_ulp 
                        AND penyulang.id_penyulang = tb_pekerjaanselesai.id_penyulang 
                        AND pegawai.id=tb_pekerjaanselesai.id_pegawai 
                        AND vendor.id=tb_pekerjaanselesai.id_vendor 
                        AND status_pekerjaan.id_status=tb_pekerjaanselesai.id_status 
                        AND tb_perijinan.id_ijin=tb_pekerjaanselesai.id_ijin 
                        AND tb_permohonan.id_mohon=tb_pekerjaanselesai.id_mohon');

        $query=$this->db->order_by('status_id','DESC')->limit($limit,$start)->get();
        return $query->result_array();
       
    }

    public function getJoinPekerjaan1($id)
    {
        $this->db->select('*');
        $this->db->from('ulp, penyulang, pegawai,vendor,status_pekerjaan,tb_permohonan, tb_perijinan');
        $this->db->join('tb_pekerjaanselesai', "ulp.id = tb_pekerjaanselesai.id_ulp 
                        AND penyulang.id_penyulang = tb_pekerjaanselesai.id_penyulang 
                        AND pegawai.id=tb_pekerjaanselesai.id_pegawai 
                        AND vendor.id=tb_pekerjaanselesai.id_vendor 
                        AND tb_perijinan.id_ijin=tb_pekerjaanselesai.id_ijin 
                        AND tb_permohonan.id_mohon=tb_pekerjaanselesai.id_mohon
                        AND status_pekerjaan.id_status=tb_pekerjaanselesai.id_status
                        AND tb_pekerjaanselesai.id_selesai='$id'" );
        $query = $this->db->get();

        return $query->result_array();
       
    }

    public function countAllPekerjaan()
    {
        return $this->db->get('tb_pekerjaanselesai')->num_rows();
    }

    

}