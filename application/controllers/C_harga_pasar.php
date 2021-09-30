<?php

class C_harga_pasar extends CI_Controller {

	
	public function index() {
		$this->load->model('M_login');
		$data['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));

		$this->load->view('templates/header-member3',$data);
        $this->load->view('hargapasar/v_harga_pasar');
        $this->load->view('templates/footer-user');
	}

	public function index_admin() {
		$this->load->model('M_login');
		$data['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));

		$this->load->view('templates/header-admin5',$data);
		$this->load->view('hargapasar/v_harga_pasar');
		$this->load->view('templates/footer-user');		
	}	
}
?>