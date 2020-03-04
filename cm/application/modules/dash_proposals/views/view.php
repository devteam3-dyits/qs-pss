<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
  <!-- END Horizontal Form Title -->
				<?php if($this->session->flashdata('alert_success')){ ?>
                    <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
										<?php echo $this->session->flashdata('alert_success'); ?>
										
										</div>
				<?php }elseif($this->session->flashdata('alert_error')){ ?>
                    <div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
										<?php echo $this->session->flashdata('alert_error'); ?>
										
										</div>
				<?php }elseif(validation_errors()){?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
										<?php echo validation_errors(); ?>
										</div>
				
				<?php } elseif(isset($error)){ ?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
										<?php echo $error; ?>
										</div>
				<?php } ?>
                               
                    <h2><strong>View Proposal - <?php echo $proposal->proposal_title; ?></strong> </h2>
                    
                     <p style="padding-left: 15px;   padding-right: 15px;">
                
            <a  href="<?php echo site_url('dash_proposals/index'); ?>" class="btn btn-primary"  > <i class="fa fa-angle-left"></i>   BACK</a>
            </p>
                </div>
<table  class="table table-vcenter table-condensed table-bordered">
<tr>			
 <td width="20%"><strong>Event Name : </strong></td> <td> <?php echo $proposal->event_name; ?> </td> 
</tr> 
<tr>
 <td><strong>Proposer : </strong></td>
 <td><?php echo $proposal->first_name.' '.$proposal->last_name; ?> </td>
 </tr>
 <tr>
  <td><strong>Session Format : </strong></td>
  <td><?php echo $proposal->session_format; ?> </td>
  </tr>
  <tr>
  <td>
 <strong>Session Track : </strong>
 </td>
 <td>
<?php if($proposal->session_track == 500){?> All 
<?php }else{ ?>
Track <?php echo $proposal->session_track; ?> 
<?php } ?>
 </td>
 </tr>
 <tr>
 <td>
 <strong>Presentation Abstract : </strong>
 </td>
 <td>
 <?php echo $proposal->presentation; ?> 
 </td>
 </tr>
 <tr>
 <td>
  <strong>Additional Remark : </strong>
  </td>
  <td>
  <?php echo $proposal->remark; ?> 
  </td>
  </tr>
  <tr>
  <td>
  <strong>Created : </strong>
  </td>
  <td>
  <?php echo date('Y-m-d',strtotime($proposal->proposal_created)); ?> 
  </td>
  </tr>
  <tr>
  <td>
  <strong>Status : </strong>
  </td>
  <td>
  <?php  
  if($proposal->status == 0)echo '<span  class="label label-warning">Pending</span>'; 
  elseif($proposal->status == 1)echo '<span  class="label label-success">Approved</span> on '.$proposal->status_on;
  elseif($proposal->status == 2)echo '<span  class="label label-info">Provisionally Accepted</span> on '.$proposal->status_on;

elseif($proposal->status == 4)echo '<span  class="label label-danger">Queued</span> on '.$proposal->status_on;
  
  else echo '<span  class="label label-danger">Rejected</span> on '.$proposal->status_on;
  ?> 
  </td>
  </tr>

  <tr <?php if($proposal->status == 1 || $proposal->status == 0)echo 'style="display:none"'; ?>><td><strong><?php if($proposal->status == 3) echo 'Reason for rejecting'; elseif($proposal->status == 2) echo 'Reason for provisionally accepting'; ?> :</strong></td><td><?php echo $proposal->reason; ?></td></tr>
  <tr><td><strong>Video Source :</strong></td>
    <td>
    <?php
            if($proposal->video_url === ""){ ?>
                    <span style="font-size:12px;color: red;">No video found</span>
                <?php }else{ ?>
                <a class="btn btn-sm btn-primary" 
                    href="http://localhost/qspss/uploads/proposals/<?php echo $proposal->video_url?>" 
                    target="_blank">Open video</a> 
            <?php   
                } ?>
    </td>
</tr>
  <tr><td><strong>This proposal updated by :</strong></td><td><?php echo $proposal->status_by; ?></td></tr>
  </table>
			   </div>

<div class="block">			   
<h4><strong>Co-Presenters</strong></h4>
<table  class="table table-vcenter table-condensed table-bordered">
<?php
if($cops){ ?>
 <thead>
                                        <tr>
                                           
                                            <th style="font-size:14px">First Name</th>
											<th style="font-size:14px">Last Name</th>
											<th style="font-size:14px">Gender</th>
											<th style="font-size:14px">Email Address</th>											
											<th style="font-size:14px">Job Title</th>
											<th style="font-size:14px">University</th>
											<th style="font-size:14px">Department</th>
											<th style="font-size:14px">Mailing Address</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
	foreach($cops as $co){
		?>
<tr>			
 <td><?php echo $co->first_name; ?></td>
											<td><?php echo $co->last_name; ?></td>
											<td><?php echo $co->gender; ?></td>
											<td><?php echo $co->email; ?></td>
											<td><?php echo $co->job_title; ?></td>
											<td><?php echo $co->university; ?></td>
											<td><?php echo $co->department; ?></td>
											<td><?php echo $co->mail; ?></td>
</tr> 
	<?php } ?>
	</tbody>
	
	<?php
}
	?>
</table>
</div>




<?php 
$user_id  = $user_id = $this->session->userdata('user_id'); 
if($cm_assignment > 0 && $proposal->assigned_cm == $user_id){ ?> 
			   <div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                   
                    <h2><strong>Change Proposal Status</strong> </h2>
                </div>			   
               
			   
                <form id="form-change-status" action="<?php echo site_url('dash_proposals/change_status/'.$proposal->proposal_id); ?>" method="post" class="form-horizontal form-bordered" >
                   
					<div class="form-group">
                        <label class="col-md-3 control-label" for="status">Status : </label>
                        <div class="col-md-9">
                            <select type="text" id="status" name="status" class="form-control"  
							 >
							 <option value="" >Select Status</option>
							 <?php if($proposal->status != 1){ ?>
							 <option value="1">Approved</option>
							 <?php }
							 if($proposal->status != 2){ 
							 ?>
							  <option value="2" >Provisionally Accepted</option>
							   <?php }
							 if($proposal->status != 3){ 
							 ?>
							  <option value="3" >Rejected</option>
							 <?php } ?>
							</select>
                            
                        </div>
                    </div>
                    	<div class="form-group" id="reason_div" style="display:none">
                        <label class="col-md-3 control-label" for="status" id="reject_label">Tell us why you are rejecting                                                                                                                                             : </label>
                         <label class="col-md-3 control-label" for="status" id="pa_label" style="display:none">Tell us why you are provisionally accepting                                                                                                                                            : </label>
                         <div class="col-md-9">
                            <textarea id="reason" name="reason" class="form-control" rows="9"></textarea>
                                
                                </div>
                        
                        </div>
                    
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="button" id="status_change_butt" class="btn btn-sm btn-primary"> Save</button>
                            <button type="button" class="btn btn-sm btn-warning cancel" data-href="<?php echo site_url('dash_proposals/index'); ?>">Cancel</button>
                       
                        </div>
                    </div>
                </form>
                <!-- END Horizontal Form Content -->
          
            </div>
			
		<h4><strong>Comments on this proposal by committee members </strong></h4>
<?php 
if($comments){
	foreach($comments as $comment){
?>
<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                  
                    <h2><strong><?php echo $comment->first_name; ?> <?php echo $comment->last_name; ?> on  <?php echo date('Y-m-d',strtotime($comment->comment_created)); ?></strong> </h2>
                </div>			   
                
			   <p><?php echo $comment->comment; ?></p>
            </div>

	<?php } 
}

?>	

<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                   
                    <h2><strong>Leave a comment</strong> </h2>
                </div>			   
                
			   
                <form id="form-comment" action="<?php echo site_url('dash_proposals/comment/'.$proposal->proposal_id); ?>" method="post" class="form-horizontal form-bordered" >
                   
					<div class="form-group">
                        <label class="col-md-3 control-label" for="status">Comment : </label>
                        <div class="col-md-9">
<textarea rows="9" name="comment" id="comment" class="form-control" required></textarea> 
                            
                        </div>
                    </div>
                    
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"> Save</button>
                            <button type="button" class="btn btn-sm btn-warning cancel" data-href="<?php echo site_url('dash_proposals/index'); ?>">Cancel</button>
                       
                        </div>
                    </div>
                </form>
                <!-- END Horizontal Form Content -->
           
            </div>
			
 <?php } ?>		