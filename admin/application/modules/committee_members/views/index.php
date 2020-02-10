<div class="block full">
        <div class="block-title">
            <h2><strong>Committee Members</strong></h2>
        </div>
        <div class="row">
<a href="<?php echo site_url('committee_members/add'); ?>" class="btn btn-primary btn-lg" style="margin-bottom:10px;float:right">Add Committee Member</a>
<a data-toggle="modal"  data-target="#myModal2"  class="btn btn-primary btn-lg" style="margin-bottom:10px;float:right;margin-right:5px">Add Proposer As Committee Member</a>
                   

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
                                            
                                            <th>First Name</th>
											<th>Last Name</th>
											<th>Gender</th>
											<th>Email Address</th>
											<th>Country</th>
											<!-- 
											<th>Telephone</th>
											<th>Fax</th>
											-->
											<th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									if($committee_members){
										foreach($committee_members as $cm){
											?>
                                        <tr>
                                            <td><?php echo $cm->first_name; ?></td>
											<td><?php echo $cm->last_name; ?></td>
											<td><?php echo $cm->gender; ?></td>
											<td><?php echo $cm->email; ?></td>
											<td><?php echo $cm->country; ?></td>
										<!--
											<td><?php echo $cm->tele; ?></td>
											<td><?php echo $cm->fax; ?></td>
										-->	
											<td>
											
											<div class="btn-group">
											
                                <a href="<?php echo site_url('committee_members/edit/'.$cm->user_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                               
								<a href="<?php echo site_url('committee_members/delete/'.$cm->user_id); ?>" onclick="return confirm('Are you sure?'); " data-toggle="tooltip" title="" class="btn btn-xs btn-danger delete" data-original-title="Delete" ><i class="fa fa-times"></i></a>
                             
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
	
	<!-- /.modal -->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Make Committee Member</h4></div>
            <div class="modal-body">
			
			
                         <form id="form-make-cm" action="<?php echo site_url('committee_members/make_cm'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
                         <div class="form-group">
                <label class="col-md-3 control-label">Proposer : </label>
                        <div class="col-md-9">
                    
                        <select id="proposers" name="proposers" class="form-control" required>
						<option value="" >Select a proposer</option>
						<?php if(sizeof($proposers) > 0){
							foreach($proposers as $proposer){
								echo '<option value="'.$proposer->user_id.'">'.$proposer->first_name.' '.$proposer->last_name.'</option>';
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
<!-- /.modal -->

        

    
