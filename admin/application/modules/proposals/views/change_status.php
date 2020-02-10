<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
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
                               
                    <h2><strong>Change status - <?php echo $proposal->proposal_title; ?></strong>
					</h2>
					
					
                </div> </div>


<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                   
                    <h2><strong>Change Proposal Status</strong> </h2>
                </div>			   
                
			   
                <form id="form-change-status" action="<?php echo site_url('proposals/change_status/'.$proposal->proposal_id); ?>" method="post" class="form-horizontal form-bordered" >
                   
					<div class="form-group">
                        <label class="col-md-3 control-label" for="status">Status : </label>
                        <div class="col-md-9">
                            <select type="text" id="status" name="status" class="form-control"  
							 required>
							 <option value="" >Select Status</option>
							 <option value="1">Approved</option>
							  <option value="2" >Provisionally Accepted</option>
							  <option value="3" >Rejected</option>
							</select>
                            
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
			
		