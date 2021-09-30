<?php

class C_register extends CI_Controller
{
    

      function __construct(){
        parent::__construct();
        $this->load->model('M_register');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
      
              //get all users
        $this->data['user'] = $this->M_register->getAllUsers();
       }
      
       public function index()
      {
        $this->load->view('v_register',  $this->data);
      } 

       public function register(){
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[30]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]',
                                          array ( 'required' => 'You have not provided %s.',
                                                  'is unique' => 'This %s already exists.'));
        if ($this->form_validation->run() == FALSE) { 
         $this->load->view('v_register', $this->data);
        }
        else{
         //get user inputs
         $nama_lengkap = $this->input->post('nama_lengkap');
         $username = $this->input->post('username');
         $email = $this->input->post('email');
         $password = $this->input->post('password');
         $no_telp = $this->input->post('no_telp');
         $alamat = $this->input->post('alamat');
         $user_level = member;
         $gambar = profil.jpg;
      
         //generate simple random code
         $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $code = substr(str_shuffle($set), 0, 12);
      
         //insert user to users table and get id
         $user['nama_lengkap'] = $nama_lengkap;
         $user['username'] = $username;
         $user['email'] = $email;
         $user['password'] = $password;
         $user['no_telp'] = $no_telp;
         $user['alamat'] = $alamat;
         $user['code'] = $code;
         $user['active'] = false;
         $user['user_level'] = $user_level;
         $user['gambar'] = "profil.jpg";
         $id_user = $this->M_register->insert($user);
      
         //set up email
         $config = array(
          'protocol' => 'smtp',
            'smtp_host' => 'ssl:HOST SMTP', //Ubah sesuai dengan host anda
            'smtp_port' => 465,
            'smtp_user' => 'YOUR EMAIL HOST', // Ubah sesuai dengan email yang dipakai untuk mengirim konfirmasi
            'smtp_pass' => 'EMAIL HOST', // ubah dengan password host anda
            'smtp_username' => 'USERNAME SMTP', // Masukkan username SMTP anda
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
           );
      
         $message =  "
         <html>
         <head>
         <title>Kode verifikasi</title>
         </head>
         <body>
         <h2>Terimakasih telah melakukan registrasi.</h2>
         <p>Akun Anda:</p>
         <p>Email: ".$email."</p>
         <p>Password: ".$password."</p>
         <p>Harap klik link dibawah ini untuk mengaktivasi akun Anda.</p>
         <h4><a href='".base_url()."user/activate/".$id_user."/".$code."'>Aktivasi Akun Saya</a></h4>
         </body>
         </html>
         ";
         
         $this->load->library('email', $config);
         $this->email->set_newline("\r\n");
         $this->email->from($config['smtp_user']);
         $this->email->to($email);
         $this->email->subject('Signup Verification Email');
         $this->email->message($message);
      
            //sending email
         if($this->email->send()){
          $this->session->set_flashdata('message','Kode aktivasi dikirim melalui email');
         }
         else{
          $this->session->set_flashdata('message', $this->email->print_debugger());
          
         }
         redirect('c_member/welcome');
        }
      
       }
      
       public function activate(){
        $id =  $this->uri->segment(3);
        $code = $this->uri->segment(4);
      
        //fetch user details
        $user = $this->M_register->getUser($id_user);
      
        //if code matches
        if($user['code'] == $code){
         //update user active status
         $data['active'] = true;
         $query = $this->M_register->activate($data, $id_user);
      
         if($query){
          $this->session->set_flashdata('message', 'Aktivasi telah berhasil');
         }
         else{
          $this->session->set_flashdata('message', 'Terdapat kesalahan saat mengaktifkan akun');
         }
        }
        else{
         $this->session->set_flashdata('message', 'Tidak dapat mengaktivasi. Kode tidak cocok');
        }

        redirect('C_register/index');
      
       }
}
