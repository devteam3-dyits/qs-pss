<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Events extends Controller  {

public function index(){

$this->db->select('events.*');
$data['events'] = $this->db->get('events')->result();
$this->layout->load_layout('events/index',$data);	
}



public function add(){	
$this->load->model('events/Model_event');
$this->form_validation->set_rules($this->Model_event->validation_rules());	   
	   if ($this->form_validation->run()) {
	   $data_array = array();  
	   
	   $data_array['event_name'] = $this->input->post('event_name',true);
	  
	   $this->Model_event->save(NULL, $data_array);
	   
	   $this->session->set_flashdata('alert_success',lang('event_add_success'));
	   redirect('events/index');

	   }
	   
$this->layout->load_layout('events/add');
}


public function edit($id){

$this->load->model('events/Model_event');
$this->form_validation->set_rules($this->Model_event->validation_rules());	   
	   if ($this->form_validation->run()) {
	   $data_array = array();  
	   $data_array['event_name'] = $this->input->post('event_name',true);
	   $this->Model_event->save($id, $data_array);
	   $this->session->set_flashdata('alert_success',lang('event_edit_success'));
       redirect('events/index');
	   }        
	   $event = $this->db->where('event_id',$id)->get('events')->row();
       $data['event'] = $event;
          	   
	   $this->layout->load_layout('events/edit',$data);
}


public function view($id){

       $this->load->model('events/Model_event');
	   
       $this->db->select('events.*');
	   $event = $this->db->where('event_id',$id)->get('events')->row();
       $data['event'] = $event;
	   $this->db->where('users.user_id not in (select cm_id from cm_assignments where event_id = '.$id.')');
	   $committee_members = $this->db->where('committee_member',1)->get('users')->result();
       $data['committee_members'] = $committee_members;
	   
	   
	   $this->db->where('users.user_id in (select cm_id from cm_assignments where event_id = '.$id.')');
	   $this->db->select('users.*,(select track from cm_assignments where event_id='.$id.' and cm_id = users.user_id) as track');
	   $assigned_cms = $this->db->where('committee_member',1)->get('users')->result();
       $data['assigned_cms'] = $assigned_cms;
       $track_Statuses = $this->db->where('event_id',$id)->get('track_statuses')->result();
	   $tracks = array();
	   if($track_Statuses){
		 foreach($track_Statuses as $track_Status){
			$tracks[] =  $track_Status->track;
			 
		 } 
		   
	   }
       $data['tracks'] = $tracks; 	   
	   $this->layout->load_layout('events/view',$data);
}


public function delete($id){

$this->load->model('events/Model_event');
$id = $this->Model_event->delete($id);
$this->session->set_flashdata('alert_success',lang('event_delete_success'));
redirect('events/index');
}


public function assign($id){
$this->load->model('events/Model_assign');
if($this->input->post('cm_id',true) != ""){
       $data_array = array();  
	   $data_array['cm_id'] = $this->input->post('cm_id',true);	
       $data_array['track'] = $this->input->post('track',true);
       $data_array['event_id'] = $id;	   
	   $this->Model_assign->save(NULL, $data_array);
	   $this->session->set_flashdata('alert_success','Committee member assigned successfully');
}
       redirect('events/view/'.$id);

}

public function turn_off_tracks($id){
$this->load->model('events/Model_track');
if($this->input->post('track1',true) != ""){
	if($this->input->post('track1',true) == 0){
       $data_array = array();  
	   $data_array['track'] = 1;	
       $data_array['event_id'] = $id;	   
	   $this->Model_track->save(NULL, $data_array);
}else $this->Model_track->delete($id,1);	   

if($this->input->post('track2',true) == 0){
       $data_array = array();  
	   $data_array['track'] = 2;	
       $data_array['event_id'] = $id;	   
	   $this->Model_track->save(NULL, $data_array);
}
else $this->Model_track->delete($id,2);

if($this->input->post('track3',true) == 0){
       $data_array = array();  
	   $data_array['track'] = 3;	
       $data_array['event_id'] = $id;	   
	   $this->Model_track->save(NULL, $data_array);
}
else $this->Model_track->delete($id,3);

if($this->input->post('track4',true) == 0){
       $data_array = array();  
	   $data_array['track'] = 4;	
       $data_array['event_id'] = $id;	   
	   $this->Model_track->save(NULL, $data_array);
}
else $this->Model_track->delete($id,4);
  	   
if($this->input->post('track5',true) == 0){
       $data_array = array();  
	   $data_array['track'] = 5;	
       $data_array['event_id'] = $id;	   
	   $this->Model_track->save(NULL, $data_array);
}
else $this->Model_track->delete($id,5);	   
	   
	   
	   $this->session->set_flashdata('alert_success','Tracks updated successfully');
}
       redirect('events/view/'.$id);

}

}


