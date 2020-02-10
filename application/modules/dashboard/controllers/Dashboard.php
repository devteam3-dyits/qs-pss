<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Dashboard extends Controller  {
public function index(){
$data = array();
$user_id = $this->session->userdata('user_id');
$this->layout->load_layout('dashboard/index',$data);	
}

}


