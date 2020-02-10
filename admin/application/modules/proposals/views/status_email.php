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
Congrats! Your proposal titled "<?php echo $proposal->proposal_title; ?>" has been <?php echo $status_text; ?>  to be presented at <?php echo $event->event_name; ?>
</p>
<p style="font-size:15px;font-family:Helvetica;color:#606569;padding:0 0 10px;">	
Please note that you can no longer edit your proposal through <a href="http://www.qsglobalevents.com/pss/" >QS Proposal Submission System</a> for <?php echo $event->event_name; ?>, if you need to make amendments to this proposal, please write to 
<a href="mailto:event.ops@qs.com">events@qs-asia.com</a> 
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