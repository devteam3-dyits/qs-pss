<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        

        <title><?php echo lang('header_title'); ?></title>

        <meta name="description" content="QS Proposal Submission System - Committee Member Login">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/icon180.png" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->
        
        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr.min.js"></script>
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-105593315-2', 'auto');
  ga('send', 'pageview');

</script>
    </head>
	<style>
		.has-error .form-control, .has-error .input-group-addon {
   
    background-color: #ffffff  !important;
	border:1px solid #e74c3c !important;
	
}


.has-success .form-control, .has-success .input-group-addon {
   
   border:1px solid #27ae60 !important;
    background-color: #ffffff  !important;
	
}

.error{
color:#e74c3c;
font-weight: 400;
}		
a.sidebar-brand:hover, a.sidebar-brand:focus, a.sidebar-title:hover, a.sidebar-title:focus {
    background: none;
}
		</style>
    <body>
<!-- Page Wrapper -->
<!-- In the PHP version you can set the following options from inc/config file -->
<!--
    Available classes:

    'page-loading'      enables page preloader
-->
<div id="page-wrapper">
    <!-- Preloader -->
    <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
    <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
    <div class="preloader themed-background">
        <h1 class="push-top-bottom text-light text-center"><?php echo $header_title; ?></h1>
        <div class="inner">
            <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
            <div class="preloader-spinner hidden-lt-ie10"></div>
        </div>
    </div>
    <!-- END Preloader -->

    <!-- Page Container -->
    <!-- In the PHP version you can set the following options from inc/config file -->
    <!--
        Available #page-container classes:

        '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

        'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
        'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
        'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
        'sidebar-mini sidebar-visible-lg-mini'          for a mini main sidebar with a flyout menu, enabled by default (> 991px + Best with static layout)
        'sidebar-mini sidebar-visible-lg'               for a mini main sidebar with a flyout menu, disabled by default (> 991px + Best with static layout)

        'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
        'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
        'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

        'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

        'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

        'style-alt'                                     for an alternative main style (without it: the default style)
        'footer-fixed'                                  for a fixed footer (without it: a static footer)

        'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

        'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
        'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

        'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links
    -->
        <div id="page-container" class="sidebar-visible-lg sidebar-no-animations">
        <!-- Alternative Sidebar -->
        
        <!-- END Alternative Sidebar -->

        <!-- Main Sidebar -->
        <div id="sidebar">
            <!-- Wrapper for scrolling functionality -->
            <div id="sidebar-scroll">
                <!-- Sidebar Content -->
                <div class="sidebar-content" style="text-align:center">
                    <!-- Brand -->
					<a href="<?php echo base_url(); ?>" class="sidebar-brand"
					style="text-align:center; padding-top: 10px;">
					 <img src="<?php echo base_url() ; ?>../assets/img/logo.png" width="60" /> 
					 </a>
                    <a href="<?php echo base_url(); ?>" class="sidebar-brand"
                    style="text-align: center; padding-top: 5px; font-weight: 600;">
                        <span class="sidebar-nav-mini-hide">PSS</span>
                    </a>
                    <!-- END Brand -->

                    <!-- User Info -->
                    <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                        <div class="sidebar-user-avatar">
                            <a href="<?php echo site_url('my_profile'); ?>">
							<?php 
							$profile_img = $this->session->userdata('profile_img');
						
							if($profile_img != ''){ ?>
							 <img src="<?php echo base_url(); ?>uploads/profile_imgs/<?php echo $profile_img; ?>" >
							<?php }else{ ?>
                                <img src="<?php echo base_url(); ?>assets/img/placeholders/avatars/avatar2.jpg" >
                            <?php } ?>
							</a>
                        </div>
                        <div class="sidebar-user-name"><?php echo $this->session->userdata('user_name'); ?></div>
                       
                    </div>
                    <!-- END User Info -->


                                        <!-- Sidebar Navigation -->
                    <ul class="sidebar-nav">
                                                                       
                                  
                                                                <li>
                                    <a href="<?php echo site_url('dashboard/index'); ?>"><i class="gi gi-pie_chart sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                                                                    </li>
                                                                <li>
                                    <a href="<?php echo site_url('proposals/index'); ?>"><i class="gi gi-file sidebar-nav-icon"></i>Proposals</a>
                                                                    </li>
                                                                <li>
                                    
                                                            </ul>
                                                   
                    <!-- END Sidebar Navigation -->
                    
                    
                </div>
                <!-- END Sidebar Content -->
            </div>
            <!-- END Wrapper for scrolling functionality -->
        </div>
        <!-- END Main Sidebar -->

        <!-- Main Container -->
        <div id="main-container">
            <!-- Header -->
            <!-- In the PHP version you can set the following options from inc/config file -->
            <!--
                Available header.navbar classes:

                'navbar-default'            for the default light header
                'navbar-inverse'            for an alternative dark header

                'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                    'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                    'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
            -->
            <header class="navbar navbar-default">
                                <!-- Left Header Navigation -->
                <ul class="nav navbar-nav-custom">
                    <!-- Main Sidebar Toggle Button -->
                    <li>
                        <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                            <i class="fa fa-bars fa-fw"></i>
                        </a>
                    </li>
                    <!-- END Main Sidebar Toggle Button -->

                    <!-- Template Options -->
                    <!-- Change Options functionality can be found in js/app.js - templateOptions() -->
                    
                    <!-- END Template Options -->
                </ul>
                <!-- END Left Header Navigation -->

                

                <!-- Right Header Navigation -->
                <ul class="nav navbar-nav-custom pull-right">
                    <!-- Alternative Sidebar Toggle Button -->
                 
                    <!-- END Alternative Sidebar Toggle Button -->

                    <!-- User Dropdown -->
                    <li class="dropdown">
                        <a href="<?php echo site_url('my_profile'); ?>" class="dropdown-toggle" data-toggle="dropdown">
                           <?php $profile_img = $this->session->userdata('profile_img');
                             if($profile_img != ''){
						   ?> 
							<img src="<?php echo base_url(); ?>uploads/profile_imgs/<?php echo $profile_img; ?>" > <i class="fa fa-angle-down"></i>
						<?php }else{ ?>
						<img src="<?php echo base_url(); ?>assets/img/placeholders/avatars/avatar2.jpg" alt="avatar"> <i class="fa fa-angle-down"></i>
						<?php } ?>						
						</a>
                        <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                           <li>
                                <a href="<?php echo site_url('my_profile'); ?>">
                                    <i class="fa fa-user fa-fw pull-right"></i>
                                    Profile
                                </a>
                                
                            </li>
                            <li class="divider"></li>
                            <li>
                                
                                <a href="<?php echo site_url('sessions/logout'); ?>"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                            </li>
                           </ul>
                    </li>
                    <!-- END User Dropdown -->
                </ul>
                <!-- END Right Header Navigation -->
                            </header>
            <!-- END Header -->

<!-- Page content -->
<div id="page-content">