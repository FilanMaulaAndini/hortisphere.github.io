<?php

class M_lupa_kata_sandi extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
    function validasi($data){
        $query = $this->db->get_where('user', $data);
		return $query;
    }
    public function reset($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function getAllUsers(){
        $query = $this->db->get('user');
        return $query->result(); 
       }
}