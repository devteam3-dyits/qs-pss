

</div>
<!-- END Page Content -->

            <!-- Footer -->
            <footer class="clearfix">
                
                <div class="pull-left">
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
    return this.optional(element) || (element.files[0].size <= 1 * 1024 * 1024) ;
    
    return false; 
});

function getWordCount(wordString) {
  var words = wordString.split(" ");
  words = words.filter(function(words) { 
    return words.length > 0
  }).length;
  return words;
}

//add the custom validation method
jQuery.validator.addMethod("wordCount",
   function(value, element, params) {
      var count = getWordCount(value);
      if(count <= params[0]) {
         return true;
      }
   },
   function(params, element) {
  return 'A maximum of 150 words is required here. But ' + getWordCount($(element).val()) + ' words are found';
}
  
);


  jQuery.validator.addMethod("custom_email",  function(value, element) {
        return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    }, "Please add valid email address");
		$('#form-profile').validate(
		{
		
		rules:{
		
		first_name:{required:true},	
		last_name:{required:true},
		
		job_title:{required : true},
		university:{required : true},
		profile_img:{required:true,filesize:true},
		department:{required : true},
		mail:{required : true},
		country:{required : true},
		tele:{required : true},
		//fax:{required : true},
		agree:{required:true},
		summary:{required:true},
		custom_salutation:{required : function(){
			if($('#other_custom').is(':checked'))return true;
			else return false;
			
		}}
			
		}
		
		
		,
        success: function(label,element) {
                label.hide();
				
            },		
		
		
		highlight: function(element, errorClass, validClass) {
	$(element).closest( ".form-group" ).addClass('has-error').removeClass('has-success');
    
  },
  unhighlight: function(element, errorClass, validClass) {
   $(element).closest( ".form-group" ).addClass('has-success').removeClass('has-error');
  },
  
  
  messages: { profile_img: "File must be JPEG,JPG, GIF or PNG, less than 1MB" }
  
		
		});
		
		
		$('#form-proposal').validate({
			rules:{
		event_id:{required:true},	
		proposal_title:{required:true,maxlength:150},
		session_format:{required:true},
		session_track:{required:true},
		presentation:{required:true,wordCount: ['150']}
		//remark:{required:true,wordCount: ['150']}
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
		
			$('#event_id').change(function(){
			    var event_id = $(this).val();
			    
			$.get('<?php echo site_url('proposals/track_details/'); ?>/'+ event_id ,
function(data){
//alert(data);
	$('#track_details').html(data);
	
});


var old_event = $('#old_event').val();
var old_track = $('#old_track').val();

if(old_event == event_id && old_track > 0){
 var url = '<?php echo site_url('proposals/filled_tracks'); ?>/'+ event_id + '/true/' + old_track;

}else{
 var url = '<?php echo site_url('proposals/filled_tracks'); ?>/'+ event_id  ;

}


$.get(url,
function(data){

	$('#tracks_full').html(data);
	
});

			
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
		
		$('#fb-butt').click(function(){
			 var result = $("#form-fdback").valid();
			 if(result){
				 $("#form-fdback").submit();
			 }
			
		});
		
		
		
function display_tracks(){
var event_id = $('#event_id').val();
var session_format = $('#session_format').val();
var old_event = $('#old_event').val();
var old_track = $('#old_track').val();
//if(session_format != 'Panel'){
$.post('<?php echo site_url('proposals/check_tracks'); ?>',{event_id:event_id,old_track:old_track,old_event:old_event},
function(data){
//	alert(data);
	$('#session_track').html(data);
	
});
//}
//else $('#session_track').html('');	
	
}		
	$('#event_id').change(function(){
display_tracks();
		
		});	
		
$('#session_format').change(function(){		
//if($(this).val() == 'Panel') $('#track_div').css('display','none');
//else{
	display_tracks();
	$('#track_div').css('display','block'); 
//}
});

$('.salut').click(function(){
	if($(this).val() == 'Other'){
	$('#custom_div').css('display','block');	
	}
	else{
	$('#custom_div').css('display','none');		
		
	}
	
	});
	
	$('#max_cop').change(function(){
	
	if($(this).val() > 0){
	$('#cop_div').css('display','block');
   
	
	 if($(this).val() >= 2){
	     
		 $('#tab1').css('display', 'block');
		  $('#tab2').css('display', 'block');
		   $('#tab3').css('display', 'none');
	 }
    else{
		$('#tab1').css('display', 'block');
		  $('#tab2').css('display', 'none');
		   $('#tab3').css('display', 'none');
		
	} 
	
	 if($(this).val() >= 3) $('#tab3').css('display', 'block');
    else  $('#tab3').css('display', 'none');
	$('.nav-tabs a[href="#tab1default"]').tab('show');
	}
	else{
	$('#cop_div').css('display','none');		
		
	}	
	});
	
	$('#session_track').change(function(){
	var val = $(this).find('option:selected').text();
	if(val.includes("- Full") == true ){
	alert("The track you selected is currently full. Hence, your proposal will be placed on the waiting list.");
	}
	
	});
	
		
		});


</script>
<div id="results-modals">
</div>
    </body>
</html>