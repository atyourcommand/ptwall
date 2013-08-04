<!--http://www.personaltrainerwall.com-->
<div id="wrapper" class="container <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') == TRUE) { ?>handheld<? } else {	?>screen<? } ?>">
  <div id="page" class="row">
    <div class="span5 wrap">
      <script>
$( '#submit' ).click(function(){
    $.ajax(); //do ajax

    return false; //should override default form submission
});
</script>
      <div id="invitation" class="form-stacked noPad"> <?php echo form_open('/retweets/index'); ?>
        <?php 
$name_data = array(
'name' => 'name',
'id' => 'name',
'value' => set_value('name')
);
?>
<h1 class="hero">Re-Tweeting PT's, 24/7.</h1>
<p class="marketing-byline">We send 1000's of re-tweets daily for our Personal Trainers. </p>
<p><strong>PT Re-Tweets include Personal Trainers Name, City and page URL. For an invitation drop us your email.</strong>
  </p>


        
		<div class="clearfix">
            <label for="email">Email Address</label>
            <div class="input">
              <input type="text" size="30" name="email" id="email" class="xlarge" value="<?php echo set_value('email');?>">
              <span class="help-inline"> <?php echo validation_errors('<span class="error">');?></span>
            </div>
          </div>
		<div class="well">
            <button name="submit" id="submit" class="btn primary">Send me an invitation to PT Retweets</button>
			 <?php echo form_close();?>  
          </div>
		       
         </div>
    </div>
	<div class="span6 offset1 wrap">
	<img src="/images/bird.png"/>
      <div class="tweets"></div>
    </div>
  </div>
</div>
</div>

