<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('captcha');
        $this->check_logged_in();
    }
	public function index()
	{
		$this->load->view('index');
	}
    private function check_logged_in() {
        if ($this->session->userdata('is_login_admin') != TRUE) {
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."login'>";
                exit();
        } else if ($this->session->userdata('type') != 'ADMIN') {
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."login'>";
                exit();
            }
    }
}
