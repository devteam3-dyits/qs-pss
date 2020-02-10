<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Settings extends Controller  {


public function index(){

$this->load->model('settings/Model_setting');
$turn_off_track = $this->input->post('turn_off_track',true);
	   if($turn_off_track != "") {
	   $data_array = array();  
	   $data_array['turn_off_track'] = $turn_off_track;
	   $this->Model_setting->save($data_array);
	   $this->session->set_flashdata('alert_success','Setting updated successfully');
       redirect('settings/index');
	   }        
	   $setting = $this->db->get('settings')->row();
       $data['setting'] = $setting;
          	   
	   $this->layout->load_layout('settings/index',$data);
}


}


