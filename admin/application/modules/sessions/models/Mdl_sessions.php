<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Mdl_Sessions extends CI_Model {
    public function __construct()
	{
		$this->load->database();
	}
	
	public function validation_rules(){
   
   return  array(
               array(
                     'field'   => 'email', 
                     'label'   => lang('email'), 
                     'rules'   => 'required'
                  ),
			    array(
                     'field'   => 'password', 
                     'label'   => lang('password'), 
                     'rules'   => 'required'
                  ),
				  
			);
}
	
     public function auth($email, $password,$user_type="")
    {
	$this->db->where("email",$email);
    $query = $this->db->get("admins");
	
		
        if ($query->num_rows())
        {
            $user = $query->row();
			
			if($user->password == md5($password)){
			
            $session_data = array(
                    
                    'user_id'   => $user->admin_id,
					'user_type' => 'Admin',
                    'user_name' => 'Admin',
                    'user_email' => $user->admin_email,
                    'user_role'  => $user->admin_role
					
                );
			
				
				$this->session->set_userdata($session_data);
				return 1;
			}
        
		}
		

        return 2;
    }

}

?>