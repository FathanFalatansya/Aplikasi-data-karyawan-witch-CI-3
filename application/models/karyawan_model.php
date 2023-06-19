<?php
class Karyawan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Menambahkan karyawan baru
    public function tambahKaryawan($data)
    {
        $this->db->insert('karyawan', $data);
        return $this->db->insert_id();
    }

    // Mengambil semua data karyawan dengan join table
    public function semuaKaryawan()
    {
        $this->db->select('karyawan.*, departemen.nama AS nama_departemen');
        $this->db->from('karyawan');
        $this->db->join('departemen', 'departemen.id = karyawan.departemen_id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    // Mengambil data karyawan berdasarkan ID
    public function getKaryawanById($id)
    {
        $this->db->select('karyawan.*, departemen.nama AS nama_departemen');
        $this->db->from('karyawan');
        $this->db->join('departemen', 'departemen.id = karyawan.departemen_id', 'left');
        $this->db->where('karyawan.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    // Mengupdate data karyawan
    public function updateKaryawan($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('karyawan', $data);
    }

    // Menghapus data karyawan berdasarkan ID
    public function hapusKaryawan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('karyawan');
    }

    // Ceknik  
    public function cekNikAda($nik)
    {
        $this->db->where('nik', $nik);
        $query = $this->db->get('karyawan');
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function cari_karyawan($cari) {
        // Melakukan pencarian karyawan berdasarkan nama, NIK, dan departemen
        $this->db->select('karyawan.nama, karyawan.Nik, karyawan.id as id, departemen.id as departemen_id, departemen.nama as nama_departemen');
        $this->db->from('karyawan');
        $this->db->join('departemen', 'karyawan.departemen_id = departemen.id', 'left');
        $this->db->group_start();
        $this->db->like('karyawan.nama', $cari);
        $this->db->or_like('karyawan.NIK', $cari);
        $this->db->or_like('departemen.nama', $cari);
        $this->db->group_end();
        $query = $this->db->get();
        return $query->result();
    }
}
