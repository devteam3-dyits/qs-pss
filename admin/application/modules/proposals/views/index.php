<div class="block full">
    <div class="block-title">
        <h2><strong>Proposals</strong></h2>
    </div>


    <?php if ($this->session->flashdata('alert_success')) { ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $this->session->flashdata('alert_success'); ?>

        </div>
    <?php } elseif ($this->session->flashdata('alert_error')) { ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $this->session->flashdata('alert_error'); ?>

        </div>
    <?php } elseif (isset($error)) { ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <div class="row" style="padding-bottom:20px;">
        <div class="col-md-12">
            <h5><strong>Filter by date</strong></h5>
            <form method="post" action="" id="filter_date_form" class="form-inline">
                <div class="form-group">
                    <label for="from_date">From : </label>
                    <input type="text" id="from_date" name="from_date" class="form-control input-datepicker" 
                        data-date-format="mm/dd/yyyy" value="<?php if ($from_date != '') echo $from_date;
                                                            else echo date('m/d/Y'); ?>" style="margin-right:10px">
                    <label for="from_date">To : </label>
                    <input type="text" id="to_date" name="to_date" class="form-control input-datepicker" 
                        data-date-format="mm/dd/yyyy" value="<?php if ($to_date != '') echo $to_date;
                                                                else echo date('m/d/Y'); ?>">
                    <button type="button" class="btn btn-primary pt-1" id="filter_date_butt">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row" style="padding-bottom:20px">

        <div class="col-md-2">
            <h5><strong>Filter by Event</strong></h5>
            <form method="post" action="" id="filter_form">
                <div class="form-group">
                    <label for="from_date">Select an event : </label>
                    <select id="filter_event_id" name="event_id" class="form-control">
                        <option value="" <?php if ($event_id == "") echo ' selected = "selected" '; ?>>All Events</option>
                        <?php if (sizeof($events) > 0) {
                            foreach ($events as $event) {
                                if ($event_id == $event->event_id) $selected = ' selected = "selected" ';
                                else $selected = '';
                                echo '<option value="' . $event->event_id . '" ' . $selected . '>' . $event->event_name . '</option>';
                            }
                        }

                        ?>
                    </select>
                </div>
            </form>
        </div>

        <div class="col-md-2">
            <h5><strong>Filter by Country</strong></h5>
            <form method="post" action="" id="filter_country_form">
                <div class="form-group">
                    <label for="from_date">Select a country : </label>
                    <select id="filter_country" name="filter_country" class="form-control" size="1">
                        <option value="">Please select country</option>
                        <option value="Afganistan" <?php if (trim($select_country) == 'Afganistan') echo ' selected="selected" '; ?>>Afghanistan</option>
                        <option value="Albania" <?php if (trim($select_country) == 'Albania') echo ' selected="selected" '; ?>>Albania</option>
                        <option value="Algeria" <?php if (trim($select_country) == 'Algeria') echo ' selected="selected" '; ?>>Algeria</option>
                        <option value="American Samoa" <?php if (trim($select_country) == 'American Samoa') echo ' selected="selected" '; ?>>American Samoa</option>
                        <option value="Andorra" <?php if (trim($select_country) == 'Andorra') echo ' selected="selected" '; ?>>Andorra</option>
                        <option value="Angola" <?php if (trim($select_country) == 'Angola') echo ' selected="selected" '; ?>>Angola</option>
                        <option value="Anguilla" <?php if (trim($select_country) == 'Anguilla') echo ' selected="selected" '; ?>>Anguilla</option>
                        <option value="Antigua & Barbuda" <?php if (trim($select_country) == "Antigua & Barbuda") echo ' selected="selected" '; ?>>Antigua & Barbuda</option>
                        <option value="Argentina" <?php if (trim($select_country) == 'Argentina') echo ' selected="selected" '; ?>>Argentina</option>
                        <option value="Armenia" <?php if (trim($select_country) == 'Armenia') echo ' selected="selected" '; ?>>Armenia</option>
                        <option value="Aruba" <?php if (trim($select_country) == 'Aruba') echo ' selected="selected" '; ?>>Aruba</option>
                        <option value="Australia" <?php if (trim($select_country) == 'Australia') echo ' selected="selected" '; ?>>Australia</option>
                        <option value="Austria" <?php if (trim($select_country) == 'Austria') echo ' selected="selected" '; ?>>Austria</option>
                        <option value="Azerbaijan" <?php if (trim($select_country) == 'Azerbaijan') echo ' selected="selected" '; ?>>Azerbaijan</option>
                        <option value="Bahamas" <?php if (trim($select_country) == 'Bahamas') echo ' selected="selected" '; ?>>Bahamas</option>
                        <option value="Bahrain" <?php if (trim($select_country) == 'Bahrain') echo ' selected="selected" '; ?>>Bahrain</option>
                        <option value="Bangladesh" <?php if (trim($select_country) == 'Bangladesh') echo ' selected="selected" '; ?>>Bangladesh</option>
                        <option value="Barbados" <?php if (trim($select_country) == 'Barbados') echo ' selected="selected" '; ?>>Barbados</option>
                        <option value="Belarus" <?php if (trim($select_country) == 'Belarus') echo ' selected="selected" '; ?>>Belarus</option>
                        <option value="Belgium" <?php if (trim($select_country) == 'Belgium') echo ' selected="selected" '; ?>>Belgium</option>
                        <option value="Belize" <?php if (trim($select_country) == 'Belize') echo ' selected="selected" '; ?>>Belize</option>
                        <option value="Benin" <?php if (trim($select_country) == 'Benin') echo ' selected="selected" '; ?>>Benin</option>
                        <option value="Bermuda" <?php if (trim($select_country) == 'Bermuda') echo ' selected="selected" '; ?>>Bermuda</option>
                        <option value="Bhutan" <?php if (trim($select_country) == 'Bhutan') echo ' selected="selected" '; ?>>Bhutan</option>
                        <option value="Bolivia" <?php if (trim($select_country) == 'Bolivia') echo ' selected="selected" '; ?>>Bolivia</option>
                        <option value="Bonaire" <?php if (trim($select_country) == 'Bonaire') echo ' selected="selected" '; ?>>Bonaire</option>
                        <option value="Bosnia & Herzegovina" <?php if (trim($select_country) == 'Bosnia & Herzegovina') echo ' selected="selected" '; ?>>Bosnia & Herzegovina</option>
                        <option value="Botswana" <?php if (trim($select_country) == 'Botswana') echo ' selected="selected" '; ?>>Botswana</option>
                        <option value="Brazil" <?php if (trim($select_country) == 'Brazil') echo ' selected="selected" '; ?>>Brazil</option>
                        <option value="British Indian Ocean Ter" <?php if (trim($select_country) == 'British Indian Ocean Ter') echo ' selected="selected" '; ?>>British Indian Ocean Ter</option>
                        <option value="Brunei" <?php if (trim($select_country) == 'Brunei') echo ' selected="selected" '; ?>>Brunei</option>
                        <option value="Bulgaria" <?php if (trim($select_country) == 'Bulgaria') echo ' selected="selected" '; ?>>Bulgaria</option>
                        <option value="Burkina Faso" <?php if (trim($select_country) == 'Burkina Faso') echo ' selected="selected" '; ?>>Burkina Faso</option>
                        <option value="Burundi" <?php if (trim($select_country) == 'Burundi') echo ' selected="selected" '; ?>>Burundi</option>
                        <option value="Cambodia" <?php if (trim($select_country) == 'Cambodia') echo ' selected="selected" '; ?>>Cambodia</option>
                        <option value="Cameroon" <?php if (trim($select_country) == 'Cameroon') echo ' selected="selected" '; ?>>Cameroon</option>
                        <option value="Canada" <?php if (trim($select_country) == 'Canada') echo ' selected="selected" '; ?>>Canada</option>
                        <option value="Canary Islands" <?php if (trim($select_country) == 'Canary Islands') echo ' selected="selected" '; ?>>Canary Islands</option>
                        <option value="Cape Verde" <?php if (trim($select_country) == 'Cape Verde') echo ' selected="selected" '; ?>>Cape Verde</option>
                        <option value="Cayman Islands" <?php if (trim($select_country) == 'Cayman Islands') echo ' selected="selected" '; ?>>Cayman Islands</option>
                        <option value="Central African Republic" <?php if (trim($select_country) == 'Central African Republic') echo ' selected="selected" '; ?>>Central African Republic</option>
                        <option value="Chad" <?php if (trim($select_country) == 'Chad') echo ' selected="selected" '; ?>>Chad</option>
                        <option value="Channel Islands" <?php if (trim($select_country) == 'Channel Islands') echo ' selected="selected" '; ?>>Channel Islands</option>
                        <option value="Chile" <?php if (trim($select_country) == 'Chile') echo ' selected="selected" '; ?>>Chile</option>
                        <option value="China" <?php if (trim($select_country) == 'China') echo ' selected="selected" '; ?>>China</option>
                        <option value="Christmas Island" <?php if (trim($select_country) == 'Christmas Island') echo ' selected="selected" '; ?>>Christmas Island</option>
                        <option value="Cocos Island" <?php if (trim($select_country) == 'Cocos Island') echo ' selected="selected" '; ?>>Cocos Island</option>
                        <option value="Colombia" <?php if (trim($select_country) == 'Colombia') echo ' selected="selected" '; ?>>Colombia</option>
                        <option value="Comoros" <?php if (trim($select_country) == 'Comoros') echo ' selected="selected" '; ?>>Comoros</option>
                        <option value="Congo" <?php if (trim($select_country) == 'Congo') echo ' selected="selected" '; ?>>Congo</option>
                        <option value="Cook Islands" <?php if (trim($select_country) == 'Cook Islands') echo ' selected="selected" '; ?>>Cook Islands</option>
                        <option value="Costa Rica" <?php if (trim($select_country) == 'Costa Rica') echo ' selected="selected" '; ?>>Costa Rica</option>
                        <option value="Cote DIvoire" <?php if (trim($select_country) == 'Cote DIvoire') echo ' selected="selected" '; ?>>Cote D'Ivoire</option>
                        <option value="Croatia" <?php if (trim($select_country) == 'Croatia') echo ' selected="selected" '; ?>>Croatia</option>
                        <option value="Cuba" <?php if (trim($select_country) == 'Cuba') echo ' selected="selected" '; ?>>Cuba</option>
                        <option value="Curaco" <?php if (trim($select_country) == 'Curaco') echo ' selected="selected" '; ?>>Curacao</option>
                        <option value="Cyprus" <?php if (trim($select_country) == 'Cyprus') echo ' selected="selected" '; ?>>Cyprus</option>
                        <option value="Czech Republic" <?php if (trim($select_country) == 'Czech Republic') echo ' selected="selected" '; ?>>Czech Republic</option>
                        <option value="Denmark" <?php if (trim($select_country) == 'Denmark') echo ' selected="selected" '; ?>>Denmark</option>
                        <option value="Djibouti" <?php if (trim($select_country) == 'Djibouti') echo ' selected="selected" '; ?>>Djibouti</option>
                        <option value="Dominica" <?php if (trim($select_country) == 'Dominica') echo ' selected="selected" '; ?>>Dominica</option>
                        <option value="Dominican Republic" <?php if (trim($select_country) == 'Dominican Republic') echo ' selected="selected" '; ?>>Dominican Republic</option>
                        <option value="East Timor" <?php if (trim($select_country) == 'East Timor') echo ' selected="selected" '; ?>>East Timor</option>
                        <option value="Ecuador" <?php if (trim($select_country) == 'Ecuador') echo ' selected="selected" '; ?>>Ecuador</option>
                        <option value="Egypt" <?php if (trim($select_country) == 'Egypt') echo ' selected="selected" '; ?>>Egypt</option>
                        <option value="El Salvador" <?php if (trim($select_country) == 'El Salvador') echo ' selected="selected" '; ?>>El Salvador</option>
                        <option value="Equatorial Guinea" <?php if (trim($select_country) == 'Equatorial Guinea') echo ' selected="selected" '; ?>>Equatorial Guinea</option>
                        <option value="Eritrea" <?php if (trim($select_country) == 'Eritrea') echo ' selected="selected" '; ?>>Eritrea</option>
                        <option value="Estonia" <?php if (trim($select_country) == 'Estonia') echo ' selected="selected" '; ?>>Estonia</option>
                        <option value="Ethiopia" <?php if (trim($select_country) == 'Ethiopia') echo ' selected="selected" '; ?>>Ethiopia</option>
                        <option value="Falkland Islands" <?php if (trim($select_country) == 'Falkland Islands') echo ' selected="selected" '; ?>>Falkland Islands</option>
                        <option value="Faroe Islands" <?php if (trim($select_country) == 'Faroe Islands') echo ' selected="selected" '; ?>>Faroe Islands</option>
                        <option value="Fiji" <?php if (trim($select_country) == 'Fiji') echo ' selected="selected" '; ?>>Fiji</option>
                        <option value="Finland" <?php if (trim($select_country) == 'Finland') echo ' selected="selected" '; ?>>Finland</option>
                        <option value="France" <?php if (trim($select_country) == 'France') echo ' selected="selected" '; ?>>France</option>
                        <option value="French Guiana" <?php if (trim($select_country) == 'French Guiana') echo ' selected="selected" '; ?>>French Guiana</option>
                        <option value="French Polynesia" <?php if (trim($select_country) == 'French Polynesia') echo ' selected="selected" '; ?>>French Polynesia</option>
                        <option value="French Southern Ter" <?php if (trim($select_country) == 'French Southern Ter') echo ' selected="selected" '; ?>>French Southern Ter</option>
                        <option value="Gabon" <?php if (trim($select_country) == 'Gabon') echo ' selected="selected" '; ?>>Gabon</option>
                        <option value="Gambia" <?php if (trim($select_country) == 'Gambia') echo ' selected="selected" '; ?>>Gambia</option>
                        <option value="Georgia" <?php if (trim($select_country) == 'Georgia') echo ' selected="selected" '; ?>>Georgia</option>
                        <option value="Germany" <?php if (trim($select_country) == 'Germany') echo ' selected="selected" '; ?>>Germany</option>
                        <option value="Ghana" <?php if (trim($select_country) == 'Ghana') echo ' selected="selected" '; ?>>Ghana</option>
                        <option value="Gibraltar" <?php if (trim($select_country) == 'Gibraltar') echo ' selected="selected" '; ?>>Gibraltar</option>
                        <option value="Great Britain" <?php if (trim($select_country) == 'Great Britain') echo ' selected="selected" '; ?>>Great Britain</option>
                        <option value="Greece" <?php if (trim($select_country) == 'Greece') echo ' selected="selected" '; ?>>Greece</option>
                        <option value="Greenland" <?php if (trim($select_country) == 'Greenland') echo ' selected="selected" '; ?>>Greenland</option>
                        <option value="Grenada" <?php if (trim($select_country) == 'Grenada') echo ' selected="selected" '; ?>>Grenada</option>
                        <option value="Guadeloupe" <?php if (trim($select_country) == 'Guadeloupe') echo ' selected="selected" '; ?>>Guadeloupe</option>
                        <option value="Guam" <?php if (trim($select_country) == 'Guam') echo ' selected="selected" '; ?>>Guam</option>
                        <option value="Guatemala" <?php if (trim($select_country) == 'Guatemala') echo ' selected="selected" '; ?>>Guatemala</option>
                        <option value="Guinea" <?php if (trim($select_country) == 'Guinea') echo ' selected="selected" '; ?>>Guinea</option>
                        <option value="Guyana" <?php if (trim($select_country) == 'Guyana') echo ' selected="selected" '; ?>>Guyana</option>
                        <option value="Haiti" <?php if (trim($select_country) == 'Haiti') echo ' selected="selected" '; ?>>Haiti</option>
                        <option value="Hawaii" <?php if (trim($select_country) == 'Hawaii') echo ' selected="selected" '; ?>>Hawaii</option>
                        <option value="Honduras" <?php if (trim($select_country) == 'Honduras') echo ' selected="selected" '; ?>>Honduras</option>
                        <option value="Hong Kong" <?php if (trim($select_country) == 'Hong Kong') echo ' selected="selected" '; ?>>Hong Kong</option>
                        <option value="Hungary" <?php if (trim($select_country) == 'Hungary') echo ' selected="selected" '; ?>>Hungary</option>
                        <option value="Iceland" <?php if (trim($select_country) == 'Iceland') echo ' selected="selected" '; ?>>Iceland</option>
                        <option value="India" <?php if (trim($select_country) == 'India') echo ' selected="selected" '; ?>>India</option>
                        <option value="Indonesia" <?php if (trim($select_country) == 'Indonesia') echo ' selected="selected" '; ?>>Indonesia</option>
                        <option value="Iran" <?php if (trim($select_country) == 'Iran') echo ' selected="selected" '; ?>>Iran</option>
                        <option value="Iraq" <?php if (trim($select_country) == 'Iraq') echo ' selected="selected" '; ?>>Iraq</option>
                        <option value="Ireland" <?php if (trim($select_country) == 'Ireland') echo ' selected="selected" '; ?>>Ireland</option>
                        <option value="Isle of Man" <?php if (trim($select_country) == 'Isle of Man') echo ' selected="selected" '; ?>>Isle of Man</option>
                        <option value="Israel" <?php if (trim($select_country) == 'Israel') echo ' selected="selected" '; ?>>Israel</option>
                        <option value="Italy" <?php if (trim($select_country) == 'Italy') echo ' selected="selected" '; ?>>Italy</option>
                        <option value="Jamaica" <?php if (trim($select_country) == 'Jamaica') echo ' selected="selected" '; ?>>Jamaica</option>
                        <option value="Japan" <?php if (trim($select_country) == 'Japan') echo ' selected="selected" '; ?>>Japan</option>
                        <option value="Jordan" <?php if (trim($select_country) == 'Jordan') echo ' selected="selected" '; ?>>Jordan</option>
                        <option value="Kazakhstan" <?php if (trim($select_country) == 'Kazakhstan') echo ' selected="selected" '; ?>>Kazakhstan</option>
                        <option value="Kenya" <?php if (trim($select_country) == 'Kenya') echo ' selected="selected" '; ?>>Kenya</option>
                        <option value="Kiribati" <?php if (trim($select_country) == 'Kiribati') echo ' selected="selected" '; ?>>Kiribati</option>
                        <option value="Korea North" <?php if (trim($select_country) == 'Korea North') echo ' selected="selected" '; ?>>Korea North</option>
                        <option value="Korea Sout" <?php if (trim($select_country) == 'Korea Sout') echo ' selected="selected" '; ?>>Korea South</option>
                        <option value="Kuwait" <?php if (trim($select_country) == 'Kuwait') echo ' selected="selected" '; ?>>Kuwait</option>
                        <option value="Kyrgyzstan" <?php if (trim($select_country) == 'Kyrgyzstan') echo ' selected="selected" '; ?>>Kyrgyzstan</option>
                        <option value="Laos" <?php if (trim($select_country) == 'Laos') echo ' selected="selected" '; ?>>Laos</option>
                        <option value="Latvia" <?php if (trim($select_country) == 'Latvia') echo ' selected="selected" '; ?>>Latvia</option>
                        <option value="Lebanon" <?php if (trim($select_country) == 'Lebanon') echo ' selected="selected" '; ?>>Lebanon</option>
                        <option value="Lesotho" <?php if (trim($select_country) == 'Lesotho') echo ' selected="selected" '; ?>>Lesotho</option>
                        <option value="Liberia" <?php if (trim($select_country) == 'Liberia') echo ' selected="selected" '; ?>>Liberia</option>
                        <option value="Libya" <?php if (trim($select_country) == 'Libya') echo ' selected="selected" '; ?>>Libya</option>
                        <option value="Liechtenstein" <?php if (trim($select_country) == 'Liechtenstein') echo ' selected="selected" '; ?>>Liechtenstein</option>
                        <option value="Lithuania" <?php if (trim($select_country) == 'Lithuania') echo ' selected="selected" '; ?>>Lithuania</option>
                        <option value="Luxembourg" <?php if (trim($select_country) == 'Luxembourg') echo ' selected="selected" '; ?>>Luxembourg</option>
                        <option value="Macau" <?php if (trim($select_country) == 'Macau') echo ' selected="selected" '; ?>>Macau</option>
                        <option value="Macedonia" <?php if (trim($select_country) == 'Macedonia') echo ' selected="selected" '; ?>>Macedonia</option>
                        <option value="Madagascar" <?php if (trim($select_country) == 'Madagascar') echo ' selected="selected" '; ?>>Madagascar</option>
                        <option value="Malaysia" <?php if (trim($select_country) == 'Malaysia') echo ' selected="selected" '; ?>>Malaysia</option>
                        <option value="Malawi" <?php if (trim($select_country) == 'Malawi') echo ' selected="selected" '; ?>>Malawi</option>
                        <option value="Maldives" <?php if (trim($select_country) == 'Maldives') echo ' selected="selected" '; ?>>Maldives</option>
                        <option value="Mali" <?php if (trim($select_country) == 'Mali') echo ' selected="selected" '; ?>>Mali</option>
                        <option value="Malta" <?php if (trim($select_country) == 'Malta') echo ' selected="selected" '; ?>>Malta</option>
                        <option value="Marshall Islands" <?php if (trim($select_country) == 'Marshall Islands') echo ' selected="selected" '; ?>>Marshall Islands</option>
                        <option value="Martinique" <?php if (trim($select_country) == 'Martinique') echo ' selected="selected" '; ?>>Martinique</option>
                        <option value="Mauritania" <?php if (trim($select_country) == 'Mauritania') echo ' selected="selected" '; ?>>Mauritania</option>
                        <option value="Mauritius" <?php if (trim($select_country) == 'Mauritius') echo ' selected="selected" '; ?>>Mauritius</option>
                        <option value="Mayotte" <?php if (trim($select_country) == 'Mayotte') echo ' selected="selected" '; ?>>Mayotte</option>
                        <option value="Mexico" <?php if (trim($select_country) == 'Mexico') echo ' selected="selected" '; ?>>Mexico</option>
                        <option value="Midway Islands" <?php if (trim($select_country) == 'Midway Islands') echo ' selected="selected" '; ?>>Midway Islands</option>
                        <option value="Moldova" <?php if (trim($select_country) == 'Moldova') echo ' selected="selected" '; ?>>Moldova</option>
                        <option value="Monaco" <?php if (trim($select_country) == 'Monaco') echo ' selected="selected" '; ?>>Monaco</option>
                        <option value="Mongolia" <?php if (trim($select_country) == 'Mongolia') echo ' selected="selected" '; ?>>Mongolia</option>
                        <option value="Montserrat" <?php if (trim($select_country) == 'Montserrat') echo ' selected="selected" '; ?>>Montserrat</option>
                        <option value="Morocco" <?php if (trim($select_country) == 'Morocco') echo ' selected="selected" '; ?>>Morocco</option>
                        <option value="Mozambique" <?php if (trim($select_country) == 'Mozambique') echo ' selected="selected" '; ?>>Mozambique</option>
                        <option value="Myanmar" <?php if (trim($select_country) == 'Myanmar') echo ' selected="selected" '; ?>>Myanmar</option>
                        <option value="Nambia" <?php if (trim($select_country) == 'Nambia') echo ' selected="selected" '; ?>>Nambia</option>
                        <option value="Nauru" <?php if (trim($select_country) == 'Nauru') echo ' selected="selected" '; ?>>Nauru</option>
                        <option value="Nepal" <?php if (trim($select_country) == 'Nepal') echo ' selected="selected" '; ?>>Nepal</option>
                        <option value="Netherland Antilles" <?php if (trim($select_country) == 'Netherland Antilles') echo ' selected="selected" '; ?>>Netherland Antilles</option>
                        <option value="Netherlands" <?php if (trim($select_country) == 'Netherlands') echo ' selected="selected" '; ?>>Netherlands (Holland, Europe)</option>
                        <option value="Nevis" <?php if (trim($select_country) == 'Nevis') echo ' selected="selected" '; ?>>Nevis</option>
                        <option value="New Caledonia" <?php if (trim($select_country) == 'New Caledonia') echo ' selected="selected" '; ?>>New Caledonia</option>
                        <option value="New Zealand" <?php if (trim($select_country) == 'New Zealand') echo ' selected="selected" '; ?>>New Zealand</option>
                        <option value="Nicaragua" <?php if (trim($select_country) == 'Nicaragua') echo ' selected="selected" '; ?>>Nicaragua</option>
                        <option value="Niger" <?php if (trim($select_country) == 'Niger') echo ' selected="selected" '; ?>>Niger</option>
                        <option value="Nigeria" <?php if (trim($select_country) == 'Nigeria') echo ' selected="selected" '; ?>>Nigeria</option>
                        <option value="Niue" <?php if (trim($select_country) == 'Niue') echo ' selected="selected" '; ?>>Niue</option>
                        <option value="Norfolk Island" <?php if (trim($select_country) == 'Norfolk Island') echo ' selected="selected" '; ?>>Norfolk Island</option>
                        <option value="Norway" <?php if (trim($select_country) == 'Norway') echo ' selected="selected" '; ?>>Norway</option>
                        <option value="Oman" <?php if (trim($select_country) == 'Oman') echo ' selected="selected" '; ?>>Oman</option>
                        <option value="Pakistan" <?php if (trim($select_country) == 'Pakistan') echo ' selected="selected" '; ?>>Pakistan</option>
                        <option value="Palau Island" <?php if (trim($select_country) == 'Palau Island') echo ' selected="selected" '; ?>>Palau Island</option>
                        <option value="Palestine" <?php if (trim($select_country) == 'Palestine') echo ' selected="selected" '; ?>>Palestine</option>
                        <option value="Panama" <?php if (trim($select_country) == 'Panama') echo ' selected="selected" '; ?>>Panama</option>
                        <option value="Papua New Guinea" <?php if (trim($select_country) == 'Papua New Guinea') echo ' selected="selected" '; ?>>Papua New Guinea</option>
                        <option value="Paraguay" <?php if (trim($select_country) == 'Paraguay') echo ' selected="selected" '; ?>>Paraguay</option>
                        <option value="Peru" <?php if (trim($select_country) == 'Peru') echo ' selected="selected" '; ?>>Peru</option>
                        <option value="Phillipines" <?php if (trim($select_country) == 'Phillipines') echo ' selected="selected" '; ?>>Philippines</option>
                        <option value="Pitcairn Island" <?php if (trim($select_country) == 'Pitcairn Island') echo ' selected="selected" '; ?>>Pitcairn Island</option>
                        <option value="Poland" <?php if (trim($select_country) == 'Poland') echo ' selected="selected" '; ?>>Poland</option>
                        <option value="Portugal" <?php if (trim($select_country) == 'Portugal') echo ' selected="selected" '; ?>>Portugal</option>
                        <option value="Puerto Rico" <?php if (trim($select_country) == 'Puerto Rico') echo ' selected="selected" '; ?>>Puerto Rico</option>
                        <option value="Qatar" <?php if (trim($select_country) == 'Qatar') echo ' selected="selected" '; ?>>Qatar</option>
                        <option value="Republic of Montenegro" <?php if (trim($select_country) == 'Republic of Montenegro') echo ' selected="selected" '; ?>>Republic of Montenegro</option>
                        <option value="Republic of Serbia" <?php if (trim($select_country) == 'Republic of Serbia') echo ' selected="selected" '; ?>>Republic of Serbia</option>
                        <option value="Reunion" <?php if (trim($select_country) == 'Reunion') echo ' selected="selected" '; ?>>Reunion</option>
                        <option value="Romania" <?php if (trim($select_country) == 'Romania') echo ' selected="selected" '; ?>>Romania</option>
                        <option value="Russia" <?php if (trim($select_country) == 'Russia') echo ' selected="selected" '; ?>>Russia</option>
                        <option value="Rwanda" <?php if (trim($select_country) == 'Rwanda') echo ' selected="selected" '; ?>>Rwanda</option>
                        <option value="St Barthelemy" <?php if (trim($select_country) == 'St Barthelemy') echo ' selected="selected" '; ?>>St Barthelemy</option>
                        <option value="St Eustatius" <?php if (trim($select_country) == 'St Eustatius') echo ' selected="selected" '; ?>>St Eustatius</option>
                        <option value="St Helena" <?php if (trim($select_country) == 'St Helena') echo ' selected="selected" '; ?>>St Helena</option>
                        <option value="St Kitts-Nevis" <?php if (trim($select_country) == 'St Kitts-Nevis') echo ' selected="selected" '; ?>>St Kitts-Nevis</option>
                        <option value="St Lucia" <?php if (trim($select_country) == 'St Lucia') echo ' selected="selected" '; ?>>St Lucia</option>
                        <option value="St Maarten" <?php if (trim($select_country) == 'St Maarten') echo ' selected="selected" '; ?>>St Maarten</option>
                        <option value="St Pierre & Miquelon" <?php if (trim($select_country) == 'St Pierre & Miquelon') echo ' selected="selected" '; ?>>St Pierre & Miquelon</option>
                        <option value="St Vincent & Grenadines" <?php if (trim($select_country) == 'St Vincent & Grenadines') echo ' selected="selected" '; ?>>St Vincent & Grenadines</option>
                        <option value="Saipan" <?php if (trim($select_country) == 'Saipan') echo ' selected="selected" '; ?>>Saipan</option>
                        <option value="Samoa" <?php if (trim($select_country) == 'Samoa') echo ' selected="selected" '; ?>>Samoa</option>
                        <option value="Samoa American" <?php if (trim($select_country) == 'Samoa American') echo ' selected="selected" '; ?>>Samoa American</option>
                        <option value="San Marino" <?php if (trim($select_country) == 'San Marino') echo ' selected="selected" '; ?>>San Marino</option>
                        <option value="Sao Tome & Principe" <?php if (trim($select_country) == 'Sao Tome & Principe') echo ' selected="selected" '; ?>>Sao Tome & Principe</option>
                        <option value="Saudi Arabia" <?php if (trim($select_country) == 'Saudi Arabia') echo ' selected="selected" '; ?>>Saudi Arabia</option>
                        <option value="Senegal" <?php if (trim($select_country) == 'Senegal') echo ' selected="selected" '; ?>>Senegal</option>
                        <option value="Serbia" <?php if (trim($select_country) == 'Serbia') echo ' selected="selected" '; ?>>Serbia</option>
                        <option value="Seychelles" <?php if (trim($select_country) == 'Seychelles') echo ' selected="selected" '; ?>>Seychelles</option>
                        <option value="Sierra Leone" <?php if (trim($select_country) == 'Sierra Leone') echo ' selected="selected" '; ?>>Sierra Leone</option>
                        <option value="Singapore" <?php if (trim($select_country) == 'Singapore') echo ' selected="selected" '; ?>>Singapore</option>
                        <option value="Slovakia" <?php if (trim($select_country) == 'Slovakia') echo ' selected="selected" '; ?>>Slovakia</option>
                        <option value="Slovenia" <?php if (trim($select_country) == 'Slovenia') echo ' selected="selected" '; ?>>Slovenia</option>
                        <option value="Solomon Islands" <?php if (trim($select_country) == 'Solomon Islands') echo ' selected="selected" '; ?>>Solomon Islands</option>
                        <option value="Somalia" <?php if (trim($select_country) == 'Somalia') echo ' selected="selected" '; ?>>Somalia</option>
                        <option value="South Africa" <?php if (trim($select_country) == 'South Africa') echo ' selected="selected" '; ?>>South Africa</option>
                        <option value="Spain" <?php if (trim($select_country) == 'Spain') echo ' selected="selected" '; ?>>Spain</option>
                        <option value="Sri Lanka" <?php if (trim($select_country) == 'Sri Lanka') echo ' selected="selected" '; ?>>Sri Lanka</option>
                        <option value="Sudan" <?php if (trim($select_country) == 'Sudan') echo ' selected="selected" '; ?>>Sudan</option>
                        <option value="Suriname" <?php if (trim($select_country) == 'Suriname') echo ' selected="selected" '; ?>>Suriname</option>
                        <option value="Swaziland" <?php if (trim($select_country) == 'Swaziland') echo ' selected="selected" '; ?>>Swaziland</option>
                        <option value="Sweden" <?php if (trim($select_country) == 'Sweden') echo ' selected="selected" '; ?>>Sweden</option>
                        <option value="Switzerland" <?php if (trim($select_country) == 'Switzerland') echo ' selected="selected" '; ?>>Switzerland</option>
                        <option value="Syria" <?php if (trim($select_country) == 'Syria') echo ' selected="selected" '; ?>>Syria</option>
                        <option value="Tahiti" <?php if (trim($select_country) == 'Tahiti') echo ' selected="selected" '; ?>>Tahiti</option>
                        <option value="Taiwan" <?php if (trim($select_country) == 'Taiwan') echo ' selected="selected" '; ?>>Taiwan</option>
                        <option value="Tajikistan" <?php if (trim($select_country) == 'Tajikistan') echo ' selected="selected" '; ?>>Tajikistan</option>
                        <option value="Tanzania" <?php if (trim($select_country) == 'Tanzania') echo ' selected="selected" '; ?>>Tanzania</option>
                        <option value="Tanzania" <?php if (trim($select_country) == 'Tanzania') echo ' selected="selected" '; ?>>Thailand</option>
                        <option value="Togo" <?php if (trim($select_country) == 'Togo') echo ' selected="selected" '; ?>>Togo</option>
                        <option value="Tokelau" <?php if (trim($select_country) == 'Tokelau') echo ' selected="selected" '; ?>>Tokelau</option>
                        <option value="Tonga" <?php if (trim($select_country) == 'Tonga') echo ' selected="selected" '; ?>>Tonga</option>
                        <option value="Trinidad & Tobago" <?php if (trim($select_country) == 'Trinidad & Tobago') echo ' selected="selected" '; ?>>Trinidad & Tobago</option>
                        <option value="Tunisia" <?php if (trim($select_country) == 'Tunisia') echo ' selected="selected" '; ?>>Tunisia</option>
                        <option value="Turkey" <?php if (trim($select_country) == 'Turkey') echo ' selected="selected" '; ?>>Turkey</option>
                        <option value="Turkmenistan" <?php if (trim($select_country) == 'Turkmenistan') echo ' selected="selected" '; ?>>Turkmenistan</option>
                        <option value="Turks & Caicos Is" <?php if (trim($select_country) == 'Turks & Caicos Is') echo ' selected="selected" '; ?>>Turks & Caicos Is</option>
                        <option value="Tuvalu" <?php if (trim($select_country) == 'Tuvalu') echo ' selected="selected" '; ?>>Tuvalu</option>
                        <option value="Uganda" <?php if (trim($select_country) == 'Uganda') echo ' selected="selected" '; ?>>Uganda</option>
                        <option value="Ukraine" <?php if (trim($select_country) == 'Ukraine') echo ' selected="selected" '; ?>>Ukraine</option>
                        <option value="United Arab Emirates" <?php if (trim($select_country) == 'United Arab Emirates') echo ' selected="selected" '; ?>>United Arab Emirates</option>
                        <option value="United Kingdom" <?php if (trim($select_country) == 'United Kingdom') echo ' selected="selected" '; ?>>United Kingdom</option>
                        <option value="United States of America" <?php if (trim($select_country) == 'United States of America') echo ' selected="selected" '; ?>>United States of America</option>
                        <option value="Uraguay" <?php if (trim($select_country) == 'Uraguay') echo ' selected="selected" '; ?>>Uruguay</option>
                        <option value="Uzbekistan" <?php if (trim($select_country) == 'Uzbekistan') echo ' selected="selected" '; ?>>Uzbekistan</option>
                        <option value="Vanuatu" <?php if (trim($select_country) == 'Vanuatu') echo ' selected="selected" '; ?>>Vanuatu</option>
                        <option value="Vatican City State" <?php if (trim($select_country) == 'Vatican City State') echo ' selected="selected" '; ?>>Vatican City State</option>
                        <option value="Venezuela" <?php if (trim($select_country) == 'Venezuela') echo ' selected="selected" '; ?>>Venezuela</option>
                        <option value="Vietnam" <?php if (trim($select_country) == 'Vietnam') echo ' selected="selected" '; ?>>Vietnam</option>
                        <option value="Virgin Islands (Brit)" <?php if (trim($select_country) == 'Virgin Islands (Brit)') echo ' selected="selected" '; ?>>Virgin Islands (Brit)</option>
                        <option value="Virgin Islands (USA)" <?php if (trim($select_country) == 'Virgin Islands (USA)') echo ' selected="selected" '; ?>>Virgin Islands (USA)</option>
                        <option value="Wake Island" <?php if (trim($select_country) == 'Wake Island') echo ' selected="selected" '; ?>>Wake Island</option>
                        <option value="Wallis & Futana Is" <?php if (trim($select_country) == 'Wallis & Futana Is') echo ' selected="selected" '; ?>>Wallis & Futana Is</option>
                        <option value="Yemen" <?php if (trim($select_country) == 'Yemen') echo ' selected="selected" '; ?>>Yemen</option>
                        <option value="Zaire" <?php if (trim($select_country) == 'Zaire') echo ' selected="selected" '; ?>>Zaire</option>
                        <option value="Zambia" <?php if (trim($select_country) == 'Zambia') echo ' selected="selected" '; ?>>Zambia</option>
                        <option value="Zimbabwe" <?php if (trim($select_country) == 'Zimbabwe') echo ' selected="selected" '; ?>>Zimbabwe</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="col-md-2">
            <h5><strong>Filter by CM</strong></h5>
            <form method="post" action="" id="select_cm_form">
                <div class="form-group">
                    <label for="from_date">Select a member : </label>
                    <select id="select_cm" name="select_cm" class="form-control">
                        <option value="" <?php if ($select_cm == "") echo ' selected = "selected" '; ?>>Select Committee Member</option>
                        <?php
                        if ($cms) {
                            foreach ($cms as $cm) {
                                if ($select_cm == $cm->user_id) $selected = 'selected = "selected"';
                                else $selected = '';
                                echo '<option value="' . $cm->user_id . '"  ' . $selected . '>' . $cm->first_name . ' ' . $cm->last_name . '</option>';
                            }
                        }
                        ?>
                    </select>

                </div>
            </form>
        </div>

        <div class="col-md-2">
            <h5><strong>Filter by Status</strong></h5>
            <form method="post" action="" id="status_form">
                <div class="form-group">
                    <label for="select_status">Select a status:</label>
                    <select type="text" id="c" name="select_status" class="form-control" required>
                        <option value="all" <?php if ($select_status == "all") echo 'all'; ?>>All Statuses</option>
                        <option value="0" <?php if ($select_status == "0") echo ' selected="selected" '; ?>>Pending</option>
                        <option value="1" <?php if ($select_status == "1") echo ' selected="selected" '; ?>>Approved</option>
                        <option value="2" <?php if ($select_status == "2") echo ' selected="selected" '; ?>>Provisionally Accepted</option>
                        <option value="3" <?php if ($select_status == "3") echo ' selected="selected" '; ?>>Rejected</option>
                        <option value="4" <?php if ($select_status == "4") echo ' selected="selected" '; ?>>Queued</option>
                    </select>

                </div>
            </form>
        </div>

        <div class="col-md-2">
            <h5><strong>Sort by</strong></h5>
            <form method="post" action="" id="sort_form">
                <div class="form-group">
                    <label for="select_status">Select an option:</label>
                    <select id="sort_id" name="sort_id" class="form-control">
                        <option value="" <?php if ($sort_id == "") echo ' selected = "selected" '; ?>>Sort by</option>
                        <option value="country_asc" <?php if ($sort_id == "country_asc") echo ' selected = "selected" '; ?>>Country A-Z </option>
                        <option value="country_desc" <?php if ($sort_id == "country_desc") echo ' selected = "selected" '; ?>>Country Z-A </option>
                        <option value="track_asc" <?php if ($sort_id == "track_asc") echo ' selected = "selected" '; ?>>Track ASC</option>
                        <option value="track_desc" <?php if ($sort_id == "track_desc") echo ' selected = "selected" '; ?>>Track DESC </option>
                        <option value="status_asc" <?php if ($sort_id == "status_asc") echo ' selected = "selected" '; ?>>Status Pending To Approved </option>
                        <option value="status_desc" <?php if ($sort_id == "status_desc") echo ' selected = "selected" '; ?>>Status Approved To Pending </option>
                        <option value="approved_desc" <?php if ($sort_id == "approved_desc") echo ' selected = "selected" '; ?>>Latest Approved</option>
                    </select>

                </div>
            </form>
        </div>


        <!-- <div class="col-md-3">
            <a data-toggle="modal" data-target="#myModal2" class="btn btn-primary " style="margin-top:15px;width:45%;float:left">Search</a>
            
        </div> -->


    </div>

    <div class="row" style="padding:15px">
        <div class="col-md-9" style="padding-left:0;text-align:left;">

            <form method="post" action="" id="search_form">
                <!-- <label>Search by :</label> -->
                <div class="form-group">
                    <input type="text" class="form-control " name="search" value="<?php echo $search; ?>" placeholder="Enter Searching keyword" required />
                </div>
                <!-- <label>Select Criteria :</label> -->
                <div class="form-group">

                    <select id="criteria" name="criteria" class="form-control" required>
                        <option value="" <?php if ($criteria == "") echo ' selected = "selected" '; ?>>Select Criteria</option>
                        <option value="university" <?php if ($criteria == "university") echo ' selected = "selected" '; ?>>University Name</option>
                        <option value="name" <?php if ($criteria == "name") echo ' selected = "selected" '; ?>>Proposer’s First Name or Last Name</option>
                        <option value="email" <?php if ($criteria == "email") echo ' selected = "selected" '; ?>> E-mail Address</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="search_butt">Search</button>
                    <?php if (trim($search) != '') { ?>
                        <a href="<?php echo site_url('proposals/clear_search'); ?>" class="btn btn-danger">Clear Search</a>

                    <?php } ?>
                </div>
            </form>
        </div>
        <div class="col-md-3" style="padding-right:0;text-align:center;">
            <a href="<?php echo site_url('proposals/export_all'); ?>" 
                data-target="#expallModal2" class="btn btn-primary " style="width: 170px;">Export to Bizzabo</a>

            <a data-toggle="modal" data-target="#expallModalPI" class="btn btn-primary " style="width: 170px;">
                    Presenter Info Export</a>

        </div>
    </div>

    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">

            <thead>
                <tr>

                    <th>Proposal Title</th>
                    <th>Proposer</th>
                    <th>Institution</th>
                    <th>Event</th>
                    <th>Format</th>
                    <th>Track</th>
                    <th>Assigned CM</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($proposals) {
                    foreach ($proposals as $proposal) {
                ?>
                        <tr>
                            <td width="20%"><a href="<?php echo site_url('proposals/view/' . $proposal->proposal_id); ?>" title="<?php echo $proposal->proposal_title; ?>"><?php echo substr($proposal->proposal_title, 0, 25) . (strlen($proposal->proposal_title) > 25 ? '.....' : ''); ?></a></td>
                            <td><?php echo $proposal->first_name . " " . $proposal->last_name; ?></td>

                            <td><?php echo $proposal->university; ?></td>
                            <td><?php echo $proposal->event_name; ?></td>
                            <td><?php echo $proposal->session_format; ?></td>
                            <td width="5%">Track <?php echo $proposal->session_track; ?></td>
                            <td><?php echo $proposal->assigned_cm_name; ?> </td>

                            <td style="text-align: center;"><?php
                                                            if ($proposal->status == 0) echo '<span  class="label label-warning">Pending</span>';
                                                            elseif ($proposal->status == 1) echo '<span  class="label label-success">Approved</span>';
                                                            elseif ($proposal->status == 2) echo '<span  class="label label-info">PA</span>';
                                                            elseif ($proposal->status == 4) echo '<span  class="label label-danger">Queued</span>';
                                                            else echo '<span  class="label label-danger">Rejected</span>';
                                                            ?>

                                <?php
                                if ($proposal->status_on != '0000-00-00 00:00:00') {
                                    echo '<br/>';
                                    $date = date('d.m.Y', strtotime($proposal->status_on));

                                    if ($proposal->status == 0) echo '<span  class="label label-warning" style="margin-top: 2px;
    display: inline-block;">' . $date . '</span>';
                                    elseif ($proposal->status == 1) echo '<span  class="label label-success"  style="margin-top: 2px;
    display: inline-block;">' . $date . '</span>';
                                    elseif ($proposal->status == 2) echo '<span  class="label label-info"  style="margin-top: 2px;
    display: inline-block;">' . $date . '</span>';
                                    elseif ($proposal->status == 4) echo '<span  class="label label-danger"  style="margin-top: 2px;
    display: inline-block;">' . $date . '</span>';
                                    else echo '<span  class="label label-danger"  style="margin-top: 2px;
    display: inline-block;">' . $date . '</span>';
                                }
                                ?>

                            </td>
                            <td style="text-align: center;">

                                <div class="btn-group">
                                    <a href="<?php echo site_url('proposals/view/' . $proposal->proposal_id); ?>" data-toggle="tooltip" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                                    <a href="<?php echo site_url('proposals/edit/' . $proposal->proposal_id); ?>" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>

                                    <a href="<?php echo site_url('proposals/download_pdf/' . $proposal->proposal_id); ?>" data-toggle="tooltip" title="" data-original-title="Download PDF"><i class="fa fa-download"></i></a>
                                    <a onclick="return confirm('Are you sure?'); " href="<?php echo site_url('proposals/delete/' . $proposal->proposal_id); ?>" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fa fa-trash"></i></a>


                                </div>
                            </td>
                        </tr>
                <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>



<!-- /.modal -->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Search</h4>
            </div>
            <div class="modal-body">



                <form method="post" action="" id="search_form" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label" style="text-align:right">Search by :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control " name="search" value="<?php echo $search; ?>" placeholder="Enter Searching Text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" style="text-align:right">Select Criteria :</label>
                        <div class="col-md-4">

                            <select id="criteria" name="criteria" class="form-control" required>
                                <option value="" <?php if ($criteria == "") echo ' selected = "selected" '; ?>>Select Option</option>
                                <option value="university" <?php if ($criteria == "university") echo ' selected = "selected" '; ?>>University Name</option>
                                <option value="name" <?php if ($criteria == "name") echo ' selected = "selected" '; ?>>Proposer’s First Name or Last Name</option>
                                <option value="email" <?php if ($criteria == "email") echo ' selected = "selected" '; ?>> E-mail Address</option>
                            </select>
                        </div>
                    </div>
                </form>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="search_butt">Search</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<div class="modal fade" id="expallModalPI" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Export Prenter Info</h4>
            </div>
            <div class="modal-body">



                <form method="post" action="<?php echo site_url('proposals/export_presenterinfo'); ?>" id="pi_form" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label" style="text-align:right">Status:</label>
                        <div class="col-md-4">
                            <select type="text" id="select_event" name="select_event" class="form-control" required>
                                <option value="">Select Event</option>
                                <?php
                                if (sizeof($events) > 0) {
                                    foreach ($events as $pevent) {
                                ?>
                                        <option value="<?php echo $pevent->event_id; ?>"><?php echo $pevent->event_name; ?></option>
                                <?php }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </form>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="pi_butt">Export</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->