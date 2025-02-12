<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_supplier($data)
    {
        return $this->db->insert('supplier', $data);
    }

    public function select_all()
    {
        return $this->db->get('supplier')->result();
    }

    public function select_by_id($tabel, $id_supplier)
    {
        $this->db->where('id_supplier', $id_supplier);
        $query = $this->db->get($tabel)->row();
        return $query;
    }

    public function update($id_supplier, $data)
    {
        $this->db->where('id_supplier', $id_supplier);
        $this->db->update('supplier', $data);
    }

    public function delete_supplier($id_supplier)
    {
        return $this->db->delete('supplier', ['id_supplier' => $id_supplier]);
    }
}
