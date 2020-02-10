<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                 <h2><strong>Send Feedback</strong> </h2>
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
               
                <!-- Horizontal Form Content -->
                <form id="form-fdback" action="<?php echo site_url('feedback/send'); ?>" method="post" class="form-horizontal form-bordered" >
                    
					<div class="form-group">
                        <label class="col-md-3 control-label" for="proposal_title">Subject</label>
                        <div class="col-md-9">
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Enter Subject" required>
                            
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="session_format">Message</label>
                        <div class="col-md-9">
                            <textarea id="message" name="message"  rows="5"  class="form-control" placeholder="Enter Your Message"></textarea>
                            
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button id="fb-butt" type="button" class="btn btn-sm btn-primary"> Save</button>
                            <button type="button" class="btn btn-sm btn-warning cancel" data-href="<?php echo site_url('feedback/index'); ?>">Cancel</button>
                        </div>
                    </div>
                </form>
                <!-- END Horizontal Form Content -->
            </div>
			
			
