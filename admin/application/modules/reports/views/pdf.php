<style>
td{padding-bottom:10px}


</style>
<h1 style="text-align:center">Proposal</h1>
         
<table  style="width:100%">
<tr>			
 <td width="40%"><strong>Title of Proposal : </strong></td> <td> <?php echo $proposal->proposal_title; ?> </td> 
</tr> 

<tr>
 <td><strong>Proposed by : </strong></td>
 <td><?php echo $proposal->first_name.' '.$proposal->last_name; ?>,<br/>
 <?php echo $proposal->university; ?>
 </td>
 </tr>
  <tr>
  <td>
  <strong>Prposal Date : </strong>
  </td>
  <td>
  <?php echo date('Y-m-d',strtotime($proposal->proposal_created)); ?> 
  </td>
  </tr>
<tr>			
 <td width="25%"><strong> Event Name : </strong></td> <td> <?php echo $proposal->event_name; ?> </td> 
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
 <td colspan="2">
 <strong style="margin-bottom:10px">Presentation Abstract : </strong>
 
 </td>
 </tr>
 <tr>
 <td colspan="2">
 <p style="padding-top:50px">

 <?php echo $proposal->presentation; ?> 
 </p>
 </td>
 </tr>
 <tr>
 <td colspan="2">
 <strong style="margin-bottom:10px">Additional Remark  : </strong>
 
 </td>
 </tr>
 <tr>
 <td colspan="2">
  <p style="padding-top:10px">
  <?php echo $proposal->remark; ?> 
  </p>
  </td>
  </tr>
 
  <tr>
  <td>
  <strong>Status : </strong>
  </td>
  <td>
  <?php  
  if($proposal->status == 0)echo '<span  class="label label-warning">Pending</span>'; 
  elseif($proposal->status == 1)echo '<span  class="label label-success">Approved</span>';
  elseif($proposal->status == 2)echo '<span  class="label label-info">Provisionally Accepted</span>';
  else echo '<span  class="label label-danger">Rejected</span>';
  ?> 
  </td>
  </tr>
  </table>


