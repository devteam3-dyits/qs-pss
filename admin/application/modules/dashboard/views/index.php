<!-- Dashboard Header -->

    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                    <h1>Welcome <strong><?php echo $this->session->userdata('user_name'); ?></strong></h1>
                </div>
                <!-- END Main Title -->

                
            </div>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="<?php echo base_url() ; ?>assets/img/login_bg.jpg" alt="header image" class="animation-pulseSlow"  style="height:auto !important">
    </div>
    <!-- END Dashboard Header -->
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
	

     <style type="text/css">
      th{
		  
		font-size:12px !important;
        text-align:center;
		font-weight:bold;
		
	  }
	  
	  td{
		text-align:center;  
		  
	  }

     </style>	 
    <!-- Mini Top Stats Row -->

 
 
 <div class="row">
     
		<div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="<?php echo site_url('dashboard/events/All'); ?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn" style="background-color:#000 !important">
                        <?php 
                        $total  = $this->db->query('select count(proposal_id) as proposal_count from proposals where event_id in (select event_id from events where enabled=1)')->row()->proposal_count; 
                        echo $total;
                        ?>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown"  style="color:#000000">
                        <strong>All</strong><br> 
						
                       
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="<?php echo site_url('dash_proposals/total_pendings'); ?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn" style="background-color:#000 !important">
                        <?php 
                        $total  = $this->db->query('select count(proposal_id) as proposal_count from proposals where status = 0')->row()->proposal_count; 
                        echo $total;
                        ?>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown"  style="color:#000000">
                        <strong>Total Pending</strong><br> 
						
                       
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
     
	<?php if(sizeof($raw_events) > 0){
	    $i=0;
							foreach($raw_events as $event){
							    
$total  = $this->db->query('select count(proposal_id) as proposal_count from proposals where 1  and proposals.event_id = '.$event->event_id)->row()->proposal_count; 

$colours = array('#3D3D3D');
							    ?>
		<div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="<?php echo site_url('dashboard/events/'.$event->event_name); ?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn" style="background-color: <?php echo $colours[0]; ?> !important;">
                        <?php echo $total; ?>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown" style="color:<?php echo $colours[0]; ?>">
                        <strong><?php echo $event->event_name; ?></strong><br>
                        <?php if($event->open == 0){ ?>
						<span style="color:red;font-size:15px;font-weight:bold">Submission Closed</span>
						<?php } ?>
                       
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <?php

          	}
						}
		?>				
						
            <!-- END Widget -->
        </div>
 <div class="row">

	<div class="col-sm-12">
   <h1  >Users</h1>
	</div>
	 </div>
	<div class="row">

	<div class="col-sm-6">
            <!-- Widget -->
            <a href="<?php echo site_url('proposers/today_users'); ?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background animation-fadeIn" style="background-color:#000">
                       <?php echo $total_users_today; ?>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown"  style="color:#000">
                        Total <strong>Registered Today</strong><br>
                       
                    </h3>
                </div>
            </a>
            
            
   </div>
   
   	<div class="col-sm-6">
            <!-- Widget -->
            <a href="<?php echo site_url('proposers/index'); ?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background animation-fadeIn" style="background-color:#000">
                       <?php echo $total_users; ?>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown"  style="color:#000">
                        Total <br>
                       
                    </h3>
                </div>
            </a>
            
            
   </div>
   
   </div>

   
  
 
  
   
   
   