
</div>
<!-- END Page Content -->

            <!-- Footer -->
            <footer class="clearfix">
                
                <div class="pull-left ">
                    &#xA9;  QS Quacquarelli Symonds Limited.
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

<!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="index.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                    <fieldset>
                        <legend>Vital Info</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-8">
                                <p class="form-control-static">Admin</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                            <div class="col-md-8">
                                <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="admin@example.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-notifications">Email Notifications</label>
                            <div class="col-md-8">
                                <label class="switch switch-primary">
                                    <input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" checked>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Password Update</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-password">New Password</label>
                            <div class="col-md-8">
                                <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>
                            <div class="col-md-8">
                                <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="..and confirm it!">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END User Settings -->

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/additional-methods.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>

	
	  <script type="text/javascript">
$(document).ready(function() {
  $('.cancel').click(function(){
self.location= $(this).attr('data-href');
});	

   $(".delete").click(function(){
	var text = "Are you sure.Do you want to delete this record?";
	return confirm(text);  
	  
  });

  $.validator.addMethod('filesize', function(value, element, param) {
    // param = size (in bytes) 
    // element = element to validate (<input>)
    // value = value of the element (file name)
    return this.optional(element) || (element.files[0].size <= 1024 * 1024) 
});
  jQuery.validator.addMethod("custom_email",  function(value, element) {
        return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    }, "Please add valid email address");
		$('#form-admin').validate(
		{
		
		rules:{
		
		first_name:{required:true},	
		last_name:{required:true},	
        email:{required:true,custom_email:true},			
		country:{required : true},
		password:{minlength:10,maxlength:25},
		confirm_password:{equalTo:"#password"}
			
		},
        success: function(label,element) {
                label.hide();
				
            },		
		
		
		highlight: function(element, errorClass, validClass) {
	$(element).closest( ".form-group" ).addClass('has-error').removeClass('has-success');
    
  },
  unhighlight: function(element, errorClass, validClass) {
   $(element).closest( ".form-group" ).addClass('has-success').removeClass('has-error');
  }
  
		
		});
		
		$('#form-cm').validate(
		{
		
		rules:{
		
		first_name:{required:true},	
		last_name:{required:true},	
        email:{required:true,custom_email:true},			
		password:{minlength:10,maxlength:25},
		confirm_password:{equalTo:"#password"}
			
		},
        success: function(label,element) {
                label.hide();
				
            },		
		
		
		highlight: function(element, errorClass, validClass) {
	$(element).closest( ".form-group" ).addClass('has-error').removeClass('has-success');
    
  },
  unhighlight: function(element, errorClass, validClass) {
   $(element).closest( ".form-group" ).addClass('has-success').removeClass('has-error');
  }
  
		
		});
		
		$('#form-proposal').validate({
			rules:{
		event_id:{required:true},	
		proposal_title:{required:true,maxlength:150},
		session_format:{required:true},
		session_track:{required:true},
		presentation:{required:true},
		remark:{required:true}
		},	
		success: function(label,element) {label.hide();  },			
		
		highlight: function(element, errorClass, validClass) {
    $(element).parent( ".form-group" ).addClass('has-error').removeClass('has-success');
    
  },
  unhighlight: function(element, errorClass, validClass) {
   $(element).parent( ".form-group" ).addClass('has-success').removeClass('has-error');
  },
   submitHandler: function(form) {
    // do other things for a valid form
    form.submit();
	return false;
  }	
			
		});
		
		$('#form-change-status').validate({
		    
		    rules:{
		        
		        status:{
		            required :true
		        },
		        reason:{
		            
		            required : function(){ 
		                if($('#status').val().trim() == '3' || $('#status').val().trim() == '2'){return true;}
		                else {return false;}
		                
		               
		            },
		              minlength:8
		        }
		        
		        
		      
		    }
		});
        
		
		
		$('#form-change-password').validate(
		{
		
		rules:{
		password:{required:true,minlength:10,maxlength:25},
		passwordv:{required : true,equalTo:"#password"},
		},
        success: function(label,element) {
                label.hide();
				
            },		
		
		
		
		highlight: function(element, errorClass, validClass) {
	$(element).closest( ".form-group" ).addClass('has-error').removeClass('has-success');
    
  },
  unhighlight: function(element, errorClass, validClass) {
   $(element).closest( ".form-group" ).addClass('has-success').removeClass('has-error');
  }
  		
		});
		
		$('#pass_change_butt').click(function(){
			 var result = $("#form-change-password").valid();
			 if(result){
				 $("#form-change-password").submit();
			 }
			
		});
		
		
		$('#form-upload').validate(
		{
		
		rules:{
		profile_img:{
			required:true,
			extension: "jpg,jpeg,png,gif",
            filesize: true
			}
		},
        success: function(label,element) { label.hide(); },			
		highlight: function(element, errorClass, validClass) {
	$(element).closest( ".form-group" ).addClass('has-error').removeClass('has-success');
    
  },
  unhighlight: function(element, errorClass, validClass) {
   $(element).closest( ".form-group" ).addClass('has-success').removeClass('has-error');
  },
  messages: { profile_img: "File must be JPEG,JPG, GIF or PNG, less than 1MB" }
  		
		});
		

		$('#upload_butt').click(function(){
			 var result = $("#form-upload").valid();
			 if(result){
				 $("#form-upload").submit();
			 }
			
		});
		
		$('#form-assign').validate();
		$('#form-make-cm').validate();
		$('#cm_butt').click(function(){
			 var result = $("#form-make-cm").valid();
			 if(result){
				 $("#form-make-cm").submit();
			 }
			
		});
		
		$('#form-export').validate();
		$('#export_butt').click(function(){
			 var result = $("#form-export").valid();
			 if(result){
				 $("#form-export").submit();
			 }
			
		});
		
			$('#form-export-all').validate();
		$('#export_all_butt').click(function(){
			 var result = $("#form-export-all").valid();
			 if(result){
				 $("#form-export-all").submit();
			 }
			
		});
		
		$('#filter_event_id').change(
		function(){
			$("#filter_form").submit();
		});
		
		$('#sort_id').change(
		function(){
			$("#sort_form").submit();
		});
		
		$('#select_cm').change(
		function(){
			$("#select_cm_form").submit();
		});
		
		$('#dash_event_id').change(
		function(){
			$("#dash_event").submit();
		});
		
		$('#filter_country').change(
		function(){
			$("#filter_country_form").submit();
		});
		
		
		
		
		$('#filter_date_butt').click(
		function(){
			if($('#to_date').val() == '')$('#to_date').val('<?php echo date('m/d/Y'); ?>');
			if($('#from_date').val() == '')$('#from_date').val('<?php echo date('m/d/Y'); ?>');
			$("#filter_date_form").submit();
		
		});
		
		
		
		
		
		$('#status_form').validate();
		
		
		$('#status_butt').click(
		function(){
			var result = $("#status_form").valid();
			 if(result){
				 $("#status_form").submit();
			 }
		});
		
			$('#pi_butt').click(
		function(){
			var result = $("#pi_form").valid();
			 if(result){
				 $("#pi_form").submit();
			 }
		});
		
		$('#search_form').validate();
		$('#search_butt').click(
		function(){
			var result = $("#search_form").valid();
			 if(result){
				 $("#search_form").submit();
			 }
		});
		
			$('#status').click(
		function(){
		    
		   var status = $(this).val(); 
		   if(status == 3 || status == 2 ){
		        if(status == 3 ){
		            $('#reject_label').css('display','block'); 
		             $('#pa_label').css('display','none'); 
		        }else{
		            $('#pa_label').css('display','block');  
		             $('#reject_label').css('display','none'); 
		            
		        }
		      $('#reason_div').css('display','block'); 
		      
		       
		   }else{
		       
		        $('#reason_div').css('display','none'); 
		        
		   } 
		    
		});
		  	
		});
		
		
		


</script>
<div id="results-modals">
</div>
    </body>
</html>