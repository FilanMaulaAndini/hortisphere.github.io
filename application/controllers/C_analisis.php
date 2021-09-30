<?php

class c_analisis extends CI_Controller
{
    public function index()
    {
        $this->load->model('M_analisis');
        $data['hortisphere'] = $this->M_analisis->lihatData_analisis();
        $this->load->model('M_login');
        $data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        
        $this->load->view('templates/header-member4',$data2);
        $this->load->view('analisis/v_analisis',$data);
        $this->load->view('templates/footer-user');
    }

    public function index_admin()
    {
        $this->load->model('M_analisis');
        $data['hortisphere'] = $this->M_analisis->lihatData_analisis();

        $this->load->model('M_login');
        $data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        
        $this->load->view('templates/header-admin6',$data2);
        $this->load->view('analisis/v_analisis_admin',$data);
        $this->load->view('templates/footer-user');
    }

    public function tambah_analisis()
    {
        $id_user = $this->input->post('id_user');
        $komoditas = $this->input->post('komoditas');
        $luas_lahan = $this->input->post('luas_lahan');
        $hasil_panen_tahun = $this->input->post('hasil_panen_tahun');
        $jumlah_panen_tahun = $this->input->post('jumlah_panen_tahun');
        $harga_sekarang = $this->input->post('harga_sekarang');
        $persiapan_lahan = $this->input->post('persiapan_lahan');
        $pemeliharaan = $this->input->post('pemeliharaan');
        $obat_tani = $this->input->post('obat_tani');
        $saprotaan = $this->input->post('saprotaan');
        $lainnya = $this->input->post('lainnya');
        $total_biaya_produksi = ($persiapan_lahan/$jumlah_panen_tahun) + $pemeliharaan + $obat_tani + $saprotaan + $lainnya;
        $pendapatan = $hasil_panen_tahun * $harga_sekarang;
        $keuntungan = $pendapatan - $total_biaya_produksi;
        $biaya_tahun = $persiapan_lahan +  ($pemeliharaan*2) + ($obat_tani*2) + ($saprotaan*2) + ($lainnya*2);
        $produktivitas = 10000 * ($luas_lahan/($hasil_panen_tahun*$jumlah_panen_tahun));
        $data = array(
            'id_user' => $id_user,
            'komoditas' => $komoditas,
            'luas_lahan' => $luas_lahan,
            'hasil_panen_tahun' => $hasil_panen_tahun,
            'jumlah_panen_tahun' => $jumlah_panen_tahun,
            'harga_sekarang' => $harga_sekarang,
            'persiapan_lahan' => $persiapan_lahan,
            'pemeliharaan' => $pemeliharaan,
            'obat_tani' => $obat_tani,
            'saprotaan' => $saprotaan,
            'lainnya' => $lainnya,
            'total_biaya_produksi' => $total_biaya_produksi,
            'pendapatan' => $pendapatan,
            'keuntungan' => $keuntungan,
            'biaya_tahun' => $biaya_tahun,
            'produktivitas' => $produktivitas,

        );
        $this->load->model('M_analisis');
        $this->load->model('M_login');
        $data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));

        $this->M_analisis->tambahData_analisis($data, 'analisis');
        $this->load->view('templates/header-member4', $data2);
        $this->load->view('analisis/v_hasil',$data);
        $this->load->view('templates/footer-user');
    }

    public function tambah_analisis_admin()
    {
        $id_user = $this->input->post('id_user');
        $komoditas = $this->input->post('komoditas');
        $luas_lahan = $this->input->post('luas_lahan');
        $hasil_panen_tahun = $this->input->post('hasil_panen_tahun');
        $jumlah_panen_tahun = $this->input->post('jumlah_panen_tahun');
        $harga_sekarang = $this->input->post('harga_sekarang');
        $persiapan_lahan = $this->input->post('persiapan_lahan');
        $pemeliharaan = $this->input->post('pemeliharaan');
        $obat_tani = $this->input->post('obat_tani');
        $saprotaan = $this->input->post('saprotaan');
        $lainnya = $this->input->post('lainnya');
        $total_biaya_produksi = ($persiapan_lahan/$jumlah_panen_tahun) + $pemeliharaan + $obat_tani + $saprotaan + $lainnya;
        $pendapatan = $hasil_panen_tahun * $harga_sekarang;
        $keuntungan = $pendapatan - $total_biaya_produksi;
        $biaya_tahun = $persiapan_lahan +  ($pemeliharaan*2) + ($obat_tani*2) + ($saprotaan*2) + ($lainnya*2);
        $produktivitas = 10000 * ($luas_lahan/($hasil_panen_tahun*$jumlah_panen_tahun));
        $data = array(
            'id_user' => $id_user,
            'komoditas' => $komoditas,
            'luas_lahan' => $luas_lahan,
            'hasil_panen_tahun' => $hasil_panen_tahun,
            'jumlah_panen_tahun' => $jumlah_panen_tahun,
            'harga_sekarang' => $harga_sekarang,
            'persiapan_lahan' => $persiapan_lahan,
            'pemeliharaan' => $pemeliharaan,
            'obat_tani' => $obat_tani,
            'saprotaan' => $saprotaan,
            'lainnya' => $lainnya,
            'total_biaya_produksi' => $total_biaya_produksi,
            'pendapatan' => $pendapatan,
            'keuntungan' => $keuntungan,
            'biaya_tahun' => $biaya_tahun,
            'produktivitas' => $produktivitas,

        );
        $this->load->model('M_analisis');
        $this->M_analisis->tambahData_analisis($data, 'analisis');

        $this->load->model('M_login');
        $data2['detail'] = $this->M_login->tampil_data($this->session->userdata('id_user'));
        
        $this->load->view('templates/header-admin6',$data2);
        $this->load->view('analisis/v_hasil',$data);
        $this->load->view('templates/footer-user');
    }
   
}
