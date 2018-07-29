<?php
class insert_pic extends CI_Model{
function __construct() {
parent::__construct();
}
function pic_insert($data){
$this->db->insert('ads_images', $data);
}
}
?>