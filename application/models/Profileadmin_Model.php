<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profileadmin_model extends CI_Model 
{
    public function get_user($id)
    {
        return $this->db->get_where('karyawan', ['id' => $id])->row_array();
    }

    public function update_profile($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('karyawan', $data);
    }
}

