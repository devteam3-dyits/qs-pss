<div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    
                    <h2><strong>Edit Profile</strong></h2>
					<div class="block-options pull-right">
                        <a href="<?php echo site_url('my_profile/index'); ?>" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="View">View Profile</a>
                    </div>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->
                <form id="form-profile" action="<?php echo site_url('my_profile/edit'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
                   
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
                        <label class="col-md-3 control-label">Salutation*</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="salutation1">
                                <input type="radio" id="salutation1" name="salutation" value="Prof"
								<?php if($user->salutation == 'Prof')echo 'checked'; ?>> Prof
                            </label>
                            <label class="radio-inline" for="salutation2">
                                <input type="radio" id="salutation2" name="salutation" value="Dr"
								<?php if($user->salutation == 'Dr')echo 'checked'; ?>> Dr
                            </label>
                            <label class="radio-inline" for="salutation3">
                                <input type="radio" id="salutation3" name="salutation" value="Mr"
								<?php if($user->salutation == 'Mr')echo 'checked'; ?>> Mr
                            </label>
							
							 <label class="radio-inline" for="salutation4">
                                <input type="radio" id="salutation4" name="salutation" value="Ms"
								<?php if($user->salutation == 'Ms')echo 'checked'; ?>> Ms
                            </label>
                        </div>
                    </div>
            <div class="form-group">
                <label class="col-md-3 control-label">First Name*</label>
                        <div class="col-md-9">
                    
                        <input type="text" id="first_name" name="first_name" class="form-control input-lg" value="<?php echo $user->first_name; ?>" >
                    
                </div>
			</div>
			
                <div class="form-group">
                <label class="col-md-3 control-label">Last Name*</label>
                        <div class="col-md-9">
                    <input type="text" id="last_name" name="last_name" class="form-control input-lg" value="<?php echo $user->last_name; ?>" >
                
            </div>
			</div>
			
            
			<div class="form-group">
                        <label class="col-md-3 control-label">Gender</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="gender1">
                                <input type="radio" id="gender1" name="gender" value="Male" <?php if($user->gender == 'Male')echo 'checked';?>> Male
                            </label>
                            <label class="radio-inline" for="gender2">
                                <input type="radio" id="gender2" name="gender" value="Female" <?php if($user->gender == 'Female')echo 'checked';?>> Female
                            </label>
                           
                        </div>
                    </div>
			  

 <div class="form-group">
                <label class="col-md-3 control-label">Country*</label>
                        <div class="col-md-9">
                        
                        <select id="country" name="country" class="form-control input-lg" size="1">
                                <option value="">Please select country</option>
                                <option value="1" <?php if($user->country == '1') echo 'selected="selected"'; ?>>Option #1</option>
                                <option value="2" <?php if($user->country == '2') echo 'selected="selected"'; ?>>Option #2</option>
                                <option value="3" <?php if($user->country == '3') echo 'selected="selected"'; ?>>Option #3</option>
                            </select>	
                    </div>
			</div>


		 <div class="form-group">
                <label class="col-md-3 control-label">Telephone Number*</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="tele" name="tele" class="form-control input-lg" value="<?php echo $user->tele; ?>" >
                   </div>
			</div>
			
			 <div class="form-group">
                <label class="col-md-3 control-label">Fax Number*</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="fax" name="fax" class="form-control input-lg" value="<?php echo $user->fax; ?>" >
                    </div>
			</div>
			<div class="form-group">
                <label class="col-md-3 control-label">Job Title / Designation*</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="job_title" name="job_title" class="form-control input-lg" value="<?php echo $user->job_title; ?>"  >
                   </div>
			</div>	
            <div class="form-group">
                <label class="col-md-3 control-label">University/Organization/Affiliation*</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="university" name="university" class="form-control input-lg" value="<?php echo $user->university; ?>"  >
                    </div>
			</div>
            <div class="form-group">
                <label class="col-md-3 control-label">University Name Acronym*</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="university_accronym" name="university_accronym" class="form-control input-lg" value="<?php echo $user->university_accronym; ?>"  >
                    </div>
			</div>

           <div class="form-group">
                <label class="col-md-3 control-label">Department*</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="department" name="department" class="form-control input-lg"  value="<?php echo $user->department; ?>" >
                    </div>
			</div>

 <div class="form-group">
                <label class="col-md-3 control-label">Mailing Address*</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="mail" name="mail" class="form-control input-lg"  value="<?php echo $user->mail; ?>"  >
                    </div>
			</div>	
			 <div class="form-group">
                <label class="col-md-3 control-label">Summary Biography*</label>
                        <div class="col-md-9">
                        
                       <textarea id="summary" name="summary" rows="9" class="form-control input-lg" ><?php echo $user->summary; ?></textarea>
                    </div>
			</div>
          <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                        </div>
                    </div>
                   </form>
                <!-- END Basic Form Elements Content -->
            </div>