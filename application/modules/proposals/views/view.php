<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
  <!-- END Horizontal Form Title -->
				
                               
                    <h2><strong>View Proposal - <?php echo $proposal->proposal_title; ?></strong> </h2>
                </div>
<table  class="table table-vcenter table-condensed table-bordered proposals">
<tr>			
 <td width="20%"><strong>Event Name : </strong></td> <td> <?php echo $proposal->event_name; ?> </td> 
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
 <td style="vertical-align:top">
 <strong>Presentation Abstract : </strong>
 </td>
 <td>
 <?php echo $proposal->presentation; ?> 
 </td>
 </tr>
 <tr>
<td  style="vertical-align:top">
  <strong>Tags : </strong>
  </td>
  <td>
  <?php echo $proposal->tags ?> 
  </td> 
</tr> 
 <tr>
<td  style="vertical-align:top">
  <strong>Target Audience : </strong>
  </td>
  <td>
  <?php echo $proposal->target_audience; ?> 
  </td> 
</tr> 
 <tr>
 <td  style="vertical-align:top">
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
  ($proposal->status == 0)echo '<span  class="label label-warning">Pending</span>'; 
  elseif($proposal->status == 1)echo '<span  class="label label-success">Approved</span>';
  elseif($proposal->status == 2)echo '<span  class="label label-info">Provisionally Accepted</span>';
 elseif($proposal->status == 3) echo '<span  class="label label-danger">Rejected</span>';
     //elseif($proposal->status == 5) echo '<span  class="label label-danger">On hold</span>';
   else echo '<span  class="label label-danger">Queued</span>';
  
   ?> 
  </td>
  </tr>
  <tr <?php if($proposal->status == 1)echo 'style="display:none"'; ?>><td><strong><?php if($proposal->status == 3) echo 'Reason for rejecting'; elseif($proposal->status == 2) echo 'Reason for provisionally accepting'; ?> </td><td><?php echo $proposal->reason; ?></td></tr>
  <tr><td>This proposal updated by</td><td><?php echo $proposal->status_by; ?></strong></td></tr>
  </table>
			   </div>
<div class="block">			   
<h4><strong>Co-Presenters</strong></h4>
<table  class="table table-vcenter table-condensed table-bordered">
<?php
if($cops){ ?>
 <thead>
                                        <tr>
                                           
                                            <th style="font-size:14px">First Name</th>
											<th style="font-size:14px">Last Name</th>
											<th style="font-size:14px">Gender</th>
											<th style="font-size:14px">Email Address</th>											
											<th style="font-size:14px">Job Title</th>
											<th style="font-size:14px">University</th>
											<th style="font-size:14px">Department</th>
											<th style="font-size:14px">Mailing Address</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
	foreach($cops as $co){
		?>
<tr>			
 <td><?php echo $co->first_name; ?></td>
											<td><?php echo $co->last_name; ?></td>
											<td><?php echo $co->gender; ?></td>
											<td><?php echo $co->email; ?></td>
											<td><?php echo $co->job_title; ?></td>
											<td><?php echo $co->university; ?></td>
											<td><?php echo $co->department; ?></td>
											<td><?php echo $co->mail; ?></td>
</tr> 
	<?php } ?>
	</tbody>
	
	<?php
}
	?>
</table>
</div>


<h4><strong>Comments on this proposal by committee members</strong></h4>
<?php 
if($comments){
	foreach($comments as $comment){
?>
<div class="block">
                <!-- Horizontal Form Title -->
                  <div class="block-title">
                  
                    <h2><strong><?php echo $comment->first_name; ?> <?php echo $comment->last_name; ?> on  <?php echo date('Y-m-d',strtotime($comment->comment_created)); ?></strong> </h2>
                </div>			   
                
			   <p><?php echo $comment->comment; ?></p>
            </div>

	<?php } 
}

?>	
	