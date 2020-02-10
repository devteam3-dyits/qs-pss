
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
		<?php if($user->profile_img != ''){ 
		
		?>
            <img src="<?php echo base_url(); ?>uploads/profile_imgs/<?php echo $user->profile_img; ?>"  class="pull-right img-circle">
		<?php }else{ ?>

        <img src="<?php echo base_url(); ?>assets/img/placeholders/avatars/avatar2.jpg"  class="pull-right img-circle">
	
        <?php } ?>		
			
			<h1><?php echo $this->session->userdata('user_name'); ?> </h1>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="<?php echo base_url() ; ?>assets/img/IMG_69864.jpg"  style="height:auto !important"  alt="header image" class="animation-pulseSlow">
    </div>
    <!-- END User Profile Header -->

    <!-- User Profile Content -->
    <div class="row">
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
				<?php } ?>
           
        
            <!-- Info Block -->
            <div class="block  ">
                <!-- Info Title -->
				
                
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="<?php echo site_url('my_profile/edit'); ?>" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i> Edit Profile</a>
                    <a data-toggle="modal"  data-target="#myModal" id="change_password_link"  class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Change Password"><i class="fa fa-key"></i> Change Password</a>
                     <a data-toggle="modal"  data-target="#myModal2"  class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Upload Profile"><i class="fa fa-upload"></i> Upload Profile Image</a>
                      
					   
					   </div>
                    <h2>About <strong><?php echo $user->salutation; ?>. <?php echo $user->first_name; ?> <?php echo $user->last_name; ?></strong> </h2>
                </div>
                <!-- END Info Title -->

                <!-- Info Content -->
                <table class="table table-borderless table-striped">
                    <tbody>
                        
                        <tr>
                            <td style="width: 20%;" ><strong>First Name</strong></td>
                            <td><?php echo $user->first_name; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Last Name</strong></td>
                            <td><?php echo $user->last_name; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email Address</strong></td>
                            <td><?php echo $user->email; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Gender</strong></td>
                            <td>
                               <?php echo $user->gender; ?>
                                
                            </td>
                        </tr>
						<tr>
                            <td><strong>Job Title</strong></td>
                            <td>
                               <?php echo $user->job_title; ?>
                                
                            </td>
                        </tr>
						<tr>
                            <td><strong>University/Organization/Affiliation</strong></td>
                            <td>
                               <?php echo $user->university; ?>
                                
                            </td>
                        </tr>
						<tr>
                            <td><strong>University Name Acronym</strong></td>
                            <td>
                               <?php echo $user->university_accronym; ?>
                                
                            </td>
                        </tr>
						<tr>
                            <td><strong>Department</strong></td>
                            <td>
                               <?php echo $user->department; ?>
                                
                            </td>
                        </tr>
						
						<tr>
                            <td><strong>Mailing Address</strong></td>
                            <td>
                               <?php echo $user->mail; ?>
                                
                            </td>
                        </tr>
						
						<tr>
                            <td><strong>Country</strong></td>
                            <td>
                               <?php echo $user->country; ?>
                                
                            </td>
                        </tr>
						<tr>
                            <td><strong>Telephone Number</strong></td>
                            <td>
                               <?php echo $user->tele; ?>
                                
                            </td>
                        </tr>
                        <!--
						<tr>
                            <td><strong>Fax Number</strong></td>
                            <td>
                               <?php echo $user->fax; ?>
                                
                            </td>
                        </tr>
                        -->
						<tr>
                            <td><strong>Summary Biography</strong></td>
                            <td>
                               <?php echo $user->summary; ?>
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Info Content -->
            </div>
            <!-- END Info Block -->

          
       </div>
    <!-- END User Profile Content -->
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Change Password</h4></div>
            <div class="modal-body">
			
			
                         <form id="form-change-password" action="<?php echo site_url('my_profile/change_password'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
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
						 </form>
            
			
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="pass_change_butt">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Change Profile Picture</h4></div>
            <div class="modal-body">
			
			
                         <form id="form-upload" action="<?php echo site_url('my_profile/upload_profile_img'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
                         <div class="form-group">
                <label class="col-md-3 control-label">Upload image*</label>
                        <div class="col-md-9">
                    
                        <input type="file" id="profile_img" name="profile_img"  >
                    
                </div>
			</div>
			
                
						 </form>
            
			
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="upload_butt">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



