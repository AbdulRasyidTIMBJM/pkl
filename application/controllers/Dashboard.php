<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }
    public function index()
    {
        $data=[
			'title' => "Home",
		];
        $data['total_alat'] = $this->Dashboard_model->get_total_alat();
        $data['total_bk'] = $this->Dashboard_model->get_total_bk();
        $data['total_bm'] = $this->Dashboard_model->get_total_bm();
        $data['total_br'] = $this->Dashboard_model->get_total_br();
        $this->load->view('layout/head');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('dashboard', $data);
    }
}
