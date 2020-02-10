<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Model_cop extends CI_Model {

    public $table               = 'co_presenters';
    public $primary_key         = 'co_presenters.co_present_id';
	
	public function __construct()
	{
		$this->load->database();
	}

	
	

    public function save($id = NULL, $db_array = NULL)
    {	
	$edit = $id;
	$db_array['user_id'] = $this->session->userdata('user_id');
	if($id == NULL)
	$db_array['created_at'] = date('Y-m-d H:i:s');
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
	
	
   
	
	public function sendConfirmEmail($data){ 
 $user_id= $this->session->userdata('user_id');
  $this->load->helper('email');
 $data['user'] = $this->db->where('user_id',$user_id)->get('users')->row();
 $data['event'] = $this->db->where('event_id',$data['event_id'])->get('events')->row();
 $data['salutation'] = $data['user']->salutation;
	   if($data['salutation'] == 'Other') $data['salutation']  = $data['user']->custom_salutation; 
  $message = $this->load->view('proposals/confim_email',$data,true); 
  sendEmail($data['user']->email,"QS - New Proposal Received",$message);  
  
  
   }
   
   
	



}

?>