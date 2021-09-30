<?php

class M_info extends CI_Model
{
    public function tampil_info($limit, $start)
    {
        return $this->db->get('informasi', $limit, $start)
            ->result();
    }
    public function tambahData_info($data, $table)
    {
        $this->db->insert($table, $data);
        return TRUE;
    }
    public function lihatData_info()
    {
        return $this->db->from('informasi')->get()->result();
    }
    public function hapusData_info($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function suntingData_info($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function updateData_info($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function get_info($id_info = NULL)
    {
        return $this->db->from('informasi')
            ->where('id_info', $id_info)
            ->get()
            ->row();
    }
    public function get_keyword($keyword)
    {
        $this->db->from('informasi');
        $this->db->like('tanggal_tambah', $keyword);
        $this->db->or_like('nama_komoditas', $keyword);
        $this->db->or_like('jenis', $keyword);
        return $this->db->get()->result();
    }
}