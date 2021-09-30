<?php

class C_admin extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->model('M_login');
		$this->load->library('form_validation');
		$this->load->helper('url');
    }

	public function index() {
		$data['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));

		$this->load->view('templates/header-admin',$data);
		$this->load->view('home/v_beranda-admin');
		$this->load->view('templates/footer-user');
	}

	public function lihat_profil($id_user) {
		$this->load->model('M_login');
		$data['detail'] = $this->M_login->tampil_data($id_user);
        $this->load->view('user/v_view_profile.php', $data);
	}

	public function btn_edit() {
		$this->load->model('M_login');
		$config['base_url'] = site_url('C_admin/btn_edit/'); //site url
        $config['total_rows'] = $this->db->count_all('user'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config['uri_segment'] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 1;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-right"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['hortisphere'] = $this->M_login->lihatData_user($config["per_page"], $data['page']);
		$data['pagination'] = $this->pagination->create_links();
		$data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
		$this->load->view('templates/header-admin', $data2);
		$this->load->view('user/v_edit_profile_member.php',$data);
		$this->load->view('templates/footer-user');
	}

	public function sunting_profil($id_user) {
		$this->load->model('M_login');
		$where = array('id_user' => $id_user);
		$data['detail'] = $this->M_login->suntingData_user($where, 'user')->row();
        $this->load->view('user/v_edit_profile_admin.php',$data);
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
				redirect('C_admin/btn_edit/');
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
			redirect('C_admin/btn_edit/');
		}
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('home/index');
	}
}
?>