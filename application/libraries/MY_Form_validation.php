<?php

class MY_Form_validation extends CI_Form_validation {

 function __construct($rules = array()) {
    parent::__construct($rules);

    $this->ci = & get_instance();
    $this->ci->load->database();
}


function is_password_strong($password)
{

   if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password)) {
     return TRUE;
   }
   return FALSE;
}

function check_answer($answer)
{
$email = $this->ci->session->userdata('email');
$user = $this->ci->db->where('email',$email)->get('user')->row();
   if (trim($answer) != trim($user->sec_answer)) {
   $this->ci->form_validation->set_message('check_answer', 'Incorrect answer');
     return FALSE;
   }
   return TRUE;
}

function email_exists($email)
{

$user = $this->ci->db->where('email',$email)->get('user')->row();
   if (!$user) {
   $this->ci->form_validation->set_message('email_exists', 'Email address not found');
     return FALSE;
   }
   return TRUE;
}


}

?>