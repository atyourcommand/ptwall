<!--http://www.personaltrainerwall.com-->
<?php
	$data = get_twitter_request_url();
	//print_r($data);
	//echo "dddddddddddddd";
?>
<div id="wrapper" class="container <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') == TRUE) { ?>handheld<? } else {	?>screen<? } ?>">
  <div class="row-fluid">
   <div class="">
      <h1 class="hero center">How else are we going to find you?</h1>
	  <p class="marketing-byline center">Personal Trainers grab a free page and thousands of page visits every year 
  </p>
 
	 <?php if ($user_logged_in && $auth_mode!=-1) { ?>
      <!--Do not show buttons for facebook or twitter-->
      <?php } else { ?>
      <div id="joinUp" class="clearfix">
        <div class="table">
          <ul id="horizontal-list">
            <li class="twitterLink"><small><a class="btnFacebook" href="<?php echo base_url(); ?>index.php?c=auth&m=fb_login" >Facebook</a></small> </li>
           <!-- <li class="twitterLink"><small> <a href="<?php echo $data['twitter_request_url']; ?>" class="btnTwitter" original-title="Join or login here " >Twitter</a></small> </li>-->
          </ul>
         
        </div> <p class="center" style="margin-top:20px"><strong>Apology:</strong> The Twitter log in and join is currently broken check back soon or join with the Facebook option.</p>
      </div>
      <?php } ?>
	
	
	
	
    </div>
   
  </div>
  <hr class="soften">
   <div class="row-fluid">
    <div class="span4">
      <img src="../images/glyphicons/glyphicons_332_certificate.png" class="bs-icon">
      <h2>No Certs = No Dice</h2>
      <p>We insist all the independent Personal Trainers that add themselves to our <a href="/">Wall</a> have current certifications. This due diligence can be tough sometimes but it's our job to keep the cowboys off.  We haved no commercial affiliations and have only one purpose and that is to assemble the best list of Personal Trainers in the USA, Canada, Australia and the United Kingdom. </p>
    </div>
    <div class="span4">
      <img src="../images/glyphicons/glyphicons_289_podium.png" class="bs-icon">
      <h2>Find a first rate PT</h2>
      <p> Finding your fitness and someone just right to help you on the journey can be challenging. We hope we have helped you do this and thoroughly enjoy improving this service. The <a href="/">Personal Trainer Wall</a> will serve you up Personal Trainers from your state. For certain Personal Training Specialities and Sports Specific skills, jump onto the <a href="/index.php?c=welcome&show_search=true">Personal Trainer Search</a> page and try searching by #tag.</p>
    </div>
    <div class="span4">
      <img src="../images/glyphicons/glyphicons_392_twitter.png" class="bs-icon">
      <h2>Re-Tweeting for PT's </h2>
      <p>Since January, 2012 we really stepped our up work with <a href="/retweets/">PT Retweets</a>. Daily we re-tweet the Name, City, URL and keywords of 100's of Personal Training services. With these targeted campaigns and the reach of Twitter, the results are immediate. Excellent leads and many additional qualified page visits have resulted. 
    </div>
  </div>
</div>
</div>