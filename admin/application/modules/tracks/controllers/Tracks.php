<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Tracks extends Controller  {
public function __construct(){
	parent::__construct();
	$user_role = $this->session->userdata('user_role');
	if($user_role > 1){
	$this->session->set_flashdata('alert_error','Access denied');
       redirect('dashboard/index');
	}  
}

public function index(){

$this->load->model('settings/Model_setting');
$track_count = $this->input->post('track_count',true);
	   if($track_count != "") {
	   $data_array = array();  
	   $data_array['track_count'] = $track_count;
	   $this->Model_setting->save($data_array);
	   $this->session->set_flashdata('alert_success','Tracks updated successfully');
       redirect('tracks/index');
	   }        
	   $setting = $this->db->get('settings')->row();
       $data['setting'] = $setting;
          	   
	   $this->layout->load_layout('tracks/index',$data);
}


}


