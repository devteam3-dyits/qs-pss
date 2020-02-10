<div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    
                    <h2><strong>Edit Profile</strong></h2>
					<div class="block-options pull-right">
                        <a href="<?php echo site_url('my_profile/index'); ?>" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="View">View Profile</a>
                    </div>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->
                <form id="form-profile" action="<?php echo site_url('my_profile/edit'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
                   
                   <div class="form-group">
			<?php if($this->session->flashdata('alert_success')){ ?>
                    <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('alert_success'); ?>
										
										</div>
				<?php }elseif($this->session->flashdata('alert_error')){ ?>
                    <div class="alert alert-danger" style="text-align:center">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('alert_error'); ?>
										
										</div>
				<?php }elseif(validation_errors()){?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo validation_errors(); ?>
										</div>
				
				<?php } elseif(isset($error)){ ?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $error; ?>
										</div>
				<?php } ?>
                </div>
				
				<div class="col-md-6">
<div class="form-group">
                        <label class="col-md-3 control-label">Salutation*</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="salutation1">
                                <input type="radio" class="salut" id="salutation1" name="salutation" value="Prof"
								<?php if($user->salutation == 'Prof')echo 'checked'; ?>> Prof
                            </label>
                            <label class="radio-inline" for="salutation2">
                                <input type="radio" class="salut"  id="salutation2" name="salutation" value="Dr"
								<?php if($user->salutation == 'Dr')echo 'checked'; ?>> Dr
                            </label>
                            <label class="radio-inline" for="salutation3">
                                <input type="radio" class="salut"  id="salutation3" name="salutation" value="Mr"
								<?php if($user->salutation == 'Mr')echo 'checked'; ?>> Mr
                            </label>
							
							 <label class="radio-inline" for="salutation4">
                                <input type="radio" class="salut"  id="salutation4" name="salutation" value="Ms"
								<?php if($user->salutation == 'Ms')echo 'checked'; ?>> Ms
                            </label>
							<label class="radio-inline" for="other_custom">
                                <input type="radio" class="salut"  id="other_custom" name="salutation" value="Other"
								<?php if($user->salutation == 'Other')echo 'checked'; ?>> Other
                            </label>
                        </div>
                    </div>
					
					<div class="form-group" style="<?php if($user->salutation == 'Other')echo 'display:block'; else echo ' display:none'; ?>" id="custom_div">
                <label class="col-md-3 control-label">Custom Salutation*</label>
                        <div class="col-md-9">
                    
                        <input type="text" id="custom_salutation" name="custom_salutation" class="form-control input-lg" value="<?php echo $user->custom_salutation; ?>"  >
                    
                </div>
			</div>
<div class="form-group">
                <label class="col-md-3 control-label">First Name*</label>
                        <div class="col-md-9">
                    
                        <input type="text" id="first_name" name="first_name" class="form-control input-lg" value="<?php echo $user->first_name; ?>" >
                    
                </div>
			</div>
<div class="form-group">
                <label class="col-md-3 control-label">Last Name*</label>
                        <div class="col-md-9">
                    <input type="text" id="last_name" name="last_name" class="form-control input-lg" value="<?php echo $user->last_name; ?>" >
                
            </div>
			</div>
        
<div class="form-group">
                        <label class="col-md-3 control-label">Gender</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="gender1">
                                <input type="radio" id="gender1" name="gender" value="Male" <?php if($user->gender == 'Male')echo 'checked';?>> Male
                            </label>
                            <label class="radio-inline" for="gender2">
                                <input type="radio" id="gender2" name="gender" value="Female" <?php if($user->gender == 'Female')echo 'checked';?>> Female
                            </label>
                            
                            <label class="radio-inline" for="gender3">
                                <input type="radio" id="gender3" name="gender" value="Prefer not to disclose"> Prefer not to disclose
                            </label>
                           
                        </div>
                    </div>
<div class="form-group">
                <label class="col-md-3 control-label">Country/Region*</label>
                        <div class="col-md-9">
                        
                        				
<select id="country" name="country" class="form-control input-lg" size="1">
<option value="">Please select country/region</option>           
<option value="Afganistan" <?php if(trim($user->country) == 'Afganistan')echo ' selected="selected" '; ?>>Afghanistan</option>
<option value="Albania" <?php if(trim($user->country) == 'Albania')echo ' selected="selected" '; ?>>Albania</option>
<option value="Algeria" <?php if(trim($user->country) == 'Algeria')echo ' selected="selected" '; ?>>Algeria</option>
<option value="American Samoa" <?php if(trim($user->country) == 'American Samoa')echo ' selected="selected" '; ?>>American Samoa</option>
<option value="Andorra" <?php if(trim($user->country) == 'Andorra')echo ' selected="selected" '; ?>>Andorra</option>
<option value="Angola" <?php if(trim($user->country) == 'Angola')echo ' selected="selected" '; ?>>Angola</option>
<option value="Anguilla" <?php if(trim($user->country) == 'Anguilla')echo ' selected="selected" '; ?>>Anguilla</option>
<option value="Antigua & Barbuda" <?php if(trim($user->country) == "Antigua & Barbuda")echo ' selected="selected" '; ?>>Antigua & Barbuda</option>
<option value="Argentina" <?php if(trim($user->country) == 'Argentina')echo ' selected="selected" '; ?>>Argentina</option>
<option value="Armenia" <?php if(trim($user->country) == 'Armenia')echo ' selected="selected" '; ?>>Armenia</option>
<option value="Aruba" <?php if(trim($user->country) == 'Aruba')echo ' selected="selected" '; ?>>Aruba</option>
<option value="Australia" <?php if(trim($user->country) == 'Australia')echo ' selected="selected" '; ?>>Australia</option>
<option value="Austria" <?php if(trim($user->country) == 'Austria')echo ' selected="selected" '; ?>>Austria</option>
<option value="Azerbaijan" <?php if(trim($user->country) == 'Azerbaijan')echo ' selected="selected" '; ?>>Azerbaijan</option>
<option value="Bahamas" <?php if(trim($user->country) == 'Bahamas')echo ' selected="selected" '; ?>>Bahamas</option>
<option value="Bahrain" <?php if(trim($user->country) == 'Bahrain')echo ' selected="selected" '; ?>>Bahrain</option>
<option value="Bangladesh" <?php if(trim($user->country) == 'Bangladesh')echo ' selected="selected" '; ?>>Bangladesh</option>
<option value="Barbados" <?php if(trim($user->country) == 'Barbados')echo ' selected="selected" '; ?>>Barbados</option>
<option value="Belarus" <?php if(trim($user->country) == 'Belarus')echo ' selected="selected" '; ?>>Belarus</option>
<option value="Belgium" <?php if(trim($user->country) == 'Belgium')echo ' selected="selected" '; ?>>Belgium</option>
<option value="Belize" <?php if(trim($user->country) == 'Belize')echo ' selected="selected" '; ?>>Belize</option>
<option value="Benin" <?php if(trim($user->country) == 'Benin')echo ' selected="selected" '; ?>>Benin</option>
<option value="Bermuda" <?php if(trim($user->country) == 'Bermuda')echo ' selected="selected" '; ?>>Bermuda</option>
<option value="Bhutan" <?php if(trim($user->country) == 'Bhutan')echo ' selected="selected" '; ?>>Bhutan</option>
<option value="Bolivia" <?php if(trim($user->country) == 'Bolivia')echo ' selected="selected" '; ?>>Bolivia</option>
<option value="Bonaire" <?php if(trim($user->country) == 'Bonaire')echo ' selected="selected" '; ?>>Bonaire</option>
<option value="Bosnia & Herzegovina" <?php if(trim($user->country) == 'Bosnia & Herzegovina')echo ' selected="selected" '; ?>>Bosnia & Herzegovina</option>
<option value="Botswana" <?php if(trim($user->country) == 'Botswana')echo ' selected="selected" '; ?>>Botswana</option>
<option value="Brazil" <?php if(trim($user->country) == 'Brazil')echo ' selected="selected" '; ?>>Brazil</option>
<option value="British Indian Ocean Ter" <?php if(trim($user->country) == 'British Indian Ocean Ter')echo ' selected="selected" '; ?>>British Indian Ocean Ter</option>
<option value="Brunei" <?php if(trim($user->country) == 'Brunei')echo ' selected="selected" '; ?>>Brunei</option>
<option value="Bulgaria" <?php if(trim($user->country) == 'Bulgaria')echo ' selected="selected" '; ?>>Bulgaria</option>
<option value="Burkina Faso" <?php if(trim($user->country) == 'Burkina Faso')echo ' selected="selected" '; ?>>Burkina Faso</option>
<option value="Burundi" <?php if(trim($user->country) == 'Burundi')echo ' selected="selected" '; ?>>Burundi</option>
<option value="Cambodia" <?php if(trim($user->country) == 'Cambodia')echo ' selected="selected" '; ?>>Cambodia</option>
<option value="Cameroon" <?php if(trim($user->country) == 'Cameroon')echo ' selected="selected" '; ?>>Cameroon</option>
<option value="Canada" <?php if(trim($user->country) == 'Canada')echo ' selected="selected" '; ?>>Canada</option>
<option value="Canary Islands" <?php if(trim($user->country) == 'Canary Islands')echo ' selected="selected" '; ?>>Canary Islands</option>
<option value="Cape Verde" <?php if(trim($user->country) == 'Cape Verde')echo ' selected="selected" '; ?>>Cape Verde</option>
<option value="Cayman Islands" <?php if(trim($user->country) == 'Cayman Islands')echo ' selected="selected" '; ?>>Cayman Islands</option>
<option value="Central African Republic" <?php if(trim($user->country) == 'Central African Republic')echo ' selected="selected" '; ?>>Central African Republic</option>
<option value="Chad" <?php if(trim($user->country) == 'Chad')echo ' selected="selected" '; ?>>Chad</option>
<option value="Channel Islands" <?php if(trim($user->country) == 'Channel Islands')echo ' selected="selected" '; ?>>Channel Islands</option>
<option value="Chile" <?php if(trim($user->country) == 'Chile')echo ' selected="selected" '; ?>>Chile</option>
<option value="China" <?php if(trim($user->country) == 'China')echo ' selected="selected" '; ?>>China</option>
<option value="Christmas Island" <?php if(trim($user->country) == 'Christmas Island')echo ' selected="selected" '; ?>>Christmas Island</option>
<option value="Cocos Island" <?php if(trim($user->country) == 'Cocos Island')echo ' selected="selected" '; ?>>Cocos Island</option>
<option value="Colombia" <?php if(trim($user->country) == 'Colombia')echo ' selected="selected" '; ?>>Colombia</option>
<option value="Comoros" <?php if(trim($user->country) == 'Comoros')echo ' selected="selected" '; ?>>Comoros</option>
<option value="Congo" <?php if(trim($user->country) == 'Congo')echo ' selected="selected" '; ?>>Congo</option>
<option value="Cook Islands" <?php if(trim($user->country) == 'Cook Islands')echo ' selected="selected" '; ?>>Cook Islands</option>
<option value="Costa Rica" <?php if(trim($user->country) == 'Costa Rica')echo ' selected="selected" '; ?>>Costa Rica</option>
<option value="Cote DIvoire" <?php if(trim($user->country) == 'Cote DIvoire')echo ' selected="selected" '; ?>>Cote D'Ivoire</option>
<option value="Croatia" <?php if(trim($user->country) == 'Croatia')echo ' selected="selected" '; ?>>Croatia</option>
<option value="Cuba" <?php if(trim($user->country) == 'Cuba')echo ' selected="selected" '; ?>>Cuba</option>
<option value="Curaco" <?php if(trim($user->country) == 'Curaco')echo ' selected="selected" '; ?>>Curacao</option>
<option value="Cyprus" <?php if(trim($user->country) == 'Cyprus')echo ' selected="selected" '; ?>>Cyprus</option>
<option value="Czech Republic" <?php if(trim($user->country) == 'Czech Republic')echo ' selected="selected" '; ?>>Czech Republic</option>
<option value="Denmark" <?php if(trim($user->country) == 'Denmark')echo ' selected="selected" '; ?>>Denmark</option>
<option value="Djibouti" <?php if(trim($user->country) == 'Djibouti')echo ' selected="selected" '; ?>>Djibouti</option>
<option value="Dominica" <?php if(trim($user->country) == 'Dominica')echo ' selected="selected" '; ?>>Dominica</option>
<option value="Dominican Republic" <?php if(trim($user->country) == 'Dominican Republic')echo ' selected="selected" '; ?>>Dominican Republic</option>
<option value="East Timor" <?php if(trim($user->country) == 'East Timor')echo ' selected="selected" '; ?>>East Timor</option>
<option value="Ecuador" <?php if(trim($user->country) == 'Ecuador')echo ' selected="selected" '; ?>>Ecuador</option>
<option value="Egypt" <?php if(trim($user->country) == 'Egypt')echo ' selected="selected" '; ?>>Egypt</option>
<option value="El Salvador" <?php if(trim($user->country) == 'El Salvador')echo ' selected="selected" '; ?>>El Salvador</option>
<option value="Equatorial Guinea" <?php if(trim($user->country) == 'Equatorial Guinea')echo ' selected="selected" '; ?>>Equatorial Guinea</option>
<option value="Eritrea" <?php if(trim($user->country) == 'Eritrea')echo ' selected="selected" '; ?>>Eritrea</option>
<option value="Estonia" <?php if(trim($user->country) == 'Estonia')echo ' selected="selected" '; ?>>Estonia</option>
<option value="Ethiopia" <?php if(trim($user->country) == 'Ethiopia')echo ' selected="selected" '; ?>>Ethiopia</option>
<option value="Falkland Islands" <?php if(trim($user->country) == 'Falkland Islands')echo ' selected="selected" '; ?>>Falkland Islands</option>
<option value="Faroe Islands" <?php if(trim($user->country) == 'Faroe Islands')echo ' selected="selected" '; ?>>Faroe Islands</option>
<option value="Fiji" <?php if(trim($user->country) == 'Fiji')echo ' selected="selected" '; ?>>Fiji</option>
<option value="Finland" <?php if(trim($user->country) == 'Finland')echo ' selected="selected" '; ?>>Finland</option>
<option value="France" <?php if(trim($user->country) == 'France')echo ' selected="selected" '; ?>>France</option>
<option value="French Guiana" <?php if(trim($user->country) == 'French Guiana')echo ' selected="selected" '; ?>>French Guiana</option>
<option value="French Polynesia" <?php if(trim($user->country) == 'French Polynesia')echo ' selected="selected" '; ?>>French Polynesia</option>
<option value="French Southern Ter" <?php if(trim($user->country) == 'French Southern Ter')echo ' selected="selected" '; ?>>French Southern Ter</option>
<option value="Gabon" <?php if(trim($user->country) == 'Gabon')echo ' selected="selected" '; ?>>Gabon</option>
<option value="Gambia" <?php if(trim($user->country) == 'Gambia')echo ' selected="selected" '; ?>>Gambia</option>
<option value="Georgia" <?php if(trim($user->country) == 'Georgia')echo ' selected="selected" '; ?>>Georgia</option>
<option value="Germany" <?php if(trim($user->country) == 'Germany')echo ' selected="selected" '; ?>>Germany</option>
<option value="Ghana" <?php if(trim($user->country) == 'Ghana')echo ' selected="selected" '; ?>>Ghana</option>
<option value="Gibraltar" <?php if(trim($user->country) == 'Gibraltar')echo ' selected="selected" '; ?>>Gibraltar</option>
<option value="Great Britain" <?php if(trim($user->country) == 'Great Britain')echo ' selected="selected" '; ?>>Great Britain</option>
<option value="Greece" <?php if(trim($user->country) == 'Greece')echo ' selected="selected" '; ?>>Greece</option>
<option value="Greenland" <?php if(trim($user->country) == 'Greenland')echo ' selected="selected" '; ?>>Greenland</option>
<option value="Grenada" <?php if(trim($user->country) == 'Grenada')echo ' selected="selected" '; ?>>Grenada</option>
<option value="Guadeloupe" <?php if(trim($user->country) == 'Guadeloupe')echo ' selected="selected" '; ?>>Guadeloupe</option>
<option value="Guam" <?php if(trim($user->country) == 'Guam')echo ' selected="selected" '; ?>>Guam</option>
<option value="Guatemala" <?php if(trim($user->country) == 'Guatemala')echo ' selected="selected" '; ?>>Guatemala</option>
<option value="Guinea" <?php if(trim($user->country) == 'Guinea')echo ' selected="selected" '; ?>>Guinea</option>
<option value="Guyana" <?php if(trim($user->country) == 'Guyana')echo ' selected="selected" '; ?>>Guyana</option>
<option value="Haiti" <?php if(trim($user->country) == 'Haiti')echo ' selected="selected" '; ?>>Haiti</option>
<option value="Hawaii" <?php if(trim($user->country) == 'Hawaii')echo ' selected="selected" '; ?>>Hawaii</option>
<option value="Honduras" <?php if(trim($user->country) == 'Honduras')echo ' selected="selected" '; ?>>Honduras</option>
<option value="Hong Kong" <?php if(trim($user->country) == 'Hong Kong')echo ' selected="selected" '; ?>>Hong Kong</option>
<option value="Hungary" <?php if(trim($user->country) == 'Hungary')echo ' selected="selected" '; ?>>Hungary</option>
<option value="Iceland" <?php if(trim($user->country) == 'Iceland')echo ' selected="selected" '; ?>>Iceland</option>
<option value="India" <?php if(trim($user->country) == 'India')echo ' selected="selected" '; ?>>India</option>
<option value="Indonesia" <?php if(trim($user->country) == 'Indonesia')echo ' selected="selected" '; ?>>Indonesia</option>
<option value="Iran" <?php if(trim($user->country) == 'Iran')echo ' selected="selected" '; ?>>Iran</option>
<option value="Iraq" <?php if(trim($user->country) == 'Iraq')echo ' selected="selected" '; ?>>Iraq</option>
<option value="Ireland" <?php if(trim($user->country) == 'Ireland')echo ' selected="selected" '; ?>>Ireland</option>
<option value="Isle of Man" <?php if(trim($user->country) == 'Isle of Man')echo ' selected="selected" '; ?>>Isle of Man</option>
<option value="Israel" <?php if(trim($user->country) == 'Israel')echo ' selected="selected" '; ?>>Israel</option>
<option value="Italy" <?php if(trim($user->country) == 'Italy')echo ' selected="selected" '; ?>>Italy</option>
<option value="Jamaica" <?php if(trim($user->country) == 'Jamaica')echo ' selected="selected" '; ?>>Jamaica</option>
<option value="Japan" <?php if(trim($user->country) == 'Japan')echo ' selected="selected" '; ?>>Japan</option>
<option value="Jordan" <?php if(trim($user->country) == 'Jordan')echo ' selected="selected" '; ?>>Jordan</option>
<option value="Kazakhstan" <?php if(trim($user->country) == 'Kazakhstan')echo ' selected="selected" '; ?>>Kazakhstan</option>
<option value="Kenya" <?php if(trim($user->country) == 'Kenya')echo ' selected="selected" '; ?>>Kenya</option>
<option value="Kiribati" <?php if(trim($user->country) == 'Kiribati')echo ' selected="selected" '; ?>>Kiribati</option>
<option value="Korea North" <?php if(trim($user->country) == 'Korea North')echo ' selected="selected" '; ?>>Korea North</option>
<option value="Korea Sout" <?php if(trim($user->country) == 'Korea Sout')echo ' selected="selected" '; ?>>Korea South</option>
<option value="Kuwait" <?php if(trim($user->country) == 'Kuwait')echo ' selected="selected" '; ?>>Kuwait</option>
<option value="Kyrgyzstan" <?php if(trim($user->country) == 'Kyrgyzstan')echo ' selected="selected" '; ?>>Kyrgyzstan</option>
<option value="Laos" <?php if(trim($user->country) == 'Laos')echo ' selected="selected" '; ?>>Laos</option>
<option value="Latvia" <?php if(trim($user->country) == 'Latvia')echo ' selected="selected" '; ?>>Latvia</option>
<option value="Lebanon" <?php if(trim($user->country) == 'Lebanon')echo ' selected="selected" '; ?>>Lebanon</option>
<option value="Lesotho" <?php if(trim($user->country) == 'Lesotho')echo ' selected="selected" '; ?>>Lesotho</option>
<option value="Liberia" <?php if(trim($user->country) == 'Liberia')echo ' selected="selected" '; ?>>Liberia</option>
<option value="Libya" <?php if(trim($user->country) == 'Libya')echo ' selected="selected" '; ?>>Libya</option>
<option value="Liechtenstein" <?php if(trim($user->country) == 'Liechtenstein')echo ' selected="selected" '; ?>>Liechtenstein</option>
<option value="Lithuania" <?php if(trim($user->country) == 'Lithuania')echo ' selected="selected" '; ?>>Lithuania</option>
<option value="Luxembourg" <?php if(trim($user->country) == 'Luxembourg')echo ' selected="selected" '; ?>>Luxembourg</option>
<option value="Macau" <?php if(trim($user->country) == 'Macau')echo ' selected="selected" '; ?>>Macau</option>
<option value="Macedonia" <?php if(trim($user->country) == 'Macedonia')echo ' selected="selected" '; ?>>Macedonia</option>
<option value="Madagascar" <?php if(trim($user->country) == 'Madagascar')echo ' selected="selected" '; ?>>Madagascar</option>
<option value="Malaysia" <?php if(trim($user->country) == 'Malaysia')echo ' selected="selected" '; ?>>Malaysia</option>
<option value="Malawi" <?php if(trim($user->country) == 'Malawi')echo ' selected="selected" '; ?>>Malawi</option>
<option value="Maldives" <?php if(trim($user->country) == 'Maldives')echo ' selected="selected" '; ?>>Maldives</option>
<option value="Mali" <?php if(trim($user->country) == 'Mali')echo ' selected="selected" '; ?>>Mali</option>
<option value="Malta" <?php if(trim($user->country) == 'Malta')echo ' selected="selected" '; ?>>Malta</option>
<option value="Marshall Islands" <?php if(trim($user->country) == 'Marshall Islands')echo ' selected="selected" '; ?>>Marshall Islands</option>
<option value="Martinique" <?php if(trim($user->country) == 'Martinique')echo ' selected="selected" '; ?>>Martinique</option>
<option value="Mauritania" <?php if(trim($user->country) == 'Mauritania')echo ' selected="selected" '; ?>>Mauritania</option>
<option value="Mauritius" <?php if(trim($user->country) == 'Mauritius')echo ' selected="selected" '; ?>>Mauritius</option>
<option value="Mayotte" <?php if(trim($user->country) == 'Mayotte')echo ' selected="selected" '; ?>>Mayotte</option>
<option value="Mexico" <?php if(trim($user->country) == 'Mexico')echo ' selected="selected" '; ?>>Mexico</option>
<option value="Midway Islands" <?php if(trim($user->country) == 'Midway Islands')echo ' selected="selected" '; ?>>Midway Islands</option>
<option value="Moldova" <?php if(trim($user->country) == 'Moldova')echo ' selected="selected" '; ?>>Moldova</option>
<option value="Monaco" <?php if(trim($user->country) == 'Monaco')echo ' selected="selected" '; ?>>Monaco</option>
<option value="Mongolia" <?php if(trim($user->country) == 'Mongolia')echo ' selected="selected" '; ?>>Mongolia</option>
<option value="Montserrat" <?php if(trim($user->country) == 'Montserrat')echo ' selected="selected" '; ?>>Montserrat</option>
<option value="Morocco" <?php if(trim($user->country) == 'Morocco')echo ' selected="selected" '; ?>>Morocco</option>
<option value="Mozambique" <?php if(trim($user->country) == 'Mozambique')echo ' selected="selected" '; ?>>Mozambique</option>
<option value="Myanmar" <?php if(trim($user->country) == 'Myanmar')echo ' selected="selected" '; ?>>Myanmar</option>
<option value="Nambia" <?php if(trim($user->country) == 'Nambia')echo ' selected="selected" '; ?>>Nambia</option>
<option value="Nauru" <?php if(trim($user->country) == 'Nauru')echo ' selected="selected" '; ?>>Nauru</option>
<option value="Nepal" <?php if(trim($user->country) == 'Nepal')echo ' selected="selected" '; ?>>Nepal</option>
<option value="Netherland Antilles" <?php if(trim($user->country) == 'Netherland Antilles')echo ' selected="selected" '; ?>>Netherland Antilles</option>
<option value="Netherlands" <?php if(trim($user->country) == 'Netherlands')echo ' selected="selected" '; ?>>Netherlands (Holland, Europe)</option>
<option value="Nevis" <?php if(trim($user->country) == 'Nevis')echo ' selected="selected" '; ?>>Nevis</option>
<option value="New Caledonia" <?php if(trim($user->country) == 'New Caledonia')echo ' selected="selected" '; ?>>New Caledonia</option>
<option value="New Zealand" <?php if(trim($user->country) == 'New Zealand')echo ' selected="selected" '; ?>>New Zealand</option>
<option value="Nicaragua" <?php if(trim($user->country) == 'Nicaragua')echo ' selected="selected" '; ?>>Nicaragua</option>
<option value="Niger" <?php if(trim($user->country) == 'Niger')echo ' selected="selected" '; ?>>Niger</option>
<option value="Nigeria" <?php if(trim($user->country) == 'Nigeria')echo ' selected="selected" '; ?>>Nigeria</option>
<option value="Niue" <?php if(trim($user->country) == 'Niue')echo ' selected="selected" '; ?>>Niue</option>
<option value="Norfolk Island" <?php if(trim($user->country) == 'Norfolk Island')echo ' selected="selected" '; ?>>Norfolk Island</option>
<option value="Norway" <?php if(trim($user->country) == 'Norway')echo ' selected="selected" '; ?>>Norway</option>
<option value="Oman" <?php if(trim($user->country) == 'Oman')echo ' selected="selected" '; ?>>Oman</option>
<option value="Pakistan" <?php if(trim($user->country) == 'Pakistan')echo ' selected="selected" '; ?>>Pakistan</option>
<option value="Palau Island" <?php if(trim($user->country) == 'Palau Island')echo ' selected="selected" '; ?>>Palau Island</option>
<option value="Palestine" <?php if(trim($user->country) == 'Palestine')echo ' selected="selected" '; ?>>Palestine</option>
<option value="Panama" <?php if(trim($user->country) == 'Panama')echo ' selected="selected" '; ?>>Panama</option>
<option value="Papua New Guinea" <?php if(trim($user->country) == 'Papua New Guinea')echo ' selected="selected" '; ?>>Papua New Guinea</option>
<option value="Paraguay" <?php if(trim($user->country) == 'Paraguay')echo ' selected="selected" '; ?>>Paraguay</option>
<option value="Peru" <?php if(trim($user->country) == 'Peru')echo ' selected="selected" '; ?>>Peru</option>
<option value="Phillipines" <?php if(trim($user->country) == 'Phillipines')echo ' selected="selected" '; ?>>Philippines</option>
<option value="Pitcairn Island" <?php if(trim($user->country) == 'Pitcairn Island')echo ' selected="selected" '; ?>>Pitcairn Island</option>
<option value="Poland" <?php if(trim($user->country) == 'Poland')echo ' selected="selected" '; ?>>Poland</option>
<option value="Portugal" <?php if(trim($user->country) == 'Portugal')echo ' selected="selected" '; ?>>Portugal</option>
<option value="Puerto Rico" <?php if(trim($user->country) == 'Puerto Rico')echo ' selected="selected" '; ?>>Puerto Rico</option>
<option value="Qatar" <?php if(trim($user->country) == 'Qatar')echo ' selected="selected" '; ?>>Qatar</option>
<option value="Republic of Montenegro" <?php if(trim($user->country) == 'Republic of Montenegro')echo ' selected="selected" '; ?>>Republic of Montenegro</option>
<option value="Republic of Serbia" <?php if(trim($user->country) == 'Republic of Serbia')echo ' selected="selected" '; ?>>Republic of Serbia</option>
<option value="Reunion" <?php if(trim($user->country) == 'Reunion')echo ' selected="selected" '; ?>>Reunion</option>
<option value="Romania" <?php if(trim($user->country) == 'Romania')echo ' selected="selected" '; ?>>Romania</option>
<option value="Russia" <?php if(trim($user->country) == 'Russia')echo ' selected="selected" '; ?>>Russia</option>
<option value="Rwanda" <?php if(trim($user->country) == 'Rwanda')echo ' selected="selected" '; ?>>Rwanda</option>
<option value="St Barthelemy" <?php if(trim($user->country) == 'St Barthelemy')echo ' selected="selected" '; ?>>St Barthelemy</option>
<option value="St Eustatius" <?php if(trim($user->country) == 'St Eustatius')echo ' selected="selected" '; ?>>St Eustatius</option>
<option value="St Helena" <?php if(trim($user->country) == 'St Helena')echo ' selected="selected" '; ?>>St Helena</option>
<option value="St Kitts-Nevis" <?php if(trim($user->country) == 'St Kitts-Nevis')echo ' selected="selected" '; ?>>St Kitts-Nevis</option>
<option value="St Lucia" <?php if(trim($user->country) == 'St Lucia')echo ' selected="selected" '; ?>>St Lucia</option>
<option value="St Maarten" <?php if(trim($user->country) == 'St Maarten')echo ' selected="selected" '; ?>>St Maarten</option>
<option value="St Pierre & Miquelon" <?php if(trim($user->country) == 'St Pierre & Miquelon')echo ' selected="selected" '; ?>>St Pierre & Miquelon</option>
<option value="St Vincent & Grenadines" <?php if(trim($user->country) == 'St Vincent & Grenadines')echo ' selected="selected" '; ?>>St Vincent & Grenadines</option>
<option value="Saipan" <?php if(trim($user->country) == 'Saipan')echo ' selected="selected" '; ?>>Saipan</option>
<option value="Samoa" <?php if(trim($user->country) == 'Samoa')echo ' selected="selected" '; ?>>Samoa</option>
<option value="Samoa American" <?php if(trim($user->country) == 'Samoa American')echo ' selected="selected" '; ?>>Samoa American</option>
<option value="San Marino" <?php if(trim($user->country) == 'San Marino')echo ' selected="selected" '; ?>>San Marino</option>
<option value="Sao Tome & Principe" <?php if(trim($user->country) == 'Sao Tome & Principe')echo ' selected="selected" '; ?>>Sao Tome & Principe</option>
<option value="Saudi Arabia" <?php if(trim($user->country) == 'Saudi Arabia')echo ' selected="selected" '; ?>>Saudi Arabia</option>
<option value="Senegal" <?php if(trim($user->country) == 'Senegal')echo ' selected="selected" '; ?>>Senegal</option>
<option value="Serbia" <?php if(trim($user->country) == 'Serbia')echo ' selected="selected" '; ?>>Serbia</option>
<option value="Seychelles" <?php if(trim($user->country) == 'Seychelles')echo ' selected="selected" '; ?>>Seychelles</option>
<option value="Sierra Leone" <?php if(trim($user->country) == 'Sierra Leone')echo ' selected="selected" '; ?>>Sierra Leone</option>
<option value="Singapore" <?php if(trim($user->country) == 'Singapore')echo ' selected="selected" '; ?>>Singapore</option>
<option value="Slovakia" <?php if(trim($user->country) == 'Slovakia')echo ' selected="selected" '; ?>>Slovakia</option>
<option value="Slovenia" <?php if(trim($user->country) == 'Slovenia')echo ' selected="selected" '; ?>>Slovenia</option>
<option value="Solomon Islands" <?php if(trim($user->country) == 'Solomon Islands')echo ' selected="selected" '; ?>>Solomon Islands</option>
<option value="Somalia" <?php if(trim($user->country) == 'Somalia')echo ' selected="selected" '; ?>>Somalia</option>
<option value="South Africa" <?php if(trim($user->country) == 'South Africa')echo ' selected="selected" '; ?>>South Africa</option>
<option value="Spain" <?php if(trim($user->country) == 'Spain')echo ' selected="selected" '; ?>>Spain</option>
<option value="Sri Lanka" <?php if(trim($user->country) == 'Sri Lanka')echo ' selected="selected" '; ?>>Sri Lanka</option>
<option value="Sudan" <?php if(trim($user->country) == 'Sudan')echo ' selected="selected" '; ?>>Sudan</option>
<option value="Suriname" <?php if(trim($user->country) == 'Suriname')echo ' selected="selected" '; ?>>Suriname</option>
<option value="Swaziland" <?php if(trim($user->country) == 'Swaziland')echo ' selected="selected" '; ?>>Swaziland</option>
<option value="Sweden" <?php if(trim($user->country) == 'Sweden')echo ' selected="selected" '; ?>>Sweden</option>
<option value="Switzerland" <?php if(trim($user->country) == 'Switzerland')echo ' selected="selected" '; ?>>Switzerland</option>
<option value="Syria" <?php if(trim($user->country) == 'Syria')echo ' selected="selected" '; ?>>Syria</option>
<option value="Tahiti" <?php if(trim($user->country) == 'Tahiti')echo ' selected="selected" '; ?>>Tahiti</option>
<option value="Taiwan" <?php if(trim($user->country) == 'Taiwan')echo ' selected="selected" '; ?>>Taiwan</option>
<option value="Tajikistan" <?php if(trim($user->country) == 'Tajikistan')echo ' selected="selected" '; ?>>Tajikistan</option>
<option value="Tanzania" <?php if(trim($user->country) == 'Tanzania')echo ' selected="selected" '; ?>>Tanzania</option>
<option value="Thailand" <?php if(trim($user->country) == 'Thailand')echo ' selected="selected" '; ?>>Thailand</option>
<option value="Togo" <?php if(trim($user->country) == 'Togo')echo ' selected="selected" '; ?>>Togo</option>
<option value="Tokelau" <?php if(trim($user->country) == 'Tokelau')echo ' selected="selected" '; ?>>Tokelau</option>
<option value="Tonga" <?php if(trim($user->country) == 'Tonga')echo ' selected="selected" '; ?>>Tonga</option>
<option value="Trinidad & Tobago" <?php if(trim($user->country) == 'Trinidad & Tobago')echo ' selected="selected" '; ?>>Trinidad & Tobago</option>
<option value="Tunisia" <?php if(trim($user->country) == 'Tunisia')echo ' selected="selected" '; ?>>Tunisia</option>
<option value="Turkey" <?php if(trim($user->country) == 'Turkey')echo ' selected="selected" '; ?>>Turkey</option>
<option value="Turkmenistan" <?php if(trim($user->country) == 'Turkmenistan')echo ' selected="selected" '; ?>>Turkmenistan</option>
<option value="Turks & Caicos Is" <?php if(trim($user->country) == 'Turks & Caicos Is')echo ' selected="selected" '; ?>>Turks & Caicos Is</option>
<option value="Tuvalu" <?php if(trim($user->country) == 'Tuvalu')echo ' selected="selected" '; ?>>Tuvalu</option>
<option value="Uganda" <?php if(trim($user->country) == 'Uganda')echo ' selected="selected" '; ?>>Uganda</option>
<option value="Ukraine" <?php if(trim($user->country) == 'Ukraine')echo ' selected="selected" '; ?>>Ukraine</option>
<option value="United Arab Emirates" <?php if(trim($user->country) == 'United Arab Emirates')echo ' selected="selected" '; ?>>United Arab Emirates</option>
<option value="United Kingdom" <?php if(trim($user->country) == 'United Kingdom')echo ' selected="selected" '; ?>>United Kingdom</option>
<option value="United States of America" <?php if(trim($user->country) == 'United States of America')echo ' selected="selected" '; ?>>United States of America</option>
<option value="Uraguay" <?php if(trim($user->country) == 'Uraguay')echo ' selected="selected" '; ?>>Uruguay</option>
<option value="Uzbekistan" <?php if(trim($user->country) == 'Uzbekistan')echo ' selected="selected" '; ?>>Uzbekistan</option>
<option value="Vanuatu" <?php if(trim($user->country) == 'Vanuatu')echo ' selected="selected" '; ?>>Vanuatu</option>
<option value="Vatican City State" <?php if(trim($user->country) == 'Vatican City State')echo ' selected="selected" '; ?>>Vatican City State</option>
<option value="Venezuela" <?php if(trim($user->country) == 'Venezuela')echo ' selected="selected" '; ?>>Venezuela</option>
<option value="Vietnam" <?php if(trim($user->country) == 'Vietnam')echo ' selected="selected" '; ?>>Vietnam</option>
<option value="Virgin Islands (Brit)" <?php if(trim($user->country) == 'Virgin Islands (Brit)')echo ' selected="selected" '; ?>>Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)" <?php if(trim($user->country) == 'Virgin Islands (USA)')echo ' selected="selected" '; ?>>Virgin Islands (USA)</option>
<option value="Wake Island" <?php if(trim($user->country) == 'Wake Island')echo ' selected="selected" '; ?>>Wake Island</option>
<option value="Wallis & Futana Is" <?php if(trim($user->country) == 'Wallis & Futana Is')echo ' selected="selected" '; ?>>Wallis & Futana Is</option>
<option value="Yemen" <?php if(trim($user->country) == 'Yemen')echo ' selected="selected" '; ?>>Yemen</option>
<option value="Zaire" <?php if(trim($user->country) == 'Zaire')echo ' selected="selected" '; ?>>Zaire</option>
<option value="Zambia" <?php if(trim($user->country) == 'Zambia')echo ' selected="selected" '; ?>>Zambia</option>
<option value="Zimbabwe" <?php if(trim($user->country) == 'Zimbabwe')echo ' selected="selected" '; ?>>Zimbabwe</option>
</select>	
            
                    </div>
			</div>
			
	<div class="form-group">
                <label class="col-md-3 control-label">Twitter Handle</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="twitter" name="twitter" class="form-control input-lg" value="<?php echo $user->twitter; ?>" placeholder="Enter Twitter Handle"  >
                   </div>
			</div>			
			
			
			
			
 <div class="form-group">
                <label class="col-md-3 control-label">LinkedIn</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="linkedin" name="linkedin" class="form-control input-lg" value="<?php echo $user->linkedin; ?>"  placeholder="Enter LinkedIn" >
                   </div>
			</div>				
			
 <div class="form-group">
                <label class="col-md-3 control-label">Telephone Number*</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="tele" name="tele" class="form-control input-lg" value="<?php echo $user->tele; ?>" >
                   </div>
			</div>
			<!--
<div class="form-group">
                <label class="col-md-3 control-label">Fax Number</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="fax" name="fax" class="form-control input-lg" value="<?php echo $user->fax; ?>" >
                    </div>
			</div>
			-->
			<?php if($this->session->userdata('job_title') == 'No' ){ ?>
			<div class="form-group">
                <label class="col-md-3 control-label">Upload Profile Picture*</label>
                        <div class="col-md-9">
                        
                        <input type="file" id="profile_img" name="profile_img" class="form-control input-lg" required  >
                    </div>
			</div>
			<?php } ?>
</div>

<div class="col-md-6">
			<div class="form-group">

                <label class="col-md-3 control-label">Job Title / Designation*</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="job_title" name="job_title" class="form-control input-lg" value="<?php echo $user->job_title; ?>"  >
                   </div>
			</div>	
 <div class="form-group">
                <label class="col-md-3 control-label">University / Organization / Affiliation*</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="university" name="university" class="form-control input-lg" value="<?php echo $user->university; ?>"  >
                    </div>
			</div>
<div class="form-group">
                <label class="col-md-3 control-label">University Name Acronym</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="university_accronym" name="university_accronym" class="form-control input-lg" value="<?php echo $user->university_accronym; ?>"  >
                    </div>
			</div>
<div class="form-group">
                <label class="col-md-3 control-label">Department*</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="department" name="department" class="form-control input-lg"  value="<?php echo $user->department; ?>" >
                    </div>
			</div>
<div class="form-group">
                <label class="col-md-3 control-label">Mailing Address*</label>
                        <div class="col-md-9">
                        
                        <input type="text" id="mail" name="mail" class="form-control input-lg"  value="<?php echo $user->mail; ?>"  >
                    </div>
			</div>	
<div class="form-group">
                <label class="col-md-3 control-label">Summary Biography*</label>
                        <div class="col-md-9">
                        
                       <textarea id="summary" name="summary" rows="9" class="form-control input-lg" ><?php echo $user->summary; ?></textarea>
                    </div>
			</div>
</div>
<div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                             <button type="button" class="btn btn-sm btn-warning cancel" data-href="<?php echo site_url('my_profile/index'); ?>">Cancel</button>
                     
                        </div>
                    </div>

					
					</form>
                <!-- END Basic Form Elements Content -->
            </div>