<div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    
                    <h2><strong>Change Password</strong></h2>
					
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->
                <form id="form-change-password" action="<?php echo site_url('my_profile/change_password'); ?>" method="post"  class="form-horizontal form-bordered" >
                   
                   <div class="form-group">
			<?php if($this->session->flashdata('alert_success')){ ?>
                    <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('alert_success'); ?>
										
										</div>
				<?php }elseif($this->session->flashdata('alert_error')){ ?>
                    <div class="alert alert-danger" style="text-align:center">
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
                </div>
				
				
		                         <div class="form-group">
                <label class="col-md-3 control-label">New Password*</label>
                        <div class="col-md-9">
                    
                        <input type="password" id="password" name="password" class="form-control input-lg" >
                    
                </div>
			</div>
			
                <div class="form-group">
                <label class="col-md-3 control-label">Confirmation*</label>
                        <div class="col-md-9">
                    <input type="password" id="passwordv" name="passwordv" class="form-control input-lg" >
                    
            </div>
			</div>
<div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                            <button type="button" class="btn btn-sm btn-warning cancel" data-href="<?php echo site_url('dashboard/index'); ?>">Cancel</button>
                       
                        </div>
                    </div>

					
					</form>
                <!-- END Basic Form Elements Content -->
            </div>