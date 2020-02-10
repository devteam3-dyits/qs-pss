<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class My_profile extends Controller  {


public function index(){
$user_id = $this->session->userdata('user_id');
$this->load->model('my_profile/Model_user');
$this->form_validation->set_rules($this->Model_user->validation_rules());	   
	   if ($this->form_validation->run()) {
	   $data_array = array();  
	   $data_array['first_name'] = $this->input->post('first_name',true);
	   $data_array['last_name'] = $this->input->post('last_name',true);
	   $password = $this->input->post('new_password',true);;
	   if(trim($password) != "")
	   $data_array['password'] = md5($password);
	   $data_array['raw_ps'] = $password;
	   $this->Model_user->save($data_array);
	   $this->session->set_flashdata('alert_success',lang('record_edit_success'));
       redirect('my_profile/index');

	   }

       $this->db->where('user_id',$user_id);
       $data['user'] = $this->db->get('users')->row();	   
	   $this->layout->load_layout('my_profile/index',$data);
}


public function edit(){
$user_id = $this->session->userdata('user_id');
$this->load->model('my_profile/Model_user');
$this->form_validation->set_rules($this->Model_user->validation_rules());	   
	   if ($this->form_validation->run()) {
	   $result = false;
	   if($this->session->userdata('job_title') == 'No' ){
	   $this->load->helper('upload');
	   $upload_path = $this->config->item('profile_image_path');
	   $result = do_upload('profile_img',$upload_path);	  
       }	   
	   if($result == false){
	   $this->db->where('user_id',$user_id);
	    if($this->session->userdata('job_title') == 'No' ){
       $profile_img = $this->db->get('users')->row()->profile_img;
       if($profile_img != '')	   
	   unlink($upload_path.$profile_img);
	   $upload_data = $this->upload->data() ;
		}
	   $data_array = array();  
	   $data_array['salutation'] = $this->input->post('salutation');
	   $data_array['first_name'] = $this->input->post('first_name',true);
	   $data_array['last_name'] = $this->input->post('last_name',true);
	   $data_array['twitter'] = $this->input->post('twitter',true);
	   $data_array['linkedin'] = $this->input->post('linkedin',true);
	   $data_array['gender'] = $this->input->post('gender',true);
	   $data_array['job_title'] = $this->input->post('job_title',true);
	   $data_array['university'] = $this->input->post('university',true);
	   $data_array['university_accronym'] = $this->input->post('university_accronym',true);
	   $data_array['department'] = $this->input->post('department',true);
	   $data_array['mail'] = $this->input->post('mail',true);
	   $data_array['country'] = $this->input->post('country',true);
	   $data_array['tele'] = $this->input->post('tele',true);
	  // $data_array['fax'] = $this->input->post('fax',true);
	   $data_array['fax'] = '';
	   $data_array['summary'] = $this->input->post('summary',true);
	   if($data_array['salutation'] == 'Other'){
	   $salutation = $this->input->post('custom_salutation',true);;
	   $data_array['custom_salutation'] = $this->input->post('custom_salutation',true);
	   }
       else{
	   $data_array['custom_salutation'] = '';
	   $salutation = $data_array['salutation'];
	   }
	   if($this->session->userdata('job_title') == 'No' )
	   $data_array['profile_img'] = $upload_data['file_name'];
	   $this->Model_user->save($data_array);
	   
	   $user_name = $salutation." ".$data_array['first_name']." ".$data_array['last_name'];
	   if($this->session->userdata('job_title') == 'No' )
	   $this->session->set_userdata(array('user_name' => $user_name,'job_title' => 'Yes','profile_img' => $data_array['profile_img']  ));
	   else $this->session->set_userdata(array('user_name' => $user_name,'job_title' => 'Yes' ));
	   
	   
	   $this->session->set_flashdata('alert_success','Profile updated successfully');
       redirect('my_profile/index');
	         }
			 else  $this->session->set_flashdata('alert_error',$result); 

	   }

       $this->db->where('user_id',$user_id);
       $data['user'] = $this->db->get('users')->row();	   
	   $this->layout->load_layout('my_profile/edit',$data);
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


public function upload_profile_img(){
$user_id = $this->session->userdata('user_id');
$this->load->model('my_profile/Model_user');
$this->load->helper('upload');
	   $upload_path = $this->config->item('profile_image_path');
	   $result = do_upload('profile_img',$upload_path);	   
	   if($result == false){
	   $this->db->where('user_id',$user_id);
       $profile_img = $this->db->get('users')->row()->profile_img;
       if($profile_img != '')	    
	   unlink($upload_path.$profile_img);
	   $upload_data = $this->upload->data() ;
	   $data_array['profile_img'] = $upload_data['file_name'];
	   $this->Model_user->save($data_array);
	   $this->session->set_userdata(array('profile_img' => $data_array['profile_img']));
	  
	   $this->session->set_flashdata('alert_success','Profile Picture Changed successfully');
       
	         }else{
	             
	          $this->session->set_flashdata('alert_error',$result);     
	             
	         }
			 
redirect('my_profile/index');
	 

       
}


}


