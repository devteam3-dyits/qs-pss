<?php

 if($status == 1)
  $status_text = "accepted";
 elseif($status == 2)$status_text = "provisionally accepted";
 elseif($status == 3)$status_text = "rejected";
 elseif($status == 4)$status_text = "queued";
 
 
 
 ?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="height:40px;">
<tbody>
<tr bgcolor="#FFFFFF"><td>
<p style="font-size:15px;font-family:Helvetica;color:#606569;padding:0 0 10px;">	
Dear <?php echo $salutation; ?> <?php echo $user->first_name; ?>  <?php echo $user->last_name; ?> ,
</p>
<p style="font-size:15px;font-family:Helvetica;color:#606569;padding:0 0 10px;">	
Your proposal titled "<?php echo $proposal->proposal_title; ?>" has been not selected for <?php echo $event->event_name; ?>, you may log in to <a href="http://www.qsglobalevents.com/pss/" >QS Proposal Submission System </a> to check comments from our event committee regarding this.
</p>
<p style="font-size:15px;font-family:Helvetica;color:#606569;padding:0 0 10px;">	
Please note that you can no longer edit your proposal through <a href="http://www.qsglobalevents.com/pss/" >QS Proposal Submission System</a> for <?php echo $event->event_name; ?>,however you could submit a new proposal or if you need to make amendments to this proposal, please write to 
<a href="mailto:event.ops@qs.com">event.ops@qs.com</a>
</p>
<p style="font-size:15px;font-family:Helvetica;color:#606569;padding:0 0 10px;">	
Thanks
</p>
<p style="font-size:15px;font-family:Helvetica;color:#606569;padding:0 0 10px;">	
Events Team, QS Branding and Conferences
</p>

</td>
</tr>
</tbody>
</table>