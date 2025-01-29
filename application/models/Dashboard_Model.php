<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function get_total_alat() {
        return $this->db->count_all('alat_medis'); 
    }

    public function get_total_barang_rusak() {
        return $this->db->count_all('barang_rusak');
    }

    public function get_total_barang_masuk() {
        return $this->db->count_all('barang_masuk');
    }

    public function get_total_barang_keluar() {
        return $this->db->count_all('barang_keluar');
    }

}