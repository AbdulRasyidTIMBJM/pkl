<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardadmin_model extends CI_Model {

    public function get_total_karyawan() {
        return $this->db->count_all('users');
    }

    public function get_total_unit() {
        return $this->db->count_all('unit');
    }

}