<!--current-->
<!-- Calendar -->
<script src="<?php echo base_url(); ?>scripts/calendar_eu.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>scripts/switcher.js" type="text/javascript"></script>
<script type="text/javascript">
function updateTweet(){   
	base = "Added myself to http://www.personaltrainerwall.com a Personal Trainer directory under: ";
	//FieldName[0]="text1"
	for(i=0;i<=8;i++) {
		j = i+1
		temp = "tag["+j+"]";
		tag = document.getElementById(temp);
	if (tag.selectedIndex !=0) {
		base = base + "#" + tag.options(tag.selectedIndex).text + " ";
		}
	}
	document.getElementById("tweet").value = base;
}
</script>
<script language="javascript" type="text/javascript">
<!--
// Get the HTTP Object
function getHTTPObject(){
   if (window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");
   else if (window.XMLHttpRequest) return new XMLHttpRequest();
   else {
      alert("Your browser does not support AJAX.");
      return null;
   }
}   
 
// Change the value of the outputText field
function setOutput(){
    if(httpObject.readyState == 4){
        var combo = document.getElementById('d_county');
        combo.options.length = 0;
 
        var response = httpObject.responseText;
        var items = response.split(";");
        var count = items.length;
        for (var i=0;i<count;i++){
            var options = items[i].split("-");
            combo.options[i] = 
			    new Option(options[0],options[1]);
        }
    }
}

function setOutputForState(){
    if(httpObject.readyState == 4){
        var combo = document.getElementById('d_state');
        combo.options.length = 0;
 
        var response = httpObject.responseText;
        var items = response.split(";");
        var count = items.length;
        for (var i=0;i<count;i++){
            var options = items[i].split("-");
            combo.options[i] = 
			    new Option(options[0],options[1]);
        }
    }
}

function setOutputForCity(){
    if(httpObject.readyState == 4){
        var combo = document.getElementById('d_city');
        combo.options.length = 0;
 
        var response = httpObject.responseText;
        var items = response.split(";");
        var count = items.length;
        for (var i=0;i<count;i++){
            var options = items[i].split("-");
            combo.options[i] = 
			    new Option(options[0],options[1]);
        }
    }
}
// Implement business logic    
function getCities(){    
    httpObject = getHTTPObject();
    if (httpObject != null) {
		httpObject.open("GET", "index.php?c=ajaxcalls&m=get_cities&state_id="+document.getElementById('d_state').value+"&country_id="+document.getElementById('d_country').value+"&county_id="+document.getElementById('d_county').value, true);
        httpObject.onreadystatechange = setOutputForCity;
        httpObject.send(null);
    }
}
// Implement business logic    
function getCounties(){    
    httpObject = getHTTPObject();
    if (httpObject != null) {
		httpObject.open("GET", "index.php?c=ajaxcalls&m=get_counties&state_id="+document.getElementById('d_state').value+"&country_id="+document.getElementById('d_country').value, true);
        httpObject.onreadystatechange = setOutput;
        httpObject.send(null);
    }
}
 
// Implement business logic    
function getStates(){    
    httpObject = getHTTPObject();
    if (httpObject != null) {
		httpObject.open("GET", "index.php?c=ajaxcalls&m=get_states&country_id="+document.getElementById('d_country').value, true);
        httpObject.onreadystatechange = setOutputForState;
        httpObject.send(null);
    }
}

function setDisabled(id, disabled)
{
	if ( !document.getElementById
	|| !document.getElementsByTagName) return;
	
		var nodesToDisable = {button :'', input :'', optgroup :'',
		option :'', select :'', textarea :''};
		
		var node, nodes;
		var div = document.getElementById(id);
		if (!div) return;
		
		nodes = div.getElementsByTagName('*');
		if (!nodes) return;
		
		var i = nodes.length;
		while (i--){
			node = nodes[i];
			if ( node.nodeName
			&& node.nodeName.toLowerCase() in nodesToDisable ){
			node.disabled = disabled;
			}
		}
}

function set_guest_value(v) {

    var guest_field = document.getElementById('guest_field');
    document.getElementById("guest").value = v;

}

function set_sponsor_value(v) {

  //  var sponsor_field = document.getElementById('sponsor_field');
    document.getElementById("sponsor").value = v;
    document.getElementById("guest").value = v;
}

function showHideDiv()
    {
        var divstyle = new String();
        divstyle = document.getElementById("services1").style.display;
            document.getElementById("services1").style.display = "none";
            document.getElementById("more1").style.display = "block";
            document.getElementById("message1").style.display = "block";
    }
    
function showHideDivGuests()
    {
        var divstyle = new String();
        divstyle = document.getElementById("services1").style.display;

            document.getElementById("services1").style.display = "none";
            document.getElementById("more1").style.display = "none";
            document.getElementById("message1").style.display = "none";

			/*
            document.getElementById("services1").style.display = "block";
            document.getElementById("more1").style.display = "block";
            document.getElementById("message1").style.display = "block";
			*/
    }
function showHideDivTrainer()
    {
        var divstyle = new String();
        divstyle = document.getElementById("services1").style.display;
			
            document.getElementById("services1").style.display = "block";
            document.getElementById("more1").style.display = "block";
            document.getElementById("message1").style.display = "block";
			
    }

var httpObject = null;
 
//-->
</script>

<!--limit textarea to 140 characters-->
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
</script>

<body <?php if ($email_verified==0 && $user_exist) { ?> onLoad="setDisabled('extended_info', true)" <?php } ?>>
<div id="wrapper" class="container <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') == TRUE) { ?>handheld<? } else {	?>screen<? } ?>">

<div id="page" class="row-fluid">
  <div class="span12 wrap">
  <div class="content">
    <div class="messageBlock clearfix">
      <?php if($user->approved==0) { ?>
      <p class="inputs"> Welcome <strong><?php echo $twitter_name ?></strong> !
        <?php if ($user->active!=1) { ?>
        Choose a membership type &mdash; This won't take long, promise! </p>
      <?php } ?>
      <?php if (!$user_exist) { ?>
      <p class="inputs clearfix">
        <label>
        <input type="radio" name="guestOption" value="trainer" class="check" checked onClick=set_guest_value('0');set_sponsor_value('0');showHideDivTrainer();>
        Personal Trainer <span style="font-weight:normal;color:#999999;">&mdash; Promote your services on your own webpage - Free. This is definitely a must for Personal Trainers with certifications. Fast approval. </span></label>
      </p>
      <p class="inputs clearfix">
        <label>
        <input name="guestOption" type="radio" class="check" value="guest" onClick=set_guest_value('1');showHideDivGuests();>
        Guest <span style="font-weight:normal;color:#999999;">&mdash; Add your twitter or facebook thumb to the guest wall right away and network - Free.</span></label>
      </p>
      <p class="inputs clearfix">
        <label>
        <input name="guestOption" type="radio" class="check" value="sponsor" onClick=set_sponsor_value('1');showHideDiv();>
        A Personal Trainer Job or Advertisement  <span style="font-weight:normal;color:#999999;">&mdash; Describe the job to be filled or advertisement. Free for 14 days. Fast approval.</span></label>
      </p>
      <? } } ?>
	  
	  
	  
      <?php if($user->approved==1) { ?>
      <img src="<?php echo $user_image ?>" alt="User image" width="48" style="float:left;margin:0 10px 5px 0"/> Hello <strong><?php echo $twitter_name ?></strong><br>
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
      <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> Oops! The email address is <strong>already registered with us!</strong> To access your account you must use the <strong>same method</strong> as you joined with.</strong><br>
        <br>
        <strong>Scenario:</strong> You may be have used the wrong social network to login with!<br>
        IE: If you are logging in with <strong>Twitter</strong> this time, you may have previously joined with <strong>Facebook</strong> <strong>or</strong> if you are logging in with <strong>Facebook</strong> this time, you may have previously joined with <strong>Twitter</strong>. <br>
        <br>
        <strong>Solution:</strong> Go back to the <a style="color:#0066CC;" href="http://personaltrainerwall.com/index.php?c=welcome&m=logoff">home page&gt;</a> and try the other join button.</p>
    </div>
    <br>
    <? } ?>
    <form name="profile" action="index.php?c=add&m=profile" method="post">
      <div class="userDetails">
        <ul>
          <li class="expanders">
            <!----name location--->
			<div class="padd quick corners"> <a class="toggle" href="#">Name, email and location <span style="font-weight:normal;"> </span></a>
              <ul>
                <li>
                  <div class="clearfix">
                    <fieldset class="narrow">
                    <p class="inputs clearfix">
                      <label for="firstName" class="lbl_med">First Name <?php echo form_input($first_name); ?> </label>
                    </p>
                    <p class="inputs clearfix">
                      <label for="lastName" class="lbl_med">Last Name <?php echo form_input($last_name); ?> </label>
                    </p>
                    <p class="message">Only legal names here will be accepted. </p>
                    <div class="error"> <?php echo form_error('first_name'); ?> <?php echo form_error('last_name'); ?> </div>
                    </fieldset>
                    <fieldset class="narrow">
                    <p class="inputs clearfix">
                      <label for="emailAddress" class="lbl_med">Email Address <?php echo form_input($email); ?> </label>
                    </p>
                    <p class="inputs clearfix">
                      <label for="emailShow" class="lbl_sm"> Hide Email <?php echo form_checkbox($hide_email_chkbox); ?> </label>
                    </p>
                    <div class="error"><?php echo form_error('email'); ?></div>
                    <p class="message"><strong>Future proof, choose a non-work email.<br>
                      An activation email will also be sent now.<br>
                      <a href="mailto:admin@personaltrainerwall.com">Click this link</a> to ensure our emails do not go to your spam folder.</strong></p>
                    </fieldset>
                    <fieldset class="narrow">
                    <p class="inputs clearfix">
                      <?php
		  		if (form_error('country')) $country_class = 'slt_med error'; else $country_class = 'slt_med';
				if (form_error('state')) $state_class = 'slt_med error'; else $state_class = 'slt_med';
				if (form_error('county')) $county_class = 'slt_med error'; else $county_class = 'slt_med';
	
		   ?>
                      <label for="tag1" class="lbl_med">Country <?php echo form_dropdown('country', $country_list, $country_id_selected,'onChange="getStates()" id=d_country class="'.$country_class.'"'); ?> </label>
                    </p>
                    <p class="inputs clearfix">
                      <label for="tag2" class="lbl_med">State <?php echo form_dropdown('state', $state_list, $state_id_selected,'onChange="getCounties()" id=d_state class="'.$state_class.'"'); ?> </label>
                    </p>
                    <p class="inputs clearfix">
                      <label for="tag3" class="lbl_med">County <?php echo form_dropdown('county', $county_list,$county_id_selected,'onChange="getCities()" id=d_county class="'.$county_class.'"'); ?> </label>
                     <input type="hidden" name="guest" id="guest" size="25" value="<?php echo $guest ?>">
                      <input type="hidden" name="sponsor" id="sponsor" size="25" value="<?php echo $sponsor ?>">
                    </p>
                    <div class="error"><?php echo form_error('country'); ?></div>
                    <div class="error"><?php echo form_error('state'); ?></div>
                    <div class="error"><?php echo form_error('county'); ?></div>
                    </fieldset>
                    <fieldset class="narrow last">
                    <p class="inputs clearfix">
                      <label for="tag3" class="lbl_med">City (USA Only) <?php echo form_dropdown('city', $city_list,$city_id_selected,'id=d_city class="'.$city_class.'"'); ?> </label>
                    </p>
                    </fieldset>
                  </div>
                </li>
              </ul>
            </div>
			<!----end name location--->
            
			<?php if ($user->guest!=1) { ?>
			<!----services--->
            <div class="padd corners" id="services1"> <a class="toggle" href="#">About your services <span style="font-weight:normal;"></a>
              <ul>
                <li>
                  <div class="clearfix">
                    <fieldset class="narrow">
                    <p class="inputs clearfix">
                      <label for="tag1" class="lbl_med">Tag 1 <?php echo form_dropdown('tag[1]', $tag_special_menu,$tags[1],'class=slt_med id=tag[1] onchange="updateTweet()"'); ?> </label>
                      <label for="tag2" class="lbl_med">Tag 2 <?php echo form_dropdown('tag[2]', $tag_special_menu,$tags[2],'class=slt_med id=tag[2] onchange="updateTweet()"'); ?> </label>
                      <label for="tag3" class="lbl_med">Tag 3 <?php echo form_dropdown('tag[3]', $tag_special_menu,$tags[3],'class=slt_med id=tag[3] onchange="updateTweet()"'); ?> </label>
                    </p>
                    <p class="inputs clearfix message"></p>
                    </fieldset>
                    <fieldset class="narrow">
                    <p class="inputs clearfix">
                      <label for="tag1" class="lbl_med">Tag 1 <?php echo form_dropdown('tag[4]', $tag_sports_menu,$tags[4],'class=slt_med id=tag[4] onchange="updateTweet()"'); ?> </label>
                      <label for="tag2" class="lbl_med">Tag 2 <?php echo form_dropdown('tag[5]', $tag_sports_menu,$tags[5],'class=slt_med id=tag[5] onchange="updateTweet()"'); ?> </label>
                      <label for="tag3" class="lbl_med">Tag 3 <?php echo form_dropdown('tag[6]', $tag_sports_menu,$tags[6],'class=slt_med id=tag[6] onchange="updateTweet()"'); ?> </label>
                    </p>
                    <p class="inputs clearfix message"></p>
                    </fieldset>
                    <fieldset class="narrow">
                    <p class="inputs clearfix">
                      <label for="tag1" class="lbl_med">Tag 1 <?php echo form_dropdown('tag[7]', $tag_style_menu,$tags[7],'class=slt_med id=tag[7] onchange="updateTweet()"'); ?> </label>
                      <label for="tag2" class="lbl_med">Tag 2 <?php echo form_dropdown('tag[8]', $tag_style_menu,$tags[8],'class=slt_med id=tag[8] onchange="updateTweet()"'); ?> </label>
                      <label for="tag3" class="lbl_med">Tag 3 <?php echo form_dropdown('tag[9]', $tag_style_menu,$tags[9],'class=slt_med id=tag[9] onchange="updateTweet()"'); ?> </label>
                    </p>
                    </fieldset>
                    <fieldset class="narrow last">
                    <p class="inputs clearfix">
                      <label for="organization" class="lbl_med">Accredited Orgs <?php echo form_dropdown('training_org', $training_org_menu,$training_org_sel,'class=slt_med'); ?> </label>
                      <label for="certification" class="lbl_med">Certification <?php echo form_dropdown('certificate', $certificate_menu,$certificate_sel,'class=slt_med'); ?></label>
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
                    <div><small><a href="<?php echo base_url(); ?>info/approve-trainers-page.php" rel="facebox">Certification Tips</a></small></div>
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
			<!----services end-->
            
			<?php } if (($user->guest!=1) || ($user->guest==1 && $user->sponsor==1 )) { ?>
			<!----more------>
            <div class="padd corners" id="more1" > <a class="toggle" href="#">Show visitors more</a>
              <ul>
                <li>
                  <div class="clearfix">
                    <fieldset class="narrow">
                    <p class="inputs clearfix">
                      <?php if ($image_exist) { ?>
                      <img src="<?php echo base_url().$image_file ?>" alt="twitter" width="120" style="float:none;margin:0 10px 5px 0"/>
                      <?php } else { ?>
                      <img src="<?php echo base_url();?>images/default-profile-image.jpg" alt="twitter" width="120" style="float:none;margin:0 10px 5px 0"/>
                      <? } ?>
                      </a> </p>
                 
					
					   <?php if($user->active==0) { ?>
					
					
                    <p><small>After you have updated this page, return here and <strong>then</strong> upload your new image! **Your portrait image is a must for the quick approval of your page. </small></p>
                    <? } ?>
                    <?php if($user->active==1) { ?>
                    <!--<a rel="width:800,height:600" class="mb" href=index.php?c=add&m=manage_user_pic&user_id=<?php echo $user_id ?>>Add/Edit Pic</a>-->
                    <a title="Upload Profile Picture" class="" href="<?php echo base_url(); ?>index.php?c=add&m=image"><span></span>Upload Profile Picture</a>
                    <? } ?>
                    </fieldset>
                    <fieldset class="narrow">
                    <p class="inputs clearfix">
                      <label for="emailAddress" class="lbl_med">Phone Number <?php echo form_input($phone_no); ?> </label>
                    </p>
                    <p class="inputs clearfix">
                      <label for="phoneShow" class="lbl_sm"> Hide Phone <?php echo form_checkbox($hide_phone_chkbox); ?> </label>
                    </p>
                    <p class="inputs clearfix">
                      <label for="bussiessName" class="lbl_med">Business Name (sponsors only) <?php echo form_input($business_name); ?> </label>
                    </p>
                    <p class="inputs clearfix message error"></p>
                    </fieldset>
                    <fieldset class="narrow">
                    <p class="inputs clearfix">
                      <label for="facebookLink" class="lbl_med">Additional Facebook URL <?php echo form_input($facebook_url); ?> </label>
                    </p>
                    <p class="inputs clearfix">
                      <label for="myspaceLink" class="lbl_med">My Workplace URL <?php echo form_input($workplace_url); ?> </label>
                    </p>
                    <p class="inputs clearfix">
                      <label for="linkedinLink" class="lbl_med">Linkedin URL <?php echo form_input($linkedin_url); ?> </label>
                    </p>
                    <p><small>The http:// is not required</small></p>
                    </fieldset>
                    <fieldset class="narrow last">
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
            <!--- end-->
			
			<!----message------>
            <div class="padd corners" id="message1"> <a class="toggle" href="#">Your short "killer" message</a>
              <ul>
                <li>
                  <div class="clearfix">
                    <fieldset>
					 <p class="inputs clearfix"> <small>Maximum characters: <strong>140</strong> You have
                      <input readonly type="text" name="countdown" size="5" value="140" style="float:none;font-size:11px;padding:0;margin:0;background-color:transparent;border:0;outline:none;font-weight:normal;width:auto; box-shadow: none;">
                      characters left.</small>
                      
                    </p>
					
                    <p class="inputs clearfix">
                      <textarea name="description" id="description" class="span6" cols="4" rows="4" onKeyDown="limitText(this.form.description,this.form.countdown,140);" onKeyUp="limitText(this.form.description,this.form.countdown,140);"><?php echo $description ?></textarea>
                    </p>
                    </fieldset>
                  </div>
                </li>
              </ul>
            </div>
			<!----end message------>
            <?php } ?>
			
            <?php if ($auth_mode == 'twitter0' && 1==0): ?>
            <div class="padd corners"> <a class="toggle" href="#">Tweet and bang the drum</a>
              <ul>
                <li>
                  <fieldset>
                  <textarea name="tweet" id="tweet" cols="4" rows="4">Added myself to http://www.personaltrainerwall.com a Personal Trainer directory under: #Fitness</textarea>
                  </fieldset>
                </li>
              </ul>
            </div>
            <?php endif ?>
            <!-- error in fields -->
            <!-- end error in fields -->
            <p class="button pad clearfix"><span class="btn-std alt">
              <!--<input type="submit" name="submit" value="Update Profile!" class="btn-std" />-->
              <input type="submit" onClick="ShowProgress('Updating profile, please wait...');" name="submit" value="Update" class="btn-std" />
              <?php echo form_hidden($hidden_data); ?> </span></p>
	  
	  
	 <?php if($user->active==0) { ?>
								  <p class="pad"><small>You will receive an email to verify your email. Some times it can take a while. If you do not please email us to find out why not.</small></p>    <? } ?>
			
			 
			 <?php if ($email_verified==0 && $user->active==1) { ?> 
			 
			 
			 	<p class="pad"><small><strong>Your email address is not verified yet.</strong> If you did not receive the email with the verification link please <a href="mailto:admin@personaltrainerwall.com">email</a> us now.</small></p>			  
								  
			    <? } ?>
          </li>
        </ul>
      </div>
    </form>
  </div>
</div>
</div>
 <!-- end page -->
</div>
</div>
<!-- end pageWrapper -->
</div>
