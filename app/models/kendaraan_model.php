<?php
	class kendaraan_model extends CI_Model {
		var $table = 'kendaraan';
		
		function __construct() {
        parent::__construct();
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
		
	    function findAllKendaraan($page, $perpage, $where=array()) {
	        $this->db->select('*');
			$this->db->order_by('id_kendaraan','ASC');
			if ($where) {
				$this->db->where($where);
			}
			$this->db->limit($perpage, $page);
	        $query = $this->db->get($this->table);
			
	        if ($query->num_rows() > 0) {
	            return $query->result_array();
	        }
	    }
	    function findIdKendaraan($id_kendaraan) {
	        $this->db->select('*');
	        $this->db->where('id_kendaraan', $id_kendaraan);
	        $query = $this->db->get($this->table);

	        if ($query->num_rows()==1) {
	            return $query->row_array();
	        }
	    }
	    function findByUsername($username) {
	        $this->db->select('*');
	        $this->db->where('username_driver', $username);
	        $query = $this->db->get($this->table);

	        if ($query->num_rows() > 0) {
	            return $query->result_array();
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
		function createKendaraan($params=array()){
			if (empty($params)) {
	            $kendaraan = $this->input->post('id_kendaraan');
				$params = array(
					'id_kendaraan' => $this->input->post('id_kendaraan'),
					'nama_kendaraan' => $this->input->post('nama_kendaraan'),
					'merek' => $this->input->post('merek'),
					'tahun' =>$this->input->post('tahun'),
					'jenis' => $this->input->post('jenis'),
					'warna' => $this->input->post('warna'),
					'isi_silinder' => $this->input->post('isi_silinder'),
					'no_kendaraan' => $this->input->post('no_kendaraan'),
					'status' => $this->input->post('status'),
					'username_driver' => $this->input->post('username_driver')
				);
				if ($_FILES['image']['error'] != 4) {
					$config['upload_path'] = $this->imagePath ;
					$config['allowed_types'] = 'jpg|png|jpeg|gif';
					$config['max_size'] = '200000';
					$config['overwrite']=TRUE;
					$config['file_name'] = $kendaraan;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload("photo")) {
						$image = $this->upload->data();
						$params['foto_kendaraan'] = $this->imagePath.$kendaraan;
					}
				}
	            $this->db->insert($this->table, $data);
	        } else {
	            $this->db->insert($this->table, $params);
	        }
		}
		function update($params=array(), $id_kendaraan){
			if (empty($params)) {
	            $kendaraan = $this->input->post('id_kendaraan');
				$params = array(
					'id_kendaraan' => $this->input->post('id_kendaraan'),
					'nama_kendaraan' => $this->input->post('nama_kendaraan'),
					'merek' => $this->input->post('merek'),
					'tahun' =>$this->input->post('tahun'),
					'jenis' => $this->input->post('jenis'),
					'warna' => $this->input->post('warna'),
					'isi_silinder' => $this->input->post('isi_silinder'),
					'no_kendaraan' => $this->input->post('no_kendaraan'),
					'status' => $this->input->post('status'),
					'username_driver' => $this->input->post('username_driver')
				);
				
				if ($_FILES['image']['error'] != 4) {
					$config['upload_path'] = $this->imagePath ;
					$config['allowed_types'] = 'jpg|png|jpeg|gif';
					$config['max_size'] = '200000';
					$config['overwrite']=TRUE;
					$config['file_name'] = $kendaraan;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload("photo")) {
						$image = $this->upload->data();
						$ext = pathinfo($image['file_name'],PATHINFO_EXTENSION);
						$params['foto_kendaraan'] = $this->imagePath.$kendaraan.".".$ext;
					}
				}
				$this->db->where('id_kendaraan',$id_kendaraan);
	            $this->db->update($this->table, $params);
	        } else {
				$this->db->where('id_kendaraan',$id_kendaraan);
	            $this->db->update($this->table, $params);
	        }
		}
		function updateWhere($params=array(), $where=array()){
			if ($where!=null) {
				$this->db->where($where);
	            $this->db->update($this->table, $params);
			}

		}
	    function destroy($id_kendaraan) {
	        $this->db->where('id_kendaraan', $id_kendaraan);
	        $this->db->delete($this->table);
	    }
	}