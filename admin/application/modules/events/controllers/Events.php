<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Events extends Controller  {

public function index(){

$this->db->select('events.*');
$data['events'] = $this->db->where('is_archived', 0)->order_by('event_created', 'DESC')->get('events')->result();
$data['archived_events'] = $this->db->where('is_archived', 1)->order_by('event_created', 'DESC')->get('events')->result();
$this->layout->load_layout('events/index',$data);	
}



public function add(){	
$this->load->model('events/Model_event');
$this->form_validation->set_rules($this->Model_event->validation_rules());	   
	   if ($this->form_validation->run()) {
	   $data_array = array();  
	   
	   $data_array['event_name'] = $this->input->post('event_name',true);
	   $data_array['track_details'] = $this->input->post('track_details',true);
	   $this->Model_event->save(NULL, $data_array);
	   
	    $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Event Added';
	   $data_array['enaled'] = 1;
	   $this->Model_activity->save($data_array);
	   
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
	   $data_array['track_details'] = $this->input->post('track_details',true);
	   $this->Model_event->save($id, $data_array);
	   
	   $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Event Updated';
	   $this->Model_activity->save($data_array);
	   
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
	   $committee_members = $this->db->where('committee_member',1)->order_by('first_name','ASC')->get('users')->result();
       $data['committee_members'] = $committee_members;
	   
	   
	   $this->db->where('users.user_id in (select cm_id from cm_assignments where event_id = '.$id.') and users.committee_member = 1');
	   $this->db->select('users.*,(select track from cm_assignments where event_id='.$id.' and cm_id = users.user_id) as track,
	   (select cm_assign_id from cm_assignments where event_id='.$id.' and cm_id = users.user_id) as cm_assign_id');
	   $assigned_cms = $this->db->get('users')->result();
       $data['assigned_cms'] = $assigned_cms;
	   	   
       $track_Statuses = $this->db->where('event_id',$id)->get('track_statuses')->result();
	   $tracks = array();
	   if($track_Statuses){
		 foreach($track_Statuses as $track_Status){
			$tracks[] =  $track_Status->track;
			 
		 } 
		   
	   }
       $data['tracks'] = $tracks;
	   
	   $track_count = $this->db->get('settings')->row()->track_count;
	   $tracks_dropdown = array();
	    $tracks_limit = array();
	   for($i=1;$i<=$track_count;$i++){
		   if(!in_array($i,$tracks)){
	   $row = $this->db->query('select count(cm_id) as cm_count from cm_assignments as ca where ca.event_id = '.$id.' and ca.track = '.$i)->row();
      if($row){
          
	  if($row->cm_count < 5) $tracks_dropdown[] = $i;
	  }// cm count less than 5
	  
	  }
	  $row = $this->db->query('select `plimit` from track_limits where event_id = '.$id.' and track = '.$i)->row();
      if($row)$tracks_limit[$i] = $row->plimit; 
	   }	   
	    
	   $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Event Viewed';
	   $this->Model_activity->save($data_array);
	   
       $data['tracks_dropdown'] = $tracks_dropdown; 
	   $data['tracks_limit'] = $tracks_limit; 
     	   
	   $this->layout->load_layout('events/view',$data);
}

public function enable($id){


$this->load->model('events/Model_event');

	   $data_array = array();  
	   $data_array['enabled'] = 1;
	   $this->Model_event->save($id, $data_array);
	   
	  
  $this->session->set_flashdata('alert_success','Event Enabled Successfully');
       redirect('events/view/'.$id);
}

public function disable($id){


$this->load->model('events/Model_event');

	   $data_array = array();  
	   $data_array['enabled'] = 0;
	   $this->Model_event->save($id, $data_array);
	   
	  
  $this->session->set_flashdata('alert_success','Event Disabled Successfully');
       redirect('events/view/'.$id);
}


public function delete($id){
 $query = $this->db->query('select track from cm_assignments where event_id =  '.(int) $id);
	   $numrows = $query->num_rows();
	   if($numrows > 0){
	       
	       $this->session->set_flashdata('alert_error','Please unassign all committee members from this event before deletion');
	       redirect('events/index');
	   }
	 
	   
$this->load->model('events/Model_event');
$id = $this->Model_event->delete($id);
$data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Event Deleted';
	   $this->Model_activity->save($data_array);
	   
$this->session->set_flashdata('alert_success',lang('event_delete_success'));
redirect('events/index');
}

public function remove_assign($event_id,$id){

$this->load->model('events/Model_assign');
$id = $this->Model_assign->delete($id);
$data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'CM removed from event';
	   $this->Model_activity->save($data_array);
	   
$this->session->set_flashdata('alert_success',lang('assign_delete_success'));
redirect('events/view/'.$event_id);
}


public function assign($id){
$this->load->model('events/Model_assign');
if($this->input->post('cm_id',true) != ""){
       $data_array = array();  
	   $data_array['cm_id'] = $this->input->post('cm_id',true);	
       $data_array['track'] = $this->input->post('track',true);
       $data_array['event_id'] = $id;	   
	   $this->Model_assign->save(NULL, $data_array);
	   $this->Model_assign->sendAssignEmail($data_array);
	   
	   $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'CM assigned from event';
	   $this->Model_activity->save($data_array);
	   
	   
	   $this->session->set_flashdata('alert_success','Committee member assigned successfully');
	   
}
       redirect('events/view/'.$id);

}

public function turn_off_tracks($id){
$this->load->model('events/Model_track');
$this->load->model('events/Model_limit');
$this->load->model('events/Model_event');
$this->Model_limit->delete_previous($id);
$this->Model_track->delete_previous($id);

$track_count = $this->db->get('settings')->row()->track_count;
$open = 0;
for($i=1;$i<=$track_count;$i++){
    
if($this->input->post('track'.$i,true) != ""){
	
	if($this->input->post('track'.$i,true) == 0){
       $data_array = array();  
	   $data_array['track'] = $i;	
       $data_array['event_id'] = $id;

	   $this->Model_track->save(NULL, $data_array);
	   
}else {
    $open = 1;
    $this->Model_track->delete($id,$i);	
    
}

	      
}
   
$data_array = array();  
	   $data_array['track'] = $i;	
       $data_array['event_id'] = $id;
      $data_array['plimit'] = $this->input->post('track_limit'.$i,true);
	   $this->Model_limit->save(NULL, $data_array);	
	   
 $data_array = array();  
	   $data_array['open'] = $open;
	   $this->Model_event->save($id, $data_array);	   
	   
       $this->session->set_flashdata('alert_success','Tracks updated successfully');
}

$this->Model_limit->delete_unwanted($id,$track_count);
$data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Event Tracks updated';
	   $this->Model_activity->save($data_array);
 redirect('events/view/'.$id);

}

public function archive($id){
	$this->load->model('events/Model_event');

	   $data_array = array();  
	   $data_array['is_archived'] = 1;
	   $this->Model_event->save($id, $data_array);
	   
	  
  $this->session->set_flashdata('alert_success','Event Archived Successfully');
       redirect('events/index');
}

public function unarchive($id){
	$this->load->model('events/Model_event');

	   $data_array = array();  
	   $data_array['is_archived'] = 0;
	   $this->Model_event->save($id, $data_array);
	   
	  
  $this->session->set_flashdata('alert_success','Event Un-archived Successfully');
       redirect('events/index');
}

}


