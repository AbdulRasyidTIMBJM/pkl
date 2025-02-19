<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alatadmin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Alat_model');
    }

    public function index()
    {
        $data['alat'] = $this->Alat_model->select_all(); // Mengambil DATA ALAT dengan nama alat
        $data['title'] = 'DATA ALAT';
        $this->load->view('layout/head');
        $this->load->view('layout/headeradmin', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('alat/indexadmin', $data); // Memuat view dan mengirimkan data
    }

    public function create()
    {
        $data['title'] = 'TAMBAH DATA ALAT';
        $data['alat'] = $this->Alat_model->select_all();
        $this->load->view('layout/head');
        $this->load->view('layout/headeradmin', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('alat/createadmin', $data);
        $this->load->view('layout/footer');
    }

    public function edit($id_alat)
    {
        // Mengambil DATA ALAT berdasarkan ID
        $data['alat'] = $this->Alat_model->select_by_id('alat_medis', $id_alat);
        $data['title'] = 'Edit Data Alat';
        $this->load->view('layout/head');
        $this->load->view('layout/headeradmin', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('alat/editadmin', $data);
        $this->load->view('layout/footer');
    }
    public function store()
    {
        $this->form_validation->set_rules('nama_alat', 'Tanggal alat', 'required');
        $this->form_validation->set_rules('jenis', 'jenis alat', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Alat/create');
        } else {
            $data = [
                'nama_alat' => $this->input->post('nama_alat'),
                'jenis' => $this->input->post('jenis'),
                'merk' => $this->input->post('merk'),
                'spesifikasi' => $this->input->post('spesifikasi'),
                'jumlah' => $this->input->post('jumlah') 
            ];
            $this->Alat_model->insert_alat_medis($data);
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('Alatadmin');
        }
    }

    public function update($id_alat)
    {
        $this->form_validation->set_rules('nama_alat', 'Tanggal alat', 'required');
        $this->form_validation->set_rules('jenis', 'jenis alat', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Alat/edit/' . $id_alat);
        } else {
            $data = array(
                'nama_alat' => $this->input->post('nama_alat'),
                'jenis' => $this->input->post('jenis'),
                'merk' => $this->input->post('merk'),
                'spesifikasi' => $this->input->post('spesifikasi'),
                'jumlah' => $this->input->post('jumlah')          
            );

            $this->Alat_model->update($id_alat, $data);
            $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
            redirect('Alatadmin');
        }
    }
    public function print()
    {
        $data['alat'] = $this->Alat_model->select_all();
        $this->load->view('alatadmin/print', $data); // Ganti dengan nama view cetak Anda
    }

    public function delete($id)
    {
        $this->Alat_model->delete_alat_medis($id);
        $this->session->set_flashdata('delete', 'Data Berhasil Dihapus');
        redirect('Alatadmin');
    }
}
