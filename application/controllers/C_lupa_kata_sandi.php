<?php

class C_lupa_kata_sandi extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('M_lupa_kata_sandi');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->data['user'] = $this->M_lupa_kata_sandi->getAllUsers();
    }

    public function index()
    {
        $this->load->view('v_lupa_kata_sandi', $this->data);
    }

    public function reset_password_validation(){
        
        $password=$this->input->post('password');
        $username=$this->input->post('username');
        $user= $this->db->get_where('user',['username'=>$username])->row_array();
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[30]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) { 
            $this->load->view('v_lupa_kata_sandi', $this->data);
           }
        else{
                if($user==true){
                $data = array(
                    'password' => $password,
                    'username' => $username,
            
                );
                $where = array('username' => $username);
                $this->M_lupa_kata_sandi->reset($where, $data, 'user');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password telah diperbarui</div>');
                redirect('C_login/index');
            }
            else{
                $this->session->set_flashdata('message', 'Username tidak terdaftar pada sistem');
                redirect('C_lupa_kata_sandi/index');
            }
        }
    }
}
