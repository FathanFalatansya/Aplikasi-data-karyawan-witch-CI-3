<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KaryawanTest extends CI_Controller
{
    public $karyawan_model;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('karyawan_model');
        $this->karyawan_model = new Karyawan_model();
    }

    public function testCreate()
    {
        $data = array(
            'nama' => 'Dana Setiawan',
            'Nik' => '1234564820',
            'departemen_id' => 1
        );

        // Panggil metode tambahKaryawan dari $this->karyawan_model
        $result = $this->karyawan_model->tambahKaryawan($data);

        $expected_result = true;
        $test_name = 'Test Create';
        echo $this->unit->run($result, $expected_result, $test_name);
    }

    public function testUpdate()
    {
        $id = 5;
        $data = array(
            'nama' => 'Arif Setiawan',
            'Nik' => '123456729',
            'departemen_id' => 2
        );

        // Panggil metode updateKaryawan dari $this->karyawan_model
        $result = $this->karyawan_model->updateKaryawan($id, $data);

        $expected_result = true;
        $test_name = 'Test Update';
        echo $this->unit->run($result, $expected_result, $test_name);
    }

    public function testCari()
    {
        $cari = 'Arif';

        // Panggil metode cariKaryawan dari $this->karyawan_model
        $result = $this->karyawan_model->cari_Karyawan($cari);

        $expected_result = true;
        $test_name = 'Test Cari';
        echo $this->unit->run($result, $expected_result, $test_name);
    }

    public function testSemuaKaryawan()
    {
        // Panggil metode semuaKaryawan dari $this->karyawan_model
        $result = $this->karyawan_model->semuaKaryawan();

        $expected_result = true;
        $test_name = 'Test Semua Karyawan';
        echo $this->unit->run($result, $expected_result, $test_name);
    }

    public function testHapus()
    {
        $id = 19;

        // Panggil metode hapusKaryawan dari $this->karyawan_model
        $result = $this->karyawan_model->hapusKaryawan($id);

        $expected_result = false;
        $test_name = 'Test Hapus';
        echo $this->unit->run($result, $expected_result, $test_name);
    }

    public function testEdit()
    {
        $id = 1;

        // Panggil metode editKaryawan dari $this->karyawan_model
        $result = $this->karyawan_model->editKaryawan($id);

        $expected_result = true;
        $test_name = 'Test Edit';
        echo $this->unit->run($result, $expected_result, $test_name);
    }

}
