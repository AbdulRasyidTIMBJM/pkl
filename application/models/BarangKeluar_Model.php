<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangKeluar_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_barang_keluar($data)
    {
        return $this->db->insert('barang_keluar', $data);
    }

    public function select_all()
    {
        return $this->db->get('barang_keluar')->result();
    }

    public function get_barang_keluar_with_alat()
    {
        $this->db->select('barang_keluar.*, alat_medis.nama_alat, users.nama, unit.nama_unit');
        $this->db->from('barang_keluar');
        $this->db->join('alat_medis', 'alat_medis.id_alat = barang_keluar.id_alat');
        $this->db->join('users', 'users.id = barang_keluar.pengguna_id');
        $this->db->join('unit', 'unit.id_unit = barang_keluar.id_unit');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_alat_medis()
    {
        return $this->db->get('alat_medis')->result();
    }

    public function get_barang_keluar_with_alat_by_date($tanggal_awal, $tanggal_akhir) {
        $this->db->select('barang_keluar.*, alat_medis.nama_alat, users.nama, unit.nama_unit');
        $this->db->from('barang_keluar');
        $this->db->join('alat_medis', 'alat_medis.id_alat = barang_keluar.id_alat');
        $this->db->join('users', 'users.id = barang_keluar.pengguna_id');
        $this->db->join('unit', 'unit.id_unit = barang_keluar.id_unit');
        
        // Tambahkan kondisi untuk rentang tanggal
        if ($tanggal_awal && $tanggal_akhir) {
            $this->db->where('tanggal_keluar >=', $tanggal_awal);
            $this->db->where('tanggal_keluar <=', $tanggal_akhir);
        }
    
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_enum_values($table, $column)
    {
        $query = $this->db->query("SHOW COLUMNS FROM $table LIKE '$column'");
        $row = $query->row();
        $enum = $row->Type;
        preg_match_all("/'([^']+)'/", $enum, $matches);
        return $matches[1];
    }

    public function get_all_unit()
    {
        return $this->db->get('unit')->result();
    }

    public function select_by_id($tabel, $id_barang_keluar)
    {
        $this->db->where('id_barang_keluar', $id_barang_keluar);
        return $this->db->get($tabel)->row();
    }

    public function update($id_barang_keluar, $data)
    {
        $this->db->where('id_barang_keluar', $id_barang_keluar);
        $this->db->update('barang_keluar', $data);
    }

    public function delete_barang_keluar($id)
    {
        return $this->db->delete('barang_keluar', ['id_barang_keluar' => $id]);
    }
}