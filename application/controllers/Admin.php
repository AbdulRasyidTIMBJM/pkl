<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

    public function index()
    {
        $data=[
			'title' => "Home",
		];
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('halaman admin/admin', $data);
        $this->load->view('layout/footer');
    }
}
