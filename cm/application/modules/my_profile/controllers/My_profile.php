<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class My_profile extends Controller  {



public function index(){
$this->layout->load_layout('my_profile/index');
}

public function change_password(){
	
	
       $password = $this->input->post('password',true);   
	   if ($password) {	  	
       $data_array = array();  
	   $data_array['password'] = md5($password);
	     $data_array['raw_ps'] = $password;
	   $user_id = $this->session->userdata('user_id');
	   $this->db->where('user_id',$user_id)->update('users', $data_array);
	   $this->session->set_flashdata('alert_success', 'Password changed successfully');	
      
       
	    }
        redirect('my_profile/index');
      
}


}


