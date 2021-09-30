<?php

class C_info extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->library('session'); 
      $this->load->helper('url'); 
      $this->load->library('upload');
      $this->load->library('pagination');
      $this->load->model('M_info');
    }


    public function index_admin()
    {
        $this->load->model('M_info');
        $config['base_url'] = site_url('C_info/index_admin'); //site url
        $config['total_rows'] = $this->db->count_all('informasi'); //total row
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
        $data['hortisphere'] = $this->M_info->tampil_info($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();
        $this->load->model('M_login');
        $data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        $this->load->view('templates/header-admin2',$data2);
        $this->load->view('info/v_info', $data);
        $this->load->view('templates/footer-user');
    }

    public function sayur()
    {
        $config['base_url'] = site_url('C_info/sayur'); //site url
        $config['total_rows'] = $this->db->count_all('informasi'); //total row
        $config['per_page'] = 6;  //show record per halaman
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
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['hortisphere'] = $this->M_info->tampil_info($config["per_page"], $data['page']);
        
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('templates/header1');
        $this->load->view('info/v_info_sayur',$data);
        $this->load->view('templates/footer');
    }

    public function detail_info($id_info)
    {
        $where = array('id_info' => $id_info);
        $info['hortisphere'] = $this->M_info->get_info($id_info);

        $this->load->view('templates/header1');
        $this->load->view('info/v_info_detail',$info);
        $this->load->view('templates/footer');
    }

    public function buah()
    {
        $data['hortisphere'] = $this->M_info->lihatData_info();

        $this->load->view('templates/header1');
        $this->load->view('info/v_info_buah',$data);
        $this->load->view('templates/footer');
    }

    public function kacang()
    {
        $data['hortisphere'] = $this->M_info->lihatData_info();

        $this->load->view('templates/header1');
        $this->load->view('info/v_info_kacang',$data);
        $this->load->view('templates/footer');
    }

    public function tanamanhias()
    {
        $data['hortisphere'] = $this->M_info->lihatData_info();

        $this->load->view('templates/header1');
        $this->load->view('info/v_info_tanaman_hias',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_info()
    {
        $id_user = $this->input->post('id_user');
        $nama_komoditas = $this->input->post('nama_komoditas');
        $deskripsi_komoditas = $this->input->post('deskripsi_komoditas');
        $persiapan = $this->input->post('persiapan');
        $pembibitan = $this->input->post('pembibitan');
        $penanaman = $this->input->post('penanaman');
        $pemeliharaan = $this->input->post('pemeliharaan');
        $obat_pertanian = $this->input->post('obat_pertanian');
        $jenis = $this->input->post('jenis');

         // get foto
        $config['upload_path'] = './upload/komoditas/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '2048';  //2MB max
        $config['max_width'] = '4480'; // pixel
        $config['max_height'] = '4480'; // pixel
        $config['file_name'] = $_FILES['gambar_komoditas']['name'];

        $this->upload->initialize($config);

            if (!empty($_FILES['gambar_komoditas']['name'])) {
                if ( $this->upload->do_upload('gambar_komoditas') ) {
                    $gambar_komoditas = $this->upload->data();
                    $data = array(
                        'id_user' => $id_user,
                        'nama_komoditas' => $nama_komoditas,
                        'deskripsi_komoditas' => $deskripsi_komoditas,
                        'persiapan' => $persiapan,
                        'pembibitan' => $pembibitan,
                        'penanaman' => $penanaman,
                        'pemeliharaan' => $pemeliharaan,
                        'obat_pertanian' => $obat_pertanian,
                        'jenis' => $jenis,
                        'gambar_komoditas' => $gambar_komoditas['file_name']
                                );
                    $this->load->model('M_info');
                    $this->M_info->tambahData_info($data, 'informasi');
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
                    redirect('C_info/index_admin');
                    
                }else {
                die("gagal upload");
                }
            }else {
                $gambar = "default.jpg";
                $data = array(
                    'id_user' => $id_user,
                    'nama_komoditas' => $nama_komoditas,
                    'deskripsi_komoditas' => $deskripsi_komoditas,
                    'persiapan' => $persiapan,
                    'pembibitan' => $pembibitan,
                    'penanaman' => $penanaman,
                    'pemeliharaan' => $pemeliharaan,
                    'obat_pertanian' => $obat_pertanian,
                    'jenis' => $jenis,
                    'gambar_komoditas' => $gambar_komoditas['file_name']
                            );
                $this->load->model('M_info');
                $this->M_info->tambahData_info($data, 'informasi');
                $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
                redirect('C_info/index_admin');
            }
    }

    public function hapus_info($id_info)
    {
        $where = array('id_info' => $id_info);
        $this->load->model('M_info');
        $this->M_info->hapusData_info($where, 'informasi');
        $this->session->set_flashdata('hapus', 'Data Berhasil Dihapus');
        redirect('C_info/index_admin');
    }

    public function update_info($id_info)
    {
        $where = array('id_info' => $id_info);
        $this->load->model('M_info');
        $data['hortisphere'] = $this->M_info->suntingData_info($where, 'informasi')->row();

        $id_info = $this->input->post('id_info');
        $id_user = $this->input->post('id_user');
        $nama_komoditas = $this->input->post('nama_komoditas');
        $deskripsi_komoditas = $this->input->post('deskripsi_komoditas');
        $persiapan = $this->input->post('persiapan');
        $pembibitan = $this->input->post('pembibitan');
        $penanaman = $this->input->post('penanaman');
        $pemeliharaan = $this->input->post('pemeliharaan');
        $obat_pertanian = $this->input->post('obat_pertanian');
        $jenis = $this->input->post('jenis');
       

        $path = './upload/komoditas/';
        
        $config['upload_path'] = './upload/komoditas/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '2048';  //2MB max
        $config['max_width'] = '4480'; // pixel
        $config['max_height'] = '4480'; // pixel
        $config['file_name'] = $_FILES['gambar_komoditas']['name'];

        $this->upload->initialize($config);
            if (!empty($_FILES['gambar_komoditas']['name'])) {
                if ( $this->upload->do_upload('gambar_komoditas') ) {
                    $gambar_komoditas = $this->upload->data();

                    $data = array(
                        'id_user' => $id_user,
                        'nama_komoditas' => $nama_komoditas,
                        'deskripsi_komoditas' => $deskripsi_komoditas,
                        'persiapan' => $persiapan,
                        'pembibitan' => $pembibitan,
                        'penanaman' => $penanaman,
                        'pemeliharaan' => $pemeliharaan,
                        'obat_pertanian' => $obat_pertanian,
                        'jenis' => $jenis,
                        'gambar_komoditas' => $gambar_komoditas['file_name']
                    );
        
                    @unlink($path.$this->input->post('lama'));
                    $this->M_info->updateData_info($where, $data, 'informasi');
                    $this->session->set_flashdata('edit', 'Data Berhasil Disunting');
                    redirect('C_info/index_admin');
                }else {
                    die("gagal upload");
                    }
            }else {
                $gambar_komoditas = $this->input->post('lama');

                    $data = array(
                        'id_user' => $id_user,
                        'nama_komoditas' => $nama_komoditas,
                        'deskripsi_komoditas' => $deskripsi_komoditas,
                        'persiapan' => $persiapan,
                        'pembibitan' => $pembibitan,
                        'penanaman' => $penanaman,
                        'pemeliharaan' => $pemeliharaan,
                        'obat_pertanian' => $obat_pertanian,
                        'jenis' => $jenis,
                        'gambar_komoditas' => $gambar_komoditas
                    );
        
                    $this->M_info->updateData_info($where, $data, 'informasi');
                    $this->session->set_flashdata('edit', 'Data Berhasil Disunting');
                    redirect('C_info/index_admin');
            }

            
    }

    public function lihat_info($id_info)
    {
        $this->load->library('session');
        $where = array('id_info' => $id_info);
        $this->load->model('M_info');
        $data['hortisphere'] = $this->M_info->lihatData_info();
        
        redirect('C_info/index_admin');
    }

    public function cari()
    {
        $keyword = $this->input->post('keyword');
        $this->load->model('M_info');
        $this->load->model('M_login');

        $config['base_url'] = site_url('C_info/index_admin'); //site url
        $config['total_rows'] = $this->db->count_all('informasi'); //total row
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
        $data['hortisphere'] = $this->M_info->tampil_info($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();
        $data['hortisphere'] = $this->M_info->get_keyword($keyword);
        $data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));

        $this->load->view('templates/header-admin2',$data2);
        $this->load->view('info/v_info', $data);
        $this->load->view('templates/footer-user');
    }
    
}
