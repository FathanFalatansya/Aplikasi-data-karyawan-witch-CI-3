<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('karyawan_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index()
    {
        // Mengambil semua data karyawan
        $data['karyawan'] = $this->karyawan_model->semuaKaryawan();
        $this->load->view('index', $data);
    }

    public function cari() {
        // Mendapatkan inputan dari form
        $cari = $this->input->post('cari');
        
        // Melakukan pencarian karyawan berdasarkan inputan
        $data['karyawan'] = $this->karyawan_model->cari_karyawan($cari);
        
        // Load view karyawan/index.php dengan data hasil pencarian
        $this->load->view('index', $data);
    }

    public function tambah()
    {
        // Tampilkan halaman tambah karyawan
        $this->load->view('tambah');
    }

    public function simpan()
    {
        // Aturan validasi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('Nik', 'NIK', 'required|numeric|is_unique[karyawan.Nik]|max_length[10]');
        $this->form_validation->set_rules('departemen', 'Departemen', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, tampilkan pesan kesalahan
            $data['error_message'] = validation_errors();
            redirect('karyawan', $data);
        } else {
            // Validasi sukses, lanjutkan penyimpanan data
            $data = array(
                'nama' => $this->input->post('nama'),
                'Nik' => $this->input->post('Nik'),
                'departemen_id' => $this->input->post('departemen')
            );

            $this->karyawan_model->tambahKaryawan($data);

            // Redirect ke halaman index
            redirect('karyawan');
        }
    }

public function cek_nik($nik)
    {
        // Panggil method dalam model untuk memeriksa apakah NIK sudah ada dalam database
        $nik_exists = $this->karyawan_model->cekNikAda($nik);

        if ($nik_exists) {
            // NIK sudah ada dalam database, validasi gagal
            $this->form_validation->set_message('cek_nik', 'NIK sudah digunakan.');
            return false;
        } else {
            // NIK belum ada dalam database, validasi sukses
            return true;
        }
    }



    public function edit($id)
    {
        // Mengambil data karyawan berdasarkan ID
        $data['karyawan'] = $this->karyawan_model->getKaryawanById($id);

        // Tampilkan halaman edit karyawan
        $this->load->view('edit', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('Nik', 'NIK', 'required|numeric|max_length[10]');
        $this->form_validation->set_rules('departemen', 'Departemen', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, tampilkan pesan kesalahan
            $data['error_message'] = validation_errors();
            redirect('karyawan', $data);
        } else {
            // Validasi sukses, lanjutkan penyimpanan data
            $data = array(
                'nama' => $this->input->post('nama'),
                'Nik' => $this->input->post('Nik'),
                'departemen_id' => $this->input->post('departemen')
            );
            $this->karyawan_model->updateKaryawan($id, $data);
        }
        // Redirect ke halaman index
        redirect('karyawan');
        
    }

    public function hapus($id)
    {
        // Hapus data karyawan berdasarkan ID
        $this->karyawan_model->hapusKaryawan($id);

        // Redirect ke halaman index
        redirect('karyawan');
    }
}
