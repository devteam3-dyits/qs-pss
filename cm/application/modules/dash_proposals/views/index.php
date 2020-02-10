<div class="block full">
        <div class="block-title">
            <h2><strong><?php echo $this->session->userdata('dsess_title').(isset($event) ? ' of '.$event->event_name:'') ?></strong></h2>
             <?php if(isset($event)){ ?>
            <p style="padding-left: 15px;   padding-right: 15px;">
            <a  href="<?php echo site_url('dashboard/events/'.$event->event_name); ?>" class="btn btn-primary"  > <i class="fa fa-angle-left"></i>   BACK</a>
            </p>
            <?php }else{ ?>
            <p style="padding-left: 15px;   padding-right: 15px;">
            <a  href="<?php echo site_url('dashboard/events/All'); ?>" class="btn btn-primary"  > <i class="fa fa-angle-left"></i>   BACK</a>
            </p>
            <?php } ?>
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
	
</div> 			
        
						
   <div class="table-responsive" >
		<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">

                  <thead>
                                        <tr>
                                            
                                            <th>Proposal Title</th>
											<th>Proposer Name</th>
											<th>Event Name</th>
											<th>Session Format</th>
                                            <th>Session Track</th>											
											<th>Status</th>
											<th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									if($proposals){
										foreach($proposals as $proposal){
											?>
                                        <tr>
                                            <td><?php echo $proposal->proposal_title; ?></td>
											<td><?php echo $proposal->first_name." ".$proposal->last_name; ?></td>
											<td><?php echo $proposal->event_name; ?></td>
											<td><?php echo $proposal->session_format; ?></td>
                                            <td>Track <?php echo $proposal->session_track; ?></td>
											  <td style="text-align: center;"><?php  
  if($proposal->status == 0)echo '<span  class="label label-warning">Pending</span>'; 
  elseif($proposal->status == 1)echo '<span  class="label label-success">Approved</span>';
  elseif($proposal->status == 2)echo '<span  class="label label-info">Provisionally Accepted</span>';
elseif($proposal->status == 4)echo '<span  class="label label-danger">Queued</span>';
  else echo '<span  class="label label-danger">Rejected</span>';
  ?></td>
                                          <td><?php echo date('m/d/y',strtotime($proposal->proposal_created)); ?></td>
											
											   
											
											<td style="text-align: center;">
											
											<div class="btn-group">
                                <a href="<?php echo site_url('dash_proposals/view/'.$proposal->proposal_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="View"><i class="fa fa-eye"></i> View</a>
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
        

    
    
    </div>
	
	

  
