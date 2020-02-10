<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="" data-original-title="Toggles .form-bordered class">No Borders</a>
                    </div>
                    <h2><strong>Settings</strong> </h2>
                </div>
                <!-- END Horizontal Form Title -->
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
				<?php }elseif(isset($error)){ ?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $error; ?>
										</div>
				<?php } ?>
               
                <!-- Horizontal Form Content -->
                <form id="form-event" action="<?php echo site_url('settings/index'); ?>" method="post" class="form-horizontal form-bordered" >
                   
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Turn off track</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="option1">
                                <input type="radio" id="option1" name="turn_off_track" value="Yes"
								<?php if($setting->turn_off_track == 'Yes')echo 'checked'; ?> /> Yes
                            </label>
                            <label class="radio-inline" for="option2">
                                <input type="radio" id="option2" name="turn_off_track" value="No"
								<?php if($setting->turn_off_track == 'No')echo 'checked'; ?> /> No
                            </label>
                           
                        </div>
                    </div>
				
                    
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"> Save</button>
                            <button type="reset" class="btn btn-sm btn-warning">Reset</button>
                        </div>
                    </div>
                </form>
                <!-- END Horizontal Form Content -->
            </div>
			
			
