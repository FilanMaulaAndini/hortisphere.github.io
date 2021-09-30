<?php

class C_tanya_jawab extends CI_Controller
{
    public function index()
    {
        $this->load->model('M_login');
        $data['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        
        $this->load->view('templates/header-member5',$data);
        $this->load->view('tanyajawab/v_tanya_jawab');
        $this->load->view('templates/footer-user');
    }

    public function index_admin()
    {
        $this->load->model('M_login');
		$data['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        $this->load->view('templates/header-admin7',$data);
        $this->load->view('tanyajawab/v_tanya_jawab_admin');
        $this->load->view('templates/footer-user');
    }
    
    public function kirim() {
        $id_user        = $this->input->post('id_user');
        $nama_lengkap   = $this->input->post('nama_lengkap');
        $email          = $this->input->post('email');
        $komentar       = $this->input->post('komentar');
        $status_komen   = 0;
        $data = array(
            'id_user' => $id_user,
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'status_komen' => $status_komen,
            'komentar' => $komentar
            );
        $this->load->model('M_tanya_jawab');
        $this->M_tanya_jawab->kirim($data, 'tanya_jawab');
        redirect('C_tanya_jawab/index');
    } 

    public function kirim_admin() {
        $id_user        = $this->input->post('id_user');
        $nama_lengkap   = $this->input->post('nama_lengkap');
        $email          = $this->input->post('email');
        $komentar       = $this->input->post('komentar');
        $status_komen   = 0;
        $data = array(
            'id_user' => $id_user,
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'status_komen' => $status_komen,
            'komentar' => $komentar
            );
        $this->load->model('M_tanya_jawab');
        $this->M_tanya_jawab->kirim($data, 'tanya_jawab');
        redirect('C_tanya_jawab/index_admin');
    } 

    public function balas() {
        $id_user        = $this->input->post('id_user');
        $nama_lengkap   = $this->input->post('nama_lengkap');
        $email          = $this->input->post('email');
        $komentar       = $this->input->post('balasan');
        $status_komen   = $this->input->post('id_komen');
        $data = array(
            'id_user' => $id_user,
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'status_komen' => $status_komen,
            'komentar' => $komentar
            );
        $this->load->model('M_tanya_jawab');
        $this->M_tanya_jawab->balas($data, 'tanya_jawab');
        redirect('C_tanya_jawab/index');
    } 

    public function balas_admin() {
        $id_user        = $this->input->post('id_user');
        $nama_lengkap   = $this->input->post('nama_lengkap');
        $email          = $this->input->post('email');
        $komentar       = $this->input->post('balasan');
        $status_komen   = $this->input->post('id_komen');
        $data = array(
            'id_user' => $id_user,
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'status_komen' => $status_komen,
            'komentar' => $komentar
            );
        $this->load->model('M_tanya_jawab');
        $this->M_tanya_jawab->balas($data, 'tanya_jawab');
        redirect('C_tanya_jawab/index_admin');
    } 
}
