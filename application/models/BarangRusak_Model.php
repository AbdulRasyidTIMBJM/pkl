<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangRusak_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_barang_rusak($data)
    {
        return $this->db->insert('barang_rusak', $data);
    }

    public function select_all()
    {
        return $this->db->get('barang_rusak')->result();
    }
    public function get_barang_rusak_with_alat()
    {
        // Melakukan join antara tabel barang_rusak dan alat
        $this->db->select('barang_rusak.*, alat_medis.nama_alat, alat_medis.merk, users.nama, unit.nama_unit');
        $this->db->from('barang_rusak');
        $this->db->join('alat_medis', 'alat_medis.id_alat = barang_rusak.id_alat');
        $this->db->join('users', 'users.id = barang_rusak.pengguna_id');
        $this->db->join('unit', 'unit.id_unit = barang_masuk.id_unit');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_alat_medis() {
        return $this->db->get('alat_medis')->result();
    }

    public function select_by_id($tabel, $id_barang_rusak)
    {
        $this->db->where('id_barang_rusak', $id_barang_rusak);
        $query = $this->db->get($tabel)->row();
        return $query;
    }
    public function get_barang_rusak_with_alat_by_date($tanggal_awal, $tanggal_akhir) {
        $this->db->select('barang_rusak.*, alat_medis.nama_alat, alat_medis.merk, users.nama, unit.nama_unit');
        $this->db->from('barang_rusak');
        $this->db->join('alat_medis', 'alat_medis.id_alat = barang_rusak.id_alat');
        $this->db->join('users', 'users.id = barang_rusak.pengguna_id');
        $this->db->join('unit', 'unit.id_unit = barang_masuk.id_unit');
        
        // Tambahkan kondisi untuk rentang tanggal
        if ($tanggal_awal && $tanggal_akhir) {
            $this->db->where('tanggal_rusak >=', $tanggal_awal);
            $this->db->where('tanggal_rusak <=', $tanggal_akhir);
        }
    
        $query = $this->db->get();
        return $query->result();
    }
    public function update($id_barang_rusak, $data)
    {
        $this->db->where('id_barang_rusak', $id_barang_rusak);
        $this->db->update('barang_rusak', $data);
    }

    public function delete_barang_rusak($id)
    {
        return $this->db->delete('barang_rusak', ['id_barang_rusak' => $id]);
    }
}
