<?php
class Users_property extends CI_Model
 
{
/* we will use the function getUsers */
  function get_property($where_arr)
  {
    /* all the queries relating to the data we want to retrieve will go in here. */
 
    $this->db->where($where_arr);
    $this->db->select('ads_id, member_id, ads_title, ads_category, ads_listing_type, ads_price, ads_surface_area, ads_building_area, ads_flor_count, ads_badroom_count, ads_bathroom_count, ads_cert, ads_facilities, ads_address, ads_village, ads_description, ads_status, created_date, updated_date, viewed');
    $q = $this->db->get('ads');
 
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