<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Activities extends Controller  {



public function index(){
$this->db->join('admins','admins.admin_id=activities.admin_id');
if(isset($_POST['from_date'])){
$from_date = $this->input->post('from_date',true);
$to_date = $this->input->post('to_date',true);
$this->session->set_userdata(array('from_date' => $from_date,'to_date' => $to_date));
}

if(isset($_POST['member'])){
$member = $this->input->post('member',true);
$this->session->set_userdata(array('member' => $member));
}

if(isset($_POST['activity'])){
$activity = $this->input->post('activity',true);
$this->session->set_userdata(array('activity' => $activity));
}

$sess_from_date = $this->session->userdata('from_date');
$sess_to_date = $this->session->userdata('to_date');
if($sess_from_date != ''){
	$exps_from = explode('/',$sess_from_date);
	$from_date = $exps_from[2].'-'.$exps_from[0].'-'.$exps_from[1];
	$exps_to = explode('/',$sess_to_date);
	$to_date = $exps_to[2].'-'.$exps_to[0].'-'.$exps_to[1];
	$this->db->where("DATE(activities.created_at) >= '$from_date' and DATE(activities.created_at) <= '$to_date' ");
}

$member = $this->session->userdata('member');
if($member != ''){
	$this->db->like('admins.email',$member);
	$this->db->or_like('admins.first_name',$member);
	$this->db->or_like('admins.last_name',$member);
	
}

$activity = $this->session->userdata('activity');
if($activity != ''){
	$this->db->like('activity',$activity);
	
}
$this->db->select('activities.*,admins.first_name,admins.last_name,admins.email');
$data['activities'] = $this->db->get('activities')->result();
$data['from_date'] = $sess_from_date;
$data['to_date'] = $sess_to_date;
$data['member'] = $member;
$data['activity'] = $activity;	

$this->layout->load_layout('activities/index',$data);
}


}


