<?php
class Users_property extends CI_Model
 
{
/* we will use the function getUsers */
  function get_property($where_arr)
  {
    /* all the queries relating to the data we want to retrieve will go in here. */
 
    $this->db->select('ads.ads_id, ads.member_id, ads.ads_title, ads.ads_category, ads.ads_listing_type, ads.ads_price, ads.ads_surface_area, ads.ads_building_area, ads.ads_flor_count, ads.ads_badroom_count, ads.ads_bathroom_count, ads.ads_cert, ads.ads_facilities, ads.ads_address, ads.ads_village, ads.ads_description, ads.ads_status, ads.created_date, ads.updated_date, ads.viewed, ads_images.ads_image_name');
	$this->db->from('ads');
	$this->db->join('ads_images', 'ads.ads_id = ads_images.ads_id and ads_images.ads_image_id IN( SELECT MAX(c.ads_image_id) from ads_images c where ads.ads_id = c.ads_id )', 'LEFT');
	$this->db->where('ads.member_id', $where_arr);    
	$q = $this->db->get();
 
    /* after we've made the queries from the database, we will store them inside a variable called $data, and return the variable to the controller */
    if($q->num_rows() > 0)
    {
      // we will store the results in the form of class methods by using $q->result()
      // if you want to store them as an array you can use $q->result_array()
      foreach ($q->result() as $row)
      {
        $data[] = $row;
      }
      return $data;
    }
  }
}