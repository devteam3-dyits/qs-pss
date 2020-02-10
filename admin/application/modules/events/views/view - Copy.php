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
				
 <strong>Assigned Committee Members : </strong> <br/> <br/>
 <table class="table table-bordered">
 <tr>
 <th width="20%">Committee Member</th>
 <th>Track</th>
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
 <?php echo $acm->track; ?> <br/>
 </td>
</tr>
 <?php }
 }
 ?> 
 </table>
 </div>


<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                   
                    <h2><strong>Assign Committee Member</strong> </h2>
                </div>			   
                <!-- END Horizontal Form Title -->
				
              
			   
                <form id="form-assign" action="<?php echo site_url('events/assign/'.$event->event_id); ?>" method="post" class="form-horizontal form-bordered" >
                   
					<div class="form-group">
                        <label class="col-md-3 control-label" for="committee_member">Assign Committee Memeber</label>
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
							<option value="1">Track1</option>
							<option value="2">Track2</option>
							<option value="3">Track3</option>
							<option value="4">Track4</option>
							<option value="5">Track5</option>
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
                   
					
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Track1</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="track1">
                                <input type="radio" id="track1" name="track1" value="1" <?php if(!in_array(1,$tracks))echo 'checked'; ?>> On
                            </label>
                            <label class="radio-inline" for="track12">
                                <input type="radio" id="track12" name="track1" value="0" <?php if(in_array(1,$tracks))echo 'checked'; ?>> Off
                            </label>
                           
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Track2</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="track2">
                                <input type="radio" id="track2" name="track2" value="1"  <?php if(!in_array(2,$tracks))echo 'checked'; ?>> On
                            </label>
                            <label class="radio-inline" for="track2">
                                <input type="radio" id="track22" name="track2" value="0" <?php if(in_array(2,$tracks))echo 'checked'; ?>> Off
                            </label>
                           
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Track3</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="track3">
                                <input type="radio" id="track3" name="track3" value="1" <?php if(!in_array(3,$tracks))echo 'checked'; ?>> On
                            </label>
                            <label class="radio-inline" for="track2">
                                <input type="radio" id="track32" name="track3" value="0" <?php if(in_array(3,$tracks))echo 'checked'; ?>> Off
                            </label>
                           
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Track4</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="track4">
                                <input type="radio" id="track4" name="track4" value="1" <?php if(!in_array(4,$tracks))echo 'checked'; ?>> On
                            </label>
                            <label class="radio-inline" for="track4">
                                <input type="radio" id="track42" name="track4" value="0" <?php if(in_array(4,$tracks))echo 'checked'; ?>> Off
                            </label>
                           
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Track5</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="track5">
                                <input type="radio" id="track5" name="track5" value="1" <?php if(!in_array(5,$tracks))echo 'checked'; ?>> On
                            </label>
                            <label class="radio-inline" for="track5">
                                <input type="radio" id="track52" name="track5" value="0" <?php if(in_array(5,$tracks))echo 'checked'; ?>> Off
                            </label>
                           
                        </div>
                    </div>
				

                    
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-2" style="padding-left:25px">
                            <button type="submit" class="btn btn-sm btn-primary"> Save</button>
                            <button type="button" class="btn btn-sm btn-warning cancel" data-href="<?php echo site_url('events/index'); ?>">Cancel</button>
                       
                        </div>
                    </div>
                </form>
                <!-- END Horizontal Form Content -->
           
            </div>
			
			
