<?php

class C_member extends CI_Controller {

	
	public function index() {
		$this->load->model('M_login');
		$data['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
		$this->load->view('templates/header-member', $data);
        $this->load->view('home/v_beranda-member');
        $this->load->view('templates/footer-user');
	}

	public function welcome() {
        $this->load->view('v_welcome_message');
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('Home/index');
	}

	public function lihat_profil($id_user) {
		$this->load->model('M_login');
		$data['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        $this->load->view('user/v_view_profile.php', $data);
	}

	public function btn_edit($id_user) {
		$this->load->model('M_login');
		$where = array('id_user' => $id_user);
		$data['detail'] = $this->M_login->suntingData_user($where, 'user')->row();
        $this->load->view('user/v_edit_profile.php',$data);
	}

	public function update_profil($id_user) {
		
		$this->load->library('upload');
		$where = array('id_user' => $id_user);

		$nama_lengkap = $this->input->post('nama_lengkap');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');
		$alamat= $this->input->post('alamat');

		$config['upload_path'] = './upload/user/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '2048';  //2MB max
        $config['max_width'] = '4480'; // pixel
        $config['max_height'] = '4480'; // pixel
        $config['file_name'] = $_FILES['gambar']['name'];

		$this->upload->initialize($config);
		if (!empty($_FILES['gambar']['name'])) {
			if ( $this->upload->do_upload('gambar') ) {
				$gambar = $this->upload->data();
				$data = array(
					'nama_lengkap'=>$nama_lengkap, 
					'username'=>$username, 
					'email'=>$email, 
					'no_telp'=>$no_telp, 
					'alamat'=> $alamat, 
					'gambar' => $gambar['file_name']
				);
				
				$this->load->model('M_login');
                $this->M_login->updateData_user($where, $data, 'user');
				redirect('C_member/index/'.$id_user);
			} else {
				die("gagal upload");
			}
		} else {
			$gambar = $this->input->post('lama');
			$data = array(
				'nama_lengkap'=>$nama_lengkap, 
				'username'=>$username, 
				'email'=>$email, 
				'no_telp'=>$no_telp, 
				'alamat'=> $alamat, 
				'gambar' => $gambar
			);
			$this->load->model('M_login');
			$this->M_login->updateData_user($where, $data, 'user');
			redirect('C_member/index/'.$id_user);
		}
	}
}
?>