<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kendaraan extends CI_Controller {
    var $imagePath ="images/motor/";
    function __construct(){
        parent::__construct();
        $this->load->model('kendaraan_model');
        $this->load->helper('captcha');
    }
    public function index() {
        $data['data'] = $this->kendaraan_model->findAll();

        $this->load->view('kendaraan',$data);
    }
    public function add($username){
        $this->form_validation->set_rules('nama_kendaraan', 'Nama Kendaraan', 'required');
        $this->form_validation->set_rules('merek', 'Merek', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        $this->form_validation->set_rules('isi_silinder', 'Isi Silinder', 'required');
        $this->form_validation->set_rules('no_kendaraan', 'No Kendaraan', 'required');
        $data['input']= array('' => '');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('input/inp_kendaraan',$data);
        }
        else
        {
            $check =$this->kendaraan_model->findIdKendaraan($this->input->post('id_kendaraan')); 
            if ($check) {
                $data['alert'] = "ID telah digunakan!";
                $this->load->view('input/inp_kendaraan',$data);
            }else{
                $params = array(
                    'nama_kendaraan' => $this->input->post('nama_kendaraan'),
                    'merek' => $this->input->post('merek'),
                    'tahun' =>$this->input->post('tahun'),
                    'jenis' => $this->input->post('jenis'),
                    'warna' => $this->input->post('warna'),
                    'isi_silinder' => $this->input->post('isi_silinder'),
                    'no_kendaraan' => $this->input->post('no_kendaraan'),
                    'default' => 1,
                    'username_driver' => $username
                );
                if ($_FILES['photo']['error'] != 4) {
                    $config['upload_path'] = $this->imagePath ;
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['max_size'] = '200000';
                    $config['overwrite']=TRUE;
                    $config['file_name'] = $params['id_kendaraan'];
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload("photo")) {
                        $image = $this->upload->data();
                        $params['foto_kendaraan'] = $this->imagePath.$image['file_name'];
                    }
                }
                $this->kendaraan_model->createKendaraan($params);
                redirect('driver/detail/'.$username);
            }
        }
    }
    public function editKendaraan($id_kendaraan, $username){
        $id_kendaraan = $id_kendaraan;
        $where = array('id_kendaraan' => $id_kendaraan );
        $data['dataedit'] = $this->kendaraan_model->findIdKendaraan($id_kendaraan);
        $this->form_validation->set_rules('nama_kendaraan', 'Nama Kendaraan', 'required');
        $this->form_validation->set_rules('merek', 'Merek', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        $this->form_validation->set_rules('isi_silinder', 'Isi Silinder', 'required');
        $this->form_validation->set_rules('no_kendaraan', 'No Kendaraan', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('input/inp_kendaraan',$data);
        }
        else
        {
            $params = array(
                'nama_kendaraan' => $this->input->post('nama_kendaraan'),
                'merek' => $this->input->post('merek'),
                'tahun' =>$this->input->post('tahun'),
                'jenis' => $this->input->post('jenis'),
                'warna' => $this->input->post('warna'),
                'isi_silinder' => $this->input->post('isi_silinder'),
                'no_kendaraan' => $this->input->post('no_kendaraan'),
            );
            if ($_FILES['photo']['error'] != 4) {
                $config['upload_path'] = $this->imagePath ;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '200000';
                $config['overwrite']=TRUE;
                $config['file_name'] = $params['username'];
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("photo")) {
                    $image = $this->upload->data();
                    $params['foto_kendaraan'] = $this->imagePath.$image['file_name'];
                }
            }
            $this->kendaraan_model->updateWhere($params,$where);
            redirect('driver/detail/'.$username);
        }
    }
    public function delete($id_kendaraan)
    {
        if($this->kendaraan_model->destroy($id_kendaraan)){
            redirect("kendaraan");
        }

    }
}
