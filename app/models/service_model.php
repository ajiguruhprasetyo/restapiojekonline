<?php
	class service_model extends CI_Model {
		var $table = 'service';

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
		
	    function findAllService($page, $perpage, $where=array()) {
	        $this->db->select('*');
			$this->db->order_by('id_service','ASC');
			if ($where) {
				$this->db->where($where);
			}
			$this->db->limit($perpage, $page);
	        $query = $this->db->get($this->table);
			
	        if ($query->num_rows() > 0) {
	            return $query->result_array();
	        }
	    }
	    function findIdService($id_service) {
	        $this->db->select('*');
	        $this->db->where('id_service', $id_service);
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
		function createService($params=array()){
			if (empty($params)) {
	            $service = $this->input->post('id_service');
				$params = array(
					'id_service' => $this->input->post('id_service'),
					'nama_service' => $this->input->post('nama_service'),
					'harga' => $this->input->post('harga'),
					'fee' =>$this->input->post('fee')
				);
	            $this->db->insert($this->table, $data);
	        } else {
	            $this->db->insert($this->table, $params);
	        }
		}
		function update($params=array(), $id_service){
			if (empty($params)) {
	            $service = $this->input->post('id_service');
				$params = array(
					'id_service' => $this->input->post('id_service'),
					'nama_service' => $this->input->post('nama_service'),
					'harga' => $this->input->post('harga'),
					'fee' =>$this->input->post('fee')
				);
				$this->db->where('id_service',$id_service);
	            $this->db->update($this->table, $params);
	        } else {
				$this->db->where('id_service',$id_service);
	            $this->db->update($this->table, $params);
	        }
		}
		function updateWhere($params=array(), $where=array()){
			if ($where!=null) {
				$this->db->where($where);
	            $this->db->update($this->table, $params);
			}

		}
	    function destroy($id_service) {
	        $this->db->where('id_service', $id_service);
	        $this->db->delete($this->table);
	    }
	}