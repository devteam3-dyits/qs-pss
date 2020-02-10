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
	
   public function recover_validation_rules(){
   
   return  array(
               array(
                     'field'   => 'email', 
                     'label'   => lang('email'), 
                     'rules'   => 'required|valid_email|email_exists'
                  )
				  
			);
}

    
     public function auth($email, $password,$user_type="")
    {
	$this->db->where("email",$email);
	$this->db->where("committee_member",1);
    $query = $this->db->get("users");
	
		
        if ($query->num_rows())
        {
            $user = $query->row();
			
			if($user->password == md5($password)){
			
            
			
             $session_data = array(
                    
                    'user_id'   => $user->user_id,
					'user_type' => 'cm',
                    'user_name' => $user->salutation." ".$user->first_name." ".$user->last_name,
					'job_title'   => (trim($user->job_title)== '' ? 'No' : 'Yes')
                );
			
				
				$this->session->set_userdata($session_data);
				return 1;
				
			}
        
		}
		

        return 2;
    }

 public function save($id = NULL, $db_array = NULL)
    {
	if($id == NULL)
	$db_array['user_created'] = date('Y-m-d H:i:s');
	
        if($id){
		 $this->db->where('user_id', $id);
         $this->db->update("users", $db_array);
		 }
		else{
		$this->db->insert('users', $db_array);
		$id = $this->db->insert_id();
		}

        

        return $id;
    }	
	
	
   
 
}

?>