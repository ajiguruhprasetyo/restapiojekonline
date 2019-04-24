<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {
	var $imagePath ="images/admin/";
	function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('captcha');
	}

	public function index() {
		$username = $this->session->userdata('data')['username'];
		$data['data'] = $this->admin_model->findUsername($username);
        $this->load->view('profile',$data);
	}
}