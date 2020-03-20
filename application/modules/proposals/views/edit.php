
<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                
                    <h2><strong>Edit Proposal</strong> </h2>
                </div>
                <!-- END Horizontal Form Title -->
                <?php if($this->session->flashdata('alert_success')){ ?>
                    <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
										<?php echo $this->session->flashdata('alert_success'); ?>
										
										</div>
				<?php }elseif($this->session->flashdata('alert_error')){ ?>
                    <div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
										<?php echo $this->session->flashdata('alert_error'); ?>
										
										</div>
				<?php }elseif(validation_errors()){?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
										<?php echo validation_errors(); ?>
										</div>
				
				<?php } elseif(isset($error)){ ?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
										<?php echo $error; ?>
										</div>
				<?php } ?>
               
                <!-- Horizontal Form Content -->
                <form id="form-proposal" action="<?php echo site_url('proposals/edit/'.$proposal->proposal_id); ?>" method="post" class="form-horizontal form-bordered" >
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="event_id">Events</label>
                        <div class="col-md-9">
                            <select id="event_id" name="event_id" class="form-control">
							<option value="">Select Event</option>
							<?php
							if($events){
								foreach($events as $event){
							if($proposal->event_id == $event->event_id)$selected = ' selected="selected" ';
							else $selected = '';
							echo '<option value="'.$event->event_id.'" '.$selected.'>'.$event->event_name.'</option>';
								}
							}
							?>
							
							</select>
                        </div>
                    </div>
					
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="proposal_title">Proposal Title</label>
                        <div class="col-md-9">
                            <input type="text" id="proposal_title" name="proposal_title" class="form-control" placeholder="Enter Title" 
							value="<?php echo $proposal->proposal_title; ?>">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="session_format">Session Format</label>
                        <div class="col-md-9">
                            <select id="session_format" name="session_format" class="form-control">
							<option value="">Select Format</option>
							<option value="Presentation" <?php if($proposal->session_format == 'Presentation') echo 'selected="selected" '; ?>>Presentation</option>
							<option value="Panel" <?php if($proposal->session_format == 'Panel') echo 'selected="selected" '; ?>>Panel</option>
							</select>
                        </div>
                    </div>
                    
                    	<div class="form-group">
                        <label class="col-md-3 control-label" for="session_format">No. of Co-presenters</label>
                        <div class="col-md-9">
                            <select id="max_cop" name="max_cop" class="form-control">
							<option value="">None</option>
							<option value="1"  <?php if($proposal->max_cop == 1) echo 'selected="selected" '; ?>>1</option>
							<option value="2"  <?php if($proposal->max_cop == 2) echo 'selected="selected" '; ?>>2</option>
							<option value="3"  <?php if($proposal->max_cop == 3) echo 'selected="selected" '; ?>>3</option>
							</select>
                        </div>
                    </div>
					
					
    <div class="row" id="cop_div" <?php if($proposal->max_cop <= 0) echo 'style="display:none"'; ?> >
    	<div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li  id="tab1" class="active" <?php if($proposal->max_cop >= 1) echo 'style="display:block" '; else echo 'style="display:none" ';  ?>><a href="#tab1default" data-toggle="tab"  >Co-presenter 1 </i></a></li>
                            <li id="tab2"  <?php if($proposal->max_cop >= 2) echo 'style="display:block" ';  else echo 'style="display:none" '; ?>><a href="#tab2default" data-toggle="tab"  >Co-presenter 2</a></li>
                            <li id="tab3"  <?php if($proposal->max_cop == 3) echo 'style="display:block" '; else echo 'style="display:none" ';  ?> ><a href="#tab3default" data-toggle="tab"  >Co-presenter 3</a></li>
                           
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
					<?php for($i=1;$i<=3;$i++){ ?>
                        <div class="tab-pane fade <?php if($i == 1) echo 'in active'; ?>" id="tab<?php echo $i; ?>default">
                            
                            <?php  if(isset($cops[$i-1]->co_present_id)) { ?><a href="<?php echo site_url('proposals/remove_cop/'.$cops[$i-1]->co_present_id);  ?>" class="btn btn-default">Remove This Co-Presenter</a><?php } ?>
						 <div class="form-group">
                <label class="col-md-3 control-label" for="salutation<?php echo $i; ?>">Salutation</label>
                     <div class="col-md-9">
                       <input type="text" id="salutation<?php echo $i; ?>" name="salutation<?php echo $i; ?>" value="<?php if(isset($cops[$i-1]->salutation)) echo $cops[$i-1]->salutation; ?>" class="form-control input-lg" placeholder="Salutation">
                    </div>
                </div>
          
            <div class="form-group">
                <label class="col-md-3 control-label" for="session_format">First Name</label>
                     <div class="col-md-9">
                         <input type="text" id="first_name<?php echo $i; ?>" name="first_name<?php echo $i; ?>" value="<?php if(isset($cops[$i-1]->first_name)) echo $cops[$i-1]->first_name; ?>"  class="form-control" placeholder="Firstname">
                    </div>
                </div>
               
          
			 <div class="form-group">
			 <label class="col-md-3 control-label" for="session_format">Last Name</label>
				  <div class="col-md-9">
				    <input type="text" id="last_name" name="last_name<?php echo $i; ?>" value="<?php if(isset($cops[$i-1]->first_name)) echo $cops[$i-1]->last_name; ?>" class="form-control" placeholder="Lastname">
                </div>
				</div>
			
            <div class="form-group">
                <label class="col-md-3 control-label" for="session_format">Email Address</label>
                     <div class="col-md-9">
                        
                        <input type="text" id="email<?php echo $i; ?>" name="email<?php echo $i; ?>"  value="<?php if(isset($cops[$i-1]->email)) echo $cops[$i-1]->email; ?>" class="form-control" placeholder="Email Address">
                    </div>
                </div>
          
		
			<div class="form-group">
                        <label class="col-md-3 control-label">Gender</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="gender1">
                                <input type="radio" id="gender1<?php echo $i; ?>" name="gender<?php echo $i; ?>"  <?php if(isset($cops[$i-1]->gender)) echo ($cops[$i-1]->gender == 'Male' ? 'selected="selected"' : ''); ?>  value="Male" checked> Male
                            </label>
                            <label class="radio-inline" for="gender2">
                                <input type="radio" id="gender2<?php echo $i; ?>" name="gender<?php echo $i; ?>" <?php if(isset($cops[$i-1]->gender)) echo ($cops[$i-1]->gender == 'Female' ? 'selected="selected"' : ''); ?>  value="Female"> Female
                            </label>
                           
                        </div>
                    </div>
		
			<div class="form-group">

                         <label class="col-md-3 control-label" for="session_format">Job Title / Designation*</label>
                         <div class="col-md-9">
                        <input type="text" id="job_title<?php echo $i; ?>" name="job_title<?php echo $i; ?>" class="form-control" value="<?php if(isset($cops[$i-1]->job_title)) echo $cops[$i-1]->job_title; ?>"  placeholder="Job Title / Designation*"  >
                   </div>
			</div>	
 <div class="form-group">
                        <label class="col-md-3 control-label" for="session_format">University / Organization / Affiliation*</label>
                         <div class="col-md-9">
                        <input type="text" id="university<?php echo $i; ?>" name="university<?php echo $i; ?>" class="form-control" value="<?php if(isset($cops[$i-1]->university)) echo $cops[$i-1]->university; ?>"   placeholder="University / Organization / Affiliation*" >
                    </div>
			</div>

<div class="form-group">
                         <label class="col-md-3 control-label" for="session_format">Department*</label>
                         <div class="col-md-9">
                        <input type="text" id="department<?php echo $i; ?>" name="department<?php echo $i; ?>" class="form-control"  value="<?php if(isset($cops[$i-1]->department)) echo $cops[$i-1]->department; ?>"  placeholder="Department*">
                    </div>
			</div>
<div class="form-group">
                         <label class="col-md-3 control-label" for="session_format">Mailing Address*</label>
                         <div class="col-md-9">
                        <input type="text" id="mail<?php echo $i; ?>" name="mail<?php echo $i; ?>" class="form-control"  value="<?php if(isset($cops[$i-1]->mail)) echo $cops[$i-1]->mail; ?>"   placeholder="Mailing Address*">
                    </div>
			</div>	
<div class="form-group">
                         <label class="col-md-3 control-label" for="session_format">Summary Biography*</label>
                       <div class="col-md-9">  
                       <textarea id="summary<?php echo $i; ?>" name="summary<?php echo $i; ?>" rows="9" class="form-control"  placeholder="Summary Biography*"><?php if(isset($cops[$i-1]->summary)) echo $cops[$i-1]->summary; ?></textarea>
                    </div>
			</div>

			</div>
			 <input type="hidden" id="co_present_id<?php echo $i; ?>"  name="co_present_id<?php echo $i; ?>" value="<?php if(isset($cops[$i-1]->co_present_id)) echo $cops[$i-1]->co_present_id; ?>"   />
                  
                    <?php } ?>    
                    </div>
                </div>
            </div>
        </div>
		
		</div>


					
					 <div class="form-group"  id="track_div"  <?php //if($proposal->session_format == 'Panel') echo ' style="display:none" '; ?>>
                        <label class="col-md-3 control-label" for="session_format">Session Track</label>
                        <div class="col-md-9">
                             <select id="session_track" name="session_track" class="form-control">
							<option value="">Select Track</option>
							<?php
						//	if($proposal->session_format != 'Panel'){
							$track_Statuses = $this->db->where('event_id',$proposal->event_id)->get('track_statuses')->result();

	                        $tracks = array();
	                        if($track_Statuses){
		                    foreach($track_Statuses as $track_Status){
			                 $tracks[] =  $track_Status->track;
			 
		                     } 
		   
	                      }						
							
							$old_track = $proposal->session_track;	
							$track_count = $this->db->get('settings')->row()->track_count;
					       for($i=1;$i<=$track_count;$i++){
					       
 $row = $this->db->query('select `plimit` from track_limits where event_id = '.$proposal->event_id.' and track = '.$i)->row();
      if($row)$limit = $row->plimit; 
      else $limit = 0;
      
      $row = $this->db->query('select count(proposal_id) as proposal_count from proposals where event_id = '.$proposal->event_id.' and session_track = '.$i)->row();
      if($row)$proposal_count = $row->proposal_count; 
      else $proposal_count = 0;	  
      
					       
							?>
							<?php       if(!in_array($i,$tracks) || ($old_track == $i)){ ?>
							<option value="<?php echo $i; ?>" <?php if($proposal->session_track == $i) echo 'selected="selected" '; ?>>Track <?php echo $i;  if($limit <= $proposal_count && $old_track != $i) echo " - Full";  ?></option>
							<?php }
						   }
						//	}
						   ?>
							
							</select>
							<?php
							$event = $this->db->where('event_id',$proposal->event_id)->get('events')->row();
							if(trim($event->track_details) != ''){
							?>
							
                          	<p id="track_details"><a href="<?php echo $event->track_details; ?>" target="_blank"   >Track details</a></p> 
                       <p id="tracks_full" > <?php echo $tracks_full; ?>
							</p>
                          	  	
                          	
                          	<?php } ?>
                        </div>
                    </div>
					<input type="hidden" id="old_track" value="<?php echo $proposal->session_track; ?>" />
					<input type="hidden" id="old_event" value="<?php echo $proposal->event_id; ?>" />
					<div class="form-group">
                        <label class="col-md-3 control-label" for="session_format">Presentation Abstract (max 150 word)</label>
                        <div class="col-md-9">
                            <textarea id="presentation"  rows="9"  name="presentation" class="form-control" placeholder="Enter Presentation Abstract"><?php echo $proposal->presentation; ?></textarea>
                            
                        </div>
                    </div>
                          <div class="form-group">
                                                <label class="col-md-3 control-label">Tags</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="tags" name="tags" class="input-tags" value="<?php echo $proposal->tags; ?>" />
                                                </div>
                    </div>
                     <div class="form-group">
                                                <label class="col-md-3 control-label">Target Audience</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="target_audience" name="target_audience" class="input-tags" value="<?php echo $proposal->target_audience; ?>" />
                                                </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="session_format">Additional Remarks (max 150 word)</label>
                        <div class="col-md-9">
                            <textarea id="remark"  rows="5"  name="remark" class="form-control" 
                            placeholder="Enter Addition Remarks"><?php echo $proposal->remark; ?>
                            </textarea>           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="allow_share">
                            Allow QS to share my presentaion on official event website</label>
                        <div class="col-md-9">
                            <select id="allow_share" name="allow_share" class="form-control" required>
                                <?php
                                    if($proposal->allow_share == 0){?>
                                        <option value="0" selected>No</option>
							            <option value="1">Yes</option>
                                   <?php }else if($proposal->allow_share == 1){?>
                                        <option value="1" selected>Yes</option>
                                        <option value="0">No</option>
							            
                                   <?php
                                }?>
							    
							</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="session_format">Video Link</label>
                        <div class="col-md-9">
                            <input type="text" id="video_url" name="video_url" class="form-control" 
                                value="<?php echo $proposal->video_url; ?>" required/>                            
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"> Save</button>
                            <button type="button" class="btn btn-sm btn-warning cancel" data-href="<?php echo site_url('proposals/index'); ?>">Cancel</button>
                     
                        </div>
                    </div>
                </form>
                <!-- END Horizontal Form Content -->
            </div>
			
			
