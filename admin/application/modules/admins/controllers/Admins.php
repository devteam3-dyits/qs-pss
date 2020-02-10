<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Admins extends Controller  {
public function __construct(){
	parent::__construct();
	$user_role = $this->session->userdata('user_role');
	if($user_role > 1){
	$this->session->set_flashdata('alert_error','Access denied');
       redirect('dashboard/index');
	}  
}

public function index(){

$data['admins'] = $this->db->get('admins')->result();
$this->layout->load_layout('admins/index',$data);	
}



public function add(){	
$this->load->model('admins/Model_admin');
$this->form_validation->set_rules($this->Model_admin->validation_rules());	   
	   if ($this->form_validation->run()) {
	   $data_array = array();  
	   
	   $data_array['first_name'] = $this->input->post('first_name',true);
	   $data_array['last_name'] = $this->input->post('last_name',true);
	   $data_array['gender'] = $this->input->post('gender',true);
	   $data_array['email'] = $this->input->post('email',true);
	   $data_array['country'] = $this->input->post('country',true);
	   $data_array['tele'] = $this->input->post('tele',true);
	   $data_array['password'] = md5($this->input->post('password',true));
	   $data_array['admin_role'] = $this->input->post('admin_role',true);
	   $this->Model_admin->save(NULL, $data_array);
	   
	   $this->session->set_flashdata('alert_success',lang('admin_add_success'));
	   redirect('admins/index');

	   }
	   
$this->layout->load_layout('admins/add');
}


public function edit($id){

$this->load->model('admins/Model_admin');
$this->form_validation->set_rules($this->Model_admin->validation_rules());	   
	   if ($this->form_validation->run()) {
	   $data_array = array();  
	   $data_array['first_name'] = $this->input->post('first_name',true);
	   $data_array['last_name'] = $this->input->post('last_name',true);
	   $data_array['gender'] = $this->input->post('gender',true);
	   $data_array['country'] = $this->input->post('country',true);
	   $data_array['tele'] = $this->input->post('tele',true);
	   $data_array['admin_role'] = $this->input->post('admin_role',true);
	   if($this->input->post('password',true) != "")
	   $data_array['password'] = md5($this->input->post('password',true));
	   $this->Model_admin->save($id, $data_array);
	   $this->session->set_flashdata('alert_success',lang('admin_edit_success'));
       redirect('admins/index');
	   }        
	   $admin = $this->db->where('admin_id',$id)->get('admins')->row();
       $data['admin'] = $admin;
          	   
	   $this->layout->load_layout('admins/edit',$data);
}


public function delete($id){

$this->load->model('admins/Model_admin');
if($id > 1){
$id = $this->Model_admin->delete($id);
$this->session->set_flashdata('alert_success',lang('admin_delete_success'));
}
redirect('admins/index');
}

function check_email(){
$email = $this->input->post('email',true);
$admin = $this->db->where('admin_email',$email)->get('admins')->row();	
if($admin)echo json_encode(false);
else echo json_encode(true);	
}

}


