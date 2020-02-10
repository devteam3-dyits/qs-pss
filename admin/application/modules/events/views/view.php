<?php if($this->session->flashdata('alert_success')){ ?>
                    <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('alert_success'); ?>
										
										</div>
				<?php }elseif($this->session->flashdata('alert_error')){ ?>
                    <div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('alert_error'); ?>
										
										</div>
				<?php }elseif(validation_errors()){?>
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

<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                   
                    <h2><strong>View Event - <?php echo $event->event_name; ?></strong> </h2>
                </div>
<table class="table table-bordered">
 <tr>
 <td>Track Details</td>
 <td> <?php echo $event->track_details; ?></th>
 </tr>
 </table>
 <strong>Assigned Committee Members : </strong> <br/> <br/>
 <table class="table table-bordered">
 <tr>
 <th width="20%">Committee Member</th>
 <th>Track</th>
 <th>Action</th>
 </tr>
 <?php 
 if($assigned_cms){
	 foreach($assigned_cms as $acm){
?>
<tr>
 <td>		 
 <?php echo $acm->first_name.' '.$acm->last_name; ?> <br/>
 </td>
 <td>		 
 <?php if($acm->track == 500) echo'All'; else echo $acm->track; ?> <br/>
 </td>
 <td>		 
 <a href="<?php echo site_url('events/remove_assign/'.$event->event_id.'/'.$acm->cm_assign_id); ?>" ><i class="fa fa-trash"></i></a>
 </td>
</tr>
 <?php }
 }
 ?> 
 
 
 </table>
 
 <?php if($event->enabled == 0){ ?>
 <a href="<?php echo site_url('events/enable/'.$event->event_id); ?>" class="btn btn-primary" >Enable</a>
 
 <?php }else{ ?>
 <a href="<?php echo site_url('events/disable/'.$event->event_id); ?>" class="btn btn-danger" >Disable</a>
 
 <?php } ?>
 </div>


<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                   
                    <h2><strong>Assign Committee Member</strong> </h2>
                </div>			   
                <!-- END Horizontal Form Title -->
				
              
			   
                <form id="form-assign" action="<?php echo site_url('events/assign/'.$event->event_id); ?>" method="post" class="form-horizontal form-bordered" >
                   
					<div class="form-group">
                        <label class="col-md-3 control-label" for="committee_member">Assign Committee Member</label>
                        <div class="col-md-9">
                            <select type="text" id="cm_id" name="cm_id" class="form-control"  
							 required>
							 <option value="" >Select Committee member</option>
							 <?php 
							 if($committee_members){
								 foreach($committee_members as $cm){
							 ?>
							<option value="<?php echo $cm->user_id; ?>"><?php echo $cm->first_name; ?> <?php echo $cm->last_name; ?></option>
								 <?php }
							 } 
							 ?>
							</select>
                            
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="committee_member">Select Track</label>
                        <div class="col-md-9">
                            <select type="text" id="track" name="track" class="form-control"  
							 required>
							 <option value="" >Select track</option>
							  <option value="500" >All</option>
                            <?php
   							 if(sizeof($tracks_dropdown) > 0){
                             foreach($tracks_dropdown as $track){
                            ?>								 
							<option value="<?php echo $track; ?>">Track<?php echo $track; ?></option>
							<?php
							 }
							 }
							 ?>
							</select>
                            
                        </div>
                    </div>
                    
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"> Save</button>
                            <button type="button" class="btn btn-sm btn-warning cancel" data-href="<?php echo site_url('events/index'); ?>">Cancel</button>
                       
                        </div>
                    </div>
                </form>
                <!-- END Horizontal Form Content -->
           
            </div>
			

<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                   
                    <h2><strong>Turn on/off tracks</strong> </h2>
                </div>			   
                
              
			   
                <form id="form-assign" action="<?php echo site_url('events/turn_off_tracks/'.$event->event_id); ?>" method="post" class="form-horizontal form-bordered" >
                   
					<?php
					
					$track_count = $this->db->get('settings')->row()->track_count;
					for($i=1;$i<=$track_count;$i++){
					?>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Track  <?php echo $i; ?></label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="track<?php echo $i; ?>">
                                <input type="radio" id="track<?php echo $i; ?>" name="track<?php echo $i; ?>" value="<?php echo $i; ?>" <?php if(!in_array($i,$tracks))echo 'checked'; ?>> On
                            </label>
                            <label class="radio-inline" for="track<?php echo $i; ?>2">
                                <input type="radio" id="track<?php echo $i; ?>2" name="track<?php echo $i; ?>" value="0" <?php if(in_array($i,$tracks))echo 'checked'; ?>> Off
                            </label>
                            <label class="radio-inline" for="track_limit<?php echo $i; ?>3">
							<input type="text" id="track_limit<?php echo $i; ?>3" name="track_limit<?php echo $i; ?>" value="<?php if(isset($tracks_limit[$i])) echo $tracks_limit[$i]; else echo "0"; ?>" /> 
                           
							</label>
                        </div>
                    </div>
					
					<?php } ?>
				

                    
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-2" style="padding-left:25px">
                            <button type="submit" class="btn btn-sm btn-primary"> Save</button>
                            <button type="button" class="btn btn-sm btn-warning cancel" data-href="<?php echo site_url('events/index'); ?>">Cancel</button>
                       
                        </div>
                    </div>
                </form>
                <!-- END Horizontal Form Content -->
           
            </div>
			
			
