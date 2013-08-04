<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title><?php echo $title ?></title>
<head profile="http://gmpg.org/xfn/11">
<meta name="resource-type" content="document" />
<meta http-equiv="content-language" content="en-us" />
<meta http-equiv="author" content="John Brunskill" />
<meta http-equiv="contact" content="atyourcommand@mac.com" />
<meta name="copyright" content="Copyright (c)2009 John Brunskill. All Rights Reserved." />
<!--<META NAME="description" CONTENT="Using a plugin to generate this" />-->
<!--<META NAME="keywords" CONTENT="Using a plugin to generate this" />-->
<link rel="shortcut icon" type="image/ico" href="favicon.ico" />

<link rel="stylesheet" href="blog/wp-content/themes/ptwall/css/style.css" type="text/css" media="screen, projection" />
<!--[if lt IE 7.]><link rel="stylesheet" href="blog/wp-content/themes/ptwall/css/ie.css" type="text/css" media="screen, projection"><![endif]-->
<!--[if lt IE 7.]>
<script defer type="text/javascript" src="/scripts/bgsleight.js"></script>
<script defer type="text/javascript" src="/scripts/sleight.js"></script>
<![endif]-->
<script type="text/javascript" src="scripts/js-core/mootools1.2.js" ></script>
<script  type="text/javascript" src="scripts/js-core/mootools-1.2-more.js"></script>
<!-- expander scripts -->
<script type="text/javascript" src="scripts/js-expander/expander.js"></script>
<!-- modalbox scripts -->
<script type="text/javascript" src="scripts/js-modalbox/modalbox.js"></script>
<!--tooltips-->
<script src="scripts/js-tooltips/tooltips.js" type="text/javascript"></script>
<!--multibox-->
<script src="scripts/multibox/multiBox.js" type="text/javascript"></script>
<script src="scripts/multibox/overlay.js" type="text/javascript"></script>
<!-- Calendar -->
<script src="scripts/CalendarPopup.js" type="text/javascript"></script>
<!--Google Maps-->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>-->
<script type="text/javascript">
window.addEvent('domready', function(){
	//call multiBox
	var initMultiBox = new multiBox({
		mbClass: '.mb',//class you need to add links that you want to trigger multiBox with (remember and update CSS files)
		container: $(document.body),//where to inject multiBox
		descClassName: 'multiBoxDesc',//the class name of the description divs
		path: './Files/',//path to mp3 and flv players
		useOverlay: true,//use a semi-transparent background. default: false;
		maxSize: {w:600, h:400},//max dimensions (width,height) - set to null to disable resizing
		addDownload: true,//do you want the files to be downloadable?
		pathToDownloadScript: './Scripts/ForceDownload.asp',//if above is true, specify path to download script (classicASP and ASP.NET versions included)
		addRollover: true,//add rollover fade to each multibox link
		addOverlayIcon: true,//adds overlay icons to images within multibox links
		addChain: true,//cycle through all images fading them out then in
		recalcTop: true,//subtract the height of controls panel from top position
		addTips: true//adds MooTools built in 'Tips' class to each element (see: http://mootools.net/docs/Plugins/Tips)
	});
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
<script type="text/javascript">


window.addEvent('domready',function(){
									
if($defined('modal_updated'))									
	$('modal_updated').fade('in');
									

});
</script>
<? } ?>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA7mqEJzNb06x41VPkO08VqBR9GhlY63d00MxNOCXEB2mMjKAEuRS7fJvqsIl2S67bUL5Qto1sQg6Lzw"
      type="text/javascript"></script>
<script type="text/javascript">
 
    var map = null;
    var geocoder = null;
 
    function initialize() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
        //map.setCenter(new GLatLng(37.4419, -122.1419), 13);
		map.setUIToDefault();
        geocoder = new GClientGeocoder();
      }
    }
 
    function showAddress(address) {
      if (geocoder) {
        var myString = "<?php echo $address_line ?>";
		var mySplitResult = myString.split("#");
		for(i = 0; i < mySplitResult.length; i++){
		geocoder.getLatLng(
          mySplitResult[i],          
		  function(point) {
            if (!point) {
              //alert(mySplitResult[i] + " not found");
            } else {
              map.setCenter(point, 1);
              var marker = new GMarker(point);
              map.addOverlay(marker);
             // marker.openInfoWindowHtml(mySplitResult[i]);
            }
          }
        );
		}
		
      }
    }
    </script> 
</head>
 <body onload="initialize();showAddress('sri lanka');" onunload="GUnload()">
<!--<div id="links" style="position:absolute;width:16px;height:16px;right:5px;top:5px;"><a href="http://www.facebook.com/#/group.php?gid=178234701500"><img src="icon-facebook.ico" alt="Facebook Icon" border="0" title="Join our new Facebook Group" /></a></div>-->
<!-- start header content -->
<div id="top">
  <!--welcome top bar -->
<h1 id="production"> <span>Find a <a href="/">Personal Trainer</a> in your city?<strong></strong></span></h1>
</div>
<!-- Sign in -->
<div id="signIn">
  <ul id="nav">
    <li id="btnPersonalTrainer">
      <div><a href="#" class="fb-trigger"><img src="images/btn-personal-trainers.png" alt="Personal Trainers Button" width="950" /></a> </div>
      <div class="generic_dialog fb-modal">
        <div class="informationBox corners">
          <div class="padding">
            <?php if ($user_logged_in) { ?>
            <h2 class="resourceTitle">Hey! You've already joined! Ok here's your links</h2>
            <div class="inner dropdown">
              <ul class="dropdown-list">
                <li> <a href="index.php?c=welcome&m=logoff"><img src="images/twitter.png" alt="twitter" width="48" /></a>
                  <h3><a href="index.php?c=welcome&m=logoff">Logoff PTWall</a></h3>
                  <p> Logoff from PTWall to sign in as a different user. </p>
                </li>
                <li> <a href="index.php?c=add&m=profile"><img src="<?php echo $user_image ?>" alt="twitter" width="48" /></a>
                  <h3><a href="index.php?c=add&m=profile">My Ptwall Profile</a></h3>
                  <p> Update your profile, let us know your qualifications and how others can get in touch with you.</p>
                </li>
                <li><a href="index.php?c=welcome&m=amember"><img src="<?php echo $user_image ?>" alt="twitter" width="48" /></a>
                  <h3><a href="index.php?c=welcome&m=amember">View Subscription</a></h3>
                  <p>Choose the upgrade to get new Features as they are added<br />
                    Theres still a Free 1 Year Offer
                    <!--<a href="http://www.ptwall.com/amember/signup.php">Register</a>&nbsp;or&nbsp;-->
                  </p>
                </li>
              </ul>
            </div>
            <?php } else { ?>
            <h2 class="resourceTitle">Hi, thinking about adding your profile? Great</h2>
            <div class="inner dropdown">
              <p><strong>It's very quick, easy and safe to add your Personal Trainer Profile.</strong><br />
                Here's what happens after you click the link below</p>
              <ul>
                <li><strong>1.</strong> <strong>You authorize</strong> PT Wall from your Twitter Account </li>
                <li><strong>2.</strong> <strong>Add some details</strong> about your Personal Training Services </li>
                <li><strong>3.</strong> Done.<strong> View your profile</strong> straight away. </li>
              </ul>
              <ul class="dropdown-list">
                <li> <a href="<?php echo $request_url ?>"><img src="./images/twitter.png" alt="twitter" width="48" /></a>
                  <h3><a href="<?php echo $request_url ?>">Add your profile to PT Wall</a></h3>
                  <p><strong>NB:</strong> Only Qualified and Insured Personal Trainers are to join.<br />
                    No Cowboys please.</p>
                </li>
              </ul>
            </div>
            <?php } ?>
            <!--<div class="messages">
                <p><span><a href="#">Very important disclaimer message</a></span></p>
              </div>-->
          </div>
          <div class="button clearfix"> <span class="btn-std">
            <input type="button" value="Close" name="close" class="btn-std fb-close closer" />
            </span>
            <!--<a href="#" class="btn-std emailMessage"><span class="btn-std">Send me a message</span></a>-->
          </div>
        </div>
      </div>
      <!--end code for the modalbox-->
    </li>
  </ul>
</div>
<!--end signIn-->

<!-- end welcome top bar -->
