<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model');
    }

    public function index()
    {
        $data['supplier'] = $this->Supplier_model->select_all(); // Mengambil DATA Supplier dengan nama_toko supplier
        $data['title'] = 'DATA Supplier';
        $this->load->view('layout/head');
        $this->load->view('layout/headeradmin', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('supplier/index', $data); // Memuat view dan mengirimkan data
    }

    public function user(){
        $data['supplier'] = $this->Supplier_model->select_all();
        $data['title'] = 'DATA Supplier';
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('supplier/user', $data);
    }

    public function userprint(){
        $data['supplier'] = $this->Supplier_model->select_all();
        $data['title'] = 'Cetak Data Supplier';

        $this->load->view('supplier/userprint', $data);

    }

    public function create()
    {
        $data['title'] = 'TAMBAH DATA Supplier';
        $data['supplier'] = $this->Supplier_model->select_all();
        $this->load->view('layout/head');
        $this->load->view('layout/headeradmin', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('supplier/create', $data);
        $this->load->view('layout/footer');
    }

    public function update($id_supplier)
    {
        $this->form_validation->set_rules('nama_toko', 'nama toko', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('supplier/edit/' . $id_supplier);
        } else {
            $data = array(
                'nama_toko' => $this->input->post('nama_toko'),
                'alamat' => $this->input->post('alamat'),
            );

            $this->Supplier_model->update($id_supplier, $data);
            $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
            redirect('supplier');
        }
    }

    public function edit($id_supplier) {
        // Mengambil data Supplier berdasarkan ID
        $data['supplier'] = $this->Supplier_model->select_by_id('supplier', $id_supplier);
        $data['title'] = 'Edit supplier';
        $this->load->view('layout/head');
        $this->load->view('layout/headeradmin', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('supplier/edit', $data);
        $this->load->view('layout/footer');
    }

    public function store() {
        $this->form_validation->set_rules('nama_toko', 'nama toko', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('supplier/create');
        } else {
            $data = [
                'nama_toko' => $this->input->post('nama_toko'),
                'alamat' => $this->input->post('alamat'),
            ];
            $this->Supplier_model->insert_supplier($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('supplier');
        }
    }
    public function delete($id_supplier) {
        $this->Supplier_model->delete_supplier($id_supplier);
        $this->session->set_flashdata('delete', 'Data Berhasil Dihapus');
        redirect('supplier');
    }
}