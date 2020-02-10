 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="height:40px;">
<tbody>
<tr bgcolor="#FFFFFF"><td>
<p style="font-size:15px;font-family:Helvetica;color:#606569;padding:0 0 10px;">	
Dear <?php echo $salutation; ?> <?php echo $user->first_name; ?>  <?php echo $user->last_name; ?> ,
</p>
<p style="font-size:15px;font-family:Helvetica;color:#606569;padding:0 0 10px;">	
You've been added as a committee member for <?php echo $event->event_name; ?> by QS Asia.
</p>

<p style="font-size:15px;font-family:Helvetica;color:#606569;padding:0 0 10px;">	
You may login to <a href="http://www.qsglobalevents.com/pss/cm/" >Committee Member’s section of QS Asia Proposal Submission System</a>.
</p>
<p style="font-size:15px;font-family:Helvetica;color:#606569;padding:0 0 10px;">	
Your login credentials are <br/>
Username: <?php echo $user->email; ?> <br/>
Password: <?php echo $user->raw_ps; ?> 
</p>



<p style="font-size:15px;font-family:Helvetica;color:#606569;padding:0 0 10px;">	
On your dashboard you'll see proposals from the tracks and events you are assigned to.
</p>
<p style="font-size:15px;font-family:Helvetica;color:#606569;padding:0 0 10px;">	
If you are a first-time user of this system, feel free to go through our "How-to" guide <a href="<?php echo $guid; ?>" >here</a>.
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