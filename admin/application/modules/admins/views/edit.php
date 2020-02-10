<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="" data-original-title="Toggles .form-bordered class">No Borders</a>
                    </div>
                    <h2><strong>Edit Admin</strong> </h2>
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
                <form id="form-admin" action="<?php echo site_url('admins/edit/'.$admin->admin_id); ?>" method="post" class="form-horizontal form-bordered" >
                   
					
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="first_name">First Name</label>
                        <div class="col-md-9">
                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter First Name" 
							value="<?php echo $admin->first_name; ?>" required>
                            
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label" for="last_name">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter Last Name" 
							value="<?php echo $admin->last_name; ?>" required>
                            
                        </div>
                    </div>
					
				
					
							<div class="form-group">
                        <label class="col-md-3 control-label">Gender</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="gender1">
                                <input type="radio" id="gender1" name="gender" value="Male" <?php if($admin->gender == 'Male') echo 'checked'; ?>> Male
                            </label>
                            <label class="radio-inline" for="gender2">
                                <input type="radio" id="gender2" name="gender" value="Female" <?php if($admin->gender == 'Female') echo 'checked'; ?>> Female
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
                        <label class="col-md-3 control-label" for="tele">Telephone</label>
                        <div class="col-md-9">
                            					                       				
<select id="country" name="country" class="form-control input-lg" size="1">
<option value="">Please select country</option>           
<option value="Afganistan" <?php if($admin->country == 'Afganistan')echo ' selected="selected" '; ?>>Afghanistan</option>
<option value="Albania" <?php if($admin->country == 'Albania')echo ' selected="selected" '; ?>>Albania</option>
<option value="Algeria" <?php if($admin->country == 'Algeria')echo ' selected="selected" '; ?>>Algeria</option>
<option value="American Samoa" <?php if($admin->country == 'American Samoa')echo ' selected="selected" '; ?>>American Samoa</option>
<option value="Andorra" <?php if($admin->country == 'Andorra')echo ' selected="selected" '; ?>>Andorra</option>
<option value="Angola" <?php if($admin->country == 'Angola')echo ' selected="selected" '; ?>>Angola</option>
<option value="Anguilla" <?php if($admin->country == 'Anguilla')echo ' selected="selected" '; ?>>Anguilla</option>
<option value="Antigua &amp; Barbuda" <?php if($admin->country == 'Antigua &amp; Barbuda')echo ' selected="selected" '; ?>>Antigua &amp; Barbuda</option>
<option value="Argentina" <?php if($admin->country == 'Argentina')echo ' selected="selected" '; ?>>Argentina</option>
<option value="Armenia" <?php if($admin->country == 'Armenia')echo ' selected="selected" '; ?>>Armenia</option>
<option value="Aruba" <?php if($admin->country == 'Aruba')echo ' selected="selected" '; ?>>Aruba</option>
<option value="Australia" <?php if($admin->country == 'Australia')echo ' selected="selected" '; ?>>Australia</option>
<option value="Austria" <?php if($admin->country == 'Austria')echo ' selected="selected" '; ?>>Austria</option>
<option value="Azerbaijan" <?php if($admin->country == 'Azerbaijan')echo ' selected="selected" '; ?>>Azerbaijan</option>
<option value="Bahamas" <?php if($admin->country == 'Bahamas')echo ' selected="selected" '; ?>>Bahamas</option>
<option value="Bahrain" <?php if($admin->country == 'Bahrain')echo ' selected="selected" '; ?>>Bahrain</option>
<option value="Bangladesh" <?php if($admin->country == 'Bangladesh')echo ' selected="selected" '; ?>>Bangladesh</option>
<option value="Barbados" <?php if($admin->country == 'Barbados')echo ' selected="selected" '; ?>>Barbados</option>
<option value="Belarus" <?php if($admin->country == 'Belarus')echo ' selected="selected" '; ?>>Belarus</option>
<option value="Belgium" <?php if($admin->country == 'Belgium')echo ' selected="selected" '; ?>>Belgium</option>
<option value="Belize" <?php if($admin->country == 'Belize')echo ' selected="selected" '; ?>>Belize</option>
<option value="Benin" <?php if($admin->country == 'Benin')echo ' selected="selected" '; ?>>Benin</option>
<option value="Bermuda" <?php if($admin->country == 'Bermuda')echo ' selected="selected" '; ?>>Bermuda</option>
<option value="Bhutan" <?php if($admin->country == 'Bhutan')echo ' selected="selected" '; ?>>Bhutan</option>
<option value="Bolivia" <?php if($admin->country == 'Bolivia')echo ' selected="selected" '; ?>>Bolivia</option>
<option value="Bonaire" <?php if($admin->country == 'Bonaire')echo ' selected="selected" '; ?>>Bonaire</option>
<option value="Bosnia &amp; Herzegovina" <?php if($admin->country == 'Bosnia &amp; Herzegovina')echo ' selected="selected" '; ?>>Bosnia &amp; Herzegovina</option>
<option value="Botswana" <?php if($admin->country == 'Botswana')echo ' selected="selected" '; ?>>Botswana</option>
<option value="Brazil" <?php if($admin->country == 'Brazil')echo ' selected="selected" '; ?>>Brazil</option>
<option value="British Indian Ocean Ter" <?php if($admin->country == 'British Indian Ocean Ter')echo ' selected="selected" '; ?>>British Indian Ocean Ter</option>
<option value="Brunei" <?php if($admin->country == 'Brunei')echo ' selected="selected" '; ?>>Brunei</option>
<option value="Bulgaria" <?php if($admin->country == 'Bulgaria')echo ' selected="selected" '; ?>>Bulgaria</option>
<option value="Burkina Faso" <?php if($admin->country == 'Burkina Faso')echo ' selected="selected" '; ?>>Burkina Faso</option>
<option value="Burundi" <?php if($admin->country == 'Burundi')echo ' selected="selected" '; ?>>Burundi</option>
<option value="Cambodia" <?php if($admin->country == 'Cambodia')echo ' selected="selected" '; ?>>Cambodia</option>
<option value="Cameroon" <?php if($admin->country == 'Cameroon')echo ' selected="selected" '; ?>>Cameroon</option>
<option value="Canada" <?php if($admin->country == 'Canada')echo ' selected="selected" '; ?>>Canada</option>
<option value="Canary Islands" <?php if($admin->country == 'Canary Islands')echo ' selected="selected" '; ?>>Canary Islands</option>
<option value="Cape Verde" <?php if($admin->country == 'Cape Verde')echo ' selected="selected" '; ?>>Cape Verde</option>
<option value="Cayman Islands" <?php if($admin->country == 'Cayman Islands')echo ' selected="selected" '; ?>>Cayman Islands</option>
<option value="Central African Republic" <?php if($admin->country == 'Central African Republic')echo ' selected="selected" '; ?>>Central African Republic</option>
<option value="Chad" <?php if($admin->country == 'Chad')echo ' selected="selected" '; ?>>Chad</option>
<option value="Channel Islands" <?php if($admin->country == 'Channel Islands')echo ' selected="selected" '; ?>>Channel Islands</option>
<option value="Chile" <?php if($admin->country == 'Chile')echo ' selected="selected" '; ?>>Chile</option>
<option value="China" <?php if($admin->country == 'China')echo ' selected="selected" '; ?>>China</option>
<option value="Christmas Island" <?php if($admin->country == 'Christmas Island')echo ' selected="selected" '; ?>>Christmas Island</option>
<option value="Cocos Island" <?php if($admin->country == 'Cocos Island')echo ' selected="selected" '; ?>>Cocos Island</option>
<option value="Colombia" <?php if($admin->country == 'Colombia')echo ' selected="selected" '; ?>>Colombia</option>
<option value="Comoros" <?php if($admin->country == 'Comoros')echo ' selected="selected" '; ?>>Comoros</option>
<option value="Congo" <?php if($admin->country == 'Congo')echo ' selected="selected" '; ?>>Congo</option>
<option value="Cook Islands" <?php if($admin->country == 'Cook Islands')echo ' selected="selected" '; ?>>Cook Islands</option>
<option value="Costa Rica" <?php if($admin->country == 'Costa Rica')echo ' selected="selected" '; ?>>Costa Rica</option>
<option value="Cote DIvoire" <?php if($admin->country == 'Cote DIvoire')echo ' selected="selected" '; ?>>Cote D'Ivoire</option>
<option value="Croatia" <?php if($admin->country == 'Croatia')echo ' selected="selected" '; ?>>Croatia</option>
<option value="Cuba" <?php if($admin->country == 'Cuba')echo ' selected="selected" '; ?>>Cuba</option>
<option value="Curaco" <?php if($admin->country == 'Curaco')echo ' selected="selected" '; ?>>Curacao</option>
<option value="Cyprus" <?php if($admin->country == 'Cyprus')echo ' selected="selected" '; ?>>Cyprus</option>
<option value="Czech Republic" <?php if($admin->country == 'Czech Republic')echo ' selected="selected" '; ?>>Czech Republic</option>
<option value="Denmark" <?php if($admin->country == 'Denmark')echo ' selected="selected" '; ?>>Denmark</option>
<option value="Djibouti" <?php if($admin->country == 'Djibouti')echo ' selected="selected" '; ?>>Djibouti</option>
<option value="Dominica" <?php if($admin->country == 'Dominica')echo ' selected="selected" '; ?>>Dominica</option>
<option value="Dominican Republic" <?php if($admin->country == 'Dominican Republic')echo ' selected="selected" '; ?>>Dominican Republic</option>
<option value="East Timor" <?php if($admin->country == 'East Timor')echo ' selected="selected" '; ?>>East Timor</option>
<option value="Ecuador" <?php if($admin->country == 'Ecuador')echo ' selected="selected" '; ?>>Ecuador</option>
<option value="Egypt" <?php if($admin->country == 'Egypt')echo ' selected="selected" '; ?>>Egypt</option>
<option value="El Salvador" <?php if($admin->country == 'El Salvador')echo ' selected="selected" '; ?>>El Salvador</option>
<option value="Equatorial Guinea" <?php if($admin->country == 'Equatorial Guinea')echo ' selected="selected" '; ?>>Equatorial Guinea</option>
<option value="Eritrea" <?php if($admin->country == 'Eritrea')echo ' selected="selected" '; ?>>Eritrea</option>
<option value="Estonia" <?php if($admin->country == 'Estonia')echo ' selected="selected" '; ?>>Estonia</option>
<option value="Ethiopia" <?php if($admin->country == 'Ethiopia')echo ' selected="selected" '; ?>>Ethiopia</option>
<option value="Falkland Islands" <?php if($admin->country == 'Falkland Islands')echo ' selected="selected" '; ?>>Falkland Islands</option>
<option value="Faroe Islands" <?php if($admin->country == 'Faroe Islands')echo ' selected="selected" '; ?>>Faroe Islands</option>
<option value="Fiji" <?php if($admin->country == 'Fiji')echo ' selected="selected" '; ?>>Fiji</option>
<option value="Finland" <?php if($admin->country == 'Finland')echo ' selected="selected" '; ?>>Finland</option>
<option value="France" <?php if($admin->country == 'France')echo ' selected="selected" '; ?>>France</option>
<option value="French Guiana" <?php if($admin->country == 'French Guiana')echo ' selected="selected" '; ?>>French Guiana</option>
<option value="French Polynesia" <?php if($admin->country == 'French Polynesia')echo ' selected="selected" '; ?>>French Polynesia</option>
<option value="French Southern Ter" <?php if($admin->country == 'French Southern Ter')echo ' selected="selected" '; ?>>French Southern Ter</option>
<option value="Gabon" <?php if($admin->country == 'Gabon')echo ' selected="selected" '; ?>>Gabon</option>
<option value="Gambia" <?php if($admin->country == 'Gambia')echo ' selected="selected" '; ?>>Gambia</option>
<option value="Georgia" <?php if($admin->country == 'Georgia')echo ' selected="selected" '; ?>>Georgia</option>
<option value="Germany" <?php if($admin->country == 'Germany')echo ' selected="selected" '; ?>>Germany</option>
<option value="Ghana" <?php if($admin->country == 'Ghana')echo ' selected="selected" '; ?>>Ghana</option>
<option value="Gibraltar" <?php if($admin->country == 'Gibraltar')echo ' selected="selected" '; ?>>Gibraltar</option>
<option value="Great Britain" <?php if($admin->country == 'Great Britain')echo ' selected="selected" '; ?>>Great Britain</option>
<option value="Greece" <?php if($admin->country == 'Greece')echo ' selected="selected" '; ?>>Greece</option>
<option value="Greenland" <?php if($admin->country == 'Greenland')echo ' selected="selected" '; ?>>Greenland</option>
<option value="Grenada" <?php if($admin->country == 'Grenada')echo ' selected="selected" '; ?>>Grenada</option>
<option value="Guadeloupe" <?php if($admin->country == 'Guadeloupe')echo ' selected="selected" '; ?>>Guadeloupe</option>
<option value="Guam" <?php if($admin->country == 'Guam')echo ' selected="selected" '; ?>>Guam</option>
<option value="Guatemala" <?php if($admin->country == 'Guatemala')echo ' selected="selected" '; ?>>Guatemala</option>
<option value="Guinea" <?php if($admin->country == 'Guinea')echo ' selected="selected" '; ?>>Guinea</option>
<option value="Guyana" <?php if($admin->country == 'Guyana')echo ' selected="selected" '; ?>>Guyana</option>
<option value="Haiti" <?php if($admin->country == 'Haiti')echo ' selected="selected" '; ?>>Haiti</option>
<option value="Hawaii" <?php if($admin->country == 'Hawaii')echo ' selected="selected" '; ?>>Hawaii</option>
<option value="Honduras" <?php if($admin->country == 'Honduras')echo ' selected="selected" '; ?>>Honduras</option>
<option value="Hong Kong" <?php if($admin->country == 'Hong Kong')echo ' selected="selected" '; ?>>Hong Kong</option>
<option value="Hungary" <?php if($admin->country == 'Hungary')echo ' selected="selected" '; ?>>Hungary</option>
<option value="Iceland" <?php if($admin->country == 'Iceland')echo ' selected="selected" '; ?>>Iceland</option>
<option value="India" <?php if($admin->country == 'India')echo ' selected="selected" '; ?>>India</option>
<option value="Indonesia" <?php if($admin->country == 'Indonesia')echo ' selected="selected" '; ?>>Indonesia</option>
<option value="Iran" <?php if($admin->country == 'Iran')echo ' selected="selected" '; ?>>Iran</option>
<option value="Iraq" <?php if($admin->country == 'Iraq')echo ' selected="selected" '; ?>>Iraq</option>
<option value="Ireland" <?php if($admin->country == 'Ireland')echo ' selected="selected" '; ?>>Ireland</option>
<option value="Isle of Man" <?php if($admin->country == 'Isle of Man')echo ' selected="selected" '; ?>>Isle of Man</option>
<option value="Israel" <?php if($admin->country == 'Israel')echo ' selected="selected" '; ?>>Israel</option>
<option value="Italy" <?php if($admin->country == 'Italy')echo ' selected="selected" '; ?>>Italy</option>
<option value="Jamaica" <?php if($admin->country == 'Jamaica')echo ' selected="selected" '; ?>>Jamaica</option>
<option value="Japan" <?php if($admin->country == 'Japan')echo ' selected="selected" '; ?>>Japan</option>
<option value="Jordan" <?php if($admin->country == 'Jordan')echo ' selected="selected" '; ?>>Jordan</option>
<option value="Kazakhstan" <?php if($admin->country == 'Kazakhstan')echo ' selected="selected" '; ?>>Kazakhstan</option>
<option value="Kenya" <?php if($admin->country == 'Kenya')echo ' selected="selected" '; ?>>Kenya</option>
<option value="Kiribati" <?php if($admin->country == 'Kiribati')echo ' selected="selected" '; ?>>Kiribati</option>
<option value="Korea North" <?php if($admin->country == 'Korea North')echo ' selected="selected" '; ?>>Korea North</option>
<option value="Korea Sout" <?php if($admin->country == 'Korea Sout')echo ' selected="selected" '; ?>>Korea South</option>
<option value="Kuwait" <?php if($admin->country == 'Kuwait')echo ' selected="selected" '; ?>>Kuwait</option>
<option value="Kyrgyzstan" <?php if($admin->country == 'Kyrgyzstan')echo ' selected="selected" '; ?>>Kyrgyzstan</option>
<option value="Laos" <?php if($admin->country == 'Laos')echo ' selected="selected" '; ?>>Laos</option>
<option value="Latvia" <?php if($admin->country == 'Latvia')echo ' selected="selected" '; ?>>Latvia</option>
<option value="Lebanon" <?php if($admin->country == 'Lebanon')echo ' selected="selected" '; ?>>Lebanon</option>
<option value="Lesotho" <?php if($admin->country == 'Lesotho')echo ' selected="selected" '; ?>>Lesotho</option>
<option value="Liberia" <?php if($admin->country == 'Liberia')echo ' selected="selected" '; ?>>Liberia</option>
<option value="Libya" <?php if($admin->country == 'Libya')echo ' selected="selected" '; ?>>Libya</option>
<option value="Liechtenstein" <?php if($admin->country == 'Liechtenstein')echo ' selected="selected" '; ?>>Liechtenstein</option>
<option value="Lithuania" <?php if($admin->country == 'Lithuania')echo ' selected="selected" '; ?>>Lithuania</option>
<option value="Luxembourg" <?php if($admin->country == 'Luxembourg')echo ' selected="selected" '; ?>>Luxembourg</option>
<option value="Macau" <?php if($admin->country == 'Macau')echo ' selected="selected" '; ?>>Macau</option>
<option value="Macedonia" <?php if($admin->country == 'Macedonia')echo ' selected="selected" '; ?>>Macedonia</option>
<option value="Madagascar" <?php if($admin->country == 'Madagascar')echo ' selected="selected" '; ?>>Madagascar</option>
<option value="Malaysia" <?php if($admin->country == 'Malaysia')echo ' selected="selected" '; ?>>Malaysia</option>
<option value="Malawi" <?php if($admin->country == 'Malawi')echo ' selected="selected" '; ?>>Malawi</option>
<option value="Maldives" <?php if($admin->country == 'Maldives')echo ' selected="selected" '; ?>>Maldives</option>
<option value="Mali" <?php if($admin->country == 'Mali')echo ' selected="selected" '; ?>>Mali</option>
<option value="Malta" <?php if($admin->country == 'Malta')echo ' selected="selected" '; ?>>Malta</option>
<option value="Marshall Islands" <?php if($admin->country == 'Marshall Islands')echo ' selected="selected" '; ?>>Marshall Islands</option>
<option value="Martinique" <?php if($admin->country == 'Martinique')echo ' selected="selected" '; ?>>Martinique</option>
<option value="Mauritania" <?php if($admin->country == 'Mauritania')echo ' selected="selected" '; ?>>Mauritania</option>
<option value="Mauritius" <?php if($admin->country == 'Mauritius')echo ' selected="selected" '; ?>>Mauritius</option>
<option value="Mayotte" <?php if($admin->country == 'Mayotte')echo ' selected="selected" '; ?>>Mayotte</option>
<option value="Mexico" <?php if($admin->country == 'Mexico')echo ' selected="selected" '; ?>>Mexico</option>
<option value="Midway Islands" <?php if($admin->country == 'Midway Islands')echo ' selected="selected" '; ?>>Midway Islands</option>
<option value="Moldova" <?php if($admin->country == 'Moldova')echo ' selected="selected" '; ?>>Moldova</option>
<option value="Monaco" <?php if($admin->country == 'Monaco')echo ' selected="selected" '; ?>>Monaco</option>
<option value="Mongolia" <?php if($admin->country == 'Mongolia')echo ' selected="selected" '; ?>>Mongolia</option>
<option value="Montserrat" <?php if($admin->country == 'Montserrat')echo ' selected="selected" '; ?>>Montserrat</option>
<option value="Morocco" <?php if($admin->country == 'Morocco')echo ' selected="selected" '; ?>>Morocco</option>
<option value="Mozambique" <?php if($admin->country == 'Mozambique')echo ' selected="selected" '; ?>>Mozambique</option>
<option value="Myanmar" <?php if($admin->country == 'Myanmar')echo ' selected="selected" '; ?>>Myanmar</option>
<option value="Nambia" <?php if($admin->country == 'Nambia')echo ' selected="selected" '; ?>>Nambia</option>
<option value="Nauru" <?php if($admin->country == 'Nauru')echo ' selected="selected" '; ?>>Nauru</option>
<option value="Nepal" <?php if($admin->country == 'Nepal')echo ' selected="selected" '; ?>>Nepal</option>
<option value="Netherland Antilles" <?php if($admin->country == 'Netherland Antilles')echo ' selected="selected" '; ?>>Netherland Antilles</option>
<option value="Netherlands" <?php if($admin->country == 'Netherlands')echo ' selected="selected" '; ?>>Netherlands (Holland, Europe)</option>
<option value="Nevis" <?php if($admin->country == 'Nevis')echo ' selected="selected" '; ?>>Nevis</option>
<option value="New Caledonia" <?php if($admin->country == 'New Caledonia')echo ' selected="selected" '; ?>>New Caledonia</option>
<option value="New Zealand" <?php if($admin->country == 'New Zealand')echo ' selected="selected" '; ?>>New Zealand</option>
<option value="Nicaragua" <?php if($admin->country == 'Nicaragua')echo ' selected="selected" '; ?>>Nicaragua</option>
<option value="Niger" <?php if($admin->country == 'Niger')echo ' selected="selected" '; ?>>Niger</option>
<option value="Nigeria" <?php if($admin->country == 'Nigeria')echo ' selected="selected" '; ?>>Nigeria</option>
<option value="Niue" <?php if($admin->country == 'Niue')echo ' selected="selected" '; ?>>Niue</option>
<option value="Norfolk Island" <?php if($admin->country == 'Norfolk Island')echo ' selected="selected" '; ?>>Norfolk Island</option>
<option value="Norway" <?php if($admin->country == 'Norway')echo ' selected="selected" '; ?>>Norway</option>
<option value="Oman" <?php if($admin->country == 'Oman')echo ' selected="selected" '; ?>>Oman</option>
<option value="Pakistan" <?php if($admin->country == 'Pakistan')echo ' selected="selected" '; ?>>Pakistan</option>
<option value="Palau Island" <?php if($admin->country == 'Palau Island')echo ' selected="selected" '; ?>>Palau Island</option>
<option value="Palestine" <?php if($admin->country == 'Palestine')echo ' selected="selected" '; ?>>Palestine</option>
<option value="Panama" <?php if($admin->country == 'Panama')echo ' selected="selected" '; ?>>Panama</option>
<option value="Papua New Guinea" <?php if($admin->country == 'Papua New Guinea')echo ' selected="selected" '; ?>>Papua New Guinea</option>
<option value="Paraguay" <?php if($admin->country == 'Paraguay')echo ' selected="selected" '; ?>>Paraguay</option>
<option value="Peru" <?php if($admin->country == 'Peru')echo ' selected="selected" '; ?>>Peru</option>
<option value="Phillipines" <?php if($admin->country == 'Phillipines')echo ' selected="selected" '; ?>>Philippines</option>
<option value="Pitcairn Island" <?php if($admin->country == 'Pitcairn Island')echo ' selected="selected" '; ?>>Pitcairn Island</option>
<option value="Poland" <?php if($admin->country == 'Poland')echo ' selected="selected" '; ?>>Poland</option>
<option value="Portugal" <?php if($admin->country == 'Portugal')echo ' selected="selected" '; ?>>Portugal</option>
<option value="Puerto Rico" <?php if($admin->country == 'Puerto Rico')echo ' selected="selected" '; ?>>Puerto Rico</option>
<option value="Qatar" <?php if($admin->country == 'Qatar')echo ' selected="selected" '; ?>>Qatar</option>
<option value="Republic of Montenegro" <?php if($admin->country == 'Republic of Montenegro')echo ' selected="selected" '; ?>>Republic of Montenegro</option>
<option value="Republic of Serbia" <?php if($admin->country == 'Republic of Serbia')echo ' selected="selected" '; ?>>Republic of Serbia</option>
<option value="Reunion" <?php if($admin->country == 'Reunion')echo ' selected="selected" '; ?>>Reunion</option>
<option value="Romania" <?php if($admin->country == 'Romania')echo ' selected="selected" '; ?>>Romania</option>
<option value="Russia" <?php if($admin->country == 'Russia')echo ' selected="selected" '; ?>>Russia</option>
<option value="Rwanda" <?php if($admin->country == 'Rwanda')echo ' selected="selected" '; ?>>Rwanda</option>
<option value="St Barthelemy" <?php if($admin->country == 'St Barthelemy')echo ' selected="selected" '; ?>>St Barthelemy</option>
<option value="St Eustatius" <?php if($admin->country == 'St Eustatius')echo ' selected="selected" '; ?>>St Eustatius</option>
<option value="St Helena" <?php if($admin->country == 'St Helena')echo ' selected="selected" '; ?>>St Helena</option>
<option value="St Kitts-Nevis" <?php if($admin->country == 'St Kitts-Nevis')echo ' selected="selected" '; ?>>St Kitts-Nevis</option>
<option value="St Lucia" <?php if($admin->country == 'St Lucia')echo ' selected="selected" '; ?>>St Lucia</option>
<option value="St Maarten" <?php if($admin->country == 'St Maarten')echo ' selected="selected" '; ?>>St Maarten</option>
<option value="St Pierre &amp; Miquelon" <?php if($admin->country == 'St Pierre &amp; Miquelon')echo ' selected="selected" '; ?>>St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines" <?php if($admin->country == 'St Vincent &amp; Grenadines')echo ' selected="selected" '; ?>>St Vincent &amp; Grenadines</option>
<option value="Saipan" <?php if($admin->country == 'Saipan')echo ' selected="selected" '; ?>>Saipan</option>
<option value="Samoa" <?php if($admin->country == 'Samoa')echo ' selected="selected" '; ?>>Samoa</option>
<option value="Samoa American" <?php if($admin->country == 'Samoa American')echo ' selected="selected" '; ?>>Samoa American</option>
<option value="San Marino" <?php if($admin->country == 'San Marino')echo ' selected="selected" '; ?>>San Marino</option>
<option value="Sao Tome &amp; Principe" <?php if($admin->country == 'Sao Tome &amp; Principe')echo ' selected="selected" '; ?>>Sao Tome &amp; Principe</option>
<option value="Saudi Arabia" <?php if($admin->country == 'Saudi Arabia')echo ' selected="selected" '; ?>>Saudi Arabia</option>
<option value="Senegal" <?php if($admin->country == 'Senegal')echo ' selected="selected" '; ?>>Senegal</option>
<option value="Serbia" <?php if($admin->country == 'Serbia')echo ' selected="selected" '; ?>>Serbia</option>
<option value="Seychelles" <?php if($admin->country == 'Seychelles')echo ' selected="selected" '; ?>>Seychelles</option>
<option value="Sierra Leone" <?php if($admin->country == 'Sierra Leone')echo ' selected="selected" '; ?>>Sierra Leone</option>
<option value="Singapore" <?php if($admin->country == 'Singapore')echo ' selected="selected" '; ?>>Singapore</option>
<option value="Slovakia" <?php if($admin->country == 'Slovakia')echo ' selected="selected" '; ?>>Slovakia</option>
<option value="Slovenia" <?php if($admin->country == 'Slovenia')echo ' selected="selected" '; ?>>Slovenia</option>
<option value="Solomon Islands" <?php if($admin->country == 'Solomon Islands')echo ' selected="selected" '; ?>>Solomon Islands</option>
<option value="Somalia" <?php if($admin->country == 'Somalia')echo ' selected="selected" '; ?>>Somalia</option>
<option value="South Africa" <?php if($admin->country == 'South Africa')echo ' selected="selected" '; ?>>South Africa</option>
<option value="Spain" <?php if($admin->country == 'Spain')echo ' selected="selected" '; ?>>Spain</option>
<option value="Sri Lanka" <?php if($admin->country == 'Sri Lanka')echo ' selected="selected" '; ?>>Sri Lanka</option>
<option value="Sudan" <?php if($admin->country == 'Sudan')echo ' selected="selected" '; ?>>Sudan</option>
<option value="Suriname" <?php if($admin->country == 'Suriname')echo ' selected="selected" '; ?>>Suriname</option>
<option value="Swaziland" <?php if($admin->country == 'Swaziland')echo ' selected="selected" '; ?>>Swaziland</option>
<option value="Sweden" <?php if($admin->country == 'Sweden')echo ' selected="selected" '; ?>>Sweden</option>
<option value="Switzerland" <?php if($admin->country == 'Switzerland')echo ' selected="selected" '; ?>>Switzerland</option>
<option value="Syria" <?php if($admin->country == 'Syria')echo ' selected="selected" '; ?>>Syria</option>
<option value="Tahiti" <?php if($admin->country == 'Tahiti')echo ' selected="selected" '; ?>>Tahiti</option>
<option value="Taiwan" <?php if($admin->country == 'Taiwan')echo ' selected="selected" '; ?>>Taiwan</option>
<option value="Tajikistan" <?php if($admin->country == 'Tajikistan')echo ' selected="selected" '; ?>>Tajikistan</option>
<option value="Tanzania" <?php if($admin->country == 'Tanzania')echo ' selected="selected" '; ?>>Tanzania</option>
<option value="Tanzania" <?php if($admin->country == 'Tanzania')echo ' selected="selected" '; ?>>Thailand</option>
<option value="Togo" <?php if($admin->country == 'Togo')echo ' selected="selected" '; ?>>Togo</option>
<option value="Tokelau" <?php if($admin->country == 'Tokelau')echo ' selected="selected" '; ?>>Tokelau</option>
<option value="Tonga" <?php if($admin->country == 'Tonga')echo ' selected="selected" '; ?>>Tonga</option>
<option value="Trinidad &amp; Tobago" <?php if($admin->country == 'Trinidad &amp; Tobago')echo ' selected="selected" '; ?>>Trinidad &amp; Tobago</option>
<option value="Tunisia" <?php if($admin->country == 'Tunisia')echo ' selected="selected" '; ?>>Tunisia</option>
<option value="Turkey" <?php if($admin->country == 'Turkey')echo ' selected="selected" '; ?>>Turkey</option>
<option value="Turkmenistan" <?php if($admin->country == 'Turkmenistan')echo ' selected="selected" '; ?>>Turkmenistan</option>
<option value="Turks &amp; Caicos Is" <?php if($admin->country == 'Turks &amp; Caicos Is')echo ' selected="selected" '; ?>>Turks &amp; Caicos Is</option>
<option value="Tuvalu" <?php if($admin->country == 'Tuvalu')echo ' selected="selected" '; ?>>Tuvalu</option>
<option value="Uganda" <?php if($admin->country == 'Uganda')echo ' selected="selected" '; ?>>Uganda</option>
<option value="Ukraine" <?php if($admin->country == 'Ukraine')echo ' selected="selected" '; ?>>Ukraine</option>
<option value="United Arab Emirates" <?php if($admin->country == 'United Arab Emirates')echo ' selected="selected" '; ?>>United Arab Emirates</option>
<option value="United Kingdom" <?php if($admin->country == 'United Kingdom')echo ' selected="selected" '; ?>>United Kingdom</option>
<option value="United States of America" <?php if($admin->country == 'United States of America')echo ' selected="selected" '; ?>>United States of America</option>
<option value="Uraguay" <?php if($admin->country == 'Uraguay')echo ' selected="selected" '; ?>>Uruguay</option>
<option value="Uzbekistan" <?php if($admin->country == 'Uzbekistan')echo ' selected="selected" '; ?>>Uzbekistan</option>
<option value="Vanuatu" <?php if($admin->country == 'Vanuatu')echo ' selected="selected" '; ?>>Vanuatu</option>
<option value="Vatican City State" <?php if($admin->country == 'Vatican City State')echo ' selected="selected" '; ?>>Vatican City State</option>
<option value="Venezuela" <?php if($admin->country == 'Venezuela')echo ' selected="selected" '; ?>>Venezuela</option>
<option value="Vietnam" <?php if($admin->country == 'Vietnam')echo ' selected="selected" '; ?>>Vietnam</option>
<option value="Virgin Islands (Brit)" <?php if($admin->country == 'Virgin Islands (Brit)')echo ' selected="selected" '; ?>>Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)" <?php if($admin->country == 'Virgin Islands (USA)')echo ' selected="selected" '; ?>>Virgin Islands (USA)</option>
<option value="Wake Island" <?php if($admin->country == 'Wake Island')echo ' selected="selected" '; ?>>Wake Island</option>
<option value="Wallis &amp; Futana Is" <?php if($admin->country == 'Wallis &amp; Futana Is')echo ' selected="selected" '; ?>>Wallis &amp; Futana Is</option>
<option value="Yemen" <?php if($admin->country == 'Yemen')echo ' selected="selected" '; ?>>Yemen</option>
<option value="Zaire" <?php if($admin->country == 'Zaire')echo ' selected="selected" '; ?>>Zaire</option>
<option value="Zambia" <?php if($admin->country == 'Zambia')echo ' selected="selected" '; ?>>Zambia</option>
<option value="Zimbabwe" <?php if($admin->country == 'Zimbabwe')echo ' selected="selected" '; ?>>Zimbabwe</option>
</select>	
  
                            
                        </div>
                    </div>
						
					<div class="form-group">
                        <label class="col-md-3 control-label" for="tele">Telephone</label>
                        <div class="col-md-9">
                            <input type="text" id="tele" name="tele" class="form-control" placeholder="Enter Telephone Number" 
							value="<?php echo $admin->tele; ?>" >
                            
                        </div>
                    </div>
					
						<div class="form-group">
                        <label class="col-md-3 control-label" for="country">Role</label>
                        <div class="col-md-9">
                           						
<label class="radio-inline" for="admin_role1">
                                <input type="radio" id="admin_role1" name="admin_role" value="2"  <?php if($admin->admin_role == 2)echo ' checked="checked" '; ?> />Admin
                            </label>
                            <label class="radio-inline" for="admin_role2">
                                <input type="radio" id="admin_role2" name="admin_role" value="1"   <?php if($admin->admin_role == 1)echo ' checked="checked" '; ?> /> Super Admin
                                </label>
    </div>
    </div>
                    
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"> Save</button>
                           <button type="button" class="btn btn-sm btn-warning cancel" data-href="<?php echo site_url('admins/index'); ?>">Cancel</button>
                       
                        </div>
                    </div>
                </form>
                <!-- END Horizontal Form Content -->
            </div>
			
			
