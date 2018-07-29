<?php
class sortapps extends CI_Model
 
{
/* we will use the function getUsers */
  function get_sort($order_by, $sort_by, $field, $db, $member_id)
  {
	  
	$this->db->where('member_id', $member_id);
    $this->db->order_by($sort_by, $order_by);
    $this->db->select($field);
	$this->db->limit(1);
    $q = $this->db->get($db);
	//$this->db->where('member_id', $member_id);
    //$this->db->select('ads_id');
    //$q = $this->db->get('ads');
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