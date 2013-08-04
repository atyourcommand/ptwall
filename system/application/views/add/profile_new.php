<!-- Calendar -->
<script src="<?php echo base_url(); ?>scripts/calendar_eu.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>scripts/switcher.js" type="text/javascript"></script>
<script type="text/javascript">
function updateTweet(){   

	base = "Added myself to http://www.ptwall.com a Personal Trainer directory under: ";
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

function showHideDiv()
    {
        var divstyle = new String();
        divstyle = document.getElementById("services1").style.display;
        if(divstyle.toLowerCase()=="block" || divstyle == "")
        {
            document.getElementById("services1").style.display = "none";
            document.getElementById("more1").style.display = "none";
            document.getElementById("message1").style.display = "none";
       
        }
        else
        {
            document.getElementById("services1").style.display = "block";
            document.getElementById("more1").style.display = "block";
            document.getElementById("message1").style.display = "block";

        }
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
<div id="pageWrapper">
  <div id="wrapper">
    <div id="page">
      <div class="content">
        <div class="messageBlock clearfix">
          <?php if($user->approved==0) { ?>
          <?php if ($email_verified==1) {  ?>
          <img src="<?php echo $user_image ?>" alt="User image" width="48" style="float:left;margin:0 10px 5px 0"/>
          <? } ?>
		  <p class="inputs">
          Welcome <strong><?php echo $twitter_name ?></strong>
 Are you joining as a Guest or Personal Trainer?<br>
                  
             <label>
               <input type="radio" name="guestOption" value="trainer" class="check" checked onClick=set_guest_value('0');showHideDiv();>
               Personal Trainer</label>
           
             <label>
               <input name="guestOption" type="radio" class="check" value="guest" onClick=set_guest_value('1');showHideDiv();>
               Guest</label>
             </p>
           
          <? } ?>
          <?php if($user->approved==1) { ?>
          <img src="<?php echo $user_image ?>" alt="User image" width="48" style="float:left;margin:0 10px 5px 0"/>
         Hello <strong><?php echo $twitter_name ?></strong><br>
            Keep your certifications and tags up to date below. 
          <? } ?>
        </div>
        <?php if (isset($validate) && $validate==false) { ?>
        <div class="ui-state-error ui-corner-all" style="padding: 0 .7em; vertical-align:middle;">
          <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> Oops! Some of the profile information we require is wrong or missing. Please check and resubmit.</p>
        </div>
        <br>
        <? } ?>
        <form name="profile" action="index.php?c=add&m=profile" method="post">
          <div class="userDetails">
            <ul>
              <li class="expanders">
			  <div class="padd quick corners">
			   <a class="toggle" href="#">QUICK JOIN <span style="font-weight:normal;">Complete this &amp; submit </span></a>
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
                      <p class="message"><strong>To future proof, choose a non-work email address.<br>
                        An activation email will also be sent. </strong></p>
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
                  
                        <input type="hidden" name="guest" id="guest" size="25" value="0">
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
		<div class="padd corners" id="services1">
                <a class="toggle" href="#">About your services</a>
                <ul>
                  <li>
                    <div class="clearfix row">
                      <fieldset class="narrow">
                      <legend><span><b>5</b> Speciality Tags</span></legend>
                      <p class="inputs clearfix">
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
