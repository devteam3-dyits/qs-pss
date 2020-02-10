<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="" data-original-title="Toggles .form-bordered class">No Borders</a>
                    </div>
                    <h2><strong>Add Event</strong> </h2>
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
                <form id="form-event" action="<?php echo site_url('events/add'); ?>" method="post" class="form-horizontal form-bordered" >
                   
					
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="proposal_title">Event Name</label>
                        <div class="col-md-9">
                            <input type="text" id="event_name" name="event_name" class="form-control" placeholder="Enter Event Name" 
							value="" required>
                            
                        </div>
                    </div>
                    
                    	<div class="form-group">
                        <label class="col-md-3 control-label" for="proposal_title">Track Details</label>
                        <div class="col-md-9">
                            <input type="text" id="track_details" name="track_details" class="form-control" placeholder="Enter Track Details" 
							value="" required>
                            <p style="color:red;font-weight:bold"> Please enter the url WITHOUT http:// or https:// </p>
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
			
			
