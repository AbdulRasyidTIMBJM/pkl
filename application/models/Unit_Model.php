<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_unit($data)
    {
        return $this->db->insert('unit', $data);
    }

    public function select_all()
    {
        return $this->db->get('unit')->result();
    }

    public function select_by_id($tabel, $id_unit)
    {
        $this->db->where('id_unit', $id_unit);
        $query = $this->db->get($tabel)->row();
        return $query;
    }

    public function update($id_unit, $data)
    {
        $this->db->where('id_unit', $id_unit);
        $this->db->update('unit', $data);
    }

    public function delete_unit($id)
    {
        return $this->db->delete('unit', ['id_unit' => $id]);
    }
}
