<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Model_proposal extends CI_Model {

    public $table               = 'proposals';
    public $primary_key         = 'proposals.proposal_id';
	
	public function __construct()
	{
		$this->load->database();
	}

   public function validation_rules(){
   
   return  array(
               array(
                     'field'   => 'event_id', 
                     'label'   => lang('events'), 
                     'rules'   => 'required'
					 
                  ) ,
               array(
                     'field'   => 'proposal_title', 
                     'label'   => lang('proposal_title'), 
                     'rules'   => 'required'
					 
                  ) ,
              array(
                     'field'   => 'session_format', 
                     'label'   => lang('session_format'), 
                     'rules'   => 'required'
					 
                  ) ,
              array(
                     'field'   => 'session_track', 
                     'label'   => lang('session_track'), 
                     'rules'   => 'required'
					 
                  ) ,
				  array(
                     'field'   => 'presentation', 
                     'label'   => lang('presentation'), 
                     'rules'   => 'required'
					 
                  ) ,
				  array(
                     'field'   => 'remark', 
                     'label'   => lang('remark'), 
                     'rules'   => 'required'
					 
                  ) 
             				  
				  
			);
   }
	
	
	
	

    public function save($id = NULL, $db_array = NULL)
    {	
	$edit = $id;
	
	
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

    public function sendMail($id){
  $this->load->helper('email');
$this->db->join('users','users.user_id=proposals.proposer_id');
$this->db->select('proposals.*,users.first_name,users.last_name,users.email');
$proposal = $this->db->where('proposal_id',$id)->get('proposals')->row();
  $data['status'] = $proposal->status;
  $data['name'] = $proposal->first_name.' '.$proposal->last_name;
  $message = $this->load->view('status_email',$data,true); 
  sendEmail($proposal->email,"Proposal status changed",$message);  
		
	}
	

public function delete($id)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table);

        
    }
	


}

?>