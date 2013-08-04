<section class="theme theme-three">
  <div class="container">
    <div class="row-fluid">
      <div class="span12">
        <div class="section-header">
          <h1 class="large center alt">Guest Members</h1>
          <div class="buyline center alt">Get a link an instant inbound link to your website like these
            <?php $query = mysql_query("SELECT * FROM users");$number=mysql_num_rows($query); echo "". $number; ?>
            Fitness Guys</div>
        </div>
        <div class="controls clearfix">
          <div id="breadCrumb3" class="clearfix breadCrumb module corners">
            <div class="pad"> <?php echo ul($breadcrumb); ?> </div>
          </div>
        </div>
        <div class="statsMost clearfix last"> 
          <!--<ul class="tableView">-->
          <ul>
            <?php foreach($most_recent_users as $user):
			   $profile_image = get_user_thumb($user->user_id);
          ?>
            <li class="clearfix <?php if($user->approved==1) { ?>subscriber<?php } ?>">
              <?php if ($user->approved==1) { ?>
              <a class="tips format" original-title="<?php echo $user->first_name.' '.$user->last_name ?><br /><span class='location'><?php echo $this->County_model->get_name_by_id($user->county_id)."" ?> <?php echo $this->State_model->get_name_by_id($user->state_id)."" ?></span>" href="<?php echo base_url(); ?>personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?>" ><img src="<?php echo $profile_image  ?>" alt="<?php echo $user->first_name." ".$user->last_name ?>" width="48" height="48" class="main"/></a>
              <? } else {					
					?>
              <a class="tips format" original-title="<?php echo $user->first_name.' '.$user->last_name ?><br /><span class='location'><?php echo $this->County_model->get_name_by_id($user->county_id)."" ?> <?php echo $this->State_model->get_name_by_id($user->state_id)."" ?></span>" href=<?php if ($user->auth=="facebook") { ?>"http://www.facebook.com/profile.php?id=<?php echo $user->user_id ?>"<? } else {
					?>"http://twitter.com/<?php echo $user->twitter_name ?>"<? } ?>><img src="<?php echo $profile_image  ?>" alt="<?php echo $user->first_name." ".$user->last_name ?>" width="48" height="48" class="main"/></a>
              <? } ?>
            </li>
            <?php endforeach;?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
