<div class="block full">
        <div class="block-title">
            <h2><strong>Events</strong></h2>
        </div>
        <div class="row">
<a href="<?php echo site_url('events/add'); ?>" class="btn btn-primary btn-lg" style="margin-bottom:10px;float:right">Add Event</a>
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
		<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">

                  <thead>
                                        <tr>
                                            
                                            <th>Event Name</th>
											
											<th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									if($events){
										foreach($events as $event){
											?>
                                        <tr>
                                            <td><?php echo $event->event_name; ?></td>
											
                                            <td>											
											<div class="btn-group">
								<a href="<?php echo site_url('events/view/'.$event->event_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                                <a href="<?php echo site_url('events/edit/'.$event->event_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo site_url('events/delete/'.$event->event_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-danger delete" data-original-title="Delete" ><i class="fa fa-times"></i></a> 
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
        

    
