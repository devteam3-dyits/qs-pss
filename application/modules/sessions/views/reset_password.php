<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> 
<html class="no-js" lang="en"> <!--<![endif]-->
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        

        <title><?php echo lang('header_title'); ?></title>

        <meta name="description" content="QS Proposal Submission System - Submit a Proposal">
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
 	    .blink_me {
		        color:red;
   - -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
   
     -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
    -webkit-animation-duration: 2.5s; /* Safari 4.0 - 8.0 */
    -webkit-animation-iteration-count: infinite; /* Safari 4.0 - 8.0 */
    animation-name: example;
    animation-duration: 2.5s;
    animation-iteration-count: infinite;
    
}

@-webkit-keyframes example {
    
    100% {color:#000; left:0px; top:0px;}
}

/* Standard syntax */
@keyframes example {
    100% {color:#000; left:0px; top:0px;}
}
		</style>
    </head>
    <body>
<!-- Login Background -->
<div id="login-background">
    <!-- For best results use an image with a resolution of 2560x400 pixels (prefer a blurred image for smaller file size) -->
    <img src="<?php echo base_url() ; ?>assets/img/IMG_69864.jpg" alt="Login Background" class="animation-pulseSlow" style="height:auto !important">
</div>
<!-- END Login Background -->

<!-- Login Container -->
<div id="login-container" class="animation-fadeIn" style="top:75px">

    <!-- Login Title -->
    <div class="login-title text-center"><img src="<?php echo base_url() ; ?>assets/img/logo.png" width="70" /> 
        <h1><strong><?php echo lang('header_title'); ?></strong><br><small>Admin <strong>Login</strong> </small></h1>
    </div>
    <!-- END Login Title -->

    <!-- Login Block -->
    <div class="block push-bit">
        <!-- Login Form -->
            <?php if($this->session->flashdata('alert_success')){ ?>
                    <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('alert_success'); ?>
										
										</div>
				<?php }elseif(validation_errors()){?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo validation_errors(); ?>
										</div>
				
				<?php } elseif($this->session->flashdata('alert_error')){ ?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('alert_error'); ?>
										</div>
				<?php } ?>
                       
			
			<form action="<?php echo site_url('sessions/reset_password/'.$reset_code); ?>" method="post" id="form-reminder" class="form-horizontal form-bordered form-control-borderless display-none"  style="display: block;">
           	 <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                        <input type="password" id="password" name="password" class="form-control input-lg" placeholder="New Password">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                        <input type="password" id="passwordv" name="passwordv" class="form-control input-lg" placeholder="Verify Password">
                    </div>
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-xs-12 text-right">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Save</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12 text-center">
                      <small style="color:red" class="blink_me">
                      If you are logging in for the first time, make sure you have activated your account. If you didn't recieve an activation email, please check your spam inbox.
                       
                    </small>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12 text-center">
                    <small>Did you remember your password?</small> <a href="<?php echo site_url('sessions/login'); ?>" id="link-reminder"><small>Login</small></a>
                </div>
            </div>
        </form>

        
    </div>
    <!-- END Login Block -->

    <!-- Footer -->
    <footer class="text-muted text-center">
        <small>© QS Quacquarelli Symonds Limited.</small>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Login Container -->



<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>

	<script>
	$(document).ready(function(){
		

		$('#form-reminder').validate(
		{
		
		rules:{
		password:{required:true,minlength:10,maxlength:25},
		passwordv:{required : true,equalTo:"#password"},
		},
        success: function(label,element) {
                label.hide();
				
            },		
		
		errorPlacement: function(error, element) {
	error.insertAfter($(element).closest( ".input-group" ));
  }		,
		
		highlight: function(element, errorClass, validClass) {
	$(element).closest( ".form-group" ).addClass('has-error').removeClass('has-success');
    
  },
  unhighlight: function(element, errorClass, validClass) {
   $(element).closest( ".form-group" ).addClass('has-success').removeClass('has-error');
  }
  ,
		
	messages : {
                email :  {
                    remote :  "Email Not Found"
                }
            }
	
		
		
		});
		
	});
	</script>
 </body>
</html>

