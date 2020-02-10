<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Model_user extends CI_Model {

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
                     'label'   => 'First Name', 
                     'rules'   => 'required'
                  ),
				  
				   array(
                     'field'   => 'last_name', 
                     'label'   => 'Last Name', 
                     'rules'   => 'required'
                  )
			  
				  
               				  
				  
			);


   
   }
   
	

    public function save($db_array = NULL)
    {	
	
	$id = $this->session->userdata('user_id');
	
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