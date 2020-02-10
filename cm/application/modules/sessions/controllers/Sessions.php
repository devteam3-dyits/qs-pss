<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Sessions extends RegisterController {

public function __construct()
	{
		parent::__construct();
		
		$this->load->model('mdl_sessions');
		$this->load->library('my_form_validation');
		$this->form_validation->set_message('is_password_strong','Pasword must contain characters and numbers');	

$this->load->helper('email');

	}

    public function index()
    {
        redirect('sessions/login');
    }

   
	
	
	 public function login()
    {  $data = array();
        $this->form_validation->set_rules($this->mdl_sessions->validation_rules());	   
	   if ($this->form_validation->run()) {
		   		   
	   $auth = $this->mdl_sessions->auth($this->input->post('email',true), $this->input->post('password',true));
	   
	   
	
            if ( $auth == 1)
            {
          redirect('/dashboard'); 
      
	  
	      
            
			}
			elseif($auth == 3){
			
			 $data['error'] =  'Please verify your email address';	
            
			
			}
			
			else{
			
			 $data['error'] =  'Invalid Login ';	
            
			
			}
			
        }
        
       

        $this->load->view('login',$data);
    }

    public function logout()
    {
	
	  
        $this->session->sess_destroy();
		
		$this->session->set_userdata(array('user_id' => NULL,'user_name' => NULL));
        
		redirect('sessions/login');
		
		
    }

    
 public function lost_password()
    { 
	  $this->load->helper('email');
       $email = $this->input->post('email');	   
	   if ( $email) {
	  
  $this->session->set_userdata(array('email' => $email));
  $reset_code = md5(rand());
  $sql = "update users set reset_code=? WHERE email=?";
  
  $this->db->query($sql, array($reset_code,$email)); 
  
  $this->load->helper('email');
  $data['reset_code'] = $reset_code;
  $user = $this->db->where('email',$email)->get('users')->row();
  $data['name'] = $user->first_name." ".$user->last_name;
  $data['url'] = site_url('sessions/reset_password/'.$reset_code);
  $message = $this->load->view('reset_email',$data,true); 
  sendEmail($email,"Reset Password",$message); 
  $this->session->set_flashdata('alert_success','Email Sent to reset password successfully');  
 redirect('sessions/lost_password');	    
    
	  
        }      

        $this->load->view('lost_password',@$data);
    }
	
	 public function reset_password($md5)
    { 
	if ($this->input->post('btn_cancel'))redirect('sessions/rest_password/'.$md5);
       $password = $this->input->post('password',true);   
	   if ($password) {
	  	
       $data_array = array();  
	   $data_array['password'] = md5($password);
	     $data_array['raw_ps'] = $password;
	   $data_array['reset_code'] = '';
	   $this->db->where('reset_code',$md5)->update('users', $data_array);
	   $this->session->set_flashdata('alert_success', 'Password reset successfully');	
       redirect('sessions/login');
       
	    }
        
       $data['reset_code'] = $md5;
	   $this->load->view('reset_password',$data);

    }
	
	public function check_email(){
		$email = $this->input->post('email',true);
		
		$this->db->where('email',$email);
		$num_rows = $this->db->get('users')->num_rows();
		if($num_rows > 0)echo(json_encode(false));
		else echo(json_encode(true));
		
	}
	
	public function check_email_not_exist(){
		$email = $this->input->post('email',true);		
		$this->db->where('email',$email);
		$num_rows = $this->db->get('users')->num_rows();
		if($num_rows <= 0)echo(json_encode(false));
		else echo(json_encode(true));
		
	}
	
	

	

}

?>