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
        <img src="<?php echo base_url() ; ?>assets/img/IMG_69864.jpg" alt="header image" class="animation-pulseSlow" style="height:auto !important">
    </div>
    <!-- END Dashboard Header -->
	
	
    
    <!-- Mini Top Stats Row -->
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="<?php echo site_url('proposals/add');?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        New <strong>Proposal</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="<?php echo site_url('proposals/index');?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                        <i class="fa fa-eye"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        View <strong>Proposals</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
         
		 
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="<?php echo site_url('my_profile/edit');?>" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                        <i class="gi gi-user"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        Edit <strong>User</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
         
		 
		 </div>
    <!-- END Mini Top Stats Row -->
