<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Dash_proposals extends Controller  {

public function index(){
$user_id = $this->session->userdata('user_id');
$this->db->join('events','events.event_id=proposals.event_id','left');
$this->db->join('users','users.user_id=proposals.proposer_id','left');
$this->db->join('users as assigned_cms','assigned_cms.user_id=proposals.assigned_cm','left');

$sess_event_id = $this->session->userdata('dfilter_event_id');
if($sess_event_id != '')$this->db->where('proposals.event_id',$sess_event_id);

$sess_select_status = $this->session->userdata('dsess_select_status');
if($sess_select_status != '' && $sess_select_status != 'all' )$this->db->where('proposals.status',$sess_select_status);

$sess_track = $this->session->userdata('dsess_track');
if($sess_track != '')$this->db->where('proposals.session_track',$sess_track);

$sess_today = $this->session->userdata('dsess_today');
if($sess_today != '')$this->db->where('DATE(proposals.proposal_created)',$sess_today);

$this->db->where("proposals.event_id in (select event_id from events where enabled = 1)");

$this->db->select('proposals.*,users.first_name,users.last_name,event_name,users.country,users.university,users.email,concat(assigned_cms.first_name, " ",assigned_cms.last_name)  as assigned_cm_name');
$data['proposals'] = $this->db->get('proposals')->result();
$data['event_id'] = $sess_event_id;
$data['event'] = $this->db->where('event_id',$sess_event_id)->get('events')->row();
$this->layout->load_layout('dash_proposals/index',$data);	
}


public function total_pendings(){
$this->db->join('users as cms','cms.user_id = proposals.assigned_cm');  
$this->db->join('events as ev','ev.event_id = proposals.event_id');    
$this->db->where('status','0');
$this->db->select('proposals.*,cms.first_name,cms.last_name,ev.event_name');
$data['proposals'] = $this->db->get('proposals')->result();
$this->layout->load_layout('dash_proposals/total_pendings',$data);	
}


public function approved(){

$select_status = 1;
$this->session->set_userdata(array('dsess_select_status' => $select_status,'dsess_today' => NULL,'dsess_track' => NULL,'dsess_title' => 'Total Approved Proposals '));
redirect('dash_proposals/index');
}

public function rejected(){

$select_status = 3;
$this->session->set_userdata(array('dsess_select_status' => $select_status,'dsess_today' => NULL,'dsess_track' => NULL,'dsess_title' => 'Total Rejected Proposals '));
redirect('dash_proposals/index');
}

public function pending(){


$this->session->set_userdata(array('dsess_select_status' => '0','dsess_today' => NULL,'dsess_track' => NULL,'dsess_title' => 'Total Pending Proposals '));
redirect('dash_proposals/index');
}

public function today(){

$select_date = date('Y-m-d');
$this->session->set_userdata(array('dsess_today' => $select_date,'dsess_track' => NULL,'dsess_select_status' => NULL,'dsess_title' => 'Total Today Proposals '));
redirect('dash_proposals/index');
}

public function pa(){

$select_status = 2;
$this->session->set_userdata(array('dsess_select_status' => $select_status,'dsess_today' => NULL,'dsess_track' => NULL,'dsess_title' => 'Total Provisionally Proposals '));
redirect('dash_proposals/index');
}

public function queued(){

$select_status = 4;
$this->session->set_userdata(array('dsess_select_status' => $select_status,'dsess_today' => NULL,'dsess_track' => NULL,'dsess_title' => 'Total Queued Proposals'));
redirect('dash_proposals/index');
}

public function track($id){

$select_track = $id;
$this->session->set_userdata(array('dsess_track' => $select_track,'dsess_today' => NULL,'dsess_select_status' => NULL,'dsess_title' => 'Total Track '.$select_track.' Proposals '));
redirect('dash_proposals/index');
}

public function event_all(){
	
$data = array();

$data['dsess_sort_id'] =  NULL;
$data['dsess_search'] =  NULL;
$data['dsess_criteria'] =  NULL;
$data['dsess_select_cm'] =  NULL;
$data['dsess_select_status'] =  NULL;
$data['dsess_from_date'] =  NULL;
$data['dsess_to_date'] =  NULL;
$data['dsess_today'] =  NULL;
$data['dsess_track'] =  NULL;

$data['dsess_title'] =  'All Proposals';
	
$this->session->set_userdata($data);

redirect('dash_proposals/index');
}

public function all(){	
$data = array();
$data['dfilter_event_id'] =  NULL;
$this->session->set_userdata($data);
$this->event_all() ;
}

public function edit($id){

$user_id = $this->session->userdata('user_id');


$this->load->model('proposals/Model_proposal');
$this->form_validation->set_rules($this->Model_proposal->validation_rules());	   
	   if ($this->form_validation->run()) {
	   $data_array = array();  
	   $data_array['event_id'] = $this->input->post('event_id',true);
	   $data_array['proposal_title'] = $this->input->post('proposal_title',true);
	   $data_array['session_format'] = $this->input->post('session_format',true);
		$data_array['session_track'] = $this->input->post('session_track',true);
		$data_array['presentation'] = $this->input->post('presentation',true);
	   $data_array['remark'] = $this->input->post('remark',true);
	   $data_array['allow_share'] = $this->input->post('allow_share', true); //edit
		$data_array['video_url'] = $this->input->post('video_url', true); //edit
	   
	   $this->Model_proposal->save($id, $data_array);
	   $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Proposal updated Tracks updated';
	   $this->Model_activity->save($data_array);
	   $this->session->set_flashdata('alert_success',lang('proposal_edit_success'));
       redirect('dash_proposals/index');
	   }        
	   $proposal = $this->db->where('proposal_id',$id)->get('proposals')->row();

       $data['proposal'] = $proposal;
       $data['events'] = $this->db->get('events')->result();	   	   
	   $this->layout->load_layout('dash_proposals/edit',$data);
}


public function view($id){
$user_id = $this->session->userdata('user_id');
$this->db->join('events','events.event_id=proposals.event_id','left');
$this->db->join('users','users.user_id=proposals.proposer_id','left');
$this->db->select('proposals.*,users.first_name,users.last_name,event_name');
$proposal = $this->db->where('proposal_id',$id)->get('proposals')->row();
if(!$proposal){
	$this->session->set_flashdata('alert_error','Proposal not found');
	redirect('dash_proposals/index');
}
$data['cops'] = $this->db->where('proposal_id',$proposal->proposal_id)->get('co_presenters')->result();

$data['proposal'] = $proposal; 
if( $data['proposal']->assigned_cm > 0){
       
     $data['assigned_cm'] =  $this->db->where('user_id',$data['proposal']->assigned_cm)->get('users')->row();
       
       
   }else $data['assigned_cm'] = NULL;
$data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Proposal viewed';
	   $this->Model_activity->save($data_array); 
	   
 $this->db->where('users.user_id in (select cm_id from cm_assignments where event_id = '.$proposal->event_id.') and users.committee_member = 1');
	   $this->db->select('users.*,(select track from cm_assignments where event_id='.$proposal->event_id.' and cm_id = users.user_id) as track,
	   (select cm_assign_id from cm_assignments where event_id='.$proposal->event_id.' and cm_id = users.user_id) as cm_assign_id');
 $data['event_cms']  = $this->db->get('users')->result();	   
	   
$this->layout->load_layout('dash_proposals/view',$data);
}

public function download_pdf($id){
$this->load->helper('mpdf');
$user_id = $this->session->userdata('user_id');
$this->db->join('events','events.event_id=proposals.event_id','left');
$this->db->join('users','users.user_id=proposals.proposer_id','left');
$this->db->select('proposals.*,users.first_name,users.last_name,event_name,users.university');
$proposal = $this->db->where('proposal_id',$id)->get('proposals')->row();
if(!$proposal){
	$this->session->set_flashdata('alert_error','Proposal not found');
	redirect('dash_proposals/index');
}	
$data['proposal'] = $proposal; 
$data['cops'] = $this->db->where('proposal_id',$proposal->proposal_id)->get('co_presenters')->result();
         	   
$html = $this->load->view('proposals/pdf',$data,true);
$data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Proposal pdf downloaded';
	   $this->Model_activity->save($data_array);
pdf_create($html, 'Proposal.pdf', true);
}




public function change_status($id){

$this->load->model('proposals/Model_proposal');
	   if ($this->input->post('status',true) != '') {
	   $data_array = array();  
	   $data_array['status'] = $this->input->post('status',true);
	   $data_array['reason'] = $this->input->post('reason',true);
	   $user_id = $this->session->userdata('user_id');
$user= $this->db->where('admin_id',$user_id)->get('admins')->row();
$data_array['status_by'] = $user->first_name.' '.$user->last_name;
$data_array['status_on'] = date('Y-m-d H:i:s');
	   if(  $data_array['status'] == 1){
	      $data_array['reason']  = ''; 
	     
	   }
	   $this->Model_proposal->save($id, $data_array);
	   $this->Model_proposal->sendStatusEmail($id, $data_array['status']);
	   $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Proposal status changed';
	   $this->Model_activity->save($data_array);
	   $this->session->set_flashdata('alert_success','Status changed successfully');
      redirect('dash_proposals/view/'.$id);
	   }  
	 $this->db->join('events','events.event_id=proposals.event_id','left');
$this->db->join('users','users.user_id=proposals.proposer_id','left');
$this->db->select('proposals.*,users.first_name,users.last_name,event_name');
$proposal = $this->db->where('proposal_id',$id)->get('proposals')->row();

$data['proposal'] = $proposal;          	     
	$this->layout->load_layout('dash_proposals/change_status',$data);   
       
}


public function change_cm($id){

$this->load->model('proposals/Model_proposal');
	   if ($this->input->post('assigned_cm',true) != '') {
	   $data_array = array();  
	   $data_array['assigned_cm'] = $this->input->post('assigned_cm',true);
	   $this->Model_proposal->save($id, $data_array);
	   $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Proposal Assigned CM changed By Admin';
	   $this->Model_activity->save($data_array);
	   $this->session->set_flashdata('alert_success','Assigned CM changed successfully');
      redirect('dash_proposals/view/'.$id);
	   }  
	          	     
  $this->session->set_flashdata('alert_error','Assigned CM Not Found');
      redirect('dash_proposals/view/'.$id);
       
}

public function comments($id){

$this->load->model('proposals/Model_comment');
	   if ($this->input->post('comment',true) != '') {
	   $data_array = array();  
	   $data_array['proposal_id'] = $id;	
       $data_array['comment']     = $this->input->post('comment',true);		   
	   $this->Model_comment->save(NULL, $data_array);
	   
	   $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Added comment';
	   $this->Model_activity->save($data_array);
	   
	   $this->session->set_flashdata('alert_success','Status changed successfully');
      redirect('dash_proposals/view/'.$id);
	   }        
 $this->db->join('events','events.event_id=proposals.event_id','left');
$this->db->join('users','users.user_id=proposals.proposer_id','left');
$this->db->select('proposals.*,users.first_name,users.last_name,event_name');
$proposal = $this->db->where('proposal_id',$id)->get('proposals')->row();

$data['proposal'] = $proposal;          	     
	$this->layout->load_layout('dash_proposals/discussions',$data);   	   
       
}


public function delete($id){

$this->load->model('proposals/Model_proposal');
$id = $this->Model_proposal->delete($id);
$data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Proposal deleted';
	   $this->Model_activity->save($data_array);
$this->session->set_flashdata('alert_success',lang('proposal_delete_success'));
redirect('dash_proposals/index');
}


	public function Email($id){ 
 
  $this->load->helper('email');
  $data['proposal'] = $this->db->where('proposal_id',$id)->get('proposals')->row();
 $data['cm'] = $this->db->where('user_id',$data['proposal']->assigned_cm)->get('users')->row();
  $data['guid'] = 'http://www.qsglobalevents.com/pss/files/PSS_CM_User_Guide.pdf';
  $subject = "QS Asia - Please settle pending proposal";
 $message = $this->load->view('dash_proposals/email',$data,true);
  sendEmail($data['cm']->email,$subject,$message);  
  
    
    $this->session->set_flashdata('alert_success','Committee member assigned successfully');
     redirect('dash_proposals/total_pendings/'.$id);
   
   }



}


