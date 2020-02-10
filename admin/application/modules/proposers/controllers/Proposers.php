<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Proposers extends Controller  {
public function __construct(){
	parent::__construct();
	
}

public function index(){
$this->db->where('proposer',1);
$data['proposers'] = $this->db->get('users')->result();
$data['events'] = $this->db->get('events')->result();
$this->db->where('proposer',0);
$this->db->where('committee_member',1);
$data['cms'] = $this->db->order_by('first_name')->get('users')->result();
$this->layout->load_layout('proposers/index',$data);
	
}

public function today_users(){
$this->db->where('proposer',1);
$this->db->where('Date(user_created)',date('Y-m-d'));
$data['proposers'] = $this->db->get('users')->result();
$data['events'] = $this->db->get('events')->result();
$this->layout->load_layout('proposers/today_users',$data);	
}


public function login($proposer_id){
    

	   
$user = $this->db->where('user_id',$proposer_id)->get('users')->row();  
if($user->salutation == 'Other')$salutation = $user->custom_salutation;
else $salutation = $user->salutation;
$session_data = array(
                    
                    'user_id'   => $user->user_id,
					'profile_img'   => $user->profile_img,
					'user_type' => 'proposer',
                    'user_name' => $salutation." ".$user->first_name." ".$user->last_name,
					'job_title'   => (trim($user->job_title)== '' ? 'No' : 'Yes')
                );
			
				
$this->session->set_userdata($session_data);

	redirect('../../index.php/dashboard'); 

}


public function view($id){

$this->db->where('user_id',$id);
$proposer = $this->db->where('proposer',1)->get('users')->row();

       $data['proposer'] = $proposer;
$data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Viewed Proposer';
	   $this->Model_activity->save($data_array);	  	   	   
	   $this->layout->load_layout('proposers/view',$data);
}



public function activate($id){

$this->load->model('proposers/Model_proposer');
	   $data_array = array();  
	   $data_array['verified'] = 1;
	   $this->Model_proposer->save($id, $data_array);
	   $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Proposer activated';
	   $this->Model_activity->save($data_array);
	   
	   $this->session->set_flashdata('alert_success',lang('proposer_activate_success'));
      
	   
	    redirect('proposers/view/'.$id);
       
}

public function deactivate($id){

$this->load->model('proposers/Model_proposer');
	   $data_array = array();  
	   $data_array['verified'] = 0;
	   $this->Model_proposer->save($id, $data_array);
	   $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Proposer activated';
	   $this->Model_activity->save($data_array);
	   
	   $this->session->set_flashdata('alert_success',lang('proposer_deactivate_success'));
      
	   
	    redirect('proposers/view/'.$id);
       
}


public function edit($id){
$result = false;
$this->load->model('proposers/Model_proposer');
$this->form_validation->set_rules($this->Model_proposer->validation_rules());	   
	   if ($this->form_validation->run()) {

	   $data_array = array();  
	   $data_array['first_name'] = $this->input->post('first_name',true);
	   $data_array['last_name'] = $this->input->post('last_name',true);
	   $data_array['gender'] = $this->input->post('gender',true);
	   $data_array['country'] = $this->input->post('country',true);
	   $data_array['tele'] = $this->input->post('tele',true);
       //$data_array['fax'] = $this->input->post('fax',true);
       $data_array['fax'] = '';
       $data_array['job_title'] = $this->input->post('job_title',true);
	   $data_array['university'] = $this->input->post('university',true);
	   $data_array['university_accronym'] = $this->input->post('university_accronym',true);
	   $data_array['department'] = $this->input->post('department',true);
	   $data_array['mail'] = $this->input->post('mail',true);
	   $data_array['country'] = $this->input->post('country',true);
	   $data_array['tele'] = $this->input->post('tele',true);
	   $data_array['fax'] = $this->input->post('fax',true);
	   $data_array['summary'] = $this->input->post('summary',true);	   
	   if($this->input->post('password',true) != "")
	   $data_array['password'] = md5($this->input->post('password',true));
	   $this->Model_proposer->save($id, $data_array);
	   
	   $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Proposer updated';
	   $this->Model_activity->save($data_array);
	   
	   $this->session->set_flashdata('alert_success',lang('proposer_edit_success'));
       redirect('proposers/index');
	   } 
       $this->db->where('user_id',$id);       
	   $proposer = $this->db->where('proposer',1)->get('users')->row();
       $data['user'] = $proposer;
          	   
	   $this->layout->load_layout('proposers/edit',$data);
}

public function export(){
$data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Proposers exported';
	   $this->Model_activity->save($data_array);
	   
$event_id = $this->input->post('event_id',true);
$format = $this->input->post('format',true);
$this->db->where('user_id in (select proposer_id from proposals where event_id = '.$event_id.')');
$proposers = $this->db->where('proposer',1)->get('users')->result();
if($format == 'csv'){
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=export.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

	$data_array = array(
	"Salutation",
	"First Name",
	"Last Name",
	"Email Address",
	"Gender",
	"Country",
	"Job Title",
	"University",
	"University Accronym",
	"Department",
	"Mailing Address",
	"Telephone",	
	"Fax",	
	"Summary"
	);
	fputcsv($output, $data_array);

// loop over the rows, outputting them
foreach ($proposers as $proposer){
	$data_array = array();
	$data_array[] = $proposer->salutation;
	$data_array[] = $proposer->first_name;
	$data_array[] = $proposer->last_name;
	$data_array[] = $proposer->email;
	$data_array[] = $proposer->gender;
	$data_array[] = $proposer->country;	
	$data_array[] = $proposer->job_title;
	$data_array[] = $proposer->university;
	$data_array[] = $proposer->university_accronym;
	$data_array[] = $proposer->department;
	$data_array[] = $proposer->mail;
	$data_array[] = $proposer->tele;	
	$data_array[] = $proposer->fax;	
	$data_array[] = $proposer->summary;	
	fputcsv($output, $data_array);
}
}else{
function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }	
	
	// filename for download
  $filename = "proposers_" . date('Ymd') . ".xlsx";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  $data_array = array(
	"Salutation",
	"First Name",
	"Last Name",
	"Email Address",
	"Gender",
	"Country",
	"Job Title",
	"University",
	"University Accronym",
	"Department",
	"Mailing Address",
	"Telephone",	
	"Fax",	
	"Summary"
	);
	echo implode("\t", $data_array) . "\r\n";
  foreach($proposers as $proposer) {
   $data_array = array();
	$data_array[] = $proposer->salutation;
	$data_array[] = $proposer->first_name;
	$data_array[] = $proposer->last_name;
	$data_array[] = $proposer->email;
	$data_array[] = $proposer->gender;
	$data_array[] = $proposer->country;	
	$data_array[] = $proposer->job_title;
	$data_array[] = $proposer->university;
	$data_array[] = $proposer->university_accronym;
	$data_array[] = $proposer->department;
	$data_array[] = $proposer->mail;
	$data_array[] = $proposer->tele;	
	$data_array[] = $proposer->fax;	
	$data_array[] = $proposer->summary;	
    echo implode("\t", array_values($data_array)) . "\r\n";
  }
	
	
	
}      
}

public function export_all(){
$data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'All proposers exported';
	   $this->Model_activity->save($data_array);
	   

$format = $this->input->post('format',true);
$proposers = $this->db->where('proposer',1)->get('users')->result();
if($format == 'csv'){
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=export_all.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

	$data_array = array(
	"Salutation",
	"First Name",
	"Last Name",
	"Email Address",
	"Gender",
	"Country",
	"Job Title",
	"University",
	"University Accronym",
	"Department",
	"Mailing Address",
	"Telephone",	
	"Fax",	
	"Summary"
	);
	fputcsv($output, $data_array);

// loop over the rows, outputting them
foreach ($proposers as $proposer){
	$data_array = array();
	$data_array[] = $proposer->salutation;
	$data_array[] = $proposer->first_name;
	$data_array[] = $proposer->last_name;
	$data_array[] = $proposer->email;
	$data_array[] = $proposer->gender;
	$data_array[] = $proposer->country;	
	$data_array[] = $proposer->job_title;
	$data_array[] = $proposer->university;
	$data_array[] = $proposer->university_accronym;
	$data_array[] = $proposer->department;
	$data_array[] = $proposer->mail;
	$data_array[] = $proposer->tele;	
	$data_array[] = $proposer->fax;	
	$data_array[] = $proposer->summary;	
	fputcsv($output, $data_array);
}
}else{
function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }	
	
	// filename for download
  $filename = "proposers_" . date('Ymd') . ".xlsx";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  $data_array = array(
	"Salutation",
	"First Name",
	"Last Name",
	"Email Address",
	"Gender",
	"Country",
	"Job Title",
	"University",
	"University Accronym",
	"Department",
	"Mailing Address",
	"Telephone",	
	"Fax",	
	"Summary"
	);
	echo implode("\t", $data_array) . "\r\n";
  foreach($proposers as $proposer) {
   $data_array = array();
	$data_array[] = $proposer->salutation;
	$data_array[] = $proposer->first_name;
	$data_array[] = $proposer->last_name;
	$data_array[] = $proposer->email;
	$data_array[] = $proposer->gender;
	$data_array[] = $proposer->country;	
	$data_array[] = $proposer->job_title;
	$data_array[] = $proposer->university;
	$data_array[] = $proposer->university_accronym;
	$data_array[] = $proposer->department;
	$data_array[] = $proposer->mail;
	$data_array[] = $proposer->tele;	
	$data_array[] = $proposer->fax;	
	$data_array[] = $proposer->summary;	
    echo implode("\t", array_values($data_array)) . "\r\n";
  }
	
	
	
}      
}

public function change_profileimg($user_id){

$this->db->where('user_id',$user_id);
$proposer = $this->db->where('proposer',1)->get('users')->row();

       $data['proposer'] = $proposer;
	  	   	   
	   $this->layout->load_layout('proposers/upload_img',$data);
}
public function delete($id){

$this->load->model('proposers/Model_proposer');
$id = $this->Model_proposer->delete($id);

$data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Proposer deleted';
	   $this->Model_activity->save($data_array);
$this->session->set_flashdata('alert_success',lang('proposer_delete_success'));
redirect('proposers/index');
}



public function upload_profile_img($user_id){
$this->load->model('proposers/Model_proposer');
$this->load->helper('upload');
	   $upload_path = $this->config->item('profile_image_path');
	   $result = do_upload('profile_img',$upload_path);	   
	   if($result == false){
	   $this->db->where('user_id',$user_id);
       $profile_img = $this->db->get('users')->row()->profile_img;
       if($profile_img != '')	    
	   unlink($upload_path.$profile_img);
	   $upload_data = $this->upload->data() ;
	   $data_array['profile_img'] = $upload_data['file_name'];
	   $this->Model_proposer->save($user_id,$data_array);
	   
	   $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Proposer profile image updated';
	   $this->Model_activity->save($data_array);
	   
	   $this->session->set_userdata(array('profile_img' => $data_array['profile_img']));
	  
	   $this->session->set_flashdata('alert_success','Profile Picture Changed successfully');
       
	         }
			 
redirect('proposers/index');
	 

       
}



public function make_proposer(){

$this->load->model('proposers/Model_proposer');
$cms = $this->input->post('cms',true);
	   if ($cms != "") {
	   $data_array = array();  
	   $data_array['user_id'] = $cms;
	   $data_array['proposer'] = 1; 	    
	   $this->Model_proposer->save($data_array['user_id'], $data_array);
	   
	   $data_array = array();	   
	   $data_array['created_at'] = date('Y-m-d H:i:s');
	   $data_array['admin_id'] = $this->session->userdata('user_id');
	   $data_array['activity'] = 'Make CM as proposer';
	  $this->Model_activity->save($data_array);
	  
	   $this->session->set_flashdata('alert_success',lang('proposer_edit_success'));
       
	   } 
	   
	   redirect('proposers/index');
      
}



}


