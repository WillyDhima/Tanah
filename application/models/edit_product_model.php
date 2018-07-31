<?php
	class edit_product_model extends CI_Model{
		function __construct() {
			parent::__construct();
		}
	
		function edit_product($data, $ads_id){		
			$this->db->where('ads_id', $ads_id);
			$this->db->update('ads', $data);
			//$this->db->insert('ads', $data);
			//return $this->db->insert_id();
		}
		
		function edit_pic($data, $image_id){
			$this->db->where('ads_image_id', $image_id);
			$this->db->update('ads_images', $data);
		}
		function view_ads($ads_id){
			$this->db->where('ads_id', $ads_id);
			return $this->db->get('ads')->row();
		}
		
		function view_image($ads_id){
			$this->db->where('ads_id', $ads_id);
			return $this->db->get('ads_image')->row();
		}
	}
?>