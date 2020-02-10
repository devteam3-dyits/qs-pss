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

  

public function delete($id)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table);

        
    }	
		public function sendStatusEmail($id,$status){ 
 
  $this->load->helper('email');
 $data['proposal'] = $this->db->where('proposal_id',$id)->get('proposals')->row(); 
 $user_id = $data['proposal']->proposer_id;
 $data['user'] = $this->db->where('user_id',$user_id)->get('users')->row();
 $data['status'] = $status;
 $data['event'] = $this->db->where('event_id',$data['proposal']->event_id)->get('events')->row();
 $data['salutation'] = $data['user']->salutation;
	   if($data['salutation'] == 'Other') $data['salutation']  = $data['user']->custom_salutation; 
 
  if($status == 1)
  $subject = "QS - Proposal Accepted";
 elseif($status == 2)$subject = "QS - Proposal Provisionally Accepted";
 elseif($status == 3)$subject = "QS - Proposal Rejected";
 if($status == 3) $message = $this->load->view('proposals/reject_email',$data,true);
 else if($status == 2) $message = $this->load->view('proposals/pa_email',$data,true);
  else $message = $this->load->view('proposals/status_email',$data,true);
  sendEmail($data['user']->email,$subject,$message);  
  
  
   
   }

	
	
	
	


}

?>