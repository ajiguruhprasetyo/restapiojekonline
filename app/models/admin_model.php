<?php

class admin_model extends CI_Model {

    var $table = 'admin';

    function __construct() {
        parent::__construct();
    }
	
	function cek_admin_login($username, $password) {
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));

        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
	}
    function findAll() {
        $this->db->select('*');
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    function countAll() {
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }
	
    function findAllAdmin($page, $perpage, $where=array()) {
        $this->db->select('*');
		$this->db->order_by('username','ASC');
		if ($where) {
			$this->db->where($where);
		}
		$this->db->limit($perpage, $page);
        $query = $this->db->get($this->table);
		
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    function findUsername($username) {
        $this->db->select('*');
        $this->db->where('username', $username);
        $query = $this->db->get($this->table);

        if ($query->num_rows()==1) {
            return $query->row_array();
        }
    }
    function check($params=array()) {
        $this->db->select('*');
        $this->db->where($params);
        $query = $this->db->get($this->table);

        if ($query->num_rows()==1) {
            return $query->row_array();
        }
    }
	function createAdmin($params=array()){
		if (empty($params)) {
            $uname = $this->input->post('username');
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
			if ($_FILES['image']['error'] != 4) {
				$config['upload_path'] = $this->imagePath ;
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_size'] = '200000';
				$config['overwrite']=TRUE;
				$config['file_name'] = $uname;
				$this->load->library('upload', $config);
				if ($this->upload->do_upload("photo")) {
					$image = $this->upload->data();
					$params['foto'] = $this->imagePath.$uname;
				}
			}
            $this->db->insert($this->table, $data);
        } else {
            $this->db->insert($this->table, $params);
        }
	}
	function update($params=array(), $username){
		if (empty($params)) {
            $uname = $this->input->post('username_karyawan');
			$berhenti = $this->input->post('resign');
			$params = array(
				'username' => $this->input->post('username'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' =>$this->input->post('no_telp'),
				'gender' => $this->input->post('gender'),
				'no_ktp' => $this->input->post('no_ktp')
			);
			
			if($berhenti=='resign'){$params['tgl_berhenti']=  date("Y-m-d H:i:s");}
			$password = $this->input->post('update_password');
			if($password!=0 || $password!="" ||$password!=null){$params['password'] =md5($password);}
			if ($_FILES['image']['error'] != 4) {
				$config['upload_path'] = $this->imagePath ;
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_size'] = '200000';
				$config['overwrite']=TRUE;
				$config['file_name'] = $uname;
				$this->load->library('upload', $config);
				if ($this->upload->do_upload("photo")) {
					$image = $this->upload->data();
					$ext = pathinfo($image['file_name'],PATHINFO_EXTENSION);
					$params['foto'] = $this->imagePath.$uname.".".$ext;
				}
			}
			$this->db->where('username',$username);
            $this->db->update($this->table, $params);
        } else {
			$this->db->where('username',$username);
            $this->db->update($this->table, $params);
        }
	}
	function updateWhere($params=array(), $where=array()){
		if ($where!=null) {
			$this->db->where($where);
            $this->db->update($this->table, $params);
		}

	}
    function destroy($username) {
        $this->db->where('username', $username);
        $this->db->delete($this->table);
    }
}