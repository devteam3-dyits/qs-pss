<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                
                    <h2><strong>Edit Proposal</strong> </h2>
                </div>
                <!-- END Horizontal Form Title -->
                 <?php if(validation_errors()){?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo validation_errors(); ?>
										</div>
				
				<?php } elseif(isset($error)){ ?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $error; ?>
										</div>
				<?php } ?>
               
                <!-- Horizontal Form Content -->
                <form id="form-proposal" action="<?php echo site_url('dash_proposals/edit/'.$proposal->proposal_id); ?>" method="post" class="form-horizontal form-bordered" >
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
					
					 <div class="form-group"  id="track_div"  <?php //if($proposal->session_format == 'Panel') echo ' style="display:none" '; ?>>
                        <label class="col-md-3 control-label" for="session_format">Session Track</label>
                        <div class="col-md-9">
                             <select id="session_track" name="session_track" class="form-control">
							<option value="">Select Track</option>
							<?php
							if($proposal->session_format != 'Panel'){
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
							?>
							
							<option value="<?php echo $i; ?>" <?php if($proposal->session_track == $i) echo 'selected="selected" '; ?>>Track<?php echo $i; ?></option>
							<?php 
						   }
							}
						   ?>
							
							</select>
                            
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="session_format">Presentation Abstract (max 150 word)</label>
                        <div class="col-md-9">
                            <textarea id="presentation"  rows="9"  name="presentation" class="form-control" placeholder="Enter Presentation Abstract"><?php echo $proposal->presentation; ?></textarea>
                            
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="session_format">Additional Remarks (max 150 word)</label>
                        <div class="col-md-9">
                            <textarea id="remark"  rows="5"  name="remark" class="form-control" placeholder="Enter Addition Remarks"><?php echo $proposal->remark; ?></textarea>
                            
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"> Save</button>
                             <button type="button" class="btn btn-sm btn-warning cancel" data-href="<?php echo site_url('dash_proposals/index'); ?>">Cancel</button>
                     
                        </div>
                    </div>
                </form>
                <!-- END Horizontal Form Content -->
            </div>
			
			
