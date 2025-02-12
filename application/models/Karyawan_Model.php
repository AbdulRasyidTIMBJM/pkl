<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_users($data)
    {
        return $this->db->insert('karyawan', $data);
    }

    public function select_all()
    {
        return $this->db->get('karyawan')->result();
    }

    public function select_by_id($tabel, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($tabel)->row();
        return $query;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('karyawan', $data);
    }

    public function delete_users($id)
    {
        return $this->db->delete('karyawan', ['id' => $id]);
    }
}
