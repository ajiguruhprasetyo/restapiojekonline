<?php
	
	class driver_model extends CI_model{
		var $table = 'driver';
		
		function __construct() {
			parent::__construct(); 
		}

		function cek_driver_login($username, $password) {
			$this->db->select('*');
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$query = $this->db->get($this->table, 1);

			if($query->num_rows() == 1) {
				return $query->row_array();
			}
		}

		function findAll() {
			$this->db->select('*');
			$query = $this->db->get($this->table);

			if($query->num_rows() > 0 ){
				return $query->result_array();
			}
		}

		function countAll() {
			$query = $this->db->get($this->table);
			return $query->num_rows();
		}

		function findAllDriver($page, $perpage, $where = array()) {
			$this->db->select('*');
			$this->db->order_by('username', 'ASC');
			
			if($where) {
				$this->db->where($where);
			}

			$this->db->limit($perpage, $page);
			$query = $this->db->get($this->table);

			if($query->num_rows() > 0) {
				return $query->result_array();
			}
		}

		function findUsername($username) {
			$this->db->select('*');
			$this->db->where('username', $username);
			$query = $this->db->get($this->table);

			if($query->num_rows() == 1) {
				return $query->row_array();
			}
		}

		function check($params = array()) {
			$this->db->select('*');
			$this->db->where($params);
			$query = $this->db->get($this->table);

			if($query->num_rows() == 1) {
				return $query->row_array();
			}
		}

		function createDriver($params = array()) {
			if(empty($params)) {
				$uname = $this->input->post('username');
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
				if($this->input->post('password')) {
					$params['password'] = md5($this->input->post('password'));
				}
				if($_FILES['images'] ['error'] != 4) {
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
			}else {
				$this->db->insert($this->table, $params);
			}
		}

		function update($params = array(), $username) {
			if(empty($params)) {
				$uname = $this->input->post('username');
				$berhenti = $this->input->post('resign');
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

				if($berhenti = 'resign') {$params['tgl_berhenti'] = date("Y-m-d H:i:s");}
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
				$this->db->where('username', $username);
				$this->db->update($this->table, $params);
			}else {
				$this->db->where('username', $username);
				$this->db->update($this->table, $params);
			}
		}

		function updateWhere($params = array(), $where = array()) {
			if($where != null) {
				$this->db->where($where);
				$this->db->update($this->table, $params);
			}
		}

		function destroy($username) {
			$this->db->where('username', $username);
			$this->db->delete($this->table);
		}
	}
?>