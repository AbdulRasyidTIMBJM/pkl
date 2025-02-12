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

    public function get_barang_keluar_with_alat($bulan = null, $tahun = null, $tanggal_awal = null, $tanggal_akhir = null)
    {
        $this->db->select('barang_keluar.*, alat_medis.nama_alat, alat_medis.merk, karyawan.nama, unit.nama_unit');
        $this->db->from('barang_keluar');
        $this->db->join('alat_medis', 'alat_medis.id_alat = barang_keluar.id_alat');
        $this->db->join('karyawan', 'karyawan.id = barang_keluar.pengguna_id');
        $this->db->join('unit', 'unit.id_unit = barang_keluar.id_unit');
        // Filter berdasarkan bulan dan tahun
        if ($bulan) {
            $this->db->where('MONTH(tanggal_keluar)', $bulan);
        }
        if ($tahun) {
            $this->db->where('YEAR(tanggal_keluar)', $tahun);
        }
        // Filter berdasarkan rentang tanggal
        if ($tanggal_awal) {
            $this->db->where('tanggal_keluar >=', $tanggal_awal);
        }
        if ($tanggal_akhir) {
            $this->db->where('tanggal_keluar <=', $tanggal_akhir);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_alat_medis()
    {
        return $this->db->get('alat_medis')->result();
    }

    public function get_barang_keluar_with_alat_by_date($tanggal_awal, $tanggal_akhir)
    {
        $this->db->select('barang_keluar.*, alat_medis.nama_alat, alat_medis.merk, karyawan.nama, unit.nama_unit');
        $this->db->from('barang_keluar');
        $this->db->join('alat_medis', 'alat_medis.id_alat = barang_keluar.id_alat');
        $this->db->join('karyawan', 'karyawan.id = barang_keluar.pengguna_id');
        $this->db->join('unit', 'unit.id_unit = barang_keluar.id_unit');

        // Tambahkan kondisi untuk rentang tanggal
        if ($tanggal_awal && $tanggal_akhir) {
            $this->db->where('tanggal_keluar >=', $tanggal_awal);
            $this->db->where('tanggal_keluar <=', $tanggal_akhir);
        }

        $query = $this->db->get();
        return $query->result();
    }
    // public function get_barang_keluar_with_alat_by_onedate($tanggal)
    // {
    //     $this->db->select('barang_keluar.*, alat_medis.nama_alat, alat_medis.merk, karyawan.nama, unit.nama_unit');
    //     $this->db->from('barang_keluar');
    //     $this->db->join('alat_medis', 'alat_medis.id_alat = barang_keluar.id_alat');
    //     $this->db->join('karyawan', 'karyawan.id = barang_keluar.pengguna_id');
    //     $this->db->join('unit', 'unit.id_unit = barang_keluar.id_unit');

    //     // Tambahkan kondisi untuk tanggal
    //     $this->db->where('tanggal_keluar', $tanggal);

    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function get_barang_keluar_by_id($id_barang_keluar)
    {
        $this->db->select('barang_keluar.*, alat_medis.nama_alat, alat_medis.merk, karyawan.nama, unit.nama_unit');
        $this->db->from('barang_keluar');
        $this->db->join('alat_medis', 'alat_medis.id_alat = barang_keluar.id_alat');
        $this->db->join('karyawan', 'karyawan.id = barang_keluar.pengguna_id');
        $this->db->join('unit', 'unit.id_unit = barang_keluar.id_unit');

        // Tambahkan kondisi untuk id_barang_keluar
        $this->db->where('id_barang_keluar', $id_barang_keluar);

        $query = $this->db->get();
        return $query->row();
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
    public function get_merk($id_alat)
    {
        $this->db->where('id_alat', $id_alat);
        $query = $this->db->get('alat_medis');
        $row = $query->row();
        return $row->merk;
    }
    public function update_jumlah_alat($id_alat, $jumlah)
    {
        $this->db->set('jumlah', 'jumlah + ' . (int)$jumlah, FALSE);
        $this->db->where('id_alat', $id_alat);
        $this->db->update('alat_medis');
    }
    public function get_jumlah_tersedia($id_alat)
    {
        $this->db->select('jumlah');
        $this->db->from('alat_medis');
        $this->db->where('id_alat', $id_alat);
        $query = $this->db->get();
        $row = $query->row();
        return $row ? $row->jumlah : 0;
    }
//     public function get_barang_keluar_with_alat_by_date_and_unit($tanggal_awal, $tanggal_akhir, $id_unit)
// {
//     $this->db->select('barang_keluar.*, alat_medis.nama_alat, alat_medis.merk, karyawan.nama, unit.nama_unit');
//     $this->db->from('barang_keluar');
//     $this->db->join('alat_medis', 'alat_medis.id_alat = barang_keluar.id_alat');
//     $this->db->join('karyawan', 'karyawan.id = barang_keluar.pengguna_id');
//     $this->db->join('unit', 'unit.id_unit = barang_keluar.id_unit');

//     // Tambahkan kondisi untuk rentang tanggal dan unit
//     if ($tanggal_awal && $tanggal_akhir) {
//         $this->db->where('tanggal_keluar >=', $tanggal_awal);
//         $this->db->where('tanggal_keluar <=', $tanggal_akhir);
//     }
//     if ($id_unit) {
//         $this->db->where('barang_keluar.id_unit', $id_unit);
//     }

//     $query = $this->db->get();
//     return $query->result();
// }
public function get_barang_keluar_with_alat_by_date_and_unit($tanggalAwal, $tanggalAkhir, $idUnit)
{
    $this->db->select('barang_keluar.*, alat_medis.nama_alat, alat_medis.merk, karyawan.nama, unit.nama_unit');
    $this->db->from('barang_keluar');
    $this->db->join('alat_medis', 'alat_medis.id_alat = barang_keluar.id_alat');
    $this->db->join('karyawan', 'karyawan.id = barang_keluar.pengguna_id');
    $this->db->join('unit', 'unit.id_unit = barang_keluar.id_unit');

    if ($tanggalAwal && $tanggalAkhir) {
        $this->db->where('tanggal_keluar >=', $tanggalAwal);
        $this->db->where('tanggal_keluar <=', $tanggalAkhir);
    }
    if ($idUnit) {
        $this->db->where('barang_keluar.id_unit', $idUnit);
    }

    $query = $this->db->get();
    return $query->result();
}

public function get_barang_keluar_with_alat_by_id($idBarangKeluar)
{
    $this->db->select('barang_keluar.*, alat_medis.nama_alat, alat_medis.merk, karyawan.nama, unit.nama_unit');
    $this->db->from('barang_keluar');
    $this->db->join('alat_medis', 'alat_medis.id_alat = barang_keluar.id_alat');
    $this->db->join('karyawan', 'karyawan.id = barang_keluar.pengguna_id');
    $this->db->join('unit', 'unit.id_unit = barang_keluar.id_unit');

    $this->db->where_in('id_barang_keluar', explode(',', $idBarangKeluar));
    $query = $this->db->get();
    return $query->result();
}
}
