<div class="block full">
        <div class="block-title">
            <h2><strong>Proposers</strong></h2>
        </div>
 <div class="row">
 <a data-toggle="modal"  data-target="#expallModal2"  class="btn btn-primary btn-lg" style="margin-bottom:10px;float:right;margin-left:5px">Export All</a>    
<a data-toggle="modal"  data-target="#myModal2"  class="btn btn-primary btn-lg" style="margin-bottom:10px;float:right;">Export by Events</a>
<a data-toggle="modal"  data-target="#myModal3"  class="btn btn-primary btn-lg" style="margin-bottom:10px;float:right;margin-right:5px">Add Committee Member As Proposer</a>

</div>        
<div class="table-responsive" >
		  <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">

                  <thead>
                                        <tr>
                                            <th></th>
                                            <th>First Name</th>
											<th>Last Name</th>
											<th>Gender</th>
											<th>Email Address</th>
											<th>Country</th>
											<th>Telephone</th>
											<!--<th>Fax</th>-->
											<th>Job Title</th>
											<th>University</th>
											<!--<th>University Acronym</th> -->
											<th>Department</th>
										<!--	<th>Mailing Address</th> -->
											<th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									if($proposers){
										foreach($proposers as $proposer){
											?>
                                        <tr>
										   <td>
										   <?php
										   if($proposer->profile_img != ''){
											 echo '<img src="'.base_url().'../uploads/profile_imgs/'.$proposer->profile_img.'" width="100" >';  
											   
										   }else{
										     echo '<img src="https://www.qsglobalevents.com/dev/admin/assets/img/placeholders/avatars/avatar2.jpg" width="100" >';    
										       
										   }
										   
										   
										   ?>
										   </td>
                                            <td><?php echo $proposer->first_name; ?></td>
											<td><?php echo $proposer->last_name; ?></td>
											<td><?php echo $proposer->gender; ?></td>
											<td><?php echo $proposer->email; ?></td>
											<td><?php echo $proposer->country; ?></td>
											<td><?php echo $proposer->tele; ?></td>
											<!-- <td><?php echo $proposer->fax; ?></td> -->
											<td><?php echo $proposer->job_title; ?></td>
											<td><?php echo $proposer->university; ?></td> 
										<!-- 	<td><?php echo $proposer->university_accronym; ?></td> -->
											<td><?php echo $proposer->department; ?></td>
											<!-- <td><?php echo $proposer->mail; ?></td> -->
											<td >
											    
										 <a style="margin:0px auto;display:block"  href="<?php echo site_url('proposers/login/'.$proposer->user_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="View"> Login</a>
										 
											<a style="margin:0px auto;display:block" href="<?php echo site_url('proposers/view/'.$proposer->user_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="View"><i class="fa fa-eye"></i> View</a>
                               <a style="margin:0px auto;display:block" href="<?php echo site_url('proposers/edit/'.$proposer->user_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="View"><i class="fa fa-pencil"></i> Edit</a>
                               <a style="margin:0px auto;display:block" href="<?php echo site_url('proposers/change_profileimg/'.$proposer->user_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="View"><i class="fa fa-upload"></i> Change Profile Image</a>
                               <a style="margin:0px auto;display:block" onclick="return confirm('Are you sure?'); " href="<?php echo site_url('proposers/delete/'.$proposer->user_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="View"><i class="fa fa-remove"></i> Delete</a>
                               
											</td>
                                        </tr>
										<?php }
									}
                                      ?>									
                                    </tbody>
            </table>
			  </div>
    </div>
        
<!-- /.modal -->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Export</h4></div>
            <div class="modal-body">
			
			
                         <form id="form-export" action="<?php echo site_url('proposers/export'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
                         <div class="form-group">
                <label class="col-md-3 control-label">Events : </label>
                        <div class="col-md-9">
                    
                        <select id="event_id" name="event_id" class="form-control" required>
						<option value="" >Select event</option>
						<?php if(sizeof($events) > 0){
							foreach($events as $event){
								echo '<option value="'.$event->event_id.'">'.$event->event_name.'</option>';
							}
						}
						
						?>
						</select>
                    
                </div>
			</div>
			<div class="form-group">
                <label class="col-md-3 control-label">Type : </label>
                        <div class="col-md-9">
						<select name="format" class="form-control" >
						<option value="csv" >CSV</option>
						<option value="xlsx" >Excel</option>
						</select>
						</div>
						</div>
                
						 </form>
            
			
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="export_butt">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- /.modal -->

<div class="modal fade" id="expallModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Export All</h4></div>
            <div class="modal-body">
			
			
                         <form id="form-export-all" action="<?php echo site_url('proposers/export_all'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
                 
			<div class="form-group">
                <label class="col-md-3 control-label">Type : </label>
                        <div class="col-md-9">
						<select name="format" class="form-control" >
						<option value="csv" >CSV</option>
						<option value="xlsx" >Excel</option>
						</select>
						</div>
						</div>
                
						 </form>
            
			
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="export_all_butt">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Add Committee Member as Proposer</h4></div>
            <div class="modal-body">
			
			
                         <form id="form-make-cm" action="<?php echo site_url('proposers/make_proposer'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
                         <div class="form-group">
                <label class="col-md-3 control-label">Committee member : </label>
                        <div class="col-md-9">
                    
                        <select id="cms" name="cms" class="form-control" required>
						<option value="" >Select Committee Member</option>
						<?php if(sizeof($cms) > 0){
							foreach($cms as $cm){
								echo '<option value="'.$cm->user_id.'">'.$cm->first_name.' '.$cm->last_name.'</option>';
							}
						}
						
						?>
						</select>
                    
                </div>
			</div>
			
                
						 </form>
            
			
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="cm_butt">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


    
