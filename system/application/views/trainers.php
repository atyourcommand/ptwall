<?php
	$profile_image = $profile_image_path.md5($user->profile_image_url).".".substr(strrchr($user->profile_image_url, '.'), 1);
?>

<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBNyazdnCgKZOXH30nrbXPJKH7_MNUZrTg&sensor=true"></script>
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
	
    //jQuery(document).ready(function($) {
//      $(document).bind('afterReveal.facebox', function() {
//		  map2.checkResize();
//		  initialize2();
//		  showAddress2('<?php echo $geo; ?>');	
//      })
//      $(document).bind('reveal.facebox', function() {
//		  map2.checkResize();
//		  initialize2();
//		  showAddress2('<?php echo $geo; ?>');	
//      })	  
//    })
	
	function openMap() {
		window.open( "<?php echo base_url() ?>index.php?c=welcome&m=view_map&&user_id=<?php echo $user->user_id; ?>", "zoomMap","status = 1, height = 500, width = 700, resizable = 0" )
	}	
	
	function openLinks() {
		window.open( "<?php echo base_url() ?>index.php?c=welcome&m=view_links&&user_id=<?php echo $user->user_id ?>", "zoomMap","status = 1, height = 200, width = 900, resizable = 0" )
	}		
		
</script>

<div id="large_map_canvas" class="" style="width: 700px; height: 500px; display:none"> </div>
<section class="theme theme-three">
  <div class="container">
    <section style="display:none;">
      <div class="row">
        <div class="col-xs-12"> <!--v card data -->
          <div id="vcardWrap">
            <div id="hcard" class="vcard"> <a class="url fn" href="<?php echo base_url() ?>index.php/personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>"><?php echo $user->first_name." ".$user->last_name ?></a>
              <? if($user->hide_email ==0) { ?>
              <a class="email" href="mailto:<?php echo $user->email ?>"><?php echo $user->email ?></a>
              <?php } ?>
              <? if ($user->phone_no && $user->hide_phone==0) { ?>
              <div class="tel"><?php echo $user->phone_no ?></div>
              <?php } ?>
            </div>
          </div>
          <!--v card data --></div>
      </div>
    </section>
    <div class="row"> 
      
      <!--<div class="smallHeading"><a href="/">Home</a> ~100's of Personal Trainer Profiles - With certifications grab a free page & reach our large network~</div>-->
      
      <div class="col-xs-4 recordWrap">
        <div class="imageWrapper">
          <p>
            <?php if ($image_exist) { ?>
            <img itemprop="image" class="hero" src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo base_url().$image_file ?>&a=t&w=370&h=370" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="100%">
            <? } else {					
					?>
            <img class="hero" src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo base_url();?>images/default-profile-image.jpg&a=t&w=370&h=370" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="100%"/>
            <? } ?>
          </p>
        </div>
        <!--counter-->
        <div class="counter center">Viewed
          <?php include("private/counter.php"); ?>
          <br />
          <a href="/info/disclaimer.php" rel="facebox">Important disclaimer message</a> 
          <!--<br />
        Joined Personal Trainer Wall on <?php echo $user->
          joined ?> --></div>
        <!--counter--> 
      </div>
      <div class="col-xs-8">
        <div class="tweetmeme_button">
          <g:plusone></g:plusone>
          <script type="text/javascript">
      window.___gcfg = {
        lang: 'en-US'
      };

      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
    </script> 
        </div>
        <h1 itemprop="name" class="regular alt">Personal Trainer - <?php echo $this->City_model->get_name_by_id($user->city_id)."" ?> <?php echo $this->County_model->get_name_by_id($user->county_id)."" ?> <?php echo $this->State_model->get_name_by_id($user->state_id)."" ?> </h1>
        <div class="marketing-byline"><?php echo $user->first_name." ".$user->last_name ?></div>
        <div id="contacts" class="">
          <div class="inner clearfix">
            <?php if ($user->auth=="facebook") { ?>
            <a class="tips format" original-title="Follow <?php echo $user->facebook_name ?> on Facebook" href="http://www.facebook.com/profile.php?id=<?php echo $user->user_id ?>" ><img src="<?php echo base_url();?>images/facebook_32.png" style="float:none;margin-right:5px;"/></a>
            <? } else {					
					?>
            <a class="tips format" original-title="Follow <?php echo $user->twitter_name ?> on Twitter" href="http://twitter.com/<?php echo $user->twitter_name ?>"><img src="<?php echo base_url();?>images/twitter_32.png" style="margin-right:5px;"/></a>
            <? } ?>
            <!--email section-->
            
            <? if($user->hide_email ==0) { ?>
            <a class="tips format" original-title="Email <?php echo $user->first_name." ".$user->last_name ?>" href="mailto:<?php echo $user->email ?>?subject=A message from your Personal Trainer Wall profile"><img src="<?php echo base_url();?>images/email_32.png" style="margin-right:5px;"/></a>
            <?php } ?>
            <? if($user->hide_email ==1) { ?>
            <a class="tips format" original-title="Email contact turned off"><img src="<?php echo base_url();?>images/email_32.png" style="margin-right:5px;"/></a>
            <?php } ?>
            <!--linked in-->
            <? if($user->linkedin_url) { ?>
            <a class="tips format" original-title="linkedIn" href="<?php echo $user->linkedin_url ?>"><img src="<?php echo base_url();?>images/linkedin_32.png" style="margin-right:5px;"/></a>
            <?php } ?>
            <!--end linked in--> 
            
            <!--Links--> 
            <!--end links--> 
            <!--VCARD--> 
            
            <a href="javascript:void(location.href='http://h2vx.com/vcf/'+escape(location.href))" class="tips format" id="copyhcards" original-title="Download my vCard to your address book"> <img src="<?php echo base_url();?>images/vcard_32.png" style="margin-right:10px;"/></a> 
            
            <!--end VCARD--> 
            <!--extra facebook icon-->
            
            <?php if ($user->facebook_url) {?>
            <a href="<?php echo $user->facebook_url ?>" class="tips format" original-title="Extra Facebook link"><img src="<?php echo base_url();?>images/facebook_32.png" style="margin-right:10px;"/></a>
            <?php } ?>
            
            <!--end extra facebook icon--> 
            <!--map Icon--> 
            
            <a href="#"  onClick="openMap()" class="tips format" original-title="Find us on a Map" ><img src="<?php echo base_url();?>images/map_48.png" width="32" height="32" style="margin-right:10px;"/></a> 
            
            <!--end map Icon-->
            
            <?php if ($user_logged_in) { ?>
            <?php if($user->subscribed==1) { ?>
            <p class="validation upgradeInfo"><small><?php echo $user->first_name ?> is an upgrade subscriber.</small></p>
            <?php } ?>
            <?php } ?>
            <!--Not using at the moment--> 
            <!--Wrap and hide all icons and show message if not subscribed and logged in-->
            <?php if ((isset($_COOKIE['user_id']) && $logged_user->guest!=1) || ($logged_user->guest==1 && $logged_user->subscribed==1) ) { ?>
            <?php } else { ?>
            <!--<p class="validation upgradeInfo">Add yourself free as a guest with the facebook or twitter buttons   to view the contact details and links for <br />
                <?php echo $user->
            first_name." ".$user->last_name ?>.
            </p>
            -->
            <?php } ?>
            <!--end message--> 
          </div>
        </div>
        <!--phone number and web address-->
        
        <div class="tel">
          <?php if ($user->workplace_url) {?>
          Website: <a href="http://<?php echo $user->workplace_url ?>" target="_blank" class="tips format" original-title="My Website"><?php echo $user->workplace_url ?></a> <br />
          <?php } ?>
          <? if ($user->phone_no && $user->hide_phone==0) { ?>
          Phone: <strong><?php echo $user->phone_no ?></strong>
          <?php } ?>
        </div>
        
        <!--end phone number and web address-->
        <div class="detailWrap">
          <div class="bio">
            <blockquote itemprop="description">
              <?php if (strlen($user->description)>0) echo $user->description; else echo $user->first_name." ".$user->last_name." has not yet updated this brief personal bio."; ?>
            </blockquote>
          </div>
        </div>
        <ul class="tags_section">
          <li>
            <dl class="tagList">
              <dt>Personal Training Certification (Base):</dt>
              <dd class="certifications"> <?php echo $user_certificate ?> &mdash; <?php echo $user_training_org ?></dd>
              <dd class="certifications">Number:
                <?php if ($user->
                cert_reg_no) echo '#'.$user->cert_reg_no; else echo "N/A"; ?>
                Expiry:
                <?php if ($user->cert_expiry=='0000-00-00') echo "Required"; else echo $user->cert_expiry;  ?>
              </dd>
              <!-- <dt>Joined this directory:</dt>
            <dd><?php echo $user->
              joined ?>
              </dd>
              -->
            </dl>
          </li>
          <li>
            <dl class="tagList">
              <dt>Personal Training Speciality:</dt>
              <?php                            	
				foreach($user_tags[1] as $tags):  
                    foreach($tags as $tag):
             ?>
              <dd> <?php echo $tag->tag ?> </dd>
              <?php 
				endforeach;
					endforeach;
			?>
            </dl>
          </li>
          <li>
            <dl class="tagList">
              <dt>Sports Specific Personal Training:</dt>
              <?php                            	
				foreach($user_tags[2] as $tags):  
                    foreach($tags as $tag):
             ?>
              <dd><?php echo $tag->tag ?> </dd>
              <?php 
				endforeach;
					endforeach;
			?>
            </dl>
          </li>
          <li>
            <dl class="tagList">
              <dt>Personal Training Styles:</dt>
              <?php                            	
				foreach($user_tags[3] as $tags):  
                    foreach($tags as $tag):
             ?>
              <dd> <?php echo $tag->tag ?> </dd>
              <?php 
				endforeach;
					endforeach;
			?>
            </dl>
          </li>
        </ul>
      </div>
      

    </div>
    <div class="row">
      <div class="col-xs-12"> 
        <!--<div class="ad-rotator hidden-phone">
            <div class="pics" id="fade" style="position: relative;"> <a href="http://www.atyourcommand.com.au/personal-trainer-websites/?media=web&campaign=ptwall&page=trainers" style="position: absolute; top: 0px; left: 0px; display: none; z-index: 3; opacity: 1; width: 724px; height: 100px;"><img width="724" height="100" src="<?php echo base_url(); ?>images/ads/ayc-2-a.jpg"></a> <a href="http://www.atyourcommand.com.au/personal-trainer-websites/?media=web&campaign=ptwall&page=trainers" style="position: absolute; top: 0px; left: 0px; display: none; z-index: 3; opacity: 0; width: 724px; height: 100px;"><img width="724" height="100" src="<?php echo base_url(); ?>images/ads/ayc-2-b.jpg"></a> <a href="http://www.atyourcommand.com.au/personal-trainer-websites/?media=web&campaign=ptwall&page=trainers" style="position: absolute; top: 0px; left: 0px; display: block; z-index: 4; opacity: 0; width: 724px; height: 100px;"><img width="724" height="100" src="<?php echo base_url(); ?>images/ads/ayc-2-c.jpg"></a> </div>
            <div class="ad-banner-message" style="text-align:center; font-size:11px; color:#cccccc; ">Advertise to our Fitness network here - </div>
          </div>-->
        
<div class="google-banner hidden-phone hide">
<div class="pics" style="position: relative;"> 
<script type="text/javascript"><!--
google_ad_client = "ca-pub-9333805017415789";
/* PT Wall Profile page */
google_ad_slot = "1283302737";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script> 
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script> 
</div>
</div>
        
</div>
</div>
</div>
</section>
<div class="section-divider"></div>
<!--start code for the modalbox-->
<?php if($user->approved==0) { ?>
<div class="generic_dialog fb-modal default">
</div>
<?php if($user->approved==0) { ?>
<table style="position:absolute; z-index:100; top:0; width:100%; height:100%; width:100%; color:white; font-size:16px; text-align:center; ">
<tr><td vlaign="center"> This PT Profile is being reviewed. <a href="#" ONCLICK="history.go(-1)">Go back</a></td></tr></table>
<?php } ?>
<?php } ?>
<!--end code for the modalbox-->
