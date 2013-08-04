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
<title>Personal Trainer Directory - Personal Trainer Wall</title>
<?php } ?>
<meta name="resource-type" content="document" />
<meta http-equiv="content-language" content="en-us" />
<meta http-equiv="author" content="John Brunskill" />
<meta http-equiv="contact" content="admin@atyourcommand.com.au" />
<meta name="copyright" content="Copyright (c)2013 John Brunskill. All Rights Reserved." />
<meta name="description" content="Find a Personal Trainer in your city. Search by city, name, sports, speciality and style tags" />
<meta name="google-site-verification" content="fcwsX3aygglRvnBc-iFc0KcGB-PhD0Ya9iXzOTi-bcc" />

<!--Facebook Open Graph Protocol Tags-->
<meta property="og:title" content="Find a Personal Trainer"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content=""/>
<meta property="og:image" content="http://personaltrainerwall.com/images/logo-facebook-2.jpg"/>
<meta property="og:site_name" content="Personal Trainer Wall"/>
<meta property="og:description" content="Personal Trainers from USA, Canada, Australia and UK"/>
<meta property="og:email" content="admin@personaltrainerwall.com"/>
<meta property="fb:app_id" content="272124099469128"/>
<!-- Google +1 meta -->
<meta itemprop="name" content="Personal Trainer Wall">
<meta itemprop="description" content="Personal Trainers from USA, Canada, Australia and UK">
<meta itemprop="image" content="http://personaltrainerwall.com/images/logo-facebook-2.jpg">
<!--end-->
<link rel="shortcut icon" type="image/ico" href="favicon.ico" />
<link rel="apple-touch-icon" href="apple-touch-icon.png"/>
<!--for mobile devices-->
<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
<!--Google Font-->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>blog/wp-content/themes/ptwall/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>blog/wp-content/themes/ptwall/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css"/>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>blog/wp-content/themes/ptwall/js/html5.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
 <!--image fadein -->
<script src="<?php echo base_url(); ?>scripts/jquery.imagesloaded.min.js"></script>
<script type="text/javascript">
// remap jQuery to $
(function($){})(window.jQuery);
/* trigger when page is ready */
$(document).ready(function (){
// Hide all images on page and once loaded fade them in
$('#records img').not('header img').each(function() {
		$(this).css('opacity', 0).imagesLoaded(function() {$(this).animate({'opacity': 1}, 1000)});
});
});
</script>
<?php if(isset($show_update_modal) &&  $show_update_modal) { ?>
<? } ?>
<meta name="google-site-verification" content="ZvEIbmcX4N5cRoBeN_b97-eFNThRxpg1Fak1aMwZtKQ" />
</head>
<?php 
	if (isset($controller) && $controller=="trainers"){ ?>
<!--<body onload="initialize();showAddress('<?php echo $geo; ?>');" onunload="GUnload()">-->
<body itemscope itemtype="http://schema.org/Product" class="wall profilePage">
<? } else { ?>
<body class="wall">
<? } ?>
<!-- start header content -->
<div id="header-wrapper" class="navbar navbar-fixed-top">
  <header id="masthead" class="site-header container" role="banner">
    <div class="row-fluid"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
      <nav id="site-navigation" class="nav-collapse clearfix" role="navigation">
        <div class="skip-link assistive-text"><a title="Skip to content" href="#main">Skip to content</a></div>
        <div class="menu">

            <ul id="main-menu" class="the-main-menu">
             <!-- <li class=""> <a href="/">Home</a> </li>
              <li class=""> <a href="http://personaltrainerwall.com/index.php?c=welcome&show_guests=true">Guest Wall</a> </li>
              <li class=""> <a href="/blog/">Blog</a> </li>
              <li class=""> <a href="http://www.facebook.com/pages/Personal-Trainer-Wall/185142201591117">Facebook Page</a> </li>-->
              <li class="pull-right">
                <ul id="navAccount">
                  <?php if ($user_logged_in && $auth_mode!=-1) { ?>
                  <!--<span class="loggedIn">Hi <?php echo $user->first_name ?></span>-->
                  <li>
                    <?php if (strlen($user->first_name)>0 && $user->guest==0 ) { ?>
                    <span class="myPageLink"><a title="Check your page" id="" href="<?php echo base_url(); ?>personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>"><span>My Page</span></a> | </span>
                    <?php } else if (strlen($user->first_name)>0 && ($user->guest==1 && $user->sponsor==1)  ) { ?>
                    <span class="myPageLink"><a title="Check your page" id="" href="<?php echo base_url(); ?>guests/<?php echo $user->user_id; ?>"><span>My Sponsors Page</span></a> | </span>
                    <?php } ?>
                    <a title="My Account" id="dd2" class="myAccountTrigger dropdown" href="#" rel="dropdown2">My Account</a>
                    <ul class="dropdown-menu" id="dropdown2">
                      <li><img src="<?php echo get_user_thumb($user->user_id); ?>" alt="Personal Trainer - <?php echo $user->first_name." ".$user->last_name ?> " width="48" border="0"/>
                        <p style="font-weight: bold;">Hi <?php echo $user->first_name." ".$user->last_name ?></p>
                        <hr class="divider"/>
                      </li>
                      <li class="clearfix" id="edit"><a title="Edit My Profile" class="" href="<?php echo base_url(); ?>index.php?c=add&m=profile"><span></span>Edit My Profile </a></li>
                      <li class="clearfix" id="edit"><a title="Remove Profile" class="" href="<?php echo base_url(); ?>index.php?c=add&m=remove_profile"><span></span>Remove Profile</a></li>
                      <?php if ($user->active) { ?>
                      <li class="clearfix" id="edit"><a title="Change Email" class="" href="<?php echo base_url(); ?>index.php?c=add&m=change_email"><span></span>Change Email</a></li>
                      <li class="clearfix" id="upload"><a title="Upload Profile Picture" class="" href="<?php echo base_url(); ?>index.php?c=add&m=image"><span></span>Upload Profile Picture</a></li>
                      <?php } ?>
                      <li class="clearfix" id="logout"><a title="Logout" class="" href="<?php echo base_url(); ?>index.php?c=welcome&m=logoff"><span></span>Logout </a>
                        <hr class="divider"/>
                      </li>
                      <?php if ($user->active) { ?>
                      <li class="clearfix" id="subscription"><a title="My Subscription" id="" class="" href="http://personaltrainerwall.com/index.php?c=welcome&m=amember"><span></span>My Subscription </a></li>
                      <?php } ?>
                      <li class="clearfix" id="subscriptionInfo"><a title="Subscription Stuff" rel="facebox" class="" href="<?php echo base_url(); ?>info/upgrade.php"><span></span>Subscription Stuff </a></li>
                    </ul>
                  </li>
                  <?php } else { ?>
                  <li> Join or login: <span class="twitterLink"><a class="" original-title="Join or login with Facebook" href="<?php echo base_url(); ?>index.php?c=auth&m=fb_login" >Facebook</a></span> 
                    
                    <!-- <span class="twitterLink"> | <a href="<?php echo $header_data['twitter_request_url']; ?>" class="" original-title="Join or login with Twitter " >Twitter</a></span>--> 
                  </li>
                </ul>
                <?php } ?>
              </li>
              
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
              
            </ul>
         
        </div>
      </nav>
    </div>
    <div class="row-fluid">
     <span class="strapline">Free Personal Trainer Directory</span>
      <div id="logo"><a href="/" title="Home"> </a> </div><span class="strapline">USA, Canada, Australia and UK</span>
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
    <div class="alertTop"><strong><?php echo $user->first_name ?></strong> complete your <a title="Check out my page here" id="" href="<?php echo base_url(); ?>guests/<?php echo $user->user_id; ?>">advert</a>, grab a <a href="<?php echo base_url(); ?>index.php?c=welcome&m=amember">advertisement subscription</a> then <a href="mailto:admin@personaltrainerwall.com?subject=My advertisement is 100% completed & good to go">email</a> to get published</div>
    <!--  </div>-->
    <?php } else if($user->subscribed==0 && $user->guest==1 && $user->sponsor==0)  { ?>
    <!--  <div class="generic_dialog fb-modal default noBg">-->
    <div class="alertTop"><strong><?php echo $user->first_name ?></strong>, thank you for adding your voice to Personal Trainer Wall</div>
    <!--  </div>-->
    <? } ?>
  <?php } else { ?>
 
  <? } ?>
  <!--End message--> 

<?php 
if (isset($controller) && $controller=="trainers"){ ?>
<div class="alertTop"><a href="http://personaltrainerwall.com/">View more Personal Trainers in your area?</a></div>
<? } ?>
<!-- user alert--> 
<script type="text/javascript"> 
		<!-- we run in the footer so no need to use onload -->
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
