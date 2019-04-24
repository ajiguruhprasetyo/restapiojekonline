<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('captcha');
        $this->check_log_in();
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('login');
        }
        else
        {
            $datalogin = $this->admin_model->cek_admin_login($this->input->post("username"),$this->input->post("password"));
            if ($datalogin) {
                $session_data = array(
                    'data' => $datalogin,
                    'type' => "ADMIN",
                    'is_login_admin' => TRUE
                );
                $this->session->set_userdata($session_data);
                redirect('dashboard');
            }else{
                redirect('login');
            }

        }
    }
    private function check_logged_in() {
        if ($this->session->userdata('is_login_admin') != TRUE) {
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."login/'>";
                exit();
        } else if ($this->session->userdata('type') != 'ADMIN') {
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."login/'>";
                exit();
            }
    }
    private function check_log_in() {
        if ($this->session->userdata('is_login_admin') == TRUE) {
            if ($this->session->userdata('type') == 'ADMIN') {
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."dashboard/'>";
                exit();
            }
        }else if ($this->session->userdata('is_login_cs') == TRUE) {
            if ($this->session->userdata('type') == 'CUSTOMER') {
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."cs/dashboard/'>";
                exit();
            }
        }
    }
}
