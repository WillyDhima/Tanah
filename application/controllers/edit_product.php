<?php
class Create_product extends CI_Controller{

 function __construct(){
  parent::__construct();
 
	$this->load->database();
	$this->load->helper(array('url'));
	$this->load->library('datatables');
	$this->load->model('trans_model');
	$this->load->model('insert_create_product_model');
	$this->load->model('insert_pic');
	$this->load->model('sortapps');
 }

 function index(){
	   //$data['menu'] =
	 $data['header_admin']='content/header_admin';
	 $data['type']=$this->trans_model->getListingType();
	 $data['category']=$this->trans_model->category();
	 $data['district']=$this->trans_model->district();
	 $data['product'] = $this->SiswaModel->view_by($nis);
	 $this->load->view('frm/edit_product',$data);
 }
 
function update(){
		
		$data = array(
			'member_id' => $this->input->post('Member_id'),
			'ads_title' => $this->input->post('title'),
			'ads_category' => $this->input->post('ads_category'),
			'ads_listing_type' => $this->input->post('ads_type'),
			'ads_price' => $this->input->post('ads_price'),
			'ads_surface_area' => $this->input->post('ads_area'),
			'ads_building_area' => '',//$this->input->post(''),
			'ads_flor_count' => '',//$this->input->post(''),
			'ads_badroom_count' => '',//$this->input->post(''),
			'ads_bathroom_count' => '',//$this->input->post(''),
			'ads_cert' => $this->input->post('ads_certficate'),
			'ads_facilities' => $this->input->post('ads_lot_size'),
			'ads_address' => $this->input->post('ads_address'),
			'ads_village' => '',//$this->input->post(''),
			'ads_description' => '',//$this->input->post(''),
			'ads_status' => 'Active'//$this->input->post('')
		);		
		
		$this->edit_product_model->edit_product($data, $this->input->post('ads_id'));
		$login_data =$this->session->userdata("login");
		/*if (!is_dir('../gambar/'.$login_data)) {
			mkdir('../gambar/' . $login_data, 0777, TRUE);
			}
		$date = date('Y-m-d H:i:s');
		$date = str_replace( ':', '', $date);
		$date = str_replace( '-', '', $date);
		if (!is_dir('../gambar/'.$login_data.'/'.$date)) {
			mkdir('../gambar/' . $login_data.'/'.$date, 0777, TRUE);
			}*/
		//$id["Member"] = $this->sortapps->get_sort('ASC', 'ads_id', 'ads_id', 'ads', $login_data['id']);
		/*$id["Member"] = $this->sortapps->get_sort('DESC', 'ads_id', 'ads_id', 'ads', $login_data['id']);
		if (!empty($id['Member'])){ 
			foreach ($id['Member'] as $ids) {
				$id_member = $ids->ads_id;
			}
		};*/
		 $config = array(
		'upload_path' => APPPATH."../gambar/", //APPPATH. '../assets/uploads/';
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'overwrite' => TRUE,
		'max_size' => "2048"//, // Can be set to particular file size , here it is 2 MB(2048 Kb)
		//'max_height' => "768",
		//'max_width' => "1024"
	 );
	 $this->load->library('upload', $config);
		//$this->upload->do_upload();
		if ( !$this->upload->do_upload('img01')){
			//$error = array('error' => $this->upload->display_errors());
			//$this->load->view('upload_form', $error);
		}Else{
			$upload_data = $this->upload->data();
			$filename = $upload_data['file_name'];
			$data2 = array(
					'ads_id' => $id_member,
					'ads_image_name' => $filename,
					'sort_order' => '1'
				);
			$this->insert_pic->pic_insert($data2);
		};
		if ( !$this->upload->do_upload('img02')){
			//$error = array('error' => $this->upload->display_errors());
			//$this->load->view('upload_form', $error);
		}Else{
			$upload_data = $this->upload->data();
			$filename = $upload_data['file_name'];
			$data2 = array(
					'ads_id' => $id_member,
					'ads_image_name' => $filename,
					'sort_order' => '2'
				);
			$this->insert_pic->pic_insert($data2);
		};
		if ( !$this->upload->do_upload('img03')){
			//$error = array('error' => $this->upload->display_errors());
			//$this->load->view('upload_form', $error);
		}Else{
			$upload_data = $this->upload->data();
			$filename = $upload_data['file_name'];
			$data2 = array(
					'ads_id' => $id_member,
					'ads_image_name' => $filename,
					'sort_order' => '3'
				);
			$this->insert_pic->pic_insert($data2);
		};
		if ( !$this->upload->do_upload('img04')){
			//$error = array('error' => $this->upload->display_errors());
			//$this->load->view('upload_form', $error);
		}Else{
			$upload_data = $this->upload->data();
			$filename = $upload_data['file_name'];
			$data2 = array(
					'ads_id' => $id_member,
					'ads_image_name' => $filename,
					'sort_order' => '4'
				);
			$this->insert_pic->pic_insert($data2);
		};		

 }
 
/* function do_upload(){
	 $config = array(
		'upload_path' => "./gambar/",
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		'max_height' => "768",
		'max_width' => "1024"
	 );
	 $this->load->library('upload', $config);
 }*/
 /* function ambil_data(){
		
		$modul=$this->input->post('modul');
		$id=$this->input->post('id');
		
		if($modul=="kabupaten"){	
		echo $this->model_select->kabupaten($id);
		}
		else if($modul=="kecamatan"){
		echo $this->model_select->kecamatan($id);

		}
		else if($modul=="kelurahan"){
		echo $this->model_select->kelurahan($id);
		}
	} */
	
}
?>