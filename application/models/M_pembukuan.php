<?php

class M_pembukuan extends CI_Model
{
    public function tampil_catatan($limit, $start)
    {
        return $this->db->from('catatan',$limit, $start)
        ->join('masa_tanam', 'masa_tanam.id_tanam=catatan.id_tanam')
        ->get('')
        ->result();
    }
    public function tambahData_masaTanam($data, $table)
    {
        $this->db->insert($table, $data);
        return TRUE;
    }
    public function tambahData_catatan($data, $table)
    {
        $this->db->insert($table, $data);
        return TRUE;
    }
    public function join_masaTanamCatatan()
    {
        return $this->db->from('catatan')
        ->join('masa_tanam', 'masa_tanam.id_tanam=catatan.id_tanam')
        ->get()
        ->result();
    }
    public function join_masaTanamCatatan2($id)
    {
        return $this->db->from('catatan')
        ->join('masa_tanam', 'masa_tanam.id_tanam=catatan.id_tanam')
        ->where('catatan.id_tanam', $id)
        ->get()
        ->result();
    }
    public function join_userCatatan($id)
    {
        return $this->db->from('user')
        ->join('catatan', 'catatan.id_user=user.id_user')
        ->join('masa_tanam', 'catatan.id_tanam=masa_tanam.id_tanam')
        ->where('user.id_user', $id)
        ->get()
        ->result();
    }
    public function join_userMasaTanam($id,$id_tanam)
    {
        return $this->db->from('catatan')
        ->join('masa_tanam', 'masa_tanam.id_tanam=catatan.id_tanam')
        ->where('catatan.id_user', $id)
        ->where('catatan.id_tanam', $id_tanam)
        ->get()
        ->result();
    }
    public function join_masaTanam($id)
    {
        return $this->db->distinct()
        ->select('user.id_user, masa_tanam.id_tanam, masa_tanam.komoditas, masa_tanam.masa')
        ->from('masa_tanam')
        ->join('user','user.id_user=masa_tanam.id_user')
        ->where('masa_tanam.id_user', $id)
        ->get()
        ->result();
    }
    public function lihatData_masaTanam()
    {
        return $this->db->from('masa_tanam')->get()->result();
    }
    public function lihatData_catatan()
    {
        return $this->db->from('catatan')->get()->result();
    }
    public function lihatData_user($limit, $start)
    {
        return $this->db->get('user',$limit, $start)->result();
    }
    public function hapusData_catatan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function hapusData_catatanUser($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->delete($table, $data);
    }
    public function suntingData_catatan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function updateData_catatan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function subTotal()
    {
        return $this->db->query("SELECT id_user, id_tanam, SUM(pemasukan) AS total, SUM(pengeluaran) AS total2  FROM catatan GROUP BY id_user, id_tanam");
    }
    public function subTotalUser($id)
    {
        return $this->db->query("SELECT id_tanam, SUM(pemasukan) AS total, SUM(pengeluaran) AS total2  FROM catatan WHERE id_user='$id' GROUP BY id_tanam");
        
    }
    public function get_keyword($keyword)
    {
        $this->db->from('user');
        $this->db->like('id_user', $keyword);
        $this->db->or_like('nama_lengkap', $keyword);
        $this->db->or_like('username', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get()->result();
    }
    public function get_keyword2($id, $keyword)
    {
        $this->db->from('catatan')
        ->join('masa_tanam', 'masa_tanam.id_tanam=catatan.id_tanam')
        ->where('catatan.id_user', $id);
        $this->db->like('tanggal_tambah', $keyword);
        $this->db->or_like('komoditas', $keyword);
        $this->db->or_like('masa', $keyword);
        $this->db->or_like('uraian', $keyword);
        $this->db->or_like('pemasukan', $keyword);
        $this->db->or_like('pengeluaran', $keyword);
        return $this->db->get()->result();
    }
}