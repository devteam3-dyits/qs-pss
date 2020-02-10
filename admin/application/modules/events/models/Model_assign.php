<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Model_assign extends CI_Model {

    public $table               = 'cm_assignments';
    public $primary_key         = 'cm_assignments.cm_assign_id';
	
	public function __construct()
	{
		$this->load->database();
	}

    public function save($id = NULL, $db_array = NULL)
    {	
	if($id){
		 $this->db->where($this->primary_key, $id);
         $this->db->update($this->table, $db_array);
		 }
		else{
		$this->db->insert($this->table, $db_array);
		$id =  $this->db->insert_id();
		}

        
		

        return $id;
    }

    public function delete($id)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table);

        
    }
	
	public function sendAssignEmail($data){ 
 
  $this->load->helper('email');
 
 $data['user'] = $this->db->where('user_id',$data['cm_id'])->get('users')->row();
 $data['event'] = $this->db->where('event_id',$data['event_id'])->get('events')->row();
 $data['salutation'] = $data['user']->salutation;
  $data['guid'] = 'http://www.qsglobalevents.com/pss/files/PSS_CM_User_Guide.pdf';
 if($data['salutation'] == 'Other') $data['salutation']  = $data['user']->custom_salutation;  
  $subject = "QS - You are added as a committee member for ".$data['event']->event_name;
 $message = $this->load->view('events/assign_email',$data,true);
  sendEmail($data['user']->email,$subject,$message);  
  
  
   
   }
	



}

?>