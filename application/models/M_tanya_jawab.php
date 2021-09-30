<?php

class M_tanya_jawab extends CI_Model
{
    public function kirim($data, $table)
    {
        $this->db->insert($table, $data);
        return TRUE;
    }
    public function balas($data, $table)
    {
        $this->db->insert($table, $data);
        return TRUE;
    }
}