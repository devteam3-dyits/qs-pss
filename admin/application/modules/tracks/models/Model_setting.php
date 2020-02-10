<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Model_setting extends CI_Model {

    public $table               = 'settings';
    public $primary_key         = 'settings.setting_id';
	
	public function __construct()
	{
		$this->load->database();
	}

    public function save($db_array = NULL)
    {	
	$this->db->where($this->primary_key, 1);
         $this->db->update($this->table, $db_array);
    }

    public function delete($id)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table);

        
    }
	



}

?>