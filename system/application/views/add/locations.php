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
        var combo = document.getElementById('county');
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
        var combo = document.getElementById('state');
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
        var combo = document.getElementById('city');
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
		httpObject.open("GET", "index.php?c=ajaxcalls&m=get_cities&state_id="+document.getElementById('state').value+"&country_id="+document.getElementById('country').value+"&county_id="+document.getElementById('county').value, true);
        httpObject.onreadystatechange = setOutputForCity;
        httpObject.send(null);
    }
}

// Implement business logic    
function getCounties(){    
    httpObject = getHTTPObject();
    if (httpObject != null) {
		httpObject.open("GET", "index.php?c=ajaxcalls&m=get_counties&state_id="+document.getElementById('state').value+"&country_id="+document.getElementById('country').value, true);
        httpObject.onreadystatechange = setOutput;
        httpObject.send(null);
    }
}
 
// Implement business logic    
function getStates(){    
    httpObject = getHTTPObject();
    if (httpObject != null) {
		httpObject.open("GET", "index.php?c=ajaxcalls&m=get_states&country_id="+document.getElementById('country').value, true);
        httpObject.onreadystatechange = setOutputForState;
        httpObject.send(null);
    }
}



var httpObject = null;
 
//-->
</script>
<body <?php if ($email_verified==0 && $user_exist) { ?> onLoad="setDisabled('extended_info', true)" <?php } ?>>
<!--start browse-->
<div id="reg">
<!--start short promo here-->
<!--end short promo here-->
<ul id="expanders" class="expandy-1 sortlists">
  <li id="reg" class="toggle">
    <div id="topBar" class="clearfix">
      <!--<h2 class="strapline">Find a Personal Trainer | <span>Register as a
              <definition title="Only fully Qualified, Accredited and Insured Personal Trainer are invited">Personal Trainer</definition>
              </span></h2>-->
      <!--  <a href="/blog/" class="blog"><strong>Bread Crumb</strong></a>-->
    </div>
  </div>
  </div>
  </div>
  </div>
  </li>
</ul>
</div>
<!--end browse-->
<!-- start wrapper -->
<div id="wrapper">
  <!-- start headerWrapper -->
</div>
<!-- end headerWrapper content -->
<!--start template-->
<!--start grid-->
<div id="pageWrapper">
  <div id="page" class="container">
    <!--start introduction-->
    <div class="introBig span-24 last">
      <div class="span-24 last">
        <!--<ol>
            <li>If you are not a Personal Trainer please leave this page now </li>
            <li>Your profile will be deleted after 3 months but you can rejoin at anytime for another 3 months </li>
            <li>If it looks like a you are not a Personal Trainer or a Twitter spammer we will remove you from the site without notice </li>
          </ol>-->
      </div>
    </div>
    <!-- end intro -->
    <div class="span-24 last">
      <h3>Welcome <strong><?php echo $twitter_name ?></strong>, tell us about your Personal Training Services</h3>
	  <p>In a hurry? <strong>Just do section 1, 5 and 8</strong> and you are good to go.</p>
      <form name="profile" action="index.php?c=add&m=locations" method="post">
        <!-- email not verified -->
        <?php if ($email_verified==0 && $user_exist) { ?>
        <p> <?php echo $email_verified_msg ?> </p>
        <? } ?>
        <!-- email not verified-->
        <div class="userDetails padd corners clearfix">
          <fieldset class="narrow">
          <legend><span><b>1</b> Location</span></legend>
          <p class="inputs clearfix message">Must chose county <strong>and</strong> state !</p>
          <p class="inputs clearfix">
          <?php
		  		if (form_error('country')) $country_class = 'slt_med error'; else $country_class = 'slt_med';
				if (form_error('state')) $state_class = 'slt_med error'; else $state_class = 'slt_med';
				if (form_error('county')) $county_class = 'slt_med error'; else $county_class = 'slt_med';
				if (form_error('city')) $city_class = 'slt_med error'; else $city_class = 'slt_med';
		   ?>
          
            <label for="tag1" class="lbl_med">Country <?php echo form_dropdown('country', $country_list, $country_id_selected,'onChange="getStates()" id=country class="'.$country_class.'"'); ?> </label>
          </p>
          <p><?php echo form_error('county'); ?></p>
          </fieldset>
          <fieldset class="narrow">
          <legend><span><b>2</b> Speciality Tags</span></legend>
          <p class="inputs clearfix message">Accreditations or leave General</p>
          <p class="inputs clearfix">
		  <label for="tag2" class="lbl_med">State <?php echo form_dropdown('state', $state_list, $state_id_selected,'onChange="getCounties()" id=state class="'.$state_class.'"'); ?> </label>
          </p>
          <p class="inputs clearfix message"></p>
          </fieldset>
          <fieldset class="narrow">
          <legend><span><b>3</b> Sports Specific Tags</span></legend>
          <p class="inputs clearfix message">Accreditations or leave General</p>
          <p class="inputs clearfix">
		  <label for="tag3" class="lbl_med">County <?php echo form_dropdown('county', $county_list,$county_id_selected,'onChange="getCities()" id=county class="'.$county_class.'"'); ?> </label>	
          </p>
          <p class="inputs clearfix message"></p>
          </fieldset>
          <fieldset class="narrow">
          <legend><span><b>4</b> Style Tags</span></legend>
          <p class="inputs clearfix message">Go nuts</p>
          <p class="inputs clearfix">
		    <label for="tag4" class="lbl_med">City <?php echo form_dropdown('city', $city_list,$city_id_selected,'id=city class='.$city_class.'); ?> </label>
          </p>
          </fieldset>
          <p class="inputs clearfix"><span class="btn-std">
            <!--<input type="submit" name="submit" value="Update Profile!" class="btn-std" />-->
			<input type="submit" name="submit" value="Update Profile!" />
            <?php echo form_hidden($hidden_data); ?> </span></p>		  
        </div>
        <h3>Ok, lets get serious about your Training and Certification</h3>
        <div class="userDetails padd corners clearfix">

		              <fieldset class="narrow">
					<legend><span><b>2</b> Speciality Tags</span></legend>
					</fieldset>
         <table border="1">
			<tr>
				<td>row 1, cell 1</td>
				<td>row 1, cell 2</td>
				<td>row 1, cell 2</td>
				<td>row 1, cell 2</td>
			</tr>
			<tr>
				<td>row 1, cell 1</td>
				<td>row 1, cell 2</td>

			</tr>			
		</table>

		  <br class="clear"/>
		  
        </div>
        <!--<h3>About you </h3>-->
		<!--<p class="validation success">Section 9 - 12 displays on your profile when you have an active <strong>Upgrade Subscription</strong><strong>.</strong><br>
		</p>-->
        
      </form>
    </div>
    <!-- end grid -->
  </div>
</div>
<!-- end pageWrapper -->
<!--end template-->
