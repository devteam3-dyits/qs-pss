<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Proposals extends Controller  {
/*
public function index(){
$user_id = $this->session->userdata('user_id');
if($_POST){
$this->session->set_userdata(array('filter_option' => $this->input->post('filter_option') ));	
}

$filter_option = $this->session->userdata('filter_option');
if(!$filter_option)$filter_option = 'track_only';
$this->db->join('events','events.event_id=proposals.event_id');
$this->db->join('users','users.user_id=proposals.proposer_id');
if($filter_option == 'track_only')
$this->db->join('cm_assignments as ca','ca.event_id = proposals.event_id and proposals.session_track = ca.track and ca.cm_id = '.$user_id);
else $this->db->join('cm_assignments as ca','ca.event_id = proposals.event_id and ca.cm_id = '.$user_id);
$this->db->select('proposals.*,users.first_name,users.last_name,event_name');
$data['proposals'] = $this->db->get('proposals')->result();
$data['filter_option'] = $filter_option;
$this->layout->load_layout('proposals/index',$data);	
}

*/


public function index(){
$user_id = $this->session->userdata('user_id');
$this->db->join('events','events.event_id=proposals.event_id','left');
$this->db->join('users','users.user_id=proposals.proposer_id','left');

if(isset($_POST['filter_option2'])){
$this->session->set_userdata(array('filter_option2' => $this->input->post('filter_option2') ));	
}

$filter_option2 = $this->session->userdata('filter_option2');
if(!$filter_option2)$filter_option2 = 'track_only';

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



if(isset($_POST['select_status'])){
$select_status = $this->input->post('select_status',true);
$this->session->set_userdata(array('sess_select_status' => $select_status));
}

if(isset($_POST['filter_country'])){
$filter_country = $this->input->post('filter_country',true);
$this->session->set_userdata(array('sess_filter_country' => $filter_country));
}
/*
if($filter_option2 == 'track_only')
$this->db->join('cm_assignments as ca','ca.event_id = proposals.event_id and (proposals.session_track = ca.track or ca.track = 500 ) and ca.cm_id = '.$user_id);
*/

if($filter_option2 == 'track_only')
$this->db->where('( proposals.assigned_cm = '.$user_id.' or 500 in (select ca.track from cm_assignments as ca where ca.event_id = proposals.event_id and ca.cm_id = '.$user_id.')) ');


/*
else $this->db->join('cm_assignments as ca','ca.event_id = proposals.event_id and ca.cm_id = '.$user_id);
*/

$sess_event_id = $this->session->userdata('filter_event_id');
if($sess_event_id != '')$this->db->where('proposals.event_id',$sess_event_id);
$sess_select_status = $this->session->userdata('sess_select_status');
if($sess_select_status != 'all' && $sess_select_status != '')$this->db->where('proposals.status',$sess_select_status);

$sess_track = $this->session->userdata('sess_track');
if($sess_track != '')$this->db->where('proposals.session_track = ',$sess_track);

$sess_filter_country = $this->session->userdata('sess_filter_country');
if($sess_filter_country != '')$this->db->where('users.country',$sess_filter_country);


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
	
	if($sess_criteria == 'university')$this->db->like('users.university',$sess_search);
	elseif($sess_criteria == 'name'){
		$this->db->like('users.first_name',$sess_search);
		$this->db->or_like('users.last_name',$sess_search);
		
	}
	elseif($sess_criteria == 'email')$this->db->like('users.email',$sess_search);
}

$sess_today = $this->session->userdata('sess_today');
if($sess_today != '')$this->db->where('DATE(proposals.proposal_created)',$sess_today);



$this->db->select('proposals.*,users.first_name,users.last_name,event_name,users.country,users.university,users.email');
$data['proposals'] = $this->db->get('proposals')->result();

$data['events'] = $this->db->get('events')->result();
$data['event_id'] = $sess_event_id;
$data['sort_id'] = $sess_sort_id;
$data['search'] = $sess_search;
$data['criteria'] = $sess_criteria;
$data['select_status'] = $sess_select_status;
$data['from_date'] = $sess_from_date;
$data['to_date'] = $sess_to_date;
$data['select_country'] = $sess_filter_country;
$data['filter_option2'] = $filter_option2;
$this->layout->load_layout('proposals/index',$data);	
}

public function clear_search(){
	$this->session->set_userdata(array('search_proposal' => NULL,'criteria_proposal' => NULL));
	redirect('proposals/index');
}

public function approved(){

$select_status = 1;
$this->reset_all_filter();	
$this->session->set_userdata(array('sess_select_status' => $select_status,'sess_today' => NULL));
redirect('proposals/index');
}

public function rejected(){

$select_status = 3;
$this->reset_all_filter();	
$this->session->set_userdata(array('sess_select_status' => $select_status,'sess_today' => NULL));
redirect('proposals/index');
}

public function pending(){

$this->reset_all_filter();	
$this->session->set_userdata(array('sess_select_status' => '0','sess_today' => NULL));
redirect('proposals/index');
}

public function today(){

$select_date = date('Y-m-d');
$this->reset_all_filter();	
$this->session->set_userdata(array('sess_today' => $select_date));
redirect('proposals/index');
}

public function pa(){

$select_status = 2;
$this->reset_all_filter();	
$this->session->set_userdata(array('sess_select_status' => $select_status,'sess_today' => NULL));
redirect('proposals/index');
}

public function queued(){

$select_status = 4;
$this->reset_all_filter();	
$this->session->set_userdata(array('sess_select_status' => $select_status,'sess_today' => NULL));
redirect('proposals/index');
}




public function track($id){

$select_track = $id;
$this->reset_all_filter();	
$this->session->set_userdata(array('sess_track' => $select_track,'sess_today' => NULL));
redirect('proposals/index');
}

private function reset_all_filter(){
	$data = array();

$data['sess_sort_id'] =  NULL;
$data['sess_search'] =  NULL;
$data['sess_criteria'] =  NULL;
$data['sess_select_status'] =  NULL;
$data['sess_from_date'] =  NULL;
$data['sess_to_date'] =  NULL;
$data['sess_today'] =  NULL;
$data['sess_track'] =  NULL;
$data['filter_option2'] =  'all';
	
$this->session->set_userdata($data);
}

public function event_all(){
	
$this->reset_all_filter();

redirect('proposals/index');
}

public function all(){	
$data = array();
$data['filter_event_id'] =  NULL;
$this->session->set_userdata($data);
$this->event_all() ;
}

public function view($id){
    
$user_id = $this->session->userdata('user_id');
$this->db->join('events','events.event_id=proposals.event_id');
$this->db->join('users','users.user_id=proposals.proposer_id');
$this->db->select('proposals.*,users.first_name,users.last_name,event_name');
$proposal = $this->db->where('proposal_id',$id)->get('proposals')->row();
if(!$proposal){
	$this->session->set_flashdata('alert_error','Proposal Not Found');
	redirect('proposals/index');
}
/*
$cm_assignment = $this->db->query('select * from cm_assignments 
	where cm_id = '.$user_id.' and event_id = '.$proposal->event_id.' and (track = '.$proposal->session_track.' or track = 500 )' );
*/
$cm_assignment = $this->db->query('select * from cm_assignments 
	where cm_id = '.$user_id.' and event_id = '.$proposal->event_id );
$cm_row = $cm_assignment->row();
if($proposal->assigned_cm != $user_id && $cm_row->track != 500){
	$this->session->set_flashdata('alert_error','Access denied');
	redirect('proposals/index');
}



   $data['proposal'] = $proposal;
   
   $data['cops'] = $this->db->where('proposal_id',$proposal->proposal_id)->get('co_presenters')->result();
   /*
   if($cm_assignment->num_rows() > 0){
       $cm_row = $cm_assignment->row();
       
       if($proposal->assigned_cm == $user_id || $cm_row->track == 500){ $data['cm_assignment'] = 1;
      
       }
       else $data['cm_assignment'] = 0;
       
   }
   else  $data['cm_assignment'] = 0;
   */
   
   $data['cm_assignment'] = 1;
     
   $this->db->where('proposal_id',$id);
   $this->db->join('users','users.user_id=comments.cm_id');
   $this->db->select('comments.*,users.first_name,users.last_name');
   $data['comments'] = $this->db->get('comments')->result();	
 
	   $this->layout->load_layout('proposals/view',$data);
}

private function check_autority($id){
$user_id = $this->session->userdata('user_id');
$proposal = $this->db->where('proposal_id',$id)->get('proposals')->row();
if(!$proposal){
	$this->session->set_flashdata('alert_error','Proposal Not Found');
	redirect('proposals/index');
}else{
	$cm_assignment = $this->db->query('select track from cm_assignments 
	where cm_id = '.$user_id.' and event_id = '.$proposal->event_id.' and (track = '.$proposal->session_track.' or track = 500 )' );
if($cm_assignment->num_rows() <= 0){
	$this->session->set_flashdata('alert_error','Access denied');
	redirect('proposals/view/'.$id);
}
}	
	
}

public function change_status($id){
$this->check_autority($id);
$this->load->model('proposals/Model_proposal');
	   if ($this->input->post('status',true) != '') {
	   $data_array = array();  
	   $data_array['status'] = $this->input->post('status',true);
	   $data_array['reason'] = $this->input->post('reason',true);
	   $user_id = $this->session->userdata('user_id');
$user= $this->db->where('user_id',$user_id)->get('users')->row();
$data_array['status_by'] = $user->first_name.' '.$user->last_name;
$data_array['status_on'] = date('Y-m-d H:i:s');
	   if(  $data_array['status'] == 1){
	      $data_array['reason']  = ''; 
	     
	   }
	   $this->Model_proposal->save($id, $data_array);
	   $this->Model_proposal->sendStatusEmail($id, $data_array['status']);
	   $this->session->set_flashdata('alert_success','Status changed successfully');
      
	   }        
	   
       redirect('proposals/view/'.$id);
}


public function comment($id){
$this->check_autority($id);
$this->load->model('proposals/Model_comment');
	   if ($this->input->post('comment',true) != '') {
	   $data_array = array();  
	   $data_array['proposal_id'] = $id;	
       $data_array['comment']     = $this->input->post('comment',true);		   
	   $this->Model_comment->save(NULL, $data_array);
	   $this->session->set_flashdata('alert_success','Status changed successfully');
      
	   }        
	   
       redirect('proposals/view/'.$id);
}

}


