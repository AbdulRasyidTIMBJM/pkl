<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function index()
	{
        if ($this->session->userdata('level') == 1) redirect('admin');
        if ($this->session->userdata('level') == 2) redirect('user');
		$this->load->view('login');
	}
    public function validasi()
    {
        $cek = $this->m_login->cek_login();
        if ($cek) {
            $data = [
                'id' => $cek['id'],
                'username' => $cek['username'],
                'nama' => $cek['nama'],
                'nomor_telepon' => $cek['nomor_telepon'],
                'alamat' => $cek['alamat'],
                'level' => $cek['level'],
            ];
            $this->session->set_userdata($data);
            if ($cek['level'] == 1) {
                $this->session->set_flashdata('pesan', 'Berhasil login sebagai Admin');
                redirect('admin');
            } else {
                $this->session->set_flashdata('pesan', 'Berhasil login sebagai User');
                redirect('user');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Login gagal! Periksa username atau password Anda.');
            redirect('login');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}