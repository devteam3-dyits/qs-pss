<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Model_event extends CI_Model {

    public $table               = 'events';
    public $primary_key         = 'events.event_id';
	
	public function __construct()
	{
		$this->load->database();
	}

   public function validation_rules(){
   
   return  array(
              
               array(
                     'field'   => 'event_name', 
                     'label'   => lang('event_name'), 
                     'rules'   => 'required'
					 
                  ) 
             				  
				  
			);
   }
   
   public function assign_validation_rules(){
   
   return  array(
              
               array(
                     'field'   => 'cm_id', 
                     'label'   => lang('committee_member'), 
                     'rules'   => 'required'
					 
                  ) 
             				  
				  
			);
   }
	
	
	
	

    public function save($id = NULL, $db_array = NULL)
    {	
	if($id == NULL){
	$db_array['admin_id'] = $this->session->userdata('user_id');	
	$db_array['event_created'] = date('Y-m-d H:i:s');
	}
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
	



}

?>