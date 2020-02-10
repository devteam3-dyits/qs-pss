<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                  
                    <h2><strong>Edit Proposer</strong> </h2>
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
                
			
                         <form id="form-upload" action="<?php echo site_url('proposers/upload_profile_img/'.$proposer->user_id); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
                         <div class="form-group">
                <label class="col-md-3 control-label">Upload image*</label>
                        <div class="col-md-9">
                    
                        <input type="file" id="profile_img" name="profile_img"  >
                    
                </div>
			</div>
			<div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"> Save</button>
                             <button type="button" class="btn btn-sm btn-warning cancel" data-href="<?php echo site_url('proposers/index'); ?>">Cancel</button>
                       
                        </div>
                    </div>
                
						 </form>
            
                <!-- END Horizontal Form Content -->
            </div>
			
			
