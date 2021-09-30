<?php

class C_pembukuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }
    public function index()
    {
        $this->load->model('M_pembukuan');
        $config['base_url'] = site_url('C_pembukuan/index'); //site url
        $config['total_rows'] = $this->db->count_all('catatan'); //total row
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
        $data['join'] = $this->M_pembukuan->tampil_catatan($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $data['hortisphere1'] = $this->M_pembukuan->lihatData_masaTanam();
        $data['subtotal1'] = $this->M_pembukuan->subTotal()->result();
        $this->load->model('M_login');
		$data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        $this->load->view('templates/header-member2',$data2);
        $this->load->view('pembukuan/v_pembukuan_member',$data);
        $this->load->view('templates/footer-user');
    }

    public function index_admin()
    {
        $this->load->model('M_pembukuan');
        $config['base_url'] = site_url('C_pembukuan/index_admin'); //site url
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
        $data['hortisphere'] = $this->M_pembukuan->lihatData_user($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->model('M_login');
		$data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        $this->load->view('templates/header-admin4',$data2);
        $this->load->view('pembukuan/v_pembukuan_admin',$data);
        $this->load->view('templates/footer-user');
    }

    public function tambah_masaTanam()
    {
        $id_user = $this->input->post('id_user');
        $komoditas = $this->input->post('komoditas');
        $masa = $this->input->post('masa');
        $tanggal_mulai_tanam = $this->input->post('tanggal_mulai_tanam');

            $data = array(
                'id_user' => $id_user,
                'komoditas' => $komoditas,
                'masa' => $masa,
                'tanggal_mulai_tanam' => $tanggal_mulai_tanam,
        );
        $this->load->model('M_pembukuan');
        $this->M_pembukuan->tambahData_masaTanam($data, 'masa_tanam');
        $this->session->set_flashdata('success', 'Masa Tanam Berhasil Ditambahkan');
        redirect('C_pembukuan/index');
    }

    public function tambah_catatan()
    {
        $id_user = $this->input->post('id_user');
        $id_tanam = $this->input->post('id_tanam');
        $uraian = $this->input->post('uraian');
        $kategori = $this->input->post('kategori');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');

        if($kategori=='pemasukan'){
            $data = array(
                'id_user' => $id_user,
                'id_tanam' => $id_tanam,
                'uraian' => $uraian,
                'pemasukan' => $jumlah,
                'pengeluaran' => 0,
                'keterangan' => $keterangan,
        );
        $this->load->model('M_pembukuan');
        $this->M_pembukuan->tambahData_catatan($data, 'catatan');
        $this->session->set_flashdata('success', 'Catatan Berhasil Ditambahkan');
        redirect('C_pembukuan/index');
        } else if($kategori=='pengeluaran'){
            $data = array(
                'id_user' => $id_user,
                'id_tanam' => $id_tanam,
                'uraian' => $uraian,
                'pemasukan' => 0,
                'pengeluaran' => $jumlah,
                'keterangan' => $keterangan,
        );
        $this->load->model('M_pembukuan');
        $this->M_pembukuan->tambahData_catatan($data, 'catatan');
        $this->session->set_flashdata('success', 'Catatan Berhasil Ditambahkan');
        redirect('C_pembukuan/index');
        }
    }

    public function update_catatan($id_catatan)
    {
        $where = array('id_catatan' => $id_catatan);
        $this->load->model('M_pembukuan');
        $data['hortisphere2'] = $this->M_pembukuan->suntingData_catatan($where, 'catatan')->row();

        $id_user = $this->input->post('id_user');
        $uraian = $this->input->post('uraian');
        $pemasukan = $this->input->post('pemasukan');
        $pengeluaran = $this->input->post('pengeluaran');
        $keterangan = $this->input->post('keterangan');

            $data = array(
                'id_user' => $id_user,
                'uraian' => $uraian,
                'pemasukan' => $pemasukan,
                'pengeluaran' => $pengeluaran,
                'keterangan' => $keterangan,
        );
        
        $this->M_pembukuan->updateData_catatan($where, $data, 'catatan');
        $this->session->set_flashdata('edit', 'Catatan Berhasil Disunting');
        redirect('C_pembukuan/index');
    }

    public function hapus_catatan($id_catatan)
    {

        $where = array('id_catatan' => $id_catatan);
        $this->load->model('M_pembukuan');
        $this->M_pembukuan->hapusData_catatan($where, 'catatan');
        $this->session->set_flashdata('hapus', 'Catatan Berhasil Dihapus');
        redirect('C_pembukuan/index');
    }

    public function btn_catatanMasaTanam()
    {
        $this->load->model('M_pembukuan');
        $data['hortisphere1'] = $this->M_pembukuan->lihatData_masaTanam();
        $this->load->model('M_login');
		$data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        $this->load->view('templates/header-member2',$data2);
        $this->load->view('pembukuan/v_laporan_permasatanam',$data);
        $this->load->view('templates/footer-user');
    }

    public function detail_catatanMasaTanam($id_tanam)
    {
        $this->load->model('M_pembukuan');
        $data['hortisphere'] = $this->M_pembukuan->join_masaTanamCatatan2($id_tanam);
        $this->load->model('M_login');
		$data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        $this->load->view('templates/header-member2',$data2);
        $this->load->view('pembukuan/v_detail_laporan_permasatanam',$data);
        $this->load->view('templates/footer-user');
    }

    public function detail_pembukuan($id_user)
    {
        $this->load->model('M_pembukuan');
        $data['hortisphere'] = $this->M_pembukuan->join_masaTanamCatatan2($id_user);
        $data['join'] = $this->M_pembukuan->join_userCatatan($id_user);
        $data['join2'] = $this->M_pembukuan->join_masaTanam($id_user);
        $data['subtotal1'] = $this->M_pembukuan->subTotalUser($id_user)->result();

        $this->load->model('M_login');
		$data2['detail'] = $this->M_login->tampil_data($id_user);
        $this->load->view('templates/header-admin4-1',$data2);
        $this->load->view('pembukuan/v_detail_pembukuan_member',$data);
        $this->load->view('templates/footer-user');
    }

    public function tambah_masaTanamUser()
    {
        $id_user = $this->input->post('id_user');
        $komoditas = $this->input->post('komoditas');
        $masa = $this->input->post('masa');
        $tanggal_mulai_tanam = $this->input->post('tanggal_mulai_tanam');

            $data = array(
                'id_user' => $id_user,
                'komoditas' => $komoditas,
                'masa' => $masa,
                'tanggal_mulai_tanam' => $tanggal_mulai_tanam,
        );
        $this->load->model('M_pembukuan');

        $this->M_pembukuan->tambahData_masaTanam($data, 'masa_tanam');
        $this->session->set_flashdata('success', 'Masa Tanam Berhasil Ditambahkan');
        redirect('C_pembukuan/detail_pembukuan/'.$id_user);
    }

    public function tambah_catatanUser()
    {
        $id_user = $this->input->post('id_user');
        $id_tanam = $this->input->post('id_tanam');
        $uraian = $this->input->post('uraian');
        $kategori = $this->input->post('kategori');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');

        if($kategori=='pemasukan'){
            $data = array(
                'id_user' => $id_user,
                'id_tanam' => $id_tanam,
                'uraian' => $uraian,
                'pemasukan' => $jumlah,
                'pengeluaran' => 0,
                'keterangan' => $keterangan,
        );
        $this->load->model('M_pembukuan');
        $this->M_pembukuan->tambahData_catatan($data, 'catatan');
        $this->session->set_flashdata('success', 'Catatan Berhasil Ditambahkan');
        redirect('C_pembukuan/detail_pembukuan/'.$id_user);
        } else if($kategori=='pengeluaran'){
            $data = array(
                'id_user' => $id_user,
                'id_tanam' => $id_tanam,
                'uraian' => $uraian,
                'pemasukan' => 0,
                'pengeluaran' => $jumlah,
                'keterangan' => $keterangan,
        );
        $this->load->model('M_pembukuan');
        $this->M_pembukuan->tambahData_catatan($data, 'catatan');
        $this->session->set_flashdata('success', 'Catatan Berhasil Ditambahkan');
        redirect('C_pembukuan/detail_pembukuan/'.$id_user);
        }
    }

    public function update_catatanUser($id_catatan)
    {
        $where = array('id_catatan' => $id_catatan);
        $this->load->model('M_pembukuan');
        $data['hortisphere2'] = $this->M_pembukuan->suntingData_catatan($where, 'catatan')->row();

        $id_user = $this->input->post('id_user');
        $uraian = $this->input->post('uraian');
        $pemasukan = $this->input->post('pemasukan');
        $pengeluaran = $this->input->post('pengeluaran');
        $keterangan = $this->input->post('keterangan');

            $data = array(
                'id_user' => $id_user,
                'uraian' => $uraian,
                'pemasukan' => $pemasukan,
                'pengeluaran' => $pengeluaran,
                'keterangan' => $keterangan,
        );
        
        $this->M_pembukuan->updateData_catatan($where, $data, 'catatan');
        $this->session->set_flashdata('edit', 'Catatan Berhasil Disunting');
        redirect('C_pembukuan/detail_pembukuan/'.$id_user);
    }

    public function hapus_catatanUser($id_catatan)
    {

        $where = array('id_catatan' => $id_catatan);
        $this->load->model('M_pembukuan');
        $id_user = $this->input->post('id_user');
        $data = array(
            'id_user' => $id_user
    );
        $this->M_pembukuan->hapusData_catatanUser($where, $data, 'catatan');
        $this->session->set_flashdata('hapus', 'Catatan Berhasil Dihapus');
        redirect('C_pembukuan/detail_pembukuan/'.$id_user);
    }

    public function detail_catatanMasaTanamUser($id_user, $id_tanam)
    {
        $this->load->model('M_pembukuan');
        $data['hortisphere'] = $this->M_pembukuan->join_userMasaTanam($id_user,$id_tanam);
        $this->load->model('M_login');
		$data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        $this->load->view('templates/header-admin4',$data2);
        $this->load->view('pembukuan/v_detail_laporan_permasatanam_member',$data);
        $this->load->view('templates/footer-user');
    }

    public function cari()
    {
        $keyword = $this->input->post('keyword');
        $this->load->model('M_pembukuan');
        $config['base_url'] = site_url('C_pembukuan/index_admin'); //site url
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
        $data['hortisphere'] = $this->M_pembukuan->lihatData_user($config["per_page"], $data['page']);
        $data['hortisphere'] = $this->M_pembukuan->get_keyword($keyword);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->model('M_login');
		$data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        $this->load->view('templates/header-admin4',$data2);
        $this->load->view('pembukuan/v_pembukuan_admin',$data);
        $this->load->view('templates/footer-user');
    }

    public function cari2($id_user)
    {
        $keyword = $this->input->post('keyword');
        $this->load->model('M_pembukuan');
        $data['hortisphere'] = $this->M_pembukuan->join_masaTanamCatatan2($id_user);
        $data['join2'] = $this->M_pembukuan->join_masaTanam($id_user);
        $data['subtotal1'] = $this->M_pembukuan->subTotalUser($id_user)->result();
        $data['join'] = $this->M_pembukuan->get_keyword2($id_user,$keyword);

        $this->load->model('M_login');
		$data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        $this->load->view('templates/header-admin4-1',$data2);
        $this->load->view('pembukuan/v_detail_pembukuan_member',$data);
        $this->load->view('templates/footer-user');
    }

    public function cari_member($id_user)
    {
        $keyword = $this->input->post('keyword');
        $this->load->model('M_pembukuan');
        
        $data['hortisphere'] = $this->M_pembukuan->join_masaTanamCatatan();
        $data['join'] = $this->M_pembukuan->get_keyword2($this->session->userdata('id_user'),$keyword);

        $data['hortisphere1'] = $this->M_pembukuan->lihatData_masaTanam();
        $data['subtotal1'] = $this->M_pembukuan->subTotal()->result();
        $this->load->model('M_login');
		$data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        $this->load->view('templates/header-member2',$data2);
        $this->load->view('pembukuan/v_pembukuan_member',$data);
        $this->load->view('templates/footer-user');
    }
}
