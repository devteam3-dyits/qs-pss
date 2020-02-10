<?php
function sendEmail($email,$subject,$message,$attach = false){

  $CI = &get_instance();
  $config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'mail.qsglobalevents.com', 
    'smtp_port' => 587,
    'smtp_user' => 'pss@qsglobalevents.com',
    'smtp_pass' => 'Y-F{?Ke#ou${', 
    'mailtype'  => 'html', 
    'charset'   => 'iso-8859-1'
);
 $CI->load->library('email', $config);
 $CI->email->set_newline("\r\n");

// Set to, from, message, etc.
 $CI->email->from($CI->config->item('admin_email'), $CI->config->item('admin_from_name'));
  $CI->email->to($email); 
 $CI->email->subject($subject);
  if($attach){
  $path = set_realpath('uploads/temp/');
  
  $CI->email->attach( $path.$attach);
    
  }
  $CI->email->message($message);  
$r = $CI->email->send();
  
   if (!$r)
  $CI->email->print_debugger();
 }


?>