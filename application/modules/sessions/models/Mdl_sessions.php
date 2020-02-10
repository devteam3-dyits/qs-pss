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
			
			
			
     public function register_validation_rules(){
   
   return  array(
              
				  array(
                     'field'   => 'first_name', 
                     'label'   => lang('firstname'), 
                     'rules'   => 'required'
                  ),
				  
				   array(
                     'field'   => 'last_name', 
                     'label'   => lang('lastname'), 
                     'rules'   => 'required'
                  )
			  
				  
               				  
				  
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

 public function security_validation_rules(){
   
   return  array(
               
				  
				  array(
                     'field'   => 'sec_answer', 
                     'label'   => lang('sec_answer'), 
                     'rules'   => 'required|check_answer'
                  )
				  
			);
}



public function reset_validation_rules(){
   
   return  array(
              
			    array(
                     'field'   => 'password', 
                     'label'   => lang('password'),
					 'rules'   => 'trim|matches[passwordv]|required|is_password_strong'
                  ),
                array(
                     'field'   => 'passwordv', 
                     'label'   => lang('verify_password'), 
                     'rules'   => 'trim|required'
                  )				  
				  
			);		


   
   }

   
    
     public function auth($email, $password,$user_type="")
    {
	$this->db->where("email",$email);
	$this->db->where("proposer",1);
    $query = $this->db->get("users");
	
		
        if ($query->num_rows())
        {
            $user = $query->row();
			
			if($user->password == md5($password)){
			
            if($user->verified == 1){ 
			if($user->salutation == 'Other')$salutation = $user->custom_salutation;
			else $salutation = $user->salutation;
             $session_data = array(
                    
                    'user_id'   => $user->user_id,
					'profile_img'   => $user->profile_img,
					'user_type' => 'proposer',
                    'user_name' => $salutation." ".$user->first_name." ".$user->last_name,
					'job_title'   => (trim($user->job_title)== '' ? 'No' : 'Yes')
                );
			
				
				$this->session->set_userdata($session_data);
				return 1;
				}else return 3;
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
	
	
 public function sendVerificatinEmail($name,$email,$verificationText){ 
 
  $this->load->helper('email');
  $data['verificationText'] = $verificationText;
  $data['name'] = $name;
  $data['guid_url'] = 'http://www.qsglobalevents.com/pss/files/PSS_User_Guide.pdf';
  $message = $this->load->view('verify_email',$data,true); 
  sendEmail($email,"QS Proposal Submission System",$message);  
  
  
   }
   
   
 
 public function verifyEmailAddress($verificationcode){  
  $sql = "update users set verified='1'  WHERE verifi_code=?";
  $this->db->query($sql, array($verificationcode));
  $affrows = $this->db->affected_rows(); 
  
  $this->db->where("verifi_code",$verificationcode);
  $user = $this->db->get("users")->row();
 
  if($user){
  if($user->verified == 1 && $affrows == 0)return 1;
  elseif($user->verified == 1 && $affrows == 1)return 2;
  elseif($affrows == 0)return 3;
  
  }
  
  return 3;
  
  
  
  
  
 }

public function generate_verification_code(){
	
	return  md5(uniqid(rand(), true));
	
	}
 
}

?>