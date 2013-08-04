<div class="informationBox links">
  <h2>More contact info</h2>
  <dl class="clearfix">
    <?php if ($user->url) {?>
    <dt>Web:</dt>
    <dd><a href="<?php echo $user->url ?>"><?php echo $user->url ?></a></dd>
    <? }
		   if ($user->facebook_url) {
		  ?>
    <dt>Facebook/MySpace:</dt>
    <dd><a href="<?php echo $user->facebook_url ?>"><?php echo $user->facebook_url ?></a></dd>
    <? } 
		  	if ($user->linkedin_url) {
		  ?>
    <dt>Linked In:</dt>
    <dd><a href="<?php echo $user->linkedin_url ?>"><?php echo $user->linkedin_url ?></a></dd>
    <? } 
		  	if ($user->workplace_url) {
		  ?>
    <dt>Gym:</dt>
    <dd><a href="<?php echo $user->workplace_url ?>"><?php echo $user->workplace_url ?></a></dd>
    <? } 
		  	if ($user->phone_no && $user->hide_phone==0) {
		  ?>
    <dt>Phone:</dt>
    <dd><?php echo $user->phone_no ?></dd>
    <? }
		   if ($user->hide_email ==0) {
		   ?>
    <dt>Email:</dt>
    <dd><a href="mailto:<?php echo $user->email ?>?subject=A message from your PT Wall profile" ><?php echo $user->email ?></a></dd>
    <?php } ?>
  </dl>
</div>
