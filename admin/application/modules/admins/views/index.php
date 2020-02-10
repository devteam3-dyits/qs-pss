<div class="block full">
        <div class="block-title">
            <h2><strong>Admins</strong></h2>
        </div>
        <div class="row">
<a href="<?php echo site_url('admins/add'); ?>" class="btn btn-primary btn-lg" style="margin-bottom:10px;float:right">Add Admin</a>
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
        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
         <thead>
                                        <tr>
                                            
                                            <th>First Name</th>
											<th>Last Name</th>
											<th>Gender</th>
											<th>Email Address</th>
											<th>Telephone</th>
											<th>Role</th>
											<th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									if($admins){
										foreach($admins as $admin){
											?>
                                        <tr>
                                            <td><?php echo $admin->first_name; ?></td>
											<td><?php echo $admin->last_name; ?></td>
											<td><?php echo $admin->gender; ?></td>
											<td><?php echo $admin->email; ?></td>
											<td><?php echo $admin->tele; ?></td>
											<td><?php if($admin->admin_role == 1) echo 'Super Admin'; else echo 'Admin';  ?></td>
											<td>
											
											<div class="btn-group">
											
                                <a href="<?php echo site_url('admins/edit/'.$admin->admin_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                <?php if($admin->admin_id > 1){ ?>
								<a href="<?php echo site_url('admins/delete/'.$admin->admin_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-danger delete" data-original-title="Delete" ><i class="fa fa-times"></i></a>
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
        

    
