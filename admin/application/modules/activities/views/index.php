<div class="block full">
        <div class="block-title">
            <h2><strong>Reports</strong></h2>
        </div>
        

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
				<?php }elseif(isset($error)){ ?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $error; ?>
										</div>
				<?php } ?>
		
		<form id="form-admin" action="<?php echo site_url('activities/index'); ?>" method="post" class="form-horizontal form-bordered" >
                   
					
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="first_name">From Date</label>
                        <div class="col-md-9">
                            <input type="text" id="from_date" name="from_date" class="form-control input-datepicker" data-date-format="mm/dd/yyyy" value="<?php if($from_date != '') echo $from_date; else echo date('m/d/Y'); ?>" placeholder="Enter From Date">
  
                            
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="last_name">To date</label>
                        <div class="col-md-9">
                            <input type="text" id="to_date" name="to_date" class="form-control input-datepicker" data-date-format="mm/dd/yyyy" value="<?php if($to_date != '') echo $to_date; else echo date('m/d/Y'); ?>" placeholder="Enter To Date">
  
                            
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="last_name">Member</label>
                        <div class="col-md-9">
                            <input type="text" id="member" name="member" class="form-control "  value="<?php echo $member; ?>" placeholder="Enter First Name or Last Name or Email">
  
                            
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="last_name">Activity</label>
                        <div class="col-md-9">
                            <input type="text" id="activity" name="activity" class="form-control "  value="<?php echo $activity; ?>" placeholder="Enter Activity Related Words">
  
                            
                        </div>
                    </div>
					
					 <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"> Save</button>
                       
                        </div>
                    </div>
		
		</form>
		<div class="table-responsive" >
		<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">

                  <thead>
                                        <tr>
                                            
                                            <th>Date</th>
											<th>Member</th>
											<th>Activity</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									if($activities){
										foreach($activities as $act){
										
											?>
                                        <tr>
                                            <td><?php echo $act->created_at; ?></td>
											<td><?php echo $act->first_name." ".$act->last_name; ?>(<?php echo $act->email; ?>)</td>
											<td><?php echo $act->activity; ?></td>
											<td>
											<div class="btn-group">
											<!--
                                  <a style="margin:0px auto;display:block" onclick="return confirm('Are you sure?'); " href="<?php //echo site_url('proposals/delete/'.$activity->proposal_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="View"><i class="fa fa-remove"></i> Delete</a>
                                  -->
									
									</div>
											</td>
                                        </tr>
										<?php }
									}
                                      ?>									
                                    </tbody>
            </table>
			  </div>
    </div>
	
	

    
        

    
