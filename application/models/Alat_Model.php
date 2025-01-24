<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alat_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_alat_medis($data)
    {
        return $this->db->insert('alat_medis', $data);
    }

    public function select_all()
    {
        return $this->db->get('alat_medis')->result();
    }

    public function select_by_id($tabel, $id_alat)
    {
        $this->db->where('id_alat', $id_alat);
        $query = $this->db->get($tabel)->row();
        return $query;
    }

    public function update($id_alat, $data)
    {
        $this->db->where('id_alat', $id_alat);
        return $this->db->update('alat_medis', $data);
    }

    public function delete_alat_medis($id)
    {
        return $this->db->delete('alat_medis', ['id_alat' => $id]);
    }
}
