<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logout extends CI_Controller {
	function __construct(){
		parent::__construct();
		}
	function index(){
        $data = array
            (
            'data' => 0,
            'type' => 0,
            'is_login_admin' => FALSE
        );

        $this->session->sess_destroy();
        $this->session->unset_userdata($data);
        redirect('login/');
    }
}
