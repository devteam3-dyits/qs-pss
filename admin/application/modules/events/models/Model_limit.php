<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Model_limit extends CI_Model {

    public $table               = 'track_limits';
    public $primary_key         = 'track_limits.track_limit_id';
	
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

    public function delete($event_id,$track)
    {
        $this->db->where('event_id', $event_id);
		$this->db->where('track', $track);
        $this->db->delete($this->table);

        
    }
	
	
	 public function delete_unwanted($event_id,$track_count)
    {
        $this->db->where('event_id', $event_id);
		$this->db->where('track > ', $track_count);
        $this->db->delete($this->table);

        
    }
	
	 public function delete_previous($event_id)
    {
        $this->db->where('event_id', $event_id);
		$this->db->delete($this->table);

        
    }
	



}

?>