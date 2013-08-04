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
<div id="pageWrapper">
  <div id="page">
    <div class="content profile">
	 <p class="links"><a href="http://au.linkedin.com/in/johnbrunskill" title="let's keep it professional"><img src="http://personaltrainerwall.com/newsletters/images/linkedin_16.png" width="16" height="16" border="0" /></a><a href="http://www.facebook.com/apps/application.php?id=130355453666011" title="Be friendly"><img src="http://personaltrainerwall.com/newsletters/images/facebook_16.png" width="16" height="16" border="0"  /></a><a href="https://twitter.com/ptwallguy" title="let's tweet together"><img src="http://personaltrainerwall.com/newsletters/images/twitter_16.png" width="16" height="16" border="0" /></a><a href="mailto:admin@personaltrainerwall.com?subject=Message from the PT Wall Newsletter" title="Any questions?"><img src="http://personaltrainerwall.com/newsletters/images/email_16.png" width="16" height="16" border="0"/></a> <a href="/">Home</a> ~ </p>
      <div class="wrap clearfix">
	  <!--Left section-->
	   <div class="profileMain clearfix">
	    <div class="tweetmeme_button">
                <script type="text/javascript" src="http://tweetmeme.com/i/scripts/button.js"></script>
                <script type="text/javascript">
				<!--tweetmeme_url = '';-->
			tweetmeme_source = 'ptwallguy';

			</script>
          </div>
	   <h1><?php echo $user->first_name." ".$user->last_name ?><br />
  <?php echo $this->City_model->get_name_by_id($user->city_id)."" ?> <?php echo $this->County_model->get_name_by_id($user->county_id)."" ?></h1>
  
        <div class="boxes pic" style="padding:0;">
          <?php if ($image_exist) { ?>
          <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo base_url().$image_file ?>&a=t&w=250&h=313" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="250" height="313">
          <? } else {					
					?>
          <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo base_url();?>images/default-profile-image.jpg&a=t&w=250&h=313" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="250" height="313"/>
          <? } ?>
          <div class="captionWrap">
            <div class="caption"><?php echo $user->first_name." ".$user->last_name ?><br />
              <span style="text-transform:uppercase;"><?php echo $this->State_model->get_name_by_id($user->state_id) ?></span> </div>
          </div>
        </div>
		
        <div class="boxes certs">
          <dl class="clearfix">
            <dt>Base Certification:</dt>
            <dd> <?php echo $user_certificate ?> &mdash; <?php echo $user_training_org ?></dd>
			<dd>Number: <?php if ($user->cert_reg_no) echo '#'.$user->cert_reg_no; else echo "N/A"; ?> Expiry: <?php if ($user->cert_expiry=='0000-00-00') echo "N/A"; else echo $user->cert_expiry;  ?></dd>
			        
            <!-- <dt>Joined this directory:</dt>
            <dd><?php echo $user->
            joined ?>
            </dd>
            -->
            <dt>Specialty Tags:</dt>
            <dd>
              <?php                            	
				foreach($user_tags[1] as $tags):  
                    foreach($tags as $tag):
             ?>
              <span> <?php echo $tag->tag ?> </span>
              <?php 
				endforeach;
					endforeach;
			?>
            </dd>
            <dt>Sports Tags:</dt>
            <dd>
              <?php                            	
				foreach($user_tags[2] as $tags):  
                    foreach($tags as $tag):
             ?>
              <span><?php echo $tag->tag ?> </span>
              <?php 
				endforeach;
					endforeach;
			?>
            </dd>
            <dt>Style Tags:</dt>
            <dd>
              <?php                            	
				foreach($user_tags[3] as $tags):  
                    foreach($tags as $tag):
             ?>
              <span> <?php echo $tag->tag ?> </span>
              <?php 
				endforeach;
					endforeach;
			?>
            </dd>
          </dl>
        </div>
		</div>
		<!--end Left section-->
<div id="contacts" class="boxes last">
          <div class="inner clearfix">
        <?php if (isset($_COOKIE['user_id'])) { ?>
            <?php if ($user->auth=="facebook") { ?>
            <div class="boxRow clearfix">
             
              <a class="show showFacebook fade format" original-title="Facebook Page" href="http://www.facebook.com/profile.php?id=<?php echo $user->user_id ?>" >Facebook Page</a>
              <p><?php echo $user->twitter_name ?> on Facebook</p>
            </div>
            <? } else {					
					?>
            <div class="boxRow clearfix">
              
              <a class="show showTwitter fade format" original-title="Twitter Page" href="http://twitter.com/<?php echo $user->twitter_name ?>">Twitter Page</a>
              <p>Follow <?php echo $user->twitter_name ?><br />Tweets: <strong><?php echo $user->statuses_count ?></strong> Followers: <strong><?php echo $user->followers_count ?></strong><br />
Following: <strong><?php echo $user->friends_count ?></strong> </p>
			  
            </div>
            <? } ?>
            <!--email section-->
            <?php if($user->subscribed==1) { ?>
            <div class="boxRow clearfix">
              <? if($user->hide_email ==0) { ?>
              <a class="show showEmail fade format" original-title="Email <?php echo $user->first_name." ".$user->last_name ?>" href="mailto:<?php echo $user->email ?>?subject=A message from your PT Wall profile">Email Personal Trainer</a>
              <p>Send an email to <?php echo $user->first_name." ".$user->last_name ?> </p>
              <?php } ?>
              <? if($user->hide_email ==1) { ?>
              <a class="show showEmail fade format" original-title="Email contact turned off">Cannot Email Personal Trainer</a>
              <p><?php echo $user->first_name." ".$user->last_name ?>'s email is <strong>turned off!</strong> <br />
                Too busy or away at the moment </p>
              <?php } ?>
            </div>
            <?php } ?>
            <!--Links-->
            <?php if($user->subscribed==1) { ?>
            <div class="boxRow clearfix"> <a class="show showLinks fade format" href="#" onClick="openLinks()" original-title="Links">Links</a>
              <p>Linkedin, Facebook and other links</p>
		    </div>
            <?php } ?>
            <!--end links-->
			
			<!--VCARD-->
            <?php if($user->subscribed==1) { ?>
            <div class="boxRow clearfix">
			 <div id="vcardWrap" style="display:none;">
		<div id="hcard" class="vcard">
		
 		<a class="url fn" href="http://personaltrainerwall.com/index.php/personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>"><?php echo $user->first_name." ".$user->last_name ?></a>
		 		 
		 <? if($user->hide_email ==0) { ?>
 		<a class="email" href="mailto:<?php echo $user->email ?>"><?php echo $user->email ?></a>
		  <?php } ?>
		  	  
		 <? if ($user->phone_no && $user->hide_phone==0) { ?>   
		 <div class="tel"><?php echo $user->phone_no ?></div>
		 <?php } ?>
		 
		 </div>
		 </div>
		 <a href="javascript:void(location.href='http://h2vx.com/vcf/'+escape(location.href))" class="favelet fade format" id="copyhcards" original-title="Download my vCard to your address book">
		 <img src="<?php echo base_url();?>images/vcard.jpg" style="float:left;margin-right:10px;"/></a>
		 <p>Download my vCard to your address book    <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') == TRUE) { ?><br />
Not working on the iphone!<?php } ?></p>
			</div>
            <?php } ?>
            <!--end VCARD-->
			
			
            <!--email section-->
            <!--HERE TO ADD EMAIL FOR ALL-->
            <!--email section repeated remove later-->
            <!-- <?php if($user->
            subscribed==0) { ?>
            <div class="boxRow clearfix">
              <? if($user->hide_email ==0) { ?>
              <a class="show showEmail" href="mailto:<?php echo $user->email ?>?subject=A message from your PT Wall profile" title="Email me">Email Personal Trainer</a>
              <p>Send an email to <?php echo $user->first_name." ".$user->last_name ?> </p>
              <?php } ?>
              <? if($user->hide_email ==1) { ?>
              <a class="show showEmail" title="Email contact turned off">Email Personal Trainer</a>
              <p><?php echo $user->first_name." ".$user->last_name ?>'s email is <strong>turned off!</strong> <br />
                Too busy or away at the moment </p>
              <?php } ?>
            </div>
            <?php } ?>
            -->
            <!--email section-->
            <?php if ($user_logged_in) { ?>
            <?php if($user->subscribed==0) { ?>
            <!-- <p class="validation upgradeInfo">Upgrade to show more to users</p>-->
            <?php } ?>
            <?php } ?>
			
             <?php } else { ?>
		<p class="validation upgradeInfo">Join as a guest/trainer to view more information about this trainer.</p>
             <?php } ?>
          </div>
        </div>
        
		
		
		<div class="boxes last" style="margin-bottom:15px;">
          <fieldset>
          <legend><span>Find where I train</span></legend>
          <div class="inner clearfix">
            <div id="map_canvas" class="" style="width: 100%; height: 160px;"> </div>
            <!--<p class="info" style="text-align:center;"><small>Need directions? <a class="" rel="facebox" href="/multibox_pages/map.php?geo=<?php echo $this->
            County_model->get_name_by_id($user->county_id)."," ?><?php echo $this->State_model->get_name_by_id($user->state_id)."," ?><?php echo $this->Country_model->get_name_by_id($user->country_id) ?>" title="Google Maps ">Launch a full size map</a></small>
            </p>
            --> </div>
           <?php if($user->subscribed==1) { ?> <a href="#"  onClick="openMap()" >Launch larger Map</a> <?php } ?>
          </fieldset>
        </div>
      </div>
      <div class="bio">
        <p><?php if (strlen($user->description)>0) echo $user->description; else echo $user->first_name." ".$user->last_name." has not yet to updated this brief personal bio."; ?></p>
        <img src="<?php echo base_url(); ?>images/icon-twitter.png" alt=""/> </div>
      <!--Facebook Like Button-->
  
      <!--End Facebook Like Button-->
     
      <p style="text-align:center;"><small><a href="/info/disclaimer.php" rel="facebox">Very important disclaimer message</a></small></p>
	   <!--counter-->
      <div class="counter"><img src="..//images/icon-eye.png" width="24" height="24"/>
        <?php include("private/counter.php"); ?><!--<br />
        Joined Personal Trainer Wall on <?php echo $user->joined ?> --></div>
      <!--counter-->
      </li>
      </ul>
    </div>
  </div>
</div>
<!--start code for the modalbox-->
<!--add below back later-->
<?php if($user->approved==0) { ?>
<div class="generic_dialog fb-modal default">
  <div class="alertTop">
    <?php if($user->approved==0) { ?>
    This Personal Trainer profile is under review. <a href="/">Go back</a> to the Wall
    <?php } ?>
    <!--<div class="button clearfix"><span class="btn-std">
          <input type="button" ONCLICK="history.go(-1)" value="Go back to the wall" name="close" class="btn-std fb-close closer" />
          </span> </div>-->
  </div>
</div>
<?php } ?>
<!--end code for the modalbox-->
