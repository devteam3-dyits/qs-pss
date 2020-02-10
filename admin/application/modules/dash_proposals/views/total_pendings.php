<div class="block full">
        <div class="block-title">
            <h2> Total Pending Proposals
            </h2>
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
                                            <th>Committee Member Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									if($proposals){
										foreach($proposals as $proposal){
											?>
                                        <tr>
                                            <td width="20%"><a href="<?php echo site_url('dash_proposals/view/'.$proposal->proposal_id); ?>" title="<?php echo $proposal->proposal_title; ?>" ><?php echo substr($proposal->proposal_title,0,25).(strlen($proposal->proposal_title) >25 ? '.....' : ''); ?></a></td>
											<td><?php echo $proposal->first_name." ".$proposal->last_name; ?></td>
											
											
											<td><?php echo $proposal->event_name; ?></td>
											<td><?php echo $proposal->session_format; ?></td>
                                            <td width="5%">Track <?php echo $proposal->session_track; ?></td>
											
											   <td style="text-align: center;"><?php  
  echo $proposal->first_name.' '.$proposal->last_name;
  ?></td>
                                            <td style="text-align: center;">
											
											<div class="btn-group">
                                <a href="<?php echo site_url('dash_proposals/email/'.$proposal->proposal_id); ?>" data-toggle="tooltip" title=""  data-original-title="Email"><i class="fa fa-envelope"></i></a>
                                
									
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
	
	

  
