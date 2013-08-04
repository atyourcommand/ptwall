<div id="footerWrapper">
  <div id="footer"><img src="/images/certs-logo-2.gif" width="980" height="51" style="margin-bottom:15px;"/>
    <div class="columns-4 clearfix">
      <div class="column"><?php if ($user_logged_in) { ?>
        <form name="country_form" id="country_search_form" action="index.php?c=welcome&m=index" method="post">
		<p class="inputs clearfix">
          
          <label for="country" class="lbl_sm" style="text-indent:-2000px;float:left;"><span style="display:none;">Choose country</span>
          <?php if ($country) echo form_dropdown('country', $country_list,$country,'id=country onChange="this.form.submit();" class=slt_sm'); ?>
          </label>
         </p>
        </form>
		 <?php } ?>
        <p class="copy">
          <?php 
if ($controller=="trainers"){ ?>
          <?php echo $title; ?>
          <? } else { ?>
          Find a Personal Trainer in your city
          <? } ?>
          <br>
          Personal Trainer Wall <sup>&copy;</sup> 2011 </p>
      </div>
      <div class="column">
        <ul class="plain">
          <li><a href="/finding-a-personal-trainer.php">Finding a personal trainer</a></li>
          <li><a href="/about.php">About Personal Trainer Wall</a></li>
          <li><a href="/personal-trainer-certifications.php">Personal Trainer Certifications</a></li>
        </ul>
      </div>
      <div class="column">
        <ul class="plain">
      <li><a href="http://personaltrainerwall.com/info/about.php" rel="facebox">What's this about?</a></li>
			 <li>
		<a href="<?php echo base_url(); ?>info/upgrade.php" rel="facebox">What happens when I add myself?</a></li> 
		  <li><a href="http://personaltrainerwall.com/info/site-safety.php" rel="facebox">Is it safe to join?</a></li>
          <li> <a href="http://personaltrainerwall.com/info/iphone.php" rel="facebox">iphone app too?</a></li>
          <li> <a href="http://personaltrainerwall.com/info/join.php" rel="facebox">How to join?</a></li>
        </ul>
      </div>
      <div class="column"><!-- Google +1 button -->
        <g:plusone size="medium" annotation="bubble"></g:plusone>
        <!-- Google +1 button script -->
        <script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script></div>
      <div class="column last">
        <p style="clear:both;" class="links"><a title="let's keep it professional" href="http://au.linkedin.com/in/johnbrunskill"><img width="16" height="16" border="0" src="http://personaltrainerwall.com/newsletters/images/linkedin_16.png"></a><a title="Be friendly" href="http://www.facebook.com/pages/Personal-Trainer-Directory-Community/185142201591117"><img width="16" height="16" border="0" src="http://personaltrainerwall.com/newsletters/images/facebook_16.png"></a><a title="let's tweet together" href="https://twitter.com/ptwallguy"><img width="16" height="16" border="0" src="http://personaltrainerwall.com/newsletters/images/twitter_16.png"></a><a title="Any questions?" href="mailto:admin@personaltrainerwall.com?subject=Message from the PT Wall Newsletter"><img width="16" height="16" border="0" src="http://personaltrainerwall.com/newsletters/images/email_16.png"></a></p>
        <p class="links"><a href="http://www.atyourcommand.com.au">Web Design by John Brunskill</a></p>
      </div>
    </div>
  </div>
</div>
</body></html>

