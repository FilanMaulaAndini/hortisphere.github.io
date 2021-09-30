<?php

class C_berita extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->library('session'); 
      $this->load->helper('url'); 
      $this->load->library('upload');
      $this->load->library('pagination');
    }

    public function index()
    {
        $this->load->library('pagination');
        $this->load->model('M_berita');
        $config['base_url'] = site_url('C_berita/index'); //site url
        $config['total_rows'] = $this->db->count_all('berita'); //total row
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
        $berita['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $berita['hortisphere'] = $this->M_berita->tampil_berita($config["per_page"], $berita['page']);

        $berita['pagination'] = $this->pagination->create_links();
        $this->load->model('M_login');
		$data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        $this->load->view('templates/header-admin3',$data2);
        $this->load->view('berita/v_berita_admin',$berita);
        $this->load->view('templates/footer-user');
    }

    public function lihat_berita()
    {
        $this->load->library('pagination');
        $this->load->model('M_berita');
        $config['base_url'] = site_url('C_berita/lihat_berita'); //site url
        $config['total_rows'] = $this->db->count_all('berita'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config['uri_segment'] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 1;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagination-wrap"><nav><ul class="pagination-wrap text-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';
        $config['first_tag_open']   = '<li class="page-item active">';
        $config['first_tag_close']  = '<span class="sr-only">(current)</span></li>';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></li>';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tagl_close']  = 'Next</li>';
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tagl_close']  = '</li>';

        $this->pagination->initialize($config);
        $berita['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $berita['hortisphere'] = $this->M_berita->tampil_berita($config["per_page"], $berita['page']);

        $berita['pagination'] = $this->pagination->create_links();
        $this->load->view('templates/header1');
        $this->load->view('berita/v_berita',$berita);
        $this->load->view('templates/footer');
    }

    public function detail_berita($id_berita)
    {
        $where = array('id_berita' => $id_berita);
        $this->load->model('M_berita');
        $berita['hortisphere'] = $this->M_berita->get_berita($id_berita);

        $this->load->view('templates/header1');
        $this->load->view('berita/v_detail_berita',$berita);
        $this->load->view('templates/footer');
    }

    public function tambah_berita()
    {
        $id_user = $this->input->post('id_user');
        $judul = $this->input->post('judul');
        $isi= $this->input->post('isi');
        
        $config['upload_path'] = './upload/berita/';
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
                        'id_user' => $id_user,
                        'judul' => $judul,
                        'isi' => $isi,
                        'gambar' => $gambar['file_name']
                        );
                    $this->load->model('M_berita');
                    $this->M_berita->tambahData_berita($data, 'berita');
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
                    redirect('C_berita/index');
                }else {
                    die("gagal upload");
                }
            }else {
                $gambar = "default.jpg";
                $data = array(
                    'id_user' => $id_user,
                    'judul' => $judul,
                    'isi' => $isi,
                    'gambar' => $gambar['file_name']
                    );
                $this->load->model('M_berita');
                $this->M_berita->tambahData_berita($data, 'berita');
                $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
                redirect('C_berita/index');
            }
            
    }

    public function hapus_berita($id_berita)
    {
        $where = array('id_berita' => $id_berita);
        $this->load->model('M_berita');
        $this->M_berita->hapusData_berita($where, 'berita');
        $this->session->set_flashdata('hapus', 'Data Berhasil Dihapus');
        redirect('C_berita/index');
    }

    public function update_berita($id_berita)
    {
        $where = array('id_berita' => $id_berita);
        $this->load->model('M_berita');
        $data['hortisphere'] = $this->M_berita->suntingData_berita($where, 'berita')->row();

        $id_user = $this->input->post('id_user');
        $id_berita = $this->input->post('id_berita');
        $judul = $this->input->post('judul');
        $isi= $this->input->post('isi');

        $path = './upload/berita/';
        
        $config['upload_path'] = './upload/berita/';
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
                        'id_user' => $id_user,
                        'judul' => $judul,
                        'isi' => $isi,
                        'gambar' => $gambar['file_name']
                    );
                    @unlink($path.$this->input->post('lama'));
                    $this->M_berita->updateData_berita($where, $data, 'berita');
                    $this->session->set_flashdata('edit', 'Data Berhasil Disunting');
                    redirect('C_berita/index');
                }else {
                    die("gagal upload");
                    }
            }else {
                $gambar = $this->input->post('lama');

                $data = array(
                    'id_user' => $id_user,
                    'judul' => $judul,
                    'isi' => $isi,
                    'gambar' => $gambar
                );

                $this->M_berita->updateData_berita($where, $data, 'berita');
                $this->session->set_flashdata('edit', 'Data Berhasil Disunting');
                redirect('C_berita/index');
            }
            
    }

    public function lihat($id_berita)
    {
        $this->load->library('session');
        $where = array('id_berita' => $id_berita);
        $this->load->model('M_berita');
        $berita['hortisphere'] = $this->M_berita->lihatData_berita();
        
        redirect('C_berita/index');
    }

    public function cari()
    {
        $keyword = $this->input->post('keyword');
        $this->load->library('pagination');
        $this->load->model('M_berita');
        $config['base_url'] = site_url('C_berita/index'); //site url
        $config['total_rows'] = $this->db->count_all('berita'); //total row
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
        $berita['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $berita['hortisphere'] = $this->M_berita->tampil_berita($config["per_page"], $berita['page']);

        $berita['pagination'] = $this->pagination->create_links();
        $this->load->model('M_login');
        $berita['hortisphere'] = $this->M_berita->get_keyword($keyword);
        $data['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        
        $this->load->view('templates/header-admin3',$data);
        $this->load->view('berita/v_berita_admin',$berita);
        $this->load->view('templates/footer-user');
    }

}
