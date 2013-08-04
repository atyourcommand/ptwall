<!--http://www.personaltrainerwall.com-->
<div id="wrapper" class="container <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') == TRUE) { ?>handheld<? } else {	?>screen<? } ?>">
<div id="page" class="row">
    <div class="span12 wrap"> 
 
<div class="content">
 <!--start iphone condition-->
      <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') == TRUE) { ?>
      <!--IPHONE content-->
  <div id="breadCrumb3" class="clearfix breadCrumb module corners"> <?php echo ul($breadcrumb); ?> </div>

	  <!--end IPHONE content-->
      <? } else {				
	  ?>
      <!--SCREEN content-->
<!--<div class="smallHeading">~Personal Trainers and Guests - Add yourself to the wall to enjoy the free ride & reach our large network~</div>-->
<div id="slider">

          <ul id="items">
            <li>
              <div class="pad clearfix corners"> <img src="http://a1.twimg.com/profile_images/1641754215/john-brunskill_normal.jpg" alt="John Brunskill - PT Wall manager" width="48" height="48" />
                <div class="description">
                  <h3>No gyms, healthshakes or muscle cowboys! </h3>
                  <blockquote>Just 100's of Certified Personal Trainers. Is your Personal Trainer here?<br />
                  </blockquote>
                  <span class="poi">USA, Canada, Australia &amp; UK</span> </div>
              </div>
            </li>
            <li>
              <div class="pad clearfix corners"> <img src="https://twimg0-a.akamaihd.net/profile_images/1749597422/logo_pttweets_normal.png" alt="PT Tweets 24/7" width="48" height="48" /> 
                <div class="description">
                  <h3>Have you seen PT Tweets? That's us tweeting about 100's of Personal Trainers</h3>
                  <blockquote>We send tweets for all personal trainer subscribers 24/7. Lucky guys hey. </blockquote>
                </div>
              </div>
            </li>
			<li>
              <div class="pad clearfix corners"> <img src="https://twimg0-a.akamaihd.net/profile_images/1749597422/logo_pttweets_normal.png" alt="PT Tweets 24/7" width="48" height="48" /> 
                <div class="description">
                  <h3>A Free Personal Trainer page is waiting for any Certified PT</h3>
                  <blockquote>Click the facebook button to join. We can't wait to promote your services.</blockquote>
                </div>
              </div>
            </li>
            <?php foreach($random_users as $user):
			  $profile_image = get_user_thumb($user->user_id);
 ?> <?php if($user->approved==1) { ?>
            <li>
              <div class="pad clearfix corners"><img src="<?php echo $profile_image  ?>" alt="<?php echo $user->first_name." ".$user->last_name ?>" width="48" height="48" />
                <div class="description">
                  <h3>
                    <?php if ($user->guest==1) {?>
                    <a href="<?php echo base_url(); ?>guests/<?php echo $user->user_id; ?>"><?php echo $user->business_name ?></a>
                    
					<?php } else { ?>
                    <a href="<?php echo base_url(); ?>personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>"> <?php echo $user->first_name." ".$user->last_name ?></a>
                    <?php } ?>
					
                    <span class="poi"><?php echo $this->County_model->get_name_by_id($user->county_id) ?> </span> </h3>
                  <blockquote>
                    <?php if (strlen($user->description)>0) echo $user->description; else echo $user->first_name." ".$user->last_name." has not yet updated this brief personal bio."; ?>
                  </blockquote>
                </div>
              </div>
            </li>
			<? } else {					
					?>
					<!--Nada-->
            <? } ?>
            <!--End if sponsor-->
            <?php endforeach;?>
            <!--End Default Slide-->
          </ul>
        </div>
<!--Global Navigation-->
<div id="navigation" class="clearfix">
<ul class="navigation"><li id="members" class="active"><span class="wrap"><a href="/">Personal Trainers </a></span></li>
<li id="guests"><span class="wrap"><a href="<?php echo base_url(); ?>index.php?c=welcome&amp;country=<?php echo $country ?>&amp;show_guests=true">Guests</a></span></li>
<!--<li><a href="#">Awesome Sponsors</a></li>-->
<!--<li><a href="/about.php">About</a></li>
--></ul></div>
<!--End Global Navigation-->

   <div class="controls clearfix mainSearch">
    <form name="test_form" id="function_search_form" action="<?php echo base_url(); ?>index.php?c=welcome&m=index" method="post">
      <div class="inputs clearfix">
        <?php 
			$data = get_location_drops($country);
			$state_list = $data['state_list'];			
			$county_list = $data['county_list'];
			$sort_options = $data['sort_options'];
			$county_selected = $data['county_selected'];
			$state_selected = $data['state_selected'];
			$hidden_data = $data['hidden_data'];
		
		?>
        <label for="state" class="lbl_lg"><span style="display:none;">Choose state</span> <?php echo form_dropdown('state', $state_list,$state_selected,'id=state onChange="this.form.submit();" class=slt_lg'); ?> </label>
        <label for="region" class="lbl_lg"><span style="display:none;">Choose County</span> <?php echo form_dropdown('county', $county_list, $county_selected,'id=county class=slt_lg onChange=this.form.submit()'); ?> </label>
        <!-- <label for="sort_by" class="lbl_sm" style="text-indent:-2000px;"><span style="display:none;">Sort by </span><?php echo form_dropdown('sort_menu', $sort_menu, $sort_selected,'id=sort_menu class=slt_sm onChange=checkSort()'); ?> </label>
            
			<?php if ($sort_selected=="joined" || $sort_selected=="statuses_count" || $sort_selected=="followers_count" || $sort_selected=="friends_count") { ?>
            <label for="specialities" class="lbl_sm" id="sort_criteria" style="text-indent:-2000px;display: none;"><span style="display:none;">Choose </span><?php echo form_dropdown('sort_options', $sort_options, $sort_options_selected,'class=slt_sm onChange=this.form.submit()'); ?> </label>
            <?} else { ?>
            <label for="specialities" class="lbl_sm" id="sort_criteria" style="text-indent:-2000px;"><span style="display:none;">Choose </span><?php echo form_dropdown('sort_options', $sort_options, $sort_options_selected,'class=slt_sm onChange=this.form.submit()'); ?> </label>
            <? } ?> -->
        <label for="specialities" class="lbl_lg last" id="sort_criteria"><span style="display:none;">Choose </span><?php echo form_dropdown('sort_options', $sort_options, $sort_options_selected,'class=slt_lg onChange=this.form.submit()'); ?> </label>
       
        <input type="hidden" name="search_by_name_id" id="search_by_name_id" value="" />
        <input type="hidden" name="search_by_location_id" id="search_by_location_id" value="" />
        <input type="hidden" name="search_by_tag_id" id="search_by_tag_id" value="" />
        <input type="hidden" name="country" id="country" value="<?php echo $hidden_data['country'] ?>" />
      </div>
    </form>
   
  </div>
   <!--stats Message-->
    <div id="statisticsMessage"><strong>
      <?php $query = mysql_query("SELECT * FROM users");
		$number=mysql_num_rows($query);
		echo "". $number; ?>
      </strong> members</div>
    <!--end Message-->
	
    <div id="breadCrumb3" class="clearfix breadCrumb module corners"> <?php echo ul($breadcrumb); ?> </div>
  <? } ?>
  <!--end screen content-->
  <!--end iphone condition-->
    	  
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
      <li class="mobile clearfix"> <a href="<?php echo base_url(); ?>personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>" class="" title="<?php echo $user->first_name.' '.$user->last_name ?> - <?php echo $this->County_model->get_name_by_id($user->county_id)."" ?><?php echo $this->State_model->get_name_by_id($user->state_id)."" ?></span>">
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
            <a href="<?php echo base_url(); ?>personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>" class="tips format" original-title="<img src='<?php echo get_user_thumb($user->user_id); ?>' width='35' height='35' /><?php echo $user->first_name.'<br />'.$user->last_name ?><br /><span class='location'><?php echo $this->City_model->get_name_by_id($user->city_id)."" ?> <span class='location'><?php echo $this->County_model->get_name_by_id($user->county_id)."" ?> <?php echo $this->State_model->get_name_by_id($user->state_id)."" ?></span>"> <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo $user_image[$user->user_id]['image_file']?>&a=t&w=168&h=168 alt="<?php echo $user->first_name." ".$user->last_name ?>" width="168" height="168" border="0" class="main">
            <!--Add overlay image for hover-->
            <div class="overlay">&nbsp;</div>
            </a>
            <? } else {					
					?>
            <a href="<?php echo base_url(); ?>personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>" class="tips format" original-title="<?php echo $user->first_name." ".$user->last_name ?><br />"> <img src="<?php echo base_url();?>scripts/timthumb.php?src=images/default-profile-image.jpg&w=168&h=168 alt="<?php echo $user->first_name." ".$user->last_name ?>" width="168" height="168" border="0" class="main"/> </a>
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
  
  <!--Paging buttons-->
  <div id="pagingSection">
    <div class="wp-pagenavi clearfix pad"> <span class="pages"><?php echo "Page ".$current_page." of ".$total_pages; ?></span> <?php echo $pagination ?> </div>
  </div>
  <!--end Paging buttons-->
  
   <!--start iphone condition-->
      <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') == TRUE) { ?>
      <!--IPHONE content-->
 	  <!--nada-->

	  <!--end IPHONE content-->
      <? } else {				
	  ?>
      <!--SCREEN content-->
 <!-- <img src="images/certs-logos-1.gif" width="980" height="51" style="margin-bottom:15px;"/>-->
  <!--start guests-->
  <!--<?php if (count($new_guests)>0) { ?>
  <div class="pad">These guys added themselves as guests recently. <a href="<?php echo base_url(); ?>index.php?c=welcome&amp;country=<?php echo $country ?>&amp;show_guests=true">More &gt;</a></div>
  
  <div class="statsMost clearfix last">
    <ul >
      <?php foreach($new_guests as $user):
			  $profile_image = get_user_thumb($user->user_id); ?>
      <li class="clearfix"><a class="tips format" original-title="<?php echo $user->first_name.' '.$user->last_name ?><br /><span class='location'><?php echo $this->City_model->get_name_by_id($user->city_id)."" ?>  <?php echo $this->County_model->get_name_by_id($user->county_id)."" ?> <?php echo $this->State_model->get_name_by_id($user->state_id)."" ?></span>"><img src="<?php echo $profile_image  ?>" alt="<?php echo $user->first_name." ".$user->last_name ?>" width="48" height="48" /></a> </li>
      <?php endforeach;?>
    </ul>
  </div>
   
  <?php } ?>
  <!--end guests-->
  <!--end screen content-->
  <? } ?>
  <!--end iphone condition-->
</div>

</div>
<!-- end page -->
</div>
</div>
<!-- end pageWrapper -->
</div>
  
  
  