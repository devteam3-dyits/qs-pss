<div class="block full">
        <div class="block-title">
            <h2><strong>Proposals</strong></h2>
        </div>
        <div class="row">
<a href="<?php echo site_url('proposals/add'); ?>" class="btn btn-primary btn-lg" style="margin-bottom:10px;float:right">Add Proposal</a>
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
        <div class="table-responsive" >
		<table id="example-datatable" class="table table-vcenter table-condensed table-bordered ">

                  <thead>
                                        <tr>
										    <th>Event Name</th>
                                            <th>Proposal Title</th>
                                            <th>Session Format</th>
                                            <th>Session Track</th>
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
										    <td><?php echo $proposal->event_name; ?></td>
                                            <td><?php echo $proposal->proposal_title; ?></td>
											<td><?php echo $proposal->session_format; ?></td>
                                            <td>Track <?php echo $proposal->session_track; ?></td>
        <td>                                    
	<?php								
											 
	if($proposal->status == 0)echo '<span  class="label label-warning">Pending</span>'; 
  elseif($proposal->status == 1)echo '<span  class="label label-success">Approved</span>';
  elseif($proposal->status == 2)echo '<span  class="label label-info">Provisionally Accepted</span>';
   elseif($proposal->status == 3) echo '<span  class="label label-danger">Rejected</span>';
     elseif($proposal->status == 5) echo '<span  class="label label-danger">On hold</span>';
	else echo '<span  class="label label-danger">Queued</span>';
	?>
	</td>
 								   
                                            <td>
											
											<div class="btn-group">
											<a href="<?php echo site_url('proposals/view/'.$proposal->proposal_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                               
											<?php if($proposal->status == 0 || $proposal->status == 2 ){ ?>
                                <a href="<?php echo site_url('proposals/edit/'.$proposal->proposal_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo site_url('proposals/delete/'.$proposal->proposal_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-danger delete" data-original-title="Delete" ><i class="fa fa-times"></i></a>
											<?php } ?>
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
        

    
