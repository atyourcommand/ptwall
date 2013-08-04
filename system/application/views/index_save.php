<!--http://www.personaltrainerwall.com-->
<!-- start wrapper -->

<div id="pageWrapper">
  <!-- <div id="sideLink">
    <div class="linkWrap"><a href="/blog/"><img src="images/logo-side-blog.png" border="0" /></a></div>-->
  <div id="page">
    <div class="wrap">
      <!-- IPHONE content-->
      <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') == TRUE) { ?>
      <!--nothing-->
      <!--end IPHONE content-->
      <? } else {					
			?>
      <!-- SCREEN content-->
      <hr class="divider"/>
      <div id="sitePromotion" class="clearfix">
        <blockquote> Thanks for taking the time to visit our directory and I hope I can encourage you to add yourself to the wall as a guest or personal trainer to connect. <cite>John Brunskill</cite>
          <!--<span class="date">February 6, 2011 at 11:52 am</span>-->
        </blockquote>
        <!--RANDOM STATS-->
        <div class="show">
          <div id="slider" class="statsMost last" style="height:80px;">
            <!--<h3>Featured Personal Trainers - random </h3>-->
            <ul>
              <?php foreach($random_users as $user):
			  $profile_image = get_user_thumb($user->user_id);
    ?>
              <li class="clearfix corners">
                <div class="pad" style="padding:5px;"> <img src="<?php echo $profile_image  ?>" alt="<?php echo $user->first_name." ".$user->last_name ?>" width="48" height="48" /><a href="http://personaltrainerwall.com/index.php/personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>"><?php echo $user->first_name." ".$user->last_name ?> <span class="poi"><?php echo $this->County_model->get_name_by_id($user->county_id) ?></span></a> <br />
                  <p style="margin:0 0 0 61px;line-height:15px;font-size:11px">
                    <?php if (strlen($user->description)>0) echo $user->description; else echo $user->first_name." ".$user->last_name." has not yet to updated this brief personal bio."; ?>
                  </p>
                </div>
              </li>
              <?php endforeach;?>
            </ul>
          </div>
          <!--END RANDOM STATS-->
        </div>
      </div>
      <div class="content corners">
        <p class="links"><a href="http://au.linkedin.com/in/johnbrunskill" title="let's keep it professional"><img src="http://personaltrainerwall.com/newsletters/images/linkedin_16.png" width="16" height="16" border="0" /></a><a href="http://www.facebook.com/apps/application.php?id=130355453666011" title="Be friendly"><img src="http://personaltrainerwall.com/newsletters/images/facebook_16.png" width="16" height="16" border="0"  /></a><a href="https://twitter.com/ptwallguy" title="let's tweet together"><img src="http://personaltrainerwall.com/newsletters/images/twitter_16.png" width="16" height="16" border="0" /></a><a href="mailto:admin@personaltrainerwall.com?subject=Message from the PT Wall Newsletter" title="Any questions?"><img src="http://personaltrainerwall.com/newsletters/images/email_16.png" width="16" height="16" border="0"/></a> Home ~ </p>
        <div class="controls clearfix">
          <div class="wp-pagenavi clearfix"> <span class="pages"><?php echo "Page ".$current_page." of ".$total_pages; ?></span> <?php echo $pagination ?> </div>
          <div id="breadCrumb3" class="clearfix breadCrumb module corners"> <?php echo ul($breadcrumb); ?> </div>
        </div>
        <!--start records-->
        <div id="recordWrap" class="clearfix">
          <ul>
            <?php foreach($latest_users as $user):
			  	$profile_image = $profile_image_path.md5($user->profile_image_url).".".substr(strrchr($user->profile_image_url, '.'), 1);
	    ?>
            <!--start iphone condition-->
            <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') == TRUE) { ?>
            <!--IPHONE content-->
            <!--add if approved conditional to records-->
            <?php if($user->approved==1) { ?>
            <li class="mobile clearfix"> <a href="<?php echo base_url(); ?>index.php/personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>" class="" title="<?php echo $user->first_name.' '.$user->last_name ?> - <?php echo $this->County_model->get_name_by_id($user->county_id)."" ?><?php echo $this->State_model->get_name_by_id($user->state_id)."" ?></span>">
              <div class="sponsor clearfix">
                <!--start image-->
                <div class="imageWrapper <?php if($user->approved==1) { ?>approved<?php } ?>">
                  <?php if ($user_image[$user->user_id]['exist']) { ?>
                  <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo $user_image[$user->user_id]['image_file']?>&a=t&w=48&h=48" alt="<?php echo $user->first_name." ".$user->last_name ?>" width="48" height="48" border="0" class="main">
                  <!--Add overlay image for hover-->
                  <div class="overlay">&nbsp;</div>
                  <? } else {					
					?>
                  <? } ?>
                  <!--end-->
                  <?php if($user->subscribed==1) { ?>
                  <span class="show_upgrade">&nbsp;</span>
                  <?php } ?>
                </div>
                <!--end image-->
                <h3><?php echo $user->first_name." ".$user->last_name ?></h3>
                <p><?php echo $this->City_model->get_name_by_id($user->city_id)."" ?> <?php echo $this->County_model->get_name_by_id($user->county_id)."" ?><br />
                  <span class="state"><?php echo $this->State_model->get_name_by_id($user->state_id)."" ?></span></p>
              </div>
              </a> </li>
            <?php } ?>
            <!--end IPHONE content-->
            <? } else {				
			?>
            <!--SCREEN content-->
            <!--add if approved conditional to records-->
            <?php if($user->approved==1) { ?>
            <li class="clearfix">
              <div class="sponsor">
                <div class="imageWrapper <?php if($user->approved==1) { ?>approved<?php } ?>">
                  <?php if ($user_image[$user->user_id]['exist']) { ?>
                  <a href="<?php echo base_url(); ?>index.php/personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>" class="fade format" original-title="<img src='<?php echo get_user_thumb($user->user_id); ?>' width='35' height='35' /><?php echo $user->first_name.'<br />'.$user->last_name ?><br /><span class='location'><?php echo $this->County_model->get_name_by_id($user->county_id)."" ?> <?php echo $this->State_model->get_name_by_id($user->state_id)."" ?></span>"> <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo $user_image[$user->user_id]['image_file']?>&a=t&w=122&h=122" alt="<?php echo $user->first_name." ".$user->last_name ?>" width="122" height="122" border="0" class="main">
                  <!--Add overlay image for hover-->
                  <div class="overlay">&nbsp;</div>
                  </a>
                  <? } else {					
					?>
                  <a href="<?php echo base_url(); ?>index.php/personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>" class="fade format" original-title="<?php echo $user->first_name." ".$user->last_name ?><br />"> <img src="<?php echo base_url();?>scripts/timthumb.php?src=images/default-profile-image.jpg&w=122&h=122" alt="<?php echo $user->first_name." ".$user->last_name ?>" width="122" height="122" border="0" class="main"/> </a>
                  <? } ?>
                  <!--end-->
                  <?php if($user->subscribed==1) { ?>
                  <span class="show_upgrade">&nbsp;</span>
                  <?php } ?>
                </div>
              </div>
            </li>
            <?php } ?>
            <!--end sponsor-->
            <!--end screen content-->
            <? } ?>
            <!--end iphone condition-->
            <!--end conditional to records-->
            <?php endforeach;?>
          </ul>
        </div>
        <!--end records-->
        <!--start guests-->
        <?php if (count($new_guests)>0) { ?>
        <div style="text-align:center;"><strong>Newest Guests and Sponsors [Beta]</strong> &mdash; Join up like these <a href="http://personaltrainerwall.com/index.php?c=welcome&amp;show_guests=true">new guests and sponsors</a></div>
        <div class="statsMost clearfix last">
          <ul >
            <?php foreach($new_guests as $user):
			  $profile_image = get_user_thumb($user->user_id);
    ?>
            <li class="clearfix"><a href="http://personaltrainerwall.com/guests/<?php echo $user->user_id; ?>" class="fade format" original-title="<img src='<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo $profile_image  ?>&a=t&w=100&h=100' width='100' height='100'><?php echo $user->first_name.' '.$user->last_name ?><br /><span class='location'><?php echo $this->County_model->get_name_by_id($user->county_id)."" ?> <?php echo $this->State_model->get_name_by_id($user->state_id)."" ?></span>"> <img src="<?php echo $profile_image  ?>" alt="<?php echo $user->first_name." ".$user->last_name ?>" width="48" height="48" /></a> </li>
            <?php endforeach;?>
          </ul>
        </div>
          <?php } ?>
        <!--end guests-->
        <div id="promoMessage" style="font-size:11px;margin:5px 0 0 0;background-color:white;padding:1px 10px 0px"><strong>
          <?php $query = mysql_query("SELECT * FROM users");
		$number=mysql_num_rows($query);
		echo "". $number; ?>
          </strong> Personal Trainers, Guests and Sponsors have added themselves to this Personal Trainer Directory</div>
        <!--end Message-->
      </div>
    </div>
  </div>
  <!-- end page -->
</div>
<!-- end pageWrapper -->
