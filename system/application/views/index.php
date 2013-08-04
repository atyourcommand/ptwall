<!--http://www.personaltrainerwall.com-->
<!--Gets twitter Oauth link in the body of the page-->
<?php
	$data = get_twitter_request_url();
?>
<div id="wrapper" class="container">
  <div id="page">
    <div class="content"> 
      <!--start iphone condition-->
      <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') == TRUE) { ?>
      <!--IPHONE content-->
      <div id="breadCrumb3" class="clearfix breadCrumb module corners"> <?php echo ul($breadcrumb); ?> </div>
      <!--end IPHONE content-->
      <? } else {				
	  ?>
      <div class="ad-rotator hidden-phone">
        <div class="pics" id="fade" style="position: relative;"> <a href="http://www.atyourcommand.com.au/personal-trainer-websites/?media=web&campaign=ptwall&page=home" style="position: absolute; top: 0px; left: 0px; display: none; z-index: 3; opacity: 1; width: 724px; height: 100px;"><img width="724" height="100" src="<?php echo base_url(); ?>images/ads/ayc-2-a.jpg"></a> <a href="http://www.atyourcommand.com.au/personal-trainer-websites/?media=web&campaign=ptwall&page=home" style="position: absolute; top: 0px; left: 0px; display: none; z-index: 3; opacity: 0; width: 724px; height: 100px;"><img width="724" height="100" src="<?php echo base_url(); ?>images/ads/ayc-2-b.jpg"></a> <a href="http://www.atyourcommand.com.au/personal-trainer-websites/?media=web&campaign=ptwall&page=home" style="position: absolute; top: 0px; left: 0px; display: block; z-index: 4; opacity: 0; width: 724px; height: 100px;"><img width="724" height="100" src="<?php echo base_url(); ?>images/ads/ayc-2-c.jpg"></a> </div>
        <div class="ad-banner-message" style="text-align:center; font-size:11px; color:#cccccc; ">Advertise to our Fitness network here - </div>
      </div>
      <h1 class="hero center">They do the Personal Training. We do the Tweeting!</h1>
      <!--<p class="marketing-byline center">We also tweet their details  24/7 with <a href="/retweets/">PT Retweets</a> <span class="label label-info">NEW</span></p>-->
      <p class="marketing-byline center"><strong>
        <?php $query = mysql_query("SELECT * FROM users");
		$number=mysql_num_rows($query);
		echo "". $number; ?>
        </strong> Personal Trainers connected <a href="/join/">here</a> <span class="label label-info">FREE</span>. </p>
      <?php if ($user_logged_in && $auth_mode!=-1) { ?>
      <!--Do not show buttons for facebook or twitter-->
      <?php } else { ?>
      <!--add buttons from join page back here if required-->
      <?php } ?>
      
      <!--stats Message-->
      <div class="fb-like hidden-phone" data-href="http://personaltrainerwall.com" data-send="true" data-width="450" data-show-faces="false" style="float:right;"></div>
      <!--end Message-->
      <div id="breadCrumb3" class="clearfix breadCrumb module corners"> <?php echo ul($breadcrumb); ?> </div>
      <? } ?>
      <!--end screen content--> 
      <!--end iphone condition--> 
      <!--start records-->
      <div class="recordWrap clearfix">
        <div class="controls clearfix mainSearch">
          <form name="test_form" id="function_search_form" action="<?php echo base_url(); ?>index.php?c=welcome&m=index" method="post">
            <div class="inputs row-fluid">
              <?php 
			$data = get_location_drops($country);
			$state_list = $data['state_list'];			
			$county_list = $data['county_list'];
			$sort_options = $data['sort_options'];
			$county_selected = $data['county_selected'];
			$state_selected = $data['state_selected'];
			$hidden_data = $data['hidden_data'];
			?>
              <label for="state" class="span4"><span style="display:none;">Choose state</span> <?php echo form_dropdown('state', $state_list,$state_selected,'id=state onChange="this.form.submit();" class=full-width'); ?> </label>
              <label for="region" class="span4"><span style="display:none;">Choose County</span> <?php echo form_dropdown('county', $county_list, $county_selected,'id=county class=full-width onChange=this.form.submit()'); ?> </label>
              <!-- <label for="sort_by" class="lbl_sm" style="text-indent:-2000px;"><span style="display:none;">Sort by </span><?php echo form_dropdown('sort_menu', $sort_menu, $sort_selected,'id=sort_menu class=full-width onChange=checkSort()'); ?> </label>
            
			<?php if ($sort_selected=="joined" || $sort_selected=="statuses_count" || $sort_selected=="followers_count" || $sort_selected=="friends_count") { ?>
            <label for="specialities" class="lbl_sm" id="sort_criteria" style="text-indent:-2000px;display: none;"><span style="display:none;">Choose </span><?php echo form_dropdown('sort_options', $sort_options, $sort_options_selected,'class=slt_sm onChange=this.form.submit()'); ?> </label>
            <?} else { ?>
            <label for="specialities" class="lbl_sm" id="sort_criteria" style="text-indent:-2000px;"><span style="display:none;">Choose </span><?php echo form_dropdown('sort_options', $sort_options, $sort_options_selected,'class=slt_sm onChange=this.form.submit()'); ?> </label>
            <? } ?> -->
              <label for="specialities" class="span4" id="sort_criteria"><span style="display:none;">Choose </span><?php echo form_dropdown('sort_options', $sort_options, $sort_options_selected,'class=full-width onChange=this.form.submit()'); ?> </label>
              <input type="hidden" name="search_by_name_id" id="search_by_name_id" value="" />
              <input type="hidden" name="search_by_location_id" id="search_by_location_id" value="" />
              <input type="hidden" name="search_by_tag_id" id="search_by_tag_id" value="" />
              <input type="hidden" name="country" id="country" value="<?php echo $hidden_data['country'] ?>" />
            </div>
          </form>
        </div>
       
       
       
       
        <ul>
          <?php foreach($latest_users as $user):
			  	$profile_image = $profile_image_path.md5($user->profile_image_url).".".substr(strrchr($user->profile_image_url, '.'), 1);
	    ?>
          <!--ALL content--> 
          <!--add if approved conditional to records-->
          <?php if($user->approved==1) { ?>
          
          <li class="clearfix span2">
            <div class="sponsor nonMobileVersion"">
              <div class="imageWrapper <?php if($user->approved==1) { ?>approved<?php } ?>">
                <?php if ($user_image[$user->user_id]['exist']) { ?>
                <a href="<?php echo base_url(); ?>personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>" class="tips format" original-title="<img src='<?php echo get_user_thumb($user->user_id); ?>' width='35' height='35' /><?php echo $user->first_name.'<br />'.$user->last_name ?><br /><span class='location'><?php echo $this->City_model->get_name_by_id($user->city_id)."" ?> <span class='location'><?php echo $this->County_model->get_name_by_id($user->county_id)."" ?> <?php echo $this->State_model->get_name_by_id($user->state_id)."" ?></span>"> <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo $user_image[$user->user_id]['image_file']?>&a=t&w=194&h=194" alt="<?php echo $user->first_name." ".$user->last_name ?>" border="0" width="100%" class="nonMobileVersion"> 
                <!--Add overlay image for hover-->
                <div class="overlay">&nbsp;</div>
                </a>
                <? } else {					
					?>
                <a href="<?php echo base_url(); ?>personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>" class="tips format" original-title="<?php echo $user->first_name." ".$user->last_name ?><br />"> <img src="<?php echo base_url();?>scripts/timthumb.php?src=images/default-profile-image.jpg&w=194&h=194" alt="<?php echo $user->first_name." ".$user->last_name ?>" border="0" width="100%"/> </a>
                <? } ?>
                <span class="show_upgrade">&nbsp;</span> </div>
            </div>
            
            
            <div class="sponsor mobileVersion"> <a href="<?php echo base_url(); ?>personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>">
              <div class="imageWrapper <?php if($user->approved==1) { ?>approved<?php } ?>">
                <?php if ($user_image[$user->user_id]['exist']) { ?>
                <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo $user_image[$user->user_id]['image_file']?>&a=t&w=60&h=60" alt="<?php echo $user->first_name." ".$user->last_name ?>" border="0">
                <? } else {					
					?>
                <img src="<?php echo base_url();?>scripts/timthumb.php?src=images/default-profile-image.jpg&w=60&h=60 alt="<?php echo $user->first_name." ".$user->last_name ?>" border="0"/>
                <? } ?>
                <?php if($user->subscribed==1) { ?>
                <span class="show_upgrade">&nbsp;</span>
                <?php } ?>
                
                <!--additional for phone-->
                <div class="additionalInfo" style="display:none;">
                  <h3><?php echo $user->first_name." ".$user->last_name ?></h3>
                  <p><?php echo $this->City_model->get_name_by_id($user->city_id)."" ?> <?php echo $this->County_model->get_name_by_id($user->county_id)."" ?><br />
                    <span class="state"><?php echo $this->State_model->get_name_by_id($user->state_id)."" ?></span></p>
                </div>
                <!--end additional for phone--> 
                
              </div>
              </a> </div>
          </li>
          <?php } ?>
          <?php endforeach;?>
        </ul>
        
        
        <div id="pagingSection" class="hidden-phone">
          <div class="wp-pagenavi clearfix pad"> <span class="pages"><?php echo "Page ".$current_page." of ".$total_pages; ?></span> <?php echo $pagination ?> </div>
        </div>
        
      </div>
      <p style="color:#cccccc; margin-top:10px">Established in 2008, Personal Trainer Wall is the project of John Brunskill, a <a href="http://www.atyourcommand.com.au" style="color:#999999;">Freelance Web Designer and Developer</a>. Here we attract Personal Trainers from USA, Canada, UK and Australia to list their Personal Training Services to improve their online visibility. In an effort to provide an excellent National Personal Training Directory, we ask Personal Trainers to nominate the details of their certifications and expiry date. After an approval period we publish. We then promote the services of subscribed Personal Trainers with daily Twitter campaigns featuring the trainers name, city and url. </p>
      <!--end records--> 
    </div>
  </div>
</div>
<!-- end pageWrapper -->
</div>
