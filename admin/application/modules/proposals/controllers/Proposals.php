<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Proposals extends Controller  {

public function index(){
$user_id = $this->session->userdata('user_id');
$this->db->join('events','events.event_id=proposals.event_id','left');
$this->db->join('users','users.user_id=proposals.proposer_id','left');
$this->db->join('users as assigned_cms','assigned_cms.user_id=proposals.assigned_cm','left');
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

if(isset($_POST['filter_country'])){
$filter_country = $this->input->post('filter_country',true);
$this->session->set_userdata(array('sess_filter_country' => $filter_country));
}

$sess_select_cm = $this->session->userdata('sess_select_cm');
if($sess_select_cm != '')$this->db->join('cm_assignments as ca','ca.event_id = proposals.event_id and ca.cm_id = '.$sess_select_cm);

$sess_event_id = $this->session->userdata('filter_event_id');
if($sess_event_id != '')$this->db->where('proposals.event_id',$sess_event_id);
$sess_select_status = $this->session->userdata('sess_select_status');
if($sess_select_status != '' && $sess_select_status != 'all' )$this->db->where('proposals.status',$sess_select_status);

$sess_track = $this->session->userdata('sess_track');
if($sess_track != '')$this->db->where('proposals.session_track',$sess_track);

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
    
    if($sess_sort_id == 'approved_desc')$this->db->where('proposals.status','1');
     
	if($sess_sort_id == 'country_asc')$this->db->order_by('users.country','asc');
	elseif($sess_sort_id == 'country_desc')$this->db->order_by('users.country','desc');
	elseif($sess_sort_id == 'track_asc')$this->db->order_by('proposals.session_track','asc');
	elseif($sess_sort_id == 'track_desc')$this->db->order_by('proposals.session_track','desc');
	elseif($sess_sort_id == 'approved_desc')$this->db->order_by('proposals.status_on','desc');
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


$this->db->select('proposals.*,users.first_name,users.last_name,event_name,users.country,users.university,users.email,concat(assigned_cms.first_name, " ",assigned_cms.last_name)  as assigned_cm_name');
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
$data['select_country'] = $sess_filter_country;
$this->layout->load_layout('proposals/index',$data);	
}

public function clear_search(){
	$this->session->set_userdata(array('search_proposal' => NULL,'criteria_proposal' => NULL));
	redirect('proposals/index');
}

public function approved(){

$select_status = 1;
$this->session->set_userdata(array('sess_select_status' => $select_status,'sess_today' => NULL));
redirect('proposals/index');
}

public function rejected(){

$select_status = 3;
$this->session->set_userdata(array('sess_select_status' => $select_status,'sess_today' => NULL));
redirect('proposals/index');
}

public function pending(){


$this->session->set_userdata(array('sess_select_status' => '0','sess_today' => NULL));
redirect('proposals/index');
}

public function today(){

$select_date = date('Y-m-d');
$this->session->set_userdata(array('sess_today' => $select_date));
redirect('proposals/index');
}

public function pa(){

$select_status = 2;
$this->session->set_userdata(array('sess_select_status' => $select_status,'sess_today' => NULL));
redirect('proposals/index');
}

public function track($id){

$select_track = $id;
$this->session->set_userdata(array('sess_track' => $select_track,'sess_today' => NULL));
redirect('proposals/index');
}



public function event_all(){
	
$data = array();

$data['sess_sort_id'] =  NULL;
$data['sess_search'] =  NULL;
$data['sess_criteria'] =  NULL;
$data['sess_select_cm'] =  NULL;
$data['sess_select_status'] =  NULL;
$data['sess_from_date'] =  NULL;
$data['sess_to_date'] =  NULL;
$data['sess_today'] =  NULL;
$data['sess_track'] =  NULL;

	
$this->session->set_userdata($data);

redirect('proposals/index');
}



public function all(){	
$data = array();
$data['filter_event_id'] =  NULL;
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
	   $data_array['tags'] = $this->input->post('tags',true);
       $data_array['target_audience'] = $this->input->post('target_audience',true);
	   $this->Model_proposal->save($id, $data_array);
	   $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Proposal updated Tracks updated';
	   $this->Model_activity->save($data_array);
	   $this->session->set_flashdata('alert_success',lang('proposal_edit_success'));
       redirect('proposals/index');
	   }        
	   $proposal = $this->db->where('proposal_id',$id)->get('proposals')->row();

       $data['proposal'] = $proposal;
       $data['events'] = $this->db->get('events')->result();	   	   
	   $this->layout->load_layout('proposals/edit',$data);
}


public function view($id){
$user_id = $this->session->userdata('user_id');
$this->db->join('events','events.event_id=proposals.event_id','left');
$this->db->join('users','users.user_id=proposals.proposer_id','left');
$this->db->select('proposals.*,users.first_name,users.last_name,event_name');
$proposal = $this->db->where('proposal_id',$id)->get('proposals')->row();
if(!$proposal){
	$this->session->set_flashdata('alert_error','Proposal not found');
	redirect('proposals/index');
}
$data['cops'] = $this->db->where('proposal_id',$proposal->proposal_id)->get('co_presenters')->result();

$data['proposal'] = $proposal; 
if( $data['proposal']->assigned_cm > 0){
       
     $data['assigned_cm'] =  $this->db->where('user_id',$data['proposal']->assigned_cm)->get('users')->row();
       
       
   }else $data['assigned_cm'] = NULL;
  
$this->db->where('users.user_id in (select cm_id from cm_assignments where event_id = '.$proposal->event_id.') and users.committee_member = 1');
	   $this->db->select('users.*,(select track from cm_assignments where event_id='.$proposal->event_id.' and cm_id = users.user_id) as track,
	   (select cm_assign_id from cm_assignments where event_id='.$proposal->event_id.' and cm_id = users.user_id) as cm_assign_id');
 $data['event_cms']  = $this->db->get('users')->result();  
  
   
$data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Proposal viewed';
	   $this->Model_activity->save($data_array);         	   
$this->layout->load_layout('proposals/view',$data);
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
	redirect('proposals/index');
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

public function export_all(){
	
	ob_start();
         
	$data_array = array();	   
		   $data_array['created_at'] = date('Y-m-d H:i:s');
		   $data_array['admin_id'] = $this->session->userdata('user_id');
		   $data_array['activity'] = 'All proposals exported';
		   $this->Model_activity->save($data_array);
		 
	
	$format = $this->input->post('format',true);
	
	$this->db->join('events','events.event_id=proposals.event_id','left');
	$this->db->join('users','users.user_id=proposals.proposer_id','left');
	$this->db->join('users as assigned_cms','assigned_cms.user_id=proposals.assigned_cm','left');

	$select_status = $this->session->userdata('sess_select_status');
	$sess_select_cm = $this->session->userdata('sess_select_cm');
	$sess_track = $this->session->userdata('sess_track');
	$sess_event_id = $this->session->userdata('filter_event_id');
	$sess_from_date = $this->session->userdata('sess_from_date');
	$sess_to_date = $this->session->userdata('sess_to_date');
	$sess_sort_id = $this->session->userdata('sort_proposal_id');
	$sess_search = $this->session->userdata('search_proposal');
	$sess_criteria = $this->session->userdata('criteria_proposal');
	$sess_today = $this->session->userdata('sess_today');

   if($select_status != '' && $select_status != 'all' )$proposals=$this->db->where('status',$select_status);
 
if($sess_select_cm != '')$this->db->join('cm_assignments as ca','ca.event_id = proposals.event_id and ca.cm_id = '.$sess_select_cm);
if($sess_event_id != '')$this->db->where('proposals.event_id',$sess_event_id);
if($sess_track != '')$this->db->where('proposals.session_track',$sess_track);
if($sess_filter_country != '')$this->db->where('users.country',$sess_filter_country);

if($sess_from_date != ''){
	$exps_from = explode('/',$sess_from_date);
	$from_date = $exps_from[2].'-'.$exps_from[0].'-'.$exps_from[1];
	$exps_to = explode('/',$sess_to_date);
	$to_date = $exps_to[2].'-'.$exps_to[0].'-'.$exps_to[1];
	$this->db->where("proposals.proposal_created >= '$from_date' and proposals.proposal_created <= '$to_date' ");
}

if($sess_sort_id != ''){
    
    if($sess_sort_id == 'approved_desc')$this->db->where('proposals.status','1');
     
	if($sess_sort_id == 'country_asc')$this->db->order_by('users.country','asc');
	elseif($sess_sort_id == 'country_desc')$this->db->order_by('users.country','desc');
	elseif($sess_sort_id == 'track_asc')$this->db->order_by('proposals.session_track','asc');
	elseif($sess_sort_id == 'track_desc')$this->db->order_by('proposals.session_track','desc');
	elseif($sess_sort_id == 'approved_desc')$this->db->order_by('proposals.status_on','desc');
	elseif($sess_sort_id == 'status_asc')$this->db->order_by('proposals.status','desc');
	elseif($sess_sort_id == 'status_desc')$this->db->order_by('proposals.status','asc');
}

if($sess_search != ''){
	
	if($sess_criteria == 'university')$this->db->like('users.university',$sess_search);
	elseif($sess_criteria == 'name'){
		$this->db->like('users.first_name',$sess_search);
		$this->db->or_like('users.last_name',$sess_search);
		
	}
	elseif($sess_criteria == 'email')$this->db->like('users.email',$sess_search);
}

 if($sess_today != '')$this->db->where('DATE(proposals.proposal_created)',$sess_today);

 $this->db->select('proposals.*,users.first_name,users.last_name,event_name,users.university,users.email,users.salutation,users.country,users.job_title,users.linkedin,users.twitter,users.summary');
 $proposals = $this->db->get('proposals')->result();

	//load  PHPExcel library
	$this->load->library("excel");
    
	$object = new PHPExcel();

	$object->setActiveSheetIndex(0);
	$object->getActiveSheet()->setTitle('Agenda');
  
	$table_columns = array("Unique ID", "Session Title", "Description", "Start Date & Time", "End Date & Time","Visible / Hidden session", "Email/Session-Role", "Sessions Main Location","Session Sub Location", "Interested # of attnedees (Export only)", "Session Registration (Enabled/Disabled)","Session Registrants (Export only)","Capacity Limit","Checked-in (Export Only)","Attachments (URL)","Track","Session Type","Presenter Registration (preset)","Out of the box");
    
	$column = 0;
  
	foreach($table_columns as $field)
	{
	 $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
	 $column++;
	}
	 
 	$excel_row = 2;

   foreach($proposals as $row)
   {
	$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->proposal_id);
    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->proposal_title);
    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->presentation);
    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row,'');
	$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row,'');
	$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row,'Hidden');
	// if($row->status == 0 ){$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row,'Pending');}
	// if($row->status == 1){$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row,'Approved');}
	// if($row->status == 2){$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row,'Provisionally Accepted');}
	// if($row->status == 3){$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row,'Rejected');}
	$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row,'('."".$row->email."".',speaker)');
	$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row,'');
	$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row,'');
	$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row,'');
	$object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row,'');
	$object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row,'');
	$object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row,'');
	$object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row,'');
	$object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row,'');
	$object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row,$row->session_track);
	$object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row,$row->session_format);
	$object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row,'');
	$object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row,'');
	$object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row,'');
	
   $excel_row++;
	
  }

  // Create a new worksheet
 $object->createSheet();

 // Add some data to the second sheet
 $object->setActiveSheetIndex(1);
 $object->getActiveSheet()->setTitle('speakers');
 
 $table_columns = array("Prefix  (Mr., Mrs., etc.)", "Speaker First Name", "Speaker Last Name", "Email", "Company","Job Title", "Country", "Bio","Linkedin page", "Twitter Handle");
   
$column = 0;
 
   foreach($table_columns as $field)
   {
	$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
	$column++;
   }
	
   $excel_row = 2;

  foreach($proposals as $row)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->salutation);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->first_name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->last_name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->email);
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->university);
   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->job_title);
   $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->country);
   $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->summary);
   $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->linkedin);
   $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->twitter);
   $excel_row++;
}
    
	$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
	
	header('Cache-Control: max-age=0');
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="exportall.xlsx"');
	ob_clean();
	$object_writer->save('php://output');
	     
	
}




public function export_presenterinfo(){
	
	ob_start();
         
	$data_array = array();	   
		   $data_array['created_at'] = date('Y-m-d H:i:s');
		   $data_array['admin_id'] = $this->session->userdata('user_id');
		   $data_array['activity'] = 'All approved presenters exported';
		   $this->Model_activity->save($data_array);
		 
	
	$format = $this->input->post('format',true);
	

 $event_id = $this->input->post('select_event');

 //$query = $this->db->query('select users.first_name,users.last_name,users.email,users.profile_img from users ');
$query = $this->db->query('select users.first_name,users.last_name,users.email,users.profile_img from users where user_id in (select proposer_id from proposals where event_id = '.$event_id.')
 ');


	//load  PHPExcel library
	$this->load->library("excel");
    
	$object = new PHPExcel();

	$object->setActiveSheetIndex(0);
	$object->getActiveSheet()->setTitle('Agenda');
  
	$table_columns = array("First Name", "last Name", "Email Address", "Profile Image");
    
	$column = 0;
  
	foreach($table_columns as $field)
	{
	 $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
	 $column++;
	}
	 
 	$excel_row = 2;
   if($query->num_rows() > 0){ 
   foreach($query->result() as $row)
   { 
	$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->first_name);
    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->last_name);
    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->email);
    if(trim($row->profile_img) != '')$pimg = base_url().'../uploads/profile_imgs/'.$row->profile_img;
    else $pimg = '';
    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row,$pimg);
	
   $excel_row++;
	
  }
   }
 

	$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
	
	header('Cache-Control: max-age=0');
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="export_presenter_info.xlsx"');
	ob_clean();
	$object_writer->save('php://output');
	     
	
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
      redirect('proposals/view/'.$id);
	   }  
	 $this->db->join('events','events.event_id=proposals.event_id','left');
$this->db->join('users','users.user_id=proposals.proposer_id','left');
$this->db->select('proposals.*,users.first_name,users.last_name,event_name');
$proposal = $this->db->where('proposal_id',$id)->get('proposals')->row();

$data['proposal'] = $proposal;          	     
	$this->layout->load_layout('proposals/change_status',$data);   
       
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
      redirect('proposals/view/'.$id);
	   }  
	          	     
  $this->session->set_flashdata('alert_error','Assigned CM Not Found');
      redirect('proposals/view/'.$id);
       
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
      redirect('proposals/view/'.$id);
	   }        
 $this->db->join('events','events.event_id=proposals.event_id','left');
$this->db->join('users','users.user_id=proposals.proposer_id','left');
$this->db->select('proposals.*,users.first_name,users.last_name,event_name');
$proposal = $this->db->where('proposal_id',$id)->get('proposals')->row();

$data['proposal'] = $proposal;          	     
	$this->layout->load_layout('proposals/discussions',$data);   	   
       
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
redirect('proposals/index');
}



}


