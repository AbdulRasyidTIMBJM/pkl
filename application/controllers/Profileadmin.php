<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profileadmin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profileadmin_model');
        $this->load->helper('user');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['user'] = $this->Profileadmin_model->get_user($this->session->userdata('id'));
        $data['title'] = 'Halaman Profil';
        $this->load->view('layout/head', $data);
        $this->load->view('layout/headeradmin', $data);
        $this->load->view('layout/sidebaradmin', $data);
        $this->load->view('profileadmin', $data);
        $this->load->view('layout/footer');
    }

    public function update_profile()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'alamat' => $this->input->post('alamat'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
        ];

        // Upload gambar jika ada
        if (!empty($_FILES['img']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // Maksimal 2MB
            $config['file_name'] = 'profile_' . time(); // Nama unik file
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('img')) {
                $upload_data = $this->upload->data();
                $data['img'] = $upload_data['file_name'];

                // Hapus gambar lama jika ada
                $old_image = $this->session->userdata('img');
                if ($old_image && file_exists('./uploads/' . $old_image)) {
                    unlink('./uploads/' . $old_image);
                }

                // Update data img ke session
                $this->session->set_userdata('img', $data['img']);
            } else {
                $this->session->set_flashdata('pesan', $this->upload->display_errors());
                redirect('Profileadmin');
            }
        }

        // Update data ke database
        if ($this->Profileadmin_model->update_profile($id, $data)) {
            // Update data lain ke session
            $this->session->set_userdata($data);
            $this->session->set_flashdata('pesan', 'Profil berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('pesan', 'Gagal memperbarui profil.');
        }

        redirect('Profileadmin');
    }
}
