<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                 <h2><strong>Add Proposal</strong> </h2>
                </div>
                <!-- END Horizontal Form Title -->
                 <?php if(validation_errors()){?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
                                        <?php 
                                        echo "echo from validtion errors";
                                        echo validation_errors(); ?>
										</div>
				
				<?php } elseif(isset($error)){ ?>
				                        <div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
                                        <?php 
                                        echo "echo from errors";
                                        echo $error; ?>
										</div>
				<?php }elseif(isset($upload_error)){ ?>
                    <div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
                                        <?php 
                                        echo "echo from validtion upload errors";
                                        print_r($upload_error) ?>
										</div>
                <?php } ?>
               
                <!-- Horizontal Form Content -->
                <form id="form-proposal" action="<?php echo site_url('proposals/add'); ?>" 
                    method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="event_id">Events</label>
                        <div class="col-md-9">
                            <select id="event_id" name="event_id" class="form-control">
							<option value="">Select Event</option>
							<?php
							if($events){
								foreach($events as $event){
							
							echo '<option value="'.$event->event_id.'">'.$event->event_name.'</option>';
								}
							}
							?>
							
							</select>
                        </div>
                    </div>
					
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="proposal_title">Proposal Title</label>
                        <div class="col-md-9">
                            <input type="text" id="proposal_title" name="proposal_title" class="form-control" placeholder="Enter Title">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="session_format">Session Format</label>
                        <div class="col-md-9">
                            <select id="session_format" name="session_format" class="form-control">
							<option value="Presentation">Presentation</option>
							<!--<option value="Presentation">Presentation</option>-->
							<!--<option value="Panel">Panel</option>-->
							</select>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="session_format">No. of Co-presenters</label>
                        <div class="col-md-9">
                            <select id="max_cop" name="max_cop" class="form-control">
							<option value="">None</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							</select>
                        </div>
                    </div>
					
					
    <div class="row" id="cop_div" style="display:none">
    	<div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li  id="tab1" class="active" ><a href="#tab1default" data-toggle="tab">Co-presenter 1</a></li>
                            <li id="tab2"   ><a href="#tab2default" data-toggle="tab">Co-presenter 2</a></li>
                            <li id="tab3"  ><a href="#tab3default" data-toggle="tab">Co-presenter 3</a></li>
                           
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
					<?php for($i=1;$i<=3;$i++){ ?>
                        <div class="tab-pane fade <?php if($i == 1) echo 'in active'; ?>" id="tab<?php echo $i; ?>default">
						 <div class="form-group">
                <label class="col-md-3 control-label" for="salutation<?php echo $i; ?>">Salutation</label>
                     <div class="col-md-9">
                       <input type="text" id="salutation<?php echo $i; ?>" name="salutation<?php echo $i; ?>" class="form-control input-lg" placeholder="Salutation">
                    </div>
                </div>
          
            <div class="form-group">
                <label class="col-md-3 control-label" for="session_format">First Name</label>
                     <div class="col-md-9">
                         <input type="text" id="first_name<?php echo $i; ?>" name="first_name<?php echo $i; ?>" class="form-control" placeholder="Firstname">
                    </div>
                </div>
               
          
			 <div class="form-group">
			 <label class="col-md-3 control-label" for="session_format">Last Name</label>
				  <div class="col-md-9">
				    <input type="text" id="last_name<?php echo $i; ?>" name="last_name<?php echo $i; ?>" class="form-control" placeholder="Lastname">
                </div>
				</div>
			
            <div class="form-group">
                <label class="col-md-3 control-label" for="session_format">Email Address</label>
                     <div class="col-md-9">
                        
                        <input type="text" id="email<?php echo $i; ?>" name="email<?php echo $i; ?>" class="form-control" placeholder="Email Address">
                    </div>
                </div>
          
		
			<div class="form-group">
                        <label class="col-md-3 control-label">Gender</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="gender1">
                                <input type="radio" id="gender1<?php echo $i; ?>" name="gender<?php echo $i; ?>" value="Male" checked> Male
                            </label>
                            <label class="radio-inline" for="gender2">
                                <input type="radio" id="gender2<?php echo $i; ?>" name="gender<?php echo $i; ?>" value="Female"> Female
                            </label>
                           
                        </div>
                    </div>
		
			<div class="form-group">

                         <label class="col-md-3 control-label" for="session_format">Job Title / Designation*</label>
                         <div class="col-md-9">
                        <input type="text" id="job_title<?php echo $i; ?>" name="job_title<?php echo $i; ?>" class="form-control" value=""  placeholder="Job Title / Designation*"  >
                   </div>
			</div>	
 <div class="form-group">
                        <label class="col-md-3 control-label" for="session_format">University / Organization / Affiliation*</label>
                         <div class="col-md-9">
                        <input type="text" id="university<?php echo $i; ?>" name="university<?php echo $i; ?>" class="form-control" value=""   placeholder="University / Organization / Affiliation*" >
                    </div>
			</div>

<div class="form-group">
                         <label class="col-md-3 control-label" for="session_format">Department*</label>
                         <div class="col-md-9">
                        <input type="text" id="department<?php echo $i; ?>" name="department<?php echo $i; ?>" class="form-control"  value=""  placeholder="Department*">
                    </div>
			</div>
<div class="form-group">
                         <label class="col-md-3 control-label" for="session_format">Mailing Address*</label>
                         <div class="col-md-9">
                        <input type="text" id="mail<?php echo $i; ?>" name="mail<?php echo $i; ?>" class="form-control"  value=""   placeholder="Mailing Address*">
                    </div>
			</div>	
<div class="form-group">
                         <label class="col-md-3 control-label" for="session_format">Summary Biography*</label>
                       <div class="col-md-9">  
                       <textarea id="summary<?php echo $i; ?>" name="summary<?php echo $i; ?>" rows="9" class="form-control"  placeholder="Summary Biography*"></textarea>
                    </div>
			</div>

			</div>
                    <?php } ?>    
                    </div>
                </div>
            </div>
        </div>
		
		</div>


					
					 <div class="form-group" id='track_div'>
                        <label class="col-md-3 control-label" for="session_track">Session Track</label>
                        <div class="col-md-9">
                            <select id="session_track" name="session_track" class="form-control">
							<option value="">Select Track</option>
							
							</select>
							<p id="track_details"></p>
							<p id="tracks_full" >
							
							</p>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="session_format">Presentation Abstract (max 150 word)</label>
                        <div class="col-md-9">
                            <textarea id="presentation" name="presentation" rows="9" class="form-control" placeholder="Enter Presentation Abstract"></textarea>
                            
                        </div>
                    </div>
                     <div class="form-group">
                                                <label class="col-md-3 control-label">Tags</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="tags" name="tags" class="input-tags" value="" />
                                                </div>
                    </div>
                     <div class="form-group">
                                                <label class="col-md-3 control-label">Target Audience</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="target_audience" name="target_audience" class="input-tags" value="" />
                                                </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="session_format">Additional Remarks (max 150 word)</label>
                        <div class="col-md-9">
                            <textarea id="remark" name="remark"  rows="5"  class="form-control" placeholder="Enter Addition Remarks"></textarea>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="allow_share">
                            Allow QS to share my presentaion on official event website</label>
                        <div class="col-md-9">
                            <select id="allow_share" name="allow_share" class="form-control" required>
							    <option value="0" selected>No</option>
							    <option value="1">Yes</option>
							</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="vfile">
                            Upload video
                        </label>
                        <div class="col-md-9">
                            <input type="file" name="vfile" id="vfile" required />
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                        <span style="font-size: 12px;">To ensure you get the most out of the conference and help us place you in the best position 
                        within the program, please upload a short, one minute video of you presenting the core ideas of 
                        your proposal. Videos do not need to be high-definition and can be recorded on a webcam or mobile 
                        phone.</br>

                        Please present your proposal the way you would do so at the conference.</span>
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
			