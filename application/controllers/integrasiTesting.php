<?php

class integrasiTesting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->library('upload');
    }
    
    private function tambah_catatan()
    {
        $id_user = "7";
        $id_tanam = "9";
        $uraian = "tenaga kerja";
        $kategori = "pengeluaran";
        $jumlah = "60000";
        $keterangan = "-";

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
        return("Catatan Berhasil Ditambahkan");
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
        return("Catatan Berhasil Ditambahkan");
        }
    }

    public function testTambahCatatan()
    {
        $t = $this->tambah_catatan();
        $expected_result = "Catatan Berhasil Ditambahkan";
        $test_name = "Tambah Catatan";
        echo $this->unit->run($t, $expected_result, $test_name);
    }
    
    private function tambah_berita()
    {
        $id_user = "5";
        $judul = "harga komoditas cabe yang meroket";
        $isi= "lorem ipsum";
        $testGambar= array(
             'name' => 'Tambah-Berita.png',
             'tmp_name' => 'D:\SKRIPSI\baru',
             'type' => 'image/png',
             'size' => '2100',
             'error' => 0
        );

        $_FILES['gambar']= $testGambar;
        
        $config['upload_path'] = './upload/berita/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '2048';  //2MB max
        $config['max_width'] = '4480'; // pixel
        $config['max_height'] = '4480'; // pixel
        $config['file_name'] = $_FILES['gambar']['name'];

        $this->upload->initialize($config);
        
            if (!empty($_FILES['gambar']['name'])&&$_FILES['gambar']['size']<=2048) {
                //if ($this->upload->do_upload('gambar') ) {
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
                    return("Data Berhasil Ditambahkan");
                //}
            } else if(!empty($_FILES['gambar']['name'])&&$_FILES['gambar']['size']>=2048){
                return("Data Gagal Ditambahkan");
            } else {
                $gambar = "default.jpg";
                $data = array(
                    'id_user' => $id_user,
                    'judul' => $judul,
                    'isi' => $isi,
                    'gambar' => $gambar
                    );
                $this->load->model('M_berita');
                $this->M_berita->tambahData_berita($data, 'berita');
                $this->session->set_flashdata('success', 'Data Tanpa Gambar Berhasil Ditambahkan');
                return("Data Tanpa Gambar Berhasil Ditambahkan");
            }
    }

    public function testTambahBerita()
    {
        $t = $this->tambah_berita();
        $expected_result = "Data Berhasil Ditambahkan";
        $test_name = "Tambah Berita";
        echo $this->unit->run($t, $expected_result, $test_name);
    }

    private function balas() {
        $id_user        = "5";
        $nama_lengkap   = "Administrator";
        $email          = "admin";
        $komentar       = "uji unit";
        $status_komen   = "5";

        $data = array(
            'id_user' => $id_user,
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'status_komen' => $status_komen,
            'komentar' => $komentar
            );
        $this->load->model('M_tanya_jawab');
        $this->M_tanya_jawab->balas($data, 'tanya_jawab');
        return("balasan berhasil diposting");
    } 

    public function testBalas()
    {
        $test = $this->balas();
        $expected_result = "balasan berhasil diposting";
        $test_name = "Balas Tanya Jawab";
        echo $this->unit->run($test, $expected_result, $test_name);
    }
}
?>