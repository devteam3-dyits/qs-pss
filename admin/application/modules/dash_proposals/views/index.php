<div class="block full">
        <div class="block-title">
            <h2><strong><?php echo $this->session->userdata('dsess_title').(isset($event) ? ' of '.$event->event_name:'') ?></strong></h2>
             <p style="padding-left: 15px;   padding-right: 15px;">
                
            <a  href="<?php echo site_url('dashboard/events/'.$event->event_name); ?>" class="btn btn-primary"  > <i class="fa fa-angle-left"></i>   BACK</a>
            </p>
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
											<th>University</th>
											<th>Event Name</th>
											<th>Session Format</th>
                                            <th>Session Track</th>					 
                                            <th>Assigned Committee Member</th>						
											<th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									if($proposals){
										foreach($proposals as $proposal){
											?>
                                        <tr>
                                            <td width="20%">
<a href="<?php  echo site_url('dash_proposals/view/'.$proposal->proposal_id); ?>" title="<?php echo $proposal->proposal_title; ?>" ><?php echo substr($proposal->proposal_title,0,25).(strlen($proposal->proposal_title) >25 ? '.....' : '');  ?></a>

</td>
											<td><?php echo $proposal->first_name." ".$proposal->last_name; ?></td>
											
											<td><?php echo $proposal->university; ?></td>
											<td><?php echo $proposal->event_name; ?></td>
											<td><?php echo $proposal->session_format; ?></td>
											<td width="5%">Track <?php echo $proposal->session_track; ?></td>
                                        <td><?php echo $proposal->assigned_cm_name; ?> </td> 
                                            
																			   <td style="text-align: center;"> 
<?php 
 
  if($proposal->status == 0)echo '<span  class="label label-warning">Pending</span>'; 
  elseif($proposal->status == 1)echo '<span  class="label label-success">Approved</span>';
  elseif($proposal->status == 2)echo '<span  class="label label-info">PA</span>';
elseif($proposal->status == 4)echo '<span  class="label label-danger">Queued</span>';
else echo '<span  class="label label-danger">Rejected</span>';

  ?></td>
                                            <td style="text-align: center;">
											
											<div class="btn-group">
                                <a href="<?php echo site_url('dash_proposals/view/'.$proposal->proposal_id); ?>" data-toggle="tooltip" title=""  data-original-title="View"><i class="fa fa-eye"></i></a>
                                 <a href="<?php echo site_url('dash_proposals/edit/'.$proposal->proposal_id); ?>" data-toggle="tooltip" title=""  data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                 
								 <a href="<?php echo site_url('dash_proposals/download_pdf/'.$proposal->proposal_id); ?>" data-toggle="tooltip" title=""  data-original-title="Download PDF"><i class="fa fa-download"></i></a>
                                 <a style="margin:0px auto;display:block" onclick="return confirm('Are you sure?'); " href="<?php echo site_url('dash_proposals/delete/'.$proposal->proposal_id); ?>" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                  
									
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
	
	

  
