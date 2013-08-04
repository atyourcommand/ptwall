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
 
// Implement business logic    
function getCounties(){    
    httpObject = getHTTPObject();
    if (httpObject != null) {
		httpObject.open("GET", "index.php?c=ajaxcalls&m=get_users_per_county&state_id="+document.getElementById('state').value, true);
        httpObject.onreadystatechange = setOutput;
        httpObject.send(null);
    }
}

 
var httpObject = null;
 
//-->
</script>
<!-- start wrapper -->

<div id="wrapper">
<!--<div id="pointer"><img src="images/pointer.png" width="130" height="106"/></div>
-->
<!-- start headerWrapper -->
<div id="headerWrapper">
  <!-- start header -->
  <!-- <div id="header"> -->
  <!-- start navigation-->
  <!-- end navigation-->
  <!--</div>-->
  <!-- end header content -->
</div>
<!-- end headerWrapper content -->
<!--start template-->
<!--start grid-->
<div id="pageWrapper">
<!--start tabs-->
<div class="qtabs-wrapper qtwrap-lft-blue1" id="qtwrap-ex4">
  <!--<div class="qthead-lft-blue1">
    <ul class="qtabs" id="qtabs-ex4">
      <li id="wall"><span>Personal Trainer Wall</span></li>
      <li id="map"><span>Google Map of Personal Trainers</span></li>
      <li id="featured"><span>Featured Personal Trainers</span></li>
    </ul>
  </div>-->
  <!--end tabs-->
  <!--start Tab Container-->
  <div class="qtcurrent current-lft-blue1" id="current-ex4">
    <!--start page-->
    <div id="page" class="qtcontent container showgrid">
      <div id="recordWrap" class="clearfix">
        <?php if ($user_logged_in && $email_verified==0) { ?>
        <p class="validation error"> <?php echo $email_verified_msg ?> </p>
        <? } ?>
        <div class="controls clearfix corners">
          <form name="test_form" id="function_search_form" action="index.php?c=welcome&m=index" method="post">
            <p class="inputs clearfix">
              <label class="chk">
              <input name="country" type="radio" class="check" onChange="this.form.submit()" value="223" <?php if ($country==223) { ?>checked="checked" <? } ?>/>
              United States</label>
              <label class="chk">
              <input type="radio" class="check" name="country" value="13" onChange="this.form.submit()"<?php if ($country==13) { ?>checked="checked" <? } ?> />
              Australia</label>
              <label class="chk">
              <input type="radio" class="check" name="country" value="38"  onChange="this.form.submit()" <?php if ($country==38) { ?>checked="checked" <? } ?>/>
              Canada</label>
              <label class="chk">
              <input type="radio" class="check" name="country" value="240"  onChange="this.form.submit()" <?php if ($country==240) { ?>checked="checked" <? } ?>/>
              England</label>
              <label class="chk">
              <input type="radio" class="check" name="country" value="241"  onChange="this.form.submit()" <?php if ($country==241) { ?>checked="checked" <? } ?>/>
              Ireland</label>
              <label class="chk">
              <input type="radio" class="check" name="country" value="242"  onChange="this.form.submit()" <?php if ($country==242) { ?>checked="checked" <? } ?>/>
              Scotland</label>
              <label class="chk">
              <input type="radio" class="check" name="country" value="243"  onChange="this.form.submit()" <?php if ($country==243) { ?>checked="checked" <? } ?>/>
              Wales</label>
              <br />
            </p>
            <p class="inputs clearfix"> </p>
            <p class="clearfix inputs">
              <label for="state" class="lbl_med">Choose state <?php echo form_dropdown('state', $state_list,$state_selected,'id=state onChange="this.form.submit();" class=slt_med'); ?> </label>
              <label for="region" class="lbl_med">Choose County <?php echo form_dropdown('county', $county_list, $county_selected,'id=county class=slt_med onChange=this.form.submit()'); ?> </label>
              <label for="sort by" class="lbl_med" style="none">Sort by <?php echo form_dropdown('sort_menu', $sort_menu, $sort_selected,'id=sort_menu class=slt_med onChange=checkSort()'); ?> </label>
              <label for="specialities" class="lbl_med" id="sort_criteria">Choose <?php echo form_dropdown('sort_options', $sort_options, $sort_options_selected,'class=slt_med onChange=this.form.submit()'); ?> </label>
            </p>
            <p class="inputs clearfix"> <?php echo form_hidden($hidden_data); ?> </span></p>
          </form>
        </div>
        <div id="map_canvas" class="" style="width: 100%; height: 430px;"> </div>
        <div class="gallery_container" id="gallery_container1">
          <div id="thumb_container" class="thumb_container">
            <div id="thumbs1" class="thumbs clearfix">
          
            </div>
          </div>
        </div>
        <p style="text-align:center;"><small>Your <a href="mailto:admin@ptwall.com?subject=Message from PT Wall Website">feedback and suggestions</a> are greatly valued to make this a fun, professional and genuine resource and sorry no <strong>GYMS, COWBOYS, Slick LOGOS or HEALTHSHAKE COMPANIES.</strong><br />
          If we do not think that you use Twitter and this site to promote your professional services you will be <strong>booted off without notice</strong>. <a href="mailto:admin@ptwall.com?subject=Report a Cowboy from PT Wall Website">Report a Cowboy PT here</a></small></p>
      </div>
      <div id="login">
        <?php if ($user_logged_in) { ?>
        <img src="<?php echo $user_image ?>" alt="twitter" width="48" style="float:left;margin:0 10px 10px 0"/>
        <p><a href="index.php?c=add&m=profile">MY PROFILE </a> | <a href="index.php?c=welcome&m=logoff">LOGOFF</a><br />
          <!--<a href="http://www.ptwall.com/amember/signup.php">Register and get it </a>&nbsp;or&nbsp;-->
          <a href="index.php?c=welcome&m=amember">MY SUBSCRIPTION </a>&mdash; Grab the free upgrade to get new Features as they are added</p>
        <?php } else { ?>
        <p><a href="<?php echo $request_url ?>">Trainers login here</a></p>
        <?php } ?>
      </div>
	  <!--start code for the modalbox for update account -->
<div class="generic_dialog fb-modal" id="modal_updated">
  <div class="informationBox corners">
    <div class="padding">
      <div class="inner">
        <h2 class="resourceTitle">PTWall Account </h2>
        <div class="topContainer clearfix">
          <!--<div class="imageContainer"> <a href="#"><img src="<?php echo $user_image ?>" alt="ptwall-thumb" width="48" height="48" /></a></div>-->
          <div class="listContainer" style="padding:0 20px;">
            <p class="validation success">Personal Trainer profile has been added/updated.</p>
            <p><strong>NB:</strong> To keep your profile active you must complete and maintain all your <strong>Personal Trainer qualifications and insurance</strong> details and they must be current at all times.<br />
              <!--Partial or incomplete details are not acceptable and your profile may be deleted without notice if they are not completed within 14 days.-->
            </p>
            <p>On the home page there is a link called <strong>My Subscription</strong> where you view the account that we have created for you.<br />
              You will see an <strong>Upgrade</strong> subscription offer that you can purchase (currently free) to show users more  about your services. </p>
          </div>
        </div>
        <!-- <div class="messages">
         <p><span><a href="#">Very important disclaimer message</a></span></p>
        </div>-->
        <div class="button clearfix"> <span class="btn-std">
          <input type="button" value="Close" name="close" class="btn-std fb-close closer" />
          </span></div>
      </div>
    </div>
  </div>
</div>
<!--start code for the modalbox for update account-->
    </div>
    <!-- end page -->
	<!-- start page -->
	<!--<div id="page" class="qtcontent container showgrid"> 
      This page is being developed
    </div>-->
	<!-- end page -->
	<!-- start page -->
   <!-- <div id="page" class="qtcontent container showgrid">
       This page is being developed
      <img src="images/strawberry.jpg" alt="">
    </div>-->
   <!-- end page -->
	
	
  </div>
  <!--end Tab Container-->
</div>
<!-- end pageWrapper -->
</div>
<script type="text/javascript">

window.addEvent('domready', function(){ 
  var opt = {
    autoplay: true,
    delay: 2500000,//2500,
    duration: 200,
    scrolling: 'lr'
  };
  var t=new QTabs('ex4', opt); 
})

</script>