<?php


if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Proposals extends Controller
{
	public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$this->db->where('proposer_id', $user_id);
		$this->db->join('events', 'events.event_id=proposals.event_id');
		$this->db->select('proposals.*,events.event_name');
		$data['proposals'] = $this->db->get('proposals')->result();
		$this->layout->load_layout('proposals/index', $data);
	}



	public function add()
	{	
		$data = array();
		

		$this->load->model('proposals/Model_proposal');
		$this->load->model('proposals/Model_cop');

		$this->form_validation
			->set_rules($this->Model_proposal->validation_rules());

			if ($this->form_validation->run()) {
				$data_array = array();  
				$data_array['event_id'] = $this->input->post('event_id',true);
				$data_array['session_track'] = $this->input->post('session_track',true);
				$cms = $this->db->where('event_id', $data_array['event_id'])
				->where('track', $data_array['session_track'])
				->select('cm_id')->get('cm_assignments')->result();
				$max = sizeof($cms)-1;
				$min = 0;
				$rand = rand($min,$max);
				$data_array['assigned_cm'] = $cms[$rand]->cm_id;
				$data_array['proposal_title'] = $this->input->post('proposal_title',true);
				$data_array['session_format'] = $this->input->post('session_format',true);
				
				 $data_array['presentation'] = $this->input->post('presentation',true);
				$data_array['remark'] = $this->input->post('remark',true);	
				$data_array['allow_share'] = $this->input->post('allow_share', true);
				$data_array['video_url'] = $this->input->post('video_url', true);
				$data_array['max_cop'] = $this->input->post('max_cop',true);
				$data_array['tags'] = $this->input->post('tags',true);	
				$data_array['target_audience'] = $this->input->post('target_audience',true);	
				$not_queued = $this->check_track($data_array['event_id'],$data_array['session_track']);
				if( $not_queued == false)  $data_array['status'] = 4;
			   
				$proposal_id = $this->Model_proposal->save(NULL, $data_array);
				
				$max_cop = $data_array['max_cop'];
				for($i=1;$i<=$max_cop;$i++){
				$cdata_array = array();  
				$cdata_array['salutation'] = $this->input->post('salutation'.$i);
				$cdata_array['first_name'] = $this->input->post('first_name'.$i,true);
				$cdata_array['last_name'] = $this->input->post('last_name'.$i,true);
				$cdata_array['gender'] = $this->input->post('gender'.$i,true);
				$cdata_array['email'] = $this->input->post('email'.$i,true);
				$cdata_array['job_title'] = $this->input->post('job_title'.$i,true);
				$cdata_array['university'] = $this->input->post('university'.$i,true);
				$cdata_array['department'] = $this->input->post('department'.$i,true);
				$cdata_array['mail'] = $this->input->post('mail'.$i,true);
				$cdata_array['summary'] = $this->input->post('summary'.$i,true);
				$cdata_array['proposal_id'] = $proposal_id;
				$id = $this->Model_cop->save(NULL, $cdata_array);
				
				}	   
				if( $not_queued == true) {
				 $this->Model_proposal->sendConfirmEmail($data_array);    
				$this->session->set_flashdata('alert_success',lang('proposal_add_success'));
				}
				else {
					 $this->Model_proposal->sendQueuedEmail($data_array);
					$this->session->set_flashdata('alert_success',lang('proposal_add_queued'));
				}
				redirect('proposals/index');
		 
				}
		 $data = array();
		 $data['events'] = $this->db->where('enabled','1')->where('open','1')->get('events')->result();		    
		 $this->layout->load_layout('proposals/add',$data);

	}

	public function view($id)
	{

		$user_id = $this->session->userdata('user_id');
		$this->db->join('events', 'events.event_id=proposals.event_id');
		$this->db->select('proposals.*,events.event_name');
		$proposal = $this->db->where('proposal_id', $id)->get('proposals')->row();

		if (!$proposal) {
			$this->session->set_flashdata('alert_error', 'Proposal not found');
			redirect('proposals/index');
		}
		if ($proposal->proposer_id  != $user_id) {
			$this->session->set_flashdata('alert_error', 'This Proposal not belongs to you');
			redirect('proposals/index');
		}
		$data['proposal'] = $proposal;
		$data['cops'] = $this->db->where('proposal_id', $proposal->proposal_id)->get('co_presenters')->result();
		$this->db->where('proposal_id', $id);
		$this->db->join('users', 'users.user_id=comments.cm_id');
		$this->db->select('comments.*,users.first_name,users.last_name');
		$data['comments'] = $this->db->get('comments')->result();
		$this->layout->load_layout('proposals/view', $data);
	}
	public function track_details($event_id)
	{

		$event = $this->db->where('event_id', $event_id)->get('events')->row();
		if (trim($event->track_details) != '')
			echo '<a href="https://' . $event->track_details . '" target="_blank" >Track details</a>';
	}
	public function edit($id)
	{

		$user_id = $this->session->userdata('user_id');
		$proposal = $this->db->where('proposal_id', $id)->get('proposals')->row();
		if ($proposal->proposer_id  != $user_id) {
			$this->session->set_flashdata('alert_error', 'This Proposal not belongs to you');
			redirect('proposals/index');
		}

		if ($proposal->status  != 0 && $proposal->status  != 2) {
			$this->session->set_flashdata('alert_error', 'Access denied');
			redirect('proposals/index');
		}
		$this->load->model('proposals/Model_cop');
		$this->load->model('proposals/Model_proposal');
		$this->form_validation->set_rules($this->Model_proposal->validation_rules());
		if ($this->form_validation->run()) {
			$data_array = array();
			$data_array['event_id'] = $this->input->post('event_id', true);
			$data_array['proposal_title'] = $this->input->post('proposal_title', true);
			$data_array['session_format'] = $this->input->post('session_format', true);
			$data_array['session_track'] = $this->input->post('session_track', true);
			$data_array['presentation'] = $this->input->post('presentation', true);
			$data_array['remark'] = $this->input->post('remark', true);
			$data_array['status'] = 0;
			$data_array['max_cop'] = $this->input->post('max_cop', true);
			$data_array['tags'] = $this->input->post('tags', true);
			$data_array['target_audience'] = $this->input->post('target_audience', true);

			if ($data_array['event_id'] != $proposal->event_id || $data_array['session_track'] != $proposal->session_track) {

				$cms = $this->db->where('event_id', $data_array['event_id'])
					->where('track', $data_array['session_track'])
					->select('cm_id')->get('cm_assignments')->result();
				$max = sizeof($cms) - 1;
				$min = 0;
				$rand = rand($min, $max);
				$data_array['assigned_cm'] = $cms[$rand]->cm_id;
			}

			$not_queued = $this->check_track($data_array['event_id'], $data_array['session_track']);
			$old_event_id = $this->input->post('old_event_id', true);
			$old_track = $this->input->post('old_track', true);
			$old_status = $this->input->post('old_status', true);

			$not_limit_already = ($old_event_id ==  $data_array['event_id'] && $old_track ==  $data_array['session_track'] && $old_status != 4);

			if ($not_queued == false  && !$not_limit_already)  $data_array['status'] = 4;

			$this->Model_proposal->save($id, $data_array);

			$max_cop = $data_array['max_cop'];
			for ($i = 1; $i <= 3; $i++) {

				if ($this->input->post('co_present_id' . $i, true) > 0) $this->Model_cop->delete($this->input->post('co_present_id' . $i, true));
				if ($i >  $max_cop) break;
				$cdata_array = array();
				$cdata_array['salutation'] = $this->input->post('salutation' . $i);
				$cdata_array['first_name'] = $this->input->post('first_name' . $i, true);
				$cdata_array['last_name'] = $this->input->post('last_name' . $i, true);
				$cdata_array['gender'] = $this->input->post('gender' . $i, true);
				$cdata_array['email'] = $this->input->post('email' . $i, true);
				$cdata_array['job_title'] = $this->input->post('job_title' . $i, true);
				$cdata_array['university'] = $this->input->post('university' . $i, true);
				$cdata_array['department'] = $this->input->post('department' . $i, true);
				$cdata_array['mail'] = $this->input->post('mail' . $i, true);
				$cdata_array['summary'] = $this->input->post('summary' . $i, true);
				$cdata_array['proposal_id'] = $id;

				$this->Model_cop->save(NULL, $cdata_array);
			}

			if ($not_queued == false && !$not_limit_already)
				$this->session->set_flashdata('alert_success', lang('proposal_edit_success'));
			else $this->session->set_flashdata('alert_success', lang('proposal_add_queued'));
			redirect('proposals/index');
			// }      
		}

		$data['proposal'] = $proposal;
		$data['tracks_full'] = $this->filled_tracks($proposal->event_id, true, $proposal->session_track);
		$data['cops'] = $this->db->where('proposal_id', $proposal->proposal_id)->order_by('co_present_id', 'asc')->get('co_presenters')->result();
		$data['events'] = $this->db->get('events')->result();
		$this->layout->load_layout('proposals/edit', $data);
	}


	public function delete($id)
	{
		$user_id = $this->session->userdata('user_id');
		$proposal = $this->db->where('proposal_id', $id)->get('proposals')->row();
		if ($proposal->proposer_id  != $user_id) {
			$this->session->set_flashdata('alert_error', 'This Proposal not belongs to you');
			redirect('proposals/index');
		}
		$this->load->model('proposals/Model_proposal');
		$id = $this->Model_proposal->delete($id);
		$this->session->set_flashdata('alert_success', lang('proposal_delete_success'));
		redirect('proposals/index');
	}

	public function remove_cop($id)
	{
		$cop = $this->db->where('co_present_id', $id)->get('co_presenters')->row();
		$user_id = $this->session->userdata('user_id');
		$proposal = $this->db->where('proposal_id', $cop->proposal_id)->get('proposals')->row();
		if ($proposal->proposer_id  != $user_id) {
			$this->session->set_flashdata('alert_error', 'This Proposal not belongs to you');
			redirect('proposals/index');
		}
		$this->load->model('proposals/Model_cop');
		$id = $this->Model_cop->delete($id);
		$this->db->where('proposal_id', $proposal->proposal_id)->update('proposals', array('max_cop' => $proposal->max_cop - 1));
		$this->session->set_flashdata('alert_success', lang('cop_delete_success'));
		redirect('proposals/edit/' . $proposal->proposal_id);
	}

	public function check_tracks()
	{
		$event_id = $this->input->post('event_id', true);
		$old_event = $this->input->post('old_event', true);
		$old_track = $this->input->post('old_track', true);

		echo '<option value="">Select Track</option>';
		$track_Statuses = $this->db->where('event_id', $event_id)->get('track_statuses')->result();

		$tracks = array();
		if ($track_Statuses) {
			foreach ($track_Statuses as $track_Status) {
				$tracks[] =  $track_Status->track;
			}
		}

		$track_count = $this->db->get('settings')->row()->track_count;
		for ($i = 1; $i <= $track_count; $i++) {

			$row = $this->db->query('select `plimit` from track_limits where event_id = ' . $event_id . ' and track = ' . $i)->row();
			if ($row) $limit = $row->plimit;
			else $limit = 0;

			$row = $this->db->query('select count(proposal_id) as proposal_count from proposals where event_id = ' . $event_id . ' and session_track = ' . $i)->row();
			if ($row) $proposal_count = $row->proposal_count;
			else $proposal_count = 0;


			if (!in_array($i, $tracks)) {

				if ($proposal_count < $limit)
					$fullmsg = "";
				else $fullmsg = "<b style='color:red'> - Full</b>";

				echo '<option value="' . $i . '">Track ' . $i . ' ' . $fullmsg . '</option>';
			}
		}
	}

	/*
public function check_track($event_id,$track){
	
	 $track_Statuses = $this->db->where('event_id',$event_id)->get('track_statuses')->result();

	   $tracks = array();
	   if($track_Statuses){
		 foreach($track_Statuses as $track_Status){
			$tracks[] =  $track_Status->track;
		 } 
		   
	   }
	  

	$row = $this->db->query('select `plimit` from track_limits where event_id = '.$event_id.' and track = '.$track)->row();
	if($row)$limit = $row->plimit; 
    else $limit = 0;

      $row = $this->db->query('select count(proposal_id) as proposal_count from proposals where event_id = '.$event_id.' and session_track = '.$track)->row();
      if($row)$proposal_count = $row->proposal_count; 
      else $proposal_count = 0;	  
	  
     // if((!in_array($i,$tracks) && $proposal_count < $limit)  ) return true;
      
     
      if((!in_array($track,$tracks) && $proposal_count < $limit)  )  return true;
		
		
		 return false;
}
*/

	public function check_track($event_id, $track)
	{

		$track_Statuses = $this->db->where('event_id', $event_id)->get('track_statuses')->result();

		$tracks = array();
		if ($track_Statuses) {
			foreach ($track_Statuses as $track_Status) {
				$tracks[] =  $track_Status->track;
			}
		}


		$row = $this->db->query('select `plimit` from track_limits where event_id = ' . $event_id . ' and track = ' . $track)->row();
		if ($row) $limit = $row->plimit;
		else $limit = 0;

		$row = $this->db->query('select count(proposal_id) as proposal_count from proposals where event_id = ' . $event_id . ' and session_track = ' . $track)->row();
		if ($row) $proposal_count = $row->proposal_count;
		else $proposal_count = 0;

		// if((!in_array($i,$tracks) && $proposal_count < $limit)  ) return true;


		if ((!in_array($track, $tracks) && $proposal_count < $limit))  return true;


		return false;
	}

	public function filled_tracks($event_id, $sp = false, $old_track = 0)
	{
		//$event_id = $this->input->post('event_id',true);
		//$old_event = $this->input->post('old_event',true);
		//$old_track = $this->input->post('old_track',true);


		$track_Statuses = $this->db->where('event_id', $event_id)->get('track_statuses')->result();

		$tracks = array();
		if ($track_Statuses) {
			foreach ($track_Statuses as $track_Status) {
				$tracks[] =  $track_Status->track;
			}
		}
		$output = "";
		$track_count = $this->db->get('settings')->row()->track_count;
		for ($i = 1; $i <= $track_count; $i++) {

			$row = $this->db->query('select `plimit` from track_limits where event_id = ' . $event_id . ' and track = ' . $i)->row();
			if ($row) $limit = $row->plimit;
			else $limit = 0;

			$row = $this->db->query('select count(proposal_id) as proposal_count from proposals where event_id = ' . $event_id . ' and session_track = ' . $i)->row();
			if ($row) $proposal_count = $row->proposal_count;
			else $proposal_count = 0;


			if ((!in_array($i, $tracks) && $proposal_count >= $limit) && $old_track != $i)
				$output .= '<strong style="color:red">Track ' . $i . ' - Full</strong><br/>';
		}

		if ($sp == true) return $output;
		else echo $output;
	}

	public function upload_file()
	{
		
	}
}
