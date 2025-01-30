<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboardadmin_model');
    }
    public function index()
    {
        $data=[
			'title' => "Home",
		];
        $data['total_unit'] = $this->Dashboardadmin_model->get_total_unit();
        $data['total_karyawan'] = $this->Dashboardadmin_model->get_total_karyawan();
        $this->load->view('layout/head');
        $this->load->view('layout/headeradmin', $data);
        $this->load->view('layout/sidebaradmin');
        $this->load->view('dashboardadmin', $data);
    }
}
