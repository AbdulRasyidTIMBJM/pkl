<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
    }

    public function index()
    {
        $data['karyawan'] = $this->Karyawan_model->select_all(); // Mengambil DATA Karyawan dengan nama Karyawan
        $data['title'] = 'DATA Karyawan';
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('karyawan/index', $data); // Memuat view dan mengirimkan data
    }
    public function create()
    {
        $data['title'] = 'TAMBAH DATA KARYAWAN';
        $data['karyawan'] = $this->Karyawan_model->select_all();
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('karyawan/create', $data);
        $this->load->view('layout/footer');
    }

    public function update($id)
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('nomor_telepon', 'nomor telepon', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('karyawan/edit/' . $id);
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama' => $this->input->post('nama'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'alamat' => $this->input->post('alamat'),
                'level' => $this->input->post('level')
            );

            $this->Karyawan_model->update($id, $data);
            $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
            redirect('Karyawan');
        }
    }

    public function edit($id) {
        // Mengambil data Karyawan berdasarkan ID
        $data['karyawan'] = $this->Karyawan_model->select_by_id('users', $id);
        $data['title'] = 'Edit Karyawan';
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('karyawan/edit', $data);
        $this->load->view('layout/footer');
    }

    public function store() {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('nomor_telepon', 'nomor telepon', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Karyawan/create');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama' => $this->input->post('nama'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'alamat' => $this->input->post('alamat'),
                'level' => $this->input->post('level')
            ];
            $this->Karyawan_model->insert_users($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('Karyawan');
        }
    }
    public function delete($id) {
        $this->Karyawan_model->delete_users($id);
        $this->session->set_flashdata('delete', 'Data Berhasil Dihapus');
        redirect('Karyawan');
    }
}