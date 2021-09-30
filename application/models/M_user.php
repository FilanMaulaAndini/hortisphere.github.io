<?php

class M_user extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
    }
    
    public function tampil_data()
    {
        return $this->db->from('user')->get()->result();
    }

    public function lihat($id_user = NULL)
    {
        return $this->db->from('user')
            ->where('id_user', $id_user)
            ->get()
            ->row();
    }
    
}