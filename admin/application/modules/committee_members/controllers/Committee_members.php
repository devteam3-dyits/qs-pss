<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Committee_members extends Controller  {
public function __construct(){
	parent::__construct();
	
}

public function index(){
$this->db->where('proposer',1);
$this->db->where('committee_member !=',1);
$data['proposers'] = $this->db->order_by('first_name')->get('users')->result();
$this->db->where('committee_member',1);
$data['committee_members'] = $this->db->get('users')->result();
$this->layout->load_layout('committee_members/index',$data);	
}



public function add(){	
$this->load->model('committee_members/Model_cm');
$this->form_validation->set_rules($this->Model_cm->validation_rules());	   
	   if ($this->form_validation->run()) {
	   $data_array = array();	   
	   $data_array['first_name'] = $this->input->post('first_name',true);
	   $data_array['last_name'] = $this->input->post('last_name',true);
	   $data_array['gender'] = $this->input->post('gender',true);
	   $data_array['email'] = $this->input->post('email',true);
	   $data_array['country'] = $this->input->post('country',true);
	   $data_array['tele'] = $this->input->post('tele',true);
	  // $data_array['fax'] = $this->input->post('fax',true);
	   $data_array['fax'] = '';
	   $data_array['password'] = md5($this->input->post('password',true));
       $data_array['raw_ps'] = $this->input->post('password',true);
	   
	   $this->Model_cm->save(NULL, $data_array);
	   
	   $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Added CM';
	   $this->Model_activity->save($data_array);
	   
	   $this->session->set_flashdata('alert_success',lang('committee_member_add_success'));
	   redirect('committee_members/index');

	   }
	   
$this->layout->load_layout('committee_members/add');
}


public function edit($id){

$this->load->model('committee_members/Model_cm');
$this->form_validation->set_rules($this->Model_cm->validation_rules());	   
	   if ($this->form_validation->run()) {
	   $data_array = array();  
	   $data_array['first_name'] = $this->input->post('first_name',true);
	   $data_array['last_name'] = $this->input->post('last_name',true);
	   $data_array['gender'] = $this->input->post('gender',true);
	   $data_array['country'] = $this->input->post('country',true);
	   $data_array['tele'] = $this->input->post('tele',true);
      // $data_array['fax'] = $this->input->post('fax',true);
	   $data_array['fax'] = '';   
	   if($this->input->post('password',true) != "")
	   $data_array['password'] = md5($this->input->post('password',true));
        $data_array['raw_ps']  = $this->input->post('password',true);
	   $this->Model_cm->save($id, $data_array);
	   
	    $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Edited CM';
	  $this->Model_activity->save($data_array);
	   
	   $this->session->set_flashdata('alert_success',lang('committee_member_edit_success'));
       redirect('committee_members/index');
	   } 
       $this->db->where('user_id',$id);       
	   $committee_member = $this->db->where('committee_member',1)->get('users')->row();
       $data['cm'] = $committee_member;
          	   
	   $this->layout->load_layout('committee_members/edit',$data);
}


public function delete($id){

$this->load->model('committee_members/Model_cm');
 
	   $query = $this->db->query('select track from cm_assignments where cm_id =  '.(int) $id);
	   $numrows = $query->num_rows();
	   if($numrows > 0){
	       
	       $this->session->set_flashdata('alert_error','please unassign this user from all events');
	       redirect('committee_members/index');
	   }
	   
$id = $this->Model_cm->delete($id);
 $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Deleted CM';
	  $this->Model_activity->save($data_array);
$this->session->set_flashdata('alert_success',lang('committee_member_delete_success'));
redirect('committee_members/index');
}

function check_email(){
$email = $this->input->post('email',true);
$committee_member = $this->db->where('email',$email)->get('users')->row();	
if($committee_member)echo json_encode(false);
else echo json_encode(true);	
}


public function make_cm(){

$this->load->model('committee_members/Model_cm');
$proposers = $this->input->post('proposers',true);
	   if ($proposers != "") {
	   $data_array = array();  
	   $data_array['user_id'] = $this->input->post('proposers',true);
	   $data_array['committee_member'] = 1; 	    
	   $this->Model_cm->save($data_array['user_id'], $data_array);
	   
	   $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Make Propoer as CM';
	  $this->Model_activity->save($data_array);
	  
	   $this->session->set_flashdata('alert_success',lang('committee_member_edit_success'));
       
	   } 
	   
	   redirect('committee_members/index');
      
}






}


