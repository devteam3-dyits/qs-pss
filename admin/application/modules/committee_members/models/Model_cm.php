<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Model_cm extends CI_Model {

    public $table               = 'users';
    public $primary_key         = 'users.user_id';
	
	public function __construct()
	{
		$this->load->database();
	}

   public function validation_rules(){
   
   return  array(
              
               array(
                     'field'   => 'first_name', 
                     'label'   => lang('first_name'), 
                     'rules'   => 'required'
					 
                  ) 
             				  
				  
			);
   }
	
	

    public function save($id = NULL, $db_array = NULL)
    {	
	if($id == NULL){
	$db_array['committee_member'] = 1;
	$db_array['user_created'] = date('Y-m-d H:i:s');
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