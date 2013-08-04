<body <?php if ($email_verified==0 && $user_exist) { ?> onLoad="setDisabled('extended_info', true)" <?php } ?>>
<div id="pageWrapper">
  <div id="wrapper">
    <div id="page">
      <div class="">
        <div class="messageBlock clearfix">
          <?php if($user->approved==0) { ?>
          <?php if ($email_verified==1) {  ?>
          <img src="<?php echo $user_image ?>" alt="User image" width="48" style="float:left;margin:0 10px 5px 0"/>
          <? } ?>
		  <p class="inputs">
          Welcome <strong><?php echo $twitter_name ?></strong> !
          <?php if ($user->active!=1) { ?>
           Are you joining as a Guest or Personal Trainer?<br>
          <?php } ?>
            <?php if (!$user_exist) { ?>
             <label>
               <input type="radio" name="guestOption" value="trainer" class="check" checked onClick=set_guest_value('0');set_sponsor_value('0');showHideDivTrainer();>
               Personal Trainer</label>
           
             <label>
               <input name="guestOption" type="radio" class="check" value="guest" onClick=set_guest_value('1');showHideDivGuests();>
               Guest</label>
             <label>
               <input name="guestOption" type="radio" class="check" value="sponsor" onClick=set_sponsor_value('1');showHideDiv();>
               Sponsor (Beta)</label>
             </p>

          <? } } ?>
          <?php if($user->approved==1) { ?>
          <img src="<?php echo $user_image ?>" alt="User image" width="48" style="float:left;margin:0 10px 5px 0"/>
         Hello <strong><?php echo $twitter_name ?></strong><br>
            Keep your certifications and tags up to date below. 
          <? } ?>
        </div>
        <?php if (isset($validate) && $validate==false && !$user_email_exist) { ?>
        <div class="ui-state-error ui-corner-all" style="padding: 0 .7em; vertical-align:middle;">
          <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> Oops! Some of the profile information we require is wrong or missing. Please check and resubmit.</p>
        </div>
        <br>
        <? } ?>
        <?php if (isset($validate) && $validate==false && $user_email_exist) { ?>
        <div class="ui-state-error ui-corner-all" style="padding: 0 .7em; vertical-align:middle;">
          <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> Oops! The email address is already registered with us!<br> 
            You may be using the wrong social network to login with!<br>
If you are logging in with Twitter this time, you may have previously joined with Facebook.<br>OR<br>If you logging in with Facebook this time, you may have previously joined with Twitter. <br>
Go back to the <a href="http://personaltrainerwall.com/index.php?c=welcome&m=logoff">home page</a> and try the other join button.</p>
        </div>
        <br>
        <? } ?>
        <form name="profile" action="index.php?c=add&m=profile" method="post">
          <div class="userDetails">
            <ul>
              <li class="expanders">
			  <div class="padd quick corners">
			   <a class="toggle" href="#">YOU <span style="font-weight:normal;">Name, email and location </span></a>
                <ul>
                  <li>
				      <div class="row clearfix">
                      <fieldset class="narrow">
                      <legend><span><b>1</b> Full Name </span></legend>
                      <p class="inputs clearfix">
                        <label for="firstName" class="lbl_med">First Name <?php echo form_input($first_name); ?> </label>
                      </p>
                      <p class="inputs clearfix">
                        <label for="lastName" class="lbl_med">Last Name <?php echo form_input($last_name); ?> </label>
                      </p>
                      <p class="message">Only legal names here will be accepted. </p>
                      <p class="message"> <?php echo form_error('first_name'); ?> <?php echo form_error('last_name'); ?> </p>
                      </fieldset>
                      <fieldset class="narrow">
                      <legend><span><b>2</b> Email Contact</span></legend>
                      <p class="inputs clearfix">
                        <label for="emailAddress" class="lbl_med">Email Address <?php echo form_input($email); ?> </label>
                      </p>
                      <p class="inputs clearfix">
                        <label for="emailShow" class="lbl_sm"> Hide Email <?php echo form_checkbox($hide_email_chkbox); ?> </label>
                      </p>
                      <p class="message"><strong>Future proof, choose a non-work email.<br>
                        An activation email will also be sent now.<br>
                        <a href="mailto:admin@personaltrainerwall.com">Click this link</a> to ensure our emails do not go to your spam folder.</strong></p>
                      <p class="message"><?php echo form_error('email'); ?></p>
                      </fieldset>
                      <fieldset class="narrow">
                      <legend><span><b>3</b> Location</span></legend>
                      <p class="inputs clearfix">
                        <?php
		  		if (form_error('country')) $country_class = 'slt_med error'; else $country_class = 'slt_med';
				if (form_error('state')) $state_class = 'slt_med error'; else $state_class = 'slt_med';
				if (form_error('county')) $county_class = 'slt_med error'; else $county_class = 'slt_med';
	
		   ?>
                        <label for="tag1" class="lbl_med">Country <?php echo form_dropdown('country', $country_list, $country_id_selected,'onChange="getStates()" id=d_country class="'.$country_class.'"'); ?> </label>
                        <label for="tag2" class="lbl_med">State <?php echo form_dropdown('state', $state_list, $state_id_selected,'onChange="getCounties()" id=d_state class="'.$state_class.'"'); ?> </label>
                        <label for="tag3" class="lbl_med">County <?php echo form_dropdown('county', $county_list,$county_id_selected,'onChange="getCities()" id=d_county class="'.$county_class.'"'); ?> </label>
                  
                        <input type="hidden" name="guest" id="guest" size="25" value="<?php echo $guest ?>">
                        <input type="hidden" name="sponsor" id="sponsor" size="25" value="<?php echo $sponsor ?>">
                      </p>
                      <p><?php echo form_error('county'); ?></p>
                      </fieldset>
                      <fieldset class="narrow">
                      <legend><span><b>4</b> Location</span></legend>
                      <p class="inputs clearfix">
                        <label for="tag3" class="lbl_med">City (USA Only) <?php echo form_dropdown('city', $city_list,$city_id_selected,'id=d_city class="'.$city_class.'"'); ?> </label>
                      </p>
                      </fieldset>
                    </div>
                  </li>
                </ul>
				</div>
                <?php if ($user->guest!=1) { ?>
		<div class="padd corners" id="services1">
                <a class="toggle" href="#">About your services</a>
                <ul>
                  <li>
                    <div class="clearfix row">
                      <fieldset class="narrow">
                      <legend><span><b>5</b> Speciality Tags</span></legend>
                      <p class="inputs clearfix">l
                        <label for="tag1" class="lbl_med">Tag 1 <?php echo form_dropdown('tag[1]', $tag_special_menu,$tags[1],'class=slt_med id=tag[1] onchange="updateTweet()"'); ?> </label>
                        <label for="tag2" class="lbl_med">Tag 2 <?php echo form_dropdown('tag[2]', $tag_special_menu,$tags[2],'class=slt_med id=tag[2] onchange="updateTweet()"'); ?> </label>
                        <label for="tag3" class="lbl_med">Tag 3 <?php echo form_dropdown('tag[3]', $tag_special_menu,$tags[3],'class=slt_med id=tag[3] onchange="updateTweet()"'); ?> </label>
                      </p>
                      <p class="inputs clearfix message"></p>
                      </fieldset>
                      <fieldset class="narrow">
                      <legend><span><b>6</b> Sports Specific Tags</span></legend>
                      <p class="inputs clearfix">
                        <label for="tag1" class="lbl_med">Tag 1 <?php echo form_dropdown('tag[4]', $tag_sports_menu,$tags[4],'class=slt_med id=tag[4] onchange="updateTweet()"'); ?> </label>
                        <label for="tag2" class="lbl_med">Tag 2 <?php echo form_dropdown('tag[5]', $tag_sports_menu,$tags[5],'class=slt_med id=tag[5] onchange="updateTweet()"'); ?> </label>
                        <label for="tag3" class="lbl_med">Tag 3 <?php echo form_dropdown('tag[6]', $tag_sports_menu,$tags[6],'class=slt_med id=tag[6] onchange="updateTweet()"'); ?> </label>
                      </p>
                      <p class="inputs clearfix message"></p>
                      </fieldset>
                      <fieldset class="narrow">
                      <legend><span><b>7</b> Style Tags</span></legend>
                      <p class="inputs clearfix">
                        <label for="tag1" class="lbl_med">Tag 1 <?php echo form_dropdown('tag[7]', $tag_style_menu,$tags[7],'class=slt_med id=tag[7] onchange="updateTweet()"'); ?> </label>
                        <label for="tag2" class="lbl_med">Tag 2 <?php echo form_dropdown('tag[8]', $tag_style_menu,$tags[8],'class=slt_med id=tag[8] onchange="updateTweet()"'); ?> </label>
                        <label for="tag3" class="lbl_med">Tag 3 <?php echo form_dropdown('tag[9]', $tag_style_menu,$tags[9],'class=slt_med id=tag[9] onchange="updateTweet()"'); ?> </label>
                      </p>
                      </fieldset>
                      <fieldset class="narrow">
                      <legend><span><b>8</b> Qualifications</span></legend>
                      <p class="inputs clearfix">
                        <label for="organization" class="lbl_med">Accredited Orgs <?php echo form_dropdown('training_org', $training_org_menu,$training_org_sel,'class=slt_med'); ?> </label>
                        <label for="certification" class="lbl_med">Certification <?php echo form_dropdown('certificate', $certificate_menu,$certificate_sel,'class=slt_med'); ?> </label>
                        <label for="regNo" class="lbl_med">Reg No <?php echo form_input($cert_reg_no); ?> </label>
                      <p class="inputs clearfix">
                        <label for="expDate" class="lbl_sm">Exp Date <?php echo form_input($cert_expiry); ?> </label>
                        <label for="pickDate" class="lbl_vsm">
                        <script language="JavaScript">
			new tcal ({
				// form name
				'formname': 'profile',
				// input name
				'controlname': 'cert_expiry'
			});

	</script>
                        </label>
                      </p>
                      </fieldset>
                      <!--<fieldset class="narrow">
          <legend><span><b>7</b> Insurance Details</span></legend>
          <p class="inputs clearfix">
            <label for="tag1" class="lbl_med">Insurance Declaration <?php echo form_dropdown('insurance_org', $insurance_org_menu,$insurance_org_sel,'class=slt_med'); ?> </label>
             <label for="tag3" class="lbl_vsm">Reg No <?php echo form_input($insurance_reg_no); ?> </label>
             <label for="tag4" class="lbl_sm">Exp Date <?php echo form_input($insurance_expiry); ?></label>
            <script language="JavaScript">
			new tcal ({
				// form name
				'formname': 'profile',
				// input name
				'controlname': 'insurance_expiry'
			});

	</script> 	
          </p>
          </fieldset>-->
                    </div>
                  </li>
                </ul>
				</div>
            <?php } if (($user->guest!=1) || ($user->guest==1 && $user->sponsor==1 )) { ?>
		<!----  more - start ------>
		<div class="padd corners" id="more1" >
                <a class="toggle" href="#">Show visitors more</a>
                <ul>
                  <li>
                    <div class="clearfix row">
                      <fieldset class="narrow">
                      <legend><span><b>9</b> Profile image</span></legend>
                      <p class="inputs clearfix">
                        <?php if ($image_exist) { ?>
                        <img src="<?php echo base_url().$image_file ?>" alt="twitter" width="120" style="float:none;margin:0 10px 5px 0"/>
                        <?php } else { ?>
                        <img src="<?php echo base_url();?>images/default-profile-image.jpg" alt="twitter" width="120" style="float:none;margin:0 10px 5px 0"/>
                        <? } ?>
                        </a> </p>
                      <?php if ($email_verified==0) {  ?>
                      <p><small>After you have created your profile, you will receive an email to verify your address. Then come back to this page and upload your new image for the directory!</small></p>
                      <? } ?>
                      <?php if ($email_verified==1) {  ?>
                      <!--<a rel="width:800,height:600" class="mb" href=index.php?c=add&m=manage_user_pic&user_id=<?php echo $user_id ?>>Add/Edit Pic</a>-->
                      <a title="Upload Profile Picture" class="" href="<?php echo base_url(); ?>index.php?c=add&m=image"><span></span>Upload Profile Picture</a>
                      <? } ?>
                      </fieldset>
                      <fieldset class="narrow">
                      <legend><span><b>10</b> Mobile/Cell Phone</span></legend>
                      <p class="inputs clearfix">
                        <label for="emailAddress" class="lbl_med">Phone Number <?php echo form_input($phone_no); ?> </label>
                      </p>
                      <p class="inputs clearfix">
                        <label for="phoneShow" class="lbl_sm"> Hide Phone <?php echo form_checkbox($hide_phone_chkbox); ?> </label>
                      </p>
                       <legend><span><b>10</b>Business Name</span></legend>
                      <p class="inputs clearfix">
                        <label for="bussiessName" class="lbl_med">Business Name <?php echo form_input($business_name); ?> </label>
                      </p>
                      <p class="inputs clearfix message error"></p>
                      </fieldset>
                      <fieldset class="narrow">
                      <legend><span><b>11</b> Your links</span></legend>
                      <p class="inputs clearfix">
                        <label for="facebookLink" class="lbl_med">Facebook/My SpaceURL <?php echo form_input($facebook_url); ?> </label>
                      </p>
                      <p class="inputs clearfix">
                        <label for="myspaceLink" class="lbl_med">My Workplace URL <?php echo form_input($workplace_url); ?> </label>
                      </p>
                      <p class="inputs clearfix">
                        <label for="linkedinLink" class="lbl_med">Linkedin URL <?php echo form_input($linkedin_url); ?> </label>
                      </p>
                      </fieldset>
                      <fieldset class="narrow">
                      <legend><span><b>12</b> Address for Google Map </span></legend>
                      <p class="inputs clearfix">
                        <label for="street_address" class="lbl_med">Street address <?php echo form_input($street_address); ?> </label>
                      <p class="inputs clearfix">
                        <label for="mapShow" class="lbl_sm"> Hide Google Map <?php echo form_checkbox($hide_google_map_chkbox); ?> </label>
                      </p>
                      </fieldset>
                    </div>
                  </li>
                </ul>
				</div>
		<!----  more - end   ------>	

		<div class="padd corners" id="message1">
                <a class="toggle" href="#">Your short "killer" message</a>
                <ul>
                  <li>
                    <div class="clearfix row">
                      <fieldset>
                      <legend><span><b>13</b>Message</span></legend>
                      <p class="inputs clearfix"> <small>(Maximum characters: <strong>140</strong>) You have
                        <input readonly type="text" name="countdown" size="1" value="140" style="float:none;font-size:11px;padding:0;background-color:transparent;border:0;font-weight:bold;">
                        characters left.</small>
                        <textarea name="description" id="description" cols="4" rows="4" onKeyDown="limitText(this.form.description,this.form.countdown,140);" onKeyUp="limitText(this.form.description,this.form.countdown,140);"><?php echo $description ?></textarea>
                      </p>
                      </fieldset>
                    </div>
                  </li>
                </ul>
				</div>
	    <?php } ?>
                <?php if ($auth_mode == 'twitter0' && 1==0): ?>
				 <div class="padd corners">
                <a class="toggle" href="#">Tweet and bang the drum</a>
                <ul>
                  <li>
                    <fieldset>
                    <legend><span><b>14</b> Spread the word with a tweet</span></legend>
                    <textarea name="tweet" id="tweet" cols="4" rows="4">Added myself to http://www.personaltrainerwall.com a Personal Trainer directory under: #Fitness</textarea>
                    </fieldset>
                  </li>
                </ul>
				</div>
                <?php endif ?>
                <!-- error in fields -->
                <!-- end error in fields -->
                <hr class="dotted"/>
				<a title="Delete my Profile" class="" href="<?php echo base_url(); ?>index.php?c=add&m=profile_delete"><span></span>Delete My Profile </a>
				
                <p class="inputs clearfix"><span class="btn-std alt">
                  <!--<input type="submit" name="submit" value="Update Profile!" class="btn-std" />-->
                <input type="submit" onClick="ShowProgress('Updating profile, please wait...');" name="submit" value="Update" class="btn-std" />
                  <?php echo form_hidden($hidden_data); ?> </span></p>
              </li>
            </ul>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end pageWrapper -->
