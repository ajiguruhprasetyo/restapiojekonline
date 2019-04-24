<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
    var $imagePath ="images/admin/";
    function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('captcha');
        $this->check_logged_in();
    }
    public function index()
    {
        $data['data'] = $this->admin_model->findAll();

        $this->load->view('admin2',$data);
    }
    public function add(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        //$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $data['input']= array('' => '');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('input/inp_admin',$data);
        }
        else
        {
            $check =$this->admin_model->findUsername($this->input->post('username')); 
            if ($check) {
                $data['alert'] = "Username telah digunakan!";
                $this->load->view('input/inp_admin',$data);
            }else{
                $params = array(
                    'username' => $this->input->post('username'),
                    'nama_lengkap' => $this->input->post('nama_lengkap'),
                    'alamat' => $this->input->post('alamat'),
                    'no_telp' =>$this->input->post('no_telp'),
                    'gender' => $this->input->post('gender'),
                    'no_ktp' => $this->input->post('no_ktp')
                );
                if($this->input->post('password')){
                    $params['password'] = md5($this->input->post('password'));
                    }
                if ($_FILES['photo']['error'] != 4) {
                    $config['upload_path'] = $this->imagePath ;
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['max_size'] = '200000';
                    $config['overwrite']=TRUE;
                    $config['file_name'] = $params['username'];
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload("photo")) {
                        $image = $this->upload->data();
                        $params['foto'] = $this->imagePath.$image['file_name'];
                    }
                }
                $this->admin_model->createAdmin($params);
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/'>";
            }
        }
    }
    public function edit($username){
        $username = $username;
        $where = array('username' => $username );
        $data['dataedit'] = $this->admin_model->findUsername($username);
        //$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('input/inp_admin',$data);
        }
        else
        {
            $params = array(
                'username' => $this->input->post('username'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' =>$this->input->post('no_telp'),
                'gender' => $this->input->post('gender'),
                'no_ktp' => $this->input->post('no_ktp')
            );
            if($this->input->post('password')){
                $params['password'] = md5($this->input->post('password'));
                }
            if ($_FILES['photo']['error'] != 4) {
                $config['upload_path'] = $this->imagePath ;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '200000';
                $config['overwrite']=TRUE;
                $config['file_name'] = $params['username'];
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("photo")) {
                    $image = $this->upload->data();
                    $params['foto'] = $this->imagePath.$image['file_name'];
                }
            }
            $this->admin_model->updateWhere($params,$where);
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/'>";
        }
    }
    public function delete($username)
    {
        if($this->admin_model->destroy($username)){
            redirect("admin");
        }

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
    private function check_log_in() {
        if ($this->session->userdata('is_login_admin') == TRUE) {
            if ($this->session->userdata('type') == 'ADMIN') {
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."dashboard'>";
                exit();
            }
        }else if ($this->session->userdata('is_login_karyawan') == TRUE) {
            if ($this->session->userdata('type') == 'KARYAWAN') {
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."cs/dashboard'>";
                exit();
            }
        }
    }
}
