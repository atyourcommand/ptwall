<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<?php
	$header_data = get_header_data();
	$auth_mode = header_get_auth_mode();
?>
<?php if ($title) { ?>
<title>Personal Trainer<?php echo $title; ?></title>
<?php } else {  ?>
<title>Personal Trainer Directory - Personal Trainer Wall - Personal Training in your city</title>
<?php } ?>
<!--<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="EXPIRES" CONTENT="Sat, 11 Sep 2010 2:54:01 GM>-->
<meta name="resource-type" content="document" />
<meta http-equiv="content-language" content="en-us" />
<meta http-equiv="author" content="John Brunskill" />
<meta http-equiv="contact" content="atyourcommand@mac.com" />
<meta name="copyright" content="Copyright (c)2010 John Brunskill. All Rights Reserved." />
<meta name="keywords" content="personal trainer directory, certified personal trainers, personal trainer profiles, <?php echo $keywords; ?>"/>
<meta name="description" content="Personal Trainer <?php echo $keywords; ?>. Find a Personal Trainer on our Personal Trainer Directory search city, name, sports, specialty and style tags" />
<meta name="google-site-verification" content="fcwsX3aygglRvnBc-iFc0KcGB-PhD0Ya9iXzOTi-bcc" />
<!--Facebook Open Graph Protocol Tags-->
<meta property="og:title" content="Personal Trainer Directory "/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="http://personaltrainerwall.com/"/>
<meta property="og:image" content="http://personaltrainerwall.com/images/logo-alt-2.png"/>
<meta property="og:site_name" content="Personal Trainer Wall"/>
<meta property="og:description" content="100's of profiles of Independent Certified Personal Trainers"/>
<meta property="og:email" content="admin@personaltrainerwall.com"/>
<meta property="fb:app_id" content="130355453666011"/>

<!---->
<link rel="shortcut icon" type="image/ico" href="favicon.ico" />
<link rel="apple-touch-icon" href="apple-touch-icon.png"/>
<!--for mobile devices-->
<meta name = "viewport" content = "width = device-width">
<!--iphone stop pinch zooming-->
<?php if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') == TRUE){ ?>
<meta name="viewport" content="width=device-width; height=device-height; minimum-scale=1.0, maximum-scale=1.0" />
<?php } ?>
<?php
if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') == TRUE)
{

	echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."blog/wp-content/themes/ptwall/css/style.css\">");
	echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."blog/wp-content/themes/ptwall/css/iphone.css\">");
	echo("<style link rel=\"stylesheet\" type=\"text/css\"></style>");
}
else
{
	echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."blog/wp-content/themes/ptwall/css/style.css\"/>");
}
?>
<!--[if IE]>
<link rel="stylesheet" href="<?php echo base_url(); ?>blog/wp-content/themes/ptwall/css/ie.css" type="text/css" media="screen, projection">
<![endif]-->
<!--[if lt IE 7.]>
<script defer type="text/javascript" src="/scripts/bgsleight.js"></script>
<script defer type="text/javascript" src="/scripts/sleight.js"></script>
<![endif]-->
<!-- Error Box -->
<link type="text/css" href="<?php echo base_url(); ?>css/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<!-- Auto complete-->
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/autosuggest/js/bsn.AutoSuggest_c_2.0.js"></script>
<!--Flip-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>-->
<!--BreadCrumb-->
<script src="<?php echo base_url(); ?>scripts/breadcrumbs/jquery.easing.1.3.js" type="text/javascript" language="JavaScript"></script>
<script src="<?php echo base_url(); ?>scripts/breadcrumbs/jquery.jBreadCrumb.1.1.js" type="text/javascript" language="JavaScript"></script>
<script src="<?php echo base_url(); ?>scripts/facebox.js" type="text/javascript"></script>
<script charset="utf-8" type="text/javascript">
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox();
}) 
</script>
<!--delays images loading when not in the viewport -->
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/lazyload.js"></script>
<script charset="utf-8" type="text/javascript">
      $(function() {          
          $("img.main").lazyload({
             placeholder : "http://personaltrainerwall.com/images/grey.gif",
             effect      : "fadeIn"
          });
      });
  </script>
<!--Container Collapse for search options -->
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/collapse.js"></script>
<!--menu switcher-->
<script src="<?php echo base_url(); ?>scripts/switcher.js" type="text/javascript"></script>
<!--Tooltips-->
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/tipsy.js"></script>
<script type='text/javascript'>
$(function() {
    $('.fade').tipsy({fade: true});  
    $('.format').tipsy({html: true });
});
</script>
<!--ajax calls-->
<script type="text/javascript">
function checkSort(){   
	 var x=document.getElementById("sort_menu");
	  var y = document.getElementById("sort_criteria");	
	
	 if (x.selectedIndex > 3)
	 	y.style.display = "block";	
	else
	    var z=document.getElementById("function_search_form");
		z.submit();
	 	y.style.display = "none";
    }
 
</script>
<?php if($show_update_modal) { ?>
<? } ?>
<script type="text/javascript">
//http://davidwalsh.name/persistent-header-opacity
$(document).ready(function() {
	(function() {
		//settings
		var fadeSpeed = 200, fadeTo = 0.5, topDistance = 30;
		var topbarME = function() { $('#headerContainer').fadeTo(fadeSpeed,1); }, topbarML = function() { $('#headerContainer').fadeTo(fadeSpeed,fadeTo); };
		var inside = false;
		//do
		$(window).scroll(function() {
			position = $(window).scrollTop();
			if(position > topDistance && !inside) {
				//add events
				topbarML();
				$('#headerContainer').bind('mouseenter',topbarME);
				$('#headerContainer').bind('mouseleave',topbarML);
				inside = true;
			}
			else if (position < topDistance){
				topbarME();
				$('#headerContainer').unbind('mouseenter',topbarME);
				$('#headerContainer').unbind('mouseleave',topbarML);
				inside = false;
			}
		});
	})();
});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-740836-29']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<meta name="google-site-verification" content="UIg_SUpTjlC9SFiNRmUvTnMQk9zi1FnLK1l1EB6G2ds" />
</head>
<?php 
	if ($controller=="trainers"){ ?>
<!--<body onload="initialize();showAddress('<?php echo $geo; ?>');" onunload="GUnload()">-->
<body>
<? } else { ?>
<body class="wall">
<? } ?>
<!--This is where the message on load goes removed temporarily-->

<!--start new country dropdown-->

<script type="text/javascript">
		$(function () {
			var $alert = $('#alert');
			if($alert.length)
			{
				var alerttimer = window.setTimeout(function () {
					$alert.trigger('click');
				}, 3000);
				$alert.animate({height: $alert.css('line-height') || '50px'}, 200)
				.click(function () {
					window.clearTimeout(alerttimer);
					$alert.animate({height: '0'}, 200);
				});
			}
		});
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
/*
window.addEvent('domready',function(){
									

	
	 var x=document.getElementById("sort_menu");
	  var y = document.getElementById("id");	
	
	if (x.selectedIndex==4)
		y.style.display = "block";

});*/

//-->
</script>
<!-- start header content -->
<div id="headerContainer">
  <div id="header" class="clearfix">

    <!--Search-->
    <!--Message-->
  
      <div class="mainSearch">
	  <form name="test_form" id="function_search_form" action="<?php echo base_url(); ?>index.php?c=welcome&m=index" method="post">
      <!--start smartSearchWrap-->
      <div class="clearfix smartSearchWrap" style="display:block;">
        <div class="clearfix column smartSearch">
          <label for="search_for_anything" class="lbl_lg">
          <input  id="location" type="text"  onblur="if (this.value == '') {this.value = 'type your city ...';}" onfocus="if (this.value == 'type your city ...') {this.value = '';}" value="type your city ..." name="search_by_city" class="input_lg" />
          </label>
          <span class="extraLabel">or</span> </div>
        <div class="clearfix column smartSearch">
          <label for="search_for_anything" class="lbl_lg">
          <input  id="name" type="text"  onblur="if (this.value == '') {this.value = 'type a first name ...';}" onfocus="if (this.value == 'type a first name ...') {this.value = '';}" value="type a first name ..." name="search_by_name" class="input_lg" />
          </label>
          <span class="extraLabel">or</span> </div>
        <div class="clearfix column smartSearch">
          <label for="search_for_anything" class="lbl_lg">
          <input  id="tag" type="text"  onblur="if (this.value == '') {this.value = 'type a tag ...';}" onfocus="if (this.value == 'type a tag ...') {this.value = '';}" value="type a tag ..." name="search_by_tag" class="input_lg" />
          </label>
        </div>
      </div>
      <!--end smartSearchWrap-->
      <!--start drill down-->
      <!--collapse container-->
      <div class="options">
        <ul>
          <li class="widget"> <a href="#" class="toggle">&nbsp;</a>
            <ul>
              <li>
                <p class="inputs clearfix">
                  <?php 
			$data = get_location_drops();
			$state_list = $data['state_list'];			
			$county_list = $data['county_list'];
			$sort_options = $data['sort_options'];
			
			$county_selected = $data['county_selected'];
			$state_selected = $data['state_selected'];
			$hidden_data = $data['hidden_data'];
		
		?>
                  <label for="state" class="lbl_sm" style="margin:0 10px 0 0;"><span style="display:none;">Choose state</span> <?php echo form_dropdown('state', $state_list,$state_selected,'id=state onChange="this.form.submit();" class=slt_sm'); ?> </label>
                  <label for="region" class="lbl_sm" style="margin:0 10px 0 0;"><span style="display:none;">Choose County</span> <?php echo form_dropdown('county', $county_list, $county_selected,'id=county class=slt_sm onChange=this.form.submit()'); ?> </label>
                  <!-- <label for="sort_by" class="lbl_sm" style="text-indent:-2000px;"><span style="display:none;">Sort by </span><?php echo form_dropdown('sort_menu', $sort_menu, $sort_selected,'id=sort_menu class=slt_sm onChange=checkSort()'); ?> </label>
            
			<?php if ($sort_selected=="joined" || $sort_selected=="statuses_count" || $sort_selected=="followers_count" || $sort_selected=="friends_count") { ?>
            <label for="specialities" class="lbl_sm" id="sort_criteria" style="text-indent:-2000px;display: none;"><span style="display:none;">Choose </span><?php echo form_dropdown('sort_options', $sort_options, $sort_options_selected,'class=slt_sm onChange=this.form.submit()'); ?> </label>
            <?} else { ?>
            <label for="specialities" class="lbl_sm" id="sort_criteria" style="text-indent:-2000px;"><span style="display:none;">Choose </span><?php echo form_dropdown('sort_options', $sort_options, $sort_options_selected,'class=slt_sm onChange=this.form.submit()'); ?> </label>
            <? } ?> -->
                  <label for="specialities" class="lbl_sm" id="sort_criteria" style="margin:0 10px 0 0;"><span style="display:none;">Choose </span><?php echo form_dropdown('sort_options', $sort_options, $sort_options_selected,'class=slt_sm onChange=this.form.submit()'); ?> </label>
                  <input type="hidden" name="search_by_name_id" id="search_by_name_id" value="" />
                  <input type="hidden" name="search_by_location_id" id="search_by_location_id" value="" />
                  <input type="hidden" name="search_by_tag_id" id="search_by_tag_id" value="" />
                  <input type="hidden" name="country" id="country" value="<?php echo $hidden_data['country'] ?>" />
                </p>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!--end collapse container-->
    </form>
  </div>
<!--End Search-->
<script type="text/javascript">
		var options = {
			script:"index.php?c=ajaxcalls&m=get_search&json=true&",
			varname:"input",
			json:true,
			callback: function (obj) { document.getElementById('testid').value = obj.id; 
			
			}
		};
		//var as_json = new AutoSuggest('search_input', options);
		
		
		var options_search_name_xml = {
			script:"index.php?c=ajaxcalls&m=get_search_by_name&",
			minchars: 2,
			varname:"input",
			callback: function (obj) { document.getElementById('search_by_name_id').value = obj.id;;document.getElementById("function_search_form").submit(); }
		};
		
		var options_search_city_xml = {
			script:"index.php?c=ajaxcalls&m=get_search_by_location&",
			minchars: 2,
			varname:"input",
			timeout:5000,
			callback: function (obj) { document.getElementById('search_by_location_id').value = obj.id;;document.getElementById("function_search_form").submit(); }
		};		
		
		var options_search_tag_xml = {
			script:"index.php?c=ajaxcalls&m=get_search_by_tag&",
			minchars: 2,
			varname:"input",
			callback: function (obj) { document.getElementById('search_by_tag_id').value = obj.id;;document.getElementById("function_search_form").submit(); }
		};
		
		var as_xml = new AutoSuggest('name', options_search_name_xml);
		var as_xml_location = new AutoSuggest('location', options_search_city_xml);
		var as_xml_tag = new AutoSuggest('tag', options_search_tag_xml);
		
	</script>


</div>
<!-- end header -->
</div>
<!-- end header container -->
    <!--login start-->
    <div id="loginArea" class="clearfix">
      <h1 id="production"><a href="/" class="fade format" original-title="Home">
        <?php 
if ($controller=="trainers"){ ?>
        Personal Trainer <?php echo $title; ?>
        <? } else { ?>
        Find a Personal Trainer &mdash; Personal Trainer Directory
        <? } ?>
        </a> </h1>
      <?php if ($user_logged_in && $auth_mode!=-1) { ?>
      <span class="loggedIn corners">Hello:<strong><?php echo $user->first_name ?></strong></span>
      <ul id="navAccount">
        <!-- <li> <a href="<?php echo base_url(); ?>newsletters/2010/october/newsletter-1.html">Newsletter</a> </li>-->
        <!--<li> <a href="<?php echo base_url(); ?>index.php">Home</a> </li>-->
        <li><a title="About Personal Trainer Wall" href="about.html">About</a>
          <!--<ul class="dropdown-menu" id="dropdown1">
            <li class="links">
              <p><a href="http://au.linkedin.com/in/johnbrunskill" title="let's keep it professional"><img src="http://personaltrainerwall.com/newsletters/images/linkedin_16.png" width="16" height="16" border="0" /></a><a href="http://www.facebook.com/apps/application.php?id=130355453666011" title="Be friendly"><img src="http://personaltrainerwall.com/newsletters/images/facebook_16.png" width="16" height="16" border="0"  /></a><a href="https://twitter.com/ptwallguy" title="let's tweet together"><img src="http://personaltrainerwall.com/newsletters/images/twitter_16.png" width="16" height="16" border="0" /></a><a href="mailto:admin@personaltrainerwall.com?subject=Message from the PT Wall Newsletter" title="Any questions?"><img src="http://personaltrainerwall.com/newsletters/images/email_16.png" width="16" height="16" border="0"/></a></p>
            </li>
            <li> <a href="<?php echo base_url(); ?>info/iphone.php" rel="facebox">iphone app too?</a> </li>
          </ul>-->
        </li>
        <li> <a href="<?php echo base_url(); ?>blog">Blog</a> </li>
        <li><a title="My Account" id="dd2" class="myAccountTrigger dropdown" href="#" rel="dropdown2">My Account</a>
          <ul class="dropdown-menu" id="dropdown2">
            <li><img src="<?php echo get_user_thumb($user->user_id); ?>" alt="Personal Trainer - <?php echo $user->first_name." ".$user->last_name ?> " width="48" border="0"/>
              <p style="font-weight: bold;">Hi <?php echo $user->first_name." ".$user->last_name ?></p>
              <hr class="divider"/>
            </li>
            <li class="clearfix" id="edit"><a title="Edit My Profile" class="" href="<?php echo base_url(); ?>index.php?c=add&m=profile"><span></span>Edit My Profile </a></li>
            <?php if ($user->active) { ?>
            <li class="clearfix" id="upload"><a title="Upload Profile Picture" class="" href="<?php echo base_url(); ?>index.php?c=add&m=image"><span></span>Upload Profile Picture</a></li>
            <?php } ?>
            <li class="clearfix" id="logout"><a title="Logout" class="" href="<?php echo base_url(); ?>index.php?c=welcome&m=logoff"><span></span>Logout </a>
              <hr class="divider"/>
            </li>
            <?php if ($user->active) { ?>
            <li class="clearfix" id="subscription"><a title="My Subscription" id="" class="" href="<?php echo base_url(); ?>index.php?c=welcome&m=amember"><span></span>My Subscription </a></li>
            <?php } ?>
            <li class="clearfix" id="subscriptionInfo"><a title="Subscription Stuff" rel="facebox" class="" href="<?php echo base_url(); ?>info/upgrade.php"><span></span>Subscription Stuff </a></li>
          </ul>
        </li>
        <?php if (strlen($user->first_name)>0) { ?>
        <li><a title="My Page" id="" href="<?php echo base_url(); ?>index.php/personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>"><span>My Page</span></a></li>
        <?php } ?>
      </ul>
      <?php } else { ?>
      <ul id="navAccount">
        <!-- <li> <a href="http://personaltrainerwall.com/sitemap.php">Sitemap</a></li>
        <li> <a href="<?php echo base_url(); ?>newsletters/2010/october/newsletter-2.html">Newsletter</a> </li>-->
        <!-- <li> <a href="<?php echo base_url(); ?>index.php">Home</a> </li>-->
		 <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') == FALSE) { ?>
		  <li> <a href="<?php echo base_url(); ?>info/join.php" rel="facebox">How to join?</a> </li>
		 <? } ?>
        <li><a title="My Account" id="dd1" class="myAccountTrigger dropdown" href="#">About</a>
          <ul class="dropdown-menu" id="dropdown1">
            <li class="links">
              <p><a href="http://au.linkedin.com/in/johnbrunskill" title="let's keep it professional"><img src="http://personaltrainerwall.com/newsletters/images/linkedin_16.png" width="16" height="16" border="0" /></a><a href="http://www.facebook.com/apps/application.php?id=130355453666011" title="Be friendly"><img src="http://personaltrainerwall.com/newsletters/images/facebook_16.png" width="16" height="16" border="0"  /></a><a href="https://twitter.com/ptwallguy" title="let's tweet together"><img src="http://personaltrainerwall.com/newsletters/images/twitter_16.png" width="16" height="16" border="0" /></a><a href="mailto:admin@personaltrainerwall.com?subject=Message from the PT Wall Newsletter" title="Any questions?"><img src="http://personaltrainerwall.com/newsletters/images/email_16.png" width="16" height="16" border="0"/></a></p>
            </li>
            <li> <a href="<?php echo base_url(); ?>info/about.php" rel="facebox">What's this about?</a> </li>
            <li> <a href="<?php echo base_url(); ?>info/site-safety.php" rel="facebox">Is it safe to join?</a> </li>
            <li> <a href="<?php echo base_url(); ?>info/iphone.php" rel="facebox">iphone app too?</a> </li>
          </ul>
        </li>
        <li> <a href="<?php echo base_url(); ?>blog">Blog</a> </li>
      </ul>
      <div id="joinUp" class="clearfix">
        <?php if (!isset($me)):?>
        <a href="<?php echo $header_data['twitter_request_url']; ?>" class="btnTwitter fade format" original-title="Join or login here fast" >Join with Twitter</a>
        <?php endif ?>
        <!--fb login start-->
        <?php if ($me): ?>
        <a href="<?php echo $logoutUrl; ?>"> <img src="http://static.ak.fbcdn.net/rsrc.php/z2Y31/hash/cxrz4k7j.gif"> </a>
        <?php else: ?>
        <a class="btnFacebook fade format" original-title="Join or login here fast" href="<?php echo base_url(); ?>index.php?c=auth&m=fb_login">Join with Facebook</a>
        <?php endif ?>
        <!--fb login end-->
      </div>
	    <div id="promoMessage" style="font-size:12px;float:right;margin:8px 0 0 0;background-color:white;padding:1px 10px 0px"><strong>
      <?php $query = mysql_query("SELECT * FROM users");
		$number=mysql_num_rows($query);
		echo "". $number; ?>
      </strong> PT's added themselves here &rArr;</div>
    <!--end Message-->
      <?php } ?>
    </div>
    <!--login end-->
<!-- user alert -->
<script type="text/javascript"> 
		<!-- we run in the footer so no need to use onload -->
	
		<?php if ($header_data['alert_show']) { ?>
			$(document).ready(function() {
				$("#message").fadeIn("slow");
			});
			 
			function closeNotice() {
				$("#message").fadeOut("slow");
			}
		<? } ?>
		</script>
<div id="message" style="display: none;"> <span><?php echo $header_data['alert_msg'] ?></span> <a href="#" class="close-notify" onclick="closeNotice()">X</a> </div>
<!-- end user alerts -->
