<?php
	class order_model extends CI_Model {
		var $table = 'order';

		function __construct() {
        parent::__construct();
	    }
		
	    function findAll() {
	        $this->db->select('*');
	        $this->db->join('service','service.id_service=order.id_service');
	        $this->db->join('kendaraan','kendaraan.id_kendaraan=order.id_kendaraan');
	        $this->db->join('driver','driver.username=order.username_driver');
	        $query = $this->db->get($this->table);

	        if ($query->num_rows() > 0) {
	            return $query->result_array();
	        }
	    }
	    function countAll() {
	        $query = $this->db->get($this->table);
	        return $query->num_rows();
	    }
		
	    function findAllOrder($page, $perpage, $where=array()) {
	        $this->db->select('*');
			$this->db->order_by('id_order','ASC');
			if ($where) {
				$this->db->where($where);
			}
			$this->db->limit($perpage, $page);
	        $query = $this->db->get($this->table);
			
	        if ($query->num_rows() > 0) {
	            return $query->result_array();
	        }
	    }
	    function findIdOrder($id_order) {
	        $this->db->select('*');
	        $this->db->where('id_order', $id_order);
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
		function updateWhere($params=array(), $where=array()){
			if ($where!=null) {
				$this->db->where($where);
	            $this->db->update($this->table, $params);
			}

		}
	    function destroy($id_order) {
	        $this->db->where('id_order', $id_order);
	        $this->db->delete($this->table);
	    }
	}