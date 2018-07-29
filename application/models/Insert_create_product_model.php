<?php
	class insert_create_product_model extends CI_Model{
		function __construct() {
			parent::__construct();
		}
	
	function create_product_insert($data){
			$this->db->insert('ads', $data);
			return $this->db->insert_id();
		}
	}
?>