<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangMasuk_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_barang_masuk($data)
    {
        return $this->db->insert('barang_masuk', $data);
    }

    public function select_all()
    {
        return $this->db->get('barang_masuk')->result();
    }
    public function get_barang_masuk_with_alat($bulan = null, $tahun = null, $tanggal_awal = null, $tanggal_akhir = null)
    {
        $this->db->select('barang_masuk.*, alat_medis.nama_alat, alat_medis.merk, karyawan.nama, unit.nama_unit');
        $this->db->from('barang_masuk');
        $this->db->join('alat_medis', 'alat_medis.id_alat = barang_masuk.id_alat');
        $this->db->join('karyawan', 'karyawan.id = barang_masuk.pengguna_id');
        $this->db->join('unit', 'unit.id_unit = barang_masuk.id_unit');

        // Filter berdasarkan bulan dan tahun
        if ($bulan) {
            $this->db->where('MONTH(tanggal_masuk)', $bulan);
        }
        if ($tahun) {
            $this->db->where('YEAR(tanggal_masuk)', $tahun);
        }
        // Filter berdasarkan rentang tanggal
        if ($tanggal_awal) {
            $this->db->where('tanggal_masuk >=', $tanggal_awal);
        }
        if ($tanggal_akhir) {
            $this->db->where('tanggal_masuk <=', $tanggal_akhir);
        }
        
        $query = $this->db->get();
        return $query->result();
    }
    public function get_barang_masuk_with_alatbaru($bulan = null, $tahun = null, $tanggal_awal = null, $tanggal_akhir = null)
    {
        $this->db->select('barang_masuk.*, alat_medis.nama_alat, alat_medis.merk, karyawan.nama, supplier.nama_toko');
        $this->db->from('barang_masuk');
        $this->db->join('alat_medis', 'alat_medis.id_alat = barang_masuk.id_alat');
        $this->db->join('karyawan', 'karyawan.id = barang_masuk.pengguna_id');
        $this->db->join('supplier', 'supplier.id_supplier = barang_masuk.id_supplier');

        // Filter berdasarkan bulan dan tahun
        if ($bulan) {
            $this->db->where('MONTH(tanggal_masuk)', $bulan);
        }
        if ($tahun) {
            $this->db->where('YEAR(tanggal_masuk)', $tahun);
        }
        // Filter berdasarkan rentang tanggal
        if ($tanggal_awal) {
            $this->db->where('tanggal_masuk >=', $tanggal_awal);
        }
        if ($tanggal_akhir) {
            $this->db->where('tanggal_masuk <=', $tanggal_akhir);
        }
        
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_alat_medis()
    {
        return $this->db->get('alat_medis')->result();
    }
    public function get_all_unit()
    {
        return $this->db->get('unit')->result();
    }
    public function get_all_supplier()
    {
        return $this->db->get('supplier')->result();
    }
    public function select_by_id($tabel, $id_barang_masuk)
    {
        $this->db->where('id_barang_masuk', $id_barang_masuk);
        $query = $this->db->get($tabel)->row();
        return $query;
    }

    public function update($id_barang_masuk, $data)
    {
        $this->db->where('id_barang_masuk', $id_barang_masuk);
        $this->db->update('barang_masuk', $data);
    }

    public function get_barang_masuk_with_alat_by_date($tanggal_awal, $tanggal_akhir)
    {
        $this->db->select('barang_masuk.*, alat_medis.nama_alat, alat_medis.merk, karyawan.nama, unit.nama_unit');
        $this->db->from('barang_masuk');
        $this->db->join('alat_medis', 'alat_medis.id_alat = barang_masuk.id_alat');
        $this->db->join('karyawan', 'karyawan.id = barang_masuk.pengguna_id');
        $this->db->join('unit', 'unit.id_unit = barang_masuk.id_unit');

        // Tambahkan kondisi untuk rentang tanggal
        if ($tanggal_awal && $tanggal_akhir) {
            $this->db->where('tanggal_masuk >=', $tanggal_awal);
            $this->db->where('tanggal_masuk <=', $tanggal_akhir);
        }

        $query = $this->db->get();
        return $query->result();
    }
    public function update_jumlah_alat($id_alat, $jumlah_masuk)
    {
        // Update jumlah alat di tabel alat_medis untuk id_alat yang spesifik
        $this->db->set('jumlah', 'jumlah + ' . (int)$jumlah_masuk, FALSE);
        $this->db->where('id_alat', $id_alat);
        $this->db->update('alat_medis');
    }
    public function delete_barang_masuk($id)
    {
        return $this->db->delete('barang_masuk', ['id_barang_masuk' => $id]);
    }
    public function get_merk($id_alat)
    {
        $this->db->where('id_alat', $id_alat);
        $query = $this->db->get('alat_medis');
        $row = $query->row();
        return $row->merk;
    }
    public function get_barang_masuk_with_alat_by_date_and_supplier($tanggalAwal, $tanggalAkhir, $idSupplier)
{
    $this->db->select('barang_masuk.*, alat_medis.nama_alat, alat_medis.merk, karyawan.nama, supplier.nama_toko');
    $this->db->from('barang_masuk');
    $this->db->join('alat_medis', 'alat_medis.id_alat = barang_masuk.id_alat');
    $this->db->join('karyawan', 'karyawan.id = barang_masuk.pengguna_id');
    $this->db->join('supplier', 'supplier.id_supplier = barang_masuk.id_supplier');

    if ($tanggalAwal && $tanggalAkhir) {
        $this->db->where('tanggal_keluar >=', $tanggalAwal);
        $this->db->where('tanggal_keluar <=', $tanggalAkhir);
    }
    if ($idSupplier) {
        $this->db->where('barang_masuk.id_supplier', $idSupplier);
    }

    $query = $this->db->get();
    return $query->result();
}

public function get_barang_masuk_with_alat_by_id($idBarangMasuk)
{
    $this->db->select('barang_masuk.*, alat_medis.nama_alat, alat_medis.merk, karyawan.nama, supplier.nama_toko');
    $this->db->from('barang_masuk');
    $this->db->join('alat_medis', 'alat_medis.id_alat = barang_masuk.id_alat');
    $this->db->join('karyawan', 'karyawan.id = barang_masuk.pengguna_id');
    $this->db->join('supplier', 'supplier.id_supplier = barang_masuk.id_supplier');

    $this->db->where_in('id_barang_masuk', explode(',', $idBarangMasuk));
    $query = $this->db->get();
    return $query->result();
}
    public function get_verified_barang_masuk($bulan = null, $tahun = null, $tanggal_awal = null, $tanggal_akhir = null) {
        $this->db->select('barang_masuk.*, alat_medis.nama_alat, alat_medis.merk, karyawan.nama, alat_medis.spesifikasi, supplier.nama_toko');
        $this->db->from('barang_masuk');
        $this->db->join('alat_medis', 'alat_medis.id_alat = barang_masuk.id_alat');
        $this->db->join('karyawan', 'karyawan.id = barang_masuk.pengguna_id');
        $this->db->join('supplier', 'supplier.id_supplier = barang_masuk.id_supplier');
        $this->db->where('barang_masuk.status', 'verified');

        // Filter berdasarkan bulan dan tahun
        if ($bulan) {
            $this->db->where('MONTH(tanggal_masuk)', $bulan);
        }
        if ($tahun) {
            $this->db->where('YEAR(tanggal_masuk)', $tahun);
        }
        // Filter berdasarkan rentang tanggal
        if ($tanggal_awal) {
            $this->db->where('tanggal_masuk >=', $tanggal_awal);
        }
        if ($tanggal_akhir) {
            $this->db->where('tanggal_masuk <=', $tanggal_akhir);
        }
        
        $query = $this->db->get();
        return $query->result();
    }

}

