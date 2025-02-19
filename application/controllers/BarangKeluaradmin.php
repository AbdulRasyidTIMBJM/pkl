<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangKeluaradmin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangKeluar_model');
        $this->load->library('form_validation'); // Pastikan library form_validation dimuat
    }

    public function index()
    {         
        // Ambil bulan, tahun, dan rentang tanggal dari input GET  
        $bulan = $this->input->get('bulan');         
        $tahun = $this->input->get('tahun');         
        $tanggal_awal = $this->input->get('tanggal_awal');         
        $tanggal_akhir = $this->input->get('tanggal_ahir');
 
        //  // Jika tidak ada filter, ambil data default berdasarkan bulan dan tahun saat ini
        //  if (!$bulan && !$tahun && !$tanggal_awal && !$tanggal_akhir) {
        //      $bulan = date('n'); // Bulan saat ini (1-12)
        //      $tahun = date('Y'); // Tahun saat ini
        //  }

        $data['barang_keluar'] = $this->BarangKeluar_model->get_barang_keluar_with_alat($bulan, $tahun, $tanggal_awal, $tanggal_akhir); // Mengambil data barang keluar dengan nama alat
        $data['title'] = 'Data Barang Keluar';
        $this->load->view('layout/head');
        $this->load->view('layout/headeradmin', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('barang_keluar/indexadmin', $data); // Memuat view dan mengirimkan data
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Barang Keluar';
        $data['alat_medis'] = $this->BarangKeluar_model->get_all_alat_medis(); // Ambil semua alat medis untuk dropdown
        $data['unit'] = $this->BarangKeluar_model->get_all_unit();
        $this->load->view('layout/head');
        $this->load->view('layout/headeradmin', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('barang_keluar/createadmin', $data);
    }

    public function edit($id_barang_keluar)
    {
        // Mengambil data barang Keluar berdasarkan ID
        $data['barang_keluar'] = $this->BarangKeluar_model->select_by_id('barang_keluar', $id_barang_keluar);
        // Mengambil semua alat medis untuk dropdown
        $data['alat_medis'] = $this->BarangKeluar_model->get_all_alat_medis();
        $data['unit'] = $this->BarangKeluar_model->get_all_unit();
        $data['title'] = 'Edit Barang Keluar';
        $this->load->view('layout/head');
        $this->load->view('layout/headeradmin', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('barang_keluar/editadmin', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('id_alat', 'Nama Alat', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal keluar', 'required');
        $this->form_validation->set_rules('jumlah_keluar', 'Jumlah keluar', 'required');
        $this->form_validation->set_rules('id_unit', 'Nama unit', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('BarangKeluaradmin/createadmin');
        } else {
            $id_alat = $this->input->post('id_alat');
            $jumlah_keluar = $this->input->post('jumlah_keluar');

            // Cek jumlah alat yang tersedia
            $jumlah_tersedia = $this->BarangKeluar_model->get_jumlah_tersedia($id_alat);

            if ($jumlah_keluar > $jumlah_tersedia) {
                $this->session->set_flashdata('error', 'Jumlah keluar melebihi jumlah yang tersedia');
                redirect('BarangKeluaradmin/createadmin');
            }

            $data = [
                'id_alat' => $id_alat,
                'tanggal_keluar' => $this->input->post('tanggal_keluar'),
                'jumlah_keluar' => $jumlah_keluar,
                'pengguna_id' => $this->session->userdata('id'),
                'id_unit' => $this->input->post('id_unit'),
                'id_merk' => $id_alat,
                'status' => $this->input->post('status'),

            ];

            // Simpan data barang keluar
            $this->BarangKeluar_model->insert_barang_keluar($data);

            // Update jumlah alat di tabel alat_medis
            $this->BarangKeluar_model->update_jumlah_alat($id_alat, -$jumlah_keluar); // Kurangi jumlah alat

            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('BarangKeluaradmin');
        }
    }

    public function update($id_barang_keluar)
    {
        $this->form_validation->set_rules('id_alat', 'Nama Alat', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal keluar', 'required');
        $this->form_validation->set_rules('jumlah_keluar', 'Jumlah keluar', 'required');
        $this->form_validation->set_rules('id_unit', 'Nama unit', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('BarangKeluaradmin/edit/' . $id_barang_keluar);
        } else {
            // Ambil data barang keluar yang ada
            $barang_keluar = $this->BarangKeluar_model->select_by_id('barang_keluar', $id_barang_keluar);
            $jumlah_sebelumnya = $barang_keluar->jumlah_keluar; // Ambil jumlah sebelumnya

            $id_alat = $this->input->post('id_alat');
            $jumlah_keluar = $this->input->post('jumlah_keluar');

            // Cek jumlah alat yang tersedia
            $jumlah_tersedia = $this->BarangKeluar_model->get_jumlah_tersedia($id_alat);

            // Hitung selisih
            $selisih = $jumlah_keluar - $jumlah_sebelumnya;

            if ($selisih > $jumlah_tersedia) {
                $this->session->set_flashdata('error', 'Jumlah keluar melebihi jumlah yang tersedia');
                redirect('BarangKeluaradmin/edit/' . $id_barang_keluar);
            }

            $data = array(
                'id_alat' => $id_alat,
                'tanggal_keluar' => $this->input->post('tanggal_keluar'),
                'jumlah_keluar' => $jumlah_keluar,
                'id_unit' => $this->input->post('id_unit'),
                'pengguna_id' => $this->session->userdata('id'),
                'id_merk' => $id_alat,
                'status' => $this->input->post('status'),
            );

            // Update jumlah alat di tabel alat_medis
            $this->BarangKeluar_model->update_jumlah_alat($id_alat, -$selisih); // Kurangi jumlah alat

            $this->BarangKeluar_model->update($id_barang_keluar, $data);
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
            redirect('BarangKeluaradmin');
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
        $this->load->view('layout/headeradmin', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('barang_keluar/reprintadmin', $data);
        $this->load->view('layout/footer');
    }

    public function delete($id_barang_keluar)
    {
        // Ambil data barang keluar yang akan dihapus
        $barang_keluar = $this->BarangKeluar_model->select_by_id('barang_keluar', $id_barang_keluar);
        $jumlah_keluar = $barang_keluar->jumlah_keluar; // Ambil jumlah yang dikekan
    
        // Hapus data barang keluar
        $this->BarangKeluar_model->delete_barang_keluar($id_barang_kr);
    
        // Update jumlah alat di tabel alat_medis
        $this->BarangKeluar_model->update_jumlah_alat($barang_keluar->id_alat, $jumlah_keluar); // Tambah kembali jumllat
    
        $this->session->set_flashdata('delete', 'Data berhasil dihapus');
        redirect('BarangKeluaradmin');
    }
    public function get_merk()
    {
        $id_alat = $this->input->post('id_alat');
        $merk = $this->BarangMasuk_model->get_merk($id_alat);
        echo $merk;
    }
    public function surat_serah_terima()
{
    $data['title'] = 'Surat Serah Terima Barang Keluar';

    // Ambil tanggal awal dan akhir dari input (misalnya dari form)
    $tanggal_awal = $this->input->get('tanggal_awal');
    $tanggal_akhir = $this->input->get('tanggal_akhir');
    $id_unit = $this->input->get('id_unit');

    // Ambil data barang keluar berdasarkan rentang tanggal dan unit
    $data['barang_keluar'] = $this->BarangKeluar_model->get_barang_keluar_with_alat_by_date_and_unit($tanggal_awal, $tanggal_akhir, $id_unit);

    $this->load->view('layout/head');
    $this->load->view('layout/headeradmin', $data);
    $this->load->view('layout/sidebaradmin');
    $this->load->view('barang_keluar/surat_serah_terimaadmin', $data);
}

// public function cetak_surat_serah_terima()
// {
//     $data['title'] = 'Cetak Surat Serah Terima Barang Keluar';

//     // Ambil tanggal awal dan akhir dari input (misalnya dari form)
//     $tanggal_awal = $this->input->get('tanggal_awal');
//     $tanggal_akhir = $this->input->get('tanggal_akhir');
//     $id_unit = $this->input->get('id_unit');

//     // Ambil data barang keluar berdasarkan rentang tanggal dan unit
//     $data['barang_keluar'] = $this->BarangKeluar_model->get_barang_keluar_with_alat_by_date_and_unit($tanggal_awal, $tanggal_akhir, $id_unit);

//     $this->load->view('barang_keluar/cetak_surat_serah_terima', $data);
// }
public function get_barang_keluar_by_filter()
{
    $tanggalAwal = $this->input->get('tanggal_awal');
    $tanggalAkhir = $this->input->get('tanggal_akhir');
    $idUnit = $this->input->get('id_unit');
    $data['barang_keluar'] = $this->BarangKeluar_model->get_barang_keluar_with_alat_by_date_and_unit($tanggalAwal, $tanggalAkhir, $idUnit);
    $this->load->view('barang_keluar/data_barang_keluar', $data);
}

public function cetak_surat_serah_terima()
{
    $idBarangKeluar = $this->input->get('id_barang_keluar');
    $namaPihakPertama = $this->input->get('nama_pihak_pertama');
    $jabatanPihakPertama = $this->input->get('jabatan_pihak_pertama');
    $namaPihakKedua = $this->input->get('nama_pihak_kedua');
    $jabatanPihakKedua = $this->input->get('jabatan_pihak_kedua');

    $data['barang_keluar'] = $this->BarangKeluar_model->get_barang_keluar_by_id($idBarangKeluar);
    $data['nama_pihak_pertama'] = $namaPihakPertama;
    $data['jabatan_pihak_pertama'] = $jabatanPihakPertama;
    $data['nama_pihak_kedua'] = $namaPihakKedua;
    $data['jabatan_pihak_kedua'] = $jabatanPihakKedua;
    $data['barang_keluar'] = $this->BarangKeluar_model->get_barang_keluar_with_alat_by_id($idBarangKeluar);
    $this->load->view('barang_keluar/cetak_surat_serah_terima', $data);
}
}