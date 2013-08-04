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
          <?php if ($email_verified==0) {  ?>
          <img src="<?php echo $user_image ?>" alt="User image" width="48" style="float:left;margin:0 10px 5px 0"/>
          <? } ?>
          Welcome <strong><?php echo $twitter_name ?></strong><br>
            It's fast and easy to join the wall
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
