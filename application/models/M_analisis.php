<?php

class M_analisis extends CI_Model
{
    
    public function tambahData_analisis($data, $table)
    {
        $this->db->insert($table, $data);
        return TRUE;
    }
    public function lihatData_analisis()
    {
        return $this->db->from('analisis')->get()->result();
    }
    
}