<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Feedback extends Controller  {

public function index(){

$this->layout->load_layout('feedback/index');	
}



public function send(){	
if($this->input->post('subject') != ''){
$user_id= $this->session->userdata('user_id');
  $this->load->helper('email');
 $data = array();
 $data['user'] = $this->db->where('user_id',$user_id)->get('users')->row();
 $data['subject'] = $this->input->post('subject');
 $data['message'] = $this->input->post('message');
  $to = $this->config->item('feedback_email');
 $data['salutation'] = $data['user']->salutation;
	   if($data['salutation'] == 'Other') $data['salutation']  = $data['user']->custom_salutation; 

 $data['name'] = $data['salutation']." ".$data['user']->first_name." ".$data['user']->last_name;
 $message = $this->load->view('feedback/fb_email',$data,true); 

  sendEmail($to,"Feedback From ".$data['name'],$message);  
   $this->session->set_flashdata('alert_success','Feedback sent successfully');
 redirect('feedback/index');
}
	   

}
}


