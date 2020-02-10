<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
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
.has-error #last_name,.has-success #last_name{
	
	border-radius:6px
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
<div id="login-container" class="animation-fadeIn" style="top:0px">
    <!-- Login Title -->
    <div class="login-title text-center"><img src="<?php echo base_url() ; ?>assets/img/logo.png" width="70" /> 
        <h1><strong><?php echo lang('header_title'); ?></strong><br><small>Proposer  <strong>Registration</strong> </small></h1>
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
       
        <!-- Register Form -->
        <form action="<?php echo site_url('sessions/signup'); ?>" method="post" id="form-register" class="form-horizontal form-bordered form-control-borderless">
		<div class="form-group">
                        <label class="col-md-3 control-label">Salutation*</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="salutation1">
                                <input type="radio" class="salut"   id="salutation1" name="salutation" value="Prof" checked> Prof
                            </label>
                            <label class="radio-inline" for="salutation2">
                                <input type="radio" class="salut"   id="salutation2" name="salutation" value="Dr"> Dr
                            </label>
                            <label class="radio-inline" for="salutation3">
                                <input type="radio" class="salut"   id="salutation3" name="salutation" value="Mr"> Mr
                            </label>
							 <label class="radio-inline" for="salutation4">
                                <input type="radio" class="salut"   id="salutation4" name="salutation" value="Ms"> Ms
                            </label>
							<label class="radio-inline" for="other_custom">
                                <input type="radio" class="salut"  id="other_custom" name="salutation" value="Other"
								> Other
                            </label>
                        </div>
                    </div>
					
					<div class="form-group" style="display:none" id="custom_div">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                        <input type="text" id="custom_salutation" name="custom_salutation" class="form-control input-lg" placeholder="Custom Salutation">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                        <input type="text" id="first_name" name="first_name" class="form-control input-lg" placeholder="Firstname">
                    </div>
                </div>
                <div class="col-xs-6">
				 <div class="input-group">
                    <input type="text" id="last_name" name="last_name" class="form-control input-lg" placeholder="Lastname">
                </div>
				</div>
            </div>
			
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                        <input type="text" id="email" name="email" class="form-control input-lg" placeholder="Email Address">
                    </div>
                </div>
            </div>
			 <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                        <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Password">
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
			<div class="form-group">
                        <label class="col-md-3 control-label">Gender</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="gender1">
                                <input type="radio" id="gender1" name="gender" value="Male" checked> Male
                            </label>
                            <label class="radio-inline" for="gender2">
                                <input type="radio" id="gender2" name="gender" value="Female"> Female
                            </label>
                             <label class="radio-inline" for="gender3">
                                <input type="radio" id="gender3" name="gender" value="Prefer not to disclose"> Prefer not to disclose
                            </label>
                        </div>
                    </div>
				

<div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
						
<select id="country" name="country" class="form-control input-lg" size="1">
<option value="">Please select country/region</option>           
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>	
                    
					
					</div>
                </div>
            </div>	


		<div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" id="tele" name="tele" class="form-control input-lg" placeholder="Telephone Number">
                    </div>
                </div>
            </div>
			<!--
			<div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-fax"></i></span>
                        <input type="text" id="fax" name="fax" class="form-control input-lg" placeholder="Fax Number">
                    </div>
                </div>
            </div>
			-->
			
           
            <div class="form-group form-actions">
                <div class="col-xs-6">
                    <a href="#modal-terms" data-toggle="modal" class="register-terms">Terms</a>
                    <label class="switch switch-primary" data-toggle="tooltip" title="Agree to the terms">
                        <input type="checkbox" id="agree" name="agree">
                        <span></span>
                    </label>
                </div>
                <div class="col-xs-6 text-right">
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Register Account</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12 text-center">
                    <p class="blink_me" style="color:red">
                    An account activation e-mail will be sent to the e-mail provided above, if you did not receive this e-mail please check your SPAM INBOX.
                    </p>
                    <small>Do you have an account?</small> <a href="<?php echo site_url('sessions/login'); ?>" id="link-register"><small>Login</small></a>
                </div>
            </div>
        </form>
        <!-- END Register Form -->
    </div>
    <!-- END Login Block -->

    <!-- Footer -->
    <footer class="text-muted text-center">
        <small>© QS Quacquarelli Symonds Limited.</small>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Login Container -->

<!-- Modal Terms -->
<div id="modal-terms" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Proposal Submission Portal - Guidelines and Conditions</h4>
            </div>
            <div class="modal-body">
			<h4>
			PLEASE READ THESE GUIDELINES AND CONDITIONS CAREFULLY AS THEY CONTAIN IMPORTANT INFORMATION REGARDING YOUR PROPOSAL SUBMISSION, APPROVAL PROCESS AND OBLIGATIONS. 
</h4>
			<p>Last Updated: 27 June 2017 </p>
<p>
Thank you for your interest in presenting at the QS-MAPLE 2018 Conference and Exhibition. The purpose of these guidelines and conditions are to aid you in your presentation preparation and make the whole submission process as seamless as possible.
</p>
<h4>
Submission Criteria 
</h4>
<ul>
<li>
Proposed papers must not have been previously published in books or in periodicals. 
</li>
<li>
Kindly note that all presentation slides will be uploaded to the official conference portal to be shared after the conference. Submission of the presentation slides is an acknowledgement by the presenter and granting the official organiser the rights to use the paper-copyrights. 
</li>
<li>
Presenters of accepted papers will be accorded a special presenter registration rate and will have to cover their own flight and accommodation expenses.
</li>
</ul>
<h4>
Target audience 
</h4>
<p>
Your presentation will be assigned to one of the five refereed parallel conference tracks. The purpose of the parallel conference tracks is to direct delegates towards the topics that most interest them (eg, internationalising the Student Body: International Student Recruitment, Support and Exchange). Please indicate in your proposal the track to which you believe your presentation will be best suited. 
</p>
<p>
Remember that the delegates will include a wide range of people from presidents, vice-chancellors and university policymakers, through senior academics and international directors to government officials in ministries of education and national education promotion bodies. Please do your best to make your presentation accessible to a mixed, non-technical audience and remember to explain acronyms and other specialist terms.
</p>
<h4>
Presentation Structure 
</h4>
<p>
When finalising your presentation, please keep in mind that each session will have 3 speakers, clustered together by theme. The sessions are intended to be interactive workshops rather than lectures, with two-thirds of the time taken up by traditional presentations and the remaining time by questions and answers (Q&A), facilitated by the Track Chair.

</p>
<ul>
<li>Presentations will normally be 20 minutes, followed by 10 minutes Q&A each. </li>
<li>
Presentations must be delivered by the author, who should be prepared and able to deal with the Q&A in English. 
</li>
<li>
Presenters may use their respective university or organisation as an illustrative case study to illustrate particular learning points (eg, different approaches to managing international student exchange or joint degrees), but should not be appear promotional in nature and should be self-critical (e.g., reflect on the strengths and weaknesses of the organisation’s experience) and focus on the transferable lessons for other delegates and their institutions. 
</li>
<li>
Please take care to limit references to your institution’s history, size, international ranking, etc to those aspects which are directly relevant to helping delegates understand how and why you approach internationalization in a particular way. 
</li>
<li>
Alternatively, you may propose a Panel Discussion, normally with four to six speakers. For these sessions, the Track Chair will invite each speaker (panel member) to make a short opening statement (up to 5 minutes) and then facilitate an interactive discussion with the audience.
</li>
</ul>

<h4>
Review and Approval Process 
</h4>
<p>
All our conferences have a dedicated International Academic Advisory Committee (IAAC). 
</p>
<p>
This committee consists of members from different universities and the members will be assigned to different tracks as track chairs. All submissions will be forwarded to the respective track chairs for their review and approval. 
</p>
<p>
Submissions with a Provisional Approval status will need to be revised based on the recommendations of the reviewing track chairs and re-submitted for approval within a week.
</p>
<h4>
Presenter Registration 
</h4>
<p> 
Upon approval of your presentation, an approval email will be forwarded to you. 
</p>
<p>
In this email, you will be informed of the following:
</p>
<ul>
<li>
Approved presentation title and assigned track
</li>
<li>
Assigned track chairs
</li>
<li>
Presentation ppt submission deadline
</li>
<li>
Presenter registration link 
</li>
</ul>
<p><strong>
Please note that if we do not receive your presenter registration by the deadline given, we will automatically release your speaking slot to the next available presenter.
</strong></p>
<h4>
ACKNOWLEDGEMENT AND ACCEPTANCE OF AGREEMENT 
</h4>
<p>
These Guidelines and Conditions govern your access to and use of the Site, Application and Services and all Collective Content (defined below), and constitute a binding legal agreement between you and QS Asia. Please read carefully these Terms and Conditions. By using the Site, you agree on the Guidelines and Conditions set forth in this article.
</p>
<p>
YOU ACKNOWLEDGE AND AGREE THAT, BY ACCESSING OR USING THE SITE, APPLICATION OR SERVICES FROM OR ON THE SITE. YOU ARE INDICATING THAT YOU HAVE READ, AND THAT YOU UNDERSTAND AND AGREE TO BE BOUND BY THESE CONDITIONS, WHETHER OR NOT YOU HAVE REGISTERED WITH THE SITE AND APPLICATION. IF YOU DO NOT AGREE TO THESE TERMS, THEN YOU HAVE NO RIGHT TO ACCESS OR USE THE SITE, APPLICATION, SERVICES, OR COLLECTIVE CONTENT.</div>
 </p>
 </div>
    </div>
</div>
<!-- END Modal Terms -->


<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="<?php echo base_url(); ?>assets/js/pages/login.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
	
	<script>
	$(document).ready(function(){
		
jQuery.validator.addMethod("custom_email",  function(value, element) {
        return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    }, "Please add valid email address");
		$('#form-register').validate(
		{
		
		rules:{
		
		first_name:{required:true},	
		last_name:{required:true},
		email:{
		required:true,
		custom_email:true,
		remote :  {
        url :  "<?php echo site_url('sessions/check_email'); ?>",
        type :  "post",
        data :  {
          email :  function() {
            return $( "#email" ).val();
          }
        }
      
	  
	  }
	  
	  },
		password:{required:true,minlength:10,maxlength:25},
		passwordv:{required : true,equalTo:"#password"},
		country:{required : true},
		tele:{required : true},
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
		
		errorPlacement: function(error, element) {
	if($(element).attr('id') == 'last_name')error.insertAfter(element);	
    else error.insertAfter($(element).closest( ".input-group" ));
  }		,
		
		highlight: function(element, errorClass, validClass) {
	if($(element).attr('id') == 'first_name' || $(element).attr('id') == 'last_name')
		$(element).closest( ".col-xs-6" ).addClass('has-error').removeClass('has-success');
    else $(element).closest( ".form-group" ).addClass('has-error').removeClass('has-success');
    
  },
  unhighlight: function(element, errorClass, validClass) {
   if($(element).attr('id') == 'first_name' || $(element).attr('id') == 'last_name')
   $(element).closest( ".col-xs-6" ).addClass('has-success').removeClass('has-error');
   else $(element).closest( ".form-group" ).addClass('has-success').removeClass('has-error');
  }
  ,
		
	messages : {
                email :  {
                    remote :  "Email already taken"
                }
            }
	
		
		
		});
		
		$('.salut').click(function(){
	if($(this).val() == 'Other'){
	$('#custom_div').css('display','block');	
	}
	else{
	$('#custom_div').css('display','none');		
		
	}
	
	});
		
	});
	</script>


    </body>
</html>
