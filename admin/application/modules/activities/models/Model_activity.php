<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Model_activity extends CI_Model {

    public $table               = 'activities';
    public $primary_key         = 'activities.activity_id';
	
	public function __construct()
	{
		$this->load->database();
	}
		
    
   
	

    public function save($db_array = NULL)
    {	

	
       $this->db->insert($this->table, $db_array);
		$id =  $this->db->insert_id();
        
		

        return $id;
    }

    public function delete($id)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table);

        
    }
	



}

?>