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
	<div class="col-md-12">	
<h1>
<?php echo $this->session->userdata('dash_event_name')
?>
</h1>
 </div>
 
 </div> 
	<div class="row">

	<div class="col-sm-6">
            <!-- Widget -->
            <a href="<?php if($event_id > 0)echo site_url('dash_proposals/event_all'); else echo site_url('dash_proposals/all'); ?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background animation-fadeIn" >
                        <?php echo $total; ?>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown"  style="color:#000">
                        Total <strong>Submissions</strong><br>
                       
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>

        <div class="col-sm-6">
            <!-- Widget -->
            <a href="<?php echo site_url('dash_proposals/today'); ?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background animation-fadeIn"  style="background-color:#000">
                        <?php echo $total_today; ?>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown" style="color:#000">
                        Total <strong>Today</strong><br>
                    
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>

		<div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="<?php echo site_url('dash_proposals/approved'); ?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                        <?php echo $total_approved; ?>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown" style="color:#27ae60">
                        Total <strong>Approved</strong><br>
						
                       
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>

        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="<?php echo site_url('dash_proposals/pending'); ?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn" >
                       <?php echo $total_pending; ?>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown" style="color:#e67e22">
                        Total <strong>Pending</strong><br>
						
                       
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        
        
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="<?php echo site_url('dash_proposals/queued'); ?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-fire animation-fadeIn" >
                       <?php echo $total_qu; ?>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown" style="color:#e74c3c">
                        Total <strong>Queued</strong><br>
						
                       
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        
        
        

        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="<?php echo site_url('dash_proposals/rejected'); ?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                       <?php echo $total_rejected; ?>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown" style="color:#e74c3c">
                        Total <strong>Rejected</strong><br>
						
                       
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>

        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="<?php echo site_url('dash_proposals/pa'); ?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                       <?php echo $total_pa; ?>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        Total <strong>PA</strong><br>
                      
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div></div>
            
		<style type="text/css">
		.col-xs-15,
.col-sm-15,
.col-md-15,
.col-lg-15 {
    position: relative;
    min-height: 1px;
    padding-right: 10px;
    padding-left: 10px;
}

.col-xs-15 {
    width: 20%;
    float: left;
}
@media (min-width: 768px) {
.col-sm-15 {
        width: 20%;
        float: left;
    }
}
@media (min-width: 992px) {
    .col-md-15 {
        width: 20%;
        float: left;
    }
}
@media (min-width: 1200px) {
    .col-lg-15 {
        width: 20%;
        float: left;
    }
}

		</style>
   <div class="row show-grid" >
   
<?php for($i=1;$i<=$track_count;$i++){
$md = $i + 1;

	?>
<div class="col-md-15 col-sm-3" >
            <!-- Widget -->
            <a href="<?php echo site_url('dash_proposals/track/'.$i); ?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background animation-fadeIn" style="background-color:#a74<?php echo $i ?>c3">
                        <?php echo ${'total_track'.$i}; ?>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown" style="color:#a74<?php echo $i ?>c3">
                        Total <strong>Track<?php echo $i ?></strong><br>
						
                       
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
											
<?php } ?>
	
   
   </div>
   
   
   
   
   
   
   <?php /*

   <div class="row">
     <div class="block">
     <h2 style="text-align:center"><strong>Totals</strong></h2>
        <div class="table-responsive">
            <table class="table table-vcenter table-striped">

                  <thead>
                                        <tr>
                                            
                                            <th><strong>Event Name</strong></th>
											<th><strong>Proposals</strong></th>
											<?php 
											$track_count = $this->db->get('settings')->row()->track_count;
											for($i=1;$i<=$track_count;$i++){ ?>
											<th><strong>Track<?php echo $i; ?></strong></th>
											<?php } ?>
											<th><strong>Approved</strong></th>
                                            <th><strong>Provisionally Accepted</strong></th>											
											<th><strong>Rejected</strong></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									if($events){
										foreach($events as $event){
											?>
                                        <tr>
                                            <td><?php echo $event->event_name; ?></td>
											<td><?php echo $event->total; ?></td>
											<?php for($i=1;$i<=$track_count;$i++){ ?>
											<td><?php echo $event->{'total_track'.$i}; ?></td>
											<?php } ?>
											<td><?php echo $event->total_approved; ?></td>
											<td><?php echo $event->total_paccepted; ?></td>
											<td><?php echo $event->total_rejected; ?></td>
                                        </tr>
										<?php }
									}
                                      ?>									
                                    </tbody>
            </table>
			  </div>
   </div>
	</div>	
    <!-- END Mini Top Stats Row -->
<?php */ ?>