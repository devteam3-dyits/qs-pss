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
	<div class="row" style="padding-bottom:20px">
	
	<div class="col-md-3">	
<form method="post" action="" id="filter_date_form" >
<div class="form-group">		
	
   From : <input type="text" id="from_date" name="from_date" class="form-control input-datepicker" data-date-format="mm/dd/yyyy" value="<?php if($from_date != '')echo $from_date; else echo date('m/d/Y'); ?>">
   To : <input type="text" id="to_date" name="to_date" class="form-control input-datepicker" data-date-format="mm/dd/yyyy" value="<?php if($to_date != '')echo $to_date; else echo date('m/d/Y'); ?>">
   <button type="button" class="btn btn-primary" id="filter_date_butt">Filter</button>
   </div>
   </form>
 </div>  
<div class="col-md-3">	
<form method="post" action="" id="filter_form" >
<div class="form-group">	
<select id="filter_event_id" name="event_id" class="form-control" >
						<option value="" <?php if($event_id == "") echo ' selected = "selected" '; ?>>Select Event</option>
						<?php if(sizeof($events) > 0){
							foreach($events as $event){
								if($event_id == $event->event_id) $selected = ' selected = "selected" ';
								else $selected = '';
								echo '<option value="'.$event->event_id.'" '.$selected.'>'.$event->event_name.'</option>';
							}
						}
						
						?>
						</select>
</div>						
</form>
</div>

<div class="col-md-3">	
<form method="post" action="" id="sort_form" >	
<div class="form-group">	

                        <select id="sort_id" name="sort_id" class="form-control" >
						<option value="" <?php if($sort_id == "") echo ' selected = "selected" '; ?>>Sort by</option>
						<option value="country_asc" <?php if($sort_id == "country_asc") echo ' selected = "selected" '; ?> >Country A-Z </option>
						<option value="country_desc" <?php if($sort_id == "country_desc") echo ' selected = "selected" '; ?> >Country Z-A </option>
						<option value="track_asc" <?php if($sort_id == "track_asc") echo ' selected = "selected" '; ?> >Track ASC</option>
						<option value="track_desc" <?php if($sort_id == "track_desc") echo ' selected = "selected" '; ?> >Track DESC </option>
						<option value="status_asc" <?php if($sort_id == "status_asc") echo ' selected = "selected" '; ?> >Status Pending To Approved </option>
						<option value="status_desc" <?php if($sort_id == "status_desc") echo ' selected = "selected" '; ?> >Status Approved To Pending </option>
						</select>

</div>						
</form>
</div>


<div class="col-md-2">	
<form method="post" action="" id="select_cm_form" >	
<div class="form-group">	

                        <select id="select_cm" name="select_cm" class="form-control" >
						<option value="" <?php if($select_cm == "") echo ' selected = "selected" '; ?>>Select Committee Member</option>
						<?php
						if($cms){
							foreach($cms as $cm){
								if($select_cm == $cm->user_id)$selected = 'selected = "selected"';
								else $selected = '';
								echo '<option value="'.$cm->user_id.'"  '.$selected.'>'.$cm->first_name.' '.$cm->last_name.'</option>';
							}
							
						}
						?>
						</select>

</div>						
</form>
</div>

<div class="col-md-3">
<a data-toggle="modal"  data-target="#myModal3"  class="btn btn-primary " style="margin-top:15px;width:45%;float:left" >Select Status</a>

</div>
<div class="col-md-3">
<a data-toggle="modal"  data-target="#myModal2"  class="btn btn-primary " style="margin-top:15px;width:45%;float:left" >Search</a>
<?php if(trim($search) != ''){?>
<a href="<?php echo site_url('reports/clear_search'); ?>" class="btn btn-danger"  style="margin-top:15px;width:49%;margin-left:2px" >Clear Search</a>

<?php } ?>
</div>


</div> 			
        
		
		
		
		
		
		
		
		<div class="table-responsive" >
		<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">

                  <thead>
                                        <tr>
                                            
                                            <th>Proposal Title</th>
											<th>Proposer Name</th>
											<th>Email Address</th>
											<th>Country</th>
											<th>University</th>
											<th>Event Name</th>
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
                                            <td><a href="<?php echo site_url('proposals/view/'.$proposal->proposal_id); ?>" title="<?php echo $proposal->proposal_title; ?>" ><?php echo substr($proposal->proposal_title,0,25).(strlen($proposal->proposal_title) >25 ? '.....' : ''); ?></a></td>
											<td><?php echo $proposal->first_name." ".$proposal->last_name; ?></td>
											<td><?php echo $proposal->email; ?></td>
											<td><?php echo $proposal->country; ?></td>
											<td><?php echo $proposal->university; ?></td>
											<td><?php echo $proposal->event_name; ?></td>
											<td><?php echo $proposal->session_format; ?></td>
                                            <td>Track <?php echo $proposal->session_track; ?></td>
											
											   <td style="text-align: center;"><?php  
  if($proposal->status == 0)echo '<span  class="label label-warning">Pending</span>'; 
  elseif($proposal->status == 1)echo '<span  class="label label-success">Approved</span>';
  elseif($proposal->status == 2)echo '<span  class="label label-info">PA</span>';
  else echo '<span  class="label label-danger">Rejected</span>';
  ?></td>
                                            <td style="text-align: center;">
											
											<div class="btn-group">
                                <a href="<?php echo site_url('proposals/view/'.$proposal->proposal_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="View"><i class="fa fa-eye"></i> View</a>
                                 <a href="<?php echo site_url('proposals/download_pdf/'.$proposal->proposal_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Download PDF"><i class="fa fa-download"></i> Download PDF</a>
                                 <a style="margin:0px auto;display:block" onclick="return confirm('Are you sure?'); " href="<?php echo site_url('proposals/delete/'.$proposal->proposal_id); ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="View"><i class="fa fa-remove"></i> Delete</a>
                                  
									
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
                 <h4 class="modal-title">Search</h4></div>
            <div class="modal-body">
			
			
                         	
<form method="post" action="" id="search_form" class="form-horizontal form-bordered" >	
<div class="form-group" >
<label class="col-md-3 control-label" style="text-align:right">Search by :</label> 
<div class="col-md-4">
<input type="text" class="form-control " name="search" value="<?php echo $search; ?>" placeholder="Enter Searching Text" required />
</div>
</div>
<div class="form-group" >
<label class="col-md-3 control-label" style="text-align:right">Select Criteria :</label> 
<div class="col-md-4">

                        <select id="criteria" name="criteria" class="form-control" required >
						<option value="" <?php if($criteria == "") echo ' selected = "selected" '; ?>>Select Option</option>
						<option value="country" <?php if($criteria == "country") echo ' selected = "selected" '; ?> >Country</option>
						<option value="university" <?php if($criteria == "university") echo ' selected = "selected" '; ?> >University Name</option>
						<option value="name" <?php if($criteria == "name") echo ' selected = "selected" '; ?> >Proposer’s First Name or Last Name</option>
						<option value="email" <?php if($criteria == "email") echo ' selected = "selected" '; ?> > E-mail Address</option>
						</select>
	</div>					
</div>						
</form>

            
			
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="search_butt">Search</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->     
        
<!-- /.modal -->

<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Proposal Status</h4></div>
            <div class="modal-body">
			
			
                         	
<form method="post" action="" id="status_form" class="form-horizontal form-bordered" >	
<div class="form-group" >
<label class="col-md-3 control-label" style="text-align:right">Status:</label> 
<div class="col-md-4">
<select type="text" id="select_status" name="select_status" class="form-control"   required>
							 <option value="" <?php if($select_status == "") echo ''; ?> >Select Status</option>
							  <option value="0" <?php if($select_status == "0") echo ' selected="selected" '; ?>>Pending</option>
							 <option value="1" <?php if($select_status == "1") echo ' selected="selected" '; ?>>Approved</option>
							  <option value="2" <?php if($select_status == "2")echo ' selected="selected" '; ?> >Provisionally Accepted</option>
							  <option value="3" <?php if($select_status == "3") echo ' selected="selected" '; ?> >Rejected</option>
							</select>
	</div>					
</div>						
</form>

            
			
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="status_butt">update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->    
    
