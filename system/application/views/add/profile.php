<!-- Calendar -->
<script src="<?php echo base_url(); ?>scripts/calendar_eu.js" type="text/javascript"></script>
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
	if ( !document.getElementById || !document.getElementsByTagName) return;
	
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
			document.getElementById("retweets1").style.display = "none";
			document.getElementById("apps1").style.display = "none";
    }
    
function showHideDivGuests()
    {
        var divstyle = new String();
        divstyle = document.getElementById("services1").style.display;

            document.getElementById("services1").style.display = "none";
            document.getElementById("more1").style.display = "none";
            document.getElementById("message1").style.display = "none";
			document.getElementById("retweets1").style.display = "none";
			document.getElementById("apps1").style.display = "none";
			
    }
function showHideDivTrainer()
    {
        var divstyle = new String();
        divstyle = document.getElementById("services1").style.display;
			
            document.getElementById("services1").style.display = "block";
            document.getElementById("more1").style.display = "block";
            document.getElementById("message1").style.display = "block";
			document.getElementById("retweets1").style.display = "block";
			document.getElementById("apps1").style.display = "block";
			 
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
<div id="wrapper" class="<?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') == TRUE) { ?>handheld<? } else {	?>screen<? } ?>">
<section class="theme theme-three">
  <div class="container">
    <div class="row">
      <form name="profile" action="index.php?c=add&m=profile" method="post">
        <h1 class="regular center">
          <?php if($user->approved==0) { ?>
          <?php echo $user->first_name ?>, we can't wait to promote your services.
          <? } else { ?>
          <!--<img src="<?php echo $user_image ?>" alt="<?php echo $twitter_name ?>" width="48" style="margin:0 10px 5px 0"/>--> 
          Thanks for keeping things up to date <?php echo $user->first_name ?>!
          <? } ?>
        </h1>
        <?php if ($email_verified==0 && $user->active==1) { ?>
        <div class="alert alert-danger center">Your email address is not verified yet. If you did not receive the email with the verification link please <a href="mailto:admin@personaltrainerwall.com">email</a> us now.</div>
        <? } ?>
        <?php if (isset($validate) && $validate==false && !$user_email_exist) { ?>
        <div class="alert-block alert-danger error"> Oops! Some of the profile information we require is wrong or missing. Please check and resubmit. </div>
        <? } ?>
        <?php if (isset($validate) && $validate==false && $user_email_exist) { ?>
        <div class="alert-block alert-danger error"> Oops! The email address is <strong>already registered with us!</strong> To access your account you must use the same method as you joined with.<br>
          <strong>Scenario:</strong> You may be have used the wrong social network to login with!<br>
          IE: If you are logging in with <strong>Twitter</strong> this time, you may have previously joined with <strong>Facebook</strong> <strong>or</strong> if you are logging in with <strong>Facebook</strong> this time, you may have previously joined with <strong>Twitter</strong>. <br>
          <br>
          <strong>Solution:</strong> Go back to the <a style="color:#0066CC;" href="http://personaltrainerwall.com/index.php?c=welcome&m=logoff">home page&gt;</a> and try the other join button. </div>
        <? } ?>
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h3 class="panel-title">Choose or change your free account type</h3>
          </div>
          <div class="panel-body">
            <p>
              <label class="inline checkbox">
                <input name="guestOption" type="radio" class="check" value="guest" <?php if ($user->guest==1 && $user->sponsor==0) { ?>checked<? } ?> onClick=set_guest_value('1');showHideDivGuests();>
                <span>Guest</span> </label>
              <label class="inline checkbox">
                <input name="guestOption" type="radio"  class="check" value="trainer" <?php if ($user->guest!=1) { ?>checked<? } ?> onClick=set_guest_value('0');set_sponsor_value('0');showHideDivTrainer();>
                <span>Personal Trainer</span> </label>
              <label class="inline checkbox">
                <input name="guestOption" type="radio" class="check" value="sponsor" <?php if ($user->sponsor==1 && $user->guest==1) { ?>checked<? } ?> onClick=set_sponsor_value('1');showHideDiv();>
                <span>Sponsor</span> </label>
            </p>
            <p><?php echo form_checkbox($show_retweets_chkbox); ?> <span>Yes add my data to the next Auto Tweets weekly list.</span> <!--<a href="/retweets/" target="_blank">More info.</a>--></p>
          </div>
        </div>
        <?php if ($user->guest!=1) { ?>
        <?php if ($user->subscribed!==1 && $user->approved==1 ) { ?>
        <section>
          <div class="well">
            <p><span class="label label-info">NEW</span> <strong>Hi <?php echo $user->first_name ?>, we are now tweeting the details of 100's of Personal Trainers 24/7 with <a href="/retweets/" target="_blank">PT Retweets</a>. To add yourself grab a subscription and select below for awesome promotion 24/7. <a href="http://personaltrainerwall.com/index.php?c=welcome&m=amember">Subscriptions</a></strong></p>
          </div>
        </section>
        <? } ?>
        
        <!--<div id="apps1" class="row">
    <div class="well">
      <div class="col-xs-4">
        <p><strong>iPad App </strong><span class="label label-success">Coming in 2013</span></p>
      </div>
      <div class="col-xs-8">
        <ul class="plain">
          <li>
            <label> <?php echo form_checkbox($show_apps_chkbox); ?> <span><strong>Yes:</strong> Include my profile information in the Personal Trainer Wall iPad app </span></label>
          </li>
        </ul>
      </div>
    </div>
  </div>-->
        
        <?php } ?>
        <div id="accordion" class="userDetails panel-group"> 
          
          <!----name location--->
          <div class="panel panel-default noPad">
            <div class="panel-heading">
              <h3> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">A bit about you </a></h3>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
              <div class="panel-body">
                <div class="clearfix row">
                  <fieldset class="col-sm-3">
                    <label for="firstName" class="">First Name </label>
                    <div class="input clearfix"> <?php echo form_input($first_name); ?> </div>
                    <label for="lastName" class="">Last Name </label>
                    <div class="input clearfix"> <?php echo form_input($last_name); ?> </div>
                    <span class="help-block"> <strong>Note:</strong> Only legal names here will be accepted. </span>
                    <div class="error"> <?php echo form_error('first_name'); ?> <?php echo form_error('last_name'); ?> </div>
                  </fieldset>
                  <fieldset class="col-sm-3">
                    <label for="emailAddress" class="">Email Address </label>
                    <div class="input clearfix"> <?php echo form_input($email); ?> </div>
                    <div class="input clearfix">
                      <label for="emailShow" class=""> Hide Email <?php echo form_checkbox($hide_email_chkbox); ?> </label>
                    </div>
                    <div class="error"><?php echo form_error('email'); ?></div>
                    <?php if ($email_verified==0) { ?>
                    <span class="help-block"> <strong>Note:</strong> An activation email will also be sent now. <a href="mailto:admin@personaltrainerwall.com">Click this link</a> to ensure the email does not go to your spam folder. </span>
                    <? } ?>
                  </fieldset>
                  <fieldset class="col-sm-3">
                    <?php
		  		if (form_error('country')) $country_class = 'form-control error'; else $country_class = 'form-control';
				if (form_error('state')) $state_class = 'form-control error'; else $state_class = 'form-control';
				if (form_error('county')) $county_class = 'form-control error'; else $county_class = 'form-control';
				if (form_error('city')) $city_class = 'form-control error'; else $city_class = 'form-control';
		   ?>
                    <label for="tag1" class="">Country </label>
                    <div class="input"><?php echo form_dropdown('country', $country_list, $country_id_selected,'onChange="getStates()" id=d_country class="'.$country_class.'"'); ?></div>
                    <label for="tag2" class="">State </label>
                    <div class="input"> <?php echo form_dropdown('state', $state_list, $state_id_selected,'onChange="getCounties()" id=d_state class="'.$state_class.'"'); ?> </div>
                    <label for="tag3" class="">County </label>
                    <div class="input clearfix"><?php echo form_dropdown('county', $county_list,$county_id_selected,'onChange="getCities()" id=d_county class="'.$county_class.'"'); ?> </div>
                    <input type="hidden" name="guest" id="guest" size="25" value="<?php echo $guest ?>">
                    <input type="hidden" name="sponsor" id="sponsor" size="25" value="<?php echo $sponsor ?>">
                    <div class="error"><?php echo form_error('country'); ?></div>
                    <div class="error"><?php echo form_error('state'); ?></div>
                    <div class="error"><?php echo form_error('county'); ?></div>
                  </fieldset>
                  <fieldset class="col-sm-3">
                    <label for="tag3" class="">City (USA Only) </label>
                    <div class="input clearfix"> <?php echo form_dropdown('city', $city_list,$city_id_selected,'id=d_city class="'.$city_class.'"'); ?> </div>
                  </fieldset>
                </div>
              </div>
            </div>
          </div>
          <!----end name location--->
          <?php if ($user->guest!=1) { ?>
          <!----services--->
          <div class="panel panel-default noPad" id="services1">
            <div class="panel-heading">
              <h3> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Services</a></h3>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in">
              <div class="panel-body">
                <div class="clearfix row">
                  <fieldset class="col-sm-3">
                    <label for="tag1" class="">Tag 1 </label>
                    <div class="input clearfix"> <?php echo form_dropdown('tag[1]', $tag_special_menu,$tags[1],'class=form-control id=tag[1] onchange="updateTweet()"'); ?> </div>
                    <label for="tag2" class="">Tag 2 </label>
                    <div class="input clearfix"> <?php echo form_dropdown('tag[2]', $tag_special_menu,$tags[2],'class=form-control id=tag[2] onchange="updateTweet()"'); ?> </div>
                    <label for="tag3" class="">Tag 3 </label>
                    <div class="input clearfix"> <?php echo form_dropdown('tag[3]', $tag_special_menu,$tags[3],'class=form-control id=tag[3] onchange="updateTweet()"'); ?> </div>
                  </fieldset>
                  <fieldset class="col-sm-3">
                    <label for="tag1" class="">Tag 1 </label>
                    <div class="input clearfix"><?php echo form_dropdown('tag[4]', $tag_sports_menu,$tags[4],'class=form-control id=tag[4] onchange="updateTweet()"'); ?> </div>
                    <label for="tag2" class="">Tag 2 </label>
                    <div class="input clearfix"><?php echo form_dropdown('tag[5]', $tag_sports_menu,$tags[5],'class=form-control id=tag[5] onchange="updateTweet()"'); ?> </div>
                    <label for="tag3" class="">Tag 3 </label>
                    <div class="input clearfix"><?php echo form_dropdown('tag[6]', $tag_sports_menu,$tags[6],'class=form-control id=tag[6] onchange="updateTweet()"'); ?> </div>
                  </fieldset>
                  <fieldset class="col-sm-3">
                    <label for="tag1" class="">Tag 1 </label>
                    <div class="input clearfix"> <?php echo form_dropdown('tag[7]', $tag_style_menu,$tags[7],'class=form-control id=tag[7] onchange="updateTweet()"'); ?> </div>
                    <label for="tag2" class="">Tag 2 </label>
                    <div class="input clearfix"> <?php echo form_dropdown('tag[8]', $tag_style_menu,$tags[8],'class=form-control id=tag[8] onchange="updateTweet()"'); ?> </div>
                    <label for="tag3" class="">Tag 3 </label>
                    <div class="input clearfix"> <?php echo form_dropdown('tag[9]', $tag_style_menu,$tags[9],'class=form-control id=tag[9] onchange="updateTweet()"'); ?> </div>
                  </fieldset>
                  <fieldset class="col-sm-3">
                    <label for="organization" class="">Accredited Orgs </label>
                    <div class="input clearfix"> <?php echo form_dropdown('training_org', $training_org_menu,$training_org_sel,'class=form-control'); ?> </div>
                    <label for="certification" class="">Certification </label>
                    <div class="input clearfix"> <?php echo form_dropdown('certificate', $certificate_menu,$certificate_sel,'class=form-control'); ?> </div>
                    <label for="regNo" class="">Reg No <a href="<?php echo base_url(); ?>info/approve-trainers-page.php" rel="facebox">Certification Tips</a></label>
                    <div class="input clearfix"> <?php echo form_input($cert_reg_no); ?> </div>
                    <label for="expDate" class="">Exp Date </label>
                    <div class="input clearfix"> 
                      <script language="JavaScript">
			new tcal ({
				// form name
				'formname': 'profile',
				// input name
				'controlname': 'cert_expiry'
			});

	</script> 
                      <?php echo form_input($cert_expiry); ?> </div>
                  </fieldset>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <?php if (($user->guest!=1) || ($user->guest==1 && $user->sponsor==1 )) { ?>
          <div class="panel panel-default noPad" id="more1" >
            <div class="panel-heading">
              <h3> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">More</a></h3>
            </div>
            <div id="collapseThree" class="panel-collapse collapse in">
              <div class="panel-body">
                <div class="clearfix row">
                  <fieldset class="col-sm-3">
                    <div class="input clearfix">
                      <?php if ($image_exist) { ?>
                      <img src="<?php echo base_url().$image_file ?>" alt="twitter" width="120" style="float:none;margin:0 10px 5px 0"/>
                      <?php } else { ?>
                      <img src="<?php echo base_url();?>images/default-profile-image.jpg" alt="twitter" width="120" style="float:none;margin:0 10px 5px 0"/>
                      <? } ?>
                    </div>
                    <?php if($user->active==0) { ?>
                    <span class="help-block">First finish this page then return here to upload your new image! It's a must for the quick approval.</span>
                    <? } ?>
                    <?php if($user->active==1) { ?>
                    <!--<a rel="width:800,height:600" class="mb" href=index.php?c=add&m=manage_user_pic&user_id=<?php echo $user_id ?>>Add/Edit Pic</a>--> 
                    <a title="Upload Profile Picture" class="" href="<?php echo base_url(); ?>index.php?c=add&m=image">Upload Profile Picture</a>
                    <? } ?>
                  </fieldset>
                  <fieldset class="col-sm-3">
                    <label for="emailAddress" class="">Phone Number </label>
                    <div class="input"> <?php echo form_input($phone_no); ?> </div>
                    <label for="phoneShow" class=""> Hide Phone </label>
                    <div class="input clearfix"> <?php echo form_checkbox($hide_phone_chkbox); ?> </div>
                    <label for="businessName" class="">Business Name (sponsors only) </label>
                    <div class="input clearfix"> <?php echo form_input($business_name); ?> </div>
                  </fieldset>
                  <fieldset class="col-sm-3">
                    <label for="facebookLink" class="">Additional Facebook URL </label>
                    <div class="input clearfix"><?php echo form_input($facebook_url); ?> </div>
                    <label for="myspaceLink" class="">My Workplace URL </label>
                    <div class="input clearfix"><?php echo form_input($workplace_url); ?> </div>
                    <span class="help-block">The http:// is not required here</span>
                    <label for="linkedinLink" class="">Linkedin URL </label>
                    <div class="input clearfix"> <?php echo form_input($linkedin_url); ?> </div>
                    <!--   <span class="help-block">The http:// is not required</span>-->
                  </fieldset>
                  <fieldset class="col-sm-3">
                    <label for="street_address" class="">Street address </label>
                    <div class="input clearfix"> <?php echo form_input($street_address); ?> </div>
                    <label for="mapShow" class=""> Hide Google Map </label>
                    <div class="input clearfix"> <?php echo form_checkbox($hide_google_map_chkbox); ?> </div>
                  </fieldset>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default noPad" id="message1">
            <div class="panel-heading">
              <h3> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Message</a></h3>
            </div>
            <div id="collapseFour" class="panel-collapse collapse in">
              <div class="panel-body">
                <div class="clearfix">
                  <fieldset>
                    <div class="inputs clearfix"> <small>Maximum characters: <strong>500</strong> You have
                      <input readonly type="text" name="countdown" size="5" value="500" style="float:none;font-size:11px;padding:0;margin:0;background-color:transparent;border:0;outline:none;font-weight:normal;width:auto; box-shadow: none;">
                      characters left.</small> </div>
                    <div class="input clearfix">
                      <textarea name="description" id="description" class="col-xs-6" cols="4" rows="4" onKeyDown="limitText(this.form.description,this.form.countdown,500);" onKeyUp="limitText(this.form.description,this.form.countdown,500);"><?php echo $description ?></textarea>
                    </div>
                  </fieldset>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <?php if ($auth_mode == 'twitter0' && 1==0): ?>
          <div class="panel panel-default noPad">
            <div class="panel-heading">
              <h3> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Tweet</a></h3>
            </div>
            <div id="collapseFive" class="panel-collapse collapse in">
              <div class="panel-body">
                <fieldset>
                  <textarea name="tweet" id="tweet" cols="4" rows="4">Added myself to http://www.personaltrainerwall.com a Personal Trainer directory under: #Fitness</textarea>
                </fieldset>
              </div>
            </div>
          </div>
          <?php endif ?>
          <!-- error in fields --> 
          <!-- end error in fields -->
          <div class="well clearfix"><span class="btn-std alt"> 
            <!--<input type="submit" name="submit" value="Update Profile!" class="btn-std" />-->
            <input type="submit" name="submit" value="Update Profile" class="btn-std" />
            <?php echo form_hidden($hidden_data); ?> </span>
            <?php if($user->active==0) { ?>
            <p class="pad"><small>You will receive an email to verify your email. Some times it can take a while. If you do not please email us to find out why not.</small></p>
            <? } ?>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
