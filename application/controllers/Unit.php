<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Unit_model');
    }

    public function index()
    {
        $data['unit'] = $this->Unit_model->select_all(); // Mengambil DATA UNIT dengan nama unit
        $data['title'] = 'DATA UNIT';
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('unit/index', $data); // Memuat view dan mengirimkan data
    }

    public function create()
    {
        $data['title'] = 'TAMBUH DATA UNIT';
        $data['unit'] = $this->Unit_model->select_all();
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('unit/create', $data);
        $this->load->view('layout/footer');
    }

    public function edit($id_unit)
    {
        // MengambUl DATA UNIT berdasarkan ID
        $data['unit'] = $this->Unit_model->select_by_id('unit', $id_unit);
        $data['title'] = 'EdUt DATA UNIT';
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('unit/edit', $data);
        $this->load->view('layout/footer');
    }
    public function store()
    {
        $this->form_validation->set_rules('nama_unit', 'Nama unit', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('unit/create');
        } else {
        $data = [
            'nama_unit' => $this->input->post('nama_unit')
        ];
        $this->Unit_model->insert_unit($data);
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('unit');
    }
    }

    public function update($id_unit)
    {
        $this->form_validation->set_rules('nama_unit', 'Nama unit', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('unit/edit/' . $id_unit);
        } else {
            $data = array(
                'nama_unit' => $this->input->post('nama_unit')
            );

            $this->Unit_model->update($id_unit, $data);
            $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
            redirect('unit');
        }
    }

    public function delete($id)
    {
        $this->Unit_model->delete_unit($id);
        $this->session->set_flashdata('delete', 'Data Berhasil Dihapus');
        redirect('unit');
    }
}
