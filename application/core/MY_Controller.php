<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Cek apakah pengguna sudah login
        if (!$this->session->userdata('username')) {
            redirect('login'); // Arahkan ke halaman login jika belum login
        } else {
            // tambahkan kode untuk pengguna yang sudah login
        }
    }
}