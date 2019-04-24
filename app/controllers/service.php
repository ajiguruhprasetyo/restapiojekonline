<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class service extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('service_model');
        $this->load->helper('captcha');
    }
    public function index() {
        $data['data'] = $this->service_model->findAll();

        $this->load->view('service',$data);
    }
    public function add(){
        $this->form_validation->set_rules('nama_service', 'Nama Service', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('fee', 'Fee', 'required');
        $data['input']= array('' => '');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('input/inp_service',$data);
        }
        else
        {
            $params = array(
                'nama_service' => $this->input->post('nama_service'),
                'harga' => $this->input->post('harga'),
                'fee' =>$this->input->post('fee')
            );
            $this->service_model->createService($params);
            redirect('service');
        }
    }
    public function editService($id_service){
        $id_service = $id_service;
        $where = array('id_service' => $id_service );
        $data['dataedit'] = $this->service_model->findIdService($id_service);
        $this->form_validation->set_rules('nama_service', 'Nama Service', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('fee', 'Fee', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('input/inp_service',$data);
        }
        else
        {
            $params = array(
                'nama_service' => $this->input->post('nama_service'),
                'harga' => $this->input->post('harga'),
                'fee' =>$this->input->post('fee')
            );
            $this->service_model->updateWhere($params,$where);
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."service/'>";
        }
    }
    public function delete($id_service)
    {
        if($this->service_model->destroy($id_service)){
            redirect("service");
        }

    }
}
