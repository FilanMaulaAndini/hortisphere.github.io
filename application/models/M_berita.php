<?php

class M_berita extends CI_Model
{
    public function tampil_berita($limit, $start)
    {
        return $this->db->get('berita', $limit, $start)
            ->result();
    }
    public function tambahData_berita($data, $table)
    {
        $this->db->insert($table, $data);
        return TRUE;
    }
    public function lihatData_berita()
    {
        return $this->db->from('berita')->get()->result();
    }
    public function get_berita($id_berita = NULL)
    {
        return $this->db->from('berita')
            ->where('id_berita', $id_berita)
            ->get()
            ->row();
    }
    public function hapusData_berita($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function suntingData_berita($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function updateData_berita($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function get_keyword($keyword)
    {
        $this->db->from('berita');
        $this->db->like('tanggal_tambah', $keyword);
        $this->db->or_like('judul', $keyword);
        $this->db->or_like('isi', $keyword);
        return $this->db->get()->result();
    }
}