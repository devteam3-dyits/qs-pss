<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                  
                    <h2><strong>Edit Proposer</strong> </h2>
                </div>
                <!-- END Horizontal Form Title -->
                 <?php if(validation_errors()){?>
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
               
                <!-- Horizontal Form Content -->
                <form id="form-cm" action="<?php echo site_url('proposers/edit/'.$user->user_id); ?>" method="post" class="form-horizontal form-bordered" autocomplete="off" >
                   <div class="form-group">
                        <label class="col-md-3 control-label">Salutation*</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="salutation1">
                                <input type="radio" id="salutation1" name="salutation" value="Prof" checked> Prof
                            </label>
                            <label class="radio-inline" for="salutation2">
                                <input type="radio" id="salutation2" name="salutation" value="Dr"> Dr
                            </label>
                            <label class="radio-inline" for="salutation3">
                                <input type="radio" id="salutation3" name="salutation" value="Mr"> Mr
                            </label>
							 <label class="radio-inline" for="salutation4">
                                <input type="radio" id="salutation4" name="salutation" value="Ms"> Ms
                            </label>
                        </div>
                    </div>
					
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="first_name">First Name</label>
                        <div class="col-md-9">
                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter First Name" 
							value="<?php echo $user->first_name; ?>" required>
                            
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="last_name">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter Last Name" 
							value="<?php echo $user->last_name; ?>" required>
                            
                        </div>
                    </div>
					
				
					
							<div class="form-group">
                        <label class="col-md-3 control-label">Gender</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="gender1">
                                <input type="radio" id="gender1" name="gender" value="Male" <?php if($user->gender == 'Male') echo 'checked'; ?>> Male
                            </label>
                            <label class="radio-inline" for="gender2">
                                <input type="radio" id="gender2" name="gender" value="Female" <?php if($user->gender == 'Female') echo 'checked'; ?>> Female
                            </label>
                             <label class="radio-inline" for="gender3">
                                <input type="radio" id="gender3" name="gender" value="Prefer not to disclose" <?php if($user->gender == 'Prefer not to disclose') echo 'checked'; ?>> Prefer not to disclose
                            </label>
                           
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="password">Password</label>
                        <div class="col-md-9">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" 
							value="" >
                            
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="confirm_password">Confirm Password</label>
                        <div class="col-md-9">
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Repeat Password" 
							value="" >
                            
                        </div>
                    </div>
          
				<div class="form-group">
                        <label class="col-md-3 control-label" for="tele">Country</label>
                        <div class="col-md-9">
                            					                       				
<select id="country" name="country" class="form-control input-lg" size="1">
<option value="">Please select country</option>           
<option value="Afganistan" <?php if($user->country == 'Afganistan')echo ' selected="selected" '; ?>>Afghanistan</option>
<option value="Albania" <?php if($user->country == 'Albania')echo ' selected="selected" '; ?>>Albania</option>
<option value="Algeria" <?php if($user->country == 'Algeria')echo ' selected="selected" '; ?>>Algeria</option>
<option value="American Samoa" <?php if($user->country == 'American Samoa')echo ' selected="selected" '; ?>>American Samoa</option>
<option value="Andorra" <?php if($user->country == 'Andorra')echo ' selected="selected" '; ?>>Andorra</option>
<option value="Angola" <?php if($user->country == 'Angola')echo ' selected="selected" '; ?>>Angola</option>
<option value="Anguilla" <?php if($user->country == 'Anguilla')echo ' selected="selected" '; ?>>Anguilla</option>
<option value="Antigua &amp; Barbuda" <?php if($user->country == 'Antigua &amp; Barbuda')echo ' selected="selected" '; ?>>Antigua &amp; Barbuda</option>
<option value="Argentina" <?php if($user->country == 'Argentina')echo ' selected="selected" '; ?>>Argentina</option>
<option value="Armenia" <?php if($user->country == 'Armenia')echo ' selected="selected" '; ?>>Armenia</option>
<option value="Aruba" <?php if($user->country == 'Aruba')echo ' selected="selected" '; ?>>Aruba</option>
<option value="Australia" <?php if($user->country == 'Australia')echo ' selected="selected" '; ?>>Australia</option>
<option value="Austria" <?php if($user->country == 'Austria')echo ' selected="selected" '; ?>>Austria</option>
<option value="Azerbaijan" <?php if($user->country == 'Azerbaijan')echo ' selected="selected" '; ?>>Azerbaijan</option>
<option value="Bahamas" <?php if($user->country == 'Bahamas')echo ' selected="selected" '; ?>>Bahamas</option>
<option value="Bahrain" <?php if($user->country == 'Bahrain')echo ' selected="selected" '; ?>>Bahrain</option>
<option value="Bangladesh" <?php if($user->country == 'Bangladesh')echo ' selected="selected" '; ?>>Bangladesh</option>
<option value="Barbados" <?php if($user->country == 'Barbados')echo ' selected="selected" '; ?>>Barbados</option>
<option value="Belarus" <?php if($user->country == 'Belarus')echo ' selected="selected" '; ?>>Belarus</option>
<option value="Belgium" <?php if($user->country == 'Belgium')echo ' selected="selected" '; ?>>Belgium</option>
<option value="Belize" <?php if($user->country == 'Belize')echo ' selected="selected" '; ?>>Belize</option>
<option value="Benin" <?php if($user->country == 'Benin')echo ' selected="selected" '; ?>>Benin</option>
<option value="Bermuda" <?php if($user->country == 'Bermuda')echo ' selected="selected" '; ?>>Bermuda</option>
<option value="Bhutan" <?php if($user->country == 'Bhutan')echo ' selected="selected" '; ?>>Bhutan</option>
<option value="Bolivia" <?php if($user->country == 'Bolivia')echo ' selected="selected" '; ?>>Bolivia</option>
<option value="Bonaire" <?php if($user->country == 'Bonaire')echo ' selected="selected" '; ?>>Bonaire</option>
<option value="Bosnia &amp; Herzegovina" <?php if($user->country == 'Bosnia &amp; Herzegovina')echo ' selected="selected" '; ?>>Bosnia &amp; Herzegovina</option>
<option value="Botswana" <?php if($user->country == 'Botswana')echo ' selected="selected" '; ?>>Botswana</option>
<option value="Brazil" <?php if($user->country == 'Brazil')echo ' selected="selected" '; ?>>Brazil</option>
<option value="British Indian Ocean Ter" <?php if($user->country == 'British Indian Ocean Ter')echo ' selected="selected" '; ?>>British Indian Ocean Ter</option>
<option value="Brunei" <?php if($user->country == 'Brunei')echo ' selected="selected" '; ?>>Brunei</option>
<option value="Bulgaria" <?php if($user->country == 'Bulgaria')echo ' selected="selected" '; ?>>Bulgaria</option>
<option value="Burkina Faso" <?php if($user->country == 'Burkina Faso')echo ' selected="selected" '; ?>>Burkina Faso</option>
<option value="Burundi" <?php if($user->country == 'Burundi')echo ' selected="selected" '; ?>>Burundi</option>
<option value="Cambodia" <?php if($user->country == 'Cambodia')echo ' selected="selected" '; ?>>Cambodia</option>
<option value="Cameroon" <?php if($user->country == 'Cameroon')echo ' selected="selected" '; ?>>Cameroon</option>
<option value="Canada" <?php if($user->country == 'Canada')echo ' selected="selected" '; ?>>Canada</option>
<option value="Canary Islands" <?php if($user->country == 'Canary Islands')echo ' selected="selected" '; ?>>Canary Islands</option>
<option value="Cape Verde" <?php if($user->country == 'Cape Verde')echo ' selected="selected" '; ?>>Cape Verde</option>
<option value="Cayman Islands" <?php if($user->country == 'Cayman Islands')echo ' selected="selected" '; ?>>Cayman Islands</option>
<option value="Central African Republic" <?php if($user->country == 'Central African Republic')echo ' selected="selected" '; ?>>Central African Republic</option>
<option value="Chad" <?php if($user->country == 'Chad')echo ' selected="selected" '; ?>>Chad</option>
<option value="Channel Islands" <?php if($user->country == 'Channel Islands')echo ' selected="selected" '; ?>>Channel Islands</option>
<option value="Chile" <?php if($user->country == 'Chile')echo ' selected="selected" '; ?>>Chile</option>
<option value="China" <?php if($user->country == 'China')echo ' selected="selected" '; ?>>China</option>
<option value="Christmas Island" <?php if($user->country == 'Christmas Island')echo ' selected="selected" '; ?>>Christmas Island</option>
<option value="Cocos Island" <?php if($user->country == 'Cocos Island')echo ' selected="selected" '; ?>>Cocos Island</option>
<option value="Colombia" <?php if($user->country == 'Colombia')echo ' selected="selected" '; ?>>Colombia</option>
<option value="Comoros" <?php if($user->country == 'Comoros')echo ' selected="selected" '; ?>>Comoros</option>
<option value="Congo" <?php if($user->country == 'Congo')echo ' selected="selected" '; ?>>Congo</option>
<option value="Cook Islands" <?php if($user->country == 'Cook Islands')echo ' selected="selected" '; ?>>Cook Islands</option>
<option value="Costa Rica" <?php if($user->country == 'Costa Rica')echo ' selected="selected" '; ?>>Costa Rica</option>
<option value="Cote DIvoire" <?php if($user->country == 'Cote DIvoire')echo ' selected="selected" '; ?>>Cote D'Ivoire</option>
<option value="Croatia" <?php if($user->country == 'Croatia')echo ' selected="selected" '; ?>>Croatia</option>
<option value="Cuba" <?php if($user->country == 'Cuba')echo ' selected="selected" '; ?>>Cuba</option>
<option value="Curaco" <?php if($user->country == 'Curaco')echo ' selected="selected" '; ?>>Curacao</option>
<option value="Cyprus" <?php if($user->country == 'Cyprus')echo ' selected="selected" '; ?>>Cyprus</option>
<option value="Czech Republic" <?php if($user->country == 'Czech Republic')echo ' selected="selected" '; ?>>Czech Republic</option>
<option value="Denmark" <?php if($user->country == 'Denmark')echo ' selected="selected" '; ?>>Denmark</option>
<option value="Djibouti" <?php if($user->country == 'Djibouti')echo ' selected="selected" '; ?>>Djibouti</option>
<option value="Dominica" <?php if($user->country == 'Dominica')echo ' selected="selected" '; ?>>Dominica</option>
<option value="Dominican Republic" <?php if($user->country == 'Dominican Republic')echo ' selected="selected" '; ?>>Dominican Republic</option>
<option value="East Timor" <?php if($user->country == 'East Timor')echo ' selected="selected" '; ?>>East Timor</option>
<option value="Ecuador" <?php if($user->country == 'Ecuador')echo ' selected="selected" '; ?>>Ecuador</option>
<option value="Egypt" <?php if($user->country == 'Egypt')echo ' selected="selected" '; ?>>Egypt</option>
<option value="El Salvador" <?php if($user->country == 'El Salvador')echo ' selected="selected" '; ?>>El Salvador</option>
<option value="Equatorial Guinea" <?php if($user->country == 'Equatorial Guinea')echo ' selected="selected" '; ?>>Equatorial Guinea</option>
<option value="Eritrea" <?php if($user->country == 'Eritrea')echo ' selected="selected" '; ?>>Eritrea</option>
<option value="Estonia" <?php if($user->country == 'Estonia')echo ' selected="selected" '; ?>>Estonia</option>
<option value="Ethiopia" <?php if($user->country == 'Ethiopia')echo ' selected="selected" '; ?>>Ethiopia</option>
<option value="Falkland Islands" <?php if($user->country == 'Falkland Islands')echo ' selected="selected" '; ?>>Falkland Islands</option>
<option value="Faroe Islands" <?php if($user->country == 'Faroe Islands')echo ' selected="selected" '; ?>>Faroe Islands</option>
<option value="Fiji" <?php if($user->country == 'Fiji')echo ' selected="selected" '; ?>>Fiji</option>
<option value="Finland" <?php if($user->country == 'Finland')echo ' selected="selected" '; ?>>Finland</option>
<option value="France" <?php if($user->country == 'France')echo ' selected="selected" '; ?>>France</option>
<option value="French Guiana" <?php if($user->country == 'French Guiana')echo ' selected="selected" '; ?>>French Guiana</option>
<option value="French Polynesia" <?php if($user->country == 'French Polynesia')echo ' selected="selected" '; ?>>French Polynesia</option>
<option value="French Southern Ter" <?php if($user->country == 'French Southern Ter')echo ' selected="selected" '; ?>>French Southern Ter</option>
<option value="Gabon" <?php if($user->country == 'Gabon')echo ' selected="selected" '; ?>>Gabon</option>
<option value="Gambia" <?php if($user->country == 'Gambia')echo ' selected="selected" '; ?>>Gambia</option>
<option value="Georgia" <?php if($user->country == 'Georgia')echo ' selected="selected" '; ?>>Georgia</option>
<option value="Germany" <?php if($user->country == 'Germany')echo ' selected="selected" '; ?>>Germany</option>
<option value="Ghana" <?php if($user->country == 'Ghana')echo ' selected="selected" '; ?>>Ghana</option>
<option value="Gibraltar" <?php if($user->country == 'Gibraltar')echo ' selected="selected" '; ?>>Gibraltar</option>
<option value="Great Britain" <?php if($user->country == 'Great Britain')echo ' selected="selected" '; ?>>Great Britain</option>
<option value="Greece" <?php if($user->country == 'Greece')echo ' selected="selected" '; ?>>Greece</option>
<option value="Greenland" <?php if($user->country == 'Greenland')echo ' selected="selected" '; ?>>Greenland</option>
<option value="Grenada" <?php if($user->country == 'Grenada')echo ' selected="selected" '; ?>>Grenada</option>
<option value="Guadeloupe" <?php if($user->country == 'Guadeloupe')echo ' selected="selected" '; ?>>Guadeloupe</option>
<option value="Guam" <?php if($user->country == 'Guam')echo ' selected="selected" '; ?>>Guam</option>
<option value="Guatemala" <?php if($user->country == 'Guatemala')echo ' selected="selected" '; ?>>Guatemala</option>
<option value="Guinea" <?php if($user->country == 'Guinea')echo ' selected="selected" '; ?>>Guinea</option>
<option value="Guyana" <?php if($user->country == 'Guyana')echo ' selected="selected" '; ?>>Guyana</option>
<option value="Haiti" <?php if($user->country == 'Haiti')echo ' selected="selected" '; ?>>Haiti</option>
<option value="Hawaii" <?php if($user->country == 'Hawaii')echo ' selected="selected" '; ?>>Hawaii</option>
<option value="Honduras" <?php if($user->country == 'Honduras')echo ' selected="selected" '; ?>>Honduras</option>
<option value="Hong Kong" <?php if($user->country == 'Hong Kong')echo ' selected="selected" '; ?>>Hong Kong</option>
<option value="Hungary" <?php if($user->country == 'Hungary')echo ' selected="selected" '; ?>>Hungary</option>
<option value="Iceland" <?php if($user->country == 'Iceland')echo ' selected="selected" '; ?>>Iceland</option>
<option value="India" <?php if($user->country == 'India')echo ' selected="selected" '; ?>>India</option>
<option value="Indonesia" <?php if($user->country == 'Indonesia')echo ' selected="selected" '; ?>>Indonesia</option>
<option value="Iran" <?php if($user->country == 'Iran')echo ' selected="selected" '; ?>>Iran</option>
<option value="Iraq" <?php if($user->country == 'Iraq')echo ' selected="selected" '; ?>>Iraq</option>
<option value="Ireland" <?php if($user->country == 'Ireland')echo ' selected="selected" '; ?>>Ireland</option>
<option value="Isle of Man" <?php if($user->country == 'Isle of Man')echo ' selected="selected" '; ?>>Isle of Man</option>
<option value="Israel" <?php if($user->country == 'Israel')echo ' selected="selected" '; ?>>Israel</option>
<option value="Italy" <?php if($user->country == 'Italy')echo ' selected="selected" '; ?>>Italy</option>
<option value="Jamaica" <?php if($user->country == 'Jamaica')echo ' selected="selected" '; ?>>Jamaica</option>
<option value="Japan" <?php if($user->country == 'Japan')echo ' selected="selected" '; ?>>Japan</option>
<option value="Jordan" <?php if($user->country == 'Jordan')echo ' selected="selected" '; ?>>Jordan</option>
<option value="Kazakhstan" <?php if($user->country == 'Kazakhstan')echo ' selected="selected" '; ?>>Kazakhstan</option>
<option value="Kenya" <?php if($user->country == 'Kenya')echo ' selected="selected" '; ?>>Kenya</option>
<option value="Kiribati" <?php if($user->country == 'Kiribati')echo ' selected="selected" '; ?>>Kiribati</option>
<option value="Korea North" <?php if($user->country == 'Korea North')echo ' selected="selected" '; ?>>Korea North</option>
<option value="Korea Sout" <?php if($user->country == 'Korea Sout')echo ' selected="selected" '; ?>>Korea South</option>
<option value="Kuwait" <?php if($user->country == 'Kuwait')echo ' selected="selected" '; ?>>Kuwait</option>
<option value="Kyrgyzstan" <?php if($user->country == 'Kyrgyzstan')echo ' selected="selected" '; ?>>Kyrgyzstan</option>
<option value="Laos" <?php if($user->country == 'Laos')echo ' selected="selected" '; ?>>Laos</option>
<option value="Latvia" <?php if($user->country == 'Latvia')echo ' selected="selected" '; ?>>Latvia</option>
<option value="Lebanon" <?php if($user->country == 'Lebanon')echo ' selected="selected" '; ?>>Lebanon</option>
<option value="Lesotho" <?php if($user->country == 'Lesotho')echo ' selected="selected" '; ?>>Lesotho</option>
<option value="Liberia" <?php if($user->country == 'Liberia')echo ' selected="selected" '; ?>>Liberia</option>
<option value="Libya" <?php if($user->country == 'Libya')echo ' selected="selected" '; ?>>Libya</option>
<option value="Liechtenstein" <?php if($user->country == 'Liechtenstein')echo ' selected="selected" '; ?>>Liechtenstein</option>
<option value="Lithuania" <?php if($user->country == 'Lithuania')echo ' selected="selected" '; ?>>Lithuania</option>
<option value="Luxembourg" <?php if($user->country == 'Luxembourg')echo ' selected="selected" '; ?>>Luxembourg</option>
<option value="Macau" <?php if($user->country == 'Macau')echo ' selected="selected" '; ?>>Macau</option>
<option value="Macedonia" <?php if($user->country == 'Macedonia')echo ' selected="selected" '; ?>>Macedonia</option>
<option value="Madagascar" <?php if($user->country == 'Madagascar')echo ' selected="selected" '; ?>>Madagascar</option>
<option value="Malaysia" <?php if($user->country == 'Malaysia')echo ' selected="selected" '; ?>>Malaysia</option>
<option value="Malawi" <?php if($user->country == 'Malawi')echo ' selected="selected" '; ?>>Malawi</option>
<option value="Maldives" <?php if($user->country == 'Maldives')echo ' selected="selected" '; ?>>Maldives</option>
<option value="Mali" <?php if($user->country == 'Mali')echo ' selected="selected" '; ?>>Mali</option>
<option value="Malta" <?php if($user->country == 'Malta')echo ' selected="selected" '; ?>>Malta</option>
<option value="Marshall Islands" <?php if($user->country == 'Marshall Islands')echo ' selected="selected" '; ?>>Marshall Islands</option>
<option value="Martinique" <?php if($user->country == 'Martinique')echo ' selected="selected" '; ?>>Martinique</option>
<option value="Mauritania" <?php if($user->country == 'Mauritania')echo ' selected="selected" '; ?>>Mauritania</option>
<option value="Mauritius" <?php if($user->country == 'Mauritius')echo ' selected="selected" '; ?>>Mauritius</option>
<option value="Mayotte" <?php if($user->country == 'Mayotte')echo ' selected="selected" '; ?>>Mayotte</option>
<option value="Mexico" <?php if($user->country == 'Mexico')echo ' selected="selected" '; ?>>Mexico</option>
<option value="Midway Islands" <?php if($user->country == 'Midway Islands')echo ' selected="selected" '; ?>>Midway Islands</option>
<option value="Moldova" <?php if($user->country == 'Moldova')echo ' selected="selected" '; ?>>Moldova</option>
<option value="Monaco" <?php if($user->country == 'Monaco')echo ' selected="selected" '; ?>>Monaco</option>
<option value="Mongolia" <?php if($user->country == 'Mongolia')echo ' selected="selected" '; ?>>Mongolia</option>
<option value="Montserrat" <?php if($user->country == 'Montserrat')echo ' selected="selected" '; ?>>Montserrat</option>
<option value="Morocco" <?php if($user->country == 'Morocco')echo ' selected="selected" '; ?>>Morocco</option>
<option value="Mozambique" <?php if($user->country == 'Mozambique')echo ' selected="selected" '; ?>>Mozambique</option>
<option value="Myanmar" <?php if($user->country == 'Myanmar')echo ' selected="selected" '; ?>>Myanmar</option>
<option value="Nambia" <?php if($user->country == 'Nambia')echo ' selected="selected" '; ?>>Nambia</option>
<option value="Nauru" <?php if($user->country == 'Nauru')echo ' selected="selected" '; ?>>Nauru</option>
<option value="Nepal" <?php if($user->country == 'Nepal')echo ' selected="selected" '; ?>>Nepal</option>
<option value="Netherland Antilles" <?php if($user->country == 'Netherland Antilles')echo ' selected="selected" '; ?>>Netherland Antilles</option>
<option value="Netherlands" <?php if($user->country == 'Netherlands')echo ' selected="selected" '; ?>>Netherlands (Holland, Europe)</option>
<option value="Nevis" <?php if($user->country == 'Nevis')echo ' selected="selected" '; ?>>Nevis</option>
<option value="New Caledonia" <?php if($user->country == 'New Caledonia')echo ' selected="selected" '; ?>>New Caledonia</option>
<option value="New Zealand" <?php if($user->country == 'New Zealand')echo ' selected="selected" '; ?>>New Zealand</option>
<option value="Nicaragua" <?php if($user->country == 'Nicaragua')echo ' selected="selected" '; ?>>Nicaragua</option>
<option value="Niger" <?php if($user->country == 'Niger')echo ' selected="selected" '; ?>>Niger</option>
<option value="Nigeria" <?php if($user->country == 'Nigeria')echo ' selected="selected" '; ?>>Nigeria</option>
<option value="Niue" <?php if($user->country == 'Niue')echo ' selected="selected" '; ?>>Niue</option>
<option value="Norfolk Island" <?php if($user->country == 'Norfolk Island')echo ' selected="selected" '; ?>>Norfolk Island</option>
<option value="Norway" <?php if($user->country == 'Norway')echo ' selected="selected" '; ?>>Norway</option>
<option value="Oman" <?php if($user->country == 'Oman')echo ' selected="selected" '; ?>>Oman</option>
<option value="Pakistan" <?php if($user->country == 'Pakistan')echo ' selected="selected" '; ?>>Pakistan</option>
<option value="Palau Island" <?php if($user->country == 'Palau Island')echo ' selected="selected" '; ?>>Palau Island</option>
<option value="Palestine" <?php if($user->country == 'Palestine')echo ' selected="selected" '; ?>>Palestine</option>
<option value="Panama" <?php if($user->country == 'Panama')echo ' selected="selected" '; ?>>Panama</option>
<option value="Papua New Guinea" <?php if($user->country == 'Papua New Guinea')echo ' selected="selected" '; ?>>Papua New Guinea</option>
<option value="Paraguay" <?php if($user->country == 'Paraguay')echo ' selected="selected" '; ?>>Paraguay</option>
<option value="Peru" <?php if($user->country == 'Peru')echo ' selected="selected" '; ?>>Peru</option>
<option value="Phillipines" <?php if($user->country == 'Phillipines')echo ' selected="selected" '; ?>>Philippines</option>
<option value="Pitcairn Island" <?php if($user->country == 'Pitcairn Island')echo ' selected="selected" '; ?>>Pitcairn Island</option>
<option value="Poland" <?php if($user->country == 'Poland')echo ' selected="selected" '; ?>>Poland</option>
<option value="Portugal" <?php if($user->country == 'Portugal')echo ' selected="selected" '; ?>>Portugal</option>
<option value="Puerto Rico" <?php if($user->country == 'Puerto Rico')echo ' selected="selected" '; ?>>Puerto Rico</option>
<option value="Qatar" <?php if($user->country == 'Qatar')echo ' selected="selected" '; ?>>Qatar</option>
<option value="Republic of Montenegro" <?php if($user->country == 'Republic of Montenegro')echo ' selected="selected" '; ?>>Republic of Montenegro</option>
<option value="Republic of Serbia" <?php if($user->country == 'Republic of Serbia')echo ' selected="selected" '; ?>>Republic of Serbia</option>
<option value="Reunion" <?php if($user->country == 'Reunion')echo ' selected="selected" '; ?>>Reunion</option>
<option value="Romania" <?php if($user->country == 'Romania')echo ' selected="selected" '; ?>>Romania</option>
<option value="Russia" <?php if($user->country == 'Russia')echo ' selected="selected" '; ?>>Russia</option>
<option value="Rwanda" <?php if($user->country == 'Rwanda')echo ' selected="selected" '; ?>>Rwanda</option>
<option value="St Barthelemy" <?php if($user->country == 'St Barthelemy')echo ' selected="selected" '; ?>>St Barthelemy</option>
<option value="St Eustatius" <?php if($user->country == 'St Eustatius')echo ' selected="selected" '; ?>>St Eustatius</option>
<option value="St Helena" <?php if($user->country == 'St Helena')echo ' selected="selected" '; ?>>St Helena</option>
<option value="St Kitts-Nevis" <?php if($user->country == 'St Kitts-Nevis')echo ' selected="selected" '; ?>>St Kitts-Nevis</option>
<option value="St Lucia" <?php if($user->country == 'St Lucia')echo ' selected="selected" '; ?>>St Lucia</option>
<option value="St Maarten" <?php if($user->country == 'St Maarten')echo ' selected="selected" '; ?>>St Maarten</option>
<option value="St Pierre &amp; Miquelon" <?php if($user->country == 'St Pierre &amp; Miquelon')echo ' selected="selected" '; ?>>St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines" <?php if($user->country == 'St Vincent &amp; Grenadines')echo ' selected="selected" '; ?>>St Vincent &amp; Grenadines</option>
<option value="Saipan" <?php if($user->country == 'Saipan')echo ' selected="selected" '; ?>>Saipan</option>
<option value="Samoa" <?php if($user->country == 'Samoa')echo ' selected="selected" '; ?>>Samoa</option>
<option value="Samoa American" <?php if($user->country == 'Samoa American')echo ' selected="selected" '; ?>>Samoa American</option>
<option value="San Marino" <?php if($user->country == 'San Marino')echo ' selected="selected" '; ?>>San Marino</option>
<option value="Sao Tome &amp; Principe" <?php if($user->country == 'Sao Tome &amp; Principe')echo ' selected="selected" '; ?>>Sao Tome &amp; Principe</option>
<option value="Saudi Arabia" <?php if($user->country == 'Saudi Arabia')echo ' selected="selected" '; ?>>Saudi Arabia</option>
<option value="Senegal" <?php if($user->country == 'Senegal')echo ' selected="selected" '; ?>>Senegal</option>
<option value="Serbia" <?php if($user->country == 'Serbia')echo ' selected="selected" '; ?>>Serbia</option>
<option value="Seychelles" <?php if($user->country == 'Seychelles')echo ' selected="selected" '; ?>>Seychelles</option>
<option value="Sierra Leone" <?php if($user->country == 'Sierra Leone')echo ' selected="selected" '; ?>>Sierra Leone</option>
<option value="Singapore" <?php if($user->country == 'Singapore')echo ' selected="selected" '; ?>>Singapore</option>
<option value="Slovakia" <?php if($user->country == 'Slovakia')echo ' selected="selected" '; ?>>Slovakia</option>
<option value="Slovenia" <?php if($user->country == 'Slovenia')echo ' selected="selected" '; ?>>Slovenia</option>
<option value="Solomon Islands" <?php if($user->country == 'Solomon Islands')echo ' selected="selected" '; ?>>Solomon Islands</option>
<option value="Somalia" <?php if($user->country == 'Somalia')echo ' selected="selected" '; ?>>Somalia</option>
<option value="South Africa" <?php if($user->country == 'South Africa')echo ' selected="selected" '; ?>>South Africa</option>
<option value="Spain" <?php if($user->country == 'Spain')echo ' selected="selected" '; ?>>Spain</option>
<option value="Sri Lanka" <?php if($user->country == 'Sri Lanka')echo ' selected="selected" '; ?>>Sri Lanka</option>
<option value="Sudan" <?php if($user->country == 'Sudan')echo ' selected="selected" '; ?>>Sudan</option>
<option value="Suriname" <?php if($user->country == 'Suriname')echo ' selected="selected" '; ?>>Suriname</option>
<option value="Swaziland" <?php if($user->country == 'Swaziland')echo ' selected="selected" '; ?>>Swaziland</option>
<option value="Sweden" <?php if($user->country == 'Sweden')echo ' selected="selected" '; ?>>Sweden</option>
<option value="Switzerland" <?php if($user->country == 'Switzerland')echo ' selected="selected" '; ?>>Switzerland</option>
<option value="Syria" <?php if($user->country == 'Syria')echo ' selected="selected" '; ?>>Syria</option>
<option value="Tahiti" <?php if($user->country == 'Tahiti')echo ' selected="selected" '; ?>>Tahiti</option>
<option value="Taiwan" <?php if($user->country == 'Taiwan')echo ' selected="selected" '; ?>>Taiwan</option>
<option value="Tajikistan" <?php if($user->country == 'Tajikistan')echo ' selected="selected" '; ?>>Tajikistan</option>
<option value="Tanzania" <?php if($user->country == 'Tanzania')echo ' selected="selected" '; ?>>Tanzania</option>
<option value="Thailand" <?php if($user->country == 'Thailand')echo ' selected="selected" '; ?>>Thailand</option>
<option value="Togo" <?php if($user->country == 'Togo')echo ' selected="selected" '; ?>>Togo</option>
<option value="Tokelau" <?php if($user->country == 'Tokelau')echo ' selected="selected" '; ?>>Tokelau</option>
<option value="Tonga" <?php if($user->country == 'Tonga')echo ' selected="selected" '; ?>>Tonga</option>
<option value="Trinidad &amp; Tobago" <?php if($user->country == 'Trinidad &amp; Tobago')echo ' selected="selected" '; ?>>Trinidad &amp; Tobago</option>
<option value="Tunisia" <?php if($user->country == 'Tunisia')echo ' selected="selected" '; ?>>Tunisia</option>
<option value="Turkey" <?php if($user->country == 'Turkey')echo ' selected="selected" '; ?>>Turkey</option>
<option value="Turkmenistan" <?php if($user->country == 'Turkmenistan')echo ' selected="selected" '; ?>>Turkmenistan</option>
<option value="Turks &amp; Caicos Is" <?php if($user->country == 'Turks &amp; Caicos Is')echo ' selected="selected" '; ?>>Turks &amp; Caicos Is</option>
<option value="Tuvalu" <?php if($user->country == 'Tuvalu')echo ' selected="selected" '; ?>>Tuvalu</option>
<option value="Uganda" <?php if($user->country == 'Uganda')echo ' selected="selected" '; ?>>Uganda</option>
<option value="Ukraine" <?php if($user->country == 'Ukraine')echo ' selected="selected" '; ?>>Ukraine</option>
<option value="United Arab Emirates" <?php if($user->country == 'United Arab Emirates')echo ' selected="selected" '; ?>>United Arab Emirates</option>
<option value="United Kingdom" <?php if($user->country == 'United Kingdom')echo ' selected="selected" '; ?>>United Kingdom</option>
<option value="United States of America" <?php if($user->country == 'United States of America')echo ' selected="selected" '; ?>>United States of America</option>
<option value="Uraguay" <?php if($user->country == 'Uraguay')echo ' selected="selected" '; ?>>Uruguay</option>
<option value="Uzbekistan" <?php if($user->country == 'Uzbekistan')echo ' selected="selected" '; ?>>Uzbekistan</option>
<option value="Vanuatu" <?php if($user->country == 'Vanuatu')echo ' selected="selected" '; ?>>Vanuatu</option>
<option value="Vatican City State" <?php if($user->country == 'Vatican City State')echo ' selected="selected" '; ?>>Vatican City State</option>
<option value="Venezuela" <?php if($user->country == 'Venezuela')echo ' selected="selected" '; ?>>Venezuela</option>
<option value="Vietnam" <?php if($user->country == 'Vietnam')echo ' selected="selected" '; ?>>Vietnam</option>
<option value="Virgin Islands (Brit)" <?php if($user->country == 'Virgin Islands (Brit)')echo ' selected="selected" '; ?>>Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)" <?php if($user->country == 'Virgin Islands (USA)')echo ' selected="selected" '; ?>>Virgin Islands (USA)</option>
<option value="Wake Island" <?php if($user->country == 'Wake Island')echo ' selected="selected" '; ?>>Wake Island</option>
<option value="Wallis &amp; Futana Is" <?php if($user->country == 'Wallis &amp; Futana Is')echo ' selected="selected" '; ?>>Wallis &amp; Futana Is</option>
<option value="Yemen" <?php if($user->country == 'Yemen')echo ' selected="selected" '; ?>>Yemen</option>
<option value="Zaire" <?php if($user->country == 'Zaire')echo ' selected="selected" '; ?>>Zaire</option>
<option value="Zambia" <?php if($user->country == 'Zambia')echo ' selected="selected" '; ?>>Zambia</option>
<option value="Zimbabwe" <?php if($user->country == 'Zimbabwe')echo ' selected="selected" '; ?>>Zimbabwe</option>
</select>	
  
                            
                        </div>
                    </div>
						
					<div class="form-group">
                        <label class="col-md-3 control-label" for="tele">Telephone</label>
                        <div class="col-md-9">
                            <input type="text" id="tele" name="tele" class="form-control" placeholder="Enter Telephone Number" 
							value="<?php echo $user->tele; ?>" >
                            
                        </div>
                    </div>
					<!--
					<div class="form-group">
                        <label class="col-md-3 control-label" for="tele">Fax</label>
                        <div class="col-md-9">
                            <input type="fax" id="fax" name="fax" class="form-control" placeholder="Enter Fax Number" 
							value="<?php echo $user->fax; ?>" >
                            
                        </div>
                    </div>
                    -->
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
                            <button type="submit" class="btn btn-sm btn-primary"> Save</button>
                             <button type="button" class="btn btn-sm btn-warning cancel" data-href="<?php echo site_url('proposers/index'); ?>">Cancel</button>
                       
                        </div>
                    </div>
                </form>
                <!-- END Horizontal Form Content -->
            </div>
			
			
