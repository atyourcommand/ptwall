<!--http://www.personaltrainerwall.com-->
<?php
	$profile_image = $profile_image_path.md5($user->profile_image_url).".".substr(strrchr($user->profile_image_url, '.'), 1);
	
?>
<script src="<?php echo base_url(); ?>scripts/switcher.js" type="text/javascript"></script>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA7mqEJzNb06x41VPkO08VqBQAcbgRolCsYOGbJiP6rHcEKxVvLhTK0A_xZUulycRnnNzTTojWzv0oWA"
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
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
              map.setCenter(point, 13);
              var marker = new GMarker(point);
              map.addOverlay(marker);
              //marker.openInfoWindowHtml(address);
            }
          }
        );
      }
    }
	
	jQuery(document).ready(function() {

	  initialize();
	  showAddress('<?php echo $geo; ?>');
		  initialize2();
		  showAddress2('<?php echo $geo; ?>');	  
	  
	}) 	
    </script>
<script type="text/javascript">
 
    var map2 = null;
    var geocoder2 = null;
 
    function initialize2() {
      if (GBrowserIsCompatible()) {
        map2 = new GMap2(document.getElementById("large_map_canvas"),{size:new GSize(700,500)});
        //map.setCenter(new GLatLng(37.4419, -122.1419), 30);
		map2.setUIToDefault();
        geocoder2 = new GClientGeocoder();
      }
    }
 
    function showAddress2(address) {
      if (geocoder2) {
        geocoder2.getLatLng(
          address,
          function(point) {
            if (!point) {
              //alert(address + " not found");
			  g = 0;
            } else {
              map2.setCenter(point, 15);
              var marker2 = new GMarker(point);
              map2.addOverlay(marker2);
              marker2.openInfoWindowHtml("<strong><?php echo $name ?></strong><br><img src=\"<?php echo $profile_image_url ?>\" alt=\"<?php echo $name ?> \" width=\"48px\"><?php echo $geo ?>");
            }
          }
        );
      }
    }
	

	
    jQuery(document).ready(function($) {
      
      $(document).bind('afterReveal.facebox', function() {

		  map2.checkResize();
		  initialize2();
		  showAddress2('<?php echo $geo; ?>');	
      })
	  
      $(document).bind('reveal.facebox', function() {

		  map2.checkResize();
		  initialize2();
		  showAddress2('<?php echo $geo; ?>');	
      })	  
      
    })
	
	function openMap() {
		window.open( "<?php echo base_url() ?>index.php?c=welcome&m=view_map&&user_id=<?php echo $user->user_id; ?>", "zoomMap","status = 1, height = 500, width = 700, resizable = 0" )
	}	
	
	function openLinks() {
		window.open( "<?php echo base_url() ?>index.php?c=welcome&m=view_links&&user_id=<?php echo $user->user_id ?>", "zoomMap","status = 1, height = 200, width = 900, resizable = 0" )
	}		
		
</script>

<div id="large_map_canvas" class="" style="width: 700px; height: 500px; display:none"> </div>
<div id="page">
  <!--v card data -->
  <div id="vcardWrap" style="display:none;">
    <div id="hcard" class="vcard"> <a class="url fn" href="<?php echo base_url() ?>guests/<?php echo $user->user_id; ?>"><?php echo $user->first_name." ".$user->last_name ?></a>
      <? if($user->hide_email ==0) { ?>
      <a class="email" href="mailto:<?php echo $user->email ?>"><?php echo $user->email ?></a>
      <?php } ?>
      <? if ($user->phone_no && $user->hide_phone==0) { ?>
      <div class="tel"><?php echo $user->phone_no ?></div>
      <?php } ?>
    </div>
  </div>
  <!--v card data -->
  <div class="smallHeading"><a href="/">Home</a> ~Personal Trainer Jobs and classifieds - Post a free job advertisement & reach our large network~</div>
  <div class="content profile corners">
    <div class="wrap clearfix">
	
      <!--Left section-->
      <div class="profileMain clearfix">
        <div class="pic" style="padding:0;">
          <?php if ($image_exist) { ?>
          <img class="hero" src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo base_url().$image_file ?>&a=t&w=250&h=313" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="250" height="313">
          <? } else {					
					?>
          <img class="hero" src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo base_url();?>images/default-profile-image.jpg&a=t&w=250&h=313" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="250" height="313"/>
          <? } ?>
          <div id="contacts" class="">
            <div class="inner" style="text-align:left;display:block;">
              <?php if ($user->auth=="facebook") { ?>
              <a class="fade format" original-title="Follow <?php echo $user->facebook_name ?> on Facebook" href="http://www.facebook.com/profile.php?id=<?php echo $user->user_id ?>" ><img src="<?php echo base_url();?>images/facebook_32.png" style="float:none;margin-right:10px;"/></a>
              <? } else {					
					?>
              <a class="fade format" original-title="Follow <?php echo $user->twitter_name ?> on Twitter" href="http://twitter.com/<?php echo $user->twitter_name ?>"><img src="<?php echo base_url();?>images/twitter_32.png" style="margin-right:10px;"/></a>
              <? } ?>
              <!--email section-->
              <?php if($user->subscribed==1) { ?>
              <? if($user->hide_email ==0) { ?>
              <a class="fade format" original-title="Email <?php echo $user->first_name." ".$user->last_name ?>" href="mailto:<?php echo $user->email ?>?subject=A message from your PT Wall profile"><img src="<?php echo base_url();?>images/email_32.png" style="margin-right:10px;"/></a>
              <?php } ?>
              <? if($user->hide_email ==1) { ?>
              <a class="fade format" original-title="Email contact turned off"><img src="<?php echo base_url();?>images/email_32.png" style="margin-right:10px;"/></a>
              <?php } ?>
              <!--linked in-->
              <? if($user->linkedin_url) { ?>
              <a class="fade format" original-title="linkedIn" href="<?php echo $user->linkedin_url ?>"><img src="<?php echo base_url();?>images/linkedin_32.png" style="margin-right:10px;"/></a>
              <?php } ?>
              <!--end linked in-->
              <?php } ?>
              <!--Links-->
              <!--end links-->
              <!--VCARD-->
              <?php if($user->subscribed==1) { ?>
              <div id="vcardWrap" style="display:none;">
                <div id="hcard" class="vcard"> <a class="url fn" href="http://personaltrainerwall.com/personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>"><?php echo $user->first_name." ".$user->last_name ?></a>
                  <? if($user->hide_email ==0) { ?>
                  <a class="email" href="mailto:<?php echo $user->email ?>"><?php echo $user->email ?></a>
                  <?php } ?>
                  <? if ($user->phone_no && $user->hide_phone==0) { ?>
                  <div class="tel"><?php echo $user->phone_no ?></div>
                  <?php } ?>
                </div>
              </div>
              <a href="javascript:void(location.href='http://h2vx.com/vcf/'+escape(location.href))" class="fade format" id="copyhcards" original-title="Download my vCard to your address book"> <img src="<?php echo base_url();?>images/vcard_32.png" style="margin-right:10px;"/></a>
              <?php } ?>
              <!--end VCARD-->
              <!--extra facebook icon-->
              <?php if ($user->facebook_url) {?>
              <a href="<?php echo $user->facebook_url ?>" class="fade format" original-title="Extra Facebook link"><img src="<?php echo base_url();?>images/facebook_32.png" style="margin-right:10px;"/></a>
              <?php } ?>
              <!--end extra facebook icon-->
              <!--map Icon-->
              <a href="#"  onClick="openMap()" class="fade format" original-title="Find us on a Map" ><img src="<?php echo base_url();?>images/map_48.png" width="32" height="32" style="margin-right:10px;"/></a>
              <!--end Icon-->
            </div>
          </div>
        </div>
        <div class="certs">
          <div class="tweetmeme_button">
            <script type="text/javascript" src="http://tweetmeme.com/i/scripts/button.js"></script>
            <script type="text/javascript">
				<!--tweetmeme_url = '';-->
			tweetmeme_source = 'castingwall';
			</script>
          </div>
          <h1><?php echo $user->business_name ?> </h1>
          <p>
            <!-- dynamic web and phone-->
            <?php if ($user->url) {?>
            <!--web from twitter ?-->
            <a href="<?php echo $user->url ?>"><?php echo $user->url ?></a>
            <? } 
		  	if ($user->workplace_url) {
		  ?>
            <a href="<?php echo $user->workplace_url ?>"><?php echo $user->workplace_url ?></a>
            <? } 
		  	if ($user->phone_no && $user->hide_phone==0) {
		  ?>
            <?php echo $user->phone_no ?>
            <?php } ?>
            <!--end dynamic web and phone-->
          </p>
		  <div class="bio">
          <blockquote>
            <?php if (strlen($user->description)>0) echo $user->description; else echo $user->first_name." ".$user->last_name." has not yet updated this brief personal bio."; ?>
          </blockquote>
        </div>
        </div>
        
      </div>
      <!--counter-->
      <div class="counter"><img src="..//images/icon-eye.png" width="24" height="24"/>
        <?php include("private/counter.php"); ?>
        <!--<br />
        Joined Personal Trainer Wall on <?php echo $user->
        joined ?> --></div>
      <!--counter-->
    </div>
    <!--end Left section-->
    <!--Facebook Like Button-->
    <!--End Facebook Like Button-->
    <!--<p style="text-align:center;"><small><a href="/info/disclaimer.php" rel="facebox">Very important disclaimer message</a></small></p>-->
    </li>
    </ul>
  </div>
</div>
<!--start code for the modalbox-->
<!--add below back later-->
<?php if($user->approved==0) { ?>
<div class="generic_dialog fb-modal default">
  <div class="alertTop">
    <?php if($user->approved==0) { ?>
    This Sponsor Page is under review. <a href="/">Go back</a> to the Wall
    <?php } ?>
    <!--<div class="button clearfix"><span class="btn-std">
          <input type="button" ONCLICK="history.go(-1)" value="Go back to the wall" name="close" class="btn-std fb-close closer" />
          </span> </div>-->
  </div>
</div>
<?php } ?>
<!--end code for the modalbox-->
