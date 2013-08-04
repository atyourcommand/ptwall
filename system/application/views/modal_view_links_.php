<div id="links" class="informationBox">
  <h2 class="resourceTitle">More contact info</h2>
  <div class="inner">
    <div class="topContainer clearfix">
      <div class="imageWrap"> <a href="#"><img src="<?php echo  $profile_image_path.md5($user->profile_image_url).".".substr(strrchr($user->profile_image_url, '.'), 1); ?>" alt="ptwall-thumb" width="48" height="48" /></a></div>
      <div class="listContainer">
        <!--<h3><strong>Nice</strong></h3>-->
        <dl class="clearfix">
          <?php if ($user->facebook_url) { ?>
          <dt>Facebook/MySpace:</dt>
          <dd><a href="<?php echo $user->facebook_url ?>"  target="_blank"><?php echo $user->facebook_url ?></a></dd>
          <? } 
		  	if ($user->linkedin_url) {
		  ?>
          <dt>Linked In:</dt>
          <dd><a href="<?php echo $user->linkedin_url ?>"  target="_blank"><?php echo $user->linkedin_url ?></a></dd>
          <? } 
		  	if ($user->workplace_url) {
		  ?>          
          <dt>Gym:</dt>
          <dd><a href="<?php echo $user->workplace_url ?>"  target="_blank"><?php echo $user->workplace_url ?></a></dd>
          <? } 
		  	if ($user->phone_no && $user->hide_phone==0) {
		  ?>             
		   <dt>Phone:</dt>
          <dd><?php echo $user->phone_no ?></dd>
          <?php } ?>
        </dl>
        <br class="clear"/>
      </div>
    </div>
    <!--<div class="messages">
      <p><span><a href="#">Very important disclaimer message</a></span></p>
    </div>-->
  </div>
</div>