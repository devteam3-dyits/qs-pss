<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
  <!-- END Horizontal Form Title -->
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
                               
                    <h2><strong>View Proposer </strong> </h2>
                </div>
                               
                   
<table  class="table table-vcenter table-condensed table-bordered">


 <tr>
  <td width="25%"><strong>First Name : </strong></td>
  <td><?php echo $proposer->first_name; ?> </td>
  </tr>
  <tr>
  <td>
 <strong>Last Name : </strong>
 </td>
 <td>
 <?php echo $proposer->last_name; ?> 
 </td>
 </tr>
 <tr>
 <td>
 <strong>Email Address : </strong>
 </td>
 <td>
 <?php echo $proposer->email; ?> 
 </td>
 </tr>
 <tr>
 <td>
  <strong>Gender : </strong>
  </td>
  <td>
  <?php echo $proposer->gender; ?> 
  </td>
  </tr>
  <tr>
 <td>
  <strong>Country : </strong>
  </td>
  <td>
  <?php echo $proposer->country; ?> 
  </td>
  </tr>
    <tr>
 <td>
  <strong>Telephone : </strong>
  </td>
  <td>
  <?php echo $proposer->tele; ?> 
  </td>
  </tr>
  <!--
    <tr>
 <td>
  <strong>Fax : </strong>
  </td>
  <td>
  <?php echo $proposer->fax; ?> 
  </td>
  </tr>
  -->
    <tr>
 <td>
  <strong>Job Title : </strong>
  </td>
  <td>
  <?php echo $proposer->job_title; ?> 
  </td>
  </tr>
     <tr>
 <td>
  <strong>University/Institution/Affiliation : </strong>
  </td>
  <td>
  <?php echo $proposer->university; ?> 
  </td>
  </tr>
    <tr>
 <td>
  <strong>University Name Acronym : </strong>
  </td>
  <td>
  <?php echo $proposer->university_accronym; ?> 
  </td>
  </tr>
     <tr>
 <td>
  <strong>Department : </strong>
  </td>
  <td>
  <?php echo $proposer->department; ?> 
  </td>
  </tr>
     <tr>
 <td>
  <strong>Mailing Address : </strong>
  </td>
  <td>
  <?php echo $proposer->mail; ?> 
  </td>
  </tr>
    <tr>
 <td>
  <strong>Summary Biography : </strong>
  </td>
  <td>
  <?php echo $proposer->summary; ?> 
  </td>
  </tr>
  <tr>
  <td>
  <strong>Created : </strong>
  </td>
  <td>
  <?php echo date('Y-m-d',strtotime($proposer->user_created)); ?> 
  </td>
  </tr>

  </table>
   <?php if($proposer->verified == 0){ ?>
  <a href="<?php echo site_url('proposers/activate/'.$proposer->user_id); ?>" class="btn btn-primary btn-large" >Activate Account </a>
  <?php }else{ ?>
  <a href="<?php echo site_url('proposers/deactivate/'.$proposer->user_id); ?>" class="btn btn-danger"  >Deactivate Account</a>
  <?php } ?>
			   </div>

	
	