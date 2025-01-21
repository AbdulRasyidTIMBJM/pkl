<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangKeluar extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('BarangKeluar_model');
        $this->load->library('form_validation'); // Pastikan library form_validation dimuat
    }

    public function index() {
        $data['barang_keluar'] = $this->BarangKeluar_model->get_barang_keluar_with_alat(); // Mengambil data barang keluar dengan nama alat
        $data['title'] = 'Data Barang Keluar';
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('barang_keluar/index', $data); // Memuat view dan mengirimkan data
    }

    public function create() {
        $data['title'] = 'Tambah Data Barang Keluar';
        $data['alat_medis'] = $this->BarangKeluar_model->get_all_alat_medis(); // Ambil semua alat medis untuk dropdown
        $data['unit'] = $this->BarangKeluar_model->get_all_unit();
        $data['status'] = $this->BarangKeluar_model->get_enum_values('barang_masuk', 'status'); // Ambil nilai enum status
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('barang_keluar/create', $data);
        $this->load->view('layout/footer');
    }

    public function edit($id_barang_keluar) {
        // Mengambil data barang Keluar berdasarkan ID
        $data['barang_keluar'] = $this->BarangKeluar_model->select_by_id('barang_keluar', $id_barang_keluar);
        // Mengambil semua alat medis untuk dropdown
        $data['alat_medis'] = $this->BarangKeluar_model->get_all_alat_medis();
        $data['unit'] = $this->BarangKeluar_model->get_all_unit();
        $data['status'] = $this->BarangKeluar_model->get_enum_values('barang_masuk', 'status'); // Ambil nilai enum status
        $data['title'] = 'Edit Barang Keluar';
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('barang_keluar/edit', $data);
        $this->load->view('layout/footer');
    }

    public function store() {
        $this->form_validation->set_rules('id_alat', 'Nama Alat', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal keluar', 'required');
        $this->form_validation->set_rules('jumlah_keluar', 'Jumlah keluar', 'required');
        $this->form_validation->set_rules('id_unit', 'Nama unit', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Alat/create');
        } else {
            $data = [
                'id_alat' => $this->input->post('id_alat'),
                'tanggal_keluar' => $this->input->post('tanggal_keluar'),
                'jumlah_keluar' => $this->input->post('jumlah_keluar'),
                'pengguna_id' => $this->session->userdata('id'), // Ambil user_id dari session secara otomatis
                'id_unit' => $this->input->post('id_unit'),
                'status' => $this->input->post('status')
            ];
            $this->BarangKeluar_model->insert_barang_keluar($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('BarangKeluar');
        }
    }

    public function update($id_barang_keluar) {
        $this->form_validation->set_rules('id_alat', 'Nama Alat', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal keluar', 'required');
        $this->form_validation->set_rules('jumlah_keluar', 'Jumlah keluar ', 'required');
        $this->form_validation->set_rules('id_unit', 'Nama unit', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Alat/edit');
        } else {
            $data = array(
                'id_alat' => $this->input->post('id_alat'),
                'tanggal_keluar' => $this->input->post('tanggal_keluar'),
                'jumlah_keluar' => $this->input->post('jumlah_keluar'),
                'id_unit' => $this->input->post('id_unit'),
                'status' => $this->input->post('status')
            );

            $this->BarangKeluar_model->update($id_barang_keluar, $data);
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
            redirect('BarangKeluar');
        }
    }
    public function print()
    {
        // Ambil tanggal awal dan akhir dari input (misalnya dari form)
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');

        // Ambil data barang masuk berdasarkan rentang tanggal
        $data['barang_keluar'] = $this->BarangKeluar_model->get_barang_keluar_with_alat_by_date($tanggal_awal, $tanggal_akhir);

        $this->load->view('barang_keluar/print', $data); // Ganti dengan nama view cetak Anda
    }
    public function reprint()
    {
        $data['title'] = 'Cetak Data Barang Keluar';

        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('barang_keluar/reprint', $data);
        $this->load->view('layout/footer');
    }

    public function delete($id) {
        $this->BarangKeluar_model->delete_barang_keluar($id);
        $this->session->set_flashdata('delete', 'Data berhasil dihapus');
        redirect('BarangKeluar');
    }
}