<?php 

class C_login extends CI_Controller
{
    public function index()
    {
        $this->load->view('v_login');
    }

	public function auth() {
		$data = array('username' => $this->input->post('username', TRUE),
						'password' => $this->input->post('password', TRUE)
			);
		$this->load->model('M_login'); // load model_user
		$hasil = $this->M_login->validasi_login($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Login';
				$sess_data['id_user'] = $sess->id_user;
				$sess_data['username'] = $sess->username;
				$sess_data['nama_lengkap'] = $sess->nama_lengkap;
				$sess_data['email'] = $sess->email;
				$sess_data['user_level'] = $sess->user_level;
				$sess_data['gambar'] = $sess->gambar;
				$sess_data['no_telp'] = $sess->no_telp;
				$sess_data['alamat'] = $sess->alamat;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('user_level')=='admin') {
				redirect('c_admin/index');
			}
			elseif ($this->session->userdata('user_level')=='member') {
				redirect('c_member/index');
			}		
		}
		else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> username dan atau password salah</div>');
			redirect('c_login/index');
		}
		
	}

}
