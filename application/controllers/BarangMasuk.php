<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangMasuk extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangMasuk_model');
    }

    public function index()
    {
        // Ambil bulan, tahun, dan rentang tanggal dari input GET
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');

        // // Jika tidak ada filter, ambil data default berdasarkan bulan dan tahun saat ini
        // if (!$bulan && !$tahun && !$tanggal_awal && !$tanggal_akhir) {
        //     $bulan = date('n'); // Bulan saat ini (1-12)
        //     $tahun = date('Y'); // Tahun saat ini
        // }

        $this->load->model('BarangMasuk_model'); // Memuat model
        $data['barang_masuk'] = $this->BarangMasuk_model->select_all();
        $data['barang_masuk'] = $this->BarangMasuk_model->get_barang_masuk_with_alat($bulan, $tahun, $tanggal_awal, $tanggal_akhir); // Mengambil data barang masuk dengan nama alat
        $data['title'] = 'Data Barang Masuk Lama';
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('barang_masuk/index', $data); // Memuat view dan mengirimkan data
    }
    public function indexbaru()
    {
        // Ambil bulan, tahun, dan rentang tanggal dari input GET
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');

        // // Jika tidak ada filter, ambil data default berdasarkan bulan dan tahun saat ini
        // if (!$bulan && !$tahun && !$tanggal_awal && !$tanggal_akhir) {
        //     $bulan = date('n'); // Bulan saat ini (1-12)
        //     $tahun = date('Y'); // Tahun saat ini
        // }

        //  // Ambil tanggal awal dan akhir dari input (misalnya dari form)
        //  $tanggal_awal = $this->input->get('tanggal_awal');
        //  $tanggal_akhir = $this->input->get('tanggal_akhir');
        //  $id_supplier = $this->input->get('id_supplier');
        $data['barang_masuk'] = $this->BarangMasuk_model->get_verified_barang_masuk($bulan, $tahun, $tanggal_awal, $tanggal_akhir);
        $this->load->model('BarangMasuk_model'); // Memuat model 
        $data['title'] = 'Data Barang Masuk Baru';
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('barang_masuk/indexbaru', $data); // Memuat view dan mengirimkan data
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Barang Masuk';
        $data['alat_medis'] = $this->BarangMasuk_model->get_all_alat_medis(); // Ambil semua alat medis untuk dropdown
        $data['unit'] = $this->BarangMasuk_model->get_all_unit();
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('barang_masuk/create', $data);
    }
    public function createbaru()
    {
        $data['title'] = 'Tambah Data Barang Masuk';
        $data['alat_medis'] = $this->BarangMasuk_model->get_all_alat_medis(); // Ambil semua alat medis untuk dropdown
        $data['supplier'] = $this->BarangMasuk_model->get_all_supplier();
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('barang_masuk/createbaru', $data);
    }

    public function edit($id_barang_masuk)
    {
        // Mengambil data barang masuk berdasarkan ID
        $data['barang_masuk'] = $this->BarangMasuk_model->select_by_id('barang_masuk', $id_barang_masuk);
        // Mengambil semua alat medis untuk dropdown
        $data['alat_medis'] = $this->BarangMasuk_model->get_all_alat_medis(); // Pastikan Anda membuat method ini di model
        $data['unit'] = $this->BarangMasuk_model->get_all_unit();
        $data['title'] = 'Edit Barang Masuk';
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('barang_masuk/edit', $data);
    }
    public function editbaru($id_barang_masuk)
    {
        // Mengambil data barang masuk berdasarkan ID
        $data['barang_masuk'] = $this->BarangMasuk_model->select_by_id('barang_masuk', $id_barang_masuk);
        // Mengambil semua alat medis untuk dropdown
        $data['alat_medis'] = $this->BarangMasuk_model->get_all_alat_medis(); // Pastikan Anda membuat method ini di model
        $data['supplier'] = $this->BarangMasuk_model->get_all_supplier();
        $data['title'] = 'Edit Barang Masuk';
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('barang_masuk/editbaru', $data);
    }
    public function store()
    {
        $this->form_validation->set_rules('id_alat', 'Nama Alat', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal masuk', 'required');
        $this->form_validation->set_rules('jumlah_masuk', 'Jumlah masuk', 'required');
        $this->form_validation->set_rules('id_unit', 'Nama unit', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('BarangMasuk/create/');
        } else {
            $data = [
                'id_alat' => $this->input->post('id_alat'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'jumlah_masuk' => $this->input->post('jumlah_masuk'),
                'id_unit' => $this->input->post('id_unit'),
                'id_merk' => $this->input->post('id_alat'),
                'pengguna_id' => $this->session->userdata('id'),
                'status' => $this->input->post('status'),
            ];

            // Simpan data barang masuk
            $this->BarangMasuk_model->insert_barang_masuk($data);

            // Update jumlah alat di tabel alat_medis untuk item yang spesifik
            $jumlah_masuk = $this->input->post('jumlah_masuk');
            $id_alat = $this->input->post('id_alat');

            // Panggil model untuk memperbarui jumlah alat
            $this->BarangMasuk_model->update_jumlah_alat($id_alat, $jumlah_masuk);

            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('BarangMasuk');
        }
    }
    public function storebaru()
    {
        $this->form_validation->set_rules('id_alat', 'Nama Alat', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal masuk', 'required');
        $this->form_validation->set_rules('jumlah_masuk', 'Jumlah masuk', 'required');
        $this->form_validation->set_rules('id_supplier', 'Nama Toko', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('BarangMasuk/createbaru/');
        } else {
            $data = [
                'id_alat' => $this->input->post('id_alat'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'jumlah_masuk' => $this->input->post('jumlah_masuk'),
                'id_supplier' => $this->input->post('id_supplier'),
                'id_merk' => $this->input->post('id_alat'),
                'pengguna_id' => $this->session->userdata('id'),
            ];

            // Simpan data barang masuk
            $this->BarangMasuk_model->insert_barang_masuk($data);

            // Update jumlah alat di tabel alat_medis untuk item yang spesifik
            $jumlah_masuk = $this->input->post('jumlah_masuk');
            $id_alat = $this->input->post('id_alat');

            // Panggil model untuk memperbarui jumlah alat
            $this->BarangMasuk_model->update_jumlah_alat($id_alat, $jumlah_masuk);

            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('BarangMasuk/indexbaru');
        }
    }

    public function update($id_barang_masuk)
    {
        $this->form_validation->set_rules('id_alat', 'Nama Alat', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal masuk', 'required');
        $this->form_validation->set_rules('jumlah_masuk', 'Jumlah masuk', 'required');
        $this->form_validation->set_rules('id_unit', 'Nama unit', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('BarangMasuk/edit/' . $id_barang_masuk);
        } else {
            // Ambil data barang masuk yang ada
            $barang_masuk = $this->BarangMasuk_model->select_by_id('barang_masuk', $id_barang_masuk);
            $jumlah_sebelumnya = $barang_masuk->jumlah_masuk; // Ambil jumlah sebelumnya

            $data = array(
                'id_alat' => $this->input->post('id_alat'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'jumlah_masuk' => $this->input->post('jumlah_masuk'),
                'id_unit' => $this->input->post('id_unit'),
                'id_merk' => $this->input->post('id_alat'),
                'pengguna_id' => $this->session->userdata('id'),
                'status' => $this->input->post('status'),
            );

            // Update jumlah alat di tabel alat_medis
            $jumlah_masuk = $this->input->post('jumlah_masuk');
            $id_alat = $this->input->post('id_alat');

            // Hitung selisih dan update jumlah alat
            $selisih = $jumlah_masuk - $jumlah_sebelumnya;
            $this->BarangMasuk_model->update_jumlah_alat($id_alat, $selisih);

            $this->BarangMasuk_model->update($id_barang_masuk, $data);
            $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
            redirect('BarangMasuk');
        }
    }
    public function updatebaru($id_barang_masuk)
    {
        $this->form_validation->set_rules('id_alat', 'Nama Alat', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal masuk', 'required');
        $this->form_validation->set_rules('jumlah_masuk', 'Jumlah masuk', 'required');
        $this->form_validation->set_rules('id_supplier', 'Nama Toko', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('BarangMasuk/editbaru/' . $id_barang_masuk);
        } else {
            // Ambil data barang masuk yang ada
            $barang_masuk = $this->BarangMasuk_model->select_by_id('barang_masuk', $id_barang_masuk);
            $jumlah_sebelumnya = $barang_masuk->jumlah_masuk; // Ambil jumlah sebelumnya

            $data = array(
                'id_alat' => $this->input->post('id_alat'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'jumlah_masuk' => $this->input->post('jumlah_masuk'),
                'id_supplier' => $this->input->post('id_supplier'),
                'id_merk' => $this->input->post('id_alat'),
                'pengguna_id' => $this->session->userdata('id'),
            );

            // Update jumlah alat di tabel alat_medis
            $jumlah_masuk = $this->input->post('jumlah_masuk');
            $id_alat = $this->input->post('id_alat');

            // Hitung selisih dan update jumlah alat
            $selisih = $jumlah_masuk - $jumlah_sebelumnya;
            $this->BarangMasuk_model->update_jumlah_alat($id_alat, $selisih);

            $this->BarangMasuk_model->update($id_barang_masuk, $data);
            $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
            redirect('BarangMasuk/indexbaru');
        }
    }
    public function print()
    {
        // Ambil tanggal awal dan akhir dari input (misalnya dari form)
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');

        // Ambil data barang masuk berdasarkan rentang tanggal
        $data['barang_masuk'] = $this->BarangMasuk_model->get_barang_masuk_with_alat_by_date($tanggal_awal, $tanggal_akhir);

        $this->load->view('barang_masuk/print', $data); // Ganti dengan nama view cetak Anda
    }
    public function reprint()
    {
        $data['title'] = 'Cetak Data Barang Masuk';

        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('barang_masuk/reprint', $data);
        $this->load->view('layout/footer');
    }
    public function delete($id)
    {
        // Ambil data barang masuk yang akan dihapus
        $barang_masuk = $this->BarangMasuk_model->select_by_id('barang_masuk', $id);
        $jumlah_masuk = $barang_masuk->jumlah_masuk; // Ambil jumlah yang akan dihapus
        $id_alat = $barang_masuk->id_alat; // Ambil id_alat yang terkait

        // Hapus data barang masuk
        $this->BarangMasuk_model->delete_barang_masuk($id);

        // Update jumlah alat di tabel alat_medis
        $this->BarangMasuk_model->update_jumlah_alat($id_alat, -$jumlah_masuk); // Kurangi jumlah alat

        $this->session->set_flashdata('delete', 'Data Berhasil Dihapus');
        redirect('BarangMasuk');
    }
    public function get_merk()
    {
        $id_alat = $this->input->post('id_alat');
        $merk = $this->BarangMasuk_model->get_merk($id_alat);
        echo $merk;
    }
    // public function surat_serah_terima()
    // {
    //     $data['title'] = 'Surat Serah Terima Barang Keluar';
    
    //     // Ambil tanggal awal dan akhir dari input (misalnya dari form)
    //     $tanggal_awal = $this->input->get('tanggal_awal');
    //     $tanggal_akhir = $this->input->get('tanggal_akhir');
    //     $id_supplier = $this->input->get('id_supplier');
    
    //     // Ambil data barang keluar berdasarkan rentang tanggal dan supplier
    //     $data['barang_masuk'] = $this->BarangMasuk_model->get_barang_masuk_with_alat_by_date_and_supplier($tanggal_awal, $tanggal_akhir, $id_supplier);
    
    //     $this->load->view('layout/head');
    //     $this->load->view('layout/header', $data);
    //     $this->load->view('layout/sidebar');
    //     $this->load->view('barang_masuk/indexbaru', $data);
    // }

    public function get_barang_masuk_by_filter()
    {
        $tanggalAwal = $this->input->get('tanggal_awal');
        $tanggalAkhir = $this->input->get('tanggal_akhir');
        $idSupplier = $this->input->get('id_supplier');
        $data['barang_masuk'] = $this->BarangMasuk_model->get_barang_masuk_with_alat_by_date_and_supplier($tanggalAwal, $tanggalAkhir, $idSupplier);
        $this->load->view('barang_masuk/data_barang_masuk', $data);
    }
    
    public function cetak_surat()
    {
        $idBarangMasuk = $this->input->get('id_barang_masuk');
        $data['barang_masuk'] = $this->BarangMasuk_model->get_barang_masuk_with_alat_by_id($idBarangMasuk);
        $this->load->view('barang_masuk/cetak_surat', $data);
    }

    public function surat()
{
    $data['title'] = 'Surat Pemesanan Barang';
    $bulan = $this->input->get('bulan');
    $tahun = $this->input->get('tahun');
    $tanggal_awal = $this->input->get('tanggal_awal');
    $tanggal_akhir = $this->input->get('tanggal_akhir');
    
    $this->load->model('BarangMasuk_model'); // Memuat model
    $data['barang_masuk'] = $this->BarangMasuk_model->get_barang_masuk_with_alatbaru($bulan, $tahun, $tanggal_awal, $tanggal_akhir);  
    $this->load->view('layout/head');
    $this->load->view('layout/header', $data);
    $this->load->view('layout/sidebar');
    $this->load->view('barang_masuk/surat', $data);
}

public function create_surat() {
    $data['title'] = 'Tambah Data Surat';
    $data['alat_medis'] = $this->BarangMasuk_model->get_all_alat_medis(); // Ambil semua alat medis untuk dropdown
    $data['supplier'] = $this->BarangMasuk_model->get_all_supplier(); // Ambil semua supplier untuk dropdown
    $this->load->view('layout/head');
    $this->load->view('layout/header', $data);
    $this->load->view('layout/sidebar');
    $this->load->view('barang_masuk/create_surat', $data);
    $this->load->view('layout/footer');
}
public function store_surat() {
    $this->form_validation->set_rules('id_alat', 'Nama Alat', 'required');
    $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
    $this->form_validation->set_rules('jumlah_masuk', 'Jumlah', 'required');
    $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        redirect('BarangMasuk/create_surat');
    } else {
        $data = [
            'id_alat' => $this->input->post('id_alat'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'jumlah_masuk' => $this->input->post('jumlah_masuk'),
            'id_supplier' => $this->input->post('id_supplier'),
            'status' => $this->input->post('status'),
            'pengguna_id' => $this->session->userdata('id'),
        ];

        // Simpan data barang masuk
        $this->BarangMasuk_model->insert_barang_masuk($data);
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('BarangMasuk/surat');
    }
}
public function edit_surat($id_barang_masuk) {
    // Ambil data barang masuk berdasarkan ID
    $data['barang_masuk'] = $this->BarangMasuk_model->select_by_id('barang_masuk', $id_barang_masuk);
    $data['title'] = 'Edit Data Surat';
    $data['alat_medis'] = $this->BarangMasuk_model->get_all_alat_medis(); // Ambil semua alat medis untuk dropdown
    $data['supplier'] = $this->BarangMasuk_model->get_all_supplier(); // Ambil semua supplier untuk dropdown

    // Pastikan data ditemukan
    if (!$data['barang_masuk']) {
        $this->session->set_flashdata('error', 'Data tidak ditemukan');
        redirect('BarangMasuk/surat');
    }

    $this->load->view('layout/head');
    $this->load->view('layout/header', $data);
    $this->load->view('layout/sidebar');
    $this->load->view('barang_masuk/edit_surat', $data);
    $this->load->view('layout/footer');
}
public function update_surat($id_barang_masuk) {
    $this->form_validation->set_rules('id_alat', 'Nama Alat', 'required');
    $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
    $this->form_validation->set_rules('jumlah_masuk', 'Jumlah', 'required');
    $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        redirect('BarangMasuk/edit_surat/' . $id_barang_masuk);
    } else {
        // Ambil data barang masuk yang ada
        $barang_masuk = $this->BarangMasuk_model->select_by_id('barang_masuk', $id_barang_masuk);
        $jumlah_sebelumnya = $barang_masuk->jumlah_masuk; // Ambil jumlah sebelumnya

        $data = [
            'id_alat' => $this->input->post('id_alat'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'jumlah_masuk' => $this->input->post('jumlah_masuk'),
            'id_supplier' => $this->input->post('id_supplier'),
            'status' => $this->input->post('status'),
            'pengguna_id' => $this->session->userdata('id'),
        ];

        // Update jumlah alat di tabel alat_medis hanya jika status diubah menjadi 'verified'
        $jumlah_masuk = $this->input->post('jumlah_masuk');
        $id_alat = $this->input->post('id_alat');

        // Hitung selisih dan update jumlah alat
        if ($data['status'] === 'verified') {
            // Jika status diubah menjadi verified, tambahkan jumlah alat
            $selisih = $jumlah_masuk; // Karena ini adalah jumlah baru yang masuk
            $this->BarangMasuk_model->update_jumlah_alat($id_alat, $selisih);
        } elseif ($barang_masuk->status === 'verified' && $data['status'] !== 'verified') {
            // Jika status sebelumnya adalah verified dan sekarang diubah ke status lain, kurangi jumlah alat
            $selisih = -$jumlah_sebelumnya; // Mengurangi jumlah sebelumnya
            $this->BarangMasuk_model->update_jumlah_alat($id_alat, $selisih);
        }

        // Update data barang masuk
        $this->BarangMasuk_model->update($id_barang_masuk, $data);
        $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
        redirect('BarangMasuk/surat');
    }
}
}


