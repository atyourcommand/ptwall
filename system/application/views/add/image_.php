<!--<script type="text/javascript" src="<?php echo base_url(); ?>scripts/js-core/mootools1.2.js" ></script>-->
<script src="<?php echo base_url(); ?>scripts/ajaxupload.js" type="text/javascript"></script>
<body>
<!--start browse-->
<div id="reg"> </div>
<!--end browse-->
<!-- start wrapper -->
<div id="wrapper">
  <!-- start headerWrapper -->
</div>
<!-- end headerWrapper content -->
<!--start template-->
<!--start grid-->
<div id="pageWrapper">
  <div id="page" class="container">
    <!--start introduction-->
    <div class="introBig span-24 last">
      <div class="span-24 last">
        <!--<ol>
            <li>If you are not a Personal Trainer please leave this page now </li>
            <li>Your profile will be deleted after 3 months but you can rejoin at anytime for another 3 months </li>
            <li>If it looks like a you are not a Personal Trainer or a Twitter spammer we will remove you from the site without notice </li>
          </ol>-->
      </div>
    </div>
    <!-- end intro -->
    <div class="span-24 last">
      <!-- email not verified -->
      <?php if ($email_verified==0 && $user_exist) { ?>
      <p> <?php echo $email_verified_msg ?> </p>
      <? } ?>
      <!-- email not verified-->
      <div class="userDetails padd corners clearfix">
        <!-- THIS IS THE IMPORTANT STUFF! -->
        <div id="demo_area" class="clearfix">
          <div id="left_col" style="float:left;width:320px;padding-right:80px;">
            <div id="upload_area">
              <h3>How your pic looks on the Wall</h3>
              <?php if ($image_exist) { ?>
              <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo $image_file ?>&a=t&w=122&h=122" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="122">
              <? } else {					
					?>
              <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=./images/default-profile-image.jpg&a=t&w=122&h=122" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="122">
              <? } ?>
              <hr class="dotted"/>
              <h3>How your pic looks on your full page</h3>
              <?php if ($image_exist) { ?>
              <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=<?php echo $image_file ?>&a=t&w=250&h=313" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="250">
              <? } else {					
					?>
              <img src="<?php echo base_url(); ?>scripts/timthumb.php?src=./images/default-profile-image.jpg&a=t&w=250&h=313" alt="<?php echo $user->first_name." ".$user->last_name ?> " width="250">
              <? } ?>
            </div>
			
          </div>
          <!--end left column-->
          <div id="right_col" style="float:left;width:500px">
            <h3>Upload your Profile image easily</h3>
            <fieldset>
            <a href="index.php?c=add&m=image&delete=true">Reset to Default</a>
            <form action="scripts/ajaxupload.php" method="post" name="sleeker" id="sleeker" enctype="multipart/form-data">
              <!--<input type="hidden" name="maxSize" value="512000" />-->
              <input type="hidden" name="maxSize" value="2000000" />
              <input type="hidden" name="maxW" value="250" />
              <input type="hidden" name="fullPath" value="<?php echo base_url(); ?>uploads/" />
              <input type="hidden" name="relPath" value="<?php echo ".".$upload_path ?>" />
              <input type="hidden" name="colorR" value="255" />
              <input type="hidden" name="colorG" value="255" />
              <input type="hidden" name="colorB" value="255" />
              <input type="hidden" name="maxH" value="325" />
              <input type="hidden" name="filename" value="filename" />
              <p>
                <input type="file" name="filename" onChange="ajaxUpload(this.form,'scripts/ajaxupload.php?filename=name&amp;userId=<?php echo $user->user_id; ?>&amp;maxSize=2000000&amp;maxW=250&amp;fullPath=<?php echo base_url(); ?>uploads/&amp;relPath=<?php echo ".".$upload_path ?>&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=325','upload_area','File Uploading Please Wait...&lt;br /&gt;&lt;img src=\'images/loader.gif\' width=\'31\' height=\'31\' border=\'0\' /&gt;','&lt;img src=\'images/cross.png\' width=\'16\' height=\'16\' border=\'0\' /&gt; Error in Upload, check settings and path info in source code.'); return false;" />
              </p>
            </form>
            </fieldset>
            <small style="font-weight: bold; font-style:italic;">Supported File Types: gif, jpg, png<br>Maximum File Size: 2MB
</small>
            <hr class="dotted"/>
            <h3>Photo tips</h3>
            <p style="font-size:13px";>Close ups are great, need the face and not the kids this time.<br>
              <br>
              No logos, branding or text over the image. <br>
              <br>
              Yes we need to approve all images on the personal training directory.<br>
              <br>
              Not happy with your attempts?<br> 
              It's ok we have an <strong>image optimizing service</strong>.<br>
		      Just email your pic and when you are happy we will bill you $10.<br>
              <a href="mailto:admin@personaltrainerwall.com?subject=Message about adding my Image ">Email me</a> if you need any assistance or have a question about your image.<br/>
            </p>
          </div>
          <div class="clear"> </div>
        </div>
        <!-- END IMPORTANT STUFF -->
      </div>
      <!--<h3>About you </h3>-->
      <!--<p class="validation success">Section 9 - 12 displays on your profile when you have an active <strong>Upgrade Subscription</strong><strong>.</strong><br>
		</p>-->
    </div>
    <!-- end grid -->
  </div>
</div>
<!-- end pageWrapper -->
<!--end template-->
