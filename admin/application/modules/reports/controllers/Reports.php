<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Reports extends Controller  {

public function index(){
$user_id = $this->session->userdata('user_id');
$this->db->join('events','events.event_id=proposals.event_id','left');
$this->db->join('users','users.user_id=proposals.proposer_id','left');
if(isset($_POST['event_id'])){
$event_id = $this->input->post('event_id',true);
$this->session->set_userdata(array('filter_event_id' => $event_id));
}

if(isset($_POST['sort_id'])){
$sort_id = $this->input->post('sort_id',true);
$this->session->set_userdata(array('sort_proposal_id' => $sort_id));
}

if(isset($_POST['from_date'])){
$from_date = $this->input->post('from_date',true);
$to_date = $this->input->post('to_date',true);
$this->session->set_userdata(array('sess_from_date' => $from_date,'sess_to_date' => $to_date));
}

if(isset($_POST['search'])){
$search = $this->input->post('search',true);
$criteria = $this->input->post('criteria',true);
$this->session->set_userdata(array('search_proposal' => $search,'criteria_proposal' => $criteria));
}

if(isset($_POST['select_cm'])){
$select_cm = $this->input->post('select_cm',true);
$this->session->set_userdata(array('sess_select_cm' => $select_cm));
}

if(isset($_POST['select_status'])){
$select_status = $this->input->post('select_status',true);
$this->session->set_userdata(array('sess_select_status' => $select_status));
}

$sess_select_cm = $this->session->userdata('sess_select_cm');
if($sess_select_cm != '')$this->db->join('cm_assignments as ca','ca.event_id = proposals.event_id and ca.cm_id = '.$sess_select_cm);

$sess_event_id = $this->session->userdata('filter_event_id');
if($sess_event_id != '')$this->db->where('proposals.event_id',$sess_event_id);

$sess_select_status = $this->session->userdata('sess_select_status');
if($sess_select_status != '')$this->db->where('proposals.status',$sess_select_status);

$sess_from_date = $this->session->userdata('sess_from_date');
$sess_to_date = $this->session->userdata('sess_to_date');
if($sess_from_date != ''){
	$exps_from = explode('/',$sess_from_date);
	$from_date = $exps_from[2].'-'.$exps_from[0].'-'.$exps_from[1];
	$exps_to = explode('/',$sess_to_date);
	$to_date = $exps_to[2].'-'.$exps_to[0].'-'.$exps_to[1];
	$this->db->where("proposals.proposal_created >= '$from_date' and proposals.proposal_created <= '$to_date' ");
}
$sess_sort_id = $this->session->userdata('sort_proposal_id');
if($sess_sort_id != ''){
	if($sess_sort_id == 'country_asc')$this->db->order_by('users.country','asc');
	elseif($sess_sort_id == 'country_desc')$this->db->order_by('users.country','desc');
	elseif($sess_sort_id == 'track_asc')$this->db->order_by('proposals.session_track','asc');
	elseif($sess_sort_id == 'track_desc')$this->db->order_by('proposals.session_track','desc');
	elseif($sess_sort_id == 'status_asc')$this->db->order_by('proposals.status','desc');
	elseif($sess_sort_id == 'status_desc')$this->db->order_by('proposals.status','asc');
}

$sess_search = $this->session->userdata('search_proposal');
$sess_criteria = $this->session->userdata('criteria_proposal');
if($sess_search != ''){
	
	if($sess_criteria == 'country')$this->db->like('users.country',$sess_search);
	elseif($sess_criteria == 'university')$this->db->like('users.country',$sess_search);
	elseif($sess_criteria == 'name'){
		$this->db->like('users.first_name',$sess_search);
		$this->db->or_like('users.last_name',$sess_search);
		
	}
	elseif($sess_criteria == 'email')$this->db->like('users.email',$sess_search);
}


$this->db->select('proposals.*,users.first_name,users.last_name,event_name,users.country,users.university,users.email');
$data['proposals'] = $this->db->get('proposals')->result();
$data['cms'] = $this->db->where('committee_member',1)->get('users')->result();
$data['events'] = $this->db->get('events')->result();
$data['event_id'] = $sess_event_id;
$data['sort_id'] = $sess_sort_id;
$data['search'] = $sess_search;
$data['criteria'] = $sess_criteria;
$data['select_cm'] = $sess_select_cm;
$data['select_status'] = $sess_select_status;
$data['from_date'] = $sess_from_date;
$data['to_date'] = $sess_to_date;
$this->layout->load_layout('reports/index',$data);	
}

public function clear_search(){
	$this->session->set_userdata(array('search_proposal' => NULL,'criteria_proposal' => NULL));
	redirect('reports/index');
}



}


