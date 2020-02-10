<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                  
                    <h2><strong>Edit Committee Member</strong> </h2>
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
                <form id="form-cm" action="<?php echo site_url('committee_members/edit/'.$cm->user_id); ?>" method="post" class="form-horizontal form-bordered" >
                   
					
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="first_name">First Name</label>
                        <div class="col-md-9">
                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter First Name" 
							value="<?php echo $cm->first_name; ?>" required>
                            
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="last_name">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter Last Name" 
							value="<?php echo $cm->last_name; ?>" required>
                            
                        </div>
                    </div>
					
				
					
							<div class="form-group">
                        <label class="col-md-3 control-label">Gender</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="gender1">
                                <input type="radio" id="gender1" name="gender" value="Male" <?php if($cm->gender == 'Male') echo 'checked'; ?>> Male
                            </label>
                            <label class="radio-inline" for="gender2">
                                <input type="radio" id="gender2" name="gender" value="Female" <?php if($cm->gender == 'Female') echo 'checked'; ?>> Female
                            </label>
                            
                             <label class="radio-inline" for="gender3">
                                <input type="radio" id="gender3" name="gender" value="Prefer not to disclose" <?php if($cm->gender == 'Prefer not to disclose') echo 'checked'; ?>> Prefer not to disclose
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
<option value="Afganistan" <?php if($cm->country == 'Afganistan')echo ' selected="selected" '; ?>>Afghanistan</option>
<option value="Albania" <?php if($cm->country == 'Albania')echo ' selected="selected" '; ?>>Albania</option>
<option value="Algeria" <?php if($cm->country == 'Algeria')echo ' selected="selected" '; ?>>Algeria</option>
<option value="American Samoa" <?php if($cm->country == 'American Samoa')echo ' selected="selected" '; ?>>American Samoa</option>
<option value="Andorra" <?php if($cm->country == 'Andorra')echo ' selected="selected" '; ?>>Andorra</option>
<option value="Angola" <?php if($cm->country == 'Angola')echo ' selected="selected" '; ?>>Angola</option>
<option value="Anguilla" <?php if($cm->country == 'Anguilla')echo ' selected="selected" '; ?>>Anguilla</option>
<option value="Antigua &amp; Barbuda" <?php if($cm->country == 'Antigua &amp; Barbuda')echo ' selected="selected" '; ?>>Antigua &amp; Barbuda</option>
<option value="Argentina" <?php if($cm->country == 'Argentina')echo ' selected="selected" '; ?>>Argentina</option>
<option value="Armenia" <?php if($cm->country == 'Armenia')echo ' selected="selected" '; ?>>Armenia</option>
<option value="Aruba" <?php if($cm->country == 'Aruba')echo ' selected="selected" '; ?>>Aruba</option>
<option value="Australia" <?php if($cm->country == 'Australia')echo ' selected="selected" '; ?>>Australia</option>
<option value="Austria" <?php if($cm->country == 'Austria')echo ' selected="selected" '; ?>>Austria</option>
<option value="Azerbaijan" <?php if($cm->country == 'Azerbaijan')echo ' selected="selected" '; ?>>Azerbaijan</option>
<option value="Bahamas" <?php if($cm->country == 'Bahamas')echo ' selected="selected" '; ?>>Bahamas</option>
<option value="Bahrain" <?php if($cm->country == 'Bahrain')echo ' selected="selected" '; ?>>Bahrain</option>
<option value="Bangladesh" <?php if($cm->country == 'Bangladesh')echo ' selected="selected" '; ?>>Bangladesh</option>
<option value="Barbados" <?php if($cm->country == 'Barbados')echo ' selected="selected" '; ?>>Barbados</option>
<option value="Belarus" <?php if($cm->country == 'Belarus')echo ' selected="selected" '; ?>>Belarus</option>
<option value="Belgium" <?php if($cm->country == 'Belgium')echo ' selected="selected" '; ?>>Belgium</option>
<option value="Belize" <?php if($cm->country == 'Belize')echo ' selected="selected" '; ?>>Belize</option>
<option value="Benin" <?php if($cm->country == 'Benin')echo ' selected="selected" '; ?>>Benin</option>
<option value="Bermuda" <?php if($cm->country == 'Bermuda')echo ' selected="selected" '; ?>>Bermuda</option>
<option value="Bhutan" <?php if($cm->country == 'Bhutan')echo ' selected="selected" '; ?>>Bhutan</option>
<option value="Bolivia" <?php if($cm->country == 'Bolivia')echo ' selected="selected" '; ?>>Bolivia</option>
<option value="Bonaire" <?php if($cm->country == 'Bonaire')echo ' selected="selected" '; ?>>Bonaire</option>
<option value="Bosnia &amp; Herzegovina" <?php if($cm->country == 'Bosnia &amp; Herzegovina')echo ' selected="selected" '; ?>>Bosnia &amp; Herzegovina</option>
<option value="Botswana" <?php if($cm->country == 'Botswana')echo ' selected="selected" '; ?>>Botswana</option>
<option value="Brazil" <?php if($cm->country == 'Brazil')echo ' selected="selected" '; ?>>Brazil</option>
<option value="British Indian Ocean Ter" <?php if($cm->country == 'British Indian Ocean Ter')echo ' selected="selected" '; ?>>British Indian Ocean Ter</option>
<option value="Brunei" <?php if($cm->country == 'Brunei')echo ' selected="selected" '; ?>>Brunei</option>
<option value="Bulgaria" <?php if($cm->country == 'Bulgaria')echo ' selected="selected" '; ?>>Bulgaria</option>
<option value="Burkina Faso" <?php if($cm->country == 'Burkina Faso')echo ' selected="selected" '; ?>>Burkina Faso</option>
<option value="Burundi" <?php if($cm->country == 'Burundi')echo ' selected="selected" '; ?>>Burundi</option>
<option value="Cambodia" <?php if($cm->country == 'Cambodia')echo ' selected="selected" '; ?>>Cambodia</option>
<option value="Cameroon" <?php if($cm->country == 'Cameroon')echo ' selected="selected" '; ?>>Cameroon</option>
<option value="Canada" <?php if($cm->country == 'Canada')echo ' selected="selected" '; ?>>Canada</option>
<option value="Canary Islands" <?php if($cm->country == 'Canary Islands')echo ' selected="selected" '; ?>>Canary Islands</option>
<option value="Cape Verde" <?php if($cm->country == 'Cape Verde')echo ' selected="selected" '; ?>>Cape Verde</option>
<option value="Cayman Islands" <?php if($cm->country == 'Cayman Islands')echo ' selected="selected" '; ?>>Cayman Islands</option>
<option value="Central African Republic" <?php if($cm->country == 'Central African Republic')echo ' selected="selected" '; ?>>Central African Republic</option>
<option value="Chad" <?php if($cm->country == 'Chad')echo ' selected="selected" '; ?>>Chad</option>
<option value="Channel Islands" <?php if($cm->country == 'Channel Islands')echo ' selected="selected" '; ?>>Channel Islands</option>
<option value="Chile" <?php if($cm->country == 'Chile')echo ' selected="selected" '; ?>>Chile</option>
<option value="China" <?php if($cm->country == 'China')echo ' selected="selected" '; ?>>China</option>
<option value="Christmas Island" <?php if($cm->country == 'Christmas Island')echo ' selected="selected" '; ?>>Christmas Island</option>
<option value="Cocos Island" <?php if($cm->country == 'Cocos Island')echo ' selected="selected" '; ?>>Cocos Island</option>
<option value="Colombia" <?php if($cm->country == 'Colombia')echo ' selected="selected" '; ?>>Colombia</option>
<option value="Comoros" <?php if($cm->country == 'Comoros')echo ' selected="selected" '; ?>>Comoros</option>
<option value="Congo" <?php if($cm->country == 'Congo')echo ' selected="selected" '; ?>>Congo</option>
<option value="Cook Islands" <?php if($cm->country == 'Cook Islands')echo ' selected="selected" '; ?>>Cook Islands</option>
<option value="Costa Rica" <?php if($cm->country == 'Costa Rica')echo ' selected="selected" '; ?>>Costa Rica</option>
<option value="Cote DIvoire" <?php if($cm->country == 'Cote DIvoire')echo ' selected="selected" '; ?>>Cote D'Ivoire</option>
<option value="Croatia" <?php if($cm->country == 'Croatia')echo ' selected="selected" '; ?>>Croatia</option>
<option value="Cuba" <?php if($cm->country == 'Cuba')echo ' selected="selected" '; ?>>Cuba</option>
<option value="Curaco" <?php if($cm->country == 'Curaco')echo ' selected="selected" '; ?>>Curacao</option>
<option value="Cyprus" <?php if($cm->country == 'Cyprus')echo ' selected="selected" '; ?>>Cyprus</option>
<option value="Czech Republic" <?php if($cm->country == 'Czech Republic')echo ' selected="selected" '; ?>>Czech Republic</option>
<option value="Denmark" <?php if($cm->country == 'Denmark')echo ' selected="selected" '; ?>>Denmark</option>
<option value="Djibouti" <?php if($cm->country == 'Djibouti')echo ' selected="selected" '; ?>>Djibouti</option>
<option value="Dominica" <?php if($cm->country == 'Dominica')echo ' selected="selected" '; ?>>Dominica</option>
<option value="Dominican Republic" <?php if($cm->country == 'Dominican Republic')echo ' selected="selected" '; ?>>Dominican Republic</option>
<option value="East Timor" <?php if($cm->country == 'East Timor')echo ' selected="selected" '; ?>>East Timor</option>
<option value="Ecuador" <?php if($cm->country == 'Ecuador')echo ' selected="selected" '; ?>>Ecuador</option>
<option value="Egypt" <?php if($cm->country == 'Egypt')echo ' selected="selected" '; ?>>Egypt</option>
<option value="El Salvador" <?php if($cm->country == 'El Salvador')echo ' selected="selected" '; ?>>El Salvador</option>
<option value="Equatorial Guinea" <?php if($cm->country == 'Equatorial Guinea')echo ' selected="selected" '; ?>>Equatorial Guinea</option>
<option value="Eritrea" <?php if($cm->country == 'Eritrea')echo ' selected="selected" '; ?>>Eritrea</option>
<option value="Estonia" <?php if($cm->country == 'Estonia')echo ' selected="selected" '; ?>>Estonia</option>
<option value="Ethiopia" <?php if($cm->country == 'Ethiopia')echo ' selected="selected" '; ?>>Ethiopia</option>
<option value="Falkland Islands" <?php if($cm->country == 'Falkland Islands')echo ' selected="selected" '; ?>>Falkland Islands</option>
<option value="Faroe Islands" <?php if($cm->country == 'Faroe Islands')echo ' selected="selected" '; ?>>Faroe Islands</option>
<option value="Fiji" <?php if($cm->country == 'Fiji')echo ' selected="selected" '; ?>>Fiji</option>
<option value="Finland" <?php if($cm->country == 'Finland')echo ' selected="selected" '; ?>>Finland</option>
<option value="France" <?php if($cm->country == 'France')echo ' selected="selected" '; ?>>France</option>
<option value="French Guiana" <?php if($cm->country == 'French Guiana')echo ' selected="selected" '; ?>>French Guiana</option>
<option value="French Polynesia" <?php if($cm->country == 'French Polynesia')echo ' selected="selected" '; ?>>French Polynesia</option>
<option value="French Southern Ter" <?php if($cm->country == 'French Southern Ter')echo ' selected="selected" '; ?>>French Southern Ter</option>
<option value="Gabon" <?php if($cm->country == 'Gabon')echo ' selected="selected" '; ?>>Gabon</option>
<option value="Gambia" <?php if($cm->country == 'Gambia')echo ' selected="selected" '; ?>>Gambia</option>
<option value="Georgia" <?php if($cm->country == 'Georgia')echo ' selected="selected" '; ?>>Georgia</option>
<option value="Germany" <?php if($cm->country == 'Germany')echo ' selected="selected" '; ?>>Germany</option>
<option value="Ghana" <?php if($cm->country == 'Ghana')echo ' selected="selected" '; ?>>Ghana</option>
<option value="Gibraltar" <?php if($cm->country == 'Gibraltar')echo ' selected="selected" '; ?>>Gibraltar</option>
<option value="Great Britain" <?php if($cm->country == 'Great Britain')echo ' selected="selected" '; ?>>Great Britain</option>
<option value="Greece" <?php if($cm->country == 'Greece')echo ' selected="selected" '; ?>>Greece</option>
<option value="Greenland" <?php if($cm->country == 'Greenland')echo ' selected="selected" '; ?>>Greenland</option>
<option value="Grenada" <?php if($cm->country == 'Grenada')echo ' selected="selected" '; ?>>Grenada</option>
<option value="Guadeloupe" <?php if($cm->country == 'Guadeloupe')echo ' selected="selected" '; ?>>Guadeloupe</option>
<option value="Guam" <?php if($cm->country == 'Guam')echo ' selected="selected" '; ?>>Guam</option>
<option value="Guatemala" <?php if($cm->country == 'Guatemala')echo ' selected="selected" '; ?>>Guatemala</option>
<option value="Guinea" <?php if($cm->country == 'Guinea')echo ' selected="selected" '; ?>>Guinea</option>
<option value="Guyana" <?php if($cm->country == 'Guyana')echo ' selected="selected" '; ?>>Guyana</option>
<option value="Haiti" <?php if($cm->country == 'Haiti')echo ' selected="selected" '; ?>>Haiti</option>
<option value="Hawaii" <?php if($cm->country == 'Hawaii')echo ' selected="selected" '; ?>>Hawaii</option>
<option value="Honduras" <?php if($cm->country == 'Honduras')echo ' selected="selected" '; ?>>Honduras</option>
<option value="Hong Kong" <?php if($cm->country == 'Hong Kong')echo ' selected="selected" '; ?>>Hong Kong</option>
<option value="Hungary" <?php if($cm->country == 'Hungary')echo ' selected="selected" '; ?>>Hungary</option>
<option value="Iceland" <?php if($cm->country == 'Iceland')echo ' selected="selected" '; ?>>Iceland</option>
<option value="India" <?php if($cm->country == 'India')echo ' selected="selected" '; ?>>India</option>
<option value="Indonesia" <?php if($cm->country == 'Indonesia')echo ' selected="selected" '; ?>>Indonesia</option>
<option value="Iran" <?php if($cm->country == 'Iran')echo ' selected="selected" '; ?>>Iran</option>
<option value="Iraq" <?php if($cm->country == 'Iraq')echo ' selected="selected" '; ?>>Iraq</option>
<option value="Ireland" <?php if($cm->country == 'Ireland')echo ' selected="selected" '; ?>>Ireland</option>
<option value="Isle of Man" <?php if($cm->country == 'Isle of Man')echo ' selected="selected" '; ?>>Isle of Man</option>
<option value="Israel" <?php if($cm->country == 'Israel')echo ' selected="selected" '; ?>>Israel</option>
<option value="Italy" <?php if($cm->country == 'Italy')echo ' selected="selected" '; ?>>Italy</option>
<option value="Jamaica" <?php if($cm->country == 'Jamaica')echo ' selected="selected" '; ?>>Jamaica</option>
<option value="Japan" <?php if($cm->country == 'Japan')echo ' selected="selected" '; ?>>Japan</option>
<option value="Jordan" <?php if($cm->country == 'Jordan')echo ' selected="selected" '; ?>>Jordan</option>
<option value="Kazakhstan" <?php if($cm->country == 'Kazakhstan')echo ' selected="selected" '; ?>>Kazakhstan</option>
<option value="Kenya" <?php if($cm->country == 'Kenya')echo ' selected="selected" '; ?>>Kenya</option>
<option value="Kiribati" <?php if($cm->country == 'Kiribati')echo ' selected="selected" '; ?>>Kiribati</option>
<option value="Korea North" <?php if($cm->country == 'Korea North')echo ' selected="selected" '; ?>>Korea North</option>
<option value="Korea Sout" <?php if($cm->country == 'Korea Sout')echo ' selected="selected" '; ?>>Korea South</option>
<option value="Kuwait" <?php if($cm->country == 'Kuwait')echo ' selected="selected" '; ?>>Kuwait</option>
<option value="Kyrgyzstan" <?php if($cm->country == 'Kyrgyzstan')echo ' selected="selected" '; ?>>Kyrgyzstan</option>
<option value="Laos" <?php if($cm->country == 'Laos')echo ' selected="selected" '; ?>>Laos</option>
<option value="Latvia" <?php if($cm->country == 'Latvia')echo ' selected="selected" '; ?>>Latvia</option>
<option value="Lebanon" <?php if($cm->country == 'Lebanon')echo ' selected="selected" '; ?>>Lebanon</option>
<option value="Lesotho" <?php if($cm->country == 'Lesotho')echo ' selected="selected" '; ?>>Lesotho</option>
<option value="Liberia" <?php if($cm->country == 'Liberia')echo ' selected="selected" '; ?>>Liberia</option>
<option value="Libya" <?php if($cm->country == 'Libya')echo ' selected="selected" '; ?>>Libya</option>
<option value="Liechtenstein" <?php if($cm->country == 'Liechtenstein')echo ' selected="selected" '; ?>>Liechtenstein</option>
<option value="Lithuania" <?php if($cm->country == 'Lithuania')echo ' selected="selected" '; ?>>Lithuania</option>
<option value="Luxembourg" <?php if($cm->country == 'Luxembourg')echo ' selected="selected" '; ?>>Luxembourg</option>
<option value="Macau" <?php if($cm->country == 'Macau')echo ' selected="selected" '; ?>>Macau</option>
<option value="Macedonia" <?php if($cm->country == 'Macedonia')echo ' selected="selected" '; ?>>Macedonia</option>
<option value="Madagascar" <?php if($cm->country == 'Madagascar')echo ' selected="selected" '; ?>>Madagascar</option>
<option value="Malaysia" <?php if($cm->country == 'Malaysia')echo ' selected="selected" '; ?>>Malaysia</option>
<option value="Malawi" <?php if($cm->country == 'Malawi')echo ' selected="selected" '; ?>>Malawi</option>
<option value="Maldives" <?php if($cm->country == 'Maldives')echo ' selected="selected" '; ?>>Maldives</option>
<option value="Mali" <?php if($cm->country == 'Mali')echo ' selected="selected" '; ?>>Mali</option>
<option value="Malta" <?php if($cm->country == 'Malta')echo ' selected="selected" '; ?>>Malta</option>
<option value="Marshall Islands" <?php if($cm->country == 'Marshall Islands')echo ' selected="selected" '; ?>>Marshall Islands</option>
<option value="Martinique" <?php if($cm->country == 'Martinique')echo ' selected="selected" '; ?>>Martinique</option>
<option value="Mauritania" <?php if($cm->country == 'Mauritania')echo ' selected="selected" '; ?>>Mauritania</option>
<option value="Mauritius" <?php if($cm->country == 'Mauritius')echo ' selected="selected" '; ?>>Mauritius</option>
<option value="Mayotte" <?php if($cm->country == 'Mayotte')echo ' selected="selected" '; ?>>Mayotte</option>
<option value="Mexico" <?php if($cm->country == 'Mexico')echo ' selected="selected" '; ?>>Mexico</option>
<option value="Midway Islands" <?php if($cm->country == 'Midway Islands')echo ' selected="selected" '; ?>>Midway Islands</option>
<option value="Moldova" <?php if($cm->country == 'Moldova')echo ' selected="selected" '; ?>>Moldova</option>
<option value="Monaco" <?php if($cm->country == 'Monaco')echo ' selected="selected" '; ?>>Monaco</option>
<option value="Mongolia" <?php if($cm->country == 'Mongolia')echo ' selected="selected" '; ?>>Mongolia</option>
<option value="Montserrat" <?php if($cm->country == 'Montserrat')echo ' selected="selected" '; ?>>Montserrat</option>
<option value="Morocco" <?php if($cm->country == 'Morocco')echo ' selected="selected" '; ?>>Morocco</option>
<option value="Mozambique" <?php if($cm->country == 'Mozambique')echo ' selected="selected" '; ?>>Mozambique</option>
<option value="Myanmar" <?php if($cm->country == 'Myanmar')echo ' selected="selected" '; ?>>Myanmar</option>
<option value="Nambia" <?php if($cm->country == 'Nambia')echo ' selected="selected" '; ?>>Nambia</option>
<option value="Nauru" <?php if($cm->country == 'Nauru')echo ' selected="selected" '; ?>>Nauru</option>
<option value="Nepal" <?php if($cm->country == 'Nepal')echo ' selected="selected" '; ?>>Nepal</option>
<option value="Netherland Antilles" <?php if($cm->country == 'Netherland Antilles')echo ' selected="selected" '; ?>>Netherland Antilles</option>
<option value="Netherlands" <?php if($cm->country == 'Netherlands')echo ' selected="selected" '; ?>>Netherlands (Holland, Europe)</option>
<option value="Nevis" <?php if($cm->country == 'Nevis')echo ' selected="selected" '; ?>>Nevis</option>
<option value="New Caledonia" <?php if($cm->country == 'New Caledonia')echo ' selected="selected" '; ?>>New Caledonia</option>
<option value="New Zealand" <?php if($cm->country == 'New Zealand')echo ' selected="selected" '; ?>>New Zealand</option>
<option value="Nicaragua" <?php if($cm->country == 'Nicaragua')echo ' selected="selected" '; ?>>Nicaragua</option>
<option value="Niger" <?php if($cm->country == 'Niger')echo ' selected="selected" '; ?>>Niger</option>
<option value="Nigeria" <?php if($cm->country == 'Nigeria')echo ' selected="selected" '; ?>>Nigeria</option>
<option value="Niue" <?php if($cm->country == 'Niue')echo ' selected="selected" '; ?>>Niue</option>
<option value="Norfolk Island" <?php if($cm->country == 'Norfolk Island')echo ' selected="selected" '; ?>>Norfolk Island</option>
<option value="Norway" <?php if($cm->country == 'Norway')echo ' selected="selected" '; ?>>Norway</option>
<option value="Oman" <?php if($cm->country == 'Oman')echo ' selected="selected" '; ?>>Oman</option>
<option value="Pakistan" <?php if($cm->country == 'Pakistan')echo ' selected="selected" '; ?>>Pakistan</option>
<option value="Palau Island" <?php if($cm->country == 'Palau Island')echo ' selected="selected" '; ?>>Palau Island</option>
<option value="Palestine" <?php if($cm->country == 'Palestine')echo ' selected="selected" '; ?>>Palestine</option>
<option value="Panama" <?php if($cm->country == 'Panama')echo ' selected="selected" '; ?>>Panama</option>
<option value="Papua New Guinea" <?php if($cm->country == 'Papua New Guinea')echo ' selected="selected" '; ?>>Papua New Guinea</option>
<option value="Paraguay" <?php if($cm->country == 'Paraguay')echo ' selected="selected" '; ?>>Paraguay</option>
<option value="Peru" <?php if($cm->country == 'Peru')echo ' selected="selected" '; ?>>Peru</option>
<option value="Phillipines" <?php if($cm->country == 'Phillipines')echo ' selected="selected" '; ?>>Philippines</option>
<option value="Pitcairn Island" <?php if($cm->country == 'Pitcairn Island')echo ' selected="selected" '; ?>>Pitcairn Island</option>
<option value="Poland" <?php if($cm->country == 'Poland')echo ' selected="selected" '; ?>>Poland</option>
<option value="Portugal" <?php if($cm->country == 'Portugal')echo ' selected="selected" '; ?>>Portugal</option>
<option value="Puerto Rico" <?php if($cm->country == 'Puerto Rico')echo ' selected="selected" '; ?>>Puerto Rico</option>
<option value="Qatar" <?php if($cm->country == 'Qatar')echo ' selected="selected" '; ?>>Qatar</option>
<option value="Republic of Montenegro" <?php if($cm->country == 'Republic of Montenegro')echo ' selected="selected" '; ?>>Republic of Montenegro</option>
<option value="Republic of Serbia" <?php if($cm->country == 'Republic of Serbia')echo ' selected="selected" '; ?>>Republic of Serbia</option>
<option value="Reunion" <?php if($cm->country == 'Reunion')echo ' selected="selected" '; ?>>Reunion</option>
<option value="Romania" <?php if($cm->country == 'Romania')echo ' selected="selected" '; ?>>Romania</option>
<option value="Russia" <?php if($cm->country == 'Russia')echo ' selected="selected" '; ?>>Russia</option>
<option value="Rwanda" <?php if($cm->country == 'Rwanda')echo ' selected="selected" '; ?>>Rwanda</option>
<option value="St Barthelemy" <?php if($cm->country == 'St Barthelemy')echo ' selected="selected" '; ?>>St Barthelemy</option>
<option value="St Eustatius" <?php if($cm->country == 'St Eustatius')echo ' selected="selected" '; ?>>St Eustatius</option>
<option value="St Helena" <?php if($cm->country == 'St Helena')echo ' selected="selected" '; ?>>St Helena</option>
<option value="St Kitts-Nevis" <?php if($cm->country == 'St Kitts-Nevis')echo ' selected="selected" '; ?>>St Kitts-Nevis</option>
<option value="St Lucia" <?php if($cm->country == 'St Lucia')echo ' selected="selected" '; ?>>St Lucia</option>
<option value="St Maarten" <?php if($cm->country == 'St Maarten')echo ' selected="selected" '; ?>>St Maarten</option>
<option value="St Pierre &amp; Miquelon" <?php if($cm->country == 'St Pierre &amp; Miquelon')echo ' selected="selected" '; ?>>St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines" <?php if($cm->country == 'St Vincent &amp; Grenadines')echo ' selected="selected" '; ?>>St Vincent &amp; Grenadines</option>
<option value="Saipan" <?php if($cm->country == 'Saipan')echo ' selected="selected" '; ?>>Saipan</option>
<option value="Samoa" <?php if($cm->country == 'Samoa')echo ' selected="selected" '; ?>>Samoa</option>
<option value="Samoa American" <?php if($cm->country == 'Samoa American')echo ' selected="selected" '; ?>>Samoa American</option>
<option value="San Marino" <?php if($cm->country == 'San Marino')echo ' selected="selected" '; ?>>San Marino</option>
<option value="Sao Tome &amp; Principe" <?php if($cm->country == 'Sao Tome &amp; Principe')echo ' selected="selected" '; ?>>Sao Tome &amp; Principe</option>
<option value="Saudi Arabia" <?php if($cm->country == 'Saudi Arabia')echo ' selected="selected" '; ?>>Saudi Arabia</option>
<option value="Senegal" <?php if($cm->country == 'Senegal')echo ' selected="selected" '; ?>>Senegal</option>
<option value="Serbia" <?php if($cm->country == 'Serbia')echo ' selected="selected" '; ?>>Serbia</option>
<option value="Seychelles" <?php if($cm->country == 'Seychelles')echo ' selected="selected" '; ?>>Seychelles</option>
<option value="Sierra Leone" <?php if($cm->country == 'Sierra Leone')echo ' selected="selected" '; ?>>Sierra Leone</option>
<option value="Singapore" <?php if($cm->country == 'Singapore')echo ' selected="selected" '; ?>>Singapore</option>
<option value="Slovakia" <?php if($cm->country == 'Slovakia')echo ' selected="selected" '; ?>>Slovakia</option>
<option value="Slovenia" <?php if($cm->country == 'Slovenia')echo ' selected="selected" '; ?>>Slovenia</option>
<option value="Solomon Islands" <?php if($cm->country == 'Solomon Islands')echo ' selected="selected" '; ?>>Solomon Islands</option>
<option value="Somalia" <?php if($cm->country == 'Somalia')echo ' selected="selected" '; ?>>Somalia</option>
<option value="South Africa" <?php if($cm->country == 'South Africa')echo ' selected="selected" '; ?>>South Africa</option>
<option value="Spain" <?php if($cm->country == 'Spain')echo ' selected="selected" '; ?>>Spain</option>
<option value="Sri Lanka" <?php if($cm->country == 'Sri Lanka')echo ' selected="selected" '; ?>>Sri Lanka</option>
<option value="Sudan" <?php if($cm->country == 'Sudan')echo ' selected="selected" '; ?>>Sudan</option>
<option value="Suriname" <?php if($cm->country == 'Suriname')echo ' selected="selected" '; ?>>Suriname</option>
<option value="Swaziland" <?php if($cm->country == 'Swaziland')echo ' selected="selected" '; ?>>Swaziland</option>
<option value="Sweden" <?php if($cm->country == 'Sweden')echo ' selected="selected" '; ?>>Sweden</option>
<option value="Switzerland" <?php if($cm->country == 'Switzerland')echo ' selected="selected" '; ?>>Switzerland</option>
<option value="Syria" <?php if($cm->country == 'Syria')echo ' selected="selected" '; ?>>Syria</option>
<option value="Tahiti" <?php if($cm->country == 'Tahiti')echo ' selected="selected" '; ?>>Tahiti</option>
<option value="Taiwan" <?php if($cm->country == 'Taiwan')echo ' selected="selected" '; ?>>Taiwan</option>
<option value="Tajikistan" <?php if($cm->country == 'Tajikistan')echo ' selected="selected" '; ?>>Tajikistan</option>
<option value="Tanzania" <?php if($cm->country == 'Tanzania')echo ' selected="selected" '; ?>>Tanzania</option>
<option value="Thailand" <?php if($cm->country == 'Thailand')echo ' selected="selected" '; ?>>Thailand</option>
<option value="Togo" <?php if($cm->country == 'Togo')echo ' selected="selected" '; ?>>Togo</option>
<option value="Tokelau" <?php if($cm->country == 'Tokelau')echo ' selected="selected" '; ?>>Tokelau</option>
<option value="Tonga" <?php if($cm->country == 'Tonga')echo ' selected="selected" '; ?>>Tonga</option>
<option value="Trinidad &amp; Tobago" <?php if($cm->country == 'Trinidad &amp; Tobago')echo ' selected="selected" '; ?>>Trinidad &amp; Tobago</option>
<option value="Tunisia" <?php if($cm->country == 'Tunisia')echo ' selected="selected" '; ?>>Tunisia</option>
<option value="Turkey" <?php if($cm->country == 'Turkey')echo ' selected="selected" '; ?>>Turkey</option>
<option value="Turkmenistan" <?php if($cm->country == 'Turkmenistan')echo ' selected="selected" '; ?>>Turkmenistan</option>
<option value="Turks &amp; Caicos Is" <?php if($cm->country == 'Turks &amp; Caicos Is')echo ' selected="selected" '; ?>>Turks &amp; Caicos Is</option>
<option value="Tuvalu" <?php if($cm->country == 'Tuvalu')echo ' selected="selected" '; ?>>Tuvalu</option>
<option value="Uganda" <?php if($cm->country == 'Uganda')echo ' selected="selected" '; ?>>Uganda</option>
<option value="Ukraine" <?php if($cm->country == 'Ukraine')echo ' selected="selected" '; ?>>Ukraine</option>
<option value="United Arab Emirates" <?php if($cm->country == 'United Arab Emirates')echo ' selected="selected" '; ?>>United Arab Emirates</option>
<option value="United Kingdom" <?php if($cm->country == 'United Kingdom')echo ' selected="selected" '; ?>>United Kingdom</option>
<option value="United States of America" <?php if($cm->country == 'United States of America')echo ' selected="selected" '; ?>>United States of America</option>
<option value="Uraguay" <?php if($cm->country == 'Uraguay')echo ' selected="selected" '; ?>>Uruguay</option>
<option value="Uzbekistan" <?php if($cm->country == 'Uzbekistan')echo ' selected="selected" '; ?>>Uzbekistan</option>
<option value="Vanuatu" <?php if($cm->country == 'Vanuatu')echo ' selected="selected" '; ?>>Vanuatu</option>
<option value="Vatican City State" <?php if($cm->country == 'Vatican City State')echo ' selected="selected" '; ?>>Vatican City State</option>
<option value="Venezuela" <?php if($cm->country == 'Venezuela')echo ' selected="selected" '; ?>>Venezuela</option>
<option value="Vietnam" <?php if($cm->country == 'Vietnam')echo ' selected="selected" '; ?>>Vietnam</option>
<option value="Virgin Islands (Brit)" <?php if($cm->country == 'Virgin Islands (Brit)')echo ' selected="selected" '; ?>>Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)" <?php if($cm->country == 'Virgin Islands (USA)')echo ' selected="selected" '; ?>>Virgin Islands (USA)</option>
<option value="Wake Island" <?php if($cm->country == 'Wake Island')echo ' selected="selected" '; ?>>Wake Island</option>
<option value="Wallis &amp; Futana Is" <?php if($cm->country == 'Wallis &amp; Futana Is')echo ' selected="selected" '; ?>>Wallis &amp; Futana Is</option>
<option value="Yemen" <?php if($cm->country == 'Yemen')echo ' selected="selected" '; ?>>Yemen</option>
<option value="Zaire" <?php if($cm->country == 'Zaire')echo ' selected="selected" '; ?>>Zaire</option>
<option value="Zambia" <?php if($cm->country == 'Zambia')echo ' selected="selected" '; ?>>Zambia</option>
<option value="Zimbabwe" <?php if($cm->country == 'Zimbabwe')echo ' selected="selected" '; ?>>Zimbabwe</option>
</select>	
  
                            
                        </div>
                    </div>
						
					<div class="form-group">
                        <label class="col-md-3 control-label" for="tele">Telephone</label>
                        <div class="col-md-9">
                            <input type="text" id="tele" name="tele" class="form-control" placeholder="Enter Telephone Number" 
							value="<?php echo $cm->tele; ?>" >
                            
                        </div>
                    </div>
					<!--
					<div class="form-group">
                        <label class="col-md-3 control-label" for="tele">Fax</label>
                        <div class="col-md-9">
                            <input type="fax" id="fax" name="fax" class="form-control" placeholder="Enter Fax Number" 
							value="<?php echo $cm->fax; ?>" >
                            
                        </div>
                    </div>
					-->
					
                    
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"> Save</button>
                             <button type="button" class="btn btn-sm btn-warning cancel" data-href="<?php echo site_url('committee_members/index'); ?>">Cancel</button>
                       
                        </div>
                    </div>
                </form>
                <!-- END Horizontal Form Content -->
            </div>
			
			
