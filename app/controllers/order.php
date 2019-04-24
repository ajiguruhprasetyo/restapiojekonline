<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('order_model');
        $this->load->helper('captcha');
    }
    public function index() {
        $data['data'] = $this->order_model->findAll();

        $this->load->view('order',$data);
    }
    public function delete($id_order)
    {
        if($this->order_model->destroy($id_order)){
            redirect("order");
        }

    }
}
