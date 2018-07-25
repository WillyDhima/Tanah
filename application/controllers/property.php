<?php
if(!defined("BASEPATH")) exit("No direct script access allowed");
class Property extends CI_Controller
{
  public function index()
  {
	$login_data =$this->session->userdata("login");
    $this->load->model("users_property"); 
    $data["member"]=$this->users_property->get_property('member_id', $login_data['id']);

    $this->load->view("v_property",$data);
  }
}