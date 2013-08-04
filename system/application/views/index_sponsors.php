<!--ptwall-->
  <div id="wrapper">
    <div id="page">
      <div class="content corners">
	  <!--Global Navigation-->
<div id="navigation" class="clearfix">
<ul class="navigation"><li id="members"><span class="wrap"><a href="/">Personal Trainers</a></span></li>
<li id="guests" class="active"><span class="wrap"><a href="<?php echo base_url(); ?>index.php?c=welcome&amp;country=<?php echo $country ?>&amp;show_guests=true">Guests</a></span></li>
<!--<li><a href="#">Awesome Sponsors</a></li>
--><!--<li><a href="/about.php">About</a></li>
--></ul></div>
<!--End Global Navigation-->
        <div class="controls clearfix">
          <div id="breadCrumb3" class="clearfix breadCrumb module corners"><div class="pad"> <?php echo ul($breadcrumb); ?> </div></div>
        </div>
        <div class="statsMost clearfix last">
          <!--<ul class="tableView">-->
          <ul>
            <?php foreach($most_recent_users as $user):
			   $profile_image = get_user_thumb($user->user_id);
          ?>
		  <?php if($user->active==1) { ?>
            <li class="clearfix <?php if($user->subscribed==1) { ?>subscriber<?php } ?>">
			<?php if ($user->auth=="facebook") { ?>
              <a class="fade format" original-title="<?php echo $user->first_name.' '.$user->last_name ?><br /><span class='location'><?php echo $this->County_model->get_name_by_id($user->county_id)."" ?> <?php echo $this->State_model->get_name_by_id($user->state_id)."" ?></span>" href="http://www.facebook.com/profile.php?id=<?php echo $user->user_id ?>" ><img src="<?php echo $profile_image  ?>" alt="<?php echo $user->first_name." ".$user->last_name ?>" width="48" height="48" class="main"/></a>
              <? } else {					
					?>
              <a class="fade format" original-title="<?php echo $user->first_name.' '.$user->last_name ?><br /><span class='location'><?php echo $this->County_model->get_name_by_id($user->county_id)."" ?> <?php echo $this->State_model->get_name_by_id($user->state_id)."" ?></span>" href="http://twitter.com/<?php echo $user->twitter_name ?>"><img src="<?php echo $profile_image  ?>" alt="<?php echo $user->first_name." ".$user->last_name ?>" width="48" height="48" class="main"/></a>
              <? } ?>
			
			
			</li>
         <? } ?>
            <?php endforeach;?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end pageWrapper -->

