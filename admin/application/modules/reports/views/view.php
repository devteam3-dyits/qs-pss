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
                               
                    <h2><strong>View Proposal - <?php echo $proposal->proposal_title; ?></strong>
					</h2>
					
					<a href="<?php echo site_url('proposals/download_pdf/'.$proposal->proposal_id); ?>" style="line-height: 1.4;
    padding: 10px 16px 7px;float:right"><i class="fa fa-download"></i> Download PDF </a>

                </div>
<table  class="table table-vcenter table-condensed table-bordered proposals">
<tr>			
 <td width="25%"><strong>Event Name : </strong></td> <td> <?php echo $proposal->event_name; ?> </td> 
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
 Track <?php echo $proposal->session_track; ?> 
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
  elseif($proposal->status == 1)echo '<span  class="label label-success">Approved</span>';
  elseif($proposal->status == 2)echo '<span  class="label label-info">Provisionally Accepted</span>';
  else echo '<span  class="label label-danger">Rejected</span>';
  ?> 
  </td>
  </tr>
  </table>
			   </div>


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
			
		