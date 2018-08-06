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
		/*function view_ads($ads_id){
			$this->db->select('ads.ads_id,ads.member_id,ads.ads_title,ads.ads_category,ads.ads_listing_type,ads.ads_price,ads.ads_village,ads.ads_description,ads.ads_status,ads.ads_village,ads.ads_address,ads.ads_cert, ads_category.ads_category_desc, ads_listing_type.ads_listing_type_desc, villages.name' );
			$this->db->join('ads_category', 'ads.ads_category = ads_category.ads_category INNER JOIN ads_listing_type on ads.ads_listing_type = ads_listing_type.ads_listing_type_id INNER JOIN villages on ads.ads_village = villages.id');
			$this->db->where('ads.ads_id', $ads_id);
			return $this->db->get('ads')->row();
		}*/
		
		function view_ads($ads_id){
			$this->db->select('ads.ads_id,ads.member_id,ads.ads_title,ads.ads_category,ads.ads_listing_type,ads.ads_price,ads.ads_village,ads.ads_description,ads.ads_status,ads.ads_village,ads.ads_address,ads.ads_cert, ads_category.ads_category_desc, ads_listing_type.ads_listing_type_desc, villages.name' );
			$this->db->from('ads');
			$this->db->join('ads_category', 'ads.ads_category = ads_category.ads_category','INNER');
			$this->db->join('ads_listing_type','ads.ads_listing_type = ads_listing_type.ads_listing_type_id','INNER');
			$this->db->join('villages','ads.ads_village = villages.id','INNER');
			$this->db->where('ads.ads_id', $ads_id);
			$q = $this->db->get();
 
			/* after we've made the queries from the database, we will store them inside a variable called $data, and return the variable to the controller */
			if($q->num_rows() > 0)
			{
				echo "one data";
				// we will store the results in the form of class methods by using $q->result()
				// if you want to store them as an array you can use $q->result_array()
				foreach ($q->result() as $row)
				{
					$data[] = $row;
				}
				return $data;
			}
		}
		
		function view_image($ads_id){
			$this->db->where('ads_id', $ads_id);
			return $this->db->get('ads_images')->row();
		}
	}
?>

