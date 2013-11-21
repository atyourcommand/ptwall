<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head profile="http://gmpg.org/xfn/11">
<?php
	$header_data = get_header_data();
	$auth_mode = header_get_auth_mode();
?>
<?php if ($title) { ?>
<title><?php echo $title; ?></title>
<?php } else {  ?>
<title>Personal Trainer Directory - United States, Canada, Australia and the United Kingdom</title>
<?php } ?>
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } else {  ?>
<meta name="description" content="Find a Personal Trainer in your city and hundreds of local certified Personal Training Professionals " />
<?php } ?>
<meta name="resource-type" content="document" />
<meta http-equiv="content-language" content="en-us" />
<meta http-equiv="author" content="John Brunskill" />
<meta http-equiv="contact" content="admin@atyourcommand.com.au" />
<meta name="copyright" content="Copyright (c)2013 John Brunskill. All Rights Reserved." />
<!--Facebook Open Graph Protocol Tags-->
<meta property="og:title" content="Find a Personal Trainer"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content=""/>
<meta property="og:image" content="http://personaltrainerwall.com/images/logo-facebook-2.jpg"/>
<meta property="og:site_name" content="Personal Trainer Wall"/>
<meta property="og:description" content="Personal Trainers from USA, Canada, Australia and UK"/>
<meta property="og:email" content="admin@personaltrainerwall.com"/>
<meta property="fb:app_id" content="272124099469128"/>
<link rel="shortcut icon" type="image/ico" href="favicon.ico" />
<link rel="apple-touch-icon" href="apple-touch-icon.png"/>
<!--for mobile devices-->
<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
<!--Google Font-->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css"/>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style-ie6.css"/>  
<![endif]-->
<style>
.panel-group .panel{
  display:none;
}
.selected_{
  display:block;
}
</style>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>blog/wp-content/themes/ptwall/js/html5.js" type="text/javascript"></script>
<![endif]-->
<script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>
<?php if(isset($show_update_modal) &&  $show_update_modal) { ?>
<? } ?>
</head>
<?php 
	if (isset($controller) && $controller=="trainers"){ ?>
<!--<body onload="initialize();showAddress('<?php echo $geo; ?>');" onunload="GUnload()">-->
<body itemscope itemtype="http://schema.org/Product" class="wall profilePage">
<? } else { ?>
<body class="wall">
<? } ?>
<!-- start header content -->
<div id="header-wrapper" class="navbar-fixed-top">

 <?php if ( $user->active==1 && $user_logged_in && $auth_mode!=-1 ) { ?>
 <div class="member-links-panel center">
                <ul class="no-style">
                  <!--<span class="loggedIn">Hi <?php echo $user->first_name ?></span>-->
                  
                  <li class="dropdown">
                    <?php if (strlen($user->first_name)> 0 && $user->guest==0 ) { ?>
                    <span class="myPageLink"><a title="Check your page" id="" href="<?php echo base_url(); ?>personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>"><span>My Page</span></a> | </span>
                   
                    <?php } else if (strlen($user->first_name)>0 && ($user->guest==1 && $user->sponsor==1) ) { ?>
                    <span class="myPageLink"><a title="Check your page" id="" href="<?php echo base_url(); ?>guests/<?php echo $user->user_id; ?>"><span>My Classified</span></a> | </span>
                    <?php } else { ?>
                    <!--nada-->
                    <?php } ?>
                    <a title="My Account" data-toggle="dropdown" role="button" href="#">My Account</a> You are logged in  <strong><?php echo $user->first_name ?></strong>
                    
                    <ul id="menu-1" class="dropdown-menu" aria-labelledby="drop1" role="menu">
                      <li><img src="<?php echo get_user_thumb($user->user_id); ?>" alt="Personal Trainer - <?php echo $user->first_name." ".$user->last_name ?> " width="48" border="0"/>
                        <p style="font-weight: bold;">Hi <?php echo $user->first_name." ".$user->last_name ?></p>
                        <hr class="divider"/>
                      </li>
                      <li class="clearfix" id="edit"><a title="Edit My Profile" class="" href="<?php echo base_url(); ?>index.php?c=add&m=profile"><span></span>Account Editor</a></li>
                      
                      <?php if ($user->active) { ?>
                      <li class="clearfix" id="edit"><a title="Change Email" class="" href="<?php echo base_url(); ?>index.php?c=add&m=change_email"><span></span>Change Email</a></li>
                      <li class="clearfix" id="upload"><a title="Upload Profile Picture" class="" href="<?php echo base_url(); ?>index.php?c=add&m=image"><span></span>Upload Picture</a></li>
                      <?php } ?>
                      <li class="clearfix" id="logout"><a title="Logout" class="" href="<?php echo base_url(); ?>index.php?c=welcome&m=logoff"><span></span>Logout </a>
                        <hr class="divider"/>
                      </li>
                      <?php if ($user->active) { ?>
                      <li class="clearfix" id="subscription"><a title="My Subscription" id="" class="" href="http://personaltrainerwall.com/index.php?c=welcome&m=amember"><span></span>My Subscriptions </a></li>
                      <?php } ?>
                      <li class="clearfix" id="subscriptionInfo"><a title="Subscription Stuff" rel="facebox" class="" href="<?php echo base_url(); ?>info/upgrade.php"><span></span>Subscription Info </a></li>
                      <li class="clearfix" id="edit"><a title="Remove Profile" class="" href="<?php echo base_url(); ?>index.php?c=add&m=remove_profile"><span></span>Remove my Account</a></li>
                    </ul>
                  </li>
                                
                 
                </ul></div>

 <?php } else { ?>
<!--nothing-->
<?php } ?>
  <header id="masthead" class="site-header container" role="banner">
    <div class="row"> <a style="display:none;" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
      <nav id="site-navigation" class="nav-collapse clearfix" role="navigation">
        <div class="skip-link assistive-text"><a title="Skip to content" href="#main">Skip to content</a></div>
        
      </nav>
    </div>
    <div class="row">
    	<div class="col-sm-4 hidden-xs">
         <div class="strapline hidden-xs">Free PT Directory & Marketplace</div>
        </div>
        <div class="col-xs-6 col-sm-4">
         <div id="logo"><a href="/" title="Home"> </a> </div>
        </div> 
        <div class="col-xs-6 col-sm-4"> 
         <div class="social-connect">
         <?php if ($user_logged_in && $auth_mode!=-1) { ?>
             <span class="connect-with">Hello <strong><?php echo $user->first_name ?></strong>  &nbsp;&nbsp;</span>
             <div class="member-avatar-wrapper">
         <img src="<?php echo get_user_thumb($user->user_id); ?>" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="64" border="0"/> </div>
         <?php } else { ?>
         <span class="connect-with">Connect with &nbsp;&nbsp;</span>
               <a class="btnFacebook" original-title="Join or login with Facebook" href="<?php echo base_url(); ?>index.php?c=auth&m=fb_login" >&nbsp;</a>
         <!-- <span class="twitterLink"> | <a href="<?php echo $header_data['twitter_request_url']; ?>" class="" original-title="Join or login with Twitter " >Twitter</a></span>--> 
            <!-- <li id="guests">
              <?=menu_anchor(base_url()."index.php?c=welcome&amp;country=$country&amp;show_guests=true", "Guests")?>
            </li>
            <li id="retweets">
              <?=menu_anchor(base_url()."retweets/", "PT Retweets")?>
            </li>
            <li id="search">
              <?=menu_anchor(base_url()."index.php?c=welcome&show_search=true", "Search")?>
            </li>
            <li id="join">
              <?=menu_anchor(base_url()."join/", "Join")?>
            </li>-->
             
       <?php } ?>
        </div></div>
        </div> 

  </header>
  <!-- end header --> 
</div>
<!-- end header container -->
<div id="main" class="wrapper">
<div class="section-divider"></div>
 <!--New message-->
  <?php if (isset($_COOKIE['user_id'])) { ?>
    <?php if($user->approved==0 && $user->guest==0) { ?>
    <!--<div class="generic_dialog fb-modal default noBg">-->
    <div class="alertTop complete-your-profile"><strong><?php echo $user->first_name ?></strong> if your profile is 100% completed <a href="/info/approve-trainers-page.php" rel="facebox"><u>read this</u></a> then <a href="mailto:admin@personaltrainerwall.com?subject=My Profile is 100% completed & good to go"><u>email</u></a> to get published</div>
    <!--</div>-->
    <?php } else if($user->subscribed==0 && $user->guest==1 && $user->sponsor==1)  { ?>
    <!--<div class="generic_dialog fb-modal default noBg">-->
    <div class="alertTop"><strong><?php echo $user->first_name ?></strong> complete your <a title="Check out my page here" id="" href="<?php echo base_url(); ?>guests/<?php echo $user->user_id; ?>">classified</a>, grab a <a href="<?php echo base_url(); ?>index.php?c=welcome&m=amember">classified subscription</a> then <a href="mailto:admin@personaltrainerwall.com?subject=My advertisement is 100% completed & good to go">email</a> to get published</div>
    <!--  </div>-->
    <?php } else if($user->subscribed==0 && $user->guest==1 && $user->sponsor==0)  { ?>
    <!--  <div class="generic_dialog fb-modal default noBg">-->
    <div class="alertTop"><strong><?php echo $user->first_name ?></strong>, thank you for adding your voice to Personal Trainer Wall</div>
    <!--  </div>-->
    <? } ?>
  <?php } else { ?>
 <!--NADA-->
  <? } ?>

  <!--End message--> 

<?php 
if (isset($controller) && $controller=="blah"){ ?>
<div class="alertTop"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- PT wall top strip -->
<ins class="adsbygoogle"
     style="display:inline-block;width:125px;height:125px"
     data-ad-client="ca-pub-9333805017415789"
     data-ad-slot="7151900337"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>
<? } ?>
<!-- user alert--> 
<script type="text/javascript"> 
		<?php if ($header_data['alert_show']) { ?>
			$(document).ready(function() {
				$("#message").fadeIn("slow")
				.delay(5000).fadeOut("slow");
				
			});
			 
			function closeNotice() {
				$("#message").fadeOut("slow");
			}
		<? } ?>
		</script>
<div id="message" style="display: none;"> <span><?php echo $header_data['alert_msg'] ?></span> <a href="#" class="close-notify" onClick="closeNotice()">X</a> </div>
<!-- end user alerts -->
<div id="fb-root"></div>