<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function get_total_alat() {
        return $this->db->count_all('alat_medis'); // Ganti 'items' dengan nama tabel Anda
    }

    public function get_total_bm() {
        return $this->db->count_all('barang_masuk');
    }

    public function get_total_bk() {
        return $this->db->count_all('barang_keluar');
    }

    public function get_total_br() {
        return $this->db->count_all('barang_rusak');
    }
}