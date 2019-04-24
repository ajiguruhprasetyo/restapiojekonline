<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {
	var $imagePath ="images/driver/";

    function __construct() {
        parent::__construct();
        $this->load->model('driver_model');
        $this->load->model('kendaraan_model');
        $this->load->helper('captcha');
    }
	public function index() {
		$data['data'] = $this->driver_model->findAll();
		$this->load->view('driver', $data);
	}

	public function detail($username) {
        $data['data'] = $this->driver_model->findUsername($username);
        $data['username']= $username;
        $data['data_kendaraan'] = $this->kendaraan_model->findByUsername($username);
		$this->load->view('detail_driver', $data);
	}

	public function add(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('status_ktp', 'Status KTP', 'required');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('status_akun', 'Status Akun', 'required');
        $this->form_validation->set_rules('status_delete', 'Status Delete', 'required');
        $data['input']= array('' => '');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('input/inp_driver',$data);
        }
        else
        {
            $check =$this->driver_model->findUsername($this->input->post('username')); 
            if ($check) {
                $data['alert'] = "Username telah digunakan!";
                $this->load->view('input/inp_driver',$data);
            }else{
                $params = array(
                    'username' => $this->input->post('username'),
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'status_ktp' => $this->input->post('status_ktp'),
					'no_ktp' => $this->input->post('no_ktp'),
					'no_telp' => $this->input->post('no_telp'),
					'email' => $this->input->post('email'),
					'jenkel' => $this->input->post('jenkel'),
					'status' => $this->input->post('status'),
					'status_akun' => $this->input->post('status_akun'),
					'status_delete' => $this->input->post('status_delete')
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
                $this->driver_model->createDriver($params);
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."driver/'>";
            }
        }
    }

    public function edit($username){
        $username = $username;
        $where = array('username' => $username );
        $data['dataedit'] = $this->driver_model->findUsername($username);
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('status_ktp', 'Status KTP', 'required');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('status_akun', 'Status Akun', 'required');
        $this->form_validation->set_rules('status_delete', 'Status Delete', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('input/inp_driver',$data);
        }
        else
        {
            $params = array(
                'username' => $this->input->post('username'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'status_ktp' => $this->input->post('status_ktp'),
				'no_ktp' => $this->input->post('no_ktp'),
				'no_telp' => $this->input->post('no_telp'),
				'email' => $this->input->post('email'),
				'jenkel' => $this->input->post('jenkel'),
				'status' => $this->input->post('status'),
				'status_akun' => $this->input->post('status_akun'),
				'status_delete' => $this->input->post('status_delete')
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
            $this->driver_model->updateWhere($params,$where);
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."driver/'>";
        }
    }
	public function delete($username){		
        if($this->driver_model->destroy($username)){
            redirect("driver");
        }
	}

	private function check_logged_in() {
        if ($this->session->userdata('is_login_driver') != TRUE) {
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."adminrigen/login/'>";
                exit();
        } else if ($this->session->userdata('type') != 'DRIVER') {
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."adminrigen/login/'>";
                exit();
            }
    }
    private function check_log_in() {
        if ($this->session->userdata('is_login_driver') == TRUE) {
            if ($this->session->userdata('type') == 'DRIVER') {
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."adminrigen/dashboard/'>";
                exit();
            }
        }else if ($this->session->userdata('is_login_driver') == TRUE) {
            if ($this->session->userdata('type') == 'DRIVER') {
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."dashboard/'>";
                exit();
            }
        }
    }
}
