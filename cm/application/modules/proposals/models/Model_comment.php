<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Model_comment extends CI_Model {

    public $table               = 'comments';
    public $primary_key         = 'comments.comment_id';
	
	public function __construct()
	{
		$this->load->database();
	}

    public function save($id = NULL, $db_array = NULL)
    {	
	$edit = $id;
	$db_array['cm_id'] = $this->session->userdata('user_id');
	if($id == NULL)
	$db_array['comment_created'] = date('Y-m-d H:i:s');
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