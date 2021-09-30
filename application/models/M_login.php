<?php

class M_login extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
    
    function validasi_login($data){
        $query = $this->db->get_where('user', $data);
		return $query;
    }

    public function tampil_data($id_user = NULL)
    {
        return $this->db->from('user')
            ->where('user.id_user', $id_user)
            ->get()
            ->row();
    }
    public function suntingData_user($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function updateData_user($where, $data, $table)
    {
        extract($data);
        $this->db->where($where);
        $this->db->update($table, array ('nama_lengkap'=>$nama_lengkap, 'username'=>$username, 'email'=>$email, 'no_telp'=>$no_telp, 'alamat'=>$alamat, 'gambar' => $gambar));
    }
    public function lihatData_user($limit, $start)
    {
        return $this->db->get('user',$limit, $start)->result();
    }
}