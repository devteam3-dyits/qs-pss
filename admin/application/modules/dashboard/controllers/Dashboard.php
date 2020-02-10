<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Dashboard extends Controller  {
public function index(){
$data = array();
$track_count = $this->db->get('settings')->row()->track_count;
$user_id = $this->session->userdata('user_id');

$data['raw_events'] = $this->db->where('enabled',1)->get('events')->result();

$data['track_count'] = $track_count;
$data['total_users'] = $this->db->query('select count(user_id) as user_count from users where proposer = 1')->row()->user_count; 
$data['total_users_today'] = $this->db->query('select count(user_id) as user_count from users where proposer = 1 and  DATE(user_created) = "'.date('Y-m-d').'"')->row()->user_count;




$this->layout->load_layout('dashboard/index',$data);	
}

public function events($name = 'All'){
$data = array();
$track_count = $this->db->get('settings')->row()->track_count;
$user_id = $this->session->userdata('user_id');


if($name != 'All'){
$name = urldecode($name);
$this->db->where("event_name",$name);
$event = $this->db->get('events')->row();
if($event){
$event_id = $event->event_id;
$this->session->set_userdata(array('dfilter_event_id' => $event_id,'dash_event_name' => $event->event_name));
}else redirect('/dashboard/index');

}else{
 $this->session->set_userdata(array('dfilter_event_id' => 0,'dash_event_name' => 'All Events'));   
    
}

$sess_event_id = $this->session->userdata('dfilter_event_id');
if($sess_event_id > 0 )$sql_part = ' and proposals.event_id = '.$sess_event_id;
else $sql_part = '';
 $sql_part.= ' and proposals.event_id in (select event_id from events where enabled=1)';
$data['total'] = $this->db->query('select count(proposal_id) as proposal_count from proposals where 1 '.$sql_part)->row()->proposal_count; 
$data['total_today'] = $this->db->query('select count(proposal_id) as proposal_count from proposals where DATE(proposal_created) = "'.date('Y-m-d').'"'.$sql_part)->row()->proposal_count;
$data['total_pending'] = $this->db->query('select count(proposal_id) as proposal_count from proposals where status = 0'.$sql_part)->row()->proposal_count;
$data['total_rejected'] = $this->db->query('select count(proposal_id) as proposal_count from proposals where status = 3'.$sql_part)->row()->proposal_count;
$data['total_pa'] = $this->db->query('select count(proposal_id) as proposal_count from proposals where status = 2'.$sql_part)->row()->proposal_count;

$data['total_qu'] = $this->db->query('select count(proposal_id) as proposal_count from proposals where status = 4'.$sql_part)->row()->proposal_count;


$data['total_approved'] = $this->db->query('select count(proposal_id) as proposal_count from proposals where status = 1'.$sql_part)->row()->proposal_count;
$data['raw_events'] = $this->db->get('events')->result();
$data['event_id'] = $sess_event_id;
$data['track_count'] = $track_count;

$data['total_users'] = $this->db->query('select count(user_id) as user_count from users where proposer = 1')->row()->user_count; 
$data['total_users_today'] = $this->db->query('select count(user_id) as user_count from users where proposer = 1 and  DATE(user_created) = "'.date('Y-m-d').'"')->row()->user_count;

for($i=1;$i<= $track_count; $i++){
$data['total_track'.$i] = $this->db->query('select count(proposal_id)  as proposal_count from proposals where session_track = '.$i.$sql_part)->row()->proposal_count;
}
$this->layout->load_layout('dashboard/events',$data);

}


/*
public function backup($name){
$data = array();
$track_count = $this->db->get('settings')->row()->track_count;
$user_id = $this->session->userdata('user_id');


if(isset($_POST['dash_event_id'])){
$event_id = $this->input->post('dash_event_id',true);
$this->session->set_userdata(array('filter_event_id' => $event_id));
}

$sess_event_id = $this->session->userdata('dfilter_event_id');
if($sess_event_id != '')$sql_part = ' and proposals.event_id = '.$sess_event_id;
else $sql_part = '';

$data['total'] = $this->db->query('select count(proposal_id) as proposal_count from proposals where 1 '.$sql_part)->row()->proposal_count; 
$data['total_today'] = $this->db->query('select count(proposal_id) as proposal_count from proposals where DATE(proposal_created) = "'.date('Y-m-d').'"'.$sql_part)->row()->proposal_count;
$data['total_pending'] = $this->db->query('select count(proposal_id) as proposal_count from proposals where status = 0'.$sql_part)->row()->proposal_count;
$data['total_rejected'] = $this->db->query('select count(proposal_id) as proposal_count from proposals where status = 3'.$sql_part)->row()->proposal_count;
$data['total_pa'] = $this->db->query('select count(proposal_id) as proposal_count from proposals where status = 2'.$sql_part)->row()->proposal_count;
$data['total_approved'] = $this->db->query('select count(proposal_id) as proposal_count from proposals where status = 1'.$sql_part)->row()->proposal_count;
$data['raw_events'] = $this->db->get('events')->result();
$data['event_id'] = $sess_event_id;
$data['track_count'] = $track_count;

$data['total_users'] = $this->db->query('select count(user_id) as user_count from users where proposer = 1')->row()->user_count; 
$data['total_users_today'] = $this->db->query('select count(user_id) as user_count from users where proposer = 1 and  DATE(user_created) = "'.date('Y-m-d').'"')->row()->user_count;

for($i=1;$i<= $track_count; $i++){
$data['total_track'.$i] = $this->db->query('select count(proposal_id)  as proposal_count from proposals where session_track = '.$i.$sql_part)->row()->proposal_count;
}
$this->layout->load_layout('dashboard/events.php',$data);	
}
*/
}


