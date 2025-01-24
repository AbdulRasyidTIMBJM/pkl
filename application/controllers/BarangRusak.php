<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangRusak extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangRusak_model');
    }

    public function index()
    {
        $data['barang_rusak'] = $this->BarangRusak_model->select_all();
        $data['barang_rusak'] = $this->BarangRusak_model->get_barang_rusak_with_alat(); // Mengambil data barang rusak dengan nama alat
        $data['unit'] = $this->BarangRusak_model->get_all_unit();
        $data['title'] = 'Data Barang Rusak';
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('barang_rusak/index', $data); // Memuat view dan mengirimkan data
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Barang Rusak';
        $data['alat_medis'] = $this->BarangRusak_model->get_all_alat_medis(); // Ambil semua alat medis untuk dropdown
        $data['unit'] = $this->BarangRusak_model->get_all_unit();
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('barang_rusak/create', $data);
    }

    public function edit($id_barang_rusak)
    {
        // Mengambil data barang rusak berdasarkan ID
        $data['barang_rusak'] = $this->BarangRusak_model->select_by_id('barang_rusak', $id_barang_rusak);
        // Mengambil semua alat medis untuk dropdown
        $data['alat_medis'] = $this->BarangRusak_model->get_all_alat_medis(); // Pastikan Anda membuat method ini di model
        $data['unit'] = $this->BarangRusak_model->get_all_unit();
        $data['title'] = 'Edit Barang Rusak';
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('barang_rusak/edit', $data);
    }
    public function store()
    {
        $data = [
            'id_alat' => $this->input->post('id_alat'),
            'tanggal_rusak' => $this->input->post('tanggal_rusak'),
            'jumlah_rusak' => $this->input->post('jumlah_rusak'),
            'alasan' => $this->input->post('alasan'),
            'id_unit' => $this->input->post('id_unit'),
            'id_merk' => $this->input->post('id_alat'),
            'pengguna_id' => $this->session->userdata('id'), // Ambil user_id dari session secara otomatis
        ];
        $this->BarangRusak_model->insert_barang_rusak($data);
        $this->session->set_flashdata('success', 'Data Berhasil Di Simpan');
        redirect('BarangRusak');
    }


    public function update($id_barang_rusak)
    {
        $this->form_validation->set_rules('id_alat', 'Nama Alat', 'required');
        $this->form_validation->set_rules('tanggal_rusak', 'Tanggal Rusak', 'required');
        $this->form_validation->set_rules('jumlah_rusak', 'Jumlah Rusak', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('BarangRusak/edit/' . $id_barang_rusak);
        } else {
            $data = array(
                'id_alat' => $this->input->post('id_alat'),
                'tanggal_rusak' => $this->input->post('tanggal_rusak'),
                'jumlah_rusak' => $this->input->post('jumlah_rusak'),
                'alasan' => $this->input->post('alasan'),
                'id_unit' => $this->input->post('id_unit'),
                'id_merk' => $this->input->post('id_alat'),
                'pengguna_id' => $this->session->userdata('id'),
            );

            $this->BarangRusak_model->update($id_barang_rusak, $data);
            $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
            redirect('BarangRusak');
        }
    }
    public function print()
    {
        // Ambil tanggal awal dan akhir dari input (misalnya dari form)
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');

        // Ambil data barang masuk berdasarkan rentang tanggal
        $data['barang_rusak'] = $this->BarangRusak_model->get_barang_rusak_with_alat_by_date($tanggal_awal, $tanggal_akhir);

        $this->load->view('barang_rusak/print', $data); // Ganti dengan nama view cetak Anda
    }

    public function reprint()
    {
        $data['title'] = 'Cetak Data Barang Rusak';

        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('barang_rusak/reprint', $data);
        $this->load->view('layout/footer');
    }

    public function delete($id)
    {
        $this->BarangRusak_model->delete_barang_rusak($id);
        $this->session->set_flashdata('delete', 'Data Berhasil Dihapus');
        redirect('BarangRusak');
    }
}
