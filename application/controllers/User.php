<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{

    public function index()
    {
        $data=[
			'title' => "Home",
		];
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('halaman user/user', $data);
        $this->load->view('layout/footer');
    }
}
