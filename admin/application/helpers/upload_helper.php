<?php
function do_upload($field_name,$path)
	{  $CI = &get_instance();
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1024';
		$config['max_width']  = '99999';
		
		$config['max_height']  = '999999';


		$CI->load->library('upload', $config);
		$CI->upload->initialize($config);

		if ( ! $CI->upload->do_upload($field_name))
		{   $error = $CI->upload->display_errors();
		
			$error = "$field_name Field: ".$error;
			return $error;
		}
		return false;
	}


?>